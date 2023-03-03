<?php $this->load->view('front/header'); ?>

<section>
    <div class="container py-4">
        <h3 class="pb-4 pt-5"><a href="<?php echo site_url('blog'); ?>">Blog</a> / <?php echo $category['name']; ?></h3>

        <?php if (!empty($articles)) { ?>
            <?php foreach ($articles as $article) { ?>
                <div class="row mb-5">
                    <div class="col-md-4">
                        <?php if (!empty($article['image'])) { ?>
                            <img class="w-100 rounded" src="<?php echo base_url('./public/uploads/articles/thumb_admin/') . $article['image']; ?>" alt="blog image">
                        <?php } ?>
                    </div>
                    <div class="col-md-8">
                        <p class="bg-light py-3 ps-3">
                            <a href="#" class="text-muted text-uppercase"><?php echo $article['category_name'] ?></a>
                        </p>
                        <h3>
                            <a href="<?php echo site_url('blog/detail/') . $article['id']; ?>"><?php echo $article['title']; ?></a>
                        </h3>
                        <p><?php echo word_limiter(strip_tags($article['description']), 50); ?>

                            <a href="<?php echo site_url('blog/detail/' . $article['id']); ?>" class="fw-bold">Read more</a>
                        </p>

                        <p class="text-muted">Posted By <strong><?php echo $article['author']; ?></strong> on <strong><?php echo date('d M Y', strtotime($article['create_at'])); ?></strong></p>
                    </div>
                </div>
            <?php } ?>
        <?php } ?>

        <!-- Pagination -->
        <div class="row ">
            <div class="col-md-12 d-flex justify-content-end">
                <?php echo $pagination_links ?>
            </div>
        </div>

    </div>
</section>

<?php $this->load->view('front/footer'); ?>