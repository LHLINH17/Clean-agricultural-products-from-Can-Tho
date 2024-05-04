<?php

namespace App\Http\Controllers;

use App\Http\Services\Contact\contactUserService;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactUserController extends Controller
{
    protected $contactUserService;
    public function __construct(contactUserService $contact)
    {
        $this->contactUserService = $contact;
    }
    public function index()
    {
        return view('contact',[
            'title' => 'Contact Pages'
        ]);
    }

    public function sendContact()
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $data=request()->all(['name', 'email', 'subject', 'message']);
        $check = Contact::create($data);
        if($check){
            return redirect()->back()->with('success','Contact information has been sent successfully');
        }
        return redirect()->back()->with('error','Cannot contact, please try again latter');
//        $this->contactUserService->create();
//        return view('contact',[
//            'title' => 'Contact Pages'
//        ]);
    }
}
