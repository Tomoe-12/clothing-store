<?php 
include("../../function/connection.php");
include("../../function/functions.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ordered</title>


    <!-- flowbite -->
    <link rel="stylesheet" href="../../../node_modules/flowbite/dist/flowbite.min.css">
    <script src="../../../node_modules/flowbite/dist/flowbite.min.js"></script>

    <!-- tailwind -->
    <link href="../../output.css" rel="stylesheet">

    <!-- alpine -->
    <script src="../../public/script.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@9.0.3"></script>
    <style>
    nav {
        z-index: 999 !important;
    }

    nav:not(.scrolled) {
        box-shadow: none;
    }

    nav.scrolled {
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
    }

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
        margin-top: 3rem;
        padding-top: 2rem;
    }

    .navbar {
        position: fixed;
        top: 0;
    }

    @media (min-width: 640px) {

        .main-text {
            margin-top: 0rem;
            margin-bottom: 1rem;
        }

        .main {
            margin-left: 5rem;
            margin-top: 1.25rem;
        }

        .navbar {
            width: 78px;
            position: fixed;
            flex-direction: column;
        }
    }
    </style>

</head>

<body class='flex p-0'>

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
                    <a href="../home.php"
                        class="flex h-[48px] grow items-center justify-center gap-2 rounded-md text-sm font-medium hover:bg-blue-100 hover:text-blue-600 md:flex-none md:justify-start md:p-2 md:px-3 text-gray-600">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                        </svg>
                    </a>
                    <a href="./ordered.php"
                        class='flex h-[48px] grow items-center justify-center gap-2 rounded-md  text-sm font-medium bg-blue-100 text-blue-600 md:flex-none md:justify-start md:p-2 md:px-3'>
                        <svg viewBox="0 0 24.00 24.00" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="#FF4F4E"
                            stroke-width="1.128">
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
                    <a href="./notification.php"
                        class='flex h-[48px] grow items-center justify-center gap-2 rounded-md text-sm font-medium hover:bg-blue-100 hover:text-blue-600 text-gray-600 md:flex-none md:justify-start md:p-2 md:px-3 '>
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

                    <a href="" class="p-1.5  focus:outline-nones transition-colors duration-200 rounded-lg bg-gray-100">

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
                <a class="flex h-[48px] grow items-center justify-center gap-2 rounded-lg bg-gray-100 p-3 text-base font-semibold  sm:flex-none sm:justify-start sm:p-2 sm:px-3 text-gray-600"
                    href="../home.php">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                    </svg>
                </a>
                <a class="flex h-[48px] grow items-center justify-center gap-2 rounded-lg bg-blue-100 p-3 text-base font-semibold hover: text-blue-600 sm:flex-none sm:justify-start sm:p-2 sm:px-3"
                    href="#">
                    <svg class='w-7 h-7' viewBox="0 0 24.00 24.00" fill="none" xmlns="http://www.w3.org/2000/svg"
                        stroke="#000000" stroke-width="1.128">
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
                <a class="flex h-[48px] grow items-center justify-center gap-2 rounded-lg bg-gray-100 p-3 text-base font-semibold  sm:flex-none sm:justify-start sm:p-2 sm:px-3"
                    href="./notification.php">
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

                <div class="hidden h-auto w-full grow rounded-sm bg-gray-100 sm:block"></div>

                <form action="" enctype="multipart/form-data" method="POST">
                    <input type="hidden" name="$ACTION_ID_afb2820c8facca439123229c7bfc8d5d4f1e5184">
                    <button
                        class="flex h-[48px] w-full grow items-center justify-center gap-2 rounded-lg bg-gray-100 p-3 text-base font-semibold hover: hover:text-blue-600 sm:flex-none sm:justify-start sm:p-2 sm:px-3">
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


    <!-- data table -->
    <div class='w-full flex justify-center items-center overflow-hidden'>

        <div class='container flex flex-col main px-3 py-4 h-fit gap-5 '>


            <h1 class='main-text text-black  text-xl sm:text-3xl '>Customer Orders</h1>


            <table id="selection-table">
                <thead>
                    <tr>
                        <th>
                            <span class="flex items-center noSort">
                                UserName
                                <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4" />
                                </svg>
                            </span>
                        </th>
                        <th>
                            <span class="flex items-center noSort">
                                Status
                                <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4" />
                                </svg>
                            </span>
                        </th>
                        <th data-type="date" data-format="YYYY/DD/MM">
                            <span class="flex items-center">
                                E-mail
                                <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4" />
                                </svg>
                            </span>
                        </th>
                        <th>
                            <span class="flex items-center">
                                Ordered-Date
                                <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4" />
                                </svg>
                            </span>
                        </th>
                        <th>
                            <span class="flex items-center noSort">
                                Actions
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
                    <?php
    ob_start();
    
    $result=$con->query("SELECT * FROM orderhistory JOIN closet ON closet.clo_id=orderhistory.clo_id JOIN customers ON customers.cus_id=orderhistory.cus_id where admindec='Pending' or admindec='Accept' group by orderhistory.or_date; ");
    if(!empty($result)&& $result->num_rows>0){
       while($row=$result->fetch_assoc()){ ?>
                    <tr>
                        <td><?php  echo $row["user_name"]?></td>

                        <td>
                            <?php if($row["admindec"]=="Pending") {?>
                            <div style='color:#79B5EC; border:1px solid #79B5EC;'
                                class='border border-[#79B5EC] w-fit flex justify-start items-center gap-1 rounded-full px-1.5 py-0.5'>

                                <svg class='w-4 h-4' width="32" height="32" viewBox="0 0 32 32" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M16.0002 15.9998L10.303 11.2522C9.45651 10.5468 9.03328 10.1941 8.72901 9.76175C8.45942 9.37868 8.25921 8.95122 8.13752 8.49888C8.00016 7.98835 8.00016 7.43743 8.00016 6.33557V2.6665M16.0002 15.9998L21.6973 11.2522C22.5438 10.5468 22.967 10.1941 23.2713 9.76175C23.5409 9.37868 23.7411 8.95122 23.8628 8.49888C24.0002 7.98835 24.0002 7.43743 24.0002 6.33557V2.6665M16.0002 15.9998L10.303 20.7475C9.45651 21.4529 9.03328 21.8056 8.72901 22.2379C8.45942 22.621 8.25921 23.0484 8.13752 23.5008C8.00016 24.0113 8.00016 24.5622 8.00016 25.6641V29.3332M16.0002 15.9998L21.6973 20.7475C22.5438 21.4529 22.967 21.8056 23.2713 22.2379C23.5409 22.621 23.7411 23.0484 23.8628 23.5008C24.0002 24.0113 24.0002 24.5622 24.0002 25.6641V29.3332M5.3335 2.6665H26.6668M5.3335 29.3332H26.6668"
                                        stroke="#79B5EC" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg><?php } 
                                if($row["admindec"]=="Accept"){?>
                                <div style='color:#24AE7C ; border :1px solid #24AE7C ;'
                                    class='w-fit flex justify-center items-center test gap-1 rounded-full px-1.5 py-1'>

                                    <svg class='w-4 h-4' viewBox="0 0 12 12" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M10 3L4.5 8.5L2 6" stroke="#24AE7C" stroke-width="1.5"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                    <?Php }?>

                                    <!-- <div style='color:#FF4F4E; border :1px solid #FF4F4E;'
                                class='w-fit flex justify-start items-center gap-1 rounded-full px-1.5 py-1'>

                                <svg class='w-4 h-4' viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M15.9995 11.9998V17.3332M15.9995 22.6665H16.0128M14.1533 5.18878L3.18675 24.1309C2.57848 25.1816 2.27434 25.7069 2.31929 26.1381C2.3585 26.5141 2.55553 26.8559 2.86134 27.0782C3.21195 27.3332 3.81897 27.3332 5.033 27.3332H26.966C28.1801 27.3332 28.7871 27.3332 29.1377 27.0782C29.4435 26.8559 29.6405 26.5141 29.6797 26.1381C29.7247 25.7069 29.4205 25.1816 28.8123 24.1309L17.8458 5.18878C17.2397 4.1419 16.9366 3.61845 16.5412 3.44265C16.1964 3.2893 15.8027 3.2893 15.4578 3.44265C15.0624 3.61845 14.7594 4.1419 14.1533 5.18878Z"
                                        stroke="#FF4F4E" stroke-width="3" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg> -->

                                    <p><?php echo $row["admindec"] ?></p>
                                </div>
                        </td>
                        <!--- cancel , pending , accepted -->
                        <td><?php  echo $row["email"] ?></td>
                        <td><?php echo $row["or_date"] ?></td>
                        <td>
                            <div class='flex justify-start items-center' style='gap:50px;'>
                                <?php  if($row["admindec"]=="Pending"){?>
                                <a class='cursor-pointer font-semibold' style='color:#79B5EC ;'
                                    href="vieworders.php?or_date=<?php echo $row['or_date'] ?> && cus_id=<?php echo $row["cus_id"] ?>">
                                    <svg class="w-6 h-6" viewBox="0 0 1024 1024" version="1.1"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M459.8 305.8c11 0 20 9 20 20v15c0 11-9 20-20 20H294.2c-11 0-20-9-20-20v-15c0-11 9-20 20-20h165.6zM347.5 458.6c11 0 20 9 20 20v15c0 11-9 20-20 20h-53.2c-11 0-20-9-20-20v-15c0-11 9-20 20-20h53.2zM347.5 617.7c11 0 20 9 20 20v15c0 11-9 20-20 20h-53.2c-11 0-20-9-20-20v-15c0-11 9-20 20-20h53.2z"
                                            fill="currentColor" />
                                        <path
                                            d="M579.1 345c-116.9 0-211.6 94.7-211.6 211.6 0 116.9 94.7 211.6 211.6 211.6 116.9 0 211.6-94.7 211.6-211.6C790.8 439.7 696 345 579.1 345z m0 369.6c-87.3 0-158-70.8-158-158 0-87.3 70.8-158 158-158s158 70.8 158 158c0.1 87.3-70.7 158-158 158z"
                                            fill="currentColor" />
                                        <path
                                            d="M913.7 875.7c7.8 7.8 7.8 20.5 0 28.3l-10.1 10.1c-7.8 7.8-20.5 7.8-28.3 0L697.7 736.6c-7.8-7.8-7.8-20.5 0-28.3l10.1-10.1c7.8-7.8 20.5-7.8 28.3 0l177.6 177.5z"
                                            fill="currentColor" />
                                        <path
                                            d="M750.7 827.3c-7.8-7.8-14.1-5.1-14.1 5.9V858c0 11-9 20-20 20l-475.8-0.5c-11 0-20-9-20-20V171.9c0-11 9-20 20-20h369.1c11 0 20 9 20 20v68.5c0 11 9 20 20 20h66.7c11 0 20 9 20 20v88.3c0 11 5.6 27.1 12.4 35.7l32 52.3c4.7 10 8.5 9.1 8.5-1.9l0.1-204.7c0-11-6.3-26.4-14.1-34.2L673 113.1c-7.8-7.8-23.1-14.2-34.1-14.2H190.1c-11 0-20 9-20 20v789.4c0 11 9 20 20 20h579.1c11 0 20-9 20-20v-22.5c0-11-6.4-26.4-14.1-34.1l-24.4-24.4z"
                                            fill="currentColor" />
                                    </svg>
                                </a>
                                <?php } ?>
                                <?php  if($row["admindec"]=="Accept"){?>
                                <a class='cursor-pointer font-semibold' style='color:#FFC107 ;'
                                    href="viewaccept.php?or_date=<?php echo $row['or_date'] ?> && cus_id=<?php echo $row["cus_id"] ?>">
                                    <svg class='w-6 h-6' viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round">
                                        </g>
                                        <g id="SVGRepo_iconCarrier">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M21.1213 2.70705C19.9497 1.53548 18.0503 1.53547 16.8787 2.70705L15.1989 4.38685L7.29289 12.2928C7.16473 12.421 7.07382 12.5816 7.02986 12.7574L6.02986 16.7574C5.94466 17.0982 6.04451 17.4587 6.29289 17.707C6.54127 17.9554 6.90176 18.0553 7.24254 17.9701L11.2425 16.9701C11.4184 16.9261 11.5789 16.8352 11.7071 16.707L19.5556 8.85857L21.2929 7.12126C22.4645 5.94969 22.4645 4.05019 21.2929 2.87862L21.1213 2.70705ZM18.2929 4.12126C18.6834 3.73074 19.3166 3.73074 19.7071 4.12126L19.8787 4.29283C20.2692 4.68336 20.2692 5.31653 19.8787 5.70705L18.8622 6.72357L17.3068 5.10738L18.2929 4.12126ZM15.8923 6.52185L17.4477 8.13804L10.4888 15.097L8.37437 15.6256L8.90296 13.5112L15.8923 6.52185ZM4 7.99994C4 7.44766 4.44772 6.99994 5 6.99994H10C10.5523 6.99994 11 6.55223 11 5.99994C11 5.44766 10.5523 4.99994 10 4.99994H5C3.34315 4.99994 2 6.34309 2 7.99994V18.9999C2 20.6568 3.34315 21.9999 5 21.9999H16C17.6569 21.9999 19 20.6568 19 18.9999V13.9999C19 13.4477 18.5523 12.9999 18 12.9999C17.4477 12.9999 17 13.4477 17 13.9999V18.9999C17 19.5522 16.5523 19.9999 16 19.9999H5C4.44772 19.9999 4 19.5522 4 18.9999V7.99994Z"
                                                fill="#FFC107"></path>
                                        </g>
                                    </svg>
                                </a>
                                <?php } ?>
                                <!-- <form action="../admin/components/delete.php" method="post">
                                    <input type="text" value="<?php echo $row["clo_id"] ?>" name="clo_id"
                                        style="display:none;"> -->
                                <!-- <input style='color:#FF4F4E;' class='cursor-pointer font-semibold' type="submit"
                                        value="Delete"> -->
                                <!-- <button type='submtit' class='w-6 h-6'>
                                        <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                stroke-linejoin="round">
                                            </g>
                                            <g id="SVGRepo_iconCarrier">
                                                <path d="M10 11V17" stroke="#FF4F4E" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round"></path>
                                                <path d="M14 11V17" stroke="#FF4F4E" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round"></path>
                                                <path d="M4 7H20" stroke="#FF4F4E" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round"></path>
                                                <path
                                                    d="M6 7H12H18V18C18 19.6569 16.6569 21 15 21H9C7.34315 21 6 19.6569 6 18V7Z"
                                                    stroke="#FF4F4E" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round"></path>
                                                <path
                                                    d="M9 5C9 3.89543 9.89543 3 11 3H13C14.1046 3 15 3.89543 15 5V7H9V5Z"
                                                    stroke="#FF4F4E" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round"></path>
                                            </g>
                                        </svg>
                                    </button>
                                </form> -->
                            </div>
                        </td>
                    </tr> <?php }}?>
                    <!-- <tr>
                        <td>khun thi han</td>
                        <td>
                            <div style='color:#79B5EC; border:1px solid #79B5EC;'
                                class='border border-[#79B5EC] w-fit flex justify-start items-center gap-1 rounded-full px-1.5 py-0.5'>

                                <svg class='w-4 h-4' width="32" height="32" viewBox="0 0 32 32" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M16.0002 15.9998L10.303 11.2522C9.45651 10.5468 9.03328 10.1941 8.72901 9.76175C8.45942 9.37868 8.25921 8.95122 8.13752 8.49888C8.00016 7.98835 8.00016 7.43743 8.00016 6.33557V2.6665M16.0002 15.9998L21.6973 11.2522C22.5438 10.5468 22.967 10.1941 23.2713 9.76175C23.5409 9.37868 23.7411 8.95122 23.8628 8.49888C24.0002 7.98835 24.0002 7.43743 24.0002 6.33557V2.6665M16.0002 15.9998L10.303 20.7475C9.45651 21.4529 9.03328 21.8056 8.72901 22.2379C8.45942 22.621 8.25921 23.0484 8.13752 23.5008C8.00016 24.0113 8.00016 24.5622 8.00016 25.6641V29.3332M16.0002 15.9998L21.6973 20.7475C22.5438 21.4529 22.967 21.8056 23.2713 22.2379C23.5409 22.621 23.7411 23.0484 23.8628 23.5008C24.0002 24.0113 24.0002 24.5622 24.0002 25.6641V29.3332M5.3335 2.6665H26.6668M5.3335 29.3332H26.6668"
                                        stroke="#79B5EC" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>

                                <p class=''>Pending</p>
                            </div>
                        </td> -->
                    <!--- cancel , pending , accepted -->
                    <!-- <td>khunthihan@gmail.com</td>
                        <td>date date date</td>
                        <td>
                            <div class='flex justify-start items-center' style='gap:50px;'>
                                <a class='cursor-pointer font-semibold' style='color:#FFC107 ;'
                                    href="../admin/components/update.php?item_id=<?php echo $row["clo_id"] ?>">
                                    <svg class='w-6 h-6' viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round">
                                        </g>
                                        <g id="SVGRepo_iconCarrier">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M21.1213 2.70705C19.9497 1.53548 18.0503 1.53547 16.8787 2.70705L15.1989 4.38685L7.29289 12.2928C7.16473 12.421 7.07382 12.5816 7.02986 12.7574L6.02986 16.7574C5.94466 17.0982 6.04451 17.4587 6.29289 17.707C6.54127 17.9554 6.90176 18.0553 7.24254 17.9701L11.2425 16.9701C11.4184 16.9261 11.5789 16.8352 11.7071 16.707L19.5556 8.85857L21.2929 7.12126C22.4645 5.94969 22.4645 4.05019 21.2929 2.87862L21.1213 2.70705ZM18.2929 4.12126C18.6834 3.73074 19.3166 3.73074 19.7071 4.12126L19.8787 4.29283C20.2692 4.68336 20.2692 5.31653 19.8787 5.70705L18.8622 6.72357L17.3068 5.10738L18.2929 4.12126ZM15.8923 6.52185L17.4477 8.13804L10.4888 15.097L8.37437 15.6256L8.90296 13.5112L15.8923 6.52185ZM4 7.99994C4 7.44766 4.44772 6.99994 5 6.99994H10C10.5523 6.99994 11 6.55223 11 5.99994C11 5.44766 10.5523 4.99994 10 4.99994H5C3.34315 4.99994 2 6.34309 2 7.99994V18.9999C2 20.6568 3.34315 21.9999 5 21.9999H16C17.6569 21.9999 19 20.6568 19 18.9999V13.9999C19 13.4477 18.5523 12.9999 18 12.9999C17.4477 12.9999 17 13.4477 17 13.9999V18.9999C17 19.5522 16.5523 19.9999 16 19.9999H5C4.44772 19.9999 4 19.5522 4 18.9999V7.99994Z"
                                                fill="#FFC107"></path>
                                        </g>
                                    </svg>
                                </a>
                                <form action="../admin/components/delete.php" method="post">
                                    <input type="text" value="<?php echo $row["clo_id"] ?>" name="clo_id"
                                        style="display:none;"> -->
                    <!-- <input style='color:#FF4F4E;' class='cursor-pointer font-semibold' type="submit"
                                        value="Delete"> -->
                    <!-- <button type='submit' class='w-6 h-6'>
                                        <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                stroke-linejoin="round">
                                            </g>
                                            <g id="SVGRepo_iconCarrier">
                                                <path d="M10 11V17" stroke="#FF4F4E" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round"></path>
                                                <path d="M14 11V17" stroke="#FF4F4E" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round"></path>
                                                <path d="M4 7H20" stroke="#FF4F4E" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round"></path>
                                                <path
                                                    d="M6 7H12H18V18C18 19.6569 16.6569 21 15 21H9C7.34315 21 6 19.6569 6 18V7Z"
                                                    stroke="#FF4F4E" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round"></path>
                                                <path
                                                    d="M9 5C9 3.89543 9.89543 3 11 3H13C14.1046 3 15 3.89543 15 5V7H9V5Z"
                                                    stroke="#FF4F4E" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round"></path>
                                            </g>
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr> -->
                    <!-- <tr>
                        <td>khun thi han</td>
                        <td>
                            <div style='color:#24AE7C ; border :1px solid #24AE7C ;'
                                class='w-fit flex justify-center items-center test gap-1 rounded-full px-1.5 py-1'>

                                <svg class='w-4 h-4' viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M10 3L4.5 8.5L2 6" stroke="#24AE7C" stroke-width="1.5"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                <p>Accepted</p>
                            </div>
                        </td> -->
                    <!--- cancel , pending , accepted -->
                    <!-- <td>khunthihan@gmail.com</td>
                        <td>date date date</td>
                        <td>
                            <div class='flex justify-start items-center' style='gap:50px;'>
                                <a class='cursor-pointer font-semibold' style='color:#FFC107 ;'
                                    href="../admin/components/update.php?item_id=<?php echo $row["clo_id"] ?>">
                                    <svg class='w-6 h-6' viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round">
                                        </g>
                                        <g id="SVGRepo_iconCarrier">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M21.1213 2.70705C19.9497 1.53548 18.0503 1.53547 16.8787 2.70705L15.1989 4.38685L7.29289 12.2928C7.16473 12.421 7.07382 12.5816 7.02986 12.7574L6.02986 16.7574C5.94466 17.0982 6.04451 17.4587 6.29289 17.707C6.54127 17.9554 6.90176 18.0553 7.24254 17.9701L11.2425 16.9701C11.4184 16.9261 11.5789 16.8352 11.7071 16.707L19.5556 8.85857L21.2929 7.12126C22.4645 5.94969 22.4645 4.05019 21.2929 2.87862L21.1213 2.70705ZM18.2929 4.12126C18.6834 3.73074 19.3166 3.73074 19.7071 4.12126L19.8787 4.29283C20.2692 4.68336 20.2692 5.31653 19.8787 5.70705L18.8622 6.72357L17.3068 5.10738L18.2929 4.12126ZM15.8923 6.52185L17.4477 8.13804L10.4888 15.097L8.37437 15.6256L8.90296 13.5112L15.8923 6.52185ZM4 7.99994C4 7.44766 4.44772 6.99994 5 6.99994H10C10.5523 6.99994 11 6.55223 11 5.99994C11 5.44766 10.5523 4.99994 10 4.99994H5C3.34315 4.99994 2 6.34309 2 7.99994V18.9999C2 20.6568 3.34315 21.9999 5 21.9999H16C17.6569 21.9999 19 20.6568 19 18.9999V13.9999C19 13.4477 18.5523 12.9999 18 12.9999C17.4477 12.9999 17 13.4477 17 13.9999V18.9999C17 19.5522 16.5523 19.9999 16 19.9999H5C4.44772 19.9999 4 19.5522 4 18.9999V7.99994Z"
                                                fill="#FFC107"></path>
                                        </g>
                                    </svg>
                                </a>
                                <form action="../admin/components/delete.php" method="post">
                                    <input type="text" value="<?php echo $row["clo_id"] ?>" name="clo_id"
                                        style="display:none;"> -->
                    <!-- <input style='color:#FF4F4E;' class='cursor-pointer font-semibold' type="submit"
                                        value="Delete"> -->
                    <!-- <button type='submtit' class='w-6 h-6'>
                                        <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                stroke-linejoin="round">
                                            </g>
                                            <g id="SVGRepo_iconCarrier">
                                                <path d="M10 11V17" stroke="#FF4F4E" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round"></path>
                                                <path d="M14 11V17" stroke="#FF4F4E" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round"></path>
                                                <path d="M4 7H20" stroke="#FF4F4E" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round"></path>
                                                <path
                                                    d="M6 7H12H18V18C18 19.6569 16.6569 21 15 21H9C7.34315 21 6 19.6569 6 18V7Z"
                                                    stroke="#FF4F4E" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round"></path>
                                                <path
                                                    d="M9 5C9 3.89543 9.89543 3 11 3H13C14.1046 3 15 3.89543 15 5V7H9V5Z"
                                                    stroke="#FF4F4E" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round"></path>
                                            </g>
                                        </svg>
                                    </button>

                                </form>
                            </div>
                        </td>
                    </tr> -->
                </tbody>

            </table>
        </div>
    </div>
</body>
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
            perPage: 15,
            perPageSelect: [15, 30, 40, 50], // Options for the entries dropdown
            columns: [{
                select: [0, 4],
                sortable: false
            }],
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
            }
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

</html>