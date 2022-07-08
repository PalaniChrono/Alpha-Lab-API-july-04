<?php

namespace App\Repositories;

use Illuminate\Http\Request;
use App\Repositories\ResponseRepository;
use GuzzleHttp\Client;

class SmsRepository
{
    public $authkey = '343294At8mn1OQjeM5f758356P1';
    public $template_id = '5fe40f2370e96e03757a2a7d';
    public function __construct(ResponseRepository $response) {
        $this->response = $response;
    }

    public function sendOTP($mobile) {
        $otp = $this->generateOTP();
         $baseUrl = 'https://api.msg91.com/api/v5/otp?authkey='.$this->authkey.'&template_id='.$this->template_id.'&mobile=91'.$mobile.'&invisible=1&otp='.$otp;
         $client = new Client();
         $res = $client->request('GET', $baseUrl);
        return $otp;
        // return $this->response->jsonResponse(false, 'Success', json_decode($res->getBody()), 201);
    }

    // public function verifyOTP($mobile, $otp) {
    //     $baseUrl = 'https://api.msg91.com/api/v5/otp/verify?authkey='.$this->authkey.'&mobile=91'.$mobile.'&otp='.$otp;
    //     $client = new Client();
    //     $res = $client->request('POST', $baseUrl);
    //     return json_decode($res->getBody());
    // }

    public function generateOTP() {
        $generator = "1357902468";
        $otp = ""; 
        for ($i = 1; $i <= 6; $i++) { 
            $otp .= substr($generator, (rand()%(strlen($generator))), 1); 
        }

        return $otp;
    }

    public function orderSms($name, $mobile) {
        $url = 'https://api.msg91.com/api/v2/sendsms?authkey='.$this->authkey.'&mobiles=91'.$mobile.'&message=Hey '.ucfirst($name).' ! Your Order on Chrono Cart has been placed Successfully. Thank You for shopping with us.&sender=ChronoCart&route=4';
        return $this->msg91Api($url);
    }

    public function caterUpdates($name, $mobile, $amount) {
        $url = "https://api.msg91.com/api/sendhttp.php?Group_id=group_id&authkey=343721A6wScunjzKv5f7bfad5P1&mobiles={$mobile}&country=91&message=Hai ".ucfirst($name).". Order Request of Rs.{$amount} has been Raised by MealsDeals User. Kindly Accept a Order in your portal within 20 Minutes&sender=MealsDeals&route=4";
        return $this->msg91Api($url);
    }

    public function customerUpdates($caterName, $caterMobile, $custName, $custMobile) {
        $url = "https://api.msg91.com/api/sendhttp.php?Group_id=group_id&authkey=343721A6wScunjzKv5f7bfad5P1&mobiles={$custMobile}&country=91&message=Hai ".ucfirst($custName).". Your Order Was Accepted By Our Cater ".ucfirst($caterName)." From MealsDeals. You Can Contact Our Cater With This Number {$caterMobile} &sender=MealsDeals&route=4";
        return $this->msg91Api($url);
    }

    public function msg91Api($url) {
        $client = new Client();
        $res = $client->request('GET', $url);
        return $this->response->jsonResponse(false, 'Success', json_decode($res->getBody()), 201);
    }
}
