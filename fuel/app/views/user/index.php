<h2>Listing Users</h2>
<br>
<?php if ($Users): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Id</th>
			<th>Username</th>
			<th>Password</th>
			<th>Email</th>
			<th>Image</th>
			<th>Fk admin</th>
			<th>Fk player</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($Users as $item): ?>		<tr>

			<td><?php echo $item->id; ?></td>
			<td><?php echo $item->username; ?></td>
			<td><?php echo $item->password; ?></td>
			<td><?php echo $item->email; ?></td>
			<td><?php echo $item->image; ?></td>
			<td><?php echo $item->fk_admin; ?></td>
			<td><?php echo $item->fk_player; ?></td>
			<td>
				<?php echo Html::anchor('user/view/'.$item->id, 'View'); ?> |
				<?php echo Html::anchor('user/edit/'.$item->id, 'Edit'); ?> |
				<?php echo Html::anchor('user/delete/'.$item->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Users.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('user/create', 'Add new User', array('class' => 'btn btn-success')); ?>

</p>
