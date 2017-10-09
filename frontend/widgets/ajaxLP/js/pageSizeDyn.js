$('body').on('change','.pagDynamicSelect',function(event){

    function getParamByName(name, url) {
        if (!url) url = window.location.href;
        name = name.replace(/[\[\]]/g, "\\$&");
        var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
            results = regex.exec(url);
        if (!results) return null;
        if (!results[2]) return '';
        return decodeURIComponent(results[2].replace(/\+/g, " "));
    }

    id = getParamByName('id');
    page = getParamByName('page');

    val = $(event.target).val();
    console.log(val);

    $.get('product-grid?id='+id +'&'+ 'page='+ page +'&' +'per-page='+ val +'&' +'_pjax=fake',function(html){
        console.log($('#product-grid'));
        $('#product-grid').html(html);
    })
})