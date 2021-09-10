<?php
  
  get_header();

  while(have_posts()) {
    the_post();
     ?>
            <div>
                <main>
                    <div class="px-4 sm:px-6 lg:px-8 py-8 w-full">
                        <div class="afdalmaincontent mx-auto flex flex-col lg:flex-row lg:space-x-8 xl:space-x-16 mt-9">
                            <div>
                                <div class="mb-3"><a class="text-m font-medium text-indigo-500 hover:text-indigo-600" href="<?php get_site_url() ?>/beranda/juknis">&lt;- kembali Ke Beranda</a></div>
                                <header class="mb-4">
                                    <h1 class="text-2xl md:text-3xl text-gray-800 font-bold mb-2"><?php the_title(); ?>✨</h1>
                                    <p> <?php the_content(); ?></p>
                                </header>
                                <hr class="my-6 border-t border-gray-200" />
                            </div>
                        </div>
                    </div>
                </main>
            </div>



    
  <?php }

  get_footer();

?>