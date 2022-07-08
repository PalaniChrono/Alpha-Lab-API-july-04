<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Organization;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;
use App\Repositories\ResponseRepository;

class OrganizationController extends Controller
{
    public function __construct(ResponseRepository $response)
    {
        $this->response = $response;
        $this->storeRules = [
            'header' => 'required',
        ];
    
      
    }
    public function findBanner($id) {
        return Organization::find($id);
    }

    public function index()
    {

        $data = Organization::where('active_status', 1)->get();
        return $this->response->jsonResponse(false,"Organization Details Fetched Successfully", $data, 200);
        
    }

    public function getAllOrganization(){
        return $this->response->jsonResponse(false, $this->response->message('Organization', 'index'), Organization::get(), 200);

    }

    public function store(Request $request)
    {
        $validate = $this->response->validate($request->all(), $this->storeRules);
        if($validate === true) {
            return $this->response->jsonResponse(false, $this->response->message('Organization', 'store'), Organization::create($request->all()), 200);
        } else {
            return $validate;
        }
    }

    public function show($id)
    {
        return $this->response->jsonResponse(false, $this->response->message('Organization', 'show'), $this->findBanner($id), 200);
    }

    public function update(Request $request, $id)
    {
        $validate = $this->response->validate($request->all(), [
            'header' => [
                'required'
            ],
        ]);
        if($validate === true) {
            return $this->response->jsonResponse(false, $this->response->message('Organization', 'update'), $this->findBanner($id)->update($request->all()), 200);
        } else {
            return $validate;
        }
    }

    public function destroy($id)
    {
        $size = $this->findBanner($id);
        if($size) {
            return $this->response->jsonResponse(false, $this->response->message('Organization', 'destroy'), $size->delete(), 200);
        }
        return $this->response->jsonResponse(true, 'Organization Not Exists',[], 201);
    }

    public function OrganizationSwitch($id) {
        $size = $this->findBanner($id);
        if($size) {
            $value = $size->active_status === 1 ? 0 : 1;
            $msg = $value === 0 ? 'Deactivated': 'Activated';
            return $this->response->jsonResponse(false, 'Organization '.$msg.' SuccessFully', $size->update(['active_status' => $value]), 200);
        }
        return $this->response->jsonResponse(true, 'Organization Not Exists',[], 201);
    }

    

    //image update for category
    public function imageUpdateOrganization(Request $request)
    {
        $getBanner = $this->findBanner($request['banner_id']);
        if($request->hasFile('banner_image')) {
            $file = $request->file('banner_image');
            $name = $this->response->generateSlug($getBanner['header']);
            $uploadUrl = $this->response->cloudinaryImage($request->file('banner_image'), 'Organization', $name);
            return $this->response->jsonResponse(false, $this->response->message('Organization', 'image'), $getBanner->update(['logo' => $uploadUrl]), 201);
        } else {
            return $this->response->jsonResponse(true, 'Image Banner is too high', [], 201);
        }
    }
}