<?php
/*
 * Created by generator
 *
 */
namespace App\Controllers\Generated\Element;

class EditElement extends \App\Controllers\HtmlController {

	/**
	 * Affichage des infos
	 */
	public function index($id){

		if(session()->get('user_id') == "") {
			return redirect()->to('welcome/index');
		}
		
		helper(['form', 'database']);
		$elementModel = new \App\Models\ElementModel();
		$model = $elementModel->find($id);

		$data['element'] = $model;

		$pageModel = new \App\Models\PageModel();
		$data['pageCollection'] = $pageModel->orderBy('label', 'asc')->findAll();
		return $this->view('Generated/Element/editelement', $data, 'Element');
	}

	/**
	 * Sauvegarde des modifications
	 */
	public function save(){
		helper(['form', 'database', 'security']);

		$validation =  \Config\Services::validation();
		
		if (! $this->validate([
'name' => 'trim|required',
			'selector' => 'trim|required',
			'page_id' => 'trim|required',
		])) {
			log_message('debug','[Editelement.php] : Error in the form !');
			session()->setFlashData('error', $validation->listErrors());
			return redirect()->to('Generated/Element/editelement/index/' 
				. $this->request->getPost('id'));
		}

		// Mise a jour des donnees en base
		$elementModel = new \App\Models\ElementModel();
		$key = $this->request->getPost('id');
		$oldModel = $elementModel->find($key);

		$data = [

			'id' => $this->request->getPost('id'),
			'name' => $this->request->getPost('name'),
			'selector' => $this->request->getPost('selector'),
			'page_id' => $this->request->getPost('page_id'),
		];


		$elementModel->update($key, $data);
		


		session()->setFlashData('msg_confirm', lang('generated/Element.message.confirm.modified'));
		return redirect()->to('Generated/Element/listelements/index');
	}


}
?>
