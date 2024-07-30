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
        <a href="<?php bloginfo('url')?>" class="uppercase text-[32px] md:text-[40px] font-extrabold font-['Baloo']">Fourier</a>
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