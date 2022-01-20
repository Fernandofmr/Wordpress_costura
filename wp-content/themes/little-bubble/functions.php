<?php

// List featured products
function productos_destacados() {

    global $post;
    $chars_quantity = 20;

    ?>

    <ul class="productos-destacados d-flex productos-destacados-carousel">
        <?php
            $args = array( 
                'post_type' => 'product',
                'product_tag' => array('destacado')
            );

            $loop = new WP_Query($args);
            
            if ($loop->have_posts()) {
                while ($loop->have_posts() ) : $loop->the_post(); global $product;
                    $id_producto = 'producto-destacado' . $loop->post->ID;
                    $get_product = wc_get_product($loop->post->ID); ?>
                    <li class="li-producto-destacado" onmouseenter="apareceBoton('<?php echo $id_producto ?>')" onmouseleave="desapareceBoton('<?php echo $id_producto ?>')">
                        <div id="caja-producto-destacado">
                            <?php 
                                echo "<div class='img-producto-destacado'>";
                                if (has_post_thumbnail($loop->post->ID)){
                                    echo get_the_post_thumbnail($loop->post->ID, array(500, 600));                                    
                                }
                                echo "</div>";
                                echo "<div class='caja-info-producto-destacado'>";
                                echo "<div class='nombre-producto-destacado'>" . get_the_title() . "</div>";
                                echo "<div class='precio-producto-destacado'>" . $get_product->get_price() . "</div>";
                                echo "</div>";
                            ?>                            
                            <a href="<?php echo get_permalink($loop->post->ID) ?>" class="btn-ver-producto-destacado" id="<?php echo $id_producto ?>"> Ver producto </a>
                        </div>
                    </li>
                    <?php
                endwhile;
            }else {
                echo __( 'No hay productos' );
            }

            ?>
        <?php wp_reset_query(); ?>
    </ul>
<?php
}
add_shortcode( 'lista-novedades-productos', 'productos_destacados' );


// List post
function show_posts() {
    $characters = 20;
    $args = array(
        'post_type' => 'post', 
        'post_status' => 'publish', 
        'posts_per_page' => 4, 
        'orderby' => 'title', 
        'order' => 'ASC'
    );

    $loop = new WP_Query($args);
    $count = 0;
    $fila = 1;

    echo '<div class="apartado-post-home">';

    while ($loop->have_posts()) : $loop->the_post();
            if ($count % 2 == 0 || $count == 0){
                echo '<div class="d-flex mt-3">';
            }
                switch ($count) {
                    case 0:
                        echo '<div class="fondo-1">';
                        break;
                    
                    case 1:
                        echo '<div class="fondo-2">';
                        break;

                    case 2:
                        echo '<div class="fondo-3">';
                        break;

                    case 3:
                        echo '<div class="fondo-4">';
                        break;
                    
                    default:
                        # code...
                        break;
                }
            ?>
            <div class="caja-post ml-3">
                <?php
                    if ($count == 0){?>
                        <div class="caja-contenido-post-1 p-1 contenido-post-fondo-azul">
                            <a class="link-post-home" href="<?php echo get_permalink() ?>">
                                <h4 class="titulo-post-home text-center"><?php echo get_the_title() ?></h4>
                                <div class="texto-post-home"><?php echo substr(get_the_excerpt(), 0, 45) ?>...</div>
                            </a>
                        </div> <?php
                    }else if($count == 1){?>
                        <div class="caja-contenido-post-2 ml-3 p-1 contenido-post-fondo-verde">
                            <a class="link-post-home" href="<?php echo get_permalink() ?>">
                                <h4 class="titulo-post-home text-center"><?php echo get_the_title() ?></h4>
                                <div class="texto-post-home"><?php echo substr(get_the_excerpt(), 0, 80) ?>...</div>
                            </a>
                        </div> <?php
                    }else if($count == 2){?>
                        <div class="caja-contenido-post-3 ml-3 p-1 contenido-post-fondo-rosa">
                            <a class="link-post-home" href="<?php echo get_permalink() ?>">
                                <h4 class="titulo-post-home text-center"><?php echo get_the_title() ?></h4>
                                <div class="texto-post-home"><?php echo substr(get_the_excerpt(), 0, 40) ?>...</div>
                            </a>
                        </div> <?php
                    }else if($count == 3){?>
                        <div class="caja-contenido-post-4 ml-3 p-1 contenido-post-fondo-amarillo">
                            <a class="link-post-home" href="<?php echo get_permalink() ?>">
                                <h4 class="titulo-post-home text-center"><?php echo get_the_title() ?></h4>
                                <div class="texto-post-home"><?php echo substr(get_the_excerpt(), 0, 200) ?>...</div>
                            </a>
                        </div> <?php
                    }
                ?>
                <?php  $count += 1;
                    if ($count % 2 == 0){
                        $fila += 1;
                        echo '<br><br><br></div>';
                    }
                ?>
            </div>

        <?php
        echo '</div>';
    endwhile;

    echo '</div>';

    wp_reset_postdata();

}
add_shortcode( 'lista-entradas', 'show_posts' );


