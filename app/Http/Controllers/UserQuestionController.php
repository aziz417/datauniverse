<?php

namespace App\Http\Controllers;

use App\Models\UserQuestion;
use Illuminate\Http\Request;

class UserQuestionController extends Controller
{
    public function index(Request $request)
    {
        $perPage = $request->perPage ?: 10;
        $keyword = $request->keyword;

        $questions = UserQuestion::latest();

        if ($keyword) {
            $keyword = '%' . $keyword . '%';
            $questions = $questions->where('name', 'like', $keyword)
                ->orWhere('email', 'like', $keyword)
                ->orWhere('subject', 'like', $keyword)
                ->orWhere('message', 'like', $keyword)
            ;
        }

        $questions = $questions->paginate($perPage);

        return view('admin.pages.user_questions.index', compact('questions'));
    }
}
