
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
                        <button type="button" class="btn btn-info"><i class="fa fa-plus"></i><a href="<?php echo base_url(); ?>attendance/Attendance" class="text-white"><i class="" aria-hidden="true"></i>  Attendance List</a></button>
                        <button type="button" class="btn btn-primary"><i class="fa fa-bars"></i><a href="<?php echo base_url(); ?>leave/Application" class="text-white"><i class="" aria-hidden="true"></i>  Leave Application</a></button>
                    </div>
                </div>  
				<div class="row">
                    <div class="col-12">
                        <div class="card card-outline-info">
                            <div class="card-header">
                                <h4 class="m-b-0 text-white"><i class="fa fa-user-o" aria-hidden="true"></i> Employee List</h4>
                            </div>
							<div class="card-body">
							<form method="POST" action="<?php echo site_url('formController/process_selected'); ?>" id="attendanceForm">
    <div class="table-responsive">
        <table id="employees123" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>Employee Name</th>
                    <th>PIN</th>
                    <th>Username</th>
                    <th>Contact</th>
                    <th>User Type</th>
                    <th>
                        <input type="checkbox" id="selectAllCheckbox" style="position: inherit; opacity: 1;">Select All 
                    </th>
                </tr>
            </thead>
            <tbody>
			
                    <?php foreach($employee as $value): ?>
                    <tr>
                        <td>
                            <?php echo $value->first_name .' '.$value->last_name; ?>
                        </td>
                        <td><?php echo $value->em_code; ?></td>
                        <td><?php echo $value->em_email; ?></td>
                        <td><?php echo $value->em_phone; ?></td>
                        <td><?php echo $value->em_role; ?></td>
                        <td>
                            <input type="checkbox" name="selected_values[]" value="<?php echo $value->em_id; ?>" class="attendanceCheckbox" style="position: inherit; opacity: 1;">
                        </td>
                    </tr>
                    <?php endforeach; ?>
                    <tr>
                        <td colspan="6">
							<button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Submit</button>
                        </td>
                    </tr>
                </form>
            </tbody>
        </table>
    </div>
</div>
<script>
    document.getElementById('selectAllCheckbox').addEventListener('change', function() {
        var checkboxes = document.getElementsByClassName('attendanceCheckbox');
        for (var i = 0; i < checkboxes.length; i++) {
            checkboxes[i].checked = this.checked;
        }
    });
