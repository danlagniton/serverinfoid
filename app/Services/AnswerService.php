<?php

namespace App\Services;

use App\Models\Answer;
use App\Models\Question;
use App\Models\SubQuestion;
use App\utils\CollectionUtils;

class AnswerService {

    public function saveFormAnswers($request, $submitted_form_id) {
        $templateId = $request->template_id;
        $answers = $request->all();

        unset($answers['template_id']);
        unset($answers['appointment_schedule']);

        $formQuestions = collect();

        $templateQuestions = Question::GetQuestionsByTemplateId($templateId)->get();
        $templateSubQuestions = SubQuestion::where('template_id', $templateId)->get();

        foreach ($templateQuestions as $question) {
            $formQuestions->push($question);
        }
        foreach ($templateSubQuestions as $question) {
            $formQuestions->push($question);
        }

        $formQuestions = app(CollectionUtils::class)->sortCollection($formQuestions, 'name', 'asc');
        // $formAnswers = collect();
        try {
            foreach ($answers as $questionName => $questionAnswer) {
                $question =  $formQuestions->firstWhere('name', $questionName);
                if($question->question_id){
                    $is_sub_question = true;
                    $main_question = $templateQuestions->firstWhere('id', $question->question_id)->question;
                } else {                    
                    $is_sub_question = false;
                    $main_question = null;
                }

                $answer = new Answer();
                $answer->question = $question->question;
                $answer->answer = $questionAnswer;
                $answer->is_sub_question = $is_sub_question;
                $answer->main_question = $main_question;
                $answer->submitted_form_id = $submitted_form_id;
                
                $answer->save();
                // $formAnswers->push($answer);
                
            }
            // return $formAnswers;

        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);

        }
        
    }

}