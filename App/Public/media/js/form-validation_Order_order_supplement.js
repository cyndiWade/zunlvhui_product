var FormValidation = function () {


    return {
        //main function to initiate the module
        init: function () {

            // for more info visit the official plugin documentation: 
            // http://docs.jquery.com/Plugins/Validation

            var form1 = $('#form_sample_1');
            var error1 = $('.alert-error', form1);
            var success1 = $('.alert-success', form1);

            form1.validate({
                errorElement: 'span', //default input error message container
                errorClass: 'help-inline', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",
                rules: {
                	
                	cars_id: {
                        required: true
                    },
                    start : {
                        required: true,
                        // dateISO:true
                     },	
                     cars_id : {
                    	 required: true,
                     },
                     estimate_over : {
                    	 required: true,
                       //  dateISO:true
                     },
                     
                     over : {
                         required: true,
                      },	
                      
                      length : {
                          required: true,
                          number:true
                       },	
                                       
					mobile_phone : {
                       required: true,
                        digits:true,
						minlength:11,
						maxlength:11
                    },	
					mobile_phone_message : {
						 required: true,
						minlength:2,
						maxlength:50
					}

                },

                invalidHandler: function (event, validator) { //display error alert on form submit              
                    success1.hide();
                    error1.show();
                    App.scrollTo(error1, -200);
                },

                highlight: function (element) { // hightlight error inputs
                    $(element)
                        .closest('.help-inline').removeClass('ok'); // display OK icon
                    $(element)
                        .closest('.control-group').removeClass('success').addClass('error'); // set error class to the control group
                },

                unhighlight: function (element) { // revert the change dony by hightlight
                    $(element)
                        .closest('.control-group').removeClass('error'); // set error class to the control group
                },

                success: function (label) {
                    label
                        .addClass('valid').addClass('help-inline ok') // mark the current input as valid and display OK icon
                    .closest('.control-group').removeClass('error').addClass('success'); // set success class to the control group
                    
                },

                submitHandler: function (form) {
                    success1.show();
                    error1.hide();

                    if (confirm('请再次核实你填写的内容，因为你填写信息会同步到会员的用车记录中。') == true) {
                    	 form.submit();		//提交表单
                    } else {
                    	return false;
                    }
                    
                   
                },
                
                errorPlacement: function (error, element) { // render error placement for each input type
                    if (element.attr("name") == "education") { // for chosen elements, need to insert the error after the chosen container
                        error.insertAfter("#form_2_education_chzn");
                    } else if (element.attr("name") == "cars_id") { // for uniform radio buttons, insert the after the given container
                        error.addClass("no-left-padding").insertAfter("#form_2_membership_error");
                    } else if (element.attr("name") == "service") { // for uniform checkboxes, insert the after the given container
                        error.addClass("no-left-padding").insertAfter("#form_2_service_error");
                    } else {
                        error.insertAfter(element); // for other inputs, just perform default behavoir
                    }
                },
            });

            //Sample 2
            $('#form_2_select2').select2({
                placeholder: "Select an Option",
                allowClear: true
            });

            var form2 = $('#form_sample_2');
            var error2 = $('.alert-error', form2);
            var success2 = $('.alert-success', form2);

           
            //apply validation on chosen dropdown value change, this only needed for chosen dropdown integration.
            $('.chosen, .chosen-with-diselect', form2).change(function () {
                form2.validate().element($(this)); //revalidate the chosen dropdown value and show error or success message for the input
            });

             //apply validation on select2 dropdown value change, this only needed for chosen dropdown integration.
            $('.select2', form2).change(function () {
                form2.validate().element($(this)); //revalidate the chosen dropdown value and show error or success message for the input
            });
            
            
			wade_bootstrap_date('.bootstrap_date_fn').bootstrap_date_fn(function () {
					
			});
				
			
				
				
			
			

        }

    };

}();