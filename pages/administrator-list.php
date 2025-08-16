<div class="card shadow p-4 mb-4" style="min-height: 500px;">
	<div class="container">

		<h3 class="step-title">Admininistrator List</h3>

		<!-- Filters -->
		<div class="row mb-2">
			<div class="col-md-6 mb-2">
				<input type="text" class="form-control" id="searchInput" placeholder="Search by name...">
			</div>
			<div class="col-md-6 mb-2">
				<select class="form-select" id="roleFilter">
					<option value="All">Filter by role (All)</option>
					<option value="super_admin">Super Admin</option>
					<option value="admin">Admin</option>
				</select>
			</div>
		</div>

		<div class="table-responsive">
			<table class="table table-bordered table-hover align-middle">
				<thead class="table-light">
					<tr>
						<th style="width: 5%;">No</th>
						<th style="width: 29%;">Full Name</th>
						<th style="width: 23%;">Email</th>
						<th style="width: 23%;">Role</th>
						<th style="width: 20%;" class="text-center">Actions</th>
					</tr>
				</thead>
				<tbody id="userTableBody">
					<tr class="text-center">
						<td colspan="5">Loading...</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>

	<!-- View Account Modal -->
	<div class="modal fade" id="viewModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel"
		aria-hidden="true" data-backdrop="static" data-keyboard="false">
		<div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
			<div class="modal-content rounded-4 cute-modal">
				<div class="modal-header cute-modal-header">
					<h5 class="modal-title" id="viewModalLabel">View Account</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<div class="form-section form-section-basic">
						<h5 class="text-muted">Account Information</h5>
						<hr>
						<div class="row">
							<div class="mb-3 col-md-6">
								<label class="form-label">Full Name</label>
								<input type="text" class="form-control" name="full name" id="full_name_view" placeholder="Enter full name"
									readonly>
							</div>
							<div class="mb-3 col-md-6">
								<label class="form-label">Email</label>
								<input type="email" class="form-control" name="email" id="email_view" placeholder="Enter email" readonly>
							</div>
							<div class="mb-3 col-md-6">
								<label class="form-label">Role</label>
								<input type="text" class="form-control" name="role" id="role_view" placeholder="Enter role" readonly>
							</div>
							<div class="mb-3 col-md-6">
								<label class="form-label">Gender</label>
								<input type="text" class="form-control" name="gender" id="gender_view" placeholder="Enter gender" readonly>
							</div>
						</div>
					</div>
				</div>

				<div class="modal-footer border-0">
					<button type="button" class="btn btn-pink" data-bs-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>

	<!-- Update Account Modal -->
	<div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel"
		aria-hidden="true" data-backdrop="static" data-keyboard="false">
		<div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
			<div class="modal-content rounded-4 cute-modal">
				<div class="modal-header cute-modal-header">
					<h5 class="modal-title" id="viewModalLabel">Update Account</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<div class="form-section form-section-basic">
						<h5 class="text-muted">Account Information</h5>
						<hr>
						<div class="row">
							<div class="mb-3 col-md-6">
								<label class="form-label">Full Name</label>
								<input type="text" class="form-control" name="full name" id="full_name_update" placeholder="Enter full name"
									required>
							</div>
							<div class="mb-3 col-md-6">
								<label class="form-label">Email</label>
								<input type="email" class="form-control" name="email" id="email_update" placeholder="Enter email">
							</div>
							<div class="mb-3 col-md-6">
								<label class="form-label">Role</label>
								<select class="form-select" name="role" id="role_update" required>
									<option value="">Choose...</option>
									<option>Admin</option>
									<option>Super Admin</option>
								</select>
							</div>
							<div class="mb-3 col-md-6">
								<label class="form-label">Gender</label>
								<select class="form-select" name="gender" id="gender_update" required>
									<option value="">Choose...</option>
									<option>Male</option>
									<option>Female</option>
								</select>
							</div>
							<div class="mb-3 col-md-6">
								<label class="form-label">Password</label>
								<input type="password" class="form-control" name="password" id="password_update" placeholder="Enter password" required>
							</div>
							<div class="mb-3 col-md-6">
								<label class="form-label">Confirm Password</label>
								<input type="password" class="form-control" name="confirmPassword" id="confirmPassword_update" placeholder="Confirm password"
									required>
							</div>
						</div>
					</div>
				</div>

				<div class="modal-footer border-0">
					<button type="button" class="btn btn-light-gray" data-bs-dismiss="modal">Cancel</button>
					<button type="button" class="btn btn-pink" onclick="confirmUpdate()">Update</button>
				</div>
			</div>
		</div>
	</div>

	<!-- Delete Account Modal -->
	<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel"
		aria-hidden="true" data-backdrop="static" data-keyboard="false">
		<div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
			<div class="modal-content rounded-4 cute-modal">
				<div class="modal-header cute-modal-header">
					<h5 class="modal-title" id="viewModalLabel">Delete Account</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<div class="form-section form-section-basic">
						<h5 class="text-muted">Are you sure you want to delete this account? This action cannot be undone.</h5>
						<hr>
						<div class="row">
							<div class="mb-3 col-md-6">
								<label class="form-label">Full Name</label>
								<input type="text" class="form-control" name="full name" id="full_name_delete" placeholder="Enter full name"
									readonly>
							</div>
							<div class="mb-3 col-md-6">
								<label class="form-label">Email</label>
								<input type="email" class="form-control" name="email" id="email_delete" placeholder="Enter email" readonly>
							</div>
							<div class="mb-3 col-md-6">
								<label class="form-label">Role</label>
								<input type="text" class="form-control" name="role" id="role_delete" placeholder="Enter role" readonly>
							</div>
							<div class="mb-3 col-md-6">
								<label class="form-label">Gender</label>
								<input type="text" class="form-control" name="gender" id="gender_delete" placeholder="Enter gender" readonly>
							</div>
						</div>
					</div>
				</div>

				<div class="modal-footer border-0">
					<button type="button" class="btn btn-light-gray" data-bs-dismiss="modal">Cancel</button>
					<button type="button" class="btn btn-pink" onclick="confirmDelete()">Delete</button>
				</div>
			</div>
		</div>
	</div>

	<!-- Success Modal -->
	<div class="modal fade" id="successModal" tabindex="-1" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content rounded-4 cute-modal">
				<div class="modal-header cute-modal-header">
					<h5 class="modal-title">Success</h5>
				</div>
				<div class="modal-body">
					Account deleted successfully!
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-pink" id="goToDashboard">Close</button>
				</div>
			</div>
		</div>
	</div>

	<!-- Error Modal -->
	<div class="modal fade" id="errorModal" tabindex="-1" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content rounded-4 cute-modal">
				<div class="modal-header cute-modal-header">
					<h5 class="modal-title">Failed</h5>
				</div>
				<div class="modal-body" id="errorMessage">
					<!-- error message will be injected -->
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-pink" data-bs-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
</div>
</div>

