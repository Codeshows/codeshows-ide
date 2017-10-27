<div class="container-fluid w3-light-grey" id="switch">
	<h2 class="w3-text-red"><b>Signup Form</b></h2><br/>
	<div class="container w3-margin">
		<button class="w3-button w3-red w3-hover-cyan w3-ripple w3-round" onclick="document.getElementById('student').style.display='block';document.getElementById('switch').style.display='none';">Student</button>
		<button class="w3-button w3-red w3-hover-cyan w3-ripple w3-round" onclick="document.getElementById('teacher').style.display='block';document.getElementById('switch').style.display='none';">Faculty</button>
	</div>
</div>

<?php
    $branch = [
        "Architecture & Planning" => "AP",
        "Chemical Engineering" => "CHE",
        "Civil Engineering" => "CE",
        "Computer Engineering" => "CSE",
        "Electrical Engineering" => "EE",
        "Electronics & Comm. Engineering" => "ECE",
        "Mechanical Engineering" => "ME",
        "Metallurgical & Material Engineering" => "MET"
        ];
    $sems = [
        "I" => "1",
        "II" => "2",
        "III" => "3",
        "IV" => "4",
        "V" => "5",
        "VI" => "6",
        "VII" => "7",
        "VIII" => "8",
        "IX" => "9",
        "X" => "10"
        ];
?>
<div class="container-fluid w3-light-grey" id="student" style="display:none;">
	<form action='<?php echo(generate_link('user', 'register')); ?>' method='post' onsubmit="return validate('all')" class="container w3-margin-top" style="width:60%;">

		<h2 class="w3-text-red"><b>Signup Form</b></h2><br/>

		<div id="er_fname" style="display:none"></div>
		<p><label>First Name</label>
		<input class="w3-input w3-border w3-round" type='text' name='fname' placeholder='First Name' onchange="validate('fname')" required></p><br/>

		<div id="er_lname" style="display:none"></div>
		<p><label>Last Name</label>
		<input class="w3-input w3-border w3-round" type='text' name='lname' placeholder='Last Name' onchange="validate('lname')" required></p><br/>

		<div id="er_username" style="display:none"></div>
		<p><label>Userame</label>
		<input class="w3-input w3-border w3-round" type='text' name='username' placeholder='Username' onchange="validate('username')" required></p><br/>

		<div id="er_institute_id" style="display:none"></div>
		<p><label>Institute ID</label>
		<input class="w3-input w3-border w3-round" type='text' name='institute_id' placeholder='Institute Id' onchange="validate('institute_id')" required></p><br/>

		<div id="er_email" style="display:none"></div>
		<p><label>Email</label>
		<input class="w3-input w3-border w3-round" type='email' name='email' placeholder='Email Id' onchange="validate('email')" required></p><br/>

		<div id="er_password" style="display:none"></div>
		<p><label>Password</label>
		<input class="w3-input w3-border w3-round" type='password' name='password' placeholder='Password' onchange="validate('password')" required></p><br/>

		<div id="er_confirm" style="display:none"></div>
		<p><label>Confirm Password</label>
		<input class="w3-input w3-border w3-round" type='password' name='confirm' placeholder='Confirm Password' onchange="validate('confirm')" required></p><br/>

		<div id="er_sems" style="display:none"></div>
		<p><label for='sems'>Semester</label>
		<select class="w3-input w3-border w3-round" id="sems" name = 'sem' onchange="validate('sems')" required>
			<option value="0" disabled selected>Select Semester</option>
			<?php foreach($sems as $key => $value) { ?>
			<option value = <?php echo($value); ?> > <?php echo($key); ?> </option>
			<?php } ?>
		</select></p><br/>

		<div id="er_cg" style="display:none"></div>
		<p><label>CGPA</label>
		<input class="w3-input w3-border w3-round" type='number' name='cg' placeholder='CGPA' onchange="validate('cg')" min="0" max="10" step="0.01" required></p><br/>

		<div id="er_branch" style="display:none"></div>
		<p><label for='branch'>Branch</label>
		<select class="w3-input w3-border w3-round" id="branch" name = 'branch' onchange="validate('branch')" required>
			<option value="0" disabled selected>Select Branch</option>
			<?php foreach($branch as $key => $value) { ?>
			<option value = <?php echo($value); ?> > <?php echo($key); ?> </option>
			<?php } ?>
		</select></p><br/>

		<p><label for='dob'>Date of Birth</label>
		<input class="w3-input w3-border w3-round" type='date' name='dob' onchange="validate('dob')" required></p><br/>

		<p><label for='batch'>Batch</label>
		<input class="w3-input w3-border w3-round" type='text' name='batch' placeholder='Batch' onchange="validate('batch')" required></p><br/>

		<p><label for='about_me'>Info</label>
		<textarea class="w3-input w3-border w3-round" name='about_me' placeholder='About Me' rows = "10" cols = "30" ></textarea></p>

		<input type="hidden" name="type" value="1">

		<input class="w3-button w3-red w3-hover-cyan w3-ripple w3-round w3-margin-top" type='submit' name='signup' value='Sign Up'>
		<input class="w3-button w3-red w3-hover-cyan w3-ripple w3-round w3-margin-top" type='reset' name='reset' value='Reset'>
	</form>
