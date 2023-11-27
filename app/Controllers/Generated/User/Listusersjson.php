<?php
/*
 * Created by generator
 *
 */
namespace App\Controllers\Generated\User;

use CodeIgniter\API\ResponseTrait;

class ListUsersJson extends \App\Controllers\BaseController {

	use ResponseTrait;

	/**
	 * Affichage des Users
	 */
	public function index($orderBy = 'login', $asc = 'asc', $offset = 0){
		helper(['database']);

		// preparer le tri
		$data['orderBy'] = $orderBy;
		$data['asc'] = $asc;
		$limit = 10;
		$pager = \Config\Services::pager();
		// recuperation des donnees
		$userModel = new \App\Models\UserModel();

		$data['users'] = $userModel
			->orderBy($orderBy, $asc)->paginate($limit, 'bootstrap', null, $offset);
		$data['pager'] = $userModel->pager;

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
		$userModel = new \App\Models\UserModel();
		$keysArray = explode(',', $listOfKeys);
		if($orderBy == null){
			$orderBy = 'id';
		}
		$result = $userModel->orderBy($orderBy, 'asc')->find($keysArray);
		return $this->respond([
			'status' => 'ok',
			'data' => $result
		]);
	}


	public function findBy_id($id, $orderBy = null, $limit = 50, $offset = 0){
		// recuperation des donnees
		$userModel = new \App\Models\UserModel();
		$result = $userModel->where('id', $id)->findAll($limit, $offset);
		return $this->respond([
			'status' => 'ok',
			'data' => $result
		]);
	}
	public function findBy_login($login, $orderBy = null, $limit = 50, $offset = 0){
		// recuperation des donnees
		$userModel = new \App\Models\UserModel();
		$result = $userModel->where('login', $login)->findAll($limit, $offset);
		return $this->respond([
			'status' => 'ok',
			'data' => $result
		]);
	}
	public function findBy_password($password, $orderBy = null, $limit = 50, $offset = 0){
		// recuperation des donnees
		$userModel = new \App\Models\UserModel();
		$result = $userModel->where('password', $password)->findAll($limit, $offset);
		return $this->respond([
			'status' => 'ok',
			'data' => $result
		]);
	}
	public function findBy_name($name, $orderBy = null, $limit = 50, $offset = 0){
		// recuperation des donnees
		$userModel = new \App\Models\UserModel();
		$result = $userModel->where('name', $name)->findAll($limit, $offset);
		return $this->respond([
			'status' => 'ok',
			'data' => $result
		]);
	}
	public function findBy_profile($profile, $orderBy = null, $limit = 50, $offset = 0){
		// recuperation des donnees
		$userModel = new \App\Models\UserModel();
		$result = $userModel->where('profile', $profile)->findAll($limit, $offset);
		return $this->respond([
			'status' => 'ok',
			'data' => $result
		]);
	}




	public function findLike_login($login){
		$db      = \Config\Database::connect();
		$builder = $db->table('user');
		$builder->like('login', urldecode($login));

		$data['userCollection'] = $builder->get()->getResultArray();
		return $this->respond([
			'status' => 'ok',
			'data' => $data
		]);
	}
	public function findLike_name($name){
		$db      = \Config\Database::connect();
		$builder = $db->table('user');
		$builder->like('name', urldecode($name));

		$data['userCollection'] = $builder->get()->getResultArray();
		return $this->respond([
			'status' => 'ok',
			'data' => $data
		]);
	}

}
?>
