<?php
/* Template Name: Oursourcing Page */

if (is_page()) {
    $page_id = get_the_ID();
    $custom_texts = get_post_meta($page_id, 'custom_texts', true) ?: array();
	$custom_image = get_post_meta($page_id, 'custom_image_urls', true) ?: array();
	$slider_data = get_post_meta($page_id, 'slider_data', true) ?: array();
}
get_header();
?>
  <main>
    <section class="w-full relative overflow-hidden">
		<?php if (!empty($custom_image)) : ?>
			<img src="<?php echo esc_url($custom_image[0]); ?>" alt="bg"
        	class="absolute top-0 left-0 shrink-0 w-full h-full object-cover">
		<?php endif; ?>
      <div
        class="max-w-layout mx-auto min-h-[440px] max-md:min-h-[300px] text-white w-full flex items-center max-md:items-start relative gap-8 max-md:py-16 max-md:px-5">
        <div class="w-1/2 max-md:w-full flex flex-col gap-8">
			<?php if (!empty($custom_texts)) : ?>
				<h2 class="font-bold md:text-[56px] text-4xl"><?php echo wp_kses_post($custom_texts[0]); ?></h2>
				<p class="text-base">
					<?php echo wp_kses_post($custom_texts[1]); ?>
				</p>
			<?php endif; ?>
          <button type="button"
            class="flex gap-2 self-start justify-center items-center px-4 py-2 text-base max-md:text-sm font-semibold leading-6 text-white rounded border-gradient shadow">
            <span>Get in touch</span>
            <i class='bx bx-right-arrow-alt text-xl max-md:text-base'></i>
        </div>
      </div>
    </section>

    <section class="flex justify-center items-center bg-white px-16 py-20 max-md:px-0 max-md:py-16">
      <div class="flex flex-col my-20 max-md:my-0 w-full max-w-layout max-md:max-w-full">
        <h1 class="text-6xl max-md:text-[32px] max-md:px-5 font-bold text-primary max-md:max-w-full max-md:text-4xl">Our
          resources
          3+
          years experience</h1>
        <div
          class="mt-16 max-md:max-w-full max-md:ml-5 max-md:pr-5 grid grid-cols-3 max-md:flex gap-16 max-md:gap-6 overflow-x-auto">
          <div class="flex flex-col pb-4 min-w-[300px]">
            <img loading="lazy"
              src="https://cdn.builder.io/api/v1/image/assets/TEMP/e353a87e165aeb3b57df9fe7d8c5710b4624c60e013278118a03db6852e15062?apiKey=1e64eec6fea84ac4ac698f954b5985e2&"
              alt="Portrait of Annette Black" class="w-full aspect-square object-cover" />
            <div class="flex gap-5 justify-start mt-12 max-md:mt-10">
              <div class="shrink-0 w-1 bg-lime-600 h-[60px]"></div>
              <div class="flex flex-col">
                <h2 class="text-2xl font-bold leading-8 text-primary">Annette Black</h2>
                <p class="mt-1 text-base leading-6 text-neutral-800">Technical developer</p>
              </div>
            </div>
          </div>
          <div class="flex flex-col pb-4 min-w-[300px]">
            <img loading="lazy"
              src="https://cdn.builder.io/api/v1/image/assets/TEMP/e353a87e165aeb3b57df9fe7d8c5710b4624c60e013278118a03db6852e15062?apiKey=1e64eec6fea84ac4ac698f954b5985e2&"
              alt="Portrait of Annette Black" class="w-full aspect-square object-cover" />
            <div class="flex gap-5 justify-start mt-12 max-md:mt-10">
              <div class="shrink-0 w-1 bg-lime-600 h-[60px]"></div>
              <div class="flex flex-col">
                <h2 class="text-2xl font-bold leading-8 text-primary">Annette Black</h2>
                <p class="mt-1 text-base leading-6 text-neutral-800">Technical developer</p>
              </div>
            </div>
          </div>
          <div class="flex flex-col pb-4 min-w-[300px]">
            <img loading="lazy"
              src="https://cdn.builder.io/api/v1/image/assets/TEMP/e353a87e165aeb3b57df9fe7d8c5710b4624c60e013278118a03db6852e15062?apiKey=1e64eec6fea84ac4ac698f954b5985e2&"
              alt="Portrait of Annette Black" class="w-full aspect-square object-cover" />
            <div class="flex gap-5 justify-start mt-12 max-md:mt-10">
              <div class="shrink-0 w-1 bg-lime-600 h-[60px]"></div>
              <div class="flex flex-col">
                <h2 class="text-2xl font-bold leading-8 text-primary">Annette Black</h2>
                <p class="mt-1 text-base leading-6 text-neutral-800">Technical developer</p>
              </div>
            </div>
          </div>
          <div class="flex flex-col pb-4 min-w-[300px]">
            <img loading="lazy"
              src="https://cdn.builder.io/api/v1/image/assets/TEMP/e353a87e165aeb3b57df9fe7d8c5710b4624c60e013278118a03db6852e15062?apiKey=1e64eec6fea84ac4ac698f954b5985e2&"
              alt="Portrait of Annette Black" class="w-full aspect-square object-cover" />
            <div class="flex gap-5 justify-start mt-12 max-md:mt-10">
              <div class="shrink-0 w-1 bg-lime-600 h-[60px]"></div>
              <div class="flex flex-col">
                <h2 class="text-2xl font-bold leading-8 text-primary">Annette Black</h2>
                <p class="mt-1 text-base leading-6 text-neutral-800">Technical developer</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="py-20 bg-zinc-100 max-md:px-0">
      <div class="flex flex-col w-full max-md:max-w-full">
        <h2
          class="text-6xl max-md:text-[32px] max-md:px-5 font-extrabold text-center text-primary max-md:max-w-full max-md:text-4xl">
          Our Client's Experience</h2>
        <p class="mt-6 text-base leading-6 max-md:px-5 text-center text-primary max-md:max-w-full">Enhance agility, lower costs,
          and expedite innovation.</p>
      </div>
      <!-- SLIDER -->
      <div class="swiper serviceSwiper w-full mt-16 max-md:pb-20">
        <div class="swiper-wrapper">
			<?php if (!empty($slider_data)) :
				$data = $slider_data[0];
				foreach ($data['img_url'] as $i => $img_url) :
					$text = isset($data['text'][$i]) ? $data['text'][$i] : ''; ?>
					<div class="swiper-slide text-primary text-base shadow-lg px-8 py-10 max-md:px-4 max-md:py-6 max-md:max-w-full">
						<img loading="lazy" src="<?php echo esc_url($img_url); ?>" class="w-10 aspect-square" alt="Icon" />
						<p class="mt-6 text-center max-md:max-w-full"><?php echo esc_attr($text); ?></p>
					</div>
				<?php endforeach;
			endif ?>
        </div>
        <div class="swiper-button-next">
          <i class='bx bx-chevron-right text-3xl'></i>
        </div>
        <div class="swiper-button-prev">
          <i class='bx bx-chevron-left text-3xl'></i>
        </div>
      </div>
    </section>

  </main>
  <?php get_footer(); ?>