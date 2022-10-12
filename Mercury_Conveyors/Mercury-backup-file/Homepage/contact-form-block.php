<?php
$border                  = get_field('border');
$select_contact_form 	 = get_field('select_contact_form');
?>

<?php if(!empty($select_contact_form)) { ?>
	<div class="contact_form_default contact_form">
		<?php echo do_shortcode('[contact-form-7 id="'.$select_contact_form[0].'"]') ?>
	</div>
<?php } ?>

