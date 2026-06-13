<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - Sree Chemicals</title>
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- FontAwesome 6 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    
    <!-- Custom Style CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    
    <style>
        body {
            background: linear-gradient(135deg, var(--primary-color) 0%, #1e293b 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5 col-lg-4">
            
            <div class="text-center mb-4">
                <i class="fa-solid fa-droplet text-teal fs-1 mb-2" style="color: #0d9488;"></i>
                <h4 class="text-white font-outfit fw-800">Sree Chemicals Dashboard</h4>
                <p class="text-white-50 small">Authorize management credentials</p>
            </div>

            <div class="glass-card p-4 text-white" style="border: 1px solid rgba(255,255,255,0.15);">
                <form action="{{ route('admin.login.submit') }}" method="POST">
                    @csrf
                    
                    <div class="mb-3">
                        <label class="form-label small fw-500">Corporate Email</label>
                        <div class="input-group">
                            <span class="input-group-text bg-transparent border-end-0 text-white-50"><i class="fa-regular fa-envelope"></i></span>
                            <input type="email" name="email" class="form-control bg-transparent text-white border-start-0 @error('email') is-invalid @enderror" placeholder="Director@sreechemicals.com" value="{{ old('email') }}" required autofocus>
                            @error('email')
                                <div class="invalid-feedback text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label small fw-500">Security Password</label>
                        <div class="input-group">
                            <span class="input-group-text bg-transparent border-end-0 text-white-50"><i class="fa-solid fa-lock"></i></span>
                            <input type="password" name="password" class="form-control bg-transparent text-white border-start-0 @error('password') is-invalid @enderror" placeholder="••••••••" required>
                            @error('password')
                                <div class="invalid-feedback text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3 form-check d-flex align-items-center justify-content-between">
                        <div>
                            <input type="checkbox" name="remember" class="form-check-input" id="rememberMe">
                            <label class="form-check-label small text-white-50" for="rememberMe">Remember Session</label>
                        </div>
                        <a href="{{ route('home') }}" class="text-white-50 small text-decoration-none">Back to Site</a>
                    </div>

                    <button type="submit" class="btn btn-premium w-100 py-2 rounded-pill mt-3">Authorize Access</button>
                </form>
            </div>

        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
