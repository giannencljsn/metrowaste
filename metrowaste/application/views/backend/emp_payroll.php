<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Payroll</title>
    <!-- Include your CSS and other dependencies here -->
</head>
<body>
<?php 
                        $id = $this->session->userdata('user_login_id');
                        $basicinfo = $this->employee_model->GetBasic($id); 
						?>
    <!-- Your Payroll HTML code here -->
    <h1>Employee Payroll</h1>
	<h5><?php echo $basicinfo->em_code ?></h5>
    <!-- ... -->
</body>
</html>
