<?php
use yii\helpers\Html;
use yii\helpers\Url;


/* @var $this \yii\web\View view component instance */
/* @var $message \yii\mail\BaseMessage instance of newly created mail message */

?>
<p>親愛的<?= $model->title ?></p>
<p><?= '['.$c_mail.'] ' ?>透過光隆印刷官網聯繫您</p>
內容如下:<br>
<p><?= preg_replace("/[\n\r]/","<br>",$content)?></p>
<p>ps: 請勿直接回覆此信件</p>
