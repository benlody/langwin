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
		<label><input type="radio" name="size" value="A5"> A5 (14.8x21cm)</label>
		<label><input type="radio" name="size" value="16K"> 16K (19x26cm)</label>
		<label><input type="radio" name="size" value="else">其他 <input type="text" name="other_size" />​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​</label>
	</div>
	
	<label for="quotation-cover-paper">封面紙張</label>
	<div>
		<label><input type="radio" name="cover-paper" value="銅西卡200g" required> 銅西卡200g</label>
		<label><input type="radio" name="cover-paper" value="銅西卡250g"> 銅西卡250g</label>
		<label><input type="radio" name="cover-paper" value="同內頁"> 同內頁 (騎馬釘可選擇)</label>
		<label><input type="radio" name="cover-paper" value="else">其他或需推薦 <input type="text" name="other_cover-paper" />​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​</label>
	</div>

	<label for="quotation-cover-color">封面印刷</label>
	<div>
		<label><input type="radio" name="cover-color" value="彩色" required> 彩色</label>
		<label><input type="radio" name="cover-color" value="黑白"> 黑白</label>
		<label><input type="radio" name="cover-color" value="else">其他 (特別色 無印刷) <input type="text" name="other_cover-color" />​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​</label>
	</div>

	<label for="quotation-cover-side">封面單雙面</label>
	<div>
		<label><input type="radio" name="cover-side" value="單面" required> 單面</label>
		<label><input type="radio" name="cover-side" value="雙面"> 雙面</label>
	</div>


	<label for="quotation-cover-addtional">封面加工</label>
	<div>
		<label><input type="checkbox" name="cover-addtional[]" value="上亮膜"> 上亮膜</label>
		<label><input type="checkbox" name="cover-addtional[]" value="上霧膜"> 上霧膜</label>
		<label><input type="checkbox" name="cover-addtional[]" value="局部光"> 局部光</label>
		<label><input type="checkbox" name="cover-addtional[]" value="燙亮金"> 燙亮金</label>
		<label><input type="checkbox" name="cover-addtional[]" value="燙霧金"> 燙霧金</label>
		<label><input type="checkbox" name="cover-addtional[]" value="燙亮銀"> 燙亮金</label>
		<label><input type="checkbox" name="cover-addtional[]" value="燙霧銀"> 燙霧銀</label>
		<label><input type="checkbox" name="cover-addtional[]" value="else_stamp"> 燙其他色箔(黑/紅/古銅金/白/珍珠箔...)(請填寫)<input type="text" name="other_cover-stamping" />​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​</label>
		<label><input type="checkbox" name="cover-addtional[]" value="else">其他加工 <input type="text" name="other_cover-addtional" />​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​</label>
	</div>


	<label for="quotation-inside-paper">內頁紙張</label>
	<input type="text" id="quotation-inside-paper" class="form-control" name="inside-paper" list="book-papers" required>
	<datalist id="book-papers">
		<option data-value="道林紙80g" value="道林紙80g"></option>
		<option data-value="道林紙100g" value="道林紙100g"></option>
		<option data-value="道林紙147g" value="道林紙147g"></option>
		<option data-value="特銅紙100g" value="特銅紙100g"></option>
		<option data-value="特銅紙120g" value="特銅紙120g"></option>
		<option data-value="特銅紙150g" value="特銅紙150g"></option>
		<option data-value="雪銅紙100g" value="雪銅紙100g"></option>
		<option data-value="雪銅紙120g" value="雪銅紙120g"></option>
		<option data-value="雪銅紙150g" value="雪銅紙150g"></option>
		<option data-value="其他(請直接填寫) 或需建議 (請填寫希望的質感、基重等需求)" value="其他(請直接填寫) 或需建議 (請填寫希望的質感、基重等需求)"></option>
	</datalist>

	<label for="quotation-cover-color">內頁印刷</label>
	<div>
		<label><input type="radio" name="inside-color" value="彩色" required> 彩色</label>
		<label><input type="radio" name="inside-color" value="黑白"> 黑白</label>
		<label><input type="radio" name="inside-color" value="else">其他 (特別色 無印刷) <input type="text" name="other_inside-color" />​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​</label>
	</div>

	<label for="quotation-binding">裝訂</label>
	<div>
		<label><input type="radio" name="binding" value="騎馬釘" required>騎馬釘</label>
		<label><input type="radio" name="binding" value="膠裝"> 膠裝</label>
		<label><input type="radio" name="binding" value="穿線膠裝"> 穿線膠裝</label>
		<label><input type="radio" name="binding" value="精裝"> 精裝</label>
		<label><input type="radio" name="binding" value="軟精裝"> 軟精裝</label>
		<label><input type="radio" name="binding" value="else">其他 <input type="text" name="other_binding" />​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​</label>
	</div>

	<label for="quotation-horizontal">橫式裝訂</label>
	<div>
		<label><input type="checkbox" name="horizontal" value="horizontal">橫式(短邊裝釘) 請勾選此項</label>
	</div>

	<label for="quotation-page">頁數 (不含封面的頁數) (騎馬釘裝訂必須為4的倍數)</label><br>
	<input type="number" name="page" required>​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​<br>

	<label for="quotation-qty">數量 (可輸入多個數量)</label><br>
	<input type="text" name="qty" required>​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​<br>

	<?= $form->field($model, 'link', ['labelOptions' => ['label' => '檔案雲端連結']])->textarea(['rows' => 6]) ?>

	<label for="quotation-remark">備註</label>
	<textarea id="quotation-remark" class="form-control" name="remark" rows="6"></textarea>

	<div class="form-group">
		<?= Html::submitButton(Yii::t('app', 'Submit'), ['class' => 'btn btn-primary', 'name' => 'quotation_book']) ?>
	</div>

	<?php ActiveForm::end(); ?>

</div>
