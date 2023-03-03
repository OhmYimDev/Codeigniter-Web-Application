<?php $this->load->view('front/header'); ?>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <h1 class="text-center text-dark pt-5">Contact Us</h1>
        </div>

    </div>
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-7">
                <div class="card mb-5 border-0 shadow card-secondary">
                    <div class="card-header bg-dark text-white">
                        Have a question or comments?
                    </div>
                    <div class="card-body">
                        <?php if (!empty($this->session->flashdata('msg'))) { ?>
                            <div class="alert alert-success">
                                <?php echo $this->session->flashdata('msg'); ?>
                            </div>
                        <?php } ?>
                        <form action="<?php echo site_url('page/contact') ?>" name="contact-form" id="contact-form" class="form-control" method="post">
                            <div class="mt-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control <?php echo (!empty(form_error('name')) ? 'is-invalid' : ''); ?>" id="name" name="name" placeholder="Enter name" value="<?php echo set_value('name'); ?>">
                                <?php echo form_error('name'); ?>
                            </div>
                            <div class="mt-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control <?php echo (!empty(form_error('email')) ? 'is-invalid' : ''); ?>" id="email" name="email" placeholder="Enter email" value="<?php echo set_value('email'); ?>">
                                <?php echo form_error('email'); ?>
                            </div>
                            <div class="mt-3">
                                <label for="message" class="form-label">Message</label>
                                <textarea class="form-control" name="message" id="message" rows="5" placeholder="Enter your message here"><?php echo set_value('message'); ?></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary mt-3">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-5 mb-5">
                <div class="card shadow border-0">
                    <div class="card-header bg-dark text-white">
                        Reach Us
                    </div>
                    <div class="card-body">
                        <div>
                            <p class="fw-bold mb-0">Customer Service:</p>
                            <p class="mb-0">Phone: 099-987-6543</p>
                            <p class="mb-0">Email: example@hotmail.com</p>

                        </div>
                        <div class="mt-3">
                            <p class="fw-bold mb-0">Headquarter:</p>
                            <p class="mb-0">Company lnc,</p>
                            <p class="mb-0">12/22 - Park Avenue Road Galaxy</p>
                            <p class="mb-0">Phone: 099-987-6543</p>
                            <p class="mb-0">Email: example@hotmail.com</p>

                        </div>
                        <div class="mt-3">
                            <p class="fw-bold mb-0">India:</p>
                            <p class="mb-0">Company lnc,</p>
                            <p class="mb-0">12/22 - Park Avenue Road Galaxy</p>
                            <p class="mb-0">Phone: 099-987-6543</p>
                            <p class="mb-0">Email: example@hotmail.com</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('front/footer'); ?>