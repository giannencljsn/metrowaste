<?php $this->load->view('backend/header'); ?>
<?php $this->load->view('backend/sidebar'); ?>
                     <div class="page-wrapper">
                     <div class="message"></div>
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-themecolor"><i class="fa fa-users" style="color:#1976d2"></i> <?php echo $basic->first_name .' '.$basic->last_name; ?></h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Profile</li>
                    </ol>
                </div>
            </div>
                <?php $degvalue = $this->employee_model->getdesignation(); ?>
                <?php $depvalue = $this->employee_model->getdepartment(); ?>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-xlg-12 col-md-12">
                        <div class="card">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs profile-tab" role="tablist">
                                <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#home" role="tab" >  Personal Info </a> </li>
                                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#profile" role="tab" > Address </a> </li>
                                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#education" role="tab" > Education</a> </li>
                                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#experience" role="tab" > Experience</a> </li>
                                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#bank" role="tab" > Bank Account</a> </li>
                                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#document" role="tab" > Document</a> </li>
                                <li class="nav-item"> <Salary class="nav-link" data-toggle="tab" href="#salary" role="tab" >Salary</a> </li>
                               
                                
                                <?php if($this->session->userdata('user_type')=='EMPLOYEE'){ ?>
                                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#password" role="tab" style="font-size: 14px;"> Change Password</a> </li>
                                <?php } else { ?>
                                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#password1" role="tab" style="font-size: 14px;"> Change Password</a> </li>                                
                                <?php } ?>
                            </ul>
                            <!-- Tab panes -->

                            <div class="tab-content">
                                <div class="tab-pane active" id="home" role="tabpanel">
                                    <div class="card">
				                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <center class="m-t-30">
                                   <?php if(!empty($basic->em_image)){ ?>
                                    <img src="<?php echo base_url(); ?>assets/images/users/<?php echo $basic->em_image; ?>" class="img-circle" width="150" />
                                    <?php } else { ?>
                                    <img src="<?php echo base_url(); ?>assets/images/users/user.png" class="img-circle" width="150" alt="<?php echo $basic->first_name ?>" title="<?php echo $basic->first_name ?>"/>                                   
                                    <?php } ?>
                                    <h4 class="card-title m-t-10"><?php echo $basic->first_name .' '.$basic->last_name; ?></h4>
                                    <h6 class="card-subtitle"><?php echo $basic->des_name; ?></h6>
                                </center>
                            </div>
                            <div>
                                <hr> </div>
                           
                        </div>                                                    
                                                </div>
                                                <div class="col-md-8">
				                                <form class="row" action="Update" method="post" enctype="multipart/form-data">
				                                    
				                                    <div class="form-group col-md-4 m-t-10">
				                                        <label>Employee PIN </label>
				                                        <input type="text" <?php if($this->session->userdata('user_type')=='EMPLOYEE'){ ?> readonly <?php } ?> class="form-control form-control-line" placeholder="ID" name="eid" value="<?php echo $basic->em_code; ?>"  readonly> 
				                                    </div>
													<?php if($this->session->userdata('user_type') == 'EMPLOYEE'): ?>
												<div class="form-group col-md-4 m-t-10">
													<label>Status </label>
													<input type="text" name="status" value="<?php echo $basic->status; ?>" readonly class="form-control">
												</div>
											<?php else: ?>
												<div class="form-group col-md-4 m-t-10">
													<label>Status </label>
													<select name="status" class="form-control custom-select" >
														<option value="<?php echo $basic->status; ?>"><?php echo $basic->status; ?></option>
														<option value="ACTIVE">ACTIVE</option>
														<option value="INACTIVE">INACTIVE</option>
													</select>
												</div>
											<?php endif; ?>
				                                    <div class="form-group col-md-4 m-t-10">
				                                        <label>First Name</label>
				                                        <input type="text" class="form-control form-control-line" placeholder="Employee's FirstName" name="fname" value="<?php echo $basic->first_name; ?>" <?php if($this->session->userdata('user_type')=='EMPLOYEE'){ ?> readonly <?php } ?> minlength="3" onkeypress="return /^[a-zA-Z\s]+$/.test(event.key)" required> 
				                                    </div>
				                                    <div class="form-group col-md-4 m-t-10">
				                                        <label>Last Name </label>
				                                        <input type="text" id="" name="lname" class="form-control form-control-line" value="<?php echo $basic->last_name; ?>" placeholder="Employee's LastName" <?php if($this->session->userdata('user_type')=='EMPLOYEE'){ ?> readonly <?php } ?> minlength="3" onkeypress="return /^[a-zA-Z]+$/.test(event.key)" required> 
				                                    </div>
                                                   
				                                    <div class="form-group col-md-4 m-t-10">
				                                        <label>Gender </label>
				                                        <select name="gender" <?php if($this->session->userdata('user_type')=='EMPLOYEE'){ ?> readonly <?php } ?> class="form-control custom-select">
				                                           
				                                            <option value="<?php echo $basic->em_gender; ?>"><?php echo $basic->em_gender; ?></option>
				                                            <option value="Male">Male</option>
				                                            <option value="Female">Female</option>
				                                        </select>
				                                    </div>
													<div class="form-group col-md-4 m-t-10">
				                                        <label>Marital Status </label>
				                                        <select name="maritalstat" <?php if($this->session->userdata('user_type')=='EMPLOYEE'){ ?> readonly <?php } ?> class="form-control custom-select">
				                                           
				                                            <option value="<?php echo $basic->em_marital_status; ?>"><?php echo $basic->em_marital_status; ?></option>
				                                            <option value="Married">Married</option>
															<option value="Single">Single</option>
															<option value="Divorced">Divorced</option>
															<option value="Annulled">Annulled</option>
															<option value="Widowed">Widowed</option>

				                                        </select>
				                                    </div>

                                                    <!---update 11/05/23--->


												<?php if($this->session->userdata('user_type') != 'EMPLOYEE'): ?>
												<div class="form-group col-md-4 m-t-10">
													<label>User Type </label>
													<select name="role" class="form-control custom-select" >
														<option value="<?php echo $basic->em_role; ?>"><?php echo $basic->em_role; ?></option>
														<option value="ADMIN">Admin</option>
														<option value="EMPLOYEE">Employee</option>
													</select>
												</div>
											<?php else: ?>
												<input type="hidden" name="role" value="<?php echo $basic->em_role; ?>">
											<?php endif; ?>


											
		                                    
				                                    <div class="form-group col-md-4 m-t-10">
				                                        <label>Date Of Birth </label>
				                                        <input type="date" <?php if($this->session->userdata('user_type')=='EMPLOYEE'){ ?> readonly <?php } ?>  id="example-email2" name="dob" class="form-control" placeholder="" value="<?php echo $basic->em_birthday; ?>"> 
				                                    </div>
				                                
				                                    <div class="form-group col-md-4 m-t-10">
				                                        <label>SSS Number </label>
				                                        <input type="text" <?php if($this->session->userdata('user_type')=='EMPLOYEE'){ ?> readonly <?php } ?> class="form-control"placeholder="SSS Number" name="sss" value="<?php echo $basic->em_sss; ?>" maxlength="12" onkeypress="return /[0-9]/i.test(event.key)"> 
				                                    </div>
				                                    <div class="form-group col-md-4 m-t-10">
				                                        <label>PHILHEALTH Number </label>
				                                        <input type="text" <?php if($this->session->userdata('user_type')=='EMPLOYEE'){ ?> readonly <?php } ?> class="form-control"placeholder="PHILHEALTH Number" name="philhealth" value="<?php echo $basic->em_philhealth; ?>"  maxlength="14" onkeypress="return /[0-9]/i.test(event.key)"> 
				                                    </div>
				                                    <div class="form-group col-md-4 m-t-10">
				                                        <label>PAGIBIG Number </label>
				                                        <input type="text" <?php if($this->session->userdata('user_type')=='EMPLOYEE'){ ?> readonly <?php } ?> class="form-control"placeholder="PAGIBIG Number" name="pagibig" value="<?php echo $basic->em_pagibig; ?>"  maxlength="14" onkeypress="return /[0-9]/i.test(event.key)"> 
				                                    </div>
				                                    <div class="form-group col-md-4 m-t-10">
				                                        <label>TIN Number </label>
				                                        <input type="text" <?php if($this->session->userdata('user_type')=='EMPLOYEE'){ ?> readonly <?php } ?> class="form-control"placeholder="TIN Number" name="tin" value="<?php echo $basic->em_tin; ?>" maxlength="18" onkeypress="return /[0-9]/i.test(event.key)"> 
				                                    </div>
				                                    <div class="form-group col-md-4 m-t-10">
				                                        <label>Contact Number </label>
				                                        <input type="text" class="form-control" placeholder="Contact No." name="contact" <?php if($this->session->userdata('user_type')=='EMPLOYEE'){ ?> readonly <?php } ?> value="<?php echo $basic->em_phone; ?>"  maxlength="12" onkeypress="return /[0-9]/i.test(event.key)"> 
				                                    </div>
													<div class="form-group col-md-4 m-t-10">
				                                        <label>Emergency Contact Number </label>
				                                        <input type="text" class="form-control" placeholder="Emergency Contact No." name="emcontact" <?php if($this->session->userdata('user_type')=='EMPLOYEE'){ ?> readonly <?php } ?> value="<?php echo $basic->em_em_contact; ?>"  maxlength="12" > 
				                                    </div>
													<div class="form-group col-md-4 m-t-10">
				                                        <label>Emergency Contact Name </label>
				                                        <input type="text" class="form-control" placeholder="Emergency Contact Name" name="contactname" <?php if($this->session->userdata('user_type')=='EMPLOYEE'){ ?> readonly <?php } ?> value="<?php echo $basic->contactname; ?>"  maxlength="30"  onkeypress="return /^[a-zA-Z\s]+$/.test(event.key)"> 
				                                    </div>
                                                   
                                                    <!---update 11/05/23 --->
                                                    
                                                    <?php if($this->session->userdata('user_type')=='EMPLOYEE'){ ?>
                                                    <div class="form-group col-md-4 m-t-10">
                                                        <label>Department</label>
                                                        <select name="dept" readonly class="form-control custom-select">
                                                            <option value="<?php echo $basic->id; ?>"><?php echo $basic->dep_name; ?></option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-4 m-t-10">
                                                        <label>Designation</label>
                                                        <select name="deg" readonly class="form-control custom-select">
                                                            <option value="<?php echo $basic->id; ?>"><?php echo $basic->des_name; ?></option>
                                                        </select>
                                                    </div>
                                                <?php } else { ?>
                                                    <div class="form-group col-md-4 m-t-10">
                                                        <label>Department</label>
                                                        <select name="dept" class="form-control custom-select">
                                                            <option value="<?php echo $basic->id; ?>"><?php echo $basic->dep_name; ?></option>
                                                            <?php foreach($depvalue as $value): ?>
                                                                <option value="<?php echo $value->id ?>"><?php echo $value->dep_name ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-4 m-t-10">
                                                        <label>Designation</label>
                                                        <select name="deg" class="form-control custom-select">
                                                            <option value="<?php echo $basic->id; ?>"><?php echo $basic->des_name; ?></option>
                                                            <?php foreach($degvalue as $value): ?>
                                                                <option value="<?php echo $value->id ?>"><?php echo $value->des_name ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                <?php } ?>                                          

				                                    <div class="form-group col-md-4 m-t-10">
				                                        <label>Date Of Joining </label>
				                                        <input type="date" <?php if($this->session->userdata('user_type')=='EMPLOYEE'){ ?> readonly <?php } ?> id="example-email2" name="joindate" class="form-control" value="<?php echo $basic->em_joining_date; ?>" placeholder=""> 
				                                    </div>
				                                    
				                                    <div class="form-group col-md-4 m-t-10">
				                                        <labe>Username </label>
				                                        <input type="text" id="example-email2" name="email" class="form-control" <?php if($this->session->userdata('user_type')=='EMPLOYEE'){ ?> readonly <?php } ?> value="<?php echo $basic->em_email; ?>" placeholder="username" minlength="2" > 
				                                    </div>
				                                    <div class="form-group col-md-12 m-t-10">
													<?php if(!empty($basic->em_image)){ ?>
														<img src="<?php echo base_url(); ?>assets/images/users/<?php echo $basic->em_image; ?>" class="img-circle" width="150" />
														<?php } else { ?>
														<img src="<?php echo base_url(); ?>assets/images/users/user.png" class="img-circle" width="150" alt="<?php echo $basic->first_name ?>" title="<?php echo $basic->first_name ?>"/>                                   
														<?php } ?>
                                                        <label>Image </label>
                                                        <input type="file" <?php if($this->session->userdata('user_type')=='EMPLOYEE'){ ?> readonly <?php } ?> name="image_url" class="form-control" value=""> 
                                                    </div>
                                                    <?php if($this->session->userdata('user_type')=='EMPLOYEE'){ ?>
                                                    <?php } else { ?>
				                                    <div class="form-actions col-md-12">
                                                        <input type="hidden" name="emid" value="<?php echo $basic->em_id; ?>">
				                                        <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Save</button>
				                                        <button type="button" class="btn btn-danger" onclick="location.reload()">Cancel</button>
				                                    </div>
				                                    <?php } ?>
				                                </form>
                                                </div>
                                        </div>
				                        </div>
                                    </div>
                                </div>
                                <!--second tab-->
                                <div class="tab-pane" id="profile" role="tabpanel">
                                    <div class="card">
				                        <div class="card-body">
			                        		<h3 class="card-title">Permanent Contact Information</h3>
			                                <form class="row" action="Parmanent_Address" method="post" enctype="multipart/form-data">
			                                    <div class="form-group col-md-12 m-t-5">
			                                        <label>Address</label>
			                                        <textarea name="paraddress" value="<?php if(!empty($permanent->address)) echo $permanent->address  ?>" <?php if($this->session->userdata('user_type')==''){ ?> readonly <?php } ?> class="form-control" rows="3" minlength="7" required><?php if(!empty($permanent->address)) echo $permanent->address  ?></textarea>
			                                    </div>
			                                    <div class="form-group col-md-6 m-t-5">
			                                        <label>City</label>
			                                        <input type="text" name="parcity" class="form-control form-control-line" placeholder="" <?php if($this->session->userdata('user_type')==''){ ?> readonly <?php } ?> value="<?php if(!empty($permanent->city)) echo $permanent->city ?>" minlength="2" required> 
			                                    </div>
			                                    <div class="form-group col-md-6 m-t-5">
			                                        <label>Country</label>
			                                        <input type="text" name="parcountry" class="form-control form-control-line" placeholder="" <?php if($this->session->userdata('user_type')==''){ ?> readonly <?php } ?> value="<?php if(!empty($permanent->country)) echo $permanent->country ?>" minlength="2" required> 
			                                    </div>
                                                    <?php if($this->session->userdata('user_type')==''){ ?>
                                                    <?php } else { ?>			                                    
			                                    <div class="form-actions col-md-12">
                                                    <input type="hidden" name="emid" value="<?php echo $basic->em_id ?>">
                                                    <input type="hidden" name="id" value="<?php if(!empty($permanent->id)) echo $permanent->id  ?>">                                                    
			                                        <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Save</button>
			                                    </div>
			                                    <?php } ?>			                                    
			                                    </form>
			                                    
			                                    <div class="">
			                        				<h3 class="col-md-12">Present Contact Information</h3>
			                                    </div>
			                                    <hr>
			                                <form class="row" action="Present_Address" method="post" enctype="multipart/form-data">			                                    
			                                    <div class="form-group col-md-12 m-t-5">
			                                        <label>Address</label>
			                                        <textarea name="presaddress" value="<?php if(!empty($present->address)) echo $present->address  ?>" <?php if($this->session->userdata('user_type')==''){ ?> readonly <?php } ?> class="form-control" rows="3" minlength="7" required><?php if(!empty($present->address)) echo $present->address  ?></textarea>
			                                    </div>
			                                    <div class="form-group col-md-6 m-t-5">
			                                        <label>City</label>
			                                        <input type="text" name="prescity" class="form-control form-control-line" value="<?php if(!empty($present->address)) echo $present->city  ?>" placeholder=" City name" minlength="2" <?php if($this->session->userdata('user_type')==''){ ?> readonly <?php } ?> required> 
			                                    </div>
			                                    <div class="form-group col-md-6 m-t-5">
			                                        <label>Country</label>
			                                        <input type="text" name="prescountry" class="form-control form-control-line" placeholder="" value="<?php if(!empty($present->address)) echo $present->country  ?>" minlength="2" <?php if($this->session->userdata('user_type')==''){ ?> readonly <?php } ?> required> 
			                                    </div>
                                                    <?php if($this->session->userdata('user_type')==''){ ?>
                                                    <?php } else { ?>			                                    
			                                    <div class="form-actions col-md-12">
                                                    <input type="hidden" name="emid" value="<?php echo $basic->em_id ?>">
                                                    <input type="hidden" name="id" value="<?php if(!empty($present->id)) echo $present->id  ?>">
			                                        <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Save</button>
			                                    </div>
			                                    <?php } ?>
			                                </form>
				                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="education" role="tabpanel">
                                    <div class="card">
                <div class="card-body">
                    <div class="table-responsive ">
                        <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <!--<th>ID </th>-->
                                    <th>Certificate</th>
                                    <th>Institute </th>
                                    <th>Result </th>
                                    <th>Year</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <!-- <tfoot>
                                <tr>
                                    <th>ID </th>
                                    <th>Certificate name</th>
                                    <th>Institute </th>
                                    <th>Result </th>
                                    <th>year</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot> -->
                            <tbody>
                               <?php foreach($education as $value): ?>
                                <tr>
                                    <!--<td><?php echo $value->id ?></td>-->
                                    <td><?php echo $value->edu_type ?></td>
                                    <td><?php echo $value->institute ?></td>
                                    <td><?php echo $value->result ?></td>
                                    <td><?php echo $value->year ?></td>
                                   <?php if($this->session->userdata('user_type')==''){ ?>
                                                    <?php } else { ?>
                                    <td class="jsgrid-align-center ">
                                        <a href="#" title="Edit" class="btn btn-sm btn-primary waves-effect waves-light education" data-id="<?php echo $value->id ?>"><i class="fa fa-pencil-square-o"></i></a>
                                        <a onclick="confirm('Are you sure, you want to delete this?')" href="#" title="Delete" class="btn btn-sm btn-danger waves-effect waves-light edudelet"  data-id="<?php echo $value->id ?>"><i class="fa fa-trash-o"></i></a>
                                    </td>
                                    <?php } ?>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>                                    
                                    </div>
                                    <div class="card">
                                      
	                                    <div class="card-body">
			                                <form class="row" action="Add_Education" method="post" enctype="multipart/form-data" id="insert_education">
			                                	<span id="error"></span>
			                                    <div class="form-group col-md-6 m-t-5">
			                                        <label>Degree Title</label>
			                                        <input type="text" name="name" class="form-control form-control-line" placeholder=" Degree Title" <?php if($this->session->userdata('user_type')==''){ ?> readonly <?php } ?> minlength="1" required> 
			                                    </div>
			                                    <div class="form-group col-md-6 m-t-5">
			                                        <label>Institute Name</label>
			                                        <input type="text" name="institute" class="form-control form-control-line" placeholder=" Institute Name" <?php if($this->session->userdata('user_type')==''){ ?> readonly <?php } ?> minlength="3" required> 
			                                    </div>
			                                    <div class="form-group col-md-6 m-t-5">
			                                        <label>GPA</label>
			                                        <input type="text" name="result" class="form-control form-control-line" placeholder=" Result" minlength="2" <?php if($this->session->userdata('user_type')==''){ ?> readonly <?php } ?> required> 
			                                    </div>
			                                    <div class="form-group col-md-6 m-t-5">
			                                        <label>Passing Year</label>
			                                        <input type="text" name="year" <?php if($this->session->userdata('user_type')==''){ ?> readonly <?php } ?> class="form-control form-control-line" placeholder="Passing Year"> 
			                                    </div>
			                                  <?php if($this->session->userdata('user_type')==''){ ?>
                                                    <?php } else { ?>
			                                    <div class="form-actions col-md-6">
                                                    <input type="hidden" name="emid" value="<?php echo $basic->em_id; ?>">
			                                        <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Save</button>
			                                    </div>
			                                    <?php } ?>
			                                </form>
					                    </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="experience" role="tabpanel">
                                    <div class="card">
                <div class="card-body">
                    <div class="table-responsive ">
                        <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <!--<th>ID </th>-->
                                    <th>Company name</th>
                                    <th>Position </th>
                                    <th>Work Duration </th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <!-- <tfoot>
                                <tr>
                                    <th>ID </th>
                                    <th>Company name</th>
                                    <th>Position </th>
                                    <th>Work Duration </th>
                                    <th>Action</th>
                                </tr>
                            </tfoot> -->
                            <tbody>
                               <?php foreach($experience as $value): ?>
                                <tr>
                                    <!--<td><?php echo $value->id ?></td>-->
                                    <td><?php echo $value->exp_company ?></td>
                                    <td><?php echo $value->exp_com_position ?></td>
                                    <td><?php echo $value->exp_workduration ?></td>
                                    <td class="jsgrid-align-center ">
                                       <?php if($this->session->userdata('user_type')==''){ ?>
                                       <?php } else { ?>
                                        <a href="#" title="Edit" class="btn btn-sm btn-info waves-effect waves-light experience" data-id="<?php echo $value->id ?>"><i class="fa fa-pencil-square-o"></i></a>
                                        <a onclick="confirm('Are you sure, you want to delete this?')" href="#" title="Delete" class="btn btn-sm btn-info waves-effect waves-light deletexp" data-id="<?php echo $value->id ?>"><i class="fa fa-trash-o"></i></a>
                                        <?php } ?>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>                                     
	                                    <div class="card-body">
			                                <form class="row" action="Add_Experience" method="post" enctype="multipart/form-data">
			                                    	<div class="form-group col-md-6 m-t-5">
			                                    	    <label> Company Name</label>
			                                    	    <input type="text" name="company_name" class="form-control form-control-line company_name" <?php if($this->session->userdata('user_type')==''){ ?> readonly <?php } ?> placeholder="Company Name" minlength="2" required> 
			                                    	</div>
			                                    	<div class="form-group col-md-6 m-t-5">
			                                    	    <label>Position</label>
			                                    	    <input type="text" name="position_name" class="form-control form-control-line position_name" <?php if($this->session->userdata('user_type')==''){ ?> readonly <?php } ?> placeholder="Position" minlength="3" required> 
			                                    	</div>
			                                    	<div class="form-group col-md-6 m-t-5">
			                                    	    <label>Address</label>
			                                    	    <input type="text" name="address" class="form-control form-control-line duty" placeholder="Address" <?php if($this->session->userdata('user_type')==''){ ?> readonly <?php } ?> minlength="7" required> 
			                                    	</div>
			                                    	<div class="form-group col-md-6 m-t-5">
			                                    	    <label>Working Duration</label>
			                                    	    <input type="text" name="work_duration" class="form-control form-control-line working_period" <?php if($this->session->userdata('user_type')==''){ ?> readonly <?php } ?> placeholder="Working Duration" required> 
			                                    	</div>
			                                 <?php if($this->session->userdata('user_type')==''){ ?>
                                                    <?php } else { ?>
		                                    	<div class="form-actions col-md-12">
                                                    <input type="hidden" name="emid" value="<?php echo $basic->em_id; ?>">                                                
		                                    	    <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Save</button>
		                                    	</div>
		                                    	<?php } ?>
			                                </form>
					                    </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="bank" role="tabpanel">
                                    <div class="card">
	                                    <div class="card-body">
			                                <form class="row" action="Add_bank_info" method="post" enctype="multipart/form-data">
			                                    <div class="form-group col-md-6 m-t-5">
			                                        <label> Bank Holder Name</label>
			                                        <input type="text" name="holder_name" value="<?php if(!empty($bankinfo->holder_name)) echo $bankinfo->holder_name; ?>" class="form-control form-control-line" placeholder="Enter Bank Holder Name" oninput="this.value = this.value.replace(/[^A-Za-z\s]/g, '');">

			                                    </div>
			                                    <div class="form-group col-md-6 m-t-5">
			                                        <label>Bank Name</label>
			                                        <input type="text" name="bank_name" value="<?php if(!empty($bankinfo->bank_name)) echo $bankinfo->bank_name; ?>" class="form-control form-control-line" placeholder="Enter Bank Name" oninput="this.value = this.value.replace(/[^A-Za-z\s]/g, '');">

			                                    </div>
			                                    <div class="form-group col-md-6 m-t-5">
			                                        <label>Branch Name</label>
                                                    <input type="text" name="branch_name" value="<?php if(!empty($bankinfo->branch_name)) echo $bankinfo->branch_name; ?>" class="form-control form-control-line" placeholder="Enter Branch Name" oninput="this.value = this.value.replace(/[^A-Za-z\s]/g, '');">

			                                    </div>
			                                    <div class="form-group col-md-6 m-t-5">
			                                        <label>Bank Account Number</label>
                                                    <input type="text" name="account_number" value="<?php if(!empty($bankinfo->account_number)) echo $bankinfo->account_number; ?>" class="form-control form-control-line" placeholder="Enter Account Number" oninput="this.value = this.value.replace(/[^0-9]/g, '');">

			                                    </div>
			                                    <div class="form-group col-md-6 m-t-5">
			                                        <label>Bank Account Type</label>
			                                        <input type="text" name="account_type" value="<?php if(!empty($bankinfo->account_type)) echo $bankinfo->account_type ?>" class="form-control form-control-line" placeholder="Bank Account Type"> 
			                                    </div>
			                                    <div class="form-actions col-md-12">
                                                    <input type="hidden" name="emid" value="<?php echo $basic->em_id; ?>">
                                                    <input type="hidden" name="id" value="<?php if(!empty($bankinfo->id)) echo $bankinfo->id  ?>">
			                                        <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Save</button>
			                                    </div>
			                                </form>
					                    </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="document" role="tabpanel">
                                    <div class="card-body">
                    <div class="table-responsive ">
                        <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <!--<th>ID </th>-->
                                    <th>File Title</th>
                                    <th>File </th>
                                </tr>
                            </thead>
                            <!-- <tfoot>
                                <tr>
                                    <th>ID </th>
                                    <th>File Title</th>
                                    <th>File </th>
                                </tr>
                            </tfoot> -->
                            <tbody>
                               <?php foreach($fileinfo as $value): ?>
                                <tr>
                                    <!--<td><?php echo $value->id ?></td>-->
                                    <td><?php echo $value->file_title ?></td>
                                    <td><a href="<?php echo base_url(); ?>assets/images/users/<?php echo $value->file_url ?>" target="_blank"><?php echo $value->file_url ?></a></td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>                                    
                                    <div class="card-body">
                                        <form class="row" action="Add_File" method="post" enctype="multipart/form-data">
                                            <div class="form-group col-md-6 m-t-5">
                                                <label class="">File Title</label>
                                                <input type="text" name="title" <?php if($this->session->userdata('user_type')==''){ ?> readonly <?php } ?> class="form-control" required="" aria-invalid="false" minlength="5" required>
                                            </div>
                                            <div class="form-group col-md-6 m-t-5">
                                                <label class="">File</label>
                                                <input type="file" name="file_url" <?php if($this->session->userdata('user_type')==''){ ?> readonly <?php } ?> class="form-control" required="" aria-invalid="false" required>
                                            </div>
                                            <?php if($this->session->userdata('user_type')==''){ ?>
                                                    <?php } else { ?>
                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <input type="hidden" name="em_id" value="<?php echo $basic->em_id; ?>">                                                   
                                                    <button type="submit" class="btn btn-success">Add File</button>
                                                </div>
                                            </div>
                                            <?php } ?>
                                        </form>
                                    </div>
                                </div>
                               

								
                                <div class="tab-pane" id="password1" role="tabpanel">
                                    <div class="card-body">
				                                <form class="row" action="Reset_Password_Hr" method="post" enctype="multipart/form-data">
				                                    <div class="form-group col-md-6 m-t-20">
				                                        <label>New Password</label>
				                                        <input type="text" class="form-control" name="new1" value="" required minlength="6"> 
				                                    </div>
				                                    <div class="form-group col-md-6 m-t-20">
				                                        <label>Confirm Password</label>
				                                        <input type="text" id="" name="new2" class="form-control " required minlength="6"> 
				                                    </div>
				                                    <?php if($this->session->userdata('user_type')==''){ ?>
                                                    <?php } else { ?>
				                                    <div class="form-actions col-md-12">
                                                    <input type="hidden" name="emid" value="<?php echo $basic->em_id; ?>">                                                   
				                                        <button type="submit" class="btn btn-success pull-right"> <i class="fa fa-check"></i> Save</button>
				                                    </div>
				                                    <?php } ?>
				                                </form>
                                    </div>
                                </div>
                                <!-- <div class="tab-pane" id="social" role="tabpanel">
                                    <div class="card-body">
				                                <form class="row" action="Save_Social" method="post" enctype="multipart/form-data">
				                                    <div class="form-group col-md-6 m-t-20">
				                                        <label>Facebook</label>
				                                        <input type="url" class="form-control" <?php if($this->session->userdata('user_type')=='EMPLOYEE'){ ?> readonly <?php } ?> name="facebook" value="<?php if(!empty($socialmedia->facebook)) echo $socialmedia->facebook ?>" placeholder="www.facebook.com"> 
				                                    </div>
				                                    <div class="form-group col-md-6 m-t-20">
				                                        <label>Twitter</label>
				                                        <input type="text" class="form-control" <?php if($this->session->userdata('user_type')=='EMPLOYEE'){ ?> readonly <?php } ?> name="twitter" value="<?php if(!empty($socialmedia->twitter)) echo $socialmedia->twitter ?>" > 
				                                    </div>
				                                    <div class="form-group col-md-6 m-t-20">
				                                        <label>Google +</label>
				                                        <input type="text" id="" name="google" <?php if($this->session->userdata('user_type')=='EMPLOYEE'){ ?> readonly <?php } ?> class="form-control " value="<?php if(!empty($socialmedia->google_plus)) echo $socialmedia->google_plus ?>"> 
				                                    </div>
				                                    <div class="form-group col-md-6 m-t-20">
				                                        <label>Skype</label>
				                                        <input type="text" id="" name="skype" <?php if($this->session->userdata('user_type')=='EMPLOYEE'){ ?> readonly <?php } ?> class="form-control " value="<?php if(!empty($socialmedia->skype_id)) echo $socialmedia->skype_id ?>"> 
				                                    </div>
				                                <?php if($this->session->userdata('user_type')=='EMPLOYEE'){ ?>
                                                    <?php } else { ?>
				                                    <div class="form-actions col-md-12">
                                                    <input type="hidden" name="emid" value="<?php echo $basic->em_id; ?>">                                                   
                                                    <input type="hidden" name="id" value="<?php if(!empty($socialmedia->id)) echo $socialmedia->id ?>">                                                   
				                                        <button type="submit" class="btn btn-success pull-right"> <i class="fa fa-check"></i> Save</button>
				                                    </div>
				                                    <?php } ?>
				                                </form>
                                    </div>
                                </div> -->
                                <div class="tab-pane" id="password" role="tabpanel">
                                    <div class="card-body">
				                                <form class="row" action="Reset_Password" method="post" enctype="multipart/form-data">
				                                    <div class="form-group col-md-6 m-t-20">
				                                        <label>Old Password</label>
				                                        <input type="password" class="form-control" name="old" value="" placeholder="Old password" id="cpassword" required minlength="8"> 
														
													</div>
				                                    <div class="form-group col-md-6 m-t-20">
				                                        <label>New Password</label>
				                                        <input type="password" class="form-control" name="new1" value="" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" 
														title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" id="cpassword" minlength="8" required> 
														
													</div>
				                                    <div class="form-group col-md-6 m-t-20">
				                                        <label>Confirm Password</label>
				                                        <input type="password" id="" name="new2" class="form-control " required minlength="6"> 
				                                    </div>
				                                    <div class="form-actions col-md-12">
                                                    <input type="hidden" name="emid" value="<?php echo $basic->em_id; ?>">                                                   
				                                        <button type="submit" class="btn btn-success pull-right"> <i class="fa fa-check"></i> Save</button>
				                                    </div>
				                                </form>
                                    </div>
							
									
									
                                </div>

                                <div class="tab-pane" id="salary" role="tabpanel">
                                    <div class="card">
				                        <div class="card-body">
			                        		<h3 class="card-title">Basic Salary</h3>
			                                <form action="Add_Salary" method="post" enctype="multipart/form-data">
                                           <div class="row">
                                            <div class="form-group col-md-6 m-t-5">
                                                <label class="control-label">Salary Type</label>
                                                <select class="form-control <?php if($this->session->userdata('user_type')=='EMPLOYEE'){ ?> readonly <?php } ?> custom-select" data-placeholder="Choose a Category" tabindex="1" name="typeid" required>
                                                <!-- <option selected>Choose Type...</option> -->
                                                   <?php if(empty($salaryvalue->salary_type)){ ?>
                                                    <?php } else { ?>
                                                    <option value="<?php echo $salaryvalue->id; ?>"><?php echo $salaryvalue->salary_type; ?></option> <?php } ?>                                      
                                                   <?php foreach($typevalue as $value): ?>
                                                    <option value="<?php echo $value->id; ?>"><?php echo $value->salary_type; ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div> 
											<!-- Basic Salary -->
											
											

