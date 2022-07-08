<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use App\Models\Testimony;
use App\Repositories\ResponseRepository;

class TestimonyController extends Controller
{

   public function __construct(ResponseRepository $response)
    {
        $this->response = $response;
        $this->storeRules = [
            'bride_groomname' => 'required',
            'phone' => 'required',
            'city' => 'required',
            'event' => 'required',
            'eventdate' => 'required',
            'location' => 'required',

        ];
    }

    public function storeTestimony(Request $request){
        $validate = $this->response->validate($request->all(), $this->storeRules);
        if($validate === true) {
            return $this->response->jsonResponse(false, "Testimony Created Successfully", Testimony::create($request->all()), 200);
        } else {
            return $validate;
        }
    }

    public function getTestimony(){

        return $this->response->jsonResponse(false,"Testimony Content Fetched Successfully",Testimony::orderBy('eventdate', 'desc')->get(), 200);

      }

      public function getTestimonyById($id){
        return $this->response->jsonResponse(false,"Testimony Content Fetched Successfully",Testimony::where('id', $id)->first(), 200);


      }

public function updateTestimony(Request $request){


    $testimony = Testimony::where('id',$request->id);
    $testimony->update(['content'=> $request->content,
                        'review_star_count'=> $request->review_star_count,
                        'user_name'=> $request->user_name,
                        'user_role'=> $request->user_role]);
    return $this->response->jsonResponse(false,'updated Successfully', [], 201);
}
public function imageUpload(Request $request)
{
    $testimony = Testimony::where('id',$request->id);

    if($request->hasFile('image')) {

                $uploadUrl = $this->response->cloudinaryImage($request->file('image'), 'testimony','testimony_user_imge_'.$request->id);
                Log::info("uploadUrl".$uploadUrl);
                $uploadUrl = $this->getCroppedImage(100, 100, $uploadUrl);
                Log::info("uploadUrl".$uploadUrl);
                $testimony->update(['user_image' => $uploadUrl]);
                return $this->response->jsonResponse(false, 'Image uploaded successfully', [], 201);


   } else {
        return $this->response->jsonResponse(true, 'Image Size is too high', [], 202);
    }
}

public function getCroppedImage($width, $height, $url)
{
    return str_replace("/upload", "/upload/w_".$width.",h_".$height.",c_fit", $url);
}
}
