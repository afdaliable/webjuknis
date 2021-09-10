<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Petunjuk Teknis SAKTI Web</title>
        <meta name="viewport" content="width=device-width,initial-scale=1" />
        
        <link rel="manifest" href="images/favicons/manifest.json" />
        <meta name="mobile-web-app-capable" content="yes" />
        <meta name="theme-color" content="#fff" />
        <meta name="application-name" content="mosaic-html" />
        <meta name="apple-mobile-web-app-capable" content="yes" />
        <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" />
        <meta name="apple-mobile-web-app-title" content="mosaic-html" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
        
        
        <link href="https://afdaliable.com/assets/mosaicv2/style.8ec3068d1e2473ec03fd.css" rel="stylesheet" />
        <link href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/editor-style-block.css" rel="stylesheet" />
        <link href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/afdal.css" rel="stylesheet" />
        <link href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/bootstrap-theme.min.css" rel="stylesheet" />
        <link href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/bootstrap.min.css" rel="stylesheet" />
        <style type="text/css">
        ol.afdalkasihnomor{
            list-style: decimal !important;
        }

        ol ol {
            margin: 15px !important;
        }
        h1.afdaljudul {
            font-size: 36px!important;
        }
        div.afdalmaincontent{
            max-width: 80%;
        }
        img#logosakti {
            max-width: 60px;
            margin: 0px !important;
            transform: translateX(100px);
        }

        </style>

    
        
        <style type="text/css">
            @media screen and (min-width: 55px) {
            .-translate-x-99{
                --tw-translate-x: -24rem!important;
            }
            div#sidebar {
                width: 24rem!important;
            }
        }
        img.afdalimg {
            margin: 25px 0px;
        }

        @media screen and (min-width: 1024px) {
            div#sidebar {
                width: 30rem!important;
            }
            .-translate-x-99{
                --tw-translate-x: -0rem!important;
            }
            img.afdalimg {
            margin: 25px;
            }
        }
        button#button {
            position: static;
            margin-left: 50%;
            margin-top: 10%;
        }

        span.lg\:hidden.lg\:sidebar-expanded\:block.\32 xl\:block {
            text-align: center;
            font-size: 10px;
        }

        

        </style>
    </head>
    <body class="font-inter antialiased bg-gray-100 text-gray-600"
    :class="{ 'sidebar-expanded': sidebarExpanded }"
    x-data="{ page: <?php echo get_field('modul')?>, sidebarOpen: false, sidebarExpanded:localStorage.getItem('sidebar-expanded') == 'true' }"
    x-init="$watch('sidebarExpanded', value => localStorage.setItem('sidebar-expanded', value))">

        
    
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
                    <div class="flex justify-between pr-3 sm:px-2">
                        <button class="lg:hidden text-gray-500 hover:text-gray-400" @click.stop="sidebarOpen = !sidebarOpen" aria-controls="sidebar" :aria-expanded="sidebarOpen">
                            <span class="sr-only">Close sidebar</span> <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M10.7 18.7l1.4-1.4L7.8 13H20v-2H7.8l4.3-4.3-1.4-1.4L4 12z" /></svg>
                        </button>
                        <a class="block" href="index.html">
                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/sakti.png " alt="logo-sakti" id="logosakti">
                        </a>
                    </div>
                    <div class="space-y-8">
                        <div>
                            <h3 class="text-xs uppercase text-gray-500 font-semibold pl-3">
                                <span class="hidden lg:block lg:sidebar-expanded:hidden 2xl:hidden text-center w-6" aria-hidden="true">•••</span> <span class="lg:hidden lg:sidebar-expanded:block 2xl:block">Petunjuk Teknis Aplikasi SAKTI</span>
                            </h3>
                            <ul class="mt-3">
                                <!-- bendahara komen --> 
                                <li class="px-3 py-2 rounded-sm mb-0.5 last:mb-0" :class="page === 'beranda-1' && 'bg-gray-900'">
                                    <a class="block text-gray-200 hover:text-white truncate transition duration-150" :class="page === 'beranda-1' && 'hover:text-gray-200'" href="<?php site_url()  ?>/">
                                        <div class="flex">
                                            <svg class="flex-shrink-0 h-6 w-6" viewBox="0 0 24 24">
                                                <path class="fill-current text-gray-400" :class="page === 'beranda-1' && '!text-indigo-500'" d="M12 0C5.383 0 0 5.383 0 12s5.383 12 12 12 12-5.383 12-12S18.617 0 12 0z" />
                                                <path class="fill-current text-gray-600" :class="page === 'beranda-1' && 'text-indigo-600'" d="M12 3c-4.963 0-9 4.037-9 9s4.037 9 9 9 9-4.037 9-9-4.037-9-9-9z" />
                                                <path
                                                    class="fill-current text-gray-400"
                                                    :class="page === 'beranda-1' && 'text-indigo-200'"
                                                    d="M12 15c-1.654 0-3-1.346-3-3 0-.462.113-.894.3-1.285L6 6l4.714 3.301A2.973 2.973 0 0112 9c1.654 0 3 1.346 3 3s-1.346 3-3 3z"
                                                />
                                            </svg>
                                            <span class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Beranda</span>
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
                                                    <a class="block text-gray-400 hover:text-gray-200 transition duration-150 truncate" :class="page === 'bendahara-1' && 'text-indigo-400 hover:text-indigo-400'" href="<?php get_site_url()?>/bendahara/kartu-kredit-pemerintah ">
                                                        <span class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Kartu Kredit Pemerintah (KKP)
                                                        </span>
                                                    </a>
                                                </li>
                                                <li class="mb-1 last:mb-0">
                                                    <a class="block text-gray-400 hover:text-gray-200 transition duration-150 truncate" :class="page === 'bendahara-2' && 'text-indigo-400 hover:text-indigo-400'" href="<?php get_site_url()?>/bendahara/mencatat-perintah-bayar-untuk-belanja-aset-persediaan">
                                                        <span class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Mencatat Perintah Bayar Belanja Aset-Persediaan
                                                        </span>
                                                    </a>
                                                </li>
                                                <li class="mb-1 last:mb-0">
                                                    <a class="block text-gray-400 hover:text-gray-200 transition duration-150 truncate" :class="page === 'bendahara-3' && 'text-indigo-400 hover:text-indigo-400'" href="<?php get_site_url()?>/bendahara/mencatat-perintah-bayar-untuk-belanja-non-aset-persediaan">
                                                        <span class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Mencatat Perintah Bayar Belanja Non Aset-Persediaan
                                                        </span>
                                                    </a>
                                                </li>
                                                <li class="mb-1 last:mb-0">
                                                    <a class="block text-gray-400 hover:text-gray-200 transition duration-150 truncate" :class="page === 'bendahara-4' && 'text-indigo-400 hover:text-indigo-400'" href="<?php get_site_url()?>/bendahara/perekaman-referensi-detail-rekening">
                                                        <span class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Perekaman Referensi Detil Rekening
                                                        </span>
                                                    </a>
                                                </li>
                                                <li class="mb-1 last:mb-0">
                                                    <a class="block text-gray-400 hover:text-gray-200 transition duration-150 truncate" :class="page === 'bendahara-5' && 'text-indigo-400 hover:text-indigo-400'" href="<?php get_site_url()?>/bendahara/siklus-perekaman-up-dan-gup">
                                                        <span class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Siklus Perekaman Transaksi GUP
                                                        </span>
                                                    </a>
                                                </li>
                                                <li class="mb-1 last:mb-0">
                                                    <a class="block text-gray-400 hover:text-gray-200 transition duration-150 truncate" :class="page === 'bendahara-6' && 'text-indigo-400 hover:text-indigo-400'" href="<?php get_site_url()?>/bendahara/siklus-transaksi-ptup">
                                                        <span class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Siklus Perekaman Transaksi PTUP

                                                        </span>
                                                    </a>
                                                </li>                                            
                                                <li class="mb-1 last:mb-0">
                                                    <a class="block text-gray-400 hover:text-gray-200 transition duration-150 truncate" :class="page === 'bendahara-7' && 'text-indigo-400 hover:text-indigo-400'" href="<?php get_site_url()?>/bendahara/modul-bendahara-penerimaan">
                                                        <span class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Bendahara Penerimaan 2021

                                                        </span>
                                                    </a>
                                                </li>                                            
                                                <li class="mb-1 last:mb-0">
                                                    <a class="block text-gray-400 hover:text-gray-200 transition duration-150 truncate" :class="page === 'bendahara-8' && 'text-indigo-400 hover:text-indigo-400'" href="<?php get_site_url()?>/bendahara/pencatatan-pembayaran-dana-titipan">
                                                        <span class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Pencatatan Pembayaran Dana Titipan
                                                        </span>
                                                    </a>
                                                </li>                                            
                                                <li class="mb-1 last:mb-0">
                                                    <a class="block text-gray-400 hover:text-gray-200 transition duration-150 truncate" :class="page === 'bendahara-9' && 'text-indigo-400 hover:text-indigo-400'" href="<?php get_site_url()?>/bendahara/perekaman-referensi-wajib-pajak-wajib-bayar-bendahara">
                                                        <span class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Perekaman Referensi WP Wajib Bayar Bendahara

                                                        </span>
                                                    </a>
                                                </li>                                            
                                                <li class="mb-1 last:mb-0">
                                                    <a class="block text-gray-400 hover:text-gray-200 transition duration-150 truncate" :class="page === 'bendahara-10' && 'text-indigo-400 hover:text-indigo-400'" href="<?php get_site_url()?>/bendahara/siklus-transaksi-up-bpp">
                                                        <span class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Perekaman UP BPP - RSPP

                                                        </span>
                                                    </a>
                                                </li>                                            
                                                <li class="mb-1 last:mb-0">
                                                    <a class="block text-gray-400 hover:text-gray-200 transition duration-150 truncate" :class="page === 'bendahara-11' && 'text-indigo-400 hover:text-indigo-400'" href="<?php get_site_url()?>/bendahara/setoran-pengembalian-belanja-sspb">
                                                        <span class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Setoran Pengembalian Belanja

                                                        </span>
                                                    </a>
                                                </li>                                            
                                                <li class="mb-1 last:mb-0">
                                                    <a class="block text-gray-400 hover:text-gray-200 transition duration-150 truncate" :class="page === 'bendahara-12' && 'text-indigo-400 hover:text-indigo-400'" href="<?php get_site_url()?>/bendahara/perekaman-setoran-sisa-up-tup-bendahara-pengeluaran">
                                                        <span class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Setoran UP TUP Bendahara Pengeluaran

                                                        </span>
                                                    </a>
                                                </li>                                            
                                                <li class="mb-1 last:mb-0">
                                                    <a class="block text-gray-400 hover:text-gray-200 transition duration-150 truncate" :class="page === 'bendahara-13' && 'text-indigo-400 hover:text-indigo-400'" href="<?php get_site_url()?>/bendahara/siklus-pembuatan-lpj-bendahara-pengeluaran-bulanan">
                                                        <span class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Siklus Pembuatan LPJ Bendahara Pengeluaran

                                                        </span>
                                                    </a>
                                                </li>                                            
                                                <li class="mb-1 last:mb-0">
                                                    <a class="block text-gray-400 hover:text-gray-200 transition duration-150 truncate" :class="page === 'bendahara-14' && 'text-indigo-400 hover:text-indigo-400'" href="<?php get_site_url()?>/bendahara/siklus-perekaman-tup-2021">
                                                        <span class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Siklus Perekaman TUP 2021

                                                        </span>
                                                    </a>
                                                </li>                                            
                                                <li class="mb-1 last:mb-0">
                                                    <a class="block text-gray-400 hover:text-gray-200 transition duration-150 truncate" :class="page === 'bendahara-15' && 'text-indigo-400 hover:text-indigo-400'" href="<?php get_site_url()?>/bendahara/siklus-perekaman-up-awal">
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
                                        :class="page.startsWith('komitmen-') && 'hover:text-gray-200'"
                                        href="#0"
                                        @click.prevent="sidebarExpanded ? open = !open : sidebarExpanded = true"
                                    >
                                        <div class="flex items-center justify-between">
                                            <div class="flex">
                                                <svg class="flex-shrink-0 h-6 w-6" viewBox="0 0 24 24">
                                                    <path
                                                        class="fill-current text-gray-600"
                                                        :class="page.startsWith('komitmen-') && 'text-indigo-500'"
                                                        d="M19.714 14.7l-7.007 7.007-1.414-1.414 7.007-7.007c-.195-.4-.298-.84-.3-1.286a3 3 0 113 3 2.969 2.969 0 01-1.286-.3z"
                                                    />
                                                    <path
                                                        class="fill-current text-gray-400"
                                                        :class="page.startsWith('komitmen-') && 'text-indigo-300'"
                                                        d="M10.714 18.3c.4-.195.84-.298 1.286-.3a3 3 0 11-3 3c.002-.446.105-.885.3-1.286l-6.007-6.007 1.414-1.414 6.007 6.007z"
                                                    />
                                                    <path
                                                        class="fill-current text-gray-600"
                                                        :class="page.startsWith('komitmen-') && 'text-indigo-500'"
                                                        d="M5.7 10.714c.195.4.298.84.3 1.286a3 3 0 11-3-3c.446.002.885.105 1.286.3l7.007-7.007 1.414 1.414L5.7 10.714z"
                                                    />
                                                    <path
                                                        class="fill-current text-gray-400"
                                                        :class="page.startsWith('komitmen-') && 'text-indigo-300'"
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
                                                <a class="block text-gray-400 hover:text-gray-200 transition duration-150 truncate" :class="page === 'komitmen-1' && 'text-indigo-400 hover:text-indigo-400'" href="<?php get_site_url()?>/komitmen/import-supplier-interkoneksi-langsung-span">
                                                    <span class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Import Supplier Interkoneksi Langsung SPAN

                                                    </span>
                                                </a>
                                            </li>
                                            <li class="mb-1 last:mb-0">
                                                <a class="block text-gray-400 hover:text-gray-200 transition duration-150 truncate" :class="page === 'komitmen-2' && 'text-indigo-400 hover:text-indigo-400'" href="<?php get_site_url()?>/komitmen/interkoneksi-aplikasi-sakti-dengan-aplikasi-gpp-terpusat-kppn">
                                                    <span class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Interkoneksi SAKTI Dengan GPP Terpusat KPPN
                                                    </span>
                                                </a>
                                            </li>
                                            <li class="mb-1 last:mb-0">
                                                <a
                                                    class="block text-gray-400 hover:text-gray-200 transition duration-150 truncate"
                                                    :class="page === 'komitmen-3' && 'text-indigo-400 hover:text-indigo-400'"
                                                    href="<?php get_site_url()?>/komitmen/pemindahan-pengelolaan-dan-perekaman-supplier-tipe-3"
                                                >
                                                    <span class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Pemindahan Pengelolaan & Perekaman Supplier Tipe 3
                                                    </span>
                                                </a>
                                            </li>
                                            <li class="mb-1 last:mb-0">
                                                <a class="block text-gray-400 hover:text-gray-200 transition duration-150 truncate" :class="page === 'komitmen-4' && 'text-indigo-400 hover:text-indigo-400'" href="<?php get_site_url()?>/komitmen/perekaman-bast-dengan-bank-garansi-sptjm">
                                                    <span class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Perekaman BAST BG SPTJM
                                                    </span>
                                                </a>
                                            </li>
                                            <li class="mb-1 last:mb-0">
                                                <a class="block text-gray-400 hover:text-gray-200 transition duration-150 truncate" :class="page === 'komitmen-5' && 'text-indigo-400 hover:text-indigo-400'" href="<?php get_site_url()?>/komitmen/perekaman-supplier-tipe-1-2-dan-7">
                                                    <span class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Perekaman Supplier Tipe 1,2,7 Rev.1
                                                    </span>
                                                </a>
                                            </li>
                                            <li class="mb-1 last:mb-0">
                                                <a class="block text-gray-400 hover:text-gray-200 transition duration-150 truncate" :class="page === 'komitmen-6' && 'text-indigo-400 hover:text-indigo-400'" href="<?php get_site_url()?>/komitmen/perekaman-data-supplier-tipe-6-ppnpn">
                                                    <span class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Perekaman Supplier Tipe 6 Rev.1
                                                    </span>
                                                </a>
                                            </li>
                                            <li class="mb-1 last:mb-0">
                                                <a class="block text-gray-400 hover:text-gray-200 transition duration-150 truncate" :class="page === 'komitmen-7' && 'text-indigo-400 hover:text-indigo-400'" href="<?php get_site_url()?>/komitmen/mekanisme-pembuatan-file-bcsu-ubah-data-supplier">
                                                    <span class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Mekanisme Pembuatan ADK BCSU
                                                    </span>
                                                </a>
                                            </li>
                                            <li class="mb-1 last:mb-0">
                                                <a class="block text-gray-400 hover:text-gray-200 transition duration-150 truncate" :class="page === 'komitmen-8' && 'text-indigo-400 hover:text-indigo-400'" href="<?php get_site_url()?>/komitmen/perekaman-addendum-kontrak-tahunan">
                                                    <span class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Perekaman Addendum Kontrak Tahunan IDR

                                                    </span>
                                                </a>
                                            </li>
                                            <li class="mb-1 last:mb-0">
                                                <a class="block text-gray-400 hover:text-gray-200 transition duration-150 truncate" :class="page === 'komitmen-9' && 'text-indigo-400 hover:text-indigo-400'" href="<?php get_site_url()?>/komitmen/perekaman-data-supplier-untuk-spmkp-kompensasi">
                                                    <span class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Perekaman Supplier Untuk SPM KP Kompensasi

                                                    </span>
                                                </a>
                                            </li>
                                            <li class="mb-1 last:mb-0">
                                                <a class="block text-gray-400 hover:text-gray-200 transition duration-150 truncate" :class="page === 'komitmen-10' && 'text-indigo-400 hover:text-indigo-400'" href="<?php get_site_url()?>/komitmen/perekaman-addendum-data-kontrak-multi-year-tahun-jamak">
                                                    <span class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Rekam Addendum Kontrak Multi Year SAKTI WEB

                                                    </span>
                                                </a>
                                            </li>
                                            <li class="mb-1 last:mb-0">
                                                <a class="block text-gray-400 hover:text-gray-200 transition duration-150 truncate" :class="page === 'komitmen-11' && 'text-indigo-400 hover:text-indigo-400'" href="<?php get_site_url()?>/komitmen/perekaman-addendum-data-kontrak-release-komitmen-tahunan-kontrak-tahun-jamak">
                                                    <span class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Rekam Addendum Kontrak Release SAKTI WEB


                                                    </span>
                                                </a>
                                            </li>
                                            <li class="mb-1 last:mb-0">
                                                <a class="block text-gray-400 hover:text-gray-200 transition duration-150 truncate" :class="page === 'komitmen-12' && 'text-indigo-400 hover:text-indigo-400'" href="<?php get_site_url()?>/komitmen/perekaman-bast-kontraktual">
                                                    <span class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Rekam BAST Kontraktual SAKTI WEB


                                                    </span>
                                                </a>
                                            </li>
                                            <li class="mb-1 last:mb-0">
                                                <a class="block text-gray-400 hover:text-gray-200 transition duration-150 truncate" :class="page === 'komitmen-13' && 'text-indigo-400 hover:text-indigo-400'" href="<?php get_site_url()?>/komitmen/perekaman-bast-non-kontraktual">
                                                    <span class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Rekam BAST Non Kontraktual SAKTI WEB



                                                    </span>
                                                </a>
                                            </li>
                                            <li class="mb-1 last:mb-0">
                                                <a class="block text-gray-400 hover:text-gray-200 transition duration-150 truncate" :class="page === 'komitmen-14' && 'text-indigo-400 hover:text-indigo-400'" href="<?php get_site_url()?>/komitmen/perekaman-data-kontrak-multi-year-tahun-jamak">
                                                    <span class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Rekam Kontrak Multi Year SAKTI WEB



                                                    </span>
                                                </a>
                                            </li>
                                            <li class="mb-1 last:mb-0">
                                                <a class="block text-gray-400 hover:text-gray-200 transition duration-150 truncate" :class="page === 'komitmen-16' && 'text-indigo-400 hover:text-indigo-400'" href="<?php get_site_url()?>/komitmen/perekaman-data-kontrak-release-komitmen-tahunan-kontrak-tahun-jamak">
                                                    <span class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Rekam Kontrak Release SAKTI WEB



                                                    </span>
                                                </a>
                                            </li>
                                            <li class="mb-1 last:mb-0">
                                                <a class="block text-gray-400 hover:text-gray-200 transition duration-150 truncate" :class="page === 'komitmen-17' && 'text-indigo-400 hover:text-indigo-400'" href="<?php get_site_url()?>/komitmen/perekaman-data-kontrak-tahunan-menggunakan-idr">
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
                                        :class="page.startsWith('pembayaran-') && 'hover:text-gray-200'"
                                        href="#0"
                                        @click.prevent="sidebarExpanded ? open = !open : sidebarExpanded = true"
                                    >
                                        <div class="flex items-center justify-between">
                                            <div class="flex">
                                                <svg class="flex-shrink-0 h-6 w-6" viewBox="0 0 24 24">
                                                    <circle class="fill-current text-gray-400" :class="page.startsWith('pembayaran-') && 'text-indigo-300'" cx="18.5" cy="5.5" r="4.5" />
                                                    <circle class="fill-current text-gray-600" :class="page.startsWith('pembayaran-') && 'text-indigo-500'" cx="5.5" cy="5.5" r="4.5" />
                                                    <circle class="fill-current text-gray-600" :class="page.startsWith('pembayaran-') && 'text-indigo-500'" cx="18.5" cy="18.5" r="4.5" />
                                                    <circle class="fill-current text-gray-400" :class="page.startsWith('pembayaran-') && 'text-indigo-300'" cx="5.5" cy="18.5" r="4.5" />
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
                                                <a class="block text-gray-400 hover:text-gray-200 transition duration-150 truncate" :class="page === 'pembayaran-1' && 'text-indigo-400 hover:text-indigo-400'" href="<?php get_site_url()?>/pembayaran/perekaman-spm-kontraktual">
                                                    <span class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Perekaman SPM 111 -  Non Gaji Kontraktual
                                                    </span>
                                                </a>
                                            </li>
                                            <li class="mb-1 last:mb-0">
                                                <a class="block text-gray-400 hover:text-gray-200 transition duration-150 truncate" :class="page === 'pembayaran-2' && 'text-indigo-400 hover:text-indigo-400'" href="<?php get_site_url()?>/pembayaran/perekaman-spm-gaji-induk">
                                                    <span class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Perekaman SPM 211 - Gaji Induk Pegawai
                                                    </span>
                                                </a>
                                            </li>
                                            <li class="mb-1 last:mb-0">
                                                <a class="block text-gray-400 hover:text-gray-200 transition duration-150 truncate" :class="page === 'pembayaran-3' && 'text-indigo-400 hover:text-indigo-400'" href="<?php get_site_url()?>/pembayaran/perekaman-spm-gaji-pejabat-negara">
                                                    <span class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Perekaman SPM 214 - Gaji Pejabat Negara
                                                    </span>
                                                </a>
                                            </li>
                                            <li class="mb-1 last:mb-0">
                                                <a class="block text-gray-400 hover:text-gray-200 transition duration-150 truncate" :class="page === 'pembayaran-4' && 'text-indigo-400 hover:text-indigo-400'" href="<?php get_site_url()?>/pembayaran/perekaman-spm-penghasilan-ppnpn-induk">
                                                    <span class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Perekaman SPM 217 - Penghasilan PPNPN Induk
                                                    </span>
                                                </a>
                                            </li>
                                            <li class="mb-1 last:mb-0">
                                                <a class="block text-gray-400 hover:text-gray-200 transition duration-150 truncate" :class="page === 'pembayaran-5' && 'text-indigo-400 hover:text-indigo-400'" href="<?php get_site_url()?>/pembayaran/perekaman-spm-gaji-lainnya
