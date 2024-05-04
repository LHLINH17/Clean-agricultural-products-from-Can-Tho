<?php

namespace App\Http\Services\Contact;

use App\Models\Contact;


class ContactService
{
    public function getContactAdmin()
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        return Contact::select('id', 'name', 'email', 'subject', 'message', 'created_at')
            ->orderbyDesc('id')
            ->paginate(10);
    }

    public function destroy($id)
    {
        $id = request()->id;
        $contact = Contact::where('id', $id)->first();
        if($contact){
            return Contact::where('id', $id)->delete();
        }
        return false;
    }
}
