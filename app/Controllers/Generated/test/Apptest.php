<?php
/*
 * Created by generator
 *
 */
require_once(APPPATH . '/controllers/test/Toast.php');

class AppTest extends Toast {

	function __construct(){
		parent::__construct();
		$this->load->database('test');
		
		$this->load->library('AppService');
		$this->load->model('AppModel');
		
	}
	
	/**
	 * OPTIONAL; Anything in this function will be run before each test
	 * Good for doing cleanup: resetting sessions, renewing objects, etc.
	 */
	function _pre() {
		$apps = $this->appservice->getAll($this->db);
		foreach ($apps as $app) {
			$this->appservice->deleteByKey($this->db, $app->id);
		}
	}
	
	
	/**
	 * OPTIONAL; Anything in this function will be run after each test
	 * I use it for setting $this->message = $this->MyModel->getError();
	 */
	function _post() {
		$apps = $this->appservice->getAll($this->db);
		foreach ($apps as $app) {
			$this->appservice->deleteByKey($this->db, $app->id);
		}
	}
	
	public function test_insert(){
		$this->message = "Tested methods: save, getApp, delete";
		// création d'un enregistrement
		$app_insert = new AppModel();
		// Nothing for field id
		$app_insert->name = 'test_0';
		$app_insert->owner_id = 0;
		$app_insert->server = 'test_0';
		$this->appservice->insertNew($this->db, $app_insert);
		// $app_insert->id est maintenant affecté
	
		$app_select = $this->appservice->getUnique($this->db, $app_insert->id);
	
		$this->_assert_equals($app_select->id, $app_insert->id);
		$this->appservice->deleteByKey($this->db, $app_select->id);
	}
	
	
	public function test_update(){
		$this->message = "Tested methods: save, update, getApp, delete";

		$app_insert = new AppModel();
		// Nothing for field id
		$app_insert->name = 'test_0';
		$app_insert->owner_id = 0;
		$app_insert->server = 'test_0';
		$this->appservice->insertNew($this->db, $app_insert);
	
		$app_update = $this->appservice->getUnique($this->db, $app_insert->id);
		// Nothing for field id
		$app_update->name = 'test1_0';
		$app_update->owner_id = 90;
		$app_update->server = 'test1_0';
		$this->appservice->update($this->db, $app_insert);
	
		$app_update = $this->appservice->getUnique($this->db, $app_insert->id);
		
		if(!$this->_assert_equals($app_insert->id, $app_update->id)) {
			return false;
		}
		if(!$this->_assert_equals($app_insert->name, $app_update->name)) {
			return false;
		}
		if(!$this->_assert_equals($app_insert->owner_id, $app_update->owner_id)) {
			return false;
		}
		if(!$this->_assert_equals($app_insert->server, $app_update->server)) {
			return false;
		}

		$this->appservice->deleteByKey($this->db, $app_insert->id);
	}
	
	
	public function test_count(){
		$this->message = "Tested methods: count, save, getUnique, deleteByKey";
	
		// comptage pour vérification : avant
		$countAppsAvant = $this->appservice->count($this->db);
	
		// création d'un enregistrement
		$app = new AppModel();
		// Nothing for field id
		$app->name = 'test_0';
		$app->owner_id = 0;
		$app->server = 'test_0';
		$this->appservice->insertNew($this->db, $app);
	
		// comptage pour vérification : après insertion
		$countAppsApres = $this->appservice->count($this->db);
	
		// verification d'ajout d'un enregistrement
		$this->_assert_equals($countAppsAvant +1, $countAppsApres);
	
		// recupération de l'objet par son  id
		$app = $this->appservice->getUnique($this->db, $app->id);
	
		// suppression de l'enregistrement
		$this->appservice->deleteByKey($this->db, $app->id);
	
		// comptage pour vérification : après suppression
		$countAppsFinal = $this->appservice->count($this->db);
		$this->_assert_equals($countAppsAvant, $countAppsFinal);
	
	}
	
	
	function test_list(){
		$this->message = "Tested methods: save, getAll, delete";
	
		$app_insert = new AppModel();
		// Nothing for field id
		$app_insert->name = 'test_0';
		$app_insert->owner_id = 0;
		$app_insert->server = 'test_0';
		$this->appservice->insertNew($this->db, $app_insert);
	
		$apps = $this->appservice->getAll($this->db);
		if( ! $this->_assert_not_empty($apps) ) {
			log_message('DEBUG', '[UNIT TEST / Apptest.php)] #test_list : getAll after insert != 1');
			return $this->_fail('getAll after insert != 1');
		}
		$found = 0;
		foreach ($apps as $app) {
			if($app->id == $app_insert->id &&
					$this->_assert_equals($app->name, $app_insert->name ) && 
					$this->_assert_equals($app->owner_id, $app_insert->owner_id ) && 
					$this->_assert_equals($app->server, $app_insert->server )
				){
				$found++;
			}
		}
		if( $found == 1 ){
			$this->appservice->deleteByKey($this->db, $app->id);
			log_message('DEBUG', '[UNIT TEST / Apptest.php)] #test_list : OK');
			return $this->_assert_true(True);
		}else{
			log_message('DEBUG', '[UNIT TEST / Apptest.php)] #test_list : found != 1');
			return $this->_fail('found != 1');
		}
	}

}
?>
