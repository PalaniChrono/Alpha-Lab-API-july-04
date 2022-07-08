<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blogs;
use App\Models\BlogDetails;
use App\Repositories\ResponseRepository;
use Illuminate\Support\Facades\Log;

class BlogController extends Controller
{
    public function __construct(ResponseRepository $response)
    {
        $this->response = $response;
        $this->storeRulesBlogDetails = [
            'equipments_header'=> 'required',
          //  'equipments_content' => 'required',
            'equipments_details' => 'required',
        ];
    }
    public function getTestDetails(){
        $data = Blogs::all();
        return $this->response->jsonResponse(false,"Equipments Fetched Successfully", $data, 200);
     }

     public function getAllEquipmentsDetails(){
        $data = BlogDetails::where('active_status', 1)->get();
        return $this->response->jsonResponse(false,"Equipments Details Fetched Successfully", $data, 200);
     }

     public function getAllEquipment(){
        $data = BlogDetails::all();
        return $this->response->jsonResponse(false,"Equipments Details Fetched Successfully", $data, 200);
     }

     public function updateBlog(Request $request)
     {
         $validate = $this->response->validate($request->all(), $this->storeRules);
         if($validate === true) {
           $blog = Blogs::first()->update($request->all());
             return $this->response->jsonResponse(false, $this->response->message('Blog', 'update'),'' , 200);
         } else {
             return $this->response->jsonResponse(true, 'Equipments Update Failed', $validate , 201);
         }
     }
     public function activateEquipments($id)
     {
       // BlogDetails::query()->update(['active_status' => 0]);

         $getSize = BlogDetails::where('id', $id);
         if ($getSize->exists()) {
             return $this->response->jsonResponse(false, 'Equipments Activated Successfully', $getSize->update(['active_status' => 1]), 200);
         } else {
             return $this->response->jsonResponse(false, 'Equipments  Not Available', [], 201);
         }
     }
     public function deactivateEquipments($id)
     {
        $getSize = BlogDetails::where('id', $id);
        if ($getSize->exists()) {
             return $this->response->jsonResponse(false, 'Equipments De-Activated Successfully', $getSize->update(['active_status' => 0]), 200);
         } else {
             return $this->response->jsonResponse(false, 'Equipments Not Available', [], 201);
         }
     }

       
    public function getEquipmentsDetailsById($id){
        $data = BlogDetails::where('id', $id)->get();
        return $this->response->jsonResponse(false,"Equipments Details Fetched Successfully", $data, 200);
    }
    public function getSpotLightDetails(){
        $data = BlogDetails::where('spotlight_status', 1)->get();
        return $this->response->jsonResponse(false,"Equipments Details Fetched Successfully", $data, 200);
    }

     public function deleteEquipmentsDetailsById($id)
     {
         $teams = BlogDetails::where('id', $id);
         if($teams->exists()) {
   
             return $this->response->jsonResponse(false, $this->response->message('Blog', 'destroy'), $teams->delete(), 200);
         }
         return $this->response->jsonResponse(true, 'Equipments Not Exists',[], 201);
     }

     public function storeNewEquipmentsDetails(Request $request)
     {
         $validate = $this->response->validate($request->all(), $this->storeRulesBlogDetails);
         if($validate === true) {
             return $this->response->jsonResponse(false, $this->response->message('Equipments details', 'store'), BlogDetails::create($request->all()), 200);
         } else {
             return $this->response->jsonResponse(true, 'Equipments details failed', $validate, 201);
         }
     }
     public function updateEquipmentsDetails(Request $request)
     {
         $validate = $this->response->validate($request->all(), $this->storeRulesBlogDetails);
           if($validate === true) {
             $testimony = BlogDetails::where('id',$request->id);
             $testimony->update($request->all());
                return $this->response->jsonResponse(false, $this->response->message('Equipments details', 'update'), '', 200);
           } else {
               return $this->response->jsonResponse(true, 'Equipments details Update Failed', $validate, 202);
           }
     }
 
}
