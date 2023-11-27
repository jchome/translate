$( document ).ready(function() {

    $.ajax({
        'async': false,
        'global': false,
        'url': "http://localhost:8080/WebMaster/App/AppAjax/getJson/1?lang=en&path=/index.php",
        'dataType': "json",
        'success': function(data) {
            for(let item of data.translations) {
                // Find the element
                const htmlElt = $(item.path);
                if(!htmlElt){
                    continue;
                }
                item.html && htmlElt.html(item.html);
                for(let attribute of ['alt', 'title', 'src', 'class', 'value']){
                    item[attribute] && htmlElt.attr(attribute, item[attribute]);
                }
            };
        }
    });
    
});
