<?php $this->load->view('backend/header'); ?>
<?php $this->load->view('backend/sidebar'); ?> 
         <div class="page-wrapper">
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-themecolor"><i class="fa fa-map-o" style="color:#1976d2"></i>PAYROLL SALARY BY HOUR</h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Designation</li>
                    </ol>
                </div>
            </div>
            <div class="message" style="display: none;"></div>
				<?php
				if ($this->session->flashdata('success_message')) {
					echo '<div class="alert alert-success">' . $this->session->flashdata('success_message') . '</div>';
				}
				?>
            <div class="container-fluid">         
    <div class="row">

        <div class="col-7">
            <div class="card card-outline-info">
                <div class="card-header">
                    <h4 class="m-b-0 text-white"> Designation List</h4>
                </div>
                <div><?php echo $this->session->flashdata('delsuccess');?></div>
                <div class="card-body">
					<form method="post" action="<?php echo base_url('SalaryController/updateSalary'); ?>">
					<div class="table-responsive">
						<table class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
							<thead>
								<tr>
									<th>Designation </th>
									<th>Add Salary Per Hour</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($designation as $value) { ?>
									<tr>
										<td><?php echo $value->des_name; ?></td>
										<td>
											<input type="number" name="salary_per_hr[]" value="<?php echo $value->salary_per_hr; ?>" pattern="[0-9]+(\.[0-9]+)?">
											<input type="hidden" name="designation[]" value="<?php echo $value->id; ?>" >
										</td>
									</tr>
								<?php } ?>
							</tbody>
						</table>
						<div class="form-actions col-md-12">
							<button type="submit" id="submitBtn" class="btn btn-success"> <i class="fa fa-check"></i> Save</button>
							<button type="button" class="btn btn-danger">
								<a href="#" class="text-white">Cancel</a>
							</button>
						</div>
					</div>
				</form>	
				<script>
// Add a script to show the message div after form submission
document.addEventListener('DOMContentLoaded', function () {
    // Check if the message div contains any text, then display it
    var messageDiv = document.querySelector('.message');
    if (messageDiv.innerText.trim() !== '') {
        messageDiv.style.display = 'block';
    }
});
</script>

                </div>
            </div>
        </div>
    </div>
    
    <?php $this->load->view('backend/footer'); ?>
