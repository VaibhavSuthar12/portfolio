<?php
// =============================================
//  SITE CONFIGURATION — Edit these manually
// =============================================

$site = [
    'name'       => 'My Business',
    'tagline'    => 'Quality. Innovation. Results.',
    'email'      => 'hello@mybusiness.com',
    'phone'      => '+91 98765 43210',
    'address'    => 'Jaipur, Rajasthan, India',
    'copyright'  => '2024 My Business',
];

$nav = [
    ['label' => 'Home',     'href' => '#home'],
    ['label' => 'About',    'href' => '#about'],
    ['label' => 'Services', 'href' => '#services'],
    ['label' => 'Contact',  'href' => '#contact'],
];

$hero = [
    'heading'    => 'Welcome to My Business',
    'subheading' => 'We help you grow smarter, faster, and better.',
    'btn_text'   => 'Get Started',
    'btn_href'   => '#contact',
];

$about = [
    'heading' => 'About Us',
    'text'    => 'We are a passionate team dedicated to delivering exceptional results for our clients. With years of experience across various industries, we bring creativity and precision to every project.',
    'points'  => [
        '✓ 10+ years of experience',
        '✓ 200+ happy clients',
        '✓ Award-winning team',
        '✓ 24/7 support',
    ],
];

$services = [
    [
        'icon'  => '🎯',
        'title' => 'Strategy & Consulting',
        'desc'  => 'We help you define clear goals and build a roadmap to achieve them.',
    ],
    [
        'icon'  => '💻',
        'title' => 'Web Development',
        'desc'  => 'Custom websites and web apps built with modern, scalable technology.',
    ],
    [
        'icon'  => '📱',
        'title' => 'Mobile Apps',
        'desc'  => 'iOS and Android applications designed for real user needs.',
    ],
    [
        'icon'  => '📊',
        'title' => 'Digital Marketing',
        'desc'  => 'SEO, social media, and campaigns that drive measurable growth.',
    ],
    [
        'icon'  => '🎨',
        'title' => 'UI/UX Design',
        'desc'  => 'Beautiful, intuitive interfaces that users actually love.',
    ],
    [
        'icon'  => '☁️',
        'title' => 'Cloud Solutions',
        'desc'  => 'Reliable hosting, migrations, and cloud infrastructure management.',
    ],
];

$testimonials = [
    [
        'name'  => 'Riya Sharma',
        'role'  => 'CEO, StartupX',
        'quote' => 'Incredible team! They transformed our vision into a stunning product on time and on budget.',
    ],
    [
        'name'  => 'Anil Mehta',
        'role'  => 'Founder, GrowthLabs',
        'quote' => 'Their strategy consulting alone saved us months of wasted effort. Highly recommended.',
    ],
    [
        'name'  => 'Priya Kapoor',
        'role'  => 'Marketing Director, BrandCo',
        'quote' => 'The best digital agency we have worked with. Results speak for themselves.',
    ],
];

