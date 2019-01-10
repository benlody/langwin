<?php
use yii\helpers\Html;
use yii\helpers\Url;


/* @var $this \yii\web\View view component instance */
/* @var $message \yii\mail\BaseMessage instance of newly created mail message */

?>

<?php
$newstring = preg_replace("/((?<=#).+?(?=\s))/", "<a href='http://lang-win.com.tw/index.php?r=portfolio%2Findex&search=$1&token=".$token."'>$1</a>", $content);
$newstring2 = preg_replace("/@合作設計師/","<a href='http://lang-win.com.tw/index.php?r=designer%2Findex&token=".$token."'>@合作設計師</a>",$newstring); 
$newstring3 = preg_replace("/@公司網站/","<a href='http://www.lang-win.com.tw/index.php?r=site%2Findex&token=".$token."'>@公司網站</a>",$newstring2); 
$newstring4 = preg_replace("/[\n\r]/","<br>",$newstring3); 


?>


<? echo $newstring4; ?>
