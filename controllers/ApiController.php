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
        $headers = file_get_contents('https://api.hh.ru/vacancies/24107816/');
        
        /*$body = file_get_contents('http://xxx.xxx.xxx.xxx:xxxx/get?stations=27199&point_at=1408924800');
        $st=json_decode($body);
         var_dump($st);*/
        $this->ApiContent = $headers;
        return $this->render('index', ['ApiContent' => $this->ApiContent]);
    }

}
