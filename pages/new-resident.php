<div class="container">
	<div class="card shadow p-4 mb-4">
		<h3 class="text-center step-title mb-4">➕ New Resident</h3>

		<form id="residentForm">
			<!-- Step 1: Basic Info -->
			<div class="form-step active" id="step1">
				<div class="row">
					<div class="mb-3 col-md-6">
						<label class="form-label">First Name</label>
						<input type="text" class="form-control" name="first_name" required>
					</div>
					<div class="mb-3 col-md-6">
						<label class="form-label">Middle Name</label>
						<input type="text" class="form-control" name="middle_name">
					</div>
					<div class="mb-3 col-md-6">
						<label class="form-label">Last Name</label>
						<input type="text" class="form-control" name="last_name" required>
					</div>
					<div class="mb-3 col-md-6">
						<label class="form-label">Suffix</label>
						<input type="text" class="form-control" name="suffix">
					</div>
					<div class="mb-3 col-md-6">
						<label class="form-label">Gender</label>
						<select class="form-select" name="gender" required>
							<option value="">Choose...</option>
							<option>Male</option>
							<option>Female</option>
							<option>Other</option>
						</select>
					</div>
					<div class="mb-3 col-md-6">
						<label class="form-label">Civil Status</label>
						<select class="form-select" name="civil_status">
							<option value="">Choose...</option>
							<option>Single</option>
							<option>Married</option>
							<option>Widowed</option>
							<option>Separated</option>
						</select>
					</div>
					<div class="mb-3 col-md-6">
						<label class="form-label">Citizenship</label>
						<input type="text" class="form-control" name="citizen">
					</div>
					<div class="mb-3 col-md-6">
						<label class="form-label">Religion</label>
						<input type="text" class="form-control" name="religion">
					</div>
				</div>
				<div class="text-end">
					<button type="button" class="btn btn-pink" onclick="nextStep()">Next ➡️</button>
				</div>
			</div>

			<!-- Step 2 -->
			<div class="form-step" id="step2">
				<div class="row">
					<div class="mb-3 col-md-6">
						<label class="form-label">Birthday</label>
						<input type="date" class="form-control" name="birthday">
					</div>
					<div class="mb-3 col-md-6">
						<label class="form-label">Birth Place</label>
						<input type="text" class="form-control" name="b_place">
					</div>
					<div class="mb-3 col-md-6">
						<label class="form-label">Height</label>
						<input type="text" class="form-control" name="height">
					</div>
					<div class="mb-3 col-md-6">
						<label class="form-label">Weight</label>
						<input type="text" class="form-control" name="weight">
					</div>
					<div class="mb-3 col-md-6">
						<label class="form-label">Mother's Name</label>
						<input type="text" class="form-control" name="motherName">
					</div>
					<div class="mb-3 col-md-6">
						<label class="form-label">Father's Name</label>
						<input type="text" class="form-control" name="fatherName">
					</div>
					<div class="mb-3 col-md-6">
						<label class="form-label">Voter?</label>
						<select class="form-select" name="voter">
							<option value="">Choose...</option>
							<option>Yes</option>
							<option>No</option>
						</select>
					</div>
					<div class="mb-3 col-md-6">
						<label class="form-label">4Ps/Beneficiary?</label>
						<select class="form-select" name="beneficiary">
							<option value="">Choose...</option>
							<option>Yes</option>
							<option>No</option>
						</select>
					</div>
				</div>
				<div class="d-flex justify-content-between">
					<button type="button" class="btn btn-secondary" onclick="prevStep()">⬅️ Back</button>
					<button type="button" class="btn btn-pink" onclick="nextStep()">Next ➡️</button>
				</div>
			</div>

			<!-- Step 3 -->
			<div class="form-step" id="step3">
				<div class="row">
					<div class="mb-3 col-md-6">
						<label class="form-label">Email</label>
						<input type="email" class="form-control" name="email">
					</div>
					<div class="mb-3 col-md-6">
						<label class="form-label">Contact Number</label>
						<input type="text" class="form-control" name="contact_number">
					</div>
					<div class="mb-3 col-md-6">
						<label class="form-label">Street</label>
						<input type="text" class="form-control" name="street">
					</div>
					<div class="mb-3 col-md-6">
						<label class="form-label">Barangay</label>
						<input type="text" class="form-control" name="barangay">
					</div>
					<div class="mb-3 col-md-12">
						<label class="form-label">Resident Category</label>
						<textarea class="form-control" name="categories" rows="2"></textarea>
					</div>
					<div class="mb-3 col-md-12">
						<label class="form-label">Picture URL (for now)</label>
						<input type="text" class="form-control" name="picture">
					</div>
				</div>
				<div class="d-flex justify-content-between">
					<button type="button" class="btn btn-secondary" onclick="prevStep()">⬅️ Back</button>
					<button type="submit" class="btn btn-success">✅ Submit</button>
				</div>
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
		if (currentStep < 3) {
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

		fetch('api/create_resident.php', {
			method: 'POST',
			body: formData
		})
			.then(res => res.json())
			.then(data => {
				if (data.success === "1") {
					alert("🎉 Resident added successfully!");
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
</script>