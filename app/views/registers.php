<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" sizes="32x32" href="/assets/cinema.png" />
    <script src="https://cdn.tailwindcss.com"></script>

    <title>Register</title>
</head>

<body>
    <!-- Header -->
    <?php
    require_once __DIR__ . '/includes/header.php';

    ?>

    <div class="bg-gray-100 pt-32 flex items-center justify-center py-10 font-[poppins]">
        <div class="bg-white rounded-lg shadow-lg w-full max-w-4xl p-8">
            <h1 class="text-2xl font-bold text-center text-indigo-600 mb-6">Cinema Registration Form</h1>
            <form action="/cinema/store" method="POST" enctype="multipart/form-data" class="space-y-6">

                <!-- Basic Information -->
                <div class="space-y-6">
                    <h2 class="text-2xl font-semibold text-gray-800 mb-4">Basic Information</h2>

                    <!-- Horizontal Layout for Inputs -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <!-- Cinema Name -->
                        <div>
                            <label for="cinema-name" class="block text-sm font-medium mb-2">Cinema Name</label>
                            <input type="text" id="cinema-name" name="cinema_name"
                                class="py-3 border px-4 block w-full border-gray-300 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500"
                                placeholder="Cinema Name" required>
                        </div>

                        <!-- location -->
                        <div>
                            <label for="location" class="block text-sm font-medium mb-2">Location</label>
                            <input type="text" id="location" name="location"
                                class="py-3 border px-4 block w-full border-gray-300 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500"
                                placeholder="Cinema Location" required>
                        </div>

                        <!-- Phone -->
                        <div>
                            <label for="cinema_phone" class="block text-sm font-medium mb-2">Phone</label>
                            <input type="tel" id="cinema_phone" name="cinema_phone"
                                class="py-3 border px-4 block w-full border-gray-300 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500"
                                placeholder="Phone Number" required>
                        </div>

                        <!-- Email -->
                        <div>
                            <label for="email" class="block text-sm font-medium mb-2">Email</label>
                            <input type="email" id="email" name="email"
                                class="py-3 border px-4 block w-full border-gray-300 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500"
                                placeholder="you@site.com" required>
                        </div>

                        <!-- Website -->
                        <div>
                            <label for="website" class="block text-sm font-medium mb-2">Website</label>
                            <input type="url" id="website" name="website"
                                class="py-3 border px-4 block w-full border-gray-300 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500"
                                placeholder="http://website.com" required>
                        </div>

                        <!-- Upload Logo -->
                        <div>
                            <h1 class="text-sm mb-2">Upload Logo</h1>
                            <label for="cinema_logo" class="sr-only">Choose file</label>
                            <input type="file" name="cinema_logo" id="cinema_logo"
                                class="block w-full border border-gray-200 shadow-sm rounded-lg text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 file:bg-gray-50 file:border-0 file:me-4 file:py-3 file:px-4"
                                required>
                        </div>
                    </div>
                </div>

                <!-- Operational -->

                <div class="space-x-6">
                    <h2 class="text-2xl font-semibold text-gray-800 mb-4">Operational Details</h2>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">

                        <!-- Operating Hours -->

                        <div>
                            <label for="op_hours" class="block text-sm font-medium text-gray-700">Operating
                                Hours</label>
                            <input type="number" id="op_hours" name="op_hours" placeholder="Enter operating hours"
                                class="py-3 border px-4 block w-full border-gray-300 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500">
                        </div>

                        <!-- Screens -->

                        <div>
                            <label for="screen_rooms" class="block text-sm font-medium text-gray-700">Number of
                                Screens</label>
                            <input type="number" id="screen_rooms" name="screen_rooms"
                                placeholder="Enter number of screens"
                                class="py-3 border px-4 block w-full border-gray-300 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500">
                        </div>

                        <!-- Seating Capacity -->

                        <div>
                            <label for="seating_capacity" class="block text-sm font-medium text-gray-700">Seating
                                Capacity</label>
                            <input type="number" id="seating_capacity" name="seating_capacity"
                                placeholder="Enter seating capacity"
                                class="py-3 border px-4 block w-full border-gray-300 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500">
                        </div>

                        <!-- Facilities -->

                        <div>
                            <label for="facilities" class="block text-sm font-medium text-gray-700">Facilities</label>
                            <textarea id="facilities" name="facilities" placeholder="List available facilities" rows="3"
                                cols="30"
                                class="resize-none py-3 border px-4 block w-full border-gray-300 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500"></textarea>
                        </div>


                        <!-- Operating Days -->
                        <div class="w-full">
                            <h1 class="text-sm font-medium text-gray-800 mb-4">Select Operating Days and Times</h1>
                            <ul class="w-max grid grid-cols-2 gap-5">

                                <!-- Monday -->

                                <li class="w-max flex flex-col items-start gap-4 py-3 px-4 text-sm font-medium bg-white border text-gray-800 rounded-lg">
                                    <div class="flex items-center gap-x-3">
                                        <input id="day-monday" name="operating-days[]" value="Monday" type="checkbox"
                                            class="h-4 w-4 border-gray-300 rounded focus:ring-blue-500">
                                        <label for="day-monday" class="text-sm text-gray-700">Monday</label>
                                    </div>
                                    <div class="flex items-center gap-2">
                                        <label for="monday-start-time" class="text-sm text-gray-700">Start:</label>
                                        <input id="monday-start-time" name="monday_start_time" type="time"
                                            class="py-2 px-3 border border-gray-300 rounded-lg text-sm focus:ring-blue-500 focus:border-blue-500">
                                        <label for="monday-end-time" class="text-sm text-gray-700">End:</label>
                                        <input id="monday-end-time" name="monday_end_time" type="time"
                                            class="py-2 px-3 border border-gray-300 rounded-lg text-sm focus:ring-blue-500 focus:border-blue-500">
                                    </div>
                                </li>

                                <!-- Tuesday -->

                                <li class="w-max flex flex-col items-start gap-4 py-3 px-4 text-sm font-medium bg-white border text-gray-800 rounded-lg">
                                    <div class="flex items-center gap-x-3">
                                        <input id="day-tuesday" name="operating-days[]" value="Tuesday" type="checkbox"
                                            class="h-4 w-4 border-gray-300 rounded focus:ring-blue-500">
                                        <label for="day-tuesday" class="text-sm text-gray-700">Tuesday</label>
                                    </div>
                                    <div class="flex items-center gap-2">
                                        <label for="tuesday-start-time" class="text-sm text-gray-700">Start:</label>
                                        <input id="tuesday-start-time" name="tuesday_start_time" type="time"
                                            class="py-2 px-3 border border-gray-300 rounded-lg text-sm focus:ring-blue-500 focus:border-blue-500">
                                        <label for="tuesday-end-time" class="text-sm text-gray-700">End:</label>
                                        <input id="tuesday-end-time" name="tuesday_end_time" type="time"
                                            class="py-2 px-3 border border-gray-300 rounded-lg text-sm focus:ring-blue-500 focus:border-blue-500">
                                    </div>
                                </li>

                                <!-- Wednesday -->

                                <li class="w-max flex flex-col items-start gap-4 py-3 px-4 text-sm font-medium bg-white border text-gray-800 rounded-lg">
                                    <div class="flex items-center gap-x-3">
                                        <input id="day-wednesday" name="operating-days[]" value="Wednesday" type="checkbox"
                                            class="h-4 w-4 border-gray-300 rounded focus:ring-blue-500">
                                        <label for="day-wednesday" class="text-sm text-gray-700">Wednesday</label>
                                    </div>
                                    <div class="flex items-center gap-2">
                                        <label for="wednesday-start-time" class="text-sm text-gray-700">Start:</label>
                                        <input id="wednesday-start-time" name="wednesday_start_time" type="time"
                                            class="py-2 px-3 border border-gray-300 rounded-lg text-sm focus:ring-blue-500 focus:border-blue-500">
                                        <label for="wednesday-end-time" class="text-sm text-gray-700">End:</label>
                                        <input id="wednesday-end-time" name="wednesday_end_time" type="time"
                                            class="py-2 px-3 border border-gray-300 rounded-lg text-sm focus:ring-blue-500 focus:border-blue-500">
                                    </div>
                                </li>

                                <!-- Thursday -->
                                <li class="w-max flex flex-col items-start gap-4 py-3 px-4 text-sm font-medium bg-white border text-gray-800 rounded-lg">
                                    <div class="flex items-center gap-x-3">
                                        <input id="day-thursday" name="operating-days[]" value="Thursday" type="checkbox"
                                            class="h-4 w-4 border-gray-300 rounded focus:ring-blue-500">
                                        <label for="day-thursday" class="text-sm text-gray-700">Thursday</label>
                                    </div>
                                    <div class="flex items-center gap-2">
                                        <label for="thursday-start-time" class="text-sm text-gray-700">Start:</label>
                                        <input id="thursday-start-time" name="thursday_start_time" type="time"
                                            class="py-2 px-3 border border-gray-300 rounded-lg text-sm focus:ring-blue-500 focus:border-blue-500">
                                        <label for="thursday-end-time" class="text-sm text-gray-700">End:</label>
                                        <input id="thursday-end-time" name="thursday_end_time" type="time"
                                            class="py-2 px-3 border border-gray-300 rounded-lg text-sm focus:ring-blue-500 focus:border-blue-500">
                                    </div>
                                </li>

                                <!-- Friday -->

                                <li class="w-max flex flex-col items-start gap-4 py-3 px-4 text-sm font-medium bg-white border text-gray-800 rounded-lg">
                                    <div class="flex items-center gap-x-3">
                                        <input id="day-friday" name="operating-days[]" value="Friday" type="checkbox"
                                            class="h-4 w-4 border-gray-300 rounded focus:ring-blue-500">
                                        <label for="day-friday" class="text-sm text-gray-700">Friday</label>
                                    </div>
                                    <div class="flex items-center gap-2">
                                        <label for="friday-start-time" class="text-sm text-gray-700">Start:</label>
                                        <input id="friday-start-time" name="friday_start_time" type="time"
                                            class="py-2 px-3 border border-gray-300 rounded-lg text-sm focus:ring-blue-500 focus:border-blue-500">
                                        <label for="friday-end-time" class="text-sm text-gray-700">End:</label>
                                        <input id="friday-end-time" name="friday_end_time" type="time"
                                            class="py-2 px-3 border border-gray-300 rounded-lg text-sm focus:ring-blue-500 focus:border-blue-500">
                                    </div>
                                </li>

                                <!-- Saturday -->

                                <li class="w-max flex flex-col items-start gap-4 py-3 px-4 text-sm font-medium bg-white border text-gray-800 rounded-lg">
                                    <div class="flex items-center gap-x-3">
                                        <input id="day-saturday" name="operating-days[]" value="Saturday" type="checkbox"
                                            class="h-4 w-4 border-gray-300 rounded focus:ring-blue-500">
                                        <label for="day-saturday" class="text-sm text-gray-700">Saturday</label>
                                    </div>
                                    <div class="flex items-center gap-2">
                                        <label for="saturday-start-time" class="text-sm text-gray-700">Start:</label>
                                        <input id="saturday-start-time" name="saturday_start_time" type="time"
                                            class="py-2 px-3 border border-gray-300 rounded-lg text-sm focus:ring-blue-500 focus:border-blue-500">
                                        <label for="saturday-end-time" class="text-sm text-gray-700">End:</label>
                                        <input id="saturday-end-time" name="saturday_end_time" type="time"
                                            class="py-2 px-3 border border-gray-300 rounded-lg text-sm focus:ring-blue-500 focus:border-blue-500">
                                    </div>
                                </li>

                                <!-- Sunday -->

                                <li class="w-max flex flex-col items-start gap-4 py-3 px-4 text-sm font-medium bg-white border text-gray-800 rounded-lg">
                                    <div class="flex items-center gap-x-3">
                                        <input id="day-sunday" name="operating-days[]" value="Sunday" type="checkbox"
                                            class="h-4 w-4 border-gray-300 rounded focus:ring-blue-500">
                                        <label for="day-sunday" class="text-sm text-gray-700">Sunday</label>
                                    </div>
                                    <div class="flex items-center gap-2">
                                        <label for="sunday-start-time" class="text-sm text-gray-700">Start:</label>
                                        <input id="sunday-start-time" name="sunday_start_time" type="time"
                                            class="py-2 px-3 border border-gray-300 rounded-lg text-sm focus:ring-blue-500 focus:border-blue-500">
                                        <label for="sunday-end-time" class="text-sm text-gray-700">End:</label>
                                        <input id="sunday-end-time" name="sunday_end_time" type="time"
                                            class="py-2 px-3 border border-gray-300 rounded-lg text-sm focus:ring-blue-500 focus:border-blue-500">
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>


                    <!-- Languages -->
                    <div class="w-full mt-3">
                        <h1 class="text-sm font-medium text-gray-800 mb-4">Languages</h1>
                        <ul class="flex w-max gap-4">

                            <!-- English -->
                            <li
                                class="flex w-max items-center gap-x-2.5 py-3 px-4 text-sm font-medium bg-white border text-gray-800 rounded-lg">
                                <input id="english_language" name="language[]" value="English"
                                    type="checkbox" class="h-3 w-3 border-gray-300 rounded focus:ring-blue-500">
                                <label for="english_language" class="text-sm text-gray-700">English</label>
                            </li>

                            <!-- Amharic -->
                            <li
                                class="flex w-max items-center gap-x-2.5 py-3 px-4 text-sm font-medium bg-white border text-gray-800 rounded-lg">
                                <input id="amharic_language" name="language[]" value="Amharic"
                                    type="checkbox" class="h-3 w-3 border-gray-300 rounded focus:ring-blue-500">
                                <label for="amharic_language" class="text-sm text-gray-700">Amharic</label>
                            </li>

                            <!-- Other -->
                            <li
                                class="flex w-max items-center gap-x-2.5 py-3 px-4 text-sm font-medium bg-white border text-gray-800 rounded-lg">
                                <input id="other_language" name="language[]" value="Other" type="checkbox"
                                    class="h-3 w-3 border-gray-300 rounded focus:ring-blue-500">
                                <label for="other_language" class="text-sm text-gray-700">Other</label>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Financial Information -->
                <div class="space-x-6">
                    <h2 class="text-2xl font-semibold text-gray-800 mb-4">Financial Information</h2>
                    <!-- TIN Number -->
                    <div class="mx-3 w-max">
                        <label for="tin_number" class="block text-sm font-medium text-gray-700">TIN Number</label>
                        <input type="text" id="tin_number" name="tin_number" placeholder="Enter TIN number"
                            class="py-3 border px-4 block w-full border-gray-300 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500"
                            required>

                    </div>

                    <!-- Official Business License -->
                    <div class="mx-3 w-max">
                        <h1 class="text-sm my-2">Official Business License</h1>
                        <label for="business_license" class="sr-only">Choose file</label>
                        <input type="file" name="business_license" id="business_license"
                            class="block w-full border border-gray-200 shadow-sm rounded-lg text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 file:bg-gray-50 file:border-0 file:me-4 file:py-3 file:px-4"
                            required>
                    </div>

                    <!-- Payment Options -->
                    <div class="mt-4">
                        <h1 class="text-sm my-2">Choose Payment Options</h1>
                        <ul class="flex flex-wrap space-x-6">

                            <!-- Mobile Banking -->
                            <li class="inline-flex items-center gap-x-2.5 py-3 px-4 text-sm font-medium bg-white border text-gray-800 rounded-lg">
                                <div class="relative flex items-start w-full">
                                    <div class="flex items-center h-5">
                                        <input id="payment-option-mobile-banking" name="payment_methods[]" value="Mobile Banking" type="checkbox"
                                            class="border-gray-200 rounded disabled:opacity-50" checked="">
                                    </div>
                                    <label for="payment-option-mobile-banking" class="ms-3.5 block w-full text-sm text-gray-600">
                                        Mobile Banking
                                    </label>
                                </div>
                            </li>

                            <!-- Online Payment -->
                            <li class="inline-flex items-center gap-x-2.5 py-3 px-4 text-sm font-medium bg-white border text-gray-800 rounded-lg">
                                <div class="relative flex items-start w-full">
                                    <div class="flex items-center h-5">
                                        <input id="payment-option-online-payment" name="payment_methods[]" value="Credit Card" type="checkbox"
                                            class="border-gray-200 rounded disabled:opacity-50">
                                    </div>
                                    <label for="payment-option-online-payment" class="ms-3.5 block w-full text-sm text-gray-600">
                                        Online Payment
                                    </label>
                                </div>
                            </li>

                            <!-- Cash -->
                            <li class="inline-flex items-center gap-x-2.5 py-3 px-4 text-sm font-medium bg-white border text-gray-800 rounded-lg">
                                <div class="relative flex items-start w-full">
                                    <div class="flex items-center h-5">
                                        <input id="payment-option-cash" name="payment_methods[]" value="Cash" type="checkbox"
                                            class="border-gray-200 rounded disabled:opacity-50">
                                    </div>
                                    <label for="payment-option-cash" class="ms-3.5 block w-full text-sm text-gray-600">
                                        Cash
                                    </label>
                                </div>
                            </li>
                        </ul>

                    </div>
                </div>


                <!-- Admin Information -->

                <div class="space-y-6">
                    <h2 class="text-2xl font-semibold text-gray-800 mb-4">Admin Information</h2>

                    <!-- Admin Name -->
                    <div class="flex flex-wrap space-x-6">
                        <div class="flex-1">
                            <label for="admin_name" class="block text-sm font-medium text-gray-700">Admin
                                Name</label>
                            <input type="text" id="admin_name" name="admin_name" placeholder="Enter Admin's full name"
                                class="py-3 border px-4 block w-full border-gray-300 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500">
                        </div>

                        <!-- Admin Contact Number -->
                        <div class="flex-1">
                            <label for="admin_contact" class="block text-sm font-medium text-gray-700">Admin Contact
                                Number</label>
                            <input type="text" id="admin_contact" name="admin_contact"
                                placeholder="Enter Admin's contact number"
                                class="py-3 border px-4 block w-full border-gray-300 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500">
                        </div>

                        <!-- Admin Email -->
                        <div class="flex-1">
                            <label for="admin_email" class="block text-sm font-medium text-gray-700">Admin Email</label>
                            <input type="email" id="admin_email" name="admin_email"
                                placeholder="Enter Admin's email"
                                class="py-3 border px-4 block w-full border-gray-300 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500">
                        </div>

                        <!-- Admin Password -->
                        <!-- <div class="flex-1">
                            <label for="admin_password" class="block text-sm font-medium text-gray-700">Admin Password</label>
                            <input type="password" id="admin_password" name="admin_password"
                                placeholder="Enter Admin's password location"
                                class="py-3 border px-4 block w-full border-gray-300 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500">
                        </div> -->
                    </div>

                    <!-- File Uploads for Admin ID and Employment Document -->
                    <div class="flex items-center gap-6">
                        <!-- Admin ID Image Upload -->
                        <div class="flex-1">
                            <label for="admin_id_card" class="block text-sm font-medium text-gray-700">Admin ID
                                Image</label>
                            <input type="file" id="admin_id_card" name="admin_id_card"
                                class="block w-full border border-gray-200 shadow-sm rounded-lg text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 file:bg-gray-50 file:border-0 file:me-4 file:py-3 file:px-4">
                        </div>

                        <!-- Admin Employment Document Upload -->
                        <div class="flex-1">
                            <label for="admin_employment_document" class="block text-sm font-medium text-gray-700">Admin
                                Employment Document</label>
                            <input type="file" id="admin_employment_document" name="admin_employment_document"
                                class="block w-full border border-gray-200 shadow-sm rounded-lg text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 file:bg-gray-50 file:border-0 file:me-4 file:py-3 file:px-4">
                        </div>

                    </div>

                </div>


                <!-- Submit Button -->
                <div class="flex justify-center">
                    <button type="submit"
                        class="bg-indigo-600 hover:bg-indigo-700 text-white font-medium py-2 px-4 rounded-lg shadow-md transition duration-300">
                        Register Cinema
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Footer -->
    <?php
    require_once __DIR__ . '/includes/footer.php';

    ?>

</body>

</html>