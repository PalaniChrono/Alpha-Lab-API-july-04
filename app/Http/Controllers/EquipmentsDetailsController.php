<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EquipmentsDetails;
use App\Models\BlogDetails;
use App\Repositories\ResponseRepository;
use Illuminate\Support\Facades\Log;

class EquipmentsDetailsController extends Controller
{
    public function __construct(ResponseRepository $response)
    {
        $this->response = $response;
        $this->storeRulesEquipments = [
            'equipments_header'=> 'required',
            //'equipments_content' => 'required',
            'equipments_details' => 'required',
        ];
    }


     public function getAllEquipmentsDetails(){
        $data = EquipmentsDetails::all();
        return $this->response->jsonResponse(false,"Equipments Details Fetched Successfully", $data, 200);
     }


     public function activateSpotLight($id)
     {
        EquipmentsDetails::query()->update(['active_status' => 0]);

         $getSize = EquipmentsDetails::where('id', $id);
         if ($getSize->exists()) {
             return $this->response->jsonResponse(false, 'Equipments Activated Successfully', $getSize->update(['active_status' => 1]), 200);
         } else {
             return $this->response->jsonResponse(false, 'Equipments  Not Available', [], 201);
         }
     }
     public function deActivateSpotLight($id)
     {
        $getSize = EquipmentsDetails::where('id', $id);
        if ($getSize->exists()) {
             return $this->response->jsonResponse(false, 'Equipments De-Activated Successfully', $getSize->update(['active_status' => 0]), 200);
         } else {
             return $this->response->jsonResponse(false, 'Equipments Not Available', [], 201);
         }
     }

       
    public function getBlogDetailsById($id){
        $data = EquipmentsDetails::where('id', $id)->get();
        return $this->response->jsonResponse(false,"Equipments Fetched Successfully", $data, 200);
    }
    public function getSpotLightDetails(){
        $data = EquipmentsDetails::where('spotlight_status', 1)->get();
        return $this->response->jsonResponse(false,"Equipments Details Fetched Successfully", $data, 200);
    }

     public function deleteBlogDetailsById($id)
     {
         $teams = EquipmentsDetails::where('id', $id);
         if($teams->exists()) {
   
             return $this->response->jsonResponse(false, $this->response->message('Equipments', 'destroy'), $teams->delete(), 200);
         }
         return $this->response->jsonResponse(true, 'Equipments Not Exists',[], 201);
     }

     public function storeNewBlogDetails(Request $request)
     {
         $validate = $this->response->validate($request->all(), $this->storeRulesEquipments);
         if($validate === true) {
             return $this->response->jsonResponse(false, $this->response->message('Equipments details', 'store'), EquipmentsDetails::create($request->all()), 200);
         } else {
             return $this->response->jsonResponse(true, 'Equipments details failed', $validate, 201);
         }
     }
     public function updateBlogDetails(Request $request)
     {
         $validate = $this->response->validate($request->all(), $this->storeRulesEquipments);
           if($validate === true) {
             $testimony = EquipmentsDetails::where('id',$request->id);
             $testimony->update($request->all());
                return $this->response->jsonResponse(false, $this->response->message('Equipments details', 'update'), '', 200);
           } else {
               return $this->response->jsonResponse(true, 'Equipments details Update Failed', $validate, 202);
           }
     }
 
}

