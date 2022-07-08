<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\ResponseRepository;
use App\Models\Faq;

class FaqController extends Controller
{
    public function __construct(ResponseRepository $response)
    {
        $this->response = $response;
        $this->storeRulesFaq= [
            'type' => 'required',
            'header'  => 'required',
            'content' => 'required',


        ];

    }
    
    public function getFaq(){
        $data = Faq::all();
        return $this->response->jsonResponse(false,"FAQ Fetched Successfully", $data, 200);
     }

    public function getFaqByType($type){
        $data = Faq::where('type', $type)->get();
        return $this->response->jsonResponse(false,"FAQ Fetched Successfully", $data, 200);
     }

    public function updateFaq(Request $request)
    {
        if($request->type == 'individuals'){
            $validate = $this->response->validate($request->all(), $this->storeRulesFaq);
        }else if($request->type == 'institution'){
            $validate = $this->response->validate($request->all(), $this->storeRulesFaq);
        }else if($request->type == 'organisation'){
            $validate = $this->response->validate($request->all(), $this->storeRulesFaq);
        }else{
            $validate = $this->response->validate($request->all(), $this->storeRulesFaq);
        }
        if($validate === true) {
          $home = Faq::where('id',$request->id)->update($request->all());
            return $this->response->jsonResponse(false, $this->response->message('Faq', 'update'),'' , 200);
        } else {
            return $this->response->jsonResponse(true, 'Faq Update Failed', $validate , 201);
        }
    }
    public function storeFaq(Request $request)
    {
        $validate = $this->response->validate($request->all(), $this->storeRulesFaq);
        if($validate === true) {
            return $this->response->jsonResponse(false, $this->response->message('Faq', 'store'), Faq::create($request->all()), 200);
        } else {
            return $this->response->jsonResponse(true, 'Faq store failed', $validate, 201);
        }
    }
    public function deleteFAQzById($id)
    {
        $testimony = Faq::where('id', $id);
        if($testimony->exists()) {

            return $this->response->jsonResponse(false, $this->response->message('Faq', 'destroy'), $testimony->delete(), 200);
        }
        return $this->response->jsonResponse(true, 'Faq Not Exists',[], 201);
    }



}
