<?php 
include("../function/connection.php");
include("../function/functions.php");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Item</title>
</head>
<!-- flowbite -->
<link rel="stylesheet" href="../../node_modules/flowbite/dist/flowbite.min.css">
<script src="../../node_modules/flowbite/dist/flowbite.min.js"></script>

<!-- tailwind -->
<link href="../output.css" rel="stylesheet">

<!-- alpine -->
<script src="../../public/script.js"></script>
<link rel="stylesheet" href="../css/admin.css">
<style>
.test {
    border: 1px solid red;
}
</style>

<body>

    <!-- navbar -->
    <nav
        class="navbar flex flex-col  items-center w-full sm:w-14 sm:h-screen sm:py-8 overflow-y-auto bg-white sm:border-r rtl:border-l rtl:border-r-0 ">
        <div class="px-3 pb-4  w-full flex flex-col flex-1 sm:space-y-6">

            <div class='flex justify-center h-20 '>
                <a href="#">
                    <img class="w-auto h-6 " src="https://merakiui.com/images/logo.svg" alt="">
                </a>
            </div>

            <!-- for large screen from (table to latop  & desktop) -->
            <div class='w-full h-full hidden sm:flex  flex-col px-0 items-center justify-between'>
                <div class='w-full flex flex-col gap-4 mt-5'>
                    <a href="./home.php"
                        class="flex h-[48px] grow items-center justify-center gap-2 rounded-md text-sm font-medium bg-blue-100 text-blue-600 md:flex-none md:justify-start md:p-2 md:px-3 ">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                        </svg>
                    </a>
                    <a href="./components/ordered.php"
                        class='flex h-[48px] grow items-center justify-center gap-2 rounded-md  text-sm font-medium hover:bg-sky-100 hover:text-blue-600 md:flex-none md:justify-start md:p-2 md:px-3 bg-sky-100 text-gray-600'>
                        <svg class='w-7 h-7' viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <rect x="5" y="4" width="14" height="17" rx="2" stroke="currentColor"></rect>
                                <path d="M9 9H15" stroke="currentColor" stroke-linecap="round"></path>
                                <path d="M9 13H15" stroke="currentColor" stroke-linecap="round"></path>
                                <path d="M9 17H13" stroke="currentColor" stroke-linecap="round"></path>
                            </g>
                        </svg>
                    </a>
                    <a href="./components/accept.php"
                        class='flex h-[48px] grow items-center justify-center gap-2 rounded-md text-sm font-medium hover:bg-sky-100 hover:text-blue-600 md:flex-none md:justify-start md:p-2 md:px-3 bg-sky-100 text-gray-600'>
                        <svg class='w-6 h-6' viewBox="0 0 1024 1024" fill="currentColor" class="icon" version="1.1"
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
                    </a>
                    <a href="./components/notification.php"
                        class='flex h-[48px] grow items-center justify-center gap-2 rounded-md text-sm font-medium hover:bg-sky-100 hover:text-blue-600 md:flex-none md:justify-start md:p-2 md:px-3 bg-sky-100 text-gray-600'>
                        <svg class='w-8 h-8' viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <path
                                    d="M17.7778 16.4066C18.1725 16.2808 18.3904 15.8588 18.2646 15.4642C18.1388 15.0696 17.7168 14.8516 17.3222 14.9774L17.7778 16.4066ZM11.6797 15.9343C11.2657 15.9455 10.9391 16.2902 10.9503 16.7043C10.9615 17.1183 11.3062 17.4449 11.7203 17.4337L11.6797 15.9343ZM16.876 16.0131C17.0578 16.3853 17.5068 16.5397 17.8791 16.358C18.2513 16.1762 18.4057 15.7272 18.224 15.3549L16.876 16.0131ZM16.9104 14.374L16.2225 14.6728C16.2269 14.683 16.2316 14.6931 16.2364 14.7031L16.9104 14.374ZM15.9422 10.806L16.6868 10.7157C16.6855 10.7048 16.6839 10.694 16.6821 10.6832L15.9422 10.806ZM11.7068 5.941C11.2926 5.941 10.9568 6.27679 10.9568 6.691C10.9568 7.10521 11.2926 7.441 11.7068 7.441V5.941ZM11.7068 7.441C12.121 7.441 12.4568 7.10521 12.4568 6.691C12.4568 6.27679 12.121 5.941 11.7068 5.941V7.441ZM7.45778 10.807L6.71795 10.6839C6.71614 10.6948 6.71457 10.7057 6.71325 10.7166L7.45778 10.807ZM6.48961 14.374L7.16357 14.7031C7.16843 14.6931 7.17308 14.683 7.1775 14.6728L6.48961 14.374ZM5.17605 15.3549C4.99431 15.7272 5.14873 16.1762 5.52095 16.358C5.89317 16.5397 6.34223 16.3853 6.52397 16.0131L5.17605 15.3549ZM10.9568 6.691C10.9568 7.10521 11.2926 7.441 11.7068 7.441C12.121 7.441 12.4568 7.10521 12.4568 6.691H10.9568ZM12.4568 5C12.4568 4.58579 12.121 4.25 11.7068 4.25C11.2926 4.25 10.9568 4.58579 10.9568 5H12.4568ZM10.9568 6.691C10.9568 7.10521 11.2926 7.441 11.7068 7.441C12.121 7.441 12.4568 7.10521 12.4568 6.691H10.9568ZM12.4568 5C12.4568 4.58579 12.121 4.25 11.7068 4.25C11.2926 4.25 10.9568 4.58579 10.9568 5H12.4568ZM6.07781 14.9774C5.68317 14.8516 5.26125 15.0696 5.13544 15.4642C5.00963 15.8588 5.22756 16.2808 5.6222 16.4066L6.07781 14.9774ZM11.6797 17.4337C12.0938 17.4449 12.4385 17.1183 12.4497 16.7043C12.4609 16.2902 12.1343 15.9455 11.7203 15.9343L11.6797 17.4337ZM10.5 16.523C10.5 16.1088 10.1642 15.773 9.75001 15.773C9.33579 15.773 9.00001 16.1088 9.00001 16.523H10.5ZM14.4049 16.523C14.4049 16.1088 14.0691 15.773 13.6549 15.773C13.2407 15.773 12.9049 16.1088 12.9049 16.523H14.4049ZM17.3222 14.9774C15.4929 15.5606 13.5943 15.8825 11.6797 15.9343L11.7203 17.4337C13.7761 17.3782 15.8144 17.0325 17.7778 16.4066L17.3222 14.9774ZM18.224 15.3549L17.5844 14.0449L16.2364 14.7031L16.876 16.0131L18.224 15.3549ZM17.5983 14.0752C17.1347 13.008 16.8275 11.8759 16.6868 10.7157L15.1977 10.8963C15.3558 12.1997 15.701 13.4723 16.2225 14.6728L17.5983 14.0752ZM16.6821 10.6832C16.4696 9.40313 16.017 8.21501 15.1948 7.33897C14.3526 6.44171 13.1869 5.941 11.7068 5.941V7.441C12.8193 7.441 13.5729 7.80279 14.1011 8.36553C14.6492 8.94949 15.0181 9.81887 15.2024 10.9288L16.6821 10.6832ZM11.7068 5.941C10.2266 5.941 9.05835 6.44146 8.21321 7.33789C7.38755 8.21366 6.93123 9.40201 6.71795 10.6839L8.19761 10.9301C8.38214 9.82099 8.75359 8.95134 9.30463 8.36686C9.83619 7.80304 10.5936 7.441 11.7068 7.441V5.941ZM6.71325 10.7166C6.57244 11.8765 6.26519 13.0083 5.80171 14.0752L7.1775 14.6728C7.69888 13.4727 8.04413 12.2004 8.20232 10.8974L6.71325 10.7166ZM5.81565 14.0449L5.17605 15.3549L6.52397 16.0131L7.16357 14.7031L5.81565 14.0449ZM12.4568 6.691V5H10.9568V6.691H12.4568ZM12.4568 6.691V5H10.9568V6.691H12.4568ZM5.6222 16.4066C7.58558 17.0325 9.62394 17.3782 11.6797 17.4337L11.7203 15.9343C9.80576 15.8825 7.90713 15.5606 6.07781 14.9774L5.6222 16.4066ZM9.00001 16.523V17.023H10.5V16.523H9.00001ZM9.00001 17.023C9.00001 18.5252 10.1921 19.7755 11.7024 19.7755V18.2755C11.0561 18.2755 10.5 17.7327 10.5 17.023H9.00001ZM11.7024 19.7755C13.2127 19.7755 14.4049 18.5252 14.4049 17.023H12.9049C12.9049 17.7327 12.3487 18.2755 11.7024 18.2755V19.7755ZM14.4049 17.023V16.523H12.9049V17.023H14.4049Z"
                                    fill="currentColor"></path>
                            </g>
                        </svg>
                    </a>

                </div>

                <div class=" flex  flex-col space-y-6">

                    <a href="#"
                        class="p-1.5  focus:outline-nones transition-colors duration-200 rounded-lg bg-gray-100">

                        <svg class='w-6 h-6' viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <path d="M15 12L2 12M2 12L5.5 9M2 12L5.5 15" stroke="currentColor" stroke-width="1.5"
                                    stroke-linecap="round" stroke-linejoin="round"></path>
                                <path
                                    d="M9.00195 7C9.01406 4.82497 9.11051 3.64706 9.87889 2.87868C10.7576 2 12.1718 2 15.0002 2L16.0002 2C18.8286 2 20.2429 2 21.1215 2.87868C22.0002 3.75736 22.0002 5.17157 22.0002 8L22.0002 16C22.0002 18.8284 22.0002 20.2426 21.1215 21.1213C20.3531 21.8897 19.1752 21.9862 17 21.9983M9.00195 17C9.01406 19.175 9.11051 20.3529 9.87889 21.1213C10.5202 21.7626 11.4467 21.9359 13 21.9827"
                                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                            </g>
                        </svg>
                    </a>


                </div>
            </div>

            <!-- for small screen -->
            <div class="sm:hidden flex grow flex-row justify-between space-x-2 sm:flex-col sm:space-x-0 sm:space-y-2">
                <a class="flex h-[48px] grow items-center justify-center gap-2 rounded-sm bg-gray-100 p-3 text-base font-semibold  sm:flex-none sm:justify-start sm:p-2 sm:px-3 text-blue-600"
                    href="#">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75  12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                    </svg>
                </a>
                <a class="flex h-[48px] grow items-center justify-center gap-2 rounded-sm bg-gray-100 p-3 text-base font-semibold hover:bg-sky-100 hover:text-blue-600 sm:flex-none sm:justify-start sm:p-2 sm:px-3"
                    href="./components/ordered.php">
                    <svg class="w-7 h-7" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id="SVGRepo_iconCarrier">
                            <rect x="5" y="4" width="14" height="17" rx="2" stroke="currentColor"></rect>
                            <path d="M9 9H15" stroke="currentColor" stroke-linecap="round"></path>
                            <path d="M9 13H15" stroke="currentColor" stroke-linecap="round"></path>
                            <path d="M9 17H13" stroke="currentColor" stroke-linecap="round"></path>
                        </g>
                    </svg>
                </a>
                <a class="flex h-[48px] grow items-center justify-center gap-2 rounded-sm bg-gray-100 p-3 text-base font-semibold hover:bg-sky-100 hover:text-blue-600 sm:flex-none sm:justify-start sm:p-2 sm:px-3"
                    href="./components/accept.php">
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
                </a>

                <div class="hidden h-auto w-full grow rounded-sm bg-gray-100 sm:block"></div>

                <form action="" enctype="multipart/form-data" method="POST">
                    <input type="hidden" name="$ACTION_ID_afb2820c8facca439123229c7bfc8d5d4f1e5184">
                    <button
                        class="flex h-[48px] w-full grow items-center justify-center gap-2 rounded-sm bg-gray-100 p-3 text-base font-semibold hover:bg-sky-100 hover:text-blue-600 sm:flex-none sm:justify-start sm:p-2 sm:px-3">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" aria-hidden="true" data-slot="icon" class="w-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M5.636 5.636a9 9 0 1 0 12.728 0M12 3v9"></path>
                        </svg>
                    </button>
                </form>

            </div>


        </div>
    </nav>


    <section class="bg-white flex items-center justify-center h-fit add-item">

        <main
            class="container flex flex-col main items-center justify-center px-8 py-8 sm:px-12 lg:col-span-7 lg:px-16 lg:py-12 xl:col-span-6">
            <h1 class='text-black font-semibold text-xl sm:text-3xl'>Add new Item</h1>
            <div class=" max-w-xl lg:max-w-3xl">
                <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"])?>"  method="post"  enctype="multipart/form-data" class="mt-8 grid grid-cols-6 gap-6">
                    <div class="col-span-6">
                        <label for="product-name" class="block text-sm font-medium text-gray-700"> Product Name </label>
                        <input type="text" id="product-name" name="productname" placeholder='Nike Air Force'
                            class="mt-1 w-full rounded-md border-gray-200 bg-white text-sm text-gray-700 shadow-sm" />
                    </div>
                    <div class="col-span-6 sm:col-span-3">
                        <label for="type" class="block text-sm font-medium text-gray-700">
                            Type
                        </label>
                        <input type="text" id="type" name="type" placeholder='somthing else'
                            class="mt-1 w-full rounded-md border-gray-200 bg-white text-sm text-gray-700 shadow-sm" />
                    </div>
                    <div class="col-span-6 sm:col-span-3">
                        <label for="price" class="block text-sm font-medium text-gray-700">
                            Price
                        </label>
                        <input type="text" id="price" name="price" placeholder='100000'
                            class="mt-1 w-full rounded-md border-gray-200 bg-white text-sm text-gray-700 shadow-sm" />
                    </div>

                    <div class="col-span-6 sm:col-span-3">
                        <label for="Gender" class="block text-sm font-medium text-gray-700">
                            Gender
                        </label>
                        <input type="text" id="Gender" name="gender" placeholder='no lgbtq++ only male and female '
                            class="mt-1 w-full rounded-md border-gray-200 bg-white text-sm text-gray-700 shadow-sm" />
                    </div>

                    <!-- size -->
                    <div class='col-span-6 '>
                        <div id='number-input' class='grid grid-cols-5 gap-5 '>
                            <div>
                                <label for="number-input-sm" class="block text-sm font-medium text-gray-700">SM</label>
                                <input type="number" id="number-input-sm" aria-describedby="helper-text-explanation" name="small"
                                    class=" border border-gray-300 text-gray-900 text-sm shadow-sm rounded-md focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                    placeholder="0" />
                            </div>
                            <div>
                                <label for="number-input-md" class="block text-sm font-medium text-gray-700">MD</label>
                                <input type="number" id="number-input-md" aria-describedby="helper-text-explanation" name="medium"
                                    class=" border border-gray-300 text-gray-900 text-sm shadow-sm rounded-md focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                    placeholder="0" />
                            </div>
                            <div>
                                <label for="number-input-lg" class="block text-sm font-medium text-gray-700">LG</label>
                                <input type="number" id="number-input-lg" aria-describedby="helper-text-explanation" name="large"
                                    class=" border border-gray-300 text-gray-900 text-sm shadow-sm rounded-md focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                    placeholder="0" />
                            </div>
                            <div>
                                <label for="number-input-xl" class="block text-sm font-medium text-gray-700">XL</label>
                                <input type="number" id="number-input-xl" aria-describedby="helper-text-explanation" name="XL"
                                    class=" border border-gray-300 text-gray-900 text-sm shadow-sm rounded-md focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                    placeholder="0" />
                            </div>
                            <div>
                                <label for="number-input-xxl"
                                    class="block text-sm font-medium text-gray-700">XXL</label>
                                <input type="number" id="number-input-xxl" aria-describedby="helper-text-explanation" name="XXL"
                                    class=" border border-gray-300 text-gray-900 text-sm shadow-sm rounded-md focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                    placeholder="0" />
                            </div>
                        </div>
                    </div>
                    <!-- product desc -->
                    <div class="col-span-6 max-h-96">
                        <label for="product-desc" class="block text-sm font-medium text-gray-700"> Product Description
                        </label>
                        <textarea id="product-desc" name="productdesc" placeholder='sth description'
                            class="mt-1 w-full h-36 max-h-96 rounded-md border-gray-200 bg-white text-sm text-gray-700 shadow-sm"></textarea>
                    </div>
                    <!-- photo select -->
                    <div class="col-span-6">
                        <label for="file-input" class="mb-2 font-medium flex justify-between items-center">
                            <p>Choose files <span class='text-gray-400'>( up to 3 files )</span> </p>
                            <button type='button' id="select-button"
                                class="bg-primary hover:bg-white hover:text-blue-600 border border-blue-600  text-white font-medium py-1.5 px-4 rounded-full transition-colors duration-300">
                                Select
                            </button>
                        </label>
                        <input id='file-input' type="file" name="image[]" class='hidden' accept="img/*" multiple>
                        <!-- <input id="file-input" type="file"  name="image[]" accept="img/*" multiple class="hidden" /> -->
                        <div class="flex mb-4 flex-col">
                            <div id="drop-zone"
                                class="w-full h-48 border-2 border-dashed border-gray-300 rounded-lg flex justify-center items-center text-gray-400 text-lg">
                                <span>Drag and drop files here</span>
                            </div>
                            <div id="selected-files-count" class="text-gray-500 text-sm font-medium "></div>
                            <div id="selected-images" class="grid grid-cols-2 gap-3 mt-6"></div>
                        </div>
                    </div>
                    <div class="col-span-6 sm:flex sm:items-center sm:gap-4 ">
                        <button type="submit" 
                            class="inline-block shrink-0 rounded-md border border-blue-600 bg-blue-600 px-12 py-3 text-sm font-medium text-white transition hover:bg-transparent hover:text-blue-600 focus:outline-none focus:ring active:text-blue-500">
                            Create New
                        </button>
                    </div>
                </form>
            </div>
        </main>
    </section>

    <script>
    const fileInput = document.getElementById("file-input");
    const dropZone = document.getElementById("drop-zone");
    const selectedImages = document.getElementById("selected-images");
    const selectButton = document.getElementById("select-button");
    const selectedFilesCount = document.getElementById("selected-files-count");

    selectButton.addEventListener("click", () => {
        fileInput.click();
    });

    fileInput.addEventListener("change", handleFiles);
    dropZone.addEventListener("dragover", handleDragOver);
    dropZone.addEventListener("dragleave", handleDragLeave);
    dropZone.addEventListener("drop", handleDrop);

    function handleFiles() {
        const fileList = this.files;
        displayImages(fileList);
        checkAndHideDropZone();
    }

    function handleDragOver(event) {
        event.preventDefault();
        dropZone.classList.add("border-blue-500");
        dropZone.classList.add("text-blue-500");
    }

    function handleDragLeave(event) {
        event.preventDefault();
        dropZone.classList.remove("border-blue-500");
        dropZone.classList.remove("text-blue-500");
    }

    function handleDrop(event) {
        event.preventDefault();
        const fileList = event.dataTransfer.files;
        displayImages(fileList);
        checkAndHideDropZone();
        dropZone.classList.remove("border-blue-500");
        dropZone.classList.remove("text-blue-500");
    }

    function displayImages(fileList) {
        selectedImages.innerHTML = "";
        let count = 0;
        for (const file of fileList) {
            if (count >= 3) break;
            const imageWrapper = document.createElement("div");

            if (count === 0) {
                imageWrapper.classList.add("relative", 'w-full', 'border', 'border-gray-300', 'col-span-2', "mx-2",
                    'rounded-md', 'shadow-sm', 'bg-gray-100', 'p-4', "mb-2");
            } else {
                imageWrapper.classList.add("relative", 'w-full', 'border', 'border-gray-300', "mx-2", "mb-2",
                    'rounded-md', 'shadow-sm', 'bg-gray-100', 'p-4');

            }
            const image = document.createElement("img");
            image.src = URL.createObjectURL(file);
            image.classList.add("w-full", "h-64", "object-contain", "rounded-lg");

            const removeButton = document.createElement("button");
            removeButton.innerHTML = "&times;";
            removeButton.classList.add(
                "absolute",
                "top-1",
                "right-1",
                "h-6",
                "w-6",
                "bg-gray-700",
                "text-white",
                "text-xs",
                "rounded-full",
                "flex",
                "items-center",
                "justify-center",
                "opacity-50",
                "hover:opacity-100",
                "transition-opacity",
                "duration-200"
            );
            removeButton.addEventListener("click", () => {
                imageWrapper.remove();
                selectedFilesCount.textContent = `${selectedImages.children.length} file(s) selected`;
                checkAndHideDropZone();
            });
            imageWrapper.appendChild(image);
            imageWrapper.appendChild(removeButton);
            selectedImages.appendChild(imageWrapper);
            count++;
        }
        selectedFilesCount.textContent = `${selectedImages.children.length} file(s) selected`;
    }

    function checkAndHideDropZone() {
        if (selectedImages.children.length > 0) {
            dropZone.style.display = "none";
        } else {
            dropZone.style.display = "flex";
        }
    }
    </script>
    <script>
    const nav = document.querySelector('nav');

    window.addEventListener('scroll', () => {
        if (window.scrollY > 0) {
            nav.classList.add('scrolled');
        } else {
            nav.classList.remove('scrolled');
        }
    });
    document.getElementById("account").addEventListener("click", () => {
        document.getElementById("accountcontent").style.width = "20%";

    }, false);
    </script>

