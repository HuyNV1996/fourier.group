<?php
/* Template Name: Solutions Page */
if (is_page()) {
    $page_id = get_the_ID();
    $custom_data = get_post_meta($page_id, 'custom_data', true) ?: [];
	usort($custom_data, function($a, $b) {
		return ($a['index'] <=> $b['index']);
	});
}
get_header();
?>

  <main>
    <section class="relative">
      <div class="min-h-[560px] w-full overflow-hidden relative">
		<?php if (!empty($custom_data)) : ?>
			<?php if (isset($custom_data[0]['value'])) : ?>
				<img src="<?php echo esc_url($custom_data[0]['value']); ?>" alt="bg" class="absolute w-full h-full object-cover">
			<?php endif; ?>
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
                  <span class="text-primary">IT Academy</span>
                </nav>
				<?php if (!empty($custom_data)) : ?>
					<?php if (isset($custom_data[1]['value'])) : ?>
						<h1 class="mt-6 text-6xl font-bold leading-[84px] max-md:max-w-full max-md:text-4xl">
							<?php echo $custom_data[1]['value'] ?>
						</h1>
					<?php endif; ?>
					<?php if (isset($custom_data[2]['value'])) : ?>
						<p class="mt-6 text-base max-md:max-w-full">
							<?php echo wp_kses_post($custom_data[2]['value']); ?>
						</p>
					<?php endif ?>
				<?php endif; ?>
              </div>
            </div>
          </div>
        </div>
        <div class="grow bg-transparent"></div>
      </div>
    </section>

    <section>
      <div
        class="flex overflow-hidden relative flex-col justify-center items-center px-16 py-20 font-semibold min-h-[480px] max-md:px-5">
		<?php if (!empty($custom_data)) : ?>
			<?php if (isset($custom_data[3]['value'])) : ?>
				<img loading="lazy" src="<?php echo esc_url($custom_data[3]['value']); ?>" class="object-cover absolute inset-0 size-full" />
			<?php endif; ?>
		<?php endif; ?>
        <div
          class="flex relative flex-col justify-center items-center p-10 w-full rounded-lg backdrop-blur-[2px] bg-white bg-opacity-80 max-w-layout max-md:px-5 max-md:max-w-full">
		  	<?php if (!empty($custom_data)) : ?>
				<?php if (isset($custom_data[4]['value'])) : ?>
					<div class="text-6xl font-bold text-center text-[#56A012] leading-[84px] max-md:max-w-full max-md:text-4xl">
						<?php echo wp_kses_post($custom_data[4]['value']); ?>
					</div>
				<?php endif; ?>
				<?php if (isset($custom_data[5]['value'])) : ?>
					<div class="self-stretch mt-6 text-xl leading-7 text-center text-stone-950 max-md:max-w-full">
						<?php echo wp_kses_post($custom_data[5]['value']); ?>
					</div>
				<?php endif; ?>
			<?php endif; ?>
          <button type="button"
            class="showModal flex gap-2 justify-center px-4 py-2 mt-8 text-sm leading-6 text-white rounded border border-lime-600 border-solid shadow bg-stone-950">
            <div>Get in touch</div>
            <img loading="lazy"
              src="https://cdn.builder.io/api/v1/image/assets/TEMP/9f56b6a25cd09f6f7e0056d75f88ca23a3ee86675271fd5267b19558bef1a58d?"
              class="shrink-0 my-auto w-4 aspect-square" />
          </button>
        </div>
      </div>
    </section>

    <section>
      <div class="flex justify-center items-center py-40 bg-primary max-md:px-5 max-md:py-16">
        <div class="flex flex-col w-full max-w-layout mx-auto max-md:max-w-full">
          <div class="text-6xl font-bold text-white max-md:max-w-full max-md:text-4xl">
            See what you can learn with
            <span class="text-white">Fourier Academy</span>
          </div>
          <div class="mt-6 text-base font-semibold leading-6 text-white max-md:max-w-full">
            We offer on-the-job training courses in professional learning
            environment which enable learners to:
          </div>
          <div class="mt-16 max-md:mt-0">
            <div class="flex gap-5 max-md:flex-col max-md:gap-0">
              <div class="flex flex-col w-[33%] max-md:ml-0 max-md:w-full">
                <div
                  class="flex flex-col grow self-stretch px-6 py-8 mx-auto w-full rounded-2xl bg-[#262626] max-md:px-5 max-md:mt-8">
                  <div class="flex gap-5 text-2xl font-medium leading-8 text-center whitespace-nowrap text-neutral-500">
                    <div>01</div>
                    <div class="flex-1 shrink-0 my-auto h-px bg-neutral-500"></div>
                  </div>
                  <img loading="lazy" src="<?php bloginfo('template_directory')?>/assets/img/home/briefcase.png" class="mt-8 w-12 aspect-square" />
                  <div class="mt-3 text-sm leading-6 text-white">
                    Acquire specialized skills more quickly compared to
                    learning only through theory
                  </div>
                </div>
              </div>
              <div class="flex flex-col ml-5 w-[33%] max-md:ml-0 max-md:w-full">
                <div
                  class="flex flex-col grow px-6 py-8 mx-auto w-full rounded-2xl bg-[#262626] max-md:px-5 max-md:mt-8">
                  <div class="flex gap-5 text-2xl font-medium leading-8 text-center whitespace-nowrap text-neutral-500">
                    <div>02</div>
                    <div class="flex-1 shrink-0 my-auto h-px bg-neutral-500"></div>
                  </div>
                  <img loading="lazy"
                    src="https://cdn.builder.io/api/v1/image/assets/TEMP/ce3ac24a2087d87641463ad87ad80fce829a7ddea8b952e62dff149d8cf33958?"
                    class="mt-8 w-12 aspect-square" />
                  <div class="mt-3 text-sm leading-6 text-white">
                    Develop soft skills such as communication, teamwork,
                    problem-solving, and time management during the work
                    process
                  </div>
                </div>
              </div>
              <div class="flex flex-col ml-5 w-[33%] max-md:ml-0 max-md:w-full">
                <div
                  class="flex flex-col grow px-6 py-8 mx-auto w-full rounded-2xl bg-[#262626] max-md:px-5 max-md:mt-8">
                  <div class="flex gap-5 text-2xl font-medium leading-8 text-center whitespace-nowrap text-neutral-500">
                    <div>03</div>
                    <div class="flex-1 shrink-0 my-auto h-px bg-neutral-500"></div>
                  </div>
                  <img loading="lazy"
                    src="https://cdn.builder.io/api/v1/image/assets/TEMP/5dea0b177a25121a2e12614bbc77c8ac048dc78f3d91305202ef6c9f70dc46d6?"
                    class="mt-8 w-12 aspect-square" />
                  <div class="mt-3 text-sm leading-6 text-white">
                    Develop soft skills such as communication, teamwork,
                    problem-solving, and time management during the work
                    process
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="flex justify-center items-center px-16 py-20 bg-white text-stone-950 max-md:px-5">
      <div class="flex flex-col w-full max-w-layout max-md:max-w-full">
        <div class="text-6xl font-bold text-center leading-[84px] max-md:max-w-full max-md:text-4xl">
          Our Client's Experience
        </div>
        <div class="mt-6 text-base leading-6 text-center max-md:max-w-full">
          Enhance agility, lower costs, and expedite innovation.
        </div>

        <div id="progressItem"
          class="flex flex-nowrap overflow-x-auto my-16 text-base font-semibold leading-6 text-center bg-[#F1F1F1] text-neutral-800 max-md:mt-10">
          <!-- RENDER  -->
        </div>
        <div id="progressDetail" class="relative">
          <!-- RENDER -->
        </div>
        </div>
      </div>
    </section>
  </main>
<?php
get_footer();
?>