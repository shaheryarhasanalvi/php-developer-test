// Add your JS logic here

const emailField = document.getElementById('email');
    const fullnameInput = document.getElementById('fullname');
    const submitBtn = document.getElementById('submitBtn');
    const form = document.getElementById('webhookForm');
    const loader = document.getElementById('loader');
    const successMsg = document.getElementById('successMsg');

    // Extract email from URL
    const urlParams = new URLSearchParams(window.location.search);
    const email = urlParams.get('email');
    if (email) emailField.value = email;

    // Enable button only when at least 2 words are entered
    fullnameInput.addEventListener('input', () => {
      const words = fullnameInput.value.trim().split(/\s+/);
      submitBtn.disabled = words.length < 2;
    });