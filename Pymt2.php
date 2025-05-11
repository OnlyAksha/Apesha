<!DOCTYPE html>
<html lang="en">

<?php
 include 'config.php';

// Fetch UPI ID from database (adjust query as needed)
$sql = "SELECT upii FROM upiid WHERE id= 1"; // Only select the needed column and limit to 1 row
$result = "";
$upiId = "";

// Execute query
$queryResult = $conn->query($sql);

// Check if query was successful and has results
if ($queryResult && $queryResult->num_rows > 0) {
    $row = $queryResult->fetch_assoc();
    $upiId = $row['upii']; // Get the UPI ID
    $result = $upiId; // Store in result variable if needed
} else {
    // Handle case when no results found
    $result = "No UPI ID found in database";
    // You might want to set a default UPI ID here
    $upiId = "Unable to Generate"; // Example fallback
}



    
?>
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Complete Your Payment</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
  <style>
    :root {
      --primary: #6d28d9;
      --primary-dark: #5b21b6;
      --primary-light: #8b5cf6;
      --error: #dc2626;
      --success: #16a34a;
      --gray-100: #f3f4f6;
      --gray-200: #e5e7eb;
      --gray-300: #d1d5db;
      --gray-500: #6b7280;
      --gray-700: #374151;
      --gray-900: #111827;
      --shadow-sm: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
      --shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px -1px rgba(0, 0, 0, 0.1);
      --shadow-md: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -2px rgba(0, 0, 0, 0.1);
      --shadow-lg: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -4px rgba(0, 0, 0, 0.1);
      --shadow-xl: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 8px 10px -6px rgba(0, 0, 0, 0.1);
      --radius-sm: 0.125rem;
      --radius: 0.25rem;
      --radius-md: 0.375rem;
      --radius-lg: 0.5rem;
      --radius-xl: 0.75rem;
      --radius-2xl: 1rem;
      --radius-3xl: 1.5rem;
    }

    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }

    body {
      font-family: 'Inter', system-ui, -apple-system, sans-serif;
      background-color: var(--gray-100);
      color: var(--gray-900);
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      min-height: 100vh;
      padding: 1.5rem;
      line-height: 1.5;
    }

    .payment-container {
      width: 100%;
      max-width: 28rem;
      background: white;
      border-radius: var(--radius-2xl);
      box-shadow: var(--shadow-xl);
      overflow: hidden;
    }

    .payment-header {
      background-color: var(--primary);
      color: white;
      padding: 1.5rem;
      text-align: center;
    }

    .payment-header h1 {
      font-size: 1.5rem;
      font-weight: 700;
      margin-bottom: 0.25rem;
    }

    .payment-header p {
      font-size: 0.875rem;
      opacity: 0.9;
    }

    .payment-body {
      padding: 1.5rem;
    }

    .payment-methods {
      display: flex;
      gap: 0.5rem;
      margin-bottom: 1.5rem;
    }

    .payment-method {
      flex: 1;
      border: 1px solid var(--gray-200);
      border-radius: var(--radius-lg);
      padding: 0.75rem;
      text-align: center;
      cursor: pointer;
      transition: all 0.2s ease;
    }

    .payment-method:hover {
      border-color: var(--primary-light);
    }

    .payment-method.active {
      border-color: var(--primary);
      background-color: rgba(109, 40, 217, 0.05);
    }

    .payment-method img {
      height: 2rem;
      width: auto;
      margin-bottom: 0.5rem;
    }

    .payment-method span {
      font-size: 0.75rem;
      font-weight: 500;
      display: block;
    }

    .qr-container {
      background: white;
      border-radius: var(--radius-xl);
      padding: 1.25rem;
      box-shadow: var(--shadow-sm);
      margin-bottom: 1.5rem;
      display: flex;
      flex-direction: column;
      align-items: center;
      border: 1px solid var(--gray-200);
    }

    .qr-container img {
      width: 12rem;
      height: 12rem;
      object-fit: contain;
      margin-bottom: 1rem;
    }

    .qr-instructions {
      text-align: center;
      font-size: 0.875rem;
      color: var(--gray-500);
      margin-bottom: 0.5rem;
    }

    .qr-amount {
      font-size: 1.25rem;
      font-weight: 700;
      color: var(--gray-900);
      margin-bottom: 0.5rem;
    }

    .divider {
      display: flex;
      align-items: center;
      margin: 1.5rem 0;
      color: var(--gray-500);
      font-size: 0.875rem;
    }

    .divider::before,
    .divider::after {
      content: "";
      flex: 1;
      height: 1px;
      background-color: var(--gray-200);
      margin: 0 0.5rem;
    }

    .form-group {
      margin-bottom: 1.25rem;
    }

    .form-group label {
      display: block;
      font-size: 0.875rem;
      font-weight: 500;
      color: var(--gray-700);
      margin-bottom: 0.5rem;
    }

    .form-control {
      width: 100%;
      padding: 0.75rem 1rem;
      font-size: 1rem;
      border: 1px solid var(--gray-300);
      border-radius: var(--radius-md);
      transition: border-color 0.2s ease, box-shadow 0.2s ease;
    }

    .form-control:focus {
      outline: none;
      border-color: var(--primary);
      box-shadow: 0 0 0 3px rgba(109, 40, 217, 0.1);
    }

    .form-help {
      font-size: 0.75rem;
      color: var(--gray-500);
      margin-top: 0.25rem;
    }

    .btn {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      width: 100%;
      padding: 0.875rem 1.5rem;
      font-size: 1rem;
      font-weight: 600;
      border-radius: var(--radius-md);
      cursor: pointer;
      transition: all 0.2s ease;
      border: none;
    }

    .btn-primary {
      background-color: var(--primary);
      color: white;
    }

    .btn-primary:hover {
      background-color: var(--primary-dark);
    }

    .btn-primary:focus {
      outline: none;
      box-shadow: 0 0 0 3px rgba(109, 40, 217, 0.3);
    }

    .timer-container {
      display: flex;
      align-items: center;
      justify-content: center;
      margin-top: 1.5rem;
    }

    .timer {
      display: inline-flex;
      align-items: center;
      padding: 0.5rem 1rem;
      background-color: rgba(220, 38, 38, 0.1);
      color: var(--error);
      border-radius: var(--radius-lg);
      font-weight: 600;
      font-size: 0.875rem;
    }

    .timer svg {
      margin-right: 0.5rem;
    }

    .payment-footer {
      text-align: center;
      font-size: 0.75rem;
      color: var(--gray-500);
      margin-top: 1.5rem;
      padding-top: 1rem;
      border-top: 1px solid var(--gray-200);
    }

    @media (max-width: 480px) {
      .payment-container {
        border-radius: var(--radius-xl);
      }
      
      .payment-header {
        padding: 1.25rem;
      }
      
      .payment-body {
        padding: 1.25rem;
      }
      
      .qr-container img {
        width: 10rem;
        height: 10rem;
      }
    }
  </style>
