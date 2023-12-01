<?php
/*
 * Created by generator
 *
 */
require_once(APPPATH . '/controllers/test/Toast.php');

class TranslationTest extends Toast {

	function __construct(){
		parent::__construct();
		$this->load->database('test');
		
		$this->load->library('TranslationService');
		$this->load->model('TranslationModel');
		
	}
	
	/**
	 * OPTIONAL; Anything in this function will be run before each test
	 * Good for doing cleanup: resetting sessions, renewing objects, etc.
	 */
	function _pre() {
		$translations = $this->translationservice->getAll($this->db);
		foreach ($translations as $translation) {
			$this->translationservice->deleteByKey($this->db, $translation->id);
		}
	}
	
	
	/**
	 * OPTIONAL; Anything in this function will be run after each test
	 * I use it for setting $this->message = $this->MyModel->getError();
	 */
	function _post() {
		$translations = $this->translationservice->getAll($this->db);
		foreach ($translations as $translation) {
			$this->translationservice->deleteByKey($this->db, $translation->id);
		}
	}
	
	public function test_insert(){
		$this->message = "Tested methods: save, getTranslation, delete";
		// création d'un enregistrement
		$translation_insert = new TranslationModel();
		// Nothing for field id
		$translation_insert->element_id = 0;
		$translation_insert->lang_id = 0;
		$translation_insert->html = 'text-0 : ...';
		$translation_insert->alt = 'test_0';
		$translation_insert->title = 'test_0';
		$translation_insert->src = 'test_0';
		$translation_insert->href = 'test_0';
		$this->translationservice->insertNew($this->db, $translation_insert);
		// $translation_insert->id est maintenant affecté
	
		$translation_select = $this->translationservice->getUnique($this->db, $translation_insert->id);
	
		$this->_assert_equals($translation_select->id, $translation_insert->id);
		$this->translationservice->deleteByKey($this->db, $translation_select->id);
	}
	
	
	public function test_update(){
		$this->message = "Tested methods: save, update, getTranslation, delete";

		$translation_insert = new TranslationModel();
		// Nothing for field id
		$translation_insert->element_id = 0;
		$translation_insert->lang_id = 0;
		$translation_insert->html = 'text-0 : ...';
		$translation_insert->alt = 'test_0';
		$translation_insert->title = 'test_0';
		$translation_insert->src = 'test_0';
		$translation_insert->href = 'test_0';
		$this->translationservice->insertNew($this->db, $translation_insert);
	
		$translation_update = $this->translationservice->getUnique($this->db, $translation_insert->id);
		// Nothing for field id
		$translation_update->element_id = 90;
		$translation_update->lang_id = 90;
		$translation_update->html = 'text1-0 : ...';
		$translation_update->alt = 'test1_0';
		$translation_update->title = 'test1_0';
		$translation_update->src = 'test1_0';
		$translation_update->href = 'test1_0';
		$this->translationservice->update($this->db, $translation_insert);
	
		$translation_update = $this->translationservice->getUnique($this->db, $translation_insert->id);
		
		if(!$this->_assert_equals($translation_insert->id, $translation_update->id)) {
			return false;
		}
		if(!$this->_assert_equals($translation_insert->element_id, $translation_update->element_id)) {
			return false;
		}
		if(!$this->_assert_equals($translation_insert->lang_id, $translation_update->lang_id)) {
			return false;
		}
		if(!$this->_assert_equals($translation_insert->html, $translation_update->html)) {
			return false;
		}
		if(!$this->_assert_equals($translation_insert->alt, $translation_update->alt)) {
			return false;
		}
		if(!$this->_assert_equals($translation_insert->title, $translation_update->title)) {
			return false;
		}
		if(!$this->_assert_equals($translation_insert->src, $translation_update->src)) {
			return false;
		}
		if(!$this->_assert_equals($translation_insert->href, $translation_update->href)) {
			return false;
		}

		$this->translationservice->deleteByKey($this->db, $translation_insert->id);
	}
	
	
	public function test_count(){
		$this->message = "Tested methods: count, save, getUnique, deleteByKey";
	
		// comptage pour vérification : avant
		$countTranslationsAvant = $this->translationservice->count($this->db);
	
		// création d'un enregistrement
		$translation = new TranslationModel();
		// Nothing for field id
		$translation->element_id = 0;
		$translation->lang_id = 0;
		$translation->html = 'text-0 : ...';
		$translation->alt = 'test_0';
		$translation->title = 'test_0';
		$translation->src = 'test_0';
		$translation->href = 'test_0';
		$this->translationservice->insertNew($this->db, $translation);
	
		// comptage pour vérification : après insertion
		$countTranslationsApres = $this->translationservice->count($this->db);
	
		// verification d'ajout d'un enregistrement
		$this->_assert_equals($countTranslationsAvant +1, $countTranslationsApres);
	
		// recupération de l'objet par son  id
		$translation = $this->translationservice->getUnique($this->db, $translation->id);
	
		// suppression de l'enregistrement
		$this->translationservice->deleteByKey($this->db, $translation->id);
	
		// comptage pour vérification : après suppression
		$countTranslationsFinal = $this->translationservice->count($this->db);
		$this->_assert_equals($countTranslationsAvant, $countTranslationsFinal);
	
	}
	
	
	function test_list(){
		$this->message = "Tested methods: save, getAll, delete";
	
		$translation_insert = new TranslationModel();
		// Nothing for field id
		$translation_insert->element_id = 0;
		$translation_insert->lang_id = 0;
		$translation_insert->html = 'text-0 : ...';
		$translation_insert->alt = 'test_0';
		$translation_insert->title = 'test_0';
		$translation_insert->src = 'test_0';
		$translation_insert->href = 'test_0';
		$this->translationservice->insertNew($this->db, $translation_insert);
	
		$translations = $this->translationservice->getAll($this->db);
		if( ! $this->_assert_not_empty($translations) ) {
			log_message('DEBUG', '[UNIT TEST / Translationtest.php)] #test_list : getAll after insert != 1');
			return $this->_fail('getAll after insert != 1');
		}
		$found = 0;
		foreach ($translations as $translation) {
			if($translation->id == $translation_insert->id &&
					$this->_assert_equals($translation->element_id, $translation_insert->element_id ) && 
					$this->_assert_equals($translation->lang_id, $translation_insert->lang_id ) && 
					$this->_assert_equals($translation->html, $translation_insert->html ) && 
					$this->_assert_equals($translation->alt, $translation_insert->alt ) && 
					$this->_assert_equals($translation->title, $translation_insert->title ) && 
					$this->_assert_equals($translation->src, $translation_insert->src ) && 
					$this->_assert_equals($translation->href, $translation_insert->href )
				){
				$found++;
			}
		}
		if( $found == 1 ){
			$this->translationservice->deleteByKey($this->db, $translation->id);
			log_message('DEBUG', '[UNIT TEST / Translationtest.php)] #test_list : OK');
			return $this->_assert_true(True);
		}else{
			log_message('DEBUG', '[UNIT TEST / Translationtest.php)] #test_list : found != 1');
			return $this->_fail('found != 1');
		}
	}

}
?>
