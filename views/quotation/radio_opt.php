
<div class="mg-r-20 mg-b-40 contact-wrap">
	<h3 class="contact-title"><?= $title ?></h3>
	<div>

	<?php foreach($radio_array as $key=>$value): ?>

		<div class="inlineblock mg-r-20 mg-b-20 vmiddle">
			<label class="control control--checkbox control-radio"><?= $value['label'] ?>
				<? if($required): ?>
					<input type="radio" name=<?= $name ?> value=<?= $value['opt'] ?> required=""/>
				<? else: ?>
					<input type="radio" name=<?= $name ?> value=<?= $value['opt'] ?> />
				<? endif; ?>
				<div class="control__indicator"></div>
			</label>
		</div>

	<?php endforeach; ?>

	<? if($other): ?>

		<div class="inlineblock mg-r-20 mg-b-20 vmiddle">
			<label class="control control--checkbox control-radio input-radcheck-trigger"><?= $other_label ?>
				<input type="radio" name=<?= $name ?> value="else" />
				<div class="control__indicator"></div>
			</label>
			<input type="text" name=<?= 'other_'.$name ?> class="input-text input-radcheck" disabled />
		</div>

	<? endif; ?>
		</div>
</div>