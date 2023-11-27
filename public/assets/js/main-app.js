$( document ).ready(function() {

	// Scroll to the last item of '.buttons-bar'
	$('.buttons-bar').animate({scrollLeft: '100%'}, 500);

	for(let elt of $('.progression')){
		// Get the data-value="0.17"
		
		var value = $(elt).data("value");
		if(!value){
			value = 0;
		}
		const canvas = $(elt).find("canvas");
		if(canvas){
			displayProgression(canvas.get(0), parseFloat(value));
		}
	}
	
	if($('.rating')){
		$('.rating i').on('click', function() {
			$("#ratingValue").val($(this).data("rating"));
			updateRatingDisplay();
		});
	}

	
	window.lazyLoadOptions = {
		elements_selector: ".lazy"
	};

	// Listen to video player, to display subtitles
	setInterval(()=>{
		if($('.media.video-subtitle').length == 0){
			return;
		}

		// Display subtitle of the video 
		var videoElt = null; 
		for(let mediaElt of $('.media.video-subtitle')){
			if($(mediaElt).is(':visible')){
				videoElt = displaySubtitles(mediaElt);
				break;
			}
		}

		// Display the control buttons for content
		if($('body').hasClass('fullscreenMode') && videoElt){
			if(videoElt.currentTime > videoElt.duration - 1){
				$('.media.video-subtitle .subtitle').hide();
				$('#videoLayer').show();
			}
		}
	}, 500);


});


function displayCarouselItem(eltPart){
    // Pause all videos
    $('.media video').each((n,i) => i.pause());

	const currentSubContentId = $('.carousel-item.active').data('subcontentid');
	const nextSubContentId = $(eltPart).data('subcontentid');
	if(currentSubContentId == nextSubContentId){
		// I clicked on the current active item
		return;
	}
	if(currentSubContentId){
		// Send the success on the content
		var parentContentId = $('#contentId').val();
		$.ajax({
			url: base_url() + "App/Content/success",
			method: "POST",
			data: {
				'content_id': currentSubContentId,
				'parent_id': parentContentId
			},
			headers: {'X-Requested-With': 'XMLHttpRequest'},
			beforeSend: function (f) {
				//$('#userTable').html('Load Table ...');
			},
			success: function (data) {
				if(data.status == 'OK'){
					$('.part[data-subcontentid='+currentSubContentId+']').addClass("done");
					updateProgressLineWrapper();
				}
			}
		});
	}

    // Desactivate all parts
    $('.progress-line-wrapper .part').removeClass('active');
    
    // Activate this part
    $(eltPart).addClass('active');

    // Next action done by bootstrap: display the carousel slide
}

function updateRatingDisplay() {
	const value = parseInt($("#ratingValue").val());
	for(let star of $('.rating i')){
		if(parseInt($(star).data('rating')) <= value){
			$(star).addClass("bi-star-fill");
			$(star).removeClass("bi-star");
			if(parseInt($(star).data('rating')) == value){
				$('#ratingHelper').html($(star).data('helper'));
			}
		}else{
			$(star).addClass("bi-star");
			$(star).removeClass("bi-star-fill");
		}
	}
}

function displayProgression(canvas, percent) {
	const ctx = canvas.getContext("2d");
	canvas.width = 40;
	canvas.height = 40;
	ctx.clearRect(0, 0, canvas.width, canvas.height);
	ctx.lineWidth = 4;
	ctx.strokeStyle = "rgba(0,0,0, 0.25)",
	
	ctx.beginPath();
	ctx.arc(canvas.width/2, canvas.height/2, 18, /*start angle=*/ 0, /*end angle=*/2 * Math.PI);
	ctx.stroke();

	const angle = 2 * Math.PI * percent;
	ctx.strokeStyle = "rgba(0,0,255, 1)";
	ctx.lineWidth = 4;
	
	ctx.beginPath();
	ctx.arc(canvas.width/2, canvas.height/2, 18, /*start angle=*/ 0 - (Math.PI/2) , /*eng angle=*/ angle - (Math.PI/2));
	ctx.stroke();
}

