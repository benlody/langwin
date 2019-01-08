<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Quotation */
/* @var $form yii\widgets\ActiveForm */
?>

<div id="tab-6" class="tab-con">
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
		</div><br>

		<div class="inlineblock mg-r-20 mg-b-40 contact-wrap">
			<h3 class="contact-title">正面寬(cm)</h3>
			<input type="text" name="width" class="input-text block" required />
		</div>

		<div class="inlineblock mg-r-20 mg-b-40 contact-wrap">
			<h3 class="contact-title">袋高(cm)</h3>
			<input type="text" name="height" class="input-text block" required />
		</div>
		<div class="inlineblock mg-r-20 mg-b-40 contact-wrap">
			<h3 class="contact-title">側寬(cm)</h3>
			<input type="text" name="depth" class="input-text block" required />
		</div>


		<div class="mg-r-20 mg-b-40 contact-wrap">
			<h3 class="contact-title">紙張</h3>
			<div>
				<div class="inlineblock vmiddle mg-r-20">
					<select class="nice-sel-wrap" data-target="input-radcheck-bag" name="paper" oninvalid="alert('請選擇紙張種類');" required >
						<option value="" disabled selected>選擇紙張種類</option>
						<option value="銅版紙150g">銅版紙150g</option>
						<option value="銅版紙190g">銅版紙190g</option>
						<option value="銅西卡200g">銅西卡200g</option>
						<option value="銅西卡250g">銅西卡250g</option>
						<option value="白牛皮120g">白牛皮120g</option>
						<option value="白牛皮150g">白牛皮150g</option>
						<option value="赤牛皮120g">赤牛皮120g</option>
						<option value="赤牛皮154g">赤牛皮154g</option>
						<option class="others" value="else">其他(請直接填寫) 或需建議 (請填寫希望的質感、基重等需求)</option>
					</select>
				</div>
				<div class="inlineblock vmiddle sel-others-input">
					<input type="text" class="input-text input-radcheck" id="input-radcheck-bag" name="other_paper" placeholder="其他" disabled />
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
				['label' => '上亮膜', 'opt' => '上亮膜'],
				['label' => '上霧膜', 'opt' => '上霧膜'],
				['label' => '上霧膜+局部光', 'opt' => '上霧膜+局部光'],
				['label' => '燙亮金', 'opt' => '燙亮金'],
				['label' => '燙霧金', 'opt' => '燙霧金'],
				['label' => '燙亮銀', 'opt' => '燙亮銀'],
				['label' => '燙霧銀', 'opt' => '燙霧銀'],
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

		<?php
			$rope_radio_array = [
				['label' => '黑色棉繩', 'opt' => '黑色棉繩'],
				['label' => '白色棉繩', 'opt' => '白色棉繩'],
				['label' => '尼龍三股金蔥繩', 'opt' => '尼龍三股金蔥繩'],
			];
			echo $this->render('radio_opt', [
					'title' => '提繩', 
					'radio_array' => $rope_radio_array, 
					'name' => 'rope', 
					'required' => true, 
					'other' => true,
					'other_label' => '其他 (請填寫)',
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
	<div class="mg-t-20 mg-b-40"><button type="submit" class="btn c-btn" hov="0.8" name="quotation_bag">送出<i class="fas fa-angle-right mg-l-15"></i></button></div>

	<?php ActiveForm::end(); ?>

</div>

