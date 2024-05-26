$('#loginBtn').click(function () {
    var email = $('#email').val();
    var password = $('#password').val();
    if (email == '' || password == '') {
        toastr.error('Email / Password is not empty !');
        return;
    }
    $.ajax({
        url: '?url=admin/handleLogin',
        method: 'POST',
        data: {
            email: email,
            password: password
        },
        dataType: "json",
        success: function (response) {
            if (response != -1) {
                toastr.success('Login successfully !');
                if (response == 1) {
                    window.location.href = '?url=dashboard';
                } else {
                    window.location.href = '?url=news';
                }
            } else {
                toastr.error('Something went wrong !');
            }
        }
    });
});

// Catch the event enter
$(document).on('keypress', function (e) {
    if (e.which == 13) {
        var email = $('#email').val();
        var password = $('#password').val();
        if (email == '' || password == '') {
            toastr.error('Email / Password is not empty !');
            return;
        }
        $.ajax({
            url: '?url=admin/handleLogin',
            method: 'POST',
            data: {
                email: email,
                password: password
            },
            dataType: "json",
            success: function (response) {
                if (response != -1) {
                    toastr.success('Login successfully !');
                    if (response == 1) {
                        window.location.href = '?url=dashboard';
                    } else {
                        window.location.href = '?url=news';
                    }
                } else {
                    toastr.error('Something went wrong !');
                }
            }
        });
    }
});
