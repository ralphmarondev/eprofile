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

	<!-- Modal for Beneficiary List -->
	<div class="modal fade" id="beneficiaryModal" tabindex="-1" aria-labelledby="beneficiaryModalLabel"
		aria-hidden="true">
		<div class="modal-dialog modal-xl modal-dialog-scrollable">
			<div class="modal-content">
				<div class="modal-header bg-pink">
					<div>
						<h5 class="modal-title mb-1" id="beneficiaryModalLabel">Beneficiary List</h5>
						<small id="beneficiaryModalSub"></small>
					</div>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<table class="table table-bordered table-hover" id="beneficiaryTable">
						<thead class="table-light">
							<tr>
								<th>#</th>
								<th>Full Name</th>
								<th>Gender</th>
								<th>Birthday</th>
								<th>Barangay</th>
								<th>Contact</th>
							</tr>
						</thead>
						<tbody></tbody>
					</table>
				</div>
				<div class="modal-footer">
					<button class="btn btn-outline-danger" onclick="printModalContent()">🖨️ Print</button>
					<button class="btn btn-pink" onclick="downloadPdf()">⬇️ Download PDF</button>
				</div>
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>

<script>
	const categoryLabels = {
		"PWD": "Person with Disabilities (PWD)",
		"4Ps": "Pantawid Pamilyang Pilipino Program (4Ps)",
		"Farmer": "Farmers List",
		"SingleParent": "Single Parent List",
		"OFW": "Overseas Filipino Workers (OFW)",
		"Indigent": "Indigent List",
		"SeniorCitizen": "Senior Citizen List"
	};

	const shortLabels = {
		"PWD": "PWD List",
		"4Ps": "4Ps List",
		"Farmer": "Farmers List",
		"SingleParent": "Single Parent List",
		"OFW": "OFW List",
		"Indigent": "Indigent List",
		"SeniorCitizen": "Senior Citizen List"
	};

	document.querySelectorAll('.stat-card').forEach((card, index) => {
		card.addEventListener('click', () => {
			const category = Object.keys(categoryLabels)[index];
			showBeneficiariesModal(category);
		});
	});

	function showBeneficiariesModal(category) {
		const modalTitle = document.getElementById('beneficiaryModalLabel');
		const modalSub = document.getElementById('beneficiaryModalSub');
		const tableBody = document.querySelector('#beneficiaryTable tbody');

		modalTitle.textContent = shortLabels[category];
		modalSub.textContent = `Showing residents under ${categoryLabels[category]}`;
		tableBody.innerHTML = '<tr><td colspan="6">Loading...</td></tr>';

		fetch(`api/beneficiaries_list.php?category=${encodeURIComponent(category)}`)
			.then(res => res.json())
			.then(data => {
				if (data.success === "1") {
					tableBody.innerHTML = "";
					data.residents.forEach((r, i) => {
						const row = `
							<tr>
								<td>${i + 1}</td>
								<td>${r.first_name} ${r.middle_name} ${r.last_name}</td>
								<td>${r.gender}</td>
								<td>${r.birthday}</td>
								<td>${r.barangay}</td>
								<td>${r.contact_number}</td>
							</tr>`;
						tableBody.innerHTML += row;
					});
				} else {
					tableBody.innerHTML = `<tr><td colspan="6" class="text-danger">${data.message}</td></tr>`;
				}
			})
			.catch(err => {
				console.error(err);
				tableBody.innerHTML = `<tr><td colspan="6" class="text-danger">Error fetching data.</td></tr>`;
			});

		new bootstrap.Modal(document.getElementById('beneficiaryModal')).show();
	}

	// Print modal content
	function printModalContent() {
		const printContents = document.querySelector("#beneficiaryModal .modal-body").innerHTML;
		const printWindow = window.open('', '', 'height=800,width=1200');
		printWindow.document.write('<html><head><title>Print</title><link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"></head><body>');
		printWindow.document.write('<h4>' + document.getElementById('beneficiaryModalLabel').textContent + '</h4>');
		printWindow.document.write(printContents);
		printWindow.document.write('</body></html>');
		printWindow.document.close();
		printWindow.print();
	}

	// Download as PDF using jsPDF + html2canvas
	async function downloadPdf() {
		const { jsPDF } = window.jspdf;
		const modalBody = document.querySelector("#beneficiaryModal .modal-body");
		const canvas = await html2canvas(modalBody);
		const imgData = canvas.toDataURL("image/png");

		const pdf = new jsPDF('p', 'mm', 'a4');
		const imgProps = pdf.getImageProperties(imgData);
		const pdfWidth = pdf.internal.pageSize.getWidth();
		const pdfHeight = (imgProps.height * pdfWidth) / imgProps.width;

		pdf.addImage(imgData, 'PNG', 0, 10, pdfWidth, pdfHeight);
		pdf.save(`${document.getElementById('beneficiaryModalLabel').textContent}.pdf`);
	}
</script>