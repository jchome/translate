<?php
/*
 * Created by generator
 *
 */
namespace App\Controllers\Generated\Page;

class ListPages extends \App\Controllers\HtmlController {

	/**
	 * Affichage des Pages
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
		$pageModel = new \App\Models\PageModel();

		$data['pages'] = $pageModel
			->orderBy($orderBy, $asc)->paginate($limit, 'bootstrap', null, $offset);
		$data['pager'] = $pageModel->pager;


		$appModel = new \App\Models\AppModel();
		$data['appCollection'] = index_data($appModel->orderBy('name', 'asc')
			->findAll(), 'id');

		return $this->view('Generated/Page/listpages', $data, 'Page');
	}

	
	/**
	 * Suppression d'un Page
	 * @param $id identifiant a supprimer
	 */
	function delete($id){
		$pageModel = new \App\Models\PageModel();
		$pageModel->delete($id);
		session()->setFlashData('msg_confirm', lang('generated/Page.message.confirm.deleted'));
		return redirect()->to('Generated/Page/listpages/index'); 
	}

}
?>
