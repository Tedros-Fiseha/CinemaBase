<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/style.css">
    <title>Admin Login</title>
</head>

<body>

    <span class="absolute top-2 left-2 font-[poppins] bg-gray-200 border border-gray-400 p-4 rounded-lg shadow-md w-fit">
        <a href="/" class="text-blue-600 font-semibold"><span><svg viewBox="0 0 32.00 32.00" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#000000" stroke="#000000" stroke-width="0.00032">
                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" stroke="#CCCCCC" stroke-width="0.576"></g>
                    <g id="SVGRepo_iconCarrier">
                        <g id="icomoon-ignore"> </g>
                        <path d="M14.389 7.956v4.374l1.056 0.010c7.335 0.071 11.466 3.333 12.543 9.944-4.029-4.661-8.675-4.663-12.532-4.664h-1.067v4.337l-9.884-7.001 9.884-7zM15.456 5.893l-12.795 9.063 12.795 9.063v-5.332c5.121 0.002 9.869 0.26 13.884 7.42 0-4.547-0.751-14.706-13.884-14.833v-5.381z" fill="#000000"> </path>
                    </g>
                </svg> Home
            </span></a>
    </span>
    <div class="flex justify-center pt-4">
        <img src="/assets/cinema.png" alt="Admin Image" class="w-32 h-32 rounded-full shadow-lg object-cover">
    </div>


    <form action="/login" method="POST">
        <?php if (!empty($error)): ?>
            <?php include_once 'includes/errorMessages.php' ?>
        <?php endif; ?>

        <div class="form-item">
            <label>Email</label>
            <div class="input-wrapper">
                <input type="email" id="email" name="email" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" data-lpignore="true" />
            </div>
        </div>
        <div class="form-item">
            <label>Password</label>
            <div class="input-wrapper">
                <input type="password" id="password" name="password" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" data-lpignore="true" />
                <button type="button" id="eyeball">
                    <div class="eye"></div>
                </button>
                <div id="beam"></div>
            </div>
        </div>
        <button id="submit">Sign in</button>
        <p>Already have an account? <a href="/signup" class="text-blue-600 hover:underline font-semibold">Sign up</a></p>
    </form>

    <script src="/js/main.js"></script>

</body>

</html>