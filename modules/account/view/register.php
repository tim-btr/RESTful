<?php 
use library\Helper;
?>
<div class="container">
	<div class="row">
		<div class="col-10">
			<div class="text-center warning">
				<span class="rstar">*</span>
				- required field
			</div>

			<form action="" method="post">

				<div class="form-group row">
					<label for="inputName" class="col-sm-2 col-form-label">
						Name
						<span class="rstar">*</span>
					</label>
					<div class="col-sm-10">
						<input type="text" name="name" class="form-control <?php if(isset($errors['name'])) {echo 'is-invalid';} ?>" id="inputName" placeholder="<?php if(isset($errors['name'])){echo Helper::hc($errors['name']);}else{echo 'Type your name';}?>" value="<?php if(isset($_POST['name'])) {echo Helper::hc($_POST['name']);}?>">
					</div>
				</div>

				<div class="form-group row">
					<label for="inputEmail" class="col-sm-2 col-form-label">
						Phone number
						<span class="rstar">*</span>
					</label>
					<div class="col-sm-10">
						<input type="text" name="phone" class="form-control <?php if(isset($errors['phone'])) {echo 'is-invalid';} ?>"  placeholder="<?php if(isset($errors['phone'])) {echo Helper::hc($errors['email']);}else{echo 'Phone number: +79996661454';} ?>" value="<?php if(isset($_POST['phone'])) {echo Helper::hc($_POST['phone']);}?>">
					</div>
				</div>

				<div class="form-group row">
					<div class="col-sm-10">
						<button type="submit" class="btn btn-primary">Sign In</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>




