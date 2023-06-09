</div>

<footer class="footer"> © <?php echo date('Y')?> | Developed By Team Wonderpets </footer>

</div>

</div>

<script>
  // add an event listener to the form
  document.getElementById("myForm").addEventListener("input", function() {
    // check if all form inputs are valid
    if (this.checkValidity()) {
      // enable the submit button
      document.getElementById("submitBtn").disabled = false;
    } else {
      // disable the submit button
      document.getElementById("submitBtn").disabled = true;
    }
  });
</script>
<!-- STOP PAGE FROM REFRESHING IF FORM FAILS -->

<script>
		function validateForm(event) {
		event.preventDefault(); // prevent the default form submission behavior
		
		var isValid = true; // introduce a variable to keep track of the validation status

		// Validate Name Field
		var firstName = document.forms["myForm"]["fname"].value;
		if (firstName == "" || firstName.length < 3 || firstName.length > 30) {
			alert("Please enter minimum 3 characters for First Name.");
			isValid = false; // set isValid to false if validation fails
		}

		var lastName = document.forms["myForm"]["lname"].value;
		if (lastName == "" || lastName.length < 3 || lastName.length > 30) {
			alert("Please enter minimum 3 characters for Last Name..");
			isValid = false; // set isValid to false if validation fails
		}

		// // Validate Username Field
		// var email = document.forms["myForm"]["email"].value;
		// var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/; // regex pattern for valid email format
		// if (email == "" || email.length < 3 || email.length > 100 || !emailRegex.test(email) || /[^\w\s]/.test(email)) {
		// 	alert("Please enter a valid Username without special characters");
		// 	isValid = false; // set isValid to false if validation fails
		// }


		// Validate Password and Confirm Password Fields
		var password = document.forms["myForm"]["password"].value;
		var cpassword = document.forms["myForm"]["confirm"].value;
		if (password != cpassword) {
			alert("Passwords do not match.");
			isValid = false; // set isValid to false if validation fails
		}
		
		// Validate Image Field
		var image = document.forms["myForm"]["image_url"].files[0];
		var reader = new FileReader();
		reader.readAsDataURL(image);
		reader.onload = function (event) {
			var img = new Image();
			img.src = event.target.result;
			img.onload = function () {
			var fileSize = image.size / 1024 / 1024; // in MB
			var fileType = image.type;
			var maxWidth = 800;
			var maxHeight = 800;
			if (fileType != 'image/jpeg' && fileType != 'image/png' && fileType != 'image/gif') {
				alert("Please select a valid image file (JPEG, PNG, or GIF).");
				isValid = false; // set isValid to false if validation fails
			} else if (fileSize > 2) {
				alert("Please select an image file smaller than 2MB.");
				isValid = false; // set isValid to false if validation fails
			} else if (img.width > maxWidth || img.height > maxHeight) {
				alert("Please select an image with dimensions not exceeding " + maxWidth + "px x " + maxHeight + "px.");
				isValid = false; // set isValid to false if validation fails
			}
			if (isValid) {
				document.getElementById("myForm").submit(); // submit the form if validation succeeds
			}
			};
		};
		}

		document.getElementById("myForm").addEventListener("submit", validateForm);

</script>




<!-- TOGGLE PASSWORD VISIBILITY -->
									
<script>
	function showPassword() {
  var x = document.getElementById("password");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}

</script>
<!-- Check password security -->
<script>
var myInput = document.getElementById("password");
var letter = document.getElementById("letter");
var capital = document.getElementById("capital");
var number = document.getElementById("number");
var length = document.getElementById("length");
const password = document.getElementById("password");
const confirmPassword = document.getElementById("cpassword");
const errorMessage = document.getElementById("error-message");

// When the user clicks on the password field, show the message box
myInput.onfocus = function() {
  document.getElementById("message").style.display = "block";
}

// When the user clicks outside of the password field, hide the message box
myInput.onblur = function() {
  document.getElementById("message").style.display = "none";
}

