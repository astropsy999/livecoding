<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Реєстрація - liveCodingUA</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="<?=ROOT?>/niceadmin/assets/img/favicon.png" rel="icon">
  <link href="<?=ROOT?>/niceadmin/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?=ROOT?>/niceadmin/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?=ROOT?>/niceadmin/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="<?=ROOT?>/niceadmin/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="<?=ROOT?>/niceadmin/assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="<?=ROOT?>/niceadmin/assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="<?=ROOT?>/niceadmin/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="<?=ROOT?>/niceadmin/assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="<?=ROOT?>/niceadmin/assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin
  * Updated: Mar 09 2023 with Bootstrap v5.2.3
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center py-4">
                <a href="<?=ROOT?>" class="logo d-flex align-items-center w-auto">
                  <img src="<?=ROOT?>/assets/images/logo.png" alt="">
                  <span class="d-none d-lg-block"><?=APP_NAME?></span>
                </a>
              </div><!-- End Logo -->

              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Створити аккаунт</h5>
                    <p class="text-center small">Введіть свої особисті дані, щоб створити обліковий запис</p>
                  </div>

                  <form method="post" class="row g-3 needs-validation" novalidate>
                    <div class="col-6">
                      <label for="yourName" class="form-label">Ім'я</label>
                      <input value='<?=set_value('firstname')?>' type="text" name="firstname" class="form-control" id="yourName" required1>
                      <div class="invalid-feedback">Будь ласка, введіть своє ім'я!</div>
                    </div>
                       <div class="col-6">
                      <label for="yourName" class="form-label">Прізвище</label>
                      <input value='<?=set_value('lastname')?>' type="text" name="lastname" class="form-control" id="lastName" required1>
                      <div class="invalid-feedback">Будь ласка, введіть своє прізвище!</div>
                    </div>

                    <div class="col-12">
                      <label for="yourEmail" class="form-label">Ваш Email</label>
                      <input value='<?=set_value('email')?>' type="email" name="email" class="form-control <?=!empty($errors['email']) ? 'border-danger':''?>" id="yourEmail" required1>
                      <div class="invalid-feedback">Будь ласка, введіть дійсну адресу електронної пошти!</div>
                      <?php if(!empty($errors['email'])):?>
                      <small class="text-danger"><?=$errors['email']?></small>
                      <?php endif;?>
                    </div>

                    <!-- <div class="col-6">
                      <label for="yourUsername" class="form-label">Ім'я користувача</label>
                      <div class="input-group has-validation">
                        <span class="input-group-text" id="inputGroupPrepend">@</span>
                        <input type="text" name="username" class="form-control" id="yourUsername" required1>
                        <div class="invalid-feedback">Виберіть ім'я користувача.</div>
                      </div>
                    </div> -->

                    <div class="col-12">
                      <label for="yourPassword" class="form-label">Пароль</label>
                      <input value='<?=set_value('email')?>' type="password" name="password" class="form-control" id="yourPassword" required1>
                      <div class="invalid-feedback">Будь ласка, введіть свій пароль!</div>
                    </div>

                    <div class="col-12">
                      <label for="yourPassword" class="form-label">Повторіть Пароль</label>
                      <input <?=set_value('terms') ? 'checked' : ''?> type="password" name="retype_password" class="form-control" id="retype_password" required1>
                      <div class="invalid-feedback">Будь ласка, введіть свій пароль!</div>
                    </div>

                    <div class="col-12">
                      <div class="form-check">
                        <input class="form-check-input" name="terms" type="checkbox" value="1" id="acceptTerms" required1>
                        <label class="form-check-label" for="acceptTerms">Я погоджуюся та приймаю <a href="#">положення та умови</a></label>
                        <div class="invalid-feedback">Ви повинні погодитися перед подачею.</div>
                      </div>
                    </div>
                    <div class="col-12">
                      <button class="btn btn-primary w-100" type="submit">Створити аккаунт</button>
                    </div>
                    <div class="col-12">
                      <p class="small mb-0">Вже маєте аккаунт? <a href="<?=ROOT?>/login">Увійти</a></p>
                    </div>
                  </form>

                </div>
              </div>

              <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
                <!-- Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a> -->
              </div>

            </div>
          </div>
        </div>

      </section>

    </div>
  </main><!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="<?=ROOT?>/niceadmin/assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="<?=ROOT?>/niceadmin/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?=ROOT?>/niceadmin/assets/vendor/chart.js/chart.umd.js"></script>
  <script src="<?=ROOT?>/niceadmin/assets/vendor/echarts/echarts.min.js"></script>
  <script src="<?=ROOT?>/niceadmin/assets/vendor/quill/quill.min.js"></script>
  <script src="<?=ROOT?>/niceadmin/assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="<?=ROOT?>/niceadmin/assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="<?=ROOT?>/niceadmin/assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="<?=ROOT?>/niceadmin/assets/js/main.js"></script>

</body>

</html>