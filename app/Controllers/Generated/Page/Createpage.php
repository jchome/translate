<?php
/*
 * Created by generator
 * 
 */
namespace App\Controllers\Generated\Page;

class CreatePage extends \App\Controllers\HtmlController {
	
	
	/**
	 * page de creation d'un page
	 */	
	public function index(){

		if(session()->get('user_id') == "") {
			return redirect()->to('welcome/index');
		}

		helper(['form']);
		$data = $this->getData();
		return $this->view('Generated/Page/createpage', $data, 'Page');
	}

	/**
	 * Recuperation des objets references
	 */
	private function getData() {
		$data = Array();


		$appModel = new \App\Models\AppModel();
		$data['appCollection'] = $appModel->orderBy('name', 'asc')->findAll();
		return $data;
	}
	
	/**
	 * Ajout d'un Page
	 */
	public function add(){
	
		helper(['form', 'database', 'security']);
		$validation =  \Config\Services::validation();

		if (! $this->validate([

	'label' => 'trim|required',
	'path' => 'trim',
	'app_id' => 'trim|required',
		])) {
			$data = $this->getData();
			$data['validation'] = $this->validator;
			$this->view('Generated/Page/createpage', $data, 'Page');
		}
		
		// Insertion en base
		$data = [

			'id' => $this->request->getPost('id'),
			'label' => $this->request->getPost('label'),
			'path' => $this->request->getPost('path'),
			'app_id' => $this->request->getPost('app_id'),
		];


		if($data['path'] == ""){
			$data['path'] = null;
		}
		$pageModel = new \App\Models\PageModel();
		
		$pageModel->insert($data);
		$data['id'] = $pageModel->getInsertID();



		
		// Recharge la page avec les nouvelles infos
		session()->setFlashData('msg_confirm', lang('generated/Page.message.confirm.added'));

		return redirect()->to('Generated/Page/listpages/index');
	}
}
