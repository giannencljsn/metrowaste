<!-- Add Bootstrap CSS link -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<!-- Add jQuery and Bootstrap JS scripts -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<style>
    #attendance-menu {
        display: none;
    }
</style>

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
            <div class="profile-img">
                <img src="<?php echo base_url(); ?>assets/images/users/<?php echo $basicinfo->em_image ?>" alt="user" />
            </div>

            <!-- User profile text-->
            <div class="profile-text">
                <h5><?php echo $basicinfo->first_name.' '.$basicinfo->last_name; ?></h5>
                <a href="<?php echo base_url(); ?>settings/Settings" class="dropdown-toggle u-dropdown" role="button" aria-haspopup="true" aria-expanded="true">
                    <i class="mdi mdi-settings"></i>
                </a>
                <a href="<?php echo base_url(); ?>login/logout" class="" data-toggle="tooltip" title="Logout">
                    <i class="mdi mdi-power"></i>
                </a>
            </div>
        </div>
        <!-- End User profile text-->
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <!-- IF USER IS EMPLOYEE -->
                <?php if ($this->session->userdata('user_type') == 'EMPLOYEE') { ?>
                    <li>
                        <a class="has-arrow waves-effect waves-dark" href="<?php echo base_url(); ?>employee/view?I=<?php echo base64_encode($basicinfo->em_id); ?>" aria-expanded="false">
                            <i class="mdi mdi-account-multiple"></i><span class="hide-menu">22Employees</span>
                        </a>
                    </li>

                    <li><a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-rocket"></i><span class="hide-menu">Leave </span></a>
                        <ul aria-expanded="false" class="collapse">
                            <li><a href="<?php echo base_url(); ?>leave/EmApplication">Leave Application</a></li>
                        </ul>
                    </li>

                    <li id="attendance-menu">
                        <a href="<?php echo base_url(); ?>formcontroller">
                            <i class="mdi mdi-clipboard"></i>
                            <span class="hide-menu">Attendance</span>
                        </a>
                    </li>

                    <?php } else { ?>
                        <!-- Button Employee attendance backup -->
                        <button type="button" class="btn-attendance" data-toggle="modal" data-target="#confirmationModal">
                            <span class="text-white"><i class="" aria-hidden="true"></i>Turn On Employee Attendance</span>
                        </button>

                        <!-- Employees -->
                        <li>
                            <a class="has-arrow waves waves-dark" href="#" aria-expanded="false">
                                <i class="mdi mdi-account-multiple"></i> <span class="hide-menu">Employees</span>
                            </a>

                            <ul aria-expanded="false" class="collapse">
                                <li> <a href="<?php echo base_url(); ?>employee/Employees">Employees </a></li>
                                <li> <a href="<?php echo base_url(); ?>employee/Disciplinary">Disciplinary</a></li>
                                <li> <a href="<?php echo base_url(); ?>employee/Inactive_Employee">Inactive User</a></li>
                            </ul>
                        </li>

                        <!-- Attendance -->
                        <li>
                            <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-clipboard-text"></i><span class="hide-menu">Attendance</span></a>
                            <ul aria-expanded="false" class="collapse"> 
                                <li><a href="<?php echo base_url(); ?>attendance/Attendance">Attendance List</a></li>
                                <li><a href="<?php echo base_url(); ?>attendance/Save_Attendance">Add Attendance</a></li>
                                <li><a href="<?php echo base_url(); ?>attendance/Attendance_Report">Attendance Report</a></li>
                            </ul>    
                        </li>

                        <!-- Payroll -->
                        <li>
                            <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-receipt"></i><span class="hide-menu">22Payroll</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="<?php echo base_url(); ?>Payroll/Salary_List">Payroll List</a></li>
                                <li><a href="<?php echo base_url(); ?>Payroll/Generate_salary">Generate Payslip</a></li>
                                <li><a href="<?php echo base_url(); ?>Payroll/Payslip_Report">Payslip Report</a></li>
                            </ul>
                        </li>

                        <!-- Leave -->
                        <li>
                            <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-account-off"></i><span class="hide-menu">Leave </span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="<?php echo base_url(); ?>leave/leavetypes"> Leave Type</a></li>
                                <li><a href="<?php echo base_url(); ?>leave/Application"> Leave Application </a></li>
                                <li><a href="<?php echo base_url(); ?>leave/Leave_report"> Report </a></li>
                            </ul>
                        </li>

                        <!-- Notice -->
                        <li>
                            <a href="<?php echo base_url()?>notice/All_notice">
                                <i class="mdi mdi-clipboard"></i><span class="hide-menu">Notice <span class="hide-menu"></span>
                            </a>
                        </li>

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
                    This will turn on the employee attendance button for employee users! Click OK to confirm.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="modalOkBtn">OK</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" id="modalCancelBtn">Cancel</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function () {
            // Attach click event to the modal OK button
            $("#modalOkBtn").on("click", function () {
                // Toggle display property when OK is clicked
                $("#attendance-menu").css("display", function (_, value) {
                    return value === "none" ? "flex" : "none";
                });
                // Hide the modal
                $('#confirmationModal').modal('hide');
            });

            // Attach click event to the modal Cancel button
            $("#modalCancelBtn").on("click", function () {
                // Hide the modal
                $('#confirmationModal').modal('hide');
            });

            // Attach click event to the .btn-attendance button
            $(".btn-attendance").on("click", function () {
                // Show the confirmation modal
                $('#confirmationModal').modal('show');
            });
        });
    </script>
