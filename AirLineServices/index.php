<!--index of layouts-->
<!DOCTYPE html>
<html lang="zxx">
<head>
    <?php
    include "headerfiles.html";
    ?>
</head>
<body>
<?php
include "connection.php";
?>
<!--Public Header of Layouts-->

<div class="header-w3layouts">
    <div class="container">
        <div class="header-bar">
            <nav class="navbar navbar-default">
                <div class="navbar-header navbar-left">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <h1><a class="navbar-brand" href="index.php">AIRLINE SERVICES
                        </a>
                    </h1>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">
                    <nav>
                        <ul class="nav navbar-nav">
                            <li class="active"><a href="index.php"><span class="fa fa-home banner-nav" aria-hidden="true"></span>Home</a></li>
                            <li><a href="about.php"><span class="fa fa-info-circle banner-nav" aria-hidden="true"></span>About</a></li>
                            <li><a href="services.php"><span class="fa fa-cogs banner-nav" aria-hidden="true"></span>Services</a></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="fa fa-file banner-nav" aria-hidden="true"></span>User<span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="user.php">Sign up</a>
                                    </li>
                                    <li>
                                        <a href="userLogin.php">Login</a>
                                    </li>
                                </ul>
                            </li>
                            <li><a href="gallery.php"><span class="fa fa-picture-o banner-nav" aria-hidden="true"></span>Gallery</a></li>
                            <li><a href="contact.php"><span class="fa fa-envelope-o banner-nav" aria-hidden="true"></span>Contact</a></li>
                        </ul>
                    </nav>
                </div>
            </nav>
        </div>
        <div class="clearfix"> </div>
    </div>
</div>
<?php
include "searchForm.php";
?>
<!-- Slideshow 4 -->
<div class="slider">
    <div class="callbacks_container">
        <ul class="rslides" id="slider4">
            <li>
                <div class="slider-img w3-oneimg">
                    <div class="container">
                        <div class="slider-info">
                            <h6>The</h6>
                            <h4>International <br>Airway</h4>
                            <p>WE PROVIDE YOU THE BEST AIRLINE SERVICES AND SATISFACTION OF THE CUSTOMER IS OUR MAIN
                                MOTIVE.
                            </p>
                        </div>
                    </div>
                </div>
            </li>
            <li>
                <div class="slider-img w3-twoimg">
                    <div class="container">
                        <div class="slider-info">
                            <h6>Worldwide</h6>
                            <h4>Biggest <br> Network</h4>
                            <p>WE GIVE YOU THE BEST SERVICES AND NO COMPROMISE WITH THAT.
                            </p>
                        </div>
                    </div>
                </div>
            </li>
            <li>
                <div class="slider-img w3-threeimg">
                    <div class="container">
                        <div class="slider-info">
                            <h6>Supplying</h6>
                            <h4>Secured<br> Transport</h4>
                            <p>WE PREFFER TO BUILD TRUST WITH CUSTOMERS BY PROVIDING THEM BEST SERVICES.
                            </p>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
    </div>
    <div class="clearfix"></div>
    <!-- This is here just to demonstrate the callbacks -->
    <!-- <ul class="events">
       <li>Example 4 callback events</li>
       </ul>-->
