<?php $this->load->view('backend/header'); ?>
<?php $this->load->view('backend/sidebar'); ?>
         <div class="page-wrapper">
		 		<?php 
                $allinvemployees = $this->employee_model->getInvalidUser(); 
                ?> 
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-themecolor"><i class="fa fa-university" aria-hidden="true"></i> Inactive Employees</h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Employee</li>
                    </ol>
                </div>
            </div>
            <div class="message"></div>
            <div class="container-fluid">
                <div class="row m-b-10"> 
                    <div class="col-12">
                        <button type="button" class="btn btn-info"><i class="fa fa-plus"></i><a href="<?php echo base_url(); ?>employee/Inactive_employees" class="text-white"><i class="" aria-hidden="true"></i> Add Employee</a></button>
                        <button type="button" class="btn btn-primary"><i class="fa fa-bars"></i><a href="<?php echo base_url(); ?>employee/Disciplinary" class="text-white"><i class="" aria-hidden="true"></i>  Disciplinary List</a></button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card card-outline-info">
                            <div class="card-header">
                                <h4 class="m-b-0 text-white"><i class="fa fa-user-o" aria-hidden="true"></i> Inactive Employee List</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive ">
                                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>ID </th>
                                                <th>Employee Name</th>
                                                <th>Status</th>
												<th>Date Inactive</th>
                                                <th>Reason</th>
                                                <th>Remarks</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <!-- <tfoot>
                                            <tr>
                                                <th>ID </th>
                                                <th>Employee Name</th>
                                                <th>Email </th>
                                                <th>Contact </th>
                                                <th>Roll</th>
                                                <th>Action</th>
                                            </tr>
                                        </tfoot> -->
                                        <tbody>
                                           <?php foreach($invalidem as $value): ?>
                                            <tr>
                                                <td><?php echo $value->em_code; ?></td>
                                                <td><?php echo $value->first_name .' '.$value->last_name; ?></td>
                                                <td><?php echo $value->status; ?></td>
												<td><?php echo $value->inactivedate; ?></td>
												<td><button class="btn btn-sm btn-danger"><?php echo $value->reason; ?></button></td>
												<!-- remarks -->
												<td><?php echo substr("$value->remarks",0,40).'...' ?></td>
												<td class="jsgrid-align-center ">

												<a href="#" title="Edit" class="btn btn-sm btn-primary waves-effect waves-light inactive" data-id="<?php echo $value->id; ?>"><i class="fa fa-pencil-square-o"></i></a>
                                                   
													<!-- <a href="<?php echo base_url(); ?>employee/view?I=<?php echo base64_encode($value->em_id); ?>" title="Edit" class="btn btn-sm btn-primary waves-effect waves-light"><i class="fa fa-pencil-square-o"></i></a> -->
                                                <!--- delete Inactive--->    
                                                </td>
                                                
                                            </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
									 <!-- sample modal content -->
									 <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content ">
                                                <div class="modal-header">
                                                    <h4 class="modal-title" id="exampleModalLabel1">Disciplinary Notice</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                </div>
                                                <form method="post" action="adding_Inactivity" id="btnSubmit" enctype="multipart/form-data">
                                                <div class="modal-body">
                                                    
                                                        <div class="form-group">
														<label class="control-label">Employee Name</label>
														<select class="form-control custom-select" name="emid" data-placeholder="Choose a Category" tabindex="1" value="" required>
                                                            
															<?php foreach($allinvemployees as $value): ?>
																<option value="<?php echo $value->em_id ?>"><?php echo $value->first_name.' '.$value->last_name ?></option>
															<?php endforeach; ?>
															</select>
															
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label">Reason</label>
                                                            <select class="form-control custom-select" data-placeholder="Choose a Category" tabindex="1" name="reason" value="">
                                                                <option value="Resigned">Resigned</option>
                                                                <option value="Terminated">Terminated</option>
                                                               
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                        <label>Status </label>
                                                        <select name="status" tabindex="1" class="form-control custom-select" >
                                                            <option value="ACTIVE">ACTIVE</option>
                                                            <option value="INACTIVE">INACTIVE</option>
                                                        </select>
                                                    </div>
                                                

                                                        <!-- <div class="form-group">
                                                            <label for="recipient-name" class="control-label">Title</label>
                                                            <input type="text" name="title" value="" class="form-control" id="recipient-name1">
                                                        </div> -->
                                                        <div class="form-group">
				                                        <label>Date Inactive</label>
				                                        <input type="date" name="inactivedate" class="form-control" placeholder=""> 
				                                    </div>
                                                     
                                                        <div class="form-group">
                                                            <label for="message-text" class="control-label">Remarks</label>
                                                            <textarea class="form-control" value="" name="remarks" id="message-text1" rows="4" placeholder="Please make it as Detailed as possible"></textarea>
                                                        </div>
                                                    
                                                </div>
                                                <div class="modal-footer">
                                                   <input type="hidden" name="id" value="">
                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-success">Submit</button>
                                                </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.modal -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

				<script type="text/javascript">
                                        $(document).ready(function () {
                                            $(".inactive").click(function (e) {
                                                e.preventDefault(e);
                                                // Get the record's ID via attribute  
                                                var iid = $(this).attr('data-id');
                                                $('#btnSubmit').trigger("reset");
                                                $('#exampleModal').modal('show');
                                                $.ajax({
                                                    url: 'InvalidById?id=' + iid,
                                                    method: 'GET',
                                                    data: '',
                                                    dataType: 'json',
                                                }).done(function (response) {
                                                    console.log(response);
                                                    // Populate the form fields with the data returned from server
													$('#btnSubmit').find('[name="id"]').val(response.inactivity.id).end();
                                                    $('#btnSubmit').find('[name="emid"]').val(response.inactivity.em_id).end();
                                                    $('#btnSubmit').find('[name="inactivedate"]').val(response.inactivity.inactivedate).end();
                                                    $('#btnSubmit').find('[name="reason"]').val(response.inactivity.reason).end();
                                                    $('#btnSubmit').find('[name="remarks"]').val(response.inactivity.remarks).end();
                                                    $('#btnSubmit').find('[name="status"]').val(response.inactivity.status).end();
                                                   
												});
                                            });
                                        });
					</script>
<?php $this->load->view('backend/footer'); ?>
