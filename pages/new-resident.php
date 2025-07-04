<div class="container">
	<div class="card shadow p-4 mb-4">
		<h3 class="step-title mb-4">New Resident</h3>

		<form id="residentForm" enctype="multipart/form-data">
			<!-- Step 1: Basic Info -->
			<div class="form-step active" id="step1">
				<h5 class="text-muted">Basic Information</h5>
				<div class="row">
					<div class="mb-3 col-md-6">
						<label class="form-label">First Name</label>
						<input type="text" class="form-control" name="first_name" id="first_name" placeholder="Enter first name"
							required>
					</div>
					<div class="mb-3 col-md-6">
						<label class="form-label">Middle Name</label>
						<input type="text" class="form-control" name="middle_name" id="middle_name" placeholder="Enter middle name">
					</div>
					<div class="mb-3 col-md-6">
						<label class="form-label">Last Name</label>
						<input type="text" class="form-control" name="last_name" id="last_name" placeholder="Enter last name"
							required>
					</div>
					<div class="mb-3 col-md-6">
						<label class="form-label">Suffix</label>
						<input type="text" class="form-control" name="suffix" id="suffix" placeholder="Enter suffix">
					</div>
					<div class="mb-3 col-md-6">
						<label class="form-label">Birthday</label>
						<input type="date" class="form-control" name="birthday" id="birthday" placeholder="Enter birthday" required>
					</div>
					<div class="mb-3 col-md-6">
						<label class="form-label">Birth Place</label>
						<input type="text" class="form-control" name="b_place" id="b_place" placeholder="Enter birthplace" required>
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
						<label class="form-label">Civil Status</label>
						<select class="form-select" name="civil_status" id="civil_status">
							<option value="">Choose...</option>
							<option>Single</option>
							<option>Married</option>
							<option>Widowed</option>
							<option>Divorced</option>
						</select>
					</div>
				</div>
				<div class="text-end">
					<button type="button" class="btn btn-pink" onclick="nextStep()">Next ➡️</button>
				</div>
			</div>

			<!-- Step 2: Other Information -->
			<div class="form-step" id="step2">
				<h5 class="text-muted">Other Information</h5>
				<div class="row">
					<div class="mb-3 col-md-6">
						<label class="form-label">Citizenship</label>
						<input type="text" class="form-control" name="citizen" id="citizen" placeholder="Enter citizenship"
							required>
					</div>
					<div class="mb-3 col-md-6">
						<label class="form-label">Religion</label>
						<input type="text" class="form-control" name="religion" id="religion" placeholder="Enter religion" required>
					</div>
					<div class="mb-3 col-md-6">
						<label class="form-label">Height (cm)</label>
						<input type="text" class="form-control" name="height" id="height" placeholder="Enter height" required>
					</div>
					<div class="mb-3 col-md-6">
						<label class="form-label">Weight (kg)</label>
						<input type="text" class="form-control" name="weight" id="weight" placeholder="Enter weight" required>
					</div>
					<div class="mb-3 col-md-6">
						<label class="form-label">Mother's Name</label>
						<input type="text" class="form-control" name="mother_name" id="mother_name" placeholder="Enter mother name"
							required>
					</div>
					<div class="mb-3 col-md-6">
						<label class="form-label">Father's Name</label>
						<input type="text" class="form-control" name="father_name" id="father_name" placeholder="Enter father name"
							required>
					</div>
				</div>
				<div class="d-flex justify-content-between">
					<button type="button" class="btn btn-secondary" onclick="prevStep()">⬅️ Back</button>
					<button type="button" class="btn btn-pink" onclick="nextStep()">Next ➡️</button>
				</div>
			</div>

			<!-- Step 3: Voter & Beneficiary Info -->
			<div class="form-step" id="step3">
				<h5 class="text-muted">Voter and Beneficiary Information</h5>
				<div class="row">
					<!-- Voter -->
					<div class="mb-3 col-md-6">
						<label class="form-label">Are you a Voter?</label>
						<select class="form-select" name="voter" id="voter" required>
							<option value="">Choose...</option>
							<option value="Yes">Yes</option>
							<option value="No">No</option>
						</select>
					</div>

					<!-- Beneficiary -->
					<div class="mb-3 col-md-6">
						<label class="form-label">Are you a Beneficiary?</label>
						<select class="form-select" name="is_beneficiary" id="isBeneficiary" required>
							<option value="">Choose...</option>
							<option value="Yes">Yes</option>
							<option value="No">No</option>
						</select>
					</div>

					<!-- Cute Beneficiary Categories (conditionally shown) -->
					<div class="mb-3 col-md-12" id="beneficiaryOptions" style="display: none;">
						<div class="card border border-pink-subtle p-3 shadow-sm">
							<label class="form-label fw-semibold text-pink mb-2">Select Beneficiary Categories</label>
							<div class="row">
								<div class="col-md-4">
									<div class="form-check">
										<input class="form-check-input beneficiary-option" type="checkbox" value="PWD" id="catPWD">
										<label class="form-check-label" for="catPWD">PWD</label>
									</div>
									<div class="form-check">
										<input class="form-check-input beneficiary-option" type="checkbox" value="4Ps" id="cat4Ps">
										<label class="form-check-label" for="cat4Ps">4Ps</label>
									</div>
									<div class="form-check">
										<input class="form-check-input beneficiary-option" type="checkbox" value="Farmer" id="catFarmer">
										<label class="form-check-label" for="catFarmer">Farmer</label>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-check">
										<input class="form-check-input beneficiary-option" type="checkbox" value="SingleParent"
											id="catSingle">
										<label class="form-check-label" for="catSingle">Single Parent</label>
									</div>
									<div class="form-check">
										<input class="form-check-input beneficiary-option" type="checkbox" value="OFW" id="catOFW">
										<label class="form-check-label" for="catOFW">OFW</label>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-check">
										<input class="form-check-input beneficiary-option" type="checkbox" value="Indigent"
											id="catIndigent">
										<label class="form-check-label" for="catIndigent">Indigent</label>
									</div>
									<div class="form-check">
										<input class="form-check-input beneficiary-option" type="checkbox" value="SeniorCitizen"
											id="catSenior">
										<label class="form-check-label" for="catSenior">Senior Citizen</label>
									</div>
								</div>
							</div>
						</div>
						<input type="hidden" name="beneficiary" id="beneficiaryHidden">
					</div>
				</div>

				<div class="d-flex justify-content-between">
					<button type="button" class="btn btn-secondary" onclick="prevStep()">⬅️ Back</button>
					<button type="button" class="btn btn-pink" onclick="nextStep()">Next ➡️</button>
				</div>
			</div>

			<!-- Step 4: Address and Contact Information -->
			<div class="form-step" id="step3">
				<h5 class="text-muted">Address and Contact Information</h5>
				<div class="row">
					<div class="mb-3 col-md-6">
						<label class="form-label">Barangay</label>
						<select class="form-select" name="barangay" required>
							<option value="">Choose...</option>
							<option value="Amunitan">Amunitan</option>
							<option value="Batangan">Batangan</option>
							<option value="Baua">Baua</option>
							<option value="Cabanbanan Norte">Cabanbanan Norte</option>
							<option value="Cabanbanan Sur">Cabanbanan Sur</option>
							<option value="Cabiraoan">Cabiraoan</option>
							<option value="Calayan">Calayan</option>
							<option value="Callao">Callao</option>
							<option value="Caroan">Caroan</option>
							<option value="Casitan">Casitan</option>
							<option value="Flourishing(Poblacion)">Flourishing(Poblacion)</option>
							<option value="Ipil">Ipil</option>
							<option value="Isca">Isca</option>
							<option value="Magrafil">Magrafil</option>
							<option value="Minanga">Minanga</option>
							<option value="Paradise(Poblacion)">Paradise(Poblacion)</option>
							<option value="Pateng">Pateng</option>
							<option value="Progressive(Poblacion)">Progressive(Poblacion)</option>
							<option value="Rebecca(Nababacalan)">Rebecca(Nababacalan)</option>
							<option value="San Jose">San Jose</option>
							<option value="Santa Clara">Santa Clara</option>
							<option value="Santa Cruz">Santa Cruz</option>
							<option value="Santa Maria">Santa Maria</option>
							<option value="Smart(Poblacion)">Smart(Poblacion)</option>
							<option value="Tapel">Tapel</option>
						</select>
					</div>
					<div class="mb-3 col-md-6">
						<label class="form-label">Street</label>
						<input type="text" class="form-control" name="street" id="street" placeholder="Enter street" required>
					</div>
					<div class="mb-3 col-md-6">
						<label class="form-label">Email</label>
						<input type="email" class="form-control" name="email" id="email" placeholder="Enter email" required>
					</div>
					<div class="mb-3 col-md-6">
						<label class="form-label">Contact Number</label>
						<input type="text" class="form-control" name="contact_number" id="contact_number"
							placeholder="Enter contact number" required>
					</div>
					<div class="mb-3 col-md-12">
						<label class="form-label">Profile Picture</label>
						<input type="file" class="form-control" name="picture" id="pictureInput" accept="image/*" required>
						<div class="mt-3 text-center">
							<img id="picturePreview" src="" alt="Preview"
								style="max-width: 150px; max-height: 150px; display: none; border-radius: 8px; border: 1px solid #ccc;" />
						</div>
					</div>
				</div>
				<div class="d-flex justify-content-between">
					<button type="button" class="btn btn-secondary" onclick="prevStep()">⬅️ Back</button>
					<button type="submit" class="btn btn-success">✅ Submit</button>
				</div>
			</div>
		</form>
	</div>

	<div class="modal fade" id="qrModal" tabindex="-1" aria-labelledby="qrModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered text-center">
			<div class="modal-content p-3">
				<div class="modal-header border-0">
					<h5 class="modal-title" id="qrModalLabel">🎉 Resident Registered</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<p>Here is their unique QR code:</p>
					<img id="qrImage" src="" style="max-width: 200px;" />
				</div>
			</div>
		</div>
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
		background-color: #ff69b4;
		color: white;
	}

	.btn-pink:hover {
		background-color: #ff4da6;
	}

	.step-title {
		color: #ff1493;
		font-weight: bold;
	}
