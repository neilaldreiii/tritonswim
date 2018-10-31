<?php 
require 'Assets/Include/core.inc.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Triton | Registration</title>
    <link rel="icon" type="image/ico" href="Assets/Media/Images/logo.png">
    <link rel="stylesheet" href="Assets/Css/default.css">
    <link rel="stylesheet" href="Assets/Css/layout1.css">
    <link rel="stylesheet" href="Assets/Css/nav.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans|Raleway" rel="stylesheet">
</head>
<style>
    body {
        background-image: url(Assets/Media/Images/triton-register.jpg);
        background-repeat: no-repeat;
        background-size: cover;
        background-attachment: local;
    }
</style>
<body>
    <?php include 'Assets/Include/nav.inc.php'; ?>
    <div class="container">
        <div class="triton-registration">
            <header class="header">
                <h1>Registration</h1>
                <h2>The NAGA TRITON Swimming Club is a not for-profit organization run solely by parent volunteers and is self-supporting through membership dues and fundraising. Fees and fundraising efforts go directly towards the team’s operating expenses including pool rental, coaches’ salaries, travel expenses, equipment, and supplies.</h2>
                <a href="#startRegistration">Proceed to registration</a>
            </header>
            <div class="reg-item">
                <div class="reg-wrap">
                    <header class="sub-header">
                        <h1>Payment of Fees</h1>
                    </header>
                    <div class="content">
                        <p>
                            Monthly fees are invoiced the 1st of each month .Payments must be made every 1st week of each month.
                        </p>
                    </div>
                </div>
            </div>
            <div class="reg-item">
                <div class="reg-wrap">
                    <header class="sub-header">
                        <h1>Delinquent Accounts</h1>
                    </header>
                    <div class="content">
                        <ul>
                            <li>Account balances are expected to be paid by the 15th of the month. Fees past due will be charged a late fee of P100 per each month they are unpaid.</li>
                            <li>
                                Any families with accounts more than 90 days past due will be placed on Inactive Status (which includes not participating in any TRITON activities, meets or practices).
                            </li>
                            <li>
                                All outstanding accounts must be paid in full before a swimmer can be re-registered.
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="reg-item">
                <div class="reg-wrap">
                    <header class="sub-header">
                        <h1>Membership Fee</h1>
                    </header>
                    <div class="content">
                        <p>
                            Is a non-refundable 1 time fee due at the time of registration. These funds help pay for pool rental, coaches’ salaries, etc. (P1000)
                        </p>
                    </div>
                </div>
            </div>
            <div class="reg-item">
                <div class="reg-wrap">
                    <header class="sub-header">
                        <h1>Monthly Dues</h1>
                    </header>
                    <div class="content">
                        <p>
                            A family is responsible for monthly dues throughout the entire swim year. (P700)
                        </p>
                        <footer class="sub-footer">
                            <p>
                                No refunds or waived fees will be given, even if a swimmer has not attended practice within a particular month. Swimmers may not enter the pool or participate in meets during the month(s) they are inactive.
                            </p>
                        </footer>
                    </div>
                </div>
            </div>
            <div class="reg-item">
                <div class="reg-wrap">
                    <header class="sub-header">
                        <h1>Naga Swimming Registration Fee</h1>
                    </header>
                    <div class="content">
                        <ul>
                            <li>Swimmers joining Batang Pinoy: P__ for the calendar swim year</li>
                            <li>Swimmers joining G League : P__ for the summer season.</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="reg-item">
                <div class="reg-wrap">
                    <header class="sub-header">
                        <h1>Fundraising and Volunteering</h1>
                    </header>
                    <div class="content">
                        <ul>
                            <li>Each year, the TRITON Swim Team holds a fundraising event in the form of a “Swim-A-Thon/Mayor’s Cup”.</li>
                            <li>TRITON hosts 2 meet a year. Because these meets are major fundraisers, all TRITON team swimmers are entered to swim in these meets and are expected to participate.</li>
                            <li>All TRITON families are expected to volunteer to help run the TRITON-hosted meets. Families who choose not to volunteer at a meet will be charged an additional P___ fundraising fee.</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="reg-item">
                <div class="reg-wrap">
                    <header class="sub-header">
                        <h1>Scholarships</h1>
                    </header>
                    <div class="content">
                        <p>
                            TRITON and other school may offer a scholarship programs for families encountering financial hardship. Any family interested in the scholarship program may submit a request to the Board in writing or via email, detailing their situation.
                        </p>
                    </div>
                </div>
            </div>
            <div class="reg-item">
                <div class="reg-wrap">
                    <header class="sub-header">
                        <h1>Leaving the Team</h1>
                    </header>
                    <div class="content">
                        <p>
                            Should your swimmer decide to quit the team for any reason, the team should be notified, in writing, by the person responsible for the account.
                        </p>
                        <footer class="sub-footer">
                            <p>
                                Fees will not be refunded when a swimmer leaves the team.
                            </p>
                        </footer>
                    </div>
                </div>
            </div>
        </div>
        <div class="triton-membership" id="startRegistration">
            <div class="content">
                <header class="sub-header">
                    <h1>Registration</h1>
                </header>
                <p>
                    Triton &#42;1 time membership fee = P1000
                    
                </p>
                    <p><span class="mrg"></span>&#42; Monthly fee = P700</p>
                <p>
                    You are financially responsible for the entire period that your swimmer is registered whether your swimmer attends practices or not.
                </p>

                <p>
                    Should a swimmer decide to not continue with the team, the Coaches and President must be notified in writing.
                </p>
            </div>
            <div class="registration-form">
                <header class="sub-header">
                    <h1>Athlete's Information</h1>
                </header>
                <form action="<?php echo $current_file; ?>" method="POST">
                    <div class="gender">
                        <select name="gender" id="">
                            <option value="" disabled selected>Gender</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>
                    <div class="birthdate">
                        <select name="birthmonth" id="">
                            <option value="" selected disabled>Month</option>
                            <option value="January">January</option>
                            <option value="February">February</option>
                            <option value="March">March</option>
                            <option value="April">April</option>
                            <option value="May">May</option>
                            <option value="June">June</option>
                            <option value="July">July</option>
                            <option value="August">August</option>
                            <option value="September">September</option>
                            <option value="October">October</option>
                            <option value="November">November</option>
                            <option value="December">December</option>
                        </select>
                        <select name="birthday" id="">
                            <option value="" disabled selected>Day</option>
                            <option value='1'>1</option>
                            <option value='2'>2</option>
                            <option value='3'>3</option>
                            <option value='4'>4</option>
                            <option value='5'>5</option>
                            <option value='6'>6</option>
                            <option value='7'>7</option>
                            <option value='8'>8</option>
                            <option value='9'>9</option>
                            <option value='10'>10</option>
                            <option value='11'>11</option>
                            <option value='12'>12</option>
                            <option value='13'>13</option>
                            <option value='14'>14</option>
                            <option value='15'>15</option>
                            <option value='16'>16</option>
                            <option value='17'>17</option>
                            <option value='18'>18</option>
                            <option value='19'>19</option>
                            <option value='20'>20</option>
                            <option value='21'>21</option>
                            <option value='22'>22</option>
                            <option value='23'>23</option>
                            <option value='24'>24</option>
                            <option value='25'>25</option>
                            <option value='26'>26</option>
                            <option value='27'>27</option>
                            <option value='28'>28</option>
                            <option value='29'>29</option>
                            <option value='30'>30</option>
                            <option value='31'>31</option>
                        </select>
                        <select name="birthyear" id="">
                            <option value="" disabled selected>Year</option>
                            <option value="2017">2017</option>
                            <option value="2016">2016</option>
                            <option value="2015">2015</option>
                            <option value="2014">2014</option>
                            <option value="2013">2013</option>
                            <option value="2012">2012</option>
                            <option value="2011">2011</option>
                            <option value="2010">2010</option>
                            <option value="2009">2009</option>
                            <option value="2008">2008</option>
                            <option value="2007">2007</option>
                            <option value="2006">2006</option>
                            <option value="2005">2005</option>
                            <option value="2004">2004</option>
                            <option value="2003">2003</option>
                            <option value="2002">2002</option>
                            <option value="2001">2001</option>
                            <option value="2000">2000</option>
                            <option value="1999">1999</option>
                            <option value="1998">1998</option>
                            <option value="1997">1997</option>
                            <option value="1996">1996</option>
                            <option value="1995">1995</option>
                            <option value="1994">1994</option>
                            <option value="1993">1993</option>
                            <option value="1992">1992</option>
                            <option value="1991">1991</option>
                            <option value="1990">1990</option>
                        </select>
                    </div>
                    <div class="firstname">
                        <input type="text" name="firstname" placeholder="First Name">
                    </div>
                    <div class="middlename">
                        <input type="text" name="midname" placeholder="Middle Name">
                    </div>
                    <div class="lastname">
                        <input type="text" name="lastname" placeholder="Last Name">
                    </div>
                    <div class="school">
                        <input type="text" name="school" placeholder="Name of School">
                    </div>
                    <header class="sub-header">
                        <h1>Parent's Information</h1>
                    </header>
                    <div class="contact-num">
                        <input type="tel" placeholder="Mobile Number" name="mobilenum">
                    </div>
                    <div class="parentname">
                        <input type="text" name="parent" placeholder="Parent's Full Name">
                    </div>
                    <div class="submit">
                        <input type="submit" Value="Register">
                    </div>
                </form>
                <?php
                    if(isset($_POST['gender']) &&
                       isset($_POST['firstname']) && 
                       isset($_POST['midname']) &&
                       isset($_POST['lastname']) &&
                       isset($_POST['birthmonth']) &&
                       isset($_POST['birthday']) &&
                       isset($_POST['birthyear']) &&
                       isset($_POST['mobilenum']) &&
                       isset($_POST['parent']) &&
                       isset($_POST['school'])) {

                        $gender = mysqli_real_escape_string($con, $_POST['gender']);
                        $firstname = mysqli_real_escape_string($con,$_POST['firstname']);
                        $midname = mysqli_real_escape_string($con,$_POST['midname']);
                        $lastname = mysqli_real_escape_string($con,$_POST['lastname']);
                        $b_month = mysqli_real_escape_string($con,$_POST['birthmonth']);
                        $b_day = mysqli_real_escape_string($con,$_POST['birthday']);
                        $b_year = mysqli_real_escape_string($con,$_POST['birthyear']);
                        $mobile = mysqli_real_escape_string($con,$_POST['mobilenum']);
                        $parent = mysqli_real_escape_string($con,$_POST['parent']);
                        $school = mysqli_real_escape_string($con,$_POST['school']);

                        if(!empty($gender) &&
                          !empty($firstname) && 
                          !empty($midname) &&
                          !empty($lastname) &&
                          !empty($b_month) &&
                          !empty($b_day) &&
                          !empty($b_year) &&
                          !empty($mobile) &&
                          !empty($parent) &&
                          !empty($school)) {

                           $query = "INSERT INTO `registration` VALUES ('','$gender', '$b_month', '$b_day', '$b_year', '$firstname', '$midname', '$lastname', '$school', '$parent', '$mobile', Now())";

                            if($query_run = mysqli_query($con, $query)) {

                                echo '<style> .success-overlay {display:flex;} </style>';

                            }
                        } else {

                        }
                    } else {

                    }

                ?>
            </div>
        </div>
    </div>
    <div class="success-overlay" id="successMsg">
        <div class="success">
            <p> Thank you for choosing Triton. You will receive a message from our staff for verification.</p>
            <button class="close-register" id="successBtn">Okay</button>
        </div>
    </div>
    
    <div class="footer">
        <?php include 'Assets/Include/footer.inc.php'; ?>
    </div>
    <script src="Assets/JS/fontawesome-all.min.js"></script>
    <script src="Assets/JS/jquery.js"></script>
    <script src="Assets/JS/script.js"></script>
</body>
</html>