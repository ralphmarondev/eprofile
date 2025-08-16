<?php
if (!isset($_GET['id']) || empty($_GET['id'])) {
	echo "<div class='alert alert-danger'>User ID is missing.</div>";
	return;
}

$userId = intval($_GET['id']);
?>

<div class="card shadow p-4 mb-4">
	<div class="container">
		<h3>Update Administrator</h3>
		<form id="updateAdminForm">
			<h5 class="text-muted">Account Information</h5>
			<div class="row">
				<input type="hidden" name="id" id="user_id" value="<?= $userId ?>">
				<div class="mb-3 col-md-6">
					<label class="form-label">Full Name</label>
					<input type="text" class="form-control" name="full_name" id="full_name" placeholder="Enter full name"
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
						<option value="admin">Admin</option>
						<option value="super_admin">Super Admin</option>
					</select>
				</div>
				<div class="mb-3 col-md-6">
					<label class="form-label">Gender</label>
					<select class="form-select" name="gender" id="gender" required>
						<option value="">Choose...</option>
						<option value="male">Male</option>
						<option value="female">Female</option>
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
				<button type="submit" class="btn btn-pink" id="submitBtn">Update Account Information</button>
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
	const form = document.getElementById('updateAdminForm');

	form.addEventListener('submit', function(e) {
		e.preventDefault();
		const submitBtn = document.getElementById('submitBtn');
		submitBtn.disabled = true;
		submitBtn.innerHTML = `<span class="spinner-border spinner-border-sm me-2"></span>Updating...`;

		const formData = new FormData(form);
		const id = <?= json_encode($userId) ?>;

		fetch('api/user_update.php', {
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
				submitBtn.innerHTML = "Update Account Information";
			});
	});


	document.addEventListener("DOMContentLoaded", () => {
		const id = <?= json_encode($userId) ?>;

		fetch(`api/get_user.php?id=${id}`)
			.then(res => res.json())
			.then(data => {
				if (data.success === "1") {
					const r = data.user;

					document.getElementById('full_name').value = r.full_name;
					document.getElementById('email').value = r.email;
					document.getElementById('gender').value = r.gender;
					document.getElementById('role').value = r.role;
				} else {
					alert("Failed to load user data.");
				}
			})
			.catch(err => {
				console.error(err);
				alert("Error loading user details.");
			});
	});
</script>