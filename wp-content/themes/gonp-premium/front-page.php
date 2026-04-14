<?php
/**
 * Front page template for GoNP Premium Homepage.
 *
 * Section order:
 * 1) Hero video
 * 2) Quick clarity band
 * 3) Featured trips horizontal carousel
 * 4) Belonging section
 * 5) Trust signals section
 * 6) Mission / editorial storytelling section
 * 7) Pathways section
 * 8) Community portraits / member stories section
 * 9) Stay connected section
 * 10) Footer
 */

if (! defined('ABSPATH')) {
    exit;
}

get_header();

$hero = gonp_field('hero', []);
$clarity = gonp_field('clarity_band', []);
$featured = gonp_field('featured_trips', []);
$belonging = gonp_field('belonging_section', []);
$trust = gonp_field('trust_section', []);
$mission = gonp_field('mission_section', []);
$pathways = gonp_field('pathways_section', []);
$portraits = gonp_field('portraits_section', []);
$stay = gonp_field('stay_connected', []);
$footer = gonp_field('footer_section', []);

$default_nav = [
    ['label' => 'Trips', 'url' => '#featured-trips'],
    ['label' => 'Chapters', 'url' => '#pathways'],
    ['label' => 'Stories', 'url' => '#portraits'],
    ['label' => 'Scholarships', 'url' => '#trust'],
    ['label' => 'About', 'url' => '#mission'],
    ['label' => 'Lead a Trip', 'url' => '#pathways'],
    ['label' => 'Log In', 'url' => '#'],
];
$nav_items = $hero['nav_items'] ?? $default_nav;

$default_trips = [
    ['title' => 'Yosemite Weekend Retreat', 'location' => 'Yosemite, CA', 'date' => 'June 20-23', 'description' => 'Beginner-friendly hiking with campfire connection circles.', 'tags' => 'Beginner-Friendly, Small Group', 'price' => '$649', 'cta_label' => 'View Trip', 'cta_url' => '#'],
    ['title' => 'Olympic Coast Reset', 'location' => 'Olympic Peninsula, WA', 'date' => 'July 11-14', 'description' => 'Tidepools, forest trails, and meaningful group downtime.', 'tags' => 'Community-Led, Flagship', 'price' => '$719', 'cta_label' => 'View Trip', 'cta_url' => '#'],
    ['title' => 'Zion Sunrise Camp', 'location' => 'Zion, UT', 'date' => 'August 2-5', 'description' => 'Gentle pace adventure with shared meals and guided moments.', 'tags' => 'Small Group, Scenic', 'price' => '$689', 'cta_label' => 'View Trip', 'cta_url' => '#'],
];
$trip_cards = $featured['trip_cards'] ?? $default_trips;

$default_stats = [
    ['value' => '1,000+', 'label' => 'participants brought together'],
    ['value' => '50+', 'label' => 'trips and gatherings hosted'],
    ['value' => '68%', 'label' => 'first-time participants'],
    ['value' => '$35k+', 'label' => 'scholarship support awarded'],
];
$stats = $trust['stats'] ?? $default_stats;

$default_testimonials = [
    ['quote' => 'I came alone and left with people I now consider family.', 'name' => 'Alex'],
    ['quote' => 'It’s the first time I felt fully myself in a group like this.', 'name' => 'Jordan'],
    ['quote' => 'This isn’t just a trip. It’s something deeper.', 'name' => 'Riley'],
];
$testimonials = $trust['testimonials'] ?? $default_testimonials;

$default_pathways = [
    ['title' => 'Explore Trips', 'text' => 'Find experiences designed for connection, adventure, and belonging.', 'cta_label' => 'Explore Trips', 'cta_url' => '#featured-trips'],
    ['title' => 'Lead a Trip', 'text' => 'Share what you love. Build community. Earn income doing it.', 'cta_label' => 'Lead a Trip', 'cta_url' => '#'],
    ['title' => 'Join Community', 'text' => 'Connect locally, meet people, and go beyond the trip.', 'cta_label' => 'Join Community', 'cta_url' => '#'],
];
$pathway_cards = $pathways['cards'] ?? $default_pathways;

