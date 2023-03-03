<?php $this->load->view('front/header') ?>

<div id="carouselExample" class="carousel slide carousel-fade">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="<?php echo base_url('public/images/banner_slide/slide_1.jpg') ?>" class="w-100 img-fluid" alt="slide image 01">
        </div>
        <div class="carousel-item">
            <img src="<?php echo base_url('public/images/banner_slide/slide_2.jpg') ?>" class="w-100 img-fluid" alt="slide image 02">
        </div>
        <div class="carousel-item">
            <img src="<?php echo base_url('public/images/banner_slide/slide_3.jpg') ?>" class="w-100 img-fluid" alt="slide image 03">
        </div>
        <!-- <div class="carousel-item">
            <img src="<?php echo base_url('public/images/04.jpg') ?>" class="d-block w-100 img-fluid" alt="slide image 04">
        </div> -->
    </div>
    <button class=" carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>

<!-- About -->
<section class="container py-4 ">
    <h3 class="pb-3 pt-4">About</h3>
    <p class="text-muted">Webcome to Codeigniter Application Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quidem consequuntur repellendus eius nostrum temporibus eaque eos ipsam tenetur fugiat ducimus dolor animi illum rem, ad repudiandae tempora voluptatibus nihil inventore! Optio ex voluptas laborum expedita officia nihil molestiae! Et vero eaque ex maxime, quidem dicta. Dolores tenetur veritatis ex a.</p>

    <p class="text-muted">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Sed rerum repellendus ea. Totam similique unde et fuga dignissimos veniam laudantium ut molestias magni voluptas deleniti repudiandae, quo dolor asperiores sint saepe autem vel fugit maiores necessitatibus ea harum! Voluptates odit numquam exercitationem ipsam, rem, cum molestiae quod laborum beatae error perferendis animi voluptatum iste repellendus amet, fuga ducimus praesentium a eius omnis nam provident. Quaerat rem rerum totam, distinctio nisi amet fugit, ex nihil, ab deleniti quibusdam quas odit itaque?</p>
</section>

<!-- Our Services -->
<section class="bg-light">
    <div class="container pt-4 pb-4">
        <h3 class="text-uppercase pb-3 pt-4">Our Services</h3>

        <div class="row">
            <div class="col-sm-6 col-lg-3 mb-5">
                <div class="card h-100 border-0 shadow">
                    <img src="<?php echo base_url('public/images/box1.jpg') ?>" class="card-img-top" alt="box1">
                    <div class="card-body">
                        <h5 class="card-title">Website Development</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3 mb-5">
                <div class="card h-100 border-0 shadow">
                    <img src="<?php echo base_url('public/images/box2.jpg') ?>" class="card-img-top" alt="box2">
                    <div class="card-body">
                        <h5 class="card-title">Digital Marketing</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3 mb-5">
                <div class="card h-100 border-0 shadow">
                    <img src="<?php echo base_url('public/images/box3.jpg') ?>" class="card-img-top" alt="box3">
                    <div class="card-body">
                        <h5 class="card-title">Mobile App Development</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3 mb-5">
                <div class="card h-100 border-0 shadow">
                    <img src="<?php echo base_url('public/images/box4.jpg') ?>" class="card-img-top" alt="box4">
                    <div class="card-body">
                        <h5 class="card-title">IT Consulting Services</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Latest Blogs -->
<?php if (!empty($articles)) { ?>
    <section class="pb-5">
        <div class="container pt-4 pb-5">
            <h3 class="text-uppercase pb-3 pt-4">Latest Blogs</h3>
            <div class="row">
                <?php if (!empty($articles)) { ?>
                    <?php foreach ($articles as $article) { ?>
                        <div class="col-md-3 mb-4">
                            <a href="<?php echo site_url('blog/detail/' . $article['id']); ?>">
                                <div class="card h-100 border-0 shadow">
                                    <?php if (file_exists('./public/uploads/articles/thumb_admin/') . $article['image']) { ?>
                                        <img src="<?php echo base_url('public/uploads/articles/thumb_admin/') . $article['image']; ?>" class="card-img-top" alt="box1">
                                    <?php } ?>
                                    <div class="card-body">
                                        <p class="card-text"><?php echo $article['title']; ?></p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php } ?>
                <?php } ?>
            </div>
        </div>
    </section>
<?php } ?>

<?php $this->load->view('front/footer') ?>