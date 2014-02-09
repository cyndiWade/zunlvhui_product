<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
	<!-- 全局样式 -->		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /> 
	<title>管理系统</title>
	<meta content="width=device-width, initial-scale=1.0" name="viewport" />

	<meta content="" name="description" />

	<meta content="" name="author" />

	<!-- BEGIN GLOBAL MANDATORY STYLES -->

	<link href="<?php echo (APP_PATH); ?>Public/media/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>

	<link href="<?php echo (APP_PATH); ?>Public/media/css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css"/>

	<link href="<?php echo (APP_PATH); ?>Public/media/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>

	<link href="<?php echo (APP_PATH); ?>Public/media/css/style-metro.css" rel="stylesheet" type="text/css"/>

	<link href="<?php echo (APP_PATH); ?>Public/media/css/style.css" rel="stylesheet" type="text/css"/>

	<link href="<?php echo (APP_PATH); ?>Public/media/css/style-responsive.css" rel="stylesheet" type="text/css"/>

	<link href="<?php echo (APP_PATH); ?>Public/media/css/default.css" rel="stylesheet" type="text/css" id="style_color"/>

	<link href="<?php echo (APP_PATH); ?>Public/media/css/uniform.default.css" rel="stylesheet" type="text/css"/>
	
	<link href="<?php echo (APP_PATH); ?>Public/media/css/flick/jquery-ui-1.10.3.custom.css" rel="stylesheet" type="text/css" />

	<link href="<?php echo (APP_PATH); ?>Public/media/css/datetimepicker.css" rel="stylesheet" type="text/css" />

	<!-- END GLOBAL MANDATORY STYLES -->

	<link rel="shortcut icon" href="<?php echo (APP_PATH); ?>Public/media/image/favicon.ico" />
	
	<style type="text/css">
		.required {
			color:red;
		}
	</style>
	

	<!-- BEGIN PAGE LEVEL STYLES -->
	<link href="<?php echo (APP_PATH); ?>Public/media/css/bootstrap-fileupload.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo (APP_PATH); ?>Public/media/css/chosen.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo (APP_PATH); ?>Public/media/css/profile.css" rel="stylesheet" type="text/css" />
	<!-- END PAGE LEVEL STYLES -->
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="page-header-fixed">
		<!-- BEGIN  头部-->
	<div class="header navbar navbar-inverse navbar-fixed-top">

		<!-- BEGIN TOP NAVIGATION BAR -->

		<div class="navbar-inner">

			<div class="container-fluid">

				<!-- BEGIN LOGO -->

				<a class="brand" href="javascript:;">

					<img src="<?php echo (APP_PATH); ?>Public/media/image/logo.png" alt="尊旅会"/>

				</a>

				<!-- END LOGO -->

				<!-- BEGIN RESPONSIVE MENU TOGGLER -->

				<a href="javascript:;" class="btn-navbar collapsed" data-toggle="collapse" data-target=".nav-collapse">

				<img src="<?php echo (APP_PATH); ?>Public/media/image/menu-toggler.png" alt="" />

				</a>          

				<!-- END RESPONSIVE MENU TOGGLER -->            

				<!-- BEGIN TOP NAVIGATION MENU -->              

				<ul class="nav pull-right">

					<!-- BEGIN NOTIFICATION DROPDOWN -->   
					<!-- 
					<li class="dropdown" id="header_notification_bar">

						<a href="#" class="dropdown-toggle" data-toggle="dropdown">

						<i class="icon-warning-sign"></i>

						<span class="badge">6</span>

						</a>

						<ul class="dropdown-menu extended notification">

							<li>

								<p>You have 14 new notifications</p>

							</li>

							<li>

								<a href="#">

								<span class="label label-success"><i class="icon-plus"></i></span>

								New user registered. 

								<span class="time">Just now</span>

								</a>

							</li>

							<li>

								<a href="#">

								<span class="label label-important"><i class="icon-bolt"></i></span>

								Server #12 overloaded. 

								<span class="time">15 mins</span>

								</a>

							</li>

							<li>

								<a href="#">

								<span class="label label-warning"><i class="icon-bell"></i></span>

								Server #2 not respoding.

								<span class="time">22 mins</span>

								</a>

							</li>

							<li>

								<a href="#">

								<span class="label label-info"><i class="icon-bullhorn"></i></span>

								Application error.

								<span class="time">40 mins</span>

								</a>

							</li>

							<li>

								<a href="#">

								<span class="label label-important"><i class="icon-bolt"></i></span>

								Database overloaded 68%. 

								<span class="time">2 hrs</span>

								</a>

							</li>

							<li>

								<a href="#">

								<span class="label label-important"><i class="icon-bolt"></i></span>

								2 user IP blocked.

								<span class="time">5 hrs</span>

								</a>

							</li>

							<li class="external">

								<a href="#">See all notifications <i class="m-icon-swapright"></i></a>

							</li>

						</ul>

					</li>
					-->
					<!-- END NOTIFICATION DROPDOWN -->
					
					
					<!-- BEGIN INBOX DROPDOWN -->
<!-- 
					<li class="dropdown" id="header_inbox_bar">

						<a href="#" class="dropdown-toggle" data-toggle="dropdown">

						<i class="icon-envelope"></i>

						<span class="badge">5</span>

						</a>

						<ul class="dropdown-menu extended inbox">

							<li>

								<p>你有12条新的系统消息</p>

							</li>

							<li>

								<a href="#inbox.html?a=view">

								<span class="photo"><img src="<?php echo (APP_PATH); ?>Public/media/image/avatar2.jpg" alt="" /></span>

								<span class="subject">

								<span class="from">Lisa Wong</span>

								<span class="time">Just Now</span>

								</span>

								<span class="message">

								Vivamus sed auctor nibh congue nibh. auctor nibh

								auctor nibh...

								</span>  

								</a>

							</li>

							<li>

								<a href="#inbox.html?a=view">

								<span class="photo"><img src="<?php echo (APP_PATH); ?>Public/media/image/avatar3.jpg" alt="" /></span>

								<span class="subject">

								<span class="from">Richard Doe</span>

								<span class="time">16 mins</span>

								</span>

								<span class="message">

								Vivamus sed congue nibh auctor nibh congue nibh. auctor nibh

								auctor nibh...

								</span>  

								</a>

							</li>

							<li>

								<a href="#inbox.html?a=view">

								<span class="photo"><img src="<?php echo (APP_PATH); ?>Public/media/image/avatar1.jpg" alt="" /></span>

								<span class="subject">

								<span class="from">Bob Nilson</span>

								<span class="time">2 hrs</span>

								</span>

								<span class="message">

								Vivamus sed nibh auctor nibh congue nibh. auctor nibh

								auctor nibh...

								</span>  

								</a>

							</li>

							<li class="external">

								<a href="#inbox.html">See all messages <i class="m-icon-swapright"></i></a>

							</li>

						</ul>

					</li>
-->
					<!-- END INBOX DROPDOWN -->

					<!-- BEGIN TODO DROPDOWN -->
