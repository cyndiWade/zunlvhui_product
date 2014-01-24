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
                     
                     estimate_over : {
                    	 required: true,
                       //  dateISO:true
                     },
                     
                     over : {
                         required: true,
                          dateISO:true
                      },	
                      
                      length : {
                          required: true,
                          digits:true
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
                    form.submit();		//提交表单
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
            
            
            (function () {
				
				/* 日期选择 */	
				var start_date_obj = $('input[name=start]')										//用车开始日期日期
				var estimate_over_obj = $('input[name=estimate_over]');					//预计还车日期
				var member_base_obj = $('input[name=member_base_id]');				//会员ID
				var over_date_obj = $('#over_date');													//会员到期日期
				var available_cars_container_obj = $('#available_cars_container');	//可用车型容器
				var driver_price_obj = $('#driver_price');											//司机价格
				var ipt_need_driver = $('#ipt_need_driver');										//是否需要司机选择框

				/* 计算函数 */
				var demand_usable_cars = function (start_date,estimate_over,over_date) {

					var start_timestamp = fomat_date(start_date);					//开始用车日期
					var estimate_timestamp = fomat_date(estimate_over);		//预计结束用车日期
					var over_timestamp = fomat_date(over_date);					//会员到期日期

					//用车日期大于会员过期日期
					if (start_timestamp > over_timestamp) {
						return false;	
					} ;
					var result = ajax_post_setup('?s=/Admin/CarsSchedule/AJAX_Get_Usable_Cars',{
						'member_base_id' : member_base_obj.val(),
						'start_schedule_time' : start_date,
						'over_schedule_time' : estimate_over
						}
					);
					return result;
					
				};
			
				
				/* 点击查询车辆 */
				$('.demand').click(function () {
			        var btn = $(this)
			      //  btn.button('loading');

			        var result = demand_usable_cars(start_date_obj.val(),estimate_over_obj.val(),over_date_obj.text());
			      //  alert(result);
			     //   return false;
			       // console.log(result.data);
			        
			        if (result == false) {
						alert('服务器连接超时');
						btn.button('reset')
					
					} else if (result.status == 0) {
						available_cars_container_obj.empty();
						for (var obj in result.data) {
							available_cars_container_obj.append(
								'<label class="radio line">'+
								'<input type="radio" name="cars_id" value='+result.data[obj].id+' />' +
								'车辆品牌('+result.data[obj].brand+')<span class="required"> | </span>' + 
								'车辆类型('+result.data[obj].type+')<span class="required"> | </span>' + 
								'车辆型号('+result.data[obj].model+')<span class="required"> | </span>' + 
								'车辆颜色('+result.data[obj].color+')<span class="required"> | </span>' + 		
								'座位数('+result.data[obj].seat_num+')<span class="required"> | </span>' +
								'耗油量[升/百公里]('+result.data[obj].consumption+')<span class="required"> | </span>' +
								'初始公里数('+result.data[obj].initial_km+')' +
								'</label>'	
							);
						}	
						App.init();
						btn.button('reset');
					} else {
						available_cars_container_obj.empty();
						alert(result.msg);
						btn.button('reset');
					}
			   	});
			
				
				driver_price_set = function (obj) {
					if (obj.val() > 0) {		//需要
						driver_price_obj.css({'display':'block'});
					} else {							//不需要
						driver_price_obj.find('select').val(0);		//不需要时重置价格为0
						driver_price_obj.css({'display':'none'});
					}
				}
			
				//初始化
				driver_price_init = function () {
					driver_price_set(ipt_need_driver)
				}();
				
				/* 选择司机价格 */
				ipt_need_driver.change(function () {
					driver_price_set(ipt_need_driver);
				});
					
				
				wade_bootstrap_date('.bootstrap_date_fn').bootstrap_date_fn(function () {
					
				});
				
			
				
				
			
			})();

        }

    };

}();