// List new products
function lista_novedades() {
    global $woocommerce, $product;

    $args = array(        
        'post_type' => 'product',
        'orderby' => 'date', 
        'order' => 'DESC',
    );

    $loop = new WP_Query($args);

    if ( $loop->have_posts() ) :

        ?>
        <ul class="listado-productos-novedades d-flex productos-novedades-carousel">
        <?php

        while ( $loop->have_posts() ) : $loop->the_post();
            $id_producto_novedad = 'producto-novedad-' . $loop->post->ID; ?>
            
            <?php $get_product = wc_get_product($loop->post->ID); ?>
            <li id="<?php echo $id_producto_novedad ?>" class="producto-novedad content-product-novedades" onmouseenter="agrandaProductoDestacado('<?php echo $id_producto_novedad ?>')" onmouseleave="noAgrandaProductoDestacado('<?php echo $id_producto_novedad ?>')">
                <a href="<?php echo the_permalink() ?>" class="enlace-producto-novedad">
                        <div><?php echo get_the_post_thumbnail($loop->post->ID, array(350, 250)) ?></div>
                        <div class="text-center"><?php the_title() ?></div>
                        <div class="text-center"><?php echo $get_product->get_price(); ?></div>
                    
                </a>
            </li>
    
        <?php
        endwhile;
        ?>
        </ul>
        <?php
    
        wp_reset_postdata();
    
    endif;
}
add_shortcode( 'lista-novedades', 'lista_novedades' );


