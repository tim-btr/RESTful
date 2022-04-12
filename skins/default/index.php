<?php
use config\Core;
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>RESTful App</title>
	<link rel="stylesheet" href="/css/bootstrap.min.css">
	<link rel="stylesheet" href="/skins/<?php echo hc(Core::$SKIN);?>/css/custom.css">
</head>
<body>
	<header>
		<div class="container-fluid">
			<div class="row">
				<?php
				if(isset($_SESSION['user'])) {
					  echo '<div class="col align-self-start greet">приветствую, '.$_SESSION['user']['name'].'</div>';
				}
				?>
				<div class="auth col align-self-end text-right">
					<?php
					if(!isset($_SESSION['user'])) { ?>
						  <a href="/account/login">вход</a>
						  <a href="/account/register">регистрация</a>
					<?php
					} else { ?>
						  <a href="/account/exit">выход</a>
					<?php
					}
					?>
		  	</div>
			</div>
		</div>
		<nav class="navbar navbar-expand-lg navbar-light">
			<a class="navbar-brand" href="/">imagica</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse mr-5" id="navbarNav">
				<ul class="navbar-nav">
					<?php
					foreach($navigation as $k=>$v) { ?>
							<li class="nav-item">
								<a class="nav-link" href="/<?php echo hc($k);?>"><?php echo hc($v);?></a>
							</li>
					<?php
					}
					?>
					</li>
				</ul>
			</div>
		</nav>
	</header>

<main>
	<?php echo $content; ?>
</main>

<footer class="">
	<div class="container-fluid text-center">
		&copy; <?php echo Core::$YEAR.' - '.date('Y'); ?> Imagica.
	</div>
</footer>
<!-- ///////////// ПОДКЛЮЧЕНИЕ СКРИПТОВ  ///////////// -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"
  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
  crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="/js/api.js" ></script>
</body>
</html>