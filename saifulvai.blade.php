success: function (res) {
                    var contend = '';
                    if(res.success === true){
                        submitButton.show();
                        var i = 1;
                        var message = $('#message').val();
                        $.each(res.students, function (key, value) {
                            var ckd = 'checked';
                            if (value.present_phone_mobile.length < 11){ckd = '';}
                            contend += "<tr>" +
                                "<td width='50px'>" + (i++) + "</td>" +
                                "<td>" + value.custom_student_id + "</td>" +
                                "<td>" + value.student_name_english + "</td>" +
                                "<td>" + value.roll_no + "</td>" +
                                "<td>" + value.present_phone_mobile + "</td>" +
                                "<td><textarea name='message"+value.academic_record_id+"' class='form-control' required>"+message+"</textarea></td>" +
                                "<input type='hidden' name='name"+value.academic_record_id+"' value='"+value.student_name_english+"' class='form-control'>"+
                                "<input type='hidden' name='id"+value.academic_record_id+"' value='"+value.custom_student_id+"' class='form-control'>"+
                                "<input type='hidden' name='mobile"+value.academic_record_id+"' value='"+value.present_phone_mobile+"' class='form-control'>"+
                                "<td><input type='checkbox' class='check' "+ckd+" name='academic_record_id[]' value='"+value.academic_record_id+"' style='width: 20px; height: 20px;'></td>" +
                                "</tr>";
                        });
                        tableContent.html(contend);
                    }
                }