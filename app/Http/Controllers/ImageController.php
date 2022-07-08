<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Home;
use App\Models\Products;
use App\Models\Company;
use App\Models\Teams;
use App\Models\Test;
use App\Models\BlogDetails;
use App\Models\Blogs;
use App\Models\FaqBanner;
use Illuminate\Support\Facades\Log;
use App\Repositories\ResponseRepository;

class ImageController extends Controller
{
    public function __construct(ResponseRepository $response)
    {
        $this->response = $response;
    }
    public function imageUpload(Request $request)
    {   
      Log::info("request  === ".$request);
        if($request->hasFile('image')) {
            switch( $request->menu ) {

                //FAQ BANNER LAB

                case 'banner_one_1':
                    $uploadUrl = $this->response->cloudinaryImage($request->file('image'), 'home','banner_one_1');
                    FaqBanner::first()->update(['banner_one' => $uploadUrl]);
                     return $this->response->jsonResponse(false, 'Banner One Image uploaded successfully', $request->menu, 201);
                     break;

                case 'banner_two_2':
                    $uploadUrl = $this->response->cloudinaryImage($request->file('image'), 'home','banner_two_2');
                    FaqBanner::first()->update(['banner_two' => $uploadUrl]);
                    return $this->response->jsonResponse(false, 'Banner Two Image uploaded successfully', $request->menu, 201);
                    break;

                case 'banner_three_3':
                    $uploadUrl = $this->response->cloudinaryImage($request->file('image'), 'home','banner_three_3');
                    FaqBanner::first()->update(['banner_three' => $uploadUrl]);
                    return $this->response->jsonResponse(false, 'Banner Three Image uploaded successfully', $request->menu, 201);
                    break;

                case 'banner_four_4':
                    $uploadUrl = $this->response->cloudinaryImage($request->file('image'), 'home','banner_four_4');
                    FaqBanner::first()->update(['banner_four' => $uploadUrl]);
                    return $this->response->jsonResponse(false, 'Banner Four Image uploaded successfully', $request->menu, 201);
                    break;

                case 'banner_five_5':
                    $uploadUrl = $this->response->cloudinaryImage($request->file('image'), 'home','banner_five_5');
                    FaqBanner::first()->update(['banner_five' => $uploadUrl]);
                    return $this->response->jsonResponse(false, 'Banner Five Image uploaded successfully', $request->menu, 201);
                    break;

                case 'test_image':
                        $uploadUrl = $this->response->cloudinaryImage($request->file('image'), 'product','test_image');
                        Test::first()->update(['test_image' => $uploadUrl]);
                        return $this->response->jsonResponse(false, 'Test Image uploaded successfully', $request->menu, 201);
                        break;      


                case 'equipments_image':
                        $uploadUrl = $this->response->cloudinaryImage($request->file('image'), 'product','equipments_image'.$request->id);
                        BlogDetails::find($request->id)->update(['equipments_image' => $uploadUrl]);
                        return $this->response->jsonResponse(false, 'Equipments uploaded successfully', $request->menu, 201);
                        break;     
                  
                }
       } else {
            return $this->response->jsonResponse(true, 'Image Size is too high', [], 202);
        }
    }
}
