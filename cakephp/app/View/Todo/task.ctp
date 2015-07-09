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
			<p>
				タイトル:<input type="text" name="title">
			</p>
			<p>
				メモ:
				<textarea name="text"></textarea>
			</p>
			<p>
				プロジェクト:
				<select name="project_id">
					<option value="0">-----</option>
					<?php foreach ($project_data as $key => $value): ?>
						<option value="<?php echo $value['project_tbs']['id'] ?>">
							<?php echo $value['project_tbs']['title'] ?>
						</option>
					<?php endforeach; ?>
				</select>
			</p>
			<p>
				ラベル:
				<select name="label_id">
					<option value="0">-----</option>
					<?php foreach ($label_data as $key => $value): ?>
						<option value="<?php echo $value['label_tbs']['id'] ?>">
							<?php echo $value['label_tbs']['title'] ?>
						</option>
					<?php endforeach; ?>
				</select>
			</p>
			<p>
				日付
				<input type="text" name="date" placeholder="1900-01-01">
			</p>
			<input type="submit" value="登録">
		</form>
	</div>
</div>