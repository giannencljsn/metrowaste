<?php
$this->load->view('backend/header');
?>
<?php
$this->load->view('backend/sidebar');
?>
<div class="page-wrapper">
  <div class="message">
  </div>
  <div class="row page-titles">
    <div class="col-md-5 align-self-center">
      <h3 class="text-themecolor"><i class="fa fa-money"></i> Payroll View
      </h3>
    </div>
    <div class="col-md-7 align-self-center">
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="javascript:void(0)">Home
          </a>
        </li>
        <li class="breadcrumb-item active">Payroll View
        </li>
      </ol>
    </div>
  </div>
  <div class="container-fluid">
    <div class="row m-b-10"> 
      <div class="col-12"><!-- 
        <button type="button" class="btn btn-info">
          <i class="fa fa-plus">
          </i>
          <a data-toggle="modal" data-target="#salaryModal" data-whatever="@getbootstrap" class="text-white salaryModal">
            <i class="" aria-hidden="true">
            </i> Add Payroll 
          </a>
        </button> -->
      
      </div>
    </div> 
    <div class="row">
      <div class="col-12">
        <div class="card card-outline-info">
          <div class="card-header">
            <h4 class="m-b-0 text-white"> Monthly Payroll List
            </h4>
          </div>
          <div class="card-body">
            <!--Savd vdgff gdfg dfg dfgdfg df  gd gdd gfd-->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <form method="post" action="" id="salaryform" class="form-material row">
                  <div class="form-group col-md-4">
                    <select class="form-control custom-select" data-placeholder="Choose a Category" tabindex="1" id="depid" name="depid" style="margin-top: 21px;" required>
                      <option value="#" disabled selected> 
												Choose Department
                      </option>
                      <?php foreach ($department as $value): ?>
                      <option value="<?php echo $value->id; ?>">
                        <?php echo $value->dep_name; ?>
                      </option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                  <div class="form-group col-md-4">
                    <label>
                    </label>
                    <div class="col-md-12">
                      <div class="form-group">
                        <div class='input-group date' id=''>
                          <input type='text' name="datetime" class="form-control mydatetimepicker" placeholder="Month"/>
                        </div>
                      </div>
                    </div>
                  </div> 
                    <div class="form-group col-md-3">
                    <button style="float:left;margin-top:23px" type="submit" id="BtnSubmit" class="btn btn-success">Submit</button>          
                     </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>            
            <!--Savd vdgff gdfg dfg dfgdfg df  gd gdd gfd-->
            <div class="table-responsive ">
              <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                  <tr>
                    <th>Employee Code
                    </th>
                    <th>Full Name

                    </th>
										<th>Salary Per Hour
                    </th>
                    <th>Action
                    </th>
                  </tr>
                </thead>
                <!-- <tfoot>
                  <tr>
                    <th>PIN 
                    </th>
                    <th>Full name
                    </th>
                    <th>Total salary
                    </th>
                    <th>Action
                    </th>
                  </tr>
                </tfoot> -->
                <tbody class="payroll">
                </tbody>
              </table>
            </div>                                
          </div>
        </div>
      </div>
    </div>


    <script>
         // Populate the payroll table to generate the payroll for each individual
    $("#BtnSubmit").on("click", function (event) {
        event.preventDefault();
        var depid = $('#depid').val();
        var datetime = $('.mydatetimepicker').val();

        $.ajax({
            url: "load_employee_by_deptID_for_pay?date_time=" + datetime + "&dep_id=" + depid,
            type: "GET",
            dataType: '',
            data: 'data',
            success: function (response) {
                // Clear and destroy the existing DataTable
                $('#example23').DataTable().clear().destroy();

                // Update the table body with new data
                $('.payroll').html(response);

                // Reinitialize DataTable with new data
                $('#example23').DataTable({
                    "aaSorting": [[1, 'asc']],
                    dom: 'Bfrtip',
                    buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
                });
            },
            error: function (response) {
                // Handle error if needed
            }
        });
    });
    </script>

    <div class="modal fade" id="generatePayrollModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content ">
          <div class="modal-header">
            <h4 class="modal-title" id="" style="color:black;">Salary Arrangement
            </h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;
              </span>
            </button>
          </div>
          <form method="post" action="pay_salary_add_record" id="generatePayrollForm" enctype="multipart/form-data">
            <div class="modal-body">
              <div class="form-group row">
                <label class="control-label text-left col-md-3">Employee</label>
                <div class="col-md-9">
                <select class="form-control custom-select" data-placeholder="Choose a Category" id="eid" tabindex="1" name="eid" id="OnEmValue" required>
                  <option value="#">Select Here
                  </option>
                  <?php foreach ($employee as $value): ?>
                  <option value="<?php echo $value->em_id; ?>">
                    <?php echo $value->first_name.' '.$value->last_name; ?>
                  </option>
                  <?php endforeach; ?>


                </select>
                </div>
              </div>                                        
              <div class="form-group row">
                <label class="control-label text-left col-md-3">Month
                </label>
                <div class="col-md-9">
                <input type="hidden" name="year">
                <select class="form-control custom-select" data-placeholder="Choose a Category" tabindex="1" name="month" id="salaryMonth" required>
                  <option value="#">Select Here
                  </option>
                  <option value="1">January
                  </option>
                  <option value="2">February
                  </option>
                  <option value="3">March
                  </option>
                  <option value="4">April
                  </option>
                  <option value="5">May
                  </option>
                  <option value="6">June
                  </option>
                  <option value="7">July
                  </option>
                  <option value="8">August
                  </option>
                  <option value="9">September
                  </option>
                  <option value="10">October
                  </option>
                  <option value="11">November
                  </option>
                  <option value="12">December
                  </option>
                </select>
                </div>
              </div>
              <div class="row well"> 
              <div class="col-md-6">                                    
              <div class="form-group row">
                <label class="control-label text-left col-md-5">Salary per Hour
                </label>
                <div class="col-md-7">
                <input type="text" name="basic" class="form-control basic_salary" id="" value="">
								
              </div> 
              </div> 
							<div class="form-group row" id="addition">
                <label class="control-label text-left col-md-5">Addition
                </label>
                <div class="col-md-7">
                <input type="text" name="addition" class="form-control" id="" value="" readonly>
              	</div>
              </div>
							 
									<div class="form-group row" id="deduction">
										<label class="control-label text-left col-md-5">Deduction</label>
										<div class="col-md-7">
											<input type="text" name="deduction" class="form-control deduction" value="" readonly>
										</div>
									</div>
								
								                                 
              <div class="form-group row">
                <label class="control-label text-left col-md-5">Working hours
                </label>
                <div class="col-md-7">
                    <input type="text" name="month_work_hours" class="form-control thour" pattern="[0-9]*" inputmode="numeric" onkeypress="return event.charCode >= 48 && event.charCode <= 57" value="" readonly>
                </div>
              </div>                                       
              <div class="form-group row">
                <label class="control-label text-left col-md-5">Hours worked
                </label>
                <div class="col-md-7">
                <input type="text" name="hours_worked" class="form-control hours_worked" id="" pattern="[0-9]*" inputmode="numeric" onkeypress="return event.charCode >= 48 && event.charCode <= 57" value="" readonly>
                <span>Work Without Pay:</span><span class="wpay"></span> <span>hrs</span>
                </div>
              </div>                                       
              <div class="form-group row" style="display:none">
                <label class="control-label text-left col-md-5">
                </label>
                <!-- <div class="col-md-7">
                <input type="hidden" name="hrate" class="form-control hrate" id="hrate" value=''>
                </div> -->
              </div>                                    
             
              <div class="form-group row">
                <label class="control-label text-left col-md-5">Pay Date
                </label>
                <div class="col-md-7">
                  <input type="text" name="paydate" class="form-control mydatetimepickerFull" id="" value="" required>
                </div>
              </div>              
              </div>
             

								<!-- <div class="form-group row" id="loan">
									<label class="control-label text-left col-md-5">Loan</label>
									<div class="col-md-7">
										<input type="text" name="loan" class="form-control loan" pattern="[0-9]*" inputmode="numeric" onkeypress="return event.charCode >= 48 && event.charCode <= 57" value="">
									</div>
								</div> -->
								<div class="form-group row">
									<label class="control-label text-left col-md-5">Final Salary</label>
									<div class="col-md-7">
										<input type="text" name="total_paid" class="form-control total_paid" value="" required>
									</div>
								</div>
							</div>
              
                                <div class="form-group row">
                                    <label class="control-label text-left col-md-5">Status</label><br>
                                    <div class="col-md-7">
                                    <input name="status" type="radio" id="radio_1" data-value="Paid" class="duration" value="Paid" checked="checked">
                                    <label for="radio_1">Paid</label>
                                    <input name="status" type="radio" id="radio_2" data-value="Process" class="type" value="Process">
                                    <label for="radio_2">Process</label>
                                    </div>
                                </div>                            
                         
              </div>   
           
                                <div class="form-group row" style="margin-top: 25px;">
                                    <label class="control-label text-left col-md-3">Paid Type</label><br>
                                    <div class="col-md-9">
                                    <input name="paid_type" type="radio" id="radio_3" data-value="Hand Cash" class="" value="Hand Cash" checked="checked">
                                    <label for="radio_3" style="margin-left: 30px">Hand Cash</label>
                                    <input name="paid_type" type="radio" id="radio_4" data-value="Bank" class="type" value="Bank">
                                    <label for="radio_4" style="margin-left: 130px">Bank</label>
                                    </div>
                                </div>                             
            </div>
							




            <div class="modal-footer">
              <input type="hidden" name="action" value="add" class="form-control" id="formAction">              
              <!-- <input type="hidden" name="loan_id" value="" class="form-control" id="loanID">                                       -->
              <button type="button" class="btn btn-danger" data-dismiss="modal">Close
              </button>
              <button type="submit" class="btn btn-success">Submit
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
		</div>  
    <script>

