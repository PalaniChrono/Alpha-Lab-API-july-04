<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\OtherCourse;
use App\Repositories\ResponseRepository;
use Illuminate\Support\Facades\Log;

class OtherCourseController extends Controller
{
    
    public function __construct(ResponseRepository $response)
    {
        $this->response = $response;
    }

    public function getOtherCourseSection(){
   
        return $this->response->jsonResponse(false,"Other Courses Fetched Successfully",OtherCourse::all(), 200);
  
      }
      
public function updateOtherCourseSectionOne(Request $request){
    $CourseOtherSection = OtherCourse::first();
    $CourseOtherSection->update(['PTwo_SecTwo_TxtOne'=>$request->PTwo_SecTwo_TxtOne,
                                'PTwo_SecTwo_TxtTwo'=>$request->PTwo_SecTwo_TxtTwo,
                                'PTwo_SecTwo_TxtFour'=>$request->PTwo_SecTwo_TxtFour,
                                'MoreTwo_SecOne'=>$request->MoreTwo_SecOne,
                                'MoreTwo_SecTwo_TxtOne'=>$request->MoreTwo_SecTwo_TxtOne,
                                'MoreTwo_SecTwo_ColOne'=>$request->MoreTwo_SecTwo_ColOne,
                                'MoreTwo_SecTwo_ColTwo'=>$request->MoreTwo_SecTwo_ColTwo,
                                'MoreTwo_SecTwo_ColThree'=>$request->MoreTwo_SecTwo_ColThree,
                                'MoreTwo_SecThree_Txt'=>$request->MoreTwo_SecThree_Txt,
                                'MoreTwo_SecThree_Img'=>$request->MoreTwo_SecThree_Img]);
    return $this->response->jsonResponse(false,'updated Other Courses Successfully', [], 201);

//     return $this->response->jsonResponse(false,'update course section Successfully',  $CourseSectionOne->update([
//     $CourseOtherSection->PTwo_SecOne_TxtOne = is_null($request->PTwo_SecOne_TxtOne) ?  $CourseOtherSection->PTwo_SecOne_TxtOne : $request->PTwo_SecOne_TxtOne,
//     $CourseOtherSection->PTwo_SecOne_TxtTwo = is_null($request->PTwo_SecOne_TxtTwo) ?  $CourseOtherSection->PTwo_SecOne_TxtTwo : $request->PTwo_SecOne_TxtTwo,
//     $CourseOtherSection->PTwo_SecOne_TxtThree = is_null($request->PTwo_SecOne_TxtThree) ?  $CourseOtherSection->PTwo_SecOne_TxtThree : $request->PTwo_SecOne_TxtThree,
//     $CourseOtherSection->PTwo_SecOne_TxtFour = is_null($request->PTwo_SecOne_TxtFour) ?  $CourseOtherSection->PTwo_SecOne_TxtFour : $request->PTwo_SecOne_TxtFour,
//     $CourseOtherSection->PTwo_SecOne_TxtFive = is_null($request->PTwo_SecOne_TxtFive) ?  $CourseOtherSection->PTwo_SecOne_TxtFive : $request->PTwo_SecOne_TxtFive,
//     $CourseOtherSection->PTwo_SecOne_Img = is_null($request->PTwo_SecOne_Img) ?  $CourseOtherSection->PTwo_SecOne_Img : $request->PTwo_SecOne_Img,
//     $CourseOtherSection->PTwo_SecTwo_Img = is_null($request->PTwo_SecTwo_Img) ?  $CourseOtherSection->PTwo_SecTwo_Img : $request->PTwo_SecTwo_Img,
//     $CourseOtherSection->PTwo_SecTwo_TxtOne = is_null($request->PTwo_SecTwo_TxtOne) ?  $CourseOtherSection->PTwo_SecTwo_TxtOne : $request->PTwo_SecTwo_TxtOne,
//     $CourseOtherSection->PTwo_SecTwo_TxtTwo = is_null($request->PTwo_SecTwo_TxtTwo) ?  $CourseOtherSection->PTwo_SecTwo_TxtTwo : $request->PTwo_SecTwo_TxtTwo,
//     $CourseOtherSection->PTwo_SecTwo_TxtThree = is_null($request->PTwo_SecTwo_TxtThree) ?  $CourseOtherSection->PTwo_SecTwo_TxtThree : $request->PTwo_SecTwo_TxtThree,
//     $CourseOtherSection->PTwo_SecTwo_TxtFour = is_null($request->PTwo_SecTwo_TxtFour) ?  $CourseOtherSection->PTwo_SecTwo_TxtFour : $request->PTwo_SecTwo_TxtFour,
    
//     $CourseOtherSection->PTwo_SecThree_TxtOne = is_null($request->PTwo_SecThree_TxtOne) ?  $CourseOtherSection->PTwo_SecThree_TxtOne : $request->PTwo_SecThree_TxtOne,
//     $CourseOtherSection->PTwo_SecThree_TxtTwo = is_null($request->PTwo_SecThree_TxtTwo) ?  $CourseOtherSection->PTwo_SecThree_TxtTwo : $request->PTwo_SecThree_TxtTwo,
//     $CourseOtherSection->PTwo_SecThree_TxtThree = is_null($request->PTwo_SecThree_TxtThree) ?  $CourseOtherSection->PTwo_SecThree_TxtThree : $request->PTwo_SecThree_TxtThree,
//     $CourseOtherSection->PTwo_SecThree_Img = is_null($request->PTwo_SecThree_Img) ?  $CourseOtherSection->PTwo_SecThree_Img : $request->PTwo_SecThree_Img,
//     $CourseOtherSection->PTwo_SecFour_Img = is_null($request->PTwo_SecFour_Img) ?  $CourseOtherSection->PTwo_SecFour_Img : $request->PTwo_SecFour_Img,

//     $CourseOtherSection->PTwo_SecFour_TxtOne = is_null($request->PTwo_SecFour_TxtOne) ?  $CourseOtherSection->PTwo_SecFour_TxtOne : $request->PTwo_SecFour_TxtOne,
//     $CourseOtherSection->PTwo_SecFour_TxtTwo = is_null($request->PTwo_SecFour_TxtTwo) ?  $CourseOtherSection->PTwo_SecFour_TxtTwo : $request->PTwo_SecFour_TxtTwo,
//     $CourseOtherSection->PTwo_SecFour_TxtThree = is_null($request->PTwo_SecFour_TxtThree) ?  $CourseOtherSection->PTwo_SecFour_TxtThree : $request->PTwo_SecFour_TxtThree,

//     $CourseOtherSection->PTwo_SecFive_Policy = is_null($request->PTwo_SecFive_Policy) ?  $CourseOtherSection->PTwo_SecFive_Policy : $request->PTwo_SecFive_Policy,
//     $CourseOtherSection->MoreOne_SecOne = is_null($request->MoreOne_SecOne) ?  $CourseOtherSection->MoreOne_SecOne : $request->MoreOne_SecOne,
//     $CourseOtherSection->MoreOne_SecTwo_TxtOne = is_null($request->MoreOne_SecTwo_TxtOne) ?  $CourseOtherSection->MoreOne_SecTwo_TxtOne : $request->MoreOne_SecTwo_TxtOne,
//     $CourseOtherSection->MoreOne_SecTwo_ColOne = is_null($request->MoreOne_SecTwo_ColOne) ?  $CourseOtherSection->MoreOne_SecTwo_ColOne : $request->MoreOne_SecTwo_ColOne,
//     $CourseOtherSection->MoreOne_SecTwo_ColTwo = is_null($request->MoreOne_SecTwo_ColTwo) ?  $CourseOtherSection->MoreOne_SecTwo_ColTwo : $request->MoreOne_SecTwo_ColTwo,
//     $CourseOtherSection->MoreOne_SecTwo_ColThree = is_null($request->MoreOne_SecTwo_ColThree) ?  $CourseOtherSection->MoreOne_SecTwo_ColThree : $request->MoreOne_SecTwo_ColThree,
//     $CourseOtherSection->MoreOne_SecThree_Txt = is_null($request->MoreOne_SecThree_Txt) ?  $CourseOtherSection->MoreOne_SecThree_Txt : $request->MoreOne_SecThree_Txt,
//     $CourseOtherSection->MoreOne_SecThree_Img = is_null($request->MoreOne_SecThree_Img) ?  $CourseOtherSection->MoreOne_SecThree_Img : $request->MoreOne_SecThree_Img,
//     $CourseOtherSection->MoreTwo_SecOne = is_null($request->MoreTwo_SecOne) ?  $CourseOtherSection->MoreTwo_SecOne : $request->MoreTwo_SecOne,
//     $CourseOtherSection->MoreTwo_SecTwo_TxtOne = is_null($request->MoreTwo_SecTwo_TxtOne) ?  $CourseOtherSection->MoreTwo_SecTwo_TxtOne : $request->MoreTwo_SecTwo_TxtOne,
//     $CourseOtherSection->MoreTwo_SecTwo_ColOne = is_null($request->MoreTwo_SecTwo_ColOne) ?  $CourseOtherSection->MoreTwo_SecTwo_ColOne : $request->MoreTwo_SecTwo_ColOne,
//     $CourseOtherSection->MoreTwo_SecTwo_ColTwo = is_null($request->MoreTwo_SecTwo_ColTwo) ?  $CourseOtherSection->MoreTwo_SecTwo_ColTwo : $request->MoreTwo_SecTwo_ColTwo,
//     $CourseOtherSection->MoreTwo_SecTwo_ColThree = is_null($request->MoreTwo_SecTwo_ColThree) ?  $CourseOtherSection->MoreTwo_SecTwo_ColThree : $request->MoreTwo_SecTwo_ColThree,
//     $CourseOtherSection->MoreTwo_SecThree_Txt = is_null($request->MoreTwo_SecThree_Txt) ?  $CourseOtherSection->MoreTwo_SecThree_Txt : $request->MoreTwo_SecThree_Txt,
//     $CourseOtherSection->MoreTwo_SecThree_Img = is_null($request->MoreTwo_SecThree_Img) ?  $CourseOtherSection->MoreTwo_SecThree_Img : $request->MoreTwo_SecThree_Img, 


//     $CourseOtherSection->MoreThree_SecOne = is_null($request->MoreThree_SecOne) ?  $CourseOtherSection->MoreThree_SecOne : $request->MoreThree_SecOne, 
//     $CourseOtherSection->MoreThree_SecTwo = is_null($request->MoreThree_SecTwo) ?  $CourseOtherSection->MoreThree_SecTwo : $request->MoreThree_SecTwo, 
//     $CourseOtherSection->MoreThree_SecThree_Txt = is_null($request->MoreThree_SecThree_Txt) ?  $CourseOtherSection->MoreThree_SecThree_Txt : $request->MoreThree_SecThree_Txt, 
//     $CourseOtherSection->MoreThree_SecThree_Img = is_null($request->MoreThree_SecThree_Img) ?  $CourseOtherSection->MoreThree_SecThree_Img : $request->MoreThree_SecThree_Img, 
//     $CourseOtherSection->MoreFour_SecOne = is_null($request->MoreFour_SecOne) ?  $CourseOtherSection->MoreFour_SecOne : $request->MoreFour_SecOne, 
//     $CourseOtherSection->MoreFour_SecTwo = is_null($request->MoreFour_SecTwo) ?  $CourseOtherSection->MoreFour_SecTwo : $request->MoreFour_SecTwo, 
//     $CourseOtherSection->MoreFour_SecThree_Txt = is_null($request->MoreFour_SecThree_Txt) ?  $CourseOtherSection->MoreFour_SecThree_Txt : $request->MoreFour_SecThree_Txt, 
//     $CourseOtherSection->MoreFour_SecThree_Img = is_null($request->MoreFour_SecThree_Img) ?  $CourseOtherSection->MoreFour_SecThree_Img : $request->MoreFour_SecThree_Img
   
// ]), 201);
}
public function updateOtherCourseSectionTwo(Request $request){
    Log::info("request : ".$request);
    $CourseOtherSection = OtherCourse::first();
    $CourseOtherSection->update(['PTwo_SecThree_TxtOne'=>$request->PTwo_SecThree_TxtOne,
                                'PTwo_SecThree_TxtTwo'=>$request->PTwo_SecThree_TxtTwo,
                                'PTwo_SecThree_TxtThree'=>$request->PTwo_SecThree_TxtThree,
                                'PTwo_SecThree_Img'=>$request->PTwo_SecThree_Img,

                                'MoreThree_SecOne'=>$request->MoreThree_SecOne,
                                'MoreThree_SecTwo'=>$request->MoreThree_SecTwo,
                                'MoreThree_SecThree_Txt'=>$request->MoreThree_SecThree_Txt,
                                'MoreThree_SecThree_Img'=>$request->MoreThree_SecThree_Img,
                                 ]);
    return $this->response->jsonResponse(false,'updated Other Courses Successfully', [], 201);

}
public function updateOtherCourseSectionThree(Request $request){
    Log::info("request : ".$request);
    $CourseOtherSection = OtherCourse::first();
    $CourseOtherSection->update(['PTwo_SecFour_TxtOne'=>$request->PTwo_SecFour_TxtOne,
                                'PTwo_SecFour_TxtTwo'=>$request->PTwo_SecFour_TxtTwo,
                                'PTwo_SecFour_TxtThree'=>$request->PTwo_SecFour_TxtThree,
                                'PTwo_SecFour_Img'=>$request->PTwo_SecFour_Img,

                                'MoreFour_SecOne'=>$request->MoreFour_SecOne,
                                'MoreFour_SecTwo'=>$request->MoreFour_SecTwo,
                                'MoreFour_SecThree_Txt'=>$request->MoreFour_SecThree_Txt,
                                'MoreFour_SecThree_Img'=>$request->MoreFour_SecThree_Img,
                                 ]);
    return $this->response->jsonResponse(false,'updated Other Courses Successfully', [], 201);

}

}
