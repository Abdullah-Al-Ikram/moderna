<?php
require_once '../layouts/header.view.php';

?>

<div class="container-xxl flex-grow-1 container-p-y">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card mb-4">
          <h5 class="card-header">Add Service</h5>
          <div class="card-body">
          <?php
            if(isset($message))
            {
            ?>
            <div class="alert <?= $message_type == 'success' ? 'alert-success' : 'alert-danger'?>">
            <?= $message ?>
            </div>
            <?php
              }
          ?>
              <form action="" method="POST">
                <div>
                  <label for="title" class="form-label">Title</label>
                  <input type="text" class="form-control mb-3" id="title" name="title" placeholder="Title">
                  <?php
                    if(isset($errors['titleError']))
                    {
                      printf("<p class='text-danger'>%s </p>",  $errors['titleError']);
                    }
                  ?>
                </div>
                <div >
                  <label for="description" class="form-label">Description</label>
                  <textarea class="form-control mb-3" name="description" id="description" rows="3"></textarea>
                  <?php
                    if(isset($errors['descriptionError']))
                    {
                      printf("<p class='text-danger'>%s </p>",  $errors['descriptionError']);
                    }
                  ?>
                </div>
                <div>
                  <label for="icon" class="form-label">Icon Name</label>
                  <input type="text" class="form-control mb-3" id="icon" name="icon" placeholder="Ex: bxl-dribbble">
                  <p>Select Icon <a href="https://boxicons.com/" target="_blank">Boxicons</a></p>
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
                        <option value="icon-box-pink">Pink</option>
                        <option value="icon-box-cyan">Cyan</option>
                        <option value="icon-box-green">Green</option>
                        <option value="icon-box-blue">Blue</option>
                    </select>
                    <?php echo (isset($errors['box_colorError'])) ? "<span class='text-danger'>" . $errors['box_colorError'] . "</span>" : "" ?>
                </div>
                <div class="mb-3">
                  <button class="btn btn-primary d-grid w-100" name="submit" type="submit">Create</button>
                  </div>
              </form>
            </div>
      </div>
    </div>
  </div>
</div>

<?php
require_once '../layouts/footer.view.php';
