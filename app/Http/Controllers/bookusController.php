<?php


namespace App\Http\Controllers;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use App\Models\bookus;
use App\Models\homebookus;
use App\Repositories\ResponseRepository;

class bookusController extends Controller
{
    public function __construct(ResponseRepository $response)
    {
        $this->response = $response;
        $this->storeRules = [
            'bride_groomname',
            'email' => 'required',
            'phone' => 'required',
            'weddingtype' => 'required',
            'event' => 'required',
            'date' => 'required',
            'location' => 'required',
            'venue' => 'required',
            'time' => 'required',
            'crowdstrength' => 'required',
            'tellusmore' => 'required',
            'city' => 'required',


        ];
        $this->homeBookusStoreRules = [

            'name' => 'required',
            'mobile' => 'required',



        ];
    }

    public function storebookus(Request $request){
        $validate = $this->response->validate($request->all(), $this->storeRules);
        if($validate === true) {
            return $this->response->jsonResponse(false, "Testimony Created Successfully", bookus::create($request->all()), 200);
        } else {
            return $validate;
        }
    }

    public function getbookus(){

        return $this->response->jsonResponse(false,"Testimony Content Fetched Successfully",bookus::orderBy('date', 'desc')->get(), 200);

      }

      public function storehomebookus(Request $request){
        $validate = $this->response->validate($request->all(), $this->homeBookusStoreRules);
        if($validate === true) {
            return $this->response->jsonResponse(false, "Testimony Created Successfully", homebookus::create($request->all()), 200);
        } else {
            return $validate;
        }
    }


    public function gethomebookus(){

        return $this->response->jsonResponse(false,"Testimony Content Fetched Successfully",homebookus::all(), 200);

      }
    //
}
