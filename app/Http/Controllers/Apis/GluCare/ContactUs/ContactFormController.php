<?php

namespace App\Http\Controllers\Apis\GluCare\ContactUs;

use App\Http\Controllers\Controller;
use App\Http\Requests\Apis\GluCare\ContactUs\SubmitContactFormRequest;
use App\Http\traits\ApiTrait;
use App\Http\traits\AuthorizeCheckTrait;
use App\Models\GluCare\ContactUs\ContactForm;
use Illuminate\Http\Request;

class ContactFormController extends Controller
{
    use ApiTrait,AuthorizeCheckTrait;

    public function submit(SubmitContactFormRequest $request)
    {
        ContactForm::create($request->validated());
        return response()->json(['message' => 'Contact form submitted successfully.'], 201);
    }

    public function viewUnanswered()
    {
         $this->authorizeCheck('answer_question_from_contact_form');

        $unansweredQuestions = ContactForm::where('answered', false)->get();
        return response()->json($unansweredQuestions);
    }



    public function answerQuestion(Request $request, $id)
    {
        $this->authorizeCheck('answer_question_from_contact_form');

        $contactForm = ContactForm::findOrFail($id);
        $contactForm->answered = true;
        $contactForm->save();

        return response()->json(['message' => 'Question marked as answered.']);
    }
}
