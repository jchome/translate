<?php
/*
 * Created by generator
 *
 */
require_once(APPPATH . '/controllers/test/Toast.php');

class ElementTest extends Toast {

	function __construct(){
		parent::__construct();
		$this->load->database('test');
		
		$this->load->library('ElementService');
		$this->load->model('ElementModel');
		
	}
	
	/**
	 * OPTIONAL; Anything in this function will be run before each test
	 * Good for doing cleanup: resetting sessions, renewing objects, etc.
	 */
	function _pre() {
		$elements = $this->elementservice->getAll($this->db);
		foreach ($elements as $element) {
			$this->elementservice->deleteByKey($this->db, $element->id);
		}
	}
	
	
	/**
	 * OPTIONAL; Anything in this function will be run after each test
	 * I use it for setting $this->message = $this->MyModel->getError();
	 */
	function _post() {
		$elements = $this->elementservice->getAll($this->db);
		foreach ($elements as $element) {
			$this->elementservice->deleteByKey($this->db, $element->id);
		}
	}
	
	public function test_insert(){
		$this->message = "Tested methods: save, getElement, delete";
		// création d'un enregistrement
		$element_insert = new ElementModel();
		// Nothing for field id
		$element_insert->name = 'test_0';
		$element_insert->selector = 'test_0';
		$element_insert->page_id = 0;
		$this->elementservice->insertNew($this->db, $element_insert);
		// $element_insert->id est maintenant affecté
	
		$element_select = $this->elementservice->getUnique($this->db, $element_insert->id);
	
		$this->_assert_equals($element_select->id, $element_insert->id);
		$this->elementservice->deleteByKey($this->db, $element_select->id);
	}
	
	
	public function test_update(){
		$this->message = "Tested methods: save, update, getElement, delete";

		$element_insert = new ElementModel();
		// Nothing for field id
		$element_insert->name = 'test_0';
		$element_insert->selector = 'test_0';
		$element_insert->page_id = 0;
		$this->elementservice->insertNew($this->db, $element_insert);
	
		$element_update = $this->elementservice->getUnique($this->db, $element_insert->id);
		// Nothing for field id
		$element_update->name = 'test1_0';
		$element_update->selector = 'test1_0';
		$element_update->page_id = 90;
		$this->elementservice->update($this->db, $element_insert);
	
		$element_update = $this->elementservice->getUnique($this->db, $element_insert->id);
		
		if(!$this->_assert_equals($element_insert->id, $element_update->id)) {
			return false;
		}
		if(!$this->_assert_equals($element_insert->name, $element_update->name)) {
			return false;
		}
		if(!$this->_assert_equals($element_insert->selector, $element_update->selector)) {
			return false;
		}
		if(!$this->_assert_equals($element_insert->page_id, $element_update->page_id)) {
			return false;
		}

		$this->elementservice->deleteByKey($this->db, $element_insert->id);
	}
	
	
	public function test_count(){
		$this->message = "Tested methods: count, save, getUnique, deleteByKey";
	
		// comptage pour vérification : avant
		$countElementsAvant = $this->elementservice->count($this->db);
	
		// création d'un enregistrement
		$element = new ElementModel();
		// Nothing for field id
		$element->name = 'test_0';
		$element->selector = 'test_0';
		$element->page_id = 0;
		$this->elementservice->insertNew($this->db, $element);
	
		// comptage pour vérification : après insertion
		$countElementsApres = $this->elementservice->count($this->db);
	
		// verification d'ajout d'un enregistrement
		$this->_assert_equals($countElementsAvant +1, $countElementsApres);
	
		// recupération de l'objet par son  id
		$element = $this->elementservice->getUnique($this->db, $element->id);
	
		// suppression de l'enregistrement
		$this->elementservice->deleteByKey($this->db, $element->id);
	
		// comptage pour vérification : après suppression
		$countElementsFinal = $this->elementservice->count($this->db);
		$this->_assert_equals($countElementsAvant, $countElementsFinal);
	
	}
	
	
	function test_list(){
		$this->message = "Tested methods: save, getAll, delete";
	
		$element_insert = new ElementModel();
		// Nothing for field id
		$element_insert->name = 'test_0';
		$element_insert->selector = 'test_0';
		$element_insert->page_id = 0;
		$this->elementservice->insertNew($this->db, $element_insert);
	
		$elements = $this->elementservice->getAll($this->db);
		if( ! $this->_assert_not_empty($elements) ) {
			log_message('DEBUG', '[UNIT TEST / Elementtest.php)] #test_list : getAll after insert != 1');
			return $this->_fail('getAll after insert != 1');
		}
		$found = 0;
		foreach ($elements as $element) {
			if($element->id == $element_insert->id &&
					$this->_assert_equals($element->name, $element_insert->name ) && 
					$this->_assert_equals($element->selector, $element_insert->selector ) && 
					$this->_assert_equals($element->page_id, $element_insert->page_id )
				){
				$found++;
			}
		}
		if( $found == 1 ){
			$this->elementservice->deleteByKey($this->db, $element->id);
			log_message('DEBUG', '[UNIT TEST / Elementtest.php)] #test_list : OK');
			return $this->_assert_true(True);
		}else{
			log_message('DEBUG', '[UNIT TEST / Elementtest.php)] #test_list : found != 1');
			return $this->_fail('found != 1');
		}
	}

}
?>
