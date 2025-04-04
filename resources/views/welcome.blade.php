<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>URL Shortener</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #3B82F6;
            --primary-dark: #2563EB;
            --success: #16A34A;
            --success-light: #D1FAE5;
            --gray-100: #F3F4F6;
            --gray-900: #111827;
        }

        body {
            font-family: 'Inter', sans-serif;
            line-height: 1.7;
        }

        .hero-section {
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
            min-height: 100vh;
            padding: 2rem 0;
        }

        .form-control {
            border: 2px solid rgba(255, 255, 255, 0.2);
            background: rgba(255, 255, 255, 0.05);
            color: white;
            padding: 1.25rem;
            font-size: 1rem;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            background: white;
            color: var(--gray-900);
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.3);
        }

        .form-control::placeholder {
            color: rgba(255, 255, 255, 0.7);
        }

        .btn-primary {
            padding: 1rem 2rem;
            font-weight: 600;
            transition: transform 0.2s;
            border-radius: 0.5rem;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
        }

        .card {
            border: none;
            border-radius: 1rem;
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(10px);
        }

        .alert-success {
            border-radius: 0.75rem;
            background: var(--success-light);
            color: var(--success);
            border: 1px solid rgba(22, 163, 74, 0.3);
        }

        .alert-success .btn-close {
            color: var(--success);
            opacity: 0.7;
        }

        .alert-success .btn-close:hover {
            opacity: 1;
        }

        .copy-btn {
            transition: all 0.3s ease;
            border-radius: 0.5rem;
        }

        .copy-btn:hover {
            transform: scale(1.05);
        }

        .success-input {
            background: white;
            color: var(--gray-900);
            font-family: monospace;
        }

        .success-copy-btn {
            background: var(--success);
            border-color: var(--success);
        }

        .success-copy-btn:hover {
            background: #15803d;
        }

        .illustration {
            max-width: 500px;
            margin: 0 auto;
        }

        @media (max-width: 992px) {
            .hero-section {
                padding: 4rem 0;
                text-align: center;
            }

            .illustration {
                display: none;
            }
        }
    </style>
</head>
<body class="bg-gray-100">
<!-- Hero Section -->
<section class="hero-section">
    <div class="container">
        <div class="row align-items-center gy-5">
            <div class="col-lg-6 order-2 order-lg-1">
                <h1 class="display-5 text-white fw-bold mb-4">
                    Shorten your links<br>with confidence
                </h1>
                <p class="text-white-75 lead mb-5">
                    Free, fast, and reliable URL shortening service
                </p>

                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('shorten') }}" method="POST">
                            @csrf
                            <div class="input-group input-group-lg mb-3">
                                <input
                                    type="text"
                                    name="original_url"
                                    class="form-control rounded-start"
                                    placeholder="Paste your long URL here..."
                                    required
                                >
                                <button
                                    type="submit"
                                    class="btn btn-primary rounded-end"
                                >
                                    Shorten <i class="bi bi-arrow-right-short ms-2"></i>
                                </button>
                            </div>
                        </form>

                        @if(session('short_url'))
                            <div class="alert alert-success mb-0" role="alert">
                                <div class="d-flex align-items-center">
                                    <div class="me-3">
                                        <i class="bi bi-check-circle-fill fs-3 text-success"></i>
                                    </div>
                                    <div class="flex-grow-1">
                                        <strong class="text-success">Success!</strong>
                                        <span class="text-dark">Your short URL:</span>
                                        <div class="input-group mt-3">
                                            <input
                                                type="text"
                                                readonly
                                                value="{{ session('short_url') }}"
                                                class="form-control rounded-pill success-input"
                                            >
                                            <button
                                                type="button"
                                                class="btn btn-success rounded-pill ms-2 copy-btn success-copy-btn"
                                                onclick="copyToClipboard('{{ session('short_url') }}')"
                                            >
                                                <i class="bi bi-clipboard me-2"></i> Copy
                                            </button>
                                        </div>
                                    </div>
                                    <button type="button" class="btn-close ms-3" data-bs-dismiss="alert"></button>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <div class="col-lg-6 order-1 order-lg-2">
                <img src="https://cdn.jsdelivr.net/gh/Loopple/loopple-public-assets@main/riva-dashboard-tailwind/img/illustrations/undraw_url_shortener.svg"
                     alt="URL Shortener Illustration"
                     class="img-fluid illustration">
            </div>
        </div>
    </div>
</section>

<!-- Footer -->
<footer class="bg-white py-4 mt-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                <p class="mb-0 text-muted">&copy; 2024 URL Shortener. All rights reserved.</p>
            </div>
            <div class="col-md-6 text-center text-md-end">
                <a href="#" class="text-muted me-3">Privacy Policy</a>
                <a href="#" class="text-muted">Terms of Service</a>
            </div>
        </div>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    function copyToClipboard(text) {
        navigator.clipboard.writeText(text).then(() => {
            const btn = document.querySelector('.copy-btn');
            btn.innerHTML = '<i class="bi bi-check2-all me-2"></i> Copied!';
            btn.classList.add('btn-success');

            setTimeout(() => {
                btn.innerHTML = '<i class="bi bi-clipboard me-2"></i> Copy';
                btn.classList.remove('btn-success');
            }, 2000);
        });
    }
</script>
</body>
</html>
