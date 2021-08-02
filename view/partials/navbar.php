<?php require_once 'header.php' ?>

<body>
  <nav class="navbar navbar-dark fixed-top navbar-expand-lg shadow-sm px-3" style="background-color: white;">
    <?php if(!isset($_SESSION['user'])): ?>
    <a href="../../public/products/index.php" class="text-dark text-decoration-none pb-2">
      <span class="fs-4 primary">BlogIT</span>
    </a>
    <?php else: ?>
    <a href="../../public/products/home.php" class="text-dark text-decoration-none pb-2">
      <span class="fs-4 primary">BlogIT</span>
    </a>
    <?php endif; ?>
    <button style="background-color:#707bfb" class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#toggleMobileMenu" aria-controls="toggleMobileMenu" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon">
      </span>
    </button>
    <div class="container-fluid">
      <div class="navbar-collapse collapse w-100 order-3 dual-collapse2" id="toggleMobileMenu">
        <ul class="navbar-nav ms-auto">
        <?php if (!isset($_SESSION['user'])) : ?>
            <li class="nav-item"><a href="/public/products/signup.php" class="nav-link"><span class="fs-5 primary">SIGN UP</span></a></li>
            <li class="nav-item"><a href="/public/products/login.php" class="nav-link"><span class="fs-5 primary">SIGN IN</span></a></li>
            <li class="nav-item"><a href="/public/products/login.php?redirect=true" class="nav-link" aria-current="page"><span class="fs-5 primary">CREATE A BLOG</span></a></li>
        <?php else : ?>
            <li class="nav-item"><a href="/public/products/home.php" class="nav-link"><span class="fs-5 primary">POSTS</span></a></li>
            <li class="nav-item"><a href="/public/products/create.php" class="nav-link"><span class="fs-5 primary">CREATE A BLOG</span></a></li>
            <li class="nav-item">
            <li class="nav-link pt-1">
              <a href="/public/products/profile.php" style="text-decoration:none">
                <span class="fs-5 primary px-1"><?php echo strtoupper($_SESSION['user']); ?></span>
                <img class="mb-1" style="height: 40px; width: 35px; border-radius: 50%;" src="<?php echo $_SESSION['image'] ?>" alt="avatar">
              </a>
            </li>
            </li>
            <li class="nav-item"><a href="/public/products/logout.php" class="nav-link"><span class="fs-5 primary">LOG OUT</span></a></li>
            <?php endif ?>
          </ul>
      </div>
    </div>
    </header>
  </nav>

  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  <!-- Option 2: Separate Popper and Bootstrap JS -->
  <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->