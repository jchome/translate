<?php
/*
 * Created by generator
 *
 */
require_once(APPPATH . '/controllers/test/Toast.php');

class LanguageTest extends Toast {

	function __construct(){
		parent::__construct();
		$this->load->database('test');
		
		$this->load->library('LanguageService');
		$this->load->model('LanguageModel');
		
	}
	
	/**
	 * OPTIONAL; Anything in this function will be run before each test
	 * Good for doing cleanup: resetting sessions, renewing objects, etc.
	 */
	function _pre() {
		$languages = $this->languageservice->getAll($this->db);
		foreach ($languages as $language) {
			$this->languageservice->deleteByKey($this->db, $language->id);
		}
	}
	
	
	/**
	 * OPTIONAL; Anything in this function will be run after each test
	 * I use it for setting $this->message = $this->MyModel->getError();
	 */
	function _post() {
		$languages = $this->languageservice->getAll($this->db);
		foreach ($languages as $language) {
			$this->languageservice->deleteByKey($this->db, $language->id);
		}
	}
	
	public function test_insert(){
		$this->message = "Tested methods: save, getLanguage, delete";
		// création d'un enregistrement
		$language_insert = new LanguageModel();
		// Nothing for field id
		$language_insert->label = 'test_0';
		$language_insert->code = 'test_0';
		$language_insert->flag = 'file-0 : ...';
		$this->languageservice->insertNew($this->db, $language_insert);
		// $language_insert->id est maintenant affecté
	
		$language_select = $this->languageservice->getUnique($this->db, $language_insert->id);
	
		$this->_assert_equals($language_select->id, $language_insert->id);
		$this->languageservice->deleteByKey($this->db, $language_select->id);
	}
	
	
	public function test_update(){
		$this->message = "Tested methods: save, update, getLanguage, delete";

		$language_insert = new LanguageModel();
		// Nothing for field id
		$language_insert->label = 'test_0';
		$language_insert->code = 'test_0';
		$language_insert->flag = 'file-0 : ...';
		$this->languageservice->insertNew($this->db, $language_insert);
	
		$language_update = $this->languageservice->getUnique($this->db, $language_insert->id);
		// Nothing for field id
		$language_update->label = 'test1_0';
		$language_update->code = 'test1_0';
		$language_update->flag = 'file1-0 : ...';
		$this->languageservice->update($this->db, $language_insert);
	
		$language_update = $this->languageservice->getUnique($this->db, $language_insert->id);
		
		if(!$this->_assert_equals($language_insert->id, $language_update->id)) {
			return false;
		}
		if(!$this->_assert_equals($language_insert->label, $language_update->label)) {
			return false;
		}
		if(!$this->_assert_equals($language_insert->code, $language_update->code)) {
			return false;
		}
		if(!$this->_assert_equals($language_insert->flag, $language_update->flag)) {
			return false;
		}

		$this->languageservice->deleteByKey($this->db, $language_insert->id);
	}
	
	
	public function test_count(){
		$this->message = "Tested methods: count, save, getUnique, deleteByKey";
	
		// comptage pour vérification : avant
		$countLanguagesAvant = $this->languageservice->count($this->db);
	
		// création d'un enregistrement
		$language = new LanguageModel();
		// Nothing for field id
		$language->label = 'test_0';
		$language->code = 'test_0';
		$language->flag = 'file-0 : ...';
		$this->languageservice->insertNew($this->db, $language);
	
		// comptage pour vérification : après insertion
		$countLanguagesApres = $this->languageservice->count($this->db);
	
		// verification d'ajout d'un enregistrement
		$this->_assert_equals($countLanguagesAvant +1, $countLanguagesApres);
	
		// recupération de l'objet par son  id
		$language = $this->languageservice->getUnique($this->db, $language->id);
	
		// suppression de l'enregistrement
		$this->languageservice->deleteByKey($this->db, $language->id);
	
		// comptage pour vérification : après suppression
		$countLanguagesFinal = $this->languageservice->count($this->db);
		$this->_assert_equals($countLanguagesAvant, $countLanguagesFinal);
	
	}
	
	
	function test_list(){
		$this->message = "Tested methods: save, getAll, delete";
	
		$language_insert = new LanguageModel();
		// Nothing for field id
		$language_insert->label = 'test_0';
		$language_insert->code = 'test_0';
		$language_insert->flag = 'file-0 : ...';
		$this->languageservice->insertNew($this->db, $language_insert);
	
		$languages = $this->languageservice->getAll($this->db);
		if( ! $this->_assert_not_empty($languages) ) {
			log_message('DEBUG', '[UNIT TEST / Languagetest.php)] #test_list : getAll after insert != 1');
			return $this->_fail('getAll after insert != 1');
		}
		$found = 0;
		foreach ($languages as $language) {
			if($language->id == $language_insert->id &&
					$this->_assert_equals($language->label, $language_insert->label ) && 
					$this->_assert_equals($language->code, $language_insert->code ) && 
					$this->_assert_equals($language->flag, $language_insert->flag )
				){
				$found++;
			}
		}
		if( $found == 1 ){
			$this->languageservice->deleteByKey($this->db, $language->id);
			log_message('DEBUG', '[UNIT TEST / Languagetest.php)] #test_list : OK');
			return $this->_assert_true(True);
		}else{
			log_message('DEBUG', '[UNIT TEST / Languagetest.php)] #test_list : found != 1');
			return $this->_fail('found != 1');
		}
	}

}
?>
