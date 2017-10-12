

$(document).on('pjax:error',function (e,xhr, textStatus, error, options) {
    // e.preventDefault();
    console.log(textStatus);
});

$(document).on('pjax:success',function(e,data, status, xhr, options) {
    console.log('success::');
});

$(document).on('pjax:timeout',function(e,xhr, options) {
    console.log(xhr,'timeout',options.timeout);
});

$(document).on('pjax:beforeReplace',function(e,contents, options) {
    console.log('beforeReplace::');
});

$(document).on('pjax:complete',function(e,xhr, textStatus, options) {
    console.log('complete::',xhr,'textStatus::',textStatus);
});
