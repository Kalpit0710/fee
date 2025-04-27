<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin Login - J. R. Preparatory School</title>
    <link rel="icon" type="image/png" href="{{url('logo/logo-color.png')}}">
    <link rel="stylesheet" type="text/css" href="{{url('Bootstrap/css/bootstrap.min.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Animate.css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <style>
        :root {
            --primary-color: #4e73df;
            --secondary-color: #1cc88a;
            --accent-color: #f6c23e;
            --dark-color: #5a5c69;
            --light-color: #f8f9fc;
        }
        
        body {
            background-color: #f5f7fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            min-height: 100vh;
            display: flex;
            align-items: center;
        }
        
        .header-gradient {
            background: linear-gradient(135deg, var(--primary-color) 0%, #224abe 100%);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            font-weight: 700;
        }

        .text-info {
            color: var(--secondary-color) !important;
        }
        
        .login-card {
            background: white;
            border-radius: 15px;
            box-shadow: 0 6px 30px rgba(0, 0, 0, 0.1);
            padding: 2rem;
            transition: all 0.3s ease;
        }
        
        .login-card:hover {
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.15);
        }

        .floating-label {
            position: relative;
            margin-bottom: 1.5rem;
        }
        
        .floating-label .form-control {
            height: calc(3.5rem + 2px);
            padding: 1rem 0.75rem;
            padding-left: 2.5rem;
            background: transparent;
            border-radius: 8px;
            border: 1px solid #d1d3e2;
            transition: all 0.3s;
        }

        .floating-label .input-group-text {
            position: absolute;
            left: 0;
            top: 0;
            height: 100%;
            z-index: 2;
            background: transparent;
            border: none;
            color: var(--dark-color);
            padding-left: 1rem;
            display: flex;
            align-items: center;
        }
        
        .floating-label label {
            position: absolute;
            top: 0;
            left: 2.5rem;
            height: 100%;
            padding: 1rem 0.75rem;
            pointer-events: none;
            border: 1px solid transparent;
            transform-origin: 0 0;
            transition: opacity .1s ease-in-out, transform .1s ease-in-out;
            color: #6c757d;
            z-index: 3;
            margin-bottom: 0;
        }
        
        .floating-label .form-control:focus ~ label,
        .floating-label .form-control:not(:placeholder-shown) ~ label {
            opacity: 1;
            transform: scale(0.85) translateY(-1rem) translateX(-0.5rem);
            background-color: white;
            padding: 0 0.5rem;
            color: var(--primary-color);
            left: 2.5rem;
            height: auto;
        }

        .floating-label .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.25rem rgba(78, 115, 223, 0.25);
            outline: none;
        }

        .floating-label .form-control::placeholder {
            color: transparent;
        }

        .btn-info {
            background-color: var(--secondary-color);
            border: none;
            border-radius: 8px;
            padding: 12px;
            font-weight: 600;
            transition: all 0.3s;
            letter-spacing: 0.5px;
            color: white;
        }
        
        .btn-info:hover {
            background-color: #17a673;
            transform: translateY(-2px);
            color: white;
        }

        .logo {
            height: 80px;
            transition: all 0.3s ease;
            margin-bottom: 1rem;
        }
        
        .logo:hover {
            transform: scale(1.05);
        }

        .error-message {
            color: #e74a3b;
            font-size: 0.875rem;
            margin-top: 0.5rem;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="row justify-content-center align-items-center g-5">
        <!-- Left Column - School Info -->
        <div class="col-lg-6 text-center text-lg-start animate__animated animate__fadeInLeft">
            <img src="{{url('logo/logo-color.png')}}" alt="School Logo" class="logo">
            <h1 class="display-4 fw-bold mb-4">
                <span class="header-gradient">J. R. Preparatory School</span><br>
                <span class="text-info">Admin Dashboard</span>
            </h1>
            <p class="lead text-muted">
                J. R. Preparatory School is a leading educational institution committed to fostering academic excellence and holistic development. Our mission is to empower students with knowledge, skills, and values essential for success in a rapidly evolving world.
            </p>
        </div>

        <!-- Right Column - Login Form -->
        <div class="col-lg-6 animate__animated animate__fadeInRight">
            <div class="login-card">
                <h3 class="text-center mb-4 header-gradient">Admin Login</h3>
                <form id="loginForm" autocomplete="off">
                    <div id="errordisplay" class="error-message text-center mb-4"></div>

                    <!-- Email Input -->
                    <div class="floating-label">
                        <div class="input-group">
                            <span class="input-group-text">
                                <i class="fas fa-envelope"></i>
                            </span>
                            <input type="email" id="email" name="email" class="form-control" value="{{old('email')}}" placeholder=" " required>
                            <label for="email">Email Address</label>
                        </div>
                    </div>

                    <!-- Password Input -->
                    <div class="floating-label">
                        <div class="input-group">
                            <span class="input-group-text">
                                <i class="fas fa-lock"></i>
                            </span>
                            <input type="password" id="password" name="password" class="form-control" placeholder=" " required>
                            <label for="password">Password</label>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-info w-100 mb-4">
                        <i class="fas fa-sign-in-alt me-2"></i> Sign In
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="{{url('Bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{url('js/jquery-3.7.1.min.js')}}"></script>
<script>
$(document).ready(function() {
    $('#loginForm').submit(function(e) {
        e.preventDefault();
        
        // Add loading state to button
        const submitButton = $(this).find('button[type="submit"]');
        submitButton.html('<span class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"></span> Signing In...');
        submitButton.prop('disabled', true);
        
        $.ajax({
            url: "{{ route('signinreq') }}",
            type: "POST",
            data: $(this).serialize(),
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                if(response.redirect) {
                    window.location.href = response.redirect;
                } else if(response.error) {
                    $('#errordisplay').html(response.error);
                    // Add shake animation to form
                    $('.login-card').addClass('animate__animated animate__shakeX');
                    setTimeout(function() {
                        $('.login-card').removeClass('animate__animated animate__shakeX');
                    }, 1000);
                }
            },
            error: function(xhr) {
                let errorMessage = 'An error occurred. Please try again.';
                if (xhr.responseJSON && xhr.responseJSON.message) {
                    errorMessage = xhr.responseJSON.message;
                }
                $('#errordisplay').html(errorMessage);
                // Add shake animation to form
                $('.login-card').addClass('animate__animated animate__shakeX');
                setTimeout(function() {
                    $('.login-card').removeClass('animate__animated animate__shakeX');
                }, 1000);
            },
            complete: function() {
                // Reset button state
                submitButton.html('<i class="fas fa-sign-in-alt me-2"></i> Sign In');
                submitButton.prop('disabled', false);
            }
        });
    });
});
</script>
</body>
</html>