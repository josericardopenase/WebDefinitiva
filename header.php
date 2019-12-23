<html>
<!--ESTE ES EL ENCABEZADO-->
<head>
<meta charset="utf-8">
<title>Inicio</title>
<?php wp_head(); ?>
</head>

<header class = "header">
  <div class = "headercontainer logo-nav-container">
	<img src="	<?php echo get_template_directory_uri().'\img\LOGO3.PNG'; ?>" width="186.36" height="72.8" class = "logo "  alt="">
	<span class="menu-icon" onClick="funcion()"  >Mostrar menu</span>
	
	 <?php wp_nav_menu( array(
	  'items_wrap' => '<ul class="show">%3$s</ul>',
    'container_class' => 'navigation',
    'menu_class'=> 'navigation'
 ) );?>
	<!--<nav class = "navigation">
				<ul id ="lss" class = "show">
				<li><a href = "<?php echo site_url(); ?>">Inicio</a></li>
				<li><a href = "Noticias.php">Noticias</a></li>
				<li><a href = "Clasificaciones.php">Clasificaciones</a></li>
				<li><a href = "<?php echo site_url('regatistas'); ?>">Regatistas</a></li>
				<li><a href = "Historia.php">Historia</a></li>
				</ul>
	</nav> -->
	  
  </div>
</header>
	
<body>