<?php
require_once('../layouts/header.view.php');
?>

<div class="container-xxl flex-grow-1 container-p-y">
    <!-- <h4 class="fw-bold py-3 mb-4">Basic Inputs</h4> -->
    <div class="row justify-content-center">
        <div class="col-lg-12 mb-4 order-0">
            <div class="card mb-4">
                <div class="card-body">
                    <table class="table">
                        <tbody class="table-border-bottom-0">
                        
                            <tr>
                                <td width="15%"><strong>Title</strong> </td>
                                <td> : </td>
                                <td><?= $service['title'] ?></td>
                            </tr>
                            <tr>
                                <td width="15%"><strong>Description</strong></td>
                                <td> : </td>
                                <td><?= $service['description'] ?></td>
                            </tr>
                            <tr>
                                <td width="15%"><strong>Icon</strong></td>
                                <td> : </td>
                                <td><?= $service['icon']?></td>
                            </tr>
                            <tr>
                                <td width="15%"><strong>Box Color</strong></td>
                                <td> : </td>
                                <td><?= $service['box_color']?></td>
                            </tr>
                            <tr>
                                <td width="15%"><strong>status</strong></td>
                                <td> : </td>
                                <td><a href="#"><span class="badge <?= $service['status'] == 1? 'badge bg-label-success me-1' : 'badge bg-label-warning me-1' ?> "><?= $service['status'] == 1 ? "Active" : "Deactive" ?></span></a></td>
                            </tr>
                            
                        </tbody>
                    </table>
                    <a href="index.php" class="btn btn-outline-primary mt-5">Back</a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
require_once('../layouts/footer.view.php');
?>