</div>
<!--//banner-->
<div class="about" id="about">
    <div class="container">
        <div class="about-banner-grids ">
            <div class="col-md-4 left-of-about">
                <h3>What We Do</h3>
                <div class=" about-matter-left">
                    <p>WE GIVE YOU THE BEST SERVICES BY PROVIDING YOU THE WORLDS BEST FIGHTS AND AND
                        WE ALSO PROVIDE YOU THE GOOD FOOD IN WHICH WE TRY OUR BEST TO MAINTAIN THE BEST QUALITY AND
                        TASTE.
                    </p>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="col-md-4 about-pic">
            </div>
            <div class="col-md-4 right-of-about">
                <div class="about-airway colo">
                    <p>IF THERE WILL BE ANY TECHNICAL PROBLEM IS OCCURING THEN WE WILL GET YOU ANOTHER FLIGHT OR WE WILL
                        GIVE YOU THE BEST HOTELS IN THE WORLD.
                    </p>
                </div>
            </div>


        </div>
    </div>
    <!--// About-->
    <!-- services-->
    <div class="services" id="services">
        <h3 class="title clr">Services</h3>
        <div class="banner-bottom-girds">
            <div class="col-md-4 col-sm-6 col-xs-6 its-banner-grid gird-ser-clr2">
                <div class="white-shadow">
                    <div class="white-left">
                        <span class="fa fa-truck banner-icon" aria-hidden="true"></span>
                    </div>
                    <div class="white-right">
                        <h4>Best Logistic</h4>
                        <p>We can provide you the best serices as we promise to our custumor and every thing will be on
                            time.</p>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-6 its-banner-grid gird-ser-clr">
                <div class="white-shadow">
                    <div class="white-left">
                        <span class="fa fa-clock-o banner-icon" aria-hidden="true"></span>
                    </div>
                    <div class="white-right">
                        <h4>Fast Delivery</h4>
                        <p>As we provide you the best services and the deleviry on time thats how we also take less time
                            then other that means we are very fast in deleviry process because the flights are always on
                            time.</p>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-6 its-banner-grid gird-ser-clr2">
                <div class="white-shadow">
                    <div class=" white-left">
                        <span class="fa fa-lock banner-icon" aria-hidden="true"></span>
                    </div>
                    <div class=" white-right">
                        <h4>Secured Service</h4>
                        <p>As we promise you for the best services there may be many things in it as fast delivery we
                            also provide you the secured services as well, we take care of each and every single thing
                            because we value your things.</p>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-6 its-banner-grid colo">
                <div class="white-shadow">
                    <div class=" white-left">
                        <span class="fa fa-archive banner-icon" aria-hidden="true"></span>
                    </div>
                    <div class="white-right">
                        <h4>Packing</h4>
                        <p>Our services are very secured and one of the reason behind that is that we pack the things in
                            very good way, we count each and every single thing with waiting some of the things as well
                            the things which needs to be waited and then we pack them properly so that not a single
                            wrong thing goes from one place to another and you can get you proper things.</p>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-6 its-banner-grid gird-ser-clr2">
                <div class="white-shadow">
                    <div class="white-right">
                        <div class="white-left">
                            <span class="fa fa-fighter-jet banner-icon" aria-hidden="true"></span>
                        </div>
                        <h4>Fly Anywhere</h4>
                        <p>We have the services in all over the world where ever the AirPort is or we can say wherever
                            the flights can go we will deliver you.</p>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-6 its-banner-grid colo">
                <div class="white-shadow">
                    <div class="white-right">
                        <div class=" white-left">
                            <span class="fa fa-home banner-icon" aria-hidden="true"></span>
                        </div>
                        <h4>Warehousing </h4>
                        <p>Every thing which will flew from us will go to the warehouse first then it will come to you
                            directly.</p>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <!--// services-->
    <!--testimonials-->
    <div class="testimonials colo" id="testimonials">
        <div class="container">
            <h3 class="title clr">testimonials</h3>
            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                </ol>
                <!-- Wrapper for slides -->
                <div class="carousel-inner">
                    <div class="item active">
                        <div class="thumbnail adjust1">
                            <div class="col-md-5 col-sm-5 right-says">
                                <img class="img-responsive" src="images/t1.jpg" alt="">
                            </div>
                            <div class="col-md-7 col-sm-7 client-img">
                                <div class="caption">
                                    <p><span class="fa fa-quote-left client-quote" aria-hidden="true"></span>Lorem ipsum
                                        dolor sit amet, consectetur adipiscing elit.
                                        Etiam sed odio consequat, tristique elit sed, molestie nulla.
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                        Etiam sed odio consequat, tristique elit sed, molestie nulla.<span
                                                class="fa fa-quote-right client-quote" aria-hidden="true"></span>
                                    </p>
                                </div>
                                <blockquote class="adjust2">
                                    <h6>Lois Wlly</h6>
                                </blockquote>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="thumbnail adjust1">
                            <div class="col-md-5 col-sm-5 right-says">
                                <img class="img-responsive" src="images/t2.jpg" alt="">
                            </div>
                            <div class="col-md-7 col-sm-7 client-img">
                                <div class="caption">
                                    <p><span class="fa fa-quote-left client-quote" aria-hidden="true"></span>Lorem ipsum
                                        dolor sit amet, consectetur adipiscing elit.
                                        Etiam sed odio consequat, tristique elit sed, molestie nulla.
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                        Etiam sed odio consequat, tristique elit sed, molestie nulla.<span
                                                class="fa fa-quote-right client-quote" aria-hidden="true"></span>
                                    </p>
                                </div>
                                <blockquote class="adjust2">
                                    <h6>Max Willson</h6>
                                </blockquote>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="thumbnail adjust1">
                            <div class="col-md-5 col-sm-5 right-says">
                                <img class=" img-responsive" src="images/t3.jpg" alt="">
                            </div>
                            <div class="col-md-7 col-sm-7 client-img">
                                <div class="caption">
                                    <p><span class="fa fa-quote-left client-quote" aria-hidden="true"></span>Lorem ipsum
                                        dolor sit amet, consectetur adipiscing elit.
                                        Etiam sed odio consequat, tristique elit sed, molestie nulla.
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                        Etiam sed odio consequat, tristique elit sed, molestie nulla.<span
                                                class="fa fa-quote-right client-quote" aria-hidden="true"></span>
                                    </p>
                                </div>
                                <blockquote class="adjust2">
                                    <h6>Kenny East</h6>
                                </blockquote>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Controls -->
                <!--<a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                   <span class="fa fa-chevron-left"></span> </a>
                   <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                   <span class="fa fa-chevron-right"></span> </a>
                   </div> </div> -->
                <!--// testimonials-->
            </div>
        </div>
    </div>
    <!--partners-->
    <div class="parnters" id="parnters">
        <div class="container">
            <h3 class="title clr">Our Partners</h3>
            <div class="flexslider-info">
                <section class="slider side-side">
                    <div class="flexslider">
                        <ul class="slides">
                            <li>
                                <div class="col-md-3 col-sm-3 col-xs-3 usr-img">
                                    <img src="images/logo1.jpg" alt="logo1" class="img-responsive">
                                </div>
                                <div class="col-md-3 col-sm-3 col-xs-3 usr-img">
                                    <img src="images/logo2.jpg" alt="logo1" class="img-responsive">
                                </div>
                                <div class="col-md-3 col-sm-3 col-xs-3 usr-img">
                                    <img src="images/logo3.jpg" alt="logo1" class="img-responsive">
                                </div>
                                <div class="col-md-3 col-sm-3 col-xs-3 usr-img">
                                    <img src="images/logo1.jpg" alt="logo1" class="img-responsive">
                                </div>
                            </li>
                            <li>
                                <div class="col-md-3 col-sm-3 col-xs-3 usr-img">
                                    <img src="images/logo1.jpg" alt="logo1" class="img-responsive">
                                </div>
                                <div class="col-md-3 col-sm-3 col-xs-3 usr-img">
                                    <img src="images/logo2.jpg" alt="logo1" class="img-responsive">
                                </div>
                                <div class="col-md-3 col-sm-3 col-xs-3 usr-img">
                                    <img src="images/logo3.jpg" alt="logo1" class="img-responsive">
                                </div>
                                <div class="col-md-3 col-sm-3 col-xs-3 usr-img">
                                    <img src="images/logo1.jpg" alt="logo1" class="img-responsive">
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="clearfix"></div>
                </section>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
    <!--//partners -->
    <?php
    include "footer.php";
    ?>
</body>
</html>