function showHideInfo(elt) {
	$(elt).toggle(200);
}

function toggleFavorite(contentId, itemElt){
	$.ajax({
		url: base_url() + "index.php/App/favorite/toggle",
		method: "POST",
		data: {'content-id': contentId},
		headers: {'X-Requested-With': 'XMLHttpRequest'},
		beforeSend: function (f) {
			//$('#userTable').html('Load Table ...');
		},
		success: function (data) {
			if(data.status == "added"){
				$(itemElt).addClass("active");
			}else if (data.status == "removed"){
				$(itemElt).removeClass("active");
				if(getCurrentMenuName() == "favorites") {
					// We are un the "favorite menu"
					$('#content_' + contentId).addClass('disapear-to-left');
					setTimeout(() => {
						$('#content_' + contentId).remove();

						// If there is no content anymore, add the empty message
						if( $('#main .content').length == 0){
							$('#favouriteEmpty').show();
						}

					}, 1000);
					
				}
			}else{
				console.error("Wrong status...")
			}
			$('#liveToast .toast-body').html(data.message);
			// Changer le texte
			const toastBootstrap = bootstrap.Toast.getOrCreateInstance($('#liveToast').get(0));
			toastBootstrap.show();
		},
	});

}

/**
 * Set the new category for all the application
 * 
 * @param {int} categoryId 
 */
function setCategory(categoryId){
	// Call the post method on /App/Home/filter with category_id = categoryId
	$.ajax({
		url: base_url() + "App/Content/setcategory",
		method: "POST",
		data: {category_id: categoryId},
		headers: {'X-Requested-With': 'XMLHttpRequest'},
		beforeSend: function (f) {
			//$('#userTable').html('Load Table ...');
		},
		success: function (data) {
			// Update the modal content
			$('.category-selector').removeClass('selected');
			$('.category-selector[data-categoryId='+categoryId+']').addClass('selected');
			
			// Close the modal
			const modal = bootstrap.Modal.getInstance($('#categoryModal').get(0));
			modal.hide();

			// Move to Parcours
			document.location.href = base_url() + "App/Home/navigate?link=App/Parcours";

		}
	});
}


function displayToast(toastId, message, cssClass){
    $(toastId + ' .toast-body').html(message);
    if(! cssClass) {
        cssClass = 'bg-success';
    }
    $(toastId).removeClass('bg-danger bg-success');
    $(toastId).addClass(cssClass);
    const toastBootstrap = bootstrap.Toast.getOrCreateInstance($(toastId).get(0));
    toastBootstrap.show();
}

function changedCategory(elt){
	const categoryId = elt.value;
	if(! categoryId){
		return;
	}
	// Call Ajax to get parameter names of the category
	$.get(base_url() + "App/search/getParameters/" + categoryId, function( result ) {
		$('#param_name').empty();
		$('#param_name').append("<option value=''></option>");
		result.data.forEach(element => {
			$('#param_name').append(`<option value="${element.id}">${element.title}</option>`);
		});
	  });
}


