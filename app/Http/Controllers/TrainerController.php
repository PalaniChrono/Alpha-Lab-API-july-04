<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use App\Models\Trainer;
use App\Models\Home;
use App\Models\Course;
use App\Models\OtherCourse;
use App\Repositories\ResponseRepository;

class TrainerController extends Controller
{
    public function __construct(ResponseRepository $response)
    {
        $this->response = $response;
    }
    public function getTrainerSection(){

      return $this->response->jsonResponse(false,"Trainer Content Fetched Successfully",Trainer::all(), 200);

    }

     public function imageUpload(Request $request)
    {
        if($request->hasFile('image')) {
            switch( $request->menu ) {
                 // TRAINER SECTION
                case 'trainerSectionOne':
                    $uploadUrl = $this->response->cloudinaryImage($request->file('image'), 'trainer','section_one_main_image');
                    //  $uploadUrl = $this->getCroppedImage(100, 100, $uploadUrl);
                     Trainer::first()->update(['PThree_SecOne_Img' => $uploadUrl]);
                     return $this->response->jsonResponse(false, 'Image uploaded successfully', $request->menu, 201);
                     break;
                // HOME SECTION
                case 'HomeSectionOne':
                    $uploadUrl = $this->response->cloudinaryImage($request->file('image'), 'home','section_one_main_image');
                    $uploadUrl = $this->getAspectRatioImage(6,6,$uploadUrl);
                     Home::first()->update(['POne_SecOne_Img' => $uploadUrl]);
                     return $this->response->jsonResponse(false, 'Image uploaded successfully', $request->menu, 201);

                     break;
                case 'HomesectionTwo':
                    $uploadUrl = $this->response->cloudinaryImage($request->file('image'), 'home','section_two_main_image_sub_one');
                    $uploadUrl = $this->getAspectRatioImage(16, 10, $uploadUrl);
                    Home::first()->update(['POne_SecOne_Img' => $uploadUrl]);
                    return $this->response->jsonResponse(false, 'Image uploaded successfully', $request->menu, 201);
                    break;
                case 'HomesectionThreeSubOne':
                    $uploadUrl = $this->response->cloudinaryImage($request->file('image'), 'home','section_three_carousel_image_one');
                    $uploadUrl = $this->getAspectRatioImage(5,4,$uploadUrl);                    Log::info("uploadUrl :".$uploadUrl);
                    Home::first()->update(['POne_SecThree_ImgTwo_sub_one' => $uploadUrl]);
                    return $this->response->jsonResponse(false, 'Image uploaded successfully', 'HomesectionThree', 201);
                    break;
                case 'HomesectionThreeSubTwo':
                    $uploadUrl = $this->response->cloudinaryImage($request->file('image'), 'home','section_three_carousel_image_two');
                    $uploadUrl = $this->getAspectRatioImage(5,4,$uploadUrl);                    Log::info("uploadUrl :".$uploadUrl);
                    Home::first()->update(['POne_SecThree_ImgTwo_sub_two' => $uploadUrl]);
                    return $this->response->jsonResponse(false, 'Image uploaded successfully', 'HomesectionThree', 201);
                    break;
                case 'HomesectionThreeSubThree':
                    $uploadUrl = $this->response->cloudinaryImage($request->file('image'), 'home','section_three_carousel_image_three');
                    $uploadUrl = $this->getAspectRatioImage(5,4,$uploadUrl);                    Log::info("uploadUrl :".$uploadUrl);
                    Home::first()->update(['POne_SecThree_ImgTwo_sub_three' => $uploadUrl]);
                    return $this->response->jsonResponse(false, 'Image uploaded successfully','HomesectionThree', 201);
                    break;
                case 'HomesectionThree':
                    $uploadUrl = $this->response->cloudinaryImage($request->file('image'), 'home','section_three_main_image');
                    // $uploadUrl = $this->getCroppedImage(500, 500, $uploadUrl);
                    Home::first()->update(['POne_SecThree_ImgThree' => $uploadUrl]);
                    return $this->response->jsonResponse(false, 'Image uploaded successfully', 'HomesectionThree', 201);
                    break;
                case 'HomesectionFour':
                    $uploadUrl = $this->response->cloudinaryImage($request->file('image'), 'home','section_four_main_image');
                    // $uploadUrl = $this->getCroppedImage(500, 500, $uploadUrl);
                    Home::first()->update(['POne_SecFour_Img' => $uploadUrl]);
                    return $this->response->jsonResponse(false, 'Image uploaded successfully', $request->menu, 201);
                    break;

                    // COURSE SECTION
                case 'coursesSectionOne':
                    $uploadUrl = $this->response->cloudinaryImage($request->file('image'), 'courses','section_one_image');
                    $uploadUrl = $this->getAspectRatioImage(16,10,$uploadUrl);
                        Course::first()->update(['PTwo_SecOne_Img' => $uploadUrl]);
                        return $this->response->jsonResponse(false, 'Image uploaded successfully', $request->menu, 201);
                        break;
                case 'coursesSectionOneReadMore':
                    $uploadUrl = $this->response->cloudinaryImage($request->file('image'), 'courses','section_one_image');
                    // $uploadUrl = $this->getCroppedImage(263, 204, $uploadUrl);
                        Course::first()->update(['MoreOne_SecThree_Img' => $uploadUrl]);
                        return $this->response->jsonResponse(false, 'Image uploaded successfully', 'coursesSectionOne', 201);
                        break;
                case 'coursesSectionTwo':
                    $uploadUrl = $this->response->cloudinaryImage($request->file('image'), 'courses','section_two_image');
                    $uploadUrl = $this->getAspectRatioImage(16,10,$uploadUrl);
                    Course::first()->update(['PTwo_SecTwo_Img' => $uploadUrl]);
                        return $this->response->jsonResponse(false, 'Image uploaded successfully', $request->menu, 201);
                        break;
                case 'coursesSectionTwoReadMore':
                    $uploadUrl = $this->response->cloudinaryImage($request->file('image'), 'courses','section_one_image');
                    // $uploadUrl = $this->getCroppedImage(263, 204, $uploadUrl);
                    Course::first()->update(['MoreTwo_SecThree_Img' => $uploadUrl]);
                        return $this->response->jsonResponse(false, 'Image uploaded successfully', 'coursesSectionTwo', 201);
                        break;
                case 'coursesSectionThree':
                    $uploadUrl = $this->response->cloudinaryImage($request->file('image'), 'courses','section_three_image');
                    $uploadUrl = $this->getAspectRatioImage(16,10,$uploadUrl);
                    Course::first()->update(['PTwo_SecThree_Img' => $uploadUrl]);
                    return $this->response->jsonResponse(false, 'Image uploaded successfully', $request->menu, 201);
                    break;
                case 'coursesSectionThreeReadMore':
                    $uploadUrl = $this->response->cloudinaryImage($request->file('image'), 'courses','section_one_image');
                    // $uploadUrl = $this->getCroppedImage(263, 204, $uploadUrl);
                        Course::first()->update(['MoreThree_SecThree_Img' => $uploadUrl]);
                        return $this->response->jsonResponse(false, 'Image uploaded successfully', 'coursesSectionThree', 201);
                        break;
                case 'coursesSectionFour':
                    $uploadUrl = $this->response->cloudinaryImage($request->file('image'), 'courses','section_four_image');
                    $uploadUrl = $this->getAspectRatioImage(16,10,$uploadUrl);
                    Course::first()->update(['PTwo_SecFour_Img' => $uploadUrl]);
                    return $this->response->jsonResponse(false, 'Image uploaded successfully', $request->menu, 201);
                    break;
                case 'coursesSectionFourReadMore':
                    $uploadUrl = $this->response->cloudinaryImage($request->file('image'), 'courses','section_one_image');
                    // $uploadUrl = $this->getCroppedImage(263, 204, $uploadUrl);
                    Course::first()->update(['MoreFour_SecThree_Img' => $uploadUrl]);
                    return $this->response->jsonResponse(false, 'Image uploaded successfully', 'coursesSectionFour', 201);
                    break;
                case 'coursesSectionFive':
                    $uploadUrl = $this->response->cloudinaryImage($request->file('image'), 'courses','section_three_image');
                    $uploadUrl = $this->getAspectRatioImage(16,10,$uploadUrl);
                    Course::first()->update(['PTwo_SecFive_Img' => $uploadUrl]);
                    return $this->response->jsonResponse(false, 'Image uploaded successfully', $request->menu, 201);
                    break;
                case 'coursesSectionFiveReadMore':
                    $uploadUrl = $this->response->cloudinaryImage($request->file('image'), 'courses','section_one_image');
                    // $uploadUrl = $this->getCroppedImage(263, 204, $uploadUrl);
                        Course::first()->update(['MoreFive_SecThree_Img' => $uploadUrl]);
                        return $this->response->jsonResponse(false, 'Image uploaded successfully', 'coursesSectionFive', 201);
                        break;

                     // OTHER COURSE SECTION
                case 'othercoursesSection1':
                    $uploadUrl = $this->response->cloudinaryImage($request->file('image'), 'othercourses','section_one_image');
                    $uploadUrl = $this->getAspectRatioImage(16,10,$uploadUrl);
                    OtherCourse::first()->update(['PTwo_SecTwo_Img' => $uploadUrl]);
                    return $this->response->jsonResponse(false, 'Image uploaded successfully', $request->menu, 201);
                    break;
                case 'othercoursesSection1ReadMore':
                    $uploadUrl = $this->response->cloudinaryImage($request->file('image'), 'othercourses','section_one_image');
                    // $uploadUrl = $this->getCroppedImage(263, 204, $uploadUrl);
                    OtherCourse::first()->update(['MoreTwo_SecThree_Img' => $uploadUrl]);
                    return $this->response->jsonResponse(false, 'Image uploaded successfully', 'othercoursesSection1', 201);
                    break;
                case 'othercoursesSection2':
                    $uploadUrl = $this->response->cloudinaryImage($request->file('image'), 'othercourses','section_two_image');
                    $uploadUrl = $this->getAspectRatioImage(16,10,$uploadUrl);
                    OtherCourse::first()->update(['PTwo_SecThree_Img' => $uploadUrl]);
                    return $this->response->jsonResponse(false, 'Image uploaded successfully', $request->menu, 201);
                    break;
                case 'othercoursesSection2ReadMore':
                    $uploadUrl = $this->response->cloudinaryImage($request->file('image'), 'othercourses','section_one_image');
                    // $uploadUrl = $this->getCroppedImage(263, 204, $uploadUrl);
                    OtherCourse::first()->update(['MoreThree_SecThree_Img' => $uploadUrl]);
                    return $this->response->jsonResponse(false, 'Image uploaded successfully', 'othercoursesSection2', 201);
                    break;
                case 'othercoursesSection3':
                    $uploadUrl = $this->response->cloudinaryImage($request->file('image'), 'othercourses','section_three_image');
                    $uploadUrl = $this->getAspectRatioImage(16,10,$uploadUrl);
                    OtherCourse::first()->update(['PTwo_SecFour_Img' => $uploadUrl]);
                    return $this->response->jsonResponse(false, 'Image uploaded successfully', $request->menu, 201);
                    break;
                case 'othercoursesSection3ReadMore':
                    $uploadUrl = $this->response->cloudinaryImage($request->file('image'), 'othercourses','section_one_image');
                    // $uploadUrl = $this->getCroppedImage(263, 204, $uploadUrl);
                    OtherCourse::first()->update(['MoreFour_SecThree_Img' => $uploadUrl]);
                    return $this->response->jsonResponse(false, 'Image uploaded successfully', 'othercoursesSection3', 201);
                    break;

                }
       } else {
            return $this->response->jsonResponse(true, 'Image Size is too high', [], 202);
        }
    }


