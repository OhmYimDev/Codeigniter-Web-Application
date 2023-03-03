<?php $this->load->view('admin/header') ?>
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0"><a href="<?php echo site_url('admin/article/index') ?>" class="text-decoration-none text-dark">Articles</a></h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?php echo site_url('admin/home') ?>" class="text-decoration-none">Home</a></li>
                    <li class="breadcrumb-item active">Articles</li>
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

                <?php if ($this->session->flashdata('success')) { ?>
                    <div class="alert alert-success"><?php echo $this->session->flashdata('success'); ?></div>
                <?php } ?>

                <?php if ($this->session->flashdata('error')) { ?>
                    <div class="alert alert-danger"><?php echo $this->session->flashdata('error'); ?></div>
                <?php } ?>

                <div class="card">
                    <div class="card-header">
                        <div class="card-title">
                            <form action="" name="searchFrom" id="searchForm" method="get">
                                <div class="input-group mb-0">
                                    <input type="text" value="<?php echo $q; ?>" class="form-control" placeholder="Search" name="q">
                                    <div class="input-group-append">
                                        <button class="input-group-text" id="basic-addon1">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="card-tools">
                            <a href="<?php echo site_url('admin/article/create') ?>" class="btn btn-primary"><i class="fas fa-plus"></i> Create</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <tr>
                                <th width="50">#</th>
                                <th width="100">Image</th>
                                <th>Title</th>
                                <th width="180">Author</th>
                                <th width="100">Created</th>
                                <th width="100">Updated</th>
                                <th width="100">Status</th>
                                <th width="160">Action</th>
                            </tr>
                            <?php if (!empty($articles)) { ?>
                                <?php foreach ($articles as $item) { ?>
                                    <tr>
                                        <td><?php echo $item['id'] ?></td>
                                        <td>
                                            <?php
                                            $path = "./public/uploads/articles/thumb_admin/" . $item['image'];
                                            if (!empty($item['image']) && file_exists($path)) {
                                            ?>
                                                <img src="<?php echo base_url('public/uploads/articles/thumb_admin/' . $item['image']); ?>" width="100" alt="article image">
                                            <?php } else { ?>
                                                <br><img id="preview_img" width="100" src="<?php echo base_url() . 'public/uploads/category/no_image.jpg' ?>" alt="No image">
                                            <?php } ?>
                                        </td>
                                        <td><?php echo $item['title'] ?></td>
                                        <td><?php echo $item['author'] ?></td>
                                        <td class="text-center"><?php echo $item['create_at'] ?></td>
                                        <td class="text-center"><?php echo !empty($item['update_at']) ? $item['update_at'] : '-' ?></td>
                                        <td>
                                            <span class="badge badge-<?php echo $item['status'] == '1' ? 'success' : 'danger' ?>"><?php echo $item['status'] == '1' ? 'Active' : 'Block'; ?></span>
                                        </td>
                                        <td text-center>
                                            <a href="<?php echo site_url('admin/article/edit/') . $item['id'] . '/' . $page  ?>" class="btn btn-primary btn-sm">
                                                <i class="fas fa-edit"></i> Edit
                                            </a>
                                            <a href="javascript:void(0);" onclick="deleteCategory(<?php echo $item['id']; ?>)" class="btn btn-danger btn-sm">
                                                <i class="fas fa-trash-alt"></i> Delete
                                            </a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            <?php } else { ?>
                                <tr>
                                    <td colspan="7" class="text-center py-5 fw-bold">
                                        <h5>Records not found</h5>
                                    </td>
                                </tr>
                            <?php } ?>

                        </table>
                        <div class="mt-3">
                            <?php echo $pagination_links ?>
                        </div>
                    </div>
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

<script type="text/javascript">
    function deleteCategory(id) {
        if (confirm("Are you sure you want to delete category?")) {
            window.location.href = "<?php echo base_url() . 'admin/article/delete/'; ?>" + id;
        }
    }
</script>