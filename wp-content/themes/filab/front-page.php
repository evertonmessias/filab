<?php get_header(); ?>

<?php $categories = get_terms('category', array('order' => 'DESC')); ?>

<!-- ======= Hero Section ======= -->
<section id="hero" class="d-flex align-items-center">
  <div class="container" data-aos="zoom-out" data-aos-delay="100">
    <h1><span>FILAB</span> Controle de Contaminação</h1>
    <h2>Agência de consultoria em Campinas</h2>
    <div class="d-flex">
      <a href="#about" class="btn-get-started scrollto">Sobre Nós</a>
      <a href="https://youtu.be/ZhZ6ZW6cW4E" class="venobox btn-watch-video" data-vbtype="video" data-autoplay="true"> Assista ao Vídeo <i class="icofont-play-alt-2"></i></a>
    </div>
  </div>
</section><!-- End Hero -->


<main id="main">

  <!-- ======= Featured Services Section ======= -->
  <section id="featured-services" class="featured-services">
    <div class="container" data-aos="fade-up">

      <div class="row">
        <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
          <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
            <div class="icon"><i class="bx bxl-dribbble"></i></div>
            <h4 class="title"><a href="/#services">Certificação de conformidade em áreas limpas</a></h4>
            <!--<p class="description">Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi</p>-->
          </div>
        </div>

        <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
          <div class="icon-box" data-aos="fade-up" data-aos-delay="200">
            <div class="icon"><i class="bx bx-file"></i></div>
            <h4 class="title"><a href="/#services">Equipamentos de fluxo unidirecional</a></h4>
            <!--<p class="description">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore</p>-->
          </div>
        </div>

        <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
          <div class="icon-box" data-aos="fade-up" data-aos-delay="300">
            <div class="icon"><i class="bx bx-tachometer"></i></div>
            <h4 class="title"><a href="/#services">Cabines de segurança biológica</a></h4>
            <!--<p class="description">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia</p>-->
          </div>
        </div>

        <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
          <div class="icon-box" data-aos="fade-up" data-aos-delay="400">
            <div class="icon"><i class="bx bx-world"></i></div>
            <h4 class="title"><a href="/#services">Balanceamentos&emsp;&emsp;&emsp;</a></h4>
            <!--<p class="description">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis</p>-->
          </div>
        </div>

      </div>

    </div>
  </section><!-- End Featured Services Section -->

  <!-- ======= About Section ======= -->
  <section id="about" class="about section-bg">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h2>Sobre</h2>
      </div>

      <div class="row">
        <div class="col-lg-6" data-aos="zoom-out" data-aos-delay="100">
          <img src="<?php echo SITEPATH; ?>assets/img/about.jpg" class="img-fluid" alt="">
        </div>
        <div class="col-lg-6 pt-4 pt-lg-0 content d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="100">
          <?php
          $args = array(
            'post_type' => 'page'
          );
          $loop = new WP_Query($args);
          while ($loop->have_posts()) {
            $loop->the_post();
            if (get_the_title() == "Sobre") {
              echo "<p class='justify'>" . get_the_content() . "</p>";
            }
          }
          ?>
        </div>
      </div>

    </div>
  </section><!-- End About Section -->

  <!-- ======= Services Section ======= -->
  <section id="services" class="services">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h2>Testes Realizados</h2>
      </div>

      <div class="row">
        <?php
        $args = array(
          'post_type' => 'page'
        );
        $loop = new WP_Query($args);
        while ($loop->have_posts()) {
          $loop->the_post();
          if (get_the_title() != "Sobre") {
        ?>
            <div class="col-lg-6 col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="zoom-in" data-aos-delay="200">
              <div class="icon-box">
                <div class="icon"><i class="bx bx-file"></i></div>
                <h4><a href="<?php echo get_the_permalink(); ?>"><?php echo get_the_title(); ?></a></h4>
                <?php echo get_the_content(); ?>
              </div>
            </div>
        <?php }
        } ?>

      </div>

    </div>
  </section><!-- End Services Section -->

  <!-- ======= Portfolio Section ======= -->
  <section id="portfolio" class="portfolio section-bg">
    <div class="container" data-aos="fade-up">
      <div class="section-title">
        <h2>Portfolio</h2>        
      </div>
      <div class="row" data-aos="fade-up" data-aos-delay="100">
        <div class="col-lg-12 d-flex justify-content-center">

          <ul id="portfolio-flters">
            <li data-filter="*" class="filter-active">Tudo</li>
            <?php
            foreach (array_reverse($categories) as $category) {
              if ($category->slug != "clientes") {
            ?>
                <li data-filter=".filter-<?php echo $category->slug; ?>"><?php echo $category->name; ?></li>
            <?php
              }
            } ?>
          </ul>
        </div>
      </div>

      <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">

        <?php foreach ($categories as $category) {
          $args = array(
            'category_name' => $category->slug
          );
          $loop = new WP_Query($args);
          while ($loop->have_posts()) {
            $loop->the_post();
            if ($category->slug != "clientes") {
        ?>
              <div class="col-lg-4 col-md-6 portfolio-item filter-<?php echo $category->slug; ?>">
                <img src="<?php if (has_post_thumbnail()) the_post_thumbnail_url('full');
                          else echo SITEPATH . "assets/img/semimagem.png"; ?>" class="img-fluid" title="<?php the_title() ?>">
                <div class="portfolio-info">
                  <h4><?php the_title() ?></h4>
                  <a href="<?php if (has_post_thumbnail()) the_post_thumbnail_url('full');
                            else echo SITEPATH . "assets/img/semimagem.png"; ?>" data-gall="portfolioGallery" class="venobox preview-link" title="<?php the_title() ?>"><i class="bx bx-plus"></i></a>
                  <a href="<?php the_permalink() ?>" class="details-link" title="Link"><i class="bx bx-link"></i></a>
                </div>
              </div>
        <?php }
          }
        } ?>
      </div>
      <br>
    </div>
  </section><!-- End Portfolio Section -->

    <!-- ======= Clients Section ======= -->
    <section id="clients" class="services clients">
    <div class="container" data-aos="fade-up">
        <br>
      <div class="section-title">
        <h2>Clientes</h2>
      </div>

      <div class="row">
      <?php foreach ($categories as $category) {
          $args = array(
            'category_name' => $category->slug
          );
          $loop = new WP_Query($args);
          while ($loop->have_posts()) {
            $loop->the_post();
            if ($category->slug == "clientes") {
        ?>
            <div class="col-lg-4 col-md-4 d-flex align-items-stretch mt-4 mt-md-0" data-aos="zoom-in" data-aos-delay="200">
              <div class="icon-box">
                <div class="icon"><i class="bx bx-user"></i></div>
                <h4><a href="<?php echo get_the_permalink(); ?>"><?php echo get_the_title(); ?></a></h4>                
              </div>
            </div>
        <?php }}
        } ?>
      </div>
    </div>
    <br>
  </section><!-- End Clients Section -->

  <!-- ======= Contact Section ======= -->
  <section id="contact" class="contact section-bg">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h2>Contato</h2>        
      </div>

      <div class="row" data-aos="fade-up" data-aos-delay="100">
        <div class="col-lg-6">
          <div class="info-box mb-4">
            <i class="bx bx-map"></i>
            <h3>Endereço</h3>
            <p>Rua Olympio Pattáro, 653</p>
          </div>
        </div>

        <div class="col-lg-3 col-md-6">
          <div class="info-box  mb-4">
            <i class="bx bx-envelope"></i>
            <h3>E-mail</h3>
            <p>filabcc@terra.com.br</p>
          </div>
        </div>

        <div class="col-lg-3 col-md-6">
          <div class="info-box  mb-4">
            <i class="bx bx-phone-call"></i>
            <h3>Telefone</h3>
            <p>(19) 3249-1475</p>
          </div>
        </div>

      </div>

      <div class="row" data-aos="fade-up" data-aos-delay="100">

        <div class="col-lg-6 ">
          <iframe class="mb-4 mb-lg-0" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3677.978774054931!2d-47.08381708503612!3d-22.803250385064587!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94c8c13e6bdfaa55%3A0x99935e8bfd24e20a!2sR.%20Olympio%20Pattaro%2C%20653%20-%20Res.%20Bar%C3%A3o%20do%20Caf%C3%A9%2C%20Campinas%20-%20SP%2C%2013085-045!5e0!3m2!1spt-BR!2sbr!4v1636815239153!5m2!1spt-BR!2sbr" frameborder="0" style="border:0; width: 100%; height: 384px;" allowfullscreen></iframe>
        </div>

        <div class="col-lg-6">
          <?php echo do_shortcode('[wpforms id="5"]'); ?>
        </div>

      </div>

    </div>
  </section><!-- End Contact Section -->

</main><!-- End #main -->

<?php get_footer(); ?>