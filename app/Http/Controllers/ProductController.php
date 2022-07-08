<?php

namespace App\Http\Controllers;
use App\Models\Products;
use Illuminate\Http\Request;
use App\Repositories\ResponseRepository;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{
    public function __construct(ResponseRepository $response)
    {
        $this->response = $response;
        $this->storeRulesLeft = [
          'one_left_heading' => 'required',
          'one_left_content'=> 'required',
        ];
        $this->storeRulesRight = [
            'one_right_heading' => 'required',
            'one_right_content' => 'required',
          ];
          $this->storeRulesIndividual = [
            'two_header'=> 'required',
            'two_content' => 'required'
          ];
  
    }
    public function getProductSection(){
       $data = Products::all();
       return $this->response->jsonResponse(false,"Products Content Fetched Successfully", $data, 200);

    }

// public function storeProductsSection(Request $request)
// {
//     $validate = $this->response->validate($request->all(), $this->storeRules);
//     if($validate === true) {
//          $Products = Products::create($request->all());
//         return $this->response->jsonResponse(false, $this->response->message('Products', 'store'), '', 200);
//     } else {
//          return $this->response->jsonResponse(true,  'Products store failed', $validate , 201);
//     }
// }

  public function updateProductSection(Request $request)
  {
      if($request->type == 'corporate'){
        $validate = $this->response->validate($request->all(), $this->storeRulesLeft);
      }else if($request->type == 'institutions'){
        $validate = $this->response->validate($request->all(), $this->storeRulesRight);
      }else{
        $validate = $this->response->validate($request->all(), $this->storeRulesIndividual);
      }
      if($validate === true) {
        $Products = Products::first()->update($request->all());
          return $this->response->jsonResponse(false, $this->response->message('Products', 'update'),'' , 200);
      } else {
          return $this->response->jsonResponse(true, 'Products Update Failed', $validate , 201);
      }
  }


}
