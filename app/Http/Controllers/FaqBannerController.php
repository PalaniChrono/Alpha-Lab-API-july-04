<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FaqBanner;
use App\Repositories\ResponseRepository;
use Illuminate\Support\Facades\Log;

class FaqBannerController extends Controller
{
    public function __construct(ResponseRepository $response)
    {
        $this->response = $response;
       
    }
    public function getFaqBanner(){
       $data = FaqBanner::all();
       return $this->response->jsonResponse(false,"FaqBanner Content Fetched Successfully", $data, 200);

    }


}
