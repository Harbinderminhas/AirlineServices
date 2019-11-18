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
<div class="inner_page_about">
    <?php
    include "searchForm.php";
    ?>
</div>