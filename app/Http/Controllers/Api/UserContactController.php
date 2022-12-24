<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserContactRequest;
use App\Models\Contact;
use App\Models\Social;
use App\Models\Subscribe;
use App\Models\UserContact;
use App\Notifications\ContactToAdmin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Notification;

class UserContactController extends Controller
{
    public function subscribe(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:subscribes,email',
        ]);

        Subscribe::create([
            'email' => $request->email,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Thank you so much for subscribing to our site.'
        ], 201);
    }


    public function address()
    {
        $data = [
            'address' => $globalContactInfo = Contact::first(['id', 'address', 'phone_1', 'phone_2', 'telephone', 'email']),
            'socials' => $globalSocialInfo = Social::status()->get(['id', 'name', 'slug', 'icon', 'color_code', 'link'])
        ];
        return response()->json(['data' => $data], 200);
    }

    /**
     * @throws \Throwable
     */
    public function store(UserContactRequest $request)
    {
        $contact_details = $request->only(['name', 'email', 'subject', 'message']);

        UserContact::create($contact_details);
        Notification::route('mail', config('mail.from.address'))
            ->notify(new ContactToAdmin($contact_details));

        DB::commit();

        return response()->json([
            'success' => true,
            'message' => 'Message Successfully Send'
        ], 201);
    }

}
