<?php 
if(isset($notice)) {
	echo $notice;
} else { ?>
	<h3 class="greetings">Приветсвуем Вас в личном кабинете!</h3>
	<?php 
	if(empty($row['profile-pic'])) { ?>
		<img src="/img/users/profile-pic.png" alt="profile-pic" class="prof-pic">
	<?php	
	} else { ?>
		<img src="<?php echo $row['profile-pic']; ?>" alt="profile-pic" class="prof-pic">
	<?php
	}?>
	<div class="prof-name"><?php echo $row['name']; ?></div><br><br>
	<table class="prof-table">
	  <tr>
	    <td>Пол</td>
	    <td><?php echo tohtm($row['sex']); ?></td>
	  </tr>
	  <tr>
	    <td>Зарегистрирован</td>
	    <td></td>
	  </tr>
	  <tr>
	    <td>Эл. почта</td>
	    <td><?php echo  '<a href="#">'.tohtm($row['email']).'</a>'; ?></td>
	  </tr>
	</table>
	<div class="clear"></div>

	<a href="/cabinet/edit/edit/<?php echo (int)$_GET['key1']; ?>" class="prof-edit">Редактировать профиль</a>
	<a href="/cabinet/edit/delete/<?php echo (int)$_GET['key1']; ?>" class="prof-del-pic">Удалить фото</a>
<?php } ?>
