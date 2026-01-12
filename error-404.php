<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="UTF-8">
  <title>404 – Page Not Found | LoveGamingHub</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="robots" content="noindex, follow">    
  <link rel="stylesheet" href="css/header.css">
  <link rel="stylesheet" href="css/general.css">
  <link rel="stylesheet" href="css/static.css">
  <link rel="stylesheet" href="css/footer.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:ital,opsz,wght@0,18..144,300..900;1,18..144,300..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
  <link rel="icon" href="/favicon.ico">

  <style>
    .container-error-404{
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      text-align: center;
      background: linear-gradient(135deg, #6a11cb, #2575fc);
      color: #fff;

    }

    .error-container {
      max-width: 520px;
      padding: 40px 24px;
      background: rgba(0, 0, 0, 0.25);
      border-radius: 20px;
      box-shadow: 0 30px 60px rgba(0, 0, 0, 0.35);
    }

    .error-code {
      font-size: clamp(4rem, 10vw, 7rem);
      font-weight: 900;
      line-height: 1;
      margin-bottom: 10px;
      color: #fff;
    }

    .error-title {
      font-size: 1.6rem;
      font-weight: 700;
      margin-bottom: 12px;
      color: #fff;
    }

    .error-text {
      font-size: 1rem;
      opacity: 0.95;
      margin-bottom: 26px;
      color: #fff;
    }

    .error-actions {
      display: flex;
      gap: 14px;
      justify-content: center;
      flex-wrap: wrap;
    }

    .btn {
      padding: 12px 22px;
      border-radius: 999px;
      border: none;
      cursor: pointer;
      font-weight: 700;
      text-decoration: none;
      font-size: 14px;
      transition: transform 0.2s ease, box-shadow 0.2s ease;
    }

    .btn-primary {
      background: #fff;
      color: #2575fc;
    }

    .btn-secondary {
      background: rgba(255, 255, 255, 0.15);
      color: #fff;
      border: 1px solid rgba(255, 255, 255, 0.3);
    }

    .btn:hover {
      transform: translateY(-3px);
      box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3);
    }

    @media (max-width: 480px) {
      .error-container {
        padding: 32px 18px;
      }
    }
  </style>
</head>
<body>
    <?php include 'includes/header.php'; ?>
    <div class="container-error-404">
        <main class="error-container">
            <div class="error-code">404</div>
            <div class="error-title">Page Not Found</div>
            <p class="error-text">
            Oops! The page you’re looking for doesn’t exist or has been moved.
            Let’s get you back to some epic gaming guides 🎮
            </p>

            <div class="error-actions">
            <a href="/" class="btn btn-primary">Go to Homepage</a>
            </div>
        </main>
    </div>
    <?php include 'includes/footer.php'; ?>
    <script src="js/header.js"></script>

</body>
</html>