// List all products
function list_all_products() {
    global $paged;

    echo '<div id="por-defecto" class="por-defecto">';
    $count = 0;
    $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;

    $args =  array(
        'post_type' => 'product', 
        'posts_per_page' => 12, 
        'paged' => $paged
    );

    $loop = new WP_Query($args);

    if ( $loop->have_posts() ) :

        ?>
        
        <?php

        while ( $loop->have_posts() ) : $loop->the_post();
            $get_product = wc_get_product($loop->post->ID); 
            if($count == 0){
                echo '<ul class="listado-shop d-flex">';
            }
            ?>
            <li class="producto-shop content-product-shop">
                <a href="<?php echo the_permalink() ?>" class="enlace-producto-shop">
                        <div><?php echo get_the_post_thumbnail($loop->post->ID, 'post-thumbnail', array('class' => 'attachment-woocommerce_thumbnail size-woocommerce_thumbnail')) ?></div>
                        <h5 class="text-center"><?php the_title() ?></h5>
                        <div class="text-center"><?php echo $get_product->get_price(); ?></div>                    
                </a>
            </li>
    
        <?php
        $count += 1;
        if ($count == 4) {
            echo '</ul>';
            $count = 0;
        }
        endwhile;

        if ($count<4 && $count>0) {
            echo '</ul>';
        }
        ?>   
        
        
        <nav class="nav-pagination mt-3">
            <ul class="ul-pagination d-flex">
                <li class="li-pagination"><?php previous_posts_link( '&laquo; ANTERIOR', $loop->max_num_pages) ?></li> 
                <li class="li-pagination"><?php next_posts_link( 'SIGUIENTE &raquo;', $loop->max_num_pages) ?></li>
            </ul>
        </nav>

        <?php
    
        wp_reset_postdata();
    
    endif;
    echo '</div>';

    
    echo '<div id="por-nombre" class="por-nombre d-none">';
    $count = 0;
    $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;

    $args =  array(
        'post_type' => 'product', 
        'orderby' => 'title', 
        'order' => 'ASC',
        'posts_per_page' => 12, 
        'paged' => $paged
    );

    $loop = new WP_Query($args);

    if ( $loop->have_posts() ) :

        ?>
        
        <?php

        while ( $loop->have_posts() ) : $loop->the_post();
            $get_product = wc_get_product($loop->post->ID); 
            if($count == 0){
                echo '<ul class="listado-shop d-flex">';
            }
            ?>
            <li class="producto-shop content-product-shop">
                <a href="<?php echo the_permalink() ?>" class="enlace-producto-shop">
                        <div><?php echo get_the_post_thumbnail($loop->post->ID, 'post-thumbnail', array('class' => 'attachment-woocommerce_thumbnail size-woocommerce_thumbnail')) ?></div>
                        <h5 class="text-center"><?php the_title() ?></h5>
                        <div class="text-center"><?php echo $get_product->get_price(); ?></div>                    
                </a>
            </li>
    
        <?php
        $count += 1;
        if ($count == 4) {
            echo '</ul>';
            $count = 0;
        }
        endwhile;

        if ($count<4 && $count>0) {
            echo '</ul>';
        }
        ?>   
        
        
        <nav class="nav-pagination mt-3">
            <ul class="ul-pagination d-flex">
                <li class="li-pagination"><?php previous_posts_link( '&laquo; ANTERIOR', $loop->max_num_pages) ?></li> 
                <li class="li-pagination"><?php next_posts_link( 'SIGUIENTE &raquo;', $loop->max_num_pages) ?></li>
            </ul>
        </nav>

        <?php
    
        wp_reset_postdata();
    
    endif;
    echo '</div>';

    
    echo '<div id="bajo-alto" class="bajo-alto d-none">';
    $count = 0;
    $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;

    $args =  array(
        'post_type' => 'product',         
        'orderby' => 'meta_value_num',
        'meta_key' => '_price', 
        'order' => 'ASC',
        'posts_per_page' => 12, 
        'paged' => $paged
    );

    $loop = new WP_Query($args);

    if ( $loop->have_posts() ) :

        ?>
        
        <?php

        while ( $loop->have_posts() ) : $loop->the_post();
            $get_product = wc_get_product($loop->post->ID); 
            if($count == 0){
                echo '<ul class="listado-shop d-flex">';
            }
            ?>
            <li class="producto-shop content-product-shop">
                <a href="<?php echo the_permalink() ?>" class="enlace-producto-shop">
                        <div><?php echo get_the_post_thumbnail($loop->post->ID, 'post-thumbnail', array('class' => 'attachment-woocommerce_thumbnail size-woocommerce_thumbnail')) ?></div>
                        <h5 class="text-center"><?php the_title() ?></h5>
                        <div class="text-center"><?php echo $get_product->get_price(); ?></div>                    
                </a>
            </li>
    
        <?php
        $count += 1;
        if ($count == 4) {
            echo '</ul>';
            $count = 0;
        }
        endwhile;

        if ($count<4 && $count>0) {
            echo '</ul>';
        }
        ?>   
        
        
        <nav class="nav-pagination mt-3">
            <ul class="ul-pagination d-flex">
                <li class="li-pagination"><?php previous_posts_link( '&laquo; ANTERIOR', $loop->max_num_pages) ?></li> 
                <li class="li-pagination"><?php next_posts_link( 'SIGUIENTE &raquo;', $loop->max_num_pages) ?></li>
            </ul>
        </nav>

        <?php
    
        wp_reset_postdata();
    
    endif;
    echo '</div>';

    
    echo '<div id="alto-bajo" class="alto-bajo d-none">';
    $count = 0;
    $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;

    $args =  array(
        'post_type' => 'product',         
        'orderby' => 'meta_value_num',
        'meta_key' => '_price', 
        'order' => 'DESC',
        'posts_per_page' => 12, 
        'paged' => $paged
    );

    $loop = new WP_Query($args);

    if ( $loop->have_posts() ) :

        ?>
        
        <?php

        while ( $loop->have_posts() ) : $loop->the_post();
            $get_product = wc_get_product($loop->post->ID); 
            if($count == 0){
                echo '<ul class="listado-shop d-flex">';
            }
            ?>
            <li class="producto-shop content-product-shop">
                <a href="<?php echo the_permalink() ?>" class="enlace-producto-shop">
                        <div><?php echo get_the_post_thumbnail($loop->post->ID, 'post-thumbnail', array('class' => 'attachment-woocommerce_thumbnail size-woocommerce_thumbnail')) ?></div>
                        <h5 class="text-center"><?php the_title() ?></h5>
                        <div class="text-center"><?php echo $get_product->get_price(); ?></div>                    
                </a>
            </li>
    
        <?php
        $count += 1;
        if ($count == 4) {
            echo '</ul>';
            $count = 0;
        }
        endwhile;

        if ($count<4 && $count>0) {
            echo '</ul>';
        }
        ?>   
        
        
        <nav class="nav-pagination mt-3">
            <ul class="ul-pagination d-flex">
                <li class="li-pagination"><?php previous_posts_link( '&laquo; ANTERIOR', $loop->max_num_pages) ?></li> 
                <li class="li-pagination"><?php next_posts_link( 'SIGUIENTE &raquo;', $loop->max_num_pages) ?></li>
            </ul>
        </nav>

        <?php
    
        wp_reset_postdata();
    
    endif;
    echo '</div>';
}
add_shortcode( 'list-shop', 'list_all_products' );


