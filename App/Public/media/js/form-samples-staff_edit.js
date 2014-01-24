var FormSamples = function () {


    return {
        //main function to initiate the module
        init: function () {

            // use select2 dropdown instead of chosen as select2 works fine with bootstrap on responsive layouts.
            $('.select2_category').select2({
	            placeholder: "Select an option",
	            allowClear: true
	        });

            $('.select2_sample1').select2({
                placeholder: "Select a State",
                allowClear: true
            });

            $(".select2_sample2").select2({
                placeholder: "Type to select an option",
                allowClear: true,
                minimumInputLength: 1,
                query: function (query) {
                    var data = {
                        results: []
                    }, i, j, s;
                    for (i = 1; i < 5; i++) {
                        s = "";
                        for (j = 0; j < i; j++) {
                            s = s + query.term;
                        }
                        data.results.push({
                            id: query.term + i,
                            text: s
                        });
                    }
                    query.callback(data);
                }
            });

            $(".select2_sample3").select2({
                tags: ["red", "green", "blue", "yellow", "pink"]
            });
            
            
            //表单验证第一个
            var form1 = $('#wade-validate-from1');
            var error1 = $('.alert-error', form1);
            var success1 = $('.alert-success', form1);
            form1.validate({
                errorElement: 'span', //default input error message container
                errorClass: 'help-inline', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",
                rules: {
                    name: {
                        minlength: 2,
                        required: true
                    },
                },
                	
                //验证
                invalidHandler: function (event, validator) { //display error alert on form submit         
                    success1.hide();
                    error1.show();
                    return false;
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

                //验证成功提交表单
                submitHandler: function (form) {
                    success1.show();
                    error1.hide();
                   form.submit();		//提交表单
                }
            });
            
            
            //表单验证第二个
            var form2 = $('#wade-validate-from2');
            var error2 = $('.alert-error', form2);
            var success2 = $('.alert-success', form2);

            form2.validate({
                errorElement: 'span', //default input error message container
                errorClass: 'help-inline', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",
                rules: {
                    name: {
                        minlength: 2,
                        required: true
                    },
                },
                	
                //验证
                invalidHandler: function (event, validator) { //display error alert on form submit         
                    success2.hide();
                    error2.show();
                    return false;
                    App.scrollTo(error2, -200);
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

                //验证成功提交表单
                submitHandler: function (form) {
                    success2.show();
                    error2.hide();
                    form.submit();		//提交表单
                }
            });
            
 
            
            /**
             * 权限验证
             */
            (function () {
            	$.ajaxSetup({
        			async: false,//async:false 同步请求  true为异步请求
                });
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

        }

    };

}();