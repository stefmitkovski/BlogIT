<form action="" method="post" enctype="multipart/form-data">
<?php require_once '../../view/partials/errorchecking.php'; ?>
    <div class="container pt-5 col-md-5 col-md-offset-4">
        <div class="span12 text-center">
            <span class="fs-4 primary">BlogIT</span>
        </div>
        <div class="mb-3">
            <p for="name" class="form-label">Title</p>
            <input type="text" name="title" class="form-control" id="title" value="<?php echo $post['title'] ?>" placeholder="Enter the name of the title here">
        </div>
        <div class="mb-3">
            <p for="name" class="form-label">Body</p>
            <textarea class="form-control" name="body" id="body" rows="5" placeholder="Enter the post body here"><?php echo $post['body'] ?></textarea>
        </div>
        <div class="mb-3">
           <p>Select Photo (one or multiple) to add to this blog:</p>
            <input type="file" name="files[]" multiple/>
            <p>Note: Supported image format: .jpeg, .jpg, .png, .gif</p>
        </div>
        <p>Select the image you want to delete from this blog</p>
        <div class="mb-3">
            <?php foreach($images as $i => $image): ?>
            <input type="checkbox" id="myCheckbox<?php echo $i+1?>" name="delete[]" value="<?php echo $image['id']?>">
            <label for="myCheckbox<?php echo $i+1?>"><img src="<?php echo $image['image']?>" height="150px" width="150px" /></label>
            <?php endforeach; ?>
        </div>
            <a href='../products/home.php' type="submit" class="btn btn-secondary">Back</a>
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
</form>