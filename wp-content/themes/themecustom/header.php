<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1" />
  <title>Trang chủ</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="icon" type="image/png" href="<?php bloginfo('template_directory')?>/assets/images/favicon.png" />
  <link rel="stylesheet" href="<?php bloginfo('template_directory')?>/assets/css/reset.css" />
  <link rel="stylesheet" href="<?php bloginfo('template_directory')?>/assets/css/style.css" />
  <link rel="stylesheet" href="<?php bloginfo('template_directory')?>/assets/css/header.css">
  <link rel="stylesheet" href="<?php bloginfo('template_directory')?>/assets/css/itacademy.css">
  <link rel="stylesheet" href="<?php bloginfo('template_directory')?>/assets/css/smartsoft.css">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet' />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
</head>

<body>
  <!-- HEADER DESKTOP -->
  <header class="w-full bg-white z-[9999]" id="header">
    <nav class="mx-auto max-w-layout flex items-center max-md:justify-between px-5 py-3 md:p-0 static max-md:relative">
      <div id="logo" class="mr-12">
		<?php
		// Lấy giá trị logo từ cơ sở dữ liệu
		$custom_logo = get_option('custom_site_logo', '');

		// Hiển thị logo
		if (!empty($custom_logo)) {
			if (filter_var($custom_logo, FILTER_VALIDATE_URL)) { ?>
				<a href="<?php echo esc_url(home_url()); ?>" class="uppercase text-[32px] md:text-[40px] font-extrabold font-['Baloo']">
					<img src="<?php echo esc_url($custom_logo); ?>" class="logo" alt="<?php echo esc_attr(get_bloginfo('name')); ?>">
				</a>
			<?php } else { ?>
				<a href="<?php echo esc_url(home_url()); ?>" class="uppercase text-[32px] md:text-[40px] font-extrabold font-['Baloo']">
					<?php echo esc_html($custom_logo); ?>
				</a>
			<?php }
		} else { ?>
			<a href="<?php echo esc_url(home_url()); ?>" class="uppercase text-[32px] md:text-[40px] font-extrabold font-['Baloo']">
				Fourier
			</a>
		<?php } ?>
      </div>
      <!-- Start Menu Desktop-->
		<?php wp_nav_menu(array(
			'theme_location' => 'topmenu',
			'container' => 'false',
			'menu_id' => 'menu-desktop',
			'menu_class' => 'flex-1 text-primary leading-6 gap-2 hidden md:flex',
		)) ?>

      <!-- End Menu Desktop -->
      <!-- Start Menu Mobile -->
      <ul id="menu-mobile" class="absolute w-full top-full bg-white z-50 left-0 pb-6 pt-2 shadow-md md:hidden">
        <li class="item-menu-mb justify-between items-center px-5 py-3"><a href="#">Home</a></li>
        <li class="item-menu-mb drop-down-mb flex justify-between items-center px-5 py-3"><a href="#">Solutions</a> <i
            class='bx bx-chevron-down text-base'></i></li>
        <li class="item-menu-mb drop-down-content">
          <nav class="flex flex-col gap-6 px-8 py-6">
            <a href="#1" class="item-dropdown font-semibold">Technology consulting</a>
            <a href="#2" class="item-dropdown font-semibold">SmartSoft Solutions</a>
            <a href="#3" class="item-dropdown font-semibold">Outsource IT Service</a>
            <a href="#4" class="item-dropdown font-semibold">IT Academy</a>
            <a href="#5" class="item-dropdown font-semibold">Drone Show Solutions</a>
            <a href="#6"
              class="shrink-0 py-2 px-4 self-start max-md:text-sm text-primary font-bold rounded shadow-sm border-primary border">Go
              to overview</a>
          </nav>
        </li>
        <li class="item-menu-mb flex justify-between items-center px-5 py-3"><a href="#">Case study</a></li>
        <li class="item-menu-mb flex justify-between items-center px-5 py-3"><a href="#">Contact us</a></li>
      </ul>
      <!-- End Menu Mobile -->


      <!-- Start: Get in touch -->
      <div class="flex gap-4 md:gap-6">
        <button type="button" class="md:flex gap-2 py-2 px-4 rounded justify-center items-center hidden ">
          <i class='bx bx-world md:text-2xl'></i>
          <span>EN</span>
        </button>
        <button type="button"
          class="showModal py-2 px-4 bg-primary max-md:text-sm text-white font-bold rounded shadow-md hover:bg-secondary">Get
          in
          touch</button>
        <button type="button" id="toggleMenu" class="md:hidden"><i class='bx bx-menu text-2xl'></i></button>
      </div>
      <!-- End: Get in touch -->
    </nav>
	<!-- START:MEGA MENU -->
	<div class="mega-menu-content w-full flex absolute shadow hidden z-[9999]">
			<div class="bg-primary flex-1"></div>
			<div class="max-w-layout w-full flex shrink-0">
				<?php
				// Lấy tất cả các trang
				$exclude_pages = array(
					get_page_by_title('Contact us')->ID,
					get_page_by_title('Home')->ID,
					get_page_by_title('Case study')->ID,
				);

				$pages = get_pages(array(
					'exclude' => $exclude_pages,
					'sort_column' => 'post_title',
					'sort_order' => 'asc'
				));
				if ($pages) {
					foreach ($pages as $page) {
						if ($page->post_title == 'Solutions') { ?>
							<div class="max-w-[400px] w-[1265px] md:py-8 md:pr-8 text-sm leading-6 text-white flex flex-col items-start bg-primary">
								<h2 class="text-3xl font-bold leading-10"><?php echo esc_html($page->post_title); ?></h2>
								<p class="mt-6"><?php echo esc_html(get_post_meta($page->ID, '_custom_page_description', true)); ?></p>
								<a href="<?php echo get_permalink($page->ID); ?>" class="btn-border-gradient px-4 py-2 mt-6 font-semibold rounded" tabindex="0">Go to overview</a>
							</div>
						<?php }
					}
				} ?>

				<div class="md:py-8 md:pl-8 bg-white">
					<div class="grid md:grid-cols-3 grid-cols-1 gap-8">
						<?php if ($pages) {
							foreach ($pages as $page) {
								if ($page->post_title != 'Solutions') { ?>
									<div>
										<h2 class="hover:underline hover:text-secondary font-semibold text-lg mb-3">
											<a href="<?php echo get_permalink($page->ID); ?>"><?php echo esc_html($page->post_title); ?></a>
										</h2>
										<p><?php echo esc_html(get_post_meta($page->ID, '_custom_page_description', true)); ?></p>
									</div>
								<?php }
							}
						} ?>
					</div>
				</div>
			</div>
			<div class="bg-white flex-1"></div>
		</div>
		<!-- END: MEGA MENU -->
	</header>