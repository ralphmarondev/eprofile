<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>📷 Scan QR Code</title>
  <script src="https://unpkg.com/html5-qrcode"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #fff0f5;
      font-family: 'Segoe UI', sans-serif;
    }
    .scanner-container {
      max-width: 600px;
      margin: 40px auto;
      background: #ffffff;
      padding: 30px;
      border: 3px solid #ff69b4;
      border-radius: 20px;
      box-shadow: 0 0 10px rgba(255, 105, 180, 0.2);
    }
    h2 {
      color: #ff1493;
      font-weight: bold;
      margin-bottom: 20px;
    }
    #reader {
      width: 100%;
      margin-bottom: 20px;
    }
    #result {
      font-size: 1.2em;
      margin-bottom: 20px;
      color: green;
    }
    .btn-pink {
      background-color: #ff69b4;
      color: white;
      border: none;
    }
    .btn-pink:hover {
      background-color: #ff4da6;
    }
    .resident-info {
      text-align: left;
      margin-top: 20px;
      display: none;
    }
    .resident-info h4 {
      color: #ff1493;
    }
    .resident-info .form-control[readonly] {
      background-color: #fdf2f8;
    }
    .camera-warning {
      color: red;
      display: none;
      font-weight: bold;
    }
  </style>
</head>
<body>
  <div class="scanner-container">
    <h2 class="text-center">📷 Scan QR Code</h2>
    <div id="reader"></div>
    <div id="cameraWarning" class="text-center camera-warning">🚫 Camera access is not supported or allowed in this browser. Please try another browser or check your permissions.</div>
    <div id="result" class="text-center">Waiting for scan...</div>
    <div class="text-center">
      <button onclick="restartScanner()" class="btn btn-pink">🔁 Scan Again</button>
    </div>

    <div class="resident-info" id="residentInfo">
      <h4>👤 Resident Details</h4>
      <div class="row">
        <div class="col-md-6 mb-3">
          <label>Full Name</label>
          <input type="text" class="form-control" id="fullName" readonly>
        </div>
        <div class="col-md-6 mb-3">
          <label>Email</label>
          <input type="email" class="form-control" id="email" readonly>
        </div>
        <div class="col-md-6 mb-3">
          <label>Gender</label>
          <input type="text" class="form-control" id="gender" readonly>
        </div>
        <div class="col-md-6 mb-3">
          <label>Birthday</label>
          <input type="date" class="form-control" id="birthday" readonly>
        </div>
        <div class="col-md-6 mb-3">
          <label>Birthplace</label>
          <input type="text" class="form-control" id="b_place" readonly>
        </div>
        <div class="col-md-6 mb-3">
          <label>Civil Status</label>
          <input type="text" class="form-control" id="civil_status" readonly>
        </div>
        <div class="col-md-6 mb-3">
          <label>Contact Number</label>
          <input type="text" class="form-control" id="contact" readonly>
        </div>
        <div class="col-md-6 mb-3">
          <label>Barangay</label>
          <input type="text" class="form-control" id="barangay" readonly>
        </div>
      </div>
    </div>
  </div>

  <script>
    const resultElem = document.getElementById("result");
    const warningElem = document.getElementById("cameraWarning");

    let html5QrCode;
    try {
      html5QrCode = new Html5Qrcode("reader");
    } catch (e) {
      resultElem.style.display = 'none';
      warningElem.style.display = 'block';
    }

    function startScanner() {
      if (!html5QrCode) return;

      Html5Qrcode.getCameras().then(devices => {
        if (devices.length === 0) throw new Error("No camera found");

        html5QrCode.start(
          { facingMode: "environment" },
          {
            fps: 10,
            qrbox: 250
          },
          (decodedText, decodedResult) => {
            document.getElementById("result").innerHTML = "✅ Scanned Value: <strong>" + decodedText + "</strong>";
            html5QrCode.stop();

            fetch(`api/resident_read_details.php?id=${decodedText}`)
              .then(res => res.json())
              .then(data => {
                if (data.success === "1") {
                  const r = data.resident;
                  document.getElementById('residentInfo').style.display = 'block';
                  document.getElementById('fullName').value = `${r.first_name} ${r.middle_name} ${r.last_name} ${r.suffix}`.trim();
                  document.getElementById('email').value = r.email;
                  document.getElementById('gender').value = r.gender;
                  document.getElementById('birthday').value = r.birthday;
                  document.getElementById('b_place').value = r.b_place;
                  document.getElementById('civil_status').value = r.civil_status;
                  document.getElementById('contact').value = r.contact_number;
                  document.getElementById('barangay').value = r.barangay;
                } else {
                  document.getElementById("result").innerText = "🚫 Resident not found.";
                }
              })
              .catch(err => {
                document.getElementById("result").innerText = "🚫 Error fetching resident.";
                console.error(err);
              });
          },
          (errorMessage) => {
            // silent scan error
          }
        ).catch(err => {
          resultElem.style.display = 'none';
          warningElem.style.display = 'block';
        });
      }).catch(err => {
        resultElem.style.display = 'none';
        warningElem.style.display = 'block';
      });
    }

    function restartScanner() {
      if (!html5QrCode) return;

      document.getElementById("result").innerText = "Waiting for scan...";
      document.getElementById("residentInfo").style.display = "none";
      html5QrCode.clear().then(() => {
        startScanner();
      });
    }

    startScanner();
  </script>
</body>
</html>
