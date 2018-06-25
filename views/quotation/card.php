<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Quotation */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="quotation-form">

	<?php $form = ActiveForm::begin(); ?>

	<?= $form->field($model, 'company', ['labelOptions' => ['label' => '公司名稱']]) ?>
	<?= $form->field($model, 'product', ['labelOptions' => ['label' => '產品名稱']]) ?>
	<?= $form->field($model, 'contact', ['labelOptions' => ['label' => '聯絡人']]) ?>
	<?= $form->field($model, 'tel', ['labelOptions' => ['label' => '聯絡電話']]) ?>
	<?= $form->field($model, 'email', ['labelOptions' => ['label' => 'E-mail']]) ?>
	

	<label for="quotation-size">尺寸</label>
	<div>
		<label><input type="radio" name="size" value="一般名片尺寸 (9x5.4cm)" required> 一般名片尺寸 (9x5.4cm)</label>
		<label><input type="radio" name="size" value="A6"> A6 (10.5x14.8cm)</label>
		<label><input type="radio" name="size" value="A5"> A5 (14.8x21cm)</label>
		<label><input type="radio" name="size" value="16K"> 16K (19x26cm)</label>
		<label><input type="radio" name="size" value="else">其他 <input type="text" name="other_size" />​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​</label>
	</div>
	


	<label for="quotation-paper">紙張</label>
	<input type="text" id="quotation-paper" class="form-control" name="paper" list="card-papers" required>
	<datalist id="card-papers">
		<option data-value="一級卡250g" value="一級卡250g"></option>
		<option data-value="萊妮紙240g" value="萊妮紙240g"></option>
		<option data-value="象牙卡250g" value="象牙卡250g"></option>
		<option data-value="安格紙300g" value="安格紙300g"></option>
		<option data-value="一級卡+單面亮" value="一級卡+單面亮"></option>
		<option data-value="一級卡+單面霧" value="一級卡+單面霧"></option>
		<option data-value="一級卡+雙面亮" value="一級卡+雙面亮"></option>
		<option data-value="一級卡+雙面霧" value="一級卡+雙面霧"></option>
		<option data-value="一級卡+單霧單局部" value="一級卡+單霧單局部"></option>
		<option data-value="一級卡+雙霧單局部" value="一級卡+雙霧單局部"></option>
		<option data-value="頂級卡300g" value="頂級卡300g"></option>
		<option data-value="頂級卡+雙面亮" value="頂級卡+雙面亮"></option>
		<option data-value="頂級卡+雙面霧" value="頂級卡+雙面霧"></option>
		<option data-value="頂級卡+雙霧雙局部" value="頂級卡+雙霧雙局部"></option>
		<option data-value="頂級象牙420g" value="頂級象牙420g"></option>
		<option data-value="炫光紙250g" value="炫光紙250g"></option>
		<option data-value="絲絨卡" value="絲絨卡"></option>
		<option data-value="絲絨卡+單局部" value="絲絨卡+單局部"></option>
		<option data-value="其他(請直接填寫) 或需建議 (請填寫希望的質感、基重等需求)" value="其他(請直接填寫) 或需建議 (請填寫希望的質感、基重等需求)"></option>
	</datalist>

	<label for="quotation-color">印刷</label>
	<div>
		<label><input type="radio" name="color" value="彩色" required> 彩色</label>
		<label><input type="radio" name="color" value="黑白"> 黑白</label>
		<label><input type="radio" name="color" value="else">其他 (特別色 無印刷) <input type="text" name="other_color" />​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​</label>
	</div>

	<label for="quotation-side">單雙面</label>
	<div>
		<label><input type="radio" name="side" value="單面" required> 單面</label>
		<label><input type="radio" name="side" value="雙面"> 雙面</label>
	</div>


	<label for="quotation-addtional">加工</label>
	<div>
		<label><input type="checkbox" name="addtional[]" value="上亮膜"> 上亮膜</label>
		<label><input type="checkbox" name="addtional[]" value="上霧膜"> 上霧膜</label>
		<label><input type="checkbox" name="addtional[]" value="局部光"> 局部光</label>
		<label><input type="checkbox" name="addtional[]" value="壓線"> 壓線</label>
		<label><input type="checkbox" name="addtional[]" value="刀模軋型"> 刀模軋型</label>
		<label><input type="checkbox" name="addtional[]" value="雷射雕刻"> 雷射雕刻</label>
		<label><input type="checkbox" name="addtional[]" value="打凸"> 打凸</label>
		<label><input type="checkbox" name="addtional[]" value="打凹"> 打凹</label>
		<label><input type="checkbox" name="addtional[]" value="燙亮金"> 燙亮金</label>
		<label><input type="checkbox" name="addtional[]" value="燙霧金"> 燙霧金</label>
		<label><input type="checkbox" name="addtional[]" value="燙亮銀"> 燙亮金</label>
		<label><input type="checkbox" name="addtional[]" value="燙霧銀"> 燙霧銀</label>
		<label><input type="checkbox" name="addtional[]" value="else_stamp"> 燙其他色箔(黑/紅/古銅金/白/珍珠箔...)(請填寫)<input type="text" name="other_stamping" />​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​</label>
		<label><input type="checkbox" name="addtional[]" value="else">其他加工 <input type="text" name="other_addtional" />​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​</label>
	</div>

	<label for="quotation-qty">數量 (可輸入多個數量)</label><br>
	<input type="text" name="qty" required>​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​<br>

	<?= $form->field($model, 'link', ['labelOptions' => ['label' => '檔案雲端連結']])->textarea(['rows' => 6]) ?>

	<label for="quotation-remark">備註</label>
	<textarea id="quotation-remark" class="form-control" name="remark" rows="6"></textarea>

	<div class="form-group">
		<?= Html::submitButton(Yii::t('app', 'Submit'), ['class' => 'btn btn-primary', 'name' => 'quotation_card']) ?>
	</div>

	<?php ActiveForm::end(); ?>

</div>
