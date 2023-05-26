<?php $this->load->view('backend/header'); ?>
<?php $this->load->view('backend/sidebar'); ?>
         <div class="page-wrapper">
            <div class="message"></div>
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-themecolor"><i class="fa fa-calendar-check-o" style="color:#1976d2"></i>Attendance</h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Attendance</li>
                    </ol>
                </div>
            </div>
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
    <?php echo form_open('formcontroller/submit'); ?>
    <div class="form-group">
        <label for="date">Date:</label>
        <input type="date" class="form-control" id="date" name="date" value="<?php echo $current_date; ?>" readonly>
    </div>
    <div class="form-group">
        <label for="time">Time:</label>
        <input type="time" class="form-control" id="time" name="time" value="<?php echo $current_time; ?>">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
    <?php echo form_close(); ?>
</div>

</div>
                       
<?php $this->load->view('backend/footer'); ?>
