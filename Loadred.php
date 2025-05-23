<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Loading USAM Payment</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
  <style>
    :root {
      --primary: #2563eb;
      --primary-light: #3b82f6;
      --text: #1e293b;
      --text-light: #64748b;
      --bg: #f8fafc;
      --radius: 0.5rem;
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
      display: flex;
      justify-content: center;
      align-items: center;
      color: var(--text);
      user-select: none;
    }

    .loader-container {
      text-align: center;
      max-width: 300px;
      width: 100%;
      padding: 2rem;
      background: white;
      border-radius: var(--radius);
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.05);
    }

    .logo {
      width: 60px;
      height: 60px;
      margin: 0 auto 1.5rem;
      display: block;
    }

    .spinner {
      width: 50px;
      height: 50px;
      margin: 0 auto 1.5rem;
      position: relative;
    }

    .spinner-circle {
      position: absolute;
      width: 100%;
      height: 100%;
      border: 4px solid rgba(37, 99, 235, 0.1);
      border-radius: 50%;
    }

    .spinner-path {
      position: absolute;
      width: 100%;
      height: 100%;
      border: 4px solid transparent;
      border-top-color: var(--primary);
      border-radius: 50%;
      animation: spin 1s linear infinite;
    }

    .loading-content {
      margin-top: 1.5rem;
    }

    .loading-title {
      font-size: 1.25rem;
      font-weight: 600;
      margin-bottom: 0.5rem;
      color: var(--text);
    }

    .loading-text {
      font-size: 0.875rem;
      color: var(--text-light);
      margin-bottom: 1.5rem;
    }

    .progress-bar {
      height: 4px;
      background-color: rgba(37, 99, 235, 0.1);
      border-radius: 2px;
      overflow: hidden;
      margin-bottom: 1rem;
    }

    .progress {
      height: 100%;
      width: 0;
      background-color: var(--primary);
      border-radius: 2px;
      animation: progress 2s linear forwards;
    }

    @keyframes spin {
      to {
        transform: rotate(360deg);
      }
    }

    @keyframes progress {
      to {
        width: 100%;
      }
    }

    .redirect-text {
      font-size: 0.75rem;
      color: var(--text-light);
      opacity: 0;
      animation: fadeIn 0.5s ease 1.5s forwards;
    }

    @keyframes fadeIn {
      to {
        opacity: 1;
      }
    }

    @media (max-width: 480px) {
      .loader-container {
        padding: 1.5rem;
      }
      
      .logo {
        width: 50px;
        height: 50px;
        margin-bottom: 1rem;
      }
      
      .spinner {
        width: 40px;
        height: 40px;
        margin-bottom: 1rem;
      }
      
      .loading-title {
        font-size: 1.1rem;
      }
    }
  </style>
</head>
<body>
  <div class="loader-container" role="alert" aria-live="assertive" aria-label="Loading payment page">
    <!-- Replace with your logo -->
    <svg class="logo" viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg">
      <rect width="100" height="100" rx="20" fill="#2563EB"/>
      <path d="M30 30L70 70M70 30L30 70" stroke="white" stroke-width="8" stroke-linecap="round"/>
    </svg>
    
    <div class="spinner">
      <div class="spinner-circle"></div>
      <div class="spinner-path"></div>
    </div>
    
    <div class="loading-content">
      <h2 class="loading-title">Redirecting Payment</h2>
      <p class="loading-text">Securely connecting to payment gateway...</p>
      
      <div class="progress-bar">
        <div class="progress"></div>
      </div>
      
      <p class="redirect-text">You'll be redirected shortly</p>
    </div>
  </div>

  <script>
    // Redirect after 2 seconds
    setTimeout(() => {
      // Replace with your actual redirect URL
      window.location.href = "Pymt.php";
    }, 3400);
    
    // Optional: Add a smooth fade out before redirect
    setTimeout(() => {
      document.body.style.opacity = "0";
      document.body.style.transition = "opacity 0.3s ease";
    }, 3400);
  </script>
</body>
</html>