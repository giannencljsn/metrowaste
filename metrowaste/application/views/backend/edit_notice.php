<?php $this->load->view('backend/header'); ?>
<?php $this->load->view('backend/sidebar'); ?>


<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-md-7">
        <h2 class="text-primary font-weight-bold">Edit Notice</h2>
            <form method="post" action="<?php echo site_url('notice/update'); ?>" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?php echo $notice->id; ?>">
                <div class="form-group">
                    <label for="title">Title:</label>
                    <input type="text" class="form-control" id="title" name="title" value="<?php echo $notice->title; ?>" required>

                    <label for="file_url">File URL:</label>
                    <input type="file" class="form-control" id="file_url" name="file_url">
                    <p class="help-block">Upload a new file if you want to change the existing one.</p>

                    <label for="new_date" class="control-label">New Date</label>
                    <input type="date" name="new_date" class="form-control" id="new_date">
                </div>
                <!-- Add other form fields as needed -->
                <button type="submit" class="btn btn-primary">Update Notice</button>
            </form>
        </div>
    </div>
</div>

<?php $this->load->view('backend/footer'); ?>
