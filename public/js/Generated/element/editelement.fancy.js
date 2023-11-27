/* Javascript for createelement_fancyview.php */



/**
 * Envoi du form : intercepter l'envoi pour mettre à jour la liste et fermer la modale
 */
$('#EditFormElement').ajaxForm(function(data){
	// recuperation de l'objet sauvegardé en JSON
	// var objectSaved = JSON.parse(data);
	
	// fermeture de la modale
	$('#modal_editelement').modal('hide');
});

