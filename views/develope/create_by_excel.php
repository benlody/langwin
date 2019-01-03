<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\DatePicker;

//require_once __DIR__  . '/../../utils/enum.php';

$this->registerCssFile(Yii::$app->request->getBaseUrl().'/assets/3c21fd83/css/bootstrap.css');
$this->registerCssFile(Yii::$app->request->getBaseUrl().'/css/site.css');


/* @var $this yii\web\View */
/* @var $model app\models\Order */
/* @var $form ActiveForm */
$this->title = '客戶開發';

?>

<h1><?= Html::encode($this->title) ?></h1>

<div class="develope-add">

	<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

		<?= $form->field($excelfile_model, 'excelFile')->fileInput() ?>

	<div class="form-group">
			<?= Html::submitButton(Yii::t('app', 'Submit'), ['class' => 'btn btn-primary', 'name' => 'upload']) ?>
	</div>

	<?php ActiveForm::end(); ?>

	<?php
		if(isset($content)){

			echo '確認資料正確後 請至最下方按寄出(Send)';

			echo '<table class="table table-striped table-bordered table-tooltip"><thead><tr><th>客戶名稱</th><th>Email</th><th>信件title</th><th>信件內容</th></tr></thead><tbody>';

			foreach($content as $key => $value){
				if($key == 1){
					continue;
				}
				if('' == $value['A']){
					continue;
				}

				echo '<td>'.$value['A'].'</td><td>'.$value['B'].'</td><td>'.$value['C'].'</td><td>'.$value['D'].'</td></tr>';

			}
			echo '</tbody></table>';

			$form2 = ActiveForm::begin();

			echo Html::hiddenInput('develope_json', json_encode($content));

			echo '<div class="form-group">';
			echo Html::submitButton(Yii::t('app', 'Send'), ['class' => 'btn btn-primary', 'name' => 'save']);
			echo '</div>';
			ActiveForm::end();
		}

	?>

</div>