<!-- Display corresponding salary_per_hr in an input field -->
<div class="form-group col-md-6 m-t-5">
			<label><b>Total Salary Per Hour<b></label>
			    <input type="text" name="totalnetpay" <?php if($this->session->userdata('user_type')=='EMPLOYEE'){ ?> readonly <?php } ?> class="form-control form-control-line totalnetpay" placeholder="Total Net Pay"  value="<?php echo $designation_salary->salary_per_hr; ?>" readonly>
</div>
												

            
<!-- <div class="form-group col-md-6 m-t-5">
    <label>Basic</label>
    <input type="text" name="basic" <?php if ($this->session->userdata('user_type') == 'EMPLOYEE') { ?> readonly <?php } ?> class="form-control form-control-line basic" placeholder="Basic..." value="" onkeypress="return /[0-9]/i.test(event.key)">
</div> -->

<!-- TRIAL AND ERROR -->


												<!-- Basic Salary End-->

                                                </div>
                                                 
			                                    <h3 class="card-title">Addition</h3>
			                                    <div class="row">
												<!-- Rest Day  Duty-->
												<div class="form-group col-md-6 m-t-5">
												<label>Rest Day Duty</label>
												<input type="text" name="restduty" <?php if($this->session->userdata('user_type')=='EMPLOYEE'){ ?> readonly <?php } ?> class="form-control form-control-line restduty" placeholder="Rest Duty" value="<?php if(!empty($salaryvalue->restduty)) echo $salaryvalue->restduty ?>" onkeypress="return /^[0-9]*\.?[0-9]*$/.test(event.key)" step="0.01">

			                                    </div> 
												<!-- Rest Day  Duty-->
												<!-- Straight Duty -->
			                                    <div class="form-group col-md-6 m-t-5">
			                                        <label>Straight Duty</label>
													<input type="text" name="straightduty" <?php if($this->session->userdata('user_type')=='EMPLOYEE'){ ?> readonly <?php } ?> class="form-control form-control-line straightduty" placeholder="Straight Duty" value="<?php if(!empty($salaryvalue->straightduty)) echo $salaryvalue->straightduty ?>" onkeypress="return /^[0-9]*\.?[0-9]*$/.test(event.key)">

			                                    </div> 
												<!-- Straight Duty -->
												<!-- Special Holiday -->
			                                    <div class="form-group col-md-6 m-t-5">
			                                        <label>Special Holiday</label>
													<input type="text" name="specialholiday" <?php if($this->session->userdata('user_type')=='EMPLOYEE'){ ?> readonly <?php } ?> class="form-control form-control-line specialholiday" placeholder="Special Holiday" value="<?php if(!empty($salaryvalue->specialholiday)) echo $salaryvalue->specialholiday ?>" onkeypress="return /^[0-9]*\.?[0-9]*$/.test(event.key)">

			                                    </div> 
												<!-- Special Holiday -->
												<!-- Legal Holiday -->
			                                    <div class="form-group col-md-6 m-t-5">
			                                        <label>Legal Holiday</label>
			                                        <input type="text" name="legalholiday" <?php if($this->session->userdata('user_type')=='EMPLOYEE'){ ?> readonly <?php } ?> class="form-control form-control-line legalholiday" placeholder="Legal Holiday" value="<?php if(!empty($salaryvalue->legalholiday)) echo $salaryvalue->legalholiday ?>" onkeypress="return /^[0-9]*\.?[0-9]*$/.test(event.key)">

			                                    </div>
												<!-- Legal Holiday -->
												 <!-- Solid divider -->
												 <hr class="solid">
												 <!-- <div class="form-group col-md-6 m-t-5">
												 <label><b>Less:</b></label><br>
												 <label>Absences</label>
			                                        <input type="text" name="absences" <?php if($this->session->userdata('user_type')=='EMPLOYEE'){ ?> readonly <?php } ?> class="form-control form-control-line absences" placeholder="Absences" value="<?php if(!empty($salaryvalue->total)) echo $salaryvalue->total ?>" minlength="3" onkeypress="return /[0-9]/i.test(event.key)" required> 
												 </div> -->
												 <div class="form-group col-md-6 m-t-5">
												   </div>
													<!-- Total Salary -->
												<div class="form-group col-md-6 m-t-5">
			                                        <label><b>Total Addition</b></label>
			                                        <input type="text" name="total" <?php if($this->session->userdata('user_type')=='EMPLOYEE'){ ?> readonly <?php } ?> class="form-control form-control-line total" placeholder="Total Salary" value="<?php if(!empty($salaryvalue->total)) echo $salaryvalue->total ?>" minlength="3" onkeypress="return /[0-9]/i.test(event.key)"  required> 
			                                    </div>
												<!-- Total Salary -->
                                                </div>
                                                
			                                    <h3 class="card-title">Deduction</h3>
			                                    <div class="row">
			                                    <div class="form-group col-md-6 m-t-5">
												<label><b>HDMF Loans:</b></label><br>
												<label><b>SSS Loans:</b></label><br>
			                                        <label>SSS</label>
													<input type="text" name="sss" <?php if($this->session->userdata('user_type')=='EMPLOYEE'){ ?> readonly <?php } ?> class="form-control form-control-line sss" placeholder="SSS"  value="<?php if(!empty($salaryvalue->sss)) echo $salaryvalue->sss ?>" onkeypress="return /^[0-9]*\.?[0-9]*$/.test(event.key)">

													<br>
													<label>SSS Provident Fund</label>
			                                        <input type="text" name="sssprovident" <?php if($this->session->userdata('user_type')=='EMPLOYEE'){ ?> readonly <?php } ?> class="form-control form-control-line sssprovident" placeholder="SSS Provident Fund" value="<?php if(!empty($salaryvalue->sssprovident)) echo $salaryvalue->sssprovident ?>" onkeypress="return /^[0-9]*\.?[0-9]*$/.test(event.key)">

												</div>
			                                
			                                    <div class="form-group col-md-6 m-t-5">
			                                        <label>Philhealth</label>
													<input type="text" name="philhealth" <?php if($this->session->userdata('user_type')=='EMPLOYEE'){ ?> readonly <?php } ?> class="form-control form-control-line philhealth" placeholder="Philhealth" value="<?php if(!empty($salaryvalue->philhealth)) echo $salaryvalue->philhealth ?>" onkeypress="return /^[0-9]*\.?[0-9]*$/.test(event.key)">

														
														<label>HDMF</label>
														<input type="text" name="hdmf" <?php if($this->session->userdata('user_type')=='EMPLOYEE'){ ?> readonly <?php } ?> class="form-control form-control-line hdmf" placeholder="HDMF" value="<?php if(!empty($salaryvalue->hdmf)) echo $salaryvalue->hdmf ?>" onkeypress="return /^[0-9]*\.?[0-9]*$/.test(event.key)">
