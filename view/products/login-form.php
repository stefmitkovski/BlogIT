<form action="" method="post">
<?php require_once '../../view/partials/errorchecking.php'; ?>
    <div class="container pt-5 col-md-5 col-md-offset-4">
        <div class="span12 text-center">
            <span class="fs-4 primary">BlogIT</span>
        </div>
        <div class="mb-3">
            <p class="form-label">Username</p>
            <input type="text" name="username" class="form-control" id="username" placeholder="Enter your username here">
        </div>
        <div class="mb-3">
            <p class="form-label">Password</p>
            <input type="password" name='password' class="form-control" id="password" placeholder="Enter your password here">
        </div>
        <a href='../products/index.php' type="submit" class="btn btn-secondary">Back</a>
        <button type="submit" class="btn btn-primary">Log in</button>
    </div>
</form>