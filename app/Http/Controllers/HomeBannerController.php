<?php

namespace App\Http\Controllers;

use App\Models\HomeBanner;
use App\Repositories\ResponseRepository;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;


class HomeBannerController extends Controller
{
    public function __construct(ResponseRepository $response)
    {
        $this->response = $response;
        $this->storeRules = [
            'banner_name' => 'required',
        ];
    }
    public function findBanner($id) {
        return HomeBanner::find($id);
    }

    public function index()
    {

        $data = HomeBanner::where('active_status', 1)->get();
        return $this->response->jsonResponse(false,"Homebanner Details Fetched Successfully", $data, 200);
        
    }

    public function getAllHomeBanner(){
        return $this->response->jsonResponse(false, $this->response->message('HomeBanner', 'index'), HomeBanner::get(), 200);

    }

    public function store(Request $request)
    {
        $validate = $this->response->validate($request->all(), $this->storeRules);
        if($validate === true) {
            return $this->response->jsonResponse(false, $this->response->message('HomeBanner', 'store'), HomeBanner::create($request->all()), 200);
        } else {
            return $validate;
        }
    }

    public function show($id)
    {
        return $this->response->jsonResponse(false, $this->response->message('HomeBanner', 'show'), $this->findBanner($id), 200);
    }

    public function update(Request $request, $id)
    {
        $validate = $this->response->validate($request->all(), [
            'banner_name' => [
                'required'
            ],
        ]);
        if($validate === true) {
            return $this->response->jsonResponse(false, $this->response->message('HomeBanner', 'update'), $this->findBanner($id)->update($request->all()), 200);
        } else {
            return $validate;
        }
    }

    public function destroy($id)
    {
        $size = $this->findBanner($id);
        if($size) {
            return $this->response->jsonResponse(false, $this->response->message('HomeBanner', 'destroy'), $size->delete(), 200);
        }
        return $this->response->jsonResponse(true, 'HomeBanner Not Exists',[], 201);
    }

    public function HomeBannerSwitch($id) {
        $size = $this->findBanner($id);
        if($size) {
            $value = $size->active_status === 1 ? 0 : 1;
            $msg = $value === 0 ? 'Deactivated': 'Activated';
            return $this->response->jsonResponse(false, 'HomeBanner '.$msg.' SuccessFully', $size->update(['active_status' => $value]), 200);
        }
        return $this->response->jsonResponse(true, 'HomeBanner Not Exists',[], 201);
    }

    

    //image update for category
    public function imageUpdateHomeBanner(Request $request)
    {
        $getBanner = $this->findBanner($request['banner_id']);
        if($request->hasFile('banner_image')) {
            $file = $request->file('banner_image');
            $name = $this->response->generateSlug($getBanner['banner_name']);
            $uploadUrl = $this->response->cloudinaryImage($request->file('banner_image'), 'HomeBanner', $name);
            return $this->response->jsonResponse(false, $this->response->message('HomeBanner', 'image'), $getBanner->update(['banner_image' => $uploadUrl]), 201);
        } else {
            return $this->response->jsonResponse(true, 'Image Banner is too high', [], 201);
        }
    }
}

