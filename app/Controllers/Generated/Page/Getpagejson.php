<?php
/*
 * Created by generator
 *
 */
namespace App\Controllers\Generated\Page;

class GetPageJson extends \App\Controllers\AjaxController {


	/**
	* Affichage des infos
	*/
	public function get($id){

		$pageModel = new \App\Models\PageModel();
		$result = $pageModel->find($id);
		if( $result == null ){
			return $this->statusError('NOT FOUND');
		} else{
			return $this->statusOK($result);
		}
	}

	/**
	 * Affichage des infos
	 */
	public function edit($id){
		/*
		$model = $this->pageservice->getUnique($this->db, $id);
		$data['page'] = $model;

		$data['appCollection'] = $this->appservice->getAll($this->db,'name');		
	
		$this->load->view('page/editpage_fancyview',$data);
		*/
	}
	
	/**
	 * Suppression d'un Page
	 * @param $id identifiant a supprimer
	 */
	function delete($id){
		$model = new \App\Models\PageModel();
		$result = $model->find($id);



		if($result == null){
			return $this->statusError('NOT FOUND');
		}else{
			$model->delete($id);
			return $this->statusOK('done');
		}

		
	}

}

?>
