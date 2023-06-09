<?php $this->view('admin/admin-header', $data);?>
<?php if($row):?>
<div class="pagetitle">
      <h1>Профіль</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Головна</a></li>
          <li class="breadcrumb-item">Користувачі</li>
          <li class="breadcrumb-item active">Профіль</li>
          <li class="breadcrumb-item active"><?=esc($row->firstname)?> <?=esc($row->lastname)?></li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
      <div class="row">
        <div class="col-xl-4">

          <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

              <img src="<?=ROOT?>/<?=$row->image?>" alt="Профіль" class="rounded-circle" style="width: 200px; max-width:200px; height:200px; object-fit: cover;">
              <h2><?=esc($row->firstname)?> <?=esc($row->lastname)?></h2>
              <h3><?=esc($row->role)?></h3>
              <div class="social-links mt-2">
                <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
              </div>
            </div>
          </div>

        </div>

        <div class="col-xl-8">

          <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered">

                <li class="nav-item">
                  <button onclick="set_tab(this.getAttribute('data-bs-target'))" class="nav-link active" id="profile-overview-tab" data-bs-toggle="tab" data-bs-target="#profile-overview">Огляд</button>
                </li>

                <li class="nav-item">
                  <button onclick="set_tab(this.getAttribute('data-bs-target'))" class="nav-link" id="profile-edit-tab" data-bs-toggle="tab" data-bs-target="#profile-edit">Редагувати</button>
                </li>

                <li class="nav-item">
                  <button onclick="set_tab(this.getAttribute('data-bs-target'))" class="nav-link" id="profile-settings-tab" data-bs-toggle="tab" data-bs-target="#profile-settings">Налаштування</button>
                </li>

                <li class="nav-item">
                  <button onclick="set_tab(this.getAttribute('data-bs-target'))" class="nav-link" id="profile-change-password-tab" data-bs-toggle="tab" data-bs-target="#profile-change-password">Змінити пароль</button>
                </li>

              </ul>
              <div class="tab-content pt-2">

                <div class="tab-pane fade show active profile-overview" id="profile-overview">
                  <h5 class="card-title">Про мене</h5>
                  <p class="small fst-italic"><?=esc($row->about)?></p>

                  <h5 class="card-title">Деталі профілю</h5>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Імʼя Прізвище</div>
                    <div class="col-lg-9 col-md-8"><?=esc($row->firstname)?> <?=esc($row->lastname)?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Компанія</div>
                    <div class="col-lg-9 col-md-8"><?=esc($row->company)?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Робота</div>
                    <div class="col-lg-9 col-md-8"><?=esc($row->job)?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Країна</div>
                    <div class="col-lg-9 col-md-8"><?=esc($row->country)?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Адреса</div>
                    <div class="col-lg-9 col-md-8"><?=esc($row->address)?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Телефон</div>
                    <div class="col-lg-9 col-md-8"><?=esc($row->phone)?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Email</div>
                    <div class="col-lg-9 col-md-8"><?=esc($row->email)?></div>
                  </div>

                </div>

                <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                  <!-- Profile Edit Form -->
                  <form method="POST" enctype="multipart/form-data">
                    <div class="row mb-3">
                      <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Фото профіля</label>
                      <div class="col-md-8 col-lg-9">
                        <div class="d-flex">
                          <img class="js-image-preview" src="<?=ROOT?>/<?=$row->image?>" alt="Profile">
                          <div class="js-filename m-2">Вибраний файл: None</div>
                        </div>
                        <div class="pt-2">
                          <label href="#" class="btn btn-primary btn-sm" title="Завантажити нове зображення">
                            <i class="text-white bi bi-upload"></i>
                            <input class="js-profile-image-input" onchange="load_image(this.files[0])" type="file" name="image" style="display: none;">
                          </label>
                          <?php if(!empty($errors['image'])):?>
                          <small class="js-error-image text-danger"><?=$errors['image']?></small>
                        <?php endif;?>
                          <small class="js-error-image text-danger"></small>

                          <a href="#" class="btn btn-danger btn-sm" title="Remove my profile image"><i class="bi bi-trash"></i></a>
                        </div>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="firstname" class="col-md-4 col-lg-3 col-form-label">Імʼя</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="firstname" type="text" class="form-control" id="fullName" value="<?=set_value('firstname', $row->firstname)?>" required>
                      </div>
                       <?php if(!empty($errors['firstname'])):?>
                          <small class="js-error-firstname text-danger"><?=$errors['firstname']?></small>
                        <?php endif;?>
                          <small class="js-error-firstname text-danger"></small>

                    </div>

                     <div class="row mb-3">
                      <label for="lastname" class="col-md-4 col-lg-3 col-form-label">Прізвище</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="lastname" type="text" class="form-control" id="fullName" value="<?=set_value('lastname', $row->lastname)?>" required>
                      </div>
                       <?php if(!empty($errors['lastname'])):?>
                          <small class="js-error-lastname text-danger"><?=$errors['lastname']?></small>
                        <?php endif;?>
                          <small class="js-error-lastname text-danger"></small>

                    </div>

                    <div class="row mb-3">
                      <label for="about" class="col-md-4 col-lg-3 col-form-label">Опис</label>
                      <div class="col-md-8 col-lg-9">
                        <textarea name="about" class="form-control" id="about" style="height: 100px"><?=set_value('about', $row->about)?></textarea>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="company" class="col-md-4 col-lg-3 col-form-label">Компанія</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="company" type="text" class="form-control" id="company" value="<?=set_value('company', $row->company)?>">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Job" class="col-md-4 col-lg-3 col-form-label">Робота</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="job" type="text" class="form-control" id="Job" value="<?=set_value('job', $row->job)?>">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Country" class="col-md-4 col-lg-3 col-form-label">Країна</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="country" type="text" class="form-control" id="Country" value="<?=set_value('country', $row->country)?>">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Address" class="col-md-4 col-lg-3 col-form-label">Адреса</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="address" type="text" class="form-control" id="Address" value="<?=set_value('address', $row->address)?>">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Phone" class="col-md-4 col-lg-3 col-form-label">Телефон</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="phone" type="text" class="form-control" id="Phone" value="<?=set_value('phone', $row->phone)?>">
                      </div>
                       <?php if(!empty($errors['phone'])):?>
                          <small class="js-error-phone text-danger"><?=$errors['phone']?></small>
                        <?php endif;?>
                          <small class="js-error-phone text-danger"></small>

                    </div>

                    <div class="row mb-3">
                      <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email" type="email" class="form-control" id="Email" value="<?=set_value('email', $row->email)?>" required>
                      </div>
                       <?php if(!empty($errors['email'])):?>
                          <small class="js-error-email text-danger"><?=$errors['email']?></small>
                        <?php endif;?>
                          <small class="js-error-email text-danger"></small>

                    </div>

                    <div class="row mb-3">
                      <label for="Twitter" class="col-md-4 col-lg-3 col-form-label">Twitter Profile</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="twitter_link" type="text" class="form-control" id="Twitter" value="<?=set_value('twitter_link', $row->twitter_link)?>">
                      </div>
                        <?php if(!empty($errors['twitter_link'])):?>
                          <small class="js-error-twitter_link text-danger"><?=$errors['twitter_link']?></small>
                        <?php endif;?>
                          <small class="js-error-twitter_link text-danger"></small>

                    </div>

                    <div class="row mb-3">
                      <label for="Facebook" class="col-md-4 col-lg-3 col-form-label">Facebook Profile</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="facebook_link" type="text" class="form-control" id="Facebook" value="<?=set_value('facebook_link', $row->facebook_link)?>">
                      </div>
                      <?php if(!empty($errors['facebook_link'])):?>
                        <small class="js-error-facebook_link text-danger"><?=$errors['facebook_link']?></small>
                      <?php endif;?>
                        <small class="js-error-facebook_link text-danger"></small>

                    </div>

                    <div class="row mb-3">
                      <label for="Instagram" class="col-md-4 col-lg-3 col-form-label">Instagram Profile</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="instagram_link" type="text" class="form-control" id="Instagram" value="<?=set_value('instagram_link', $row->instagram_link)?>">
                      </div>
                        <?php if(!empty($errors['instagram_link'])):?>
                          <small class="js-error-instagram_link text-danger"><?=$errors['instagram_link']?></small>
                        <?php endif;?>
                          <small class="js-error-instagram_link text-danger"></small>

                    </div>

                    <div class="row mb-3">
                      <label for="Linkedin" class="col-md-4 col-lg-3 col-form-label">Linkedin Profile</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="linkedin_link" type="text" class="form-control" id="Linkedin" value="<?=set_value('linkedin_link', $row->linkedin_link)?>">
                      </div>
                       <?php if(!empty($errors['linkedin_link'])):?>
                        <small class="js-error-linkedin_link text-danger"><?=$errors['linkedin_link']?></small>
                      <?php endif;?>
                        <small class="js-error-linkedin_link text-danger"></small>

                    </div>

                    <div class="js-progress-bar progress my-4 hide">
                      <div class="progress-bar" role="progressbar" style="width: 50%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <div class="text-center">
                      <a href="<?ROOT?>/admin">
                      <button type="button" class="btn btn-primary float-start">Назад</button>
                      </a>
                      <button type="button" onclick="save_profile(event)" type="submit" class="btn btn-success float-end">Зберегти зміни</button>
                    </div>
                  </form><!-- End Profile Edit Form -->

                </div>

                <div class="tab-pane fade pt-3" id="profile-settings">

                  <!-- Settings Form -->
                  <form>

                    <div class="row mb-3">
                      <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Email Notifications</label>
                      <div class="col-md-8 col-lg-9">
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" id="changesMade" checked>
                          <label class="form-check-label" for="changesMade">
                            Changes made to your account
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" id="newProducts" checked>
                          <label class="form-check-label" for="newProducts">
                            Information on new products and services
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" id="proOffers">
                          <label class="form-check-label" for="proOffers">
                            Marketing and promo offers
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" id="securityNotify" checked disabled>
                          <label class="form-check-label" for="securityNotify">
                            Security alerts
                          </label>
                        </div>
                      </div>
                    </div>

                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">Зберегти зміни</button>
                    </div>
                  </form><!-- End settings Form -->

                </div>

                <div class="tab-pane fade pt-3" id="profile-change-password">
                  <!-- Change Password Form -->
                  <form>

                    <div class="row mb-3">
                      <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Current Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="password" type="password" class="form-control" id="currentPassword">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="newpassword" type="password" class="form-control" id="newPassword">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter New Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="renewpassword" type="password" class="form-control" id="renewPassword">
                      </div>
                    </div>

                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">Change Password</button>
                    </div>
                  </form><!-- End Change Password Form -->

                </div>

              </div><!-- End Bordered Tabs -->

            </div>
          </div>

        </div>
      </div>
    </section>
    <?php else:?>
        <div class="alert alert-danger alert-dissmissible fade show" role="alert">
            Цей профайл не знайдено!
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>

    <?php endif;?>
       <script>
          var tab = sessionStorage.getItem('tab') ? sessionStorage.getItem('tab') : "#profile-overview";
          function show_tab(tab_name){
            var someTabTriggerEl = document.querySelector(tab_name+"-tab")
            var tabShow = new bootstrap.Tab(someTabTriggerEl)

            tabShow.show();
          }

          function set_tab(tab_name) {
            tab = tab_name;

            sessionStorage.setItem("tab", tab_name)
          }

          function load_image(file){
            document.querySelector('.js-filename').innerHTML = "Вибраний файл: " + file.name;
            var myLink = window.URL.createObjectURL(file);
            if(myLink) {
              document.querySelector('.js-image-preview').src = myLink;
            }
          }

          window.onload = function () {

            show_tab(tab)
          }

          //upload data

          function save_profile(e) {

            var form = e.currentTarget.form
            var inputs = form.querySelectorAll('input, textarea')
            var obj = {}
            var image_added = false;

            for(var i=0 ; i<inputs.length; i++) {
              var key = inputs[i].name
              if(key == 'image') {
                if(typeof inputs[i].files[0] == 'object') {
                 obj[key] = inputs[i].files[0]
                 image_added = true;
                 }
              }else {
              obj[key] = inputs[i].value
              }

            }

            if(image_added) {
              var allowed = ['jpeg','jpg', 'png'];

              if(typeof obj.image == 'object') {
                var ext = obj.image.name.split(".").pop();
              }

              if(!allowed.includes(ext.toLowerCase())) {
                alert("В якості зображення профілю підтримуються тільки файли типів:" + allowed.toString(", "));
                return;
              }
            }

            send_data(obj);
          }

          function send_data(obj, progbar = "js-progress-bar") {
            var progressBar = document.querySelector('.'+progbar);
            progressBar.children[0].style.width = "0%"
            progressBar.classList.remove('hide')
            var myForm = new FormData()

            for (key in obj) {
              myForm.append(key, obj[key])
            }

            var ajax = new XMLHttpRequest();

            ajax.addEventListener('readystatechange', function(){
              if(ajax.readyState == 4) {
                if(ajax.status == 200) {
                  // alert('Завантажено');
                  // window.location.reload();
                  handle_result(ajax.responseText);
                }else{
                  alert("Сталася помилка!")
                }
              }
            })
            ajax.upload.addEventListener('progress', function(e){
              var percentage = Math.round((e.loaded / e.total) * 100)

              progressBar.children[0].style.width = percentage + "%"
              progressBar.children[0].style.innerHTML = "Збережено.. " + percentage + "%"
            })
            ajax.open('POST', '', true);
            ajax.send(myForm);
          }
          function handle_result(result){
            var obj = JSON.parse(result);
            if(typeof obj == 'object') {
              if(typeof obj.errors == 'object') {
              display_errors(obj.errors);
              alert('Будь ласка виправте помилки')

            }else {
              alert('Дані вдало збережено')
              window.location.reload();
            }
            }
          }
          function display_errors(errors) {

            for(key in errors) {
              document.querySelector('.js-error-'+key).innerHTML = errors[key]
            }
          }
        </script>
<?php $this->view('admin/admin-footer', $data);?>