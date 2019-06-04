const alertResult = $('#alert-photo');

$('#post-form').on('submit', function (e) {
    e.preventDefault();

    let data = new FormData();
    data.append('image', $('#image')[0].files[0]);
    console.log(data);
    
    $.ajax({
        url: '/admin/company-updatePhoto',
        method: "POST",
        contentType: false,
        processData: false,
        data,
        headers: {
            'X-CSRF-TOKEN': $("input[name='_token']").val()
        },
    })
    .done(function (res) {
        console.log(res);
        
        alertResult.removeClass('collapse').addClass('alert-success')
            .text(res);
        hideAlert();
    })
    .fail(function (error) {
        console.log(error);
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
