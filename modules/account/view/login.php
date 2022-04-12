<div class="bg-info info">
	<?php
	if(isset($info)) {
		echo $info;
	}
	?>
</div>
<div class="container-fluid">
	<div class="row">
		<div class="col-4 offset-4">
			<form action="" method="post">
				<div class="form-group">
					<label>Логин</label>
					<input name="login" type="text" class="form-control" placeholder="Логин">
				</div>
				<div class="form-group">
					<label>Пароль</label>
					<input name="pass" type="password" class="form-control" id="" placeholder="Пароль">
				</div>
				<div class="form-group form-check">
					<label class="form-check-label" for="frontChOut">
						<input type="checkbox" name="rememberme" class="form-check-input" id="frontChOut">
						Запомнить
					</label>
				</div>
				<button type="submit" class="btn btn-primary">Вход</button>
			</form>
		</div>
	</div>
</div>