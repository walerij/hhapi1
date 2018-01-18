<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;

class ApiController extends Controller {

    public $ApiContent;

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex() {
        $this->ApiContent = "Отработал index";
        return $this->render('index', ['ApiContent' => $this->ApiContent]);
    }

    /**

     * https://api.hh.ru/vacancies/24107816
     *      */
    public function actionVacancy() {
        $opts = array(
            'http' => array(
                'method' => "GET",
                'header' => "Accept-language: ru\r\n" .
                "Cookie: foo=bar\r\n"
            )
        );
//,false, $context
        $context = stream_context_create($opts);
        $headers = @file_get_contents('https://api.hh.ru/vacancies/24107816/', false, $context);

        /* $body = file_get_contents('http://xxx.xxx.xxx.xxx:xxxx/get?stations=27199&point_at=1408924800');
          $st=json_decode($body);
          var_dump($st); */
        $this->ApiContent = $headers;
        return $this->render('index', ['ApiContent' => '==' . $this->ApiContent]);
    }

    public function actionVac2() {
        $r_data = array('event_name' => 'chat_accepted', 'chat_id' => 3);
        $data_enc = json_encode($r_data);

        $ch = curl_init('https://api.hh.ru/vacancies/24107816/');
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_enc);
        //, $data_enc)
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

//Получаем данные
        $response = curl_exec($ch);
        echo $response;
    }

}
