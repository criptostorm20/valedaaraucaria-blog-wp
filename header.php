<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Blog Template for Bootstrap</title>
    <?php wp_head(); ?>
  </head>

  <body <?php body_class(); ?>>

  <header id="home-header">
    <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-faded">
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarMobile" aria-controls="navbarMobile" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
        
      <div class="collapse navbar-collapse" id="nav-left">
        <ul class="nav navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link px-4" href="https://valedaaraucaria.com.br">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link px-4" href="https://valedaaraucaria.com.br/regiao">A região</a>
            </li>
            <li class="nav-item">
                <a class="nav-link px-4" href="https://valedaaraucaria.com.br/como-chegar">Como chegar</a>
            </li>
        </ul>
      </div>
        
      <a class="navbar-brand px-5 mx-auto" href="#">
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/logotipo-horizontal-vale-da-araucaria.svg" width="150" class="d-inline-block align-top" alt="">
      </a>
        
      <div class="collapse navbar-collapse">
        <ul class="nav navbar-nav">
            <li class="nav-item">
                <a class="nav-link px-4" href="./">Blog</a>
            </li>
          <li class="nav-item">
                <a class="nav-link px-4" href="https://valedaaraucaria.com.br/privacidade">Privacidade</a>
          </li>
          <li class="nav-item">
              <a class="nav-link px-4" href="https://valedaaraucaria.com.br/contato">Contato</a>
          </li>
        </ul>
      </div>
      
      <!-- Mobile -->
      <div class="collapse" id="navbarMobile">
          <ul class="nav navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="#">Mobile Link</a>
            </li>
            <li class="nav-item">
                  <a class="nav-link" href="#">Mobile Link</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Mobile Link</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Mobile Link</a>
            </li>
            <li class="nav-item">
                  <a class="nav-link" href="#">Mobile Link</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Mobile Link</a>
            </li>
          </ul>
      </div>
    </nav>


  </header>
