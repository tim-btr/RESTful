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
					<label>Phone</label>
					<input name="phone" type="text" class="form-control" placeholder="Phone number 12 digits: +78881275847">
				</div>
				<button type="submit" class="btn btn-primary">Sign In</button>
			</form>
		</div>
	</div>
</div>