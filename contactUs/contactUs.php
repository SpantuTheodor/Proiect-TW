<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor\autoload.php';

function _e($string)
{
    return htmlentities($string, ENT_QUOTES, 'UTF-8', false);
}

$whitelist = array('name', 'email', 'message'); //pentru a memora campurile ce trebuie completate si pentru ca informatia sa ramana in ele dupa ce s-a dat 'submit'
$errors = array();
$sent = 0;

if (!empty($_POST)) {

    if (intval($_POST['human']) !== 7) {
        $errors[] = 'Your math is suspect, try again.';
    }

    foreach ($whitelist as $key) {
        $fields[$key] = $_POST[$key];
    }

    // foreach ($fields as $field => $data) {      //nu mai avem nevoie de ea, avem campurile necesare 'required'
    //     if (empty($data)) {
    //         $errors[] = 'Please enter your ' . $field;
    //     }
    // }

    if (empty($errors)) {
        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->isSMTP();
            $mail->Host       = 'ssl://smtp.gmail.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'suportforg69@gmail.com';
            $mail->Password   = 'nuitispunemcipi';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port       = 465;

            //Recipients
            $mail->setFrom('suportforg69@gmail.com', '[The Forg]');
            $mail->addAddress('receptie.forg69@gmail.com');

            $mail->isHTML(true);
            $mail->Subject = '[Suport Forg]';
            $mail->Body    = "<h1>" . $fields['name'] . "</h1><h2>" . $fields['email'] . "</h2><p>" . $fields['message'] . "</p>";
            $mail->AltBody = 'A aparut o problema!';

            $mail->send();
            $sent = 1;
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FORG</title>
    <link rel="stylesheet" type="text/css" href="../css/contactUs/contactUs.css">
    <link rel="stylesheet" type='text/css' href="../css/footer.css">
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="shortcut icon" href="assets/banana_de_nigga.png">
    <script src="../logout.js"></script>
</head>

<body>
    <div class="container1">
        <header class="nav-bar">
            <nav>
                <a id="a1" href="#"><img class="nav-icon" src="assets/icons/home.png" alt="home-icon">HOME</a>
                <a id="a2" href="#"><img class="nav-icon" src="assets/icons/trending.png" alt="trending-icon">TRENDING</a>
                <a id="a4" href="../signup/sign_up.php">SIGN UP</a>
                <a id="a7" href="profile/profileDemo.php">MY PROFILE</a>
                <a id="a5" href="../logout.php">LOGOUT</a>
                <a id="a6" href="../login/login.php">LOGIN</a>
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
        <?php if (!empty($errors)) : ?>
            <div class="errors">
                <p><?php echo implode('</p><p>', $errors); ?></p>
            </div>
        <?php elseif ($sent == 1) : ?>
            <div class="success">
                <p>Your message was sent. We'll be in touch.</p>
            </div>
        <?php endif; ?>
        <form id="contact" role="form" method="post" action="contactUs.php">
            <div class="form-group">
                <label for="name" class="control-label">Name</label>
                <input placeholder="  Your name" type="text" tabindex="1" required autofocus id="name" name="name" value="<?php echo isset($fields['name']) ? _e($fields['name']) : '' ?>">
            </div>

            <div class="form-group">
                <label for="email" class="control-label">Email</label>
                <input placeholder="  Your Email Address" type="email" tabindex="2" required id="email" name="email" value="<?php echo isset($fields['email']) ? _e($fields['email']) : '' ?>">
            </div>

            <div class="form-group">
                <label for="message" class="control-label">Message</label>
                <textarea placeholder="  Type your Message Here...." tabindex="3" required id="message" name="message"><?php echo isset($fields['message']) ? _e($fields['message']) : '' ?></textarea>
            </div>

            <div class="form-group">
                <label for="human" class="control-label">Human Verification</label>
                <input placeholder="  2 + 5 = ?" type="text" tabindex="4" id="human" name="human">
            </div>
            <div class="form-group">
                <button name="submit" type="submit" tabindex="5" id="contact-submit" data-submit="...Sending">Submit</button>
            </div>
        </form>
    </div>
    <div class="footer">
            <div class="contain">
                <div class="col">
                    <h1>&copy; FORG - Made &amp; Designed By Rogoza Calin Andrei, Spantu Theodor Ioan, Ursulean Ciprian</h1>
                </div>
            <div class="clearfix"></div>
        </div>
    </div>
</body>

<?php


if (isset($_COOKIE['user'])) {  //daca avem user logat
    print_r($_COOKIE);
    echo "<script>document.getElementById(\"a4\").style.display = \"none\";
                  document.getElementById(\"a6\").style.display = \"none\";
                  document.getElementById(\"a5\").style.display = \"inline\";
                  document.getElementById(\"a7\").style.display = \"inline\";    
          </script>";
} else {
    echo "<script>document.getElementById('a5').style.display = \"none\";
    document.getElementById(\"a7\").style.display = \"none\";
    document.getElementById('a4').style.display = \"inline\"; 
    document.getElementById('a6').style.display = \"inline\";               
    </script>";
}

?>

<script>
    document.documentElement.scrollTop = 0; // pentru a porni de sus pagina
</script>