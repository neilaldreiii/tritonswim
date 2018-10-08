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
                <a href="index.php">Home</a>
                <a href="triton.php">Triton Members</a>
                <div class="dropdown">
                    <span class="dropdown-btn" id="dropbtnEvents">Events <span class="icon"><i class="fas fa-caret-down"></i></span></span>
                    <div class="dropdown-content" id="dropdownEvents"> 
                        <a href="events.php">Events</a>
                        <a href="gallery.php">Gallery</a>
                    </div>
                </div>

                <div class="dropdown">
                    <span class="dropdown-btn" id="dropbtnMember">Members <span class="icon"><i class="fas fa-caret-down"></i></span></span>
                    <div class="dropdown-content" id="dropdownMember">
                        <a href="board-members.php">Board Members</a>
                        <a href="coaches.php">Coaches</a>
                        <a href="athletes.php">Athletes</a>
                    </div>
                </div>
                <a href="guidelines.php">Guidelines</a>
                <a href="register.php">Registration</a>
                <a href="policy.php">Policies</a>
                <a href="products.php">Products</a>
            </div>
            <div class="triton-brand">
                <div class="triton-name">
                    <a href="index.php">
                        <p>Triton Swim Club</p>
                        <span>Naga City Camarines Sur</span>
                    </a>
                </div>
                <div class="triton-social">
                    <a target="_blank" href="https://www.facebook.com/tritonswimclub/"><i class="fab fa-facebook-f"></i> <span>Like us on Facebook</span></a>
                </div>
            </div>
        </div>
    </div>
</nav>