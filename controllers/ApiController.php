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

   /*

    * получение вакансий
    *     */
    public function actionVacancy() {
     
        $this->ApiContent = $this->getApi('https://api.hh.ru/vacancies/24107816/');
        return $this->render('index', ['ApiContent' =>  $this->ApiContent]);
    }

    //*
    //получение специальностей
    //*/
    public function actionSpec() {
       
        
        $this->ApiContent = $this->getApi('https://api.hh.ru/specializations');
        return $this->render('index', ['ApiContent' =>  $this->ApiContent]);
    }
      public function actionSpecparsing() {
        $content =$this->getApi('https://api.hh.ru/specializations');
        $response = json_decode($content, true);
        
        $this->ApiContent = $response[0]['name'];
        return $this->render('index', ['ApiContent' =>  $this->ApiContent]);
    }
   
    /*

     * обработка ссылок на api.hh.ru
     *      */
    public function getApi($url='')
    { // Создаем поток
        $opts = array(
            'http' => array(
                'method' => "GET",
                'header' => "User-Agent"
            )
        );

        $context = stream_context_create($opts);

// Открываем файл с помощью установленных выше HTTP-заголовков
        $file = file_get_contents($url, false, $context);
        return $file;
    }
  
}
