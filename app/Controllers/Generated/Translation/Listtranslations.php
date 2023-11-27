<?php
/*
 * Created by generator
 *
 */
namespace App\Controllers\Generated\Translation;

class ListTranslations extends \App\Controllers\HtmlController {

	/**
	 * Affichage des Translations
	 */
	public function index($orderBy = null, $asc = null, $offset = 0){

		if(session()->get('user_id') == "") {
			return redirect()->to('welcome/index');
		}
		
		helper(['database']);

		// preparer le tri
		if($orderBy == null) {
			$orderBy = 'element_id';
		}
		if($asc == null) {
			$asc = 'asc';
		}
		$data['orderBy'] = $orderBy;
		$data['asc'] = $asc;
		$limit = 10;
		$pager = \Config\Services::pager();
		// recuperation des donnees
		$translationModel = new \App\Models\TranslationModel();

		$data['translations'] = $translationModel
			->orderBy($orderBy, $asc)->paginate($limit, 'bootstrap', null, $offset);
		$data['pager'] = $translationModel->pager;


		$elementModel = new \App\Models\ElementModel();
		$data['elementCollection'] = index_data($elementModel->orderBy('name', 'asc')
			->findAll(), 'id');
		$languageModel = new \App\Models\LanguageModel();
		$data['languageCollection'] = index_data($languageModel->orderBy('label', 'asc')
			->findAll(), 'id');

		return $this->view('Generated/Translation/listtranslations', $data, 'Translation');
	}

	
	/**
	 * Suppression d'un Translation
	 * @param $id identifiant a supprimer
	 */
	function delete($id){
		$translationModel = new \App\Models\TranslationModel();
		$translationModel->delete($id);
		session()->setFlashData('msg_confirm', lang('generated/Translation.message.confirm.deleted'));
		return redirect()->to('Generated/Translation/listtranslations/index'); 
	}

}
?>