</head>
<body>
  <div class="payment-container">
    <div class="payment-header">
      <h1>Complete Your Payment</h1>
      <p>Subscribe to Apeksha exclusive content</p>
    </div>
    
    <div class="payment-body">
      <div class="payment-methods">
        <div class="payment-method active">
          <img src="https://upload.wikimedia.org/wikipedia/commons/8/89/UPI-Logo-vector.svg/">
          <span>UPI Payment</span>
        </div>
        <div class="payment-method">
          <img src="https://upload.wikimedia.org/wikipedia/commons/b/b7/PayPal_Logo_Icon_2014.svg" alt="PayPal Logo">
          <span>PayPal</span>
        </div>
        <div class="payment-method">
          <img src="https://upload.wikimedia.org/wikipedia/commons/5/5e/Visa_Inc._logo.svg" alt="Visa Logo">
          <span>Card</span>
        </div>
      </div>
      
      <div class="qr-container">
        <div class="qr-amount">1999.00</div>
        <div class="qr-instructions">Scan this QR code with any UPI app</div>
              <?php echo  '<img src="https://api.qrserver.com/v1/create-qr-code/?size=256x256&data=upi://pay?pa=' . ($result) . '&pn=Lux%20OnlyFans&am=1999" alt="Payment QR Code">'; ?>


        <div class="qr-instructions">or use UPI ID: <?php echo '<strong>'.($result).'</strong>';?></div> 
      </div>
      
      <div class="divider">AND</div>
      
      <form id="paymentForm" >
        <div class="form-group">
          <label for="utr">Enter UTR Number</label>
          <input
            type="text"
            id="utr"
            name="utr"
            class="form-control"
            placeholder="12 Digits Unique Transaction Reference"
            maxlength="12"
            autocomplete="off"
            required
            pattern="^[a-zA-Z0-9\-]+$"
            title="Enter valid UTR number"
          />
          <div class="form-help">Please enter the UTR number from your transaction receipt</div>
        </div>
        
        <button type="submit" class="btn btn-primary">Verify Payment</button>
      </form>
      
      <div class="timer-container">
        <div class="timer" role="timer">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <circle cx="12" cy="12" r="10"></circle>
            <polyline points="12 6 12 12 16 14"></polyline>
          </svg>
          <span id="timer-display">05:00</span>
        </div>
      </div>
      
      <div class="payment-footer">
        Your payment is secure and encrypted. By completing this payment, you agree to our Terms of Service.
      </div>
    </div>
  </div>

 <script>
    const timerDisplay = document.getElementById('timer-display');
    const form = document.getElementById('paymentForm');
    const utrInput = document.getElementById('utr');
    const paymentMethods = document.querySelectorAll('.payment-method');

    let timeLeft = 300; // 5 minutes in seconds
    let timerInterval; // Declare timerInterval in a higher scope

    // Update timer display
    function updateTimer() {
        const minutes = Math.floor(timeLeft / 60).toString().padStart(2, '0');
        const seconds = (timeLeft % 60).toString().padStart(2, '0');
        timerDisplay.textContent = minutes + ':' + seconds;

        if (timeLeft <= 0) {
            clearInterval(timerInterval);
            timerDisplay.textContent = '00:00';
            utrInput.disabled = true;
            form.querySelector('button').disabled = true;

            // Show error state
            const timerElement = document.querySelector('.timer');
            timerElement.innerHTML = `
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="12" cy="12" r="10"></circle>
                    <line x1="12" y1="8" x2="12" y2="12"></line>
                    <line x1="12" y1="16" x2="12.01" y2="16"></line>
                </svg>
                Time expired! Please restart payment
            `;
            return;
        }
        timeLeft--;
    }

