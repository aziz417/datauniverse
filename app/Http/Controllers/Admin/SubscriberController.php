<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Subscribe;
use Illuminate\Http\Request;

class SubscriberController extends Controller
{
    public function subscribers(Request $request){
        $perPage = $request->perPage ?: 10;
        $keyword = $request->keyword;

        //get all UserContacts
        $subscribers = Subscribe::latest();

        if ($keyword) {
            $keyword = '%' . $keyword . '%';
            $subscribers = $subscribers->where('email', 'like', $keyword);
        }

        $subscribers = $subscribers->paginate($perPage);
        return view('admin.pages.subscribers.index', compact('subscribers'));
    }

    public function subscriberDestroy($subscriber){
        $subscriber = Subscribe::findOrFail($subscriber);
        $subscriber->delete();
        return redirect()->back()->with('success', 'Subscriber Successfully Deleted');
    }
}
