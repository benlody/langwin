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
		<label><input type="radio" name="size" value="A4" required> A4 (21x29.7cm)</label>
		<label><input type="radio" name="size" value="A3"> A3 (42x29.7cm)</label>
		<label><input type="radio" name="size" value="A2"> A2 (42x59.4cm)</label>
		<label><input type="radio" name="size" value="A1"> A1 (84x59.4cm)</label>
		<label><input type="radio" name="size" value="4K"> 4K (38x52cm)</label>
		<label><input type="radio" name="size" value="2K"> 2K (76x52cm)</label>
		<label><input type="radio" name="size" value="else">其他 <input type="text" name="other_size" />​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​</label>
	</div>
	


	<label for="quotation-paper">紙張</label>
	<input type="text" id="quotation-paper" class="form-control" name="paper" list="poster-papers" required>
	<datalist id="poster-papers">
		<option data-value="道林紙80g" value="道林紙80g"></option>
		<option data-value="道林紙100g" value="道林紙100g"></option>
		<option data-value="道林紙147g" value="道林紙147g"></option>
		<option data-value="特銅紙100g" value="特銅紙100g"></option>
		<option data-value="特銅紙120g" value="特銅紙120g"></option>
		<option data-value="特銅紙150g" value="特銅紙150g"></option>
		<option data-value="雪銅紙100g" value="雪銅紙100g"></option>
		<option data-value="雪銅紙120g" value="雪銅紙120g"></option>
		<option data-value="雪銅紙150g" value="雪銅紙150g"></option>
		<option data-value="銅西卡200g" value="銅西卡200g"></option>
		<option data-value="PP相紙(大圖輸出)" value="PP相紙(大圖輸出)"></option>
		<option data-value="其他(請直接填寫) 或需建議 (請填寫希望的質感、基重等需求)" value="其他(請直接填寫) 或需建議 (請填寫希望的質感、基重等需求)"></option>
	</datalist>


	<label for="quotation-color">印刷</label>
	<div>
		<label><input type="radio" name="color" value="彩色" required> 彩色</label>
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
		<label><input type="checkbox" name="addtional[]" value="燙亮金"> 燙亮金</label>
		<label><input type="checkbox" name="addtional[]" value="燙霧金"> 燙霧金</label>
		<label><input type="checkbox" name="addtional[]" value="燙亮銀"> 燙亮金</label>
		<label><input type="checkbox" name="addtional[]" value="燙霧銀"> 燙霧銀</label>
		<label><input type="checkbox" name="addtional[]" value="else_stamp"> 燙其他色箔(黑/紅/古銅金/白/珍珠箔...)(請填寫)<input type="text" name="other_stamping" />​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​</label>
		<label><input type="checkbox" name="addtional[]" value="else">其他加工 <input type="text" name="other_addtional" />​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​</label>
	</div>

	<label for="quotation-fold">摺紙</label>
	<div>
		<label><input type="radio" name="fold" value="無摺紙" required> 無摺紙</label>
		<label><input type="radio" name="fold" value="對摺"> 對摺</label>
		<label><input type="radio" name="fold" value="包摺"> 包摺</label>
		<label><input type="radio" name="fold" value="觀音摺"> 觀音摺</label>
		<label><input type="radio" name="fold" value="十字摺"> 十字摺</label>
		<label><input type="radio" name="fold" value="平行2摺"> 平行2摺</label>
		<label><input type="radio" name="fold" value="N字摺(彈簧2摺)"> N字摺(彈簧2摺)</label>
		<label><input type="radio" name="fold" value="M摺(彈簧3摺)"> M摺(彈簧3摺)</label>
		<label><input type="radio" name="fold" value="彈簧4摺"> 彈簧4摺</label>
		<label><input type="radio" name="fold" value="彈簧5摺"> 彈簧5摺</label>
		<label><input type="radio" name="fold" value="彈簧6摺"> 彈簧6摺</label>
		<label><input type="radio" name="fold" value="else">其他摺法(請說明) <input type="text" name="other_fold" />​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​</label>
	</div>


	<label for="quotation-qty">數量 (可輸入多個數量)</label><br>
	<input type="text" name="qty" required>​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​<br>

	<?= $form->field($model, 'link', ['labelOptions' => ['label' => '檔案雲端連結']])->textarea(['rows' => 6]) ?>

	<label for="quotation-remark">備註</label>
	<textarea id="quotation-remark" class="form-control" name="remark" rows="6"></textarea>

	<div class="form-group">
		<?= Html::submitButton(Yii::t('app', 'Submit'), ['class' => 'btn btn-primary', 'name' => 'quotation_poster']) ?>
	</div>

	<?php ActiveForm::end(); ?>

</div>
