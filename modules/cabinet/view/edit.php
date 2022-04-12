<table class="prof-edit-table">
  <form action="" method="post" enctype="multipart/form-data">
    <tr>
       <td>Имя пользователя: <span>*</span></td>
	   <td><input type="text" name="name" value="<?php if(isset($_POST['name'])) {echo toHtm($_POST['name']);} else {echo toHtm($row['name']);} ?>"></td>
	   <td><?php if(isset($error['name'])) {echo toHtm($error['name']);} ?></td>
    </tr>
    <tr>
       <td>Логин:<span>*</span></td>
	   <td><input type="text" name="login" value="<?php if(isset($_POST['login'])){echo toHtm($_POST['login']);} else{echo toHtm($row['login']);}?>"></td>
	   <td><?php if(isset($error['login'])) {echo toHtm($error['login']);} ?></td>
    </tr>
    <tr>
       <td>Пароль:</td>
	   <td><input type="password" name="pass"></td>
	   <td><?php if(isset($error['pass'])) {echo toHtm($error['pass']);} ?></td>
    </tr>
    <tr>
       <td>Электронная почта</td>
	   <td><input type="text" name="email" value="<?php if(isset($_POST['email'])) {echo toHtm($_POST['email']);}else{echo toHtm($row['email']);} ?>"></td>
	   <td><?php if(isset($error['email'])) {echo toHtm($error['email']);} ?></td>
    </tr>
	<tr>
	  <td>Возраст</td>
	  <td><input type="text" name="age" value="<?php if(isset($row['age'])) {echo toHtm($row['age']);} ?>"></td>
	  <td><?php if(isset($error['age'])) {echo toHtm($error['age']);} ?></td>
	</tr>
	<tr>
	  <td>Пол пользователя</td>
	  <td><label><input type="radio" name="sex" value="Женский" align="left" <?php if(isset($row['sex']) && $row['sex'] == 'Женский') {echo 'checked';} ?>>Ж</label> <label><input type="radio" name="sex" value="Мужской" <?php if(!isset($row['sex']) || (isset($row['sex']) && $row['sex'] == 'Мужской')) {echo 'checked';} ?>>М</label></td>
	  <td></td>
	</tr>
	<tr>
	  <td>
		Вставить изображение пользователя
	  </td>
	  <td>
	  	<input type="file" name="file">
	  </td>
	  <td>
	  	<?php if(isset($error['file'])) {echo toHtm($error['file']);} ?>
	  </td>
	</tr>
	<tr>
	  <td colspan="2" align="center"><input type="submit" value="Редактировать"></td>
	</tr>
	<tr>
  	  <td colspan="2" align="center"><span>*</span> - поле обязательно для заполнения</td>
  	</tr>
  </form>
</table>