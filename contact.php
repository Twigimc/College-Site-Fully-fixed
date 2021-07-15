<?php
include_once 'config.php';
$name=$email=$message='';
$errors=array('name'=>'','email'=>'','message'=>'');
if(isset($_POST['submit'])) {
  if(empty($_POST['name'])) {
    $errors['name'] = 'Full name is required';
 }
 else {
    $name = $_POST['name'];
 }
 if(empty($_POST['email'])) {
    $errors['email'] = 'Email is required';
 }
 else 
 {
    $email = $_POST['email'];

 }
 if(empty($_POST['message'])) {
    $errors['message'] = 'message is required';
 }
 else {
    $message = $_POST['message'];
 }

 if(array_filter($errors)){
  echo '<script type ="text/JavaScript">';  
  echo 'alert("You did not fill the form!")';  
  echo '</script>';
}
else {
  // escape sql chars to prevent an xss attack
  $name = mysqli_real_escape_string($conn, $_POST['name']);
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $message = mysqli_real_escape_string($conn, $_POST['message']);
  $sql = "INSERT INTO contact (name,email,message)
  VALUES ('$name','$email','$message')";
   if (mysqli_query($conn, $sql)) {
    echo '<script type ="text/JavaScript">';  
    echo 'alert("Thank you, your message has been received")';  
    echo '</script>';  
   }

   else {
    echo "Error: " . $sql . ":-" . mysqli_error($conn);
   }
   mysqli_close($conn);
}


}


  












?>

<!DOCTYPE html>
<html lang="en">
  <head>
