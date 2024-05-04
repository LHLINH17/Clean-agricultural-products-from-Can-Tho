<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\Contact\ContactService;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    protected $contactService;

    public function __construct(ContactService $contactService)
    {
        $this->contactService = $contactService;
    }

    public function index()
    {
        $contact = $this->contactService->getContactAdmin();
        return view('admin.contact.list',[
            'title' => 'Contact List',
            'contacts' => $contact
        ]);
    }

    public function destroy($id)
    {
        $result = $this->contactService->destroy($id);
        if($result){
            return response()->json([
                'error' => false,
                'message'=>'Contact info deleted successfully'
            ]);
        }
        return response()->json([
            'error' => true
        ]);
    }
}
