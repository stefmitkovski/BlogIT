<form action="" method="post" enctype="multipart/form-data">
<?php require_once '../../view/partials/errorchecking.php'; ?>
    <div class="container col-md-5 col-md-offset-4 pt-5">
        <div class="span12 text-center">
            <span class="fs-4 primary">BlogIT</span>
        </div>
        <div class="mb-3">
            <p>Title</p>
            <input type="text" name="title" class="form-control" id="title" value="<?php echo $_POST['title']; ?>" placeholder="Enter the name of the title here">
        </div>
        <div class="mb-3">
            <p>Body</label>
            <textarea class="form-control" name="body" id="body" rows="5" placeholder="Enter the post body here"><?php echo $_POST['body']; ?></textarea>
        </div>
        <div class="mb-3">
           <p>Select Photo (one or multiple):</p>
            <input type="file" name="files[]" multiple/>
            <p>Note: Supported image format: .jpeg, .jpg, .png, .gif</p>
        </form>
        </div>
            <a href='../products/home.php' type="submit" class="btn btn-secondary">Back</a>
            <button type="submit" class="btn btn-primary">Register</button>
        </div>
</form>