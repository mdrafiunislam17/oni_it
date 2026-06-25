<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Setting;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    //
    public function index(){
        $settings = Setting::query()->pluck("value", "setting_name")->toArray();

        $contacts = Contact::query()
            ->orderBy('id', 'desc')
            ->get();

        return view('admin.contact.index', compact('settings', 'contacts'));
    }

    public function show(Contact $contact)
    {
        $settings = Setting::query()->pluck("value", "setting_name")->toArray();

        return view('admin.contact.show', compact('contact', 'settings'));

    }


    public function contactSubmit(Request $request){

//        dd($request->all());

        $request->validate([
            'name' => 'required|string|max:255'
        ]);
        try {
            $contact = new Contact();
            $contact->name = $request->name;
            $contact->phone = $request->phone;
            $contact->email = $request->email;
            $contact->message = $request->message;
            $contact->save();

            return redirect()->back()->with('success', 'আপনার বার্তা সফলভাবে পাঠানো হয়েছে।');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred while sending your message. Please try again later.');
        }

    }
}
