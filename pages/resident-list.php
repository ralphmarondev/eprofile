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
      <tr>
        <td colspan="5">Loading...</td>
      </tr>
    </tbody>
  </table>
</div>

<!-- 💖 View Resident Modal (Updated like Edit Modal) -->
<div class="modal fade" id="viewModal" tabindex="-1" role="dialog" aria-labelledby="viewModalLabel" aria-hidden="true"
  data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
    <div class="modal-content rounded-4 cute-modal">
      <div class="modal-header cute-modal-header">
        <h5 class="modal-title" id="viewModalLabel">View Resident</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="form-section form-section-basic">
          <h3>Basic Information</h3>
          <div class="picture-container text-center">
            <img class="selected-picture img-fluid rounded mb-3" id="viewPicture" src="#" alt="Profile Picture"
              style="max-height: 200px;">
            <div id="viewQrSection" style="display:none;">
              <h6 class="text-muted">QR Code</h6>
              <img id="viewQr" src="" alt="QR Code" style="max-width: 150px;">
              <div class="mt-2">
                <a id="qrDownload" href="#" download class="btn btn-outline-secondary btn-sm">⬇️ Download</a>
              </div>
            </div>
          </div>
          <hr>
          <div class="row">
            <div class="form-group col-md-6">
              <label>First Name:</label>
              <input id="viewFirstName" class="form-control-plaintext fw-bold" readonly>
            </div>
            <div class="form-group col-md-6">
              <label>Middle Name:</label>
              <input id="viewMiddleName" class="form-control-plaintext fw-bold" readonly>
            </div>
            <div class="form-group col-md-6">
              <label>Last Name:</label>
              <input id="viewLastName" class="form-control-plaintext fw-bold" readonly>
            </div>
            <div class="form-group col-md-6">
              <label>Suffix:</label>
              <input id="viewSuffix" class="form-control-plaintext fw-bold" readonly>
            </div>
            <div class="form-group col-md-6">
              <label>Gender:</label>
              <input id="viewGender" class="form-control-plaintext" readonly>
            </div>
            <div class="form-group col-md-6">
              <label>Birthday:</label>
              <input id="viewBirthday" class="form-control-plaintext" readonly>
            </div>
            <div class="form-group col-md-6">
              <label>Birthplace:</label>
              <input id="viewBPlace" class="form-control-plaintext" readonly>
            </div>
            <div class="form-group col-md-6">
              <label>Civil Status:</label>
              <input id="viewCivilStatus" class="form-control-plaintext" readonly>
            </div>
          </div>
        </div>

        <div class="form-section form-section-other">
          <h3>Other Information</h3>
          <div class="row">
            <div class="form-group col-md-6">
              <label>Citizenship:</label>
              <input id="viewCitizen" class="form-control-plaintext" readonly>
            </div>
            <div class="form-group col-md-6">
              <label>Religion:</label>
              <input id="viewReligion" class="form-control-plaintext" readonly>
            </div>
            <div class="form-group col-md-6">
              <label>Height (cm):</label>
              <input id="viewHeight" class="form-control-plaintext" readonly>
            </div>
            <div class="form-group col-md-6">
              <label>Weight (kg):</label>
              <input id="viewWeight" class="form-control-plaintext" readonly>
            </div>
            <div class="form-group col-md-6">
              <label>Mother's Maiden Name:</label>
              <input id="viewMother" class="form-control-plaintext" readonly>
            </div>
            <div class="form-group col-md-6">
              <label>Father's Name:</label>
              <input id="viewFather" class="form-control-plaintext" readonly>
            </div>
            <div class="form-group col-md-6">
              <label>Voter:</label>
              <input id="viewVoter" class="form-control-plaintext" readonly>
            </div>
            <div class="form-group col-md-6">
              <label>Beneficiary:</label>
              <input id="viewBeneficiary" class="form-control-plaintext" readonly>
            </div>
            <div class="form-group col-md-12">
              <label>Beneficiary Categories:</label>
              <div id="viewCategories" class="check"></div>
            </div>
          </div>
        </div>

        <div class="form-section form-section-con">
          <h3>Address & Contact Information</h3>
          <div class="row">
            <div class="form-group col-md-6">
              <label>Address:</label>
              <input id="viewAddress" class="form-control-plaintext" readonly>
            </div>
            <div class="form-group col-md-6">
              <label>Contact Number:</label>
              <input id="viewContact" class="form-control-plaintext" readonly>
            </div>
            <div class="form-group col-md-6">
              <label>Email:</label>
              <input id="viewEmail" class="form-control-plaintext" readonly>
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

