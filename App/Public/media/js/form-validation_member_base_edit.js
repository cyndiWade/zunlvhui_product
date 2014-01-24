var FormValidation = function () {

	/* 性别加首选 */
	(function ($) {
		var ipt_sex = $('.ipt_sex');
		var ipt_check_sex = $('#ipt_check_sex');
		
		ipt_sex.each(function () {
			var _this = $(this);
			if (_this.val() == ipt_check_sex.val()) {
				_this.prop("checked", true);	//选中
			}
		});
	})(jQuery);

	/* 经营组织/在职公司类型 加首选 */
	(function ($) {
		var ipt_check_have = $('#ipt_check_have');
		var ipt_check = $('.ipt_check');

		//转换为数组	
		var arr_check = ipt_check_have.val().split(',');
		
		ipt_check.each(function () {
			var _this = $(this);
			if (in_array(_this.val(),arr_check)) {
				_this.prop("checked", true);
			}
		});
	})(jQuery);

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
					member_id : {
						 required: true
					},
                    area: {
                        minlength: 2,
						maxlength:30,
                        required: true	
                    },
                    source_content: {
                        minlength: 2,
						maxlength:32,
                        required: true
                    },
					 name: {
						minlength: 2,
						maxlength:20,
                        required: true
                    },
                    mobile_phone: {
                        required: true,
                       	minlength: 11,
						maxlength:11,
					  	digits:true
                    },
					phone: {
                        required: true,
                       	minlength: 6,
						maxlength:15,
                    },
					fax : {
                        required: true,
                       	minlength: 6,
						maxlength:15,
                    },
					qq : {
                        required: true,
                       	minlength: 4,
						maxlength:15,
						digits:true
                    },
					identity_number : {
                        required: true,
                       	minlength: 15,
						maxlength:18,
                    },
					passport_number : {
						maxlength:10,
					},
					driving_number : {
						required: true,
						maxlength:20,
					},
					travel_number	: {
						required: true,
						maxlength:20,
					},
					email : {
						email:true
					},
					registered_fund :{
						digits:true
					},
					turnover :{
						digits:true
					},
					website : {
						url:true
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
                    form.submit();		//提交表单
                }
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
			
			
			//搜索用户
			(function ($) {
				var btn_search = $('#btn_search');					//搜索账号
				var select_member  = $('#select_member');		//用户选择框
				var ipt_content = $('#ipt_content');					//搜索框内容
				
				//查找用户数据
				btn_search.click(function () {
					var val = ipt_content.val();
					if (val == '') {
						alert('查询内容不得为空！');
						return false;
					}
					
					$.post('?s=/Admin/Rank/ajax_search_account',{
						account:val	
					},function(result){
						select_member.empty();	//清空
						select_member.append('<option value="">--请选择用户--</option>');
						if (result.status == 0) {	
							alert('找到'+result.data.length+'条相似数据');
							for(var key in result.data){
								select_member.append("<option value="+result.data[key].id+">"+result.data[key].account+"--"+result.data[key].nickname+"</option>");
							}
						} else {
							alert('没有查找到指定数据！');
						}						
					},'json');	
					
				});
			})(jQuery);

        }
		
    };

}();