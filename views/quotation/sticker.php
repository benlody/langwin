<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Quotation */
/* @var $form yii\widgets\ActiveForm */
?>

<div id="tab-4" class="tab-con">
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

		<br>

		<div class="inlineblock mg-r-20 mg-b-40 contact-wrap">
			<h3 class="contact-title">尺寸</h3>
			<input type="text" name="size" class="input-text block" required />
		</div>

		<div class="mg-r-20 mg-b-40 contact-wrap">
			<h3 class="contact-title">紙張</h3>
			<div>
				<div class="inlineblock vmiddle mg-r-20">
					<select class="nice-sel-wrap" name="paper" required >
						<option value="" disabled selected>選擇紙張種類</option>
						<option value="亮膜貼紙">亮膜貼紙</option>
						<option value="霧膜貼紙">霧膜貼紙</option>
						<option value="霧膜貼紙+局部光">霧膜貼紙+局部光</option>
						<option value="透明貼紙(白墨+亮膜)">透明貼紙(白墨+亮膜)</option>
						<option value="合成貼紙(較防水)">合成貼紙(較防水)</option>
						<option value="模造貼紙">模造貼紙</option>
						<option value="赤牛皮貼紙">赤牛皮貼紙</option>
						<option value="銀箔貼紙">銀箔貼紙</option>
						<option value="反銀龍">反銀龍</option>
						<option value="反金龍">反金龍</option>
						<option class="others" value="else">其他(請直接填寫) 或需建議 (請填寫希望的質感等需求)</option>
					</select>
				</div>
				<div class="inlineblock vmiddle sel-others-input">
					<input type="text" class="input-text input-radcheck" name="other_paper" placeholder="其他" disabled />
				</div>
			</div>
		</div>

		<?php
			//形狀 radio
			$shape_radio_array = [
				['label' => '方形', 'opt' => '方形'],
				['label' => '圓形', 'opt' => '圓形'],
				['label' => '其他造型', 'opt' => '其他造型'],
			];
			echo $this->render('radio_opt', [
					'title' => '形狀', 
					'radio_array' => $shape_radio_array, 
					'name' => 'shape', 
					'required' => true, 
					'other' => false,
					'other_label' => '',
			]);
		?>

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
				['label' => '打凸', 'opt' => '打凸'],
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
	<div class="mg-t-20 mg-b-40"><button type="submit" class="btn c-btn" hov="0.8" name="quotation_sticker">送出<i class="fas fa-angle-right mg-l-15"></i></button></div>

	<?php ActiveForm::end(); ?>

</div>

