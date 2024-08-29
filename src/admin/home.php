<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- flowbite -->
    <link rel="stylesheet" href="../../node_modules/flowbite/dist/flowbite.min.css">
    <script src="../../node_modules/flowbite/dist/flowbite.min.js"></script>

    <!-- tailwind -->
    <link href="../output.css" rel="stylesheet">

    <!-- alpine -->
    <script src="../../public/script.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@9.0.3"></script>

    <style>
    #selection-table .noSort svg {
        display: none;
    }

    .test {
        border: 1px solid red;
    }

    .main-text {
        margin-top: 5rem;
        margin-bottom: 1rem;
    }

    .main {
        margin-top: 0rem;
        padding-top: 2rem;
    }

    .navbar {
        position: fixed;
    }

    .container-box {
        flex-direction: column;
    }

    @media (min-width: 640px) {
        .container-box {
            padding: 0 0;
            flex-direction: row;
        }

        .main-text {
            margin-top: 0rem;
            margin-bottom: 1rem;
        }

        .main {
            margin-left: 5rem;
            margin-top: 1.25rem;
        }

        .navbar {
            position: fixed;
            flex-direction: column;
        }

    }

    @media (min-width : 768px) {
        .navbar {
            width: 200px;
        }
    }
    </style>
</head>

<body class='__className_aaf875 antialiased'>
    <div class='test flex flex-col h-screen md:overflow-hidden'>

        <!-- navbar -->
        <div
            class="navbar flex flex-col items-center w-full sm:h-screen sm:py-8 overflow-y-auto bg-white sm:border-r rtl:border-l rtl:border-r-0 ">
            <nav class="px-3 pb-4 w-full flex flex-col flex-1 sm:space-y-6">

                <div class='flex justify-center h-20 '>
                    <a href="#">
                        <img class="w-auto h-6 " src="https://merakiui.com/images/logo.svg" alt="">
                    </a>
                </div>

                <!-- for large screen from (table to latop  & desktop) -->
                <div class='w-full h-full hidden sm:flex  flex-col px-0 items-center justify-between'>
                    <div class='w-full flex flex-col gap-4 mt-5'>
                        <a href=""
                            class="flex h-[48px] grow items-center justify-center gap-2 rounded-md p-3 text-sm font-medium hover:bg-sky-100 hover:text-blue-600 md:flex-none md:justify-start md:p-2 md:px-3 bg-sky-100 text-blue-600">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="#000000" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                            </svg>
                            <p class="hidden md:block">Home</p>
                        </a>
                        <a href=""
                            class='flex h-[48px] grow items-center justify-center gap-2 rounded-md p-3 text-sm font-medium hover:bg-sky-100 hover:text-blue-600 md:flex-none md:justify-start md:p-2 md:px-3 bg-sky-100 text-blue-600'>
                            <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                <g id="SVGRepo_iconCarrier">
                                    <rect x="5" y="4" width="14" height="17" rx="2" stroke="#000000"></rect>
                                    <path d="M9 9H15" stroke="#000000" stroke-linecap="round"></path>
                                    <path d="M9 13H15" stroke="#000000" stroke-linecap="round"></path>
                                    <path d="M9 17H13" stroke="#000000" stroke-linecap="round"></path>
                                </g>
                            </svg>
                            <p class="hidden md:block">Home</p>
                        </a>
                        <a href=""
                            class='flex h-[48px] grow items-center justify-center gap-2 rounded-md p-3 text-sm font-medium hover:bg-sky-100 hover:text-blue-600 md:flex-none md:justify-start md:p-2 md:px-3 bg-sky-100 text-blue-600'>
                            <svg class='w-6 h-6' viewBox="0 0 1024 1024" fill="#000000" class="icon" version="1.1"
                                xmlns="http://www.w3.org/2000/svg">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                <g id="SVGRepo_iconCarrier">
                                    <path
                                        d="M959.018 208.158c0.23-2.721 0.34-5.45 0.34-8.172 0-74.93-60.96-135.89-135.89-135.89-1.54 0-3.036 0.06-6.522 0.213l-611.757-0.043c-1.768-0.085-3.563-0.17-5.424-0.17-74.812 0-135.67 60.84-135.67 135.712l0.188 10.952h-0.306l0.391 594.972-0.162 20.382c0 74.03 60.22 134.25 134.24 134.25 1.668 0 7.007-0.239 7.1-0.239l608.934 0.085c2.985 0.357 6.216 0.468 9.55 0.468 35.815 0 69.514-13.954 94.879-39.302 25.373-25.34 39.344-58.987 39.344-94.794l-0.145-12.015h0.918l-0.008-606.41z m-757.655 693.82l-2.585-0.203c-42.524 0-76.146-34.863-76.537-79.309V332.671H900.79l0.46 485.186-0.885 2.865c-0.535 1.837-0.8 3.58-0.8 5.17 0 40.382-31.555 73.766-71.852 76.002l-10.816 0.621v-0.527l-615.533-0.01zM900.78 274.424H122.3l-0.375-65.934 0.85-2.924c0.52-1.82 0.782-3.63 0.782-5.247 0-42.236 34.727-76.665 78.179-76.809l0.45-0.068 618.177 0.018 2.662 0.203c42.329 0 76.767 34.439 76.767 76.768 0 1.326 0.196 2.687 0.655 4.532l0.332 0.884v68.577z"
                                        fill=""></path>
                                    <path
                                        d="M697.67 471.435c-7.882 0-15.314 3.078-20.918 8.682l-223.43 223.439L346.599 596.84c-5.544-5.603-12.95-8.69-20.842-8.69s-15.323 3.078-20.918 8.665c-5.578 5.518-8.674 12.9-8.7 20.79-0.017 7.908 3.07 15.357 8.69 20.994l127.55 127.558c5.57 5.56 13.01 8.622 20.943 8.622 7.925 0 15.364-3.06 20.934-8.63l244.247-244.247c5.578-5.511 8.674-12.883 8.7-20.783 0.017-7.942-3.079-15.408-8.682-20.986-5.552-5.612-12.958-8.698-20.85-8.698z"
                                        fill=""></path>
                                </g>
                            </svg>
                            <p class="hidden md:block">Ordered Items</p>
                        </a>
                    </div>

                    <div class=" flex  flex-col space-y-6">

                        <a href="#"
                            class="p-1.5  focus:outline-nones transition-colors duration-200 rounded-lg bg-gray-100">

                            <svg class='w-6 h-6' viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                <g id="SVGRepo_iconCarrier">
                                    <path d="M15 12L2 12M2 12L5.5 9M2 12L5.5 15" stroke="#000000" stroke-width="1.5"
                                        stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path
                                        d="M9.00195 7C9.01406 4.82497 9.11051 3.64706 9.87889 2.87868C10.7576 2 12.1718 2 15.0002 2L16.0002 2C18.8286 2 20.2429 2 21.1215 2.87868C22.0002 3.75736 22.0002 5.17157 22.0002 8L22.0002 16C22.0002 18.8284 22.0002 20.2426 21.1215 21.1213C20.3531 21.8897 19.1752 21.9862 17 21.9983M9.00195 17C9.01406 19.175 9.11051 20.3529 9.87889 21.1213C10.5202 21.7626 11.4467 21.9359 13 21.9827"
                                        stroke="#000000" stroke-width="1.5" stroke-linecap="round"></path>
                                </g>
                            </svg>
                        </a>


                    </div>
                </div>

                <!-- for small screen -->

                <div
                    class="sm:hidden flex grow flex-row justify-between space-x-2 sm:flex-col sm:space-x-0 sm:space-y-2">
                    <a class="flex h-[48px] grow items-center justify-center gap-2 rounded-sm bg-gray-100 p-3 text-base font-semibold hover:bg-sky-100 hover:text-blue-600 sm:flex-none sm:justify-start sm:p-2 sm:px-3 text-blue-600"
                        href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="#000000" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                        </svg>
                        <p class="hidden sm:block">Home</p>
                    </a>
                    <a class="flex h-[48px] grow items-center justify-center gap-2 rounded-sm bg-gray-100 p-3 text-base font-semibold hover:bg-sky-100 hover:text-blue-600 sm:flex-none sm:justify-start sm:p-2 sm:px-3"
                        href="#">
                        <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <rect x="5" y="4" width="14" height="17" rx="2" stroke="#000000"></rect>
                                <path d="M9 9H15" stroke="#000000" stroke-linecap="round"></path>
                                <path d="M9 13H15" stroke="#000000" stroke-linecap="round"></path>
                                <path d="M9 17H13" stroke="#000000" stroke-linecap="round"></path>
                            </g>
                        </svg>
                        <p class="hidden sm:block">Invoices</p>
                    </a><a
                        class="flex h-[48px] grow items-center justify-center gap-2 rounded-sm bg-gray-100 p-3 text-base font-semibold hover:bg-sky-100 hover:text-blue-600 sm:flex-none sm:justify-start sm:p-2 sm:px-3"
                        href="#">
                        <svg class='w-6 h-6' viewBox="0 0 1024 1024" fill="#000000" class="icon" version="1.1"
                            xmlns="http://www.w3.org/2000/svg">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <path
                                    d="M959.018 208.158c0.23-2.721 0.34-5.45 0.34-8.172 0-74.93-60.96-135.89-135.89-135.89-1.54 0-3.036 0.06-6.522 0.213l-611.757-0.043c-1.768-0.085-3.563-0.17-5.424-0.17-74.812 0-135.67 60.84-135.67 135.712l0.188 10.952h-0.306l0.391 594.972-0.162 20.382c0 74.03 60.22 134.25 134.24 134.25 1.668 0 7.007-0.239 7.1-0.239l608.934 0.085c2.985 0.357 6.216 0.468 9.55 0.468 35.815 0 69.514-13.954 94.879-39.302 25.373-25.34 39.344-58.987 39.344-94.794l-0.145-12.015h0.918l-0.008-606.41z m-757.655 693.82l-2.585-0.203c-42.524 0-76.146-34.863-76.537-79.309V332.671H900.79l0.46 485.186-0.885 2.865c-0.535 1.837-0.8 3.58-0.8 5.17 0 40.382-31.555 73.766-71.852 76.002l-10.816 0.621v-0.527l-615.533-0.01zM900.78 274.424H122.3l-0.375-65.934 0.85-2.924c0.52-1.82 0.782-3.63 0.782-5.247 0-42.236 34.727-76.665 78.179-76.809l0.45-0.068 618.177 0.018 2.662 0.203c42.329 0 76.767 34.439 76.767 76.768 0 1.326 0.196 2.687 0.655 4.532l0.332 0.884v68.577z"
                                    fill=""></path>
                                <path
                                    d="M697.67 471.435c-7.882 0-15.314 3.078-20.918 8.682l-223.43 223.439L346.599 596.84c-5.544-5.603-12.95-8.69-20.842-8.69s-15.323 3.078-20.918 8.665c-5.578 5.518-8.674 12.9-8.7 20.79-0.017 7.908 3.07 15.357 8.69 20.994l127.55 127.558c5.57 5.56 13.01 8.622 20.943 8.622 7.925 0 15.364-3.06 20.934-8.63l244.247-244.247c5.578-5.511 8.674-12.883 8.7-20.783 0.017-7.942-3.079-15.408-8.682-20.986-5.552-5.612-12.958-8.698-20.85-8.698z"
                                    fill=""></path>
                            </g>
                        </svg>
                        <p class="hidden sm:block">Customers</p>
                    </a>
                    <div class="hidden h-auto w-full grow rounded-sm bg-gray-100 sm:block"></div>

                    <form action="" enctype="multipart/form-data" method="POST"><input type="hidden"
                            name="$ACTION_ID_afb2820c8facca439123229c7bfc8d5d4f1e5184"><button
                            class="flex h-[48px] w-full grow items-center justify-center gap-2 rounded-sm bg-gray-100 p-3 text-base font-semibold hover:bg-sky-100 hover:text-blue-600 sm:flex-none sm:justify-start sm:p-2 sm:px-3"><svg
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" aria-hidden="true" data-slot="icon" class="w-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M5.636 5.636a9 9 0 1 0 12.728 0M12 3v9"></path>
                            </svg>
                            <div class="hidden sm:block">Sign Out</div>
                        </button></form>
                </div>


            </nav>
        </div>

        <div class='flex-grow'>
            <!-- data table -->
            <div class=' flex flex-col main px-3 py-4 h-fit'>


                <h1 class='main-text text-black text-xl sm:text-3xl'>Dashboard</h1>

                <!-- upper 4 boxes-->
                <div class='w-full grid lg:grid-cols-4 md:grid-cols-2 grid-cols-1 gap-10 '>

                    <div class="rounded-xl bg-gray-100 p-2 shadow-sm">
                        <div class="flex p-3">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" aria-hidden="true" data-slot="icon" class="h-5 w-5 text-gray-700">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M2.25 18.75a60.07 60.07 0 0 1 15.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 0 1 3 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 0 0-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 0 1-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 0 0 3 15h-.75M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm3 0h.008v.008H18V10.5Zm-12 0h.008v.008H6V10.5Z">
                                </path>
                            </svg>
                            <h3 class="ml-2 text-base text-gray-500 font-medium">Collected</h3>
                        </div>
                        <p class=" rounded-xl bg-white px-4 py-8 text-center text-2xl">$3,313.44
                        </p>
                    </div>

                    <div class="rounded-xl bg-gray-100 p-2 shadow-sm">
                        <div class="flex p-3">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" aria-hidden="true" data-slot="icon" class="h-5 w-5 text-gray-700">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"></path>
                            </svg>
                            <h3 class="ml-2 text-base text-gray-500 font-medium">Pending</h3>
                        </div>
                        <p class="rounded-xl bg-white px-4 py-8 text-center text-2xl">
                            $125,968.64
                        </p>
                    </div>

                    <div class="rounded-xl bg-gray-100 p-2 shadow-sm">
                        <div class="flex p-3">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" aria-hidden="true" data-slot="icon" class="h-5 w-5 text-gray-700">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M2.25 18.75a60.07 60.07 0 0 1 15.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 0 1 3 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 0 0-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 0 1-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 0 0 3 15h-.75M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm3 0h.008v.008H18V10.5Zm-12 0h.008v.008H6V10.5Z">
                                </path>
                            </svg>
                            <h3 class="ml-2 text-base text-gray-500 font-medium">Collected</h3>
                        </div>
                        <p class=" rounded-xl bg-white px-4 py-8 text-center text-2xl">$3,313.44
                        </p>
                    </div>

                    <div class="rounded-xl bg-gray-100 p-2 shadow-sm">
                        <div class="flex p-3">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" aria-hidden="true" data-slot="icon" class="h-5 w-5 text-gray-700">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z">
                                </path>
                            </svg>
                            <h3 class="ml-2 text-base text-gray-500 font-medium">Total Customers</h3>
                        </div>
                        <p class=" rounded-xl bg-white px-4 py-8 text-center text-2xl">6</p>
                    </div>


                </div>

                <!-- Page Wrapper -->
                <div class='w-full my-10 '>
                    <table class='rounded border' id="selection-table">
                        <thead>
                            <tr>
                                <th class='noSort bg-gray-100'>
                                    <span class="flex items-center">
                                        Image
                                        <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                            width="24" height="24" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4" />
                                        </svg>
                                    </span>
                                </th>
                                <th class='bg-gray-100' data-type="date" data-format="YYYY/DD/MM">
                                    <span class="flex items-center">
                                        Type
                                        <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                            width="24" height="24" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4" />
                                        </svg>
                                    </span>
                                </th>
                                <th class='bg-gray-100'>
                                    <span class="flex items-center">
                                        Instock
                                        <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                            width="24" height="24" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4" />
                                        </svg>
                                    </span>
                                </th>
                                <th class='bg-gray-100'>
                                    <span class="flex items-center">
                                        Price
                                        <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                            width="24" height="24" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4" />
                                        </svg>
                                    </span>
                                </th>
                                <th class='noSort bg-gray-100'>
                                    <span class="flex items-center">
                                        Edit
                                        <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                            width="24" height="24" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4" />
                                        </svg>
                                    </span>
                                </th>
                                <th class='noSort bg-gray-100'>
                                    <span class="flex items-center">
                                        Delete
                                        <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                            width="24" height="24" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4" />
                                        </svg>
                                    </span>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="hover:bg-gray-50 cursor-pointer">
                                <td class="font-medium text-gray-900 whitespace-nowrap ">Flowbite</td>
                                <td>2021/25/09</td>
                                <td>269000</td>
                                <td>49%</td>
                                <td>269000</td>
                                <td>49%</td>
                            </tr>
                            <tr class="hover:bg-gray-50 cursor-pointer">
                                <td class="font-medium text-gray-900 whitespace-nowrap ">React</td>
                                <td>2013/24/05</td>
                                <td>4500000</td>
                                <td>24%</td>
                                <td>269000</td>
                                <td>49%</td>
                            </tr>
                            <tr class="hover:bg-gray-50 cursor-pointer">
                                <td class="font-medium text-gray-900 whitespace-nowrap ">Flowbite</td>
                                <td>2021/25/09</td>
                                <td>269000</td>
                                <td>49%</td>
                                <td>269000</td>
                                <td>49%</td>
                            </tr>
                            <tr class="hover:bg-gray-50 cursor-pointer">
                                <td class="font-medium text-gray-900 whitespace-nowrap ">React</td>
                                <td>2013/24/05</td>
                                <td>4500000</td>
                                <td>24%</td>
                                <td>269000</td>
                                <td>49%</td>
                            </tr>
                            <tr class="hover:bg-gray-50 cursor-pointer">
                                <td class="font-medium text-gray-900 whitespace-nowrap ">Flowbite</td>
                                <td>2021/25/09</td>
                                <td>269000</td>
                                <td>49%</td>
                                <td>269000</td>
                                <td>49%</td>
                            </tr>
                            <tr class="hover:bg-gray-50 cursor-pointer">
                                <td class="font-medium text-gray-900 whitespace-nowrap ">React</td>
                                <td>2013/24/05</td>
                                <td>4500000</td>
                                <td>24%</td>
                                <td>269000</td>
                                <td>49%</td>
                            </tr>
                        </tbody>
                    </table>



                </div>
                <!-- /.container-fluid -->
            </div>
        </div>


    </div>


    <script>
    if (document.getElementById("selection-table") && typeof simpleDatatables.DataTable !== 'undefined') {

        let multiSelect = true;
        let rowNavigation = false;
        let table = null;

        const resetTable = function() {
            if (table) {
                table.destroy();
            }

            const options = {
                rowRender: (row, tr, _index) => {
                    if (!tr.attributes) {
                        tr.attributes = {};
                    }
                    if (!tr.attributes.class) {
                        tr.attributes.class = "";
                    }
                    if (row.selected) {
                        tr.attributes.class += " selected";
                    } else {
                        tr.attributes.class = tr.attributes.class.replace(" selected", "");
                    }
                    return tr;
                },
                columns: [{
                    select: [0, 4, 5],
                    sortable: false
                }, ]
            };
            if (rowNavigation) {
                options.rowNavigation = true;
                options.tabIndex = 1;
            }

            table = new simpleDatatables.DataTable("#selection-table", options);

            // Mark all rows as unselected
            table.data.data.forEach(data => {
                data.selected = false;
            });

            table.on("datatable.selectrow", (rowIndex, event) => {
                event.preventDefault();
                const row = table.data.data[rowIndex];
                if (row.selected) {
                    row.selected = false;
                } else {
                    if (!multiSelect) {
                        table.data.data.forEach(data => {
                            data.selected = false;
                        });
                    }
                    row.selected = true;
                }
                table.update();
            });
        };

        // Row navigation makes no sense on mobile, so we deactivate it and hide the checkbox.
        const isMobile = window.matchMedia("(any-pointer:coarse)").matches;
        if (isMobile) {
            rowNavigation = false;
        }

        resetTable();
    }
    </script>



</body>

</html>