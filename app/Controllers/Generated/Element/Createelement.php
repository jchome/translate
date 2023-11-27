<?php
/*
 * Created by generator
 * 
 */
namespace App\Controllers\Generated\Element;

class CreateElement extends \App\Controllers\HtmlController {
	
	
	/**
	 * page de creation d'un element
	 */	
	public function index(){

		if(session()->get('user_id') == "") {
			return redirect()->to('welcome/index');
		}

		helper(['form']);
		$data = $this->getData();
		return $this->view('Generated/Element/createelement', $data, 'Element');
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
	
	/**
	 * Ajout d'un Element
	 */
	public function add(){
	
		helper(['form', 'database', 'security']);
		$validation =  \Config\Services::validation();

		if (! $this->validate([

	'name' => 'trim|required',
	'selector' => 'trim|required',
	'page_id' => 'trim|required',
		])) {
			$data = $this->getData();
			$data['validation'] = $this->validator;
			$this->view('Generated/Element/createelement', $data, 'Element');
		}
		
		// Insertion en base
		$data = [

			'id' => $this->request->getPost('id'),
			'name' => $this->request->getPost('name'),
			'selector' => $this->request->getPost('selector'),
			'page_id' => $this->request->getPost('page_id'),
		];


		$elementModel = new \App\Models\ElementModel();
		
		$elementModel->insert($data);
		$data['id'] = $elementModel->getInsertID();



		
		// Recharge la page avec les nouvelles infos
		session()->setFlashData('msg_confirm', lang('generated/Element.message.confirm.added'));

		return redirect()->to('Generated/Element/listelements/index');
	}
}
