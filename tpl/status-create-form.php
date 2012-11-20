<?php include 'header.php'; ?>

<h1>Update your status</h1>

<form method="post" action="<?php echo BASE_URL; ?>">
	<input type="hidden" name="view" value="status.create" />
	<input type="text" name="status" placeholder="What are you doing?" required="required" />
	<input type="submit" value="Update status" />
</form>

<?php include 'footer.php'; ?>