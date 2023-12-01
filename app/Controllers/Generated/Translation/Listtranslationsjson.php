<?php
/*
 * Created by generator
 *
 */
namespace App\Controllers\Generated\Translation;

use CodeIgniter\API\ResponseTrait;

class ListTranslationsJson extends \App\Controllers\BaseController {

	use ResponseTrait;

	/**
	 * Affichage des Translations
	 */
	public function index($orderBy = 'element_id', $asc = 'asc', $offset = 0){
		helper(['database']);

		// preparer le tri
		$data['orderBy'] = $orderBy;
		$data['asc'] = $asc;
		$limit = 10;
		$pager = \Config\Services::pager();
		// recuperation des donnees
		$translationModel = new \App\Models\TranslationModel();

		$data['translations'] = $translationModel
			->orderBy($orderBy, $asc)->paginate($limit, 'bootstrap', null, $offset);
		$data['pager'] = $translationModel->pager;

		return $this->respond([
			'status' => 'ok',
			'data' => $data
		]);

	}

	/**
	 * Get all objects having the key in the list $listOfKeys (string separated by ',')
	 * 
	 */
	public function getAll_id($listOfKeys, $orderBy = null){
		$translationModel = new \App\Models\TranslationModel();
		$keysArray = explode(',', $listOfKeys);
		if($orderBy == null){
			$orderBy = 'id';
		}
		$result = $translationModel->orderBy($orderBy, 'asc')->find($keysArray);
		return $this->respond([
			'status' => 'ok',
			'data' => $result
		]);
	}


	public function findBy_id($id, $orderBy = null, $limit = 50, $offset = 0){
		// recuperation des donnees
		$translationModel = new \App\Models\TranslationModel();
		$result = $translationModel->where('id', $id)->findAll($limit, $offset);
		return $this->respond([
			'status' => 'ok',
			'data' => $result
		]);
	}
	public function findBy_element_id($element_id, $orderBy = null, $limit = 50, $offset = 0){
		// recuperation des donnees
		$translationModel = new \App\Models\TranslationModel();
		$result = $translationModel->where('element_id', $element_id)->findAll($limit, $offset);
		return $this->respond([
			'status' => 'ok',
			'data' => $result
		]);
	}
	public function findBy_lang_id($lang_id, $orderBy = null, $limit = 50, $offset = 0){
		// recuperation des donnees
		$translationModel = new \App\Models\TranslationModel();
		$result = $translationModel->where('lang_id', $lang_id)->findAll($limit, $offset);
		return $this->respond([
			'status' => 'ok',
			'data' => $result
		]);
	}
	public function findBy_html($html, $orderBy = null, $limit = 50, $offset = 0){
		// recuperation des donnees
		$translationModel = new \App\Models\TranslationModel();
		$result = $translationModel->where('html', $html)->findAll($limit, $offset);
		return $this->respond([
			'status' => 'ok',
			'data' => $result
		]);
	}
	public function findBy_alt($alt, $orderBy = null, $limit = 50, $offset = 0){
		// recuperation des donnees
		$translationModel = new \App\Models\TranslationModel();
		$result = $translationModel->where('alt', $alt)->findAll($limit, $offset);
		return $this->respond([
			'status' => 'ok',
			'data' => $result
		]);
	}
	public function findBy_title($title, $orderBy = null, $limit = 50, $offset = 0){
		// recuperation des donnees
		$translationModel = new \App\Models\TranslationModel();
		$result = $translationModel->where('title', $title)->findAll($limit, $offset);
		return $this->respond([
			'status' => 'ok',
			'data' => $result
		]);
	}
	public function findBy_src($src, $orderBy = null, $limit = 50, $offset = 0){
		// recuperation des donnees
		$translationModel = new \App\Models\TranslationModel();
		$result = $translationModel->where('src', $src)->findAll($limit, $offset);
		return $this->respond([
			'status' => 'ok',
			'data' => $result
		]);
	}
	public function findBy_href($href, $orderBy = null, $limit = 50, $offset = 0){
		// recuperation des donnees
		$translationModel = new \App\Models\TranslationModel();
		$result = $translationModel->where('href', $href)->findAll($limit, $offset);
		return $this->respond([
			'status' => 'ok',
			'data' => $result
		]);
	}




	public function findLike_html($html){
		$db      = \Config\Database::connect();
		$builder = $db->table('translate');
		$builder->like('html', urldecode($html));

		$data['translationCollection'] = $builder->get()->getResultArray();
		return $this->respond([
			'status' => 'ok',
			'data' => $data
		]);
	}
	public function findLike_alt($alt){
		$db      = \Config\Database::connect();
		$builder = $db->table('translate');
		$builder->like('alt', urldecode($alt));

		$data['translationCollection'] = $builder->get()->getResultArray();
		return $this->respond([
			'status' => 'ok',
			'data' => $data
		]);
	}
	public function findLike_title($title){
		$db      = \Config\Database::connect();
		$builder = $db->table('translate');
		$builder->like('title', urldecode($title));

		$data['translationCollection'] = $builder->get()->getResultArray();
		return $this->respond([
			'status' => 'ok',
			'data' => $data
		]);
	}
	public function findLike_src($src){
		$db      = \Config\Database::connect();
		$builder = $db->table('translate');
		$builder->like('src', urldecode($src));

		$data['translationCollection'] = $builder->get()->getResultArray();
		return $this->respond([
			'status' => 'ok',
			'data' => $data
		]);
	}
	public function findLike_href($href){
		$db      = \Config\Database::connect();
		$builder = $db->table('translate');
		$builder->like('href', urldecode($href));

		$data['translationCollection'] = $builder->get()->getResultArray();
		return $this->respond([
			'status' => 'ok',
			'data' => $data
		]);
	}

}
?>
