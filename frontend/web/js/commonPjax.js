$(document).on('pjax:error',function (e,xhr, textStatus, error, options) {
    console.log(textStatus);
});

$(document).on('pjax:success',function(e,data, status, xhr, options) {
    console.log(xhr);
});
