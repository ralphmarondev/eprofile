<?php
// Handle POST (image saving)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents("php://input"), true);

    if (!isset($data['image'], $data['value'])) {
        http_response_code(400);
        echo "Missing data.";
        exit;
    }

    $imageData = explode(',', $data['image'])[1];
    $imageData = base64_decode($imageData);
    $value = (int)$data['value'];

    $dir = "qrcodes/";
    if (!is_dir($dir)) {
        mkdir($dir, 0777, true);
    }

    $filename = $dir . "qr_" . $value . "_" . time() . ".png";
    file_put_contents($filename, $imageData);

    echo "✅ QR code saved as <code>$filename</code>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Generate & Save QR Code (PHP + JS)</title>
  <script src="https://cdn.jsdelivr.net/npm/qrcode@1.5.1/build/qrcode.min.js"></script>
  <style>
    body { font-family: sans-serif; text-align: center; padding: 30px; }
    canvas { margin-top: 20px; }
    button { padding: 10px 20px; font-size: 16px; }
  </style>
</head>
<body>

  <h2>🎲 Generate & Save QR Code (1–4)</h2>
  <button onclick="generateAndSave()">Generate QR Code</button>
  <p id="output"></p>
  <canvas id="canvas"></canvas>

  <script>
    async function generateAndSave() {
      const number = Math.floor(Math.random() * 4) + 1;
      document.getElementById("output").innerText = "Generated Number: " + number;

      const canvas = document.getElementById("canvas");
      await QRCode.toCanvas(canvas, String(number));

      const imageData = canvas.toDataURL("image/png");

      const res = await fetch("", {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({
          image: imageData,
          value: number
        })
      });

      const text = await res.text();
      document.getElementById("output").innerHTML += "<br>" + text;
    }
  </script>

</body>
</html>
