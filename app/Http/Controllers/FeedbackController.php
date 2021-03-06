<?php
/**
 * Created by PhpStorm.
 * User: Lourence
 * Date: 1/10/2017
 * Time: 10:30 AM
 */

namespace App\Http\Controllers;


use App\Feedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FeedbackController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('feedback.list',[
            'feedbacks' => Feedback::orderBy('id','desc')->paginate(15)
        ]);
    }

    public function sendFeedback(Request $request)
    {
        $feedback = new Feedback();
        $feedback->userid = $request->user()->id;
        $feedback->subject = $request->input('subject');
        $feedback->telno = $request->input('telno');
        $feedback->message = $request->input('message');
        $feedback->stat_id = "1";
        $feedback->is_read = "0";
        $feedback->save();
        return redirect()->back();
    }
    public function view_feedback(Request $request)
    {
        if($request->isMethod('get')) {
            $feedbacks = Feedback::orderBy('created_at', 'DESC')->paginate(20);
            return view('feedback.list')->with('feedbacks',$feedbacks);
        }
    }
    public function message(Request $request)
    {
        $data = $feedback = Feedback::where('id', $request->input('id'))->first();
        $feedback->is_read = "1";
        $feedback->save();
        return view('feedback.message')->with('feedback',$data);
    }

    public function action(Request $request)
    {
        $id = $request->input('id');
        $feedback = Feedback::where('id',$id)->first();
        $feedback->stat_id = $request->input('actionid');
        $feedback->save();
        return redirect('users/feedback');
    }

    function completed($id)
    {
        Feedback::find($id)->update(['stat_id'=>2]);
        return redirect()->back();
    }

    function deleted($id)
    {
        Feedback::find($id)->delete();
        return redirect()->back();
    }

    function form()
    {
        $user = Auth::user();
        $name = "$user->fname $user->lname";
        return view('feedback.feedback')->with('name',$name);
    }
}