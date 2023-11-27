<?php

/*
 * Created by generator
 * 
 */
namespace App\Controllers\Generated\User;

class CreateUserJson extends \App\Controllers\AjaxController {

	/**
	 * page de creation d'un user
	 */	
	public function index(){
		$data = Array();
		/*
		// Recuperation des objets references
		$data["enum_profile"] = array( "ADMIN" => "Administrateur","WEBMASTER" => "WebMaster");
*/
		echo view('user/createuser_fancyview', $data);
	}
	
	/**
	 * Ajout / Mise a jour d'un User
	 * Si le champ 'id' est vide, un nouvel enregistrement sera cree
	 */
	public function save(){
	
		helper(['form', 'database', 'security']);
		$validation =  \Config\Services::validation();

		if (! $this->validate([
			'login' => 'trim|required',
			'password' => 'trim|required',
			'name' => 'trim',
			'profile' => 'trim|required',

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
			'login' => $this->request->getPost('login'),
			'password' => generateHash($this->request->getPost('password')),
			'name' => $this->request->getPost('name'),
			'profile' => $this->request->getPost('profile'),

		];


		if($data['name'] == ""){
			$data['name'] = null;
		}
		$userModel = new \App\Models\UserModel();
		
		$userModel->save($data);
		if($data['id'] == null || $data['id'] == ""){
			$data['id'] = $userModel->getInsertID();
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


		$data["enum_profile"] = array( "ADMIN" => "Administrateur","WEBMASTER" => "WebMaster");
		return $data;
	}
}