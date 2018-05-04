<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\DatePicker;

//require_once __DIR__  . '/../../utils/enum.php';

/* @var $this yii\web\View */
/* @var $model app\models\Order */
/* @var $form ActiveForm */
$this->title = '批次新增作品';

?>

<div class="order-add">

	<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

		<?= $form->field($excelfile_model, 'excelFile')->fileInput() ?>

	<div class="form-group">
			<?= Html::submitButton(Yii::t('app', 'Submit'), ['class' => 'btn btn-primary', 'name' => 'upload']) ?>
	</div>

	<?php ActiveForm::end(); ?>

	<?php
		if($content){

			echo '確認資料正確後 請至最下方案儲存(Save)';

			echo '<table class="table table-striped table-bordered table-tooltip"><thead><tr><th>ID</th><th>作品名稱</th><th>規格</th><th>內容</th><th>設計師</th><th>客戶</th><th>Tag</th></tr></thead><tbody>';

			foreach($content as $key => $value){
				if($key == 1){
					continue;
				}
				if('' == $value['A']){
					continue;
				}

				echo '<td>'.$value['A'].'</td><td>'.$value['B'].'</td><td>'.$value['C'].'</td><td>'.$value['D'].'</td><td>'.$value['E'].'</td><td>'.$value['G'].'</td><td>'.$value['I'].'</td></tr>';

			}
			echo '</tbody></table>';

			$form2 = ActiveForm::begin();

			echo Html::hiddenInput('portfolio_json', json_encode($content));

			echo '<div class="form-group">';
			echo Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-primary', 'name' => 'save']);
			echo '</div>';
			ActiveForm::end();
		}

	?>

</div>