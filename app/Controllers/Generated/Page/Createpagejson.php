<?php

/*
 * Created by generator
 * 
 */
namespace App\Controllers\Generated\Page;

class CreatePageJson extends \App\Controllers\AjaxController {

	/**
	 * page de creation d'un page
	 */	
	public function index(){
		$data = Array();
		/*
		// Recuperation des objets references
		$data['appCollection'] = $this->appservice->getAll($this->db,'name');
*/
		echo view('page/createpage_fancyview', $data);
	}
	
	/**
	 * Ajout / Mise a jour d'un Page
	 * Si le champ 'id' est vide, un nouvel enregistrement sera cree
	 */
	public function save(){
	
		helper(['form', 'database', 'security']);
		$validation =  \Config\Services::validation();

		if (! $this->validate([
			'label' => 'trim|required',
			'path' => 'trim',
			'app_id' => 'trim|required',

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
			'path' => $this->request->getPost('path'),
			'app_id' => $this->request->getPost('app_id'),

		];


		if($data['path'] == ""){
			$data['path'] = null;
		}
		$pageModel = new \App\Models\PageModel();
		
		$pageModel->save($data);
		if($data['id'] == null || $data['id'] == ""){
			$data['id'] = $pageModel->getInsertID();
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


		$appModel = new \App\Models\AppModel();
		$data['appCollection'] = $appModel->orderBy('name', 'asc')->findAll();
		return $data;
	}
}