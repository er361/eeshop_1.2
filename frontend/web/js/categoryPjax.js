$('body').on("change", "#productsearch-category", function () {
    id = $(this).val();
    $.get('sub-cat?category_id=' + id,function (html) {
        $('#subcat-ajax').html(html);
    });
});