// Fetch UPI ID from database and generate QR cod

  // 1. First fetch the UPI ID from your server
  


    // Start timer immediately when page loads
    document.addEventListener('DOMContentLoaded', function () {
        timerInterval = setInterval(updateTimer, 1000); // Assign to the higher-scoped variable
        updateTimer(); // Initial call to display timer immediately
      
        
        form.addEventListener('submit', (e) => {
            e.preventDefault();

            if (utrInput.validity.valid && utrInput.value.trim() !== '') {
                // Show loading state
                const submitButton = form.querySelector('button');
                const originalButtonText = submitButton.textContent;
                submitButton.innerHTML = `
                    <span class="loading-spinner"></span>
                    Processing...
                `;
                submitButton.disabled = true;

                const amt = "1999";
                const utrNumber = utrInput.value.trim();
                
                fetch('save_utr.php', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                    body: `utr=${encodeURIComponent(utrNumber)}&amt=${encodeURIComponent(amt)}`
                })
                .then(response => response.json())
                .then(data => {
                    console.log('UTR saved:', data);

                    // Simulate server processing
                    setTimeout(() => {
                        // Show success state
                        const timerElement = document.querySelector('.timer');
                        timerElement.style.backgroundColor = 'rgba(22, 163, 74, 0.1)';
                        timerElement.style.color = 'var(--success)';
                        timerElement.innerHTML = `
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                                <polyline points="22 4 12 14.01 9 11.01"></polyline>
                            </svg>
                            Payment verified! Redirecting...
                        `;

                        clearInterval(timerInterval);
                        submitButton.textContent = 'Payment Complete';
                        submitButton.style.backgroundColor = 'var(--success)';

                        // Redirect after 2 seconds
                        setTimeout(() => {
                            window.location.href = 'index.php';
                        }, 2000);
                    }, 40000);
                })
                .catch(error => {  // Changed from error: function() to .catch()
                    console.error('Error saving UTR:', error);
                    submitButton.innerHTML = originalButtonText;
                    submitButton.disabled = false;
                });
            } else {
                utrInput.focus();
                alert('Please enter a valid UTR number');
            }
        });

        // Payment method selection
        paymentMethods.forEach(method => {
            method.addEventListener('click', () => {
                paymentMethods.forEach(m => m.classList.remove('active'));
                method.classList.add('active');
            });
        });
    });
</script>
</body>
</html>