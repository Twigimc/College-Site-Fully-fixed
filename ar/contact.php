<?php
include_once 'config.php';
$name=$email=$message='';
$errors=array('name'=>'','email'=>'','message'=>'');
if(isset($_POST['submit'])) {
  if(empty($_POST['name'])) {
    $errors['name'] = 'يرجى كتابة الأسم بالكامل';
 }
 else {
    $name = $_POST['name'];
 }
 if(empty($_POST['email'])) {
    $errors['email'] = 'يرجى كتابة البريد الالكتروني';
 }
 else 
 {
    $email = $_POST['email'];

 }
 if(empty($_POST['message'])) {
    $errors['message'] = 'يرجى كتابة الرسالة';
 }
 else {
    $message = $_POST['message'];
 }

 if(array_filter($errors)){
  echo '<script type ="text/JavaScript">';  
  echo 'alert("لم تقم بملأ الإستمارة")';  
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
    echo 'alert("تم استلام رسالتك، شكراً")';  
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
  <meta name="keywords" content="الفارابي, كلية الفارابي الجامعة, جامعة الفارابي">
<meta name="description" content="كلية الفارابي الجامعة هي كلية اهلية تهدف الى تقديم تعليم مثالي">
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"
      integrity="sha512-3j3VU6WC5rPQB4Ld1jnLV7Kd5xr+cq9avvhwqzbH/taCRNURoeEpoPBK9pDyeukwSxwRPJ8fDgvYXd6SkaZ2TA=="
      crossorigin="anonymous"
    ></script>
  </head>
  <body class="arabic">
    <header>
      <nav class="nav">
        <a class="nav__brand__anker" href="../ar/index.php"
          ><img
            class="nav__brand"
            src="/images/Index Page Design.png"
            alt="" /></a
        ><svg class="icon icon--white nav__toggler toggle">
          <use xlink:href="/images/sprite.svg#toggler"></use>
        </svg>
        <ul class="list nav__list menu">
          <li class="item nav__item"><a href="index.php">الرئيسية</a></li>
          <li class="item nav__item"><a href="contact.php">اتصل بنا</a></li>
          <li class="item nav__item has-submenu">
            <a>الاقسام</a>
            <ul class="submenu">
              <li class="subitem"><a href="Design.html">التصميم</a></li>
              <li class="subitem">
                <a href="computer_engineering.html">هندسة الحاسوب</a>
              </li>
              <li class="subitem">
                <a href="Accounting_and_Banking_Sciences.html"
                  >العلوم المحاسبية والمصرفية</a
                >
              </li>
              <li class="subitem">
                <a href="Architectural_Engineering.html">الهندسة المعمارية</a>
              </li>
              <li class="subitem">
                <a href="Civil_Engineering.html">الهندسة المدنية</a>
              </li>
              <li class="subitem"><a href="Dentistry.html">طب الأسنان</a></li>
              <li class="subitem"><a href="Media.html">الإعلام</a></li>
              <li class="subitem">
                <a href="Medical_Laboratory_Techniques.html"
                  >تقنيات المختبرات الطبية</a
                >
              </li>
              <li class="subitem"><a href="Nursing.html">التمريض</a></li>
              <li class="subitem">
                <a href="Optics_Technologies.html">تقنيات البصريات</a>
              </li>
              <li class="subitem">
                <a href="Petroleum_Engineering.html">هندسة النفط</a>
              </li>
              <li class="subitem"><a href="Law.html">القانون</a></li>
              <li class="subitem">
                <a href="Petroleum_and_Gas_Refining_Engineering.html"
                  >هندسة تكرير النفط والغاز</a
                >
              </li>
              <li class="subitem"><a href="Biology.html">علوم الحياة</a></li>
            </ul>
          </li>
          <li class="item nav__item arabic">
            <a href="../contact.php">English</a>
          </li>
        </ul>
      </nav>
    </header>
    <div class="contact-page">
      <div class="contact-page__heading block__heading">
        <h2>أتصل بنا</h2>
        <p>
          إذا كانت لديك أي أسئلة أخرى لم يتم تناولها في هذا الموقع ، فيمكنك
          دائمًا العثور علينا هنا ، كما يمكنك الاتصال بنا في النموذج أدناه
        </p>
      </div>
      <div class="grid grid--1x2">
        <div class="contact__content">
          <div class="contact__section">
            <div class="contact__info__icon">
              <svg class="icon icon--accent">
                <use xlink:href="/images/sprite.svg#address"></use>
              </svg>
            </div>
            <div class="contact__info">
              <h3>العنوان</h3>
              <p>بغداد - الدورة - شارع المصافي - مقابل شارع ابو طيارة</p>
            </div>
          </div>
          <div class="contact__section">
            <div class="contact__info__icon">
              <svg class="icon icon--accent">
                <use xlink:href="/images/sprite.svg#email"></use>
              </svg>
            </div>
            <div class="contact__info">
              <h3>البريد الالكتروني</h3>
              <p>info@alfarabiuc.edu.iq</p>
            </div>
          </div>
          <div class="contact__section">
            <div class="contact__info__icon">
              <svg class="icon icon--accent">
                <use xlink:href="/images/sprite.svg#phone"></use>
              </svg>
            </div>
            <div class="contact__info">
              <h3>رقم الهاتف</h3>
              <p>07712365333</p>
            </div>
          </div>
        </div>
        <div class="contact__form">
          <h3>أرسل إلينا رسالة</h3>
          <form method="POST" action="">
            <div>
              <input required maxlength="40" name="name" class="input" type="text" placeholder="الأسم الكامل" />
            </div>
            <div class="red-text"><?php echo $errors['name']; ?></div>

            <div>
              <input
                maxlength="40"
                required
                name="email"
                class="input"
                type="email"
                placeholder="عنوان البريد الالكتروني"
              />
            </div>
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
                placeholder="أكتب رسالتك"
              ></textarea>
            </div>
            <div class="red-text"><?php echo $errors['message']; ?></div>

            <button type="submit" value="submit" name="submit" class="contact__form__btn">إرسال</button>
          </form>
        </div>
      </div>
    </div>
    <footer class="block--dark footer">
      <div class="grid footer__sections">
        <section class="footer__section collapsible">
          <div class="collapsible__header">
            <h3 class="collapsible__heading">الأقسام</h3>
            <svg class="icon icon--white collapsible__chevron">
              <use xlink:href="/images/sprite.svg#chevron"></use>
            </svg>
          </div>
          <ul class="list collapsible__content">
            <li><a href="computer_engineering.html">هندسة الحاسوب</a></li>
            <li>
              <a href="Architectural_Engineering.html">الهندسة المعمارية</a>
            </li>
            <li><a href="Petroleum_Engineering.html">هندسة النفط</a></li>
            <li><a href="Civil_Engineering.html">الهندسة المدنية</a></li>
            <li>
              <a href="Petroleum_and_Gas_Refining_Engineering.html"
                >هندسة تكرير النفط والغاز</a
              >
            </li>
            <li><a href="Law.html">القانون</a></li>
            <li><a href="Media.html">الإعلام</a></li>
            <li>
              <a href="Accounting_and_Banking_Sciences.html"
                >علوم المحاسبية والمصرفية</a
              >
            </li>
            <li><a href="Optics_Technologies.html">تقنيات البصريات</a></li>
            <li><a href="Biology.html">علوم الحياة</a></li>
            <li><a href="Design.html">التصميم</a></li>
            <li>
              <a href="Medical_Laboratory_Techniques.html"
                >تقنيات المختبرات الطبية</a
              >
            </li>
            <li><a href="Dentistry.html">طب الأسنان</a></li>
            <li><a href="Nursing.html">التمريض</a></li>
          </ul>
        </section>
        <section class="footer__section collapsible">
          <div class="collapsible__header">
            <h3 class="collapsible__heading">الجامعة</h3>
            <svg class="icon icon--white collapsible__chevron">
              <use xlink:href="/images/sprite.svg#chevron"></use>
            </svg>
          </div>
          <ul class="list collapsible__content">
            <li><a href="index.php">الرئيسية</a></li>
            <li>
              <a class="page-scroll" href="index.php" data-id="about"
                >حول الكلية</a
              >
            </li>
            <li><a href="contact.php">أتصل بنا</a></li>
            <li>
              <a class="page-scroll" href="index.php" data-id="news"
                >الأخبار</a
              >
            </li>
          </ul>
        </section>
        <section class="footer__section footer__brand">
          <img src="/images/Index Page Design.png" alt="" />
          <p class="footer__copyright">
            جميع الحقوق محفوظة 2021 إبراهيم، حسام وزياد
          </p>
        </section>
      </div>
    </footer>
    <script src="/js/main.js"></script>
  </body>
</html>
