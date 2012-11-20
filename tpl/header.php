<!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title><?php echo $page_title; ?></title>
<base href="<?php echo BASE_URL; ?>" />
</head>

<body>

<header>
	Welcome	<?php echo $current_user->get_username(); ?>.
	<ul>
		<?php if($current_user->is_registered()): ?>
		<li><a href="status/create/">Update status</a></li>
		<li><a href="user/logout/">Logout</a></li>
		<?php else: ?>
		<li><a href="user/login/">Login</a></li>
		<li><a href="user/create/">Create account</a></li>
		<?php endif; ?>
	</ul>
</header>