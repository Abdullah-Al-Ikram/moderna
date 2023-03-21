<?php
require_once '../layouts/header.view.php';

?>

<div class="container-xxl flex-grow-1 container-p-y">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card mb-4">
          <h5 class="card-header">Edit Service</h5>
          <div class="card-body">
              <form action="" method="POST">
                <div>
                  <label for="title" class="form-label">Title</label>
                  <input type="text" class="form-control mb-3" id="title" value="<?= $service['title'] ?>" name="title">
                  <?php
                    if(isset($errors['titleError']))
                    {
                      printf("<p class='text-danger'>%s </p>",  $errors['titleError']);
                    }
                  ?>
                </div>
                <div >
                  <label for="description" class="form-label">Description</label>
                  <textarea class="form-control mb-3" name="description" id="description" rows="3"><?= $service['description'] ?></textarea>
                  <?php
                    if(isset($errors['descriptionError']))
                    {
                      printf("<p class='text-danger'>%s </p>",  $errors['descriptionError']);
                    }
                  ?>
                </div>
                <div>
                  <label for="icon" class="form-label">Icon</label>
                  <input type="text" class="form-control mb-3" id="icon" value="<?= $service['icon'] ?>" name="icon">
                  <?php
                    if(isset($errors['iconError']))
                    {
                      printf("<p class='text-danger'>%s </p>",  $errors['iconError']);
                    }
                  ?>
                </div>
                <div class="form-group my-3">
                    <label for="box_color" class="form-label">Box Color</label>
                    <select name="box_color" id="box_color" class="form-select <?php echo (isset($errors['box_colorError'])) ? "is-invalid" : "" ?>">
                        <option value="">Select Color</option>
                        <option value="icon-box-pink" <?= ($service['box_color'] === 'icon-box-pink') ? "selected" : '' ?>>Pink</option>
                        <option value="icon-box-cyan" <?= ($service['box_color'] === 'icon-box-cyan') ? "selected" : '' ?>>Cyan</option>
                        <option value="icon-box-green" <?= ($service['box_color'] === 'icon-box-green') ? "selected" : '' ?>>Green</option>
                        <option value="icon-box-blue" <?= ($service['box_color'] === 'icon-box-blue') ? "selected" : '' ?>>Blue</option>
                    </select>      
                    <?php echo (isset($errors['box_colorError'])) ? "<span class='text-danger'>" . $errors['box_colorError'] . "</span>" : "" ?>               
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
