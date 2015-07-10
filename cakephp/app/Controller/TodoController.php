<?php


App::uses('AppController', 'Controller');

class TodoController extends AppController {

	public function index() {
		$this->render('login');
	}

	public function cheak_session(){
		if(CakeSession::read('account_id')){
			return true;
		}else{
			return false;
		}
	}

	public function run_login() {
		$this->loadModel('account_tbs');
		if($this->account_tbs->find('first',array('conditions' => array('id' => $this->request->data['id'],'pass' => $this->request->data['pass'])))){
			
			CakeSession::write('account_id',$this->request->data['id']);
			CakeSession::write('account_name',
							$this->account_tbs->find('first',array('conditions' => array('id' => $this->request->data['id'],'pass' => $this->request->data['pass'])))['account_tbs']['name']
							);
			$this->show_main();
		}else{
			$this->set('msg','ID,passが一致しません');
			$this->index();
		}

	}

	public function show_main($where = 1) {
		$this->loadModel('task_tbs');
		if($where != 1){
			$conditions = array();
			$conditions += $where;
			$conditions += array('account_id' => CakeSession::read('account_id'));
			$conditions += array('completion' => 1);

		}else{
			$conditions = array('account_id' => CakeSession::read('account_id'));
			$conditions += array('completion' => 1);
		}
		$order = array('date' => 'ASC');

		$this->set('task_data',$this->render_data($this->task_tbs->find('all',array('conditions' => $conditions, 'order' => $order))));

		$this->loadModel('project_tbs');
		$this->set('project_data',$this->project_tbs->find('all'));

		$this->loadModel('label_tbs');
		$this->set('label_data',$this->label_tbs->find('all'));

		$this->render('main');
	}

	private function render_data($data) {
		$arr = array();
		foreach ($data as $key => $value) {
			$ex = explode(" ", $value['task_tbs']['date']);

			$arr[$ex[0]][] = $value;
		}
		return $arr;
	}

	public function select_main(){
		if($this->request->query){
			$con = array();
			foreach ($this->request->query as $key => $value) {
				if($key == "project_id"){
					$con = $con + array('project_id' => $value );
				}else if ($key == "label_id") {
					$con = $con + array('label_id' => $value );
				}else if ($key == "date") {
					$con = $con + array('date' => $value );
				}else{
					$con = $con + array('err' => 0);
					$this->set('msg',"エラーが発生しました");
				}
				if(isset($con['err'])){
					$this->show_main();
				}else{
					$this->show_main($con);
				}
			}

		}else{
			$this->set('msg',"エラーが発生しました");
			$this->show_main();
		}

	}

	public function run_logout() {
		CakeSession::delete('account_id');
		CakeSession::delete('account_name');
		$this->index();
	}

	public function show_regist_project() {
		$this->loadModel('project_tbs');

		$this->set('data',$this->project_tbs->find('all',array('conditions' => array('account_id' => CakeSession::read('account_id')))));
		$this->render('project');
	}

	public function regist_project() {
		if($this->request->data['title']){
			$this->loadModel('project_tbs');
			$data = array(
						'title' => $this->request->data['title'],
						'account_id' => CakeSession::read('account_id') 
					);
			$this->project_tbs->set($data);
			$this->project_tbs->save();
			$this->show_regist_project();
		}else{
			$this->set('msg',"内容を入れてください");
			$this->show_regist_project();
		}
	}

	public function show_regist_label() {
		$this->loadModel('label_tbs');
		$this->set('data',$this->label_tbs->find('all',array('conditions' => array('account_id' => CakeSession::read('account_id')))));
		$this->render('label');
	}

	public function regist_label() {
		if($this->request->data['title']){
			$this->loadModel('label_tbs');
			$data = array(
						'title' => $this->request->data['title'],
						'account_id' => CakeSession::read('account_id')
					);
			$this->label_tbs->set($data);
			$this->label_tbs->save();
			$this->show_regist_label;
		}else{
			$this->set('msg',"内容を入れてください");
			$this->show_regist_label();
		}
	}

	public function show_regist_task() {
		$this->loadModel('project_tbs');
		$this->set('project_data',$this->project_tbs->find('all',array('group' => 'title')));

		$this->loadModel('label_tbs');
		$this->set('label_data',$this->label_tbs->find('all',array('group' => 'title')));

		$this->render('task');
	}

	public function regist_task() {
		if($this->request->data['title']){
			$this->loadModel('task_tbs');
			$data = array(
						'title' => $this->request->data['title'], 
						'text' => $this->request->data['text'],
						'date' => $this->request->data['date'],
						'account_id' => 1,
						'project_id' => $this->request->data['project_id'],
						'label_id' => $this->request->data['label_id'],
						'completion' => 1
						//fileは保留
					);

			$this->task_tbs->set($data);
			$this->task_tbs->save();

			$this->show_regist_task();
			$this->set('msg',"登録しました");

		}else{
			$this->set('msg',"タイトルは必須です");
			$this->show_regist_task();
		}


	}

	public function delete(){
		$filed = $this->request->data['filed'];
		$this->loadModel($filed);
		$this->$filed->delete($this->request->data['id']);

		$this->set('msg',"削除しました");

		$this->show_regist_project();

	}

	public function check_comp(){
		$this->loadModel('task_tbs');
		$this->autoRender = FALSE;
		$data = array(	'id' => $this->request->data['task_id'],
						'completion' => 0
					 );

		$this->task_tbs->set($data);
		if($this->task_tbs->save()){
			return json_encode(true);
		}else{
			return json_encode(false);
		}


	}

}

?>