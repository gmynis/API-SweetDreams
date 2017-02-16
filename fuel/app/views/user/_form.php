<?php echo Form::open(array("class"=>"form-horizontal")); ?>

	<fieldset>
		<div class="form-group">
			<?php echo Form::label('Id', 'id', array('class'=>'control-label')); ?>

				<?php echo Form::input('id', Input::post('id', isset($User) ? $User->id : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Id')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Username', 'username', array('class'=>'control-label')); ?>

				<?php echo Form::input('username', Input::post('username', isset($User) ? $User->username : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Username')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Password', 'password', array('class'=>'control-label')); ?>

				<?php echo Form::input('password', Input::post('password', isset($User) ? $User->password : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Password')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Email', 'email', array('class'=>'control-label')); ?>

				<?php echo Form::input('email', Input::post('email', isset($User) ? $User->email : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Email')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Image', 'image', array('class'=>'control-label')); ?>

				<?php echo Form::input('image', Input::post('image', isset($User) ? $User->image : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Image')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Fk admin', 'fk_admin', array('class'=>'control-label')); ?>

				<?php echo Form::input('fk_admin', Input::post('fk_admin', isset($User) ? $User->fk_admin : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Fk admin')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Fk player', 'fk_player', array('class'=>'control-label')); ?>

				<?php echo Form::input('fk_player', Input::post('fk_player', isset($User) ? $User->fk_player : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Fk player')); ?>

		</div>
		<div class="form-group">
			<label class='control-label'>&nbsp;</label>
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>		</div>
	</fieldset>
<?php echo Form::close(); ?>