<!--
					<li class="dropdown" id="header_task_bar">

						<a href="#" class="dropdown-toggle" data-toggle="dropdown">

						<i class="icon-tasks"></i>

						<span class="badge">5</span>

						</a>

						<ul class="dropdown-menu extended tasks">

							<li>

								<p>You have 12 pending tasks</p>

							</li>

							<li>

								<a href="#">

								<span class="task">

								<span class="desc">New release v1.2</span>

								<span class="percent">30%</span>

								</span>

								<span class="progress progress-success ">

								<span style="width: 30%;" class="bar"></span>

								</span>

								</a>

							</li>

							<li>

								<a href="#">

								<span class="task">

								<span class="desc">Application deployment</span>

								<span class="percent">65%</span>

								</span>

								<span class="progress progress-danger progress-striped active">

								<span style="width: 65%;" class="bar"></span>

								</span>

								</a>

							</li>

							<li>

								<a href="#">

								<span class="task">

								<span class="desc">Mobile app release</span>

								<span class="percent">98%</span>

								</span>

								<span class="progress progress-success">

								<span style="width: 98%;" class="bar"></span>

								</span>

								</a>

							</li>

							<li>

								<a href="#">

								<span class="task">

								<span class="desc">Database migration</span>

								<span class="percent">10%</span>

								</span>

								<span class="progress progress-warning progress-striped">

								<span style="width: 10%;" class="bar"></span>

								</span>

								</a>

							</li>

							<li>

								<a href="#">

								<span class="task">

								<span class="desc">Web server upgrade</span>

								<span class="percent">58%</span>

								</span>

								<span class="progress progress-info">

								<span style="width: 58%;" class="bar"></span>

								</span>

								</a>

							</li>

							<li>

								<a href="#">

								<span class="task">

								<span class="desc">Mobile development</span>

								<span class="percent">85%</span>

								</span>

								<span class="progress progress-success">

								<span style="width: 85%;" class="bar"></span>

								</span>

								</a>

							</li>

							<li class="external">

								<a href="#">See all tasks <i class="m-icon-swapright"></i></a>

							</li>

						</ul>

					</li>