</body>

</html>

<?php 
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $productname=filter_input(INPUT_POST,"productname",FILTER_SANITIZE_SPECIAL_CHARS);
    $productdesc=filter_input(INPUT_POST,"productdesc",FILTER_SANITIZE_SPECIAL_CHARS);
$type=filter_input(INPUT_POST,"type",FILTER_SANITIZE_SPECIAL_CHARS);
$small=filter_input(INPUT_POST,"small",FILTER_VALIDATE_INT);
$medium=filter_input(INPUT_POST,"medium",FILTER_VALIDATE_INT);
$large=filter_input(INPUT_POST,"large",FILTER_VALIDATE_INT);
$XL=filter_input(INPUT_POST,"XL",FILTER_VALIDATE_INT);
$XXL=filter_input(INPUT_POST,"XXL",FILTER_VALIDATE_INT);
$gender=filter_input(INPUT_POST,"gender",FILTER_SANITIZE_SPECIAL_CHARS);
$price=filter_input(INPUT_POST,"price",FILTER_VALIDATE_INT);
$instock=$small+$medium+$large+$XL+$XXL;
  $clo_id=insertintocloset($type,$price,$gender,$instock,$productdesc,$productname);
  size($small,$medium,$large,$XL,$XXL);
  
  

foreach($_FILES["image"]['tmp_name'] as $key => $tmp_name){ 
    $imgdata=file_get_contents($tmp_name);
    $statement=$con->prepare("INSERT INTO closet_img (clo_id,img) VALUES ( '$clo_id',?)");
    $statement->bind_param("s",$imgdata);
    $current_id= $statement->execute() or die("<b> Error </b> problem on image insertion".mysqli_connect_error());
 if($current_id){
     echo"inserted successfully";
    
     
 } 
 else {
     echo"fail to insert";
 }
  
} 
   
    
     
 
$con->close();

}
?>