<?php
// Handle POST submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Read raw POST data
    $input = json_decode(file_get_contents('php://input'), true);

    // Basic validation
    if (!isset($input['fullname'], $input['email'])) {
        echo json_encode(['success' => false, 'error' => 'Invalid input']);
        exit;
    }

    // Create payload with current date
    $data = [
        'fullname' => $input['fullname'],
        'email' => $input['email'],
        'timestamp' => date('Y-m-d')
    ];

    // Send to webhook
    $ch = curl_init('https://hooks.bushwickdigital.com/webhook/d49038e3-6365-4519-ad4f-d03784b3c121');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
    curl_setopt($ch, CURLOPT_USERPWD, "devtest:devtest");
    curl_setopt($ch, CURLOPT_POST, true);
    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    if ($httpCode >= 200 && $httpCode < 300) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'response' => $response]);
    }
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>PHP Developer Test</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="style.css">
</head>
<body>

  <!-- Form will go here -->

  <div class="container d-flex justify-content-center align-items-center centered-form">
    <div class="card p-4 shadow" style="width: 100%; max-width: 400px;">
      <h4 class="mb-3 text-center">Submit Your Name</h4>
      <form id="webhookForm">
        <div class="mb-3">
          <label for="fullname" class="form-label">Full Name</label>
          <input type="text" class="form-control" id="fullname" name="fullname" required>
          <div class="form-text">Enter at least two words.</div>
        </div>
        <input type="hidden" id="email" name="email" value="">
        <button type="submit" class="btn btn-primary w-100" id="submitBtn" disabled>Submit</button>
        <div class="text-center mt-3" id="loader" style="display: none;">Submitting...</div>
        <div class="alert alert-success mt-3 d-none" id="successMsg">Thank you for submitting!</div>
      </form>
    </div>
  </div>

  <script src="script.js"></script>
</body>
</html>
