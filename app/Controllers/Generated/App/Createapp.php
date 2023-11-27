<?php
/*
 * Created by generator
 * 
 */
namespace App\Controllers\Generated\App;

class CreateApp extends \App\Controllers\HtmlController {
	
	
	/**
	 * page de creation d'un app
	 */	
	public function index(){

		if(session()->get('user_id') == "") {
			return redirect()->to('welcome/index');
		}

		helper(['form']);
		$data = $this->getData();
		return $this->view('Generated/App/createapp', $data, 'App');
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
	
	/**
	 * Ajout d'un App
	 */
	public function add(){
	
		helper(['form', 'database', 'security']);
		$validation =  \Config\Services::validation();

		if (! $this->validate([

	'name' => 'trim|required',
	'owner_id' => 'trim|required',
	'server' => 'trim',
		])) {
			$data = $this->getData();
			$data['validation'] = $this->validator;
			$this->view('Generated/App/createapp', $data, 'App');
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
		
		$appModel->insert($data);
		$data['id'] = $appModel->getInsertID();



		
		// Recharge la page avec les nouvelles infos
		session()->setFlashData('msg_confirm', lang('generated/App.message.confirm.added'));

		return redirect()->to('Generated/App/listapps/index');
	}
}
