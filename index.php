<?php
	require "vendor/autoload.php";
	
	// 1. What does this function session_start() do to the application?
	// It starts a new session or resumes an existing session for the current user. This function typically needs to be called before any output is sent to the browser, as it sends HTTP headers to set a session cookie that identifies the session on subsequent requests.
	session_start();
	session_destroy();
?>
<!DOCTYPE html>
<html>
   <head>
      <title>Registration</title>
      <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
      <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	  <style>
		@import url(https://fonts.googleapis.com/css?family=Raleway:300,400,600);

		.required {
		  color: red;
		}

		body{
			margin: 0;
			font-size: .9rem;
			font-weight: 400;
			line-height: 1.6;
			color: #212529;
			text-align: left;
			background-color: #f5f8fa;
		}

		.navbar-laravel
		{
			box-shadow: 0 2px 4px rgba(0,0,0,.04);
		}

		.navbar-brand , .nav-link, .my-form, .login-form
		{
			font-family: Raleway, sans-serif;
		}

		.my-form
		{
			padding-top: 1.5rem;
			padding-bottom: 1.5rem;
		}

		.my-form .row
		{
			margin-left: 0;
			margin-right: 0;
		}

		.login-form
		{
			padding-top: 1.5rem;
			padding-bottom: 1.5rem;
		}

		.login-form .row
		{
			margin-left: 0;
			margin-right: 0;
		}

		.form-group.required .control-label: after {
		  content: "*";
		  color: red;
		}

	  </style>
   </head>
   <body>
		 <main class="my-form">
			<div class="cotainer">
				<div class="row justify-content-center">
					<div class="col-md-8">
							<div class="card">
								<div class="card-header">Analogy Exam Registration</div>
								<div class="card-body">
									<form method="POST" action="register.php">
										<div class="form-group row">
											<label class=" col-md-4 col-form-label text-md-right">Full Name<span class="required">*</span></label>
											<div class="col-md-6">
												<input type="text" id="complete_name" class="form-control" name="complete_name" required>
											</div>
										</div>
										<div class="form-group row">
											<label class=" col-md-4 col-form-label text-md-right">Email<span class="required">*</span></label>
											<div class="col-md-6">
												<input type="email" id="email" class="form-control" name="email" required>
											</div>
										</div>
		
										<div class="form-group row">
											<label class="col-md-4 col-form-label text-md-right">Birthdate<span class="required">*</span></label>
											<div class="col-md-6">
												<input type="date" id="birthdate" class="form-control" name="birthdate" required>
											</div>
										</div>

											<div class="col-md-6 offset-md-5">
												<button type="submit" class="btn btn-primary">
												Start Exam
												</button>
											</div>
									</form>
								 </div>
							</div>
								
					</div>
				</div>
			 </div>
		</main>     
   </body>
</html>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>