// Handle contact form submission
$msg = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name    = htmlspecialchars(trim($_POST['name']   ?? ''));
    $email   = htmlspecialchars(trim($_POST['email']  ?? ''));
    $message = htmlspecialchars(trim($_POST['message'] ?? ''));

    if ($name && $email && $message) {
        // Replace with mail() or a mailer library as needed
        // mail($site['email'], "New message from $name", $message, "From: $email");
        $msg = 'success';
    } else {
        $msg = 'error';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title><?= $site['name'] ?> — <?= $site['tagline'] ?></title>
<link rel="preconnect" href="https://fonts.googleapis.com" />
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700;900&family=DM+Sans:wght@300;400;500&display=swap" rel="stylesheet" />
<style>
  /* ── Reset & Variables ── */
  *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

  :root {
    --bg:       #0d0d0d;
    --surface:  #161616;
    --card:     #1e1e1e;
    --accent:   #d4a843;
    --accent2:  #e8c06a;
    --text:     #f0ece3;
    --muted:    #888;
    --border:   #2a2a2a;
    --radius:   12px;
    --ff-head:  'Playfair Display', Georgia, serif;
    --ff-body:  'DM Sans', sans-serif;
  }

  html { scroll-behavior: smooth; }
  body { background: var(--bg); color: var(--text); font-family: var(--ff-body); font-size: 16px; line-height: 1.7; }

  a { color: inherit; text-decoration: none; }
  img { display: block; max-width: 100%; }

  /* ── Utility ── */
  .container { max-width: 1100px; margin: 0 auto; padding: 0 24px; }
  .section    { padding: 96px 0; }
  .section-label { font-size: 0.72rem; letter-spacing: 0.22em; text-transform: uppercase; color: var(--accent); font-weight: 500; margin-bottom: 12px; }
  .section-title { font-family: var(--ff-head); font-size: clamp(2rem, 5vw, 3rem); font-weight: 900; line-height: 1.15; margin-bottom: 20px; }
  .divider { width: 48px; height: 3px; background: var(--accent); margin-bottom: 40px; }

  /* ── Navbar ── */
  nav {
    position: fixed; top: 0; left: 0; right: 0; z-index: 100;
    background: rgba(13,13,13,0.92); backdrop-filter: blur(12px);
    border-bottom: 1px solid var(--border);
    display: flex; align-items: center; justify-content: space-between;
    padding: 0 40px; height: 64px;
  }
  .nav-logo { font-family: var(--ff-head); font-size: 1.35rem; color: var(--accent); font-weight: 700; letter-spacing: 0.02em; }
  .nav-links { display: flex; gap: 32px; list-style: none; }
  .nav-links a { font-size: 0.875rem; font-weight: 500; letter-spacing: 0.04em; color: var(--muted); transition: color 0.2s; }
  .nav-links a:hover { color: var(--accent); }

  /* ── Hero ── */
  #home {
    min-height: 100vh; display: flex; align-items: center;
    background:
      radial-gradient(ellipse 70% 60% at 80% 50%, rgba(212,168,67,0.08) 0%, transparent 70%),
      linear-gradient(180deg, #0d0d0d 60%, #161616 100%);
    padding-top: 64px;
  }
  .hero-inner { max-width: 700px; }
  .hero-inner .section-label { margin-bottom: 16px; }
  .hero-h1 { font-family: var(--ff-head); font-size: clamp(2.8rem, 7vw, 5rem); font-weight: 900; line-height: 1.08; margin-bottom: 24px; }
  .hero-h1 span { color: var(--accent); }
  .hero-sub { font-size: 1.15rem; color: var(--muted); max-width: 520px; margin-bottom: 40px; font-weight: 300; }
  .btn {
    display: inline-block; padding: 14px 36px; border-radius: 4px;
    background: var(--accent); color: #0d0d0d; font-weight: 600; font-size: 0.9rem;
    letter-spacing: 0.06em; text-transform: uppercase; transition: background 0.2s, transform 0.15s;
  }
  .btn:hover { background: var(--accent2); transform: translateY(-2px); }
  .btn-outline {
    background: transparent; border: 1.5px solid var(--accent); color: var(--accent);
    margin-left: 16px;
  }
  .btn-outline:hover { background: rgba(212,168,67,0.1); transform: translateY(-2px); }

  /* ── About ── */
  #about { background: var(--surface); }
  .about-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 64px; align-items: center; }
  .about-points { list-style: none; margin-top: 28px; display: grid; grid-template-columns: 1fr 1fr; gap: 12px; }
  .about-points li { font-size: 0.9rem; color: var(--accent2); font-weight: 500; }
  .about-visual {
    aspect-ratio: 1; background: var(--card); border-radius: var(--radius);
    border: 1px solid var(--border); display: flex; flex-direction: column;
    align-items: center; justify-content: center; gap: 24px;
  }
  .stat { text-align: center; }
  .stat-num { font-family: var(--ff-head); font-size: 3rem; color: var(--accent); font-weight: 900; line-height: 1; }
  .stat-label { font-size: 0.8rem; color: var(--muted); text-transform: uppercase; letter-spacing: 0.1em; }
  .stat-row { display: flex; gap: 40px; }

  /* ── Services ── */
  #services { background: var(--bg); }
  .services-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 24px; margin-top: 8px; }
  .card {
    background: var(--card); border: 1px solid var(--border); border-radius: var(--radius);
    padding: 32px 28px; transition: border-color 0.2s, transform 0.2s;
  }
  .card:hover { border-color: var(--accent); transform: translateY(-4px); }
  .card-icon { font-size: 2.2rem; margin-bottom: 16px; }
  .card-title { font-family: var(--ff-head); font-size: 1.15rem; font-weight: 700; margin-bottom: 10px; }
  .card-desc { font-size: 0.9rem; color: var(--muted); line-height: 1.65; }

  /* ── Testimonials ── */
  #testimonials { background: var(--surface); }
  .testi-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 24px; margin-top: 8px; }
  .testi-card { background: var(--card); border: 1px solid var(--border); border-radius: var(--radius); padding: 32px 28px; }
  .testi-quote { font-size: 0.95rem; color: var(--text); line-height: 1.7; margin-bottom: 24px; font-style: italic; }
  .testi-quote::before { content: '\201C'; font-family: var(--ff-head); font-size: 2rem; color: var(--accent); line-height: 0; vertical-align: -0.5rem; margin-right: 4px; }
  .testi-name { font-weight: 600; font-size: 0.9rem; }
  .testi-role { font-size: 0.78rem; color: var(--muted); }

  /* ── Contact ── */
  #contact { background: var(--bg); }
  .contact-grid { display: grid; grid-template-columns: 1fr 1.4fr; gap: 64px; align-items: start; }
  .contact-info p { color: var(--muted); margin-bottom: 32px; font-size: 0.95rem; }
  .info-item { display: flex; align-items: flex-start; gap: 12px; margin-bottom: 20px; font-size: 0.9rem; }
  .info-item span:first-child { font-size: 1.1rem; margin-top: 2px; }
  .info-item a:hover { color: var(--accent); }

  .form-group { margin-bottom: 20px; }
  label { display: block; font-size: 0.78rem; letter-spacing: 0.1em; text-transform: uppercase; color: var(--muted); margin-bottom: 8px; }
  input, textarea {
    width: 100%; background: var(--card); border: 1px solid var(--border); border-radius: 6px;
    padding: 12px 16px; color: var(--text); font-family: var(--ff-body); font-size: 0.95rem;
    transition: border-color 0.2s;
  }
  input:focus, textarea:focus { outline: none; border-color: var(--accent); }
  textarea { resize: vertical; min-height: 140px; }
  .alert { padding: 12px 18px; border-radius: 6px; font-size: 0.875rem; margin-bottom: 20px; }
  .alert-success { background: rgba(80,200,100,0.1); border: 1px solid rgba(80,200,100,0.3); color: #6ddc8b; }
  .alert-error   { background: rgba(220,80,80,0.1);  border: 1px solid rgba(220,80,80,0.3);  color: #e87c7c; }

  /* ── Footer ── */
  footer {
    background: var(--surface); border-top: 1px solid var(--border);
    padding: 40px 0; text-align: center;
    font-size: 0.82rem; color: var(--muted);
  }
  footer a { color: var(--accent); }

  /* ── Responsive ── */
  @media (max-width: 768px) {
    nav { padding: 0 20px; }
    .nav-links { display: none; }
    .about-grid, .contact-grid { grid-template-columns: 1fr; }
    .services-grid, .testi-grid { grid-template-columns: 1fr; }
    .about-visual { display: none; }
    .btn-outline { display: none; }
  }
</style>
</head>
<body>

<!-- ── NAVBAR ── -->
<nav>
  <div class="nav-logo"><?= $site['name'] ?></div>
  <ul class="nav-links">
    <?php foreach ($nav as $item): ?>
      <li><a href="<?= $item['href'] ?>"><?= $item['label'] ?></a></li>
    <?php endforeach; ?>
  </ul>
</nav>

<!-- ── HERO ── -->
<section id="home">
  <div class="container">
    <div class="hero-inner">
      <div class="section-label"><?= $site['tagline'] ?></div>
      <h1 class="hero-h1"><?= nl2br(htmlspecialchars($hero['heading'])) ?></h1>
      <p class="hero-sub"><?= $hero['subheading'] ?></p>
      <a href="<?= $hero['btn_href'] ?>" class="btn"><?= $hero['btn_text'] ?></a>
      <a href="#about" class="btn btn-outline">Learn More</a>
    </div>
  </div>
</section>

<!-- ── ABOUT ── -->
<section id="about" class="section">
  <div class="container">
    <div class="about-grid">
      <div>
        <div class="section-label">Who We Are</div>
        <h2 class="section-title"><?= $about['heading'] ?></h2>
        <div class="divider"></div>
        <p style="color:var(--muted)"><?= $about['text'] ?></p>
        <ul class="about-points">
          <?php foreach ($about['points'] as $pt): ?>
            <li><?= $pt ?></li>
          <?php endforeach; ?>
        </ul>
      </div>
      <div class="about-visual">
        <div class="stat-row">
          <div class="stat"><div class="stat-num">10+</div><div class="stat-label">Years</div></div>
          <div class="stat"><div class="stat-num">200+</div><div class="stat-label">Clients</div></div>
        </div>
        <div class="stat-row">
          <div class="stat"><div class="stat-num">50+</div><div class="stat-label">Awards</div></div>
          <div class="stat"><div class="stat-num">99%</div><div class="stat-label">Satisfaction</div></div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ── SERVICES ── -->
<section id="services" class="section">
  <div class="container">
    <div class="section-label">What We Do</div>
    <h2 class="section-title">Our Services</h2>
    <div class="divider"></div>
    <div class="services-grid">
      <?php foreach ($services as $svc): ?>
        <div class="card">
          <div class="card-icon"><?= $svc['icon'] ?></div>
          <div class="card-title"><?= $svc['title'] ?></div>
          <p class="card-desc"><?= $svc['desc'] ?></p>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- ── TESTIMONIALS ── -->
<section id="testimonials" class="section">
  <div class="container">
    <div class="section-label">What Clients Say</div>
    <h2 class="section-title">Testimonials</h2>
    <div class="divider"></div>
    <div class="testi-grid">
      <?php foreach ($testimonials as $t): ?>
        <div class="testi-card">
          <p class="testi-quote"><?= $t['quote'] ?></p>
          <div class="testi-name"><?= $t['name'] ?></div>
          <div class="testi-role"><?= $t['role'] ?></div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- ── CONTACT ── -->
<section id="contact" class="section">
  <div class="container">
    <div class="contact-grid">
      <div class="contact-info">
        <div class="section-label">Get In Touch</div>
        <h2 class="section-title">Contact Us</h2>
        <div class="divider"></div>
        <p>Have a project in mind? We'd love to hear from you. Send us a message and we'll get back to you as soon as possible.</p>
        <div class="info-item"><span>📧</span><a href="mailto:<?= $site['email'] ?>"><?= $site['email'] ?></a></div>
        <div class="info-item"><span>📞</span><a href="tel:<?= $site['phone'] ?>"><?= $site['phone'] ?></a></div>
        <div class="info-item"><span>📍</span><span><?= $site['address'] ?></span></div>
      </div>
      <div>
        <?php if ($msg === 'success'): ?>
          <div class="alert alert-success">✓ Message sent! We'll be in touch soon.</div>
        <?php elseif ($msg === 'error'): ?>
          <div class="alert alert-error">⚠ Please fill in all fields.</div>
        <?php endif; ?>
        <form method="POST" action="#contact">
          <div class="form-group">
            <label for="name">Your Name</label>
            <input type="text" id="name" name="name" placeholder="Rahul Sharma" required />
          </div>
          <div class="form-group">
            <label for="email">Email Address</label>
            <input type="email" id="email" name="email" placeholder="rahul@example.com" required />
          </div>
          <div class="form-group">
            <label for="message">Message</label>
            <textarea id="message" name="message" placeholder="Tell us about your project..." required></textarea>
          </div>
          <button type="submit" class="btn">Send Message</button>
        </form>
      </div>
    </div>
  </div>
</section>

<!-- ── FOOTER ── -->
<footer>
  <div class="container">
    <p>&copy; <?= $site['copyright'] ?> &nbsp;·&nbsp; Built with PHP &nbsp;·&nbsp; <a href="#home">Back to top ↑</a></p>
  </div>
</footer>

</body>
</html>