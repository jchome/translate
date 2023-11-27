/* Javascript for listelements_view.php */

function deleteElement(id){
    if(!confirm('Voulez-vous supprimer ce Element ?')){
		return;
	}
	$.ajax({
		url: base_url() + "Generated/element/Getelementjson/delete/" + id,
		method: "GET",
		headers: {'X-Requested-With': 'XMLHttpRequest'},
		success: function (data) {
            // Reload the page
			document.location.href = document.location.origin + document.location.pathname + "?";
        }
    });
}
