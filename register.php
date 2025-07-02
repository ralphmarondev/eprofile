<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Register</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-gradient" style="background: linear-gradient(to right, #ffdde1, #ee9ca7); height: 100vh;">

	<div class="container d-flex justify-content-center align-items-center h-100">
		<div class="card shadow-lg border-0 p-4 rounded-4" style="max-width: 400px; width: 100%;">
			<h3 class="text-center mb-4 text-primary-emphasis">Create an Account</h3>
			<form method="post" action="">
				<div class="mb-3">
					<label for="username" class="form-label">Username</label>
					<input type="text" class="form-control form-control-lg" id="username" name="username" required>
				</div>
				<div class="mb-4">
					<label for="password" class="form-label">Password</label>
					<input type="password" class="form-control form-control-lg" id="password" name="password" required>
				</div>
				<button type="submit" class="btn btn-lg w-100" style="background-color: #ff69b4; color: white;">
					Register
				</button>
			</form>
			<div class="text-center mt-3">
				<small class="text-muted">Already have an account? <a href="index.php" class="text-decoration-none">Sign
						in</a></small>
			</div>
		</div>
	</div>

</body>

</html>