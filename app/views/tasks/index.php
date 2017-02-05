<div class="container">
	<div class="row">
		<button class="btn blue pull-right addTask">Add Task</button>
	</div>

	<form action="addTask" method="POST" enctype="multipart/form-data" class="formAddTask" style="display:none;">
		<h3>Add Task</h3>

		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
		            <label class="bold">Name</label>
	            	<input type="text" name="user" class="form-control" required="">
		        </div>

				<div class="form-group">
		            <label class="bold">Email</label>
	            	<input type="text" name="email" class="form-control" required="">
		        </div>

				<div class="form-group">
					<label class="bold">Task Description</label>
					<textarea type="text" name="task_description" class="form-control" required=""></textarea>
				</div>

				<div class="checkbox">
			  		<label><input type="checkbox" value="1" name="status">Done</label>
				</div>
				
				<input name="img" type="file" id="uploadImage"/>

				<button class="btn blue pull-right">Save</button>
				<div class="btn default pull-right perviewTask">Preview</div>
			</div>
		</div>
	</form>

	<? if( !empty($_COOKIE['login']) && !empty($_GET['editTask'])) {?>
		<form action="editTask" method="POST" enctype="multipart/form-data" class="formEditTask">
			<h3>Edit</h3>
			
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
			            <label class="bold">Name</label>
		            	<input type="text" name="user" class="form-control" required="" value="<? echo $data['editTask']['user']?>">
			        </div>

					<div class="form-group">
			            <label class="bold">Email</label>
		            	<input type="text" name="email" class="form-control" required="" value="<? echo $data['editTask']['email']?>">
			        </div>
					<div class="form-group">
						<label class="bold">Task Description</label>
						<textarea type="text" name="task_description" class="form-control" required=""><? echo $data['editTask']['task_description'] ?></textarea>
					</div>

					<div class="checkbox">
			  			<label><input type="checkbox" name="status"  value="1" <? echo $data['editTask']['status'] ? "checked" : "" ?>>Done</label>
					</div>

					<input type="hidden" name="id" value="<? echo $data['editTask']['id']?>">

					<button class="btn blue pull-right">Save</button>
					<div class="btn default pull-right closeEditTask">Close</div>
				</div>
			</div>
		</form>
	<? } ?>

	<div class="row tasks">
		<? if(!empty($data['data'][0])) { ?>
			<div class="col-md-12 filter">
				<div class="row">
					<div class="col-md-2">
						<? if( !empty( $data['sort'][0] == 'user') && $data['sort'][1] != 'desc' ) {?>
							<a href="?sort=user_desc">user <i class="glyphicon glyphicon-menu-down"></i></a>
						<? } else { ?>
							<a href="?sort=user_asc">user <i class="glyphicon glyphicon-menu-up"></i></a>
						<? } ?>
					</div>
					
					<div class="col-md-2">
						<? if( !empty( $data['sort'][0] == 'email') && $data['sort'][1] != 'desc' ) {?>
							<a href="?sort=email_desc">email <i class="glyphicon glyphicon-menu-down"></i></a>
						<? } else { ?>
							<a href="?sort=email_asc">email <i class="glyphicon glyphicon-menu-up"></i></a>
						<? } ?>
					</div>
					
					<div class="col-md-2">
						<? if( !empty( $data['sort'][0] == 'status') && $data['sort'][1] != 'desc' ) {?>
							<a href="?sort=status_desc">status <i class="glyphicon glyphicon-menu-down"></i></a>
						<? } else { ?>
							<a href="?sort=status_asc">status <i class="glyphicon glyphicon-menu-up"></i></a>
						<? } ?>
					</div>
				</div>
			</div>
		<? } ?>

		<div class="col-md-12 task_preview" style="display: none;">
			<div class="row">
				<div class="col-md-2">
					<img id="uploadPreview" width="100" />
				</div>
				<div class="col-md-8">
					<div>
						<span class="user"></span>
						<span class="email"></span>
					</div>

					<div class="task_description"></div>
				</div>
				<div class="col-md-1 status"></div>
			</div>
		</div>

		<? if(!empty($data['data'])) {
			foreach ($data['data']  as $value) { ?>
				<div class="col-md-12 task">
					<div class="row">
						<div class="col-md-2">
							<img src="http://my_site.com/app/public/img/<? echo $value['img'] ?>" width='100'>
						</div>

						<div class="col-md-8">
							<div>
								<span class="user">
									<? echo $value['user'] ?>
								</span>
								<span class="email">
									<? echo $value['email'] ? '('.$value['email'].')' : ''; ?>
								</span>
							</div>

							<div><? echo $value['task_description'] ?></div>
						</div>

						<div class="col-md-1">
							<? echo $value['status'] ? 'Done' : '' ?>
						</div>

						<div class="col-md-1">
							<? if( !empty($_COOKIE['login']) ) {?>
								<a href="?editTask=<? echo $value['id'] ?>">
									<i class="glyphicon glyphicon-edit"></i>
								</a>
							<? }?>
						</div>
					</div>
				</div>
			<? } ?>
		<? } ?>
	</div>
</div>