<meta name="keywords" content="Al-Farabi, Al-Farabi University, Farabi">
    <meta name="description" content="Al-Farabi University College is a private college that aims to give perfect education">
    <meta property="og:image" content="/images/Index Page Design.png">

    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>Contact</title>
    <link rel="icon" type="image/png" href="/images/favicon.png" />
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link
      href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
      rel="stylesheet"
    />
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link
      href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;700&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="/styles/normalize.css" />
    <link rel="stylesheet" href="/styles/styles.css" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css"
    />
  </head>
  <body>
    <header>
      <nav class="nav">
        <a class="nav__brand__anker" href="index.php"
          ><img
            class="nav__brand"
            src="/images/Index Page Design.png"
            alt="" /></a
        ><svg class="icon icon--white nav__toggler toggle">
          <use xlink:href="images/sprite.svg#toggler"></use>
        </svg>
        <ul class="list nav__list menu">
          <li class="item nav__item"><a href="index.php">Home</a></li>
          <li class="item nav__item"><a href="contact.php">Contact</a></li>
          <li class="item nav__item has-submenu">
            <a>Departments</a>
            <ul class="submenu">
              <li class="subitem"><a href="Design.html">Design</a></li>
              <li class="subitem">
                <a href="computer_engineering.html">Computer engineering</a>
              </li>
              <li class="subitem">
                <a href="Accounting_and_Banking_Sciences.html"
                  >accounting and banking</a
                >
              </li>
              <li class="subitem">
                <a href="Architectural_Engineering.html"
                  >architectural engineering</a
                >
              </li>
              <li class="subitem">
                <a href="Civil_Engineering.html">civil engineering</a>
              </li>
              <li class="subitem"><a href="Dentistry.html">dentistry</a></li>
              <li class="subitem"><a href="Media.html">media</a></li>
              <li class="subitem">
                <a href="Medical_Laboratory_Techniques.html"
                  >mediacal labortary</a
                >
              </li>
              <li class="subitem"><a href="Nursing.html">nursing</a></li>
              <li class="subitem">
                <a href="Optics_Technologies.html">optics technologies</a>
              </li>
              <li class="subitem">
                <a href="Petroleum_Engineering.html">petroleum engineering</a>
              </li>
              <li class="subitem"><a href="Law.html">law</a></li>
              <li class="subitem">
                <a href="Petroleum_and_Gas_Refining_Engineering.html"
                  >petroleum and gas engineering</a
                >
              </li>
              <li class="subitem"><a href="Biology.html">biology</a></li>
            </ul>
          </li>
          <li class="item nav__item arabic">
            <a href="/ar/contact.php">عربي</a>
          </li>
        </ul>
      </nav>
    </header>
    <div class="contact-page">
      <div class="contact-page__heading block__heading">
        <h2>Contact us</h2>
        <p>
          If you have any further questions that aren’t covered in this website,
          you can always find us here also you can contact us in the form below
        </p>
      </div>
      <div class="grid grid--1x2">
        <div class="contact__content">
          <div class="contact__section">
            <div>
              <svg class="icon icon--accent">
                <use xlink:href="images/sprite.svg#address"></use>
              </svg>
            </div>
            <div class="contact__info">
              <h3>Address</h3>
              <p>Baghdad , Aldora, Masafi St, opposite to Abo Tiara St.</p>
            </div>
          </div>
          <div class="contact__section">
            <div>
              <svg class="icon icon--accent">
                <use xlink:href="images/sprite.svg#email"></use>
              </svg>
            </div>
            <div class="contact__info">
              <h3>Email</h3>
              <p>info@alfarabiuc.edu.iq</p>
            </div>
          </div>
          <div class="contact__section">
            <div>
              <svg class="icon icon--accent">
                <use xlink:href="images/sprite.svg#phone"></use>
              </svg>
            </div>
            <div class="contact__info">
              <h3>Phone</h3>
              <p>07712365333</p>
            </div>
          </div>
        </div>
        <div class="contact__form">
          <h3>Send us a Message</h3>
          <form method="POST" action="">
            <div>
              <input maxlength="40" required class="input" type="text" placeholder="Full Name"  name="name"/>
            </div>
            <div class="red-text"><?php echo $errors['name']; ?></div>

            
            <div><input maxlength="40" required class="input" type="email" placeholder="Email" name="email"/></div>
            <div class="red-text"><?php echo $errors['email']; ?></div>


            <div>
              <textarea
                maxlength="700"
                required
                class="input"
                name="message"
                id=""
                cols="0"
                rows="5"
                placeholder="Type Your Message"
              ></textarea>
            </div>
            <div class="red-text"><?php echo $errors['message']; ?></div>

            <button type="submit" name="submit" value="submit" class="contact__form__btn">Send</button>
          </form>
        </div>
      </div>
    </div>
    <footer class="block--dark footer">
      <div class="grid footer__sections">
        <section class="footer__section collapsible">
          <div class="collapsible__header">
            <h3 class="collapsible__heading">Departments</h3>
            <svg class="icon icon--white collapsible__chevron">
              <use xlink:href="images/sprite.svg#chevron"></use>
            </svg>
          </div>
          <ul class="list collapsible__content">
            <li>
              <a href="computer_engineering.html">Computer Engineering</a>
            </li>
            <li>
              <a href="Architectural_Engineering.html"
                >Architecture Engineering</a
              >
            </li>
            <li>
              <a href="Petroleum_Engineering.html">Petroleum Engineering</a>
            </li>
            <li><a href="Civil_Engineering.html">Civil Engineering</a></li>
            <li>
              <a href="Petroleum_and_Gas_Refining_Engineering.html"
                >Petroleum And Gas Refinery Engineering</a
              >
            </li>
            <li><a href="Law.html">Law</a></li>
            <li><a href="Media.html">Media</a></li>
            <li>
              <a href="Accounting_and_Banking_Sciences.html"
                >Banking And Accounating</a
              >
            </li>
            <li><a href="Optics_Technologies.html">Optics Techniques</a></li>
            <li><a href="Biology.html">Biology</a></li>
            <li><a href="Design.html">Design</a></li>
            <li>
              <a href="Medical_Laboratory_Techniques.html"
                >Medical Lab Techniques</a
              >
            </li>
            <li><a href="Dentistry.html">Dentisry</a></li>
            <li><a href="Nursing.html">Nursing</a></li>
          </ul>
        </section>
        <section class="footer__section collapsible">
          <div class="collapsible__header">
            <h3 class="collapsible__heading">University</h3>
            <svg class="icon icon--white collapsible__chevron">
              <use xlink:href="images/sprite.svg#chevron"></use>
            </svg>
          </div>
          <ul class="list collapsible__content">
            <li><a href="index.php">Home</a></li>
            <li>
              <a class="page-scroll" href="/index.php" data-id="about"
                >About</a
              >
            </li>
            <li><a href="contact.php">Contact</a></li>
            <li>
              <a class="page-scroll" href="/index.php" data-id="news">News</a>
            </li>
          </ul>
        </section>
        <section class="footer__section footer__brand">
          <img src="/images/Index Page Design.png" alt="" />
          <p class="footer__copyright">
            Copyright 2021 Hosam , Ibrahim and Ziad
          </p>
        </section>
      </div>
    </footer>
    <script src="/js/main.js"></script>
  </body>
</html>
