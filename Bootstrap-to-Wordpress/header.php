<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="<?php bloginfo('template_directory');?>/images/favicon.ico">

    <title>
      <?php wp_title( '|', true, 'right' ); ?>
      <?php bloginfo( 'name' ); ?>
    </title>

    <?php wp_head(); ?>

  </head>

  <body <?php body_class(); ?>>
    <div class= "bg"></div>
    <div class="navbar navbar-default  " role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <!-- <a class="navbar-brand" href="<?php bloginfo( 'url' ); ?>"><?php bloginfo( 'name' ); ?></a> -->
          <a class="navbar-brand main-logo" href="<?php bloginfo( 'url' ); ?>"><?php bloginfo( 'name' ); ?></a>



        </div>

        <div class="navbar-collapse collapse navbar-right">

          <?php 
            $args = array(
              'menu'        => 'header-menu',
              'menu_class'  => 'nav navbar-nav',
              'container'   => 'false'
            );
            wp_nav_menu( $args );
          ?>
          <?php $search_terms = htmlspecialchars( $_GET["s"] ); ?>

          <form  class="navbar-form navbar-right" role="form" action="<?php bloginfo('siteurl'); ?>/" id="searchform" method="get">
              <label for="s" class="sr-only">Search</label>
              <div class="form-group">
                  <input type="text" class="form-control" id="s" name="s" placeholder="Search"<?php if ( $search_terms !== '' ) { echo ' value="' . $search_terms . '"'; } ?> />
                  <button type="submit" class="btn btn-default"><i class="icon-search"></i></button>   
              </div> <!-- .input-group -->
          </form>

          <!-- <form class="navbar-form navbar-right" role="search">
            <div class="form-group">
              <input type="text" class="form-control" placeholder="Search">
            </div>
              <button type="submit" class="btn btn-default">Submit</button>
          </form> -->
        </div><!--/.navbar-collapse -->

      </div>
    </div>