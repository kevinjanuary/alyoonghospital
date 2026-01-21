<!DOCTYPE html>
<html lang="en" dir="<?php if ($text_align == 'right-to-left') echo 'rtl';?>">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="A complete and most powerful hospital management system for all. Purchase and enjoy">
    <meta name="author" content="<?php echo base_url() ?>optimum LINKUP COMPUTERS">
		<?php 
		//////////LOADING SYSTEM SETTINGS FOR ALL PAGES AND ACCOUNTS/////////
		$system_title	=	$this->db->get_where('settings' , array('type'=>'system_title'))->row()->description;
		?>

    <link rel="icon"  sizes="16x16" href="<?php echo base_url() ?>uploads/logo.png">
    <title><?php echo $page_title;?>&nbsp;|&nbsp;<?php echo $system_title;?></title>
    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url() ?>optimum/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="<?php echo base_url() ?>optimum/plugins/bower_components/bootstrap-extension/css/bootstrap-extension.css" rel="stylesheet">
    <!-- Menu CSS -->
    <link href="<?php echo base_url() ?>optimum/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css" rel="stylesheet">
    <!-- morris CSS -->
    <link href="<?php echo base_url() ?>optimum/plugins/bower_components/morrisjs/morris.css" rel="stylesheet">
    <!-- animation CSS -->
    <link href="<?php echo base_url() ?>optimum/css/animate.css" rel="stylesheet">
    <!-- Custom CSS -->
    <?php if ($text_align == 'right-to-left') { ?>
    <link href="<?php echo base_url() ?>optimum/css/style-rtl.css" rel="stylesheet">
    <?php } else { ?>
    <link href="<?php echo base_url() ?>optimum/css/style.css" rel="stylesheet">
    <?php } ?>
    <!-- color CSS -->
    <link href="<?php echo base_url() ?>optimum/css/colors/green.css" id="theme" rel="stylesheet">
	<link href="<?php echo base_url() ?>optimum/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url() ?>optimum/plugins/bower_components/html5-editor/bootstrap-wysihtml5.css" />
	
	 <link href="<?php echo base_url() ?>optimum/plugins/bower_components/bootstrap-datepicker/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url() ?>optimum/plugins/bower_components/custom-select/custom-select.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url() ?>optimum/plugins/bower_components/switchery/dist/switchery.min.css" rel="stylesheet" />
    <link href="<?php echo base_url() ?>optimum/plugins/bower_components/bootstrap-select/bootstrap-select.min.css" rel="stylesheet" />
    <link href="<?php echo base_url() ?>optimum/plugins/bower_components/bootstrap-tagsinput/dist/bootstrap-tagsinput.css" rel="stylesheet" />
    <link href="<?php echo base_url() ?>optimum/plugins/bower_components/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.css" rel="stylesheet" />
    <link href="<?php echo base_url() ?>optimum/plugins/bower_components/multiselect/css/multi-select.css" rel="stylesheet" type="text/css" />
	
	    <link href="<?php echo base_url() ?>optimum/plugins/bower_components/Magnific-Popup-master/dist/magnific-popup.css" rel="stylesheet">
		<link href="<?php echo base_url() ?>optimum/plugins/bower_components/icheck/skins/all.css" rel="stylesheet">

    <link href="<?php echo base_url() ?>optimum/plugins/bower_components/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
    <link href="https://cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url() ?>optimum/plugins/bower_components/clockpicker/dist/jquery-clockpicker.min.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>optimum/plugins/bower_components/calendar/dist/fullcalendar.css" rel="stylesheet" />
    <link href="<?php echo base_url() ?>optimum/plugins/bower_components/toast-master/css/jquery.toast.css" rel="stylesheet">


	<!--<link href="<?php echo base_url() ?>optimum/fullcalendar/css/style.css" rel="stylesheet">-->


	
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->

    <!-- Custom CSS Overrides for Soft UI Theme -->
    <style>
        /* Import Font */
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');

        body, html {
            background-color: #f0f7fd !important; /* Soft Light Blue Background */
            font-family: 'Poppins', sans-serif !important;
        }

        #page-wrapper, .page-wrapper {
            background: #f0f7fd !important;
        }
        
        /* Ensure container fluid also matches or is transparent */
        .container-fluid {
             background: transparent !important;
        }

        /* --- Start Navbar Styling --- */
        .navbar-static-top {
            background: #d6eaff !important; /* Light Pastel Blue */
            box-shadow: 0 4px 10px rgba(0,0,0,0.03) !important;
            border: none !important;
        }
        
        .navbar-header {
            background: transparent !important;
        }
        
        .sidebar-nav {
             background: transparent !important;
        }

        .top-left-part .logo b {
            color: #333 !important;
        }
        
        /* Search Input */
        .app-search .form-control {
            border-radius: 20px !important;
            border: 1px solid #fff !important;
            background-color: #fff !important;
            box-shadow: 0 2px 5px rgba(0,0,0,0.05);
            color: #555 !important;
            height: 35px;
            margin-top: 15px;
        }
        .app-search a {
            top: 15px;
            color: #888;
        }
        
        /* User Profile in Nav */
        .navbar-top-links .dropdown-toggle {
            color: #444 !important;
        }
        /* --- End Navbar Styling --- */


        /* --- Start Sidebar Styling --- */
        .sidebar, .navbar-default.sidebar {
            background-color: #ffffff !important;
            box-shadow: 5px 0 15px rgba(0,0,0,0.02) !important;
            padding-top: 10px;
        }
        
        .img-circle {
            aspect-ratio: 1/1;
            object-fit: cover;
        }

        #side-menu > li > a {
            color: #666 !important;
            font-weight: 500;
            font-size: 13px;
            padding: 12px 20px;
            border-left: 4px solid transparent;
            transition: all 0.3s;
        }

        #side-menu > li > a i {
            color: #999 !important;
            font-size: 16px;
            margin-right: 10px;
        }

        /* Active & Hover State */
        #side-menu > li > a.active, 
        #side-menu > li > a:hover {
            background: #f8fbff !important;
            color: #00A3C4 !important;
            border-left: 4px solid #00A3C4;
        }

        #side-menu > li > a.active i, 
        #side-menu > li > a:hover i {
            color: #00A3C4 !important;
        }

        /* Submenu */
        .nav-second-level {
            background: #ffffff !important;
        }
        .nav-second-level li a {
            padding-left: 45px !important;
            color: #777 !important;
        }
        .nav-second-level li a:hover {
            color: #00A3C4 !important;
        }
        /* --- End Sidebar Styling --- */


        /* --- Start Dashboard Cards (White Box) Styling --- */
        
        /* Override generic white-box to have rounded corners */
        .white-box {
            background: #ffffff !important;
            border-radius: 20px !important;
            padding: 30px 20px !important;
            box-shadow: 0 10px 30px rgba(0,0,0,0.03) !important;
            border: none !important;
            margin-bottom: 25px;
        }

        /* Force bg-colored boxes to be white in Dashboard */
        /* Using high specificity */
        .row .col-md-3 .white-box.bg-danger, 
        .row .col-md-3 .white-box.bg-info, 
        .row .col-md-3 .white-box.bg-success, 
        .row .col-md-3 .white-box.bg-purple, 
        .row .col-md-3 .white-box.bg-warning {
            background-color: #ffffff !important;
            color: #333 !important;
        }

        /* Re-style the content of the stats card */
        .r-icon-stats {
            display: flex !important;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
        }

        /* The Icon Circle */
        .r-icon-stats i {
            width: 70px;
            height: 70px;
            border-radius: 50%;
            text-align: center;
            font-size: 28px;
            color: #fff !important;
            margin: 0 0 15px 0 !important;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            float: none !important;
            display: inline-block;
        }

        /* Specific Colors for Icons based on parent class or self class */
        .r-icon-stats i.bg-danger { background-color: #FF6B81 !important; }
        .r-icon-stats i.bg-info   { background-color: #2DCEE3 !important; } /* Cyan */
        .r-icon-stats i.bg-success{ background-color: #8BC34A !important; } /* Green */
        .r-icon-stats i.bg-purple { background-color: #AE8BFF !important; }
        .r-icon-stats i.bg-warning{ background-color: #FFB74D !important; }

        /* Fix Text Colors */
        .bodystate {
            text-align: center;
            padding: 0 !important;
            margin: 0 !important;
            float: none !important;
        }

        .bodystate h4 {
            margin: 5px 0 !important;
        }

        .bodystate h4 strong {
            color: #333 !important; /* Override the inline style="color:white" */
            font-size: 32px !important;
            font-weight: 700;
        }

        .bodystate span.text-muted a {
            color: #888 !important;
            text-transform: capitalize;
            font-size: 14px;
            letter-spacing: 0.5px;
        }
        /* --- End Dashboard Cards Styling --- */
        
        /* Panels matching the style */
        .panel {
            border-radius: 20px !important;
            border: none !important;
            box-shadow: 0 10px 30px rgba(0,0,0,0.03) !important;
            background: #fff;
        }
        .panel-heading {
            background-color: transparent !important;
            color: #555 !important;
            border-bottom: 1px solid #f0f0f0 !important;
            font-weight: 600;
            padding: 20px !important;
            font-size: 14px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        .panel-body {
            padding: 20px !important;
        }

        /* Buttons */
        .btn-rounded {
            border-radius: 30px !important;
        }
        
        /* Message Center / Quick List Styles */
        .message-center a {
            border-bottom: 1px solid #fcfcfc;
        }
        .message-center .user-img img {
            width: 45px;
            height: 45px;
            box-shadow: 0 3px 10px rgba(0,0,0,0.1);
        }
        .mail-contnet h5 {
            font-weight: 600;
            color: #333;
        }
        
        /* Logo text fix */
        .logo b { color: #333 !important; }
        .logo span { color: #333 !important; }
        
        /* Page Title */
        .page-title {
            color: #444 !important;
            font-weight: 600;
        }

    </style>
</head>
<body>
