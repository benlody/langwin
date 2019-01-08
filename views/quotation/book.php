<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Quotation */
/* @var $form yii\widgets\ActiveForm */
?>


<div id="tab-1" class="tab-con">
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
				['label' => 'A5 (14.8x21cm)', 'opt' => 'A5'],
				['label' => '16K (19x26cm)', 'opt' => '16K'],
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

		<?php
			//封面紙張 radio
			$cover_paper_radio_array = [
				['label' => '銅西卡200g', 'opt' => '銅西卡200g'],
				['label' => '銅西卡250g', 'opt' => '銅西卡250g'],
				['label' => '同內頁 (騎馬釘可選擇)', 'opt' => '同內頁'],
			];
			echo $this->render('radio_opt', [
					'title' => '封面紙張', 
					'radio_array' => $cover_paper_radio_array, 
					'name' => 'cover-paper', 
					'required' => true, 
					'other' => true,
					'other_label' => '其他(請直接填寫) 或需建議(請填寫希望的質感、基重等需求)',
			]);
		?>

		<?php
			//封面印刷 radio
			$cover_color_radio_array = [
				['label' => '彩色(一般四色印刷)', 'opt' => '彩色(一般四色印刷)'],
				['label' => '黑白', 'opt' => '黑白'],
			];
			echo $this->render('radio_opt', [
					'title' => '封面印刷', 
					'radio_array' => $cover_color_radio_array, 
					'name' => 'cover-color', 
					'required' => true, 
					'other' => true,
					'other_label' => '其他 (特別色／無印刷)',
			]);
		?>

		<?php
			//封面單雙面 radio
			$cover_side_radio_array = [
				['label' => '單面', 'opt' => '單面'],
				['label' => '雙面', 'opt' => '雙面'],
			];
			echo $this->render('radio_opt', [
					'title' => '封面單雙面', 
					'radio_array' => $cover_side_radio_array, 
					'name' => 'cover-side', 
					'required' => true, 
					'other' => false,
					'other_label' => '',
			]);
		?>

		<?php
			//封面加工 chekcbox
			$cover_addtional_chekcbox_array = [
				['label' => '上亮膜', 'opt' => '上亮膜'],
				['label' => '上霧膜', 'opt' => '上霧膜'],
				['label' => '局部光', 'opt' => '局部光'],
				['label' => '燙亮金', 'opt' => '燙亮金'],
				['label' => '燙霧金', 'opt' => '燙霧金'],
				['label' => '燙亮銀', 'opt' => '燙亮銀'],
				['label' => '燙霧銀', 'opt' => '燙霧銀'],
			];
			echo $this->render('checkbox_opt', [
					'title' => '封面加工（可複選）', 
					'radio_array' => $cover_addtional_chekcbox_array, 
					'name' => 'cover-addtional', 
					'required' => false, 
					'other' => true,
					'other_label' => '其他加工／燙其他色箔／打凸 (請填寫)',
			]);
		?>

		<!--select-->
		<div class="mg-r-20 mg-b-40 contact-wrap">
			<h3 class="contact-title">內頁紙張</h3>

			<div>
				<div class="inlineblock vmiddle mg-r-20">
					<select class="nice-sel-wrap" data-target="input-radcheck-book" name="inside-paper" oninvalid="alert('請選擇內頁紙張種類');" required >
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
						<option class="others" value="else">其他(請直接填寫) 或需建議 (請填寫希望的質感、基重等需求)</option>
					</select>
				</div>

				<div class="inlineblock vmiddle sel-others-input">
					<input type="text" class="input-text input-radcheck" id="input-radcheck-book" name="other_inside-paper" placeholder="其他" disabled />
				</div>

			</div>

		</div>
		<!--select-->

		<?php
			//內頁印刷 radio
			$inside_color_radio_array = [
				['label' => '彩色(一般四色印刷)', 'opt' => '彩色(一般四色印刷)'],
				['label' => '黑白', 'opt' => '黑白'],
			];
			echo $this->render('radio_opt', [
					'title' => '內頁印刷', 
					'radio_array' => $inside_color_radio_array, 
					'name' => 'inside-color', 
					'required' => true, 
					'other' => true,
					'other_label' => '其他 (特別色 無印刷)',
			]);
		?>

		<?php
			//裝訂 radio
			$binding_radio_array = [
				['label' => '騎馬釘', 'opt' => '騎馬釘'],
				['label' => '膠裝', 'opt' => '膠裝'],
				['label' => '穿線膠裝', 'opt' => '穿線膠裝'],
				['label' => '精裝', 'opt' => '精裝'],
				['label' => '軟精裝', 'opt' => '軟精裝'],
			];
			echo $this->render('radio_opt', [
					'title' => '裝訂', 
					'radio_array' => $binding_radio_array, 
					'name' => 'binding', 
					'required' => true, 
					'other' => true,
					'other_label' => '其他',
			]);
		?>

		<?php
			//橫式裝訂 chekcbox
			$horizontal_chekcbox_array = [
				['label' => '橫式(短邊裝釘) 請勾選此項', 'opt' => 'horizontal'],
			];
			echo $this->render('checkbox_opt', [
					'title' => '橫式裝訂', 
					'radio_array' => $horizontal_chekcbox_array, 
					'name' => 'horizontal', 
					'required' => false, 
					'other' => false,
					'other_label' => '',
			]);
		?>

		<div class="inlineblock mg-r-20 mg-b-40 contact-wrap">
			<h3 class="contact-title">頁數 (不含封面的頁數) (騎馬釘裝訂必須為4的倍數)</h3>
			<input type="text" name="page" class="input-text block" required />
		</div>

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
	<div class="mg-t-20 mg-b-40"><button type="submit" class="btn c-btn" hov="0.8" name="quotation_book">送出<i class="fas fa-angle-right mg-l-15"></i></button></div>

	<?php ActiveForm::end(); ?>

</div>
