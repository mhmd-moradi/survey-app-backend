<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Survey;

use App\Models\User;

use App\Models\Question;

use Tymon\JWTAuth\Facades\JWTAuth;

class AdminController extends Controller
{
    public function addSurvey(Request $request){
        $survey = new Survey;
        $survey->user_id = auth('api') -> user() -> id;
        $survey->title = $request->title;
        $survey->save();

        return response()->json([
            "status" => "success",
            "survey_id" => $survey->id
        ], 200);
    }

    public function addQuestion(Request $request){
        $question = new Question;
        $question->survey_id = $request->survey;
        $question->questiontype_id = $request->questiontype;
        $question->text = $request->text;
        $question->save();

        return response()->json([
            "status" => "success",
            "question_id" => $question->id
        ], 200);
    }

}
