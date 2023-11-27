<?php
/*
 * Created by generator
 *
 */
namespace App\Controllers\Generated\Element;

class ListElements extends \App\Controllers\HtmlController {

	/**
	 * Affichage des Elements
	 */
	public function index($orderBy = null, $asc = null, $offset = 0){

		if(session()->get('user_id') == "") {
			return redirect()->to('welcome/index');
		}
		
		helper(['database']);

		// preparer le tri
		if($orderBy == null) {
			$orderBy = 'name';
		}
		if($asc == null) {
			$asc = 'asc';
		}
		$data['orderBy'] = $orderBy;
		$data['asc'] = $asc;
		$limit = 10;
		$pager = \Config\Services::pager();
		// recuperation des donnees
		$elementModel = new \App\Models\ElementModel();

		$data['elements'] = $elementModel
			->orderBy($orderBy, $asc)->paginate($limit, 'bootstrap', null, $offset);
		$data['pager'] = $elementModel->pager;


		$pageModel = new \App\Models\PageModel();
		$data['pageCollection'] = index_data($pageModel->orderBy('label', 'asc')
			->findAll(), 'id');

		return $this->view('Generated/Element/listelements', $data, 'Element');
	}

	
	/**
	 * Suppression d'un Element
	 * @param $id identifiant a supprimer
	 */
	function delete($id){
		$elementModel = new \App\Models\ElementModel();
		$elementModel->delete($id);
		session()->setFlashData('msg_confirm', lang('generated/Element.message.confirm.deleted'));
		return redirect()->to('Generated/Element/listelements/index'); 
	}

}
?>
