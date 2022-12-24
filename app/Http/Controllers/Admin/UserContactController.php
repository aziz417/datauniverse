<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Subscribe;
use App\Models\UserContact;
use Illuminate\Http\Request;

class UserContactController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:contact message show|contact message delete|contact message reply|contact message reply show|contact message reply delete', ['only' => ['index']]);
        $this->middleware('permission:contact message show')->only(['show']);
        $this->middleware('permission:contact message delete')->only(['destroy']);
    }

    public function index(Request $request){
        $perPage = $request->perPage ?: 10;
        $keyword = $request->keyword;

        //get all UserContacts
        $userContacts = UserContact::latest();

        if ($keyword) {
            $keyword = '%' . $keyword . '%';
            $userContacts = $userContacts->where('email', 'like', $keyword)
                ->orWhere('name', 'like', $keyword)
                ->orWhere('message', 'like', $keyword)
                ->orWhere('subject', 'like', $keyword)
            ;
        }

        $userContacts = $userContacts->paginate($perPage);
        //Show All UserContacts
        return view('admin.pages.user_contacts.index', compact('userContacts'));
    }

    // UserContact show admin panel
    public function show(UserContact $userContact){
        return view('admin.pages.user_contacts.contact_details', compact('userContact'));
    }

    public function destroy(UserContact $userContact)
    {
        $userContact->delete();
        return redirect()->back()->with('success', 'User contact successfully deleted');
    }
}
