$( document ).ready(function() {
    getPages( $('#app_id').val() );
});


function getPages(appId){
	$.ajax({
		url: base_url() + "WebMaster/App/AppAjax/getPages/" + appId,
		method: "GET",
		headers: {'X-Requested-With': 'XMLHttpRequest'},
		success: function (json) {             
            if(json.status == "ok"){
                $('#pages').empty();
                for(let page of json.data){
                    $('#pages').append( templatePage(page) );
                }
            }
        }
    });
}

function getElements(pageId){
    return new Promise((resolve) => {
        const langId = $('#langId').val();
        $.ajax({
            url: base_url() + "WebMaster/App/AppAjax/getElements/" + pageId + "/" + langId,
            method: "GET",
            headers: {'X-Requested-With': 'XMLHttpRequest'},
            success: function (json) {             
                if(json.status == "ok"){
                    $('#elements_of_page_'+pageId).empty()
                    for(let element of json.data){
                        $('#elements_of_page_'+pageId).append( templateElement(element, pageId) );
                    }
                }
                resolve(json.data);
            }
        });
    });
}

function templatePage(pageObject){
    return `<details class="tree" id="${pageObject.id}" data-app="${pageObject.app_id}"
        data-path="${pageObject.path}">
    <summary class="mb-1" onclick="getElements(${pageObject.id})">
            <div class="d-inline-flex w-25">    
                <i class="bi bi-folder me-1"></i>
                ${pageObject.label}
            </div>
            <div class="d-inline-flex" style="width: 70%">
                <span class="badge bg-secondary path">${pageObject.path}
                </span>
            </div>
    </summary>
    <div class="detail">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>
                        Nom
                    </th>
                    <th>
                        Contenu
                    </th>
                    <th>
                        Texte alternatif
                    </th>
                    <th>
                        Bulle
                    </th>
                    <th>
                        Image
                    </th>
                    <th>
                        Modifier / Supprimer
                    </th>
                </tr>
            </thead>
            <tbody id="elements_of_page_${pageObject.id}">
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="6">
                        <button class="btn btn-primary btn-sm" onclick="addTranslation(${pageObject.id})">
                            Ajouter une traduction dans la page
                        </button>
                    </th>
                </tr>
            </tfoot>
        </table>
    </div> <!-- .detail -->
</details>`;
}

function templateElement(elementObject, pageId){
    /* 
    {
            "element_id": "1",
            "name": "Sous-titre",
            "selector": "'#header h2.aparey'",
            "translate_id": "1",
            "html": "<p>Home wellness services that will change your life</p>",
            "alt": null,
            "title": null,
            "src": null,
            "href": null
        }
    */
    if(elementObject.html == null){
        elementObject.html = "";
    }
    if(elementObject.alt == null){
        elementObject.alt = "";
    }
    if(elementObject.title == null){
        elementObject.title = "";
    }
    if(elementObject.src == null){
        elementObject.src = "";
    }
    if(elementObject.href == null){
        elementObject.href = "";
    }

    var templateBtnDelete = `<button class="btn btn-sm btn-danger" 
            onclick="deleteTranslate(${elementObject.translate_id}, ${pageId})">
            <i class="bi bi-trash"></i>
        </button>`;
    if(elementObject.translate_id == null){
        templateBtnDelete = ``;
    }

    var templateBtnEdit = `<button class="btn btn-sm btn-primary" 
            onclick="openEdit(${elementObject.element_id}, ${elementObject.translate_id})">
            <i class="bi bi-pencil"></i>
        </button>`;
    if(elementObject.translate_id == null){
        templateBtnEdit = `<button class="btn btn-sm btn-primary" 
            onclick="openCreateTranslation(${elementObject.element_id})">
            <i class="bi bi-plus-circle"></i>
        </button>`;
    }

    return `<tr id="element_${elementObject.element_id}" data-element="${elementObject.element_id}"
        data-translate="${elementObject.translate_id}">
        <td>
            ${elementObject.name}
        </td>
        <td>
            ${elementObject.html}
        </td>
        <td>
            ${elementObject.alt}
        </td>
        <td>
            ${elementObject.title}
        </td>
        <td>
            ${elementObject.src}
        </td>
        <td>
        ${templateBtnEdit}
        ${templateBtnDelete}
        </td>
    </tr>`;
}

function getElement(element_id){
    return new Promise((resolve) => {
        $.ajax({
            url: base_url() + "WebMaster/App/AppAjax/getElement/" + element_id,
            method: "GET",
            headers: {'X-Requested-With': 'XMLHttpRequest'},
            success: function (json) {
                resolve(json);
            }
        });
    });
}

