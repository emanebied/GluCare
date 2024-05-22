<?php

namespace App\Http\Controllers\Apis\GluCare\chatbot;

use App\Http\Controllers\Controller;
use App\Http\traits\ApiTrait;
use App\Http\traits\AuthorizeCheckTrait;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use Illuminate\Http\Request;

class ChatbotController extends Controller
{
    use ApiTrait,AuthorizeCheckTrait;

    public function searchWikipedia(Request $request)
    {

        $this->authorizeCheck('ask_chatbot');
        $this->validate($request, [
            'question' => 'required|string',
        ]);

        $client = new Client();
        $endpoint = 'https://en.wikipedia.org/w/api.php';

        $params = [
            'action' => 'query',//retrieve data
            'format' => 'json',
            'list' => 'search',
            'srsearch' => $request->input('question'),
            'srlimit' => 5, // Limit the number of search results
        ];

        try {
            $response = $client->get($endpoint, [
                'query' => $params,
            ]);

            // Decode the response JSON
            $responseData = json_decode($response->getBody()->getContents(), true);

            $pageIds = array_column($responseData['query']['search'], 'pageid');
            // Fetch detailed content for each page
            $answer = [];
            foreach ($pageIds as $pageId) {
                $pageContentResponse = $client->get($endpoint, [
                    'query' => [
                        'action' => 'query',
                        'format' => 'json',
                        'prop' => 'extracts',
                        'exchars' => 1000, // Number of characters to extract
                        'pageids' => $pageId,
                    ],
                ]);
                $pageContent = json_decode($pageContentResponse->getBody()->getContents(), true);
                // Extract content and remove HTML tags, newline characters, character dots, and double quotation marks
                $extractedContent = strip_tags($pageContent['query']['pages'][$pageId]['extract']);
                $extractedContent = str_replace(["\n", ".", "\""], "", $extractedContent);

                // Check if the extracted content is relevant to the question
                if ($this->isContentRelevant($extractedContent, $request->input('question'))) {
                    $answer[] = $extractedContent;
                }
            }
            return response()->json(['answer' => $answer]);
        } catch (ClientException $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    private function isContentRelevant($content, $question)
    {
        // Convert both content and question to lowercase for case-insensitive comparison
        $content = strtolower($content);
        $question = strtolower($question);

        // Split the question into words or phrases
        $questionPhrases = explode(' ', $question);

        // Check if any of the question phrases exist in the content
        foreach ($questionPhrases as $phrase) {
            if (strpos($content, $phrase) !== false) {
                return true;
            }
        }

        return false;
    }
}
