<?php get_header();?>
	
<main class="regatistas">
<?php if ( have_posts() ) : while ( have_posts() ) : the_post();?>

<div class="NoticiasGrandes">
<?php
echo "<h1 class ='Titulopagina'>";
the_title();
echo "</h1>";
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