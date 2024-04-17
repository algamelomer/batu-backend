<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 - Page Not Found</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
        /* Customize styles here */
        body {
            background-color: #f8f9fa;
        }
        .error-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            flex-direction: column;
        }
        .error-heading {
            font-size: 5rem;
            font-weight: bold;
            color: #258589;
        }
        .error-message {
            font-size: 1.5rem;
            color: #6bb949;
        }
        .error-image {
            max-width: 300px;
            margin-bottom: 20px;
        }

        .btn-primary {
            background-color: #258589;
            border-color: #258589;
        }
        .btn-primary:hover {
            background-color: #1c6a6e;
            border-color: #1c6a6e;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="error-container text-center">
            <img src="https://ziad-abaza.github.io/firs-event/assets/images/logo.png" alt="404 Error Image" class="error-image">
            <h1 class="error-heading">404</h1>
            <p class="error-message">Page not found</p>
            <a href="/" class="btn btn-primary">Go to Home</a>
        </div>
    </div>
</body>
</html>
