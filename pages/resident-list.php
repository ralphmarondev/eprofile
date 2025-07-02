<h2>📑 Resident List</h2>
<p>List of all registered residents will appear below.</p>

<div class="table-responsive">
  <table class="table table-bordered table-hover align-middle text-center">
    <thead class="table-light">
      <tr>
        <th>#</th>
        <th>Full Name</th>
        <th>Civil Status</th>
        <th>Email</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody id="residentTableBody">
      <tr><td colspan="5">Loading...</td></tr>
    </tbody>
  </table>
</div>

<script>
  fetch('api/read_resident_list.php')
    .then(res => res.json())
    .then(data => {
      const tbody = document.getElementById('residentTableBody');
      tbody.innerHTML = '';

      if (data.success === "1") {
        data.residents.forEach((r, i) => {
          const tr = document.createElement('tr');
          tr.innerHTML = `
            <td>${i + 1}</td>
            <td>${r.first_name} ${r.last_name}</td>
            <td>${r.civil_status}</td>
            <td>${r.email}</td>
            <td>
              <a href="?page=edit-resident&id=${r.id}" class="btn btn-sm btn-warning">Edit</a>
              <a href="?page=update-resident&id=${r.id}" class="btn btn-sm btn-primary">Update</a>
              <a href="api/delete_resident.php?id=${r.id}" class="btn btn-sm btn-danger"
                 onclick="return confirm('Are you sure you want to delete this resident?');">Delete</a>
            </td>
          `;
          tbody.appendChild(tr);
        });
      } else {
        tbody.innerHTML = `<tr><td colspan="5" class="text-muted">No residents found.</td></tr>`;
      }
    })
    .catch(err => {
      console.error(err);
      document.getElementById('residentTableBody').innerHTML =
        `<tr><td colspan="5" class="text-danger">Error loading data.</td></tr>`;
    });
</script>
