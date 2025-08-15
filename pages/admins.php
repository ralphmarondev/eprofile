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
										<button onclick='viewUser(${u.id})' class="btn btn-sm btn-success me-1">
												<i class="bi bi-eye"></i>
										</button>
										<a href="home.php?page=update-user&id=${u.id}" class="btn btn-sm btn-primary me-1" title="Update">
												<i class="bi bi-pencil-square"></i>
										</a>
										<button onclick="deleteUser(${u.id})" class="btn btn-sm btn-danger">
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
</script>