<?php $this->load->view('front/header'); ?>

<section class="category">
    <div class="container py-4">
        <h3 class="pb-4 pt-5">Categories</h3>

        <div class="row mb-5">
            <?php if (!empty($categories)) { ?>
                <?php foreach ($categories as $category) { ?>
                    <div class="col-md-4">
                        <a href="<?php echo site_url('blog/category/') . $category['id'] ?>">
                            <div class="card rounded mb-3">
                                <?php if (!empty($category['image'])) { ?>
                                    <img src="<?php echo base_url('./public/uploads/category/') . $category['image']; ?>" class="card-img-top" alt="blog image">
                                <?php } ?>
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $category['name'] ?></h5>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php } ?>
            <?php } ?>
        </div>
    </div>
</section>

<?php $this->load->view('front/footer'); ?>