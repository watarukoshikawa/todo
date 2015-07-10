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
	}
</style>

<?php
	if (isset($msg) && $msg != "") {
		echo $msg;
	}
?>

<div id="main_area">
	<div id="headder">
		<div id="text_area">
			<p>タスク追加</p>
		</div>
		<div id="button_area">
			<form action="/todo/cakephp/todo/show_main" method="POST">
				<input type="submit" value="戻る">
			</form>
		</div>
	</div>
	<div id="form_area">
		<form action="/todo/cakephp/todo/regist_task" method="POST">
			<table>
				<tbody>
					<tr>
						<td>タイトル:</td>
						<td><input type="text" name="title" style="width:200px;"></td>
					</tr>
					<tr>
						<td>メモ:</td>
						<td><textarea name="text"></textarea></td>
					</tr>
					<tr>
						<td>プロジェクト:</td>
						<td>
							<select name="project_id">
								<option value="0">-----</option>
								<?php foreach ($project_data as $key => $value): ?>
									<option value="<?php echo $value['project_tbs']['id'] ?>">
										<?php echo $value['project_tbs']['title'] ?>
									</option>
								<?php endforeach; ?>
							</select>
						</td>
					</tr>
					<tr>
						<td>ラベル:</td>
						<td>
							<select name="label_id">
								<option value="0">-----</option>
								<?php foreach ($label_data as $key => $value): ?>
									<option value="<?php echo $value['label_tbs']['id'] ?>">
										<?php echo $value['label_tbs']['title'] ?>
									</option>
								<?php endforeach; ?>
							</select>
						</td>
					</tr>
					<tr>
						<td>日付</td>
						<td>
							<input type="text" name="date" placeholder="1900-01-01">
						</td>
					</tr>
					<tr>
						<td>
							<input type="submit" value="登録">
						</td>
					</tr>
				</tbody>
			</table>
		</form>
	</div>
</div>