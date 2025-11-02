<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Forgot Password - Send OTP</title>
</head>

<body>
    <!-- Success Modal -->
    <div id="successModal" class="modal" style="display: none;">
        <div class="modal-content">
            <div class="modal-icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 24 24" fill="none"
                    stroke="#28a745" stroke-width="2">
                    <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14" />
                    <polyline points="22 4 12 14.01 9 11.01" />
                </svg>
            </div>
            <h2>OTP Sent Successfully!</h2>
            <p>Please check your email for the OTP code.</p>
            <button onclick="proceedToVerify()" class="modal-button">OK</button>
        </div>
    </div>

    <div class="forgot-container">
        <div class="forgot-card">
            <h1>Forgot Password</h1>

            <div id="alertMessages">
                @if (session('error'))
                    <p class="error-message">{{ session('error') }}</p>
                @endif
                @if (session('success'))
                    <p class="success-message">{{ session('success') }}</p>
                @endif
            </div>

            <p class="instruction">Enter your registered email and we'll send an OTP to reset your password.</p>

            <form id="otpForm" onsubmit="sendOTP(event)">
                @csrf
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" placeholder="you@example.com" required>
                    @error('email')
                        <p class="error">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit" class="send-btn" id="sendButton">
                    <span class="button-text">Send OTP</span>
                    <span class="button-loader" style="display: none;">
                        <svg class="spinner" viewBox="0 0 50 50">
                            <circle class="path" cx="25" cy="25" r="20" fill="none" stroke-width="5">
                            </circle>
                        </svg>
                    </span>
                </button>
            </form>

            <p class="back-login">Remembered? <a href="{{ route('login.page') }}">Back to login</a></p>
        </div>
    </div>

    <style>
        :root {
            --dark-blue: #1a237e;
            --medium-blue: #283593;
            --light-blue: #3949ab;
            --white: #ffffff;
            --gray: #f5f5f5;
            --error-red: #dc3545;
            --success-green: #28a745;
        }

        body {
            margin: 0;
            padding: 0;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: var(--gray);
        }

        .forgot-container {
            width: 100%;
            max-width: 420px;
            padding: 2rem;
        }

        .forgot-card {
            background-color: var(--white);
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.08);
            text-align: center;
        }

        h1 {
            color: var(--dark-blue);
            margin: 0 0 1rem 0;
            font-size: 1.6rem;
        }

        .instruction {
            color: #555;
            margin-bottom: 1rem;
            font-size: 0.98rem;
        }

        .form-group {
            margin-bottom: 1rem;
            text-align: left;
        }

        label {
            display: block;
            margin-bottom: 0.4rem;
            color: var(--dark-blue);
            font-weight: 500;
        }

        input[type="email"] {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 1rem;
            box-sizing: border-box;
        }

        .send-btn {
            width: 100%;
            padding: 0.75rem;
            background-color: var(--medium-blue);
            color: var(--white);
            border: none;
            border-radius: 4px;
            font-size: 1rem;
            cursor: pointer;
        }

        .send-btn:hover {
            background-color: var(--light-blue);
        }

        .error-message,
        .error {
            color: var(--error-red);
            font-size: 0.9rem;
            margin-top: 0.5rem;
        }

        .success-message {
            color: #28a745;
            font-size: 0.9rem;
            margin-top: 0.5rem;
        }

        .back-login {
            margin-top: 1rem;
            font-size: 0.95rem;
        }

        .back-login a {
            color: var(--medium-blue);
            text-decoration: none;
            font-weight: 600;
        }

        .back-login a:hover {
            text-decoration: underline;
        }

        /* Modal Styles */
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 1000;
            display: flex;
            justify-content: center;
            align-items: center;
            opacity: 0;
            visibility: hidden;
            transition: opacity 0.3s, visibility 0.3s;
        }

        .modal.show {
            opacity: 1;
            visibility: visible;
        }

        .modal-content {
            background: var(--white);
            padding: 2rem;
            border-radius: 8px;
            text-align: center;
            max-width: 400px;
            width: 90%;
            transform: scale(0.7);
            transition: transform 0.3s;
        }

        .modal.show .modal-content {
            transform: scale(1);
        }

        .modal-icon {
            margin-bottom: 1rem;
        }

        .modal h2 {
            color: var(--success-green);
            margin: 1rem 0;
            font-size: 1.5rem;
        }

        .modal p {
            color: #666;
            margin-bottom: 1.5rem;
        }

        .modal-button {
            background-color: var(--success-green);
            color: white;
            border: none;
            padding: 0.75rem 2rem;
            border-radius: 4px;
            font-size: 1rem;
            cursor: pointer;
            transition: background-color 0.2s;
        }

        .modal-button:hover {
            background-color: #218838;
        }

        /* Loading spinner */
        .spinner {
            animation: rotate 2s linear infinite;
            width: 20px;
            height: 20px;
        }

        .path {
            stroke: var(--white);
            stroke-linecap: round;
            animation: dash 1.5s ease-in-out infinite;
        }

        @keyframes rotate {
            100% {
                transform: rotate(360deg);
            }
        }

        @keyframes dash {
            0% {
                stroke-dasharray: 1, 150;
                stroke-dashoffset: 0;
            }

            50% {
                stroke-dasharray: 90, 150;
                stroke-dashoffset: -35;
            }

            100% {
                stroke-dasharray: 90, 150;
                stroke-dashoffset: -124;
            }
        }

        @media (max-width: 480px) {
            .forgot-container {
                padding: 1rem;
            }

            .forgot-card {
                padding: 1.25rem;
            }

            .modal-content {
                width: 85%;
                padding: 1.5rem;
            }
        }
    </style>

    <script>
        async function sendOTP(event) {
            event.preventDefault();

            const form = document.getElementById('otpForm');
            const button = document.getElementById('sendButton');
            const buttonText = button.querySelector('.button-text');
            const buttonLoader = button.querySelector('.button-loader');
            const alertMessages = document.getElementById('alertMessages');

            // Show loading state
            buttonText.style.display = 'none';
            buttonLoader.style.display = 'inline-block';
            button.disabled = true;

            try {
                const formData = new FormData(form);
                const response = await fetch('{{ route('sendOTP') }}', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                        'Accept': 'application/json',
                    },
                    body: formData
                });

                const data = await response.json();

                if (response.ok) {
                    // Show success modal
                    const modal = document.getElementById('successModal');
                    modal.style.display = 'flex';
                    setTimeout(() => modal.classList.add('show'), 10);
                } else {
                    // Show error message
                    alertMessages.innerHTML = `<p class="error-message">${data.message || 'An error occurred'}</p>`;
                }
            } catch (error) {
                alertMessages.innerHTML = '<p class="error-message">An error occurred. Please try again.</p>';
            } finally {
                // Reset button state
                buttonText.style.display = 'inline';
                buttonLoader.style.display = 'none';
                button.disabled = false;
            }
        }

        function proceedToVerify() {
            window.location.href = '{{ route('verifyOTP') }}';
        }
    </script>
</body>

</html>
