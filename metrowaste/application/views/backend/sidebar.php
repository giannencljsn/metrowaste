<aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- User profile -->
                        <?php 
                        $id = $this->session->userdata('user_login_id');
                        $basicinfo = $this->employee_model->GetBasic($id); 
						
						// Output the JavaScript code with the PHP variable
echo '<script>';
echo 'var jsVariable = ' . json_encode($basicinfo) . ';';
echo 'console.log(jsVariable);';
echo '</script>';
                        ?>                
                <div class="user-profile">
                    <!-- User profile image -->
                    <div class="profile-img"> <img src="<?php echo base_url(); ?>assets/images/users/<?php echo $basicinfo->em_image ?>" alt="user" />
                        <!-- this is blinking heartbit-->
                        <!-- <div class="notify setpos"> <span class="heartbit"></span> <span class="point"></span> </div> -->
                    </div>

                    <!-- User profile text-->
                    <div class="profile-text">
						<!-- For practice purpose only -->
					<h5><?php echo $basicinfo->em_code ?></h5>
						<!-- For practice purpose only -->	

                        <h5><?php echo $basicinfo->first_name.' '.$basicinfo->last_name; ?></h5>
						<!-- IF USER IS EMPLOYEE -->
						<?php if($this->session->userdata('user_type')=='EMPLOYEE') { ?>

							<?php } else { ?>
								<a href="<?php echo base_url(); ?>settings/Settings" class="dropdown-toggle u-dropdown" role="button" aria-haspopup="true" aria-expanded="true" data-toggle="tooltip" title="Settings"><i class="mdi mdi-settings"></i></a>

								<?php } ?>
                        
                        <a href="<?php echo base_url(); ?>login/logout" class="" data-toggle="tooltip" title="Logout"><i class="mdi mdi-power"></i></a>
                    </div>
                </div>
                <!-- End User profile text-->
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="nav-devider"></li>
                        <li> <a class="dashboard-link" href="<?php echo base_url(); ?>dashboard/dashboard" ><i class="mdi mdi-gauge"></i><span class="hide-menu" data-toggle="tooltip" title="Overview Dashboard">Dashboard </span></a></li>
						<!-- IF USER IS EMPLOYEE -->
						<?php if($this->session->userdata('user_type')=='EMPLOYEE') { ?>

						<li> <a class="has-arrow waves-effect waves-dark" href="<?php echo base_url(); ?>employee/view?I=<?php echo base64_encode($basicinfo->em_id);?>" aria-expanded="false"><i class="mdi mdi-account-multiple"></i><span class="hide-menu" data-toggle="tooltip" title="Account Details">Employees</span></a>
						</li>
				
						<li><a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-rocket"></i><span class="hide-menu" data-toggle="tooltip" title="Apply for leave">Leave </span></a>

							<ul aria-expanded="false "class="collapse">
								<li><a href="<?php echo base_url(); ?>leave/EmApplication">Leave Application</a></li>
							</ul>
						</li>	
						<!--Attendance-->
						<li><a class="has-arrow waves-effect waves-dark" href="<?php echo base_url(); ?>Emp_Attendance/index" aria-expanded="false"><i class="mdi mdi-clipboard-text"></i><span class="hide-menu" data-toggle="tooltip" title="Attendance History">Attendance</span></a>
							
						</li>	
						<!--Payroll-->
						<li><a class="has-arrow waves-effect waves-dark" href="<?php echo base_url(); ?>Emp_Payroll/index" aria-expanded="false"><i class="mdi mdi-receipt"></i><span class="hide-menu" data-toggle="tooltip" title="View Payroll Details">Payroll</span></a>
				
						</li>	
						
						

						<?php } else { ?>

				<!-- Employees -->
						<li>


							<a  class="has-arrow waves waves-dark" href="#" aria-expanded="false" data-toggle="tooltip" title="Employee Management
Add Employees, Set Disciplinary Action, Set Inactive Users" >

								<i class="mdi mdi-account-multiple"></i> <span class="hide-menu">Employees</span>
							</a>
							
							<ul aria-expanded="false" class="collapse">
								<li> <a href="<?php echo base_url(); ?>employee/Employees" data-toggle="tooltip" title="Add Employees">Employees </a></li>
								<li> <a href="<?php echo base_url(); ?>employee/Disciplinary" data-toggle="tooltip" title="Set Disciplinary Action">Disciplinary</a></li>
								<li> <a href="<?php echo base_url(); ?>employee/Inactive_Employee" data-toggle="tooltip" title="Set Inactive Users">Inactive User</a></li>
							</ul>
						</li>

				<!-- Attendance -->

						<li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false" data-toggle="tooltip" title="Attendance Management 
View Registered Fingerprints, View Attendance List, Add Attendance Information, View Attendance Report Each Employee"><i class="mdi mdi-clipboard-text"></i><span class="hide-menu">Attendance</span></a>
							<ul aria-expanded="false" class="collapse"> 
							<li><a href="<?php echo base_url(); ?>employee/getFingerprintList" data-toggle="tooltip" title="View Registered Fingerprints">Fingerprint Registered list</a></li>
                            <li><a href="<?php echo base_url(); ?>attendance/getAttendanceList" data-toggle="tooltip" title="View Attendance List">Attendance List</a></li>
								<li><a href="<?php echo base_url(); ?>attendance/Save_Attendance" data-toggle="tooltip" title="Add Attendance Information">Add Attendance</a></li>
								<li><a href="<?php echo base_url(); ?>attendance/Attendance_Report" data-toggle="tooltip" title="View Attendance Report">Attendance Report</a></li>

							</ul>	
						</li>
						
				<!-- Payroll -->

						<li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false" data-toggle="tooltip" title="Payroll Management
Set salary per hour,  Generate monthly Payslip, Print-out Payslip, View Employee Payslip Information"><i class="mdi mdi-receipt"></i><span class="hide-menu" >Payroll</span></a>

							<ul aria-expanded="false" class="collapse">
																<!-- Manage salaries by hour -->
								<li><a href="<?php echo base_url();?>Payroll/Manage_Salaries_Per_Hour" data-toggle="tooltip" title="Set Salary Per Hour">Manage Salary Per Hour</a></li>
								<li><a href="<?php echo base_url(); ?>Payroll/Generate_salary" data-toggle="tooltip" title="Generate Monthly Payslip">Generate Payslip</a></li>
								<li><a href="<?php echo base_url(); ?>Payroll/Salary_List" data-toggle="tooltip" title="Print-out Payslip">Payroll List</a></li>
								<li><a href="<?php echo base_url(); ?>Payroll/Payslip_Report" data-toggle="tooltip" title="View Employee Payslip Information">Payslip Report</a></li>
							</ul>
						</li>	
				<!-- Leave -->

						<li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false" data-toggle="tooltip" title="Leave Management 
Set Holiday dates, Set leave types, View and Approve leave applications, View leave history"><i class="mdi mdi-account-off"></i><span class="hide-menu" >Leave </span></a>

                            <ul aria-expanded="false" class="collapse">
								<li><a href="<?php echo base_url(); ?>leave/Holidays" data-toggle="tooltip" title="Set Holiday dates"> Holiday </a></li>
                                <li><a href="<?php echo base_url(); ?>leave/leavetypes" data-toggle="tooltip" title="Set Leaves types"> Leave Type</a></li>
                                <li><a href="<?php echo base_url(); ?>leave/Application" data-toggle="tooltip" title="Approve Leave application"> Leave Application </a></li>
                                <li><a href="<?php echo base_url(); ?>leave/Leave_report" data-toggle="tooltip" title="View Leave history"> Report </a></li>
                            </ul>
                        </li>
						 <!---Organization--->
						 <!---update 11/05/23--->

                        <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false" data-toggle="tooltip" title="Organization
(Create, Read, Update, Delete) Department and Designation Information"><i class="fa fa-building-o"></i><span class="hide-menu" >Organization </span></a>

                            <ul aria-expanded="false" class="collapse">
                                <li><a href="<?php echo base_url();?>organization/Department" data-toggle="tooltip" title="Department">Department </a></li>
                                <li><a href="<?php echo base_url();?>organization/Designation" data-toggle="tooltip" title="Designation Information">Designation</a></li>
                            </ul>
                        </li>
				<!-- Notice -->

						<li> <a href="<?php echo base_url()?>notice/All_notice" data-toggle="tooltip" title="Notice
(Create, Read, Update, Delete)Company News and Events for Notice Board"><i class="mdi mdi-clipboard"></i><span class="hide-menu" >Notice <span class="hide-menu"></a></li>

						<?php } ?>
					</ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
