<?php $this->load->view('admin/header') ?>
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Articles</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?php echo site_url('admin/home') ?>" class="text-decoration-none">Home</a></li>
                    <li class="breadcrumb-item"><a href="<?php echo site_url('admin/article') ?>" class="text-decoration-none">Articles</a></li>
                    <li class="breadcrumb-item active">Edit Article</li>
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
                            Edit Article "<?php echo $article['title']; ?>"
                        </div>
                    </div>
                    <form action="<?php echo site_url('admin/article/edit/') . $article['id']; ?>" name="articleForm" id="articleForm" method="post" enctype="multipart/form-data">
                        <div class="card-body">
                            <div class="form-group col-lg-4">
                                <label for="category">Category</label>
                                <select name="category_id" id="category_id" class="form-select <?php echo (!empty(form_error('category_id'))) ? 'is-invalid' : ''; ?>">
                                    <option value="" selected>Select a category</option>
                                    <?php if (!empty($categories)) { ?>
                                        <?php foreach ($categories as $category) { ?>
                                            <?php $selected = ($article['category'] == $category['id']) ? true : false; ?>
                                            <option <?php echo set_select('category_id', $category['id'], $selected); ?> value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>
                                        <?php } ?>
                                    <?php } ?>
                                </select>
                                <?php echo form_error('category_id'); ?>
                            </div>

                            <div class="form-group col-lg-8">
                                <label for="Name">Title</label>
                                <input value="<?php echo set_value('title', $article['title']); ?>" type="text" name="title" id="title" class="form-control <?php echo !empty(form_error('title')) ? 'is-invalid' : ''; ?>">
                                <?php echo form_error('title'); ?>
                            </div>

                            <div class="form-group">
                                <label for="description">description</label>
                                <textarea name="description" id="description" class="textarea">
                                    <?php echo set_value('description', $article['description']); ?> 
                                </textarea>
                            </div>

                            <div class="form-group col-lg-4">
                                <label for="image">Image</label><br>
                                <input class="form-control <?php echo !empty($imageError) ? 'is-invalid' : ''; ?>" type="file" name="image" id="image" onchange="document.getElementById('preview_img').src = window.URL.createObjectURL(this.files[0])">
                                <?php if (!empty($imageError)) echo $imageError; ?>

                                <?php
                                if (empty($article['image'])) {
                                ?>
                                    <img id="preview_img" src="<?php echo base_url() . 'public/uploads/category/no_image.jpg' ?>" width="300" class="shadow my-3 rounded" alt="article image">
                                <?php } ?>
                                <?php
                                $path = './public/uploads/articles/thumb_admin/' . $article['image'];
                                if (!empty($article['image']) && file_exists($path)) {
                                ?>
                                    <img id="preview_img" src="<?php echo base_url('public/uploads/articles/thumb_admin/' . $article['image']); ?>" width="300" class="shadow my-3 rounded" alt="article image">
                                <?php } ?>
                            </div>

                            <div class="form-group col-lg-8">
                                <label for="Name">Author</label>
                                <input value="<?php echo set_value('author', $article['author']); ?>" type="text" name="author" id="author" class="form-control <?php echo !empty(form_error('author')) ? 'is-invalid' : ''; ?>" value="">
                                <?php echo form_error('author'); ?>
                            </div>

                            <div class="custom-control custom-radio float-left">
                                <input type="radio" value="1" id="statusActive" name="status" class="custom-control-input" <?php echo $article['status'] == '1' ? 'checked' : '' ?>>
                                <label for="statusActive" class="custom-control-label">Active</label>
                            </div>
                            <div class="custom-control custom-radio float-left ml-3">
                                <input type="radio" value="2" id="statusBlock" name="status" class="custom-control-input" <?php echo $article['status'] == '2' ? 'checked' : '' ?>>
                                <label for="statusBlock" class="custom-control-label">Block</label>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a href="<?php echo site_url('admin/article/index/' . $_SESSION['article_page']); ?>" class="btn btn-secondary">Back</a>
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