$(document).ready(function () {
          $(document).on('keyup','.hours_worked',function() {
            var finalsalary = 0;  
            //var total;  
          
            var rows = this.closest('#generatePayrollForm div');
             
            var hrate = parseFloat($('.hrate').val()); 
            var final =parseFloat($('.total_paid').val());
            var loan = parseFloat($('.loan').val());  
            var hwork =parseFloat($('.hours_worked').val());
            var thour =parseFloat($('.thour').val());
            var deduction = parseFloat($('.deduction').val());

              finalsalary = (hwork*hrate) - loan;
              $(".total_paid").val(finalsalary.toFixed(2));
              var total = thour - hwork;
              
              $(".deduction").val(deduction.toFixed(2));
              $(".wpay").html(total.toFixed(2));

              console.log(loan);
           // var returnval;
              //returnval = payval - payableval;
/*            if(returnval<=0){
                  $(".due").val(Math.abs(returnval).toFixed(2));
              }else if(returnval > 0){
                 $(".due").val(''); 
              }
              $(".return").val(returnval.toFixed(2));*/

          });
        });
          
    </script>
    <script>
  $(document).ready(function() {
    $(document).on('keyup', '.hours_worked', function() {
      var hrate = parseFloat($('.hrate').val());
      // var loan = parseFloat($('.loan').val());
      var hwork = parseFloat($('.hours_worked').val());
      var thour = parseFloat($('.thour').val());
      var deduction = parseFloat($('.deduction').val());

      var basicSalary = parseFloat($('[name="basic"]').val());
      var totalPaid = basicSalary - deduction;

      // $('[name="total_paid"]').val(basicSalary.toFixed(2));
			$('[name="total_paid"]').val(basicSalary - deduction);
      $('.wpay').html((thour - hwork).toFixed(2));
    });

    // Populate salary data on generate salary click
    $(document).on('click', ".salaryGenerateModal", function(e) {
      e.preventDefault(e);

      $('#generatePayrollModal').modal('show');

      var emid = $(this).data('id');
      var month = $(this).data('month');
      var year = $(this).data('year');
      var has_loan = $(this).data('has_loan');

      console.log(has_loan);

      $('#generatePayrollForm').find('[name="eid"]').val(emid).attr('readonly', true).end();
      $('#generatePayrollForm').find('[name="month"]').val(Math.abs(month)).attr('readonly', true).end();

      $.ajax({
        url: 'generate_payroll_for_each_employee?month=' + month + '&year=' + year + '&employeeID=' + emid,
        method: 'GET',
        data: '',
        dataType: 'json',
      }).done(function(response) {
        console.log(response);

        if (response.addition == 0) {
          $('#generatePayrollForm').find('[id="addition"]').val('').hide().end();
        }
        if (response.deduction == 0) {
          $('#generatePayrollForm').find('[id="deduction"]').val('').hide().end();
        }
        if (response.loan == 0) {
          $('#generatePayrollForm').find('[id="loan"]').val('').hide().end();
        }

        $('#generatePayrollForm').find('[name="basic"]').val(response.basic_salary).attr('readonly', true).end();
        var totalPaid = parseFloat(response.basic_salary) - parseFloat(response.deduction) - parseFloat(response.loan);
        $('#generatePayrollForm').find('[name="total_paid"]').val(response.final_salary).attr('readonly', true).end();
        $('#generatePayrollForm').find('[name="month_work_hours"]').val(response.total_work_hours).end();

        $('#generatePayrollForm').find('[name="hours_worked"]').val(response.employee_actually_worked)/*.attr('readonly', true)*/ .end();
        $('#generatePayrollForm').find('[name="addition"]').val(response.addition).end();
        $('#generatePayrollForm').find('[name="deduction"]').val(response.deduction).end();
        $('#generatePayrollForm').find('[class="wpay"]').html(response.wpay).end();
        $('#generatePayrollForm').find('[name="loan"]').end();
        $('#generatePayrollForm').find('[name="loan_id"]').val(response.loan_id).end();
        $('#generatePayrollForm').find('[name="year"]').val(year).end();
        $('#generatePayrollForm').find('[name="hrate"]').val(response.rate).end();
      });
    });

    var totalPaidValue = $('[name="total_paid"]').val();
    console.log(typeof totalPaidValue);
  });
</script>


    <?php
$this->load->view('backend/footer');
?>
