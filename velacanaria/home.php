
<?php get_header();?>

<main class="bgnoticias">

<?php if ( have_posts() ) : while ( have_posts() ) : the_post();  wp_reset_postdata();?>

<div class="noticias2">
<?php
echo "<div class = 'noticiasContent'>";
	
if ( has_post_thumbnail() ) {
   echo "<div class = 'imagen_destacada'>";
	
	echo "</div>";
} 
echo "<h1>";
the_title();
echo "</h1>";
the_excerpt();
echo "</div>";
?>
</div>
<?php
endwhile; else: ?>
<p>Sorry, no posts matched your criteria.</p>
<?php endif;
 the_posts_pagination( array(
	   'screen_reader_text' => ' ',
    'mid_size' => 2,
    'prev_text' =>  'Back',
    'next_text' =>  'Onward', ) );  
	?>

</main>
<div background

<?php get_footer();?>