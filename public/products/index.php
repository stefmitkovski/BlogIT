<?php
require_once '../../view/partials/navbar.php';
if (isset($_SESSION['user'])) {
    header('Location: logout.php');
    exit;
}
?>

<header class="header">
    <div class="shape-wrap shape-header"><img src="../images/blob-shape-1.svg"></div>
    <div class="container">
        <div class="row d-flex align-items-center pt-5">
            <div class="col-md-5">
                <div class="headline">
                    <div class="headline-content">
                        <h1 class="headline-title">A place where you can write a post about anything! </h1>
                        <p class="lead">And see what everybody is posting.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-7"> <img src="../images/header-img.svg" alt="" class="img-fluid pt-5"></div>
        </div>
    </div>
</header>
<section class="space-md bg-image-2 position-relative">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="row align-items-center mt-3">
                    <div class="col-md-8 text-center">
                        <div class="position-relative"> <img src="../images/main-img.svg" alt="" class="img-fluid" style="max-height: 700px;"></div>
                    </div>
                    <div class="col-md-4">
                        <div class="d-flex mb-3">
                            <div class="p-2 h2 text-primary"> <i class="bi bi-newspaper"></i> </div>
                            <div class="ml-auto p-2">
                                <h5>A plae where you can see and post blogs.</h5>
                                <p>No fee for accessing the blogs only account required!</p>
                            </div>
                        </div>
                        <div class="d-flex mb-3">
                            <div class="p-2 h2 text-primary"> <i class="bi bi-cash-stack"></i></div>
                            <div class="ml-auto p-2">
                                <h5>A place where you can earn money from posting blogs *</h5>
                                <p>*The product is currently under development, final results may differ and are not guaranteed!</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>
<footer class="pt-4 pb-5 bg-light position-relative">
    <div class="container">
        <div class="row">
            <div class="col-lg-auto mt-4">
                <h3 class="color-3 fw-700 mb-4 primary">BlogIT</h3>
            </div>
            <div class="col-lg-5 mt-4">
                <p class="color-7 mb-0 pr-md-11 pr-lg-0">A blogging web site where everybody <br> can see and post a blog.</p>
            </div>
            <div class="col-lg-auto ml-lg-auto mt-4"><a class="color-4 mr-4" href="https://sharebootstrap.com" alt="free html templates ">© 2019 Free under CC BY 3.0.</a></div>
        </div>
        <!--/.row-->
    </div>
    <!--/.container-->
</footer>
</main>
</body>

</html>