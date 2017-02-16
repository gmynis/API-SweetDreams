<h2>Viewing #<?php echo $User->id; ?></h2>

<p>
	<strong>Id:</strong>
	<?php echo $User->id; ?></p>
<p>
	<strong>Username:</strong>
	<?php echo $User->username; ?></p>
<p>
	<strong>Password:</strong>
	<?php echo $User->password; ?></p>
<p>
	<strong>Email:</strong>
	<?php echo $User->email; ?></p>
<p>
	<strong>Image:</strong>
	<?php echo $User->image; ?></p>
<p>
	<strong>Fk admin:</strong>
	<?php echo $User->fk_admin; ?></p>
<p>
	<strong>Fk player:</strong>
	<?php echo $User->fk_player; ?></p>

<?php echo Html::anchor('user/edit/'.$User->id, 'Edit'); ?> |
<?php echo Html::anchor('user', 'Back'); ?>