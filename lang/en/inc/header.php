<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Cosmix Free HTML5 Responsive Template | Template Stock</title>
    <!--Bootstrap-->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <!--Stylesheets-->
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <!--Responsive-->
    <link rel="stylesheet" type="text/css" href="css/responsive.css">
    <!--Animation-->
    <link rel="stylesheet" type="text/css" href="css/animate.css">
    <!--Prettyphoto-->
    <link rel="stylesheet" type="text/css" href="css/prettyPhoto.css">
    <!--Font-Awesome-->
    <link rel="stylesheet" type="text/css" href="css/font-awesome.css">
    <!--Owl-Slider-->
    <link rel="stylesheet" type="text/css" href="css/owl.carousel.css">
    <link rel="stylesheet" type="text/css" href="css/owl.theme.css">
    <link rel="stylesheet" type="text/css" href="css/owl.transitions.css">
    <link rel="stylesheet" type="text/css" href="css/flag-icons.min.css">
    <!--[if lt IE 9]>
    <scriptsrc="<?= $_SERVER['cdn'] ?>/js/html5shiv.js"></script>
    <scriptsrc="<?= $_SERVER['cdn'] ?>/js/respond.min.js"></script>
  [endif]-->
</head>

<body data-spy="scroll" data-target=".navbar-default" data-offset="100">
    <!--Preloader-->
    <div id="preloader">
        <div id="pre-status">
            <div class="preload-placeholder"></div>
        </div>
    </div>
    <!--Navigation-->
    <header id="menu">
        <div class="navbar navbar-default navbar-fixed-top">
            <div class="container">
                <div class="container-fluid">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
                        <a class="navbar-brand" href="#menu"><img height="110%" width="110%" class="img-fluid" src="<?= $_SERVER['cdn'] ?>/images/Logo/mohamed alomeda2.png" alt=""></a>
                    </div>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav">
                            <li class="active"><a class="scroll" href="index.php">Home</a></li>
                            <li><a class="scroll" href="#about">About</a></li>
                            <li><a class="scroll" href="#service">Service</a></li>
                            <li><a class="scroll" href="#features">Features</a></li>
                            <li><a class="scroll" href="employee.php">Find an employee</a></li>
                            <li><a class="scroll" href="joboffers.php">Find jobs</a></li>
                            <li><a class="scroll" href="index.php#contact">Contact</a></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><span class="fi fi-en"></span> <span class="caret"></span></a>
                                <ul class="dropdown-menu dropdown-menu-langs" role="menu">
                                    <li><a href="index.php?lang=it"><span class="fi fi-it"></span></a></li>
                                    <li><a href="index.php?lang=ar"><span class="fi fi-eg"></span></a></li>
                                    <li><a href="index.php?lang=gr"><span class="fi fi-de"></span></a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <!-- /.navbar-collapse -->
                </div>
                <!-- /.container-fluid -->
            </div>
        </div>
    </header>
    <!--Slider-Start-->
    <section id="slider">
        <div id="home-carousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="item active" style="background-image:url(<?= $_SERVER['cdn'] ?>/images/Slider/01.jpg)">
                    <div class="carousel-caption container">
                        <div class="row">
                            <div class="col-md-7 col-sm-12 col-xs-12">
                                <h1>We Are Cosmix <?= $_server['hostname'] ?></h1>
                                <h2>Creative Themes</h2>
                                <p>Cosmix – A One Page Parallax, HTML5 and Responsive Template suitable for any creative business agency. Multiple pages also included in this theme with lots of CSS and JQuery animations</p>
                                <a href="signup_employee.php"><button class="btn btn-danger btn-lg">Submit your profile</button></a>
                                <a href="add_job.php"><button class="btn btn-danger btn-lg">Submit your job offer</button></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item" style="background-image:url(<?= $_SERVER['cdn'] ?>/images/Slider/02.jpg)">
                    <div class="carousel-caption container">
                        <div class="row">
                            <div class="col-md-7 col-sm-12 col-xs-12">
                                <h1>We Are Cosmix</h1>
                                <h2>Creative Themes</h2>
                                <p>Cosmix – A One Page Parallax, HTML5 and Responsive Template suitable for any creative business agency. Multiple pages also included in this theme with lots of CSS and JQuery animations</p>
                                <a href="signup_employee.php"><button class="btn btn-danger btn-lg">Submit your profile</button></a>
                                <a href="add_job.php"><button class="btn btn-danger btn-lg">Submit your job offer</button></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item" style="background-image:url(<?= $_SERVER['cdn'] ?>/images/Slider/03.jpg)">
                    <div class="carousel-caption container">
                        <div class="row">
                            <div class="col-md-7 col-sm-12 col-xs-12">
                                <h1>We Are Cosmix</h1>
                                <h2>Creative Themes</h2>
                                <p>Cosmix – A One Page Parallax, HTML5 and Responsive Template suitable for any creative business agency. Multiple pages also included in this theme with lots of CSS and JQuery animations</p>
                                <a href="signup_employee.php"><button class="btn btn-danger btn-lg">Submit your profile</button></a>
                                <a href="add_job.php"><button class="btn btn-danger btn-lg">Submit your job offer</button></a>
                            </div>
                        </div>
                    </div>
                </div>
                <a class="home-carousel-left" href="#home-carousel" data-slide="prev"><i class="fa fa-angle-left"></i></a> <a class="home-carousel-right" href="#home-carousel" data-slide="next"><i class="fa fa-angle-right"></i></a>
            </div>
        </div>
        <!--/#home-carousel-->
    </section>