function updateValueFields(eltSelect){
	console.log('updateValueFields');
	// Afficher le champ qui correspond à la valeur sélectionnée
	const selectedValue = $(eltSelect).find("option:selected").val();
	if(selectedValue == ""){
		$('#addParameterButton').hide();
		$('#valuesForParameter').hide();

		return;
	}
	$('#addParameterButton').show();
	$('#valuesForParameter').show();
	$('#param_name').width('33%');
	$('#valuesForParameter').children().hide(); // Hide all inputs
	$('#value_text').show();					// Hide the generic textual input
	$('#value_text').focus();					// place the cursor on this input
	$('#valuesForParameter').children().each((_,item) => {
		if($(item).data("parameter") == selectedValue){
			$(item).show();						// Show the specific input
			$('#value_text').hide();			// Hide the generic textual input
			$(item).focus();					// place the cursor on this input
		}
	});

}
function addValueFields(event){
	event.preventDefault();
	const parameterOption = $('#param_name').find("option:selected");
	const paramId = parameterOption.val();
	if(!paramId){
		return;
	}
	const paramName = parameterOption.html();
	var paramValue;
	var parameterTexualValue;
	$('#valuesForParameter').children().each((_,item) => {
		if($(item).is(":visible")){
			if(item.nodeName == 'INPUT'){ // pure javascript ".nodeName" attribute
				paramValue = "'%" + $(item).val() + "%'";
				parameterTexualValue = $(item).val();
			}else{
				const selectedOption = $(item).find("option:selected");
				paramValue = selectedOption.val();
				parameterTexualValue = selectedOption.html();
			}
		}
	});
	
	if(paramValue == "" || paramValue == "'%%'"){
		return;
	}
	// Check if the parameter name is already present. Remove it, if present
	$('.search-parameters').find('tr').each((_,item) => {
		if($(item).data("parameter-id") == paramId){
			$(item).remove();
		}
	});

	// Add the parameter line
	$('.search-parameters').append(`<tr data-parameter-id="${paramId}">
			<th>${paramName} :</th>
			<td>${parameterTexualValue}</td>
			<td class="btn-remove">
				<button class="btn btn-danger btn-sm" onclick="removeValueField(this, event)"><i class="bi bi-x"></i></button>
				<input type="hidden" name="param[]" value="${paramId}=${paramValue}">
			</td>
		</tr>`);
	// Reset the select of parameter
	$('#param_name').val("").change();
	$('#param_name').width('100%');
}

function removeValueField(elt, event){
	$(elt).parent().parent().remove();
	event.preventDefault();
}


function getTagHtmlTemplate(labelOfTag, idOfTag){
	return `<span id="tag_${idOfTag}" class="tag-item-edit">${labelOfTag} 
		<button class="btn btn-sm" onclick="removeTagOnSearch(${idOfTag})">
			<i class="bi bi-trash"></i>
		</button>
	</span>`;
}

function addTagOnSearch(){
	// Add the id in the input field
	const idOfTag = $('#tagSearchText').val();
	if(idOfTag == ""){
		return;
	}
	var tagSearchIdsArray = [];
	if($('#tagSearchIds').val() != ""){
		tagSearchIdsArray = $('#tagSearchIds').val().split(',');
	}
	if(tagSearchIdsArray.indexOf(idOfTag) > -1 ){
		$('#tagSearchText').val('');
		return;
	}
	tagSearchIdsArray.push(idOfTag);
	$('#tagSearchIds').val( tagSearchIdsArray.join(',') );
	
	// Add the label in the selected tags
	const labelOfTag = $('#tagSearchText option:selected').text();

	$('#selectedTags').append(getTagHtmlTemplate(labelOfTag, idOfTag));

	$('#tagSearchText').val('');

}

function removeTagOnSearch(idOfTag){
	var tagSearchIdsArray = $('#tagSearchIds').val().split(',');
	const index = tagSearchIdsArray.indexOf(idOfTag);
	tagSearchIdsArray.splice(index, 1);
	$('#tagSearchIds').val( tagSearchIdsArray.join(',') );
	$('#selectedTags #tag_'+idOfTag).remove();
}