// When the user starts to type something inside the password field
myInput.onkeyup = function() {
  // Validate lowercase letters
  var lowerCaseLetters = /[a-z]/g;
  if(myInput.value.match(lowerCaseLetters)) {  
    letter.classList.remove("invalid");
    letter.classList.add("pvalid");
  } else {
    letter.classList.remove("pvalid");
    letter.classList.add("invalid");
  }
  
  // Validate capital letters
  var upperCaseLetters = /[A-Z]/g;
  if(myInput.value.match(upperCaseLetters)) {  
    capital.classList.remove("invalid");
    capital.classList.add("pvalid");
  } else {
    capital.classList.remove("pvalid");
    capital.classList.add("invalid");
  }

  // Validate numbers
  var numbers = /[0-9]/g;
  if(myInput.value.match(numbers)) {  
    number.classList.remove("invalid");
    number.classList.add("pvalid");
  } else {
    number.classList.remove("pvalid");
    number.classList.add("invalid");
  }
  
  // Validate length
  if(myInput.value.length >= 8) {
    length.classList.remove("invalid");
    length.classList.add("pvalid");
  } else {
    length.classList.remove("pvalid");
    length.classList.add("invalid");
  }

  confirmPassword.addEventListener("input", () => {
  if (confirmPassword.value !== password.value) {
    errorMessage.textContent = "Passwords not match";
    errorMessage.style.color ="red";
    confirmPassword.setCustomValidity("Passwords do not match");
  } else {
    errorMessage.textContent = "";
    confirmPassword.setCustomValidity("");
  }
});
}
</script>


<!-- Bootstrap tether Core JavaScript -->
<script src="<?php echo base_url(); ?>assets/plugins/bootstrap/js/popper.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/bootstrap/js/bootstrap.min.js"></script>
<!-- slimscrollbar scrollbar JavaScript -->
<script src="<?php echo base_url(); ?>assets/js/jquery.slimscroll.js"></script>
<!--Wave Effects -->
<script src="<?php echo base_url(); ?>assets/js/waves.js"></script>
<!--Menu sidebar -->
<script src="<?php echo base_url(); ?>assets/js/sidebarmenu.js"></script>
<!--stickey kit -->
<script src="<?php echo base_url(); ?>assets/plugins/sticky-kit-master/dist/sticky-kit.min.js"></script>
<!--Custom JavaScript -->
<script src="<?php echo base_url(); ?>assets/js/custom.min.js"></script>

<!-- ============================================================== -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>
<!-- ============================================================== -->
<!--sparkline JavaScript -->
<script src="<?php echo base_url(); ?>assets/plugins/sparkline/jquery.sparkline.min.js"></script>
<!--morris JavaScript -->
<script src="<?php echo base_url(); ?>assets/plugins/raphael/raphael-min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/morrisjs/morris.js"></script>
<!-- Chart JS -->




<!-- CHART COMMENTED....UNCOMMENT WHEN DONE -->
<!-- <script src="<?php echo base_url(); ?>assets/js/dashboard1.js"></script> -->





<script src="<?php echo base_url(); ?>assets/plugins/moment/moment.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>  

<script src="<?php echo base_url(); ?>assets/plugins/styleswitcher/jQuery.style.switcher.js"></script>

<!-- Editable -->
<script src="<?php echo base_url(); ?>assets/plugins/jsgrid/db.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/jsgrid/dist/jsgrid.min.js"></script>
<!-- This is data table -->

<script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/multiselect/js/jquery.multi-select.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
<!-- start - This is for export functionality only -->
<script src="<?php echo base_url(); ?>assets/export/cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url(); ?>assets/export/cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
<script src="<?php echo base_url(); ?>assets/export/cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
<script src="<?php echo base_url(); ?>assets/export/cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
<script src="<?php echo base_url(); ?>assets/export/cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
<script src="<?php echo base_url(); ?>assets/export/cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
<script src="<?php echo base_url(); ?>assets/export/cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>


