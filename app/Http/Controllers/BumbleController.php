<?php

namespace App\Http\Controllers;
use App\Repositories\ResponseRepository;
use App\Models\BumbleHome;
use App\Models\BumbleHomeCard;
use App\Models\gallerymodel;
use App\Models\servicesModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;


class BumbleController extends Controller
{
    public function __construct(ResponseRepository $response)
    {
        $this->response = $response;
        $this->storeRules = [
            'content' => 'required',
            'review_star_count' => 'required',
            'user_name' => 'required',
            'user_role' => 'required'
        ];
    }
    public function getHomeBanner(){
        return $this->response->jsonresponse(false,"Banner Section Fetched Successfully",BumbleHome::all(),200);
    }

    public function updateHomeBanner(Request $request)
    {
        Log::info("request menu: ".$request->menu);
        if($request->hasFile('image')) {
            switch( $request->menu ) {
                case 'banner_1':
                    $uploadUrl = $this->response->cloudinaryImage($request->file('image'), 'banner','banner_1');
                     $uploadUrl = $this->getCroppedImage(1100, 550, $uploadUrl);
                     BumbleHome::first()->update(['banner_1' => $uploadUrl]);
                     return $this->response->jsonResponse(false, 'Image uploaded successfully', '', 201);
                     break;
                // HOME SECTION
                case 'banner_2':
                    $uploadUrl = $this->response->cloudinaryImage($request->file('image'), 'banner','banner_2');
                    $uploadUrl = $this->getCroppedImage(1100, 550, $uploadUrl);
                    BumbleHome::first()->update(['banner_2' => $uploadUrl]);
                     return $this->response->jsonResponse(false, 'Image uploaded successfully', '', 201);

                     break;
                case 'banner_3':
                    $uploadUrl = $this->response->cloudinaryImage($request->file('image'), 'banner','banner_3');
                    $uploadUrl = $this->getCroppedImage(1100, 550, $uploadUrl);
                    BumbleHome::first()->update(['banner_3' => $uploadUrl]);
                    return $this->response->jsonResponse(false, 'Image uploaded successfully', '', 201);
                    break;
                case 'banner_4':
                    $uploadUrl = $this->response->cloudinaryImage($request->file('image'), 'banner','banner_4');
                    $uploadUrl = $this->getCroppedImage(1100, 550, $uploadUrl);
                    BumbleHome::first()->update(['banner_4' => $uploadUrl]);
                    return $this->response->jsonResponse(false, 'Image uploaded successfully', '', 201);
                    break;
                case 'home_card_1_img':
                    $uploadUrl = $this->response->cloudinaryImage($request->file('image'), 'home','home_card_1_img');
                    $uploadUrl = $this->getCroppedImage(870,571,$uploadUrl);
                    BumbleHomeCard::first()->update(['home_card_1_img' => $uploadUrl]);
                    return $this->response->jsonResponse(false, 'Image uploaded successfully', '', 201);
                    break;
                case 'home_card_1_iconImg':
                    $uploadUrl = $this->response->cloudinaryImage($request->file('image'), 'home','home_card_1_iconImg');
                    // $uploadUrl = $this->getAspectRatioImage(5,4,$uploadUrl);
                    BumbleHomeCard::first()->update(['home_card_1_iconImg' => $uploadUrl]);
                    return $this->response->jsonResponse(false, 'Image uploaded successfully', '', 201);
                    break;
                case 'home_card_2_img':
                    $uploadUrl = $this->response->cloudinaryImage($request->file('image'), 'home','home_card_2_img');
                    $uploadUrl = $this->getCroppedImage(870,571,$uploadUrl);
                    BumbleHomeCard::first()->update(['home_card_2_img' => $uploadUrl]);
                    return $this->response->jsonResponse(false, 'Image uploaded successfully', '', 201);
                    break;
                case 'home_card2_iconImg':
                    $uploadUrl = $this->response->cloudinaryImage($request->file('image'), 'home','home_card2_iconImg');
                    // $uploadUrl = $this->getAspectRatioImage(5,4,$uploadUrl);
                    BumbleHomeCard::first()->update(['home_card2_iconImg' => $uploadUrl]);
                    return $this->response->jsonResponse(false, 'Image uploaded successfully', '', 201);
                    break;


                    case 'home_card3_img':
                        $uploadUrl = $this->response->cloudinaryImage($request->file('image'), 'home','home_card3_img');
                        $uploadUrl = $this->getCroppedImage(870,571,$uploadUrl);
                        BumbleHomeCard::first()->update(['home_card3_img' => $uploadUrl]);
                        return $this->response->jsonResponse(false, 'Image uploaded successfully', '', 201);
                        break;
                    case 'home_card_3_iconImg':
                        $uploadUrl = $this->response->cloudinaryImage($request->file('image'), 'home','home_card_3_iconImg');
                        // $uploadUrl = $this->getAspectRatioImage(5,4,$uploadUrl);
                        BumbleHomeCard::first()->update(['home_card_3_iconImg' => $uploadUrl]);
                        return $this->response->jsonResponse(false, 'Image uploaded successfully', '', 201);
                        break;



                        case 'weddingpotrait':
                            $uploadUrl = $this->response->cloudinaryImage($request->file('image'), 'wedding','weddingpotrait');
                            $uploadUrl = $this->getAspectRatioImage(16, 9, $uploadUrl);
                            gallerymodel::first()->update(['weddingpotrait' => $uploadUrl]);
                             return $this->response->jsonResponse(false, 'Image uploaded successfully', '', 201);
                             break;
                        // HOME SECTION
                        case 'wedding2':
                            $uploadUrl = $this->response->cloudinaryImage($request->file('image'), 'wedding','wedding2');
                            // $uploadUrl = $this->getAspectRatioImage(6,6,$uploadUrl);
                            gallerymodel::first()->update(['wedding2' => $uploadUrl]);
                             return $this->response->jsonResponse(false, 'Image uploaded successfully', '', 201);

                             break;
                        case 'wedding3':
                            $uploadUrl = $this->response->cloudinaryImage($request->file('image'), 'wedding','wedding3');
                            // $uploadUrl = $this->getAspectRatioImage(16, 10, $uploadUrl);
                            gallerymodel::first()->update(['wedding3' => $uploadUrl]);
                            return $this->response->jsonResponse(false, 'Image uploaded successfully', '', 201);
                            break;
                        case 'wedding4':
                            $uploadUrl = $this->response->cloudinaryImage($request->file('image'), 'wedding','wedding4');
                            // $uploadUrl = $this->getAspectRatioImage(5,4,$uploadUrl);
                            gallerymodel::first()->update(['wedding4' => $uploadUrl]);
                            return $this->response->jsonResponse(false, 'Image uploaded successfully', '', 201);
                            break;
                        case 'wedding5':
                            $uploadUrl = $this->response->cloudinaryImage($request->file('image'), 'wedding','wedding5');
                            // $uploadUrl = $this->getAspectRatioImage(5,4,$uploadUrl);
                            gallerymodel::first()->update(['wedding5' => $uploadUrl]);
                            return $this->response->jsonResponse(false, 'Image uploaded successfully', '', 201);
                            break;
                        case 'wedding6':
                            $uploadUrl = $this->response->cloudinaryImage($request->file('image'), 'wedding','wedding6');
                            // $uploadUrl = $this->getAspectRatioImage(5,4,$uploadUrl);
                            gallerymodel::first()->update(['wedding6' => $uploadUrl]);
                            return $this->response->jsonResponse(false, 'Image uploaded successfully', '', 201);
                            break;
                        case 'wedding7':
                            $uploadUrl = $this->response->cloudinaryImage($request->file('image'), 'wedding','wedding7');
                            // $uploadUrl = $this->getAspectRatioImage(5,4,$uploadUrl);
                            gallerymodel::first()->update(['wedding7' => $uploadUrl]);
                            return $this->response->jsonResponse(false, 'Image uploaded successfully', '', 201);
                            break;
                        case 'wedding8':
                            $uploadUrl = $this->response->cloudinaryImage($request->file('image'), 'wedding','wedding8');
                            // $uploadUrl = $this->getAspectRatioImage(5,4,$uploadUrl);
                            gallerymodel::first()->update(['wedding8' => $uploadUrl]);
                            return $this->response->jsonResponse(false, 'Image uploaded successfully', '', 201);
                            break;


                        case 'wedding9':
                            $uploadUrl = $this->response->cloudinaryImage($request->file('image'), 'wedding','wedding9');
                            // $uploadUrl = $this->getAspectRatioImage(5,4,$uploadUrl);
                            gallerymodel::first()->update(['wedding9' => $uploadUrl]);
                            return $this->response->jsonResponse(false, 'Image uploaded successfully', '', 201);
                            break;


                case 'wedding10':
                    $uploadUrl = $this->response->cloudinaryImage($request->file('image'), 'wedding','wedding10');
                    // $uploadUrl = $this->getAspectRatioImage(5,4,$uploadUrl);
                    gallerymodel::first()->update(['wedding10' => $uploadUrl]);
                    return $this->response->jsonResponse(false, 'Image uploaded successfully', '', 201);
                    break;

                case 'wedding11':
                    $uploadUrl = $this->response->cloudinaryImage($request->file('image'), 'wedding','wedding11');
                    // $uploadUrl = $this->getAspectRatioImage(5,4,$uploadUrl);
                    gallerymodel::first()->update(['wedding11' => $uploadUrl]);
                    return $this->response->jsonResponse(false, 'Image uploaded successfully', '', 201);
                    break;
                case 'wedding12':
                    $uploadUrl = $this->response->cloudinaryImage($request->file('image'), 'wedding','wedding12');
                    // $uploadUrl = $this->getAspectRatioImage(5,4,$uploadUrl);
                    gallerymodel::first()->update(['wedding12' => $uploadUrl]);
                    return $this->response->jsonResponse(false, 'Image uploaded successfully', '', 201);
                    break;
                case 'outdoorportrait':
                    $uploadUrl = $this->response->cloudinaryImage($request->file('image'), 'outdoor','outdoorportrait');
                    // $uploadUrl = $this->getAspectRatioImage(5,4,$uploadUrl);
                    gallerymodel::first()->update(['outdoorportrait' => $uploadUrl]);
                    return $this->response->jsonResponse(false, 'Image uploaded successfully', '', 201);
                    break;
                case 'outdoor2':
                    $uploadUrl = $this->response->cloudinaryImage($request->file('image'), 'outdoor','outdoor2');
                    // $uploadUrl = $this->getAspectRatioImage(5,4,$uploadUrl);
                    gallerymodel::first()->update(['outdoor2' => $uploadUrl]);
                    return $this->response->jsonResponse(false, 'Image uploaded successfully', '', 201);
                    break;



                case 'outdoor3':
                    $uploadUrl = $this->response->cloudinaryImage($request->file('image'), 'outdoor','outdoor3');
                    // $uploadUrl = $this->getAspectRatioImage(5,4,$uploadUrl);
                    gallerymodel::first()->update(['outdoor3' => $uploadUrl]);
                    return $this->response->jsonResponse(false, 'Image uploaded successfully', '', 201);
                    break;

                case 'outdoor4':
                    $uploadUrl = $this->response->cloudinaryImage($request->file('image'), 'outdoor','outdoor4');
                    // $uploadUrl = $this->getAspectRatioImage(5,4,$uploadUrl);
                    gallerymodel::first()->update(['outdoor4' => $uploadUrl]);
                    return $this->response->jsonResponse(false, 'Image uploaded successfully', '', 201);
                    break;
                case 'outdoor5':
                    $uploadUrl = $this->response->cloudinaryImage($request->file('image'), 'outdoor','outdoor5');
                    // $uploadUrl = $this->getAspectRatioImage(5,4,$uploadUrl);
                    gallerymodel::first()->update(['outdoor5' => $uploadUrl]);
                    return $this->response->jsonResponse(false, 'Image uploaded successfully', '', 201);
                    break;
                case 'outdoor6':
                    $uploadUrl = $this->response->cloudinaryImage($request->file('image'), 'outdoor','outdoor6');
                    // $uploadUrl = $this->getAspectRatioImage(5,4,$uploadUrl);
                    gallerymodel::first()->update(['outdoor6' => $uploadUrl]);
                    return $this->response->jsonResponse(false, 'Image uploaded successfully', '', 201);
                    break;
                case 'outdoor7':
                    $uploadUrl = $this->response->cloudinaryImage($request->file('image'), 'outdoor','outdoor7');
                    // $uploadUrl = $this->getAspectRatioImage(5,4,$uploadUrl);
                    gallerymodel::first()->update(['outdoor7' => $uploadUrl]);
                    return $this->response->jsonResponse(false, 'Image uploaded successfully', '', 201);
                    break;



                case 'outdoor8':
                    $uploadUrl = $this->response->cloudinaryImage($request->file('image'), 'outdoor','outdoor8');
                    // $uploadUrl = $this->getAspectRatioImage(5,4,$uploadUrl);
                    gallerymodel::first()->update(['outdoor8' => $uploadUrl]);
                    return $this->response->jsonResponse(false, 'Image uploaded successfully', '', 201);
                    break;
                case 'outdoor9':
                    $uploadUrl = $this->response->cloudinaryImage($request->file('image'), 'outdoor','outdoor9');
                    // $uploadUrl = $this->getAspectRatioImage(5,4,$uploadUrl);
                    gallerymodel::first()->update(['outdoor9' => $uploadUrl]);
                    return $this->response->jsonResponse(false, 'Image uploaded successfully', '', 201);
                    break;
                case 'outdoor10':
                    $uploadUrl = $this->response->cloudinaryImage($request->file('image'), 'outdoor','outdoor10');
                    // $uploadUrl = $this->getAspectRatioImage(5,4,$uploadUrl);
                    gallerymodel::first()->update(['outdoor10' => $uploadUrl]);
                    return $this->response->jsonResponse(false, 'Image uploaded successfully', '', 201);
                    break;
                case 'outdoor11':
                    $uploadUrl = $this->response->cloudinaryImage($request->file('image'), 'outdoor','outdoor11');
                    // $uploadUrl = $this->getAspectRatioImage(5,4,$uploadUrl);
                    gallerymodel::first()->update(['outdoor11' => $uploadUrl]);
                    return $this->response->jsonResponse(false, 'Image uploaded successfully', '', 201);
                    break;
                case 'outdoor12':
                    $uploadUrl = $this->response->cloudinaryImage($request->file('image'), 'outdoor','outdoor12');
                    // $uploadUrl = $this->getAspectRatioImage(5,4,$uploadUrl);
                    gallerymodel::first()->update(['outdoor12' => $uploadUrl]);
                    return $this->response->jsonResponse(false, 'Image uploaded successfully', '', 201);
                    break;
                case 'babywashportrait':
                    $uploadUrl = $this->response->cloudinaryImage($request->file('image'), 'babywash','babywashportrait');
                    // $uploadUrl = $this->getAspectRatioImage(5,4,$uploadUrl);
                    gallerymodel::first()->update(['babywashportrait' => $uploadUrl]);
                    return $this->response->jsonResponse(false, 'Image uploaded successfully', '', 201);
                    break;




                case 'babywash2':
                    $uploadUrl = $this->response->cloudinaryImage($request->file('image'), 'babaywash','babywash2');
                    // $uploadUrl = $this->getAspectRatioImage(5,4,$uploadUrl);
                    gallerymodel::first()->update(['babywash2' => $uploadUrl]);
                    return $this->response->jsonResponse(false, 'Image uploaded successfully', '', 201);
                    break;
                case 'babywash3':
                    $uploadUrl = $this->response->cloudinaryImage($request->file('image'), 'babywash','babywash3');
                    // $uploadUrl = $this->getAspectRatioImage(5,4,$uploadUrl);
                    gallerymodel::first()->update(['babywash3' => $uploadUrl]);
                    return $this->response->jsonResponse(false, 'Image uploaded successfully', '', 201);
                    break;
                case 'babywash4':
                    $uploadUrl = $this->response->cloudinaryImage($request->file('image'), 'babywash','babywash4');
                    // $uploadUrl = $this->getAspectRatioImage(5,4,$uploadUrl);
                    gallerymodel::first()->update(['babywash4' => $uploadUrl]);
                    return $this->response->jsonResponse(false, 'Image uploaded successfully', '', 201);
                    break;
                case 'babywash5':
                    $uploadUrl = $this->response->cloudinaryImage($request->file('image'), 'babywash','babywash5');
                    // $uploadUrl = $this->getAspectRatioImage(5,4,$uploadUrl);
                    gallerymodel::first()->update(['babywash5' => $uploadUrl]);
                    return $this->response->jsonResponse(false, 'Image uploaded successfully', '', 201);
                    break;
                case 'babywash6':
                    $uploadUrl = $this->response->cloudinaryImage($request->file('image'), 'babywash','babywash6');
                    // $uploadUrl = $this->getAspectRatioImage(5,4,$uploadUrl);
                    gallerymodel::first()->update(['babywash6' => $uploadUrl]);
                    return $this->response->jsonResponse(false, 'Image uploaded successfully', '', 201);
                    break;


                case 'babywash7':
                    $uploadUrl = $this->response->cloudinaryImage($request->file('image'), 'babywash','babywash7');
                    // $uploadUrl = $this->getAspectRatioImage(5,4,$uploadUrl);
                    gallerymodel::first()->update(['babywash7' => $uploadUrl]);
                    return $this->response->jsonResponse(false, 'Image uploaded successfully', '', 201);
                    break;
                case 'babywash8':
                    $uploadUrl = $this->response->cloudinaryImage($request->file('image'), 'babywash','babywash8');
                    // $uploadUrl = $this->getAspectRatioImage(5,4,$uploadUrl);
                    gallerymodel::first()->update(['babywash8' => $uploadUrl]);
                    return $this->response->jsonResponse(false, 'Image uploaded successfully', '', 201);
                    break;
                case 'babywash9':
                    $uploadUrl = $this->response->cloudinaryImage($request->file('image'), 'babywash','babywash9');
                    // $uploadUrl = $this->getAspectRatioImage(5,4,$uploadUrl);
                    gallerymodel::first()->update(['babywash9' => $uploadUrl]);
                    return $this->response->jsonResponse(false, 'Image uploaded successfully', '', 201);
                    break;
                case 'babywash10':
                    $uploadUrl = $this->response->cloudinaryImage($request->file('image'), 'babywash','babywash10');
                    // $uploadUrl = $this->getAspectRatioImage(5,4,$uploadUrl);
                    gallerymodel::first()->update(['babywash10' => $uploadUrl]);
                    return $this->response->jsonResponse(false, 'Image uploaded successfully', '', 201);
                    break;
                case 'babywash11':
                    $uploadUrl = $this->response->cloudinaryImage($request->file('image'), 'babywash','babywash11');
                    // $uploadUrl = $this->getAspectRatioImage(5,4,$uploadUrl);
                    gallerymodel::first()->update(['babywash11' => $uploadUrl]);
                    return $this->response->jsonResponse(false, 'Image uploaded successfully', '', 201);
                    break;
                case 'babywash12':
                    $uploadUrl = $this->response->cloudinaryImage($request->file('image'), 'babywash','babywash12');
                    // $uploadUrl = $this->getAspectRatioImage(5,4,$uploadUrl);
                    gallerymodel::first()->update(['babywash12' => $uploadUrl]);
                    return $this->response->jsonResponse(false, 'Image uploaded successfully', '', 201);
                    break;








                case 'services1_img':
                    Log::info("Inside services1_img");
                    $uploadUrl = $this->response->cloudinaryImage($request->file('image'), 'services','services1_img');
                    // $uploadUrl = $this->getAspectRatioImage(5,4,$uploadUrl);
                    servicesModel::first()->update(['services1_img' => $uploadUrl]);

                    return $this->response->jsonResponse(false, 'Image uploaded successfully', '', 201);
                    break;
                case 'services2_img':
                    $uploadUrl = $this->response->cloudinaryImage($request->file('image'), 'services','services2_img');
                    // $uploadUrl = $this->getAspectRatioImage(5,4,$uploadUrl);
                    servicesModel::first()->update(['services2_img' => $uploadUrl]);
                    return $this->response->jsonResponse(false, 'Image uploaded successfully', '', 201);
                    break;
                case 'services3_img':
                    $uploadUrl = $this->response->cloudinaryImage($request->file('image'), 'services','services3_img');
                    // $uploadUrl = $this->getAspectRatioImage(5,4,$uploadUrl);
                    servicesModel::first()->update(['services3_img' => $uploadUrl]);
                    return $this->response->jsonResponse(false, 'Image uploaded successfully', '', 201);
                    break;
                case 'services4_img':
                    $uploadUrl = $this->response->cloudinaryImage($request->file('image'), 'services','services4_img');
                    // $uploadUrl = $this->getAspectRatioImage(5,4,$uploadUrl);
                    servicesModel::first()->update(['services4_img' => $uploadUrl]);
                    return $this->response->jsonResponse(false, 'Image uploaded successfully', '', 201);
                    break;
                case 'services5_img':
                    $uploadUrl = $this->response->cloudinaryImage($request->file('image'), 'services','services5_img');
                    // $uploadUrl = $this->getAspectRatioImage(5,4,$uploadUrl);
                    servicesModel::first()->update(['services5_img' => $uploadUrl]);
                    return $this->response->jsonResponse(false, 'Image uploaded successfully', '', 201);
                    break;



                case 'services6_img':
                        $uploadUrl = $this->response->cloudinaryImage($request->file('image'), 'services','services6_img');
                        // $uploadUrl = $this->getAspectRatioImage(5,4,$uploadUrl);
                        servicesModel::first()->update(['services6_img' => $uploadUrl]);
                        return $this->response->jsonResponse(false, 'Image uploaded successfully', '', 201);
                        break;
                case 'services7_img':
                    $uploadUrl = $this->response->cloudinaryImage($request->file('image'), 'services','services7_img');
                    // $uploadUrl = $this->getAspectRatioImage(5,4,$uploadUrl);
                    servicesModel::first()->update(['services7_img' => $uploadUrl]);
                    return $this->response->jsonResponse(false, 'Image uploaded successfully', '', 201);
                    break;
                case 'services8_img':
                    $uploadUrl = $this->response->cloudinaryImage($request->file('image'), 'services','services8_img');
                    // $uploadUrl = $this->getAspectRatioImage(5,4,$uploadUrl);
                    servicesModel::first()->update(['services8_img' => $uploadUrl]);
                    return $this->response->jsonResponse(false, 'Image uploaded successfully', '', 201);
                    break;
                case 'services9_img':
                    $uploadUrl = $this->response->cloudinaryImage($request->file('image'), 'services','services9_img');
                    // $uploadUrl = $this->getAspectRatioImage(5,4,$uploadUrl);
                    servicesModel::first()->update(['services9_img' => $uploadUrl]);
                    return $this->response->jsonResponse(false, 'Image uploaded successfully', '', 201);
                    break;
                case 'services10_img':
                    $uploadUrl = $this->response->cloudinaryImage($request->file('image'), 'services','services10_img');
                    // $uploadUrl = $this->getAspectRatioImage(5,4,$uploadUrl);
                    servicesModel::first()->update(['services10_img' => $uploadUrl]);
                    return $this->response->jsonResponse(false, 'Image uploaded successfully', '', 201);
                    break;

                case 'resume':  $uploadUrl = $this->response->cloudinaryImage($request->file('image'), 'careers','resume');
                    // $uploadUrl = $this->getAspectRatioImage(5,4,$uploadUrl);
                    servicesModel::first()->update(['resume' => $uploadUrl]);
                    return $this->response->jsonResponse(false, 'Image uploaded successfully', '', 201);

                    break;



                }

       } else {
            return $this->response->jsonResponse(true, 'Image Size is too high', [], 202);
        }
    }


    public function getCroppedImage($width, $height, $url)
{
    return str_replace("/upload", "/upload/w_".$width.",h_".$height.",c_scale", $url);
}
public function getAspectRatioImage($ratio1, $ratio2, $url)
{
    return str_replace("/upload", "/upload/ar_$ratio1:$ratio2,c_fill", $url);
}
}
