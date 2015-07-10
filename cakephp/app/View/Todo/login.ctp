<style type="text/css">
	div#main_area{
		width: 300px;
		margin: 0 auto;
	}
</style>

<?php
	if (isset($msg) && $msg != "") {
		echo $msg;
	}
?>

<div id="main_area">
	<form action="/todo/cakephp/todo/run_login" method="POST">
		ID:<input type="text" name="id">
		PASS:<input type="text" name="pass">
		<input type="submit">
	</form>
</div>

