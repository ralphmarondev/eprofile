<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>📷 Scan QR Code</title>
  <script src="https://unpkg.com/html5-qrcode"></script>
  <style>
    body {
      font-family: sans-serif;
      text-align: center;
      padding: 30px;
    }
    #reader {
      width: 300px;
      margin: 0 auto;
    }
    #result {
      margin-top: 20px;
      font-size: 1.3em;
      color: green;
    }
  </style>
</head>
<body>

  <h2>📷 Scan QR Code</h2>
  <div id="reader"></div>
  <div id="result">Waiting for scan...</div>
  <button onclick="restartScanner()">🔁 Scan Again</button>

  <script>
    let html5QrCode = new Html5Qrcode("reader");

    function startScanner() {
      html5QrCode.start(
        { facingMode: "environment" }, // Rear camera
        {
          fps: 10,
          qrbox: 250
        },
        (decodedText, decodedResult) => {
          document.getElementById("result").innerHTML = "✅ Scanned Value: <strong>" + decodedText + "</strong>";
          html5QrCode.stop();
        },
        (errorMessage) => {
          // Silent scan failures
        }
      ).catch(err => {
        document.getElementById("result").innerText = "🚫 Camera Error: " + err;
      });
    }

    function restartScanner() {
      document.getElementById("result").innerText = "Waiting for scan...";
      html5QrCode.clear().then(() => {
        startScanner();
      });
    }

    // Start on load
    startScanner();
  </script>

</body>
</html>
