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
    
    
    <hr>
</div>
<div>
    <pre>
        <?= $ApiContent ?>
    </pre>
</div>
