<?php
$page = $_GET['page'] ?? 'dashboard';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>EProfile</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="assets/img/logo.png" type="image/x-icon">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <link rel="stylesheet" href="assets/css/root.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/qrcode@1.5.1/build/qrcode.min.js"></script>
  <style>
    body {
      min-height: 100vh;
    }

    .sidebar {
      height: 100vh;
      width: 250px;
      flex-shrink: 0;
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

    .step-title {
      color: var(--primary-text);
      font-weight: bold;
    }

    .nav-link,
    .accordion-button {
      color: var(--primary-text) !important;
    }

    .nav-link.active,
    .accordion-button:not(.collapsed) {
      color: var(--primary-border) !important;
      font-weight: bold;
    }

    .nav-link:hover,
    .accordion-button:hover {
      color: var(--primary-btn-hover) !important;
    }

    .dropdown-menu .dropdown-item:hover {
      background-color: #ffe4f0;
      color: var(--primary-btn-hover);
    }
  </style>
</head>

<body>

  <div class="d-flex">
    <!-- Sidebar -->
    <div class="sidebar bg-light p-3 border-end" id="sidebar">
      <div class="text-center">
        <img src="assets/img/logo.png" alt="Logo" class="img-fluid rounded-circle mb-2"
          style="height: 100px; width: 100px; object-fit: cover;">
        <h5 class="step-title">Gonzaga, Cagayan</h5>
      </div>
      <hr class="mb-3">
      <ul class="nav flex-column">
        <li class="nav-item mb-2">
          <a class="nav-link <?= $page === 'dashboard' ? 'active' : '' ?>" href="?page=dashboard">Dashboard</a>
        </li>

        <!-- Residents Dropdown -->
        <li class="nav-item mb-2 ms-1">
          <div class="accordion" id="accordionResidents">
            <div class="accordion-item border-0">
              <h2 class="accordion-header" id="headingResidents">
                <button class="accordion-button collapsed bg-light text-start" type="button" data-bs-toggle="collapse"
                  data-bs-target="#collapseResidents" style="box-shadow: none;">
                  Residents
                </button>
              </h2>
              <div id="collapseResidents"
                class="accordion-collapse collapse <?= in_array($page, ['resident-list', 'new-resident']) ? 'show' : '' ?>">
                <div class="accordion-body py-1 px-2">
                  <ul class="nav flex-column">
                    <li><a class="nav-link small <?= $page === 'resident-list' ? 'active' : '' ?>"
                        href="?page=resident-list">Resident List</a></li>
                    <li><a class="nav-link small <?= $page === 'new-resident' ? 'active' : '' ?>"
                        href="?page=new-resident">New Resident</a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </li>

        <!-- Beneficiaries -->
        <li class="nav-item mb-2">
          <a class="nav-link <?= $page === 'beneficiaries' ? 'active' : '' ?>"
            href="?page=beneficiaries">Beneficiaries</a>
        </li>

        <!-- Administrator Dropdown -->
        <li class="nav-item mb-2 ms-1">
          <div class="accordion" id="accordionAdmins">
            <div class="accordion-item border-0">
              <h2 class="accordion-header" id="headingAdmins">
                <button class="accordion-button collapsed bg-light text-start" type="button" data-bs-toggle="collapse"
                  data-bs-target="#collapseAdmins" style="box-shadow: none;">
                  Administrators
                </button>
              </h2>
              <div id="collapseAdmins"
                class="accordion-collapse collapse <?= in_array($page, ['administrator-list', 'new-administrator']) ? 'show' : '' ?>">
                <div class="accordion-body py-1 px-2">
                  <ul class="nav flex-column">
                    <li><a class="nav-link small <?= $page === 'administrator-list' ? 'active' : '' ?>"
                        href="?page=administrator-list">Administrator List</a></li>
                    <li><a class="nav-link small <?= $page === 'new-administrator' ? 'active' : '' ?>"
                        href="?page=new-administrator">New Administrator</a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
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
            <li><a class="dropdown-item text-danger" href="index.php">Logout</a></li>
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

        if ($page === 'administrators') {
          header("Location: ?page=administrator-list");
          exit;
        }

        // Define safe/allowed pages
        $allowedPages = ['dashboard', 'resident-list', 'new-resident', 'update-resident', 'beneficiaries', 'administrator-list', 'new-administrator'];

        // Default to 404 if not allowed
        $pageFile = in_array($page, $allowedPages)
          ? "pages/$page.php"
          : "pages/404.php";

        // Inject the page
        include $pageFile;
        ?>
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