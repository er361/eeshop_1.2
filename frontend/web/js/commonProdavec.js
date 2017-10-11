function hideModal(id){
    $('#modal_' + id).modal('hide');
    $('.modal-backdrop.fade.in').hide();
    $('body.modal-open').removeClass('modal-open');
}