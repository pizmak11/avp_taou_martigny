<?php 

get_header();

if    (is_page(12)) get_template_part( 'index',         'page' ); 
elseif(is_page(16)) get_template_part( 'commune',       'page' );
elseif(is_page(41)) get_template_part( 'projet',        'page' );
elseif(is_page(14)) get_template_part( 'situation',     'page' );
elseif(is_page(18)) get_template_part( 'plans-et-prix', 'page' );
elseif(is_page(22)) get_template_part( 'galerie',       'page' );
elseif(is_page(20)) get_template_part( 'contact',       'page' );
elseif(is_page(28)) get_template_part( 'succes',        'page' );
else                get_template_part( 'content',       'page' );

get_footer(); ?>

