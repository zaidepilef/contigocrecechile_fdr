<?php

namespace App\Http\Controllers\Notification;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Period;

class NotificationController extends Controller
{
    public function index()
    {
        $periodos = Period::select('periods.id', 'periods.nombre')->get();
        return view('Notification.index', ['periodos' => $periodos]);
    }

    public function send(Request $request)
    {
        //dd($request);
        //$to = "feHG-Hc6vcY:APA91bFadML1AcAv0lP8NkEeIhTzNE3DqTgymXk5cHGG_BhVTpqSsrAfdcUbK_IAjIJnZugILnZ6H0vEN_Nj7qTfg2D5odV8EYxa9F_cqPW_aVgMeHJQQp6mbrVslD-x-q-qhZAio7FR";
        $to = "/topics/all";
        $data = array(
            "title" => $request->title,
            "body" => $request->body,
            "sound" => "default",
            // "click_action" => "FCM_PLUGIN_ACTIVITY",  //Must be present for Android
            "collapse_key" => "notificacion_1",
            "icon" => "fcm_push_icon", //White icon Android resource
            "data" => array(
                "agendar" => "1",
                "body" => "PortugalVSDenmark"

            )
        );
        $dato = array(
            "title" => $request->title,
            "body" => $request->body
        );
        //dd($data);
        $apiKey = 'AAAAqUvp1yM:APA91bGp25arGN42jQ9hDS66RF3Os3nhJKA6_cuZ5TPfIfi-Rg-0tW6G04qza5aMxLpm4Ttr4Uk0CfOYIauskXlDmAr-Ptzx_0ZtpHT7KEmw_FP_f2-NRgklOdTEFGNaiVbQb1NyFGEo';
        $fields = array('to' => $to, 'notification' => $data, 'data' => $dato); // a alguien en especifico
        //$fields = $data;
        //echo print_r($data);

        $headers = array('Authorization:key=' . $apiKey, 'Content-Type: application/json');
        //echo print_r($headers);

        $url = 'https://fcm.googleapis.com/fcm/send';

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        //curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false); //no
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        //echo print_r($fields);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
        //echo $ch;
        $result = curl_exec($ch);
        curl_close($ch);
        //echo "result ".json_decode($result);
        dd(json_decode($result, true));
    }
}
