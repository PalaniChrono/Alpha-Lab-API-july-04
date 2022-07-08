<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use Illuminate\Support\Facades\Log;
use App\Repositories\ResponseRepository;

class CourseController extends Controller
{
    public function __construct(ResponseRepository $response)
    {
        $this->response = $response;
    }

    public function getCourseSection(){
   
        return $this->response->jsonResponse(false,"Course Content Fetched Successfully",Course::all(), 200);
  
      }

//       public function updateCourseSectionOne(Request $request){

//         $CourseSectionOne = Course::firstOrNew();
//         return $this->response->jsonResponse(false,'update course section Successfully',  $CourseSectionOne->update([
//         $CourseSectionOne->PTwo_SecOne_TxtOne = is_null($request->PTwo_SecOne_TxtOne) ?  $CourseSectionOne->PTwo_SecOne_TxtOne : $request->PTwo_SecOne_TxtOne,
//         $CourseSectionOne->PTwo_SecOne_TxtTwo = is_null($request->PTwo_SecOne_TxtTwo) ?  $CourseSectionOne->PTwo_SecOne_TxtTwo : $request->PTwo_SecOne_TxtTwo,
//         $CourseSectionOne->PTwo_SecOne_TxtThree = is_null($request->PTwo_SecOne_TxtThree) ?  $CourseSectionOne->PTwo_SecOne_TxtThree : $request->PTwo_SecOne_TxtThree,
//         $CourseSectionOne->PTwo_SecOne_TxtFour = is_null($request->PTwo_SecOne_TxtFour) ?  $CourseSectionOne->PTwo_SecOne_TxtFour : $request->PTwo_SecOne_TxtFour,
//         $CourseSectionOne->PTwo_SecOne_TxtFive = is_null($request->PTwo_SecOne_TxtFive) ?  $CourseSectionOne->PTwo_SecOne_TxtFive : $request->PTwo_SecOne_TxtFive,
//         $CourseSectionOne->PTwo_SecOne_Img = is_null($request->PTwo_SecOne_Img) ?  $CourseSectionOne->PTwo_SecOne_Img : $request->PTwo_SecOne_Img,
//         $CourseSectionOne->PTwo_SecTwo_Img = is_null($request->PTwo_SecTwo_Img) ?  $CourseSectionOne->PTwo_SecTwo_Img : $request->PTwo_SecTwo_Img,
//         $CourseSectionOne->PTwo_SecTwo_TxtOne = is_null($request->PTwo_SecTwo_TxtOne) ?  $CourseSectionOne->PTwo_SecTwo_TxtOne : $request->PTwo_SecTwo_TxtOne,
//         $CourseSectionOne->PTwo_SecTwo_TxtTwo = is_null($request->PTwo_SecTwo_TxtTwo) ?  $CourseSectionOne->PTwo_SecTwo_TxtTwo : $request->PTwo_SecTwo_TxtTwo,
//         $CourseSectionOne->PTwo_SecTwo_TxtThree = is_null($request->PTwo_SecTwo_TxtThree) ?  $CourseSectionOne->PTwo_SecTwo_TxtThree : $request->PTwo_SecTwo_TxtThree,
//         $CourseSectionOne->PTwo_SecTwo_TxtFour = is_null($request->PTwo_SecTwo_TxtFour) ?  $CourseSectionOne->PTwo_SecTwo_TxtFour : $request->PTwo_SecTwo_TxtFour,
//         $CourseSectionOne->PTwo_SecThree_TxtOne = is_null($request->PTwo_SecThree_TxtOne) ?  $CourseSectionOne->PTwo_SecThree_TxtOne : $request->PTwo_SecThree_TxtOne,
//         $CourseSectionOne->PTwo_SecThree_TxtTwo = is_null($request->PTwo_SecThree_TxtTwo) ?  $CourseSectionOne->PTwo_SecThree_TxtTwo : $request->PTwo_SecThree_TxtTwo,
//         $CourseSectionOne->PTwo_SecThree_TxtThree = is_null($request->PTwo_SecThree_TxtThree) ?  $CourseSectionOne->PTwo_SecThree_TxtThree : $request->PTwo_SecThree_TxtThree,
//         $CourseSectionOne->PTwo_SecThree_Img = is_null($request->PTwo_SecThree_Img) ?  $CourseSectionOne->PTwo_SecThree_Img : $request->PTwo_SecThree_Img,
//         $CourseSectionOne->PTwo_SecFour_Img = is_null($request->PTwo_SecFour_Img) ?  $CourseSectionOne->PTwo_SecFour_Img : $request->PTwo_SecFour_Img,

//         $CourseSectionOne->PTwo_SecFour_TxtOne = is_null($request->PTwo_SecFour_TxtOne) ?  $CourseSectionOne->PTwo_SecFour_TxtOne : $request->PTwo_SecFour_TxtOne,
//         $CourseSectionOne->PTwo_SecFour_TxtTwo = is_null($request->PTwo_SecFour_TxtTwo) ?  $CourseSectionOne->PTwo_SecFour_TxtTwo : $request->PTwo_SecFour_TxtTwo,
//         $CourseSectionOne->PTwo_SecFour_TxtThree = is_null($request->PTwo_SecFour_TxtThree) ?  $CourseSectionOne->PTwo_SecFour_TxtThree : $request->PTwo_SecFour_TxtThree,
//         $CourseSectionOne->PTwo_SecFive_Policy = is_null($request->PTwo_SecFive_Policy) ?  $CourseSectionOne->PTwo_SecFive_Policy : $request->PTwo_SecFive_Policy,
//         $CourseSectionOne->MoreOne_SecOne = is_null($request->MoreOne_SecOne) ?  $CourseSectionOne->MoreOne_SecOne : $request->MoreOne_SecOne,
//         $CourseSectionOne->MoreOne_SecTwo_TxtOne = is_null($request->MoreOne_SecTwo_TxtOne) ?  $CourseSectionOne->MoreOne_SecTwo_TxtOne : $request->MoreOne_SecTwo_TxtOne,
//         $CourseSectionOne->MoreOne_SecTwo_ColOne = is_null($request->MoreOne_SecTwo_ColOne) ?  $CourseSectionOne->MoreOne_SecTwo_ColOne : $request->MoreOne_SecTwo_ColOne,
//         $CourseSectionOne->MoreOne_SecTwo_ColTwo = is_null($request->MoreOne_SecTwo_ColTwo) ?  $CourseSectionOne->MoreOne_SecTwo_ColTwo : $request->MoreOne_SecTwo_ColTwo,
//         $CourseSectionOne->MoreOne_SecTwo_ColThree = is_null($request->MoreOne_SecTwo_ColThree) ?  $CourseSectionOne->MoreOne_SecTwo_ColThree : $request->MoreOne_SecTwo_ColThree,
//         $CourseSectionOne->MoreOne_SecThree_Txt = is_null($request->MoreOne_SecThree_Txt) ?  $CourseSectionOne->MoreOne_SecThree_Txt : $request->MoreOne_SecThree_Txt,
//         $CourseSectionOne->MoreOne_SecThree_Img = is_null($request->MoreOne_SecThree_Img) ?  $CourseSectionOne->MoreOne_SecThree_Img : $request->MoreOne_SecThree_Img,
//         $CourseSectionOne->MoreTwo_SecOne = is_null($request->MoreTwo_SecOne) ?  $CourseSectionOne->MoreTwo_SecOne : $request->MoreTwo_SecOne,
//         $CourseSectionOne->MoreTwo_SecTwo_TxtOne = is_null($request->MoreTwo_SecTwo_TxtOne) ?  $CourseSectionOne->MoreTwo_SecTwo_TxtOne : $request->MoreTwo_SecTwo_TxtOne,
//         $CourseSectionOne->MoreTwo_SecTwo_ColOne = is_null($request->MoreTwo_SecTwo_ColOne) ?  $CourseSectionOne->MoreTwo_SecTwo_ColOne : $request->MoreTwo_SecTwo_ColOne,
//         $CourseSectionOne->MoreTwo_SecTwo_ColTwo = is_null($request->MoreTwo_SecTwo_ColTwo) ?  $CourseSectionOne->MoreTwo_SecTwo_ColTwo : $request->MoreTwo_SecTwo_ColTwo,
//         $CourseSectionOne->MoreTwo_SecTwo_ColThree = is_null($request->MoreTwo_SecTwo_ColThree) ?  $CourseSectionOne->MoreTwo_SecTwo_ColThree : $request->MoreTwo_SecTwo_ColThree,
//         $CourseSectionOne->MoreTwo_SecThree_Txt = is_null($request->MoreTwo_SecThree_Txt) ?  $CourseSectionOne->MoreTwo_SecThree_Txt : $request->MoreTwo_SecThree_Txt,
//         $CourseSectionOne->MoreTwo_SecThree_Img = is_null($request->MoreTwo_SecThree_Img) ?  $CourseSectionOne->MoreTwo_SecThree_Img : $request->MoreTwo_SecThree_Img, 


//         $CourseSectionOne->MoreThree_SecOne = is_null($request->MoreThree_SecOne) ?  $CourseSectionOne->MoreThree_SecOne : $request->MoreThree_SecOne, 
//         $CourseSectionOne->MoreThree_SecTwo = is_null($request->MoreThree_SecTwo) ?  $CourseSectionOne->MoreThree_SecTwo : $request->MoreThree_SecTwo, 
//         $CourseSectionOne->MoreThree_SecThree_Txt = is_null($request->MoreThree_SecThree_Txt) ?  $CourseSectionOne->MoreThree_SecThree_Txt : $request->MoreThree_SecThree_Txt, 
//         $CourseSectionOne->MoreThree_SecThree_Img = is_null($request->MoreThree_SecThree_Img) ?  $CourseSectionOne->MoreThree_SecThree_Img : $request->MoreThree_SecThree_Img, 
//         $CourseSectionOne->MoreFour_SecOne = is_null($request->MoreFour_SecOne) ?  $CourseSectionOne->MoreFour_SecOne : $request->MoreFour_SecOne, 
//         $CourseSectionOne->MoreFour_SecTwo = is_null($request->MoreFour_SecTwo) ?  $CourseSectionOne->MoreFour_SecTwo : $request->MoreFour_SecTwo, 
//         $CourseSectionOne->MoreFour_SecThree_Txt = is_null($request->MoreFour_SecThree_Txt) ?  $CourseSectionOne->MoreFour_SecThree_Txt : $request->MoreFour_SecThree_Txt, 
//         $CourseSectionOne->MoreFour_SecThree_Img = is_null($request->MoreFour_SecThree_Img) ?  $CourseSectionOne->MoreFour_SecThree_Img : $request->MoreFour_SecThree_Img
       



        
//     ]), 201);
// }



