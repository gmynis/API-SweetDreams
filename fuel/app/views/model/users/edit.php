<h2>Editing Model_User</h2>
<br>

<?php echo render('model/users/_form'); ?>
<p>
	<?php echo Html::anchor('model/users/view/'.$Model_User->id, 'View'); ?> |
	<?php echo Html::anchor('model/users', 'Back'); ?></p>