">
                                                    <span class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Perekaman SPM 221 - Gaji Lainnya

                                                    </span>
                                                </a>
                                            </li>
                                            <li class="mb-1 last:mb-0">
                                                <a class="block text-gray-400 hover:text-gray-200 transition duration-150 truncate" :class="page === 'pembayaran-6' && 'text-indigo-400 hover:text-indigo-400'" href="<?php get_site_url()?>/pembayaran/perekaman-spm-kekurangan-gaji">
                                                    <span class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Perekaman SPM 222 - Kekurangan Gaji

                                                    </span>
                                                </a>
                                            </li>
                                            <li class="mb-1 last:mb-0">
                                                <a class="block text-gray-400 hover:text-gray-200 transition duration-150 truncate" :class="page === 'pembayaran-7' && 'text-indigo-400 hover:text-indigo-400'" href="<?php get_site_url()?>/pembayaran/perekaman-spm-gaji-susulan">
                                                    <span class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Perekaman SPM 223 - Gaji Susulan

                                                    </span>
                                                </a>
                                            </li>
                                            <li class="mb-1 last:mb-0">
                                                <a class="block text-gray-400 hover:text-gray-200 transition duration-150 truncate" :class="page === 'pembayaran-8' && 'text-indigo-400 hover:text-indigo-400'" href="<?php get_site_url()?>/pembayaran/perekaman-spm-gaji-susulan">
                                                    <span class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Perekaman SPM 227 - Penghasilan PPNPN Susulan

                                                    </span>
                                                </a>
                                            </li>
                                            <li class="mb-1 last:mb-0">
                                                <a class="block text-gray-400 hover:text-gray-200 transition duration-150 truncate" :class="page === 'pembayaran-9' && 'text-indigo-400 hover:text-indigo-400'" href="<?php get_site_url()?>/pembayaran/perekaman-spm-non-gaji-bast">
                                                    <span class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Perekaman SPM 231 - Non Gaji - BAST

                                                    </span>
                                                </a>
                                            </li>
                                            <li class="mb-1 last:mb-0">
                                                <a class="block text-gray-400 hover:text-gray-200 transition duration-150 truncate" :class="page === 'pembayaran-10' && 'text-indigo-400 hover:text-indigo-400'" href="<?php get_site_url()?>/pembayaran/perekaman-spm-non-gaji-non-bast">
                                                    <span class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Perekaman SPM 231 - Non Gaji - Non BAST

                                                    </span>
                                                </a>
                                            </li>
                                            <li class="mb-1 last:mb-0">
                                                <a class="block text-gray-400 hover:text-gray-200 transition duration-150 truncate" :class="page === 'pembayaran-11' && 'text-indigo-400 hover:text-indigo-400'" href="<?php get_site_url()?>/pembayaran/perekaman-spm-ib-pajak-imbalan-bunga-pajak">
                                                    <span class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Perekaman SPM 233 - SPM-IB-PAJAK

                                                </a>
                                            </li>
                                            <li class="mb-1 last:mb-0">
                                                <a class="block text-gray-400 hover:text-gray-200 transition duration-150 truncate" :class="page === 'pembayaran-12' && 'text-indigo-400 hover:text-indigo-400'" href="<?php get_site_url()?>/pembayaran/perekaman-spm-ib-pbb-imbalan-bunga-pajak-bumi-dan-bangunan">
                                                    <span class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Perekaman SPM 234 - SPM-IB-PBB

                                                    </span>
                                                </a>
                                            </li>
                                            <li class="mb-1 last:mb-0">
                                                <a class="block text-gray-400 hover:text-gray-200 transition duration-150 truncate" :class="page === 'pembayaran-13' && 'text-indigo-400 hover:text-indigo-400'" href="<?php get_site_url()?>/pembayaran/perekaman-spm-ls-banyak-penerima-bast">
                                                    <span class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Perekaman SPM 237 - LS-Banyak Penerima - BAST

                                                    </span>
                                                </a>
                                            </li>
                                            <li class="mb-1 last:mb-0">
                                                <a class="block text-gray-400 hover:text-gray-200 transition duration-150 truncate" :class="page === 'pembayaran-14' && 'text-indigo-400 hover:text-indigo-400'" href="<?php get_site_url()?>/pembayaran/perekaman-spm-ls-banyak-penerima-non-bast">
                                                    <span class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Perekaman SPM 237 - LS-Banyak Penerima - Non BAST


                                                    </span>
                                                </a>
                                            </li>
                                            <li class="mb-1 last:mb-0">
                                                <a class="block text-gray-400 hover:text-gray-200 transition duration-150 truncate" :class="page === 'pembayaran-15' && 'text-indigo-400 hover:text-indigo-400'" href="<?php get_site_url()?>/pembayaran/perekaman-spm-p-bmdab-pengembalian-bea-masuk-denda-administrasi-dan-atau-bunga">
                                                    <span class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Perekaman SPM 414 - SPM-P-BMDAB

                                                    </span>
                                                </a>
                                            </li>
                                            <li class="mb-1 last:mb-0">
                                                <a class="block text-gray-400 hover:text-gray-200 transition duration-150 truncate" :class="page === 'pembayaran-16' && 'text-indigo-400 hover:text-indigo-400'" href="<?php get_site_url()?>/pembayaran/perekaman-spm-p-bmc-pengembalian-bea-masuk-dan-atau-cukai">
                                                    <span class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Perekaman SPM 415 - SPM-P-BMC


                                                    </span>
                                                </a>
                                            </li>
                                            <li class="mb-1 last:mb-0">
                                                <a class="block text-gray-400 hover:text-gray-200 transition duration-150 truncate" :class="page === 'pembayaran-17' && 'text-indigo-400 hover:text-indigo-400'" href="<?php get_site_url()?>/pembayaran/perekaman-spm-kpe-kbk-kembali-pungutan-ekspor-kembali-bea-keluar">
                                                    <span class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Perekaman SPM 416 - SPM KPE_KBK


                                                    </span>
                                                </a>
                                            </li>
                                            <li class="mb-1 last:mb-0">
                                                <a class="block text-gray-400 hover:text-gray-200 transition duration-150 truncate" :class="page === 'pembayaran-18' && 'text-indigo-400 hover:text-indigo-400'" href="<?php get_site_url()?>/pembayaran/perekaman-spm-p-pnbp-pengembalian-penerimaan-negara-bukan-pajak">
                                                    <span class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Perekaman SPM 421 - SPM-P-PNBP



                                                    </span>
                                                </a>
                                            </li>
                                            <li class="mb-1 last:mb-0">
                                                <a class="block text-gray-400 hover:text-gray-200 transition duration-150 truncate" :class="page === 'pembayaran-19' && 'text-indigo-400 hover:text-indigo-400'" href="<?php get_site_url()?>/pembayaran/perekaman-spmkc-kembali-cukai">
                                                    <span class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Perekaman SPM 431 - SPMKC



                                                    </span>
                                                </a>
                                            </li>
                                            <li class="mb-1 last:mb-0">
                                                <a class="block text-gray-400 hover:text-gray-200 transition duration-150 truncate" :class="page === 'pembayaran-20' && 'text-indigo-400 hover:text-indigo-400'" href="<?php get_site_url()?>/pembayaran/perekaman-spmkbe-kbk-kembali-bea-ekspor-kembali-bea-keluar">
                                                    <span class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Perekaman SPM 432 - KBE KBK



                                                    </span>
                                                </a>
                                            </li>
                                            <li class="mb-1 last:mb-0">
                                                <a class="block text-gray-400 hover:text-gray-200 transition duration-150 truncate" :class="page === 'pembayaran-21' && 'text-indigo-400 hover:text-indigo-400'" href="<?php get_site_url()?>/pembayaran/perekaman-spm-pemotongan-penyaluran-dana-desa">
                                                    <span class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Perekaman SPM Pemotongan dan Penyaluran Dana Desa



                                                    </span>
                                                </a>
                                            </li>
                                            <li class="mb-1 last:mb-0">
                                                <a class="block text-gray-400 hover:text-gray-200 transition duration-150 truncate" :class="page === 'pembayaran-22' && 'text-indigo-400 hover:text-indigo-400'" href="<?php get_site_url()?><?php get_site_url()?>/pembayaran/perekaman-spm-penyaluran-dak-fisik">
                                                    <span class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Perekaman SPM Penyaluran DAK Fisik 237



                                                    </span>
                                                </a>
                                            </li>
                                            <li class="mb-1 last:mb-0">
                                                <a class="block text-gray-400 hover:text-gray-200 transition duration-150 truncate" :class="page === 'pembayaran-23' && 'text-indigo-400 hover:text-indigo-400'" href="<?php get_site_url()?>/pembayaran/perekaman-spm-penyaluran-dana-bos">
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
                                                <a class="block text-gray-400 hover:text-gray-200 transition duration-150 truncate" href="#">
                                                    <span class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Akses Chatbot</span>
                                                </a>
                                            </li>
                                            <li class="mb-1 last:mb-0">
                                                <a class="block text-gray-400 hover:text-gray-200 transition duration-150 truncate" href="#">
                                                    <span class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Panduan Penggunaan Chatbot</span>
                                                </a>
                                            </li>
                                            <li class="mb-1 last:mb-0">
                                                <a class="block text-gray-400 hover:text-gray-200 transition duration-150 truncate" href="#">
                                                    <span class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">License & Copyright</span>
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
                                                <a class="block text-gray-400 hover:text-gray-200 transition duration-150 truncate" href="https://hai.kemenkeu.go.id/">
                                                    <span class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Kunjungi Hai DJPb</span>
                                                </a>
                                            </li>
                                            <li class="mb-1 last:mb-0">
                                                <a class="block text-gray-400 hover:text-gray-200 transition duration-150 truncate" href="https://hai.kemenkeu.go.id/new-ticket">
                                                    <span class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Hubungi Hai DJPb</span>
                                                </a>
                                            </li>
                                            <li class="mb-1 last:mb-0">
                                                <a class="block text-gray-400 hover:text-gray-200 transition duration-150 truncate" href="https://kemenkeupedia.kemenkeu.go.id/">
                                                    <span class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Kunjungi HaiPedia</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div>
                            <h3 class="text-xs uppercase text-gray-500 font-semibold pl-3">
                                <span class="hidden lg:block lg:sidebar-expanded:hidden 2xl:hidden text-center w-6" aria-hidden="true">•••</span> <span class="lg:hidden lg:sidebar-expanded:block 2xl:block">Kamu Harus Tau</span>
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
                                                <a class="block text-gray-400 hover:text-gray-200 transition duration-150 truncate" href="#">
                                                    <span class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Framework & CMS Web</span>
                                                </a>
                                            </li>
                                            <li class="mb-1 last:mb-0">
                                                <a class="block text-gray-400 hover:text-gray-200 transition duration-150 truncate" href="#">
                                                    <span class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Modeling Chatbot</span>
                                                </a>
                                            </li>
                                            <li class="mb-1 last:mb-0">
                                                <a class="block text-gray-400 hover:text-gray-200 transition duration-150 truncate" href="#">
                                                    <span class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Kreator & Developer</span>
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
        <header class=" top-0 bg-white border-b border-gray-200 z-30">
                    <div class="px-4 sm:px-6 lg:px-8">
                        <div class="flex items-center justify-between h-16 -mb-px">
                            <div class="flex">
                                <button class="text-gray-500 hover:text-gray-600 lg:hidden" @click.stop="sidebarOpen = !sidebarOpen" aria-controls="sidebar" :aria-expanded="sidebarOpen">
                                    <span class="sr-only">Open sidebar</span>
                                    <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <rect x="4" y="5" width="16" height="2" />
                                        <rect x="4" y="11" width="16" height="2" />
                                        <rect x="4" y="17" width="16" height="2" />
                                    </svg>
                                </button>
                            </div>
                            <div class="frame">
                            <a href="https://haichatbotsakti.site/chatbot"><button class="custom-btn btn-12"><span>BotSakti Siap!</span><span>Tanya Chatbot!</span></button></a>
                            <a href="https://hai.kemenkeu.go.id/new-ticket"><button class="custom-btn btn-12"><span>Tanya MinHai!</span><span>Hubungi Hai DJPb!</span></button></a>
                                
                            </div>
                            
                        </div>
                    </div>
        </header>

