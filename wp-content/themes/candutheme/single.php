
<?php
    // munculin header
    get_header(); 

?>

<?php
 
if ( have_posts() ) {
 
    while ( have_posts() ) {
 
        the_post(); ?>

    
        
        
 
 
                <main>
                    <div class="px-4 sm:px-6 lg:px-8 py-8 w-full">
                        <div class="max-w-5xl mx-auto flex flex-col lg:flex-row lg:space-x-8 xl:space-x-16 mt-9">
                            <div>
                                <div class="mb-3"><a class="text-sm font-medium text-indigo-500 hover:text-indigo-600" href="#0">&lt;- Kembali Ke Beranda</a></div>
                                <div class="mb-4">
                                    <h1 class="text-2xl md:text-3xl text-gray-800 font-bold mb-2"><?php the_title(  ); ?> ✨</h1>
                                    <?php the_content(  ) ?>
                                </div>

                        </div>
                    </div>
                </main>

    <?php }
}
 
?>
<?php 
get_footer(  );
?>