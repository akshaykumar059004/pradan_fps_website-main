<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PRADAN - Login</title>
    <meta name="csrf-token" content="{{csrf_token()}}">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body, html {
            height: 100%;
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            background: linear-gradient(135deg, #ffffffc9 0%, #ffffffc8 100%);
            overflow: hidden;
        }

        /* Animated background particles */
        .background {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 0;
            background-image: 
                repeating-linear-gradient(45deg, rgba(2, 142, 37, 0.1) 0,  rgba(2, 142, 37, 0.1) 1px, transparent 1px, transparent 20px),
                repeating-linear-gradient(-45deg, rgba(2, 142, 37, 0.1) 0, rgba(2, 142, 37, 0.1) 1px, transparent 1px, transparent 20px);
            background-size: 40px 40px;
        }


        .particles {
            position: absolute;
            width: 100%;
            height: 100%;
            overflow: hidden;
        }

        .particle {
            position: absolute;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            animation: float 15s infinite linear;
        }

        @keyframes float {
            0% {
                transform: translateY(100vh) rotate(0deg);
                opacity: 0;
            }
            10% {
                opacity: 1;
            }
            90% {
                opacity: 1;
            }
            100% {
                transform: translateY(-10vh) rotate(360deg);
                opacity: 0;
            }
        }

        /* Development notice banner */
        .dev-notice {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            background: linear-gradient(90deg, #ff6b35, #f7931e);
            color: white;
            text-align: center;
            padding: 10px 20px;
            font-size: 14px;
            font-weight: 500;
            z-index: 1000;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        .dev-notice i {
            margin-right: 8px;
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.7; }
        }

        /* Main login container */
        .login-wrapper {
            position: relative;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 10;
            padding-top: 60px; /* Account for dev notice */
        }

        .login-container {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            border-radius: 24px;
            padding: 48px 40px;
            width: 420px;
            max-width: 90vw;
            box-shadow: 
                0 20px 60px rgba(0, 0, 0, 0.15),
                0 8px 25px rgba(0, 0, 0, 0.1),
                inset 0 1px 0 rgba(255, 255, 255, 0.8);
            border: 1px solid rgba(255, 255, 255, 0.2);
            transform: translateY(0);
            transition: all 0.3s ease;
        }

        .login-container:hover {
            transform: translateY(-5px);
            box-shadow: 
                0 30px 80px rgba(0, 0, 0, 0.2),
                0 12px 35px rgba(0, 0, 0, 0.15);
        }

        /* Logo and branding */
        .brand-section {
            text-align: center;
            margin-bottom: 32px;
        }

        .brand-logo {
            width: 120px;
            height: 100px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 16px;
        }
        .brand-logo img {
            width: 100%;
            height: 100%;
            object-fit: contain; /* Changed from cover to contain to maintain aspect ratio */
            /* Subtle shadow for the logo itself */
        }

        .brand-logo i {
            font-size: 36px;
            color: white;
        }

        .brand-title {
            font-size: 28px;
            font-weight: 700;
            color: #1a202c;
            margin-bottom: 8px;
            letter-spacing: -0.02em;
        }

        .brand-subtitle {
            font-size: 14px;
            color: #718096;
            font-weight: 400;
            line-height: 1.4;
        }

        /* Form styling */
        .form-group {
            margin-bottom: 24px;
            position: relative;
        }

        .form-label {
            display: block;
            font-size: 14px;
            font-weight: 600;
            color: #374151;
            margin-bottom: 8px;
        }

        .form-control {
            width: 100%;
            padding: 14px 16px;
            border: 2px solid #e5e7eb;
            border-radius: 12px;
            font-size: 16px;
            font-weight: 400;
            background: rgba(255, 255, 255, 0.8);
            transition: all 0.3s ease;
        }

        .form-control:focus {
            outline: none;
            border-color: #2E8B57;
            background: rgba(255, 255, 255, 1);
            box-shadow: 0 0 0 3px rgba(46, 139, 87, 0.1);
        }

        .form-control::placeholder {
            color: #9ca3af;
        }

        /* Login button */
        .btn-login {
            width: 100%;
            padding: 16px;
            background: linear-gradient(135deg, #2E8B57 0%, #228B22 100%);
            border: none;
            border-radius: 12px;
            color: white;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 25px rgba(46, 139, 87, 0.3);
        }

        .btn-login:active {
            transform: translateY(0);
        }

        .btn-login:disabled {
            opacity: 0.6;
            cursor: not-allowed;
            transform: none;
        }

        /* Loading state */
        .btn-login.loading {
            color: transparent;
        }

        .btn-login.loading::after {
            content: '';
            position: absolute;
            width: 20px;
            height: 20px;
            top: 50%;
            left: 50%;
            margin-left: -10px;
            margin-top: -10px;
            border: 2px solid rgba(255,255,255,0.3);
            border-radius: 50%;
            border-top-color: white;
            animation: spin 1s ease-in-out infinite;
        }

        @keyframes spin {
            to { transform: rotate(360deg); }
        }

        /* Footer */
        .login-footer {
            text-align: center;
            margin-top: 32px;
            padding-top: 24px;
            border-top: 1px solid #e5e7eb;
        }

        .login-footer p {
            font-size: 13px;
            color: #6b7280;
            margin: 0;
        }

        /* Responsive design */
        @media (max-width: 768px) {
            .login-container {
                padding: 32px 24px;
                width: 95vw;
                margin: 20px auto;
            }
            
            .brand-title {
                font-size: 24px;
            }
            
            .dev-notice {
                font-size: 13px;
                padding: 8px 16px;
            }
        }

        /* Error states */
        .form-control.error {
            border-color: #ef4444;
            background: rgba(239, 68, 68, 0.05);
        }

        .error-message {
            color: #ef4444;
            font-size: 13px;
            margin-top: 6px;
            display: none;
        }
    </style>
</head>
<body>
    <!-- Development notice banner -->
    <div class="dev-notice">
        <i class="fas fa-exclamation-triangle"></i>
        This site is currently under development and does not represent the final version of the application.
    </div>

    <!-- Animated background -->
    <!-- <div class="background">
        <div class="particles"></div>
    </div> -->

    <div class="background"></div>
    

    <!-- Login wrapper -->
    <div class="login-wrapper">
        <div class="login-container">
            <!-- Branding section -->
            <div class="brand-section">
                <div class="brand-logo">
                    <img src="{{ asset('assets/images/icons/Pradan-logo_nobg.png')}}" alt="PRADAN Logo" class="img-fluid" style="width: 100%; height: 100%; object-fit: cover;">
                </div>
                <h1 class="brand-title">PRADAN</h1>
                <p class="brand-subtitle">Professional Assistance for Development Action</p>
            </div>

            <!-- Login form -->
            <form id="log">
                <div class="form-group">
                    <label for="email" class="form-label">Email Address</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
                    <div class="error-message" id="email-error"></div>
                </div>

                <div class="form-group">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="pass" placeholder="Enter your password" required>
                    <div class="error-message" id="password-error"></div>
                </div>

                <button type="submit" class="btn-login" id="login-btn">
                    Sign In
                </button>
            </form>

            <!-- Footer -->
            <div class="login-footer">
                <p>&copy; 2025 PRADAN. All rights reserved.</p>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        // Create floating particles
        // function createParticles() {
        //     const particles = document.querySelector('.particles');
        //     const particleCount = 15;

        //     for (let i = 0; i < particleCount; i++) {
        //         const particle = document.createElement('div');
        //         particle.className = 'particle';
                
        //         // Random size and position
        //         const size = Math.random() * 4 + 2;
        //         particle.style.width = size + 'px';
        //         particle.style.height = size + 'px';
        //         particle.style.left = Math.random() * 100 + '%';
        //         particle.style.animationDelay = Math.random() * 15 + 's';
        //         particle.style.animationDuration = (Math.random() * 10 + 10) + 's';
                
        //         particles.appendChild(particle);
        //     }
        // }

        // Initialize particles
        //createParticles();

        // CSRF setup
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // Form validation
        function validateEmail(email) {
            return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
        }

        function showError(field, message) {
            const input = document.getElementById(field);
            const errorDiv = document.getElementById(field + '-error');
            input.classList.add('error');
            errorDiv.textContent = message;
            errorDiv.style.display = 'block';
        }

        function clearErrors() {
            document.querySelectorAll('.form-control').forEach(input => {
                input.classList.remove('error');
            });
            document.querySelectorAll('.error-message').forEach(error => {
                error.style.display = 'none';
            });
        }

        // Login form submission
        $(document).on("submit", "#log", function(e) {
            e.preventDefault();
            clearErrors();

            const email = $('#email').val().trim();
            const password = $('#password').val().trim();
            const loginBtn = $('#login-btn');
            let hasErrors = false;

            // Validation
            if (!email) {
                showError('email', 'Email is required');
                hasErrors = true;
            } else if (!validateEmail(email)) {
                showError('email', 'Please enter a valid email address');
                hasErrors = true;
            }

            if (!password) {
                showError('password', 'Password is required');
                hasErrors = true;
            }

            if (hasErrors) return;

            // Show loading state
            loginBtn.addClass('loading').prop('disabled', true);

            const form = new FormData(this);

            $.ajax({
                type: "POST",
                url: "/log",
                data: form,
                processData: false,
                contentType: false,
                success: function(response) {
                    if (response.status == 200) {
                        Swal.fire({
                            title: "Welcome!",
                            text: "Login successful",
                            icon: "success",
                            confirmButtonText: "Continue",
                            timer: 2000,
                            showConfirmButton: false
                        });

                        // Redirect based on role
                        setTimeout(() => {
                            if (response.role == "vol") window.location.href = "{{ route('vol') }}";
                            if (response.role == "coor") window.location.href = "{{ route('cdash') }}";
                            if (response.role == "tl") window.location.href = "{{ route('ldash') }}";
                            if (response.role == "fm") window.location.href = "{{ route('fdash') }}";
                        }, 1000);
                    }
                },
                error: function(xhr, status, error) {
                    loginBtn.removeClass('loading').prop('disabled', false);
                    
                    let errorMessage = "Login failed. Please try again.";
                    if (xhr.responseJSON && xhr.responseJSON.message) {
                        errorMessage = xhr.responseJSON.message;
                    }

                    Swal.fire({
                        title: "Error",
                        text: errorMessage,
                        icon: "error",
                        confirmButtonText: "Try Again"
                    });
                }
            });
        });

        // Remove error states on input
        $('.form-control').on('input', function() {
            $(this).removeClass('error');
            $(this).siblings('.error-message').hide();
        });
    </script>
</body>
</html>