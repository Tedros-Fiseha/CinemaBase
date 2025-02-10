<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="font-[poppins] bg-gray-100">
    <?php include_once 'sidebar.php' ?>

    <!-- Main Content -->
    <main class="ml-[300px] flex-1 p-10">

    <?php include_once __DIR__ . "/../../includes/dashboardHeader.php"; ?>


        <!-- Push Content Below Fixed Header -->
        <div class="mt-20">
            <h2 class="text-2xl font-bold mb-4">Dashboard Overview</h2>

            <!-- Cards -->
            <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                <div class="bg-blue-500 text-white p-6 rounded-lg shadow">Total Sales</div>
                <div class="bg-green-500 text-white p-6 rounded-lg shadow">Total Users</div>
                <div class="bg-yellow-500 text-white p-6 rounded-lg shadow">Total Movies</div>
            </div>

        </div>

    </main>

</body>

</html>