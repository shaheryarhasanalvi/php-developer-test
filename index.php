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
