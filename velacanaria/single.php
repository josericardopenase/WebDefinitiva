<?php get_header();?>
	
<main class="regatistas">
<?php if ( have_posts() ) : while ( have_posts() ) : the_post();?>

<div class="noticias noticias2">
<?php
the_title();
the_content();
the_author();
?>
</div>
<?php
endwhile; else: ?>
<p>Sorry, no posts matched your criteria.</p>
<?php endif; ?>
</main>



<?php get_footer();?>