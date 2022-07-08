<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Repositories\ResponseRepository;
use Illuminate\Support\Facades\Log;


class ContactController extends Controller
{
    public function __construct(ResponseRepository $response)
    {
        $this->response = $response;
    }
    public function getContactSection(){
   
      return $this->response->jsonResponse(false,"Contact Content Fetched Successfully",Contact::all(), 200);

    }


   




  public function updateContactSectionOne(Request $request){
  
   //Log::info($request);
  

   $ContactSectionOne = Contact::firstOrNew();

   
    return $this->response->jsonResponse(false,'update Contact section Successfully',   $ContactSectionOne->update([
      

        $ContactSectionOne->address_one= is_null($request->address_one) ?   $ContactSectionOne->address_one : $request->address_one,
  
        $ContactSectionOne->address_two = is_null($request->address_two) ?   $ContactSectionOne->address_two : $request->address_two,
        // $ContactSectionOne->address_two = is_null($request->address_two) ?   $ContactSectionOne->address_two : $request->address_two,
        $ContactSectionOne->email = is_null($request->email) ?   $ContactSectionOne->email : $request->email,
        $ContactSectionOne->contact_one = is_null($request->contact_one) ?   $ContactSectionOne->contact_one : $request->contact_one,
        $ContactSectionOne->contact_two = is_null($request->contact_two) ?   $ContactSectionOne->contact_two : $request->contact_two,
        $ContactSectionOne->whatsapp = is_null($request->whatsapp) ?   $ContactSectionOne->whatsapp : $request->whatsapp,
        $ContactSectionOne->facebook = is_null($request->facebook) ?   $ContactSectionOne->facebook : $request->facebook,
        $ContactSectionOne->snapchat = is_null($request->snapchat) ?   $ContactSectionOne->snapchat : $request->snapchat,
        $ContactSectionOne->instagram = is_null($request->instagram) ?   $ContactSectionOne->instagram : $request->instagram
       
     
      
         ]), 201);
    
    

   
}
}
