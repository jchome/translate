/* Javascript for listpages_view.php */

function deletePage(id){
    if(!confirm('Voulez-vous supprimer ce Page ?')){
		return;
	}
	$.ajax({
		url: base_url() + "Generated/page/Getpagejson/delete/" + id,
		method: "GET",
		headers: {'X-Requested-With': 'XMLHttpRequest'},
		success: function (data) {
            // Reload the page
			document.location.href = document.location.origin + document.location.pathname + "?";
        }
    });
}