</style>

<script>
	let currentStep = 1;

	function showStep(step) {
		document.querySelectorAll('.form-step').forEach((el, i) => {
			el.classList.remove('active');
			if (i === step - 1) el.classList.add('active');
		});
	}

	function nextStep() {
		if (currentStep < 4) {
			currentStep++;
			showStep(currentStep);
		}
	}

	function prevStep() {
		if (currentStep > 1) {
			currentStep--;
			showStep(currentStep);
		}
	}

	document.getElementById('residentForm').addEventListener('submit', function (e) {
		e.preventDefault();

		const formData = new FormData(this);

		fetch('api/resident_create.php', {
			method: 'POST',
			body: formData
		})
			.then(res => res.json())
			.then(data => {
				if (data.success === "1") {
					const residentId = data.id;
					const canvas = document.createElement("canvas");

					QRCode.toCanvas(canvas, String(residentId), async function (err) {
						const imageData = canvas.toDataURL("image/png");

						const response = await fetch('api/save_qrcode.php', {
							method: "POST",
							headers: { "Content-Type": "application/json" },
							body: JSON.stringify({ image: imageData, value: residentId })
						});

						const qrData = await response.json();
						if (qrData.success) {
							// 🪄 Show modal with QR code
							document.getElementById('qrImage').src = imageData;
							new bootstrap.Modal(document.getElementById('qrModal')).show();
						} else {
							alert("QR saving failed.");
						}
					});

					this.reset();
					currentStep = 1;
					showStep(currentStep);
				} else {
					alert("❌ Failed: " + data.error);
				}
			})
			.catch(err => {
				alert("⚠️ Server error: " + err);
			});
	});

	showStep(currentStep);

	document.getElementById("isBeneficiary").addEventListener("change", function () {
		const isYes = this.value === "Yes";
		document.getElementById("beneficiaryOptions").style.display = isYes ? "block" : "none";
	});

	document.querySelectorAll(".beneficiary-option").forEach(checkbox => {
		checkbox.addEventListener("change", () => {
			const selected = Array.from(document.querySelectorAll(".beneficiary-option:checked"))
				.map(cb => cb.value)
				.join(", ");
			document.getElementById("beneficiaryHidden").value = selected;
		});
	});

	const pictureInput = document.getElementById('pictureInput');
	const picturePreview = document.getElementById('picturePreview');

	pictureInput.addEventListener('change', function () {
		const file = this.files[0];
		if (file) {
			picturePreview.src = URL.createObjectURL(file);
			picturePreview.style.display = 'block';
		}
	});
</script>