<?php 
get_header();
?>
                <header class="sticky top-0 bg-white border-b border-gray-200 z-30">
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
                            <div class="flex items-center space-x-3">
                                <div x-data="{ searchOpen: false }">
                                    <button
                                        class="w-8 h-8 flex items-center justify-center bg-gray-100 hover:bg-gray-200 transition duration-150 rounded-full"
                                        :class="{ 'bg-gray-200': searchOpen }"
                                        @click.prevent="searchOpen = true;if (searchOpen) $nextTick(()=>{$refs.searchInput.focus()});"
                                        aria-controls="search-modal"
                                    >
                                        <span class="sr-only">Search</span>
                                        <svg class="w-4 h-4" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                                            <path class="fill-current text-gray-500" d="M7 14c-3.86 0-7-3.14-7-7s3.14-7 7-7 7 3.14 7 7-3.14 7-7 7zM7 2C4.243 2 2 4.243 2 7s2.243 5 5 5 5-2.243 5-5-2.243-5-5-5z" />
                                            <path class="fill-current text-gray-400" d="M15.707 14.293L13.314 11.9a8.019 8.019 0 01-1.414 1.414l2.393 2.393a.997.997 0 001.414 0 .999.999 0 000-1.414z" />
                                        </svg>
                                    </button>
                                    <div
                                        class="fixed inset-0 bg-gray-900 bg-opacity-30 z-50 transition-opacity"
                                        x-show="searchOpen"
                                        x-transition:enter="transition ease-out duration-200"
                                        x-transition:enter-start="opacity-0"
                                        x-transition:enter-end="opacity-100"
                                        x-transition:leave="transition ease-out duration-100"
                                        x-transition:leave-start="opacity-100"
                                        x-transition:leave-end="opacity-0"
                                        aria-hidden="true"
                                        x-cloak
                                    ></div>
                                    <div
                                        id="search-modal"
                                        class="fixed inset-0 z-50 overflow-hidden flex items-start top-20 mb-4 justify-center transform px-4 sm:px-6"
                                        role="dialog"
                                        aria-modal="true"
                                        x-show="searchOpen"
                                        x-transition:enter="transition ease-in-out duration-200"
                                        x-transition:enter-start="opacity-0 translate-y-4"
                                        x-transition:enter-end="opacity-100 translate-y-0"
                                        x-transition:leave="transition ease-in-out duration-200"
                                        x-transition:leave-start="opacity-100 translate-y-0"
                                        x-transition:leave-end="opacity-0 translate-y-4"
                                        x-cloak
                                    >
                                        <div class="bg-white overflow-auto max-w-2xl w-full max-h-full rounded shadow-lg" @click.outside="searchOpen = false" @keydown.escape.window="searchOpen = false">
                                            <form class="border-b border-gray-200">
                                                <div class="relative">
                                                    <label for="modal-search" class="sr-only">Search</label>
                                                    <input
                                                        id="modal-search"
                                                        class="w-full border-0 focus:ring-transparent placeholder-gray-400 appearance-none py-3 pl-10 pr-4"
                                                        type="search"
                                                        placeholder="Search Anything…"
                                                        x-ref="searchInput"
                                                    />
                                                    <button class="absolute inset-0 right-auto group" type="submit" aria-label="Search">
                                                        <svg class="w-4 h-4 flex-shrink-0 fill-current text-gray-400 group-hover:text-gray-500 ml-4 mr-2" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M7 14c-3.86 0-7-3.14-7-7s3.14-7 7-7 7 3.14 7 7-3.14 7-7 7zM7 2C4.243 2 2 4.243 2 7s2.243 5 5 5 5-2.243 5-5-2.243-5-5-5z" />
                                                            <path d="M15.707 14.293L13.314 11.9a8.019 8.019 0 01-1.414 1.414l2.393 2.393a.997.997 0 001.414 0 .999.999 0 000-1.414z" />
                                                        </svg>
                                                    </button>
                                                </div>
                                            </form>
                                            <div class="py-4 px-2">
                                                <div class="mb-3 last:mb-0">
                                                    <div class="text-xs font-semibold text-gray-400 uppercase px-2 mb-2">Recent searches</div>
                                                    <ul class="text-sm">
                                                        <li>
                                                            <a
                                                                class="flex items-center p-2 text-gray-800 hover:text-white hover:bg-indigo-500 rounded group"
                                                                href="#0"
                                                                @click="searchOpen = false"
                                                                @focus="searchOpen = true"
                                                                @focusout="searchOpen = false"
                                                            >
                                                                <svg class="w-4 h-4 fill-current text-gray-400 group-hover:text-white group-hover:text-opacity-50 flex-shrink-0 mr-3" viewBox="0 0 16 16">
                                                                    <path
                                                                        d="M15.707 14.293v.001a1 1 0 01-1.414 1.414L11.185 12.6A6.935 6.935 0 017 14a7.016 7.016 0 01-5.173-2.308l-1.537 1.3L0 8l4.873 1.12-1.521 1.285a4.971 4.971 0 008.59-2.835l1.979.454a6.971 6.971 0 01-1.321 3.157l3.107 3.112zM14 6L9.127 4.88l1.521-1.28a4.971 4.971 0 00-8.59 2.83L.084 5.976a6.977 6.977 0 0112.089-3.668l1.537-1.3L14 6z"
                                                                    />
                                                                </svg>
                                                                <span>Form Builder - 23 hours on-demand video</span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a
                                                                class="flex items-center p-2 text-gray-800 hover:text-white hover:bg-indigo-500 rounded group"
                                                                href="#0"
                                                                @click="searchOpen = false"
                                                                @focus="searchOpen = true"
                                                                @focusout="searchOpen = false"
                                                            >
                                                                <svg class="w-4 h-4 fill-current text-gray-400 group-hover:text-white group-hover:text-opacity-50 flex-shrink-0 mr-3" viewBox="0 0 16 16">
                                                                    <path
                                                                        d="M15.707 14.293v.001a1 1 0 01-1.414 1.414L11.185 12.6A6.935 6.935 0 017 14a7.016 7.016 0 01-5.173-2.308l-1.537 1.3L0 8l4.873 1.12-1.521 1.285a4.971 4.971 0 008.59-2.835l1.979.454a6.971 6.971 0 01-1.321 3.157l3.107 3.112zM14 6L9.127 4.88l1.521-1.28a4.971 4.971 0 00-8.59 2.83L.084 5.976a6.977 6.977 0 0112.089-3.668l1.537-1.3L14 6z"
                                                                    />
                                                                </svg>
                                                                <span>Access Mosaic on mobile and TV</span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a
                                                                class="flex items-center p-2 text-gray-800 hover:text-white hover:bg-indigo-500 rounded group"
                                                                href="#0"
                                                                @click="searchOpen = false"
                                                                @focus="searchOpen = true"
                                                                @focusout="searchOpen = false"
                                                            >
                                                                <svg class="w-4 h-4 fill-current text-gray-400 group-hover:text-white group-hover:text-opacity-50 flex-shrink-0 mr-3" viewBox="0 0 16 16">
                                                                    <path
                                                                        d="M15.707 14.293v.001a1 1 0 01-1.414 1.414L11.185 12.6A6.935 6.935 0 017 14a7.016 7.016 0 01-5.173-2.308l-1.537 1.3L0 8l4.873 1.12-1.521 1.285a4.971 4.971 0 008.59-2.835l1.979.454a6.971 6.971 0 01-1.321 3.157l3.107 3.112zM14 6L9.127 4.88l1.521-1.28a4.971 4.971 0 00-8.59 2.83L.084 5.976a6.977 6.977 0 0112.089-3.668l1.537-1.3L14 6z"
                                                                    />
                                                                </svg>
                                                                <span>Product Update - Q4 2021</span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a
                                                                class="flex items-center p-2 text-gray-800 hover:text-white hover:bg-indigo-500 rounded group"
                                                                href="#0"
                                                                @click="searchOpen = false"
                                                                @focus="searchOpen = true"
                                                                @focusout="searchOpen = false"
                                                            >
                                                                <svg class="w-4 h-4 fill-current text-gray-400 group-hover:text-white group-hover:text-opacity-50 flex-shrink-0 mr-3" viewBox="0 0 16 16">
                                                                    <path
                                                                        d="M15.707 14.293v.001a1 1 0 01-1.414 1.414L11.185 12.6A6.935 6.935 0 017 14a7.016 7.016 0 01-5.173-2.308l-1.537 1.3L0 8l4.873 1.12-1.521 1.285a4.971 4.971 0 008.59-2.835l1.979.454a6.971 6.971 0 01-1.321 3.157l3.107 3.112zM14 6L9.127 4.88l1.521-1.28a4.971 4.971 0 00-8.59 2.83L.084 5.976a6.977 6.977 0 0112.089-3.668l1.537-1.3L14 6z"
                                                                    />
                                                                </svg>
                                                                <span>Master Digital Marketing Strategy course</span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a
                                                                class="flex items-center p-2 text-gray-800 hover:text-white hover:bg-indigo-500 rounded group"
                                                                href="#0"
                                                                @click="searchOpen = false"
                                                                @focus="searchOpen = true"
                                                                @focusout="searchOpen = false"
                                                            >
                                                                <svg class="w-4 h-4 fill-current text-gray-400 group-hover:text-white group-hover:text-opacity-50 flex-shrink-0 mr-3" viewBox="0 0 16 16">
                                                                    <path
                                                                        d="M15.707 14.293v.001a1 1 0 01-1.414 1.414L11.185 12.6A6.935 6.935 0 017 14a7.016 7.016 0 01-5.173-2.308l-1.537 1.3L0 8l4.873 1.12-1.521 1.285a4.971 4.971 0 008.59-2.835l1.979.454a6.971 6.971 0 01-1.321 3.157l3.107 3.112zM14 6L9.127 4.88l1.521-1.28a4.971 4.971 0 00-8.59 2.83L.084 5.976a6.977 6.977 0 0112.089-3.668l1.537-1.3L14 6z"
                                                                    />
                                                                </svg>
                                                                <span>Dedicated forms for products</span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a
                                                                class="flex items-center p-2 text-gray-800 hover:text-white hover:bg-indigo-500 rounded group"
                                                                href="#0"
                                                                @click="searchOpen = false"
                                                                @focus="searchOpen = true"
                                                                @focusout="searchOpen = false"
                                                            >
                                                                <svg class="w-4 h-4 fill-current text-gray-400 group-hover:text-white group-hover:text-opacity-50 flex-shrink-0 mr-3" viewBox="0 0 16 16">
                                                                    <path
                                                                        d="M15.707 14.293v.001a1 1 0 01-1.414 1.414L11.185 12.6A6.935 6.935 0 017 14a7.016 7.016 0 01-5.173-2.308l-1.537 1.3L0 8l4.873 1.12-1.521 1.285a4.971 4.971 0 008.59-2.835l1.979.454a6.971 6.971 0 01-1.321 3.157l3.107 3.112zM14 6L9.127 4.88l1.521-1.28a4.971 4.971 0 00-8.59 2.83L.084 5.976a6.977 6.977 0 0112.089-3.668l1.537-1.3L14 6z"
                                                                    />
                                                                </svg>
                                                                <span>Product Update - Q4 2021</span>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="mb-3 last:mb-0">
                                                    <div class="text-xs font-semibold text-gray-400 uppercase px-2 mb-2">Recent pages</div>
                                                    <ul class="text-sm">
                                                        <li>
                                                            <a
                                                                class="flex items-center p-2 text-gray-800 hover:text-white hover:bg-indigo-500 rounded group"
                                                                href="#0"
                                                                @click="searchOpen = false"
                                                                @focus="searchOpen = true"
                                                                @focusout="searchOpen = false"
                                                            >
                                                                <svg class="w-4 h-4 fill-current text-gray-400 group-hover:text-white group-hover:text-opacity-50 flex-shrink-0 mr-3" viewBox="0 0 16 16">
                                                                    <path d="M14 0H2c-.6 0-1 .4-1 1v14c0 .6.4 1 1 1h8l5-5V1c0-.6-.4-1-1-1zM3 2h10v8H9v4H3V2z" />
                                                                </svg>
                                                                <span><span class="font-medium text-gray-800 group-hover:text-white">Messages</span> - Conversation / … / Mike Mills</span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a
                                                                class="flex items-center p-2 text-gray-800 hover:text-white hover:bg-indigo-500 rounded group"
                                                                href="#0"
                                                                @click="searchOpen = false"
                                                                @focus="searchOpen = true"
                                                                @focusout="searchOpen = false"
                                                            >
                                                                <svg class="w-4 h-4 fill-current text-gray-400 group-hover:text-white group-hover:text-opacity-50 flex-shrink-0 mr-3" viewBox="0 0 16 16">
                                                                    <path d="M14 0H2c-.6 0-1 .4-1 1v14c0 .6.4 1 1 1h8l5-5V1c0-.6-.4-1-1-1zM3 2h10v8H9v4H3V2z" />
                                                                </svg>
                                                                <span><span class="font-medium text-gray-800 group-hover:text-white">Messages</span> - Conversation / … / Eva Patrick</span>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="relative inline-flex" x-data="{ open: false }">
                                    <button
                                        class="w-8 h-8 flex items-center justify-center bg-gray-100 hover:bg-gray-200 transition duration-150 rounded-full"
                                        :class="{ 'bg-gray-200': open }"
                                        aria-haspopup="true"
                                        @click.prevent="open = !open"
                                        :aria-expanded="open"
                                    >
                                        <span class="sr-only">Notifications</span>
                                        <svg class="w-4 h-4" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                                            <path class="fill-current text-gray-500" d="M6.5 0C2.91 0 0 2.462 0 5.5c0 1.075.37 2.074 1 2.922V12l2.699-1.542A7.454 7.454 0 006.5 11c3.59 0 6.5-2.462 6.5-5.5S10.09 0 6.5 0z" />
                                            <path
                                                class="fill-current text-gray-400"
                                                d="M16 9.5c0-.987-.429-1.897-1.147-2.639C14.124 10.348 10.66 13 6.5 13c-.103 0-.202-.018-.305-.021C7.231 13.617 8.556 14 10 14c.449 0 .886-.04 1.307-.11L15 16v-4h-.012C15.627 11.285 16 10.425 16 9.5z"
                                            />
                                        </svg>
                                        <div class="absolute top-0 right-0 w-2.5 h-2.5 bg-red-500 border-2 border-white rounded-full"></div>
                                    </button>
                                    <div
                                        class="origin-top-right z-10 absolute top-full right-0 -mr-48 sm:mr-0 min-w-80 bg-white border border-gray-200 py-1.5 rounded shadow-lg overflow-hidden mt-1"
                                        @click.outside="open = false"
                                        @keydown.escape.window="open = false"
                                        x-show="open"
                                        x-transition:enter="transition ease-out duration-200 transform"
                                        x-transition:enter-start="opacity-0 -translate-y-2"
                                        x-transition:enter-end="opacity-100 translate-y-0"
                                        x-transition:leave="transition ease-out duration-200"
                                        x-transition:leave-start="opacity-100"
                                        x-transition:leave-end="opacity-0"
                                        x-cloak
                                    >
                                        <div class="text-xs font-semibold text-gray-400 uppercase pt-1.5 pb-2 px-4">Notifications</div>
                                        <ul>
                                            <li class="border-b border-gray-200 last:border-0">
                                                <a class="block py-2 px-4 hover:bg-gray-50" href="#0" @click="open = false" @focus="open = true" @focusout="open = false">
                                                    <span class="block text-sm mb-2">
                                                        📣 <span class="font-medium text-gray-800">Edit your information in a swipe</span> Sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim.
                                                    </span>
                                                    <span class="block text-xs font-medium text-gray-400">Feb 12, 2021</span>
                                                </a>
                                            </li>
                                            <li class="border-b border-gray-200 last:border-0">
                                                <a class="block py-2 px-4 hover:bg-gray-50" href="#0" @click="open = false" @focus="open = true" @focusout="open = false">
                                                    <span class="block text-sm mb-2">
                                                        📣 <span class="font-medium text-gray-800">Edit your information in a swipe</span> Sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim.
                                                    </span>
                                                    <span class="block text-xs font-medium text-gray-400">Feb 9, 2021</span>
                                                </a>
                                            </li>
                                            <li class="border-b border-gray-200 last:border-0">
                                                <a class="block py-2 px-4 hover:bg-gray-50" href="#0" @click="open = false" @focus="open = true" @focusout="open = false">
                                                    <span class="block text-sm mb-2">
                                                        🚀<span class="font-medium text-gray-800">Say goodbye to paper receipts!</span> Sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim.
                                                    </span>
                                                    <span class="block text-xs font-medium text-gray-400">Jan 24, 2020</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="relative inline-flex" x-data="{ open: false }">
                                    <button
                                        class="w-8 h-8 flex items-center justify-center bg-gray-100 hover:bg-gray-200 transition duration-150 rounded-full"
                                        :class="{ 'bg-gray-200': open }"
                                        aria-haspopup="true"
                                        @click.prevent="open = !open"
                                        :aria-expanded="open"
                                    >
                                        <span class="sr-only">Info</span>
                                        <svg class="w-4 h-4" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                                            <path class="fill-current text-gray-500" d="M8 0C3.6 0 0 3.6 0 8s3.6 8 8 8 8-3.6 8-8-3.6-8-8-8zm0 12c-.6 0-1-.4-1-1s.4-1 1-1 1 .4 1 1-.4 1-1 1zm1-3H7V4h2v5z" />
                                        </svg>
                                    </button>
                                    <div
                                        class="origin-top-right z-10 absolute top-full right-0 min-w-44 bg-white border border-gray-200 py-1.5 rounded shadow-lg overflow-hidden mt-1"
                                        @click.outside="open = false"
                                        @keydown.escape.window="open = false"
                                        x-show="open"
                                        x-transition:enter="transition ease-out duration-200 transform"
                                        x-transition:enter-start="opacity-0 -translate-y-2"
                                        x-transition:enter-end="opacity-100 translate-y-0"
                                        x-transition:leave="transition ease-out duration-200"
                                        x-transition:leave-start="opacity-100"
                                        x-transition:leave-end="opacity-0"
                                        x-cloak
                                    >
                                        <div class="text-xs font-semibold text-gray-400 uppercase pt-1.5 pb-2 px-3">Need help?</div>
                                        <ul>
                                            <li>
                                                <a class="font-medium text-sm text-indigo-500 hover:text-indigo-600 flex items-center py-1 px-3" href="#0" @click="open = false" @focus="open = true" @focusout="open = false">
                                                    <svg class="w-3 h-3 fill-current text-indigo-300 flex-shrink-0 mr-2" viewBox="0 0 12 12">
                                                        <rect y="3" width="12" height="9" rx="1" />
                                                        <path d="M2 0h8v2H2z" />
                                                    </svg>
                                                    <span>Documentation</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="font-medium text-sm text-indigo-500 hover:text-indigo-600 flex items-center py-1 px-3" href="#0" @click="open = false" @focus="open = true" @focusout="open = false">
                                                    <svg class="w-3 h-3 fill-current text-indigo-300 flex-shrink-0 mr-2" viewBox="0 0 12 12">
                                                        <path d="M10.5 0h-9A1.5 1.5 0 000 1.5v9A1.5 1.5 0 001.5 12h9a1.5 1.5 0 001.5-1.5v-9A1.5 1.5 0 0010.5 0zM10 7L8.207 5.207l-3 3-1.414-1.414 3-3L5 2h5v5z" />
                                                    </svg>
                                                    <span>Support Site</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="font-medium text-sm text-indigo-500 hover:text-indigo-600 flex items-center py-1 px-3" href="#0" @click="open = false" @focus="open = true" @focusout="open = false">
                                                    <svg class="w-3 h-3 fill-current text-indigo-300 flex-shrink-0 mr-2" viewBox="0 0 12 12">
                                                        <path d="M11.854.146a.5.5 0 00-.525-.116l-11 4a.5.5 0 00-.015.934l4.8 1.921 1.921 4.8A.5.5 0 007.5 12h.008a.5.5 0 00.462-.329l4-11a.5.5 0 00-.116-.525z" />
                                                    </svg>
                                                    <span>Contact us</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <hr class="w-px h-6 bg-gray-200" />
                                <div class="relative inline-flex" x-data="{ open: false }">
                                    <button class="inline-flex justify-center items-center group" aria-haspopup="true" @click.prevent="open = !open" :aria-expanded="open">
                                        <img class="w-8 h-8 rounded-full" src="images/user-avatar-32.png" width="32" height="32" alt="User" />
                                        <div class="flex items-center truncate">
                                            <span class="truncate ml-2 text-sm font-medium group-hover:text-gray-800">Acme Inc.</span>
                                            <svg class="w-3 h-3 flex-shrink-0 ml-1 fill-current text-gray-400" viewBox="0 0 12 12"><path d="M5.9 11.4L.5 6l1.4-1.4 4 4 4-4L11.3 6z" /></svg>
                                        </div>
                                    </button>
                                    <div
                                        class="origin-top-right z-10 absolute top-full right-0 min-w-44 bg-white border border-gray-200 py-1.5 rounded shadow-lg overflow-hidden mt-1"
                                        @click.outside="open = false"
                                        @keydown.escape.window="open = false"
                                        x-show="open"
                                        x-transition:enter="transition ease-out duration-200 transform"
                                        x-transition:enter-start="opacity-0 -translate-y-2"
                                        x-transition:enter-end="opacity-100 translate-y-0"
                                        x-transition:leave="transition ease-out duration-200"
                                        x-transition:leave-start="opacity-100"
                                        x-transition:leave-end="opacity-0"
                                        x-cloak
                                    >
                                        <div class="pt-0.5 pb-2 px-3 mb-1 border-b border-gray-200">
                                            <div class="font-medium text-gray-800">Acme Inc.</div>
                                            <div class="text-xs text-gray-500 italic">Administrator</div>
                                        </div>
                                        <ul>
                                            <li>
                                                <a class="font-medium text-sm text-indigo-500 hover:text-indigo-600 flex items-center py-1 px-3" href="settings.html" @click="open = false" @focus="open = true" @focusout="open = false">
                                                    Settings
                                                </a>
                                            </li>
                                            <li>
                                                <a class="font-medium text-sm text-indigo-500 hover:text-indigo-600 flex items-center py-1 px-3" href="signin.html" @click="open = false" @focus="open = true" @focusout="open = false">
                                                    Sign Out
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </header>
                <main>
                    <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">
                        <div class="mb-5"><h1 class="text-2xl md:text-3xl text-gray-800 font-bold">Find the right product for you ✨</h1></div>
                        <div class="max-w-xl mb-5">
                            <form class="relative">
                                <label for="app-search" class="sr-only">Search</label> <input id="app-search" class="form-input w-full pl-9 py-3 focus:border-gray-300" type="search" placeholder="Search…" />
                                <button class="absolute inset-0 right-auto group" type="submit" aria-label="Search">
                                    <svg class="w-4 h-4 flex-shrink-0 fill-current text-gray-400 group-hover:text-gray-500 ml-3 mr-2" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M7 14c-3.86 0-7-3.14-7-7s3.14-7 7-7 7 3.14 7 7-3.14 7-7 7zM7 2C4.243 2 2 4.243 2 7s2.243 5 5 5 5-2.243 5-5-2.243-5-5-5z" />
                                        <path d="M15.707 14.293L13.314 11.9a8.019 8.019 0 01-1.414 1.414l2.393 2.393a.997.997 0 001.414 0 .999.999 0 000-1.414z" />
                                    </svg>
                                </button>
                            </form>
                        </div>
                        <div class="mb-4 border-b border-gray-200">
                            <ul class="text-sm font-medium flex flex-nowrap -mx-4 sm:-mx-6 lg:-mx-8 overflow-x-scroll no-scrollbar">
                                <li class="pb-3 mr-6 last:mr-0 first:pl-4 sm:first:pl-6 lg:first:pl-8 last:pr-4 sm:last:pr-6 lg:last:pr-8"><a class="text-indigo-500 whitespace-nowrap" href="#0">View All</a></li>
                                <li class="pb-3 mr-6 last:mr-0 first:pl-4 sm:first:pl-6 lg:first:pl-8 last:pr-4 sm:last:pr-6 lg:last:pr-8"><a class="text-gray-500 hover:text-gray-600 whitespace-nowrap" href="#0">Courses</a></li>
                                <li class="pb-3 mr-6 last:mr-0 first:pl-4 sm:first:pl-6 lg:first:pl-8 last:pr-4 sm:last:pr-6 lg:last:pr-8"><a class="text-gray-500 hover:text-gray-600 whitespace-nowrap" href="#0">Digital Goods</a></li>
                                <li class="pb-3 mr-6 last:mr-0 first:pl-4 sm:first:pl-6 lg:first:pl-8 last:pr-4 sm:last:pr-6 lg:last:pr-8"><a class="text-gray-500 hover:text-gray-600 whitespace-nowrap" href="#0">Online Events</a></li>
                                <li class="pb-3 mr-6 last:mr-0 first:pl-4 sm:first:pl-6 lg:first:pl-8 last:pr-4 sm:last:pr-6 lg:last:pr-8"><a class="text-gray-500 hover:text-gray-600 whitespace-nowrap" href="#0">Crowdfunding</a></li>
                            </ul>
                        </div>
                        <div>
                            <div class="mt-8">
                                <h2 class="text-xl leading-snug text-gray-800 font-bold mb-5">Video Courses</h2>
                                <div class="grid grid-cols-12 gap-6">
                                    <div class="col-span-full sm:col-span-6 xl:col-span-3 bg-white shadow-lg rounded-sm border border-gray-200 overflow-hidden">
                                        <div class="flex flex-col h-full">
                                            <img class="w-full" src="images/applications-image-01.jpg" width="286" height="160" alt="Application 01" />
                                            <div class="flex-grow flex flex-col p-5">
                                                <div class="flex-grow">
                                                    <header class="mb-3"><h3 class="text-lg text-gray-800 font-semibold">HTML, CSS, JavaScript - Build 6 Creative Projects</h3></header>
                                                    <div class="flex flex-wrap justify-between items-center mb-4">
                                                        <div class="flex items-center space-x-2 mr-2">
                                                            <div class="flex space-x-1">
                                                                <button>
                                                                    <span class="sr-only">1 star</span>
                                                                    <svg class="w-4 h-4 fill-current text-yellow-500" viewBox="0 0 16 16">
                                                                        <path d="M10 5.934L8 0 6 5.934H0l4.89 3.954L2.968 16 8 12.223 13.032 16 11.11 9.888 16 5.934z" />
                                                                    </svg>
                                                                </button>
                                                                <button>
                                                                    <span class="sr-only">2 stars</span>
                                                                    <svg class="w-4 h-4 fill-current text-yellow-500" viewBox="0 0 16 16">
                                                                        <path d="M10 5.934L8 0 6 5.934H0l4.89 3.954L2.968 16 8 12.223 13.032 16 11.11 9.888 16 5.934z" />
                                                                    </svg>
                                                                </button>
                                                                <button>
                                                                    <span class="sr-only">3 stars</span>
                                                                    <svg class="w-4 h-4 fill-current text-yellow-500" viewBox="0 0 16 16">
                                                                        <path d="M10 5.934L8 0 6 5.934H0l4.89 3.954L2.968 16 8 12.223 13.032 16 11.11 9.888 16 5.934z" />
                                                                    </svg>
                                                                </button>
                                                                <button>
                                                                    <span class="sr-only">4 stars</span>
                                                                    <svg class="w-4 h-4 fill-current text-yellow-500" viewBox="0 0 16 16">
                                                                        <path d="M10 5.934L8 0 6 5.934H0l4.89 3.954L2.968 16 8 12.223 13.032 16 11.11 9.888 16 5.934z" />
                                                                    </svg>
                                                                </button>
                                                                <button>
                                                                    <span class="sr-only">5 stars</span>
                                                                    <svg class="w-4 h-4 fill-current text-gray-300" viewBox="0 0 16 16"><path d="M10 5.934L8 0 6 5.934H0l4.89 3.954L2.968 16 8 12.223 13.032 16 11.11 9.888 16 5.934z" /></svg>
                                                                </button>
                                                            </div>
                                                            <div class="inline-flex text-sm font-medium text-yellow-600">4.2</div>
                                                        </div>
                                                        <div><div class="inline-flex text-sm font-medium bg-green-100 text-green-600 rounded-full text-center px-2 py-0.5">$89.00</div></div>
                                                    </div>
                                                    <ul class="text-sm space-y-2 mb-5">
                                                        <li class="flex items-center">
                                                            <svg class="w-4 h-4 fill-current text-gray-400 flex-shrink-0 mr-3" viewBox="0 0 16 16">
                                                                <path
                                                                    d="M15.686 5.695L10.291.3c-.4-.4-.999-.4-1.399 0s-.4.999 0 1.399l.6.599-6.794 3.697-1-1c-.4-.399-.999-.399-1.398 0-.4.4-.4 1 0 1.4l1.498 1.498 2.398 2.398L.6 13.988 2 15.387l3.696-3.697 3.997 3.996c.5.5 1.199.2 1.398 0 .4-.4.4-.999 0-1.398l-.999-1 3.697-6.694.6.6c.599.6 1.199.2 1.398 0 .3-.4.3-1.1-.1-1.499zM8.493 11.79L4.196 7.494l6.695-3.697 1.298 1.299-3.696 6.694z"
                                                                />
                                                            </svg>
                                                            <div>23 hours on-demand video</div>
                                                        </li>
                                                        <li class="flex items-center">
                                                            <svg class="w-4 h-4 fill-current text-gray-400 flex-shrink-0 mr-3" viewBox="0 0 16 16">
                                                                <path d="M15 15V5l-5-5H2c-.6 0-1 .4-1 1v14c0 .6.4 1 1 1h12c.6 0 1-.4 1-1zM3 2h6v4h4v8H3V2z" />
                                                            </svg>
                                                            <div>37 articles</div>
                                                        </li>
                                                        <li class="flex items-center">
                                                            <svg class="w-4 h-4 fill-current text-gray-400 flex-shrink-0 mr-3" viewBox="0 0 16 16">
                                                                <path d="M13 7h2v6a1 1 0 01-1 1H4v2l-4-3 4-3v2h9V7zM3 9H1V3a1 1 0 011-1h10V0l4 3-4 3V4H3v5z" />
                                                            </svg>
                                                            <div>Access on mobile and TV</div>
                                                        </li>
                                                        <li class="flex items-center">
                                                            <svg class="w-4 h-4 fill-current text-gray-400 flex-shrink-0 mr-3" viewBox="0 0 16 16">
                                                                <path
                                                                    d="M7.3 8.7c-.4-.4-.4-1 0-1.4l7-7c.4-.4 1-.4 1.4 0 .4.4.4 1 0 1.4l-7 7c-.4.4-1 .4-1.4 0zm0 6c-.4-.4-.4-1 0-1.4l7-7c.4-.4 1-.4 1.4 0 .4.4.4 1 0 1.4l-7 7c-.4.4-1 .4-1.4 0zm-7-5c-.4-.4-.4-1 0-1.4l7-7c.4-.4 1-.4 1.4 0 .4.4.4 1 0 1.4l-7 7c-.4.4-1 .4-1.4 0z"
                                                                />
                                                            </svg>
                                                            <div>8K+ active installations</div>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div><a class="btn-sm w-full bg-indigo-500 hover:bg-indigo-600 text-white" href="#0">Buy Now</a></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-span-full sm:col-span-6 xl:col-span-3 bg-white shadow-lg rounded-sm border border-gray-200 overflow-hidden">
                                        <div class="flex flex-col h-full">
                                            <img class="w-full" src="images/applications-image-02.jpg" width="286" height="160" alt="Application 02" />
                                            <div class="flex-grow flex flex-col p-5">
                                                <div class="flex-grow">
                                                    <header class="mb-3"><h3 class="text-lg text-gray-800 font-semibold">HTML, CSS, JavaScript - Build 6 Creative Projects</h3></header>
                                                    <div class="flex flex-wrap justify-between items-center mb-4">
                                                        <div class="flex items-center space-x-2 mr-2">
                                                            <div class="flex space-x-1">
                                                                <button>
                                                                    <span class="sr-only">1 star</span>
                                                                    <svg class="w-4 h-4 fill-current text-yellow-500" viewBox="0 0 16 16">
                                                                        <path d="M10 5.934L8 0 6 5.934H0l4.89 3.954L2.968 16 8 12.223 13.032 16 11.11 9.888 16 5.934z" />
                                                                    </svg>
                                                                </button>
                                                                <button>
                                                                    <span class="sr-only">2 stars</span>
                                                                    <svg class="w-4 h-4 fill-current text-yellow-500" viewBox="0 0 16 16">
                                                                        <path d="M10 5.934L8 0 6 5.934H0l4.89 3.954L2.968 16 8 12.223 13.032 16 11.11 9.888 16 5.934z" />
                                                                    </svg>
                                                                </button>
                                                                <button>
                                                                    <span class="sr-only">3 stars</span>
                                                                    <svg class="w-4 h-4 fill-current text-yellow-500" viewBox="0 0 16 16">
                                                                        <path d="M10 5.934L8 0 6 5.934H0l4.89 3.954L2.968 16 8 12.223 13.032 16 11.11 9.888 16 5.934z" />
                                                                    </svg>
                                                                </button>
                                                                <button>
                                                                    <span class="sr-only">4 stars</span>
                                                                    <svg class="w-4 h-4 fill-current text-yellow-500" viewBox="0 0 16 16">
                                                                        <path d="M10 5.934L8 0 6 5.934H0l4.89 3.954L2.968 16 8 12.223 13.032 16 11.11 9.888 16 5.934z" />
                                                                    </svg>
                                                                </button>
                                                                <button>
                                                                    <span class="sr-only">5 stars</span>
                                                                    <svg class="w-4 h-4 fill-current text-gray-300" viewBox="0 0 16 16"><path d="M10 5.934L8 0 6 5.934H0l4.89 3.954L2.968 16 8 12.223 13.032 16 11.11 9.888 16 5.934z" /></svg>
                                                                </button>
                                                            </div>
                                                            <div class="inline-flex text-sm font-medium text-yellow-600">3.9</div>
                                                        </div>
                                                        <div><div class="inline-flex text-sm font-medium bg-green-100 text-green-600 rounded-full text-center px-2 py-0.5">$49.00</div></div>
                                                    </div>
                                                    <ul class="text-sm space-y-2 mb-5">
                                                        <li class="flex items-center">
                                                            <svg class="w-4 h-4 fill-current text-gray-400 flex-shrink-0 mr-3" viewBox="0 0 16 16">
                                                                <path
                                                                    d="M15.686 5.695L10.291.3c-.4-.4-.999-.4-1.399 0s-.4.999 0 1.399l.6.599-6.794 3.697-1-1c-.4-.399-.999-.399-1.398 0-.4.4-.4 1 0 1.4l1.498 1.498 2.398 2.398L.6 13.988 2 15.387l3.696-3.697 3.997 3.996c.5.5 1.199.2 1.398 0 .4-.4.4-.999 0-1.398l-.999-1 3.697-6.694.6.6c.599.6 1.199.2 1.398 0 .3-.4.3-1.1-.1-1.499zM8.493 11.79L4.196 7.494l6.695-3.697 1.298 1.299-3.696 6.694z"
                                                                />
                                                            </svg>
                                                            <div>23 hours on-demand video</div>
                                                        </li>
                                                        <li class="flex items-center">
                                                            <svg class="w-4 h-4 fill-current text-gray-400 flex-shrink-0 mr-3" viewBox="0 0 16 16">
                                                                <path d="M15 15V5l-5-5H2c-.6 0-1 .4-1 1v14c0 .6.4 1 1 1h12c.6 0 1-.4 1-1zM3 2h6v4h4v8H3V2z" />
                                                            </svg>
                                                            <div>37 articles</div>
                                                        </li>
                                                        <li class="flex items-center">
                                                            <svg class="w-4 h-4 fill-current text-gray-400 flex-shrink-0 mr-3" viewBox="0 0 16 16">
                                                                <path d="M13 7h2v6a1 1 0 01-1 1H4v2l-4-3 4-3v2h9V7zM3 9H1V3a1 1 0 011-1h10V0l4 3-4 3V4H3v5z" />
                                                            </svg>
                                                            <div>Access on mobile and TV</div>
                                                        </li>
                                                        <li class="flex items-center">
                                                            <svg class="w-4 h-4 fill-current text-gray-400 flex-shrink-0 mr-3" viewBox="0 0 16 16">
                                                                <path
                                                                    d="M7.3 8.7c-.4-.4-.4-1 0-1.4l7-7c.4-.4 1-.4 1.4 0 .4.4.4 1 0 1.4l-7 7c-.4.4-1 .4-1.4 0zm0 6c-.4-.4-.4-1 0-1.4l7-7c.4-.4 1-.4 1.4 0 .4.4.4 1 0 1.4l-7 7c-.4.4-1 .4-1.4 0zm-7-5c-.4-.4-.4-1 0-1.4l7-7c.4-.4 1-.4 1.4 0 .4.4.4 1 0 1.4l-7 7c-.4.4-1 .4-1.4 0z"
                                                                />
                                                            </svg>
                                                            <div>8K+ active installations</div>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div><a class="btn-sm w-full bg-indigo-500 hover:bg-indigo-600 text-white" href="#0">Buy Now</a></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-span-full sm:col-span-6 xl:col-span-3 bg-white shadow-lg rounded-sm border border-gray-200 overflow-hidden">
                                        <div class="flex flex-col h-full">
                                            <img class="w-full" src="images/applications-image-03.jpg" width="286" height="160" alt="Application 03" />
                                            <div class="flex-grow flex flex-col p-5">
                                                <div class="flex-grow">
                                                    <header class="mb-3"><h3 class="text-lg text-gray-800 font-semibold">HTML, CSS, JavaScript - Build 6 Creative Projects</h3></header>
                                                    <div class="flex flex-wrap justify-between items-center mb-4">
                                                        <div class="flex items-center space-x-2 mr-2">
                                                            <div class="flex space-x-1">
                                                                <button>
                                                                    <span class="sr-only">1 star</span>
                                                                    <svg class="w-4 h-4 fill-current text-yellow-500" viewBox="0 0 16 16">
                                                                        <path d="M10 5.934L8 0 6 5.934H0l4.89 3.954L2.968 16 8 12.223 13.032 16 11.11 9.888 16 5.934z" />
                                                                    </svg>
                                                                </button>
                                                                <button>
                                                                    <span class="sr-only">2 stars</span>
                                                                    <svg class="w-4 h-4 fill-current text-yellow-500" viewBox="0 0 16 16">
                                                                        <path d="M10 5.934L8 0 6 5.934H0l4.89 3.954L2.968 16 8 12.223 13.032 16 11.11 9.888 16 5.934z" />
                                                                    </svg>
                                                                </button>
                                                                <button>
                                                                    <span class="sr-only">3 stars</span>
                                                                    <svg class="w-4 h-4 fill-current text-yellow-500" viewBox="0 0 16 16">
                                                                        <path d="M10 5.934L8 0 6 5.934H0l4.89 3.954L2.968 16 8 12.223 13.032 16 11.11 9.888 16 5.934z" />
                                                                    </svg>
                                                                </button>
                                                                <button>
                                                                    <span class="sr-only">4 stars</span>
                                                                    <svg class="w-4 h-4 fill-current text-yellow-500" viewBox="0 0 16 16">
                                                                        <path d="M10 5.934L8 0 6 5.934H0l4.89 3.954L2.968 16 8 12.223 13.032 16 11.11 9.888 16 5.934z" />
                                                                    </svg>
                                                                </button>
                                                                <button>
                                                                    <span class="sr-only">5 stars</span>
                                                                    <svg class="w-4 h-4 fill-current text-gray-300" viewBox="0 0 16 16"><path d="M10 5.934L8 0 6 5.934H0l4.89 3.954L2.968 16 8 12.223 13.032 16 11.11 9.888 16 5.934z" /></svg>
                                                                </button>
                                                            </div>
                                                            <div class="inline-flex text-sm font-medium text-yellow-600">4.6</div>
                                                        </div>
                                                        <div><div class="inline-flex text-sm font-medium bg-green-100 text-green-600 rounded-full text-center px-2 py-0.5">$129.00</div></div>
                                                    </div>
                                                    <ul class="text-sm space-y-2 mb-5">
                                                        <li class="flex items-center">
                                                            <svg class="w-4 h-4 fill-current text-gray-400 flex-shrink-0 mr-3" viewBox="0 0 16 16">
                                                                <path
                                                                    d="M15.686 5.695L10.291.3c-.4-.4-.999-.4-1.399 0s-.4.999 0 1.399l.6.599-6.794 3.697-1-1c-.4-.399-.999-.399-1.398 0-.4.4-.4 1 0 1.4l1.498 1.498 2.398 2.398L.6 13.988 2 15.387l3.696-3.697 3.997 3.996c.5.5 1.199.2 1.398 0 .4-.4.4-.999 0-1.398l-.999-1 3.697-6.694.6.6c.599.6 1.199.2 1.398 0 .3-.4.3-1.1-.1-1.499zM8.493 11.79L4.196 7.494l6.695-3.697 1.298 1.299-3.696 6.694z"
                                                                />
                                                            </svg>
                                                            <div>23 hours on-demand video</div>
                                                        </li>
                                                        <li class="flex items-center">
                                                            <svg class="w-4 h-4 fill-current text-gray-400 flex-shrink-0 mr-3" viewBox="0 0 16 16">
                                                                <path d="M15 15V5l-5-5H2c-.6 0-1 .4-1 1v14c0 .6.4 1 1 1h12c.6 0 1-.4 1-1zM3 2h6v4h4v8H3V2z" />
                                                            </svg>
                                                            <div>37 articles</div>
                                                        </li>
                                                        <li class="flex items-center">
                                                            <svg class="w-4 h-4 fill-current text-gray-400 flex-shrink-0 mr-3" viewBox="0 0 16 16">
                                                                <path d="M13 7h2v6a1 1 0 01-1 1H4v2l-4-3 4-3v2h9V7zM3 9H1V3a1 1 0 011-1h10V0l4 3-4 3V4H3v5z" />
                                                            </svg>
                                                            <div>Access on mobile and TV</div>
                                                        </li>
                                                        <li class="flex items-center">
                                                            <svg class="w-4 h-4 fill-current text-gray-400 flex-shrink-0 mr-3" viewBox="0 0 16 16">
                                                                <path
                                                                    d="M7.3 8.7c-.4-.4-.4-1 0-1.4l7-7c.4-.4 1-.4 1.4 0 .4.4.4 1 0 1.4l-7 7c-.4.4-1 .4-1.4 0zm0 6c-.4-.4-.4-1 0-1.4l7-7c.4-.4 1-.4 1.4 0 .4.4.4 1 0 1.4l-7 7c-.4.4-1 .4-1.4 0zm-7-5c-.4-.4-.4-1 0-1.4l7-7c.4-.4 1-.4 1.4 0 .4.4.4 1 0 1.4l-7 7c-.4.4-1 .4-1.4 0z"
                                                                />
                                                            </svg>
                                                            <div>8K+ active installations</div>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div><a class="btn-sm w-full bg-indigo-500 hover:bg-indigo-600 text-white" href="#0">Buy Now</a></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-span-full sm:col-span-6 xl:col-span-3 bg-white shadow-lg rounded-sm border border-gray-200 overflow-hidden">
                                        <div class="flex flex-col h-full">
                                            <img class="w-full" src="images/applications-image-04.jpg" width="286" height="160" alt="Application 04" />
                                            <div class="flex-grow flex flex-col p-5">
                                                <div class="flex-grow">
                                                    <header class="mb-3"><h3 class="text-lg text-gray-800 font-semibold">HTML, CSS, JavaScript - Build 6 Creative Projects</h3></header>
                                                    <div class="flex flex-wrap justify-between items-center mb-4">
                                                        <div class="flex items-center space-x-2 mr-2">
                                                            <div class="flex space-x-1">
                                                                <button>
                                                                    <span class="sr-only">1 star</span>
                                                                    <svg class="w-4 h-4 fill-current text-yellow-500" viewBox="0 0 16 16">
                                                                        <path d="M10 5.934L8 0 6 5.934H0l4.89 3.954L2.968 16 8 12.223 13.032 16 11.11 9.888 16 5.934z" />
                                                                    </svg>
                                                                </button>
                                                                <button>
                                                                    <span class="sr-only">2 stars</span>
                                                                    <svg class="w-4 h-4 fill-current text-yellow-500" viewBox="0 0 16 16">
                                                                        <path d="M10 5.934L8 0 6 5.934H0l4.89 3.954L2.968 16 8 12.223 13.032 16 11.11 9.888 16 5.934z" />
                                                                    </svg>
                                                                </button>
                                                                <button>
                                                                    <span class="sr-only">3 stars</span>
                                                                    <svg class="w-4 h-4 fill-current text-yellow-500" viewBox="0 0 16 16">
                                                                        <path d="M10 5.934L8 0 6 5.934H0l4.89 3.954L2.968 16 8 12.223 13.032 16 11.11 9.888 16 5.934z" />
                                                                    </svg>
                                                                </button>
                                                                <button>
                                                                    <span class="sr-only">4 stars</span>
                                                                    <svg class="w-4 h-4 fill-current text-yellow-500" viewBox="0 0 16 16">
                                                                        <path d="M10 5.934L8 0 6 5.934H0l4.89 3.954L2.968 16 8 12.223 13.032 16 11.11 9.888 16 5.934z" />
                                                                    </svg>
                                                                </button>
                                                                <button>
                                                                    <span class="sr-only">5 stars</span>
                                                                    <svg class="w-4 h-4 fill-current text-gray-300" viewBox="0 0 16 16"><path d="M10 5.934L8 0 6 5.934H0l4.89 3.954L2.968 16 8 12.223 13.032 16 11.11 9.888 16 5.934z" /></svg>
                                                                </button>
                                                            </div>
                                                            <div class="inline-flex text-sm font-medium text-yellow-600">4.7</div>
                                                        </div>
                                                        <div><div class="inline-flex text-sm font-medium bg-green-100 text-green-600 rounded-full text-center px-2 py-0.5">$129.00</div></div>
                                                    </div>
                                                    <ul class="text-sm space-y-2 mb-5">
                                                        <li class="flex items-center">
                                                            <svg class="w-4 h-4 fill-current text-gray-400 flex-shrink-0 mr-3" viewBox="0 0 16 16">
                                                                <path
                                                                    d="M15.686 5.695L10.291.3c-.4-.4-.999-.4-1.399 0s-.4.999 0 1.399l.6.599-6.794 3.697-1-1c-.4-.399-.999-.399-1.398 0-.4.4-.4 1 0 1.4l1.498 1.498 2.398 2.398L.6 13.988 2 15.387l3.696-3.697 3.997 3.996c.5.5 1.199.2 1.398 0 .4-.4.4-.999 0-1.398l-.999-1 3.697-6.694.6.6c.599.6 1.199.2 1.398 0 .3-.4.3-1.1-.1-1.499zM8.493 11.79L4.196 7.494l6.695-3.697 1.298 1.299-3.696 6.694z"
                                                                />
                                                            </svg>
                                                            <div>23 hours on-demand video</div>
                                                        </li>
                                                        <li class="flex items-center">
                                                            <svg class="w-4 h-4 fill-current text-gray-400 flex-shrink-0 mr-3" viewBox="0 0 16 16">
                                                                <path d="M15 15V5l-5-5H2c-.6 0-1 .4-1 1v14c0 .6.4 1 1 1h12c.6 0 1-.4 1-1zM3 2h6v4h4v8H3V2z" />
                                                            </svg>
                                                            <div>37 articles</div>
                                                        </li>
                                                        <li class="flex items-center">
                                                            <svg class="w-4 h-4 fill-current text-gray-400 flex-shrink-0 mr-3" viewBox="0 0 16 16">
                                                                <path d="M13 7h2v6a1 1 0 01-1 1H4v2l-4-3 4-3v2h9V7zM3 9H1V3a1 1 0 011-1h10V0l4 3-4 3V4H3v5z" />
                                                            </svg>
                                                            <div>Access on mobile and TV</div>
                                                        </li>
                                                        <li class="flex items-center">
                                                            <svg class="w-4 h-4 fill-current text-gray-400 flex-shrink-0 mr-3" viewBox="0 0 16 16">
                                                                <path
                                                                    d="M7.3 8.7c-.4-.4-.4-1 0-1.4l7-7c.4-.4 1-.4 1.4 0 .4.4.4 1 0 1.4l-7 7c-.4.4-1 .4-1.4 0zm0 6c-.4-.4-.4-1 0-1.4l7-7c.4-.4 1-.4 1.4 0 .4.4.4 1 0 1.4l-7 7c-.4.4-1 .4-1.4 0zm-7-5c-.4-.4-.4-1 0-1.4l7-7c.4-.4 1-.4 1.4 0 .4.4.4 1 0 1.4l-7 7c-.4.4-1 .4-1.4 0z"
                                                                />
                                                            </svg>
                                                            <div>8K+ active installations</div>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div><a class="btn-sm w-full bg-indigo-500 hover:bg-indigo-600 text-white" href="#0">Buy Now</a></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-8">
                                <h2 class="text-xl leading-snug text-gray-800 font-bold mb-5">Digital Goods</h2>
                                <div class="grid grid-cols-12 gap-6">
                                    <div class="col-span-full sm:col-span-6 xl:col-span-3 bg-white shadow-lg rounded-sm border border-gray-200 overflow-hidden">
                                        <div class="flex flex-col h-full">
                                            <div class="relative">
                                                <img class="w-full" src="images/applications-image-05.jpg" width="286" height="160" alt="Application 05" />
                                                <div class="absolute top-0 right-0 mt-4 mr-4">
                                                    <div class="inline-flex items-center text-xs font-medium text-gray-100 bg-gray-900 bg-opacity-60 rounded-full text-center px-2 py-0.5">
                                                        <svg class="w-3 h-3 flex-shrink-0 fill-current text-yellow-500 mr-1" viewBox="0 0 12 12">
                                                            <path d="M11.953 4.29a.5.5 0 00-.454-.292H6.14L6.984.62A.5.5 0 006.12.173l-6 7a.5.5 0 00.379.825h5.359l-.844 3.38a.5.5 0 00.864.445l6-7a.5.5 0 00.075-.534z" />
                                                        </svg>
                                                        <span>Popular</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="flex-grow flex flex-col p-5">
                                                <div class="flex-grow">
                                                    <header class="mb-2">
                                                        <h3 class="text-lg text-gray-800 font-semibold mb-1">Form Builder CP</h3>
                                                        <div class="text-sm">Master Digital Marketing Strategy, Social Media Marketing, Analytics & More!</div>
                                                    </header>
                                                    <div class="flex flex-wrap items-center justify-between mb-5">
                                                        <div class="flex items-center space-x-2 mr-2">
                                                            <svg class="w-4 h-4 fill-current text-yellow-500" viewBox="0 0 16 16"><path d="M10 5.934L8 0 6 5.934H0l4.89 3.954L2.968 16 8 12.223 13.032 16 11.11 9.888 16 5.934z" /></svg>
                                                            <div class="text-sm font-medium whitespace-nowrap"><span>4.7</span> <span class="text-gray-400">(478)</span></div>
                                                        </div>
                                                        <div class="flex items-center space-x-2"><div class="inline-flex text-sm font-medium bg-green-100 text-green-600 rounded-full text-center px-2 py-0.5">$89.00</div></div>
                                                    </div>
                                                </div>
                                                <div><a class="btn-sm w-full bg-indigo-500 hover:bg-indigo-600 text-white" href="#0">Buy Now</a></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-span-full sm:col-span-6 xl:col-span-3 bg-white shadow-lg rounded-sm border border-gray-200 overflow-hidden">
                                        <div class="flex flex-col h-full">
                                            <div class="relative"><img class="w-full" src="images/applications-image-06.jpg" width="286" height="160" alt="Application 06" /></div>
                                            <div class="flex-grow flex flex-col p-5">
                                                <div class="flex-grow">
                                                    <header class="mb-2">
                                                        <h3 class="text-lg text-gray-800 font-semibold mb-1">Form Builder CP</h3>
                                                        <div class="text-sm">Master Digital Marketing Strategy, Social Media Marketing, Analytics & More!</div>
                                                    </header>
                                                    <div class="flex flex-wrap items-center justify-between mb-5">
                                                        <div class="flex items-center space-x-2 mr-2">
                                                            <svg class="w-4 h-4 fill-current text-yellow-500" viewBox="0 0 16 16"><path d="M10 5.934L8 0 6 5.934H0l4.89 3.954L2.968 16 8 12.223 13.032 16 11.11 9.888 16 5.934z" /></svg>
                                                            <div class="text-sm font-medium whitespace-nowrap"><span>4.7</span> <span class="text-gray-400">(478)</span></div>
                                                        </div>
                                                        <div class="flex items-center space-x-2"><div class="inline-flex text-sm font-medium bg-green-100 text-green-600 rounded-full text-center px-2 py-0.5">$89.00</div></div>
                                                    </div>
                                                </div>
                                                <div><a class="btn-sm w-full bg-indigo-500 hover:bg-indigo-600 text-white" href="#0">Buy Now</a></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-span-full sm:col-span-6 xl:col-span-3 bg-white shadow-lg rounded-sm border border-gray-200 overflow-hidden">
                                        <div class="flex flex-col h-full">
                                            <div class="relative"><img class="w-full" src="images/applications-image-07.jpg" width="286" height="160" alt="Application 07" /></div>
                                            <div class="flex-grow flex flex-col p-5">
                                                <div class="flex-grow">
                                                    <header class="mb-2">
                                                        <h3 class="text-lg text-gray-800 font-semibold mb-1">Form Builder CP</h3>
                                                        <div class="text-sm">Master Digital Marketing Strategy, Social Media Marketing, Analytics & More!</div>
                                                    </header>
                                                    <div class="flex flex-wrap items-center justify-between mb-5">
                                                        <div class="flex items-center space-x-2 mr-2">
                                                            <svg class="w-4 h-4 fill-current text-yellow-500" viewBox="0 0 16 16"><path d="M10 5.934L8 0 6 5.934H0l4.89 3.954L2.968 16 8 12.223 13.032 16 11.11 9.888 16 5.934z" /></svg>
                                                            <div class="text-sm font-medium whitespace-nowrap"><span>4.7</span> <span class="text-gray-400">(478)</span></div>
                                                        </div>
                                                        <div class="flex items-center space-x-2">
                                                            <div class="inline-flex text-sm font-medium bg-red-100 text-red-600 rounded-full text-center px-2 py-0.5">$39.00</div>
                                                            <div class="inline-flex text-sm font-medium text-gray-500 line-through">$199.00</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div><a class="btn-sm w-full bg-indigo-500 hover:bg-indigo-600 text-white" href="#0">Buy Now</a></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-span-full sm:col-span-6 xl:col-span-3 bg-white shadow-lg rounded-sm border border-gray-200 overflow-hidden">
                                        <div class="flex flex-col h-full">
                                            <div class="relative"><img class="w-full" src="images/applications-image-08.jpg" width="286" height="160" alt="Application 08" /></div>
                                            <div class="flex-grow flex flex-col p-5">
                                                <div class="flex-grow">
                                                    <header class="mb-2">
                                                        <h3 class="text-lg text-gray-800 font-semibold mb-1">Form Builder CP</h3>
                                                        <div class="text-sm">Master Digital Marketing Strategy, Social Media Marketing, Analytics & More!</div>
                                                    </header>
                                                    <div class="flex flex-wrap items-center justify-between mb-5">
                                                        <div class="flex items-center space-x-2 mr-2">
                                                            <svg class="w-4 h-4 fill-current text-yellow-500" viewBox="0 0 16 16"><path d="M10 5.934L8 0 6 5.934H0l4.89 3.954L2.968 16 8 12.223 13.032 16 11.11 9.888 16 5.934z" /></svg>
                                                            <div class="text-sm font-medium whitespace-nowrap"><span>4.7</span> <span class="text-gray-400">(478)</span></div>
                                                        </div>
                                                        <div class="flex items-center space-x-2"><div class="inline-flex text-sm font-medium bg-green-100 text-green-600 rounded-full text-center px-2 py-0.5">$89.00</div></div>
                                                    </div>
                                                </div>
                                                <div><a class="btn-sm w-full bg-indigo-500 hover:bg-indigo-600 text-white" href="#0">Buy Now</a></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-8">
                                <h2 class="text-xl leading-snug text-gray-800 font-bold mb-5">Online Events</h2>
                                <div class="grid grid-cols-12 gap-6">
                                    <div class="col-span-full sm:col-span-6 xl:col-span-3 bg-white shadow-lg rounded-sm border border-gray-200 overflow-hidden">
                                        <div class="flex flex-col h-full">
                                            <div class="relative">
                                                <img class="w-full" src="images/applications-image-09.jpg" width="286" height="160" alt="Application 09" />
                                                <button class="absolute top-0 right-0 mt-4 mr-4">
                                                    <div class="text-gray-100 bg-gray-900 bg-opacity-60 rounded-full">
                                                        <span class="sr-only">Like</span>
                                                        <svg class="h-8 w-8 fill-current" viewBox="0 0 32 32">
                                                            <path
                                                                d="M22.682 11.318A4.485 4.485 0 0019.5 10a4.377 4.377 0 00-3.5 1.707A4.383 4.383 0 0012.5 10a4.5 4.5 0 00-3.182 7.682L16 24l6.682-6.318a4.5 4.5 0 000-6.364zm-1.4 4.933L16 21.247l-5.285-5A2.5 2.5 0 0112.5 12c1.437 0 2.312.681 3.5 2.625C17.187 12.681 18.062 12 19.5 12a2.5 2.5 0 011.785 4.251h-.003z"
                                                            />
                                                        </svg>
                                                    </div>
                                                </button>
                                            </div>
                                            <div class="flex-grow flex flex-col p-5">
                                                <div class="flex-grow">
                                                    <header class="mb-2"><h3 class="text-lg text-gray-800 font-semibold">Health and Happiness Workshop</h3></header>
                                                    <ul class="text-sm space-y-2 mb-5">
                                                        <li class="flex items-center">
                                                            <svg class="w-4 h-4 fill-current text-gray-400 flex-shrink-0 mr-3" viewBox="0 0 16 16">
                                                                <path d="M15 2h-2V0h-2v2H9V0H7v2H5V0H3v2H1a1 1 0 00-1 1v12a1 1 0 001 1h14a1 1 0 001-1V3a1 1 0 00-1-1zm-1 12H2V6h12v8z" />
                                                            </svg>
                                                            <div class="text-red-500">Fri 7 Aug 2021 23:00 CEST</div>
                                                        </li>
                                                        <li class="flex items-center">
                                                            <svg class="w-4 h-4 fill-current text-gray-400 flex-shrink-0 mr-3" viewBox="0 0 16 16">
                                                                <path
                                                                    d="M8 6c2.9 0 6-.9 6-3s-3.1-3-6-3-6 .9-6 3 3.1 3 6 3zM2 6.5V8c0 2.1 3.1 3 6 3s6-.9 6-3V6.5C12.6 7.4 10.5 8 8 8s-4.6-.6-6-1.5zM2 11.5V13c0 2.1 3.1 3 6 3s6-.9 6-3v-1.5c-1.4 1-3.5 1.5-6 1.5s-4.6-.6-6-1.5z"
                                                                />
                                                            </svg>
                                                            <div>Starts at $16.24 / person</div>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div><a class="btn-sm w-full bg-indigo-500 hover:bg-indigo-600 text-white" href="#0">Buy Tickets</a></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-span-full sm:col-span-6 xl:col-span-3 bg-white shadow-lg rounded-sm border border-gray-200 overflow-hidden">
                                        <div class="flex flex-col h-full">
                                            <div class="relative">
                                                <img class="w-full" src="images/applications-image-10.jpg" width="286" height="160" alt="Application 10" />
                                                <button class="absolute top-0 right-0 mt-4 mr-4">
                                                    <div class="text-gray-100 bg-gray-900 bg-opacity-60 rounded-full">
                                                        <span class="sr-only">Like</span>
                                                        <svg class="h-8 w-8 fill-current" viewBox="0 0 32 32">
                                                            <path
                                                                d="M22.682 11.318A4.485 4.485 0 0019.5 10a4.377 4.377 0 00-3.5 1.707A4.383 4.383 0 0012.5 10a4.5 4.5 0 00-3.182 7.682L16 24l6.682-6.318a4.5 4.5 0 000-6.364zm-1.4 4.933L16 21.247l-5.285-5A2.5 2.5 0 0112.5 12c1.437 0 2.312.681 3.5 2.625C17.187 12.681 18.062 12 19.5 12a2.5 2.5 0 011.785 4.251h-.003z"
                                                            />
                                                        </svg>
                                                    </div>
                                                </button>
                                            </div>
                                            <div class="flex-grow flex flex-col p-5">
                                                <div class="flex-grow">
                                                    <header class="mb-2"><h3 class="text-lg text-gray-800 font-semibold">Health and Happiness Workshop</h3></header>
                                                    <ul class="text-sm space-y-2 mb-5">
                                                        <li class="flex items-center">
                                                            <svg class="w-4 h-4 fill-current text-gray-400 flex-shrink-0 mr-3" viewBox="0 0 16 16">
                                                                <path d="M15 2h-2V0h-2v2H9V0H7v2H5V0H3v2H1a1 1 0 00-1 1v12a1 1 0 001 1h14a1 1 0 001-1V3a1 1 0 00-1-1zm-1 12H2V6h12v8z" />
                                                            </svg>
                                                            <div class="text-red-500">Fri 7 Aug 2021 23:00 CEST</div>
                                                        </li>
                                                        <li class="flex items-center">
                                                            <svg class="w-4 h-4 fill-current text-gray-400 flex-shrink-0 mr-3" viewBox="0 0 16 16">
                                                                <path
                                                                    d="M8 6c2.9 0 6-.9 6-3s-3.1-3-6-3-6 .9-6 3 3.1 3 6 3zM2 6.5V8c0 2.1 3.1 3 6 3s6-.9 6-3V6.5C12.6 7.4 10.5 8 8 8s-4.6-.6-6-1.5zM2 11.5V13c0 2.1 3.1 3 6 3s6-.9 6-3v-1.5c-1.4 1-3.5 1.5-6 1.5s-4.6-.6-6-1.5z"
                                                                />
                                                            </svg>
                                                            <div>Starts at $16.24 / person</div>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div><a class="btn-sm w-full bg-indigo-500 hover:bg-indigo-600 text-white" href="#0">Buy Tickets</a></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-span-full sm:col-span-6 xl:col-span-3 bg-white shadow-lg rounded-sm border border-gray-200 overflow-hidden">
                                        <div class="flex flex-col h-full">
                                            <div class="relative">
                                                <img class="w-full" src="images/applications-image-11.jpg" width="286" height="160" alt="Application 11" />
                                                <button class="absolute top-0 right-0 mt-4 mr-4">
                                                    <div class="text-gray-100 bg-gray-900 bg-opacity-60 rounded-full">
                                                        <span class="sr-only">Like</span>
                                                        <svg class="h-8 w-8 fill-current" viewBox="0 0 32 32">
                                                            <path
                                                                d="M22.682 11.318A4.485 4.485 0 0019.5 10a4.377 4.377 0 00-3.5 1.707A4.383 4.383 0 0012.5 10a4.5 4.5 0 00-3.182 7.682L16 24l6.682-6.318a4.5 4.5 0 000-6.364zm-1.4 4.933L16 21.247l-5.285-5A2.5 2.5 0 0112.5 12c1.437 0 2.312.681 3.5 2.625C17.187 12.681 18.062 12 19.5 12a2.5 2.5 0 011.785 4.251h-.003z"
                                                            />
                                                        </svg>
                                                    </div>
                                                </button>
                                            </div>
                                            <div class="flex-grow flex flex-col p-5">
                                                <div class="flex-grow">
                                                    <header class="mb-2"><h3 class="text-lg text-gray-800 font-semibold">Health and Happiness Workshop</h3></header>
                                                    <ul class="text-sm space-y-2 mb-5">
                                                        <li class="flex items-center">
                                                            <svg class="w-4 h-4 fill-current text-gray-400 flex-shrink-0 mr-3" viewBox="0 0 16 16">
                                                                <path d="M15 2h-2V0h-2v2H9V0H7v2H5V0H3v2H1a1 1 0 00-1 1v12a1 1 0 001 1h14a1 1 0 001-1V3a1 1 0 00-1-1zm-1 12H2V6h12v8z" />
                                                            </svg>
                                                            <div class="text-red-500">Fri 7 Aug 2021 23:00 CEST</div>
                                                        </li>
                                                        <li class="flex items-center">
                                                            <svg class="w-4 h-4 fill-current text-gray-400 flex-shrink-0 mr-3" viewBox="0 0 16 16">
                                                                <path
                                                                    d="M8 6c2.9 0 6-.9 6-3s-3.1-3-6-3-6 .9-6 3 3.1 3 6 3zM2 6.5V8c0 2.1 3.1 3 6 3s6-.9 6-3V6.5C12.6 7.4 10.5 8 8 8s-4.6-.6-6-1.5zM2 11.5V13c0 2.1 3.1 3 6 3s6-.9 6-3v-1.5c-1.4 1-3.5 1.5-6 1.5s-4.6-.6-6-1.5z"
                                                                />
                                                            </svg>
                                                            <div>Starts at $16.24 / person</div>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div><a class="btn-sm w-full bg-indigo-500 hover:bg-indigo-600 text-white" href="#0">Buy Tickets</a></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-span-full sm:col-span-6 xl:col-span-3 bg-white shadow-lg rounded-sm border border-gray-200 overflow-hidden">
                                        <div class="flex flex-col h-full">
                                            <div class="relative">
                                                <img class="w-full" src="images/applications-image-12.jpg" width="286" height="160" alt="Application 12" />
                                                <button class="absolute top-0 right-0 mt-4 mr-4">
                                                    <div class="text-gray-100 bg-gray-900 bg-opacity-60 rounded-full">
                                                        <span class="sr-only">Like</span>
                                                        <svg class="h-8 w-8 fill-current" viewBox="0 0 32 32">
                                                            <path
                                                                d="M22.682 11.318A4.485 4.485 0 0019.5 10a4.377 4.377 0 00-3.5 1.707A4.383 4.383 0 0012.5 10a4.5 4.5 0 00-3.182 7.682L16 24l6.682-6.318a4.5 4.5 0 000-6.364zm-1.4 4.933L16 21.247l-5.285-5A2.5 2.5 0 0112.5 12c1.437 0 2.312.681 3.5 2.625C17.187 12.681 18.062 12 19.5 12a2.5 2.5 0 011.785 4.251h-.003z"
                                                            />
                                                        </svg>
                                                    </div>
                                                </button>
                                            </div>
                                            <div class="flex-grow flex flex-col p-5">
                                                <div class="flex-grow">
                                                    <header class="mb-2"><h3 class="text-lg text-gray-800 font-semibold">Health and Happiness Workshop</h3></header>
                                                    <ul class="text-sm space-y-2 mb-5">
                                                        <li class="flex items-center">
                                                            <svg class="w-4 h-4 fill-current text-gray-400 flex-shrink-0 mr-3" viewBox="0 0 16 16">
                                                                <path d="M15 2h-2V0h-2v2H9V0H7v2H5V0H3v2H1a1 1 0 00-1 1v12a1 1 0 001 1h14a1 1 0 001-1V3a1 1 0 00-1-1zm-1 12H2V6h12v8z" />
                                                            </svg>
                                                            <div class="text-red-500">Fri 7 Aug 2021 23:00 CEST</div>
                                                        </li>
                                                        <li class="flex items-center">
                                                            <svg class="w-4 h-4 fill-current text-gray-400 flex-shrink-0 mr-3" viewBox="0 0 16 16">
                                                                <path
                                                                    d="M8 6c2.9 0 6-.9 6-3s-3.1-3-6-3-6 .9-6 3 3.1 3 6 3zM2 6.5V8c0 2.1 3.1 3 6 3s6-.9 6-3V6.5C12.6 7.4 10.5 8 8 8s-4.6-.6-6-1.5zM2 11.5V13c0 2.1 3.1 3 6 3s6-.9 6-3v-1.5c-1.4 1-3.5 1.5-6 1.5s-4.6-.6-6-1.5z"
                                                                />
                                                            </svg>
                                                            <div>Starts at $16.24 / person</div>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div><a class="btn-sm w-full bg-indigo-500 hover:bg-indigo-600 text-white" href="#0">Buy Tickets</a></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-8">
                                <h2 class="text-xl leading-snug text-gray-800 font-bold mb-5">Crowdfunding</h2>
                                <div class="grid grid-cols-12 gap-6">
                                    <div class="col-span-full sm:col-span-6 xl:col-span-3 bg-white shadow-lg rounded-sm border border-gray-200 overflow-hidden">
                                        <div class="flex flex-col h-full">
                                            <div class="relative">
                                                <img class="w-full" src="images/applications-image-13.jpg" width="286" height="160" alt="Application 13" />
                                                <button class="absolute top-0 right-0 mt-4 mr-4">
                                                    <div class="text-gray-100 bg-gray-900 bg-opacity-60 rounded-full">
                                                        <span class="sr-only">Like</span>
                                                        <svg class="h-8 w-8 fill-current" viewBox="0 0 32 32">
                                                            <path
                                                                d="M22.682 11.318A4.485 4.485 0 0019.5 10a4.377 4.377 0 00-3.5 1.707A4.383 4.383 0 0012.5 10a4.5 4.5 0 00-3.182 7.682L16 24l6.682-6.318a4.5 4.5 0 000-6.364zm-1.4 4.933L16 21.247l-5.285-5A2.5 2.5 0 0112.5 12c1.437 0 2.312.681 3.5 2.625C17.187 12.681 18.062 12 19.5 12a2.5 2.5 0 011.785 4.251h-.003z"
                                                            />
                                                        </svg>
                                                    </div>
                                                </button>
                                            </div>
                                            <div class="flex-grow flex flex-col p-5">
                                                <div class="flex-grow">
                                                    <header class="mb-4">
                                                        <a class="text-xs text-green-500 hover:text-green-600 font-semibold uppercase tracking-widest mb-1" href="#0">Funding</a>
                                                        <h3 class="text-lg text-gray-800 font-semibold mb-1">SwiftNight Home Plus</h3>
                                                        <div class="text-sm">Lorem ipsum is placeholder text commonly used.</div>
                                                    </header>
                                                    <div class="mb-5">
                                                        <div class="flex justify-between text-sm space-x-2 mb-2">
                                                            <div><span class="font-semibold text-gray-800">$789,784</span> <span class="italic">raised</span></div>
                                                            <div>64%</div>
                                                        </div>
                                                        <div class="relative w-full h-2 rounded-full bg-gray-200 mb-2"><div class="absolute left-0 top-0 bottom-0 bg-green-500 rounded-full" style="width: 55%;"></div></div>
                                                        <div class="font-medium text-xs">30 Days Left</div>
                                                    </div>
                                                </div>
                                                <div><a class="btn-sm w-full bg-indigo-500 hover:bg-indigo-600 text-white" href="#0">Back It</a></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-span-full sm:col-span-6 xl:col-span-3 bg-white shadow-lg rounded-sm border border-gray-200 overflow-hidden">
                                        <div class="flex flex-col h-full">
                                            <div class="relative">
                                                <img class="w-full" src="images/applications-image-14.jpg" width="286" height="160" alt="Application 14" />
                                                <button class="absolute top-0 right-0 mt-4 mr-4">
                                                    <div class="text-gray-100 bg-gray-900 bg-opacity-60 rounded-full">
                                                        <span class="sr-only">Like</span>
                                                        <svg class="h-8 w-8 fill-current" viewBox="0 0 32 32">
                                                            <path
                                                                d="M22.682 11.318A4.485 4.485 0 0019.5 10a4.377 4.377 0 00-3.5 1.707A4.383 4.383 0 0012.5 10a4.5 4.5 0 00-3.182 7.682L16 24l6.682-6.318a4.5 4.5 0 000-6.364zm-1.4 4.933L16 21.247l-5.285-5A2.5 2.5 0 0112.5 12c1.437 0 2.312.681 3.5 2.625C17.187 12.681 18.062 12 19.5 12a2.5 2.5 0 011.785 4.251h-.003z"
                                                            />
                                                        </svg>
                                                    </div>
                                                </button>
                                            </div>
                                            <div class="flex-grow flex flex-col p-5">
                                                <div class="flex-grow">
                                                    <header class="mb-4">
                                                        <a class="text-xs text-green-500 hover:text-green-600 font-semibold uppercase tracking-widest mb-1" href="#0">Funding</a>
                                                        <h3 class="text-lg text-gray-800 font-semibold mb-1">SwiftNight Home Plus</h3>
                                                        <div class="text-sm">Lorem ipsum is placeholder text commonly used.</div>
                                                    </header>
                                                    <div class="mb-5">
                                                        <div class="flex justify-between text-sm space-x-2 mb-2">
                                                            <div><span class="font-semibold text-gray-800">$789,784</span> <span class="italic">raised</span></div>
                                                            <div>64%</div>
                                                        </div>
                                                        <div class="relative w-full h-2 rounded-full bg-gray-200 mb-2"><div class="absolute left-0 top-0 bottom-0 bg-green-500 rounded-full" style="width: 55%;"></div></div>
                                                        <div class="font-medium text-xs">30 Days Left</div>
                                                    </div>
                                                </div>
                                                <div><a class="btn-sm w-full bg-indigo-500 hover:bg-indigo-600 text-white" href="#0">Back It</a></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-span-full sm:col-span-6 xl:col-span-3 bg-white shadow-lg rounded-sm border border-gray-200 overflow-hidden">
                                        <div class="flex flex-col h-full">
                                            <div class="relative">
                                                <img class="w-full" src="images/applications-image-15.jpg" width="286" height="160" alt="Application 15" />
                                                <button class="absolute top-0 right-0 mt-4 mr-4">
                                                    <div class="text-gray-100 bg-gray-900 bg-opacity-60 rounded-full">
                                                        <span class="sr-only">Like</span>
                                                        <svg class="h-8 w-8 fill-current" viewBox="0 0 32 32">
                                                            <path
                                                                d="M22.682 11.318A4.485 4.485 0 0019.5 10a4.377 4.377 0 00-3.5 1.707A4.383 4.383 0 0012.5 10a4.5 4.5 0 00-3.182 7.682L16 24l6.682-6.318a4.5 4.5 0 000-6.364zm-1.4 4.933L16 21.247l-5.285-5A2.5 2.5 0 0112.5 12c1.437 0 2.312.681 3.5 2.625C17.187 12.681 18.062 12 19.5 12a2.5 2.5 0 011.785 4.251h-.003z"
                                                            />
                                                        </svg>
                                                    </div>
                                                </button>
                                            </div>
                                            <div class="flex-grow flex flex-col p-5">
                                                <div class="flex-grow">
                                                    <header class="mb-4">
                                                        <a class="text-xs text-green-500 hover:text-green-600 font-semibold uppercase tracking-widest mb-1" href="#0">Funding</a>
                                                        <h3 class="text-lg text-gray-800 font-semibold mb-1">SwiftNight Home Plus</h3>
                                                        <div class="text-sm">Lorem ipsum is placeholder text commonly used.</div>
                                                    </header>
                                                    <div class="mb-5">
                                                        <div class="flex justify-between text-sm space-x-2 mb-2">
                                                            <div><span class="font-semibold text-gray-800">$789,784</span> <span class="italic">raised</span></div>
                                                            <div>64%</div>
                                                        </div>
                                                        <div class="relative w-full h-2 rounded-full bg-gray-200 mb-2"><div class="absolute left-0 top-0 bottom-0 bg-green-500 rounded-full" style="width: 55%;"></div></div>
                                                        <div class="font-medium text-xs">30 Days Left</div>
                                                    </div>
                                                </div>
                                                <div><a class="btn-sm w-full bg-indigo-500 hover:bg-indigo-600 text-white" href="#0">Back It</a></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-span-full sm:col-span-6 xl:col-span-3 bg-white shadow-lg rounded-sm border border-gray-200 overflow-hidden">
                                        <div class="flex flex-col h-full">
                                            <div class="relative">
                                                <img class="w-full" src="images/applications-image-16.jpg" width="286" height="160" alt="Application 16" />
                                                <button class="absolute top-0 right-0 mt-4 mr-4">
                                                    <div class="text-gray-100 bg-gray-900 bg-opacity-60 rounded-full">
                                                        <span class="sr-only">Like</span>
                                                        <svg class="h-8 w-8 fill-current" viewBox="0 0 32 32">
                                                            <path
                                                                d="M22.682 11.318A4.485 4.485 0 0019.5 10a4.377 4.377 0 00-3.5 1.707A4.383 4.383 0 0012.5 10a4.5 4.5 0 00-3.182 7.682L16 24l6.682-6.318a4.5 4.5 0 000-6.364zm-1.4 4.933L16 21.247l-5.285-5A2.5 2.5 0 0112.5 12c1.437 0 2.312.681 3.5 2.625C17.187 12.681 18.062 12 19.5 12a2.5 2.5 0 011.785 4.251h-.003z"
                                                            />
                                                        </svg>
                                                    </div>
                                                </button>
                                            </div>
                                            <div class="flex-grow flex flex-col p-5">
                                                <div class="flex-grow">
                                                    <header class="mb-4">
                                                        <a class="text-xs text-green-500 hover:text-green-600 font-semibold uppercase tracking-widest mb-1" href="#0">Funding</a>
                                                        <h3 class="text-lg text-gray-800 font-semibold mb-1">SwiftNight Home Plus</h3>
                                                        <div class="text-sm">Lorem ipsum is placeholder text commonly used.</div>
                                                    </header>
                                                    <div class="mb-5">
                                                        <div class="flex justify-between text-sm space-x-2 mb-2">
                                                            <div><span class="font-semibold text-gray-800">$789,784</span> <span class="italic">raised</span></div>
                                                            <div>64%</div>
                                                        </div>
                                                        <div class="relative w-full h-2 rounded-full bg-gray-200 mb-2"><div class="absolute left-0 top-0 bottom-0 bg-green-500 rounded-full" style="width: 55%;"></div></div>
                                                        <div class="font-medium text-xs">30 Days Left</div>
                                                    </div>
                                                </div>
                                                <div><a class="btn-sm w-full bg-indigo-500 hover:bg-indigo-600 text-white" href="#0">Back It</a></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-8">
                                <h2 class="text-xl leading-snug text-gray-800 font-bold mb-5">Popular Categories</h2>
                                <div class="grid grid-cols-12 gap-6">
                                    <div class="col-span-full sm:col-span-6 xl:col-span-3 bg-white shadow-lg rounded-sm border border-gray-200">
                                        <div class="flex flex-col h-full text-center p-5">
                                            <div class="flex-grow mb-1">
                                                <div class="inline-flex justify-center items-center w-12 h-12 bg-gray-100 rounded-full mb-2">
                                                    <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24">
                                                        <path class="text-indigo-300" d="M13 15l11-7L11.504.136a1 1 0 00-1.019.007L0 7l13 8z" />
                                                        <path class="text-indigo-600" d="M13 15L0 7v9c0 .355.189.685.496.864L13 24v-9z" />
                                                        <path class="text-indigo-500" d="M13 15.047V24l10.573-7.181A.999.999 0 0024 16V8l-11 7.047z" />
                                                    </svg>
                                                </div>
                                                <h3 class="text-lg text-gray-800 font-semibold mb-1">Merchandise</h3>
                                            </div>
                                            <div><a class="text-sm font-medium text-indigo-500 hover:text-indigo-600" href="#0">Explore -&gt;</a></div>
                                        </div>
                                    </div>
                                    <div class="col-span-full sm:col-span-6 xl:col-span-3 bg-white shadow-lg rounded-sm border border-gray-200">
                                        <div class="flex flex-col h-full text-center p-5">
                                            <div class="flex-grow mb-1">
                                                <div class="inline-flex justify-center items-center w-12 h-12 bg-gray-100 rounded-full mb-2">
                                                    <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24">
                                                        <circle class="text-light-blue-200" cx="15" cy="15" r="9" fill-rule="nonzero" />
                                                        <circle class="text-light-blue-400" cx="9" cy="9" r="9" />
                                                    </svg>
                                                </div>
                                                <h3 class="text-lg text-gray-800 font-semibold mb-1">Audiobooks</h3>
                                            </div>
                                            <div><a class="text-sm font-medium text-indigo-500 hover:text-indigo-600" href="#0">Explore -&gt;</a></div>
                                        </div>
                                    </div>
                                    <div class="col-span-full sm:col-span-6 xl:col-span-3 bg-white shadow-lg rounded-sm border border-gray-200">
                                        <div class="flex flex-col h-full text-center p-5">
                                            <div class="flex-grow mb-1">
                                                <div class="inline-flex justify-center items-center w-12 h-12 bg-gray-100 rounded-full mb-2">
                                                    <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24">
                                                        <path class="text-green-500" d="M3 .998h6a2 2 0 012 2v6a2 2 0 01-2 2H3a2 2 0 01-2-2v-6a2 2 0 012-2z" />
                                                        <path
                                                            class="text-green-400"
                                                            d="M23.428 4.616L19.381.57a1.957 1.957 0 00-2.762 0l-4.047 4.046c-.76.765-.76 2 0 2.764l4.047 4.047c.764.76 1.998.76 2.762 0l4.047-4.046c.761-.764.761-2 0-2.765z"
                                                        />
                                                        <path class="text-green-500" d="M15 12.998h6a2 2 0 012 2v6a2 2 0 01-2 2h-6a2 2 0 01-2-2v-6a2 2 0 012-2z" />
                                                        <path class="text-green-200" d="M3 12.998h6a2 2 0 012 2v6a2 2 0 01-2 2H3a2 2 0 01-2-2v-6a2 2 0 012-2z" />
                                                    </svg>
                                                </div>
                                                <h3 class="text-lg text-gray-800 font-semibold mb-1">Design & Tech</h3>
                                            </div>
                                            <div><a class="text-sm font-medium text-indigo-500 hover:text-indigo-600" href="#0">Explore -&gt;</a></div>
                                        </div>
                                    </div>
                                    <div class="col-span-full sm:col-span-6 xl:col-span-3 bg-white shadow-lg rounded-sm border border-gray-200">
                                        <div class="flex flex-col h-full text-center p-5">
                                            <div class="flex-grow mb-1">
                                                <div class="inline-flex justify-center items-center w-12 h-12 bg-gray-100 rounded-full mb-2">
                                                    <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24">
                                                        <path class="text-red-100" d="M12 10l12 7-12 7-12-7z" />
                                                        <path class="text-red-300" d="M12 5l12 7-12 7-12-7z" />
                                                        <path class="text-red-500" d="M12 0l12 7-12 7L0 7z" />
                                                    </svg>
                                                </div>
                                                <h3 class="text-lg text-gray-800 font-semibold mb-1">Apps & Software</h3>
                                            </div>
                                            <div><a class="text-sm font-medium text-indigo-500 hover:text-indigo-600" href="#0">Explore -&gt;</a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-8">
                                <h2 class="text-xl leading-snug text-gray-800 font-bold mb-5">Trending Now</h2>
                                <div class="grid grid-cols-12 gap-6">
                                    <div class="relative col-span-full sm:col-span-6 xl:col-span-3 bg-white shadow-lg rounded-sm border border-gray-200 overflow-hidden">
                                        <img class="absolute w-full h-full object-cover" src="images/applications-image-17.jpg" width="286" height="160" alt="Application 17" />
                                        <div class="absolute inset-0 bg-gradient-to-t from-gray-800 to-transparent" aria-hidden="true"></div>
                                        <div class="relative h-full p-5 flex flex-col justify-end">
                                            <h3 class="text-lg text-white font-semibold mt-16 mb-0.5">Merchandise</h3>
                                            <a class="text-sm font-medium text-indigo-400 hover:text-indigo-300" href="#0">Explore -&gt;</a>
                                        </div>
                                    </div>
                                    <div class="relative col-span-full sm:col-span-6 xl:col-span-3 bg-white shadow-lg rounded-sm border border-gray-200 overflow-hidden">
                                        <img class="absolute w-full h-full object-cover" src="images/applications-image-18.jpg" width="286" height="160" alt="Application 18" />
                                        <div class="absolute inset-0 bg-gradient-to-t from-gray-800 to-transparent" aria-hidden="true"></div>
                                        <div class="relative h-full p-5 flex flex-col justify-end">
                                            <h3 class="text-lg text-white font-semibold mt-16 mb-0.5">Audiobooks</h3>
                                            <a class="text-sm font-medium text-indigo-400 hover:text-indigo-300" href="#0">Explore -&gt;</a>
                                        </div>
                                    </div>
                                    <div class="relative col-span-full sm:col-span-6 xl:col-span-3 bg-white shadow-lg rounded-sm border border-gray-200 overflow-hidden">
                                        <img class="absolute w-full h-full object-cover" src="images/applications-image-19.jpg" width="286" height="160" alt="Application 19" />
                                        <div class="absolute inset-0 bg-gradient-to-t from-gray-800 to-transparent" aria-hidden="true"></div>
                                        <div class="relative h-full p-5 flex flex-col justify-end">
                                            <h3 class="text-lg text-white font-semibold mt-16 mb-0.5">Design & Tech</h3>
                                            <a class="text-sm font-medium text-indigo-400 hover:text-indigo-300" href="#0">Explore -&gt;</a>
                                        </div>
                                    </div>
                                    <div class="relative col-span-full sm:col-span-6 xl:col-span-3 bg-white shadow-lg rounded-sm border border-gray-200 overflow-hidden">
                                        <img class="absolute w-full h-full object-cover" src="images/applications-image-20.jpg" width="286" height="160" alt="Application 20" />
                                        <div class="absolute inset-0 bg-gradient-to-t from-gray-800 to-transparent" aria-hidden="true"></div>
                                        <div class="relative h-full p-5 flex flex-col justify-end">
                                            <h3 class="text-lg text-white font-semibold mt-16 mb-0.5">Apps & Software</h3>
                                            <a class="text-sm font-medium text-indigo-400 hover:text-indigo-300" href="#0">Explore -&gt;</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
        <script src="main.1d81bde90a14432c5977.js"></script>
    </body>
</html>
