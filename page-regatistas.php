<?php get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post();  the_content();?>
<?php
endwhile; endif; ?>

<main class = "main">
  <div class="regatistas">
	  			<h1>Equipo  <b class="gold">nautico:</b></h1>
		<div class='rColumna'>

<?php 
$args = array( 'post_type' => 'regatistas', 'posts_per_page' => 10, 'orderby' =>"modified" );
$the_query = new WP_Query( $args ); 
?>
<?php if ( $the_query->have_posts() ) {
        while ( $the_query->have_posts() ) { $the_query->the_post(); ?>
<?php
if ( has_post_thumbnail() ) {
	
		echo "<div class ='regEl'>";
			the_post_thumbnail('thumbnail',array('class' => 'regimg'));
			echo "<div class ='centrado'>";
				echo "<b>";
				the_title();
				echo "</b>";
				echo  the_content();
			echo "</div>";

	
	
	echo "</div>";

}?>

<?php
wp_reset_postdata(); }
 } else {  
?>
<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php } ?>
</div>
</div>
</main>

<?php get_footer(); ?>