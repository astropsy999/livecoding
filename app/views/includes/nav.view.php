<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

      <a href="<?=ROOT?>" class="logo d-flex align-items-center">
       <img src="<?=ROOT?>/assets/images/logo.png" alt="<?=APP_NAME?>">
        <span class="d-none d-lg-block"><?=APP_NAME?></span>
      </a>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="<?=ROOT?>">Blog</a></li>
          <li><a href="single-post">Single Post</a></li>
          <li class="dropdown"><a href="category"><span>Categories</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
            <ul>
              <li><a href="search-result">Search Result</a></li>
              <li><a href="#">Drop Down 1</a></li>
              <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
                <ul>
                  <li><a href="#">Deep Drop Down 1</a></li>
                  <li><a href="#">Deep Drop Down 2</a></li>
                  <li><a href="#">Deep Drop Down 3</a></li>
                  <li><a href="#">Deep Drop Down 4</a></li>
                  <li><a href="#">Deep Drop Down 5</a></li>
                </ul>
              </li>
              <li><a href="#">Drop Down 2</a></li>
              <li><a href="#">Drop Down 3</a></li>
              <li><a href="#">Drop Down 4</a></li>
            </ul>
          </li>

          <li><a href="<?=ROOT?>/about">About</a></li>
          <li><a href="<?=ROOT?>/contact">Contact</a></li>
          <?php if(!Auth::logged_in()):?>
            <li><a href="<?=ROOT?>/login">Увійти</a></li>
            <li><a href="<?=ROOT?>/signup">Реєстрація</a></li>
          <?php else:?>

            <li class="dropdown"><a href="category"><span>Hi, <?=Auth::getFirstname()?></span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
            <ul>
              <li><a href="<?=ROOT?>/admin">Панель</a></li>
              <li><a href="#">Профіль</a></li>
              <li><a href="#">Налаштування</a></li>
              <li><a href="<?=ROOT?>/logout">Вийти</a></li>
            </ul>
          </li>
          <?php endif;?>
        </ul>
      </nav><!-- .navbar -->
      <div class="position-relative">
        <a href="#" class="mx-2"><span class="bi-facebook"></span></a>
        <a href="#" class="mx-2"><span class="bi-twitter"></span></a>
        <a href="#" class="mx-2"><span class="bi-instagram"></span></a>

        <a href="#" class="mx-2 js-search-open"><span class="bi-search"></span></a>
        <i class="bi bi-list mobile-nav-toggle"></i>

        <!-- ======= Search Form ======= -->
        <div class="search-form-wrap js-search-form-wrap">
          <form action="search-result" class="search-form">
            <span class="icon bi-search"></span>
            <input type="text" placeholder="Search" class="form-control">
            <button class="btn js-search-close"><span class="bi-x"></span></button>
          </form>
        </div><!-- End Search Form -->

      </div>

    </div>

  </header><!-- End Header -->

  <main id="main">