<?php
/*
 * Created by generator
 *
 */
namespace App\Controllers\Generated\Page;

class EditPage extends \App\Controllers\HtmlController {

	/**
	 * Affichage des infos
	 */
	public function index($id){

		if(session()->get('user_id') == "") {
			return redirect()->to('welcome/index');
		}
		
		helper(['form', 'database']);
		$pageModel = new \App\Models\PageModel();
		$model = $pageModel->find($id);

		$data['page'] = $model;

		$appModel = new \App\Models\AppModel();
		$data['appCollection'] = $appModel->orderBy('name', 'asc')->findAll();
		return $this->view('Generated/Page/editpage', $data, 'Page');
	}

	/**
	 * Sauvegarde des modifications
	 */
	public function save(){
		helper(['form', 'database', 'security']);

		$validation =  \Config\Services::validation();
		
		if (! $this->validate([
'label' => 'trim|required',
			'path' => 'trim',
			'app_id' => 'trim|required',
		])) {
			log_message('debug','[Editpage.php] : Error in the form !');
			session()->setFlashData('error', $validation->listErrors());
			return redirect()->to('Generated/Page/editpage/index/' 
				. $this->request->getPost('id'));
		}

		// Mise a jour des donnees en base
		$pageModel = new \App\Models\PageModel();
		$key = $this->request->getPost('id');
		$oldModel = $pageModel->find($key);

		$data = [

			'id' => $this->request->getPost('id'),
			'label' => $this->request->getPost('label'),
			'path' => $this->request->getPost('path'),
			'app_id' => $this->request->getPost('app_id'),
		];

		if($data['path'] == ""){
			$data['path'] = null;
		}

		$pageModel->update($key, $data);
		


		session()->setFlashData('msg_confirm', lang('generated/Page.message.confirm.modified'));
		return redirect()->to('Generated/Page/listpages/index');
	}


}
?>
