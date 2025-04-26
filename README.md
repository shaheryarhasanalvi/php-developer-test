# PHP Developer Test

### Instructions:
1. Fork this repository to your own GitHub account.
2. Complete the tasks described below.
3. Commit your changes with clear commit messages.
4. Share the link to your forked repository once done.

---

## Task 1: Form and Webhook Integration

- Create a form that:
  - Accepts **email** from the query string (`?email=example@domain.com`).
  - Contains a **single input field** for **Full Name** (First and Last name combined).
    - Validate on the client side that at least two words are entered.
  - Has a **Submit** button.

- On form submission:
  - Send a **POST request** to the following webhook:

    ```
    https://hooks.bushwickdigital.com/webhook/d49038e3-6365-4519-ad4f-d03784b3c121
    ```

  - Body should be JSON formatted:

    ```json
    {
      "fullname": "Ben White",
      "email": "dev@bushwickdigital.com",
      "timestamp": "2029-06-01"
    }
    ```

  - Include **Basic Authentication**:
    - Username: `devtest`
    - Password: `devtest`

  - Generate the timestamp dynamically (current date in `YYYY-MM-DD` format).

- After successful submission:
  - Show a **thank you** message.

---

## Task 2: Button Behavior and Loading Indicator

- Disable the **Submit** button by default.
- Enable the button only after:
  - Full Name field contains two words.
- On clicking **Submit**:
  - Show a **loading indicator** (spinner or simple text like "Submitting...").
  - Hide the loading indicator after submission is complete.

---

## Task 3: Form Styling
- Use Boostrap to style the form
- Make the form center of screen horizontally and vertically
## Rules:
- Focus on clean, readable, and organized code.

---