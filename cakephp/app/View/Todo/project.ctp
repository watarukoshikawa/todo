<div id="main_area">
	<div id="headder">
		<div id="text_area">
			<p>プロジェクト追加</p>
		</div>
		<div id="button_area">
			<form action="/todo/cakephp/todo/show_main" method="POST">
				<input type="submit" value="戻る">
			</form>
		</div>
	</div>
	<div id="form_area">
		<form action="/todo/cakephp/todo/regist_project" method="POST">
			<input type="text" name="title">
			<input type="submit" value="登録">
		</form>
	</div>
	<div id="data_area">
		<table>
			<tbody>
			<?php var_dump($data); ?>
				<?php foreach ($data as $key => $value): ?>
					<tr>
						<td>
							<?php echo $value['project_tbs']['title'] ?>
						</td>
						<td>
							<form action="/todo/cakephp/todo/delete" method="POST">
								<input type="hidden" name="filed" value="project_tbs">
								<input type="hidden" name="id" value="<?php echo $value['project_tbs']['id']?>" >
								<input type="submit" value="削除">
							</form>
						</td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
</div>