<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Mosaic HTML Demo - Shop</title>
        <meta name="viewport" content="width=device-width,initial-scale=1" />
        <link rel="shortcut icon" href="images/favicons/favicon.ico" />
        <link rel="icon" type="image/png" sizes="16x16" href="images/favicons/favicon-16x16.png" />
        <link rel="icon" type="image/png" sizes="32x32" href="images/favicons/favicon-32x32.png" />
        <link rel="icon" type="image/png" sizes="48x48" href="images/favicons/favicon-48x48.png" />
        <link rel="manifest" href="images/favicons/manifest.json" />
        <meta name="mobile-web-app-capable" content="yes" />
        <meta name="theme-color" content="#fff" />
        <meta name="application-name" content="mosaic-html" />
        <link rel="apple-touch-icon" sizes="57x57" href="images/favicons/apple-touch-icon-57x57.png" />
        <link rel="apple-touch-icon" sizes="60x60" href="images/favicons/apple-touch-icon-60x60.png" />
        <link rel="apple-touch-icon" sizes="72x72" href="images/favicons/apple-touch-icon-72x72.png" />
        <link rel="apple-touch-icon" sizes="76x76" href="images/favicons/apple-touch-icon-76x76.png" />
        <link rel="apple-touch-icon" sizes="114x114" href="images/favicons/apple-touch-icon-114x114.png" />
        <link rel="apple-touch-icon" sizes="120x120" href="images/favicons/apple-touch-icon-120x120.png" />
        <link rel="apple-touch-icon" sizes="144x144" href="images/favicons/apple-touch-icon-144x144.png" />
        <link rel="apple-touch-icon" sizes="152x152" href="images/favicons/apple-touch-icon-152x152.png" />
        <link rel="apple-touch-icon" sizes="167x167" href="images/favicons/apple-touch-icon-167x167.png" />
        <link rel="apple-touch-icon" sizes="180x180" href="images/favicons/apple-touch-icon-180x180.png" />
        <link rel="apple-touch-icon" sizes="1024x1024" href="images/favicons/apple-touch-icon-1024x1024.png" />
        <meta name="apple-mobile-web-app-capable" content="yes" />
        <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" />
        <meta name="apple-mobile-web-app-title" content="mosaic-html" />
        <link href="https://afdaliable.com/assets/mosaicv2/style.8ec3068d1e2473ec03fd.css" rel="stylesheet" />
        <link href="assets/css/afdal.css" rel="stylesheet" />
        <style type="text/css">
            @media screen and (min-width: 55px) {
            .-translate-x-99{
                --tw-translate-x: -24rem!important;
            }
            div#sidebar {
                width: 24rem!important;
            }
        }

        @media screen and (min-width: 1024px) {
            div#sidebar {
                width: 30rem!important;
            }
            .-translate-x-99{
                --tw-translate-x: -0rem!important;
            }
        }
        </style>
    </head>
    <body class="font-inter antialiased bg-gray-100 text-gray-600"
    :class="{ 'sidebar-expanded': sidebarExpanded }"
    x-data="{ page: <?php echo get_field('modul')?>, sidebarOpen: false, sidebarExpanded:localStorage.getItem('sidebar-expanded') == 'true' }"
    x-init="$watch('sidebarExpanded', value => localStorage.setItem('sidebar-expanded', value))" >

        
    
        <script>
            if (localStorage.getItem("sidebar-expanded") == "true") {
                document.querySelector("body").classList.add("sidebar-expanded");
            } else {
                document.querySelector("body").classList.remove("sidebar-expanded");
            }
        </script>
        <!-- sidebar fix -->
        <div class="flex h-screen overflow-hidden">
            <div>
                <div class="fixed inset-0 bg-gray-900 bg-opacity-30 z-40 lg:hidden lg:z-auto transition-opacity duration-200" :class="sidebarOpen ? 'opacity-100' : 'opacity-0 pointer-events-none'" aria-hidden="true" x-cloak></div>
                <div
                    id="sidebar"
                    class="flex flex-col absolute z-40 left-0 top-0 lg:static lg:left-auto lg:top-auto lg:translate-x-0 transform h-screen overflow-y-scroll lg:overflow-y-auto no-scrollbar w-64 lg:w-20 lg:sidebar-expanded:!w-64 2xl:!w-64 flex-shrink-0 bg-gray-800 p-4 transition-all duration-200 ease-in-out"
                    :class="sidebarOpen ? 'translate-x-0' : '-translate-x-99'"
                    @click.outside="sidebarOpen = false"
                    @keydown.escape.window="sidebarOpen = false"
                    x-cloak="lg"
                    
                >
                    <div class="flex justify-between mb-10 pr-3 sm:px-2">
                        <button class="lg:hidden text-gray-500 hover:text-gray-400" @click.stop="sidebarOpen = !sidebarOpen" aria-controls="sidebar" :aria-expanded="sidebarOpen">
                            <span class="sr-only">Close sidebar</span> <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M10.7 18.7l1.4-1.4L7.8 13H20v-2H7.8l4.3-4.3-1.4-1.4L4 12z" /></svg>
                        </button>
                        <a class="block" href="index.html">
                            <svg width="32" height="32" viewBox="0 0 32 32">
                                <defs>
                                    <linearGradient x1="28.538%" y1="20.229%" x2="100%" y2="108.156%" id="logo-a">
                                        <stop stop-color="#A5B4FC" stop-opacity="0" offset="0%" />
                                        <stop stop-color="#A5B4FC" offset="100%" />
                                    </linearGradient>
                                    <linearGradient x1="88.638%" y1="29.267%" x2="22.42%" y2="100%" id="logo-b">
                                        <stop stop-color="#38BDF8" stop-opacity="0" offset="0%" />
                                        <stop stop-color="#38BDF8" offset="100%" />
                                    </linearGradient>
                                </defs>
                                <rect fill="#6366F1" width="32" height="32" rx="16" />
                                <path d="M18.277.16C26.035 1.267 32 7.938 32 16c0 8.837-7.163 16-16 16a15.937 15.937 0 01-10.426-3.863L18.277.161z" fill="#4F46E5" />
                                <path d="M7.404 2.503l18.339 26.19A15.93 15.93 0 0116 32C7.163 32 0 24.837 0 16 0 10.327 2.952 5.344 7.404 2.503z" fill="url(#logo-a)" />
                                <path d="M2.223 24.14L29.777 7.86A15.926 15.926 0 0132 16c0 8.837-7.163 16-16 16-5.864 0-10.991-3.154-13.777-7.86z" fill="url(#logo-b)" />
                            </svg>
                        </a>
                    </div>
                    <div class="space-y-8">
                        <div>
                            <h3 class="text-xs uppercase text-gray-500 font-semibold pl-3">
                                <span class="hidden lg:block lg:sidebar-expanded:hidden 2xl:hidden text-center w-6" aria-hidden="true">•••</span> <span class="lg:hidden lg:sidebar-expanded:block 2xl:block">Petunjuk Teknis Aplikasi SAKTI</span>
                            </h3>
                            <ul class="mt-3">
                                <!-- bendahara komen -->
                                <li class="px-3 py-2 rounded-sm mb-0.5 last:mb-0" :class="page === 'dashboard' && 'bg-gray-900'">
                                    <a class="block text-gray-200 hover:text-white truncate transition duration-150" :class="page === 'dashboard' && 'hover:text-gray-200'" href="index.html">
                                        <div class="flex">
                                            <svg class="flex-shrink-0 h-6 w-6" viewBox="0 0 24 24">
                                                <path class="fill-current text-gray-400" :class="page === 'dashboard' && '!text-indigo-500'" d="M12 0C5.383 0 0 5.383 0 12s5.383 12 12 12 12-5.383 12-12S18.617 0 12 0z" />
                                                <path class="fill-current text-gray-600" :class="page === 'dashboard' && 'text-indigo-600'" d="M12 3c-4.963 0-9 4.037-9 9s4.037 9 9 9 9-4.037 9-9-4.037-9-9-9z" />
                                                <path
                                                    class="fill-current text-gray-400"
                                                    :class="page === 'dashboard' && 'text-indigo-200'"
                                                    d="M12 15c-1.654 0-3-1.346-3-3 0-.462.113-.894.3-1.285L6 6l4.714 3.301A2.973 2.973 0 0112 9c1.654 0 3 1.346 3 3s-1.346 3-3 3z"
                                                />
                                            </svg>
                                            <span class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Dashboard</span>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                               <ul class="mt-3">
                                  <li class="px-3 py-2 rounded-sm mb-0.5 last:mb-0" :class="{ 'bg-gray-900': page.startsWith('bendahara-') }" x-data="{ open: false }" x-init="$nextTick(() => open = page.startsWith('bendahara-'))">
                                        <a
                                            class="block text-gray-200 hover:text-white truncate transition duration-150"
                                            :class="page.startsWith('bendahara-') && 'hover:text-gray-200'"
                                            href="#0"
                                            @click.prevent="sidebarExpanded ? open = !open : sidebarExpanded = true"
                                        >
                                            <div class="flex items-center justify-between">
                                                <div class="flex">
                                                    <svg class="flex-shrink-0 h-6 w-6" viewBox="0 0 24 24">
                                                        <path class="fill-current text-gray-400" :class="page.startsWith('bendahara-') && 'text-indigo-300'" d="M13 15l11-7L11.504.136a1 1 0 00-1.019.007L0 7l13 8z" />
                                                        <path class="fill-current text-gray-700" :class="page.startsWith('bendahara-') && '!text-indigo-600'" d="M13 15L0 7v9c0 .355.189.685.496.864L13 24v-9z" />
                                                        <path class="fill-current text-gray-600" :class="page.startsWith('bendahara-') && 'text-indigo-500'" d="M13 15.047V24l10.573-7.181A.999.999 0 0024 16V8l-11 7.047z" />
                                                    </svg>
                                                    <span class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Bendahara</span>
                                                </div>
                                                <div class="flex flex-shrink-0 ml-2 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">
                                                    <svg class="w-3 h-3 flex-shrink-0 ml-1 fill-current text-gray-400" :class="open && 'transform rotate-180'" viewBox="0 0 12 12"><path d="M5.9 11.4L.5 6l1.4-1.4 4 4 4-4L11.3 6z" /></svg>
                                                </div>
                                            </div>
                                        </a>
                                        <div class="lg:hidden lg:sidebar-expanded:block 2xl:block">
                                            <ul class="pl-9 mt-1" :class="!open && 'hidden'" x-cloak>
                                                <li class="mb-1 last:mb-0">
                                                    <a class="block text-gray-400 hover:text-gray-200 transition duration-150 truncate" :class="page === 'bendahara-1' && 'text-indigo-400 hover:text-indigo-400'" href="http://cobajuknis.test:8080/uncategorized/54euthrtjntdeyj">
                                                        <span class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Kartu Kredit Pemerintah (KKP)
                                                        </span>
                                                    </a>
                                                </li>
                                                <li class="mb-1 last:mb-0">
                                                    <a class="block text-gray-400 hover:text-gray-200 transition duration-150 truncate" :class="page === 'ecommerce-orders' && 'text-indigo-400 hover:text-indigo-400'" href="orders.html">
                                                        <span class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Mencatat Perintah Bayar Belanja Aset-Persediaan
                                                        </span>
                                                    </a>
                                                </li>
                                                <li class="mb-1 last:mb-0">
                                                    <a class="block text-gray-400 hover:text-gray-200 transition duration-150 truncate" :class="page === 'ecommerce-shop' && 'text-indigo-400 hover:text-indigo-400'" href="shop.html">
                                                        <span class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Mencatat Perintah Bayar Belanja Non Aset-Persediaan
                                                        </span>
                                                    </a>
                                                </li>
                                                <li class="mb-1 last:mb-0">
                                                    <a class="block text-gray-400 hover:text-gray-200 transition duration-150 truncate" :class="page === 'ecommerce-shop-2' && 'text-indigo-400 hover:text-indigo-400'" href="shop-2.html">
                                                        <span class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Perekaman Referensi Detil Rekening
                                                        </span>
                                                    </a>
                                                </li>
                                                <li class="mb-1 last:mb-0">
                                                    <a class="block text-gray-400 hover:text-gray-200 transition duration-150 truncate" :class="page === 'ecommerce-product' && 'text-indigo-400 hover:text-indigo-400'" href="product.html">
                                                        <span class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Siklus Perekaman Transaksi GUP
                                                        </span>
                                                    </a>
                                                </li>
                                                <li class="mb-1 last:mb-0">
                                                    <a class="block text-gray-400 hover:text-gray-200 transition duration-150 truncate" :class="page === 'ecommerce-product' && 'text-indigo-400 hover:text-indigo-400'" href="product.html">
                                                        <span class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Siklus Perekaman Transaksi PTUP

                                                        </span>
                                                    </a>
                                                </li>                                            
                                                <li class="mb-1 last:mb-0">
                                                    <a class="block text-gray-400 hover:text-gray-200 transition duration-150 truncate" :class="page === 'ecommerce-product' && 'text-indigo-400 hover:text-indigo-400'" href="product.html">
                                                        <span class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Bendahara Penerimaan 2021

                                                        </span>
                                                    </a>
                                                </li>                                            
                                                <li class="mb-1 last:mb-0">
                                                    <a class="block text-gray-400 hover:text-gray-200 transition duration-150 truncate" :class="page === 'ecommerce-product' && 'text-indigo-400 hover:text-indigo-400'" href="product.html">
                                                        <span class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Pencatatan Pembayaran Dana Titipan
                                                        </span>
                                                    </a>
                                                </li>                                            
                                                <li class="mb-1 last:mb-0">
                                                    <a class="block text-gray-400 hover:text-gray-200 transition duration-150 truncate" :class="page === 'ecommerce-product' && 'text-indigo-400 hover:text-indigo-400'" href="product.html">
                                                        <span class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Perekaman Referensi WP Wajib Bayar Bendahara

                                                        </span>
                                                    </a>
                                                </li>                                            
                                                <li class="mb-1 last:mb-0">
                                                    <a class="block text-gray-400 hover:text-gray-200 transition duration-150 truncate" :class="page === 'ecommerce-product' && 'text-indigo-400 hover:text-indigo-400'" href="product.html">
                                                        <span class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Perekaman UP BPP - RSPP

                                                        </span>
                                                    </a>
                                                </li>                                            
                                                <li class="mb-1 last:mb-0">
                                                    <a class="block text-gray-400 hover:text-gray-200 transition duration-150 truncate" :class="page === 'ecommerce-product' && 'text-indigo-400 hover:text-indigo-400'" href="product.html">
                                                        <span class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Setoran Pengembalian Belanja

                                                        </span>
                                                    </a>
                                                </li>                                            
                                                <li class="mb-1 last:mb-0">
                                                    <a class="block text-gray-400 hover:text-gray-200 transition duration-150 truncate" :class="page === 'ecommerce-product' && 'text-indigo-400 hover:text-indigo-400'" href="product.html">
                                                        <span class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Setoran UP TUP Bendahara Pengeluaran

                                                        </span>
                                                    </a>
                                                </li>                                            
                                                <li class="mb-1 last:mb-0">
                                                    <a class="block text-gray-400 hover:text-gray-200 transition duration-150 truncate" :class="page === 'ecommerce-product' && 'text-indigo-400 hover:text-indigo-400'" href="product.html">
                                                        <span class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Siklus Pembuatan LPJ Bendahara Pengeluaran

                                                        </span>
                                                    </a>
                                                </li>                                            
                                                <li class="mb-1 last:mb-0">
                                                    <a class="block text-gray-400 hover:text-gray-200 transition duration-150 truncate" :class="page === 'ecommerce-product' && 'text-indigo-400 hover:text-indigo-400'" href="product.html">
                                                        <span class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Siklus Perekaman TUP 2021

                                                        </span>
                                                    </a>
                                                </li>                                            
                                                <li class="mb-1 last:mb-0">
                                                    <a class="block text-gray-400 hover:text-gray-200 transition duration-150 truncate" :class="page === 'ecommerce-product' && 'text-indigo-400 hover:text-indigo-400'" href="product.html">
                                                        <span class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Siklus Perekaman UP Awal


                                                        </span>
                                                    </a>
                                                </li> 
                                            </ul>
                                        </div>
                                    </li>
                                </ul>
                                    
                                
                              <ul class="mt-3">
                                <li class="px-3 py-2 rounded-sm mb-0.5 last:mb-0" :class="{ 'bg-gray-900': page.startsWith('komitmen-') }" x-data="{ open: false }" x-init="$nextTick(() => open = page.startsWith('komitmen-'))">
                                    <a
                                        class="block text-gray-200 hover:text-white truncate transition duration-150"
                                        :class="page.startsWith('settings-') && 'hover:text-gray-200'"
                                        href="#0"
                                        @click.prevent="sidebarExpanded ? open = !open : sidebarExpanded = true"
                                    >
                                        <div class="flex items-center justify-between">
                                            <div class="flex">
                                                <svg class="flex-shrink-0 h-6 w-6" viewBox="0 0 24 24">
                                                    <path
                                                        class="fill-current text-gray-600"
                                                        :class="page.startsWith('settings-') && 'text-indigo-500'"
                                                        d="M19.714 14.7l-7.007 7.007-1.414-1.414 7.007-7.007c-.195-.4-.298-.84-.3-1.286a3 3 0 113 3 2.969 2.969 0 01-1.286-.3z"
                                                    />
                                                    <path
                                                        class="fill-current text-gray-400"
                                                        :class="page.startsWith('settings-') && 'text-indigo-300'"
                                                        d="M10.714 18.3c.4-.195.84-.298 1.286-.3a3 3 0 11-3 3c.002-.446.105-.885.3-1.286l-6.007-6.007 1.414-1.414 6.007 6.007z"
                                                    />
                                                    <path
                                                        class="fill-current text-gray-600"
                                                        :class="page.startsWith('settings-') && 'text-indigo-500'"
                                                        d="M5.7 10.714c.195.4.298.84.3 1.286a3 3 0 11-3-3c.446.002.885.105 1.286.3l7.007-7.007 1.414 1.414L5.7 10.714z"
                                                    />
                                                    <path
                                                        class="fill-current text-gray-400"
                                                        :class="page.startsWith('settings-') && 'text-indigo-300'"
                                                        d="M19.707 9.292a3.012 3.012 0 00-1.415 1.415L13.286 5.7c-.4.195-.84.298-1.286.3a3 3 0 113-3 2.969 2.969 0 01-.3 1.286l5.007 5.006z"
                                                    />
                                                </svg>
                                                <span class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Komitmen</span>
                                            </div>
                                            <div class="flex flex-shrink-0 ml-2 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">
                                                <svg class="w-3 h-3 flex-shrink-0 ml-1 fill-current text-gray-400" :class="open && 'transform rotate-180'" viewBox="0 0 12 12"><path d="M5.9 11.4L.5 6l1.4-1.4 4 4 4-4L11.3 6z" /></svg>
                                            </div>
                                        </div>
                                    </a>
                                    <div class="lg:hidden lg:sidebar-expanded:block 2xl:block">
                                        <ul class="pl-9 mt-1" :class="!open && 'hidden'" x-cloak>
                                            <li class="mb-1 last:mb-0">
                                                <a class="block text-gray-400 hover:text-gray-200 transition duration-150 truncate" :class="page === 'settings-account' && 'text-indigo-400 hover:text-indigo-400'" href="settings.html">
                                                    <span class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Import Supplier Interkoneksi Langsung SPAN

                                                    </span>
                                                </a>
                                            </li>
                                            <li class="mb-1 last:mb-0">
                                                <a class="block text-gray-400 hover:text-gray-200 transition duration-150 truncate" :class="page === 'settings-account' && 'text-indigo-400 hover:text-indigo-400'" href="settings.html">
                                                    <span class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Interkoneksi SAKTI Dengan GPP Terpusat KPPN
                                                    </span>
                                                </a>
                                            </li>
                                            <li class="mb-1 last:mb-0">
                                                <a
                                                    class="block text-gray-400 hover:text-gray-200 transition duration-150 truncate"
                                                    :class="page === 'settings-notifications' && 'text-indigo-400 hover:text-indigo-400'"
                                                    href="notifications.html"
                                                >
                                                    <span class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Pemindahan Pengelolaan & Perekaman Supplier Tipe 3
                                                    </span>
                                                </a>
                                            </li>
                                            <li class="mb-1 last:mb-0">
                                                <a class="block text-gray-400 hover:text-gray-200 transition duration-150 truncate" :class="page === 'settings-apps' && 'text-indigo-400 hover:text-indigo-400'" href="connected-apps.html">
                                                    <span class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Perekaman BAST BG SPTJM
                                                    </span>
                                                </a>
                                            </li>
                                            <li class="mb-1 last:mb-0">
                                                <a class="block text-gray-400 hover:text-gray-200 transition duration-150 truncate" :class="page === 'settings-plans' && 'text-indigo-400 hover:text-indigo-400'" href="plans.html">
                                                    <span class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Perekaman Supplier Tipe 1,2,7 Rev.1
                                                    </span>
                                                </a>
                                            </li>
                                            <li class="mb-1 last:mb-0">
                                                <a class="block text-gray-400 hover:text-gray-200 transition duration-150 truncate" :class="page === 'settings-billing' && 'text-indigo-400 hover:text-indigo-400'" href="billing.html">
                                                    <span class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Perekaman Supplier Tipe 6 Rev.1
                                                    </span>
                                                </a>
                                            </li>
                                            <li class="mb-1 last:mb-0">
                                                <a class="block text-gray-400 hover:text-gray-200 transition duration-150 truncate" :class="page === 'settings-feedback' && 'text-indigo-400 hover:text-indigo-400'" href="feedback.html">
                                                    <span class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Mekanisme Pembuatan ADK BCSU
                                                    </span>
                                                </a>
                                            </li>
                                            <li class="mb-1 last:mb-0">
                                                <a class="block text-gray-400 hover:text-gray-200 transition duration-150 truncate" :class="page === 'settings-feedback' && 'text-indigo-400 hover:text-indigo-400'" href="feedback.html">
                                                    <span class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Perekaman Addendum Kontrak Tahunan IDR

                                                    </span>
                                                </a>
                                            </li>
                                            <li class="mb-1 last:mb-0">
                                                <a class="block text-gray-400 hover:text-gray-200 transition duration-150 truncate" :class="page === 'settings-feedback' && 'text-indigo-400 hover:text-indigo-400'" href="feedback.html">
                                                    <span class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Perekaman Supplier Untuk SPM KP Kompensasi

                                                    </span>
                                                </a>
                                            </li>
                                            <li class="mb-1 last:mb-0">
                                                <a class="block text-gray-400 hover:text-gray-200 transition duration-150 truncate" :class="page === 'settings-feedback' && 'text-indigo-400 hover:text-indigo-400'" href="feedback.html">
                                                    <span class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Rekam Addendum Kontrak Multi Year SAKTI WEB

                                                    </span>
                                                </a>
                                            </li>
                                            <li class="mb-1 last:mb-0">
                                                <a class="block text-gray-400 hover:text-gray-200 transition duration-150 truncate" :class="page === 'settings-feedback' && 'text-indigo-400 hover:text-indigo-400'" href="feedback.html">
                                                    <span class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Rekam Addendum Kontrak Release SAKTI WEB


                                                    </span>
                                                </a>
                                            </li>
                                            <li class="mb-1 last:mb-0">
                                                <a class="block text-gray-400 hover:text-gray-200 transition duration-150 truncate" :class="page === 'settings-feedback' && 'text-indigo-400 hover:text-indigo-400'" href="feedback.html">
                                                    <span class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Rekam BAST Kontraktual SAKTI WEB


                                                    </span>
                                                </a>
                                            </li>
                                            <li class="mb-1 last:mb-0">
                                                <a class="block text-gray-400 hover:text-gray-200 transition duration-150 truncate" :class="page === 'settings-feedback' && 'text-indigo-400 hover:text-indigo-400'" href="feedback.html">
                                                    <span class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Rekam BAST Non Kontraktual SAKTI WEB



                                                    </span>
                                                </a>
                                            </li>
                                            <li class="mb-1 last:mb-0">
                                                <a class="block text-gray-400 hover:text-gray-200 transition duration-150 truncate" :class="page === 'settings-feedback' && 'text-indigo-400 hover:text-indigo-400'" href="feedback.html">
                                                    <span class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Rekam Kontrak Multi Year SAKTI WEB



                                                    </span>
                                                </a>
                                            </li>
                                            <li class="mb-1 last:mb-0">
                                                <a class="block text-gray-400 hover:text-gray-200 transition duration-150 truncate" :class="page === 'settings-feedback' && 'text-indigo-400 hover:text-indigo-400'" href="feedback.html">
                                                    <span class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Rekam Kontrak Release SAKTI WEB



                                                    </span>
                                                </a>
                                            </li>
                                            <li class="mb-1 last:mb-0">
                                                <a class="block text-gray-400 hover:text-gray-200 transition duration-150 truncate" :class="page === 'settings-feedback' && 'text-indigo-400 hover:text-indigo-400'" href="feedback.html">
                                                    <span class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Rekam Kontrak Tahunan IDR SAKTI WEB


                                                    </span>
                                                </a>
                                            </li>


                                        </ul>
                                    </div>
                                </li>
                            </ul> <ul class="mt-3">
                                <li class="px-3 py-2 rounded-sm mb-0.5 last:mb-0" :class="{ 'bg-gray-900': page.startsWith('pembayaran-') }" x-data="{ open: false }" x-init="$nextTick(() => open = page.startsWith('pembayaran-'))">
                                    <a
                                        class="block text-gray-200 hover:text-white truncate transition duration-150"
                                        :class="page.startsWith('utility-') && 'hover:text-gray-200'"
                                        href="#0"
                                        @click.prevent="sidebarExpanded ? open = !open : sidebarExpanded = true"
                                    >
                                        <div class="flex items-center justify-between">
                                            <div class="flex">
                                                <svg class="flex-shrink-0 h-6 w-6" viewBox="0 0 24 24">
                                                    <circle class="fill-current text-gray-400" :class="page.startsWith('utility-') && 'text-indigo-300'" cx="18.5" cy="5.5" r="4.5" />
                                                    <circle class="fill-current text-gray-600" :class="page.startsWith('utility-') && 'text-indigo-500'" cx="5.5" cy="5.5" r="4.5" />
                                                    <circle class="fill-current text-gray-600" :class="page.startsWith('utility-') && 'text-indigo-500'" cx="18.5" cy="18.5" r="4.5" />
                                                    <circle class="fill-current text-gray-400" :class="page.startsWith('utility-') && 'text-indigo-300'" cx="5.5" cy="18.5" r="4.5" />
                                                </svg>
                                                <span class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Pembayaran</span>
                                            </div>
                                            <div class="flex flex-shrink-0 ml-2 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">
                                                <svg class="w-3 h-3 flex-shrink-0 ml-1 fill-current text-gray-400" :class="open && 'transform rotate-180'" viewBox="0 0 12 12"><path d="M5.9 11.4L.5 6l1.4-1.4 4 4 4-4L11.3 6z" /></svg>
                                            </div>
                                        </div>
                                    </a>
                                    <div class="lg:hidden lg:sidebar-expanded:block 2xl:block">
                                        <ul class="pl-9 mt-1" :class="!open && 'hidden'" x-cloak>
                                            <li class="mb-1 last:mb-0">
                                                <a class="block text-gray-400 hover:text-gray-200 transition duration-150 truncate" :class="page === 'utility-changelog' && 'text-indigo-400 hover:text-indigo-400'" href="changelog.html">
                                                    <span class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Perekaman SPM 111 -  Non Gaji Kontraktual
                                                    </span>
                                                </a>
                                            </li>
                                            <li class="mb-1 last:mb-0">
                                                <a class="block text-gray-400 hover:text-gray-200 transition duration-150 truncate" :class="page === 'utility-roadmap' && 'text-indigo-400 hover:text-indigo-400'" href="roadmap.html">
                                                    <span class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Perekaman SPM 211 - Gaji Induk Pegawai
                                                    </span>
                                                </a>
                                            </li>
                                            <li class="mb-1 last:mb-0">
                                                <a class="block text-gray-400 hover:text-gray-200 transition duration-150 truncate" :class="page === 'utility-faqs' && 'text-indigo-400 hover:text-indigo-400'" href="faqs.html">
                                                    <span class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Perekaman SPM 214 - Gaji Pejabat Negara
                                                    </span>
                                                </a>
                                            </li>
                                            <li class="mb-1 last:mb-0">
                                                <a class="block text-gray-400 hover:text-gray-200 transition duration-150 truncate" :class="page === 'utility-empty-state' && 'text-indigo-400 hover:text-indigo-400'" href="empty-state.html">
                                                    <span class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Perekaman SPM 217 - Penghasilan PPNPN Induk
                                                    </span>
                                                </a>
                                            </li>
                                            <li class="mb-1 last:mb-0">
                                                <a class="block text-gray-400 hover:text-gray-200 transition duration-150 truncate" :class="page === 'utility-404' && 'text-indigo-400 hover:text-indigo-400'" href="404.html">
                                                    <span class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Perekaman SPM 221 - Gaji Lainnya

                                                    </span>
                                                </a>
                                            </li>
                                            <li class="mb-1 last:mb-0">
                                                <a class="block text-gray-400 hover:text-gray-200 transition duration-150 truncate" :class="page === 'utility-404' && 'text-indigo-400 hover:text-indigo-400'" href="404.html">
                                                    <span class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Perekaman SPM 222 - Kekurangan Gaji

                                                    </span>
                                                </a>
                                            </li>
                                            <li class="mb-1 last:mb-0">
                                                <a class="block text-gray-400 hover:text-gray-200 transition duration-150 truncate" :class="page === 'utility-404' && 'text-indigo-400 hover:text-indigo-400'" href="404.html">
                                                    <span class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Perekaman SPM 223 - Gaji Susulan

                                                    </span>
                                                </a>
                                            </li>
                                            <li class="mb-1 last:mb-0">
                                                <a class="block text-gray-400 hover:text-gray-200 transition duration-150 truncate" :class="page === 'utility-404' && 'text-indigo-400 hover:text-indigo-400'" href="404.html">
                                                    <span class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Perekaman SPM 227 - Penghasilan PPNPN Susulan

                                                    </span>
                                                </a>
                                            </li>
                                            <li class="mb-1 last:mb-0">
                                                <a class="block text-gray-400 hover:text-gray-200 transition duration-150 truncate" :class="page === 'utility-404' && 'text-indigo-400 hover:text-indigo-400'" href="404.html">
                                                    <span class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Perekaman SPM 231 - Non Gaji - BAST

                                                    </span>
                                                </a>
                                            </li>
                                            <li class="mb-1 last:mb-0">
                                                <a class="block text-gray-400 hover:text-gray-200 transition duration-150 truncate" :class="page === 'utility-404' && 'text-indigo-400 hover:text-indigo-400'" href="404.html">
                                                    <span class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Perekaman SPM 231 - Non Gaji - Non BAST

                                                    </span>
                                                </a>
                                            </li>
                                            <li class="mb-1 last:mb-0">
                                                <a class="block text-gray-400 hover:text-gray-200 transition duration-150 truncate" :class="page === 'utility-404' && 'text-indigo-400 hover:text-indigo-400'" href="404.html">
                                                    <span class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Perekaman SPM 233 - SPM-IB-PAJAK

                                                </a>
                                            </li>
                                            <li class="mb-1 last:mb-0">
                                                <a class="block text-gray-400 hover:text-gray-200 transition duration-150 truncate" :class="page === 'utility-404' && 'text-indigo-400 hover:text-indigo-400'" href="404.html">
                                                    <span class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Perekaman SPM 234 - SPM-IB-PBB

                                                    </span>
                                                </a>
                                            </li>
                                            <li class="mb-1 last:mb-0">
                                                <a class="block text-gray-400 hover:text-gray-200 transition duration-150 truncate" :class="page === 'utility-404' && 'text-indigo-400 hover:text-indigo-400'" href="404.html">
                                                    <span class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Perekaman SPM 237 - LS-Banyak Penerima - BAST

                                                    </span>
                                                </a>
                                            </li>
                                            <li class="mb-1 last:mb-0">
                                                <a class="block text-gray-400 hover:text-gray-200 transition duration-150 truncate" :class="page === 'utility-404' && 'text-indigo-400 hover:text-indigo-400'" href="404.html">
                                                    <span class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Perekaman SPM 237 - LS-Banyak Penerima - Non BAST


                                                    </span>
                                                </a>
                                            </li>
                                            <li class="mb-1 last:mb-0">
                                                <a class="block text-gray-400 hover:text-gray-200 transition duration-150 truncate" :class="page === 'utility-404' && 'text-indigo-400 hover:text-indigo-400'" href="404.html">
                                                    <span class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Perekaman SPM 414 - SPM-P-BMDAB

                                                    </span>
                                                </a>
                                            </li>
                                            <li class="mb-1 last:mb-0">
                                                <a class="block text-gray-400 hover:text-gray-200 transition duration-150 truncate" :class="page === 'utility-404' && 'text-indigo-400 hover:text-indigo-400'" href="404.html">
                                                    <span class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Perekaman SPM 415 - SPM-P-BMC


                                                    </span>
                                                </a>
                                            </li>
                                            <li class="mb-1 last:mb-0">
                                                <a class="block text-gray-400 hover:text-gray-200 transition duration-150 truncate" :class="page === 'utility-404' && 'text-indigo-400 hover:text-indigo-400'" href="404.html">
                                                    <span class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Perekaman SPM 416 - SPM KPE_KBK


                                                    </span>
                                                </a>
                                            </li>
                                            <li class="mb-1 last:mb-0">
                                                <a class="block text-gray-400 hover:text-gray-200 transition duration-150 truncate" :class="page === 'utility-404' && 'text-indigo-400 hover:text-indigo-400'" href="404.html">
                                                    <span class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Perekaman SPM 421 - SPM-P-PNBP



                                                    </span>
                                                </a>
                                            </li>
                                            <li class="mb-1 last:mb-0">
                                                <a class="block text-gray-400 hover:text-gray-200 transition duration-150 truncate" :class="page === 'utility-404' && 'text-indigo-400 hover:text-indigo-400'" href="404.html">
                                                    <span class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Perekaman SPM 431 - SPMKC



                                                    </span>
                                                </a>
                                            </li>
                                            <li class="mb-1 last:mb-0">
                                                <a class="block text-gray-400 hover:text-gray-200 transition duration-150 truncate" :class="page === 'utility-404' && 'text-indigo-400 hover:text-indigo-400'" href="404.html">
                                                    <span class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Perekaman SPM 432 - KBE KBK



                                                    </span>
                                                </a>
                                            </li>
                                            <li class="mb-1 last:mb-0">
                                                <a class="block text-gray-400 hover:text-gray-200 transition duration-150 truncate" :class="page === 'utility-404' && 'text-indigo-400 hover:text-indigo-400'" href="404.html">
                                                    <span class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Perekaman SPM Pemotongan dan Penyaluran Dana Desa



                                                    </span>
                                                </a>
                                            </li>
                                            <li class="mb-1 last:mb-0">
                                                <a class="block text-gray-400 hover:text-gray-200 transition duration-150 truncate" :class="page === 'utility-404' && 'text-indigo-400 hover:text-indigo-400'" href="404.html">
                                                    <span class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Perekaman SPM Penyaluran DAK Fisik 237



                                                    </span>
                                                </a>
                                            </li>
                                            <li class="mb-1 last:mb-0">
                                                <a class="block text-gray-400 hover:text-gray-200 transition duration-150 truncate" :class="page === 'utility-404' && 'text-indigo-400 hover:text-indigo-400'" href="404.html">
                                                    <span class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Perekaman SPM Penyaluran DANA BOS 237



                                                    </span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div>
                            <h3 class="text-xs uppercase text-gray-500 font-semibold pl-3">
                                <span class="hidden lg:block lg:sidebar-expanded:hidden 2xl:hidden text-center w-6" aria-hidden="true">•••</span> <span class="lg:hidden lg:sidebar-expanded:block 2xl:block">Fitur Tambahan</span>
                            </h3>
                            <ul class="mt-3">
                                <li class="px-3 py-2 rounded-sm mb-0.5 last:mb-0" x-data="{ open: false }">
                                    <a
                                        class="sidebar-expander-link block text-gray-200 hover:text-white transition duration-150"
                                        :class="open && 'hover:text-gray-200'"
                                        href="#0"
                                        @click.prevent="sidebarExpanded ? open = !open : sidebarExpanded = true"
                                    >
                                        <div class="flex items-center justify-between">
                                            <div class="flex">
                                                <svg class="flex-shrink-0 h-6 w-6" viewBox="0 0 24 24">
                                                    <path class="fill-current text-gray-600" d="M8.07 16H10V8H8.07a8 8 0 110 8z" />
                                                    <path class="fill-current text-gray-400" d="M15 12L8 6v5H0v2h8v5z" />
                                                </svg>
                                                <span class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Chatbot</span>
                                            </div>
                                            <div class="flex flex-shrink-0 ml-2 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">
                                                <svg class="w-3 h-3 flex-shrink-0 ml-1 fill-current text-gray-400" :class="{ 'transform rotate-180': open }" viewBox="0 0 12 12"><path d="M5.9 11.4L.5 6l1.4-1.4 4 4 4-4L11.3 6z" /></svg>
                                            </div>
                                        </div>
                                    </a>
                                    <div class="lg:hidden lg:sidebar-expanded:block 2xl:block">
                                        <ul class="pl-9 mt-1" :class="{ 'hidden': !open }" x-cloak>
                                            <li class="mb-1 last:mb-0">
                                                <a class="block text-gray-400 hover:text-gray-200 transition duration-150 truncate" href="signin.html">
                                                    <span class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Sign In</span>
                                                </a>
                                            </li>
                                            <li class="mb-1 last:mb-0">
                                                <a class="block text-gray-400 hover:text-gray-200 transition duration-150 truncate" href="signup.html">
                                                    <span class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Sign up</span>
                                                </a>
                                            </li>
                                            <li class="mb-1 last:mb-0">
                                                <a class="block text-gray-400 hover:text-gray-200 transition duration-150 truncate" href="reset-password.html">
                                                    <span class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Reset Password</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="px-3 py-2 rounded-sm mb-0.5 last:mb-0" x-data="{ open: false }">
                                    <a
                                        class="sidebar-expander-link block text-gray-200 hover:text-white transition duration-150"
                                        :class="open && 'hover:text-gray-200'"
                                        href="#0"
                                        @click.prevent="sidebarExpanded ? open = !open : sidebarExpanded = true"
                                    >
                                        <div class="flex items-center justify-between">
                                            <div class="flex">
                                                <svg class="flex-shrink-0 h-6 w-6" viewBox="0 0 24 24">
                                                    <path class="fill-current text-gray-600" d="M8.07 16H10V8H8.07a8 8 0 110 8z" />
                                                    <path class="fill-current text-gray-400" d="M15 12L8 6v5H0v2h8v5z" />
                                                </svg>
                                                <span class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Layanan Contact Center HAI DJPb</span>
                                            </div>
                                            <div class="flex flex-shrink-0 ml-2 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">
                                                <svg class="w-3 h-3 flex-shrink-0 ml-1 fill-current text-gray-400" :class="{ 'transform rotate-180': open }" viewBox="0 0 12 12"><path d="M5.9 11.4L.5 6l1.4-1.4 4 4 4-4L11.3 6z" /></svg>
                                            </div>
                                        </div>
                                    </a>
                                    <div class="lg:hidden lg:sidebar-expanded:block 2xl:block">
                                        <ul class="pl-9 mt-1" :class="{ 'hidden': !open }" x-cloak>
                                            <li class="mb-1 last:mb-0">
                                                <a class="block text-gray-400 hover:text-gray-200 transition duration-150 truncate" href="signin.html">
                                                    <span class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Sign In</span>
                                                </a>
                                            </li>
                                            <li class="mb-1 last:mb-0">
                                                <a class="block text-gray-400 hover:text-gray-200 transition duration-150 truncate" href="signup.html">
                                                    <span class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Sign up</span>
                                                </a>
                                            </li>
                                            <li class="mb-1 last:mb-0">
                                                <a class="block text-gray-400 hover:text-gray-200 transition duration-150 truncate" href="reset-password.html">
                                                    <span class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Reset Password</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div>
                            <h3 class="text-xs uppercase text-gray-500 font-semibold pl-3">
                                <span class="hidden lg:block lg:sidebar-expanded:hidden 2xl:hidden text-center w-6" aria-hidden="true">•••</span> <span class="lg:hidden lg:sidebar-expanded:block 2xl:block">Kreator & Developer</span>
                            </h3>
                            <ul class="mt-3">
                                <li class="px-3 py-2 rounded-sm mb-0.5 last:mb-0" x-data="{ open: false }">
                                    <a
                                        class="sidebar-expander-link block text-gray-200 hover:text-white transition duration-150"
                                        :class="open && 'hover:text-gray-200'"
                                        href="#0"
                                        @click.prevent="sidebarExpanded ? open = !open : sidebarExpanded = true"
                                    >
                                        <div class="flex items-center justify-between">
                                            <div class="flex">
                                                <svg class="flex-shrink-0 h-6 w-6" viewBox="0 0 24 24">
                                                    <path class="fill-current text-gray-600" d="M8.07 16H10V8H8.07a8 8 0 110 8z" />
                                                    <path class="fill-current text-gray-400" d="M15 12L8 6v5H0v2h8v5z" />
                                                </svg>
                                                <span class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Tentang Kami</span>
                                            </div>
                                            <div class="flex flex-shrink-0 ml-2 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">
                                                <svg class="w-3 h-3 flex-shrink-0 ml-1 fill-current text-gray-400" :class="{ 'transform rotate-180': open }" viewBox="0 0 12 12"><path d="M5.9 11.4L.5 6l1.4-1.4 4 4 4-4L11.3 6z" /></svg>
                                            </div>
                                        </div>
                                    </a>
                                    <div class="lg:hidden lg:sidebar-expanded:block 2xl:block">
                                        <ul class="pl-9 mt-1" :class="{ 'hidden': !open }" x-cloak>
                                            <li class="mb-1 last:mb-0">
                                                <a class="block text-gray-400 hover:text-gray-200 transition duration-150 truncate" href="signin.html">
                                                    <span class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Sign In</span>
                                                </a>
                                            </li>
                                            <li class="mb-1 last:mb-0">
                                                <a class="block text-gray-400 hover:text-gray-200 transition duration-150 truncate" href="signup.html">
                                                    <span class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Sign up</span>
                                                </a>
                                            </li>
                                            <li class="mb-1 last:mb-0">
                                                <a class="block text-gray-400 hover:text-gray-200 transition duration-150 truncate" href="reset-password.html">
                                                    <span class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Reset Password</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="pt-3 hidden lg:inline-flex 2xl:hidden justify-end mt-auto">
                        <div class="px-3 py-2">
                            <button @click="sidebarExpanded = !sidebarExpanded">
                                <span class="sr-only">Expand / collapse sidebar</span>
                                <svg class="w-6 h-6 fill-current sidebar-expanded:rotate-180" viewBox="0 0 24 24">
                                    <path class="text-gray-400" d="M19.586 11l-5-5L16 4.586 23.414 12 16 19.414 14.586 18l5-5H7v-2z" />
                                    <path class="text-gray-600" d="M3 23H1V1h2z" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="relative flex flex-col flex-1 overflow-y-auto overflow-x-hidden">