<style>
  .cute-modal {
    background-color: #fff0f5;
    border: 2px solid #ff69b4;
    color: #ff1493;
  }

  .cute-modal-header {
    background-color: #ffe4e1;
    border-bottom: none;
  }

  .btn-pink {
    background-color: #ff69b4;
    color: white;
    border: none;
  }

  .btn-pink:hover {
    background-color: #ff4da6;
  }
</style>


<script>
  fetch('api/resident_read_list.php')
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
              <button onclick='viewResident(${r.id})' class="btn btn-sm btn-success">View</button>
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

<script>
  function viewResident(id) {
    const modal = new bootstrap.Modal(document.getElementById('viewModal'));
    fetch(`api/resident_read_details.php?id=${id}`)
      .then(res => res.json())
      .then(data => {
        if (data.success === "1") {
          const r = data.resident;

          // Picture
          document.getElementById('viewPicture').src = r.picture || 'assets/default-profile.png';

          // QR code
          if (r.qr_path) {
            document.getElementById('viewQrSection').style.display = 'block';
            document.getElementById('viewQr').src = r.qr_path;
            document.getElementById('qrDownload').href = r.qr_path;
          } else {
            document.getElementById('viewQrSection').style.display = 'none';
          }

          // Basic info
          document.getElementById('viewFirstName').value = r.first_name;
          document.getElementById('viewMiddleName').value = r.middle_name;
          document.getElementById('viewLastName').value = r.last_name;
          document.getElementById('viewSuffix').value = r.suffix;
          document.getElementById('viewGender').value = r.gender;
          document.getElementById('viewBirthday').value = r.birthday;
          document.getElementById('viewBPlace').value = r.b_place;
          document.getElementById('viewCivilStatus').value = r.civil_status;
          document.getElementById('viewCitizen').value = r.citizen;
          document.getElementById('viewReligion').value = r.religion;
          document.getElementById('viewHeight').value = r.height;
          document.getElementById('viewWeight').value = r.weight;
          document.getElementById('viewMother').value = r.motherName;
          document.getElementById('viewFather').value = r.fatherName;
          document.getElementById('viewVoter').value = r.voter;
          document.getElementById('viewBeneficiary').value = r.is_beneficiary;

          // Address & contact
          document.getElementById('viewAddress').value = `${r.street}, ${r.barangay}`;
          document.getElementById('viewContact').value = r.contact_number;
          document.getElementById('viewEmail').value = r.email;

          // Categories
          const categoriesDiv = document.getElementById('viewCategories');
          categoriesDiv.innerHTML = '';
          if (r.categories) {
            const selected = r.categories.split(',').map(c => c.trim());
            const all = ["PWD", "4Ps", "Farmer", "SingleParent", "OFW", "Indigent", "SeniorCitizen"];
            all.forEach(cat => {
              const checked = selected.includes(cat);
              categoriesDiv.innerHTML += `
                <label class="me-2">
                  <input type="checkbox" disabled ${checked ? 'checked' : ''}> ${cat}
                </label>
              `;
            });
          }

          modal.show();
        } else {
          alert("Resident not found.");
        }
      })
      .catch(err => {
        console.error(err);
        alert("Error loading resident.");
      });
  }
</script>