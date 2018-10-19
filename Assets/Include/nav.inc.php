<?php

require_once 'core.inc.php';
require_once 'connect.inc.php';

?>

<nav class="navigation" id="navigation">
    
    <div class="navigation-wrap">
       
        <div class="triton-logo-container">
            <div class="triton-logo"></div>
        </div>
        <div class="navigation-bind">
            <span id="dropdown-nav">
                <i class="fas fa-bars"></i>
            </span>
            <div class="nav-links" id="navigation-links">
                <a href="index.php"> <span class="pri-icon"><i class="fas fa-home"></i></span> Home</a>
                <div class="dropdown">
                    <span class="dropdown-btn" id="dropbtnEvents"> <span class="pri-icon"><i class="fas fa-calendar-alt"></i></span>Events <span class="icon"><i class="fas fa-caret-down"></i></span></span>
                    <div class="dropdown-content" id="dropdownEvents"> 
                        <a href="events.php">Events</a>
                        <a href="gallery.php">Gallery</a>
                    </div>
                </div>
                <div class="dropdown">
                    <span class="dropdown-btn" id="dropbtnMember"> <span class="pri-icon"><i class="fas fa-users"></i></span>Members <span class="icon"><i class="fas fa-caret-down"></i></span></span>
                    <div class="dropdown-content" id="dropdownMember">
                        <a href="board-members.php">Board Members</a>
                        <a href="coaches.php">Coaches</a>
                        <a href="athletes.php">Athletes</a>
                    </div>
                </div>
                <a href="guidelines.php"> <span class="pri-icon"><i class="fas fa-book-open"></i></span>Guidelines</a>
                <a href="register.php"> <span class="pri-icon"><i class="fas fa-plus"></i></span> Registration</a>
                <a href="policy.php"> <span class="pri-icon"><i class="fas fa-shopping-cart"></i></span> Policies</a>
                <a href="products.php"> <span class="pri-icon"><i class="fas fa-life-ring"></i></span> Products</a>
            </div>
            <div class="triton-brand">
                <div class="triton-name">
                    <a href="index.php">
                        <p>Triton Swim Club</p>
                        <span>Naga City Camarines Sur</span>
                    </a>
                </div>
                <div class="triton-social">
                    <span class="pri-icon"><i class="fas fa-lock"></i></span>
                    <a href="triton.php">Triton Member Login</a>
                </div>
            </div>
        </div>
    </div>
</nav>