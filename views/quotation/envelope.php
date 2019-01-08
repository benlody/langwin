<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Quotation */
/* @var $form yii\widgets\ActiveForm */
?>

<div id="tab-5" class="tab-con">
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
				['label' => '中式12K (12x23cm)', 'opt' => '中式12K(12x23cm)'],
				['label' => '中式15K (10x22cm)', 'opt' => '中式15K(10x22cm)'],
				['label' => '中式4K (25x33cm)', 'opt' => '中式4K(25x33cm)'],
				['label' => '歐式12K (23x12cm)', 'opt' => '歐式12K(23x12cm)'],
				['label' => '西式10K (19.8x13.9cm)', 'opt' => '西式10K(19.8x13.9cm)'],
				['label' => '西式 (20.3x14cm)', 'opt' => '西式(20.3x14cm)'],
			];
			echo $this->render('radio_opt', [
					'title' => '尺寸', 
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
				<div class="inlineblock vmiddle mg-r-20">
					<select class="nice-sel-wrap" data-target="input-radcheck-envelope" name="paper" oninvalid="alert('請選擇紙張種類');" required >
						<option value="" disabled selected>選擇紙張種類</option>
						<option value="道林紙100g">道林紙100g</option>
						<option value="道林紙120g">道林紙120g</option>
						<option value="白牛皮100g">白牛皮100g</option>
						<option value="白牛皮120g">白牛皮120g</option>
						<option value="骨紋紙100g">骨紋紙100g</option>
						<option value="萊妮紙100g">萊妮紙100g</option>
						<option value="星幻紙120g">星幻紙120g</option>
						<option value="米黃骨紋紙">米黃骨紋紙</option>
						<option value="粉紅骨紋紙">粉紅骨紋紙</option>
						<option value="香檳色珠光">香檳色珠光</option>
						<option value="粉紅珠光">粉紅珠光</option>
						<option class="others" value="else">其他(請直接填寫) 或需建議 (請填寫希望的質感、基重等需求)</option>
					</select>
				</div>
				<div class="inlineblock vmiddle sel-others-input">
					<input type="text" class="input-text input-radcheck" id="input-radcheck-envelope" name="other_paper" placeholder="其他" disabled />
				</div>
			</div>
		</div>

		<?php
			//印刷 radio
			$color_radio_array = [
				['label' => '彩色(一般四色印刷)', 'opt' => '彩色(一般四色印刷)'],
				['label' => '無印刷', 'opt' => '無印刷'],
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
			//加工 chekcbox
			$addtional_chekcbox_array = [
				['label' => '燙亮金', 'opt' => '燙亮金'],
				['label' => '燙霧金', 'opt' => '燙霧金'],
				['label' => '燙亮銀', 'opt' => '燙亮銀'],
				['label' => '燙霧銀', 'opt' => '燙霧銀'],
				['label' => '開窗', 'opt' => '開窗'],
			];
			echo $this->render('checkbox_opt', [
					'title' => '加工（可複選）', 
					'radio_array' => $addtional_chekcbox_array, 
					'name' => 'addtional', 
					'required' => false, 
					'other' => true,
					'other_label' => '其他加工／燙其他色箔(黑/紅/古銅金/白/珍珠箔...) (請填寫)',
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
	<div class="mg-t-20 mg-b-40"><button type="submit" class="btn c-btn" hov="0.8" name="quotation_envelope">送出<i class="fas fa-angle-right mg-l-15"></i></button></div>

	<?php ActiveForm::end(); ?>

</div>

