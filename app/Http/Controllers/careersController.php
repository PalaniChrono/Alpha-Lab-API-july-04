<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use App\Models\careers;
use App\Repositories\ResponseRepository;


class careersController extends Controller
{
    public function __construct(ResponseRepository $response)
    {
        $this->response = $response;
        $this->storeRules = [
            'name' => 'required',
            'mobile' => 'required',

        ];
    }

    public function storecareers(Request $request){
        Log::info("this is :".$request);
        $validate = $this->response->validate($request->all(), $this->storeRules);
        if($validate === true) {
            return $this->response->jsonResponse(false, "  Created Successfully", careers::create($request->all()), 200);
        } else {
            return $validate;
        }
    }

    public function getcareers(){

        return $this->response->jsonResponse(false," Content Fetched Successfully",careers::all(), 200);

      }
    //
}
