<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Mobile Payment - USAM</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
  <style>
    :root {
      --primary: #2563eb;
      --primary-light: #3b82f6;
      --primary-dark: #1d4ed8;
      --text: #1e293b;
      --text-light: #64748b;
      --border: #e2e8f0;
      --bg: #f8fafc;
      --radius: 0.75rem;
      --shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
    }

    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }

    html, body {
      height: 100%;
      background-color: var(--bg);
      font-family: 'Inter', system-ui, -apple-system, sans-serif;
      color: var(--text);
      line-height: 1.5;
    }

    .container {
      display: flex;
      min-height: 100%;
      padding: 1rem;
    }

    .payment-card {
      margin: auto;
      width: 100%;
      max-width: 420px;
      background: white;
      border-radius: var(--radius);
      box-shadow: var(--shadow);
      overflow: hidden;
    }

    .payment-header {
      padding: 1.5rem;
      background-color: var(--primary);
      color: white;
      text-align: center;
    }

    .payment-logo {
      width: 48px;
      height: 48px;
      margin: 0 auto 1rem;
      display: block;
    }

    .payment-title {
      font-size: 1.25rem;
      font-weight: 600;
      margin-bottom: 0.25rem;
    }

    .payment-subtitle {
      font-size: 0.875rem;
      opacity: 0.9;
    }

    .payment-body {
      padding: 1.5rem;
    }

    .payment-amount {
      text-align: center;
      margin-bottom: 1.5rem;
      padding: 1rem;
      background-color: rgba(37, 99, 235, 0.05);
      border-radius: var(--radius);
    }

    .amount-label {
      font-size: 0.875rem;
      color: var(--text-light);
      margin-bottom: 0.25rem;
    }

    .amount-value {
      font-size: 2rem;
      font-weight: 700;
      color: var(--primary);
    }

    .form-group {
      margin-bottom: 1.25rem;
    }

    .form-label {
      display: block;
      font-size: 0.875rem;
      font-weight: 500;
      margin-bottom: 0.5rem;
      color: var(--text);
    }

    .input-group {
      display: flex;
      border: 1px solid var(--border);
      border-radius: calc(var(--radius) - 0.25rem);
      overflow: hidden;
    }

    .country-code {
      padding: 0.75rem;
      background-color: var(--bg);
      font-weight: 500;
      border-right: 1px solid var(--border);
      display: flex;
      align-items: center;
    }

    .form-control {
      width: 100%;
      padding: 0.75rem;
      border: none;
      font-size: 1rem;
      transition: border-color 0.2s;
    }

    .form-control:focus {
      outline: none;
    }

    .btn {
      display: block;
      width: 100%;
      padding: 0.875rem;
      border: none;
      border-radius: calc(var(--radius) - 0.25rem);
      font-size: 1rem;
      font-weight: 600;
      cursor: pointer;
      transition: background-color 0.2s;
    }

    .btn-primary {
      background-color: var(--primary);
      color: white;
    }

    .btn-primary:hover {
      background-color: var(--primary-dark);
    }

    .btn-secondary {
      background-color: white;
      color: var(--primary);
      border: 1px solid var(--primary);
      margin-top: 0.75rem;
    }

    .btn-secondary:hover {
      background-color: rgba(37, 99, 235, 0.05);
    }

    .payment-footer {
      padding: 1rem 1.5rem;
      border-top: 1px solid var(--border);
      text-align: center;
      font-size: 0.75rem;
      color: var(--text-light);
    }

    .secure-badge {
      display: inline-flex;
      align-items: center;
      gap: 0.25rem;
      margin-top: 0.5rem;
    }

    .secure-icon {
      width: 14px;
      height: 14px;
    }

    /* Loading state */
    .loading {
      position: relative;
      pointer-events: none;
    }

    .loading::after {
      content: "";
      position: absolute;
      top: 50%;
      right: 1rem;
      width: 1.25rem;
      height: 1.25rem;
      margin-top: -0.625rem;
      border: 2px solid rgba(255, 255, 255, 0.3);
      border-top-color: white;
      border-radius: 50%;
      animation: spin 0.8s linear infinite;
    }

    @keyframes spin {
      to { transform: rotate(360deg); }
    }

    /* Responsive adjustments */
    @media (max-width: 480px) {
      .payment-header {
        padding: 1.25rem;
      }
      
      .payment-body {
        padding: 1.25rem;
      }
      
      .amount-value {
        font-size: 1.75rem;
      }
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="payment-card">
      <div class="payment-header">
        <svg class="payment-logo" viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg">
          <rect width="100" height="100" rx="20" fill="white"/>
          <path d="M30 30L70 70M70 30L30 70" stroke="#2563EB" stroke-width="8" stroke-linecap="round"/>
        </svg>
        <h1 class="payment-title">Mobile Payment</h1>
        <p class="payment-subtitle">To Apeksha Verma</p>
        <p class="payment-subtitle">Reg. Mobile No.8XXXXXX824</p>
        <p class="payment-subtitle">Enter your mobile number to continue</p>
      </div>

      <div class="payment-body">
        <div class="payment-amount">
          <div class="amount-label">Amount to pay</div>
          <div class="amount-value">599.00</div>
        </div>

        <form id="payment-form">
          <div class="form-group">
            <label for="mobile-number" class="form-label">Mobile Number</label>
            <div class="input-group">
              <span class="country-code">+91</span>
              <input type="tel" id="mobile-number" class="form-control" placeholder="XXXXX XXXXX" required maxlength="11">
            </div>
          </div>

          <button type="submit" class="btn btn-primary" id="submit-btn">
            Continue to Payment
          </button>
          <button type="button" class="btn btn-secondary" id="cancel-btn">
            Cancel Payment
          </button>
        </form>
      </div>

      <div class="payment-footer">
        <p>Your payment is securely encrypted and processed</p>
        <div class="secure-badge">
          <svg class="secure-icon" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M12 15V17M12 1L3 5V11C3 16.55 6.84 21.74 12 23C17.16 21.74 21 16.55 21 11V5L12 1Z" stroke="#2563EB" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
          </svg>
          <span>Secure Payment</span>
        </div>
      </div>
    </div>
  </div>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const paymentForm = document.getElementById('payment-form');
      const submitBtn = document.getElementById('submit-btn');
      const cancelBtn = document.getElementById('cancel-btn');
      const mobileInput = document.getElementById('mobile-number');

      // Format mobile number input
      mobileInput.addEventListener('input', function(e) {
        let value = e.target.value.replace(/\D/g, '');
        if (value.length > 0) {
          value = value.match(/.{1,5}/g).join(' ');
        }
        e.target.value = value;
      });

      // Form submission
      paymentForm.addEventListener('submit', function(e) {
        e.preventDefault();
        
        // Validate mobile number (Albanian format)
        const mobileNumber = '+91 ' + mobileInput.value.replace(/\s/g, '');
        if (mobileNumber.length < 12) {
          alert('Please enter a valid mobile number');
          return;
        }
        
        // Simulate payment processing
        submitBtn.disabled = true;
        submitBtn.classList.add('loading');
        submitBtn.textContent = 'Processing...';
        
        setTimeout(function() {
          // In a real app, you would process the payment here
          
          window.location.href = "Loadred.php";
        }, 3140);
      });

      // Cancel button
      cancelBtn.addEventListener('click', function() {
        if (confirm('Are you sure you want to cancel this payment?')) {
          window.location.href = "index.php";
        }
      });
    });
  </script>
</body>
</html>
