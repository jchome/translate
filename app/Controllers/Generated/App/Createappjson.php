<?php

/*
 * Created by generator
 * 
 */
namespace App\Controllers\Generated\App;

class CreateAppJson extends \App\Controllers\AjaxController {

	/**
	 * page de creation d'un app
	 */	
	public function index(){
		$data = Array();
		/*
		// Recuperation des objets references
		$data['userCollection'] = $this->userservice->getAll($this->db,'name');
*/
		echo view('app/createapp_fancyview', $data);
	}
	
	/**
	 * Ajout / Mise a jour d'un App
	 * Si le champ 'id' est vide, un nouvel enregistrement sera cree
	 */
	public function save(){
	
		helper(['form', 'database', 'security']);
		$validation =  \Config\Services::validation();

		if (! $this->validate([
			'name' => 'trim|required',
			'owner_id' => 'trim|required',
			'server' => 'trim',

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
			'name' => $this->request->getPost('name'),
			'owner_id' => $this->request->getPost('owner_id'),
			'server' => $this->request->getPost('server'),

		];


		if($data['server'] == ""){
			$data['server'] = null;
		}
		$appModel = new \App\Models\AppModel();
		
		$appModel->save($data);
		if($data['id'] == null || $data['id'] == ""){
			$data['id'] = $appModel->getInsertID();
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


		$userModel = new \App\Models\UserModel();
		$data['userCollection'] = $userModel->orderBy('name', 'asc')->findAll();
		return $data;
	}
}