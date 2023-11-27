<?php

/*
 * Created by generator
 * 
 */
namespace App\Controllers\Generated\Language;

class CreateLanguageJson extends \App\Controllers\AjaxController {

	/**
	 * page de creation d'un language
	 */	
	public function index(){
		$data = Array();
		/*
		// Recuperation des objets references
*/
		echo view('language/createlanguage_fancyview', $data);
	}
	
	/**
	 * Ajout / Mise a jour d'un Language
	 * Si le champ 'id' est vide, un nouvel enregistrement sera cree
	 */
	public function save(){
	
		helper(['form', 'database', 'security']);
		$validation =  \Config\Services::validation();

		if (! $this->validate([
			'label' => 'trim|required',
			'code' => 'trim|required',

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
			'label' => $this->request->getPost('label'),
			'code' => $this->request->getPost('code'),
			'flag' => $this->request->getPost('flag'),

		];


		if($data['flag'] == ""){
			$data['flag'] = null;
		}
		$languageModel = new \App\Models\LanguageModel();
		
		$languageModel->save($data);
		if($data['id'] == null || $data['id'] == ""){
			$data['id'] = $languageModel->getInsertID();
		}


		
		log_message('debug','[Createlanguage.php] : DEMARRAGE de l\'upload');
		
		// Upload du nouveau fichier flag : Image du drapeau
		$flag_file = $this->request->getFile('flag_file');
		if($flag_file != "") {
			$flag_ext = $flag_file->guessExtension();

			if (! $flag_file->hasMoved()) {
				$filepath = WRITEPATH . 'uploads/' . $flag_file->store();
				// Rename file to match with this object
				$data['flag'] = 'language_' . $data['id'] . '_flag.' . $flag_ext;
				rename($filepath, PUBLIC_PATH . '/uploads/' . $data['flag']);

				// Remove uploaded file temp name
				if( file_exists($filepath) ){
					unlink($filepath);
				}
			} else {
				session()->setFlashData('msg_error', lang('App.message.upload-failed'));
				$this->view('Language/editlanguage');
			}
		}
		$languageModel->update($data['id'], $data);


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


		return $data;
	}
}