function fillSearchFields(){

	// Manage Parameters
	const parameters = $('#params_callback').val();
	
	// Wait a little time to update the next fields
	setTimeout(() => {
		if(parameters == ""){
			return;
		}
		for(const keyValue of parameters.split('&')) {
			const keyValueArray = keyValue.split('=');
			$('#param_name').val(keyValueArray[0]).change();

			// Fill the parameter
			if($('#value_select_'+keyValueArray[0]).length > 0){
				// Fill the select -- .is(":visible")
				$('#value_select_'+keyValueArray[0]).val(keyValueArray[1]);
			}else{
				// Fill the value text
				const text = keyValueArray[1].substring(2,keyValueArray[1].length-2);
				$('#value_text').val(text)
			}
			setTimeout(() => {
				$('#addParameterButton').click();
			}, 500);
			

		}
	}, 500);

	// Manage Tags
	const tagSearchIdsList = $('#tagSearchIds').val();
	if(tagSearchIdsList != ""){
		$.ajax({
			url: base_url() + "index.php/Tag/Listtagsjson/getAll_id/" + tagSearchIdsList,
			method: "GET",
			headers: {'X-Requested-With': 'XMLHttpRequest'},
			success: function (json) {
				$('#selectedTags').empty();
				for(let tagData of json.data){
					$('#selectedTags').append(getTagHtmlTemplate(tagData.label, tagData.id));
				}
			},
		});
	}

}

function activateMedia(mediaId) {
	if($('body').hasClass('fullscreenMode')){
		const contentId = $('#contentId').val();
		const parentIds = $('#parentIds').val();
		document.location.href = base_url() + 'index.php/App/Media/fullscreen/' + contentId + '/' + parentIds + '/' + mediaId;
	}else{
		$('#mediaBar').children().removeClass("btn-primary").addClass("btn-outline-primary");
		// Hilight the button
		$("#btnMedia_" + mediaId).removeClass("btn-outline-primary").addClass("btn-primary");
	
		// Hide all medias of the page
		$('#mediaList').children().hide();
		// Show the selected media
		$('#media_' + mediaId).show();
	}
}


function scrollTo(elt){
	const scrollTop = $(document.documentElement).scrollTop();
	const valueScroll = $(elt).offset().top - scrollTop;
	$([document.documentElement, document.body]).animate({
        scrollTop: valueScroll
    }, 500);
}

function displaySubtitles(mediaElt) {
	const subtitleElts = $(mediaElt).find('.subtitle');
	const videoElt = $(mediaElt).find('video').get(0);
	const subtitle = subtitleInTimer(subtitleElts, videoElt.currentTime);

	subtitleElts.hide();
	if(subtitle){
		subtitle.show();
	}
	return videoElt; // return the pure HTML object
}

function subtitleInTimer(subtitleElts, timer){
	for(let subtitleElt of subtitleElts){
		const start = parseInt($(subtitleElt).data("start"));
		const end = parseInt($(subtitleElt).data("end"));
		if(start <= timer && timer <= end){
			return $(subtitleElt); // return the jquery object
		}
	}
	return null;
}

function replayVideo() {
	$('#videoLayer').hide();
	const videoElt = $('.media.video-subtitle').find(':visible').get(0);
	videoElt.currentTime = 0;
	videoElt.play();
}

function submitQuizz(buttonElt){
	const contentId = $('#contentId').val();
	const parentIds = $('#parentIds').val();
	const selectedMedia = $('input[name=answer]').filter(":checked").val();
	if(! selectedMedia){
		alert("Veuillez sélectionner votre réponse");
		return;
	}
	// Inactive buttons
	$('#previousContentButton, #nextContentButton,#endContentButton').prop('disabled', true);

	$.ajax({
		url: base_url() + "index.php/App/content/sumbitQuizz/"+ contentId + "/" + selectedMedia + "/" + parentIds,
		method: "GET",
		headers: {'X-Requested-With': 'XMLHttpRequest'},
		success: function (json) {
			if(json.result == 'ERROR'){
				alert("Erreur... Veuillez recharger la page.");
			}else {
				if(json.result == 'FAILED'){
					alert("Il semble que ce ne soit pas la bonne réponse...");
				}else if(json.result == 'SUCCESS'){
					alert("Bravo, vous gagner 10 points XP !");
				}
				const nextUrl = base_url() + "index.php/App/content/index/"+json.redirection+"/" + parentIds;
				navigateToRight(nextUrl, buttonElt);
			}
		},
	});
}