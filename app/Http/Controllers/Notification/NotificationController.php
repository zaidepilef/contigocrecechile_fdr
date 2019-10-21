<?php

namespace App\Http\Controllers\Notification;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Period;
use App\Subperiod;

class NotificationController extends Controller
{
    public function index()
    {

        $periodos = Period::select('periods.id', 'periods.nombre')->get();




        $selectTipoPeriodo = [];
        array_push($selectTipoPeriodo, ['crecimiento', 'Crecimiento']);
        array_push($selectTipoPeriodo, ['control', 'Control']);
        array_push($selectTipoPeriodo, ['vacunas', 'Vacunas']);

        return view('Notification.index', ['periodos' => $periodos])->with('selectTipoPeriodo', $selectTipoPeriodo);
    }



    public function subperiodosSelect($id)
    {
        /*   dd($id); */
        return Subperiod::select('subperiods.id', 'subperiods.nombre')
            ->join('ranges', 'ranges.id_Subperiodo', 'subperiods.id')
            ->where('ranges.id_periodo', $id)
            ->get();
    }


    public function send(Request $request)
    {

        // $to = "dRKo6IGC6o0:APA91bHOlCm__fHAMmnZjQ73l4SbJy1Hw5EAkQ9ViqWSkEPSLZ2baZ5sJnfTPPJXQFxHPpFVcL2oTaAVgWaj128P70qPxOEDPcrxRuJ8VGMzyfcMNHK9eVJYNhvWRlx5DyzPrVzG01V6";
        $to = "/topics/all";
        $data = array(
            "title" => $request->title,
            "body" => $request->body,
            "click_action" => "FCM_PLUGIN_ACTIVITY",  //Must be present for Android

            "collapse_key" => "notificacion_1",
            "icon" => "fcm_push_icon", //White icon Android resource
            "data" => array(
                "a" => "Mario",
                "body" => "PortugalVSDenmark"
            )
        );
        $dato = array(
            "agendar" => "1",
            "visible" => "0",
            "inicio" => "01/02/2019",
            "fin" => "01/04/2019",
        );

        $fcmNotification = [
            //'registration_ids' => $tokenList, //multple token array
            'to'        => $to, //single token
            'notification' => $data,
            'data' => $dato
        ];
        //API KEY NO CAMBIA NUNCA
        $apiKey = 'AAAAqUvp1yM:APA91bGp25arGN42jQ9hDS66RF3Os3nhJKA6_cuZ5TPfIfi-Rg-0tW6G04qza5aMxLpm4Ttr4Uk0CfOYIauskXlDmAr-Ptzx_0ZtpHT7KEmw_FP_f2-NRgklOdTEFGNaiVbQb1NyFGEo';

        $headers = array('Authorization:key=' . $apiKey, 'Content-Type: application/json');

        $url = 'https://fcm.googleapis.com/fcm/send';

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        //curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false); //no
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        //echo print_r($fields);
        //curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fcmNotification));
        //echo $ch;
        $result = curl_exec($ch);
        curl_close($ch);
        //echo "result ".json_decode($result);
        dd(json_decode($result, true));
    }
}
