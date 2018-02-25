<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Question;
use App\Option;
use App\User;

class AdminController extends Controller
{	

	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('Admin');
    }

    public function index(){
    	return view('admin.index');
    }

    public function questionindex(){

        $questions = Question::latest()->paginate(20);
        return view('admin.question.index', compact('questions'));

    }

    public function questionpost(Request $request){


        $question = new Question;
        $question->question = $request->question;
        $question->save();

        return back()->with('status', 'Question Added Success');
    }

    public function questiondelete($id){

        $question = Question::find($id);
        $question->delete();

        return back()->with('warning', 'This Question Deleted Success');
    }

    public function questionedit($id, Request $request){
        $question = Question::find($id);
        $question->question = $request->question;
        $question->save();
        return back()->with('status', 'Question Updated Success');
    }

    public function optionpost($id, Request $request){

        $que = Question::find($id);
        $option = new Option;

        $option->option = $request->option;
        $option->question_id = $que->id;

        $option->save();

        return back()->with('status', 'Option Added Success');

    }

    public function optiondelete($id){
        $opt = Option::find($id);

        $opt->delete();
        return back()->with('status', 'Option Deleted Success');
    }

    public function usersindex(){
        $users = User::latest()->paginate('20');
        return view('admin.user.index', compact('users'));
    }

    public function userdelete($id){
        $user = User::find($id);
        $user->delete();
        return back()->with('status', 'User Deleted Success');
    }
}
