<<<<<<< HEAD
<<<<<<< HEAD
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | Golden Bean Portal</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), 
                        url('https://images.unsplash.com/photo-1501339847302-ac426a4a7cbb?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1920&q=80') no-repeat center center/cover;
            padding: 20px;
        }

        .register-container {
            width: 100%;
            max-width: 500px;
            background: rgba(255, 253, 250, 0.95);
            border-radius: 20px;
            box-shadow: 0 15px 35px rgba(75, 55, 28, 0.3);
            overflow: hidden;
            position: relative;
            backdrop-filter: blur(8px);
        }

        .register-container::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 8px;
            background: linear-gradient(90deg, 
                #5a7247 0%, 
                #8b5a2b 50%, 
                #d4af37 100%);
        }

        .header {
            text-align: center;
            padding: 40px 30px 20px;
        }

        .logo {
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
        }

        .logo-icon {
            width: 70px;
            height: 70px;
            background: linear-gradient(135deg, #8b5a2b, #5a7247);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff8e1;
            font-size: 32px;
            box-shadow: 0 5px 15px rgba(139, 90, 43, 0.3);
        }

        .header h1 {
            color: #4b371c;
            font-size: 28px;
            margin-bottom: 10px;
            font-weight: 700;
            letter-spacing: 0.5px;
        }

        .header p {
            color: #8b5a2b;
            font-size: 16px;
            margin-bottom: 5px;
        }

        .coffee-beans {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin-top: 15px;
        }

        .coffee-bean {
            color: #8b5a2b;
            font-size: 20px;
            opacity: 0.8;
            animation: float 4s infinite ease-in-out;
        }

        .coffee-bean:nth-child(2) {
            animation-delay: 0.5s;
        }

        .coffee-bean:nth-child(3) {
            animation-delay: 1s;
        }

        .register-form {
            padding: 0 30px 40px;
        }

        .input-group {
            position: relative;
            margin-bottom: 25px;
        }

        .input-group label {
            display: block;
            color: #4b371c;
            margin-bottom: 8px;
            font-weight: 500;
            font-size: 14px;
            padding-left: 5px;
        }

        .input-group input {
            width: 100%;
            padding: 15px 15px 15px 50px;
            border: 1px solid rgba(139, 90, 43, 0.2);
            border-radius: 12px;
            background: #fffdfa;
            color: #4b371c;
            font-size: 16px;
            transition: all 0.3s ease;
            box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.1);
        }

        .input-group input:focus {
            border-color: #8b5a2b;
            outline: none;
            box-shadow: 0 0 0 3px rgba(139, 90, 43, 0.1);
        }

        .input-icon {
            position: absolute;
            left: 15px;
            top: 42px;
            color: #8b5a2b;
            font-size: 18px;
        }

        .password-hint {
            font-size: 12px;
            color: #8b5a2b;
            margin-top: 5px;
            padding-left: 5px;
        }

        .form-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 30px;
            flex-wrap: wrap;
            gap: 15px;
        }

        .login-link {
            color: #8b5a2b;
            font-size: 14px;
            text-decoration: none;
            transition: color 0.3s;
        }

        .login-link:hover {
            color: #4b371c;
            text-decoration: underline;
        }

        .register-button {
            padding: 16px 30px;
            background: linear-gradient(135deg, #8b5a2b, #5a7247);
            border: none;
            border-radius: 12px;
            color: white;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 5px 15px rgba(90, 114, 71, 0.3);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }

        .register-button:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(90, 114, 71, 0.4);
        }

        .register-button:active {
            transform: translateY(0);
        }

        .footer {
            text-align: center;
            padding: 20px 30px 30px;
            color: #8b5a2b;
            font-size: 14px;
            border-top: 1px solid rgba(139, 90, 43, 0.1);
        }

        .footer a {
            color: #5a7247;
            text-decoration: none;
            font-weight: 600;
        }

        .footer a:hover {
            text-decoration: underline;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
        }

        .terms {
            display: flex;
            align-items: center;
            margin-top: 15px;
            gap: 10px;
        }

        .terms input {
            width: 18px;
            height: 18px;
            accent-color: #8b5a2b;
            cursor: pointer;
        }

        .terms label {
            color: #5a7247;
            font-size: 14px;
            cursor: pointer;
        }

        @media (max-width: 480px) {
            .register-container {
                max-width: 100%;
            }
            
            .header {
                padding: 30px 20px 15px;
            }
            
            .register-form {
                padding: 0 20px 30px;
            }
            
            .form-footer {
                flex-direction: column;
                align-items: stretch;
            }
            
            .register-button {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <div class="register-container">
        <div class="header">
            <div class="logo">
                <div class="logo-icon">
                    <i class="fas fa-coffee"></i>
                </div>
            </div>
            <h1>Join Our Coffee Network</h1>
            <p>Register to manage Uganda's premium coffee supply chain</p>
            <div class="coffee-beans">
                <i class="fas fa-coffee-bean coffee-bean"></i>
                <i class="fas fa-coffee-bean coffee-bean"></i>
                <i class="fas fa-coffee-bean coffee-bean"></i>
            </div>
        </div>

        <form class="register-form" method="POST" action="{{ route('register') }}">
            @csrf
            <div class="input-group">
                <label for="name">Full Name</label>
                <i class="fas fa-user input-icon"></i>
                <input type="text" id="name" name="name" placeholder="John Coffee Farmer" required autofocus>
            </div>

            <div class="input-group">
                <label for="email"> Email</label>
                <i class="fas fa-envelope input-icon"></i>
                <input type="email" id="email" name="email" placeholder="your.cooperative@uganda.coffee" required>
            </div>

            <div class="input-group">
                <label for="password">Password</label>
                <i class="fas fa-lock input-icon"></i>
                <input type="password" id="password" name="password" placeholder="••••••••" required>
                <p class="password-hint">Use 8+ characters with a mix of letters, numbers & symbols</p>
            </div>

            <div class="input-group">
                <label for="password_confirmation">Confirm Password</label>
                <i class="fas fa-lock input-icon"></i>
                <input type="password" id="password_confirmation" name="password_confirmation" placeholder="••••••••" required>
            </div>
            <div class="input-group">
    <label for="role">Register as</label>
    <i class="fas fa-user-tag input-icon"></i>
    <select id="role" name="role" required>
        <option value="" disabled selected>Select your role</option>
        <option value="cooperative">Cooperative</option>
        <option value="wholesaler">Wholesaler</option>
        <option value="retailer">Retailer</option>
        <option value="customer">Customer</option>
        
    </select>
</div>
            <div class="terms">
                <input type="checkbox" id="terms" required>
                <label for="terms">I agree to the <a href="#">Terms of Service</a> and <a href="#">Privacy Policy</a></label>
            </div>

            <div class="form-footer">
                <a href="{{ route('login') }}" class="login-link">
                    Already have an account? Sign in
                </a>
                <button type="submit" class="register-button">
                    <i class="fas fa-user-plus"></i> Create Account
                </button>
            </div>
        </form>

        <div class="footer">
            <p>© 2025 Golden Bean . All rights reserved. <a href="#">Terms of Use</a> | <a href="#">Privacy Policy</a></p>
        </div>
    </div>

    <script>
        // Password strength indicator
        const passwordInput = document.getElementById('password');
        const passwordHint = document.querySelector('.password-hint');
        
        passwordInput.addEventListener('input', function() {
            const password = passwordInput.value;
            let strength = 0;
            
            if (password.length >= 8) strength++;
            if (/[A-Z]/.test(password)) strength++;
            if (/[0-9]/.test(password)) strength++;
            if (/[^A-Za-z0-9]/.test(password)) strength++;
            
            if (password.length === 0) {
                passwordHint.textContent = 'Use 8+ characters with a mix of letters, numbers & symbols';
                passwordHint.style.color = '#8b5a2b';
            } else if (strength < 2) {
                passwordHint.textContent = 'Weak password';
                passwordHint.style.color = '#e74c3c';
            } else if (strength < 4) {
                passwordHint.textContent = 'Medium strength password';
                passwordHint.style.color = '#f39c12';
            } else {
                passwordHint.textContent = 'Strong password!';
                passwordHint.style.color = '#27ae60';
            }
        });
        
        // Form submission handler
        document.querySelector('.register-form').addEventListener('submit', function(e) {
            const password = document.getElementById('password').value;
            const confirmPassword = document.getElementById('password_confirmation').value;
            
            if (password !== confirmPassword) {
                e.preventDefault();
                alert('Passwords do not match!');
                return;
            }
            
            if (!document.getElementById('terms').checked) {
                e.preventDefault();
                alert('Please agree to the Terms of Service and Privacy Policy');
                return;
            }
            
            // In a real app, this would submit the form
            alert('Registration successful! Welcome to the Golden Bean Portal.');
        });
    </script>
</body>
</html>
=======
<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf
=======
@extends('layouts.app')
>>>>>>> d5c02ba2 (Inventory)

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<<<<<<< HEAD

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
>>>>>>> d010cf11 (inventory)
=======
@endsection
>>>>>>> d5c02ba2 (Inventory)
