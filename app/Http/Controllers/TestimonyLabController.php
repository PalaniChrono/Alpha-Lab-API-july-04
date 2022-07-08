<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\TestimonyLab;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;
use App\Repositories\ResponseRepository;


class TestimonyLabController extends Controller
{
    public function __construct(ResponseRepository $response)
    {
        $this->response = $response;
        $this->storeRules = [
            'testimony_header' => 'required',
            'testimony_description' => 'required',
        ];
    
      
    }
    public function findBanner($id) {
        return TestimonyLab::find($id);
    }

    public function index()
    {

        $data = TestimonyLab::where('active_status', 1)->get();
        return $this->response->jsonResponse(false,"TestimonyLab Details Fetched Successfully", $data, 200);
        
    }

    public function getAllTestimonyLab(){
        return $this->response->jsonResponse(false, $this->response->message('TestimonyLab', 'index'), TestimonyLab::get(), 200);

    }

    public function store(Request $request)
    {
        $validate = $this->response->validate($request->all(), $this->storeRules);
        if($validate === true) {
            return $this->response->jsonResponse(false, $this->response->message('TestimonyLab', 'store'), TestimonyLab::create($request->all()), 200);
        } else {
            return $validate;
        }
    }

    public function show($id)
    {
        return $this->response->jsonResponse(false, $this->response->message('TestimonyLab', 'show'), $this->findBanner($id), 200);
    }

    public function update(Request $request, $id)
    {
        $validate = $this->response->validate($request->all(), [
            'testimony_header' => ['required'],
            'testimony_description' => ['required'],
        ]);
        if($validate === true) {
            return $this->response->jsonResponse(false, $this->response->message('TestimonyLab', 'update'), $this->findBanner($id)->update($request->all()), 200);
        } else {
            return $validate;
        }
    }

    public function destroy($id)
    {
        $size = $this->findBanner($id);
        if($size) {
            return $this->response->jsonResponse(false, $this->response->message('TestimonyLab', 'destroy'), $size->delete(), 200);
        }
        return $this->response->jsonResponse(true, 'TestimonyLab Not Exists',[], 201);
    }

    public function TestimonyLabSwitch($id) {
        $size = $this->findBanner($id);
        if($size) {
            $value = $size->active_status === 1 ? 0 : 1;
            $msg = $value === 0 ? 'Deactivated': 'Activated';
            return $this->response->jsonResponse(false, 'TestimonyLab '.$msg.' SuccessFully', $size->update(['active_status' => $value]), 200);
        }
        return $this->response->jsonResponse(true, 'TestimonyLab Not Exists',[], 201);
    }

    

    //image update for category
    public function imageUpdateTestimonyLab(Request $request)
    {
        $getBanner = $this->findBanner($request['banner_id']);
        if($request->hasFile('banner_image')) {
            $file = $request->file('banner_image');
            $name = $this->response->generateSlug($getBanner['header']);
            $uploadUrl = $this->response->cloudinaryImage($request->file('banner_image'), 'TestimonyLab', $name);
            return $this->response->jsonResponse(false, $this->response->message('TestimonyLab', 'image'), $getBanner->update(['testimony_image' => $uploadUrl]), 201);
        } else {
            return $this->response->jsonResponse(true, 'Image Banner is too high', [], 201);
        }
    }
}
