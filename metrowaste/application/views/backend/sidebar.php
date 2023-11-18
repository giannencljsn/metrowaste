<aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- User profile -->
                        <?php 
                        $id = $this->session->userdata('user_login_id');
                        $basicinfo = $this->employee_model->GetBasic($id); 
                        ?>                
                <div class="user-profile">
                    <!-- User profile image -->
                    <div class="profile-img"> <img src="<?php echo base_url(); ?>assets/images/users/<?php echo $basicinfo->em_image ?>" alt="user" />
                        <!-- this is blinking heartbit-->
                        <!-- <div class="notify setpos"> <span class="heartbit"></span> <span class="point"></span> </div> -->
                    </div>

                    <!-- User profile text-->
                    <div class="profile-text">
                        <h5><?php echo $basicinfo->first_name.' '.$basicinfo->last_name; ?></h5>
                        <a href="<?php echo base_url(); ?>settings/Settings" class="dropdown-toggle u-dropdown" role="button" aria-haspopup="true" aria-expanded="true"><i class="mdi mdi-settings"></i></a>
                        <a href="<?php echo base_url(); ?>login/logout" class="" data-toggle="tooltip" title="Logout"><i class="mdi mdi-power"></i></a>
                    </div>
                </div>
                <!-- End User profile text-->
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="nav-devider"></li>
                        <li> <a class="dashboard-link" href="<?php echo base_url();?>" ><i class="mdi mdi-gauge"></i><span class="hide-menu">Dashboard</span></a></li>
						<!-- IF USER IS EMPLOYEE -->
						<?php if($this->session->userdata('user_type')=='EMPLOYEE') { ?>
						<li> <a class="has-arrow waves-effect waves-dark" href="<?php echo base_url(); ?>employee/view?I=<?php echo base64_encode($basicinfo->em_id);?>" aria-expanded="false"><i class="mdi mdi-account-multiple"></i><span class="hide-menu">Employees</span></a>
						</li>
				
						<li><a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-rocket"></i><span class="hide-menu">Leave </span></a>
							<ul aria-expanded="false "class="collapse">
								<li><a href="<?php echo base_url(); ?>leave/EmApplication">Leave Application</a></li>
							</ul>
						</li>	
						
						<!-- <li id="attendance-menu" style="display: none;">
        <a href="<?php echo base_url(); ?>formcontroller">
            <i class="mdi mdi-clipboard"></i>
            <span class="hide-menu">Attendance</span>
        </a>
    </li> -->

						<?php } else { ?>

				<!-- Employees -->
						<li>

							<a  class="has-arrow waves waves-dark" href="#" aria-expanded="false">
								<i class="mdi mdi-account-multiple"></i> <span class="hide-menu">Employees</span>
							</a>
							
							<ul aria-expanded="false" class="collapse">
								<li> <a href="<?php echo base_url(); ?>employee/Employees">Employees </a></li>
								<li> <a href="<?php echo base_url(); ?>employee/Disciplinary">Disciplinary</a></li>
								<li> <a href="<?php echo base_url(); ?>employee/Inactive_Employee">Inactive User</a></li>
							</ul>
						</li>

				<!-- Attendance -->
						<li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-clipboard-text"></i><span class="hide-menu">Attendance</span></a>
							<ul aria-expanded="false" class="collapse"> 
                            <li><a href="<?php echo base_url(); ?>attendance/getAttendanceList">Attendance List</a></li>
								<li><a href="<?php echo base_url(); ?>attendance/Save_Attendance">Add Attendance</a></li>
								<li><a href="<?php echo base_url(); ?>attendance/Attendance_Report">Attendance Report</a></li>
							</ul>	
						</li>
						
				<!-- Payroll -->
						<li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-receipt"></i><span class="hide-menu">Payroll</span></a>
							<ul aria-expanded="false" class="collapse">
								<li><a href="<?php echo base_url(); ?>Payroll/Salary_List">Payroll List</a></li>
								<li><a href="<?php echo base_url(); ?>Payroll/Generate_salary">Generate Payslip</a></li>
								<li><a href="<?php echo base_url(); ?>Payroll/Payslip_Report">Payslip Report</a></li>
							</ul>
						</li>	
				<!-- Leave -->
						<li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-account-off"></i><span class="hide-menu">Leave </span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="<?php echo base_url(); ?>leave/leavetypes"> Leave Type</a></li>
                                <li><a href="<?php echo base_url(); ?>leave/Application"> Leave Application </a></li>
                                <li><a href="<?php echo base_url(); ?>leave/Leave_report"> Report </a></li>
                            </ul>
                        </li>
						 <!---Organization--->
						 <!---update 11/05/23--->
                        <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="fa fa-building-o"></i><span class="hide-menu">Organization </span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="<?php echo base_url();?>organization/Department">Department </a></li>
                                <li><a href="<?php echo base_url();?>organization/Designation">Designation</a></li>
                            </ul>
                        </li>
				<!-- Notice -->
						<li> <a href="<?php echo base_url()?>notice/All_notice" ><i class="mdi mdi-clipboard"></i><span class="hide-menu">Notice <span class="hide-menu"></a></li>
						<!-- Button Employee attendance backup -->
						<button type="button" class="btn-attendance"><a href="#" class="text-white"><i class="" aria-hidden="true"></i>Turn On Employee Attendance</a></button>
						<?php } ?>
					</ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>

		<!-- Bootstrap Modal -->
<div class="modal" tabindex="-1" role="dialog" id="confirmationModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Confirmation</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                This will turn on employee attendance button for the employee users! Click OK to confirm.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="modalOkBtn">OK</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal" id="modalCancelBtn">Cancel</button>
            </div>
        </div>
    </div>
</div>
		<script>
$(document).ready(function() {
    // Variable to track the visibility state
    var isAttendanceMenuVisible = false;

    // Function to toggle visibility
    function toggleAttendanceMenu() {
        if (isAttendanceMenuVisible) {
            $("#attendance-menu").hide();
        } else {
            // Show confirmation modal
            $('#confirmationModal').modal('show');
        }
    }

    // Attach click event to the button
    $(".btn-attendance").on("click", function() {
        toggleAttendanceMenu();
    });

    // Attach click event to the modal OK button
    $("#modalOkBtn").on("click", function() {
        // Toggle visibility when OK is clicked
        $("#attendance-menu").show();
        // Update the visibility state
        isAttendanceMenuVisible = true;
        // Hide the modal
        $('#confirmationModal').modal('hide');
    });

    // Attach click event to the modal Cancel button
    $("#modalCancelBtn").on("click", function() {
        // Hide the modal
        $('#confirmationModal').modal('hide');
    });
});
</script>
