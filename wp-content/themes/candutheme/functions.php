<?php

function hero_pencarian($args = NULL) { ?>

                    <section class="relative">
                        <!-- Background gradient (light version only) -->
                                <div
                                    class="absolute inset-0 pointer-events-none bg-gradient-to-t from-gray-100 to-white dark:hidden"
                                    aria-hidden="true"
                                ></div>
                            <!-- End background gradient (light version only) -->
                                <div class="relative max-w-6xl px-4 mx-auto sm:px-6">
                                    <div class="pt-32 pb-12 md:pt-40 md:pb-20">
                                    <div class="max-w-3xl mx-auto text-center">
                                        <h1 class="mb-4 h1 font-red-hat-display" data-aos="fade-down">
                                        Temukan yang kamu butuhkan disini!
                                        </h1>
                                        <p
                                        class="text-xl text-gray-600 dark:text-gray-400"
                                        data-aos="fade-down"
                                        data-aos-delay="150"
                                        >
                                        Materi Pembelajaran, Kuis, Forum, Tanya Jawab hingga Bahan Pembelajaran
                                        mengenai Akuntansi, Perpajakan, Keuangnan Negara dan Bea Cukai
                                        </p>
                                        <div class="max-w-2xl mx-auto md:px-4">
                                        <form
                                            class="relative flex items-center mt-8"
                                            data-aos="fade-down"
                                            data-aos-delay="300"
                                        >
                                            <input
                                            type="search"
                                            class="w-full pl-12 form-input"
                                            placeholder="Cari Apapun…"
                                            aria-label="Search anything"
                                            />
                                            <button
                                            type="submit"
                                            class="absolute inset-0 right-auto"
                                            aria-label="Search"
                                            >
                                            <svg
                                                class="flex-shrink-0 w-4 h-4 ml-4 mr-3"
                                                viewBox="0 0 16 16"
                                                xmlns="http://www.w3.org/2000/svg"
                                            >
                                                <path
                                                class="text-gray-400 fill-current"
                                                d="M7 14c-3.86 0-7-3.14-7-7s3.14-7 7-7 7 3.14 7 7-3.14 7-7 7zM7 2C4.243 2 2 4.243 2 7s2.243 5 5 5 5-2.243 5-5-2.243-5-5-5zm8.707 12.293a.999.999 0 11-1.414 1.414L11.9 13.314a8.019 8.019 0 001.414-1.414l2.393 2.393z"
                                                />
                                            </svg>
                                            </button>
                                        </form>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                    </section>

     <?php } 

function stats($args = NULL) { ?>
                <section class="relative">
                    <!-- Background gradient (light version only) -->
                    <div
                        class="absolute bottom-0 left-0 right-0 pointer-events-none h-128 bg-gradient-to-t from-gray-100 to-white -z-10 dark:hidden"
                        aria-hidden="true"
                    ></div>
                    <!-- End background gradient (light version only) -->
                    <div class="relative max-w-6xl px-4 mx-auto sm:px-6">
                        <div class="pb-12 md:pb-20">
                        <div
                            class="grid grid-cols-2 gap-4 text-center lg:gap-6 md:grid-cols-4"
                            data-aos-id-stats
                        >
                            <!-- 1st item -->
                            <div
                            class="px-1 py-8 bg-white shadow-2xl dark:bg-gray-800"
                            data-aos="fade-down"
                            data-aos-anchor="[data-aos-id-stats]"
                            >
                            <div
                                class="mb-1 text-3xl font-extrabold tracking-tighter font-red-hat-display"
                            >
                                2.4M
                            </div>
                            <div class="text-gray-600 dark:text-gray-400">
                                Pengguna Website ini
                            </div>
                            </div>
                            <!-- 2nd item -->
                            <div
                            class="px-1 py-8 bg-white shadow-2xl dark:bg-gray-800"
                            data-aos="fade-down"
                            data-aos-anchor="[data-aos-id-stats]"
                            data-aos-delay="100"
                            >
                            <div
                                class="mb-1 text-3xl font-extrabold tracking-tighter font-red-hat-display"
                            >
                                7M
                            </div>
                            <div class="text-gray-600 dark:text-gray-400">
                                Anggota Website ini
                            </div>
                            </div>
                            <!-- 3rd item -->
                            <div
                            class="px-1 py-8 bg-white shadow-2xl dark:bg-gray-800"
                            data-aos="fade-down"
                            data-aos-anchor="[data-aos-id-stats]"
                            data-aos-delay="200"
                            >
                            <div
                                class="mb-1 text-3xl font-extrabold tracking-tighter font-red-hat-display"
                            >
                                7.4%
                            </div>
                            <div class="text-gray-600 dark:text-gray-400">Tingkat Loyalitas</div>
                            </div>
                            <!-- 4th item -->
                            <div
                            class="px-1 py-8 bg-white shadow-2xl dark:bg-gray-800"
                            data-aos="fade-down"
                            data-aos-anchor="[data-aos-id-stats]"
                            data-aos-delay="300"
                            >
                            <div
                                class="mb-1 text-3xl font-extrabold tracking-tighter font-red-hat-display"
                            >
                                49K
                            </div>
                            <div class="text-gray-600 dark:text-gray-400">Total Pengguna</div>
                            </div>
                        </div>
                        </div>
                    </div>
                </section>

    <?php } ?>


