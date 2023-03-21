<?php
require_once '../layouts/header.view.php';
?>
<div class="container-xxl flex-grow-1 container-p-y">
  <div class="row">
    <div class="col-lg-12 mb-4 order-0">
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
      <div class="card">
      <h5 class="card-header">All Banner</h5>
        <div>
        <table class="table table-hover">
            <thead>
                <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Description</th>
                <th>Status</th>
                <th>Actions</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">

            <?php
                foreach($banners as $key=> $banner):
            ?>

                <tr>
                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong><?= ++$key?></strong></td>
                    <td><?= $banner['title']?></td>
                    <td>
                        <?= substr($banner['description'], 0, 50)." ... "?>
                    </td>
                <td><a href="status.php?id=<?= $banner['id'] ?>"><span class="badge <?= $banner['status'] == 1? 'badge bg-label-success me-1' : 'badge bg-label-warning me-1' ?> "><?= $banner['status'] == 1 ? "Active" : "Deactive" ?></span></a></td>
                <td>
                   <div class="dropdown">
                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                        <i class="bx bx-dots-vertical-rounded"></i>
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="banner.php?id=<?= $banner['id']?>"><i class="bx bx-show me-1"></i> View</a>
                            <a class="dropdown-item" href="edit.php?id=<?= $banner['id']?>"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                            <a class="dropdown-item" href="delete.php?id=<?= $banner['id']?>"><i class="bx bx-trash me-1"></i> Delete</a>
                       </div>
                  </div>
                </td>
                 </tr>
            <?php
                endforeach;
            ?>
            </tbody>
        </table>
        </div>
      </div>
    </div>
  </div>
</div>
<?php
require_once '../layouts/footer.view.php';
