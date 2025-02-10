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


        <div class="bg-white shadow-md rounded-sm p-6 mb-8 mt-20">
            <h2 class="text-xl font-semibold text-gray-700 pb-4 border-b">Registered App Users</h2>
            <div class="overflow-auto mt-4">
                <table class="min-w-full table-auto">
                    <thead>
                        <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                            <th class="py-3 px-6 text-left">User ID</th>
                            <th class="py-3 px-6 text-left">Username</th>
                            <th class="py-3 px-6 text-left">Phone Number</th>
                            <th class="py-3 px-6 text-left">Created At</th>
                            <th class="py-3 px-6 text-center">Actions</th>

                        </tr>
                    </thead>
                    <tbody class="text-gray-600 text-sm font-light">
                        <?php foreach ($appUsers as $user): ?>
                            <tr class="border-b border-gray-200 hover:bg-gray-100">
                                <td class="py-3 px-6 text-left"><?php echo htmlspecialchars($user['user_id']); ?></td>
                                <td class="py-3 px-6 text-left"><?php echo htmlspecialchars($user['username']); ?></td>
                                <td class="py-3 px-6 text-left"><?php echo htmlspecialchars($user['phone_no']); ?></td>
                                <td class="py-3 px-6 text-left"><?php echo htmlspecialchars($user['created_at']); ?></td>
                                <td class="py-3 px-6 text-center">
                                    <div class="flex item-center justify-center space-x-2">
                                        <button class="w-6 h-6 text-blue-700 hover:text-blue-800">Edit</button>
                                        <button class="w-6 h-6 text-red-700 hover:text-red-800">Delete</button>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>

</body>

</html>