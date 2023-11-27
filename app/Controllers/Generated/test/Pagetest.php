<?php
/*
 * Created by generator
 *
 */
require_once(APPPATH . '/controllers/test/Toast.php');

class PageTest extends Toast {

	function __construct(){
		parent::__construct();
		$this->load->database('test');
		
		$this->load->library('PageService');
		$this->load->model('PageModel');
		
	}
	
	/**
	 * OPTIONAL; Anything in this function will be run before each test
	 * Good for doing cleanup: resetting sessions, renewing objects, etc.
	 */
	function _pre() {
		$pages = $this->pageservice->getAll($this->db);
		foreach ($pages as $page) {
			$this->pageservice->deleteByKey($this->db, $page->id);
		}
	}
	
	
	/**
	 * OPTIONAL; Anything in this function will be run after each test
	 * I use it for setting $this->message = $this->MyModel->getError();
	 */
	function _post() {
		$pages = $this->pageservice->getAll($this->db);
		foreach ($pages as $page) {
			$this->pageservice->deleteByKey($this->db, $page->id);
		}
	}
	
	public function test_insert(){
		$this->message = "Tested methods: save, getPage, delete";
		// création d'un enregistrement
		$page_insert = new PageModel();
		// Nothing for field id
		$page_insert->label = 'test_0';
		$page_insert->path = 'test_0';
		$page_insert->app_id = 0;
		$this->pageservice->insertNew($this->db, $page_insert);
		// $page_insert->id est maintenant affecté
	
		$page_select = $this->pageservice->getUnique($this->db, $page_insert->id);
	
		$this->_assert_equals($page_select->id, $page_insert->id);
		$this->pageservice->deleteByKey($this->db, $page_select->id);
	}
	
	
	public function test_update(){
		$this->message = "Tested methods: save, update, getPage, delete";

		$page_insert = new PageModel();
		// Nothing for field id
		$page_insert->label = 'test_0';
		$page_insert->path = 'test_0';
		$page_insert->app_id = 0;
		$this->pageservice->insertNew($this->db, $page_insert);
	
		$page_update = $this->pageservice->getUnique($this->db, $page_insert->id);
		// Nothing for field id
		$page_update->label = 'test1_0';
		$page_update->path = 'test1_0';
		$page_update->app_id = 90;
		$this->pageservice->update($this->db, $page_insert);
	
		$page_update = $this->pageservice->getUnique($this->db, $page_insert->id);
		
		if(!$this->_assert_equals($page_insert->id, $page_update->id)) {
			return false;
		}
		if(!$this->_assert_equals($page_insert->label, $page_update->label)) {
			return false;
		}
		if(!$this->_assert_equals($page_insert->path, $page_update->path)) {
			return false;
		}
		if(!$this->_assert_equals($page_insert->app_id, $page_update->app_id)) {
			return false;
		}

		$this->pageservice->deleteByKey($this->db, $page_insert->id);
	}
	
	
	public function test_count(){
		$this->message = "Tested methods: count, save, getUnique, deleteByKey";
	
		// comptage pour vérification : avant
		$countPagesAvant = $this->pageservice->count($this->db);
	
		// création d'un enregistrement
		$page = new PageModel();
		// Nothing for field id
		$page->label = 'test_0';
		$page->path = 'test_0';
		$page->app_id = 0;
		$this->pageservice->insertNew($this->db, $page);
	
		// comptage pour vérification : après insertion
		$countPagesApres = $this->pageservice->count($this->db);
	
		// verification d'ajout d'un enregistrement
		$this->_assert_equals($countPagesAvant +1, $countPagesApres);
	
		// recupération de l'objet par son  id
		$page = $this->pageservice->getUnique($this->db, $page->id);
	
		// suppression de l'enregistrement
		$this->pageservice->deleteByKey($this->db, $page->id);
	
		// comptage pour vérification : après suppression
		$countPagesFinal = $this->pageservice->count($this->db);
		$this->_assert_equals($countPagesAvant, $countPagesFinal);
	
	}
	
	
	function test_list(){
		$this->message = "Tested methods: save, getAll, delete";
	
		$page_insert = new PageModel();
		// Nothing for field id
		$page_insert->label = 'test_0';
		$page_insert->path = 'test_0';
		$page_insert->app_id = 0;
		$this->pageservice->insertNew($this->db, $page_insert);
	
		$pages = $this->pageservice->getAll($this->db);
		if( ! $this->_assert_not_empty($pages) ) {
			log_message('DEBUG', '[UNIT TEST / Pagetest.php)] #test_list : getAll after insert != 1');
			return $this->_fail('getAll after insert != 1');
		}
		$found = 0;
		foreach ($pages as $page) {
			if($page->id == $page_insert->id &&
					$this->_assert_equals($page->label, $page_insert->label ) && 
					$this->_assert_equals($page->path, $page_insert->path ) && 
					$this->_assert_equals($page->app_id, $page_insert->app_id )
				){
				$found++;
			}
		}
		if( $found == 1 ){
			$this->pageservice->deleteByKey($this->db, $page->id);
			log_message('DEBUG', '[UNIT TEST / Pagetest.php)] #test_list : OK');
			return $this->_assert_true(True);
		}else{
			log_message('DEBUG', '[UNIT TEST / Pagetest.php)] #test_list : found != 1');
			return $this->_fail('found != 1');
		}
	}

}
?>
