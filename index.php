<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Login</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" href="assets/img/logo.png" type="image/x-icon">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="assets/css/root.css">
	<style>
		.modal-content.cute-modal {
			background-color: var(--primary-bg);
			border: 2px solid var(--primary-border);
			color: var(--primary-text);
		}

		.modal-header.cute-modal-header {
			background-color: var(--primary-bg);
			border-bottom: none;
		}

		.modal-footer .btn-pink {
			background-color: var(--primary-btn);
			color: white;
			border: none;
		}

		.modal-footer .btn-pink:hover {
			background-color: var(--primary-btn-hover);
		}

		.step-title {
			color: var(--primary-text);
			font-weight: bold;
		}

		body {
			background: url('assets/img/bck.jpg') no-repeat center center fixed;
			background-size: cover;
			height: 100vh;
		}

		.btn-theme {
			background-color: var(--primary-btn);
			color: white;
			border: none;
		}

		.btn-theme:hover {
			background-color: var(--primary-btn-hover);
		}
	</style>

</head>

<body>
	<div class="container d-flex justify-content-center align-items-center h-100">
		<div class="card shadow-lg border-0 p-4 rounded-4" style="max-width: 400px; width: 100%;">
			<h3 class="text-center mb-4 step-title">Welcome Back</h3>
			<form id="login-form">
				<div class="mb-3">
					<label for="email" class="form-label">Email</label>
					<input type="email" class="form-control form-control" id="email" name="email" placeholder="Enter email"
						required>
				</div>
				<div class="mb-4">
					<label for="password" class="form-label">Password</label>
					<input type="password" class="form-control form-control" id="password" name="password"
						placeholder="Enter password" required>
				</div>
				<button type="submit" class="btn w-100 btn-theme">
					Login
				</button>
			</form>
			<div class="text-center mt-3">
				<small class="text-muted">Don't have an account? <a href="register.php" class="text-decoration-none">Sign
						up</a></small>
			</div>
		</div>
	</div>

	<!-- Success Modal -->
	<div class="modal fade" id="successModal" tabindex="-1" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content rounded-4 cute-modal">
				<div class="modal-header cute-modal-header">
					<h5 class="modal-title">Yay! 🎉</h5>
				</div>
				<div class="modal-body">
					You’re logged in successfully!
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-pink" id="goToDashboard">Continue</button>
				</div>
			</div>
		</div>
	</div>

	<!-- Error Modal -->
	<div class="modal fade" id="errorModal" tabindex="-1" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content rounded-4 cute-modal">
				<div class="modal-header cute-modal-header">
					<h5 class="modal-title">Oops! 😢</h5>
				</div>
				<div class="modal-body" id="errorMessage">
					<!-- error message will be injected -->
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-pink" data-bs-dismiss="modal">Try Again</button>
				</div>
			</div>
		</div>
	</div>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
	<script>
		const form = document.getElementById('login-form');
		const successModal = new bootstrap.Modal(document.getElementById('successModal'));
		const errorModal = new bootstrap.Modal(document.getElementById('errorModal'));
		const errorMessage = document.getElementById('errorMessage');
		const goToDashboard = document.getElementById('goToDashboard');

		form.addEventListener('submit', function (e) {
			e.preventDefault();
			const formData = new FormData(form);

			fetch('api/user_login.php', {
				method: 'POST',
				body: formData
			})
				.then(res => res.json())
				.then(data => {
					if (data.success === "1") {
						// Save user info to localStorage 
						localStorage.setItem("user_id", data.id);
						localStorage.setItem("user_email", data.email);
						localStorage.setItem("user_role", data.role);

						successModal.show();
					} else {
						errorMessage.textContent = data.error || "Something went wrong.";
						errorModal.show();
					}
				})
				.catch(err => {
					errorMessage.textContent = "Server error: " + err;
					errorModal.show();
				});
		});

		goToDashboard.addEventListener('click', function () {
			window.location.href = 'home.php';
		});
	</script>
</body>

</html>