// Input to select shop
function input_filter_shop() {?>

    <input type="hidden" name="filtro-activo" id="filtro-activo" value="por-defecto">
    <select name="options-posts" id="options-posts" onchange="cabioFiltro(this.value)">
        <option value="por-defecto">Orden por defecto</option>
        <option value="por-nombre">Ordenar por nombre</option>
        <option value="bajo-alto">Ordenar por precio: bajo a alto</option>
        <option value="alto-bajo">Ordenar por precio: alto a bajo</option>
    </select>
    <?php
}
add_shortcode( 'input-filter-shop', 'input_filter_shop' );




// Blog page
function list_posts() {
    global $paged;

    $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
    $args = array(
        'post_type' => 'post', 
        'category_name' => 'categoria-1, categoria-2,  categoria-3, sin-categoria',
        'posts_per_page' => 3, 
        'paged' => $paged
    );

    $loop = new WP_Query($args);
    if ($loop->have_posts()) :
        while ($loop->have_posts() ) : $loop->the_post();
        $id_excerpt = 'post-excerpt-' . $loop->post->ID;
        $id_content = 'post-content-' . $loop->post->ID; 
        ?>

        <div class="caja-post">            
            <h3 class="post-titulo"><?php the_title() ?></h3>
            <div class="d-flex">
            <div id="<?php echo $id_excerpt ?>" class="post-excerpt"><?php the_excerpt() ?><span class="span-continuar-leyendo-post" onclick="verContenidoPost('<?php echo $id_content ?>', '<?php echo $id_excerpt ?>')"> Continuar leyendo</span></div> 
            </div>
            <div id="<?php echo $id_content ?>" class="post-content d-none">
            <div class="post-img"><?php echo get_the_post_thumbnail($loop->post->ID, array(450, 350)) ?></div>
            <?php the_content() ?><span class="ocultar-contenido-post" onclick="ocultarContenidoPost('<?php echo $id_content ?>', '<?php echo $id_excerpt ?>')">Ocultar contenido</span></div>
        </div>

        <?php 
        endwhile; ?>
        
        <nav class="nav-pagination mt-3">
            <ul class="ul-pagination d-flex">
                <li class="li-pagination"><?php previous_posts_link( '&laquo; ANTERIOR', $loop->max_num_pages) ?></li> 
                <li class="li-pagination"><?php next_posts_link( 'SIGUIENTE &raquo;', $loop->max_num_pages) ?></li>
            </ul>
        </nav>

    <?php wp_reset_postdata(); ?>
    <?php
    endif;
}
add_shortcode( 'list-post', 'list_posts' );


