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
    <meta name="viewport" content="user-scalable=yes" />
    <meta name="description" content="Pagina de informatii despre aplicatie.">
    <title>About & Contact FORG team</title>
    <link rel="shortcut icon" href="../home/assets/banana_de_nigga.png">
    <link rel="stylesheet" type="text/css" href="../css/contactUs/contactUs.css">
    <link rel="stylesheet" type='text/css' href="../css/footer.css">
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="../logout.js"></script>
</head>

<body>
    <div class="container1">
        <header class="nav-bar">
            <nav>
                <a id="a1" href="../index.php"><img class="nav-icon" src="../profile/assets/icons/home.png" alt="home-icon">HOME</a>
                <a id="a2" href="../Categories/forg.php"><img class="nav-icon" src="../categories/assets/icons/categories.png" alt="categories-icon">CATEGORIES</a>
                <a id="a4" href="../signup/sign_up.php"><img class="nav-icon" src="../categories/assets/icons/signup.png" alt="login">SIGN UP</a>
                <a id="a7" href="../profile/profileDemo.php"><img class="nav-icon" src="../categories/assets/icons/profile.png" style="height:24px;width:24px;" alt="profile">MY PROFILE</a>
                <a id="a5" href="../logout.php"><img class="nav-icon" src="../categories/assets/icons/logout.png" alt="logout">LOGOUT</a>
                <a id="a6" href="../login/login.php"><img class="nav-icon" src="../categories/assets/icons/login.png" alt="login" style="height:24px;width:24px;">LOGIN</a>
            </nav>
        </header>
        <div class="container2">
            <p id="helper"> helper </p>

            <ul class="li1">

                <li>
                    <p id="LOGO">FORG</p>
                </li>
                <li>
                    <p> There is no love sincerer </p>
                </li>
                <li>
                    <p> than the love for food.</p>
                </li>
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
                <p>FORG (Food Organizer) este o aplicatie web ce ofera suport pentru gestionarea preferintelor culinare, prin crearea listelor de cumparaturi, ajutandu-va sa descoperiti noi retete.Echipa noastră își propune în fiecare zi să îmbunătățească experiența culinară a utilizatorilor acestei aplicații. Ne adaptăm fiecărui client în parte, preferințele dumneavoastră fiind o prioritate pentru noi - de la informații detaliate despre rețetele noastre până la liste de cumpărături, suntem oricând gata să vă fim alături!</p>
                </div>
            </div>

            <br>
            <br>

            <div class="divmediu">
                <div id="image2">
                </div>
                <div>
                <p>Despre noi trebuie sa stiti ca suntem trei studenti de la facultatea de informatica ce impartasesc pasiunea pentru Tehnologii Web si pentru mancare. Îndrăgostiți de mâncare, ne-am străduit acest semestru să ne răsfățăm clienții cu cele mai bune preparate. Gama noastra de retete se intinde de la lucruri simple precum briose cu visine pana la retete complexe precum somon cu sos de spanac, o reteta traditional greceasca. </p>
                </div>
            </div>

            <br>
            <br>

            <div class="divmediu">
                <div id="image3">
                </div>
                <div class="breakl"></div>
                <div >
                    <p class="ultim">Operatorii nostri actualizeaza sunt mereu aici sa va raspunda la intrebari si recomanda mereu pe pagina principala tipuri inedite de mancare si experiente pe care ar trebui sa le incercati macar o data in viata. Daca v-am impresionat cu informatiile acestea si sunteti interati de acest subiect spuneți DA inițiativei FORG și vă garantăm experiențe gustative de neuitat!</p>
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

    <div id="spacer" style="height:100px;"></div>
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