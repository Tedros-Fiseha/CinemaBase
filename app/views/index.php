<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" sizes="256x256" href="/assets/cinema.png" />
    <link rel="stylesheet" href="">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Cinema Plus</title>
</head>

<body class="font-[poppins]">
    <!-- Header Section -->
    <div class="bg-white relative">
        <?php
        require_once __DIR__ . '/includes/header.php';
        ?>

        <!-- Hero Section -->
        <div id="home" class="relative pt-24 isolate px-6 lg:px-8">
            <div class="mx-auto max-w-4xl pt-24 pb-12">
                <div class="text-center">
                    <h1 class="text-balance text-5xl font-semibold tracking-tight text-gray-900 sm:text-7xl">Showcase
                        Your Cinema, Attract More Audience!</h1>
                    <p class="mt-8 text-pretty text-lg font-medium text-gray-500 sm:text-xl/8">Join our platform to
                        connect your cinema with thousands of movie enthusiasts. Manage showtimes, promote your
                        screenings, and grow your audience—all in one place!</p>
                    <div class="mt-10 flex items-center justify-center gap-x-6">
                        <a href="/cinema/register"
                            class="rounded-md bg-indigo-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Get
                            started</a>
                        <a href="#" class="text-sm/6 font-semibold text-gray-900">Learn more <span
                                aria-hidden="true">→</span></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Stat Section -->
    <div class="bg-white pb-24">
        <div class="mx-auto px-12 max-w-7xl px-6 lg:px-8">
            <h2 class="text-center text-3xl font-semibold text-gray-900 py-10">Audience Engagment</h2>
            <dl class="grid grid-cols-1 gap-x-8 gap-y-16 text-center lg:grid-cols-3">
                <div class="mx-auto flex max-w-xs flex-col gap-y-4">
                    <dt class="text-base/7 text-gray-600">Transactions every 24 hours</dt>
                    <dd class="order-first text-3xl font-semibold tracking-tight text-gray-900 sm:text-5xl">44 million
                    </dd>
                </div>
                <div class="mx-auto flex max-w-xs flex-col gap-y-4">
                    <dt class="text-base/7 text-gray-600">Assets under holding</dt>
                    <dd class="order-first text-3xl font-semibold tracking-tight text-gray-900 sm:text-5xl">$119
                        trillion</dd>
                </div>
                <div class="mx-auto flex max-w-xs flex-col gap-y-4">
                    <dt class="text-base/7 text-gray-600">New users annually</dt>
                    <dd class="order-first text-3xl font-semibold tracking-tight text-gray-900 sm:text-5xl">46,000</dd>
                </div>
            </dl>
        </div>
        <div class="absolute inset-x-0 top-[calc(100%-13rem)] -z-10 transform-gpu overflow-hidden blur-3xl sm:top-[calc(100%-30rem)]"
            aria-hidden="true">
            <div class="relative left-[calc(50%+3rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 bg-gradient-to-tr from-[#ff80b5] to-[#9089fc] opacity-30 sm:left-[calc(50%+36rem)] sm:w-[72.1875rem]"
                style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)">
            </div>
        </div>
    </div>
    </div>


    <!-- Trusted By Section -->
    <div class="bg-white">
        <div class="mx-auto px-12 max-w-7xl px-6 lg:px-8">
            <h2 class="text-center text-3xl font-semibold text-gray-900">Trusted by the country's most renowned cinemas
            </h2>
            <div
                class="mx-auto mt-10 grid max-w-lg grid-cols-4 items-center gap-x-8 gap-y-10 sm:max-w-xl sm:grid-cols-6 sm:gap-x-10 lg:mx-0 lg:max-w-none lg:grid-cols-5">
                <img class="col-span-2 max-h-12 w-full object-contain lg:col-span-1"
                    src="https://tailwindui.com/plus/img/logos/158x48/transistor-logo-gray-900.svg" alt="Transistor"
                    width="158" height="48">
                <img class="col-span-2 max-h-12 w-full object-contain lg:col-span-1"
                    src="https://tailwindui.com/plus/img/logos/158x48/reform-logo-gray-900.svg" alt="Reform" width="158"
                    height="48">
                <img class="col-span-2 max-h-12 w-full object-contain lg:col-span-1"
                    src="https://tailwindui.com/plus/img/logos/158x48/tuple-logo-gray-900.svg" alt="Tuple" width="158"
                    height="48">
                <img class="col-span-2 max-h-12 w-full object-contain sm:col-start-2 lg:col-span-1"
                    src="https://tailwindui.com/plus/img/logos/158x48/savvycal-logo-gray-900.svg" alt="SavvyCal"
                    width="158" height="48">
                <img class="col-span-2 col-start-2 max-h-12 w-full object-contain sm:col-start-auto lg:col-span-1"
                    src="https://tailwindui.com/plus/img/logos/158x48/statamic-logo-gray-900.svg" alt="Statamic"
                    width="158" height="48">
            </div>
        </div>
    </div>


    <!-- Features Section -->
    <div id="features" class="bg-white pt-24">
        <div class="mx-auto px-12 max-w-7xl px-6 lg:px-8">
            <div class="mx-auto max-w-2xl lg:text-center">
                <h2 class="text-5xl font-semibold text-indigo-600">Features</h2>
            </div>
            <div class="mx-auto mt-16 max-w-2xl sm:mt-20 lg:mt-24 lg:max-w-4xl">
                <dl class="grid max-w-xl grid-cols-1 gap-x-8 gap-y-10 lg:max-w-none lg:grid-cols-2 lg:gap-y-16">
                    <div class="relative pl-16">
                        <dt class="text-base/7 font-semibold text-gray-900">
                            <div
                                class="absolute left-0 top-0 flex size-10 items-center justify-center rounded-lg bg-indigo-600">
                                <svg class="size-6 text-white" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                    stroke="currentColor" aria-hidden="true" data-slot="icon">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M12 16.5V9.75m0 0 3 3m-3-3-3 3M6.75 19.5a4.5 4.5 0 0 1-1.41-8.775 5.25 5.25 0 0 1 10.233-2.33 3 3 0 0 1 3.758 3.848A3.752 3.752 0 0 1 18 19.5H6.75Z" />
                                </svg>
                            </div>
                            List your cinema with ease
                        </dt>
                        <dd class="mt-2 text-base/7 text-gray-600">Easily add your cinema details to our platform,
                            making it accessible to moviegoers with minimal effort.</dd>
                    </div>
                    <div class="relative pl-16">
                        <dt class="text-base/7 font-semibold text-gray-900">
                            <div
                                class="absolute left-0 top-0 flex size-10 items-center justify-center rounded-lg bg-indigo-600">
                                <svg class="size-6 text-white" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                    stroke="currentColor" aria-hidden="true" data-slot="icon">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M16.5 10.5V6.75a4.5 4.5 0 1 0-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 0 0 2.25-2.25v-6.75a2.25 2.25 0 0 0-2.25-2.25H6.75a2.25 2.25 0 0 0-2.25 2.25v6.75a2.25 2.25 0 0 0 2.25 2.25Z" />
                                </svg>
                            </div>
                            Manage showtimes and bookings seamlessly
                        </dt>
                        <dd class="mt-2 text-base/7 text-gray-600">Organize movie schedules and handle ticket bookings
                            efficiently, all from a single user-friendly dashboard.</dd>
                    </div>
                    <div class="relative pl-16">
                        <dt class="text-base/7 font-semibold text-gray-900">
                            <div
                                class="absolute left-0 top-0 flex size-10 items-center justify-center rounded-lg bg-indigo-600">
                                <svg class="size-6 text-white" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                    stroke="currentColor" aria-hidden="true" data-slot="icon">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0 3.181 3.183a8.25 8.25 0 0 0 13.803-3.7M4.031 9.865a8.25 8.25 0 0 1 13.803-3.7l3.181 3.182m0-4.991v4.99" />
                                </svg>
                            </div>
                            Reach a broader audience with our platform
                        </dt>
                        <dd class="mt-2 text-base/7 text-gray-600">Quisque est vel vulputate cursus. Risus proin diam
                            nunc commodo. Lobortis auctor congue commodo diam neque.</dd>
                    </div>
                    <div class="relative pl-16">
                        <dt class="text-base/7 font-semibold text-gray-900">
                            <div
                                class="absolute left-0 top-0 flex size-10 items-center justify-center rounded-lg bg-indigo-600">
                                <svg class="size-6 text-white" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                    stroke="currentColor" aria-hidden="true" data-slot="icon">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M7.864 4.243A7.5 7.5 0 0 1 19.5 10.5c0 2.92-.556 5.709-1.568 8.268M5.742 6.364A7.465 7.465 0 0 0 4.5 10.5a7.464 7.464 0 0 1-1.15 3.993m1.989 3.559A11.209 11.209 0 0 0 8.25 10.5a3.75 3.75 0 1 1 7.5 0c0 .527-.021 1.049-.064 1.565M12 10.5a14.94 14.94 0 0 1-3.6 9.75m6.633-4.596a18.666 18.666 0 0 1-2.485 5.33" />
                                </svg>
                            </div>
                            Allow Getting Tickets from Anywhere
                        </dt>
                        <dd class="mt-2 text-base/7 text-gray-600">Let customers conveniently book tickets online from
                            any location, making the experience hassle-free and accessible.</dd>
                    </div>
                </dl>
            </div>
        </div>
    </div>

    <!-- FAQ Sections -->
    <div id="faq" class="bg-white pt-24 pb-12">
        <div class="max-w-4xl px-12 mx-auto px-6">
            <h2 class="text-3xl font-bold text-indigo-600 text-center mb-8">Frequently Asked Questions</h2>
            <div class="space-y-6">

                <!-- Question 1 -->
                <div
                    class="bg-white rounded-lg shadow-md p-6 transition-transform transform hover:scale-105 hover:shadow-xl">
                    <button class="w-full text-left flex justify-between items-center"
                        onclick="toggleAnswer('answer1')">
                        <h3 class="text-lg font-semibold text-gray-800">How do I register my cinema on the platform?
                        </h3>
                        <svg class="w-6 h-6 text-gray-600 transform rotate-0 transition-transform" id="icon1"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div id="answer1"
                        class="mt-4 text-gray-600 max-h-0 overflow-hidden transition-all duration-500 ease-in-out">
                        <p>To register your cinema, click on the “Register" button on the homepage and fill out the
                            required details, including your cinema’s name, location, contact information, and
                            facilities. Once submitted, our team will review and approve your listing within 24-48
                            hours.</p>
                    </div>
                </div>

                <!-- Question 2 -->
                <div
                    class="bg-white rounded-lg shadow-md p-6 transition-transform transform hover:scale-105 hover:shadow-xl">
                    <button class="w-full text-left flex justify-between items-center"
                        onclick="toggleAnswer('answer2')">
                        <h3 class="text-lg font-semibold text-gray-800">Can I add multiple locations for my cinema
                            chain?</h3>
                        <svg class="w-6 h-6 text-gray-600 transform rotate-0 transition-transform" id="icon2"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div id="answer2"
                        class="mt-4 text-gray-600 max-h-0 overflow-hidden transition-all duration-500 ease-in-out">
                        <p>You can track your order using the tracking number provided in your confirmation email.</p>
                    </div>
                </div>

                <!-- Question 3 -->
                <div
                    class="bg-white rounded-lg shadow-md p-6 transition-transform transform hover:scale-105 hover:shadow-xl">
                    <button class="w-full text-left flex justify-between items-center"
                        onclick="toggleAnswer('answer3')">
                        <h3 class="text-lg font-semibold text-gray-800">How do I update showtimes and ticket pricing?
                        </h3>
                        <svg class="w-6 h-6 text-gray-600 transform rotate-0 transition-transform" id="icon3"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div id="answer3"
                        class="mt-4 text-gray-600 max-h-0 overflow-hidden transition-all duration-500 ease-in-out">
                        <p>Log in to your account and navigate to the “Showtimes & Pricing” section. From there, you can
                            edit existing showtimes, add new ones, or update ticket prices. Changes will reflect
                            instantly on the platform for customers to see.</p>
                    </div>
                </div>


                <!-- Question 4 -->
                <div
                    class="bg-white rounded-lg shadow-md p-6 transition-transform transform hover:scale-105 hover:shadow-xl">
                    <button class="w-full text-left flex justify-between items-center"
                        onclick="toggleAnswer('answer4')">
                        <h3 class="text-lg font-semibold text-gray-800">Is there a fee for listing my cinema?</h3>
                        <svg class="w-6 h-6 text-gray-600 transform rotate-0 transition-transform" id="icon4"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div id="answer4"
                        class="mt-4 text-gray-600 max-h-0 overflow-hidden transition-all duration-500 ease-in-out">
                        <p>We offer flexible pricing plans based on your cinema's needs. There’s no upfront fee for
                            basic registration, but premium features, such as advanced analytics and promotional tools,
                            may incur additional costs. Visit our pricing page for details.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Contact Sections -->
    <div id="contact" class="isolate bg-white px-6 pt-24 pb-12">

        <div class="mx-auto max-w-2xl text-center">
            <h2 class="text-balance text-4xl font-semibold tracking-tight text-indigo-600 sm:text-5xl">Contact</h2>
            <p class="mt-2 text-lg/8 text-gray-600">Feel free to reach use for any questions or sugesstions. We are
                always happy to help you.</p>
        </div>
        <form action="#" method="POST" class="mx-auto mt-8 max-w-xl">
            <div class="grid grid-cols-1 gap-x-8 gap-y-6 sm:grid-cols-2">
                <div>
                    <label for="first-name" class="block text-sm/6 font-semibold text-gray-900">First name</label>
                    <div class="mt-2.5">
                        <input type="text" name="first-name" id="first-name" autocomplete="given-name"
                            class="block w-full rounded-md bg-white px-3.5 py-2 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600">
                    </div>
                </div>
                <div>
                    <label for="last-name" class="block text-sm/6 font-semibold text-gray-900">Last name</label>
                    <div class="mt-2.5">
                        <input type="text" name="last-name" id="last-name" autocomplete="family-name"
                            class="block w-full rounded-md bg-white px-3.5 py-2 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600">
                    </div>
                </div>
                <div>
                    <label for="company" class="block text-sm/6 font-semibold text-gray-900">Company</label>
                    <div class="mt-2.5">
                        <input type="text" name="company" id="company" autocomplete="organization"
                            class="block w-full rounded-md bg-white px-3.5 py-2 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600">
                    </div>
                </div>
                <div>
                    <label for="email" class="block text-sm/6 font-semibold text-gray-900">Email</label>
                    <div class="mt-2.5">
                        <input type="email" name="email" id="email" autocomplete="email"
                            class="block w-full rounded-md bg-white px-3.5 py-2 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600">
                    </div>
                </div>
                <div>
                    <label for="phone-number" class="block text-sm/6 font-semibold text-gray-900">Phone number</label>
                    <div class="mt-2.5">
                        <div
                            class="flex rounded-md bg-white outline outline-1 -outline-offset-1 outline-gray-300 has-[input:focus-within]:outline has-[input:focus-within]:outline-2 has-[input:focus-within]:-outline-offset-2 has-[input:focus-within]:outline-indigo-600">
                            <div class="grid shrink-0 grid-cols-1 focus-within:relative">
                                <select id="country" name="country" autocomplete="country" aria-label="Country"
                                    class="col-start-1 row-start-1 w-full appearance-none rounded-md py-2 pl-3.5 pr-7 text-base text-gray-500 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                                    <option>ET</option>
                                    <option>US</option>
                                    <option>CA</option>
                                    <option>EU</option>
                                </select>
                                <svg class="pointer-events-none col-start-1 row-start-1 mr-2 size-5 self-center justify-self-end text-gray-500 sm:size-4"
                                    viewBox="0 0 16 16" fill="currentColor" aria-hidden="true" data-slot="icon">
                                    <path fill-rule="evenodd"
                                        d="M4.22 6.22a.75.75 0 0 1 1.06 0L8 8.94l2.72-2.72a.75.75 0 1 1 1.06 1.06l-3.25 3.25a.75.75 0 0 1-1.06 0L4.22 7.28a.75.75 0 0 1 0-1.06Z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                            <input type="text" name="phone-number" id="phone-number"
                                class="block min-w-0 grow py-1.5 pl-1 pr-3 text-base text-gray-900 placeholder:text-gray-400 focus:outline focus:outline-0 sm:text-sm/6"
                                placeholder="123-456-7890">
                        </div>
                    </div>
                </div>
                <div>
                    <label for="message" class="block text-sm/6 font-semibold text-gray-900">Message</label>
                    <div class="mt-2.5">
                        <textarea id="facilities" name="facilities" placeholder="Your Message" rows="3" cols="30"
                            class="resize-none py-3 border px-4 block w-full border-gray-300 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500"></textarea>
                    </div>
                </div>

            </div>
            <div class="mt-10">
                <button type="submit"
                    class="block w-full rounded-md bg-indigo-600 px-3.5 py-2.5 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Let's
                    talk</button>
            </div>
        </form>
    </div>
    <?php
    require_once __DIR__ . '/includes/footer.php';
    ?>

</body>

</html>


<script>
    function toggleAnswer(id) {
        const answer = document.getElementById(id);
        const icon = document.querySelector(`#${id} ~ button svg`);

        // Toggle the visibility of the answer
        answer.classList.toggle('max-h-0');
        answer.classList.toggle('max-h-[1000px]');

        // Rotate the icon when expanded
        icon.classList.toggle('rotate-180');
    }
</script>