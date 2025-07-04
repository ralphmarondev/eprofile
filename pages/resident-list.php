<h2>Resident List</h2>
<p>List of all registered residents will appear below.</p>

<div class="table-responsive">
  <table class="table table-bordered table-hover align-middle">
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

<!-- View Resident Modal -->
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
          <div class="row picture-container text-center align-items-start">
            <div class="col-md-6 mb-3">
              <img class="selected-picture img-fluid rounded" id="viewPicture" src="#" alt="Profile Picture"
                style="height: 200px; width: 200px; object-fit: cover;">
            </div>
            <div class="col-md-6 mb-3" id="viewQrSection" style="display:none;">
              <img id="viewQr" src="" alt="QR Code" class="img-fluid mb-2" style="height: 200px; width: 200px;">
              <div>
                <a id="qrDownload" href="#" download class="btn btn-outline-secondary btn-sm">⬇️ Download</a>
              </div>
            </div>
          </div>

          <hr>
          <div class="row">
            <div class="mb-3 col-md-6">
              <label class="form-label">First Name</label>
              <input type="text" class="form-control" name="first_name" id="first_name" placeholder="Enter first name"
                readonly>
            </div>
            <div class="mb-3 col-md-6">
              <label class="form-label">Middle Name</label>
              <input type="text" class="form-control" name="middle_name" id="middle_name"
                placeholder="Enter middel name" readonly>
            </div>
            <div class="mb-3 col-md-6">
              <label class="form-label">Last Name</label>
              <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Enter last name"
                readonly>
            </div>
            <div class="mb-3 col-md-6">
              <label class="form-label">Suffix</label>
              <input type="text" class="form-control" name="suffix" id="suffix" placeholder="Enter suffix" readonly>
            </div>
            <div class="mb-3 col-md-6">
              <label class="form-label">Birthday</label>
              <input type="date" class="form-control" name="birthday" id="birthday" placeholder="Enter birthday"
                readonly>
            </div>
            <div class="mb-3 col-md-6">
              <label class="form-label">Birth Place</label>
              <input type="text" class="form-control" name="b_place" id="b_place" placeholder="Enter birthplace"
                readonly>
            </div>
            <div class="mb-3 col-md-6">
              <label class="form-label">Gender</label>
              <input type="text" class="form-control" name="gender" id="gender" placeholder="Enter gender" readonly>
            </div>
            <div class="mb-3 col-md-6">
              <label class="form-label">Civil Status</label>
              <input type="text" class="form-control" name="civil_status" id="civil_status"
                placeholder="Enter civil status" readonly>
            </div>
          </div>
        </div>

        <div class="form-section form-section-other">
          <h3>Other Information</h3>
          <div class="row">
            <div class="mb-3 col-md-6">
              <label class="form-label">Citizenship</label>
              <input type="text" class="form-control" name="citizen" id="citizen" placeholder="Enter citizen" readonly>
            </div>
            <div class="mb-3 col-md-6">
              <label class="form-label">Religion</label>
              <input type="text" class="form-control" name="religion" id="religion" placeholder="Enter religion"
                readonly>
            </div>
            <div class="mb-3 col-md-6">
              <label class="form-label">Height (cm)</label>
              <input type="text" class="form-control" name="height" id="height" placeholder="Enter height" readonly>
            </div>
            <div class="mb-3 col-md-6">
              <label class="form-label">Weight (kg)</label>
              <input type="text" class="form-control" name="weight" id="weight" placeholder="Enter weight" readonly>
            </div>
            <div class="mb-3 col-md-6">
              <label class="form-label">Mother's Name</label>
              <input type="text" class="form-control" name="mother_name" id="mother_name"
                placeholder="Enter mother's name" readonly>
            </div>
            <div class="mb-3 col-md-6">
              <label class="form-label">Father's Name</label>
              <input type="text" class="form-control" name="father_name" id="father_name"
                placeholder="Enter father's name" readonly>
            </div>
            <div class="mb-3 form-group col-md-6">
              <label>Voter:</label>
              <input class="form-control" name="voter" id="voter" placeholder="Yes/No" readonly>
            </div>
            <div class="mb-3 form-group col-md-6">
              <label>Beneficiary:</label>
              <input class="form-control" name="beneficiary" id="beneficiary" placeholder="Yes/No" readonly>
            </div>
            <div class="mb-3 form-group col-md-12">
              <label>Beneficiary Categories:</label>
              <div id="categories" class="check"></div>
            </div>
          </div>
        </div>

        <div class="form-section form-section-con">
          <h3>Address & Contact Information</h3>
          <div class="row">
            <div class="mb-3 form-group col-md-6">
              <label>Barangay:</label>
              <input class="form-control" name="barangay" id="barangay" placeholder="Enter barangay" readonly>
            </div>
            <div class="mb-3 form-group col-md-6">
              <label>Street:</label>
              <input class="form-control" name="street" id="street" placeholder="Enter street" readonly>
            </div>
            <div class="mb-3 form-group col-md-6">
              <label>Contact Number:</label>
              <input class="form-control" name="contact" id="contact" placeholder="Enter contact number" readonly>
            </div>
            <div class="mb-3 form-group col-md-6">
              <label>Email:</label>
              <input class="form-control" name="email" id="email" placeholder="Enter email" readonly>
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
          document.getElementById('first_name').value = r.first_name;
          document.getElementById('middle_name').value = r.middle_name;
          document.getElementById('last_name').value = r.last_name;
          document.getElementById('suffix').value = r.suffix;
          document.getElementById('gender').value = r.gender;
          document.getElementById('birthday').value = r.birthday;
          document.getElementById('b_place').value = r.b_place;
          document.getElementById('civil_status').value = r.civil_status;
          document.getElementById('citizen').value = r.citizen;
          document.getElementById('religion').value = r.religion;
          document.getElementById('height').value = r.height;
          document.getElementById('weight').value = r.weight;
          document.getElementById('mother_name').value = r.motherName;
          document.getElementById('father_name').value = r.fatherName;
          document.getElementById('voter').value = r.voter;
          document.getElementById('beneficiary').value = r.beneficiary;

          // Address & contact
          document.getElementById('barangay').value = r.barangay;
          document.getElementById('street').value = r.street;
          document.getElementById('contact').value = r.contact_number;
          document.getElementById('email').value = r.email;

          // Categories
          const categoriesDiv = document.getElementById('categories');
          categoriesDiv.innerHTML = `
            <div class="row">
              <div class="col-md-4">
                <div class="form-check">
                  <input class="form-check-input beneficiary-option" type="checkbox" value="PWD" id="catPWD" disabled>
                  <label class="form-check-label" for="catPWD">PWD</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input beneficiary-option" type="checkbox" value="4Ps" id="cat4Ps" disabled>
                  <label class="form-check-label" for="cat4Ps">4Ps</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input beneficiary-option" type="checkbox" value="Farmer" id="catFarmer" disabled>
                  <label class="form-check-label" for="catFarmer">Farmer</label>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-check">
                  <input class="form-check-input beneficiary-option" type="checkbox" value="SingleParent" id="catSingle" disabled>
                  <label class="form-check-label" for="catSingle">Single Parent</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input beneficiary-option" type="checkbox" value="OFW" id="catOFW" disabled>
                  <label class="form-check-label" for="catOFW">OFW</label>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-check">
                  <input class="form-check-input beneficiary-option" type="checkbox" value="Indigent" id="catIndigent" disabled>
                  <label class="form-check-label" for="catIndigent">Indigent</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input beneficiary-option" type="checkbox" value="SeniorCitizen" id="catSenior" disabled>
                  <label class="form-check-label" for="catSenior">Senior Citizen</label>
                </div>
              </div>
            </div>
          `;

          if (r.categories) {
            const selected = r.categories.split(',').map(c => c.trim());
            selected.forEach(cat => {
              const checkbox = categoriesDiv.querySelector(`input[value="${cat}"]`);
              if (checkbox) checkbox.checked = true;
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