-->
					<!-- END TODO DROPDOWN -->

					<!-- BEGIN USER LOGIN DROPDOWN -->

					<li class="dropdown user">

						<a href="#" class="dropdown-toggle" data-toggle="dropdown">

						<img alt="" src="<?php echo (APP_PATH); ?>Public/media/image/avatar1_small.jpg" />

						<span class="username"><?php echo ($global_tpl_view["user_info"]["nickname"]); ?></span>

						<i class="icon-angle-down"></i>

						</a>

						<ul class="dropdown-menu">
							<!-- 
							<li><a href="extra_profile.html"><i class="icon-user"></i> My Profile</a></li>

							<li><a href="page_calendar.html"><i class="icon-calendar"></i> My Calendar</a></li>

							<li><a href="inbox.html"><i class="icon-envelope"></i> My Inbox(3)</a></li>

							<li><a href="#"><i class="icon-tasks"></i> My Tasks</a></li>

							<li class="divider"></li>

							<li><a href="extra_lock.html"><i class="icon-lock"></i> Lock Screen</a></li>
							-->
							<li><a href="<?php echo U('Admin/Login/logout');?>"><i class="icon-key"></i>退出登陆</a></li>
							

						</ul>

					</li>

					<!-- END USER LOGIN DROPDOWN -->

				</ul>

				<!-- END TOP NAVIGATION MENU --> 

			</div>

		</div>

		<!-- END TOP NAVIGATION BAR -->

	</div>
	<!-- END 头部 -->	
	<!-- BEGIN CONTAINER -->   
	<div class="page-container row-fluid">
		<!-- 左侧导航 -->		<!-- BEGIN SIDEBAR -->

		<div class="page-sidebar nav-collapse collapse">

			<!-- BEGIN SIDEBAR MENU -->        

			<ul class="page-sidebar-menu wade_menu">

				<li>

					<!-- BEGIN SIDEBAR TOGGLER BUTTON -->

					<div class="sidebar-toggler hidden-phone"></div>
  
					<!-- BEGIN SIDEBAR TOGGLER BUTTON -->

				</li>
	
				<li class="">
					<a href="javascript:;">

					<i class="icon-coffee"></i> 

					<span class="title">个人中心</span>

					<span class="arrow "></span>

					</a>

					<ul class="sub-menu">
						<li >
							<a href="<?php echo U('Admin/User/personal');?>">

							</i>

							个人信息</a>

						</li>

					</ul>
				</li>
	
				<li class="">
					<a href="javascript:;">
					<i class="icon-cogs"></i>
					<span class="title">系统管理</span>
					<span class="arrow "></span>
					</a>
					<ul class="sub-menu">
						<li >
							<a href="<?php echo U('Admin/User/index');?>">
							用户管理</a>
						</li>
						<li >
							<a href="<?php echo U('Admin/Rbac/rbac_node',array('pid'=>0));?>">
							节点管理</a>
						</li>
						<li >
							<a href="<?php echo U('Admin/Rbac/group');?>">
							分配管理</a>
						</li>
						<!--
						<li >
							<a href="<?php echo U('Admin/Rbac/group_node');?>">
							组权限</a>
						</li>
						 -->
					</ul>
				</li>
				
				<!--
				<li class="">

					<a href="javascript:;">

					<i class="icon-th"></i> 

					<span class="title">数据表</span>

					<span class="arrow "></span>

					</a>

					<ul class="sub-menu">

						<li >

							<a href="?s=/Admin/Table/table_basic.html">

							基本表</a>

						</li>

						<li >

							<a href="?s=/Admin/Table/table_responsive.html">

							响应表</a>

						</li>

						<li >

							<a href="?s=/Admin/Table/table_managed.html">

							管理表</a>

						</li>

						<li >

							<a href="?s=/Admin/Table/table_editable.html">

							可编辑表格</a>

						</li>

						<li >

							<a href="?s=/Admin/Table/table_advanced.html">

							高级表</a>

						</li>

					</ul>
		
				</li>
				 -->

			</ul>

			
		<!-- END SIDEBAR MENU -->
		</div>

		<!-- END SIDEBAR -->		
		<!-- BEGIN PAGE -->
		<div class="page-content">
			<!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			<div id="portlet-config" class="modal hide">
				<div class="modal-header">
					<button data-dismiss="modal" class="close" type="button"></button>
					<h3>portlet Settings</h3>
				</div>
				<div class="modal-body">
					<p>Here will be a configuration form</p>
				</div>
			</div>
			<!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			<!-- BEGIN PAGE CONTAINER-->
			<div class="container-fluid">
				<!-- BEGIN PAGE HEADER-->
				<div class="row-fluid">
					<div class="span12">					
						<h3 class="page-title">
							用户信息 <small>用户信息显示</small>
						</h3>
						
					</div>
				</div>
				<!-- END PAGE HEADER-->
				<!-- BEGIN PAGE CONTENT-->
				<div class="row-fluid profile">
					<div class="span12">
						<!--BEGIN TABS-->
						<div class="tabbable tabbable-custom tabbable-full-width">
							<ul class="nav nav-tabs">
								<!-- <li class="active"><a href="#tab_1_1" data-toggle="tab">Overview</a></li> -->
								<li><a href="#tab_1_1" data-toggle="tab">个人信息</a></li>
								<li><a href="#tab_1_3" data-toggle="tab">信息设置</a></li>
								<!-- <li><a href="#tab_1_4" data-toggle="tab">Projects</a></li>
								<li><a href="#tab_1_6" data-toggle="tab">Help</a></li> -->
							</ul>
							<div class="tab-content">
								<div class="tab-pane row-fluid " id="tab_1_2">
									<ul class="unstyled profile-nav span3">
										<li><img src="<?php echo (APP_PATH); ?>Public/media/image/profile-img.png" alt="" /> <a href="#" class="profile-edit">edit</a></li>										
										<li><a href="#">Projects</a></li>
										<li><a href="#">Messages <span>3</span></a></li>
										<li><a href="#">Friends</a></li>
										<li><a href="#">Settings</a></li>
									</ul>
									<div class="span9">
										<div class="row-fluid">
											<div class="span8 profile-info">
												<h1>John Doe</h1>
												<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt laoreet dolore magna aliquam tincidunt erat volutpat laoreet dolore magna aliquam tincidunt erat volutpat.</p>
												<p><a href="#">www.mywebsite.com</a></p>
												<ul class="unstyled inline">
													<li><i class="icon-map-marker"></i> Spain</li>
													<li><i class="icon-calendar"></i> 18 Jan 1982</li>
													<li><i class="icon-briefcase"></i> Design</li>
													<li><i class="icon-star"></i> Top Seller</li>
													<li><i class="icon-heart"></i> BASE Jumping</li>
												</ul>
											</div>
											<!--end span8-->
											<div class="span4">
												<div class="portlet sale-summary">
													<div class="portlet-title">
														<div class="caption">Sales Summary</div>
														<div class="tools">
															<a class="reload" href="javascript:;"></a>
														</div>
													</div>
													<ul class="unstyled">
														<li>
															<span class="sale-info">TODAY SOLD <i class="icon-img-up"></i></span> 
															<span class="sale-num">23</span>
														</li>
														<li>
															<span class="sale-info">WEEKLY SALES <i class="icon-img-down"></i></span> 
															<span class="sale-num">87</span>
														</li>
														<li>
															<span class="sale-info">TOTAL SOLD</span> 
															<span class="sale-num">2377</span>
														</li>
														<li>
															<span class="sale-info">EARNS</span> 
															<span class="sale-num">$37.990</span>
														</li>
													</ul>
												</div>
											</div>
											<!--end span4-->
										</div>
										<!--end row-fluid-->
										<div class="tabbable tabbable-custom tabbable-custom-profile">
											<ul class="nav nav-tabs">
												<li class="active"><a href="#tab_1_11" data-toggle="tab">Latest Customers</a></li>
												<li class=""><a href="#tab_1_22" data-toggle="tab">Feeds</a></li>
											</ul>
											<div class="tab-content">
												<div class="tab-pane active" id="tab_1_11">
													<div class="portlet-body" style="display: block;">
														<table class="table table-striped table-bordered table-advance table-hover">
															<thead>
																<tr>
																	<th><i class="icon-briefcase"></i> Company</th>
																	<th class="hidden-phone"><i class="icon-question-sign"></i> Descrition</th>
																	<th><i class="icon-bookmark"></i> Amount</th>
																	<th></th>
																</tr>
															</thead>
															<tbody>
																<tr>
																	<td><a href="#">Pixel Ltd</a></td>
																	<td class="hidden-phone">Server hardware purchase</td>
																	<td>52560.10$ <span class="label label-success label-mini">Paid</span></td>
																	<td><a class="btn mini green-stripe" href="#">View</a></td>
																</tr>
																<tr>
																	<td>
																		<a href="#">
																		Smart House
																		</a>  
																	</td>
																	<td class="hidden-phone">Office furniture purchase</td>
																	<td>5760.00$ <span class="label label-warning label-mini">Pending</span></td>
																	<td><a class="btn mini blue-stripe" href="#">View</a></td>
																</tr>
																<tr>
																	<td>
																		<a href="#">
																		FoodMaster Ltd
																		</a>
																	</td>
																	<td class="hidden-phone">Company Anual Dinner Catering</td>
																	<td>12400.00$ <span class="label label-success label-mini">Paid</span></td>
																	<td><a class="btn mini blue-stripe" href="#">View</a></td>
																</tr>
																<tr>
																	<td>
																		<a href="#">
																		WaterPure Ltd
																		</a>
																	</td>
																	<td class="hidden-phone">Payment for Jan 2013</td>
																	<td>610.50$ <span class="label label-danger label-mini">Overdue</span></td>
																	<td><a class="btn mini red-stripe" href="#">View</a></td>
																</tr>
																<tr>
																	<td><a href="#">Pixel Ltd</a></td>
																	<td class="hidden-phone">Server hardware purchase</td>
																	<td>52560.10$ <span class="label label-success label-mini">Paid</span></td>
																	<td><a class="btn mini green-stripe" href="#">View</a></td>
																</tr>
																<tr>
																	<td>
																		<a href="#">
																		Smart House
																		</a>  
																	</td>
																	<td class="hidden-phone">Office furniture purchase</td>
																	<td>5760.00$ <span class="label label-warning label-mini">Pending</span></td>
																	<td><a class="btn mini blue-stripe" href="#">View</a></td>
																</tr>
																<tr>
																	<td>
																		<a href="#">
																		FoodMaster Ltd
																		</a>
																	</td>
																	<td class="hidden-phone">Company Anual Dinner Catering</td>
																	<td>12400.00$ <span class="label label-success label-mini">Paid</span></td>
																	<td><a class="btn mini blue-stripe" href="#">View</a></td>
																</tr>
															</tbody>
														</table>
													</div>
												</div>
												<!--tab-pane-->
												<div class="tab-pane" id="tab_1_22">
													<div class="tab-pane active" id="tab_1_1_1">
														<div class="scroller" data-height="290px" data-always-visible="1" data-rail-visible1="1">
															<ul class="feeds">
																<li>
																	<div class="col1">
																		<div class="cont">
																			<div class="cont-col1">
																				<div class="label label-success">                        
																					<i class="icon-bell"></i>
																				</div>
																			</div>
																			<div class="cont-col2">
																				<div class="desc">
																					You have 4 pending tasks.
																					<span class="label label-important label-mini">
																					Take action 
																					<i class="icon-share-alt"></i>
																					</span>
																				</div>
																			</div>
																		</div>
																	</div>
																	<div class="col2">
																		<div class="date">
																			Just now
																		</div>
																	</div>
																</li>
																<li>
																	<a href="#">
																		<div class="col1">
																			<div class="cont">
																				<div class="cont-col1">
																					<div class="label label-success">                        
																						<i class="icon-bell"></i>
																					</div>
																				</div>
																				<div class="cont-col2">
																					<div class="desc">
																						New version v1.4 just lunched!   
																					</div>
																				</div>
																			</div>
																		</div>
																		<div class="col2">
																			<div class="date">
																				20 mins
																			</div>
																		</div>
																	</a>
																</li>
																<li>
																	<div class="col1">
																		<div class="cont">
																			<div class="cont-col1">
																				<div class="label label-important">                      
																					<i class="icon-bolt"></i>
																				</div>
																			</div>
																			<div class="cont-col2">
																				<div class="desc">
																					Database server #12 overloaded. Please fix the issue.                      
																				</div>
																			</div>
																		</div>
																	</div>
																	<div class="col2">
																		<div class="date">
																			24 mins
																		</div>
																	</div>
																</li>
																<li>
																	<div class="col1">
																		<div class="cont">
																			<div class="cont-col1">
																				<div class="label label-info">                        
																					<i class="icon-bullhorn"></i>
																				</div>
																			</div>
																			<div class="cont-col2">
																				<div class="desc">
																					New order received. Please take care of it.                 
																				</div>
																			</div>
																		</div>
																	</div>
																	<div class="col2">
																		<div class="date">
																			30 mins
																		</div>
																	</div>
																</li>
																<li>
																	<div class="col1">
																		<div class="cont">
																			<div class="cont-col1">
																				<div class="label label-success">                        
																					<i class="icon-bullhorn"></i>
																				</div>
																			</div>
																			<div class="cont-col2">
																				<div class="desc">
																					New order received. Please take care of it.                 
																				</div>
																			</div>
																		</div>
																	</div>
																	<div class="col2">
																		<div class="date">
																			40 mins
																		</div>
																	</div>
																</li>
																<li>
																	<div class="col1">
																		<div class="cont">
																			<div class="cont-col1">
																				<div class="label label-warning">                        
																					<i class="icon-plus"></i>
																				</div>
																			</div>
																			<div class="cont-col2">
																				<div class="desc">
																					New user registered.                
																				</div>
																			</div>
																		</div>
																	</div>
																	<div class="col2">
																		<div class="date">
																			1.5 hours
																		</div>
																	</div>
																</li>
																<li>
																	<div class="col1">
																		<div class="cont">
																			<div class="cont-col1">
																				<div class="label label-success">                        
																					<i class="icon-bell-alt"></i>
																				</div>
																			</div>
																			<div class="cont-col2">
																				<div class="desc">
																					Web server hardware needs to be upgraded. 
																					<span class="label label-inverse label-mini">Overdue</span>             
																				</div>
																			</div>
																		</div>
																	</div>
																	<div class="col2">
																		<div class="date">
																			2 hours
																		</div>
																	</div>
																</li>
																<li>
																	<div class="col1">
																		<div class="cont">
																			<div class="cont-col1">
																				<div class="label">                       
																					<i class="icon-bullhorn"></i>
																				</div>
																			</div>
																			<div class="cont-col2">
																				<div class="desc">
																					New order received. Please take care of it.                 
																				</div>
																			</div>
																		</div>
																	</div>
																	<div class="col2">
																		<div class="date">
																			3 hours
																		</div>
																	</div>
																</li>
																<li>
																	<div class="col1">
																		<div class="cont">
																			<div class="cont-col1">
																				<div class="label label-warning">                        
																					<i class="icon-bullhorn"></i>
																				</div>
																			</div>
																			<div class="cont-col2">
																				<div class="desc">
																					New order received. Please take care of it.                 
																				</div>
																			</div>
																		</div>
																	</div>
																	<div class="col2">
																		<div class="date">
																			5 hours
																		</div>
																	</div>
																</li>
																<li>
																	<div class="col1">
																		<div class="cont">
																			<div class="cont-col1">
																				<div class="label label-info">                        
																					<i class="icon-bullhorn"></i>
																				</div>
																			</div>
																			<div class="cont-col2">
																				<div class="desc">
																					New order received. Please take care of it.                 
																				</div>
																			</div>
																		</div>
																	</div>
																	<div class="col2">
																		<div class="date">
																			18 hours
																		</div>
																	</div>
																</li>
																<li>
																	<div class="col1">
																		<div class="cont">
																			<div class="cont-col1">
																				<div class="label">                       
																					<i class="icon-bullhorn"></i>
																				</div>
																			</div>
																			<div class="cont-col2">
																				<div class="desc">
																					New order received. Please take care of it.                 
																				</div>
																			</div>
																		</div>
																	</div>
																	<div class="col2">
																		<div class="date">
																			21 hours
																		</div>
																	</div>
																</li>
																<li>
																	<div class="col1">
																		<div class="cont">
																			<div class="cont-col1">
																				<div class="label label-info">                        
																					<i class="icon-bullhorn"></i>
																				</div>
																			</div>
																			<div class="cont-col2">
																				<div class="desc">
																					New order received. Please take care of it.                 
																				</div>
																			</div>
																		</div>
																	</div>
																	<div class="col2">
																		<div class="date">
																			22 hours
																		</div>
																	</div>
																</li>
																<li>
																	<div class="col1">
																		<div class="cont">
																			<div class="cont-col1">
																				<div class="label">                       
																					<i class="icon-bullhorn"></i>
																				</div>
																			</div>
																			<div class="cont-col2">
																				<div class="desc">
																					New order received. Please take care of it.                 
																				</div>
																			</div>
																		</div>
																	</div>
																	<div class="col2">
																		<div class="date">
																			21 hours
																		</div>
																	</div>
																</li>
																<li>
																	<div class="col1">
																		<div class="cont">
																			<div class="cont-col1">
																				<div class="label label-info">                        
																					<i class="icon-bullhorn"></i>
																				</div>
																			</div>
																			<div class="cont-col2">
																				<div class="desc">
																					New order received. Please take care of it.                 
																				</div>
																			</div>
																		</div>
																	</div>
																	<div class="col2">
																		<div class="date">
																			22 hours
																		</div>
																	</div>
																</li>
																<li>
																	<div class="col1">
																		<div class="cont">
																			<div class="cont-col1">
																				<div class="label">                       
																					<i class="icon-bullhorn"></i>
																				</div>
																			</div>
																			<div class="cont-col2">
																				<div class="desc">
																					New order received. Please take care of it.                 
																				</div>
																			</div>
																		</div>
																	</div>
																	<div class="col2">
																		<div class="date">
																			21 hours
																		</div>
																	</div>
																</li>
																<li>
																	<div class="col1">
																		<div class="cont">
																			<div class="cont-col1">
																				<div class="label label-info">                        
																					<i class="icon-bullhorn"></i>
																				</div>
																			</div>
																			<div class="cont-col2">
																				<div class="desc">
																					New order received. Please take care of it.                 
																				</div>
																			</div>
																		</div>
																	</div>
																	<div class="col2">
																		<div class="date">
																			22 hours
																		</div>
																	</div>
																</li>
																<li>
																	<div class="col1">
																		<div class="cont">
																			<div class="cont-col1">
																				<div class="label">                       
																					<i class="icon-bullhorn"></i>
																				</div>
																			</div>
																			<div class="cont-col2">
																				<div class="desc">
																					New order received. Please take care of it.                 
																				</div>
																			</div>
																		</div>
																	</div>
																	<div class="col2">
																		<div class="date">
																			21 hours
																		</div>
																	</div>
																</li>
																<li>
																	<div class="col1">
																		<div class="cont">
																			<div class="cont-col1">
																				<div class="label label-info">                        
																					<i class="icon-bullhorn"></i>
																				</div>
																			</div>
																			<div class="cont-col2">
																				<div class="desc">
																					New order received. Please take care of it.                 
																				</div>
																			</div>
																		</div>
																	</div>
																	<div class="col2">
																		<div class="date">
																			22 hours
																		</div>
																	</div>
																</li>
															</ul>
														</div>
													</div>
												</div>
												<!--tab-pane-->
											</div>
										</div>
									</div>
									<!--end span9-->
								</div>
								<!--end tab-pane-->
								<div class="tab-pane   profile-classic row-fluid  active" id="tab_1_1">
									<div class="span2"><img src="<?php echo (APP_PATH); ?>Public/media/image/profile-img.png" alt="" /> <a href="#" class="profile-edit">edit</a></div>
									<ul class="unstyled span10">										<li><span>编号:</span> <?php echo ($html["personage"]["serial"]); ?></li>
										<li><span>用户名:</span> <?php echo ($html["personage"]["account"]); ?></li>
										<li><span>英文名称:</span> <?php echo ($html["personage"]["name_en"]); ?></li>																				<li><span>性别:</span> <?php echo ($html["personage"]["sex"]); ?></li>
										<!--<li><span>Last Name:</span> Doe</li>
										<li><span>Counrty:</span> Spain</li>-->
										<li><span>部门:</span> <?php echo ($html["personage"]["name1"]); ?></li>
										<li><span>职位:</span> <?php echo ($html["personage"]["name2"]); ?></li>
										<li><span>Email:</span> <a href="#"><?php echo ($html["personage"]["email"]); ?></a></li>
										<li><span>电话:</span> <?php echo ($html["personage"]["phone"]); ?></li>
										<li><span>紧急联系电话:</span> <?php echo ($html["personage"]["contact_phone"]); ?></li>
										<li><span>备注:</span> <?php echo ($html["personage"]["remarks"]); ?></li>
									</ul>
								</div>
								<!--tab_1_2-->
								<div class="tab-pane row-fluid profile-account" id="tab_1_3">
									<div class="row-fluid">
										<div class="span12">
											<div class="span3">
												<ul class="ver-inline-menu tabbable margin-bottom-10">																										<!-- 
													<li class="active">
														<a data-toggle="tab" href="#tab_1-1">
														<i class="icon-cog"></i> 
														个人信息
														</a> 
														<span class="after"></span>                                    
													</li>												
													<li class=""><a data-toggle="tab" href="#tab_2-2"><i class="icon-picture"></i> 更换头像</a></li>													-->
													<li class=""><a data-toggle="tab" href="#tab_3-3"><i class="icon-lock"></i> 修改密码</a></li>
													<!-- <li class=""><a data-toggle="tab" href="#tab_4-4"><i class="icon-eye-open"></i> Privacity Settings</a></li> -->						
												</ul>
											</div>
											<div class="span9">
												<div class="tab-content">
													<div id="tab_1-1" class="tab-pane">														
														<div style="height: auto;" id="accordion1-1" class="accordion collapse">
															<form action="#">
																<label class="control-label">用户名</label>
																<input type="text" placeholder="John" class="m-wrap span8" />
																<label class="control-label">英文名</label>
																<input type="text" placeholder="Doe" class="m-wrap span8" />
																<label class="control-label">性别</label>
																<input type="text" placeholder="+1 646 580 DEMO (6284)" class="m-wrap span8" />
																<label class="control-label">部门</label>
																<input type="text" placeholder="Design, Web etc." class="m-wrap span8" />
																<label class="control-label">Email</label>
																<input type="text" placeholder="Web Developer" class="m-wrap span8" />																<label class="control-label">电话</label>																<input type="text" placeholder="Web Developer" class="m-wrap span8" />																<label class="control-label">居住地</label>																<input type="text" placeholder="Web Developer" class="m-wrap span8" />																<label class="control-label">紧急联系电话</label>																<input type="text" placeholder="Web Developer" class="m-wrap span8" />
																<label class="control-label">备注</label>
																<textarea class="span8 m-wrap" rows="3"></textarea>
																<div class="submit-btn">
																	<a href="#" class="btn green">保存修改</a>
																	<a href="#" class="btn">取消</a>
																</div>
															</form>
														</div>
													</div>
													<div id="tab_2-2" class="tab-pane">
														<div style="height: auto;" id="accordion2-2" class="accordion collapse">
															<form action="#">
																<!--<p>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.</p>-->
																<br />
																<div class="controls">
																	<div class="thumbnail" style="width: 291px; height: 170px;">
																		<img src="<?php echo (APP_PATH); ?>Public/media/image/AAAAAA&amp;text=no+image" alt="" />
																	</div>
																</div>
																<div class="space10"></div>
																<div class="fileupload fileupload-new" data-provides="fileupload">
																	<div class="input-append">
																		<div class="uneditable-input">
																			<i class="icon-file fileupload-exists"></i> 
																			<span class="fileupload-preview"></span>
																		</div>
																		<span class="btn btn-file">
																		<span class="fileupload-new">查找</span>
																		<span class="fileupload-exists">更换</span>
																		<input type="file" class="default" />
																		</span>
																		<!--<a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a>-->
																	</div>
																</div>
																<div class="clearfix"></div>
																<!--<div class="controls">
																	<span class="label label-important">NOTE!</span>
																	<span>You can write some information here..</span>
																</div>-->
																<div class="space10"></div>
																<div class="submit-btn">
																	<a href="#" class="btn green">提交</a>
																	<a href="#" class="btn">重置</a>
																</div>
															</form>
														</div>
													</div>
													<div id="tab_3-3" class="tab-pane active">
														<div style="height: auto;" id="accordion3-3" class="accordion collapse">
															<form method="post" name="passwordform" action="__APP__/Admin/User/modifi_password">
																<label class="control-label">原密码</label>
																<input type="password" class="m-wrap span8" name="password"/>
																<label class="control-label">新密码</label>
																<input type="password" class="m-wrap span8" name="new_password"/>
																<label class="control-label">重复密码</label>
																<input type="password" class="m-wrap span8" name="re_new_password"/>
																<div class="submit-btn">
																	<a href="javascript:document.passwordform.submit();" class="btn green">修改密码</a>
																	<a href="javascript:document.passwordform.reset();" class="btn">重置</a>
																</div>
															</form>
														</div>
													</div>
													<div id="tab_4-4" class="tab-pane">
														<div style="height: auto;" id="accordion4-4" class="accordion collapse">
															<form action="#">
																<div class="profile-settings row-fluid">
																	<div class="span9">
																		<p>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus..</p>
																	</div>
																	<div class="control-group span3">
																		<div class="controls">
																			<label class="radio">
																			<input type="radio" name="optionsRadios1" value="option1" />
																			Yes
																			</label>
																			<label class="radio">
																			<input type="radio" name="optionsRadios1" value="option2" checked />
																			No
																			</label>  
																		</div>
																	</div>
																</div>
																<!--end profile-settings-->
																<div class="profile-settings row-fluid">
																	<div class="span9">
																		<p>Enim eiusmod high life accusamus terry richardson ad squid wolf moon</p>
																	</div>
																	<div class="control-group span3">
																		<div class="controls">
																			<label class="checkbox">
																			<input type="checkbox" value="" /> All
																			</label>
																			<label class="checkbox">
																			<input type="checkbox" value="" /> Friends
																			</label>
																		</div>
																	</div>
																</div>
																<!--end profile-settings-->
																<div class="profile-settings row-fluid">
																	<div class="span9">
																		<p>Pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson</p>
																	</div>
																	<div class="control-group span3">
																		<div class="controls">
																			<label class="checkbox">
																			<input type="checkbox" value="" /> Yes
																			</label>
																		</div>
																	</div>
																</div>
																<!--end profile-settings-->
																<div class="profile-settings row-fluid">
																	<div class="span9">
																		<p>Cliche reprehenderit enim eiusmod high life accusamus terry</p>
																	</div>
																	<div class="control-group span3">
																		<div class="controls">
																			<label class="checkbox">
																			<input type="checkbox" value="" /> Yes
																			</label>
																		</div>
																	</div>
																</div>
																<!--end profile-settings-->
																<div class="profile-settings row-fluid">
																	<div class="span9">
																		<p>Oiusmod high life accusamus terry richardson ad squid wolf fwopo</p>
																	</div>
																	<div class="control-group span3">
																		<div class="controls">
																			<label class="checkbox">
																			<input type="checkbox" value="" /> Yes
																			</label>
																		</div>
																	</div>
																</div>
																<!--end profile-settings-->
																<div class="space5"></div>
																<div class="submit-btn">
																	<a href="#" class="btn green">Save Changes</a>
																	<a href="#" class="btn">Cancel</a>
																</div>
															</form>
														</div>
													</div>
												</div>
											</div>
											<!--end span9-->                                   
										</div>
									</div>
								</div>
								<!--end tab-pane-->
								<div class="tab-pane" id="tab_1_4">
									<div class="row-fluid add-portfolio">
										<div class="pull-left">
											<span>502 Items sold this week</span>
										</div>
										<div class="pull-left">
											<a href="#" class="btn icn-only green">Add a new Project <i class="m-icon-swapright m-icon-white"></i></a>                          
										</div>
									</div>
									<!--end add-portfolio-->
									<div class="row-fluid portfolio-block">
										<div class="span5 portfolio-text">
											<img src="<?php echo (APP_PATH); ?>Public/media/image/logo_metronic.jpg" alt="" />
											<div class="portfolio-text-info">
												<h4>Metronic - Responsive Template</h4>
												<p>Lorem ipsum dolor sit consectetuer adipiscing elit.</p>
											</div>
										</div>
										<div class="span5" style="overflow:hidden;">
											<div class="portfolio-info">
												Today Sold
												<span>187</span>
											</div>
											<div class="portfolio-info">
												Total Sold
												<span>1789</span>
											</div>
											<div class="portfolio-info">
												Earns
												<span>$37.240</span>
											</div>
										</div>
										<div class="span2 portfolio-btn">
											<a href="#" class="btn bigicn-only"><span>Manage</span></a>                      
										</div>
									</div>
									<!--end row-fluid-->
									<div class="row-fluid portfolio-block">
										<div class="span5 portfolio-text">
											<img src="<?php echo (APP_PATH); ?>Public/media/image/logo_azteca.jpg" alt="" />
											<div class="portfolio-text-info">
												<h4>Metronic - Responsive Template</h4>
												<p>Lorem ipsum dolor sit consectetuer adipiscing elit.</p>
											</div>
										</div>
										<div class="span5">
											<div class="portfolio-info">
												Today Sold
												<span>24</span>
											</div>
											<div class="portfolio-info">
												Total Sold
												<span>660</span>
											</div>
											<div class="portfolio-info">
												Earns
												<span>$7.060</span>
											</div>
										</div>
										<div class="span2 portfolio-btn">
											<a href="#" class="btn bigicn-only"><span>Manage</span></a>                      
										</div>
									</div>
									<!--end row-fluid-->
									<div class="row-fluid portfolio-block">
										<div class="span5 portfolio-text">
											<img src="<?php echo (APP_PATH); ?>Public/media/image/logo_conquer.jpg" alt="" />
											<div class="portfolio-text-info">
												<h4>Metronic - Responsive Template</h4>
												<p>Lorem ipsum dolor sit consectetuer adipiscing elit.</p>
											</div>
										</div>
										<div class="span5" style="overflow:hidden;">
											<div class="portfolio-info">
												Today Sold
												<span>24</span>
											</div>
											<div class="portfolio-info">
												Total Sold
												<span>975</span>
											</div>
											<div class="portfolio-info">
												Earns
												<span>$21.700</span>
											</div>
										</div>
										<div class="span2 portfolio-btn">
											<a href="#" class="btn bigicn-only"><span>Manage</span></a>                      
										</div>
									</div>
									<!--end row-fluid-->
								</div>
								<!--end tab-pane-->
								<div class="tab-pane row-fluid" id="tab_1_6">
									<div class="row-fluid">
										<div class="span12">
											<div class="span3">
												<ul class="ver-inline-menu tabbable margin-bottom-10">
													<li class="active">
														<a data-toggle="tab" href="#tab_1">
														<i class="icon-briefcase"></i> 
														General Questions
														</a> 
														<span class="after"></span>                                    
													</li>
													<li><a data-toggle="tab" href="#tab_2"><i class="icon-group"></i> Membership</a></li>
													<li><a data-toggle="tab" href="#tab_3"><i class="icon-leaf"></i> Terms Of Service</a></li>
													<li><a data-toggle="tab" href="#tab_1"><i class="icon-info-sign"></i> License Terms</a></li>
													<li><a data-toggle="tab" href="#tab_2"><i class="icon-tint"></i> Payment Rules</a></li>
													<li><a data-toggle="tab" href="#tab_3"><i class="icon-plus"></i> Other Questions</a></li>
												</ul>
											</div>
											<div class="span9">
												<div class="tab-content">
													<div id="tab_1" class="tab-pane active">
														<div style="height: auto;" id="accordion1" class="accordion collapse">
															<div class="accordion-group">
																<div class="accordion-heading">
																	<a href="#collapse_1" data-parent="#accordion1" data-toggle="collapse" class="accordion-toggle collapsed">
																	Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry ?
																	</a>
																</div>
																<div class="accordion-body collapse in" id="collapse_1">
																	<div class="accordion-inner">
																		Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.
																	</div>
																</div>
															</div>
															<div class="accordion-group">
																<div class="accordion-heading">
																	<a href="#collapse_2" data-parent="#accordion1" data-toggle="collapse" class="accordion-toggle collapsed">
																	Pariatur cliche reprehenderit enim eiusmod highr brunch ?
																	</a>
																</div>
																<div class="accordion-body collapse" id="collapse_2">
																	<div class="accordion-inner">
																		Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor.
																	</div>
																</div>
															</div>
															<div class="accordion-group">
																<div class="accordion-heading">
																	<a href="#collapse_3" data-parent="#accordion1" data-toggle="collapse" class="accordion-toggle collapsed">
																	Food truck quinoa nesciunt laborum eiusmod nim eiusmod high life accusamus  ?
																	</a>
																</div>
																<div class="accordion-body collapse" id="collapse_3">
																	<div class="accordion-inner">
																		Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor.
																	</div>
																</div>
															</div>
															<div class="accordion-group">
																<div class="accordion-heading">
																	<a href="#collapse_4" data-parent="#accordion1" data-toggle="collapse" class="accordion-toggle collapsed">
																	High life accusamus terry richardson ad ?
																	</a>
																</div>
																<div class="accordion-body collapse" id="collapse_4">
																	<div class="accordion-inner">
																		Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor.
																	</div>
																</div>
															</div>
															<div class="accordion-group">
																<div class="accordion-heading">
																	<a href="#collapse_5" data-parent="#accordion1" data-toggle="collapse" class="accordion-toggle collapsed">
																	Reprehenderit enim eiusmod high life accusamus terry quinoa nesciunt laborum eiusmod ?
																	</a>
																</div>
																<div class="accordion-body collapse" id="collapse_5">
																	<div class="accordion-inner">
																		Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor.
																	</div>
																</div>
															</div>
															<div class="accordion-group">
																<div class="accordion-heading">
																	<a href="#collapse_6" data-parent="#accordion1" data-toggle="collapse" class="accordion-toggle collapsed">
																	Wolf moon officia aute non cupidatat skateboard dolor brunch ?
																	</a>
																</div>
																<div class="accordion-body collapse" id="collapse_6">
																	<div class="accordion-inner">
																		Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor.
																	</div>
																</div>
															</div>
														</div>
													</div>
													<div id="tab_2" class="tab-pane">
														<div style="height: auto;" id="accordion2" class="accordion collapse">
															<div class="accordion-group">
																<div class="accordion-heading">
																	<a href="#collapse_2_1" data-parent="#accordion2" data-toggle="collapse" class="accordion-toggle collapsed">
																	Cliche reprehenderit, enim eiusmod high life accusamus enim eiusmod ?
																	</a>
																</div>
																<div class="accordion-body collapse in" id="collapse_2_1">
																	<div class="accordion-inner">
																		Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.
																	</div>
																</div>
															</div>
															<div class="accordion-group">
																<div class="accordion-heading">
																	<a href="#collapse_2_2" data-parent="#accordion2" data-toggle="collapse" class="accordion-toggle collapsed">
																	Pariatur cliche reprehenderit enim eiusmod high life non cupidatat skateboard dolor brunch ?
																	</a>
																</div>
																<div class="accordion-body collapse" id="collapse_2_2">
																	<div class="accordion-inner">
																		Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor.
																	</div>
																</div>
															</div>
															<div class="accordion-group">
																<div class="accordion-heading">
																	<a href="#collapse_2_3" data-parent="#accordion2" data-toggle="collapse" class="accordion-toggle collapsed">
																	Food truck quinoa nesciunt laborum eiusmod ?
																	</a>
																</div>
																<div class="accordion-body collapse" id="collapse_2_3">
																	<div class="accordion-inner">
																		Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor.
																	</div>
																</div>
															</div>
															<div class="accordion-group">
																<div class="accordion-heading">
																	<a href="#collapse_2_4" data-parent="#accordion2" data-toggle="collapse" class="accordion-toggle collapsed">
																	High life accusamus terry richardson ad squid enim eiusmod high ?
																	</a>
																</div>
																<div class="accordion-body collapse" id="collapse_2_4">
																	<div class="accordion-inner">
																		Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor.
																	</div>
																</div>
															</div>
															<div class="accordion-group">
																<div class="accordion-heading">
																	<a href="#collapse_2_5" data-parent="#accordion2" data-toggle="collapse" class="accordion-toggle collapsed">
																	Reprehenderit enim eiusmod high life accusamus terry quinoa nesciunt laborum eiusmod ?
																	</a>
																</div>
																<div class="accordion-body collapse" id="collapse_2_5">
																	<div class="accordion-inner">
																		<p>
																			Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor.
																		</p>
																		<p> 
																			moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmodBrunch 3 wolf moon tempor
																		</p>
																	</div>
																</div>
															</div>
															<div class="accordion-group">
																<div class="accordion-heading">
																	<a href="#collapse_2_6" data-parent="#accordion2" data-toggle="collapse" class="accordion-toggle collapsed">
																	Wolf moon officia aute non cupidatat skateboard dolor brunch ?
																	</a>
																</div>
																<div class="accordion-body collapse" id="collapse_2_6">
																	<div class="accordion-inner">
																		Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor.
																	</div>
																</div>
															</div>
															<div class="accordion-group">
																<div class="accordion-heading">
																	<a href="#collapse_2_7" data-parent="#accordion2" data-toggle="collapse" class="accordion-toggle collapsed">
																	Reprehenderit enim eiusmod high life accusamus terry quinoa nesciunt laborum eiusmod ?
																	</a>
																</div>
																<div class="accordion-body collapse" id="collapse_2_7">
																	<div class="accordion-inner">
																		<p>
																			Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor.
																		</p>
																		<p> 
																			moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmodBrunch 3 wolf moon tempor
																		</p>
																	</div>
																</div>
															</div>
														</div>
													</div>
													<div id="tab_3" class="tab-pane">
														<div style="height: auto;" id="accordion3" class="accordion collapse">
															<div class="accordion-group">
																<div class="accordion-heading">
																	<a href="#collapse_3_1" data-parent="#accordion3" data-toggle="collapse" class="accordion-toggle collapsed">
																	Cliche reprehenderit, enim eiusmod ?
																	</a>
																</div>
																<div class="accordion-body collapse in" id="collapse_3_1">
																	<div class="accordion-inner">
																		Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.
																	</div>
																</div>
															</div>
															<div class="accordion-group">
																<div class="accordion-heading">
																	<a href="#collapse_3_2" data-parent="#accordion3" data-toggle="collapse" class="accordion-toggle collapsed">
																	Pariatur skateboard dolor brunch ?
																	</a>
																</div>
																<div class="accordion-body collapse" id="collapse_3_2">
																	<div class="accordion-inner">
																		Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor.
																	</div>
																</div>
															</div>
															<div class="accordion-group">
																<div class="accordion-heading">
																	<a href="#collapse_3_3" data-parent="#accordion3" data-toggle="collapse" class="accordion-toggle collapsed">
																	Food truck quinoa nesciunt laborum eiusmod ?
																	</a>
																</div>
																<div class="accordion-body collapse" id="collapse_3_3">
																	<div class="accordion-inner">
																		Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor.
																	</div>
																</div>
															</div>
															<div class="accordion-group">
																<div class="accordion-heading">
																	<a href="#collapse_3_4" data-parent="#accordion3" data-toggle="collapse" class="accordion-toggle collapsed">
																	High life accusamus terry richardson ad squid enim eiusmod high ?
																	</a>
																</div>
																<div class="accordion-body collapse" id="collapse_3_4">
																	<div class="accordion-inner">
																		Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor.
																	</div>
																</div>
															</div>
															<div class="accordion-group">
																<div class="accordion-heading">
																	<a href="#collapse_3_5" data-parent="#accordion3" data-toggle="collapse" class="accordion-toggle collapsed">
																	Reprehenderit enim eiusmod high  eiusmod ?
																	</a>
																</div>
																<div class="accordion-body collapse" id="collapse_3_5">
																	<div class="accordion-inner">
																		<p>
																			Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor.
																		</p>
																		<p> 
																			moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmodBrunch 3 wolf moon tempor
																		</p>
																	</div>
																</div>
															</div>
															<div class="accordion-group">
																<div class="accordion-heading">
																	<a href="#collapse_3_6" data-parent="#accordion3" data-toggle="collapse" class="accordion-toggle collapsed">
																	Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry ?
																	</a>
																</div>
																<div class="accordion-body collapse" id="collapse_3_6">
																	<div class="accordion-inner">
																		Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor.
																	</div>
																</div>
															</div>
															<div class="accordion-group">
																<div class="accordion-heading">
																	<a href="#collapse_3_7" data-parent="#accordion3" data-toggle="collapse" class="accordion-toggle collapsed">
																	Reprehenderit enim eiusmod high life accusamus aborum eiusmod ?
																	</a>
																</div>
																<div class="accordion-body collapse" id="collapse_3_7">
																	<div class="accordion-inner">
																		<p>
																			Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor.
																		</p>
																		<p> 
																			moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmodBrunch 3 wolf moon tempor
																		</p>
																	</div>
																</div>
															</div>
															<div class="accordion-group">
																<div class="accordion-heading">
																	<a href="#collapse_3_8" data-parent="#accordion3" data-toggle="collapse" class="accordion-toggle collapsed">
																	Reprehenderit enim eiusmod high life accusamus terry quinoa nesciunt laborum eiusmod ?
																	</a>
																</div>
																<div class="accordion-body collapse" id="collapse_3_8">
																	<div class="accordion-inner">
																		<p>
																			Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor.
																		</p>
																		<p> 
																			moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmodBrunch 3 wolf moon tempor
																		</p>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
											<!--end span9-->                                   
										</div>
									</div>
								</div>
								<!--end tab-pane-->
							</div>
						</div>
						<!--END TABS-->
					</div>
				</div>
				<!-- END PAGE CONTENT-->
			</div>
			<!-- END PAGE CONTAINER--> 
		</div>
		<!-- END PAGE -->    
	</div>
	<!-- END CONTAINER -->
	<!-- 页脚 -->		<!-- BEGIN FOOTER -->

	<div class="footer">

		<div class="footer-inner">
