<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Plataforma M&E</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="<?php print base_url();?>css/style.css" rel="stylesheet" type="text/css" media="screen" />
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src=" http://code.jquery.com/jquery-1.9.1.js"></script>
<script type="text/javascript" src="<?php print base_url();?>assets/js/proyecto.js"></script>

</head>
<body>
<div id="wrapper">
	<div id="logo">
            <h1><a href="#"><img src="<?php print base_url();?>/images/logo.png" width="100px" height="50px"></img></a></h1>
            <span style="color:white">International Relief & Development</span>
	</div><hr />
	<div id="header">
		<div id="menu">
			<ul><!-- class="current_page_item" -->
                            <?php 
                            
                            foreach ($Menu as $contenido){?>
                                
                            <li ><a href="#" id="<?php print $contenido["Funcion"];?>"><img src="<?php print $contenido["Imagen"];?>" alt="<?php print $contenido["Etiqueta"];?>"> </img></a></li>
                            <?php
                                
                            }?>
				
				
			</ul>
		</div>
            <!--
		<div id="search">
                        
			<form method="get" action="#">
				<fieldset>
				<input type="text" name="s" id="search-text" size="15" />
				<input type="submit" id="search-submit" value="Buscar" />
				</fieldset>
			</form>
		</div>
            -->
	</div>