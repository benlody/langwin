<?php
use yii\helpers\Html;
use yii\helpers\Url;


/* @var $this \yii\web\View view component instance */
/* @var $message \yii\mail\BaseMessage instance of newly created mail message */

?>

<?php
//http://192.168.0.99/langwin/web/index.php?r=portfolio%2Findex&search=fff
$newstring = preg_replace("/((?<=#).+?(?=\s))/", "<a href='http://192.168.0.99/langwin/web/index.php?r=portfolio%2Findex&search=$1&token=".$token."'>$1</a>", $content);
$newstring2 = preg_replace("/[\n\r]/","<br>",$newstring); 


?>


<? echo $newstring2; ?>