<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

<style>
	.stat-card {
		aspect-ratio: 1 / 1;
		background-color: #ffe4e9;
		padding: 10px;
		font-size: 0.9rem;
		transition: transform 0.2s ease;
	}

	.stat-card:hover {
		transform: scale(1.03);
	}

	.stat-icon {
		font-size: 1.6rem;
		color: #ff69b4;
	}

	.stat-title {
		font-weight: 600;
		margin-top: 5px;
		font-size: 1rem;
	}

	.stat-value {
		font-size: 1.4rem;
		font-weight: bold;
		color: #d63384;
	}
</style>

<div class="row mb-4 g-3">
	<div class="col-6 col-md-3">
		<div class="card text-center border-0 shadow rounded-4 stat-card" style="background-color: #ffe4e9;">
			<div class="card-body d-flex flex-column align-items-center justify-content-center">
				<i class="bi bi-universal-access stat-icon"></i>
				<div class="stat-title">PWD</div>
				<div class="stat-value" id="totalPwd">0</div>
			</div>
		</div>
	</div>
	<div class="col-6 col-md-3">
		<div class="card text-center border-0 shadow rounded-4 stat-card" style="background-color: #fff3f8;">
			<div class="card-body d-flex flex-column align-items-center justify-content-center">
				<i class="bi bi-people-fill stat-icon"></i>
				<div class="stat-title">4P'S</div>
				<div class="stat-value" id="total4ps">0</div>
			</div>
		</div>
	</div>
	<div class="col-6 col-md-3">
		<div class="card text-center border-0 shadow rounded-4 stat-card" style="background-color: #fce6ef;">
			<div class="card-body d-flex flex-column align-items-center justify-content-center">
				<i class="bi bi-tree-fill stat-icon"></i>
				<div class="stat-title">Farmers</div>
				<div class="stat-value" id="totalFarmers">0</div>
			</div>
		</div>
	</div>
	<div class="col-6 col-md-3">
		<div class="card text-center border-0 shadow rounded-4 stat-card" style="background-color: #f9d4eb;">
			<div class="card-body d-flex flex-column align-items-center justify-content-center">
				<i class="bi bi-people-fill stat-icon"></i>
				<div class="stat-title">Single Parent</div>
				<div class="stat-value" id="totalSingleParent">0</div>
			</div>
		</div>
	</div>
	<div class="col-6 col-md-3">
		<div class="card text-center border-0 shadow rounded-4 stat-card" style="background-color: #ffe4e9;">
			<div class="card-body d-flex flex-column align-items-center justify-content-center">
				<i class="bi bi-airplane-fill stat-icon"></i>
				<div class="stat-title">OFW</div>
				<div class="stat-value" id="totalOfw">0</div>
			</div>
		</div>
	</div>
	<div class="col-6 col-md-3">
		<div class="card text-center border-0 shadow rounded-4 stat-card" style="background-color: #fff3f8;">
			<div class="card-body d-flex flex-column align-items-center justify-content-center">
				<i class="bi bi-heart-fill stat-icon"></i>
				<div class="stat-title">Indigent</div>
				<div class="stat-value" id="totalIndigent">0</div>
			</div>
		</div>
	</div>
	<div class="col-6 col-md-3">
		<div class="card text-center border-0 shadow rounded-4 stat-card" style="background-color: #fce6ef;">
			<div class="card-body d-flex flex-column align-items-center justify-content-center">
				<i class="bi bi-heart-fill stat-icon"></i>
				<div class="stat-title">Senior Citizen</div>
				<div class="stat-value" id="totalSeniorCitizen">0</div>
			</div>
		</div>
	</div>
</div>

<script>
	fetch('api/beneficiaries_stats.php')
		.then(res => res.json())
		.then(data => {
			if (data.success === "1") {
				document.getElementById('totalPwd').textContent = data.total_pwd;
				document.getElementById('total4ps').textContent = data.total_4ps;
				document.getElementById('totalFarmers').textContent = data.total_farmers;
				document.getElementById('totalSingleParent').textContent = data.total_single_parent;
				document.getElementById('totalOfw').textContent = data.total_ofw;
				document.getElementById('totalIndigent').textContent = data.total_indigent;
				document.getElementById('totalSeniorCitizen').textContent = data.total_senior_citizen;
			} else {
				console.error("Failed to fetch stats:", data.message);
			}
		})
		.catch(err => {
			console.error("Error fetching beneficiaries stats:", err);
		});
</script>