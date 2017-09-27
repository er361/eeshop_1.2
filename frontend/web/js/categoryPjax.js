$('#productsearch-category').change(function () {
    id = $(this).val();
    // console.log(what);
    $.get('sub-cat?category_id=' + id,function (html) {
        $('#subcat-ajax').html(html);
    });
})