      public function updateCourseSectionOne(Request $request){

        $CourseSectionOne = Course::firstOrNew();
        return $this->response->jsonResponse(false,'update course section Successfully',  $CourseSectionOne->update([
        $CourseSectionOne->PTwo_SecOne_TxtOne = is_null($request->PTwo_SecOne_TxtOne) ?  $CourseSectionOne->PTwo_SecOne_TxtOne : $request->PTwo_SecOne_TxtOne,
        $CourseSectionOne->PTwo_SecOne_TxtTwo = is_null($request->PTwo_SecOne_TxtTwo) ?  $CourseSectionOne->PTwo_SecOne_TxtTwo : $request->PTwo_SecOne_TxtTwo,
        $CourseSectionOne->PTwo_SecOne_TxtThree = is_null($request->PTwo_SecOne_TxtThree) ?  $CourseSectionOne->PTwo_SecOne_TxtThree : $request->PTwo_SecOne_TxtThree,
        $CourseSectionOne->PTwo_SecOne_TxtFour = is_null($request->PTwo_SecOne_TxtFour) ?  $CourseSectionOne->PTwo_SecOne_TxtFour : $request->PTwo_SecOne_TxtFour,
        $CourseSectionOne->PTwo_SecOne_TxtFive = is_null($request->PTwo_SecOne_TxtFive) ?  $CourseSectionOne->PTwo_SecOne_TxtFive : $request->PTwo_SecOne_TxtFive,
        $CourseSectionOne->PTwo_SecOne_Img = is_null($request->PTwo_SecOne_Img) ?  $CourseSectionOne->PTwo_SecOne_Img : $request->PTwo_SecOne_Img,
        $CourseSectionOne->PTwo_SecTwo_Img = is_null($request->PTwo_SecTwo_Img) ?  $CourseSectionOne->PTwo_SecTwo_Img : $request->PTwo_SecTwo_Img,
        $CourseSectionOne->PTwo_SecTwo_TxtOne = is_null($request->PTwo_SecTwo_TxtOne) ?  $CourseSectionOne->PTwo_SecTwo_TxtOne : $request->PTwo_SecTwo_TxtOne,
        $CourseSectionOne->PTwo_SecTwo_TxtTwo = is_null($request->PTwo_SecTwo_TxtTwo) ?  $CourseSectionOne->PTwo_SecTwo_TxtTwo : $request->PTwo_SecTwo_TxtTwo,
        $CourseSectionOne->PTwo_SecTwo_TxtThree = is_null($request->PTwo_SecTwo_TxtThree) ?  $CourseSectionOne->PTwo_SecTwo_TxtThree : $request->PTwo_SecTwo_TxtThree,
        $CourseSectionOne->PTwo_SecTwo_TxtFour = is_null($request->PTwo_SecTwo_TxtFour) ?  $CourseSectionOne->PTwo_SecTwo_TxtFour : $request->PTwo_SecTwo_TxtFour,
        $CourseSectionOne->PTwo_SecThree_TxtOne = is_null($request->PTwo_SecThree_TxtOne) ?  $CourseSectionOne->PTwo_SecThree_TxtOne : $request->PTwo_SecThree_TxtOne,
        $CourseSectionOne->PTwo_SecThree_TxtTwo = is_null($request->PTwo_SecThree_TxtTwo) ?  $CourseSectionOne->PTwo_SecThree_TxtTwo : $request->PTwo_SecThree_TxtTwo,
        $CourseSectionOne->PTwo_SecThree_TxtThree = is_null($request->PTwo_SecThree_TxtThree) ?  $CourseSectionOne->PTwo_SecThree_TxtThree : $request->PTwo_SecThree_TxtThree,
        $CourseSectionOne->PTwo_SecThree_Img = is_null($request->PTwo_SecThree_Img) ?  $CourseSectionOne->PTwo_SecThree_Img : $request->PTwo_SecThree_Img,
        $CourseSectionOne->PTwo_SecFour_Img = is_null($request->PTwo_SecFour_Img) ?  $CourseSectionOne->PTwo_SecFour_Img : $request->PTwo_SecFour_Img,

        $CourseSectionOne->PTwo_SecFour_TxtOne = is_null($request->PTwo_SecFour_TxtOne) ?  $CourseSectionOne->PTwo_SecFour_TxtOne : $request->PTwo_SecFour_TxtOne,
        $CourseSectionOne->PTwo_SecFour_TxtTwo = is_null($request->PTwo_SecFour_TxtTwo) ?  $CourseSectionOne->PTwo_SecFour_TxtTwo : $request->PTwo_SecFour_TxtTwo,
        $CourseSectionOne->PTwo_SecFour_TxtThree = is_null($request->PTwo_SecFour_TxtThree) ?  $CourseSectionOne->PTwo_SecFour_TxtThree : $request->PTwo_SecFour_TxtThree,
      
        $CourseSectionOne->PTwo_SecFive_TxtOne = is_null($request->PTwo_SecFive_TxtOne) ?  $CourseSectionOne->PTwo_SecFive_TxtOne : $request->PTwo_SecFive_TxtOne,
        $CourseSectionOne->PTwo_SecFive_TxtTwo = is_null($request->PTwo_SecFive_TxtTwo) ?  $CourseSectionOne->PTwo_SecFive_TxtTwo : $request->PTwo_SecFive_TxtTwo,
        $CourseSectionOne->PTwo_SecFive_TxtThree = is_null($request->PTwo_SecFive_TxtThree) ?  $CourseSectionOne->PTwo_SecFive_TxtThree : $request->PTwo_SecFive_TxtThree,
        $CourseSectionOne->PTwo_SecFive_Img = is_null($request->PTwo_SecFive_Img) ?  $CourseSectionOne->PTwo_SecFive_Img : $request->PTwo_SecFive_Img,

        $CourseSectionOne->PTwo_SecFive_Policy = is_null($request->PTwo_SecFive_Policy) ?  $CourseSectionOne->PTwo_SecFive_Policy : $request->PTwo_SecFive_Policy,
        $CourseSectionOne->MoreOne_SecOne = is_null($request->MoreOne_SecOne) ?  $CourseSectionOne->MoreOne_SecOne : $request->MoreOne_SecOne,
        $CourseSectionOne->MoreOne_SecTwo_TxtOne = is_null($request->MoreOne_SecTwo_TxtOne) ?  $CourseSectionOne->MoreOne_SecTwo_TxtOne : $request->MoreOne_SecTwo_TxtOne,
        $CourseSectionOne->MoreOne_SecTwo_ColOne = is_null($request->MoreOne_SecTwo_ColOne) ?  $CourseSectionOne->MoreOne_SecTwo_ColOne : $request->MoreOne_SecTwo_ColOne,
        $CourseSectionOne->MoreOne_SecTwo_ColTwo = is_null($request->MoreOne_SecTwo_ColTwo) ?  $CourseSectionOne->MoreOne_SecTwo_ColTwo : $request->MoreOne_SecTwo_ColTwo,
        $CourseSectionOne->MoreOne_SecTwo_ColThree = is_null($request->MoreOne_SecTwo_ColThree) ?  $CourseSectionOne->MoreOne_SecTwo_ColThree : $request->MoreOne_SecTwo_ColThree,
        $CourseSectionOne->MoreOne_SecThree_Txt = is_null($request->MoreOne_SecThree_Txt) ?  $CourseSectionOne->MoreOne_SecThree_Txt : $request->MoreOne_SecThree_Txt,
        $CourseSectionOne->MoreOne_SecThree_Img = is_null($request->MoreOne_SecThree_Img) ?  $CourseSectionOne->MoreOne_SecThree_Img : $request->MoreOne_SecThree_Img,
        $CourseSectionOne->MoreTwo_SecOne = is_null($request->MoreTwo_SecOne) ?  $CourseSectionOne->MoreTwo_SecOne : $request->MoreTwo_SecOne,
        $CourseSectionOne->MoreTwo_SecTwo_TxtOne = is_null($request->MoreTwo_SecTwo_TxtOne) ?  $CourseSectionOne->MoreTwo_SecTwo_TxtOne : $request->MoreTwo_SecTwo_TxtOne,
        $CourseSectionOne->MoreTwo_SecTwo_ColOne = is_null($request->MoreTwo_SecTwo_ColOne) ?  $CourseSectionOne->MoreTwo_SecTwo_ColOne : $request->MoreTwo_SecTwo_ColOne,
        $CourseSectionOne->MoreTwo_SecTwo_ColTwo = is_null($request->MoreTwo_SecTwo_ColTwo) ?  $CourseSectionOne->MoreTwo_SecTwo_ColTwo : $request->MoreTwo_SecTwo_ColTwo,
        $CourseSectionOne->MoreTwo_SecTwo_ColThree = is_null($request->MoreTwo_SecTwo_ColThree) ?  $CourseSectionOne->MoreTwo_SecTwo_ColThree : $request->MoreTwo_SecTwo_ColThree,
        $CourseSectionOne->MoreTwo_SecThree_Txt = is_null($request->MoreTwo_SecThree_Txt) ?  $CourseSectionOne->MoreTwo_SecThree_Txt : $request->MoreTwo_SecThree_Txt,
        $CourseSectionOne->MoreTwo_SecThree_Img = is_null($request->MoreTwo_SecThree_Img) ?  $CourseSectionOne->MoreTwo_SecThree_Img : $request->MoreTwo_SecThree_Img, 


        $CourseSectionOne->MoreThree_SecOne = is_null($request->MoreThree_SecOne) ?  $CourseSectionOne->MoreThree_SecOne : $request->MoreThree_SecOne, 
        $CourseSectionOne->MoreThree_SecTwo = is_null($request->MoreThree_SecTwo) ?  $CourseSectionOne->MoreThree_SecTwo : $request->MoreThree_SecTwo, 
        $CourseSectionOne->MoreThree_SecThree_Txt = is_null($request->MoreThree_SecThree_Txt) ?  $CourseSectionOne->MoreThree_SecThree_Txt : $request->MoreThree_SecThree_Txt, 
        $CourseSectionOne->MoreThree_SecThree_Img = is_null($request->MoreThree_SecThree_Img) ?  $CourseSectionOne->MoreThree_SecThree_Img : $request->MoreThree_SecThree_Img, 
        $CourseSectionOne->MoreFour_SecOne = is_null($request->MoreFour_SecOne) ?  $CourseSectionOne->MoreFour_SecOne : $request->MoreFour_SecOne, 
        $CourseSectionOne->MoreFour_SecTwo = is_null($request->MoreFour_SecTwo) ?  $CourseSectionOne->MoreFour_SecTwo : $request->MoreFour_SecTwo, 
        $CourseSectionOne->MoreFour_SecThree_Txt = is_null($request->MoreFour_SecThree_Txt) ?  $CourseSectionOne->MoreFour_SecThree_Txt : $request->MoreFour_SecThree_Txt, 
        $CourseSectionOne->MoreFour_SecThree_Img = is_null($request->MoreFour_SecThree_Img) ?  $CourseSectionOne->MoreFour_SecThree_Img : $request->MoreFour_SecThree_Img,
       
        $CourseSectionOne->MoreFive_SecOne = is_null($request->MoreFive_SecOne) ?  $CourseSectionOne->MoreFive_SecOne : $request->MoreFive_SecOne, 
        $CourseSectionOne->MoreFive_SecTwo = is_null($request->MoreFive_SecTwo) ?  $CourseSectionOne->MoreFive_SecTwo : $request->MoreFive_SecTwo, 
        $CourseSectionOne->MoreFive_SecThree_Txt = is_null($request->MoreFive_SecThree_Txt) ?  $CourseSectionOne->MoreFive_SecThree_Txt : $request->MoreFive_SecThree_Txt, 
        $CourseSectionOne->MoreFive_SecThree_Img = is_null($request->MoreFive_SecThree_Img) ?  $CourseSectionOne->MoreFive_SecThree_Img : $request->MoreFive_SecThree_Img, 
    ]), 201);
}
public function imageUpload(Request $request)
{
    if($request->hasFile('image')) {
        switch( $request->menu ) {
            case 'coursesSectionOne':
                $uploadUrl = $this->response->cloudinaryImage($request->file('image'), 'courses','section_one_image');
                 $uploadUrl = $this->getCroppedImage(100, 100, $uploadUrl);
                 Course::first()->update(['PTwo_SecOne_Img' => $uploadUrl]);
                 return $this->response->jsonResponse(false, 'Image uploaded successfully', $request->menu, 201);
                 break;
            case 'coursesSectionTwo':
                $uploadUrl = $this->response->cloudinaryImage($request->file('image'), 'home','section_two_image');
                 $uploadUrl = $this->getCroppedImage(500, 500, $uploadUrl);
                 Course::first()->update(['PTwo_SecTwo_Img' => $uploadUrl]);
                 return $this->response->jsonResponse(false, 'Image uploaded successfully', $request->menu, 201);

                 break;
            case 'coursesSectionThree':
                $uploadUrl = $this->response->cloudinaryImage($request->file('image'), 'home','section_three_image');
                $uploadUrl = $this->getCroppedImage(500, 500, $uploadUrl);
                Course::first()->update(['PTwo_SecThree_Img' => $uploadUrl]);
                return $this->response->jsonResponse(false, 'Image uploaded successfully', $request->menu, 201);
                break;
            case 'coursesSectionFour':
                $uploadUrl = $this->response->cloudinaryImage($request->file('image'), 'home','section_four_image');
                $uploadUrl = $this->getCroppedImage(500, 500, $uploadUrl);
                Course::first()->update(['PTwo_SecFour_Img' => $uploadUrl]);
                return $this->response->jsonResponse(false, 'Image uploaded successfully', $request->menu, 201);
                break;
        }
   } else {
        return $this->response->jsonResponse(true, 'Image Size is too high', [], 202);
    }
}


}

