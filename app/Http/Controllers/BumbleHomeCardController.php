<?php

namespace App\Http\Controllers;
use App\Repositories\ResponseRepository;
use App\Models\BumbleHomeCard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class BumbleHomeCardController extends Controller
{


     public function __construct(ResponseRepository $response)
    {
        $this->response = $response;
        $this->storeRules = [
            'home_card_1_img' => 'required',
            'home_card_1_iconImg' => 'required',
            'home_card1_heading' => 'required',
            'home_card_1_textcontent' => 'required',
            'home_card_2_img' => 'required',
            'home_card2_iconImg' => 'required',
            'home_card2_heading' => 'required',
            'home_card2_textcontent' => 'required',
            'home_card3_img'=> 'required',
            'home_card_3_iconImg'=> 'required',
            'home_card3_heading'=> 'required',
            'home_card3_textcontent'=> 'required',
            'home_bigsizetext' => 'required',
            'home_whoarewe_text' => 'required',
            'home_video_url' => 'required',
        ];
    }
    //
    public function getHomecontent(){
        return $this->response->jsonresponse(false,"Banner Section Fetched Successfully",BumbleHomeCard::all(),200);
    }

    public function updateHomeCard1(Request $request){
        Log::info("request = ".$request);

        $homecard =BumbleHomeCard ::first();
        $homecard->update(['home_card1_heading'=>$request->home_card1_heading,
                                    'home_card_1_textcontent'=>$request->home_card_1_textcontent]);
        return $this->response->jsonResponse(false,'updated Successfully', [], 201);
    }

    public function updateHomeCard2(Request $request){
        Log::info("request = ".$request);

        $homecard =BumbleHomeCard ::first();
        $homecard->update(['home_card2_heading'=>$request->home_card2_heading,
                                    'home_card2_textcontent'=>$request->home_card2_textcontent  ]);
        return $this->response->jsonResponse(false,'updated Successfully', [], 201);
    }

    public function updateHomeCard3(Request $request){
        Log::info("request = ".$request);
        $homecard =BumbleHomeCard ::first();
        $homecard->update(['home_card3_heading'=>$request->home_card3_heading,
                                    'home_card3_textcontent'=>$request->home_card3_textcontent]);
        return $this->response->jsonResponse(false,'updated Successfully', [], 201);
    }





    public function updateHometextarea(Request $request){
        Log::info("request = ".$request);
        $homecard = BumbleHomeCard ::first();
        $homecard->update(['home_bigsizetext'=>$request->home_bigsizetext,
                                    'home_whoarewe_text'=>$request->home_whoarewe_text,
                                    'home_video_url'=>$request->home_video_url,
                                     ]);
        return $this->response->jsonResponse(false,'updated Successfully', [], 201);
    }

}
