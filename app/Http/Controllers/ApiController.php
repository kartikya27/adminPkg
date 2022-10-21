<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function GetFinalLocation(Request $req){
        // header('Content-Type: application/json');

        $pincode = $req->pincode;
        $response = \Http::withOptions(['verify' => false])->get("https://api.postalpincode.in/pincode/$pincode");
            $response = json_decode($response,true);
            if($response){
            $arr['res'] = "Yes";  
            $arr['state'] = $response[0]['PostOffice'][0]['State'];
            $arr['district'] = $response[0]['PostOffice'][0]['District'];
            $arr['country'] = $response[0]['PostOffice'][0]['Country'];
            echo json_encode($arr);      
            }else{
                echo $arr['res'] = "No";
            }
    }
}
