const list = $('#comments-list'),
    alertResult = $('#alert-result'),
    companyName = $('#company-name').text();

$('#company-update').on('submit', function (e) {
    e.preventDefault();

    const body = $('#comment_new').val();
    $.ajax({
        url: '/admin/comment-create',
        method: "POST",
        data: $(this).serializeArray()
    })
    .done(function (res) {
        console.log(res);
        $('#form-comment')[0].reset();
        list.prepend(`
        <li class="list-group-item">
            <p>${companyName}</p>
            ${body}
        </li>`
        );
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
