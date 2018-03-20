$(function ($) {
            $('input[name=myfile]').on('change', function (e) {
                $('button[type=button]').on('click', function (e) {
                    var formData = new FormData;
                    // formData.ppend(name, element); 
                    formData.append('myfile', $('input[name=myfile]')[0].files[0]);
                    $.ajax({
                            url: 'upload01.php',
                            method: 'POST',
                            data: formData,
                            contentType: false, // 注意這裡應設為false 
                            processData: false,
                            cache: false,
                            success: function (data) {
                                if (JSON.parse(data).result == 1) {
                                    $('.prompt').html(`文件${JSON.parse(data).filename}已上傳成功`);
                                }
                            },
                            error: function (jqXHR) {
                                console.log(JSON.stringify(jqXHR));
                            }
                        })
                        .done(function (data) {
                            console.log('done');
                        })
                        .fail(function (data) {
                            console.log('fail');
                        })
                        .always(function (data) {
                            console.log('always');
                        });
                });
            });