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

class TranslationModel extends Model {
	
    protected $table      = 'translate';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = [
	'id', // Identifiant système
		'element_id', // Lien vers l'élément à traduire
		'lang_id', // Lien vers la langue
		'html', // Traduction pour le texte contenu dans l'élément
		'alt', // Texte apparaissant à la place d'une image non trouvée
		'title', // Texte apparaissant au survol par la souris
		'src', // Lien http vers l'image traduite
	];
    public static $empty = [
	'id' => '',
		'element_id' => '',
		'lang_id' => '',
		'html' => '',
		'alt' => '',
		'title' => '',
		'src' => '',        
    ];

	/***************************************************************************
	 * DO NOT MODIFY THIS FILE, IT IS GENERATED
	 ***************************************************************************/

}

?>
