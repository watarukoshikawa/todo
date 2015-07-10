<style>
	div#main_area{
		width: 600px;
		margin: -10px auto;
		height: 700px;
		background-color:#CCFFFF ;
	}
	div#left_area{
		float: left;
		overflow: scroll;
		width: 214px;
		height: 100%; 
		background-color:#99FFFF ;
		text-align: center;
	}
	div#right_area{
		float: left;
		height: 100%;
		margin-left: 40px;
	}
	div.task_box{
		width:300px;
	}
	table#calender{
		background-color: white;
	}
	th{
		font-size: 60%;
	}
	td{
		font-size: 60%;
		font-weight: 700;
		background-color: rgba(255,0,0,0);
	}
	h2{
		font-size: 20px;
	}
</style>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script type="text/javascript">
	$('document').ready(function(){
		$('[name=check_box]').click(function(){
			var area = $(this).parent().parent();
			console.dir(area);
			$.ajax({
				url: '/todo/cakephp/todo/check_comp',
				type: 'post', 
				dataType: 'json', 
				data:{"task_id": $(this).val()},
				success: function(res){
					if(res){
						$(area).empty();
					}else{
						alert("エラーが発生しました");
					}
				},
				error: function(xhr, textStatus, errorThrown){
					alert('Error! ' + textStatus + ' ' + errorThrown);
				}
			});
		});
	})
</script>
<?php
	if (isset($msg) && $msg != "") {
		echo $msg;
	}
?>
<div id="main_area">
	<div id="left_area">
		<p style="font-size:140%;"><?php echo CakeSession::read('account_name') ?></p>
		<form action="/todo/cakephp/todo/run_logout" method="POST">
			<input type="submit" value="ログアウト">
		</form>
		<br>
		<form action="/todo/cakephp/todo/show_regist_task" method="POST">
			<input type="submit" value="新規登録">
		</form>
		<br>
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
		<form action="/todo/cakephp/todo/show_regist_project" action="POST">
			<input type="submit" value="登録">
		</form>
		<br>
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
		<form action="/todo/cakephp/todo/show_regist_label" action="POST">
			<input type="submit" value="登録">
		</form>
		<br>
		<?php
			$now_year = date("Y");
			$now_month = date("n");
			$now_day = date("j");

			$weekday = array( "日", "月", "火", "水", "木", "金", "土" );

			$fir_weekday = date( "w", mktime( 0, 0, 0, $now_month, 1, $now_year ) );

			echo '<table id="calender" border="1"  style="text-align:center; width:90px;">';

			echo "<tr>";

			$i = 0;
			while( $i <= 6 ){ 
				if( $i == 0 ){ 
					$style = "#C30";
				}else if( $i == 6 ){ 
					$style = "#03C";
				}else{ 
					$style = "black";
				}

				echo "<th style='color:{$style}'>{$weekday[$i]}</th>";
				$i ++; 
			}

			echo "</tr>";
			echo "<tr>";

			$i = 0; 
			while( $i != $fir_weekday ){
				echo "<td></td>";
			$i ++;
			}
			for( $day=1; checkdate( $now_month, $day, $now_year ); $day++ ){

				if( $i > 6 ){
					$i = 0;
					echo "</tr>";
					echo "<tr>";
				}

				if( $i == 0 ){ 
					$style = "#C30";
				}else if( $i == 6 ){ 
					$style = "#03C";
				}else{ 
					$style = "black";
				}

				if( $day == $now_day ){
					$style = $style."; background:silver";
				}
				echo "<td style='color:{$style}'><a href='/todo/cakephp/todo/select_main?date={$now_year}-{$now_month}-{$day}'>{$day}</a></td>";

				$i++;
			}

			while( $i < 7 ){ 
			echo "<td></td>";
			$i++;
			}
			echo "</tr>";
			echo "</table>";
		?>
	</div>
	<div id="right_area">
		<form action="/todo/cakephp/todo/show_main">
			<input type="submit" value="クリア" style="float:right;">
		</form>
		<br>
		<br>
		<br>
		<?php foreach ($task_data as $keys => $values): ?>
			<div class="task_box">
				<p style="font-size:140%; color:red;">
					<?php echo $keys; ?>
				</p>
				<table>
					<tbody>
						<?php foreach ($values as $key => $value): ?>
							<tr>
								<td width="30px">
									<input type="checkbox" value="<?php echo $value['task_tbs']['id'] ?>" name="check_box">
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
			<br>
		<?php endforeach; ?>
	</div>
</div>