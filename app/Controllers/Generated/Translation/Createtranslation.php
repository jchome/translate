<?php
/*
 * Created by generator
 * 
 */
namespace App\Controllers\Generated\Translation;

class CreateTranslation extends \App\Controllers\HtmlController {
	
	
	/**
	 * page de creation d'un translation
	 */	
	public function index(){

		if(session()->get('user_id') == "") {
			return redirect()->to('welcome/index');
		}

		helper(['form']);
		$data = $this->getData();
		return $this->view('Generated/Translation/createtranslation', $data, 'Translation');
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
	
	/**
	 * Ajout d'un Translation
	 */
	public function add(){
	
		helper(['form', 'database', 'security']);
		$validation =  \Config\Services::validation();

		if (! $this->validate([

	'element_id' => 'trim|required',
	'lang_id' => 'trim|required',
	'html' => 'trim',
	'alt' => 'trim',
	'title' => 'trim',
	'src' => 'trim',
	'href' => 'trim',
		])) {
			$data = $this->getData();
			$data['validation'] = $this->validator;
			$this->view('Generated/Translation/createtranslation', $data, 'Translation');
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
			'href' => $this->request->getPost('href'),
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
		if($data['href'] == ""){
			$data['href'] = null;
		}
		$translationModel = new \App\Models\TranslationModel();
		
		$translationModel->insert($data);
		$data['id'] = $translationModel->getInsertID();



		
		// Recharge la page avec les nouvelles infos
		session()->setFlashData('msg_confirm', lang('generated/Translation.message.confirm.added'));

		return redirect()->to('Generated/Translation/listtranslations/index');
	}
}
