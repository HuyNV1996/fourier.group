<?php
/* Template Name: Smartsoft Page */

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
                  <span class="text-primary">SmartSoft Solutions</span>
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
    <section class="flex justify-center items-center px-16 py-20 bg-stone-950 max-md:px-5">
		<div class="flex flex-col w-full max-w-layout max-md:max-w-full">
			<?php if (!empty($custom_texts)) : ?>
				<h1 class="text-6xl font-bold text-center text-white leading-[84px] max-md:max-w-full max-md:text-4xl">
					<?php echo wp_kses_post($custom_texts[2]); ?>
				</h1>
				<p class="mt-6 text-base leading-6 text-center text-white max-md:max-w-full">
					<?php echo wp_kses_post($custom_texts[3]); ?>
				</p>
			<?php endif; ?>
        <div class="mt-12 max-md:mt-10 max-md:max-w-full">
          <div class="flex gap-[116px] max-md:flex-col max-md:gap-0 items-center">
            <aside class="flex flex-col grow max-md:ml-0 max-md:w-full">
              <ul class="w-full">
				<?php if (!empty($slider_data)) :
					$data = $slider_data[0];
					foreach ($data['item'] as $i => $item) :
						$text = isset($data['text'][$i]) ? $data['text'][$i] : ''; ?>
						<li class="smart-list-item">
							<span class="max-md:text-base"><?php echo esc_attr($item); ?></span><i class='bx bx-right-arrow-alt'></i>
						</li>
						<li class="smart-list-panel md:hidden">
							<div class="flex flex-col gap-4 py-4">
								<p
								class="p-10 text-xl font-medium leding-7 text-white border-2 border-solid border-secondary max-md:px-5 max-md:max-w-full">
								<?php echo esc_attr($text); ?></p>
								<img loading="lazy" src="<?php bloginfo('template_directory')?>/assets/images/bg1.jfif" alt="Solutions overview image"
								class="w-full aspect-[1.33] max-md:max-w-full object-cover rounded-lg overflow-hidden" />
							</div>
						</li>
					<?php endforeach;
				endif ?>
              </ul>
            </aside>

            <aside class="flex flex-col w-1/2 shrink-0 max-md:ml-0 max-md:w-full max-md:hidden">
				<div class="flex flex-col grow max-md:mt-10 max-md:max-w-full">
				<?php if (!empty($slider_data)) :
					$data = $slider_data[0];
					foreach ($data['img_url'] as $i => $img_url) :
						$text = isset($data['text'][$i]) ? $data['text'][$i] : ''; ?>
						<div class="slide-content hidden">
							<img loading="lazy" src="<?php echo esc_url($img_url); ?>" alt="Solutions overview image"
								class="w-full aspect-[1.33] max-md:max-w-full object-cover" />
							<div
								class="justify-center p-10 mt-10 text-xl font-medium leding-7 text-white border-2 border-lime-600 border-solid max-md:px-5 max-md:max-w-full">
								<?php echo esc_attr($text); ?></div>
						</div>
					<?php endforeach;
				endif ?>
                <div class="flex gap-4 self-end mt-10 max-md:flex-wrap max-md:pl-5">
                  <button onclick="pushSlide(-1)"
                    class="btn-slide flex justify-center items-center p-2 md:w-10 md:h-10 rounded-full p-1">
                    <i class='bx bx-chevron-left text-white md:text-2xl text-lg'></i>
                  </button>
                  <button onclick="pushSlide(1)"
                    class="btn-slide flex justify-center items-center p-2 md:w-10 md:h-10 rounded-full p-1">
                    <i class='bx bx-chevron-right text-white md:text-2xl text-lg'></i>
                  </button>
                </div>
              </div>
              </á>
          </div>
        </div>
      </div>
    </section>
    <!-- FORM -->
    <section class="md:mt-[160px] bg-white flex items-center justify-center relative max-md:px-5 max-md:py-16">
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
            <?php echo custom_email_form() ?>
          </div>
        </div>
      </div>
    </section>
  </main>

<?php get_footer(); ?>