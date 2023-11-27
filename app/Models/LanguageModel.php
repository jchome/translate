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

class LanguageModel extends Model {
	
    protected $table      = 'lang';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = [
	'id', // Identifiant système
		'label', // Nom de la langue
		'code', // Code sur 2 caractères
		'flag', // Image du drapeau
	];
    public static $empty = [
	'id' => '',
		'label' => '',
		'code' => '',
		'flag' => '',        
    ];

	/***************************************************************************
	 * DO NOT MODIFY THIS FILE, IT IS GENERATED
	 ***************************************************************************/

}

?>