</div>

<div class="container-fluid w3-light-grey" id="teacher" style="display:none">
	<form action='<?php echo(generate_link('user', 'register')); ?>' method='post' onsubmit="return validate_t('all')" class="container w3-margin-top" style="width:60%;">

		<h2 class="w3-text-red"><b>Signup Form</b></h2><br/>

		<div id="t_er_fname" style="display:none"></div>
		<p><label>First Name</label>
		<input class="w3-input w3-border w3-round" type='text' name='fname' placeholder='First Name' onchange="validate_t('fname')" required></p><br/>

		<div id="t_er_lname" style="display:none"></div>
		<p><label>Last Name</label>
		<input class="w3-input w3-border w3-round" type='text' name='lname' placeholder='Last Name' onchange="validate_t('lname')" required></p><br/>

		<div id="t_er_username" style="display:none"></div>
		<p><label>Userame</label>
		<input class="w3-input w3-border w3-round" type='text' name='username' placeholder='Username' onchange="validate_t('username')" required></p><br/>

		<div id="t_er_institute_id" style="display:none"></div>
		<p><label>Institute ID</label>
		<input class="w3-input w3-border w3-round" type='text' name='institute_id' placeholder='Institute Id' onchange="validate_t('institute_id')" required></p><br/>

		<div id="t_er_email" style="display:none"></div>
		<p><label>Email</label>
		<input class="w3-input w3-border w3-round" type='email' name='email' placeholder='Email Id' onchange="validate_t('email')" required></p><br/>

		<div id="t_er_password" style="display:none"></div>
		<p><label>Password</label>
		<input class="w3-input w3-border w3-round" type='password' name='password' placeholder='Password' onchange="validate_t('password')" required></p><br/>

		<div id="t_er_confirm" style="display:none"></div>
		<p><label>Confirm Password</label>
		<input class="w3-input w3-border w3-round" type='password' name='confirm' placeholder='Confirm Password' onchange="validate_t('confirm')" required></p><br/>

		<div id="t_er_branch" style="display:none"></div>
		<p><label for='branch'>Branch</label>
		<select class="w3-input w3-border w3-round" id="branch" name = 'branch' onchange="validate_t('branch')" required>
			<option value="0" disabled selected>Select Branch</option>
			<?php foreach($branch as $key => $value) { ?>
			<option value = <?php echo($value); ?> > <?php echo($key); ?> </option>
			<?php } ?>
		</select></p><br/>

		<p><label for='dob'>Date of Birth</label>
		<input class="w3-input w3-border w3-round" type='date' name='dob' onchange="validate_t('dob')" required></p><br/>

		<p><label for='about_me'>Info</label>
		<textarea class="w3-input w3-border w3-round" name='about_me' placeholder='About Me' rows = "10" cols = "30" ></textarea></p>

		<input type="hidden" name="type" value="2">

		<input class="w3-button w3-red w3-hover-cyan w3-ripple w3-round w3-margin-top" type='submit' name='signup' value='Sign Up'>
		<input class="w3-button w3-red w3-hover-cyan w3-ripple w3-round w3-margin-top" type='reset' name='reset' value='Reset'>
	</form>
</div>