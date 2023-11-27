/* Javascript for editlanguage_view.php */




 
function deleteFile_flag(){
	if( confirm("Supprimer ce fichier ?") ){
		$("#flag_deleteButton").hide();
		$("#flag_currentFile").hide();
		$("#flag").val("");
	}
}





//$("#id").get(0).setCustomValidity('Champ requis');
//$("#label").get(0).setCustomValidity('Champ requis');
//$("#code").get(0).setCustomValidity('Champ requis');
