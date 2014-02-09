<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang=en>
    
    <head>
        <title>
            Taurus
        </title>
        <meta http-equiv=Content-Type content="text/html; charset=utf-8" />
        <link rel=icon type=image/ico href="<?php echo ($global_tpl_view["path"]); ?>favicon.html" />
        <link href=<?php echo ($global_tpl_view["path"]); ?>css/stylesheets.css rel=stylesheet type=text/css />
        <script type=text/javascript src=<?php echo ($global_tpl_view["path"]); ?>js/plugins/jquery/jquery.min.js>
        </script>
        <script type=text/javascript src=<?php echo ($global_tpl_view["path"]); ?>js/plugins/jquery/jquery-ui.min.js>
        </script>
        <script type=text/javascript src=<?php echo ($global_tpl_view["path"]); ?>js/plugins/jquery/jquery-migrate.min.js>
        </script>
        <script type=text/javascript src=<?php echo ($global_tpl_view["path"]); ?>js/plugins/jquery/globalize.js>
        </script>
        <script type=text/javascript src=<?php echo ($global_tpl_view["path"]); ?>js/plugins/bootstrap/bootstrap.min.js>
        </script>
        <script type=text/javascript src=<?php echo ($global_tpl_view["path"]); ?>js/plugins/uniform/jquery.uniform.min.js>
        </script>
        <script type=text/javascript src=<?php echo ($global_tpl_view["path"]); ?>js/plugins/select2/select2.min.js>
        </script>
        <script type=text/javascript src=<?php echo ($global_tpl_view["path"]); ?>js/plugins/tagsinput/jquery.tagsinput.min.js>
        </script>
        <script type=text/javascript src=<?php echo ($global_tpl_view["path"]); ?>js/plugins/jquery/jquery-ui-timepicker-addon.js>
        </script>
        <script type=text/javascript src=<?php echo ($global_tpl_view["path"]); ?>js/plugins/ibutton/jquery.ibutton.js>
        </script>
        <script type=text/javascript src=<?php echo ($global_tpl_view["path"]); ?>js/js.js>
        </script>
        <script type=text/javascript src=<?php echo ($global_tpl_view["path"]); ?>js/settings.js>
        </script>
    </head>
    
    <body class=bg-img-num1>
        <div class=container>
            <div class=row>
                <div class=col-md-12>
                    <nav class="navbar brb" role=navigation>
                        <div class=navbar-header>
                            <button type=button class=navbar-toggle data-toggle=collapse data-target=.navbar-ex1-collapse>
                                <span class=sr-only>
                                    Toggle navigation
                                </span>
                                <span class=icon-reorder>
                                </span>
                            </button>
                            <a class=navbar-brand href=index.html>
                                <img src="img/logo.png" />
                            </a>
                        </div>
                        <div class="collapse navbar-collapse navbar-ex1-collapse">
                            <ul class="nav navbar-nav">
                                <li>
                                    <a href=index.html>
                                        <span class=icon-home>
                                        </span>
                                        dashboard
                                    </a>
                                </li>
                                <li class="dropdown active">
                                    <a href=# class=dropdown-toggle data-toggle=dropdown>
                                        <span class=icon-pencil>
                                        </span>
                                        forms
                                    </a>
                                    <ul class=dropdown-menu>
                                        <li>
                                            <a href=form_elements.html>
                                                Form elements
                                            </a>
                                        </li>
                                        <li>
                                            <a href=form_editors.html>
                                                WYSIWYG and upload
                                            </a>
                                        </li>
                                        <li>
                                            <a href=form_validation.html>
                                                Validation and wizard
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class=dropdown>
                                    <a href=# class=dropdown-toggle data-toggle=dropdown>
                                        <span class=icon-cogs>
                                        </span>
                                        components
                                    </a>
                                    <ul class=dropdown-menu>
                                        <li>
                                            <a href=component_blocks.html>
                                                Blocks and panels
                                            </a>
                                        </li>
                                        <li>
                                            <a href=component_buttons.html>
                                                Buttons
                                            </a>
                                        </li>
                                        <li>
                                            <a href=component_modals.html>
                                                Modals and popups
                                            </a>
                                        </li>
                                        <li>
                                            <a href=component_tabs.html>
                                                Tabs, accordion
                                            </a>
                                        </li>
                                        <li>
                                            <a href=component_progress.html>
                                                Progressbars
                                            </a>
                                        </li>
                                        <li>
                                            <a href=component_lists.html>
                                                List groups
                                            </a>
                                        </li>
                                        <li>
                                            <a href=component_messages.html>
                                                Messages
                                            </a>
                                        </li>
                                        <li>
                                            <a href=#>
                                                Tables
                                                <i class="icon-angle-right pull-right">
                                                </i>
                                            </a>
                                            <ul class=dropdown-submenu>
                                                <li>
                                                    <a href=component_table_default.html>
                                                        Default tables
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href=component_table_sortable.html>
                                                        Sortable tables
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href=#>
                                                Layouts
                                                <i class="icon-angle-right pull-right">
                                                </i>
                                            </a>
                                            <ul class=dropdown-submenu>
                                                <li>
                                                    <a href=component_layout_blank.html>
                                                        Default layout(blank)
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href=component_layout_custom.html>
                                                        Custom navigation
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href=component_layout_scroll.html>
                                                        Content scroll
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href=component_layout_fixed.html>
                                                        Fixed content
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href=component_charts.html>
                                                Charts
                                            </a>
                                        </li>
                                        <li>
                                            <a href=component_maps.html>
                                                Maps
                                            </a>
                                        </li>
                                        <li>
                                            <a href=component_typography.html>
                                                Typography
                                            </a>
                                        </li>
                                        <li>
                                            <a href=component_gallery.html>
                                                Gallery
                                            </a>
                                        </li>
                                        <li>
                                            <a href=component_calendar.html>
                                                Calendar
                                            </a>
                                        </li>
                                        <li>
                                            <a href=component_icons.html>
                                                Icons
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href=widgets.html>
                                        <span class=icon-globe>
                                        </span>
                                        widgets
                                    </a>
                                </li>
                                <li class=dropdown>
                                    <a href=# class=dropdown-toggle data-toggle=dropdown>
                                        <span class=icon-file-alt>
                                        </span>
                                        pages
                                    </a>
                                    <ul class=dropdown-menu>
                                        <li>
                                            <a href=sample_login.html>
                                                Login
                                            </a>
                                        </li>
                                        <li>
                                            <a href=sample_registration.html>
                                                Registration
                                            </a>
                                        </li>
                                        <li>
                                            <a href=sample_profile.html>
                                                User profile
                                            </a>
                                        </li>
                                        <li>
                                            <a href=sample_profile_social.html>
                                                Social profile
                                            </a>
                                        </li>
                                        <li>
                                            <a href=sample_edit_profile.html>
                                                Edit profile
                                            </a>
                                        </li>
                                        <li>
                                            <a href=sample_mail.html>
                                                Mail
                                            </a>
                                        </li>
                                        <li>
                                            <a href=sample_search.html>
                                                Search
                                            </a>
                                        </li>
                                        <li>
                                            <a href=sample_invoice.html>
                                                Invoice
                                            </a>
                                        </li>
                                        <li>
                                            <a href=sample_contacts.html>
                                                Contacts
                                            </a>
                                        </li>
                                        <li>
                                            <a href=sample_tasks.html>
                                                Tasks
                                            </a>
                                        </li>
                                        <li>
                                            <a href=sample_timeline.html>
                                                Timeline
                                            </a>
                                        </li>
                                        <li>
                                            <a href=#>
                                                Email templates
                                                <i class="icon-angle-right pull-right">
                                                </i>
                                            </a>
                                            <ul class=dropdown-submenu>
                                                <li>
                                                    <a href=email_sample_1.html>
                                                        Sample 1
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href=email_sample_2.html>
                                                        Sample 2
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href=email_sample_3.html>
                                                        Sample 3
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href=email_sample_4.html>
                                                        Sample 4
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href=#>
                                                Error pages
                                                <i class="icon-angle-right pull-right">
                                                </i>
                                            </a>
                                            <ul class=dropdown-submenu>
                                                <li>
                                                    <a href=sample_error_403.html>
                                                        403 Forbidden
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href=sample_error_404.html>
                                                        404 Not Found
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href=sample_error_500.html>
                                                        500 Internal Server Error
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href=sample_error_503.html>
                                                        503 Service Unavailable
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href=sample_error_504.html>
                                                        504 Gateway Timeout
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                            <form class="navbar-form navbar-right" role=search>
                                <div class=form-group>
                                    <input type=text class=form-control placeholder="search..." />
                                </div>
                            </form>
                        </div>
                    </nav>
                </div>
            </div>
            <div class=row>
                <div class=col-md-12>
                    <ol class=breadcrumb>
                        <li>
                            <a href=#>
                                Home
                            </a>
                        </li>
                        <li>
                            <a href=#>
                                Components
                            </a>
                        </li>
                        <li class=active>
                            Form elements
                        </li>
                    </ol>
                </div>
            </div>
            <div class=row>
                <div class=col-md-6>
                    <div class=block>
                        <div class=header>
                            <h2>
                                Default elements
                            </h2>
                        </div>
                        <div class="content controls">
                            <div class=form-row>
                                <div class=col-md-3>
                                    Text:
                                </div>
                                <div class=col-md-9>
                                    <input type=text class=form-control value="text value" />
                                </div>
                            </div>
                            <div class=form-row>
                                <div class=col-md-3>
                                    Password:
                                </div>
                                <div class=col-md-9>
                                    <input type=password class=form-control value="password value" />
                                </div>
                            </div>
                            <div class=form-row>
                                <div class=col-md-3>
                                    Readonly:
                                </div>
                                <div class=col-md-9>
                                    <input type=text readonly=readonly class=form-control value="Some readonly value"
                                    />
                                </div>
                            </div>
                            <div class=form-row>
                                <div class=col-md-3>
                                    Disabled:
                                </div>
                                <div class=col-md-9>
                                    <input type=text disabled=disabled class=form-control value="Some disabled value"
                                    />
                                </div>
                            </div>
                            <div class=form-row>
                                <div class=col-md-3>
                                    Placeholder:
                                </div>
                                <div class=col-md-9>
                                    <input type=text class=form-control placeholder="Placeholder" />
                                </div>
                            </div>
                            <div class=form-row>
                                <div class=col-md-3>
                                    Textarea:
                                </div>
                                <div class=col-md-9>
                                    <textarea class=form-control>
                                        textarea value
                                    </textarea>
                                </div>
                            </div>
                            <div class=form-row>
                                <div class=col-md-3>
                                    Default:
                                </div>
                                <div class=col-md-9>
                                    <select class=form-control>
                                        <option>
                                            Option 1
                                        </option>
                                        <option>
                                            Option 2
                                        </option>
                                        <option>
                                            Option 3
                                        </option>
                                        <option>
                                            Option 4
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class=form-row>
                                <div class=col-md-3>
                                    Multiple:
                                </div>
                                <div class=col-md-9>
                                    <select class=form-control multiple=multiple>
                                        <option>
                                            Option 1
                                        </option>
                                        <option>
                                            Option 2
                                        </option>
                                        <option>
                                            Option 3
                                        </option>
                                        <option>
                                            Option 4
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class=block>
                        <div class=header>
                            <h2>
                                Checkbox, radio and file fields
                            </h2>
                        </div>
                        <div class="content controls">
                            <div class=form-row>
                                <div class=col-md-3>
                                    Checkbox:
                                </div>
                                <div class=col-md-9>
                                    <div class=checkbox-inline>
                                        <label>
                                            <input type=checkbox name="check_ex1" />
                                            Default
                                        </label>
                                    </div>
                                    <div class=checkbox-inline>
                                        <label>
                                            <input type=checkbox name=check_ex2 checked="checked" />
                                            Checked
                                        </label>
                                    </div>
                                    <div class=checkbox-inline>
                                        <label>
                                            <input type=checkbox name=check_ex1 disabled="disabled" />
                                            Disabled
                                        </label>
                                    </div>
                                    <div class=checkbox-inline>
                                        <label>
                                            <input type=checkbox name=check_ex1 disabled=disabled checked="checked"
                                            />
                                            Disabled checked
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class=form-row>
                                <div class=col-md-3>
                                    Radio:
                                </div>
                                <div class=col-md-9>
                                    <div class=radiobox-inline>
                                        <label>
                                            <input type=radio name="radio_ex1" />
                                            Default
                                        </label>
                                    </div>
                                    <div class=radiobox-inline>
                                        <label>
                                            <input type=radio name=radio_ex1 checked="checked" />
                                            Checked
                                        </label>
                                    </div>
                                    <div class=radiobox-inline>
                                        <label>
                                            <input type=radio name=radio_ex2 disabled="disabled" />
                                            Disabled
                                        </label>
                                    </div>
                                    <div class=radiobox-inline>
                                        <label>
                                            <input type=radio name=radio_ex2 disabled=disabled checked="checked" />
                                            Disabled checked
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class=form-row>
                                <div class=col-md-3>
                                    File:
                                </div>
                                <div class=col-md-9>
                                    <div class="input-group file">
                                        <input type=text class="form-control" />
                                        <input type=file name="file" />
                                        <span class=input-group-btn>
                                            <button class=btn type=button>
                                                Browse
                                            </button>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class=block>
                        <div class=header>
                            <h2>
                                Switch
                            </h2>
                        </div>
                        <div class="content controls">
                            <div class=form-row>
                                <div class=col-md-3>
                                    Checkbox:
                                </div>
                                <div class=col-md-9>
                                    <input type=checkbox class=ibutton name=eic_2 checked="checked" />
                                    <input type=checkbox class=ibutton name="eic_1" />
                                    <input type=checkbox class=ibutton name=eic_4 disabled=disabled checked="checked"
                                    />
                                    <input type=checkbox class=ibutton name=eic_3 disabled="disabled" />
                                </div>
                            </div>
                            <div class=form-row>
                                <div class=col-md-3>
                                    Radio:
                                </div>
                                <div class=col-md-9>
                                    <input type=radio class=ibutton name=eir_1 checked="checked" />
                                    <input type=radio class=ibutton name="eir_1" />
                                    <input type=checkbox class=ibutton name=eir_3 disabled=disabled checked="checked"
                                    />
                                    <input type=radio class=ibutton name=eir_1 disabled="disabled" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class=block>
                        <div class=header>
                            <h2>
                                Spinner
                            </h2>
                        </div>
                        <div class="content controls">
                            <div class=form-row>
                                <div class=col-md-3>
                                    Default:
                                </div>
                                <div class=col-md-9>
                                    <input id=spinner class=form-control name=spinner value="0" />
                                </div>
                            </div>
                            <div class=form-row>
                                <div class=col-md-3>
                                    Decimal:
                                </div>
                                <div class=col-md-9>
                                    <input id=spinner2 class=form-control name=spinner value="0" />
                                </div>
                            </div>
                            <div class=form-row>
                                <div class=col-md-3>
                                    Currency:
                                </div>
                                <div class=col-md-9>
                                    <input id=spinner3 class=form-control name=spinner value="0" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class=col-md-6>
                    <div class=block>
                        <div class=header>
                            <h2>
                                Select2 plugin
                            </h2>
                        </div>
                        <div class="content controls">
                            <div class=form-row>
                                <div class=col-md-3>
                                    Default:
                                </div>
                                <div class=col-md-9>
                                    <select class=select2 style=width:100% tabindex=-1>
                                        <optgroup label="Alaskan/Hawaiian Time Zone">
                                            <option value=AK>
                                                Alaska
                                            </option>
                                            <option value=HI>
                                                Hawaii
                                            </option>
                                        </optgroup>
                                        <optgroup label="Pacific Time Zone">
                                            <option value=CA>
                                                California
                                            </option>
                                            <option value=NV>
                                                Nevada
                                            </option>
                                            <option value=OR>
                                                Oregon
                                            </option>
                                            <option value=WA>
                                                Washington
                                            </option>
                                        </optgroup>
                                        <optgroup label="Mountain Time Zone">
                                            <option value=AZ>
                                                Arizona
                                            </option>
                                            <option value=CO>
                                                Colorado
                                            </option>
                                            <option value=ID>
                                                Idaho
                                            </option>
                                            <option value=MT>
                                                Montana
                                            </option>
                                            <option value=NE>
                                                Nebraska
                                            </option>
                                            <option value=NM>
                                                New Mexico
                                            </option>
                                            <option value=ND>
                                                North Dakota
                                            </option>
                                            <option value=UT>
                                                Utah
                                            </option>
                                            <option value=WY>
                                                Wyoming
                                            </option>
                                        </optgroup>
                                        <optgroup label="Central Time Zone">
                                            <option value=AL>
                                                Alabama
                                            </option>
                                            <option value=AR>
                                                Arkansas
                                            </option>
                                            <option value=IL>
                                                Illinois
                                            </option>
                                            <option value=IA>
                                                Iowa
                                            </option>
                                            <option value=KS>
                                                Kansas
                                            </option>
                                            <option value=KY>
                                                Kentucky
                                            </option>
                                            <option value=LA>
                                                Louisiana
                                            </option>
                                            <option value=MN>
                                                Minnesota
                                            </option>
                                            <option value=MS>
                                                Mississippi
                                            </option>
                                            <option value=MO>
                                                Missouri
                                            </option>
                                            <option value=OK>
                                                Oklahoma
                                            </option>
                                            <option value=SD>
                                                South Dakota
                                            </option>
                                            <option value=TX>
                                                Texas
                                            </option>
                                            <option value=TN>
                                                Tennessee
                                            </option>
                                            <option value=WI>
                                                Wisconsin
                                            </option>
                                        </optgroup>
                                        <optgroup label="Eastern Time Zone">
                                            <option value=CT>
                                                Connecticut
                                            </option>
                                            <option value=DE>
                                                Delaware
                                            </option>
                                            <option value=FL>
                                                Florida
                                            </option>
                                            <option value=GA>
                                                Georgia
                                            </option>
                                            <option value=IN>
                                                Indiana
                                            </option>
                                            <option value=ME>
                                                Maine
                                            </option>
                                            <option value=MD>
                                                Maryland
                                            </option>
                                            <option value=MA>
                                                Massachusetts
                                            </option>
                                            <option value=MI>
                                                Michigan
                                            </option>
                                            <option value=NH>
                                                New Hampshire
                                            </option>
                                            <option value=NJ>
                                                New Jersey
                                            </option>
                                            <option value=NY>
                                                New York
                                            </option>
                                            <option value=NC>
                                                North Carolina
                                            </option>
                                            <option value=OH>
                                                Ohio
                                            </option>
                                            <option value=PA>
                                                Pennsylvania
                                            </option>
                                            <option value=RI>
                                                Rhode Island
                                            </option>
                                            <option value=SC>
                                                South Carolina
                                            </option>
                                            <option value=VT>
                                                Vermont
                                            </option>
                                            <option value=VA>
                                                Virginia
                                            </option>
                                            <option value=WV>
                                                West Virginia
                                            </option>
                                        </optgroup>
                                    </select>
                                </div>
                            </div>
                            <div class=form-row>
                                <div class=col-md-3>
                                    Multiple:
                                </div>
                                <div class=col-md-9>
                                    <select class=select2 multiple=multiple style=width:100% tabindex=-1>
                                        <optgroup label="Alaskan/Hawaiian Time Zone">
                                            <option value=AK selected=selected>
                                                Alaska
                                            </option>
                                            <option value=HI>
                                                Hawaii
                                            </option>
                                        </optgroup>
                                        <optgroup label="Pacific Time Zone">
                                            <option value=CA>
                                                California
                                            </option>
                                            <option value=NV selected=selected>
                                                Nevada
                                            </option>
                                            <option value=OR>
                                                Oregon
                                            </option>
                                            <option value=WA selected=selected>
                                                Washington
                                            </option>
                                        </optgroup>
                                        <optgroup label="Mountain Time Zone">
                                            <option value=AZ>
                                                Arizona
                                            </option>
                                            <option value=CO>
                                                Colorado
                                            </option>
                                            <option value=ID>
                                                Idaho
                                            </option>
                                            <option value=MT selected=selected>
                                                Montana
                                            </option>
                                            <option value=NE>
                                                Nebraska
                                            </option>
                                            <option value=NM>
                                                New Mexico
                                            </option>
                                            <option value=ND>
                                                North Dakota
                                            </option>
                                            <option value=UT>
                                                Utah
                                            </option>
                                            <option value=WY>
                                                Wyoming
                                            </option>
                                        </optgroup>
                                        <optgroup label="Central Time Zone">
                                            <option value=AL>
                                                Alabama
                                            </option>
                                            <option value=AR>
                                                Arkansas
                                            </option>
                                            <option value=IL>
                                                Illinois
                                            </option>
                                            <option value=IA>
                                                Iowa
                                            </option>
                                            <option value=KS>
                                                Kansas
                                            </option>
                                            <option value=KY>
                                                Kentucky
                                            </option>
                                            <option value=LA>
                                                Louisiana
                                            </option>
                                            <option value=MN>
                                                Minnesota
                                            </option>
                                            <option value=MS>
                                                Mississippi
                                            </option>
                                            <option value=MO>
                                                Missouri
                                            </option>
                                            <option value=OK>
                                                Oklahoma
                                            </option>
                                            <option value=SD>
                                                South Dakota
                                            </option>
                                            <option value=TX>
                                                Texas
                                            </option>
                                            <option value=TN>
                                                Tennessee
                                            </option>
                                            <option value=WI>
                                                Wisconsin
                                            </option>
                                        </optgroup>
                                        <optgroup label="Eastern Time Zone">
                                            <option value=CT>
                                                Connecticut
                                            </option>
                                            <option value=DE>
                                                Delaware
                                            </option>
                                            <option value=FL>
                                                Florida
                                            </option>
                                            <option value=GA>
                                                Georgia
                                            </option>
                                            <option value=IN>
                                                Indiana
                                            </option>
                                            <option value=ME>
                                                Maine
                                            </option>
                                            <option value=MD>
                                                Maryland
                                            </option>
                                            <option value=MA>
                                                Massachusetts
                                            </option>
                                            <option value=MI>
                                                Michigan
                                            </option>
                                            <option value=NH>
                                                New Hampshire
                                            </option>
                                            <option value=NJ>
                                                New Jersey
                                            </option>
                                            <option value=NY>
                                                New York
                                            </option>
                                            <option value=NC>
                                                North Carolina
                                            </option>
                                            <option value=OH>
                                                Ohio
                                            </option>
                                            <option value=PA>
                                                Pennsylvania
                                            </option>
                                            <option value=RI>
                                                Rhode Island
                                            </option>
                                            <option value=SC>
                                                South Carolina
                                            </option>
                                            <option value=VT>
                                                Vermont
                                            </option>
                                            <option value=VA>
                                                Virginia
                                            </option>
                                            <option value=WV>
                                                West Virginia
                                            </option>
                                        </optgroup>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class=block>
                        <div class=header>
                            <h2>
                                Tags Input
                            </h2>
                        </div>
                        <div class="content controls">
                            <div class=form-row>
                                <div class=col-md-3>
                                    Default:
                                </div>
                                <div class=col-md-9>
                                    <input type=text class=tags value="jQuery,HTML,CSS,PHP,Java" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class=block>
                        <div class=header>
                            <h2>
                                Date picker
                            </h2>
                        </div>
                        <div class="content controls">
                            <div class=form-row>
                                <div class=col-md-3>
                                    Date:
                                </div>
                                <div class=col-md-9>
                                    <div class=input-group>
                                        <div class=input-group-addon>
                                            <span class=icon-calendar-empty>
                                            </span>
                                        </div>
                                        <input type=text class="datepicker form-control" value="09/15/2013" />
                                    </div>
                                </div>
                            </div>
                            <div class=form-row>
                                <div class=col-md-3>
                                    Multiple:
                                </div>
                                <div class=col-md-9>
                                    <div class=input-group>
                                        <div class=input-group-addon>
                                            <span class=icon-calendar>
                                            </span>
                                        </div>
                                        <input type=text class="mdatepicker form-control" value="09/15/2013" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class=block>
                        <div class=header>
                            <h2>
                                Time picker
                            </h2>
                        </div>
                        <div class="content controls">
                            <div class=form-row>
                                <div class=col-md-3>
                                    Time:
                                </div>
                                <div class=col-md-9>
                                    <div class=input-group>
                                        <div class=input-group-addon>
                                            <span class=icon-time>
                                            </span>
                                        </div>
                                        <input type=text class="timepicker form-control" value="12:17" />
                                    </div>
                                </div>
                            </div>
                            <div class=form-row>
                                <div class=col-md-3>
                                    Date and time:
                                </div>
                                <div class=col-md-9>
                                    <div class=input-group>
                                        <div class=input-group-addon>
                                            <span class=icon-globe>
                                            </span>
                                        </div>
                                        <input type=text class="datetimepicker form-control" value="09/15/2013 12:17"
                                        />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class=block>
                        <div class=header>
                            <h2>
                                Slider
                            </h2>
                        </div>
                        <div class="content controls">
                            <div class=form-row>
                                <div class=col-md-3>
                                    Default:
                                </div>
                                <div class=col-md-9>
                                    <div id=slider>
                                    </div>
                                </div>
                            </div>
                            <div class=form-row>
                                <div class=col-md-3>
                                    Range:
                                </div>
                                <div class=col-md-9>
                                    <div id=slider2>
                                    </div>
                                </div>
                            </div>
                            <div class=form-row>
                                <div class=col-md-3>
                                    Vertical:
                                </div>
                                <div class=col-md-9>
                                    <div id=slider3 style=height:150px>
                                    </div>
                                    <div id=slider4 style=height:150px>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>

</html>