<br>
														<label>Withholding Tax</label>
			                                        	<input type="text" name="whtax" <?php if($this->session->userdata('user_type')=='EMPLOYEE'){ ?> readonly <?php } ?> class="form-control form-control-line whtax" placeholder="Withholding Tax" value="<?php if(!empty($salaryvalue->whtax)) echo $salaryvalue->whtax ?>" onkeypress="return /^[0-9]*\.?[0-9]*$/.test(event.key)">
 <br>
												</div>
												
												
												<div class="form-group col-md-6 m-t-5">
			                                        <label>Cash Advances</label>
			                                        <input type="text" name="cashadvances" <?php if($this->session->userdata('user_type')=='EMPLOYEE'){ ?> readonly <?php } ?> class="form-control form-control-line cashadvances" placeholder="Cash Advances" value="<?php if(!empty($salaryvalue->cashadvances)) echo $salaryvalue->cashadvances ?>" onkeypress="return /^[0-9]*\.?[0-9]*$/.test(event.key)">

			                                    </div>
												<div class="form-group col-md-6 m-t-5">
			                                       
			                                    </div>
			                                    <div class="form-group col-md-6 m-t-5">
			                                        <label><b>Total Deduction<b></label>
													<input type="text" name="totaldeduction" <?php if($this->session->userdata('user_type')=='EMPLOYEE'){ ?> readonly <?php } ?> class="form-control form-control-line totaldeduction" placeholder="Total Deduction" value="<?php if(!empty($salaryvalue->totaldeduction)) echo $salaryvalue->totaldeduction ?>" oninput="this.value = this.value.replace(/[^0-9.]/g, '')">
			                                    </div>
												<div class="form-group col-md-6 m-t-5">
			                                       
			                                    </div>
												



                                                </div>
                                                <?php if($this->session->userdata('user_type')=='EMPLOYEE'){ ?>
                                                    <?php } else { ?>
                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <input type="hidden" name="emid" value="<?php echo $basic->em_code; ?>"> 
                                                    <?php if(!empty($salaryvalue->salary_id)){ ?>    
                                                    <input type="hidden" name="sid" value="<?php echo $salaryvalue->salary_id; ?>">                                               <?php } ?> 
                                                    <?php if(!empty($salaryvalue->addi_id)){ ?>    
                                                    <input type="hidden" name="aid" value="<?php echo $salaryvalue->addi_id; ?>">                                                  <?php } ?> 
                                                    <?php if(!empty($salaryvalue->de_id)){ ?>
                                                    <input type="hidden" name="did" value="<?php echo $salaryvalue->de_id; ?>">
                                                    <?php } ?>                                                   
                                                    <button <?php if($this->session->userdata('user_type')=='EMPLOYEE'){ ?> disabled <?php } ?> type="submit" style="float: right" class="btn btn-success">Add Salary</button>
                                                </div>
                                                <?php } ?>
                                            </div>                                                		                                    
			                                    </form>

												

				                        </div>
                                    </div>
                                </div>                                
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                </div>
				
				<script type="text/javascript">
					//Total Addition
					$(document).ready(function() {
						$('.restduty, .straightduty, .specialholiday, .legalholiday, .absences').on('input', function() {
							var sum = 0;
							$('.restduty, .straightduty, .specialholiday, .legalholiday').each(function() {
							var val = parseFloat($(this).val());
							sum += isNaN(val) ? 0 : val;
							});
							var absences = parseFloat($('.absences').val());
							sum -= isNaN(absences) ? 0 : absences;
							$('input[name="total"]').val(sum.toFixed(2));
						});
						});

					</script>



