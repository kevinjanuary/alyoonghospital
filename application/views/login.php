<?php $system_name = $this->db->get_where('settings', array('type' => 'system_name'))->row()->description;
$system_title = $this->db->get_where('settings', array('type' => 'system_title'))->row()->description;
$abb = $this->db->get_where('settings', array('type' => 'abb'))->row()->description;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon"  sizes="16x16" href="<?php echo base_url() ?>uploads/logo.png">
    <title>Welcome ~ <?php echo $system_title;?></title>
    <!-- Bootstrap Core CSS -->
    <link href="optimum/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="optimum/plugins/bower_components/bootstrap-extension/css/bootstrap-extension.css" rel="stylesheet">
    <!-- animation CSS -->
    <link href="optimum/css/animate.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="optimum/css/style.css" rel="stylesheet">
    <!-- color CSS -->
    <link href="optimum/css/colors/default.css" id="theme" rel="stylesheet">
    <link href="optimum/plugins/bower_components/toast-master/css/jquery.toast.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            overflow-x: hidden;
            background: #fff;
            margin: 0;
            padding: 0;
        }
        
        /* Layout */
        .login-container {
            display: flex;
            min-height: 100vh;
            width: 100%;
        }
        
        .login-left {
            flex: 1;
            background-color: #f0f4f7;
            /* Placeholder Medical Building Image */
            background-image: url('https://images.unsplash.com/photo-1519494026892-80bbd2d6fd0d?q=80&w=2000&auto=format&fit=crop'); 
            background-size: cover;
            background-position: center;
            position: relative;
            display: none; /* Hidden on mobile by default */
        }
        
        .login-left::before {
            content: '';
            position: absolute;
            top: 0; left: 0; right: 0; bottom: 0;
            background: rgba(0, 80, 80, 0.3); /* Slight overlay */
    }

    .login-left-content {
        position: absolute;
        align-items: center;
            top: 0; bottom: 0; left: 0; right: 0;
            display: flex;
            justify-content: center;
            z-index: 2;
        }
        
        .login-left-text {
            font-size: 3.5rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 2px;
            color: #0d3c61; /* Dark blue from image */
            text-shadow: 2px 2px 4px rgba(255,255,255,0.5);
            text-align: center;
            padding: 20px;
        }

        .login-right {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px;
            background: white;
            position: relative;
            flex-direction: column;
        }

        .login-form-wrapper {
            width: 100%;
            max-width: 400px;
            text-align: center;
        }

        /* Responsive */
        @media (min-width: 992px) {
            .login-left {
                display: block;
            }
        }

        /* Branding */
        .brand-logo {
            width: 70px;
            height: 70px;
            background: #00A3C4;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            box-shadow: 0 4px 10px rgba(0, 163, 196, 0.3);
        }
        
        .brand-icon {
            font-size: 30px;
            color: white;
        }
        
        .brand-logo img {
            max-width: 40px;
            max-height: 40px;
            filter: brightness(0) invert(1);
        }
        
        .brand-title {
            color: #0d3c61;
            font-weight: 700;
            font-size: 22px;
            margin-bottom: 5px;
            text-transform: uppercase;
        }
        
        .brand-subtitle {
            color: #999;
            font-size: 13px;
            margin-bottom: 35px;
            font-weight: 400;
        }

        /* Form Controls */
        .custom-input-group {
            position: relative;
            margin-bottom: 15px;
        }
        
        .custom-input-group i {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #6c757d;
            font-size: 14px;
            z-index: 10;
        }

        .form-control-custom {
            width: 100%;
            height: 45px;
            padding-left: 45px;
            padding-right: 15px;
            border: 1px solid #eaeaea;
            border-radius: 6px;
            font-size: 14px;
            transition: all 0.3s;
            box-shadow: none;
            color: #333;
            background-color: #fff;
        }
        
        .form-control-custom:focus {
            border-color: #00A3C4;
            box-shadow: 0 0 0 3px rgba(0, 163, 196, 0.1);
            outline: none;
        }
        
        .form-control-custom::placeholder {
            color: #bbb;
        }

        .form-options {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
            font-size: 13px;
            margin-top: 10px;
        }
        
        .remember-me {
            display: flex;
            align-items: center;
            color: #666;
            cursor: pointer;
            font-weight: 400;
        }
        
        .remember-me input {
            margin-right: 8px;
            width: 16px;
            height: 16px;
            cursor: pointer;
        }
        
        .forgot-link {
            color: #00A3C4;
            text-decoration: none;
            font-weight: 500;
            transition: color 0.2s;
        }
        
        .forgot-link:hover {
            color: #007a93;
        }

        .btn-login {
            background-color: #00A3C4;
            color: white;
            font-weight: 600;
            height: 45px;
            border-radius: 6px;
            font-size: 14px;
            border: none;
            width: 100%;
            cursor: pointer;
            transition: all 0.3s;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            box-shadow: 0 4px 12px rgba(0, 163, 196, 0.4);
        }
        
        .btn-login:hover {
            background-color: #008ba8;
            transform: translateY(-1px);
            box-shadow: 0 6px 15px rgba(0, 163, 196, 0.5);
        }

        .signup-link {
            margin-top: 25px;
            font-size: 13px;
            color: #888;
        }
        
        .signup-link a {
            color: #00A3C4;
            font-weight: 600;
            text-decoration: none;
            margin-left: 5px;
        }

        /* Quick Login Testing */
        .quick-login-area {
            margin-top: 40px;
            border-top: 1px solid #f0f0f0;
            padding-top: 20px;
        }
        
        .quick-title {
            font-size: 10px;
            color: #aaa;
            margin-bottom: 15px;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-weight: 600;
        }

        .quick-btn {
            border-radius: 50px;
            padding: 6px 14px;
            font-size: 11px;
            margin: 4px;
            border: none;
            color: white;
            cursor: pointer;
            transition: transform 0.2s;
            font-weight: 500;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        
        .quick-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0,0,0,0.15);
        }
        
        .bg-admin { background: #00A3C4; }
        .bg-doctor { background: #66BB6A; }
        .bg-nurse { background: #FFA726; }
        .bg-patient { background: #42A5F5; }
        .bg-reception { background: #78909C; }

    </style>
</head>

<body>
		
    <!-- Preloader -->
    <div class="preloader">
        <div class="cssload-speeding-wheel"></div>
    </div>
	
    <div class="login-container">
        <!-- Left Side - Image Placeholder -->
        <div class="login-left">
            <div class="login-left-content">
                 <div class="login-left-text"><?php echo $system_name ? $system_name : 'Alyoong Hospital';?></div>
            </div>
        </div>

        <!-- Right Side - Login Form -->
        <div class="login-right">
            <div class="login-form-wrapper">
                <!-- Logo & Header -->
                <!-- Check if logo exists, if not use icon -->
                <?php if(file_exists('uploads/logo.png')): ?>
                    <img src="<?php echo base_url() ?>uploads/logo.png" alt="Logo" width="200" height="80" style="height: 80px;width: auto">
                <?php else: ?>
                    <div class="brand-logo">
                        <i class="fa fa-hospital-o brand-icon"></i>
                    </div>
                    <h2 class="brand-title"><?php echo $system_name ? $system_name : 'Alyoong Hospital';?></h2>
                <?php endif; ?>
                
                <p class="brand-subtitle">Welcome back! Please login to your account</p>
                
                <!-- Login Form -->
                <?php echo form_open('login/check_detail' , array('id' => 'loginform'));?>
                    
                    <div class="custom-input-group">
                        <i class="fa fa-user"></i>
                        <input class="form-control-custom" type="email" name="email" required="" placeholder="<?php echo get_phrase('email');?>">
                    </div>

                    <div class="custom-input-group">
                        <i class="fa fa-lock"></i>
                        <input class="form-control-custom" type="password" name="password" required="" placeholder="<?php echo get_phrase('password');?>">
                    </div>

                    <div class="form-options">
                        <label class="remember-me">
                            <input id="checkbox-signup" type="checkbox"> 
                            <?php echo get_phrase('remember_me');?>
                        </label>
                        <a href="javascript:void(0)" id="to-recover" class="forgot-link"><?php echo get_phrase('forgot_password?');?></a>
                    </div>

                    <button class="btn-login" type="submit"><?php echo get_phrase('log_in');?></button>
                
                <?php echo form_close();?>

                <div class="signup-link">
                   Don't have an account? <a href="#">Sign Up</a>
                </div>

                <!-- Recovery Form -->
                 <?php echo form_open('login/reset_password' , array('id' => 'recoverform', 'style' => 'display:none; margin-top:20px; text-align:left;'));?>
                    <h4 class="brand-title" style="font-size:18px; text-align:center;">Reset Password</h4>
                    <p class="text-muted" style="text-align:center; font-size:12px; margin-bottom:20px;">Enter your Email and instructions will be sent to you! </p>
                    
                    <div class="custom-input-group">
                        <i class="fa fa-envelope"></i>
                        <input class="form-control-custom" type="email" name="email" required="" placeholder="<?php echo get_phrase('email');?>">
                    </div>
                    
                    <div class="form-group" style="margin-top:20px;">
                        <button class="btn-login" type="submit" style="margin-bottom:10px;"><?php echo get_phrase('reset');?></button>
                        <button class="btn-login" type="button" id="to-login" style="background:#fff; color:#666; border:1px solid #ddd; box-shadow:none;"><?php echo get_phrase('back_to_login');?></button>
                    </div>
                <?php echo form_close();?>

                <!-- Quick Login Buttons -->
                 <div class="quick-login-area">
                    <p class="quick-title">Quick Login (Testing)</p>
                    <button class="quick-btn bg-admin" id="admin">Admin</button>
                    <button class="quick-btn bg-doctor" id="doctor">Doctor</button>
                    <button class="quick-btn bg-nurse" id="nurse">Nurse</button>
                    <button class="quick-btn bg-patient" id="patient">Patient</button>
                    <button class="quick-btn bg-reception" id="receptionist">Reception</button>
                 </div>

            </div>
        </div>
    </div>


    <!-- jQuery -->
    <script src="optimum/plugins/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="optimum/bootstrap/dist/js/tether.min.js"></script>
    <script src="optimum/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="optimum/plugins/bower_components/bootstrap-extension/js/bootstrap-extension.min.js"></script>
    <!-- Menu Plugin JavaScript -->
    <script src="optimum/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js"></script>
    <!--slimscroll JavaScript -->
    <script src="optimum/js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="optimum/js/waves.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="optimum/js/custom.min.js"></script>
    <!-- Sparkline chart JavaScript -->
    <script src="optimum/plugins/bower_components/jquery-sparkline/jquery.sparkline.min.js"></script>
    <script src="optimum/plugins/bower_components/jquery-sparkline/jquery.charts-sparkline.js"></script>
    <!--Style Switcher -->
    <script src="optimum/plugins/bower_components/styleswitcher/jQuery.style.switcher.js"></script>
	<?php echo $tawkto = $this->db->get_where('settings', array('type' => 'tawkto'))->row()->description; ?>
	
	
	 <script type="text/javascript">
            $('#admin').click(function () {
                $("input[name=email]").val('admin@admin.com');
                $("input[name=password]").val('123456');
            });
            $('#patient').click(function () {
                $("input[name=email]").val('patient@patient.com');
                $("input[name=password]").val('123456');
            });
            $('#doctor').click(function () {
                $("input[name=email]").val('doctor@doctor.com');
                $("input[name=password]").val('123456');
            });
            $('#nurse').click(function () {
                $("input[name=email]").val('nurse@nurse.com');
                $("input[name=password]").val('123456');
            });
            $('#accountant').click(function () {
                $("input[name=email]").val('accountant@accountant.com');
                $("input[name=password]").val('123456');
            });
            $('#laboratorist').click(function () {
                $("input[name=email]").val('laboratorist@laboratorist.com');
                $("input[name=password]").val('123456');
            });
            $('#pharmacist').click(function () {
                $("input[name=email]").val('pharmacist@pharmacist.com');
                $("input[name=password]").val('123456');
            });
			 $('#receptionist').click(function () {
                $("input[name=email]").val('receptionist@receptionist.com');
                $("input[name=password]").val('123456');
            });

            // Toggle Recover Form
            $('#to-recover').on('click', function() {
                $('#loginform').slideUp(300);
                $('#recoverform').delay(300).fadeIn(300);
                $('.brand-subtitle').slideUp(300); // Hide welcome msg
            });
            
            // Back to Login
            $('#to-login').on('click', function() {
                $('#recoverform').fadeOut(300);
                $('#loginform').delay(300).slideDown(300);
                $('.brand-subtitle').delay(300).slideDown(300);
            });
        </script>
			    
	<script src="optimum/plugins/bower_components/toast-master/js/jquery.toast.js"></script>
		<?php if (($this->session->flashdata('error_message')) != ""): ?>
	<script type="text/javascript">
    $(document).ready(function() {
        $.toast({
			heading: 'Error !!!',
            text: '<?php echo $this->session->flashdata('error_message'); ?>',
            position: 'top-right',
            loaderBg: '#ff6849',
            icon: 'warning',
            hideAfter: 3500,
            stack: 6
        })
    });
    </script>
	<?php endif; ?>
	
</body>
</html>
