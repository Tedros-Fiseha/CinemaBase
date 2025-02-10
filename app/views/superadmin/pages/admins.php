<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admins</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body class="font-[poppins] bg-gray-100">

    <?php include_once 'sidebar.php'; ?>

    <main class="ml-[300px] p-10">
        <?php include_once __DIR__ . "/../../includes/dashboardHeader.php"; ?>

        <!-- Summary Section -->
        <div class="bg-white shadow-md rounded-sm p-6 mb-8 mt-20">
            <h2 class="text-xl font-semibold text-gray-700 pb-4 border-b">Admin Dashboard</h2>

            <div class="flex justify-between items-center mt-4">
                <!-- Total Admins Card -->
                <div class="bg-blue-500 text-white p-4 rounded-md shadow-md">
                    <h3 class="text-lg">Total Admins</h3>
                    <p class="text-2xl font-bold"><?php echo $totalAdmins; ?></p>
                </div>
            </div>
        </div>

        <!-- Chart Section -->
        <div class="bg-white shadow-md rounded-sm p-6 mb-8">
            <h2 class="text-xl font-semibold text-gray-700 pb-4 border-b">Admins Per Cinema</h2>
            <canvas id="adminChart" class="mt-4"></canvas>
        </div>

        <!-- Admins Table -->
        <div class="bg-white shadow-md rounded-sm p-6 mb-8">
            <h2 class="text-xl font-semibold text-gray-700 pb-4 border-b">Admin List</h2>
            <div class="overflow-auto mt-4">
                <table class="min-w-full table-auto">
                    <thead>
                        <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                            <th class="py-3 px-6 text-left">ID</th>
                            <th class="py-3 px-6 text-left">Cinema ID</th>
                            <th class="py-3 px-6 text-left">Admin Name</th>
                            <th class="py-3 px-6 text-left">Contact</th>
                            <th class="py-3 px-6 text-left">Email</th>
                            <th class="py-3 px-6 text-left">Created At</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-600 text-sm font-light">
                        <?php foreach ($admins as $admin): ?>
                            <tr class="border-b border-gray-200 hover:bg-gray-100">
                                <td class="py-3 px-6 text-left"><?php echo htmlspecialchars($admin['id']); ?></td>
                                <td class="py-3 px-6 text-left"><?php echo htmlspecialchars($admin['cinema_id']); ?></td>
                                <td class="py-3 px-6 text-left"><?php echo htmlspecialchars($admin['admin_name']); ?></td>
                                <td class="py-3 px-6 text-left"><?php echo htmlspecialchars($admin['admin_contact']); ?></td>
                                <td class="py-3 px-6 text-left"><?php echo htmlspecialchars($admin['admin_email']); ?></td>
                                <td class="py-3 px-6 text-left"><?php echo htmlspecialchars($admin['created_at']); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>

    <script>
        // Admins Per Cinema Chart
        const ctx = document.getElementById('adminChart').getContext('2d');
        const adminChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: <?php echo json_encode(array_keys($cinemaCounts)); ?>,
                datasets: [{
                    label: 'Admins per Cinema',
                    data: <?php echo json_encode(array_values($cinemaCounts)); ?>,
                    backgroundColor: 'rgba(54, 162, 235, 0.6)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>

</body>

</html>