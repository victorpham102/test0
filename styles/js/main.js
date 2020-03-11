$(document).ready(function () {
    $('#order a[data-toggle=\'tab\']').on('click', function(e) {
        return false;
    });

    $('#preview').on('click', function () {
        var data = {};
        data.first_name =  $('#firstname').val();
        data.last_name =  $('#lastname').val();
        data.company_name =  $('#companyname').val();
        data.email_address =  $('#emailaddress').val();
        data.phone_number =  $('#phonenumber').val();

        $('#registration span.error').empty();
        $.ajax({
            type: 'POST',
            url: 'main.php',
            data: data,
            dataType: 'json',
            success: function (json) {
                if(!json['status']) {
                    if (json['error']['lastname']) {
                        $('.lastname.error').html(json['error']['lastname']);
                    }
                    if (json['error']['firstname']) {
                        $('.firstname.error').html(json['error']['firstname']);
                    }
                    if (json['error']['companyname']) {
                        $('.companyname.error').html(json['error']['companyname']);
                    }
                    if (json['error']['phonenumber']) {
                        $('.phonenumber.error').html(json['error']['phonenumber']);
                    }
                    if (json['error']['emailaddress']) {
                        $('.emailaddress.error').html(json['error']['emailaddress']);
                    }
                } else {
                    $('#result_name img').attr('src', json.src);
                    $('#btndownload a').attr('href', json.src);
                    $('.nav-tabs a[href="#tab-preview"]').tab('show');
                }

            }
        });
    });
});
