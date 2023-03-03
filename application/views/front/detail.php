<?php $this->load->view('front/header'); ?>

<section class="mb-4">
    <div class="container pt-4 pb-5">
        <h3 class="pb-4 pt-5">Blog</h3>

        <?php if (!empty($article)) { ?>
            <div class="row">
                <div class="col-md-12">
                    <h3><?php echo $article['title'] ?></h3>

                    <div class="d-flex justify-content-between align-items-center">
                        <p class="text-muted mb-0 ">Posted By <strong><?php echo $article['author']; ?></strong> on <strong><?php echo date('d M Y', strtotime($article['create_at']));
                                                                                                                            ?></strong></p>
                        <a href="#" class="text-muted bg-light p-2 fw-bold rounded"><?php echo $article['category_name'];
                                                                                    ?></a>
                    </div>

                    <?php if (!empty($article['image']) && file_exists('./public/uploads/articles/thumb_front/' . $article['image'])) { ?>
                        <img class="w-100 rounded my-5" src="<?php echo base_url('public/uploads/articles/thumb_front/') . $article['image']; ?>" alt="article image">
                    <?php } ?>

                    <p><?php echo $article['description'] ?></p>

                    <!-- Comments -->
                    <div class="row mt-5">
                        <div class="col-md-9">
                            <div class="card border-0 shadow rounded px-3">
                                <div class="card-body">
                                    <form action="<?php echo site_url('blog/detail/' . $article['id']); ?>#comment-box" name="commmentForm" id="commentForm" method="post">
                                        <div id="comment-box">
                                            <!-- Form validation error -->
                                            <?php if (!empty(validation_errors())) {  ?>
                                                <div class="alert alert-danger">
                                                    <div class="alert-heading">
                                                        <h4>Please fix the following errors!</h4>
                                                        <?php echo validation_errors(); ?>
                                                    </div>
                                                </div>
                                            <?php } ?>

                                            <!-- Comment has been posted successfully -->
                                            <?php if (!empty($this->session->flashdata('message'))) {  ?>
                                                <div class="alert alert-success">
                                                    <div class="alert-heading">
                                                        <?php echo $this->session->flashdata('message') ?>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                        </div>

                                        <div class="form-group mb-3">
                                            <label for="comment" class="form-label">Comments</label>
                                            <textarea name="comment" id="comment" class="form-control" placeholder="Comment Here"><?php echo set_value('comment'); ?></textarea>
                                        </div>

                                        <div class=" form-group mb-3">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label for="name" class="form-label">Your name</label>
                                                    <input type="text" name="name" id="name" value="<?php echo set_value('name'); ?>" class="form-control" placeholder="Enter your name">
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary shadow">Submit</button>
                                    </form>
                                    <hr>
                                    <?php if (!empty($comments)) { ?>
                                        <?php foreach ($comments as $comment) { ?>
                                            <div class="row mt-3">
                                                <div class="col-md-12">
                                                    <p class="text-muted"><strong><?php echo $comment['name'] ?></strong></p>
                                                    <p class="fst-italic"><?php echo $comment['comment'] ?></p>
                                                    <small><?php echo date('d M Y - H:i', strtotime($comment['created_at'])); ?></small>
                                                </div>
                                            </div>
                                            <hr>
                                        <?php } ?>
                                    <?php } ?>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- End comments -->

                </div>
            </div>
        <?php } ?>
    </div>
</section>

<?php $this->load->view('front/footer'); ?>