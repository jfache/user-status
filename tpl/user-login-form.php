<?php include 'header.php'; ?>

<h1>User Login</h1>

<form method="post" action="<?php echo BASE_URL; ?>">
	<input type="hidden" name="view" value="user.login" />
	<input type="text" name="username" placeholder="Username" required="required" />
	<input type="password" name="password" placeholder="Password" required="required" />
	<input type="submit" value="Login" />
</form>

<p>Don't have an account yet? <a href="user/create/">Get one here!</a></p>

<?php include 'footer.php'; ?>