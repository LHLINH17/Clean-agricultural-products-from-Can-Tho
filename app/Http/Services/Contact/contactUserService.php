<?php

namespace App\Http\Services\Contact;

use App\Models\Contact;

class contactUserService
{
    public function create()
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $data=request()->all(['name', 'email', 'subject', 'message']);
//        $data = Contact::create([
//            'name' => (string) $req -> input('name'),
//            'email' => (string) $req -> input('email'),
//            'subject' => (string) $req -> input('subject'),
//            'message' => (string) $req -> input('message'),
//        ]);
//        dd($data);
        $check = Contact::create($data);
        if($check){
            return redirect()->back()->with('success','Contact information has been sent successfully');
        }
        return redirect()->back()->with('error','Cannot contact, please try again latter');
    }
}