$default_portraits = [
    ['name' => 'Sam', 'descriptor' => 'First-time backpacker', 'quote' => 'I finally found outdoor spaces that feel like home.', 'link' => '#'],
    ['name' => 'Taylor', 'descriptor' => 'Trip host', 'quote' => 'Leading here feels meaningful and sustainable.', 'link' => '#'],
    ['name' => 'Morgan', 'descriptor' => 'Scholarship recipient', 'quote' => 'This community made my first trip possible.', 'link' => '#'],
];
$portrait_cards = $portraits['cards'] ?? $default_portraits;
?>

<main class="gonp-home">
  <!-- 1) Hero Video + Sticky Navigation -->
  <?php if (($hero['show'] ?? true)) : ?>
  <section class="gonp-hero" id="top">
    <header class="gonp-nav" data-nav>
      <div class="gonp-nav__inner">
        <a class="gonp-brand" href="<?php echo esc_url(home_url('/')); ?>">
          <?php echo esc_html($hero['brand'] ?? 'Gays of National Parks'); ?>
        </a>
        <button class="gonp-menu-toggle" data-menu-toggle aria-expanded="false" aria-controls="gonp-menu">
          <span class="screen-reader-text">Toggle navigation</span>
          <span></span><span></span><span></span>
        </button>
        <nav id="gonp-menu" class="gonp-menu" aria-label="Primary">
          <?php foreach ($nav_items as $item) : ?>
            <a href="<?php echo esc_url($item['url'] ?? '#'); ?>"><?php echo esc_html($item['label'] ?? ''); ?></a>
          <?php endforeach; ?>
          <a href="<?php echo esc_url($hero['primary_cta_url'] ?? '#featured-trips'); ?>" class="gonp-btn gonp-btn--nav"><?php echo esc_html($hero['primary_cta_label'] ?? 'Explore Trips'); ?></a>
        </nav>
      </div>
    </header>

    <div class="gonp-hero__media" aria-hidden="true">
      <?php if (! empty($hero['video_mp4']['url'])) : ?>
        <video autoplay muted playsinline loop poster="<?php echo esc_url($hero['poster_image']['url'] ?? ''); ?>">
          <source src="<?php echo esc_url($hero['video_mp4']['url']); ?>" type="video/mp4" />
        </video>
      <?php else : ?>
        <div class="gonp-hero__fallback" style="background-image:url('<?php echo esc_url($hero['poster_image']['url'] ?? ''); ?>')"></div>
      <?php endif; ?>
      <div class="gonp-hero__overlay"></div>
    </div>

    <div class="gonp-hero__content gonp-reveal">
      <p class="gonp-eyebrow"><?php echo esc_html($hero['eyebrow'] ?? 'Gays of National Parks'); ?></p>
      <h1><?php echo esc_html($hero['headline'] ?? 'Find your people in the outdoors.'); ?></h1>
      <p class="gonp-subhead"><?php echo esc_html($hero['subheadline'] ?? 'Small-group LGBTQ experiences designed for connection, belonging, and real-life adventure.'); ?></p>
      <div class="gonp-actions">
        <a href="<?php echo esc_url($hero['primary_cta_url'] ?? '#featured-trips'); ?>" class="gonp-btn gonp-btn--primary"><?php echo esc_html($hero['primary_cta_label'] ?? 'Explore Trips'); ?></a>
        <a href="<?php echo esc_url($hero['secondary_cta_url'] ?? '#'); ?>" class="gonp-btn gonp-btn--ghost"><?php echo esc_html($hero['secondary_cta_label'] ?? 'Lead a Trip'); ?></a>
      </div>
      <a class="gonp-inline-link" href="<?php echo esc_url($hero['tertiary_cta_url'] ?? '#'); ?>"><?php echo esc_html($hero['tertiary_cta_label'] ?? 'Join Community'); ?></a>
    </div>
  </section>
  <?php endif; ?>

  <!-- 2) Quick Clarity Band -->
  <?php if (($clarity['show'] ?? true)) : ?>
  <section class="gonp-clarity gonp-reveal">
    <div class="gonp-wrap gonp-center">
      <h2><?php echo esc_html($clarity['headline'] ?? 'LGBTQ outdoor experiences built for real connection.'); ?></h2>
      <p><?php echo esc_html($clarity['text'] ?? 'Join curated trips, meet people who get you, and experience the outdoors in a way that finally feels like home.'); ?></p>
      <div class="gonp-actions gonp-actions--center">
        <a class="gonp-btn gonp-btn--primary" href="<?php echo esc_url($clarity['primary_cta_url'] ?? '#featured-trips'); ?>"><?php echo esc_html($clarity['primary_cta_label'] ?? 'Explore Trips'); ?></a>
        <a class="gonp-btn gonp-btn--ghost-dark" href="<?php echo esc_url($clarity['secondary_cta_url'] ?? '#'); ?>"><?php echo esc_html($clarity['secondary_cta_label'] ?? 'Lead a Trip'); ?></a>
      </div>
    </div>
  </section>
  <?php endif; ?>

  <!-- 3) Featured Trips Horizontal Carousel -->
  <?php if (($featured['show'] ?? true)) : ?>
  <section class="gonp-featured gonp-reveal" id="featured-trips">
    <div class="gonp-wrap">
      <p class="gonp-eyebrow"><?php echo esc_html($featured['eyebrow'] ?? 'Featured Experiences'); ?></p>
      <h2><?php echo esc_html($featured['headline'] ?? 'Start with a trip that feels right for you.'); ?></h2>
      <p class="gonp-subtle"><?php echo esc_html($featured['text'] ?? 'Small-group experiences built for adventure, ease, and belonging.'); ?></p>

      <div class="gonp-carousel-controls">
        <button class="gonp-icon-btn" type="button" data-carousel-prev aria-label="Previous trips">←</button>
        <button class="gonp-icon-btn" type="button" data-carousel-next aria-label="Next trips">→</button>
      </div>

      <div class="gonp-carousel" data-carousel>
        <?php foreach ($trip_cards as $trip) : ?>
          <article class="gonp-trip-card">
            <div class="gonp-trip-card__media" style="background-image:url('<?php echo esc_url($trip['image']['url'] ?? ''); ?>')"></div>
            <div class="gonp-trip-card__body">
              <h3><?php echo esc_html($trip['title'] ?? 'Trip Title'); ?></h3>
              <p class="gonp-meta"><?php echo esc_html(($trip['location'] ?? '') . ' · ' . ($trip['date'] ?? '')); ?></p>
              <p><?php echo esc_html($trip['description'] ?? 'Trip descriptor'); ?></p>
              <p class="gonp-tags"><?php echo esc_html($trip['tags'] ?? 'Small Group'); ?></p>
              <?php if (! empty($trip['price'])) : ?><p class="gonp-price"><?php echo esc_html($trip['price']); ?></p><?php endif; ?>
              <a class="gonp-btn gonp-btn--trip" href="<?php echo esc_url($trip['cta_url'] ?? '#'); ?>"><?php echo esc_html($trip['cta_label'] ?? 'View Trip'); ?></a>
            </div>
          </article>
        <?php endforeach; ?>
      </div>
      <a class="gonp-section-cta" href="<?php echo esc_url($featured['all_trips_url'] ?? '#'); ?>">Explore all trips →</a>
    </div>
  </section>
  <?php endif; ?>

  <!-- 4) Belonging Section -->
  <?php if (($belonging['show'] ?? true)) : ?>
  <section class="gonp-belonging gonp-reveal">
    <div class="gonp-wrap gonp-split">
      <div>
        <h2><?php echo esc_html($belonging['headline'] ?? 'The outdoors feels different when you don’t have to explain yourself.'); ?></h2>
        <p><?php echo wp_kses_post(nl2br($belonging['body'] ?? "For a long time, connection has lived in a few familiar places — bars, apps, quick conversations that never quite turn into something real.\n\nBut something shifts when you’re walking a trail together.\nOr sitting around a fire.\nOr waking up somewhere beautiful with people who were strangers just days ago.\n\nThis isn’t about being outdoorsy enough.\nIt’s about being human — and finding people who meet you there.")); ?></p>
        <a class="gonp-btn gonp-btn--primary" href="<?php echo esc_url($belonging['cta_url'] ?? '#'); ?>"><?php echo esc_html($belonging['cta_label'] ?? 'Learn more about who this is for'); ?></a>
      </div>
      <div class="gonp-belonging__media" style="background-image:url('<?php echo esc_url($belonging['image']['url'] ?? ''); ?>')"></div>
    </div>
  </section>
  <?php endif; ?>

  <!-- 5) Trust Signals -->
  <?php if (($trust['show'] ?? true)) : ?>
  <section class="gonp-trust gonp-reveal" id="trust">
    <div class="gonp-wrap">
      <h2><?php echo esc_html($trust['headline'] ?? 'Why people trust GoNP'); ?></h2>
      <div class="gonp-stats">
        <?php foreach ($stats as $stat) : ?>
          <article>
            <p class="gonp-stat-value"><?php echo esc_html($stat['value'] ?? ''); ?></p>
            <p><?php echo esc_html($stat['label'] ?? ''); ?></p>
          </article>
        <?php endforeach; ?>
      </div>

      <div class="gonp-logos">
        <?php if (! empty($trust['logos'])) : foreach ($trust['logos'] as $logo) : ?>
          <img src="<?php echo esc_url($logo['image']['url'] ?? ''); ?>" alt="<?php echo esc_attr($logo['name'] ?? 'Partner logo'); ?>" />
        <?php endforeach; endif; ?>
      </div>

      <div class="gonp-testimonials">
        <?php foreach ($testimonials as $quote) : ?>
          <blockquote>
            <p>“<?php echo esc_html($quote['quote'] ?? ''); ?>”</p>
            <cite><?php echo esc_html($quote['name'] ?? ''); ?></cite>
          </blockquote>
        <?php endforeach; ?>
      </div>
    </div>
  </section>
  <?php endif; ?>

  <!-- 6) Mission / Editorial Storytelling -->
  <?php if (($mission['show'] ?? true)) : ?>
  <section class="gonp-mission gonp-reveal" id="mission">
    <div class="gonp-wrap">
      <p class="gonp-eyebrow"><?php echo esc_html($mission['eyebrow'] ?? 'Why we’re building this'); ?></p>
      <h2><?php echo esc_html($mission['headline'] ?? 'Because connection shouldn’t feel this hard.'); ?></h2>
      <p class="gonp-mission__body"><?php echo wp_kses_post(nl2br($mission['body'] ?? "Many of us know what it’s like to feel surrounded, but not truly seen.\n\nTo scroll endlessly.\nTo meet people, but not connect.\nTo feel like something is missing — even when everything looks fine on the surface.\n\nGays of National Parks started as a simple idea: What if connection felt easier in real life?\n\nToday, that idea lives in shared trails, late-night conversations, inside jokes, and quiet moments in places that remind you who you are.")); ?></p>
      <div class="gonp-mini-cards">
        <?php foreach (($mission['cards'] ?? []) as $card) : ?>
          <article><h3><?php echo esc_html($card['title'] ?? ''); ?></h3><p><?php echo esc_html($card['text'] ?? ''); ?></p></article>
        <?php endforeach; ?>
      </div>
    </div>
  </section>
  <?php endif; ?>

  <!-- 7) Pathways -->
  <?php if (($pathways['show'] ?? true)) : ?>
  <section class="gonp-pathways gonp-reveal" id="pathways">
    <div class="gonp-wrap">
      <h2><?php echo esc_html($pathways['headline'] ?? 'Choose how you want to be part of this.'); ?></h2>
      <p><?php echo esc_html($pathways['text'] ?? 'Whether you want to join a trip, lead one, or connect more locally, there’s a way in.'); ?></p>
      <div class="gonp-pathway-grid">
        <?php foreach ($pathway_cards as $card) : ?>
          <article>
            <?php if (! empty($card['image']['url'])) : ?><img src="<?php echo esc_url($card['image']['url']); ?>" alt="" /><?php endif; ?>
            <h3><?php echo esc_html($card['title'] ?? ''); ?></h3>
            <p><?php echo esc_html($card['text'] ?? ''); ?></p>
            <a class="gonp-btn gonp-btn--trip" href="<?php echo esc_url($card['cta_url'] ?? '#'); ?>"><?php echo esc_html($card['cta_label'] ?? 'Learn more'); ?></a>
          </article>
        <?php endforeach; ?>
      </div>
    </div>
  </section>
  <?php endif; ?>

  <!-- 8) Community Portraits / Member Stories -->
  <?php if (($portraits['show'] ?? true)) : ?>
  <section class="gonp-portraits gonp-reveal" id="portraits">
    <div class="gonp-wrap">
      <h2><?php echo esc_html($portraits['headline'] ?? 'Meet the people who make this real.'); ?></h2>
      <p><?php echo esc_html($portraits['text'] ?? 'Artists. Teachers. First-time campers. Lifelong hikers. People who came looking for something — and found more than they expected.'); ?></p>
      <div class="gonp-portrait-grid">
        <?php foreach ($portrait_cards as $card) : ?>
          <article>
            <div class="gonp-portrait" style="background-image:url('<?php echo esc_url($card['photo']['url'] ?? ''); ?>')"></div>
            <h3><?php echo esc_html($card['name'] ?? ''); ?></h3>
            <p class="gonp-meta"><?php echo esc_html($card['descriptor'] ?? ''); ?></p>
            <p><?php echo esc_html($card['quote'] ?? ''); ?></p>
            <?php if (! empty($card['link'])) : ?><a href="<?php echo esc_url($card['link']); ?>" class="gonp-inline-link">Read story</a><?php endif; ?>
          </article>
        <?php endforeach; ?>
      </div>
    </div>
  </section>
  <?php endif; ?>

  <!-- 9) Stay Connected -->
  <?php if (($stay['show'] ?? true)) : ?>
  <section class="gonp-stay gonp-reveal" id="stay-connected">
    <div class="gonp-wrap gonp-center">
      <h2><?php echo esc_html($stay['headline'] ?? 'Stay close to what’s next.'); ?></h2>
      <p><?php echo esc_html($stay['text'] ?? 'Be the first to hear about new trips, stories, scholarships, and community gatherings.'); ?></p>
      <form class="gonp-form" action="<?php echo esc_url($stay['form_action'] ?? '#'); ?>" method="post">
        <label for="gonp-first-name" class="screen-reader-text">First Name</label>
        <input id="gonp-first-name" name="first_name" type="text" placeholder="First name (optional)" />
        <label for="gonp-email" class="screen-reader-text">Email</label>
        <input id="gonp-email" name="email" type="email" placeholder="Email address" required />
        <button type="submit" class="gonp-btn gonp-btn--primary"><?php echo esc_html($stay['button_label'] ?? 'Join the Community'); ?></button>
      </form>
      <div class="gonp-secondary-links">
        <a href="<?php echo esc_url($stay['instagram_url'] ?? '#'); ?>">Follow on Instagram</a>
        <a href="<?php echo esc_url($stay['stories_url'] ?? '#'); ?>">Read Stories</a>
      </div>
    </div>
  </section>
  <?php endif; ?>
</main>

<!-- 10) Footer -->
<footer class="gonp-footer">
  <div class="gonp-wrap gonp-footer__grid">
    <div>
      <p class="gonp-brand"><?php echo esc_html($footer['brand'] ?? 'Gays of National Parks'); ?></p>
      <p><?php echo esc_html($footer['tagline'] ?? 'Queer belonging, built in real life.'); ?></p>
    </div>
    <div>
      <h4>Explore</h4>
      <a href="#featured-trips">Trips</a><a href="#pathways">Chapters</a><a href="#portraits">Stories</a><a href="#trust">Scholarships</a>
    </div>
    <div>
      <h4>About</h4>
      <a href="#mission">About</a><a href="#">Lead a Trip</a><a href="#">Partners</a><a href="#">Contact</a>
    </div>
    <div>
      <h4>Legal</h4>
      <a href="#">Privacy</a><a href="#">Terms</a><a href="#">Waiver</a>
    </div>
  </div>
</footer>

<?php get_footer();
