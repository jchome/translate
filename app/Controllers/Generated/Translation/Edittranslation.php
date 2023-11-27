<?php
/*
 * Created by generator
 *
 */
namespace App\Controllers\Generated\Translation;

class EditTranslation extends \App\Controllers\HtmlController {

	/**
	 * Affichage des infos
	 */
	public function index($id){

		if(session()->get('user_id') == "") {
			return redirect()->to('welcome/index');
		}
		
		helper(['form', 'database']);
		$translationModel = new \App\Models\TranslationModel();
		$model = $translationModel->find($id);

		$data['translation'] = $model;

		$elementModel = new \App\Models\ElementModel();
		$data['elementCollection'] = $elementModel->orderBy('name', 'asc')->findAll();
		$languageModel = new \App\Models\LanguageModel();
		$data['languageCollection'] = $languageModel->orderBy('label', 'asc')->findAll();
		return $this->view('Generated/Translation/edittranslation', $data, 'Translation');
	}

	/**
	 * Sauvegarde des modifications
	 */
	public function save(){
		helper(['form', 'database', 'security']);

		$validation =  \Config\Services::validation();
		
		if (! $this->validate([
			'element_id' => 'trim|required',
			'lang_id' => 'trim|required',
			'html' => 'trim',
			'alt' => 'trim',
			'title' => 'trim',
			'src' => 'trim',
		])) {
			log_message('debug','[Edittranslation.php] : Error in the form !');
			session()->setFlashData('error', $validation->listErrors());
			return redirect()->to('Generated/Translation/edittranslation/index/' 
				. $this->request->getPost('id'));
		}

		// Mise a jour des donnees en base
		$translationModel = new \App\Models\TranslationModel();
		$key = $this->request->getPost('id');
		$oldModel = $translationModel->find($key);

		$data = [
			'id' => $this->request->getPost('id'),
			'element_id' => $this->request->getPost('element_id'),
			'lang_id' => $this->request->getPost('lang_id'),
			'html' => $this->request->getPost('html'),
			'alt' => $this->request->getPost('alt'),
			'title' => $this->request->getPost('title'),
			'src' => $this->request->getPost('src'),
		];

		if($data['html'] == ""){
			$data['html'] = null;
		}
		if($data['alt'] == ""){
			$data['alt'] = null;
		}
		if($data['title'] == ""){
			$data['title'] = null;
		}
		if($data['src'] == ""){
			$data['src'] = null;
		}

		$translationModel->update($key, $data);
		


		session()->setFlashData('msg_confirm', lang('generated/Translation.message.confirm.modified'));
		return redirect()->to('Generated/Translation/listtranslations/index');
	}


}
?>
