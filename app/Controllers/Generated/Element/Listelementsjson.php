<?php
/*
 * Created by generator
 *
 */
namespace App\Controllers\Generated\Element;

use CodeIgniter\API\ResponseTrait;

class ListElementsJson extends \App\Controllers\BaseController {

	use ResponseTrait;

	/**
	 * Affichage des Elements
	 */
	public function index($orderBy = 'name', $asc = 'asc', $offset = 0){
		helper(['database']);

		// preparer le tri
		$data['orderBy'] = $orderBy;
		$data['asc'] = $asc;
		$limit = 10;
		$pager = \Config\Services::pager();
		// recuperation des donnees
		$elementModel = new \App\Models\ElementModel();

		$data['elements'] = $elementModel
			->orderBy($orderBy, $asc)->paginate($limit, 'bootstrap', null, $offset);
		$data['pager'] = $elementModel->pager;

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
		$elementModel = new \App\Models\ElementModel();
		$keysArray = explode(',', $listOfKeys);
		if($orderBy == null){
			$orderBy = 'id';
		}
		$result = $elementModel->orderBy($orderBy, 'asc')->find($keysArray);
		return $this->respond([
			'status' => 'ok',
			'data' => $result
		]);
	}


	public function findBy_id($id, $orderBy = null, $limit = 50, $offset = 0){
		// recuperation des donnees
		$elementModel = new \App\Models\ElementModel();
		$result = $elementModel->where('id', $id)->findAll($limit, $offset);
		return $this->respond([
			'status' => 'ok',
			'data' => $result
		]);
	}
	public function findBy_name($name, $orderBy = null, $limit = 50, $offset = 0){
		// recuperation des donnees
		$elementModel = new \App\Models\ElementModel();
		$result = $elementModel->where('name', $name)->findAll($limit, $offset);
		return $this->respond([
			'status' => 'ok',
			'data' => $result
		]);
	}
	public function findBy_selector($selector, $orderBy = null, $limit = 50, $offset = 0){
		// recuperation des donnees
		$elementModel = new \App\Models\ElementModel();
		$result = $elementModel->where('selector', $selector)->findAll($limit, $offset);
		return $this->respond([
			'status' => 'ok',
			'data' => $result
		]);
	}
	public function findBy_page_id($page_id, $orderBy = null, $limit = 50, $offset = 0){
		// recuperation des donnees
		$elementModel = new \App\Models\ElementModel();
		$result = $elementModel->where('page_id', $page_id)->findAll($limit, $offset);
		return $this->respond([
			'status' => 'ok',
			'data' => $result
		]);
	}




	public function findLike_name($name){
		$db      = \Config\Database::connect();
		$builder = $db->table('element');
		$builder->like('name', urldecode($name));

		$data['elementCollection'] = $builder->get()->getResultArray();
		return $this->respond([
			'status' => 'ok',
			'data' => $data
		]);
	}
	public function findLike_selector($selector){
		$db      = \Config\Database::connect();
		$builder = $db->table('element');
		$builder->like('selector', urldecode($selector));

		$data['elementCollection'] = $builder->get()->getResultArray();
		return $this->respond([
			'status' => 'ok',
			'data' => $data
		]);
	}

}
?>
