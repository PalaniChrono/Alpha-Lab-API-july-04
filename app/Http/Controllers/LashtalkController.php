<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lashtalk;
use App\Repositories\ResponseRepository;
use Illuminate\Support\Facades\Log;

class LashtalkController extends Controller
{
    public function __construct(ResponseRepository $response)
    {
        $this->response = $response;
    }
    public function getLashtalkSection(){
   
      return $this->response->jsonResponse(false,"Lashtalk Content Fetched Successfully",Lashtalk::all(), 200);

    }


   




  public function updateLashtalkSectionOne(Request $request){
  
   //Log::info($request);
  

   $LashtalkSectionOne = Lashtalk::firstOrNew();

   
    return $this->response->jsonResponse(false,'update lashtalk section Successfully',  $LashtalkSectionOne->update([
      

        $LashtalkSectionOne->PFour_SecOne_TxtOne = is_null($request->PFour_SecOne_TxtOne) ?  $LashtalkSectionOne->PFour_SecOne_TxtOne : $request->PFour_SecOne_TxtOne,
  
      $LashtalkSectionOne->PFour_SecOne_TxtTwo = is_null($request->PFour_SecOne_TxtTwo) ?  $LashtalkSectionOne->PFour_SecOne_TxtTwo : $request->PFour_SecOne_TxtTwo,
      $LashtalkSectionOne->PFour_SecTwo_TxtOne = is_null($request->PFour_SecTwo_TxtOne) ?  $LashtalkSectionOne->PFour_SecTwo_TxtOne : $request->PFour_SecTwo_TxtOne,
      
      $LashtalkSectionOne->PFour_SecTwo_TxtTwo = is_null($request->PFour_SecTwo_TxtTwo) ?  $LashtalkSectionOne->PFour_SecTwo_TxtTwo : $request->PFour_SecTwo_TxtTwo,
     
      $LashtalkSectionOne->PFour_SecThree_TxtOne = is_null($request->PFour_SecThree_TxtOne) ?  $LashtalkSectionOne->PFour_SecThree_TxtOne : $request->PFour_SecThree_TxtOne,
    
      $LashtalkSectionOne->PFour_SecThree_TxtTwo = is_null($request->PFour_SecThree_TxtTwo) ?  $LashtalkSectionOne->PFour_SecThree_TxtTwo : $request->PFour_SecThree_TxtTwo
     
     
         ]), 201);
    
    

   
}
}
