<style type="text/css">
	div#main_area{
		width: 400px;
		margin: 0 auto;
	}
	div#text_area{
		float: left;
	}
	div#button_area{
		float: right;
		margin-right: 18px;
	}
</style>

<?php
	if (isset($msg) && $msg != "") {
		echo $msg;
	}
?>
<div id="main_area">
	<div id="hedder">
		<div id="text_area">
			<p>ラベル追加</p>
		</div>
		<div id="button_area">
			<form action="/todo/cakephp/todo/show_main" method="POST">
				<input type="submit" value="戻る">
			</form>
		</div>
	</div>
	<div id="form_area">
		<form action="/todo/cakephp/todo/regist_label" method="POST">
			<table>
				<tbody>
					<tr>
						<td><input type="text" name="title"></td>
						<td><input type="submit" value="登録"></td>
					</tr>
				</tbody>
			</table>
		</form>
	</div>
	<div id="data_area">
		<table>
			<tbody>
				<?php foreach ($data as $key => $value): ?>
					<tr>
						<td>
							<?php echo $value['label_tbs']['title'] ?>
						</td>
						<td style="width:77px;">
							<form action="/todo/cakephp/todo/delete" method="POST">
								<input type="hidden" name="filed" value="label_tbs">
								<input type="hidden" name="id" value="<?php echo $value['label_tbs']['id']?>" >
								<input type="submit" value="削除">
							</form>
						</td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
</div>