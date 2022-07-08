<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\ContactUs;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;
use App\Repositories\ResponseRepository;

class ContactUsController extends Controller
{
    public function __construct(ResponseRepository $response)
    {
        $this->response = $response;
        $this->storeRules = [
            'name' => 'required',
            'e_mail' => 'required',
            'phone_no' => 'required',
            'message' => 'required',

        ];
    
      
    }
    public function findBanner($id) {
        return ContactUs::find($id);
    }

    public function index()
    {
        return $this->response->jsonResponse(false, $this->response->message('ContactUs', 'index'), ContactUs::get(), 200);
        
    }
    public function show($id)
    {
        return $this->response->jsonResponse(false, $this->response->message('ContactUs', 'show'), $this->findBanner($id), 200);
    }

    public function store(Request $request)
    {
        $validate = $this->response->validate($request->all(), $this->storeRules);
        if($validate === true) {
            return $this->response->jsonResponse(false, $this->response->message('ContactUs', 'store'), ContactUs::create($request->all()), 200);
        } else {
            return $validate;
        }
    }

}