<style>
	.cute-modal {
		background-color: var(--primary-bg);
		border: 2px solid var(--primary-border);
		color: var(--primary-text);
	}

	.cute-modal-header {
		background-color: var(--primary-bg);
		border-bottom: none;
	}

	.btn-pink {
		background-color: var(--primary-border);
		color: white;
		border: none;
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
	const searchInput = document.getElementById('searchInput');
	const roleFilter = document.getElementById('roleFilter');

	searchInput.addEventListener('input', fetchFilteredUsers);
	roleFilter.addEventListener('change', fetchFilteredUsers);

	function fetchFilteredUsers() {
		const searchTerm = searchInput.value.trim().toLowerCase();
		const role = roleFilter.value;

		fetch('api/user_read_list.php')
			.then(res => res.json())
			.then(data => {
				const tbody = document.getElementById('userTableBody');
				tbody.innerHTML = '';

				if (data.success === "1" && data.users.length > 0) {
					let filtered = data.users;

					if (searchTerm) {
						filtered = filtered.filter(u => (u.full_name || '').toLowerCase().includes(searchTerm));
					}

					if (role !== 'All') {
						filtered = filtered.filter(u => u.role === role);
					}

					if (filtered.length > 0) {
						filtered.forEach((u, i) => {
							const tr = document.createElement('tr');
							tr.innerHTML = `
								<td>${i + 1}</td>
								<td>${u.full_name || '—'}</td>
								<td>${u.email || '—'}</td>
								<td>${u.role || '—'}</td>
								<td class="text-center">
										<button onclick='openViewModal(${u.id})' class="btn btn-sm btn-success me-1">
												<i class="bi bi-eye"></i>
										</button>
										<a href="home.php?page=update-administrator&id=${u.id}" class="btn btn-sm btn-primary me-1" title="Update">
												<i class="bi bi-pencil-square"></i>
										</a>
										<button onclick="openDeleteModal(${u.id})" class="btn btn-sm btn-danger">
												<i class="bi bi-trash"></i>
										</button>
								</td>
						`;
							tbody.appendChild(tr);
						});
					} else {
						tbody.innerHTML = `<tr><td colspan="5" class="text-muted text-center">No users found.</td></tr>`;
					}
				} else {
					tbody.innerHTML = `<tr><td colspan="5" class="text-muted text-center">No users found.</td></tr>`;
				}
			})
			.catch(err => {
				console.error(err);
				document.getElementById('userTableBody').innerHTML =
					`<tr><td colspan="5" class="text-danger text-center">Error loading data.</td></tr>`;
			});
	}

	fetchFilteredUsers();

	let selectedUserId = null; // to store the user being updated/deleted

	function openViewModal(id) {
		selectedUserId = id;
		fetch(`api/get_user.php?id=${id}`)
			.then(res => res.json())
			.then(data => {
				if (data.success === "1") {
					const user = data.user;
					document.getElementById('full_name_view').value = user.full_name || '';
					document.getElementById('email_view').value = user.email || '';
					document.getElementById('role_view').value = user.role || '';
					document.getElementById('gender_view').value = user.gender || '';
					new bootstrap.Modal(document.getElementById('viewModal')).show();
				} else {
					alert("Error: " + data.error);
				}
			});
	}

	// Show Update Modal
	function openUpdateModal(id) {
		selectedUserId = id;
		fetch(`api/get_user.php?id=${id}`)
			.then(res => res.json())
			.then(data => {
				if (data.success === "1") {
					const user = data.user;
					document.getElementById('full_name_update').value = user.full_name || '';
					document.getElementById('email_update').value = user.email || '';
					document.getElementById('role_update').value = user.role || '';
					document.getElementById('gender_update').value = user.gender || '';
					// optional: clear password fields
					document.getElementById('password_update').value = '';
					document.getElementById('confirmPassword_update').value = '';
					new bootstrap.Modal(document.getElementById('updateModal')).show();
				} else {
					alert("Error: " + data.error);
				}
			});
	}

	// Confirm Update
	function confirmUpdate() {
		const full_name = document.getElementById('full_name_update').value;
		const email = document.getElementById('email_update').value;
		const role = document.getElementById('role_update').value;
		const gender = document.getElementById('gender_update').value;
		const password = document.getElementById('password_update').value;
		const confirmPassword = document.getElementById('confirmPassword_update').value;

		if (password && password !== confirmPassword) {
			alert("Passwords do not match!");
			return;
		}

		const formData = new URLSearchParams();
		formData.append('id', selectedUserId);
		formData.append('full_name', full_name);
		formData.append('email', email);
		formData.append('role', role);
		formData.append('gender', gender);
		if (password) formData.append('password', password);

		fetch('api/user_update.php', {
				method: 'POST',
				body: formData
			})
			.then(res => res.json())
			.then(data => {
				if (data.success === "1") {
					new bootstrap.Modal(document.getElementById('updateModal')).hide();
					fetchFilteredUsers();
					new bootstrap.Modal(document.getElementById('successModal')).show();
				} else {
					document.getElementById('errorMessage').innerText = data.error;
					new bootstrap.Modal(document.getElementById('errorModal')).show();
				}
			});
	}

	// Show Delete Modal
	function openDeleteModal(id) {
		selectedUserId = id;
		fetch(`api/get_user.php?id=${id}`)
			.then(res => res.json())
			.then(data => {
				if (data.success === "1") {
					const user = data.user;
					document.getElementById('full_name_delete').value = user.full_name || '';
					document.getElementById('email_delete').value = user.email || '';
					document.getElementById('role_delete').value = user.role || '';
					document.getElementById('gender_delete').value = user.gender || '';
					new bootstrap.Modal(document.getElementById('deleteModal')).show();
				} else {
					alert("Error: " + data.error);
				}
			});
	}

	// Confirm Delete
	function confirmDelete() {
		fetch('api/user_delete.php', {
				method: 'POST',
				headers: {
					'Content-Type': 'application/x-www-form-urlencoded'
				},
				body: `id=${selectedUserId}`
			})
			.then(res => res.json())
			.then(data => {
				new bootstrap.Modal(document.getElementById('deleteModal')).hide();
				if (data.success === "1") {
					fetchFilteredUsers();
					new bootstrap.Modal(document.getElementById('successModal')).show();
				} else {
					document.getElementById('errorMessage').innerText = data.error;
					new bootstrap.Modal(document.getElementById('errorModal')).show();
				}
			});
	}
</script>