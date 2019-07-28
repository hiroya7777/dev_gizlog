<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Question;
use App\Http\Requests\User\CommentRequest;
use App\Http\Requests\User\QuestionsRequest;
use Auth;

class CommentsController extends Controller
{
    private $comment;
    private $question;

    public function __construct(Comment $comment)
    {
        $this->middleware('auth');
        $this->comment = $comment;
    }

    public function store(CommentRequest $request)
    {
        $inputs = $request->all();
        $inputs['user_id'] = Auth::id();
        $this->comment->create($inputs);
        return redirect()->route('question.index');
        // return view('user.question.show',compact('inputs'));
    }
}
