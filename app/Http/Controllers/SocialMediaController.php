<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\SocialMedia;
use App\Repositories\ResponseRepository;
use Illuminate\Support\Facades\Log;


class SocialMediaController extends Controller
{
    public function __construct(ResponseRepository $response)
    {
        $this->response = $response;
        $this->storeRules = [
          'email_link' => 'required',
          'instagram_link'=> 'required',
          'facebook_link'=> 'required',
          
        ];
       
  
    }

    public function getSocialMedia(){
        $data = SocialMedia::all();
        return $this->response->jsonResponse(false,"SocialMedia Content Fetched Successfully", $data, 200);
 
     }
     public function updateSocialMedia(Request $request)
    {
        $validate = $this->response->validate($request->all(), $this->storeRules);
     
      if($validate === true) {
        $Products = SocialMedia::first()->update($request->all());
          return $this->response->jsonResponse(false, $this->response->message('SocialMedia', 'update'),'' , 200);
      } else {
          return $this->response->jsonResponse(true, 'SocialMedia Update Failed', $validate , 201);
      }
   }
}