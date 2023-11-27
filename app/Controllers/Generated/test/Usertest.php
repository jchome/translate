<?php
/*
 * Created by generator
 *
 */
require_once(APPPATH . '/controllers/test/Toast.php');

class UserTest extends Toast {

	function __construct(){
		parent::__construct();
		$this->load->database('test');
		
		$this->load->library('UserService');
		$this->load->model('UserModel');
		
	}
	
	/**
	 * OPTIONAL; Anything in this function will be run before each test
	 * Good for doing cleanup: resetting sessions, renewing objects, etc.
	 */
	function _pre() {
		$users = $this->userservice->getAll($this->db);
		foreach ($users as $user) {
			$this->userservice->deleteByKey($this->db, $user->id);
		}
	}
	
	
	/**
	 * OPTIONAL; Anything in this function will be run after each test
	 * I use it for setting $this->message = $this->MyModel->getError();
	 */
	function _post() {
		$users = $this->userservice->getAll($this->db);
		foreach ($users as $user) {
			$this->userservice->deleteByKey($this->db, $user->id);
		}
	}
	
	public function test_insert(){
		$this->message = "Tested methods: save, getUser, delete";
		// création d'un enregistrement
		$user_insert = new UserModel();
		// Nothing for field id
		$user_insert->login = 'test_0';
		$user_insert->password = 'p4ssW0rD-0';
		$user_insert->name = 'test_0';
		$user_insert->profile = 'TODO';
		$this->userservice->insertNew($this->db, $user_insert);
		// $user_insert->id est maintenant affecté
	
		$user_select = $this->userservice->getUnique($this->db, $user_insert->id);
	
		$this->_assert_equals($user_select->id, $user_insert->id);
		$this->userservice->deleteByKey($this->db, $user_select->id);
	}
	
	
	public function test_update(){
		$this->message = "Tested methods: save, update, getUser, delete";

		$user_insert = new UserModel();
		// Nothing for field id
		$user_insert->login = 'test_0';
		$user_insert->password = 'p4ssW0rD-0';
		$user_insert->name = 'test_0';
		$user_insert->profile = 'TODO';
		$this->userservice->insertNew($this->db, $user_insert);
	
		$user_update = $this->userservice->getUnique($this->db, $user_insert->id);
		// Nothing for field id
		$user_update->login = 'test1_0';
		$user_update->password = 'pwd1-0';
		$user_update->name = 'test1_0';
		$user_update->profile = 'TODO';
		$this->userservice->update($this->db, $user_insert);
	
		$user_update = $this->userservice->getUnique($this->db, $user_insert->id);
		
		if(!$this->_assert_equals($user_insert->id, $user_update->id)) {
			return false;
		}
		if(!$this->_assert_equals($user_insert->login, $user_update->login)) {
			return false;
		}
		if(!$this->_assert_equals($user_insert->password, $user_update->password)) {
			return false;
		}
		if(!$this->_assert_equals($user_insert->name, $user_update->name)) {
			return false;
		}
		if(!$this->_assert_equals($user_insert->profile, $user_update->profile)) {
			return false;
		}

		$this->userservice->deleteByKey($this->db, $user_insert->id);
	}
	
	
	public function test_count(){
		$this->message = "Tested methods: count, save, getUnique, deleteByKey";
	
		// comptage pour vérification : avant
		$countUsersAvant = $this->userservice->count($this->db);
	
		// création d'un enregistrement
		$user = new UserModel();
		// Nothing for field id
		$user->login = 'test_0';
		$user->password = 'p4ssW0rD-0';
		$user->name = 'test_0';
		$user->profile = 'TODO';
		$this->userservice->insertNew($this->db, $user);
	
		// comptage pour vérification : après insertion
		$countUsersApres = $this->userservice->count($this->db);
	
		// verification d'ajout d'un enregistrement
		$this->_assert_equals($countUsersAvant +1, $countUsersApres);
	
		// recupération de l'objet par son  id
		$user = $this->userservice->getUnique($this->db, $user->id);
	
		// suppression de l'enregistrement
		$this->userservice->deleteByKey($this->db, $user->id);
	
		// comptage pour vérification : après suppression
		$countUsersFinal = $this->userservice->count($this->db);
		$this->_assert_equals($countUsersAvant, $countUsersFinal);
	
	}
	
	
	function test_list(){
		$this->message = "Tested methods: save, getAll, delete";
	
		$user_insert = new UserModel();
		// Nothing for field id
		$user_insert->login = 'test_0';
		$user_insert->password = 'p4ssW0rD-0';
		$user_insert->name = 'test_0';
		$user_insert->profile = 'TODO';
		$this->userservice->insertNew($this->db, $user_insert);
	
		$users = $this->userservice->getAll($this->db);
		if( ! $this->_assert_not_empty($users) ) {
			log_message('DEBUG', '[UNIT TEST / Usertest.php)] #test_list : getAll after insert != 1');
			return $this->_fail('getAll after insert != 1');
		}
		$found = 0;
		foreach ($users as $user) {
			if($user->id == $user_insert->id &&
					$this->_assert_equals($user->login, $user_insert->login ) && 
					$this->_assert_equals($user->password, $user_insert->password ) && 
					$this->_assert_equals($user->name, $user_insert->name ) && 
					$this->_assert_equals($user->profile, $user_insert->profile )
				){
				$found++;
			}
		}
		if( $found == 1 ){
			$this->userservice->deleteByKey($this->db, $user->id);
			log_message('DEBUG', '[UNIT TEST / Usertest.php)] #test_list : OK');
			return $this->_assert_true(True);
		}else{
			log_message('DEBUG', '[UNIT TEST / Usertest.php)] #test_list : found != 1');
			return $this->_fail('found != 1');
		}
	}

}
?>
