<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Quotation */
/* @var $form yii\widgets\ActiveForm */
?>

<div id="tab-3" class="tab-con">
	<?php $form = ActiveForm::begin(); ?>

	<div class="clearfix">

		<div class="inlineblock mg-r-20 mg-b-40 contact-wrap">
			<h3 class="contact-title">公司名稱</h3>
			<input type="text" name="Quotation[company]" class="input-text block" required />
		</div>

		<div class="inlineblock mg-r-20 mg-b-40 contact-wrap">
			<h3 class="contact-title">產品名稱</h3>
			<input type="text" name="Quotation[product]" class="input-text block" required />
		</div><br>

		<div class="inlineblock mg-r-20 mg-b-40 contact-wrap">
			<h3 class="contact-title">聯絡人</h3>
			<input type="text" name="Quotation[contact]" class="input-text block" required />
		</div>

		<div class="inlineblock mg-r-20 mg-b-40 contact-wrap">
			<h3 class="contact-title">聯絡電話</h3>
			<input type="text" name="Quotation[tel]" class="input-text block" required />
		</div>

		<div class="inlineblock mg-r-20 mg-b-40 contact-wrap">
			<h3 class="contact-title">Email</h3>
			<input type="text" name="Quotation[email]" class="input-text block" required />
		</div>

		<?php
			//尺寸 radio
			$size_radio_array = [
				['label' => 'A4 (21x29.7cm)', 'opt' => 'A4'],
				['label' => 'A3 (42x29.7cm)', 'opt' => 'A3'],
				['label' => 'A2 (42x59.4cm)', 'opt' => 'A2'],
				['label' => 'A1 (84x59.7cm)', 'opt' => 'A1'],
				['label' => 'A5 (21x14.8cm)', 'opt' => 'A5'],
				['label' => '16K (19x26cm)', 'opt' => '16K'],
				['label' => '8K (26x38cm)', 'opt' => '8K'],
				['label' => '4K (38x52cm)', 'opt' => '4K'],
				['label' => '2K (76x52cm)', 'opt' => '2K'],
			];
			echo $this->render('radio_opt', [
					'title' => '尺寸 (展開尺寸)', 
					'radio_array' => $size_radio_array, 
					'name' => 'size', 
					'required' => true, 
					'other' => true,
					'other_label' => '其他',
			]);
		?>

		<div class="mg-r-20 mg-b-40 contact-wrap">
			<h3 class="contact-title">紙張</h3>
			<div>
				<div class="inlineblock">
					<select class="nice-sel-wrap" name="paper" required >
						<option value="" disabled selected>選擇紙張種類</option>
						<option value="道林紙80g">道林紙80g</option>
						<option value="道林紙100g">道林紙100g</option>
						<option value="道林紙147g">道林紙147g</option>
						<option value="特銅紙100g">特銅紙100g</option>
						<option value="特銅紙120g">特銅紙120g</option>
						<option value="特銅紙150g">特銅紙150g</option>
						<option value="雪銅紙100g">雪銅紙100g</option>
						<option value="雪銅紙120g">雪銅紙120g</option>
						<option value="雪銅紙150g">雪銅紙150g</option>
						<option value="銅西卡200g">銅西卡200g</option>
						<option value="PP相紙(大圖輸出)">PP相紙(大圖輸出)</option>
						<option value="else">其他(請直接填寫) 或需建議 (請填寫希望的質感、基重等需求)</option>
					</select>
				</div>
			</div>
		</div>

		<?php
			//印刷 radio
			$color_radio_array = [
				['label' => '彩色', 'opt' => '彩色'],
			];
			echo $this->render('radio_opt', [
					'title' => '印刷', 
					'radio_array' => $color_radio_array, 
					'name' => 'color', 
					'required' => true, 
					'other' => true,
					'other_label' => '其他 (特別色/黑色)',
			]);
		?>

		<?php
			//單雙面 radio
			$side_radio_array = [
				['label' => '單面', 'opt' => '單面'],
				['label' => '雙面', 'opt' => '雙面'],
			];
			echo $this->render('radio_opt', [
					'title' => '單雙面', 
					'radio_array' => $side_radio_array, 
					'name' => 'side', 
					'required' => true, 
					'other' => false,
					'other_label' => '',
			]);
		?>

		<?php
			//加工 chekcbox
			$addtional_radio_array = [
				['label' => '單面上亮膜', 'opt' => '單面上亮膜'],
				['label' => '雙面上亮膜', 'opt' => '雙面上亮膜'],
				['label' => '單面上霧膜', 'opt' => '單面上霧膜'],
				['label' => '雙面上霧膜', 'opt' => '雙面上霧膜'],
				['label' => '雙上霧+單局部', 'opt' => '雙上霧+單局部'],
				['label' => '雙上霧+雙局部', 'opt' => '雙上霧+雙局部'],
			];
			echo $this->render('radio_opt', [
					'title' => '加工（可複選）', 
					'radio_array' => $addtional_radio_array, 
					'name' => 'addtional', 
					'required' => false, 
					'other' => true,
					'other_label' => '其他加工 (請填寫)',
			]);
		?>

		<?php
			//摺紙 chekcbox
			$fold_radio_array = [
				['label' => '無摺紙', 'opt' => '無摺紙'],
				['label' => '對摺', 'opt' => '對摺'],
				['label' => '包摺', 'opt' => '包摺'],
				['label' => '觀音摺', 'opt' => '觀音摺'],
				['label' => '十字摺', 'opt' => '十字摺'],
				['label' => '平行2摺', 'opt' => '平行2摺'],
				['label' => 'N字摺(彈簧2摺)', 'opt' => 'N字摺(彈簧2摺)'],
				['label' => 'M摺(彈簧3摺)', 'opt' => 'M摺(彈簧3摺)'],
				['label' => '彈簧4摺(5等份)', 'opt' => '彈簧4摺(5等份)'],
				['label' => '彈簧5摺(6等份)', 'opt' => '彈簧5摺(6等份)'],
				['label' => '彈簧6摺(7等份)', 'opt' => '彈簧6摺(7等份)'],
			];
			echo $this->render('checkbox_opt', [
					'title' => '摺紙', 
					'radio_array' => $fold_radio_array, 
					'name' => 'fold', 
					'required' => false, 
					'other' => true,
					'other_label' => '其他摺法(請說明)',
			]);
		?>

		<div class="inlineblock mg-r-20 mg-b-40 contact-wrap">
			<h3 class="contact-title">數量 (可輸入多個數量)</h3>
			<input type="text" name="qty" class="input-text block" required />
		</div>

		<div class="mg-r-20 mg-b-40 contact-wrap">
			<h3 class="contact-title">檔案雲端連結</h3>
			<textarea class="input-textarea block" name="Quotation[link]" ></textarea>
		</div>

		<!--textarea-->
		<div class="mg-r-20 mg-b-40 contact-wrap">
			<h3 class="contact-title">備註</h3>
			<textarea class="input-textarea block" name="remark"></textarea>
		</div>
		<!--textarea-->

	</div>
	<div class="mg-t-20 mg-b-40"><button type="submit" class="btn c-btn" hov="0.8" name="quotation_poster">送出<i class="fas fa-angle-right mg-l-15"></i></button></div>

	<?php ActiveForm::end(); ?>

</div>

