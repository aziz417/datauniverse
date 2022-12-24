<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\UserContact;
use App\Models\UserContactReply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class UserContactReplyController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:contact message reply|contact message reply show|contact message reply delete', ['only' => ['messageReplies']]);
        $this->middleware('permission:contact message reply show|contact message reply delete')->only(['messageReplies']);
        $this->middleware('permission:contact message reply')->only(['store']);
        $this->middleware('permission:contact message reply delete')->only(['destroy']);
    }

    public function index(Request $request){
        $perPage = $request->perPage ?: 10;
        $keyword = $request->keyword;

        //get all UserContacts
        $replies = UserContactReply::latest();

        if ($keyword) {
            $keyword = '%' . $keyword . '%';
            $replies = $replies->where('reply_subject', 'like', $keyword)
                ->orWhere('reply_email', 'like', $keyword)
                ->orWhere('reply_message', 'like', $keyword)
            ;
        }

        $replies = $replies->paginate($perPage);
        //Show All UserContacts
        return view('admin.pages.user_contacts.replies', compact('replies'));
    }

    public function contactReplies($userContact)
    {
        $userContact = UserContact::findOrFail($userContact);
        $replies = $userContact->replies()->paginate(10);
        return view("admin.pages.user_contacts.replies", compact('replies', 'userContact'));
    }


    public function create()
    {
        return abort(404);
    }


    public function store(Request $request)
    {
        $request->validate([
            'reply_subject' => 'required',
            'reply_message' => 'required',
        ]);

        //Start => send mail to all customers section
        if ($request->mail_to === 'all') {
            $this->sendMailToAllMessages($request);
            return redirect()->back()->with('success', 'Reply Successfully Sent');
        }


        //End => send mail to all customers section

        //Start => send mail to selected customers section
        if ($request->mail_to === 'selected_messages') {
            $this->sendMailToSelectedMessages($request);
            return redirect()->back()->with('success', 'Reply Successfully Sent');
        }
        //End => send mail to selected customers section

        $request->validate([
            'user_contact_id' => 'required|integer',
            'reply_email' => 'required|email',
            'reply_subject' => 'required',
            'reply_message' => 'required',
        ]);


        $reply_details = $request->only(['user_contact_id', 'reply_email', 'reply_subject', 'reply_message', 'name']);

        Mail::to($reply_details['reply_email'])->send(new \App\Mail\UserContactReplyMail($reply_details));
        UserContactReply::create($reply_details);

        return redirect()->back()->with('success', 'Reply Successfully Sent');
    }


    public function show($id)
    {
        return abort(404);
    }


    public function edit($id)
    {
        return abort(404);
    }


    public function update(Request $request, $id)
    {
        return abort(404);
    }


    public function destroy(UserContactReply $userContactReply)
    {
        $userContactReply->delete();
        return redirect()->back()->with('success', 'Reply Successfully Deleted');
    }

    protected function sendMailToAllMessages(Request $request)
    {
        $all_messages = UserContact::all();
        foreach ($all_messages as $message) {
            $details = [
                'user_contact_id' => $message->id,
                'reply_email' => $message->email,
                'reply_subject' => $request->reply_subject,
                'reply_message' => $request->reply_message,
                'name' => $message->name
            ];
            Mail::to($details['reply_email'])->send(new \App\Mail\UserContactReplyMail($details));
            UserContactReply::create($details);
        }
    }

    protected function sendMailToSelectedMessages(Request $request)
    {
        $messages = explode(',', $request->messages[0]);
        $messages = UserContact::whereIn('id', $messages)->get();
        foreach ($messages as $message) {
            $details = [
                'user_contact_id' => $message->id,
                'reply_email' => $message->email,
                'reply_subject' => $request->reply_subject,
                'reply_message' => $request->reply_message,
                'name' => $message->name
            ];
            Mail::to($details['reply_email'])->send(new \App\Mail\UserContactReplyMail($details));
            UserContactReply::create($details);
        }
    }
}
