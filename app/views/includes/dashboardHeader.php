<header class="fixed top-0 left-[300px] w-[calc(100%-300px)] bg-white shadow-md p-4 flex justify-between items-center z-50">
    <form action="">
        <input type="text" class="border border-gray-300 px-4 py-2 rounded" placeholder="Search...">
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Search</button>
    </form>
    <div class="flex items-center space-x-4">
        <span class="font-bold text-gray-700">
            <?= isset($_SESSION['email']) ? $_SESSION['email'] : 'Guest' ?>
        </span>
        <form action="/logout" method="GET">
            <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">Logout</button>
        </form>
    </div>
</header>