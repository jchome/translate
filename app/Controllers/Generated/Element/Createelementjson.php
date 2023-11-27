<?php

/*
 * Created by generator
 * 
 */
namespace App\Controllers\Generated\Element;

class CreateElementJson extends \App\Controllers\AjaxController {

	/**
	 * page de creation d'un element
	 */	
	public function index(){
		$data = Array();
		/*
		// Recuperation des objets references
		$data['pageCollection'] = $this->pageservice->getAll($this->db,'label');
*/
		echo view('element/createelement_fancyview', $data);
	}
	
	/**
	 * Ajout / Mise a jour d'un Element
	 * Si le champ 'id' est vide, un nouvel enregistrement sera cree
	 */
	public function save(){
	
		helper(['form', 'database', 'security']);
		$validation =  \Config\Services::validation();

		if (! $this->validate([
			'name' => 'trim|required',
			'selector' => 'trim|required',
			'page_id' => 'trim|required',

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
			'selector' => $this->request->getPost('selector'),
			'page_id' => $this->request->getPost('page_id'),

		];


		$elementModel = new \App\Models\ElementModel();
		
		$elementModel->save($data);
		if($data['id'] == null || $data['id'] == ""){
			$data['id'] = $elementModel->getInsertID();
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


		$pageModel = new \App\Models\PageModel();
		$data['pageCollection'] = $pageModel->orderBy('label', 'asc')->findAll();
		return $data;
	}
}