<script type="text/javascript">
	// Total deduction
	$(document).ready(function(){
		$('.sss, .sssprovident, .philhealth, .hdmf, .whtax, .cashadvances').on('input', function() {
			var totalDeduction = 0;
			$('.sss, .sssprovident, .philhealth, .hdmf, .whtax, .cashadvances').each(function() {
				totalDeduction += parseFloat($(this).val()) || 0;
			});
			$('.totaldeduction').val(totalDeduction.toFixed(2));
		});
	});
</script>



        


<?php $this->load->view('backend/em_modal'); ?>                
<script type="text/javascript">
                                        $(document).ready(function () {
                                            $(".education").click(function (e) {
                                                e.preventDefault(e);
                                                // Get the record's ID via attribute  
                                                var iid = $(this).attr('data-id');
                                                $('#educationmodal').trigger("reset");
                                                $('#EduModal').modal('show');
                                                $.ajax({
                                                    url: 'educationbyib?id=' + iid,
                                                    method: 'GET',
                                                    data: '',
                                                    dataType: 'json',
                                                }).done(function (response) {
                                                    console.log(response);
                                                    // Populate the form fields with the data returned from server
													$('#educationmodal').find('[name="id"]').val(response.educationvalue.id).end();
                                                    $('#educationmodal').find('[name="name"]').val(response.educationvalue.edu_type).end();
                                                    $('#educationmodal').find('[name="institute"]').val(response.educationvalue.institute).end();
                                                    $('#educationmodal').find('[name="result"]').val(response.educationvalue.result).end();
                                                    $('#educationmodal').find('[name="year"]').val(response.educationvalue.year).end();
                                                    $('#educationmodal').find('[name="emid"]').val(response.educationvalue.emp_id).end();
												});
                                            });
                                        });
