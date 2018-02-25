<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Question;
use App\Option;
use App\Vote;
use Auth;
class HomeController extends Controller
{
    

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {	
    	$questions = Question::latest()->paginate(20);
        return view('welcome', compact('questions'));
    }

    public function votepost($id, Request $request){

        $opt = Option::find($id);
        $voted = Vote::where('question_id', $request->question_id)->where('user_id', Auth::user()->id)->first();

        if (count($voted) == 1) {
            $voted->delete();
            $vote = new Vote;
            $vote->option_id = $opt->id;
            $vote->question_id = $request->question_id;
            $vote->user_id = Auth::user()->id;

            $vote->save();
            return back()->with('status', 'Thank you for voting');
        }
        else{

            $vote = new Vote;
            $vote->option_id = $opt->id;
            $vote->question_id = $request->question_id;
            $vote->user_id = Auth::user()->id;

            $vote->save();
            return back()->with('status', 'Thank you for voting');
        }
        
    }
}
