<?php




namespace App\Http\Controllers;
use App\Repositories\ResponseRepository;
use App\Models\gallerymodel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class gallerycontroller extends Controller
{
    //

    public function __construct(ResponseRepository $response)
    {
        $this->response = $response;

    }
    public function getgallerycontent(){
        return $this->response->jsonresponse(false,"Banner Section Fetched Successfully",gallerymodel::all(),200);
    }

    public function updateWeddingText(Request $request){
        Log::info("request = ".$request);
        $homecard = gallerymodel ::first();
        $homecard->update(['weddingtextcontent'=>$request->weddingtextcontent,

                                     ]);
        return $this->response->jsonResponse(false,'updated Successfully', [], 201);
    }
    public function updateOutdoorsText(Request $request){
        Log::info("request = ".$request);
        $homecard = gallerymodel ::first();
        $homecard->update([
                                    'outdoorstextcontent'=>$request->outdoorstextcontent,

                                     ]);
        return $this->response->jsonResponse(false,'updated Successfully', [], 201);
    }
    public function updateBabywashText(Request $request){
        Log::info("request = ".$request);
        $homecard = gallerymodel ::first();
        $homecard->update([
                                    'babywashtextcontent'=>$request->babywashtextcontent,
                                     ]);
        return $this->response->jsonResponse(false,'updated Successfully', [], 201);
    }
    public function updateAllText(Request $request){
        Log::info("request = ".$request);
        $homecard = gallerymodel ::first();
        $homecard->update(['alltextcontent'=>$request->alltextcontent,

                                     ]);
        return $this->response->jsonResponse(false,'updated Successfully', [], 201);
    }






}

