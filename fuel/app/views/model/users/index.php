<h2>Listing Model_Users</h2>
<br>
<?php if ($Model_Users): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($Model_Users as $item): ?>		<tr>

			<td>
				<?php echo Html::anchor('model/users/view/'.$item->id, 'View'); ?> |
				<?php echo Html::anchor('model/users/edit/'.$item->id, 'Edit'); ?> |
				<?php echo Html::anchor('model/users/delete/'.$item->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Model_Users.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('model/users/create', 'Add new Model User', array('class' => 'btn btn-success')); ?>

</p>