// JavaScript
document.getElementById('attendanceForm').addEventListener('submit', function(event) {
    event.preventDefault(); // Prevent default form submission

    // Get selected checkbox values and names
    var selectedEmployees = [];
    var selectedEmployeeNames = [];
    var checkboxes = document.getElementsByClassName('attendanceCheckbox');
    for (var i = 0; i < checkboxes.length; i++) {
        if (checkboxes[i].checked) {
            var employeeId = checkboxes[i].value;
            var employeeName = checkboxes[i].parentNode.parentNode.cells[0].textContent;

            // Check if the employee is already selected
            if (!selectedEmployees.includes(employeeId)) {
                selectedEmployees.push(employeeId);
                selectedEmployeeNames.push(employeeName);
            }
        }
    }

    // Display selected employee names in the modal body
    var modalBody = document.getElementById('myModalContent').querySelector('.modal-body');
    modalBody.innerHTML = ''; // Clear existing content
    for (var j = 0; j < selectedEmployeeNames.length; j++) {
        var employeeNameElement = document.createElement('p');
        employeeNameElement.textContent = selectedEmployeeNames[j];
        modalBody.appendChild(employeeNameElement);
    }

    // Create a new select element for each selected employee
    var employeeSelectContainer = document.getElementById('employeeSelectContainer');
    employeeSelectContainer.innerHTML = ''; // Clear existing select elements
    for (var k = 0; k < selectedEmployees.length; k++) {
        var selectElement = document.createElement('select');
        selectElement.className = 'form-control';
        selectElement.name = 'emp_id[]'; // Change the name to 'emp_id[]'

        var option = document.createElement('option');
        option.value = selectedEmployees[k];
        option.text = selectedEmployeeNames[k];
        selectElement.appendChild(option);

        // Add hidden inputs for signin, signout, and attdate with the same values for all selected employees
        var signinInput = document.createElement('input');
        signinInput.type = 'hidden';
        signinInput.name = 'signin[]'; // Change the name to 'signin[]'
        signinInput.value = document.getElementsByName('signin')[0].value; // Get the value from the first 'signin' input

        var signoutInput = document.createElement('input');
        signoutInput.type = 'hidden';
        signoutInput.name = 'signout[]'; // Change the name to 'signout[]'
        signoutInput.value = document.getElementsByName('signout')[0].value; // Get the value from the first 'signout' input

        var attdateInput = document.createElement('input');
        attdateInput.type = 'hidden';
        attdateInput.name = 'attdate[]'; // Change the name to 'attdate[]'
        attdateInput.value = document.getElementsByName('attdate')[0].value; // Get the value from the first 'attdate' input

        selectElement.appendChild(signinInput);
        selectElement.appendChild(signoutInput);
        selectElement.appendChild(attdateInput);

        employeeSelectContainer.appendChild(selectElement);
    }

    // Pass the form data to the controller
    var formData = new FormData(this);
    var selectElements = employeeSelectContainer.getElementsByTagName('select');
    for (var j = 0; j < selectElements.length; j++) {
        var selectName = 'emp_id[]'; // Change the name to 'emp_id[]'
        var selectValue = selectElements[j].value;
		var selectOptionText = selectElements[j].options[selectElements[j].selectedIndex].text;

formData.append(selectName, selectValue);
formData.append('em_code[]', selectValue);
formData.append('employee_name[]', selectOptionText);

// Append the same values for signin, signout, and attdate to the form data
formData.append('signin[]', document.getElementsByName('signin')[0].value);
formData.append('signout[]', document.getElementsByName('signout')[0].value);
formData.append('attdate[]', document.getElementsByName('attdate')[0].value);
}

// Send the form data to the Add_Attendance controller
var xhr = new XMLHttpRequest();
xhr.open('POST', 'Add_Attendance', true);
xhr.onload = function() {
if (xhr.status === 200) {
	console.log(xhr.responseText); // Output the response from the controller
	var response = xhr.responseText.trim(); // Trim any leading/trailing whitespace

	if (response === 'Successfully added!') {
		alert(response); // Display the success message
	}
} else {
	console.log('Error: ' + xhr.status);
}
};
xhr.send(formData);

// Open the modal
$('#myModal').modal('show');
});

</script>

                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

	 							<div class="row">
                    <div class="col-6">
                        <div class="card card-outline-info">
                            <div class="card-header">
                                <h4 class="m-b-0 text-white"> Attendance </h4>
                            </div>


                           <div class="card-body">
						   <form method="post" action="Add_Attendance" id="attendanceForm" enctype="multipart/form-data">
    <div class="modal-body">
        <div class="form-group">
            <label>Employee</label>
            <div id="employeeSelectContainer">
                <!-- Add options for employees here dynamically -->
            </div>
        </div>
        <div class="form-group">
            <label>Sign In</label>
            <input type="text" name="signin" class="form-control clockpicker" placeholder="Select Sign In Time">
        </div>
        <div class="form-group">
            <label>Sign Out</label>
            <input type="text" name="signout" class="form-control clockpicker" placeholder="Select Sign Out Time">
        </div>
        <div class="form-group">
            <label>Attendance Date</label>
            <input type="text" name="attdate" class="form-control datepicker" placeholder="Select Attendance Date">
        </div>
        <div class="modal-footer">
            <input type="hidden" name="id" value="<?php if (!empty($attval->id)) { echo $attval->id; } ?>" class="form-control" id="recipient-name1">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            <button type="submit" id="attendanceUpdate" class="btn btn-success">Submit</button>
        </div>
    </div>
