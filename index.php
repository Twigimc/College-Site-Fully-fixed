<?php
include_once 'config.php';
$f_name=$email=$phone=$grade=$branch=$department='';
$errors=array('f_name'=>'','email'=>'','phone'=>'','grade'=>'','branch'=>'','department'=>'');
if(isset($_POST['submit']))
{    
 
      //Text Data Section Start
      if(empty($_POST['f_name'])) {
         $errors['f_name'] = 'Full name is required';
      }
      else {
         $f_name = $_POST['f_name'];
      }
      if(empty($_POST['email'])) {
         $errors['email'] = 'Email is required';
      }
      else 
      {
         $email = $_POST['email'];

      }
      if(empty($_POST['phone'])) {
         $errors['phone'] = 'phone is required';
      }
      else {
         $phone = $_POST['phone'];

      }
      if(empty($_POST['grade'])) {
         $errors['grade'] = 'grade is required';
      }
      else {
         $grade =$_POST['grade'];
      }
      if(empty($_POST['branch'])) {
         $errors['branch'] = 'This field  is required';
      }
      else {
         $branch =$_POST['branch'];
      }
      if(empty($_POST['department'])) {
         $errors['department'] = 'Select a department';
      }
     else {
      $department =$_POST['department'];
     }
     if(array_filter($errors)){
      echo '<script type ="text/JavaScript">';  
      echo 'alert("You did not fill the form!")';  
      echo '</script>';
		} else {
			// escape sql chars to prevent an xss attack
			$f_name = mysqli_real_escape_string($conn, $_POST['f_name']);
			$email = mysqli_real_escape_string($conn, $_POST['email']);
      $phone = mysqli_real_escape_string($conn, $_POST['phone']);
			$grade = mysqli_real_escape_string($conn, $_POST['grade']);
      $branch = mysqli_real_escape_string($conn, $_POST['branch']);
			$department = mysqli_real_escape_string($conn, $_POST['department']);
      $sql = "INSERT INTO students (f_name,email,phone,grade,branch,department)
      VALUES ('$f_name','$email','$phone','$grade','$branch','$department')";
      if (mysqli_query($conn, $sql)) {
       echo '<script type ="text/JavaScript">';  
       echo 'alert("Thank you for Registering")';  
       echo '</script>';  
      } else {
         echo "Error: " . $sql . ":-" . mysqli_error($conn);
      }
      
    }
    //file section start
   // Count total uploaded files
 $totalfiles = count($_FILES['file']['name']);

 // Looping over all files
 for($i=0;$i<$totalfiles;$i++){
 $filename = $_FILES['file']['name'][$i];
 
// Upload files and store in database
if(move_uploaded_file($_FILES["file"]["tmp_name"][$i],'upload/'.$filename)){
		// Image db insert sql
		$insert = "INSERT into files(file_name,uploaded_on,status,uploader_name,uploader_phone) values('$filename',now(),1,'$f_name','$phone')";
		if(mysqli_query($conn, $insert)){
		 // echo 'Data inserted successfully';
		}
		else{
		  echo 'Error: '.mysqli_error($conn);
		}
	}else{
		//echo 'Error in uploading file - '.$_FILES['file']['name'][$i].'<br/>';
	}
 
 }
    //file section end
     
    mysqli_close($conn);
}
?>




<!DOCTYPE html>
<html lang="en">
  <head>
