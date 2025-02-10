<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movies</title>
    <script src="https://cdn.tailwindcss.com"></script>

</head>

<body class="font-[poppins] bg-gray-100">

    <?php
    include_once 'sidebar.php';
    ?>

    <main class="ml-[300px] p-10">
    <?php include_once __DIR__ . "/../../includes/dashboardHeader.php"; ?>


        <div class="bg-white shadow-md rounded-sm p-6 mb-8 mt-20">
            <h2 class="text-xl font-semibold text-gray-700 pb-4 border-b">Movie List</h2>
            <div class="overflow-auto mt-4">
                <table class="min-w-full table-auto">
                    <thead>
                        <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                            <th class="py-3 px-6 text-left">ID</th>
                            <th class="py-3 px-6 text-left">Cinema ID</th>
                            <th class="py-3 px-6 text-left">Title</th>
                            <th class="py-3 px-6 text-left">Poster</th>
                            <th class="py-3 px-6 text-left">Overview</th>
                            <th class="py-3 px-6 text-left">Release Date</th>
                            <th class="py-3 px-6 text-left">Runtime</th>
                            <th class="py-3 px-6 text-left">Genre</th>
                            <th class="py-3 px-6 text-left">Rating</th>
                            <th class="py-3 px-6 text-left">Created At</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-600 text-sm font-light">
                        <?php foreach ($movies as $movie): ?>
                            <tr class="border-b border-gray-200 hover:bg-gray-100">
                                <td class="py-3 px-6 text-left"><?php echo htmlspecialchars($movie['id']); ?></td>
                                <td class="py-3 px-6 text-left"><?php echo htmlspecialchars($movie['cinema_id']); ?></td>
                                <td class="py-3 px-6 text-left"><?php echo htmlspecialchars($movie['title']); ?></td>
                                <td class="py-3 px-6 text-left">
                                    <img src="<?php echo htmlspecialchars($movie['poster']); ?>" alt="Poster" class="h-16 w-auto">
                                </td>
                                <td class="py-3 px-6 text-left truncate w-48"><?php echo htmlspecialchars($movie['overview']); ?></td>
                                <td class="py-3 px-6 text-left"><?php echo htmlspecialchars($movie['release_date']); ?></td>
                                <td class="py-3 px-6 text-left"><?php echo htmlspecialchars($movie['runtime']); ?> mins</td>
                                <td class="py-3 px-6 text-left"><?php echo htmlspecialchars($movie['genre']); ?></td>
                                <td class="py-3 px-6 text-left"><?php echo htmlspecialchars($movie['rating']); ?></td>
                                <td class="py-3 px-6 text-left"><?php echo htmlspecialchars($movie['created_at']); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>

</body>

</html>