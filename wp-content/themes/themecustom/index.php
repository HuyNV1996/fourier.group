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
        <a href="#" class="uppercase text-[32px] md:text-[40px] font-extrabold font-['Baloo']">Fourier</a>
      </div>
      <!-- Start Menu Desktop-->
      <ul id="menu-desktop" class="flex-1 text-primary leading-6 gap-2 hidden md:flex">
        <li class="item-menu active cursor-pointer flex justify-center gap-1 items-center">
          <a href="#home" class="px-4 py-6">Home</a>
        </li>

        <li class="item-menu mega-menu cursor-pointer flex justify-center gap-1 items-center">
          <a href="#solutions" class="pl-4 py-6 flex justify-center items-center gap-1">Solutions <i
              class='bx bx-chevron-down pr-4'></i></a>
        </li>

        <li class="item-menu cursor-pointer flex justify-center gap-1 items-center">
          <a href="#case-study" class="px-4 py-6">Case study</a>
        </li>

        <li class="item-menu cursor-pointer flex justify-center gap-1 items-center">
          <a href="#contact" class="px-4 py-6">Contact us</a>
        </li>
      </ul>
      <!-- End Menu Desktop-->
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
        <div class="max-w-[400px] md:py-8 md:pr-8 text-sm leading-6 text-white flex flex-col items-start bg-primary">
          <h2 class="text-3xl font-bold leading-10">Solutions</h2>
          <p class="mt-6">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
            incididunt ut
            labore et dolore magna aliqua.</p>
          <a href="#" class="btn-border-gradient px-4 py-2 mt-6 font-semibold rounded" tabindex="0">Go to overview</a>
        </div>

        <div class="md:py-8 md:pl-8 bg-white">
          <div class="grid md:grid-cols-3 grid-cols-1 gap-8">
            <div>
              <h2 class="hover:underline hover:text-secondary font-semibold text-lg mb-3">
                <a href="#">SmartSoft Solutions</a>
              </h2>
              <p>Enhance and expand your digital investments for optimal growth.</p>
            </div>
            <div>
              <h2 class="hover:underline hover:text-secondary font-semibold text-lg mb-3">
                <a href="#">Outsource IT Service</a>
              </h2>
              <p>Comprehensive management of applications throughout the entire lifecycle.</p>
            </div>
            <div>
              <h2 class="hover:underline hover:text-secondary font-semibold text-lg mb-3">
                <a href="#">IT Academy</a>
              </h2>
              <p>Providing enterprise-standard BA/DA/Dev/Tester course through on-the-job learning.</p>
            </div>
            <div>
              <h2 class="hover:underline hover:text-secondary font-semibold text-lg mb-3">
                <a href="#">Drone Show Solutions</a>
              </h2>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, </p>
            </div>
            <div>
              <h2 class="hover:underline hover:text-secondary font-semibold text-lg mb-3">
                <a href="#">Technology consulting</a>
              </h2>
              <p>Efficiently navigate the dynamic and rapidly evolving world</p>
            </div>
          </div>
        </div>
      </div>
      <div class="bg-white flex-1"></div>
    </div>
    <!-- END: MEGA MENU -->
  </header>

  <main>
    <section>
      <div class="flex justify-center items-center px-16 py-20 max-md:px-5 max-md:py-16">
        <div class="w-full max-w-layout max-md:max-w-full">
          <div class="flex gap-5 max-md:flex-col max-md:gap-0">
            <div class="flex flex-col w-[54%] max-md:ml-0 max-md:w-full">
              <div
                class=" font-bold text-secondary max-md:max-w-full md:text-[56px] text-[32px] md:text-start text-center">
                <span class="text-primary"> "Unlock Potential, Achieve <span class="text-secondary">Sustainable
                    Growth</span>"</span>
              </div>
            </div>
            <div class="flex flex-col ml-5 w-[46%] max-md:ml-0 max-md:w-full">
              <div
                class="self-stretch my-auto text-base leading-6 text-primary max-md:mt-8 max-md:max-w-full md:text-start text-center ">
                Welcome to Fourier, a leading IT company and a proud subsidiary of
                Apec Group.<br /> Our team of over 100 skilled professionals has completed
                more than 300 innovative projects for clients around the globe. At
                Fourier, we specialize in shaping the future of IT through
                comprehensive training programs, application engineering, and tailored
                technology consulting services
              </div>
            </div>
          </div>
        </div>
      </div>


    </section>

    <section>

      <div
        class="flex overflow-hidden relative flex-col justify-center items-start px-16 py-20 min-h-[560px] max-md:px-5 max-md:py-16">
        <img loading="lazy" srcset="<?php bloginfo('template_directory')?>/assets/img/home/demo.jpg" class="object-cover absolute inset-0 size-full" />
        <div class="flex relative flex-col mt-7 ml-0 md:ml-14 max-w-full">
          <div class="text-[32px] w-[80%] md:w-[50%] font-bold text-white max-md:max-w-full md:text-[56px]">
            &quot;Empowering Innovation, Delivering
            <span class="text-secondary">Excellence</span>
            .&quot;
          </div>
          <div class="mt-6 text-base leading-6 text-white max-md:max-w-full w-full md:w-[65%]">
            We are dedicated to providing top-notch maintenance and support, catering
            to the unique needs of both startups and established enterprises. Discover
            how Fourier can help drive your business forward with our expert solutions
            and unwavering commitment to innovation.
          </div>
        </div>
      </div>

    </section>

    <section>
      <div class="self-stretch">
        <div class="flex justify-center max-w-layout mx-auto max-md:flex-col py-[116px] max-md:py-16 max-md:px-5 gap-8">
          <div class="flex flex-col w-6/12 max-md:w-full md:max-w-[588px]">
            <div
              class="flex flex-col grow self-stretch px-6 py-8 w-full bg-white rounded-lg border border-solid shadow-sm border-neutral-400 max-md:px-5 max-md:max-w-full">
              <div class="flex justify-center items-center self-center  w-28 h-28 bg-zinc-100 rounded-[50%] ">
                <img src="<?php bloginfo('template_directory')?>/assets/img/home/Mission.png" />
              </div>
              <div class="mt-6 text-3xl font-bold leading-10 text-center text-neutral-800 max-md:max-w-full">
                Our Mission
              </div>
              <div class="mt-3 text-sm leading-6 text-center text-neutral-800 max-md:max-w-full">
                Pioneers in developing a comprehensive ecosystem of valuable and
                convenient technology products, delivering exceptional user
                experiences and significantly impacting society
              </div>
            </div>
          </div>
          <div class="flex flex-col w-6/12 max-md:w-full md:max-w-[588px]">
            <div
              class="flex flex-col grow self-stretch px-6 py-8 w-full bg-white rounded-lg border border-solid shadow-sm border-neutral-400 max-md:px-5 max-md:max-w-full">
              <div
                class="flex justify-center items-center self-center px-6 w-28 h-28 bg-zinc-100 rounded-[100px] max-md:px-5">
                <img src="<?php bloginfo('template_directory')?>/assets/img/home/Vision.png" />
              </div>
              <div class="mt-6 text-3xl font-bold leading-10 text-center text-neutral-800 max-md:max-w-full">
                Our Vision
              </div>
              <div class="mt-3 text-sm leading-6 text-center text-neutral-800 max-md:max-w-full">
                Creating a vesatile technology ecosystem that enhances customer
                convenience and fosters fair, transparent working environment,
                inspiring employees to continuously grow and develop
              </div>
            </div>
          </div>
        </div>
      </div>

    </section>

    <section>
      <div class="flex justify-center items-center px-16 py-40 bg-primary max-md:px-5">
        <div class="flex flex-col w-full max-w-layout max-md:max-w-full">
          <div class="flex gap-5 text-white max-md:flex-wrap">
            <div class="flex-1 text-6xl font-semibold leading-[84px] max-md:max-w-full max-md:text-4xl">
              Our services
            </div>
            <a href="#"
              class="flex gap-4 self-start py-3 text-xl font-medium leading-7 border-b-2 border-secondary border-solid max-md:hidden">
              <span>Explore more</span>
              <img loading="lazy" src="<?php bloginfo('template_directory')?>/assets/images/arrow-top-right.svg" class="shrink-0 my-auto w-6 aspect-square" />
            </a>
          </div>
          <div class="mt-6 text-base leading-6 text-white max-md:max-w-full">
            Our company specialize in training IT future generation, offering
            application engineer, providing maintenance, support and technology
            consulting services tailored to meet the unique needs of both startups and
            established enterprises.
          </div>
          <a href="#"
            class="flex gap-4 self-start text-white mt-6 py-3 text-xl font-medium leading-7 border-b-2 border-secondary border-solid md:hidden">
            <span>Explore more</span>
            <img loading="lazy" src="<?php bloginfo('template_directory')?>/assets/images/arrow-top-right.svg" class="shrink-0 my-auto w-6 aspect-square" />
          </a>
          <div class="mt-12 max-md:mt-12 max-md:max-w-full">
            <div class="flex gap-5 max-md:flex-col max-md:gap-0">
              <div class="flex flex-col w-[59%] max-md:ml-0 max-md:w-full">
                <div class="flex flex-col grow max-md:max-w-full">
                  <a href="#"
                    class="card flex flex-col py-8 px-6 rounded-2xl bg-neutral-800 max-md:p-4 max-md:max-w-full">
                    <div class="max-md:max-w-full">
                      <div class="flex gap-5 max-md:flex-col max-md:gap-0">
                        <div class="flex flex-col w-[42%] max-md:ml-0 max-md:w-full">
                          <img loading="lazy" src="<?php bloginfo('template_directory')?>/assets/img/home/technolochy.png"
                            class="grow self-stretch w-full aspect-[1.1] object-cover rounded-lg" />
                        </div>
                        <div class="flex flex-col ml-5 w-[58%] max-md:ml-0 max-md:w-full">
                          <div class="flex flex-col grow max-md:mt-8">
                            <div
                              class="flex gap-5 text-2xl font-medium leading-8 text-center whitespace-nowrap text-neutral-400">
                              <div>01</div>
                              <div class="flex-1 shrink-0 my-auto h-px bg-neutral-400"></div>
                            </div>
                            <div class="flex gap-1 px-px mt-8 text-3xl font-bold leading-10">
                              <div class="flex-1 bg-clip-text title-gradient">Technology consulting</div>
                              <img loading="lazy" src="<?php bloginfo('template_directory')?>/assets/images/arrow-top-right.svg"
                                class="shrink-0 self-start mt-2 w-8 aspect-square" />
                            </div>
                            <div class="mt-3 text-sm leading-6 text-white">
                              Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                              sed do eiusmod tempor incididunt ut labore et dolore
                              magna aliqua.
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </a>

                  <div class="mt-8 max-md:max-w-full">
                    <div class="flex gap-5 max-md:flex-col max-md:gap-0">
                      <a href="#" class="card flex flex-col w-6/12 max-md:ml-0 max-md:w-full">
                        <div
                          class="flex flex-col grow self-stretch px-6 py-8 mx-auto w-full text-white rounded-2xl bg-neutral-800 max-md:p-4">
                          <div
                            class="flex gap-5 text-2xl font-medium leading-8 text-center whitespace-nowrap text-neutral-400">
                            <div>02</div>
                            <div class="flex-1 shrink-0 my-auto h-px bg-neutral-400"></div>
                          </div>
                          <div class="flex gap-1 px-px mt-8 text-3xl font-bold leading-10">
                            <div class="flex-1 bg-clip-text title-gradient">SmartSoft Solutions</div>
                            <img loading="lazy" src="<?php bloginfo('template_directory')?>/assets/images/arrow-top-right.svg"
                              class="shrink-0 self-start mt-2 w-8 aspect-square" />
                          </div>
                          <div class="mt-3 text-sm leading-6 text-white">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                          </div>
                        </div>
                      </a>
                      <a href="#" class="card flex flex-col ml-5 w-6/12 max-md:ml-0 max-md:w-full">
                        <div
                          class="flex flex-col grow px-6 py-8 mx-auto w-full text-white rounded-2xl bg-neutral-800 max-md:p-4 max-md:mt-8">
                          <div
                            class="flex gap-5 text-2xl font-medium leading-8 text-center whitespace-nowrap text-neutral-400">
                            <div>03</div>
                            <div class="flex-1 shrink-0 my-auto h-px bg-neutral-400"></div>
                          </div>
                          <div class="flex gap-1 px-px mt-8 text-3xl font-bold leading-10">
                            <div class="flex-1 bg-clip-text title-gradient">Outsource IT Service</div>
                            <img loading="lazy" src="<?php bloginfo('template_directory')?>/assets/images/arrow-top-right.svg"
                              class="shrink-0 self-start mt-2 w-8 aspect-square" />
                          </div>
                          <div class="mt-3 text-sm leading-6 text-white">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                            sed do eiusmod tempor incididunt ut labore et dolore
                            magna aliqua.
                          </div>
                        </div>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="flex flex-col ml-5 w-[41%] max-md:ml-0 max-md:w-full">
                <a href="#"
                  class="card flex flex-col grow self-stretch px-6 py-8 w-full text-white rounded-2xl bg-neutral-800 max-md:p-4 max-md:mt-8 max-md:max-w-full">
                  <img loading="lazy" src="<?php bloginfo('template_directory')?>/assets/img/home/it.png"
                    class="w-full aspect-[1.48] max-md:max-w-full object-cover rounded-lg" />
                  <div
                    class="flex gap-5 mt-8 text-2xl font-medium leading-8 text-center whitespace-nowrap text-neutral-400 max-md:flex-wrap">
                    <div>04</div>
                    <div class="flex-1 shrink-0 my-auto h-px bg-neutral-400"></div>
                  </div>
                  <div class="flex gap-1 px-px mt-8 text-3xl font-bold leading-10">
                    <div class="flex-1 bg-clip-text title-gradient">IT Academy</div>
                    <img loading="lazy" src="<?php bloginfo('template_directory')?>/assets/images/arrow-top-right.svg"
                      class="shrink-0 self-start mt-2 w-8 aspect-square" />
                  </div>
                  <div class="mt-3 text-sm leading-6 text-white">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                    sed do eiusmod tempor incididunt ut labore et dolore
                    magna aliqua.
                  </div>
                </a>
              </div>
            </div>
          </div>
          <a href="#" class="card px-6 py-8 rounded-2xl bg-neutral-800 max-md:p-4 mt-8">
            <div class="flex gap-5 max-md:flex-col max-md:gap-0">
              <div class="flex flex-col w-[38%] max-md:ml-0 max-md:w-full">
                <img loading="lazy" src="<?php bloginfo('template_directory')?>/assets/img/home/drone.png"
                  class="grow w-full aspect-[1.41] max-md:max-w-full rounded-lg object-cover" />
              </div>
              <div class="flex flex-col ml-5 w-[62%] max-md:ml-0 max-md:w-full">
                <div class=" flex flex-col text-white max-md:mt-10 max-md:max-w-full">
                  <div
                    class="flex gap-5 text-2xl font-medium leading-8 text-center whitespace-nowrap text-[#A6A5A5] max-md:flex-wrap">
                    <div>05</div>
                    <div class="flex-1 shrink-0 my-auto h-px bg-[#A6A5A5]"></div>
                  </div>
                  <div class="flex gap-1 px-px mt-8 text-3xl font-bold leading-10">
                    <div class="flex-1 bg-clip-text title-gradient">Drone Show Solution</div>
                    <img loading="lazy" src="<?php bloginfo('template_directory')?>/assets/images/arrow-top-right.svg"
                      class="shrink-0 self-start mt-2 w-8 aspect-square" />
                  </div>
                  <div class="mt-3 text-sm leading-6 text-white">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                    sed do eiusmod tempor incididunt ut labore et dolore
                    magna aliqua.
                  </div>
                </div>
              </div>
            </div>
          </a>
        </div>
      </div>

    </section>
    <section>
      <div class="flex justify-center items-center px-16 py-40 bg-white max-md:px-5 max-md:py-16">
        <div class="flex flex-col w-full max-w-layout max-md:max-w-full">
          <div class="flex gap-2.5 max-md:flex-wrap">
            <div class="flex-1 text-6xl font-semibold leading-[84px] text-primary max-md:max-w-full max-md:text-4xl">
              Our leaders
            </div>
            <div class="my-auto text-xl font-medium leading-7 text-neutral-800">
              Meet the Fourier leadership team
            </div>
          </div>
          <div class="self-stretch">
            <div class="flex gap-5 flex-nowrap max-w-layout overflow-x-auto md:mt-16">
              <div class="flex flex-col w-3/12 max-md:min-w-[300px] max-md:w-full">
                <div class="flex flex-col grow pb-4 max-md:mt-10">
                  <img loading="lazy" src="<?php bloginfo('template_directory')?>/assets/img/home/people4.png" class="w-full aspect-[0.85]" />
                  <div class="flex  mt-10">
                    <div class="shrink-0 w-1 bg-secondary h-[60px]"></div>
                    <div class="flex flex-col px-5">
                      <div class="text-2xl font-bold leading-8 text-primary">
                        Cao Anh Chiến
                      </div>
                      <div class="mt-1 text-base leading-6 text-neutral-700">
                        Chief Technology Officer
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="flex flex-col w-3/12 max-md:min-w-[300px] max-md:w-full">
                <div class="flex flex-col grow pb-4 max-md:mt-10">
                  <img loading="lazy" src="<?php bloginfo('template_directory')?>/assets/img/home/people3.png" class="w-full aspect-[0.85]" />
                  <div class="flex  mt-10">
                    <div class="shrink-0 w-1 bg-secondary h-[60px]"></div>
                    <div class="flex flex-col px-5">
                      <div class="text-2xl font-bold leading-8 text-primary">
                        Dao Duy Anh
                      </div>
                      <div class="mt-1 text-base leading-6 text-neutral-700">
                        Chief Growth Officer
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="flex flex-col w-3/12 max-md:min-w-[300px] max-md:w-full">
                <div class="flex flex-col grow pb-4 max-md:mt-10">
                  <img loading="lazy" src="<?php bloginfo('template_directory')?>/assets/img/home/people2.png" class="w-full aspect-[0.85]" />
                  <div class="flex  mt-10">
                    <div class="shrink-0 w-1 bg-secondary h-[60px]"></div>
                    <div class="flex flex-col px-5">
                      <div class="text-2xl font-bold leading-8 text-primary">
                        Ho Sy Quyet
                      </div>
                      <div class="mt-1 text-base leading-6 text-neutral-700">
                        Technical Leader
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="flex flex-col w-3/12 max-md:min-w-[300px] max-md:w-full">
                <div class="flex flex-col grow pb-4 max-md:mt-10">
                  <img loading="lazy" src="<?php bloginfo('template_directory')?>/assets/img/home/people1.png" class="w-full aspect-[0.85]" />
                  <div class="flex  mt-10">
                    <div class="shrink-0 w-1 bg-secondary h-[60px]"></div>
                    <div class="flex flex-col px-5">
                      <div class="text-2xl font-bold leading-8 text-primary">
                        Nguyen Huy Manh
                      </div>
                      <div class="mt-1 text-base leading-6 text-neutral-700">
                        Project Manager
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>

    </section>
    <!-- FORM -->
    <section class="bg-white flex items-center justify-center relative max-md:px-5 max-md:py-16">
      <div class="absolute bottom-0 w-full h-1/3 bg-black max-md:bg-white"></div>

      <div class="self-stretch px-16 py-10 bg-white rounded-lg shadow max-md:px-5 w-full md:max-w-layout relative">
        <div class="flex gap-5 max-md:flex-col max-md:gap-0">
          <div class="flex flex-col w-6/12 max-md:ml-0 max-md:w-full">
            <div class="flex flex-col justify-center text-primary max-md:max-w-full">
              <div class="text-5xl font-bold max-md:max-w-full max-md:text-4xl">
                How can we help you?
              </div>
              <div class="mt-4 text-base leading-6 max-md:max-w-full">
                Fill customer's information
              </div>
            </div>
          </div>
          <div class="flex flex-col ml-5 w-6/12 max-md:ml-0 max-md:w-full">
            <div class="flex flex-col grow justify-center text-sm leading-6 rounded-md max-md:mt-10 max-md:max-w-full">
              <input class="flex gap-1 px-4 py-2.5 whitespace-nowrap rounded bg-zinc-100 max-md:flex-wrap "
                placeholder="Name">
              <!-- <div class="text-neutral-800">Name</div>
                      <div class="text-orange-700 max-md:max-w-full">*</div> -->

              </input>
              <input class="flex gap-1 px-4 py-2.5 mt-4 rounded bg-zinc-100 max-md:flex-wrap"
                placeholder="E-mail address">
              <!-- <div class="text-neutral-800">E-mail address</div>
                      <div class="text-orange-700">*</div> -->
              </input>
              <input class="flex gap-1 px-4 py-2.5 mt-4 rounded bg-zinc-100 max-md:flex-wrap"
                placeholder="Company name">
              <!-- <div class="text-neutral-800">Company name</div>
                      <div class="text-orange-700">*</div> -->
              </input>
              <textarea id="message" name="message" rows="3"
                class="px-4 pt-3 pb-8 mt-4 rounded bg-zinc-100 max-md:max-w-full" placeholder="Your message"
                aria-label="Message"></textarea>
              <button
                class="justify-center self-end px-10 py-3 mt-6 text-base font-semibold leading-6 text-white whitespace-nowrap rounded border border-solid shadow bg-primary border-primary max-md:px-5">
                Submit
              </button>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>

  <footer class="flex flex-col items-center py-12 max-md:px-5 bg-primary w-full">
    <div class="max-w-layout mx-auto w-full">
      <a href="#" class="block uppercase text-[40px] mb-8 font-extrabold text-white font-['Baloo']">FOURIER.Inc</a>
      <div class="flex max-md:flex-col gap-8">
        <aside class="flex flex-col flex-1">
          <div class="flex flex-col grow text-sm leading-6 text-white">
            <div class="flex gap-4">
              <img loading="lazy"
                src="https://cdn.builder.io/api/v1/image/assets/TEMP/1d43e9bb5ef6ba263ca99fd55bda09ef5fc95ca2ffaaa022ec2ca7dad91d1179?apiKey=1e64eec6fea84ac4ac698f954b5985e2&"
                alt="Location Icon" class="shrink-0 my-auto w-5 aspect-square" />
              <p>117 Trần Duy Hưng, Trung Hoà, Cầu Giấy, Hà Nội</p>
            </div>
            <div class="flex gap-4 mt-4 whitespace-nowrap">
              <img loading="lazy"
                src="https://cdn.builder.io/api/v1/image/assets/TEMP/e3b040a4f8c506f01d127f6b020d1f1277a762180d7ef10871fbace0bdf1565b?apiKey=1e64eec6fea84ac4ac698f954b5985e2&"
                alt="Email Icon" class="shrink-0 my-auto w-5 aspect-square" />
              <p>contact@apec.com.vn</p>
            </div>
            <div class="flex gap-4 mt-4">
              <img loading="lazy"
                src="https://cdn.builder.io/api/v1/image/assets/TEMP/6df5da042d478cb43f8fe745edc7ece670b62a3f0d295b7a15c4bf098cbd9e97?apiKey=1e64eec6fea84ac4ac698f954b5985e2&"
                alt="Phone Icon" class="shrink-0 my-auto w-5 aspect-square" />
              <p>1900 000 000</p>
            </div>
          </div>
        </aside>
        <div class="justify-end self-stretch max-md:max-w-full">
          <div class="flex gap-5 max-md:gap-0 justify-between">
            <a href="#" class="text-sm text-nowrap font-semibold leading-6 text-white">Home</a>
            <a href="#" class="text-sm text-nowrap font-semibold leading-6 text-white">Solutions</a>
            <a href="#" class="text-sm text-nowrap font-semibold leading-6 text-white">Case study</a>
            <a href="#" class="text-sm text-nowrap font-semibold leading-6 text-white">Contact us</a>
          </div>
        </div>
      </div>
      <hr class="mt-16 h-px bg-white w-full">
      <div class="flex justify-between gap-5 mt-8 w-full">
        <p class="flex-1 text-sm leading-6 text-white">Copyright © 2024 Fourier.Inc</p>
        <div class="flex gap-4">
          <a href="#">
            <i class='bx bxl-facebook-circle text-white text-lg md:text-2xl'></i>
          </a>
          <a href="#">
            <i class='bx bxl-linkedin-square text-white text-lg md:text-2xl'></i>
          </a>
          <a href="#">
            <i class='bx bxl-github text-white text-lg md:text-2xl'></i>
          </a>
        </div>
      </div>
    </div>
  </footer>

  <!-- MODAL -->
  <section id="modalSupport"
    class="hidden fixed top-0 left-0 h-screen w-full p-5 z-[9999] bg-primary/50 flex justify-center items-center">
    <div class="max-w-[800px] w-full bg-white rounded-lg shadow-md flex flex-col p-8 text-sm leading-6 max-md:px-5">
      <div class="flex justify-between items-start">
        <h1 class="text-5xl font-bold leading-[72px] leading-10 text-primary max-w-full max-md:text-2xl">How can we help
          you?</h1>
        <button type="button" id="closeModal"><i class='bx bx-x text-3xl'></i></button>
      </div>
      <p class="mt-2.5 text-base leading-6 text-primary max-md:max-w-full">Fill customer's information</p>
      <form class="flex flex-col mt-8">
        <input type="text" id="name" name="name" class="px-4 py-3 mt-2 rounded bg-zinc-100 max-md:max-w-full"
          placeholder="Enter your name" aria-label="Name" required>
        <input type="email" id="email" name="email" class="px-4 py-3 mt-2 rounded bg-zinc-100 max-md:max-w-full"
          placeholder="Enter your email" aria-label="Email" required>
        <input type="text" id="company" name="company" class="px-4 py-3 mt-2 rounded bg-zinc-100 max-md:max-w-full"
          placeholder="Enter your company name" aria-label="Company" required>
        <textarea id="message" name="message" rows="4" class="px-4 pt-3 pb-8 mt-2 rounded bg-zinc-100 max-md:max-w-full"
          placeholder="Enter your message" aria-label="Message"></textarea>
        <button type="submit"
          class="py-2 px-4 mt-6 bg-primary max-md:text-sm text-base self-end text-white font-bold rounded shadow-md hover:bg-secondary">Submit</button>
      </form>
    </div>
  </section>

  <script src="<?php bloginfo('template_directory')?>/assets/js/tailwind_custom.js"></script>
  <script src="<?php bloginfo('template_directory')?>/assets/js/layout.js"></script>
  <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
</body>

</html>