<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tickets</title>
    <script src="https://cdn.tailwindcss.com"></script>

</head>

<body class="font-[poppins] bg-gray-100">

    <?php
    include_once 'sidebar.php';
    ?>

    <main class="ml-[300px] p-10">
        <?php include_once __DIR__ . "/../../includes/dashboardHeader.php"; ?>


        <!-- Ticket Management Section -->
        <div class="bg-white shadow-md rounded-sm p-6 mb-8 mt-20">
            <div class="flex justify-between items-center pb-4 border-b">
                <h2 class="text-xl font-semibold text-gray-700">Manage Tickets</h2>
            </div>
            <div class="mt-4">
                <!-- Booking overview (could be replaced with dynamic data) -->
                <div class="grid grid-cols-3 gap-6">
                    <div class="bg-blue-100 p-4 rounded-md shadow-md">
                        <h3 class="text-lg font-semibold text-gray-700">Available Seats</h3>
                        <p class="text-2xl text-blue-600 font-bold">120</p>
                    </div>
                    <div class="bg-green-100 p-4 rounded-md shadow-md">
                        <h3 class="text-lg font-semibold text-gray-700">Booked Seats</h3>
                        <p class="text-2xl text-green-600 font-bold">80</p>
                    </div>
                    <div class="bg-red-100 p-4 rounded-md shadow-md">
                        <h3 class="text-lg font-semibold text-gray-700">Remaining Seats</h3>
                        <p class="text-2xl text-red-600 font-bold">40</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Booking History Section -->
        <div class="bg-white shadow-md rounded-sm p-6 mb-8">
            <h2 class="text-xl font-semibold text-gray-700 pb-4 border-b">Booking History</h2>
            <div class="overflow-auto mt-4">
                <table class="min-w-full table-auto">
                    <thead>
                        <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                            <th class="py-3 px-6 text-left">Customer Name</th>
                            <th class="py-3 px-6 text-left">Movie Title</th>
                            <th class="py-3 px-6 text-center">Seats</th>
                            <th class="py-3 px-6 text-center">Date</th>
                            <th class="py-3 px-6 text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-600 text-sm font-light">
                        <tr class="border-b border-gray-200 hover:bg-gray-100">
                            <td class="py-3 px-6 text-left whitespace-nowrap">John Doe</td>
                            <td class="py-3 px-6 text-left">Avengers: Endgame</td>
                            <td class="py-3 px-6 text-center">3 (A12, A13, A14)</td>
                            <td class="py-3 px-6 text-center">2024-10-02</td>
                            <td class="py-3 px-6 text-center">
                                <div class="flex item-center justify-center space-x-2">
                                    <button class="w-6 h-6 text-blue-700 hover:text-blue-800">Edit</button>
                                    <button class="w-6 h-6 text-red-700 hover:text-red-800">Delete</button>
                                </div>
                            </td>
                        </tr>
                        <!-- Additional rows can go here -->
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Filter Section -->
        <div class="flex justify-between items-center">
            <div class="flex space-x-4">
                <input type="text" placeholder="Search by customer"
                    class="px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-300" />
                <input type="date"
                    class="px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-300" />
            </div>
            <button class="bg-gray-500 text-white px-4 py-2 rounded-full hover:bg-gray-600">
                Clear Filters
            </button>
        </div>
    </main>

</body>

</html>