<h2>Тест api</h2>
<?php

use yii\helpers\Url;

$url = Url::to(['/api/vacancy/']);
//$url = Url::to(['/site/addpayment/', 'id' => $user_->id]);
?>
<div>
    <a class="btn btn-default" href="<?= $url; ?>">
        Вакансия
    </a>
    
    <a class="btn btn-default" title="Парсинг специальности" href="<?= Url::to(['/api/specparsing/']); ?>">
        Парсинг
    </a>
    
    <hr>
</div>
<div>
    <div class="panel panel-info">
        <div class="panel-heading">
            вывод
        </div>
        <div class="panel-body">
             <?= $ApiContent ?>
        </div>
       
    </div>
</div>
