<?php $this->load->view('admin/header') ?>
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Categories</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?php echo site_url('admin/home') ?>" class="text-decoration-none">Home</a></li>
                    <li class="breadcrumb-item"><a href="<?php echo site_url('admin/category') ?>" class="text-decoration-none">Category</a></li>
                    <li class="breadcrumb-item active">Edit Category</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <div class="card-title mb-0">
                            Edit Category "<?php echo $category['name'] ?>"
                        </div>
                    </div>
                    <form action="<?php echo site_url('admin/category/edit/') . $category['id']; ?>" name="categoryForm" id="categoryForm" method="post" enctype="multipart/form-data">
                        <div class="card-body">

                            <div class="form-group">
                                <label for="Name">Name</label>
                                <input type="text" name="name" id="name" class="form-control <?php echo form_error('name') ? 'is-invalid' : '' ?>" value="<?php echo set_value('name', $category['name']) ?>">
                                <?php echo form_error('name') ?>
                            </div>

                            <div class="form-group">
                                <label for="Image">Image</label><br>
                                <input type="file" name="image" id="image" class="<?php echo (!empty($errorImageUpload)) ? 'is-invalid' : '' ?>" value="<?php echo $category['image'] ?>" onchange="document.getElementById('preview_img').src = window.URL.createObjectURL(this.files[0])">
                                <?php echo (!empty($errorImageUpload)) ? $errorImageUpload : ''; ?>
                                <?php if (!empty($category['image']) && file_exists('./public/uploads/category/' . $category['image'])) { ?>
                                    <br><img id="preview_img" width="400" class="my-3" src="<?php echo base_url() . 'public/uploads/category/' . $category['image'] ?>" alt="category image">
                                <?php } else { ?>
                                    <br><img id="preview_img" width="400" class="my-3" src="<?php echo base_url() . 'public/uploads/category/no_image.jpg' ?>" alt="No image">
                                <?php } ?>
                            </div>

                            <div class="custom-control custom-radio float-left">
                                <input type="radio" value="1" id="statusActive" name="status" class="custom-control-input" <?php echo $category['status'] == '1' ? 'checked' : ''; ?>>
                                <label for="statusActive" class="custom-control-label">Active</label>
                            </div>

                            <div class="custom-control custom-radio float-left ml-3">
                                <input type="radio" value="2" id="statusBlock" name="status" class="custom-control-input" <?php echo $category['status'] == '2' ? 'checked' : ''; ?>>
                                <label for="statusBlock" class="custom-control-label">Block</label>
                            </div>
                        </div>

                        <div class="card-footer">
                            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                            <a href="<?php echo site_url('admin/category/index') ?>" class="btn btn-secondary">Back</a>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php $this->load->view('admin/footer') ?>