<!-- /app/views/success.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" sizes="32x32" href="/assets/cinema.ico" />
    <title>Registration Successful</title>
    <script>
        // Display the modal on page load
        window.onload = () => {
            const modal = document.getElementById('success-modal');
            modal.classList.remove('hidden');
        }

        function redirectToHome() {
            window.location.href = '/cinema/register'; // Home page URL
        }
    </script>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen font-[poppins]">

    <!-- Modal -->
    <div id="success-modal" class="fixed inset-0 bg-opacity-70 flex items-center justify-center hidden">
        <div class="bg-white p-8 rounded-lg shadow-lg shadow-gray-200 max-w-lg w-full text-center">
            <!-- Checkmark Icon -->
            <div class="flex items-center justify-center mb-6">
                <div class="w-16 h-16 bg-green-100 text-green-600 rounded-full flex items-center justify-center">
                    <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                </div>
            </div>

            <!-- Success Message -->
            <h2 class="text-3xl font-bold text-gray-800 mb-4">Registration Successful!</h2>
            <p class="text-gray-600 mb-4">
                Thank you for registering your cinema with us. We will contact you within <strong>24 hours</strong> to verify your business license and the information you provided.
            </p>

            <!-- Separator -->
            <div class="border-t border-gray-300 my-6"></div>

            <!-- CTA Button -->
            <button onclick="redirectToHome()"
                class="px-6 py-3 bg-blue-600 text-white font-semibold rounded-md hover:bg-blue-700 transition duration-300">
                Go to Home Page
            </button>
        </div>
    </div>

</body>

</html>