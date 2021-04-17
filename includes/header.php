<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
?>
 <div class="l-theme animated-css animsition" data-header="sticky" data-header-top="200" >
        <!-- ==========================-->
        <!-- MOBILE MENU-->
        <!-- ==========================-->
        <div data-off-canvas="mobile-slidebar left overlay">
            <a class="navbar-brand scroll" href="index.php"><img class="scroll-logo" src="assets/media/general/logo-light1.png" alt="logo"></a>


            <ul class="navbar-nav">
                <li class="nav-item active"><a class="nav-link" href="index.php">Home<span class="sr-only">(current)</span></a></li>
                
                <li class="nav-item"><a class="nav-link" href="car-list.php">Car List</a></li>
                <li class="nav-item"><a class="nav-link" href="about.php">About</a></li>

                 <li class="nav-item"><a class="nav-link" href="companies-car.php">Service</a></li>
               
               
                <li class="nav-item"><a class="nav-link" href="contacts.php">Contact</a></li>
            </ul>

        </div>
                <div class="header-main">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-lg-2 col-auto">
                                <a class="navbar-brand scroll" href="index.php"><img class="normal-logo" src="assets/media/general/logo1.png" alt="logo"></a>
                            </div>
                            <div class="col-lg-auto col">
                                <div class="header-contacts d-none d-md-block d-lg-none d-xl-block"><i class="ic text-primary icon-call-in"></i><span class="header-contacts__inner">Call Us Today!<a class="header-contacts__number" href="tel:+919998889990">+91 999 888 9990</a></span></div>
                                <!-- Mobile Trigger Start-->
                                <button class="menu-mobile-button js-toggle-mobile-slidebar toggle-menu-button d-lg-none"><i class="toggle-menu-button-icon"><span></span><span></span><span></span><span></span><span></span><span></span></i></button>
                                <!-- Mobile Trigger End-->
                            </div>
                            <div class="col-lg d-none d-lg-block">
                                <nav class="navbar navbar-expand-md justify-content-end" id="nav">
                                    <ul class="yamm main-menu navbar-nav">
                                        <li class="nav-item active"><a class="nav-link" href="index.php">Home<span class="sr-only">(current)</span></a></li>
                                       
                                        </li>
<li class="nav-item"><a class="nav-link" href="car-list.php">Car List</a></li>
                                        <li class="nav-item"><a class="nav-link" href="about.php">About</a></li>
                                        <li class="nav-item"><a class="nav-link" href="">Service</a></li>

                                      
                                        <li class="nav-item"><a class="nav-link" href="contacts.php">Contact</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </header>