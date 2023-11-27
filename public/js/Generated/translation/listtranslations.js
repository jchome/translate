/* Javascript for listtranslations_view.php */

function deleteTranslation(id){
    if(!confirm('Voulez-vous supprimer ce Traduction ?')){
		return;
	}
	$.ajax({
		url: base_url() + "Generated/translation/Gettranslationjson/delete/" + id,
		method: "GET",
		headers: {'X-Requested-With': 'XMLHttpRequest'},
		success: function (data) {
            // Reload the page
			document.location.href = document.location.origin + document.location.pathname + "?";
        }
    });
}
