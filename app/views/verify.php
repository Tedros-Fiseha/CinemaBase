<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <title>Verify Code</title>
</head>

<body class="font-sans bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-md">
        <span class="absolute top-2 left-2 font-[poppins] bg-gray-200 border border-gray-400 p-4 rounded-lg shadow-md w-fit">
            <a href="/login" class="text-blue-600 font-semibold"><span><svg viewBox="0 0 32.00 32.00" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#000000" stroke="#000000" stroke-width="0.00032">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" stroke="#CCCCCC" stroke-width="0.576"></g>
                        <g id="SVGRepo_iconCarrier">
                            <g id="icomoon-ignore"> </g>
                            <path d="M14.389 7.956v4.374l1.056 0.010c7.335 0.071 11.466 3.333 12.543 9.944-4.029-4.661-8.675-4.663-12.532-4.664h-1.067v4.337l-9.884-7.001 9.884-7zM15.456 5.893l-12.795 9.063 12.795 9.063v-5.332c5.121 0.002 9.869 0.26 13.884 7.42 0-4.547-0.751-14.706-13.884-14.833v-5.381z" fill="#000000"> </path>
                        </g>
                    </svg> Login
                </span></a>
        </span>
        <h1 class="text-2xl font-bold text-gray-900 mb-4 text-center">Enter Verification Code</h1>

        <!-- Notification about the verification code -->
        <div class="bg-blue-50 border-l-4 border-blue-500 text-blue-700 p-4 rounded-md mb-6">
            <p class="text-sm">
                A 6-digit verification code has been sent to your email. Please check your inbox and enter the code below.
            </p>
        </div>

        <!-- Verification Code Input -->
        <form action="/verify" method="POST">
            <div class="flex justify-center gap-3 mb-6">
                <input type="text" name="code1" maxlength="1" required
                    class="w-12 h-12 text-center text-lg border-2 border-gray-300 rounded-lg focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all">
                <input type="text" name="code2" maxlength="1" required
                    class="w-12 h-12 text-center text-lg border-2 border-gray-300 rounded-lg focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all">
                <input type="text" name="code3" maxlength="1" required
                    class="w-12 h-12 text-center text-lg border-2 border-gray-300 rounded-lg focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all">
                <input type="text" name="code4" maxlength="1" required
                    class="w-12 h-12 text-center text-lg border-2 border-gray-300 rounded-lg focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all">
                <input type="text" name="code5" maxlength="1" required
                    class="w-12 h-12 text-center text-lg border-2 border-gray-300 rounded-lg focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all">
                <input type="text" name="code6" maxlength="1" required
                    class="w-12 h-12 text-center text-lg border-2 border-gray-300 rounded-lg focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all">
            </div>
            <?php if (!empty($error)): ?>
                <?php include_once 'includes/errorMessages.php' ?>
            <?php endif; ?>

            <!-- Additional Notes -->
            <p class="text-sm text-gray-600 text-center mb-6">
                If you didn't receive the code, check your spam folder
            </p>
            <!-- Submit Button -->
            <button type="submit"
                class="w-full bg-blue-500 text-white py-2 px-4 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all">
                Verify
            </button>
        </form>
    </div>


    <!-- Auto-focus Script -->
    <script>
        const inputs = document.querySelectorAll('input[type="text"]');
        inputs.forEach((input, index) => {
            input.addEventListener('input', () => {
                if (input.value.length === 1 && index < inputs.length - 1) {
                    inputs[index + 1].focus();
                }
            });
        });
    </script>
</body>

</html>