</form>
                            </div> 

                        </div>
                    </div>
                </div>


                 <!-- <div class="row">
                    <div class="col-6">
                        <div class="card card-outline-info">
                            <div class="card-header">
                                <h4 class="m-b-0 text-white"> Attendance </h4>
                            </div>





                           <div class="card-body">
                                    <form method="post" action="Add_Attendance" id="holidayform" enctype="multipart/form-data">
                                    <div class="modal-body">
			                                    <div class="form-group">
			                                        <label>Employee</label>
                                                <select class="form-control custom-select" data-placeholder="Choose a Category" tabindex="1" name="emid" required>
                                                   
                                                   <?php if(!empty($attval->em_code)){ ?>
                                                    <option value="<?php echo $attval->em_code ?>"><?php echo $attval->first_name.' '.$attval->last_name ?></option>           
                                                   <?php } else { ?>
                                                   <option value="#">Select Here</option>
                                                    <?php foreach($employee as $value): ?>
                                                    <option value="<?php echo $value->em_code ?>"><?php echo $value->first_name.' '.$value->last_name ?></option>
                                                    <?php endforeach; ?>
                                                    <?php } ?>
                                                </select>
			                                    </div>
                                            <label>Select Date: </label>
                                            <div id="" class="input-group date" >
                                                <input name="attdate" class="form-control mydatetimepickerFull" value="<?php if(!empty($attval->atten_date)) { 
                                                $old_date_timestamp = strtotime($attval->atten_date);
                                                $new_date = date('Y-m-d', $old_date_timestamp);    
                                                echo $new_date; } ?>" required>
                                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                            </div>
                                        <div class="form-group" >
                                           <label class="m-t-20">Sign In Time</label>
                                            <input class="form-control" name="signin" id="single-input" value="<?php if(!empty($attval->signin_time)) { echo  $attval->signin_time;} ?>" placeholder="Now" required>
                                        </div>
                                        <div class="form-group">
                                        <label class="m-t-20">Sign Out Time</label>
                                        <div class="input-group clockpicker">
                                            <input type="text" name="signout" class="form-control" value="<?php if(!empty($attval->signout_time)) { echo  $attval->signout_time;} ?>">
                                        </div>
                                        </div> 
                                        <div class="form-group">
                                                    <label>Place</label>
                                                <select class="form-control custom-select" data-placeholder="" tabindex="1" name="place" required>
                                                    <option value="office" <?php if(isset($attval->place) && $attval->place == "office") { echo "selected"; } ?>>Office</option>
                                                    <option value="field"  <?php if(isset($attval->place) && $attval->place == "field") { echo "selected"; } ?>>Field</option>
                                                </select>
                                        </div> 
                                    </div>
                                    <div class="modal-footer">
                                    <input type="hidden" name="id" value="<?php if(!empty($attval->id)){ echo  $attval->id;} ?>" class="form-control" id="recipient-name1">                                       
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                        <button type="submit" id="attendanceUpdate" class="btn btn-success">Submit</button>
                                    </div>
                                    </form>
                            </div> -->
                        </div>
                    </div>
                </div>
                        
                                    
                                 

<!-- <script type="text/javascript">
$(document).ready(function () {
    $(".holidelet").click(function (e) {
        e.preventDefault(e);
        // Get the record's ID via attribute  
        var iid = $(this).attr('data-id');
        $.ajax({
            url: 'HOLIvalueDelet?id=' + iid,
            method: 'GET',
            data: 'data',
        }).done(function (response) {
            console.log(response);
            $(".message").fadeIn('fast').delay(3000).fadeOut('fast').html(response);
            window.setTimeout(function(){location.reload()},2000)
            // Populate the form fields with the data returned from server
		});
    });
    $("#attendanceUpdate").on("click", function() {
        window.setTimeout(function(){location.reload()}, 1000);
    });
});
</script>                               -->


<div id="myModalContent">
   <!-- Form content goes here -->
   <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="myModalLabel">Selected Employees</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body">
            <!-- Selected employees will be displayed here -->
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
         </div>
      </div>
   </div>
</div>

</div>

<?php $this->load->view('backend/footer'); ?>

