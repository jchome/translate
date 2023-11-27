<?php
/*
 * Created by generator
 *
 */
namespace App\Controllers\Generated\Translation;

class GetTranslationJson extends \App\Controllers\AjaxController {


	/**
	* Affichage des infos
	*/
	public function get($id){

		$translationModel = new \App\Models\TranslationModel();
		$result = $translationModel->find($id);
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
		$model = $this->translationservice->getUnique($this->db, $id);
		$data['translation'] = $model;

		$data['elementCollection'] = $this->elementservice->getAll($this->db,'name');
		$data['languageCollection'] = $this->languageservice->getAll($this->db,'label');		
	
		$this->load->view('translation/edittranslation_fancyview',$data);
		*/
	}
	
	/**
	 * Suppression d'un Translation
	 * @param $id identifiant a supprimer
	 */
	function delete($id){
		$model = new \App\Models\TranslationModel();
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
