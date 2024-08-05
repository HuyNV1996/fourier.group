<?php
/* Template Name: Technology Page */

if (is_page()) {
    $page_id = get_the_ID();
    $custom_texts = get_post_meta($page_id, 'custom_texts', true) ?: array();
	$custom_image = get_post_meta($page_id, 'custom_image_urls', true) ?: array();
	$slider_data = get_post_meta($page_id, 'slider_data', true) ?: array();
}
get_header();
?>
  <main>
    <section class="relative">
      <div class="min-h-[560px] w-full overflow-hidden relative">
	  	<?php if (!empty($custom_image)) : ?>
			<img src="<?php echo esc_url($custom_image[0]); ?>" alt="bg" class="absolute w-full h-full object-cover">
		<?php endif; ?>
      </div>
      <div class="min-h-[160px] bg-white"></div>
      <div class="absolute bottom-20 max-md:bottom-0 w-full flex">
        <div class="grow max-md:flex-0 bg-white"></div>
        <div class="mx-auto w-full shrink-0 max-w-layout">
          <div class="pr-[116px] py-12 max-md:py-12 max-md:px-5 bg-white w-[80%] max-md:w-[90%]">
            <div class="flex justify-center items-center leading-6 bg-white text-primary">
              <div class="flex flex-col w-full max-w-[968px] max-md:max-w-full">
                <nav class="flex gap-2 self-start text-sm font-medium text-neutral-400">
                  <span>Solutions</span>
                  <span>/</span>
                  <span class="text-primary">Technology consulting</span>
                </nav>
				<?php if (!empty($custom_texts)) : ?>
					<h1 class="mt-6 text-6xl font-bold leading-[84px] max-md:max-w-full max-md:text-4xl">
						<?php echo wp_kses_post($custom_texts[0]); ?>
					</h1>
					<p class="mt-6 text-base max-md:max-w-full">
						<?php echo wp_kses_post($custom_texts[1]); ?>
					</p>
				<?php endif; ?>
              </div>
            </div>
          </div>
        </div>
        <div class="grow bg-transparent"></div>

      </div>

    </section>

    <section class="w-full relative overflow-hidden">
		<?php if (!empty($custom_image)) : ?>
			<img src="<?php echo esc_url($custom_image[1]); ?>" alt="bg" class="absolute top-0 left-0 shrink-0 w-full h-full object-cover">
		<?php endif; ?>
      <div
        class="max-w-layout mx-auto min-h-[440px] max-md:min-h-[300px] w-full flex items-center max-md:items-start relative gap-8 max-md:py-16 max-md:px-5">
        <div class="w-1/2 max-md:w-full flex flex-col gap-8">
			<?php if (!empty($custom_texts)) : ?>
				<p class="text-base">
					<?php echo wp_kses_post($custom_texts[2]); ?>
				</p>
			<?php endif; ?>
          <button type="button"
            class="flex gap-2 self-start justify-center items-center px-4 py-2 text-base max-md:text-sm font-semibold leading-6 text-white rounded border-gradient shadow">
            <span>Get in touch</span>
            <i class='bx bx-right-arrow-alt text-xl max-md:text-base'></i>
        </div>
      </div>
    </section>

    <section class="flex flex-col justify-center items-center w-full">
      <div class="bg-white w-full max-md:px-5 max-md:py-16">
        <div class="w-full mt-[60px] max-md:mt-0 max-w-layout mx-auto max-md:max-w-full">
          <div class="flex gap-20 max-md:flex-col max-md:gap-0 py-20 max-md:py-0">
            <article class="flex flex-col max-md:ml-0 w-full">
              <div class="flex flex-col justify-center self-stretch my-auto max-md:max-w-full">
				<?php if (!empty($custom_texts)) : ?>
					<h2 class="text-4xl max-md:text-[32px] font-extrabold text-primary max-md:max-w-full">
						<?php echo wp_kses_post($custom_texts[3]); ?>
					</h2>
					<p
					class="justify-center p-10 mt-12 text-xl font-medium leading-7 border-2 border-secondary border-solid text-primary max-md:px-5 max-md:mt-8 max-md:max-w-full">
						<?php echo wp_kses_post($custom_texts[4]); ?>
					</p>
				<?php endif; ?>
              </div>
            </article>
            <aside class="flex flex-col w-6/12 shrink-0 max-md:ml-0 max-md:w-full">
              <figure
                class="flex flex-col pl-10 pt-10 max-md:pl-6 max-md:pt-6 w-full rounded-2xl bg-zinc-100 max-md:mt-16 max-md:max-w-full">
				<?php if (!empty($custom_image)) : ?>
					<img src="<?php echo esc_url($custom_image[2]); ?>" alt="Illustrative image related to market trends" class="w-full aspect-square max-md:max-w-full">
				<?php endif; ?>
              </figure>
            </aside>
          </div>
        </div>
      </div>

      <div class="bg-zinc-100 w-full max-md:px-5 max-md:py-16">
        <div class="w-full max-w-layout mx-auto max-md:max-w-full">
          <div class="flex flex-row-reverse gap-20 max-md:flex-col max-md:gap-0 py-20 max-md:py-0">
            <article class="flex flex-col max-md:ml-0 w-full">
              <div class="flex flex-col justify-center self-stretch my-auto max-md:max-w-full">
			  	<?php if (!empty($custom_texts)) : ?>
					<h2 class="text-4xl max-md:text-[32px] font-extrabold text-primary max-md:max-w-full">
						<?php echo wp_kses_post($custom_texts[5]); ?>
					</h2>
					<p
					class="justify-center p-10 mt-12 text-xl font-medium leading-7 border-2 border-secondary border-solid text-primary max-md:px-5 max-md:mt-8 max-md:max-w-full">
						<?php echo wp_kses_post($custom_texts[6]); ?>
					</p>
				<?php endif; ?>
              </div>
            </article>
            <aside class="flex flex-col w-6/12 shrink-0 max-md:ml-0 max-md:w-full">
              <figure
                class="flex flex-col pr-10 pt-10 max-md:pr-6 max-md:pt-6 max-md:pt-6 w-full rounded-2xl overflow-hidden bg-white max-md:mt-10 max-md:max-w-full">
				<?php if (!empty($custom_image)) : ?>
					<img src="<?php echo esc_url($custom_image[3]); ?>" alt="Illustrative image related to market trends" class="w-full aspect-square max-md:max-w-full object-cover">
				<?php endif; ?>
              </figure>
            </aside>
          </div>
        </div>
      </div>

      <div class="bg-white w-full">
        <div class="w-full mt-[60px] max-md:mt-0 max-w-layout mx-auto max-md:max-w-full max-md:px-5 max-md:py-16">
          <div class="flex gap-20 max-md:flex-col max-md:gap-0 py-20 max-md:py-0">
            <article class="flex flex-col max-md:ml-0 w-full">
              <div class="flex flex-col justify-center self-stretch my-auto max-md:max-w-full">
			  	<?php if (!empty($custom_texts)) : ?>
					<h2 class="text-4xl max-md:text-[32px] font-extrabold text-primary max-md:max-w-full">
						<?php echo wp_kses_post($custom_texts[7]); ?>
					</h2>
					<p
					class="justify-center p-10 mt-12 text-xl font-medium leading-7 border-2 border-secondary border-solid text-primary max-md:px-5 max-md:mt-8 max-md:max-w-full">
						<?php echo wp_kses_post($custom_texts[8]); ?>
					</p>
				<?php endif; ?>
              </div>
            </article>
            <aside class="flex flex-col w-6/12 shrink-0 max-md:ml-0 max-md:w-full">
              <figure
                class="flex flex-col pl-10 pt-10 max-md:pl-6 max-md:pt-6 w-full rounded-2xl bg-zinc-100 overflow-hidden max-md:mt-10 max-md:max-w-full">
				<?php if (!empty($custom_image)) : ?>
					<img src="<?php echo esc_url($custom_image[4]); ?>" alt="Illustrative image related to market trends" class="w-full aspect-square max-md:max-w-full">
				<?php endif; ?>
              </figure>
            </aside>
          </div>
        </div>
      </div>
    </section>

    <section class="flex justify-center items-center px-16 py-20 bg-primary max-md:px-5 max-md:py-16">
      <div class="flex flex-col w-full max-w-layout max-md:max-w-full">
        <h2 class="text-6xl font-bold text-center text-white leading-[84px] max-md:max-w-full max-md:text-4xl">
          Fourier Consulting Progress
        </h2>
        <p class="mt-10 text-base leading-6 text-center text-white max-md:max-w-full">
          After a decade, Intellectsoft remains at the forefront of innovation, reshaping IT strategies for diverse
          organizations. Our team of experts, many with over fifteen years of experience, brings deep knowledge and
          skill. We swiftly deliver customized solutions, ensuring tangible value in every project.
        </p>

        <div class="max-w-[1032px] w-full self-center mt-10">
          <!-- Time line -->
          <div class="mx-20 max-md:mx-0 relative">
            <div id="timeline-container" class="flex gap-0 self-center justify-between max-md:flex-wrap">
              <!-- Step render here -->
            </div>
            <!-- Progress -->
            <div
              class="absolute top-[50%] left-[50%] translate-y-[-50%] translate-x-[-50%] bg-fifty h-[6px] z-1 overflow-hidden hidden"
              style="width: calc(100% - 40px);" id="progress-container">
              <div id="progress-bar" class="absolute w-0 bg-secondary h-full"></div>
            </div>
          </div>
          <!-- Time line -->

          <!-- Step details -->
          <div id="step-details">
            <article
              class="flex flex-col self-center p-10 md:mt-20 w-full text-white rounded-lg bg-fourty max-md:px-5 max-md:mt-20 max-md:max-w-full">
              <h2 class="text-2xl font-bold leading-8 text-center max-md:max-w-full self-start" id="step-title">No step
                here</h2>
              <hr class="shrink-0 mt-6 h-px border border-solid bg-neutral-400 border-neutral-400 max-md:max-w-full">
              <p class="mt-6 text-sm font-semibold leading-6 max-md:max-w-full" id="step-description">Lorem ipsum dolor,
                sit amet consectetur adipisicing elit. Doloribus iste sapiente blanditiis enim, vero dicta atque rem
                maxime suscipit unde ipsa nostrum eaque. Distinctio architecto nisi unde, doloremque temporibus
                voluptatem!
              </p>
            </article>
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
            <div class="flex flex-col justify-center text-primary max-md:mt-10 max-md:max-w-full">
              <div class="text-5xl font-bold leading-[72px] max-md:max-w-full max-md:text-4xl max-md:leading-[67px]">
                How can we help you?
              </div>
              <div class="mt-2.5 text-base leading-6 max-md:max-w-full">
                Fill customer's information
              </div>
            </div>
          </div>
          <div class="flex flex-col ml-5 w-6/12 max-md:ml-0 max-md:w-full">
            <form action="">
              <div
                class="flex flex-col grow justify-center text-sm leading-6 rounded-md max-md:mt-10 max-md:max-w-full">
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
                <button type=""
                  class="justify-center self-end px-10 py-3 mt-6 text-base font-semibold leading-6 text-white whitespace-nowrap rounded border border-solid shadow bg-primary border-primary max-md:px-5">
                  Submit
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>

  </main>
<?php get_footer(); ?>