<!-- 
			2013 车神OA管理系统
-->
		</div>

		<div class="footer-tools">

			<span class="go-top">

			<i class="icon-angle-up"></i>

			</span>

		</div>

	</div>

	<!-- END FOOTER -->	<!-- 核心插件 -->	<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->

	<!-- BEGIN 核心级别插件 -->
	<script src="<?php echo (APP_PATH); ?>Public/media/js/dc.js" type="text/javascript"></script>  
	<!-- 
	<script src="<?php echo (APP_PATH); ?>Public/media/js/jquery-1.10.1.min.js" type="text/javascript"></script>
	-->
	<script src="<?php echo (APP_PATH); ?>Public/media/js/jquery-1.9.1.js" type="text/javascript"></script>

	<script src="<?php echo (APP_PATH); ?>Public/media/js/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>

	<!-- IMPORTANT! Load jquery-ui-1.10.1.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->

	<script src="<?php echo (APP_PATH); ?>Public/media/js/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>      

	<script src="<?php echo (APP_PATH); ?>Public/media/js/bootstrap.min.js" type="text/javascript"></script>

	<!--[if lt IE 9]>

	<script src="<?php echo (APP_PATH); ?>Public/media/js/excanvas.min.js"></script>

	<script src="<?php echo (APP_PATH); ?>Public/media/js/respond.min.js"></script>  

	<![endif]-->   

	<script src="<?php echo (APP_PATH); ?>Public/media/js/jquery.slimscroll.min.js" type="text/javascript"></script>

	<script src="<?php echo (APP_PATH); ?>Public/media/js/jquery.blockui.min.js" type="text/javascript"></script>  

	<script src="<?php echo (APP_PATH); ?>Public/media/js/jquery.cookie.min.js" type="text/javascript"></script>

	<script src="<?php echo (APP_PATH); ?>Public/media/js/jquery.uniform.min.js" type="text/javascript" ></script>

	<!-- 日期插件 -->
	<script src="<?php echo (APP_PATH); ?>Public/media/js/bootstrap-datetimepicker.js" type="text/javascript" ></script>
	<script src="<?php echo (APP_PATH); ?>Public/media/js/bootstrap-datetimepicker.zh-CN.js" type="text/javascript" ></script>
	
	<!-- 扩展函数库 -->
	<script src="<?php echo (APP_PATH); ?>Public/media/js/function.js" type="text/javascript" ></script>
	<script src="<?php echo (APP_PATH); ?>Public/media/js/wade_Date.js" type="text/javascript" ></script>
	
	
	<!-- 扩展jQuery插件 -->
	<script src="<?php echo (APP_PATH); ?>Public/media/js/jquery-ui-1.0.0.wade.js" type="text/javascript" ></script>
	
	<!-- 扩展运行 -->
	<script src="<?php echo (APP_PATH); ?>Public/media/js/run.js" type="text/javascript" ></script>
	
	<!-- END 核心级别插件 -->
	
	<!-- BEGIN PAGE LEVEL PLUGINS -->
	<script type="text/javascript" src="<?php echo (APP_PATH); ?>Public/media/js/bootstrap-fileupload.js"></script>
	<script type="text/javascript" src="<?php echo (APP_PATH); ?>Public/media/js/chosen.jquery.min.js"></script>
	<!-- END PAGE LEVEL PLUGINS -->
	<!-- BEGIN PAGE LEVEL SCRIPTS -->
	<script src="<?php echo (APP_PATH); ?>Public/media/js/app.js"></script>      
	<!-- END PAGE LEVEL SCRIPTS -->
	<script>
		jQuery(document).ready(function() {       
		   // initiate layout and plugins
		   App.init();
		});
	</script>
	<!-- END JAVASCRIPTS -->

<!-- END BODY -->
</html>