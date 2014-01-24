var FormValidation = function () {


    return {
        //main function to initiate the module
        init: function () {

        	
        	$.ajaxSetup({
    			async: false,//async:false 同步请求  true为异步请求
            });
        	
        	  /**
             * 权限验证
             */
            (function () {
            	
                /* AJAX请求 */
                var ajax_post = function ($url,$parameter) {
                	var result = 0;
                	//提交的地址，post传入的参数
                	$.post($url,$parameter,function(obj){
                		result = obj.status;		
                	},'json');
                	return result;
                }
                
                /* AJAX请求 */
                var tab = $('#wade_tab li');
                var base_url = '?s=/Admin/Staff/';
                var arr_content = $('')
                tab.click(function () {
                	var stauts = false;
                	var _this = $(this);
                	var url_action = base_url+_this.data('action');
                	/* 权限验证 */
                	var result = ajax_post(url_action,{});
                	if (result == 3001) {
                		stauts = true;
                	} else {
                		alert('没有权限');
                	}
                	return stauts;
                	
                });
            })();
            
            /**
             * 联动菜单
             */
            (function () {
            	var company = $('#company');		//区域
            	var department = $('#department');	//部门
            	var occupation = $('#occupation');	//职位
            	var url = '?s=/Admin/Staff/ajax_get_info/';		//请求URL
            	
            	/**
            	 * 根据不同的请求获取相应的表数据
            	 */
            	var change_fn = function ($obj,$this) {     
            		var _this = $this;
            		$.post(url,{
            			'table' : _this.data('table'),
            			'id' : _this.val()
            		},function(obj){
            			$obj.append("<option value=''>--请选择--</option>");
            			if (obj.status == 0) {
            				$.each(obj.data,function (i) {
            					$obj.append("<option value="+obj.data[i].id+">"+obj.data[i].name+"</option>");
            				});
            			} else {
            				alert(obj.msg);
            			}
                	},'json');
            	}
            	
            	
            	company.change(function () {
            		department.empty();	//清空多余节点
            		change_fn(department,$(this));
            	});
            	
            	department.change(function () {
            		occupation.empty();	//清空多余节点
            		change_fn(occupation,$(this));
            	});
            	
            })();
            
        	
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
                	jobs: {
                    	required: true,
                        minlength: 2,
                        maxlength:20
                    },
                    name: {
                    	required: true,
                        minlength: 2,
                        maxlength:50   
                    },
                    name_en: {
                    	required: true,
                        minlength: 2,
                        maxlength:50   
                    },
                    identity: {
                    	required: true,
                    	minlength:15, 
                    	maxlength:18
                    },
                    birthday: {
                    	dateISO:true
                    },
                    email: {
                    	email:true 
                    },
                    
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
            
            /**
             * 身份证件号码提取生日
             */
            (function () {
            	var ipt_identity = $('input[name=identity]');			//证件号码
            	var ipt_birthday = $('input[name=birthday]');		//生日
            	ipt_identity.blur(function () {
            		var str_lenght = this.value.length;
            		
            		if (str_lenght == 18) {
            			var year = this.value.substr(6,4);
            			var month = this.value.substr(10,2);
            			var day = this.value.substr(12,2);
            			var birthday = year+'-'+month+'-'+day;
            			ipt_birthday.val(birthday);
            		} else if (str_lenght == 15) {
            			var year = this.value.substr(6,2);
            			var month = this.value.substr(8,2);
            			var day = this.value.substr(10,2);
            			var birthday = '19' + year+'-'+month+'-'+day;
            			ipt_birthday.val(birthday);
            		} 
            	});
            })();
            
            

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

        }

    };

}();