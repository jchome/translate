<?php
/*
 * Created by generator
 *
 */
namespace App\Controllers\Generated\Language;

class ListLanguages extends \App\Controllers\HtmlController {

	/**
	 * Affichage des Languages
	 */
	public function index($orderBy = null, $asc = null, $offset = 0){

		if(session()->get('user_id') == "") {
			return redirect()->to('welcome/index');
		}
		
		helper(['database']);

		// preparer le tri
		if($orderBy == null) {
			$orderBy = 'label';
		}
		if($asc == null) {
			$asc = 'asc';
		}
		$data['orderBy'] = $orderBy;
		$data['asc'] = $asc;
		$limit = 10;
		$pager = \Config\Services::pager();
		// recuperation des donnees
		$languageModel = new \App\Models\LanguageModel();

		$data['languages'] = $languageModel
			->orderBy($orderBy, $asc)->paginate($limit, 'bootstrap', null, $offset);
		$data['pager'] = $languageModel->pager;



		return $this->view('Generated/Language/listlanguages', $data, 'Language');
	}

	
	/**
	 * Suppression d'un Language
	 * @param $id identifiant a supprimer
	 */
	function delete($id){
		$languageModel = new \App\Models\LanguageModel();
		$languageModel->delete($id);
		session()->setFlashData('msg_confirm', lang('generated/Language.message.confirm.deleted'));
		return redirect()->to('Generated/Language/listlanguages/index'); 
	}

}
?>
