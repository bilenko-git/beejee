<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>BeeJee</title>
		<? echo $file->links(); ?>
	</head>
	
	<body>
	    <nav>
		    <div class="wrap">
		        <div class="logo">
		            <div class="ltitle">BeeJee</div>           
		        </div>

		        <menu>
		            <li><a href="/tasks/index">Tasks</a></li>
		            <? if( !empty($_COOKIE['login']) ) {?>
		            	<li><a href="/login/logout">Logout (<? echo $_COOKIE['login']; ?>)</a></li>
	            	<? } else { ?>
	            		<li><a href="/login/user">Authentication</a></li>
	            	<? }?>
		        </menu>
		    </div>
		</nav>
	</body>
</html>