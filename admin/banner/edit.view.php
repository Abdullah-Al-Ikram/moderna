<?php
require_once '../layouts/header.view.php';

?>

<div class="container-xxl flex-grow-1 container-p-y">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card mb-4">
          <h5 class="card-header">Edit Banner</h5>
          <div class="card-body">
              <form action="" method="POST">
                <div>
                  <label for="title" class="form-label">Title</label>
                  <input type="text" class="form-control mb-3" id="title" value="<?= $banner['title'] ?>" name="title" placeholder="Title">
                  <?php
                    if(isset($errors['titleError']))
                    {
                      printf("<p class='text-danger'>%s </p>",  $errors['titleError']);
                    }
                  ?>
                </div>
                <div >
                  <label for="description" class="form-label">Description</label>
                  <textarea class="form-control mb-3" name="description" id="description" rows="3"><?= $banner['description'] ?></textarea>
                  <?php
                    if(isset($errors['descriptionError']))
                    {
                      printf("<p class='text-danger'>%s </p>",  $errors['descriptionError']);
                    }
                  ?>
                </div>
                <div>
                  <label for="btn_text" class="form-label">Button Text</label>
                  <input type="text" class="form-control mb-3" id="btn_text" value="<?= $banner['btn_text'] ?>" name="btn_text" placeholder="Button Text">
                  <?php
                    if(isset($errors['btn_textError']))
                    {
                      printf("<p class='text-danger'>%s </p>",  $errors['btn_textError']);
                    }
                  ?>
                </div>
                <div>
                  <label for="btn_url" class="form-label">Button URL</label>
                  <input type="btn_url" class="form-control mb-3" id="btn_url" value="<?= $banner['btn_url'] ?>" name="btn_url" placeholder="Button URL">
                  <?php
                    if(isset($errors['btn_urlError']))
                    {
                      printf("<p class='text-danger'>%s </p>",  $errors['btn_urlError']);
                    }
                  ?>
                </div>                
                <div class="mb-3">
                  <button class="btn btn-primary d-grid w-100" name="submit" type="submit">Edit</button>
                  </div>
              </form>
            </div>
      </div>
    </div>
  </div>
</div>

<?php
require_once '../layouts/footer.view.php';
