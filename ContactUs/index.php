<?php 

$errors = array();

if ( ! empty( $_POST ) ) {

if(intval($_POST['human']) !== 7){
echo "Your math seems a bit sketchy. (Beep Boop?)";
}
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FORG</title>
    <link rel="stylesheet" type="text/css" href="app2.css">
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="shortcut icon" href="assets/banana_de_nigga.png">
</head>

<body>
    <div class="container1">
        <header class="nav-bar">
            <nav>
                <a id="a1" href="#"><img class="nav-icon" src="assets/icons/home.png" alt="home-icon">HOME</a>
                <a id="a2" href="#"><img class="nav-icon" src="assets/icons/trending.png"
                        alt="trending-icon">TRENDING</a>
                <a id="a3" href="#"><img class="nav-icon" src="assets/icons/about.png" alt="about-icon">ABOUT</a>
                <a id="a4" href="#">SIGN UP</a>
            </nav>
        </header>
        <div class="container2">
            <p id="helper"> helper </p>

            <ul class="li1">

                <li>
                    <p id="LOGO">FORG</p>
                </li>
                <li>
                    <p> There is no love sicerer </p>
                </li>
                <li>
                    <p> than the love for food.</p>
                </li>
                <li><button id="button">How it works</button></li>
            </ul>
        </div>
    </div>
    <div class="divmare">
        <h1>
            About Us
        </h1>
        <div>

            <div class="divmediu">
                <div id="image1">
                </div>
                <div class="breakl"></div>
                <div>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                        the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley
                        of type and scrambled it to make a type
                        specimen book. It has survived not only five centuries, but also the leap into electronic
                        typesetting, remaining essentially unchanged</p>
                </div>
            </div>

            <br>
            <br>

            <div class="divmediu">
                <div id="image2">
                </div>
                <div>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                        the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley
                        of type and scrambled it to make a type
                        specimen book. It has survived not only five centuries, but also the leap into electronic
                        typesetting, remaining essentially unchanged</p>
                </div>
            </div>

            <br>
            <br>

            <div class="divmediu">
                <div id="image3">
                </div>
                <div class="breakl"></div>
                <div>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                        the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley
                        of type and scrambled it to make a type
                        specimen book. It has survived not only five centuries, but also the leap into electronic
                        typesetting, remaining essentially unchanged</p>
                </div>
            </div>
        </div>
    </div>
    <div id="contactus">
        <h1>
            Contact Us
        </h1>
        <form id="contact" role="form" method="post" action="index.php">
            <div class="form-group">
                <label for="name" class="control-label">Name</label>
                <input placeholder="Your name" type="text" tabindex="1" required autofocus id="name" name="name">
            </div>

            <div class="form-group">
                <label for="email" class="control-label">Email</label>
                <input placeholder="Your Email Address" type="email" tabindex="2" required id="email" name="email">
            </div>

            <div class="form-group">
                <label for="message" class="control-label">Message</label>
                <textarea placeholder="Type your Message Here...." tabindex="5" required id="message"
                    name="message"></textarea>
            </div>

            <div class="form-group">
                <label for="human" class="control-label">Human Verification</label>
                <input placeholder="2 + 5 = ?" type="text" tabindex="3" id="human" name="human">
            </div>
            <div class="form-group">
                <button name="submit" type="submit" id="contact-submit" data-submit="...Sending">Submit</button>
            </div>
        </form>
    </div>
</body>