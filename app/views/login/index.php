<div class="container">
	<? if( !empty($data['login']) ) {?>
		<div class="row">
			<div class="col-md-6">
				<div class="alert alert-success">
			  		<strong>Success!</strong> 
			  		Congratulations!
				</div>
			</div>
		</div>
	<? } else { ?>

		<? if( !empty($data['message']) ) {?>
			<div class="alert alert-danger">
				<strong>Danger!</strong>
				<? echo $data['message'] ?>
			</div>	
		<? }?>
		
		<form action="user" method="POST">
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label class="bold">Login</label>
						<input type="text" name="login" class="form-control" required="">
					</div>

					<div class="form-group">
						<label class="bold">Password</label>
						<input type="password" name="password" class="form-control" required="">
					</div>

					<button class="btn blue pull-right">Save</button>
				</div>
			</div>
		</form>
	<? }?>
</div>