<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Survey;

use App\Models\User;

use App\Models\Question;

use App\Models\Answer;

class UserController extends Controller
{
    public function addAnswer(Request $request){
        $answer = new Answer;
        $answer->text = $request->text;
        $answer->question_id = $request->question;
        $answer->save();

        return response()->json([
            "status" => "success",
            "answer_id" => $answer->id
        ], 200);
    }
}
