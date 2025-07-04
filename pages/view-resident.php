<?php
if (!isset($_GET['id'])) {
	echo "<p class='text-danger'>No resident ID specified.</p>";
	return;
}

$id = htmlspecialchars($_GET['id'], ENT_QUOTES);
?>

<h2>👤 Resident Profile</h2>
<a href="?page=resident-list" class="btn btn-secondary btn-sm mb-3">← Back to list</a>

<div id="residentProfile">
	<p>Loading resident data...</p>
</div>

<script>
	const id = <?= json_encode($id) ?>;

	fetch(`api/resident_read_details.php?id=${id}`)
		.then(res => res.json())
		.then(data => {
			const container = document.getElementById('residentProfile');
			if (data.success === "1") {
				const r = data.resident;
				container.innerHTML = `
					<div class="card mb-4" style="max-width: 800px;">
						<div class="row g-0">
							<div class="col-md-4 text-center p-3">
								<img src="${r.picture || 'assets/default-profile.png'}" 
										 class="img-fluid rounded" 
										 alt="Profile Picture" style="max-height: 250px; object-fit: cover;">
							</div>
							<div class="col-md-8">
								<div class="card-body">
									<h4 class="card-title">${r.first_name} ${r.middle_name} ${r.last_name} ${r.suffix || ''}</h4>
									<p class="card-text"><strong>Gender:</strong> ${r.gender}</p>
									<p class="card-text"><strong>Birthday:</strong> ${r.birthday}</p>
									<p class="card-text"><strong>Birthplace:</strong> ${r.b_place}</p>
									<p class="card-text"><strong>Civil Status:</strong> ${r.civil_status}</p>
									<p class="card-text"><strong>Citizenship:</strong> ${r.citizen}</p>
									<p class="card-text"><strong>Religion:</strong> ${r.religion}</p>
									<p class="card-text"><strong>Height:</strong> ${r.height} cm</p>
									<p class="card-text"><strong>Weight:</strong> ${r.weight} kg</p>
									<p class="card-text"><strong>Mother's Name:</strong> ${r.motherName}</p>
									<p class="card-text"><strong>Father's Name:</strong> ${r.fatherName}</p>
									<p class="card-text"><strong>Voter:</strong> ${r.voter}</p>
									<p class="card-text"><strong>Beneficiary:</strong> ${r.is_beneficiary === 'yes' ? 'Yes' : 'No'}</p>
									<p class="card-text"><strong>Categories:</strong> ${r.categories}</p>
									<p class="card-text"><strong>Address:</strong> ${r.street}, ${r.barangay}</p>
									<p class="card-text"><strong>Contact Number:</strong> ${r.contact_number}</p>
									<p class="card-text"><strong>Email:</strong> ${r.email}</p>
								</div>
							</div>
						</div>
					</div>
				`;
			} else {
				container.innerHTML = `<p class='text-muted'>${data.message}</p>`;
			}
		})
		.catch(err => {
			console.error(err);
			document.getElementById('residentProfile').innerHTML =
				"<p class='text-danger'>Failed to load resident data.</p>";
		});
</script>