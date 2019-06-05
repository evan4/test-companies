const alertResult = $('#alert-photo'),
    loading = $('.loading-photo'),
    image = $('#image');

$('#post-form').on('submit', function (e) {
    e.preventDefault();

    let data = new FormData();
    data.append('image', image[0].files[0]);
    
    $.ajax({
        url: '/admin/company-updatePhoto',
        method: "POST",
        contentType: false,
        processData: false,
        data,
        headers: {
            'X-CSRF-TOKEN': $("input[name='_token']").val()
        },
        beforeSend: ( xhr ) => {
            loading.show();
        }
    })
    .done(function (res) {
        console.log(res);
        $('#company-image').attr('src', `/storage/img/${res.image}`);
        loading.hide();
        alertResult.removeClass('collapse').addClass('alert-success')
            .text(res.text);
        hideAlert();
    })
    .fail(function (error) {
        console.log(error);
        loading.hide();
        alertResult.removeClass('collapse').addClass('alert-danger')
            .text('Произошла ошибка. Попробуйте еще раз.');
        hideAlert();
    });
});

function hideAlert() {
    setTimeout(() => {
        alertResult.addClass('collapse').text();
    }, 2000);
}
