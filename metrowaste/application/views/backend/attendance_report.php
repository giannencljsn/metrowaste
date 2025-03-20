<?php $this->load->view('backend/header'); ?>
<?php $this->load->view('backend/sidebar'); ?>
<div class="page-wrapper">
    <div class="message"></div>
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-themecolor">Attendance</h3>
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Attendance</li>
            </ol>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row m-b-10">
            <div class="col-12">
                <button type="button" class="btn btn-info"><i class="fa fa-plus"></i><a href="<?php echo base_url(); ?>attendance/Save_Attendance" class="text-white"><i class="" aria-hidden="true"></i> Add Attendance</a></button>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Attendance Report</h4>
                        <form method="post" action="<?php echo base_url('Attendance/Get_attendance_data_for_report'); ?>" class="form-material row" id="attendanceForm">
                            <div class="form-group col-md-3">
                                <input type="text" name="date_from" id="date_from" class="form-control mydatetimepickerFull" placeholder="from">
                            </div>
                            <div class="form-group col-md-3">
                                <input type="text" name="date_to" id="date_to" class="form-control mydatetimepickerFull" placeholder="to">
                            </div>
                            <div class="form-group col-md-3">
                                <select class="form-control custom-select" tabindex="1" name="employee_id" id="employee_id" required>
                                    <option>Employee</option>
                                    <?php foreach ($employee as $value) : ?>
                                        <option value="<?php echo $value->em_code; ?>">
                                            <?php echo $value->first_name ?>
                                            <?php echo $value->last_name ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-md-3 form-group">
                                <input type="submit" class="btn btn-success" value="Submit" name="submit" id="getAtdReportBtn">
                            </div>
                        </form>

                        <!-- Display the attendance data -->
                        <div id="attendanceDataContainer">
                            <table class="table table-bordered">
                                <tbody>
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- ...remaining JavaScript code... -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#attendanceForm').submit(function(e) {
            e.preventDefault(); // Prevent form submission

            $.ajax({
                url: $(this).attr('action'),
                type: $(this).attr('method'),
                data: $(this).serialize(),
                dataType: 'json',
                success: function(response) {
                    // Update the container with the returned HTML
                    $('#attendanceDataContainer tbody').html(response.html);
                }
            });
        });
    });
</script>

<?php $this->load->view('backend/footer'); ?>
