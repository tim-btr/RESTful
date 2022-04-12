<div class="container">
<?php
if (isset($_SESSION['register']) && 'ok' == $_SESSION['register']) {
		echo '<p class="h3">Проверьте электронную почту для подтверждения регистрации</p>';
		unset($_SESSION['register']);
} else { ?>
	<div class="container-fluid">
		<div class="row">

			<div class="col-10">
				<div class="text-center warning">
					<span class="rstar">*</span>
					- поле обязательно для заполнения
				</div>

				<form action="" method="post">

					<div class="form-group row">
						<label for="inputName" class="col-sm-2 col-form-label">
							Имя пользователя
							<span class="rstar">*</span>
						</label>
						<div class="col-sm-10">
							<input type="text" name="name" class="form-control <?php if(isset($errors['name'])) {echo 'is-invalid';} ?>" id="inputName" placeholder="<?php if(isset($errors['name'])){echo hc($errors['name']);}else{echo 'Имя пользователя';}?>" value="<?php if(isset($_POST['name'])) {echo hc($_POST['name']);}?>">
						</div>
					</div>

					<div class="form-group row">
						<label for="inputLogin" class="col-sm-2 col-form-label">
							Логин
							<span class="rstar">*</span>
						</label>
						<div class="col-sm-10">
							<input type="text" name="login" class="form-control <?php if(isset($errors['login'])) {echo 'is-invalid';}?>" placeholder="<?php if(isset($errors['login'])) {echo hc($errors['login']);}else{echo 'Логин';}?>" value="<?php if(isset($_POST['login'])) {echo hc($_POST['login']);}?>">
						</div>
					</div>

					<div class="form-group row">
						<label for="inputPassword" class="col-sm-2 col-form-label">
							Пароль
							<span class="rstar">*</span>
						</label>
						<div class="col-sm-10">
							<input type="password" name="pass" class="form-control <?php if(isset($errors['pass'])) {echo 'is-invalid';}?>" placeholder="<?php if(isset($errors['pass'])) {echo hc($errors['pass']);}else{echo 'Пароль';}?>">
						</div>
					</div>

					<div class="form-group row">
						<label for="inputEmail" class="col-sm-2 col-form-label">
							Эл. почта
							<span class="rstar">*</span>
						</label>
						<div class="col-sm-10">
							<input type="email" name="email" class="form-control <?php if(isset($errors['email'])) {echo 'is-invalid';} ?>" id="inputEmail" placeholder="<?php if(isset($errors['email'])) {echo hc($errors['email']);}else{echo 'Эл. почта';	} ?>" value="<?php if(isset($_POST['email'])) {echo hc($_POST['email']);}?>">
						</div>
					</div>

					<div class="form-group row">
						<label for="inputAge" class="col-sm-2 col-form-label">Возраст</label>
						<div class="col-sm-10">
							<input type="text" name="age" class="form-control" id="inputAge" placeholder="Возраст" value="<?php if(isset($_POST['age'])){echo hc($_POST['age']);}?>">
						</div>
					</div>

					<fieldset class="form-group">
						<div class="row">
							<legend class="col-form-label col-sm-2 pt-0">Пол</legend>
							<div class="col-sm-10">

								<div class="form-check">
									<label class="form-check-label">
									<input class="form-check-input" type="radio" value="m" name="sex" <?php if(isset($_POST['sex']) && $_POST['sex'] == 'm') {echo 'checked';}?>>
										Муж.
									</label>
								</div>

								<div class="form-check">
									<label class="form-check-label">
									<input class="form-check-input" type="radio" name="sex" value="f" <?php if(isset($_POST['sex']) && $_POST['sex'] == 'f') {echo 'checked';} ?>>
										Жен.
									</label>
								</div>

							</div>
						</div>
					</fieldset>

					<div class="form-group row">
						<div class="col-sm-10">
							<button type="submit" class="btn btn-primary">Регистрация</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
<?php
}



