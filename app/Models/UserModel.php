<?php
/*
 * Created by generator
 *
 */

/***************************************************************************
 * DO NOT MODIFY THIS FILE, IT IS GENERATED
 ***************************************************************************/

namespace App\Models;
use CodeIgniter\Model;

class UserModel extends Model {
	
    protected $table      = 'user';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = [
	'id', // Identifiant système
		'login', // Login de l'utilisateur
		'password', // Mot de passe de connexion
		'name', // Nom de l'utilisateur
		'profile', // Profil applicatif de l'utilisateur
	];
    public static $empty = [
	'id' => '',
		'login' => '',
		'password' => '',
		'name' => '',
		'profile' => '',        
    ];

	/***************************************************************************
	 * DO NOT MODIFY THIS FILE, IT IS GENERATED
	 ***************************************************************************/

}

?>
