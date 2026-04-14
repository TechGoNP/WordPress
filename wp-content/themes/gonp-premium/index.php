<?php
/**
 * Required fallback template file for standalone themes.
 */

if (! defined('ABSPATH')) {
    exit;
}

get_header();
?>
<main class="gonp-wrap" style="padding:4rem 0;">
  <?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>
      <article>
        <h1><?php the_title(); ?></h1>
        <?php the_content(); ?>
      </article>
    <?php endwhile; ?>
  <?php else : ?>
    <article>
      <h1><?php esc_html_e('Welcome', 'gonp-premium'); ?></h1>
      <p><?php esc_html_e('Set a static front page to use the premium homepage template.', 'gonp-premium'); ?></p>
    </article>
  <?php endif; ?>
</main>
<?php
get_footer();
