
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food Delivery</title>
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Baloo+Chettan+2&display=swap" rel="stylesheet">
    <script src="https://use.fontawesome.com/642ff8ef9e.js"></script>

</head>
<body>
      <!--Navbar-->
      <nav id="navbar">
        <div id="logo">
            <img src="logo.jpg">
        </div>
        <ul>
            <li class="item"><a href ="index.php">Home</a></li>
            <li class="item"><a href="about.html">About Us</a></li>
            <li class="item"><a href="service.html">Services</a></li>
            <li class="items"><a href="contact.php">Contact Us</a></li>
            
        </ul>
    </nav>
    <!-- end of navbar -->
    
    <!-- client section -->

<section id="client-section">
    <h1 class="primary">Our Clients</h1>
    <div id="client-item">
        <div class="client-items">
            <img src="backClient.jpg"> 
            
        </div>
    </div>
    </section>
    <header class="clipic">
       
    <section id="contact">
        <h1 class="primary center">Contact Us</h1>
        <div id="contact-box">
        <form id="contact-form" action="contact_us_submit.php" method="post">
                <div class="form-group">
                    <label for="name">Name: </label>
                    <input type="text" placeholder="Enter your name" Class="form-control" id="Name" name="name" required=""/>
                </div>
                <div class="form-group">
                    <label for="name">Email: </label>
                    <input type="text"  placeholder="Enter your Email id" class="form-control"  name="email" id="Email_id" required="">
                </div>
                <div class="form-group">
                    <label for="name">Mobile No: </label>
                    <input type="text"  placeholder="Enter your Mobile No" class="form-control"  name="Mobile_No" id="Mobie_No" required="">
                </div>
                <div class="form-group">
                    <label for="name">Subject: </label>
                    <input type="text" placeholder="Enter the Subject" class="form-conrtol" name="subject" id="Phone_no" required="">
                </div>
                <div class="form-group">
                    <label for="name">message: </label>
                    <input type="text" placeholder="Enter your message"  class="form-control" name="message" id="Address" required="">
                </div>
                <div class="button">
                    <input name="submitBtn" class="suBmit" type="submit" id="submitBtn" value="Submit">
    
                </div>
            </form>
    </section>
    <div class="contact-message">

            <p class="form-messege"></p>
             </div>
</header>
</body>
</html>
<?php 
include('footer.php');
?>
