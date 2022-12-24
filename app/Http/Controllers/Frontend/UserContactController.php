<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserContactRequest;
use App\Models\Subscribe;
use App\Models\UserContact;
use App\Models\UserQuestion;
use App\Notifications\ContactToAdmin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Notification;

class UserContactController extends Controller
{
    public function store(UserContactRequest $request)
    {
        $contact_details = $request->only(['name', 'email', 'subject', 'message']);

        DB::beginTransaction();

        try {
            UserContact::create($contact_details);
            Notification::route('mail', config('mail.from.address'))
                ->notify(new ContactToAdmin($contact_details));

            DB::commit();

            return redirect()->back()->with('success', 'Message Successfully Send');

        } catch (\Exception $exception) {
            report($exception);
            DB::rollBack();

            return redirect()->back()->with('error', $exception->getMessage());
        }
    }

    public function subscribe(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:subscribes,email',
        ]);

        $subscribe = Subscribe::create([
            'email' => $request->email,
        ]);

        return redirect()->route('home', '#newsletter')->with('success', 'Thank you so much for subscribing to our site.');
    }

    public function questionStore(Request $request){
        $request->validate([
            'name' => "required|string|max:50",
            'email' => "required|email",
            'subject' => "required|string",
            'message' => "required|string",
        ]);
        $question_details = $request->only(['name', 'email', 'subject', 'message']);

        DB::beginTransaction();

        try {
            UserQuestion::create($question_details);
            Notification::route('mail', config('mail.from.address'))
                ->notify(new \App\Notifications\UserQuestion($question_details));

            DB::commit();

            return redirect()->back()->with('success', 'Question Successfully Send');

        } catch (\Exception $exception) {
            report($exception);
            DB::rollBack();

            return redirect()->back()->with('error', $exception->getMessage());
        }
    }
}
