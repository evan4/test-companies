const alertResult = $('#alert-company');

$('#company-update').on('submit', function (e) {
    e.preventDefault();

    $.ajax({
        url: '/admin/company-update',
        method: "POST",
        data: $(this).serializeArray()
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
