<?php



namespace App\Http\Controllers;
use App\Repositories\ResponseRepository;
use App\Models\servicesModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;



class servicesController extends Controller
{
    public function __construct(ResponseRepository $response)
    {
        $this->response = $response;

    }
    public function getServicescontent(){
        return $this->response->jsonresponse(false,"Banner Section Fetched Successfully",servicesModel::all(),200);
    }

    public function updateServicestext(Request $request){
        Log::info("request = ".$request);
        $homecard = servicesModel ::first();
        $homecard->update(['services1_text'=>$request->services1_text,
        'services2_text'=>$request->services2_text,
        'services3_text'=>$request->services3_text,
        'services4_text'=>$request->services4_text,
        'services5_text'=>$request->services5_text,
        'services6_text'=>$request->services6_text,
        'services7_text'=>$request->services7_text,
        'services8_text'=>$request->services8_text,
        'services9_text'=>$request->services9_text,
        'services10_text'=>$request->services10_text,

                                     ]);
        return $this->response->jsonResponse(false,'updated Successfully', [], 201);
    }

}
