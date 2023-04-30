<?php $this->load->view('backend/header'); ?>
<?php $this->load->view('backend/sidebar'); ?>
      <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-themecolor"><i class="fa fa-university" aria-hidden="true"></i> Employee</h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Employee</li>
                    </ol>
                </div>
            </div>
            <div class="message"></div>
    <?php $degvalue = $this->employee_model->getdesignation(); ?>
    <?php $depvalue = $this->employee_model->getdepartment(); ?>
            <div class="container-fluid">
                <div class="row m-b-10"> 
                    <div class="col-12">
                        <button type="button" class="btn btn-primary"><i class="fa fa-bars"></i><a href="<?php echo base_url(); ?>employee/Employees" class="text-white"><i class="" aria-hidden="true"></i>  Employee List</a></button>
                        <button type="button" class="btn btn-primary"><i class="fa fa-bars"></i><a href="<?php echo base_url(); ?>employee/Disciplinary" class="text-white"><i class="" aria-hidden="true"></i>  Disciplinary List</a></button>
                    </div>
                </div>
               <div class="row">
                    <div class="col-12">
                        <div class="card card-outline-info">
                            <div class="card-header">
                                <h4 class="m-b-0 text-white"><i class="fa fa-user-o" aria-hidden="true"></i> Add New Employee<span class="pull-right " ></span></h4>
                            </div>
                            <?php echo validation_errors(); ?>
                               <?php echo $this->upload->display_errors(); ?>
                               
                               <?php echo $this->session->flashdata('formdata'); ?>
                               <?php echo $this->session->flashdata('feedback'); ?>
                            <div class="card-body">

                                <form class="row" method="post" action="Save" enctype="multipart/form-data">
                                    <div class="form-group col-md-3 m-t-20">
                                        <label>First Name</label>
                                        <input type="text" name="fname" class="form-control form-control-line" placeholder="Employee's First Name" minlength="2" onkeypress="return /^[a-zA-Z]+$/.test(event.key)" required> 
                                    </div>
                                    <div class="form-group col-md-3 m-t-20">
                                        <label>Last Name </label>
                                        <input type="text" id="" name="lname" class="form-control form-control-line" value="" placeholder="Employee's Last Name" minlength="2" onkeypress="return /^[a-zA-Z]+$/.test(event.key)" required> 
                                    </div>
                                    <!----- RANDOM PIN NO. ----->

                                    <?php
                                    function generate_unique_random_number($min, $max) {
                                        $db_conn = mysqli_connect('localhost', 'root', '', 'hrsystemci');
                                        if (!$db_conn) {
                                            die('Could not connect to database: ' . mysqli_connect_error());
                                        }

                                        $exists = true;
                                        while ($exists) {
                                            $random_number = mt_rand($min, $max);
                                            $em_code = "EMP - " . $random_number;
                                            $query = "SELECT COUNT(*) FROM employee WHERE em_code = '$em_code'";
                                            $result = mysqli_query($db_conn, $query);
                                            if (!$result) {
                                                die('Error executing query: ' . mysqli_error($db_conn));
                                            }
                                            $count = mysqli_fetch_array($result)[0];
                                            $exists = ($count > 0);
                                        }

                                        mysqli_close($db_conn);

                                        return $em_code;
                                    }

                                    $min = 10000;
                                    $max = 99999;
                                    $unique_number = generate_unique_random_number($min, $max);
                                    ?>
                                    <!--- FUNCTION END ---->

                                    <div class="form-group col-md-3 m-t-20">
                                        <label>Employee Code</label>
                                        <input type="text" name="eid" class="form-control" placeholder="Example: 8820" value="<?php echo $unique_number; ?>" readonly>
                                    </div>


                                    <div class="form-group col-md-3 m-t-20">
                                        <label>Department</label>
                                        <select name="dept" value="" class="form-control custom-select">
                                            <option>Select Department</option>
                                            <?Php foreach($depvalue as $value): ?>
                                             <option value="<?php echo $value->id ?>"><?php echo $value->dep_name ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-3 m-t-20">
                                        <label>Designation </label>
                                        <select name="deg" class="form-control custom-select">
                                            <option>Select Designation</option>
                                            <?Php foreach($degvalue as $value): ?>
                                            <option value="<?php echo $value->id ?>"><?php echo $value->des_name ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-3 m-t-20">
                                        <label>Role </label>
                                        <select name="role" class="form-control custom-select">
                                            <option>Select Role</option>
                                            <option value="ADMIN">Admin</option>
                                            <option value="EMPLOYEE">Employee</option>
                                           
                                        </select>
                                    </div>
                                    <div class="form-group col-md-3 m-t-20">
                                        <label>Gender </label>
                                        <select name="gender" class="form-control custom-select">
                                            <option>Select Gender</option>
                                            <option value="MALE">Male</option>
                                            <option value="FEMALE">Female</option>
                                        </select>
                                    </div>
									<div class="form-group col-md-3 m-t-20">
                                        <label>Marital Status</label>
                                        <select name="maritalstat" class="form-control custom-select">
                                            <option>Select Status</option>
											<option value="Single">Single</option>
											<option value="Married">Married</option>
                                            <option value="Divorced">Divorced</option>
                                            <option value="Annulled">Annulled</option>
                                            <option value="Widowed">Widowed</option>

                                        </select>
                                    </div>
                                    <div class="form-group col-md-3 m-t-20">
                                        <label>Blood Group </label>
                                        <select name="blood" class="form-control custom-select">
                                            <option>Select Blood Group</option>
                                            <option value="O+">O+</option>
                                            <option value="O-">O-</option>
                                            <option value="A+">A+</option>
                                            <option value="A-">A-</option>
                                            <option value="B+">B+</option>
                                            <option value="B-">B-</option>
                                            <option value="AB+">AB+</option>
                                        </select>
                                    </div>
                                  

									<div class="form-group col-md-3 m-t-20">
										<label>PHILHEALTH (12 digits)</label>
										<div class="input-group">
											<input type="text" name="philhealth_1" class="form-control" maxlength="2" placeholder="00" onkeypress="return /[0-9]/i.test(event.key)">
											<div class="input-group-prepend">
											<span class="input-group-text">-</span>
											</div>
											<input type="text" name="philhealth_2" class="form-control" maxlength="9" placeholder="000000000" onkeypress="return /[0-9]/i.test(event.key)">
											<div class="input-group-prepend">
											<span class="input-group-text">-</span>
											</div>
											<input type="text" name="philhealth_3" class="form-control" maxlength="1" placeholder="0" onkeypress="return /[0-9]/i.test(event.key)">
										</div>
										<input type="hidden" name="philhealth" id="philhealth">
										</div>



                                    <div class="form-group col-md-3 m-t-20">
                                        <label>SSS (10 digits)</label>
                                        <div class="input-group">
                                            <input type="text" name="sss_1" class="form-control" minlength="2" maxlength="2" placeholder="00" onkeypress="return /[0-9]/i.test(event.key)">
                                            <div class="input-group-prepend">
                                            <span class="input-group-text">-</span>
                                            </div>
                                            <input type="text" name="sss_2" class="form-control" minlength="7" maxlength="7" placeholder="0000000" onkeypress="return /[0-9]/i.test(event.key)">
											<div class="input-group-prepend">
                                            <span class="input-group-text">-</span>
                                            </div>
                                            <input type="text" name="sss_3" class="form-control" minlength="1" maxlength="1" placeholder="0" onkeypress="return /[0-9]/i.test(event.key)">
                                       	 </div>
											<input type="hidden" name="sss" id="sss">	
									</div>
                                    <!-- <div class="form-group col-md-3 m-t-20">
                                        <label>PHILHEALTH (12 digits)</label>
                                        <input type="text" name="philhealth" class="form-control" value="" placeholder="PHILHEALTH" pattern="\d{3}-\d{3}-\d{3}" maxlength="9" > 
                                    </div> -->
                                    <div class="form-group col-md-3 m-t-20">
                                        <label>PAGIBIG (12 digits)</label>
										<div class="input-group">
                                        	<input type="text" name="pagibig_1" class="form-control" minlength="4" maxlength="4" placeholder="0000" onkeypress="return /[0-9]/i.test(event.key)">
                                            <div class="input-group-prepend">
                                            <span class="input-group-text">-</span>
											</div>
                                            
                                            <input type="text" name="pagibig_2" class="form-control" minlength="4" maxlength="4" placeholder="0000" onkeypress="return /[0-9]/i.test(event.key)">
											<div class="input-group-prepend">
                                            <span class="input-group-text">-</span>
                                            </div>
                                            <input type="text" name="pagibig_3" class="form-control" minlength="4" maxlength="4" placeholder="0000" onkeypress="return /[0-9]/i.test(event.key)">
                                       	 </div>
											<input type="hidden" name="pagibig" id="pagibig">	
                                    </div>

                                    <div class="form-group col-md-3 m-t-20">
                                        <label>TIN (12-15 digits)</label>
										<div class="input-group">
											<input type="text" name="tin_1" class="form-control" minlength="3" maxlength="3" placeholder="000" onkeypress="return /[0-9]/i.test(event.key)">
                                            <div class="input-group-prepend">
                                            <span class="input-group-text">-</span>
											</div>
                                            
                                            <input type="text" name="tin_2" class="form-control" minlength="3" maxlength="3" placeholder="000" onkeypress="return /[0-9]/i.test(event.key)">
											<div class="input-group-prepend">
                                            <span class="input-group-text">-</span>
                                            </div>
                                            <input type="text" name="tin_3" class="form-control" minlength="3" maxlength="3" placeholder="000" onkeypress="return /[0-9]/i.test(event.key)">
											<div class="input-group-prepend">
                                            <span class="input-group-text">-</span>
											</div>
											<input type="text" name="tin_4" class="form-control" minlength="3" maxlength="5" placeholder="00000" onkeypress="return /[0-9]/i.test(event.key)">
										
										</div>
											<input type="hidden" name="tin" id="tin">
                                    </div>
                                    <div class="form-group col-md-3 m-t-20">
                                        <label>Contact Number</label>
										<div class="input-group">
                                        	<input type="text" name="contact_1" class="form-control" minlength="2" maxlength="2" placeholder="09" value="09" onkeypress="return /[0-9]/i.test(event.key)">
                                            <div class="input-group-prepend">
                                            <span class="input-group-text">-</span>
											</div>
                                            <input type="text" name="contact_2" class="form-control" minlength="9" maxlength="9" placeholder="000000000" onkeypress="return /[0-9]/i.test(event.key)">
										</div>
											<input type="hidden" name="contact" id="contact">	
									</div>
                                
									<div class="form-group col-md-3 m-t-20">
                                        <label>Emergency Contact Number </label>
                                        <div class="input-group">
                                        	<input type="text" name="emcontact_1" class="form-control" minlength="2" maxlength="2" placeholder="09" value="09" onkeypress="return /[0-9]/i.test(event.key)">
                                            <div class="input-group-prepend">
                                            <span class="input-group-text">-</span>
											</div>
                                            <input type="text" name="emcontact_2" class="form-control" minlength="9" maxlength="9" placeholder="000000000" onkeypress="return /[0-9]/i.test(event.key)">
										</div>
											<input type="hidden" name="emcontact" id="emcontact"> 
									</div>
                                    <div class="form-group col-md-3 m-t-20">
                                        <label>Date Of Birth </label>
                                        <input type="date" name="dob" id="example-email2" name="example-email" class="form-control" placeholder=""> 
                                    </div>
                                    <div class="form-group col-md-3 m-t-20">
                                        <label>Date Hired </label>
                                        <input type="date" name="joindate" id="example-email2" name="example-email" class="form-control" placeholder=""> 
                                    </div>
                               
                                    <div class="form-group col-md-3 m-t-20">
                                        <label>Username </label>
                                        <input type="text" id="example-email2" name="email" class="form-control" placeholder="username" minlength="3"
										title="Must contain at least 3 characters" > 
                                    </div>
                                    <div class="form-group col-md-3 m-t-20">
                                        <label>Password </label>
                                        <input type="password" name="password" id="password" class="form-control" value="" placeholder="**********" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" 
										title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" minlength="8"required>
										<input type="checkbox" onclick="showPassword()" style="position: initial; opacity: 100;">Show Password
									</div>

								

									
                                    <div class="form-group col-md-3 m-t-20">
                                        <label>Confirm Password </label>
                                        <input type="password" name="confirm" id="cpassword" class="form-control" value="" placeholder="**********" minlength="8"required> 
                                        <p id="error-message"></p>
                                    </div>
                                    <div class="form-group col-md-3 m-t-20">
                                        <label>Image </label>
                                        <input type="file" name="image_url" class="form-control" value=""> 
                                    </div>
                                    <div class="form-actions col-md-12">
                                        <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Save</button>
                                        <button type="button" class="btn btn-danger">
										<a href="<?php echo base_url(); ?>employee/Employees" class="text-white">Cancel</a></button>
                                    </div>
                                </form>
                            </div>
							<div id="message">
										<h3>Password must contain the following:</h3>
										<p id="letter" class="invalid">A <b>lowercase</b> letter</p>
										<p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
										<p id="number" class="invalid">A <b>number</b></p>
										<p id="length" class="invalid">Minimum <b>8 characters</b></p>
							</div>

                        </div>
                    </div>
                </div>
<?php $this->load->view('backend/footer'); ?>
