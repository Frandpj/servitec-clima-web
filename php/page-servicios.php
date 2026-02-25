<?php
    /**
 * Template Name: Página de Servicios Custom
 */

get_header(); ?>

<main id="primary" class="site-main">

    <header class="servicios-header" style="max-width: 1200px; margin: 40px auto; padding: 0 20px; text-align: center;">
        <h1 style="color: var(--azul-servitec); font-size: 2.5rem; margin-bottom: 20px;">Nuestros Servicios Profesionales</h1>
        <p style="font-size: 1.2rem; color: #555; max-width: 800px; margin: 0 auto;">
            En <strong>Servitec Clima & Solar</strong> diseñamos soluciones de confort eficientes.
            Desde instalaciones solares hasta climatización avanzada, garantizamos el máximo rendimiento y ahorro energético.
        </p>
    </header>

    <div class="contenedor-servicios">

        <?php
            $args = [
                'post_type'      => 'servicios',
                'posts_per_page' => -1,
                'status'         => 'publish',
            ];

            $query = new WP_Query($args);

            if ($query->have_posts()):
                while ($query->have_posts()): $query->the_post();

                    $foto_id     = get_field('foto_servicio');
                    $foto_url    = wp_get_attachment_image_url($foto_id, 'large');
                    $descripcion = get_field('descripcion_corta');
        ?>

                <article class="card-servicio">
                    <?php if ($foto_url): ?>
                        <div class="card-img-wrapper">
                            <img src="<?php echo esc_url($foto_url); ?>" alt="<?php the_title(); ?>">
                        </div>
                    <?php endif; ?>

                    <div class="card-content">
                        <h2><?php the_title(); ?></h2>
                        <p><?php echo esc_html($descripcion); ?></p>
                        <a href="https://wa.me/34XXXXXXXXX" class="link-consulta">Consultar ahora →</a>
                    </div>
                </article>

            <?php
                    endwhile;
                wp_reset_postdata();
                else:
                    echo '<p>No hay servicios publicados todavía.</p>';
                endif;
            ?>

    </div>

    <footer class="servicios-footer" style="text-align: center; padding: 60px 20px; background: #f9f9f9; margin-top: 40px;">
        <h2 style="color: var(--azul-servitec);">¿Necesitas un presupuesto personalizado?</h2>
        <p>Cuéntanos tu proyecto y te asesoraremos sin compromiso.</p>
        <a href="/contacto" class="wp-block-button__link" style="display: inline-block; margin-top: 20px;">Contactar ahora</a>
    </footer>

</main>

<?php get_footer(); ?>