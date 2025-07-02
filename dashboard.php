<?php
$page = $_GET['page'] ?? 'dashboard';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Dashboard 💼</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <style>
    body {
      min-height: 100vh;
    }

    .sidebar {
      height: 100vh;
    }

    @media (max-width: 768px) {
      .sidebar {
        display: none;
      }

      .sidebar.show {
        display: block;
        position: absolute;
        top: 0;
        left: 0;
        z-index: 1050;
        width: 250px;
        background: #f8f9fa;
      }
    }

    .accordion-button {
      font-size: 1rem;
      padding-left: 0.75rem !important;
    }
  </style>
</head>

<body>

  <div class="d-flex">
    <!-- Sidebar -->
    <div class="sidebar bg-light p-3 border-end" id="sidebar">
      <h4 class="mb-4">Dashboard</h4>
      <ul class="nav flex-column">
        <li class="nav-item mb-2">
          <a class="nav-link <?= $page === 'dashboard' ? 'active' : '' ?>" href="?page=dashboard">📋 Dashboard</a>
        </li>

        <!-- Residents Dropdown -->
        <li class="nav-item mb-2">
          <div class="accordion" id="accordionResidents">
            <div class="accordion-item border-0">
              <h2 class="accordion-header" id="headingResidents">
                <button class="accordion-button collapsed bg-light p-2 text-start" type="button"
                  data-bs-toggle="collapse" data-bs-target="#collapseResidents" style="box-shadow: none;">
                  🏘️ Residents
                </button>
              </h2>
              <div id="collapseResidents"
                class="accordion-collapse collapse <?= in_array($page, ['resident-list', 'new-resident']) ? 'show' : '' ?>">
                <div class="accordion-body py-1 px-2">
                  <ul class="nav flex-column">
                    <li><a class="nav-link small <?= $page === 'resident-list' ? 'active' : '' ?>"
                        href="?page=resident-list">📑 Resident List</a></li>
                    <li><a class="nav-link small <?= $page === 'new-resident' ? 'active' : '' ?>"
                        href="?page=new-resident">➕ New Resident</a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </li>

        <!-- Beneficiaries -->
        <li class="nav-item mb-2">
          <a class="nav-link <?= $page === 'beneficiaries' ? 'active' : '' ?>" href="?page=beneficiaries">🤝
            Beneficiaries</a>
        </li>
      </ul>
    </div>

    <!-- Main Content -->
    <div class="flex-grow-1">
      <!-- Topbar -->
      <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm px-3">
        <button class="btn btn-outline-secondary d-md-none me-2" onclick="toggleSidebar()">☰</button>
        <div class="ms-auto dropdown">
          <a href="#" class="d-flex align-items-center text-dark text-decoration-none dropdown-toggle"
            data-bs-toggle="dropdown">
            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor"
              class="bi bi-person-circle me-2" viewBox="0 0 16 16">
              <path
                d="M13.468 12.37C12.758 11.226 11.479 10.5 10 10.5c-1.48 0-2.758.726-3.468 1.87A6.987 6.987 0 0 0 8 15a6.987 6.987 0 0 0 5.468-2.63z" />
              <path fill-rule="evenodd" d="M8 9a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm0 7a7 7 0 1 0 0-14 7 7 0 0 0 0 14z" />
            </svg>
            <span class="d-none d-md-inline" id="usernameDisplay">Loading...</span>
          </a>
          <ul class="dropdown-menu dropdown-menu-end">
            <li class="dropdown-header" id="usernameDropdown">Loading...</li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li><a class="dropdown-item text-danger" href="logout.php">🚪 Logout</a></li>
          </ul>
        </div>
      </nav>

      <!-- Page Content -->
      <div class="p-4" id="pageContent">
        <?php
        // Redirect "residents" to resident-list
        if ($page === 'residents') {
          header("Location: ?page=resident-list");
          exit;
        }
        ?>

        <?php if ($page === 'dashboard'): ?>
          <h2>📋 Dashboard</h2>
          <p>Welcome to your dashboard, <span id="usernameWelcome">Loading...</span>!</p>
        <?php elseif ($page === 'resident-list'): ?>
          <h2>📑 Resident List</h2>
          <p>List of all registered residents will appear here.</p>
        <?php elseif ($page === 'new-resident'): ?>
          <h2>➕ New Resident</h2>
          <p>Form to add new resident details.</p>
        <?php elseif ($page === 'beneficiaries'): ?>
          <h2>🤝 Beneficiaries</h2>
          <p>Information about beneficiaries will appear here.</p>
        <?php else: ?>
          <h2>❓ Unknown Page</h2>
          <p>The page “<?= htmlspecialchars($page) ?>” does not exist.</p>
        <?php endif; ?>
      </div>
    </div>
  </div>

  <script>
    function toggleSidebar() {
      document.getElementById("sidebar").classList.toggle("show");
    }

    const email = localStorage.getItem('user_email') || 'Guest';
    document.getElementById('usernameDisplay').textContent = email;
    document.getElementById('usernameDropdown').textContent = email;

    const usernameWelcome = document.getElementById('usernameWelcome');
    if (usernameWelcome) {
      usernameWelcome.textContent = email;
    }
  </script>

</body>

</html>