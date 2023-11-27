<?php

/*
 * Created by generator
 * 
 */
namespace App\Controllers\Generated\Translation;

class CreateTranslationJson extends \App\Controllers\AjaxController {

	/**
	 * page de creation d'un translation
	 */	
	public function index(){
		$data = Array();
		/*
		// Recuperation des objets references
		$data['elementCollection'] = $this->elementservice->getAll($this->db,'name');
		$data['languageCollection'] = $this->languageservice->getAll($this->db,'label');
*/
		echo view('translation/createtranslation_fancyview', $data);
	}
	
	/**
	 * Ajout / Mise a jour d'un Translation
	 * Si le champ 'id' est vide, un nouvel enregistrement sera cree
	 */
	public function save(){
	
		helper(['form', 'database', 'security']);
		$validation =  \Config\Services::validation();

		if (! $this->validate([
			'element_id' => 'trim|required',
			'lang_id' => 'trim|required',
		])) {
			$data = $this->getData();
			$data['validation'] = $this->validator;
			return $this->respond([
				'status' => 'error',
				'data' => $data
			]);
		}

		// Insertion en base
		$data = [
			'id' => $this->request->getPost('id'),
			'element_id' => $this->request->getPost('element_id'),
			'lang_id' => $this->request->getPost('lang_id'),
			'html' => $this->request->getPost('html'),
			'alt' => $this->request->getPost('alt'),
			'title' => $this->request->getPost('title'),
			'src' => $this->request->getPost('src'),

		];


		if($data['html'] == ""){
			$data['html'] = null;
		}
		if($data['alt'] == ""){
			$data['alt'] = null;
		}
		if($data['title'] == ""){
			$data['title'] = null;
		}
		if($data['src'] == ""){
			$data['src'] = null;
		}
		$translationModel = new \App\Models\TranslationModel();
		
		$translationModel->save($data);
		if($data['id'] == null || $data['id'] == ""){
			$data['id'] = $translationModel->getInsertID();
		}



		return $this->respond([
			'status' => 'ok',
			'data' => $data
		]);
		
	}
	


	/**
	 * Recuperation des objets references
	 */
	private function getData() {
		$data = Array();


		$elementModel = new \App\Models\ElementModel();
		$data['elementCollection'] = $elementModel->orderBy('name', 'asc')->findAll();
		$languageModel = new \App\Models\LanguageModel();
		$data['languageCollection'] = $languageModel->orderBy('label', 'asc')->findAll();
		return $data;
	}
}