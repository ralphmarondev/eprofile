<div class="card shadow p-4 mb-4" style="min-height: 500px;">
  <div class="container">

    <h3 class="step-title">Resident List</h3>

    <!-- Filters -->
    <div class="row mb-2">
      <div class="col-md-6 mb-2">
        <input type="text" class="form-control" id="searchInput" placeholder="Search by name...">
      </div>
      <div class="col-md-6 mb-2">
        <select class="form-select" id="barangayFilter">
          <option value="All">Filter by barangay (Default All)</option>
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
    </div>

    <div class="table-responsive">
      <table class="table table-bordered table-hover align-middle">
        <thead class="table-light">
          <tr>
            <th style="width: 5%;">#</th>
            <th style="width: 29%;">Full Name</th>
            <th style="width: 23%;">Email</th>
            <th style="width: 23%;">Barangay</th>
            <th style="width: 20%;" class="text-center">Actions</th>
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
    <div class="modal fade" id="viewModal" tabindex="-1" role="dialog" aria-labelledby="viewModalLabel"
      aria-hidden="true" data-backdrop="static" data-keyboard="false">
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
                  <input type="text" class="form-control" name="first_name" id="first_name"
                    placeholder="Enter first name" readonly>
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
                  <input type="text" class="form-control" name="citizen" id="citizen" placeholder="Enter citizen"
                    readonly>
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

    <!-- Delete Resident Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel"
      aria-hidden="true" data-backdrop="static" data-keyboard="false">
      <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
        <div class="modal-content rounded-4 cute-modal">
          <div class="modal-header cute-modal-header">
            <h5 class="modal-title" id="viewModalLabel">Delete Resident</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="form-section form-section-basic">
              <h5 class="text-muted">Are you sure you want to delete this resident? This action cannot be undone.</h5>
              <hr>
              <div class="row">
                <div class="mb-3 col-md-6">
                  <label class="form-label">First Name</label>
                  <input type="text" class="form-control" name="delete_first_name" id="delete_first_name"
                    placeholder="Enter first name" readonly>
                </div>
                <div class="mb-3 col-md-6">
                  <label class="form-label">Middle Name</label>
                  <input type="text" class="form-control" name="delete_middle_name" id="delete_middle_name"
                    placeholder="Enter middle name" readonly>
                </div>
                <div class="mb-3 col-md-6">
                  <label class="form-label">Last Name</label>
                  <input type="text" class="form-control" name="delete_last_name" id="delete_last_name"
                    placeholder="Enter last name" readonly>
                </div>
                <div class="mb-3 col-md-6">
                  <label class="form-label">Suffix</label>
                  <input type="text" class="form-control" name="delete_suffix" id="delete_suffix"
                    placeholder="Enter suffix" readonly>
                </div>
                <div class="mb-3 form-group col-md-6">
                  <label>Barangay:</label>
                  <input class="form-control" name="delete_barangay" id="delete_barangay" placeholder="Enter barangay"
                    readonly>
                </div>
                <div class="mb-3 form-group col-md-6">
                  <label>Street:</label>
                  <input class="form-control" name="delete_street" id="delete_street" placeholder="Enter street"
                    readonly>
                </div>
                <div class="mb-3 form-group col-md-6">
                  <label>Contact Number:</label>
                  <input class="form-control" name="delete_contact" id="delete_contact"
                    placeholder="Enter contact number" readonly>
                </div>
                <div class="mb-3 form-group col-md-6">
                  <label>Email:</label>
                  <input class="form-control" name="delete_email" id="delete_email" placeholder="Enter email" readonly>
                </div>
              </div>
            </div>
          </div>

          <div class="modal-footer border-0">
            <button type="button" class="btn btn-light-gray" data-bs-dismiss="modal">Cancel</button>
            <button type="button" class="btn btn-pink" onclick="confirmDelete()">Delete</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Success Modal -->
    <div class="modal fade" id="successModal" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content rounded-4 cute-modal">
          <div class="modal-header cute-modal-header">
            <h5 class="modal-title">Yay! 🎉</h5>
          </div>
          <div class="modal-body">
            You're logged in successfully!
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-pink" id="goToDashboard">Continue</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Error Modal -->
    <div class="modal fade" id="errorModal" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content rounded-4 cute-modal">
          <div class="modal-header cute-modal-header">
            <h5 class="modal-title">Oops! 😢</h5>
          </div>
          <div class="modal-body" id="errorMessage">
            <!-- error message will be injected -->
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-pink" data-bs-dismiss="modal">Try Again</button>
          </div>
        </div>
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

  .step-title {
    color: #ff1493;
    font-weight: bold;
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
            <td>${r.email}</td>
            <td>${r.barangay}</td>
            <td class="text-center">
              <button onclick='viewResident(${r.id})' class="btn btn-sm btn-success me-1">
                <i class="bi bi-eye"></i>
              </button>
              <a href="home.php?page=update-resident&id=${r.id}" class="btn btn-sm btn-primary me-1" title="Update">
                <i class="bi bi-pencil-square"></i>
              </a>
              <button onclick="deleteResident(${r.id})" class="btn btn-sm btn-danger">
                <i class="bi bi-trash"></i>
              </button>
            </td>
          `;
          tbody.appendChild(tr);
        });
      } else {
        tbody.innerHTML = `<tr><td colspan="5" class="text-muted text-center">No residents found.</td></tr>`;
      }
    })
    .catch(err => {
      console.error(err);
      document.getElementById('residentTableBody').innerHTML =
        `<tr><td colspan="5" class="text-danger text-center">Error loading data.</td></tr>`;
    });

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

  let deleteResidentId = null;
  const successModal = new bootstrap.Modal(document.getElementById('successModal'));
  const errorModal = new bootstrap.Modal(document.getElementById('errorModal'));

  function deleteResident(id) {
    deleteResidentId = id;
    const modal = new bootstrap.Modal(document.getElementById('deleteModal'));
    fetch(`api/resident_read_details.php?id=${id}`)
      .then(res => res.json())
      .then(data => {
        if (data.success === "1") {
          const r = data.resident;

          // Basic info
          document.getElementById('delete_first_name').value = r.first_name;
          document.getElementById('delete_middle_name').value = r.middle_name;
          document.getElementById('delete_last_name').value = r.last_name;
          document.getElementById('delete_suffix').value = r.suffix;

          // Address & contact
          document.getElementById('delete_barangay').value = r.barangay;
          document.getElementById('delete_street').value = r.street;
          document.getElementById('delete_contact').value = r.contact_number;
          document.getElementById('delete_email').value = r.email;

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

  function confirmDelete() {
    if (!deleteResidentId) {
      console.log('Resident id is emtpy.');
      return;
    }

    fetch('api/resident_delete.php', {
      method: 'POST',
      headers: { 'Content-Type': 'application/json' },
      body: JSON.stringify({ id: deleteResidentId })
    })
      .then(res => res.json())
      .then(data => {
        if (data.success === "1") {
          document.querySelector('#successModal .modal-body').textContent = "Resident deleted successfully!";
          successModal.show();
          bootstrap.Modal.getInstance(document.getElementById('deleteModal')).hide();

          document.getElementById('goToDashboard').onclick = () => location.reload();
        } else {
          document.getElementById('errorMessage').textContent = data.message || "Delete failed.";
          errorModal.show();
        }
      })
      .catch(err => {
        console.error(err);
        document.getElementById('errorMessage').textContent = "Something went wrong while deleting.";
        errorModal.show();
      });
  }
</script>

<script>
  const searchInput = document.getElementById('searchInput');
  const barangayFilter = document.getElementById('barangayFilter');

  searchInput.addEventListener('input', fetchFilteredResidents);
  barangayFilter.addEventListener('change', fetchFilteredResidents);

  function fetchFilteredResidents() {
    const searchTerm = searchInput.value.trim();
    const barangay = barangayFilter.value;

    const body = {
      name: searchTerm,
      barangay: barangay === 'All' ? '' : barangay
    };

    fetch('api/resident_search.php', {
      method: 'POST',
      headers: { 'Content-Type': 'application/json' },
      body: JSON.stringify(body)
    })
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
              <td>${r.email}</td>
              <td>${r.barangay}</td>
              <td class="text-center">
                <button onclick='viewResident(${r.id})' class="btn btn-sm btn-success me-1">
                  <i class="bi bi-eye"></i>
                </button>
                <a href="home.php?page=update-resident&id=${r.id}" class="btn btn-sm btn-primary me-1" title="Update">
                  <i class="bi bi-pencil-square"></i>
                </a>
                <button onclick="deleteResident(${r.id})" class="btn btn-sm btn-danger">
                  <i class="bi bi-trash"></i>
                </button>
              </td>
            `;
            tbody.appendChild(tr);
          });
        } else {
          tbody.innerHTML = `<tr><td colspan="5" class="text-muted text-center">No residents found.</td></tr>`;
        }
      })
      .catch(err => {
        console.error(err);
        document.getElementById('residentTableBody').innerHTML =
          `<tr><td colspan="5" class="text-danger text-center">Error loading data.</td></tr>`;
      });
  }

  // Call once initially to load all residents
  fetchFilteredResidents();
</script>