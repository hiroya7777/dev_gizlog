<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Question;
use App\Models\TagCategory;
use App\Http\Requests\User\QuestionsRequest;
use Auth;

class QuestionController extends Controller
{
    private $question;
    private $category;

    public function __construct(Question $question, TagCategory $category)
    {
        $this->middleware('auth');
        $this->question = $question;
        $this->category = $category;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $categories = $this->category->all();
        $questions = $this->question->all();
        return view('user.question.index', compact('questions','categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.question.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $inputs = $request->all();
        $inputs['user_id'] = Auth::id();
        $this->question->create($inputs);
        return redirect()->route('question.mypage');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $question = $this->question->find($id);
        $categories = $this->category->where('id', '=', 'tag_category_id')->get();
        $allcategories = $this->category->all();
        return view('user.question.edit', compact('question', 'categories','allcategories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $input = $request->all();
        $input['user_id'] = Auth::id();
        $this->question->find($id)->fill($input)->save();
        return redirect()->route('question.confirm');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->question->find($id)->delete();
        return redirect()->route('question.mypage');
    }

    public function confirm(Request $request)
    {
        $question = $request->all();
        $question['user_id'] = Auth::id();
        $category = $this->category->find($question['tag_category_id'])->name;
        return view('user.question.confirm', compact('question', 'category'));
    }

    public function mypage()
    {
        $questions = $this->question->where('user_id', Auth::id())->get();
        $category = $this->category->where('id', '=', 'tag_category_id')->get();
        return view('user.question.mypage', compact('questions', 'category'));
    }
}
