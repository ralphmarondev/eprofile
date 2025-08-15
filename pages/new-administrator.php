<div class="card shadow p-4 mb-4">
	<div class="container">
		<h3>New Administrator</h3>
		<form id="newAdminForm">
			<h5 class="text-muted">Account Information</h5>
			<div class="row">
				<div class="mb-3 col-md-6">
					<label class="form-label">Full Name</label>
					<input type="text" class="form-control" name="full name" id="full_name" placeholder="Enter full name"
						required>
				</div>
				<div class="mb-3 col-md-6">
					<label class="form-label">Email</label>
					<input type="email" class="form-control" name="email" id="email" placeholder="Enter email">
				</div>
				<div class="mb-3 col-md-6">
					<label class="form-label">Role</label>
					<select class="form-select" name="role" id="role" required>
						<option value="">Choose...</option>
						<option>Admin</option>
						<option>Super Admin</option>
					</select>
				</div>
				<div class="mb-3 col-md-6">
					<label class="form-label">Gender</label>
					<select class="form-select" name="gender" id="gender" required>
						<option value="">Choose...</option>
						<option>Male</option>
						<option>Female</option>
					</select>
				</div>
				<div class="mb-3 col-md-6">
					<label class="form-label">Password</label>
					<input type="password" class="form-control" name="password" id="password" placeholder="Enter password" required>
				</div>
				<div class="mb-3 col-md-6">
					<label class="form-label">Confirm Password</label>
					<input type="password" class="form-control" name="confirmPassword" id="confirmPassword" placeholder="Confirm password"
						required>
				</div>
			</div>
			<div class="text-end">
				<button type="submit" class="btn btn-pink" id="submitBtn">Save New Admin</button>
			</div>
		</form>
	</div>


</div>

<style>
	.form-step {
		display: none;
	}

	.form-step.active {
		display: block;
	}

	.btn-pink {
		background-color: var(--primary-border);
		color: white;
	}

	.btn-pink:hover {
		background-color: var(--primary-text);
	}

	.step-title {
		color: var(--primary-text);
		font-weight: bold;
	}
</style>

<script>
	const form = document.getElementById('newAdminForm');

	form.addEventListener('submit', function(e) {
		e.preventDefault();
		const submitBtn = document.getElementById('submitBtn');
		submitBtn.disabled = true;
		submitBtn.innerHTML = `<span class="spinner-border spinner-border-sm me-2"></span>Saving...`;

		const formData = new FormData(form);

		fetch('api/user_register.php', {
				method: 'POST',
				body: formData
			})
			.then(res => res.json())
			.then(data => {
				if (data.success === '1') {
					alert(data.message);
					form.reset();
				} else {
					alert('Error: ' + data.error);
				}
			})
			.catch(err => {
				console.error(err);
				alert('Something went wrong. Check console.');
			})
			.finally(() => {
				submitBtn.disabled = false;
				submitBtn.innerHTML = "Save New Admin";
			});
	});
</script>