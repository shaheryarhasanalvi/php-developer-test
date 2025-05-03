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

    form.addEventListener('submit', async function (e) {
        e.preventDefault();
  
        submitBtn.disabled = true;
        loader.style.display = 'block';
  
        const data = {
          fullname: fullnameInput.value.trim(),
          email: emailField.value.trim()
        };
  
        try {
          const response = await fetch(window.location.href, {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify(data)
          });
  
          const result = await response.json();
  
          if (result.success) {
            loader.style.display = 'none';
            successMsg.classList.remove('d-none');
            form.reset();
          } else {
            alert("Error: " + (result.response || result.error));
          }
        } catch (err) {
          alert("Failed to submit: " + err.message);
        } finally {
          loader.style.display = 'none';
          submitBtn.disabled = false;
        }
      });