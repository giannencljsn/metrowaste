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
							<form method="POST" action="<?php echo site_url('formController/process_selected'); ?>" id="employeeForm">
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
						   <form method="POST" action="Add_Attendance" id="attendanceForm" enctype="multipart/form-data">
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

                        </div>
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
document.getElementById('employeeForm').addEventListener('submit', function(event) {
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

   
});


document.getElementById('attendanceForm').addEventListener('submit', function(event) {
    event.preventDefault();
    var formData = new FormData(this);

    // Get the values of signin, signout, and attdate
    var signinValue = document.getElementsByName('signin')[0].value;
    var signoutValue = document.getElementsByName('signout')[0].value;
    var attdateValue = document.getElementsByName('attdate')[0].value;

    // Append the same values for signin, signout, and attdate to the form data for each employee
    var employeeSelects = document.getElementsByName('emp_id[]');
    for (var i = 0; i < employeeSelects.length; i++) {
        var selectValue = employeeSelects[i].value;
        var selectOptionText = employeeSelects[i].options[employeeSelects[i].selectedIndex].text;

        formData.append('em_code[]', selectValue);
        formData.append('employee_name[]', selectOptionText);
        formData.append('signin[]', signinValue);
        formData.append('signout[]', signoutValue);
        formData.append('attdate[]', attdateValue);
    }

    // Send the form data to the Add_Attendance controller
    fetch('Add_Attendance', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        var message = "Successfully added!"; // Retrieve the value of the "message" object
		console.log(message);
        if (message === 'Successfully added!') {
            // Display the success message in the .message element
            var successMessage = document.createElement('div');
            successMessage.textContent = message;
            console.log(successMessage.textContent);
            successMessage.classList.add('success-message');
            document.querySelector('.message').textContent = message;
            document.body.appendChild(successMessage);
            setTimeout(function() {
                successMessage.remove();
            }, 3000);

            // Reset the form and reload the page after 3 seconds
            setTimeout(function() {
                document.getElementById('attendanceForm').reset();
                location.reload();
            }, 3000);
        } else {
            console.log('Error: ' + message);
        }
    })
    .catch(error => {
        console.error('Error:', error.message);
    });
});

    xhr.send(formData);


</script>



                                 



<?php $this->load->view('backend/footer'); ?>
