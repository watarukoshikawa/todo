<style>
	div#main_area{
		width: 700px;
		margin: 0 auto;
		height: 700px
	}
	div#left_area{
		float: left;
		overflow: scroll;
		width: 200px;
		height: 100%; 
	}
	div#right_area{
		float: left;
		height: 100%;
	}
</style>
<div id="main_area">
	<div id="left_area">
		<h1><?php echo CakeSession::read('account_name') ?></h1>
		<form action="/todo/cakephp/todo/show_regist_task" method="POST">
			<input type="submit" value="新規登録">
		</form>
		<ul>
			<li>プロジェクト</li>
			<?php foreach ($project_data as $key => $value): ?>
				<li>
					<a href="/todo/cakephp/todo/select_main?project_id=<?php echo $value['project_tbs']['id'] ?>">
					<?php echo $value['project_tbs']['title'] ?>
					</a>
				</li>
			<?php endforeach; ?>
		</ul>
		<form action="todo/cakephp/todo/show_regist_project" action="POST">
			<input type="submit" value="登録">
		</form>
		<ul>
			<li>ラベル</li>
			<?php foreach ($label_data as $key => $value): ?>
				<li>
					<a href="/todo/cakephp/todo/select_main?label_id=<?php echo $value['label_tbs']['id'] ?>">
					<?php echo $value['label_tbs']['title'] ?>
					</a>
				</li>
			<?php endforeach; ?>
		</ul>
		<form action="todo/cakephp/todo/show_regist_label" action="POST">
			<input type="submit" value="登録">
		</form>
	</div>
	<div id="right_area">
		<?php foreach ($task_data as $keys => $values): ?>
			<div class="task_box">
				<h2>
					<?php echo $keys; ?>
				</h2>
				<table>
					<tbody>
						<?php foreach ($values as $key => $value): ?>
							<tr>
								<td>
									<input type="checkbox">
								</td>
								<td>
									<?php echo $value['task_tbs']['title'] ?>
								</td>
								<td>
									<?php echo $value['task_tbs']['text'] ?>
								</td>
							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		<?php endforeach; ?>
	</div>
</div>