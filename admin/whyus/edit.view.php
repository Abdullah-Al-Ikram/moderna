<?php
require_once('../layouts/header.view.php');
?>

<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row justify-content-center">
        <div class="col-lg-8 mb-4 order-0">
            <div class="card mb-4">
                <h5 class="card-header">Edit WhyUs</h5>
                <div class="card-body">
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="video_link" class="form-label">Video Link</label>
                            <input type="text" name="video_link" value="<?= $whyus['video_link']?>" class="form-control" id="video_link" placeholder="Video Link" autofocus>
                            
                        </div>
                        <div class="form-group">
                            <label for="title_one" class="form-label">Title One</label>
                            <input type="text" name="title_one" value="<?= $whyus['title_one']?>" class="form-control" id="title_one" placeholder="Title one" autofocus>
                           
                        </div>
                        <div class="form-group my-3">
                            <label for="description_one" class="form-label">Description One</label>
                            <textarea class="form-control" name="description_one" id="description_one" rows="5" placeholder="Description one"><?= $whyus['description_one']?></textarea>
                            
                        </div>
                        <div class="form-group my-3">
                            <label for="icon_one" class="form-label">Icon One</label>
                            <input type="text" name="icon_one" value="<?= $whyus['icon_one']?>" class="form-control" id="icon_one" placeholder="Icon one">
                           
                        </div>
                        <div class="form-group my-3">
                            <label for="title_two" class="form-label">Title Two</label>
                            <input type="text" name="title_two" value="<?= $whyus['title_two']?>" class="form-control" id="title_two" placeholder="Title two">
                            
                        </div>
                        <div class="form-group my-3">
                            <label for="description_two" class="form-label">Description Two</label>
                            <textarea class="form-control" name="description_two" id="description_two" rows="5" placeholder="Description two"><?= $whyus['description_two']?></textarea>
                            
                        </div>
                        <div class="form-group my-3">
                            <label for="icon_two" class="form-label">Icon Two</label>
                            <input type="text" name="icon_two" value="<?= $whyus['icon_two']?>" class="form-control" id="icon_two" placeholder="Icon two">
            
                        </div>
                        <div class="form-group my-3">
                        <td><a href="status.php?id=<?= $whyus['id'] ?>"><span class="badge <?= $whyus['status'] == 1? 'badge bg-label-success me-1' : 'badge bg-label-warning me-1' ?> "><?= $whyus['status'] == 1 ? "Active" : "Deactive" ?></span></a></td>
                        </div>
                        <div class="mb-3">
                            <label for="banner" class="form-label">Image</label>
                            <input type="file" class="form-control" id="banner" name="banner">
                            <div class="mb-2"><img src="<?= url().'/uploads/whyus/'.$whyus['banner']?>" alt="" width="100"></div>
                        </div>
                        <div class="form-group my-3">
                            <button type="submit" name="submit" class="btn btn-outline-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
require_once('../layouts/footer.view.php');
?>