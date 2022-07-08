<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Test;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;
use App\Repositories\ResponseRepository;

class TestController extends Controller
{
    public function __construct(ResponseRepository $response)
    {
        $this->response = $response;
        $this->storeRules = [
          'test_name'=> 'required',
          'test_details' => 'required',
          'test_points' => 'required',
      ];
    }
    public function getTestDetails(){
        $data = Test::all();
        return $this->response->jsonResponse(false,"Test Fetched Successfully", $data, 200);
     }

     public function updateTest(Request $request)
     {
         $validate = $this->response->validate($request->all(), $this->storeRules);
         if($validate === true) {
           $blog = Test::first()->update($request->all());
             return $this->response->jsonResponse(false, $this->response->message('Test', 'update'),'' , 200);
         } else {
             return $this->response->jsonResponse(true, 'Test Update Failed', $validate , 201);
         }
     }
    
    
  
 
}
