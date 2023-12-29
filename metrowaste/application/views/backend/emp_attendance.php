<?php $this->load->view('backend/header'); ?>
<?php $this->load->view('backend/sidebar'); ?>
<div class="page-wrapper">
    <div class="message"></div>
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-themecolor"><i class="fa fa-fighter-jet" style="color:#1976d2"> </i> Attendance</h3>
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Attendance</li>
            </ol>
        </div>
    </div>
	<!-- <?php 
                        $id = $this->session->userdata('user_login_id');
                        $basicinfo = $this->employee_model->GetBasic($id); 
						?>
						<h1>Employee Payroll</h1>
	<h5><?php echo $basicinfo->em_code ?></h5> -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->

        <div class="row">
            <div class="col-12">
                <div class="card card-outline-info">
                    <div class="card-header">
                        <h4 class="m-b-0 text-white">Employee Attendance Report
                        </h4>
                    </div>
					<!-- <form method="post" action="<?php echo base_url('Emp_Attendance/filterAttendance'); ?>">
    <label for="employee_code">Enter Employee Code:</label>
    <input type="text" name="employee_code" id="employee_code" value="<?php echo $basicinfo->em_code; ?>" readonly>
    <button type="submit">Filter Attendance</button>
</form> -->
                    <div class="card-body">
                        <div class="table-responsive ">
                            <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                    <!-- <th>ID</th> -->
                                        <th>Name</th>
                                        <th>Date</th>
                                        <th>Sign In</th>
                                        <th>Sign Out</th>
                                    
                                        <th>Working Hours</th>
                                      
                                        <!-- <th>Action</th> -->
                                    </tr>
                                </thead>
                               
                                <tbody>
								<?php foreach($attendance_data as $value): ?>
            <tr style="vertical-align:top">
                <td><?php echo $value->employee_name ?></td>
                <td><?php echo $value->date; ?></td>
				<td><?php echo $value->sign_in; ?></td>
				<td><?php echo $value->sign_out; ?></td>
				<td><?php echo $value->working_hour; ?></td>

                <!-- Add more td elements for additional columns -->
            </tr>
        <?php endforeach; ?>    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
       

        <?php $this->load->view('backend/footer'); ?>