<!-- Clock Plugin JavaScript -->
<script src="<?php echo base_url(); ?>assets/plugins/clockpicker/dist/jquery-clockpicker.min.js"></script>                        
<!-- Date range Plugin JavaScript -->
<script src="<?php echo base_url(); ?>assets/plugins/timepicker/bootstrap-timepicker.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>     
<!-- end - This is for export functionality only -->
<script src="<?php echo base_url(); ?>assets/plugins/select2/dist/js/select2.full.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/plugins/bootstrap-select/bootstrap-select.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/plugins/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/multiselect/js/jquery.multi-select.js"></script>




<!-- CALENDAR -->
<!-- <script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/calendar/jquery-ui.min.js"></script> -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/calendar/dist/fullcalendar.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/calendar/dist/cal-init.js"></script>

<script type="text/javascript">
$(function () {
$('.mydatetimepicker').datepicker({
format: "mm-yyyy",
viewMode: "years", 
minViewMode: "months"   
});
});
$(function () {
$('.mydatetimepickerFull').datepicker({
format: "yyyy-mm-dd"   
});
});
</script>      
<script>
$(document).ready(function() {
$('#myTable').DataTable();
$(document).ready(function() {
var table = $('#example').DataTable({
	"columnDefs": [{
		"visible": false,
		"targets": 2
	}],
	"order": [
		[2, 'asc']
	],
	"displayLength": 25,
	"drawCallback": function(settings) {
		var api = this.api();
		var rows = api.rows({
			page: 'current'
		}).nodes();
		var last = null;
		api.column(2, {
			page: 'current'
		}).data().each(function(group, i) {
			if (last !== group) {
				$(rows).eq(i).before('<tr class="group"><td colspan="5">' + group + '</td></tr>');
				last = group;
			}
		});
	}
});
// Order by the grouping
$('#example tbody').on('click', 'tr.group', function() {
	var currentOrder = table.order()[0];
	if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
		table.order([2, 'desc']).draw();
	} else {
		table.order([2, 'asc']).draw();
	}
});
});
});
$(function () {
$("#datepicker").datepicker({ 
autoclose: true, 
todayHighlight: true
}).datepicker('update', new Date());
});
jQuery('.mydatepicker, #datepicker').datepicker();
jQuery('#datepicker-autoclose').datepicker({
autoclose: true,
todayHighlight: true
});        
$('#example23').DataTable({
dom: 'Bfrtip',
buttons: [
'copy', 'csv', 'excel', 'pdf', 'print'
]
});
$('#single-input').clockpicker({
placement: 'bottom',
align: 'left',
autoclose: true,
'default': 'now'
});
$('#single-input').clockpicker({
placement: 'bottom',
align: 'left',
autoclose: true,
'default': 'now'
});
$('.clockpicker').clockpicker({
donetext: 'Done',
}).find('input').change(function() {
console.log(this.value);
});
$('#check-minutes').click(function(e) {
// Have to stop propagation here
e.stopPropagation();
input.clockpicker('show').clockpicker('toggleView', 'minutes');
});




$(function() {
$('#datetimepicker2').datetimepicker({
language: 'en',
pick12HourFormat: true
});
});

$(".select2").select2();
</script>
<script type="text/javascript">
$('form').each(function() {
$(this).validate({
submitHandler: function(form) {
var formval = form;
var url = $(form).attr('action');

// Create an FormData object
var data = new FormData(formval);
$.ajax({
    type: "POST",
    enctype: 'multipart/form-data',
    url: url,
    data: data,
    processData: false,
    contentType: false,
    cache: false,
    timeout: 600000,
    success: function (response) {
        console.log(response);

        // Update the message div with the response
        $(".message").text(response).fadeIn('fast').delay(3000).fadeOut('fast');

        $('form').trigger("reset");
        window.setTimeout(function () {
            location.reload()
        }, 3000);
    },
    error: function (e) {
        console.log(e);
    }
});

}
});
});wordtune

</script>     

<script src="<?php echo base_url(); ?>assets/plugins/styleswitcher/jQuery.style.switcher.js"></script>



</body>

</html>
