<?php
include "connection.php";
session_start();
include_once "headerfiles.html";
if (!isset($_SESSION["admin_username"])) {
    header("location:admin_login.php");
} else {
    $username = $_SESSION["admin_username"];
}
?>
<div class="header-w3layouts">
    <div class="container">
        <div class="header-bar">
            <nav class="navbar navbar-default">
                <div class="navbar-header navbar-left">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                            data-target="#bs-example-navbar-collapse-1">
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
                            <li class="active"><a href="admin_home.php"><span class="fa fa-home banner-nav"
                                                                              aria-hidden="true"></span>Home</a></li>
                            <li class="dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown"><span
                                            class="fa fa-file banner-nav" aria-hidden="true"></span>Admin<span
                                            class="caret"></span>
                                </a>
                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="admin.php" class="dropdown-item">Add Admin</a>
                                    </li>
                                    <li>
                                        <a href="viewAdmin.php" class="dropdown-item">View Admin</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown"><span
                                            class="fa fa-file banner-nav" aria-hidden="true"></span>City<span
                                            class="caret"></span>
                                </a>
                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="city.php" class="dropdown-item">Add City</a>
                                    </li>
                                    <li>
                                        <a href="viewCity.php" class="dropdown-item">View City</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown"><span
                                            class="fa fa-file banner-nav" aria-hidden="true"></span>Flights<span
                                            class="caret"></span>
                                </a>
                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="flightEntry.php" class="dropdown-item">Add Flights</a>
                                    </li>
                                    <li>
                                        <a href="viewFlight.php" class="dropdown-item">View Flights</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="active"><a href="adminBookings.php"><span class="fa fa-home banner-nav"
                                                                              aria-hidden="true"></span>Bookings</a></li>
                            <li class="dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown"><span
                                            class="fa fa-file banner-nav" aria-hidden="true"></span>Settings<span
                                            class="caret"></span>
                                </a>
                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="adminchangepassword.php" class="dropdown-item">Change Password</a>
                                    </li>
                                    <li>
                                        <a onclick="return confirm('Are you sure to exit ?')" href="logout.php"
                                           class="dropdown-item">Log Out</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div>
            </nav>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<div class="inner_page_about">

</div>