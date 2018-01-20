<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Project Management</title>

    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Theme CSS -->
    <link href="css/freelancer.min.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body id="page-top" class="index">

    <!-- Navigation -->
    <nav id="mainNav" class="navbar navbar-default navbar-fixed-top navbar-custom">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="#page-top">Project Management</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                   
                    <li class="page-scroll">
                        <a href="#about">Information</a>
                    </li>
                    <li class="page-scroll">
                        <a href="#contact">Contact</a>
                    </li>
                    <!--
                    <li class="page-scroll">
                        <a href="#log-reg">Login/Register</a>
                    </li>
                    -->
                    
                    <li class="page-scroll">
                        <a href="#register"><span class="glyphicon glyphicon-user"></span> Sign Up</a>
                    </li>
                    <li class="page-scroll"> 
                        <a href="#login"><span class="glyphicon glyphicon-log-in"></span> Login</a>
                    </li>

                    <li class="page-scroll">
                        <a href="" data-toggle="modal" data-target="#myModalTest"><span class="glyphicon glyphicon-user"></span> Test</a>
                    </li>
                    
                 
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

    <!-- Header -->
    <header>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <img class="img-responsive" src="img/eiu.gif" alt="">
                    <div class="intro-text">
                        <span class="name">Project Management</span>
                        <hr class="star-light">
                        <span class="skills">Designed by Skyblue</span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    
    <!--myadd -->
    <section class="success" id="myModalTest">
        <div class="container">                
                    <!-- Modal -->
                    <div class="modal fade" id="myModalTest" role="dialog" aria-labelledby="myModalLabel">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">ModifyBook</h4>
                          </div>
                          <div class="modal-body">
                              <p> Test modal </p>
                              
                          </div>
                          <div class="modal-footer">
                            <button onclick="reload();" type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button id="btn-edittype" onclick="editbook(<?php echo $row['IDbook']; ?>);" type="button" class="btn btn-primary">
                                <div id="loadeditbook<?php echo $row['IDbook']; ?>"><i class="fa fa-check-square-o" aria-hidden="true"></i> Save</div>
                            </button>
                            
                          </div>
                        </div>
                      </div>
                    </div>

            </div>
    </section>                
    <!-- end Modal chỉnh sửa -->




    <!-- About Section -->
    <section class="success" id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>EIU</h2>
                    <hr class="star-light">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-lg-offset-2">
                    <p>School of Engineering</p>
                </div>
                <div class="col-lg-4">
                    <p>Department of Computer Networks and Communications!</p>
                </div>
                <div class="col-lg-12 text-center">
                    <p id="demo" style="display:none"> More information of this project...</p>
                    
                </div>
                

                <div class="col-lg-8 col-lg-offset-2 text-center">
                    <a class="btn btn-lg btn-outline" onclick="document.getElementById('demo').style.display='block'">
                        <i class="fa fa-download"></i> More...
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>Contact Me</h2>
                    <hr class="star-primary">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <!-- To configure the contact form email address, go to mail/contact_me.php and update the email address in the PHP file on line 19. -->
                    <!-- The form should work on most web servers, but if the form is not working you may need to configure your web server differently. -->
                    <form name="sentMessage" id="contactForm" novalidate>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>Name</label>
                                <input type="text" class="form-control" placeholder="Name" id="name" required data-validation-required-message="Please enter your name.">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>Email Address</label>
                                <input type="email" class="form-control" placeholder="Email Address" id="email" required data-validation-required-message="Please enter your email address.">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>Phone Number</label>
                                <input type="tel" class="form-control" placeholder="Phone Number" id="phone" required data-validation-required-message="Please enter your phone number.">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>Message</label>
                                <textarea rows="5" class="form-control" placeholder="Message" id="message" required data-validation-required-message="Please enter a message."></textarea>
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <br>
                        <div id="success"></div>
                        <div class="row">
                            <div class="form-group col-xs-12">
                                <button type="submit" class="btn btn-success btn-lg">Send</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- Login Section -->
<script type="text/javascript">
function checklog(){
        $('#loadlog').html('<i class="fa fa-spinner fa-pulse fa-fw"></i> Checking...');
        setTimeout(function(){
            $('#resultlog').load('checklog.php',$('#form-log').serializeArray());
            $('#loadlog').html('<i class="fa fa-check-square-o" aria-hidden="true"></i> Login');
        },1000);
        
    }

function checkreg(){
        $('#loadreg').html('<i class="fa fa-spinner fa-pulse fa-fw"></i> Checking...');
        setTimeout(function(){
            $('#resultreg').load('checkreg.php',$('#form-reg').serializeArray());
            $('#loadreg').html('<i class="fa fa-check-square-o" aria-hidden="true"></i> Đăng kí');
        },1000);
        
    }

</script>

    <section class="success" id="login">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>Login</h2>
                    <hr class="star-light">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    
                    <form id="form-log" method="POST">
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" name="username" placeholder="Enter username">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" name="password" placeholder="Enter password">
                        </div>
                        
                        
                    </form>
                    <h5 id="resultlog"></h5>
                    <div class="checkbox">
                        <label><input type="checkbox"> Remember me</label>
                    </div>
                   <center>
                       <button class="btn btn-lg btn-outline" onclick="checklog();">
                           <div id="loadlog">
                               <i type="submit" class="fa fa-check-square-o" aria-hidden="true"></i> Login
                           </div>
                       </button>
                   </center>
                </div>
                
            </div>
        </div>
    </section>

    <section class="primary" id="register">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>Register</h2>
                    <hr class="star-light">
                </div>
            </div>
            <div class="row">
                
                <div class="col-lg-8 col-lg-offset-2">
                    
                    <form id="form-reg" method="POST">
                        <input type="text" class="form-control" name="user" placeholder="enter username">
                        <input type="password" class="form-control" name="pass" placeholder="enter password">
                        <input type="password" class="form-control" name="re-pass" placeholder="enter re-password">
                    </form>
                    <h5 id="resultreg"></h5>
                    <center>
                       <button class="btn btn-lg btn-success" onclick="checkreg();">
                           <div id="loadreg">
                               <i class="fa fa-check-square-o" aria-hidden="true"></i> Register
                           </div>
                       </button>
                   </center>
                </div>
                
            </div>
        </div>
    </section>


<?php require_once("../incfiles/end.php"); ?> 
