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
<html lang="ar">
  <head>
  <meta name="keywords" content="الفارابي, كلية الفارابي الجامعة, جامعة الفارابي">
<meta name="description" content="كلية الفارابي الجامعة هي كلية اهلية تهدف الى تقديم تعليم مثالي">
<meta property="og:image" content="/images/Index Page Design.jpg">

    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>كلية الفارابي الجامعة</title>
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
            src="/images/Index Page Design.jpg"
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
            <a href="../index.php">English</a>
          </li>
        </ul>
      </nav>
    </header>
    <section class="block hero">
      <div class="grid grid--1x2 contianer">
        <div data-aos="zoom-in" data-aos-duration="500" class="hero__content">
          <h2 class="hero__heading">أدرس في كلية الفارابي!</h2>
          <p class="hero__text">
            إذا كنت مهتماً في الانضمام إلى كلية الفارابي، قم بالضغط على زر
            التقديم ادناه
          </p>
          <button class="btn btn--accent" id="myBtn">قدم الاَن</button>
        </div>
        <div
          data-aos="zoom-in"
          data-aos-duration="500"
          class="hero__image-container"
        >
          <picture
            ><source
              type="image/webp"
              srcset="/images/apply@1x.webp, /images/apply@2x.webp 2x" />
            <source
              type="image/jpg"
              srcset="/images/apply@1x.jpg, /images/apply@2x.jpg 2x" />
            <img class="hero__image" src="images/apply@2x.jpg" alt=""
          /></picture>
        </div>
      </div>
      <section class="form">
        <div id="myModal" class="modal">
          <div class="modal-content">
            <form method="POST" action="" enctype="multipart/form-data">
              <div>
                <input maxlength="40" required name="f_name" class="input" type="text" placeholder="الأسم الكامل" />
              </div>
              <div class="red-text"><?php echo $errors['f_name']; ?></div>
              <div>
                <input minlength="9" maxlength="15" required name="phone" class="input" type="number" placeholder="رقم الهاتف" />
              </div>
              <div class="red-text"><?php echo $errors['phone']; ?></div>
              <div>
                <input
                  maxlength="40"
                  required
                  name="email"
                  class="input"
                  type="email"
                  placeholder="البريد الألكتروني"
                />
              </div>
              <div class="red-text"><?php echo $errors['email']; ?></div>

            
                <div>
                  <input min="50" max="105" name="grade" class="input" type="number" placeholder="معدل الدرجات" />
                </div>
                <div class="red-text"><?php echo $errors['grade']; ?></div>

                <div>
                <label class="form__label" for="">اختر الفرع</label>
                <select required class="input form__select" name="branch" id="">
                  <option value="Biological">أحيائي</option>
                  <option value="Applied">تطبيقي</option>
                  <option value="Scientific">علمي</option>
                  <option value="Literature">ادبي</option>
                  <option value="Industrial">صناعة</option>
                  <option value="Applied Arts">فنون تطبيقية</option>
                  <option value="Trade">تجارة</option>
                  <option value="Institute">معهد </option>
                  <option value="Nursing High school">إعدادية تمريض</option>
                </select>
                </div>
                <div class="red-text"> <?php echo $errors['branch']; ?> </div>

                <label class="form__label" for="">اختر القسم</label>
                <select required class="input form__select" name="department" id="">
                  <option value="computer">هندسة الحاسوب</option>
                  <option value="biology">علوم الحياة</option>
                  <option value="design">التصميم</option>
                  <option value="architecture">الهندسة المعمارية</option>
                  <option value="dentistry">طب الأسنان</option>
                  <option value="nursing">التمريض</option>
                  <option value="banking">العلوم المحاسبية والمصرفية</option>
                  <option value="optics">تقنيات البصريات</option>
                  <option value="petroleum_eng">هندسة النفط</option>
                  <option value="media">الإعلام</option>
                  <option value="petroleum_gas">هندسة تكرير النفط والغاز</option>
                  <option value="Medical">تقنيات المختبرات الطبية</option>
                  <option value="law">القانون</option>
                  <option value="civil">الهندسة المدنية</option>
                </select>
                <div>
                <label class="form__label" for=""
                  >قم بإرفاق المستمسكات
                  <p class="form__optional">(اختياري)</p></label
                >
                <input
                   multiple
                  name="file[]"
                  class="input"
                  type="file"
                  placeholder="Upload you ID"
                  
                />
              </div>
              <div class="button-group">
                <button name="submit" value="submit" type="submit" class="btn btn--accent">إرسال</button>
                <span class="btn btn--secondary close">إغلاق</span>
              </div>
            </form>
          </div>
        </div>
      </section>
    </section>
    <section class="block block--dark">
      <h2 id="about" class="block__heading">حول الفارابي</h2>
      <div class="grid grid--1x3 contianer">
        <div class="card card--orange">
          <h3 class="card__heading">الرؤية</h3>
          <p class="card__text">
            تقدم الكلية برامج دراسية وخدمات تعليمية عالية الجودة ويكون الطلب على
            خريجيها عاليا" في البيئتين المحلية والدولية.كما تسعى الكلية إلى
            إعداد جيل جديد من الخريجين قادر على تلبية الحاجات الفعلية القائمة في
            المجتمع وعلى الإسهام في التنمية الاقتصادية والاجتماعية والتقنية
            للبلاد
          </p>
        </div>
        <div class="card">
          <h3 class="card__heading">الرسالة</h3>
          <p class="card__text">
            تأخذ الكلية على عاتقها مهمة تأهيل خريجين متميزين في إمكانياتهم
            الأكاديمية والتطبيقية ليقوموا بإغناءالقطاعين العام والخاص بخبرات
            وطاقات تسهم في تطويرهما ورفدهما بطاقات تقنية تتمتع بكفاءة متميزة.
          </p>
        </div>
        <div class="card card--orange">
          <h3 class="card__heading">الأهداف</h3>
          <ul>
            <li>
              <p class="card__text">
                الالتزام بمعايير الجودة في مؤسسات التعليم العالي والعمل على
                تحقيق معايير الاعتماد الأكاديمي.
              </p>
            </li>
            <li>
              <p class="card__text">
                المزاوجة بين التعليم والتطبيق في برامج الكلية المختلفة لإيجاد
                خريج متميز فكراً وتطبيقاً قادراً على تلبية الحاجات الفعلية
                القائمة في المجتمع وتنمية روح القيادة والثقة في خريجي الكلية.
              </p>
            </li>
          </ul>
        </div>
      </div>
    </section>
    <section class="block">
      <h2 class="block__heading">ماذا نقدم</h2>
      <div class="grid grid--2x3 contianer">
        <div data-aos="zoom-in" data-aos-duration="1000" class="media">
          <svg class="icon icon--accent">
            <use xlink:href="/images/sprite.svg#library"></use>
          </svg>
          <p class="media__name">مكتبة مذهلة</p>
          <p class="media__text">
            لقد جئنا مجهزين بأكبر مكتبة وأكثرها تنظيما توفر إمكانية الوصول عبر
            الإنترنت وغير المتصلة لطلابنا في أي وقت.
          </p>
        </div>
        <div data-aos="zoom-in" data-aos-duration="1200" class="media">
          <svg class="icon icon--accent">
            <use xlink:href="/images/sprite.svg#programs"></use>
          </svg>
          <p class="media__name">أفضل البرامج</p>
          <p class="media__text">
            مواد دراسية ممتازة مع أحدث المعلومات المحدثة من شأنه أن يساعد طلابنا
            في الحصول على مستوى معرفة مذهل.
          </p>
        </div>
        <div data-aos="zoom-in" data-aos-duration="1400" class="media">
          <svg class="icon icon--accent">
            <use xlink:href="/images/sprite.svg#facilities"></use>
          </svg>
          <p class="media__name">منشئات علمية رصينة</p>
          <p class="media__text">
            نحن نركز على الجانب العملي، لذلك حرصنا على ان تكون برامجنا الدراسية
            مليئة بالمختبرات العلمية العالية الدقة لأجل ضمان حصولك على أفضل
            تعليم
          </p>
        </div>
        <div data-aos="zoom-in" data-aos-duration="1600" class="media">
          <svg class="icon icon--accent">
            <use xlink:href="/images/sprite.svg#prices"></use>
          </svg>
          <p class="media__name">أسعار اقساط مناسبة</p>
          <p class="media__text">
            هدفنا الأساسي هو تعليم طلابنا، لذلك حرصنا ان تكون اقساطنا الدراسية
            مناسبة من أجل ضمان حصول الجميع على فرصة للتعليم
          </p>
        </div>
        <div data-aos="zoom-in" data-aos-duration="1800" class="media">
          <svg class="icon icon--accent">
            <use xlink:href="/images/sprite.svg#professors"></use>
          </svg>
          <p class="media__name">أساتذة متميزون</p>
          <p class="media__text">
            من أجل التأكد من أن تجربة التعلم الخاصة بك رائعة، لقد قمنا بتزويدك
            مع طاقم المحاضرين الأكثر مهارة ونخبة من جميع أنحاء العالم.
          </p>
        </div>
        <div data-aos="zoom-in" data-aos-duration="2000" class="media">
          <svg class="icon icon--accent">
            <use xlink:href="/images/sprite.svg#learning"></use>
          </svg>
          <p class="media__name">التعليم المستمر</p>
          <p class="media__text">
            هنا في كلية الفارابي نقدم لطلابنا المتخرجين دورات تزيد من تعزيز
            معرفتهم ، ويحصل جميع طلابنا على خصم على جميع الدورات المستقبلية التي
            تقام في الكلية
          </p>
        </div>
      </div>
    </section>
    <div class="block block--dark">
      <h2 class="block__heading">الأقسام</h2>
      <div class="grid grid--1x4 contianer">
        <div class="department__container">
          <a href="Design.html"
            ><img
              class="department__image"
              src="/images/grid/Design Department.jpg"
              alt=""
            />
            <p class="department__name">التصميم</p></a
          >
        </div>
        <div class="department__container">
          <a href="Architectural_Engineering.html"
            ><img
              class="department__image"
              src="/images/grid/Architecture Engineering.jpg"
              alt=""
            />
            <p class="department__name">الهندسة المعمارية</p></a
          >
        </div>
        <div class="department__container">
          <a href="Dentistry.html"
            ><img class="department__image" src="/images/grid/Dentisry.jpg" alt="" />
            <p class="department__name">طب الأسنان</p></a
          >
        </div>
        <div class="department__container">
          <a href="Nursing.html"
            ><img class="department__image" src="/images/grid/Nursing .jpg" alt="" />
            <p class="department__name">التمريض</p></a
          >
        </div>
        <div class="department__container">
          <a href="Biology.html"
            ><img class="department__image" src="/images/grid/Biology.jpg" alt="" />
            <p class="department__name">علوم الحياة</p></a
          >
        </div>
        <div class="department__container">
          <a href="Accounting_and_Banking_Sciences.html"
            ><img
              class="department__image"
              src="/images/grid/Banking And Accounating.jpg"
              alt=""
            />
            <p class="department__name">العلوم المحاسبية والمصرفية</p></a
          >
        </div>
        <div class="department__container">
          <a href="Optics_Technologies.html"
            ><img
              class="department__image"
              src="/images/grid/Optics Techniques.jpg"
              alt=""
            />
            <p class="department__name">تقنيات البصريات</p></a
          >
        </div>
        <div class="department__container">
          <a href="Petroleum_Engineering.html"
            ><img
              class="department__image"
              src="/images/grid/Petroleum Engineering.jpg"
              alt=""
            />
            <p class="department__name">هندسة النفط</p></a
          >
        </div>
        <div class="department__container">
          <a href="Media.html"
            ><img class="department__image" src="/images/grid/Media.jpg" alt="" />
            <p class="department__name">الإعلام</p></a
          >
        </div>
        <div class="department__container">
          <a href="Petroleum_and_Gas_Refining_Engineering.html"
            ><img
              class="department__image"
              src="/images/grid/Petrooleum And Gas Refinery Engineering.jpg"
              alt=""
            />
            <p class="department__name">هندسة تكرير النفط والغاز</p></a
          >
        </div>
        <div class="department__container">
          <a href="Medical_Laboratory_Techniques.html"
            ><img
              class="department__image"
              src="/images/grid/Medical Lab Techniques.jpg"
              alt=""
            />
            <p class="department__name">تقنيات المختبرات الطبية</p></a
          >
        </div>
        <div class="department__container">
          <a href="Law.html"
            ><img class="department__image" src="/images/Law.jpg" alt="" />
            <p class="department__name">القانون</p></a
          >
        </div>
        <div class="department__container grid-pos">
          <a href="computer_engineering.html"
            ><img
              class="department__image"
              src="/images/grid/pexels-thisisengineering-3861958.jpg"
              alt=""
            />
            <p class="department__name">هندسة الحاسوب</p></a
          >
        </div>
        <div class="department__container">
          <a href="Civil_Engineering.html"
            ><img
              class="department__image"
              src="/images/grid/pexels-thisisengineering-3862135.jpg"
              alt=""
            />
            <p class="department__name">الهندسة المدنية</p></a
          >
        </div>
      </div>
    </div>
    <section class="block contianer">
      <h2 id="news" class="block__heading">أخبار وأحداث</h2>
      <div class="grid grid--1x2 block__grid">
        <img
          data-aos="zoom-in"
          data-aos-offset="300"
          data-aos-easing="ease-in-sine"
          class="block__image"
          src="/images/news.jpg"
          alt=""
        />
        <div data-aos="zoom-out" class="block__content block-news__title">
          <h3 class="news__name">
            حملة التبرع بالدم تحت شعار دمائنا وقلوبنا معكم
          </h3>
          <div class="link-arrow__container">
            <a href="news-page.html" class="link-arrow">اقرأ المزيد</a>
            <svg class="icon icon--small icon--accent">
              <use xlink:href="/images/sprite.svg#arrow"></use>
            </svg>
          </div>
        </div>
      </div>
      <div class="grid grid--1x3">
        <div class="block__grid">
          <img class="block__image" src="/images/news.jpg" alt="" />
          <h3 class="news__name">
            حملة التبرع بالدم تحت شعار دمائنا وقلوبنا معكم
          </h3>
          <div class="link-arrow__container">
            <a href="news-page.html" class="link-arrow">اقرأ المزيد</a>
            <svg class="icon icon--small icon--accent">
              <use xlink:href="/images/sprite.svg#arrow"></use>
            </svg>
          </div>
        </div>
        <div class="block__grid">
          <img class="block__image" src="/images/news.jpg" alt="" />
          <h3 class="news__name">
            حملة التبرع بالدم تحت شعار دمائنا وقلوبنا معكم
          </h3>
          <div class="link-arrow__container">
            <a href="news-page.html" class="link-arrow">اقرأ المزيد</a>
            <svg class="icon icon--small icon--accent">
              <use xlink:href="/images/sprite.svg#arrow"></use>
            </svg>
          </div>
        </div>
        <div class="block__grid">
          <img class="block__image" src="/images/news.jpg" alt="" />
          <h3 class="news__name">
            حملة التبرع بالدم تحت شعار دمائنا وقلوبنا معكم
          </h3>
          <div class="link-arrow__container">
            <a href="news-page.html" class="link-arrow">اقرأ المزيد</a>
            <svg class="icon icon--small icon--accent">
              <use xlink:href="/images/sprite.svg#arrow"></use>
            </svg>
          </div>
        </div>
      </div>
    </section>
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
          <img src="/images/Index Page Design.jpg" alt="" />
          <p class="footer__copyright">
            جميع الحقوق محفوظة 2021 إبراهيم، حسام وزياد
          </p>
        </section>
      </div>
    </footer>
    <script src="/js/main.js"></script>

    <script src="/js/modal.js"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
      AOS.init();
    </script>
  </body>
</html>
