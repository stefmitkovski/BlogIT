<form action="" method="post" enctype="multipart/form-data">
    <?php require_once '../../view/partials/errorchecking.php'; ?>
    <div class="container col-md-5 ">
        <div class="span12 text-center">
            <br><br>
            <span class="fs-4 primary">BlogIT</span>
        </div>
        <div class="mb-3">
            <p class="form-label">Name</p>
            <input type="text" name="name" class="form-control" id="name" value="<?php echo $_POST['name'] ?>" placeholder="Enter your name here">
        </div>
        <div class="mb-3">
            <p class="form-label">Surname</p>
            <input type="text" name="surname" class="form-control" id="surname" value="<?php echo $_POST['surname'] ?>" placeholder="Enter your surname here">
        </div>
        <div class="mb-3">
            <p class="form-label">Email address</p>
            <input type="email" name="email" class="form-control" id="email" value="<?php echo $_POST['email'] ?>" placeholder="Enter your email here">
        </div>
        <div class="mb-3">
            <p class="form-label">Username</p>
            <input type="text" name="username" class="form-control" id="username" value="<?php echo $_POST['username'] ?>" placeholder="Enter your username here">
        </div>
        <div class="mb-3">
            <p class="form-label">Password</p>
            <input type="password" name='password' class="form-control" id="password" placeholder="Enter your password here">
        </div>
        <div class="mb-3">
            <p class="form-label">Password Confirmation</p>
            <input type="password" name='PasswordConfirmation' class="form-control" id="PasswordConfirmation"  placeholder="Re-enter the same password">
        </div>
        <!-- Profile image -->
        <div class="form-group form-group-image-checkbox is-invalid">
            <p>Profile Image</p>
            <input type="file" name="profile-image" id="profile-image" alt="Profile Image"><br><br>
            <p>Or choose one of the following</p>
            <div class="row">
                <div class="col-md-4">
                    <label class="custom-control-label">
                    <input type="radio" class="custom-control-input" id="profile-image-1" name="profile-image" value="male_avatar">
                        <img height=90px width=90px src="../../public/images/male_avatar.svg" alt="male avatar" class="img-fluid">
                    </label>
                </div>
                <div class="col-md-4">
                    <label class="custom-control-label">
                    <input type="radio" class="custom-control-input" id="profile-image-2" name="profile-image" value="female_avatar">
                        <img height=90px width=90px src="../../public/images/female_avatar.svg" alt="female avatar" class="img-fluid">
                    </label>
                </div>
            </div>
            <a href='../products/index.php' type="submit" class="btn btn-secondary">Back</a>
            <button type="submit" class="btn btn-primary">Register</button>
        </div>
</form>