</script>                
<script type="text/javascript">
                                        $(document).ready(function () {
                                            $(".experience").click(function (e) {
                                                e.preventDefault(e);
                                                // Get the record's ID via attribute  
                                                var iid = $(this).attr('data-id');
                                                $('#experiencemodal').trigger("reset");
                                                $('#ExpModal').modal('show');
                                                $.ajax({
                                                    url: 'experiencebyib?id=' + iid,
                                                    method: 'GET',
                                                    data: '',
                                                    dataType: 'json',
                                                }).done(function (response) {
                                                    console.log(response);
                                                    // Populate the form fields with the data returned from server
													$('#experiencemodal').find('[name="id"]').val(response.expvalue.id).end();
                                                    $('#experiencemodal').find('[name="company_name"]').val(response.expvalue.exp_company).end();
                                                    $('#experiencemodal').find('[name="position_name"]').val(response.expvalue.exp_com_position).end();
                                                    $('#experiencemodal').find('[name="address"]').val(response.expvalue.exp_com_address).end();
                                                    $('#experiencemodal').find('[name="work_duration"]').val(response.expvalue.exp_workduration).end();
                                                    $('#experiencemodal').find('[name="emid"]').val(response.expvalue.emp_id).end();
												});
                                            });
                                        });
</script>                
<script type="text/javascript">
                                        $(document).ready(function () {
                                            $(".deletexp").click(function (e) {
                                                e.preventDefault(e);
                                                // Get the record's ID via attribute  
                                                var iid = $(this).attr('data-id');
                                                $.ajax({
                                                    url: 'EXPvalueDelet?id=' + iid,
                                                    method: 'GET',
                                                    data: 'data',
                                                }).done(function (response) {
                                                    console.log(response);
                                                    $(".message").fadeIn('fast').delay(3000).fadeOut('fast').html(response);
                                                    window.setTimeout(function(){location.reload()},2000)
                                                    // Populate the form fields with the data returned from server
												});
                                            });
                                        });
</script>                 
<script type="text/javascript">
                                        $(document).ready(function () {
                                            $(".edudelet").click(function (e) {
                                                e.preventDefault(e);
                                                // Get the record's ID via attribute  
                                                var iid = $(this).attr('data-id');
                                                $.ajax({
                                                    url: 'EduvalueDelet?id=' + iid,
                                                    method: 'GET',
                                                    data: 'data',
                                                }).done(function (response) {
                                                    console.log(response);
                                                    $(".message").fadeIn('fast').delay(3000).fadeOut('fast').html(response);
                                                    window.setTimeout(function(){location.reload()},2000)
                                                    // Populate the form fields with the data returned from server
												});
                                            });
                                        });
</script>                

<?php $this->load->view('backend/footer'); ?>