<meta name="keywords" content="Al-Farabi, Al-Farabi University, Farabi, Iraqi University, Iraqi College">
<meta property="og:image" content="/images/Index Page Design.jpg">

    <meta name="description" content="Al-Farabi University College is a private college that aims to give perfect education">
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>AL-farabi College</title>
    <link rel="icon" type="image/png" href="/images/favicon.png" />

    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

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
            src="/images/Index Page Design.jpg"
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
            <a href="ar/index.php">عربي</a>
          </li>
        </ul>
      </nav>
    </header>
    <section class="block hero">
      <div class="grid grid--1x2 contianer">
        <div data-aos="zoom-in" data-aos-duration="500" class="hero__content">
          <h2>Study at FUC !</h2>
          <p class="hero__text">
            If you are interested into joining the FUC family and becoming a
            student,press the apply button below .
          </p>
          <button class="btn btn--accent" id="myBtn">Apply Now</button>
        </div>
        <div
          data-aos="zoom-in"
          data-aos-duration="500"
          class="hero__image-container"
        >
          <picture
            ><source
              type="image/webp"
              srcset="images/apply@1x.webp, images/apply@2x.webp 2x" />
            <source
              type="image/jpg"
              srcset="images/apply@1x.jpg, images/apply@2x.jpg 2x" />
            <img class="hero__image" src="/images/apply@2x.jpg" alt=""
          /></picture>
        </div>
      </div>
      <section class="form">
        <div id="myModal" class="modal">
          <div class="modal-content">
            <form method="POST" action="" enctype=multipart/form-data>
              <div>
                <input maxlength="40" required class="input" type="text" placeholder="Full Name" name="f_name" />
              </div>
              <div class="red-text"><?php echo $errors['f_name']; ?></div>
              <div><input minlength="9" maxlength="15" required class="input" type="number" placeholder="phone" name="phone" /></div>
              <div class="red-text"><?php echo $errors['phone']; ?></div>
              <div>
                <input
                maxlength="40"
                  required  
                  class="input"
                  type="email"
                  placeholder="Email Address : "
                  name="email"
                />
                <div class="red-text"><?php echo $errors['email']; ?></div>
              </div>
              
                <div>
                  <input
                    min="50"
                    max="105"
                    required
                    class="input"
                    type="number"
                    placeholder="Grade Average"
                    name="grade"
                  />
                </div>
                <div class="red-text"><?php echo $errors['grade']; ?></div>
                <div>
                <label class="form__label" for="">Select your branch</label>
                <select required class="input form__select" name="branch" id="">
                  <option value="Biological">Biological study</option>
                  <option value="Applied">Applied Science </option>
                  <option value="Scientific">Scientific </option>
                  <option value="Literature">Literature  </option>
                  <option value="Industrial">Industrial  </option>
                  <option value="Applied Arts">Applied Arts</option>
                  <option value="Trade">Trade</option>
                  <option value="Institute">Institute </option>
                  <option value="Nursing High school">Nursing High school</option>
                  
                </select>
                </div>
                <div class="red-text"> <?php echo $errors['branch']; ?> </div>
                <label class="form__label" for="">Select your desired department</label>
                <select required class="input form__select" name="department" id="">
                  <option value="computer">Computer Engineering</option>
                  <option value="biology">Biology</option>
                  <option value="design">Design</option>
                  <option value="architecture">Architecture Engineering</option>
                  <option value="dentistry">Dentistry</option>
                  <option value="nursing">Nursing</option>
                  <option value="banking">Banking and Accounting</option>
                  <option value="optics">Optics Techniques</option>
                  <option value="petroleum_eng">Petroleum Engineering</option>
                  <option value="media">Media</option>
                  <option value="petroleum_gas">Petrooleum And Gas Engineering</option>
                  <option value="Medical">Medical Lab Techniques</option>
                  <option value="law">Law</option>
                  <option value="civil">Civil Engineering</option>
                </select>
              
              <div>
                <label class="form__label" for=""
                  >Attach your Documents
                  <p class="form__optional">(optional)</p></label
                >
                <input
                  multiple
                  class="input"
                  type="file"
                  placeholder="Upload you ID"
                  name="file[]"
                />
              </div>
              <div class="button-group">
                <button name="submit" value="Upload" type="submit" class="btn btn--accent">Send</button>
                <span class="btn btn--secondary close">Close</span>
              </div>
            </form>
          </div>
        </div>
      </section>
    </section>
    <section id="about" class="block block--dark">
      <h2 class="block__heading">About FUC</h2>
      <div class="grid grid--1x3 contianer">
        <div class="card card--orange">
          <h3 class="card__heading">Vision</h3>
          <p class="card__text">
            FUC offers study programs and high-quality educational services. FUC
            graduates are highly demanded on both local and international
            environment. The college seeks to prepare a new generation of
            graduates, able to meet the existing needs of in community and, to
            contribute in economic, social and technical development of the
            country.
          </p>
        </div>
        <div class="card">
          <h3 class="card__heading">Message</h3>
          <p class="card__text">
            The college takes the responsibility of fulfilling the task of
            qualifying a distinguished graduate of applied and a capacity of
            both academic and applied sides to enrich the public and private
            sectors with expertise and energies and to contribute to both
            sectors with technical energy enjoy distinctive efficiency.
          </p>
        </div>
        <div class="card card--orange">
          <h3 class="card__heading">Goals</h3>
          <ul>
            <li>
              <p class="card__text">
                Abide by the quality standards in higher education and act to
                achieve academic accreditation.
              </p>
            </li>
            <li>
              <p class="card__text">
                Pair education with application in various programs of the
                college to create a distinguished intellectual and practical
                graduate able to meet the existed actual needs in community and
                to develop spiritual leadership and confidence in college
                graduates.
              </p>
            </li>
          </ul>
        </div>
      </div>
    </section>
    <section class="block">
      <h2 class="block__heading">What we Offer</h2>
      <div class="grid grid--2x3 contianer">
        <div data-aos="zoom-in" data-aos-duration="1000" class="media">
          <svg class="icon icon--accent">
            <use xlink:href="images/sprite.svg#library"></use>
          </svg>
          <p class="media__name">Amazing library</p>
          <p class="media__text">
            We come equipped with the largest and most organized library, that
            offers both online and offline access to our students at any given
            time.
          </p>
        </div>
        <div data-aos="zoom-in" data-aos-duration="1200" class="media">
          <svg class="icon icon--accent">
            <use xlink:href="images/sprite.svg#programs"></use>
          </svg>
          <p class="media__name">Top Programs</p>
          <p class="media__text">
            Excellent study material with the latest up to date information that
            would help our students to have an amazing knowledge level.
          </p>
        </div>
        <div data-aos="zoom-in" data-aos-duration="1400" class="media">
          <svg class="icon icon--accent">
            <use xlink:href="images/sprite.svg#facilities"></use>
          </svg>
          <p class="media__name">Top of the line facilities</p>
          <p class="media__text">
            We focus on the practical side, so we made sure that all of our
            practical courses come included with High tech learning facilities
            that will boost your education to the max.
          </p>
        </div>
        <div data-aos="zoom-in" data-aos-duration="1600" class="media">
          <svg class="icon icon--accent">
            <use xlink:href="images/sprite.svg#prices"></use>
          </svg>
          <p class="media__name">Suitable Tuition Prices</p>
          <p class="media__text">
            Our primary goal is for our students to learn, that is why we made
            sure our prices are suitable in order for us to be able to provide
            education for everyone
          </p>
        </div>
        <div data-aos="zoom-in" data-aos-duration="1800" class="media">
          <svg class="icon icon--accent">
            <use xlink:href="images/sprite.svg#professors"></use>
          </svg>
          <p class="media__name">Exceptional Professors</p>
          <p class="media__text">
            In order to make sure your learning experience is great, we provided
            you with the most skilled and elite staff of lecturers from all over
            the world.
          </p>
        </div>
        <div data-aos="zoom-in" data-aos-duration="2000" class="media">
          <svg class="icon icon--accent">
            <use xlink:href="images/sprite.svg#learning"></use>
          </svg>
          <p class="media__name">Continuous Learning</p>
          <p class="media__text">
            Here at FUC we provide our graduated students with courses that
            further enhance their knowledge, all of our students get a discount
            on all the future courses that are being held in the college
          </p>
        </div>
      </div>
    </section>
    <div class="block block--dark">
      <h2 id="departments" class="block__heading">Departments</h2>
      <div class="grid grid--1x4 contianer">
        <div class="department__container">
          <a href="Design.html"
            ><img
              class="department__image"
              src="/images/grid/Design Department.jpg"
              alt=""
            />
            <p class="department__name">Design</p></a
          >
        </div>
        <div class="department__container">
          <a href="Architectural_Engineering.html"
            ><img
              class="department__image"
              src="/images/grid/Architecture Engineering.jpg"
              alt=""
            />
            <p class="department__name">Architecture Engineering</p></a
          >
        </div>
        <div class="department__container">
          <a href="Dentistry.html"
            ><img class="department__image" src="/images/grid/Dentisry.jpg" alt="" />
            <p class="department__name">Dentistry</p></a
          >
        </div>
        <div class="department__container">
          <a href="Nursing.html"
            ><img class="department__image" src="/images/grid/Nursing .jpg" alt="" />
            <p class="department__name">Nursing</p></a
          >
        </div>
        <div class="department__container">
          <a href="Biology.html"
            ><img class="department__image" src="/images/grid/Biology.jpg" alt="" />
            <p class="department__name">Biology</p></a
          >
        </div>
        <div class="department__container">
          <a href="Accounting_and_Banking_Sciences.html"
            ><img
              class="department__image"
              src="/images/grid/Banking And Accounating.jpg"
              alt=""
            />
            <p class="department__name">Banking and Accounting</p></a
          >
        </div>
        <div class="department__container">
          <a href="Optics_Technologies.html"
            ><img
              class="department__image"
              src="/images/grid/Optics Techniques.jpg"
              alt=""
            />
            <p class="department__name">Optics Techniques</p></a
          >
        </div>
        <div class="department__container">
          <a href="Petroleum_Engineering.html"
            ><img
              class="department__image"
              src="/images/grid/Petroleum Engineering.jpg"
              alt=""
            />
            <p class="department__name">Petroleum Engineering</p></a
          >
        </div>
        <div class="department__container">
          <a href="Media.html"
            ><img class="department__image" src="/images/grid/Media.jpg" alt="" />
            <p class="department__name">Media</p></a
          >
        </div>
        <div class="department__container">
          <a href="Petroleum_and_Gas_Refining_Engineering.html"
            ><img
              class="department__image"
              src="/images/grid/Petrooleum And Gas Refinery Engineering.jpg"
              alt=""
            />
            <p class="department__name">Petrooleum And Gas Engineering</p></a
          >
        </div>
        <div class="department__container">
          <a href="Medical_Laboratory_Techniques.html"
            ><img
              class="department__image"
              src="/images/grid/Medical Lab Techniques.jpg"
              alt=""
            />
            <p class="department__name">Medical Lab Techniques</p></a
          >
        </div>
        <div class="department__container">
          <a href="Law.html"
            ><img class="department__image" src="/images/grid/Law.jpg" alt="" />
            <p class="department__name">Law</p></a
          >
        </div>
        <div class="department__container grid-pos">
          <a href="computer_engineering.html"
            ><img
              class="department__image"
              src="/images/grid/pexels-thisisengineering-3861958.jpg"
              alt=""
            />
            <p class="department__name">Computer Engineering</p></a
          >
        </div>
        <div class="department__container">
          <a href="Civil_Engineering.html"
            ><img
              class="department__image"
              src="/images/grid/pexels-thisisengineering-3862135.jpg"
              alt=""
            />
            <p class="department__name">Civil Engineering</p></a
          >
        </div>
      </div>
    </div>
    <section class="block contianer">
      <h2 id="news" class="block__heading">News and Events</h2>
      <div class="grid grid--1x2 block__grid">
        <img
          data-aos="zoom-in"
          data-aos-offset="300"
          data-aos-easing="ease-in-sine"
          class="block__image"
          src="/images/news.jpg"
          alt=""
        />
        <div
          data-aos="zoom-out"
          data-aos-duration="700"
          class="block__content block-news__title"
        >
          <h3 class="news__name">
            Blood donation campaign under the slogan of our blood and hearts
            with you
          </h3>
          <a href="/news-page.html" class="link-arrow">read more</a>
        </div>
      </div>
      <div class="grid grid--1x3">
        <div class="block__grid">
          <img class="block__image" src="/images/news.jpg" alt="" />
          <h3 class="news__name">
            Blood donation campaign under the slogan of our blood and hearts
            with you
          </h3>
          <a href="/news-page.html" class="link-arrow">read more</a>
        </div>
        <div class="block__grid">
          <img class="block__image" src="/images/news.jpg" alt="" />
          <h3 class="news__name">
            Blood donation campaign under the slogan of our blood and hearts
            with you
          </h3>
          <a href="/news-page.html" class="link-arrow">read more</a>
        </div>
        <div class="block__grid">
          <img class="block__image" src="/images/news.jpg" alt="" />
          <h3 class="news__name">
            Blood donation campaign under the slogan of our blood and hearts
            with you
          </h3>
          <a href="/news-page.html" class="link-arrow">read more</a>
        </div>
      </div>
    </section>
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
            <li><a class="page-scroll" href="#" data-id="about">About</a></li>
            <li><a href="contact.php">Contact</a></li>
            <li><a class="page-scroll" href="#" data-id="news">News</a></li>
          </ul>
        </section>
        <section class="footer__section footer__brand">
          <img src="/images/Index Page Design.jpg" alt="" />
          <p class="footer__copyright">
            Copyright 2021 Hosam , Ibrahim and Ziad
          </p>
        </section>
      </div>
    </footer>
    <script src="/js/jquery-3.6.0.min.js"></script>
    <script src="/js/jquery.cookie.min.js"></script>
    <script src="/js/main.js"></script>

    <script src="/js/modal.js"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
      AOS.init();
    </script>
  </body>
</html>
