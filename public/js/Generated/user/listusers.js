/* Javascript for listusers_view.php */

function deleteUser(id){
    if(!confirm('Voulez-vous supprimer ce Utilisateur ?')){
		return;
	}
	$.ajax({
		url: base_url() + "Generated/user/Getuserjson/delete/" + id,
		method: "GET",
		headers: {'X-Requested-With': 'XMLHttpRequest'},
		success: function (data) {
            // Reload the page
			document.location.href = document.location.origin + document.location.pathname + "?";
        }
    });
}