// Input to select post
function input_select_post() {
    $args = array(
        'post_type' => 'post',
        'category_name' => 'categoria-1, categoria-2,  categoria-3, sin-categoria',
    );

    $loop = new WP_Query($args);

    if ( $loop->have_posts() ) : ?>

        <select name="options-posts" id="options-posts" onchange="location = this.value">
        <option value="">Selecciona una publicación</option>
        <?php
        while ( $loop->have_posts() ) : $loop->the_post();
        $permalink =  get_the_permalink();
        ?>
        

        <option value="<?php echo get_the_permalink() ?>"><?php the_title(); ?></option>

        <?php
        endwhile;?>
        </select> <?php
        wp_reset_postdata();
    endif;
}
add_shortcode( 'input-select-post', 'input_select_post' );




// List Faqs
function list_faqs() {
    global $paged;

    $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
    $args = array(
        'post_type' => 'post', 
        'category_name' => 'faq', 
        'posts_per_page' => 4, 
        'paged' => $paged
    );

    $loop = new WP_Query($args);

    if ($loop->have_posts()) :
        while ($loop->have_posts() ) : $loop->the_post();
        ?>

        <div class="caja-post">            
            <h3 class="post-titulo"><?php the_title() ?></h3>
            <div class="post-content"><?php the_content() ?></div>
        </div>

        <?php 
        endwhile; ?>
        
        <nav class="nav-pagination mt-3">
            <ul class="ul-pagination d-flex">
                <li class="li-pagination"><?php previous_posts_link( '&laquo; ANTERIOR', $loop->max_num_pages) ?></li> 
                <li class="li-pagination"><?php next_posts_link( 'SIGUIENTE &raquo;', $loop->max_num_pages) ?></li>
            </ul>
        </nav>

    <?php wp_reset_postdata(); ?>
    <?php
    endif;
}
add_shortcode( 'list-faqs', 'list_faqs' );


// Input to select faq
function input_select_faqs() {
    $args = array(
        'post_type' => 'post',
        'category_name' => 'faq',
    );

    $loop = new WP_Query($args);

    if ( $loop->have_posts() ) : ?>

        <select name="options-posts" id="options-posts" onchange="location = this.value">
        <option value="">Todas las faqs aquí ...</option>
        <?php
        while ( $loop->have_posts() ) : $loop->the_post();
        $permalink =  get_the_permalink();
        ?>
        

        <option value="<?php echo get_the_permalink() ?>"><?php the_title(); ?></option>

        <?php
        endwhile;?>
        </select> <?php
        wp_reset_postdata();
    endif;
}
add_shortcode( 'input-select-faqs', 'input_select_faqs' );




/*********************************************************               WIDGETS               ****************************************************/
// New zone for widgets at footer
function newsletter_costura() {
    register_sidebar( 
        array(
            'name' => __( 'Widget top footer', 'bubble' ), 
            'id' => 'id-newsletter_costura', 
            'before_widget' => '<div class="bubble-container">', 
            'after_widget' => '</div>',
        )
    );
}
add_action( 'widgets_init', 'newsletter_costura' );


// New zone for widgets at header
function extension_above_menu_header() {
    register_sidebar(
        array(
            'name' => __( 'Extension menu header', 'bubble' ), 
            'id' => 'id-extension-menu-header', 
            'before_widget' => '<div class="bubble-container">', 
            'after_widget' => '</div>',
        )
    );
}
add_action( 'widgets_init', 'extension_above_menu_header' );