    public function getCroppedImage($width, $height, $url)
    {
        // Here i am assuming `image` is where you store Cloudinary url
        return str_replace("/upload", "/upload/w_".$width.",h_".$height.",c_fit", $url);
    }
    public function getAspectRatioImage($ratio1, $ratio2, $url)
    {
        return str_replace("/upload", "/upload/ar_$ratio1:$ratio2,c_fill", $url);
    }




  public function updateTrainerSectionOne(Request $request){

   //Log::info($request);


   $TrainerSectionOne = Trainer::firstOrNew();


    return $this->response->jsonResponse(false,'update Trainer section Successfully',  $TrainerSectionOne->update([


        $TrainerSectionOne->PThree_SecOne_Img= is_null($request->PThree_SecOne_Img) ?  $TrainerSectionOne->PThree_SecOne_Img : $request->PThree_SecOne_Img,

        $TrainerSectionOne->PThree_SecOne_Txt = is_null($request->PThree_SecOne_Txt) ?  $TrainerSectionOne->PThree_SecOne_Txt : $request->PThree_SecOne_Txt,
        $TrainerSectionOne->PThree_SecTwo_Txt = is_null($request->PThree_SecTwo_Txt) ?  $TrainerSectionOne->PThree_SecTwo_Txt : $request->PThree_SecTwo_Txt,

        $TrainerSectionOne->PThree_SecThree_Txt = is_null($request->PThree_SecThree_Txt) ?  $TrainerSectionOne->PThree_SecThree_Txt : $request->PThree_SecThree_Txt


         ]), 201);




}
}
