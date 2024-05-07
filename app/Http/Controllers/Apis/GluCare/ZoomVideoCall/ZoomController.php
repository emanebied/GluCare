<?php

namespace App\Http\Controllers\Apis\GluCare\ZoomVideoCall;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Support\Facades\Http;

class ZoomController extends Controller
{
    public function createMeeting(array $appointmentData)
    {
        $validated = validator($appointmentData, [
            'title' => 'required',
            'start_date_time' => 'required|date',
            'duration_in_minute' => 'required|numeric',
        ])->validate();

        try {
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $this->generateToken(),
                'Content-Type' => 'application/json',
            ])->post("https://api.zoom.us/v2/users/me/meetings", [
                'topic' => $validated['title'],
                'type' => 2, // 2 for scheduled meeting
                'start_time' => Carbon::parse($validated['start_date_time'])->toIso8601String(),
                'duration' => $validated['duration_in_minute'],
            ]);

            $responseData = $response->json();

            // Check if meeting creation was successful and return the join URL
            if (isset($responseData['join_url'])) {
                return $responseData['join_url'];
            } else {
                throw new \Exception("Failed to create Zoom meeting. Response: " . json_encode($responseData));
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    protected function generateToken(): string
    {
        try {
            $base64String = base64_encode(env('ZOOM_CLIENT_ID') . ':' . env('ZOOM_CLIENT_SECRET'));
            $accountId = env('ZOOM_ACCOUNT_ID');

            $responseToken = Http::withHeaders([
                "Content-Type" => "application/x-www-form-urlencoded",
                "Authorization" => "Basic {$base64String}"
            ])->post("https://zoom.us/oauth/token?grant_type=account_credentials&account_id={$accountId}");

            return $responseToken->json()['access_token'];
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}

