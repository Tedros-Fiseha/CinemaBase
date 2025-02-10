<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cashier</title>
    <script src="https://cdn.tailwindcss.com"></script>

</head>

<body class="font-[poppins] bg-gray-100">

    <?php
    include_once 'sidebar.php';
    ?>

    <main class="ml-[300px] p-10">
        <?php include_once __DIR__ . "/../../includes/dashboardHeader.php"; ?>


        <!-- Cashier Management Table -->
        <div class="bg-white shadow-md rounded-sm p-6 mb-8 mt-20">
            <h2 class="text-xl font-semibold text-gray-700 pb-4 border-b">Cashier List</h2>
            <div class="overflow-auto mt-4">
                <table class="min-w-full table-auto">
                    <thead>
                        <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                            <th class="py-3 px-6 text-left">Cinema ID</th>
                            <th class="py-3 px-6 text-left">Full Name</th>
                            <th class="py-3 px-6 text-left">Phone</th>
                            <th class="py-3 px-6 text-left">Username</th>
                            <th class="py-3 px-6 text-left">Created At</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-600 text-sm font-light">
                        <?php foreach ($cashiers as $cashier): ?>
                            <tr class="border-b border-gray-200 hover:bg-gray-100">
                                <td class="py-3 px-6"><?= htmlspecialchars($cashier['cinema_id']) ?></td>
                                <td class="py-3 px-6"><?= htmlspecialchars($cashier['fullname']) ?></td>
                                <td class="py-3 px-6"><?= htmlspecialchars($cashier['phone']) ?></td>
                                <td class="py-3 px-6"><?= htmlspecialchars($cashier['username']) ?></td>
                                <td class="py-3 px-6"><?= htmlspecialchars($cashier['created_at']) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>

</body>

</html>