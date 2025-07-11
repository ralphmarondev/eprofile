<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

<style>
	.stat-card {
		aspect-ratio: 1 / 1;
		background-color: var(--primary-bg);
		padding: 10px;
		font-size: 0.9rem;
		transition: transform 0.2s ease;
	}

	.stat-card:hover {
		transform: scale(1.03);
	}

	.stat-icon {
		font-size: 1.6rem;
		color: var(--primary-border);
	}

	.stat-title {
		font-weight: 600;
		margin-top: 5px;
		font-size: 1rem;
	}

	.stat-value {
		font-size: 1.4rem;
		font-weight: bold;
		color: var(--primary-text);
	}
</style>

<div class="row mb-4 g-3">
	<div class="col-6 col-md-3">
		<div class="card text-center border-0 shadow rounded-4 stat-card" style="background-color:var(--blue-1);">
			<div class="card-body d-flex flex-column align-items-center justify-content-center">
				<i class="bi bi-house-door-fill stat-icon"></i>
				<div class="stat-title">Barangays</div>
				<div class="stat-value" id="totalBarangays">25</div>
			</div>
		</div>
	</div>
	<div class="col-6 col-md-3">
		<div class="card text-center border-0 shadow rounded-4 stat-card" style="background-color: var(--blue-1);">
			<div class="card-body d-flex flex-column align-items-center justify-content-center">
				<i class="bi bi-people-fill stat-icon"></i>
				<div class="stat-title">Population</div>
				<div class="stat-value" id="totalPopulation">0</div>
			</div>
		</div>
	</div>
	<div class="col-6 col-md-3">
		<div class="card text-center border-0 shadow rounded-4 stat-card" style="background-color: var(--blue-1);">
			<div class="card-body d-flex flex-column align-items-center justify-content-center">
				<i class="bi bi-person-vcard-fill stat-icon"></i>
				<div class="stat-title">Voters</div>
				<div class="stat-value" id="totalVoters">0</div>
			</div>
		</div>
	</div>
	<div class="col-6 col-md-3">
		<div class="card text-center border-0 shadow rounded-4 stat-card" style="background-color: var(--blue-1);">
			<div class="card-body d-flex flex-column align-items-center justify-content-center">
				<i class="bi bi-gift-fill stat-icon"></i>
				<div class="stat-title">Beneficiaries</div>
				<div class="stat-value" id="totalBeneficiaries">0</div>
			</div>
		</div>
	</div>
</div>

<script>
	fetch('api/dashboard_stats.php')
		.then(res => res.json())
		.then(data => {
			if (data.success === "1") {
				document.getElementById('totalPopulation').textContent = data.total_population;
				document.getElementById('totalVoters').textContent = data.total_voters;
				document.getElementById('totalBeneficiaries').textContent = data.total_beneficiaries;
			} else {
				console.error("Failed to fetch stats:", data.message);
			}
		})
		.catch(err => {
			console.error("Error fetching dashboard stats:", err);
		});
</script>