function getTranslation(translate_id){
    return new Promise((resolve) => {
        $.ajax({
            url: base_url() + "WebMaster/App/AppAjax/getTranslation/" + translate_id,
            method: "GET",
            headers: {'X-Requested-With': 'XMLHttpRequest'},
            success: function (json) {
                resolve(json);
            }
        });
    });
}

function openCreateTranslation(elementId){
    getElement(elementId).then((eltJson) => {
        const dataTranslation = {
            // id: null, // No ID
            element_id: eltJson.data.id,
            lang_id: $('#langId').val(),
            html: "-",
        };
        saveTranslation(dataTranslation).then((translateJson) => {
            openEdit(eltJson.data.id, translateJson.data.id);
        });
    });
}

function openEdit(element_id, translate_id){
    const langId = $('#langId').val();
    const langName = $('#langId option[value='+langId+']').html();
    getElement(element_id).then((json) => {
        $('#elementSelector').empty()
        if(json.status == "ok"){
            $('#elementSelector').val(json.data.selector);
            $('#elementName').html(json.data.name);
            $('#langName').html(langName);
            $('#elementId').val(json.data.id);
            $('#pageId').val(json.data.page_id);
        }
    });
    
    getTranslation(translate_id).then((json) => {
        if(json.status == "ok"){
            const editor = document.querySelector("trix-editor").editor;
            editor.loadHTML(json.data.html);
            $('#translationId').val(json.data.id);
            $('#translationHtml').val(json.data.html);
            $('#translationAlt').val(json.data.alt);
            $('#translationTitle').val(json.data.title);
            $('#translationSrc').val(json.data.src);
            $('#translationHref').val(json.data.href);
        }
    });

    // Open the modal
    const modal = new bootstrap.Modal('#editModal', {});
    modal.show();
}

function saveElement(dataElement){
    return new Promise((resolve) => {
        $.ajax({
            url: base_url() + "Generated/Element/Createelementjson/save/",
            method: "POST",
            data: dataElement,
            headers: {'X-Requested-With': 'XMLHttpRequest'},
            success: function (data) {
                resolve(data);
            },
        });
    });
}
function saveTranslation(dataTranslation){
    return new Promise((resolve) => {
        $.ajax({
            url: base_url() + "Generated/Translation/Createtranslationjson/save/",
            method: "POST",
            data: dataTranslation,
            headers: {'X-Requested-With': 'XMLHttpRequest'},
            success: function (data) {
                resolve(data);
            },
        });
    });
}

function applyTranslation(){

    const dataTranslation = {
        id: $('#translationId').val(),
        element_id: $('#elementId').val(),
        lang_id: $('#langId').val(),
        html: document.querySelector("trix-editor").value,
        alt: $('#translationAlt').val(),
        title: $('#translationTitle').val(),
        src: $('#translationSrc').val(),
        href: $('#translationHref').val()
    };
    const dataElement = {
        id: $('#elementId').val(),
        name: $('#elementName').html(),
        selector: $('#elementSelector').val(),
        page_id: $('#pageId').val()
    };

    saveTranslation(dataTranslation).then(( resTranslation )=>{
        saveElement(dataElement).then(( resElement )=>{
            // Refresh data
            getElements($('#pageId').val());

            const modal = bootstrap.Modal.getInstance($('#editModal').get(0));
            modal.hide();
        });
    });
    
}

function addTranslation(pageId){
    const name = prompt("Nom de l'élément : ");
    if(name === ""){
        return;
    }

    const dataElement = {
        // id: null, // No ID
        name: name,
        selector: '#',
        page_id: pageId
    };
    saveElement(dataElement).then(( resElement )=>{
        const dataTranslation = {
            // id: null, // No ID
            element_id: resElement.data.id,
            lang_id: $('#langId').val(),
            html: "-",
        };
        saveTranslation(dataTranslation).then((resTranslation)=>{
            getElements(pageId).then((data)=>{
                openEdit(resElement.data.id, resTranslation.data.id);
            });

        });
    });
}

function deleteTranslate(translateId, pageId) {
    if(!confirm("Voulez-vous supprimer cette traduction ?")){
        return;
    }
    return new Promise((resolve) => {
        $.ajax({
            url: base_url() + "Generated/Translation/Gettranslationjson/delete/" + translateId,
            method: "GET",
            headers: {'X-Requested-With': 'XMLHttpRequest'},
            success: function (data) {
                getElements(pageId);
                resolve(data);
            },
        });
    });
}
