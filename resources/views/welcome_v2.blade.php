<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>URL Shortener Pro</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
        .brand-gradient {
            background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%);
        }
        .url-card {
            transition: transform 0.2s;
        }
        .url-card:hover {
            transform: translateY(-5px);
        }
    </style>
</head>
<body>
<!-- Navbar -->
<nav class="navbar navbar-expand-lg brand-gradient shadow-sm">
    <div class="container">
        <a class="navbar-brand text-white fw-bold" href="#">
            <img src="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' fill='white' viewBox='0 0 24 24'><path d='M12 0c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm0 22c-1.024 0-2.04-.155-3.025-.445l-1.779-1.779c-1.882 1.206-4.223 1.935-6.726 1.935-5.523 0-10-4.477-10-10s4.477-10 10-10 10 4.477 10 10c0 2.458-1.06 4.766-2.852 6.524l-2.955-2.955c-.19-.19-.445-.298-.72-.298h-5.5c-.552 0-1 .448-1 1s.448 1 1 1h5.5l2.955 2.955c1.356 1.356 3.26 2.148 5.271 2.148 5.523 0 10-4.477 10-10s-4.477-10-10-10z'/></svg>" alt="">
            URL Shortener
        </a>
    </div>
</nav>

<!-- Hero Section -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <div class="card url-card shadow border-0">
                    <div class="card-body p-4">
                        <h2 class="text-center mb-4 fw-bold">Shorten Your Links</h2>
                        <form action="{{ route('shorten') }}" method="POST">
                            @csrf
                            <div class="input-group mb-3">
                                <input
                                    type="text"
                                    name="original_url"
                                    class="form-control form-control-lg rounded-pill"
                                    placeholder="Paste your long URL here..."
                                    required
                                >
                                <button
                                    type="submit"
                                    class="btn btn-primary btn-lg rounded-pill px-4"
                                >
                                    Shorten
                                </button>
                            </div>
                        </form>

                        @if(session('short_url'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <div class="d-flex align-items-center">
                                    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                                    <div>
                                        <strong>Success!</strong> Your short URL:
                                        <div class="input-group mt-2">
                                            <input
                                                type="text"
                                                readonly
                                                value="{{ session('short_url') }}"
                                                class="form-short-url form-control"
                                            >
                                            <button
                                                type="button"
                                                class="btn btn-outline-success copy-btn"
                                                onclick="copyToClipboard('{{ session('short_url') }}')"
                                            >
                                                Copy
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Features Section -->
<section class="py-5">
    <div class="container">
        <div class="row text-center">
            <div class="col-md-4 mb-4">
                <div class="feature-icon bg-primary bg-opacity-10 text-primary rounded-circle mb-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="currentColor" class="bi bi-lightning-charge" viewBox="0 0 16 16">
                        <path d="M11.251.068a.5.5 0 0 1 .227.58L9.677 6.5H13a.5.5 0 0 1 .364.843l-8 8.5a.5.5 0 0 1-.842-.49L6.323 9.5H3a.5.5 0 0 1-.364-.843l8-8.5a.5.5 0 0 1 .615-.09z"/>
                    </svg>
                </div>
                <h3 class="h5 fw-bold">Instant Redirects</h3>
                <p class="text-muted">Lightning-fast URL redirection</p>
            </div>
            <div class="col-md-4 mb-4">
                <div class="feature-icon bg-success bg-opacity-10 text-success rounded-circle mb-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="currentColor" class="bi bi-graph-up" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M0 0h1v15h15v1H0V0zm10 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-1 0V4.9l-3.613 4.417a.5.5 0 0 1-.74.037L10.03 8.27a.5.5 0 0 1-.037-.738L10 3.5zm-2 0l-3.613 4.417a.5.5 0 0 1-.74.037L3.03 8.27a.5.5 0 0 1-.037-.738L3 3.5h4a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-1 0V4.9L6.387 8.683a.5.5 0 0 1-.74-.037L5.03 8.27a.5.5 0 0 1-.037-.738L5 3.5H2a.5.5 0 0 1-.5-.5v-4A.5.5 0 0 1 2 0h4a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-1 0V4.9L8.387 8.683a.5.5 0 0 1-.74-.037L7.03 8.27a.5.5 0 0 1-.037-.738L7 3.5h-4a.5.5 0 0 1-.5-.5v-4A.5.5 0 0 1 3 0h4a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-1 0V4.9L10 3.5z"/>
                    </svg>
                </div>
                <h3 class="h5 fw-bold">Analytics</h3>
                <p class="text-muted">Track link performance</p>
            </div>
            <div class="col-md-4 mb-4">
                <div class="feature-icon bg-warning bg-opacity-10 text-warning rounded-circle mb-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="currentColor" class="bi bi-globe" viewBox="0 0 16 16">
                        <path d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-6.5a6.5 6.5 0 1 0 0 13 6.5 6.5 0 0 0 0-13zM6.5 8a1.5 1.5 0 1 1 3 0 1.5 1.5 0 0 1-3 0z"/>
                    </svg>
                </div>
                <h3 class="h5 fw-bold">Global Reach</h3>
                <p class="text-muted">Optimized for worldwide access</p>
            </div>
        </div>
    </div>
</section>

<!-- Footer -->
<footer class="bg-dark text-white py-4">
    <div class="container text-center">
        <p class="mb-0">&copy; 2024 URL Shortener Pro. All rights reserved.</p>
    </div>
</footer>

<!-- Bootstrap JS + Custom Scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    function copyToClipboard(text) {
        navigator.clipboard.writeText(text)
            .then(() => {
                const originalText = document.querySelector('.copy-btn').innerText;
                document.querySelector('.copy-btn').innerText = 'Copied!';
                setTimeout(() => {
                    document.querySelector('.copy-btn').innerText = originalText;
                }, 2000);
            });
    }
</script>
</body>
</html>
