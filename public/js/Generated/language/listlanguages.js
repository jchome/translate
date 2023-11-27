/* Javascript for listlanguages_view.php */

function deleteLanguage(id){
    if(!confirm('Voulez-vous supprimer ce Langue ?')){
		return;
	}
	$.ajax({
		url: base_url() + "Generated/language/Getlanguagejson/delete/" + id,
		method: "GET",
		headers: {'X-Requested-With': 'XMLHttpRequest'},
		success: function (data) {
            // Reload the page
			document.location.href = document.location.origin + document.location.pathname + "?";
        }
    });
}
