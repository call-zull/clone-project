<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 - Page Not Found</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light d-flex align-items-center" style="height: 100vh;">
    <div class="container text-center">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h1 class="display-1 fw-bold text-danger">404</h1>
                <p class="fs-3"><span class="text-danger">Oops!</span> Page not found.</p>
                <p class="lead">The page you’re looking for doesn’t exist.</p>
                <a href="{{ url('/') }}" class="btn btn-primary">Go Back Home</a>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
