<?php
/*
 * Created by generator
 *
 */
namespace App\Controllers\Generated\Element;

class GetElementJson extends \App\Controllers\AjaxController {


	/**
	* Affichage des infos
	*/
	public function get($id){

		$elementModel = new \App\Models\ElementModel();
		$result = $elementModel->find($id);
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
		$model = $this->elementservice->getUnique($this->db, $id);
		$data['element'] = $model;

		$data['pageCollection'] = $this->pageservice->getAll($this->db,'label');		
	
		$this->load->view('element/editelement_fancyview',$data);
		*/
	}
	
	/**
	 * Suppression d'un Element
	 * @param $id identifiant a supprimer
	 */
	function delete($id){
		$model = new \App\Models\ElementModel();
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
