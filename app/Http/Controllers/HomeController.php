<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Home;
use App\Models\Testimonies;
use App\Repositories\ResponseRepository;
use Illuminate\Support\Facades\Log;

class HomeController extends Controller
{
    public function __construct(ResponseRepository $response)
    {
        $this->response = $response;
        $this->storeRules = [
          'one_header' => 'required',
          'one_box_one_count'=> 'required',
          'one_box_one_label' => 'required',
          'one_box_two_count' => 'required',
          'one_box_two_label'=> 'required',
          'one_box_three_count' => 'required',
          'one_box_three_label' => 'required',
      ];
      $this->storeRules2 = [
        'name' => 'required',
        'designation'=> 'required',
        'quote' => 'required'
    ];
    $this->storeRulesHeaderOne = [
        'home_eqp_txt_one' => 'required'
    ];
    $this->storeRulesTestimonyHeader = [
        'three_header' => 'required'
    ];
    $this->storeRulesHeaderTwo = [
        'home_eqp_txt_two' => 'required'
    ];
    $this->storeRulesHeaderThree = [
        'home_eqp_txt_three' => 'required'
    ];
    $this->storeRulesHeaderFour = [
        'home_eqp_txt_four' => 'required'
    ];
    $this->storeRulesHeaderFive = [
        'home_eqp_txt_five' => 'required'
    ];
    }
    public function getHomeSection(){
       $data = Home::with('testimonies')->get();
       return $this->response->jsonResponse(false,"Home Content Fetched Successfully", $data, 200);

    }

    public function getTestimonyById($id){
      $data = Testimonies::where('id', $id)->get();
      return $this->response->jsonResponse(false,"Testimony Content Fetched Successfully", $data, 200);

   }

public function storeHomeSection(Request $request)
{
    $validate = $this->response->validate($request->all(), $this->storeRules);
    if($validate === true) {
         $home = Home::create($request->all());
        return $this->response->jsonResponse(false, $this->response->message('Home', 'store'), '', 200);
    } else {
         return $this->response->jsonResponse(true,  'Testimony store failed', $validate , 201);
    }
}

  public function updateHomeSection(Request $request)
  {
      $validate = $this->response->validate($request->all(), $this->storeRules);
      if($validate === true) {
        $home = Home::first()->update($request->all());
          return $this->response->jsonResponse(false, $this->response->message('Home', 'update'),'' , 200);
      } else {
          return $this->response->jsonResponse(true, 'Testimony Update Failed', $validate , 201);
      }
  }

  public function updateHomeEqpTextOne(Request $request)
  {
      $validate = $this->response->validate($request->all(), $this->storeRulesHeaderOne);
      if($validate === true) {
        $home = Home::first()->update(['home_eqp_txt_one' => $request->home_eqp_txt_one]);
          return $this->response->jsonResponse(false, $this->response->message('Home Header One', 'update'),'' , 200);
      } else {
          return $this->response->jsonResponse(true, ' Header One Update Failed', $validate , 201);
      }
  }
  public function updateHomeEqpTextTwo(Request $request)
  {
      $validate = $this->response->validate($request->all(), $this->storeRulesHeaderTwo);
      if($validate === true) {
        $home = Home::first()->update(['home_eqp_txt_two' => $request->home_eqp_txt_two]);
          return $this->response->jsonResponse(false, $this->response->message('Home Header Two', 'update'),'' , 200);
      } else {
          return $this->response->jsonResponse(true, 'Header Two Update Failed', $validate , 201);
      }
  }
  public function updateHomeEqpTextThree(Request $request)
  {
      $validate = $this->response->validate($request->all(), $this->storeRulesHeaderThree);
      if($validate === true) {
        $home = Home::first()->update(['home_eqp_txt_three' => $request->home_eqp_txt_three]);
          return $this->response->jsonResponse(false, $this->response->message('Home Header Three', 'update'),'' , 200);
      } else {
          return $this->response->jsonResponse(true, 'Header Three Update Failed', $validate , 201);
      }
  }
  public function updateHomeEqpTextFour(Request $request)
  {
      $validate = $this->response->validate($request->all(), $this->storeRulesHeaderFour);
      if($validate === true) {
        $home = Home::first()->update(['home_eqp_txt_four' => $request->home_eqp_txt_four]);
          return $this->response->jsonResponse(false, $this->response->message('Home Header Four', 'update'),'' , 200);
      } else {
          return $this->response->jsonResponse(true, 'Header Four Update Failed', $validate , 201);
      }
  }
  public function updateHomeEqpTextFive(Request $request)
  {
      $validate = $this->response->validate($request->all(), $this->storeRulesHeaderFive);
      if($validate === true) {
        $home = Home::first()->update(['home_eqp_txt_five' => $request->home_eqp_txt_five]);
          return $this->response->jsonResponse(false, $this->response->message('Home Header Five', 'update'),'' , 200);
      } else {
          return $this->response->jsonResponse(true, 'Header Five Update Failed', $validate , 201);
      }
  }

  public function updateTestimonyHeader(Request $request)
  {
      $validate = $this->response->validate($request->all(), $this->storeRulesTestimonyHeader);
      if($validate === true) {
        $home = Home::first()->update(['three_header' => $request->three_header]);
          return $this->response->jsonResponse(false, $this->response->message('Testimony', 'update'),'' , 200);
      } else {
          return $this->response->jsonResponse(true, 'Testimony Update Failed', $validate , 201);
      }
  }

   public function storeHomeTestimony(Request $request)
    {
        $validate = $this->response->validate($request->all(), $this->storeRules2);
        if($validate === true) {
            return $this->response->jsonResponse(false, $this->response->message('Testimony', 'store'), Testimonies::create($request->all()), 200);
        } else {
            return $this->response->jsonResponse(true, 'Testimony store failed', $validate, 201);
        }
    }

  public function updateHomeTestimony(Request $request)
  {
      $validate = $this->response->validate($request->all(), $this->storeRules2);
        if($validate === true) {
          $testimony = Testimonies::where('id',$request->id);
          $testimony->update($request->all());
             return $this->response->jsonResponse(false, $this->response->message('Testimony', 'update'), '', 200);
        } else {
            return $this->response->jsonResponse(true, 'Testimony Update Failed', $validate, 202);
        }
  }

 

  public function deleteTestimonyById($id)
    {
        $testimony = Testimonies::where('id', $id);
        if($testimony->exists()) {

            return $this->response->jsonResponse(false, $this->response->message('Testimony', 'destroy'), $testimony->delete(), 200);
        }
        return $this->response->jsonResponse(true, 'Testimony Not Exists',[], 201);
    }


}
