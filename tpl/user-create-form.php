<?php include 'header.php'; ?>

<h1>Create an account</h1>

<form method="post" action="<?php echo BASE_URL; ?>">
	<input type="hidden" name="view" value="user.create" />
	<input type="text" name="username" placeholder="Username" required="required" />
	<input type="password" name="password" placeholder="Password" required="required" />
	<input type="submit" value="Create account" />
</form>

<?php include 'footer.php'; ?>