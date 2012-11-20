<?php include 'header.php'; ?>

<h1>What are your colleagues up to?</h1>

<?php if($current_user->is_registered()): ?>

<table>
	<tr>
		<th>Username</th>
		<th>Current Status</th>
		<th>Last Status Update</th>
	</tr>
	<?php foreach($users as $user): ?>
	<tr>
		<td><?php echo $user->get_username(); ?></td>
		<td><?php echo $user->get_status()->get_status_content(); ?></td>
		<td><?php echo $user->get_status()->get_date_posted(); ?>
	</tr>
	<?php endforeach; ?>
</table>

<?php else: ?>

<p>You have to login to find out!</p>

<?php endif; ?>

<?php include 'footer.php'; ?>