<?php
/* Template Name: Overview Page */

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
    <!-- CONTENT HERE -->
    <section class="w-full relative overflow-hidden">
		<?php if (!empty($custom_data)) : ?>
			<?php if (isset($custom_data[0]['value'])) : ?>
				<img src="<?php echo esc_url($custom_data[0]['value']); ?>" alt="bg"
        		class="absolute top-0 left-0 shrink-0 w-full h-full object-cover">
			<?php endif; ?>
		<?php endif; ?>
      <div
        class="max-w-layout mx-auto min-h-[720px] max-md:min-h-[500px] flex flex-col justify-center relative gap-6 text-white max-md:py-16 max-md:px-5 ">
		<?php if (!empty($custom_data)) : ?>
			<?php if (isset($custom_data[1]['value'])) : ?>
				<h1 class="text-[56px] max-md:text-[32px] font-extrabold">
					<?php echo wp_kses_post($custom_data[1]['value']); ?>
				</h1>
			<?php endif; ?>
			<?php if (isset($custom_data[2]['value'])) : ?>
				<p class="max-w-[720px] self-start">
					<?php echo wp_kses_post($custom_data[2]['value']); ?>
				</p>
			<?php endif; ?>
		<?php endif; ?>
      </div>
    </section>

    <section>
      <div class="flex justify-center items-center px-16 py-20 bg-stone-950 max-md:px-5">
        <div class="flex flex-col text-white mt-20 w-full max-w-[1208px] max-md:mt-10 max-md:max-w-full">
			<?php if (!empty($custom_data)) : ?>
				<?php if (isset($custom_data[3]['value'])) : ?>
					<div class="text-6xl text-center font-semibold leading-[84px] max-md:max-w-full max-md:text-4xl">
						<?php echo wp_kses_post($custom_data[3]['value']); ?>
					</div>
				<?php endif; ?>
				<?php if (isset($custom_data[4]['value'])) : ?>
					<div class="mt-6 text-base text-center leading-6 text-white max-md:max-w-full">
						<?php echo wp_kses_post($custom_data[4]['value']); ?>
					</div>
				<?php endif; ?>
			<?php endif; ?>
          <div class="mt-12 max-md:mt-10 max-md:max-w-full">
            <div class="flex gap-5 max-md:flex-col max-md:gap-0">
              <div class="flex flex-col w-[59%] max-md:ml-0 max-md:w-full">
                <div class="flex flex-col grow max-md:mt-8 max-md:max-w-full">
					<?php
						// Lấy danh sách các trang đã xuất bản
						$exclude_pages = array(
							get_page_id_by_title('Contact us'),
							get_page_id_by_title('Home'),
							get_page_id_by_title('Case study'),
							get_page_id_by_title('Solutions'),
						);

						$pages = get_pages(array(
							'exclude' => $exclude_pages,
							'sort_column' => 'post_title',
							'sort_order' => 'asc'
						));

						$counter = 1;

						foreach ($pages as $page) {
							// Tạo đường dẫn đến trang
							$page_link = get_permalink($page->ID);
							// Lấy tiêu đề và mô tả của trang
							$title = esc_html($page->post_title);
							$description = esc_html(get_post_meta($page->ID, '_custom_page_description', true));
							if ($title == 'Technology Consulting') { ?>
								<a href="<?php echo esc_url($page_link); ?>" class="card flex flex-col py-8 px-6 rounded-2xl bg-neutral-800 max-md:p-4 max-md:max-w-full">
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
											<div class="flex-1 bg-clip-text title-gradient"><?php echo $title; ?></div>
											<img loading="lazy"
												src="<?php bloginfo('template_directory')?>/assets/images/arrow-top-right.svg"
												class="shrink-0 self-start mt-2 w-8 aspect-square" />
											</div>
											<div class="mt-3 text-sm leading-6 text-white">
												<?php echo $description; ?>
											</div>
										</div>
										</div>
									</div>
									</div>
								</a>
							<?php }
						} ?>

                  <div class="md:mt-8 max-md:max-w-full">
                    <div class="flex gap-5 max-md:flex-col max-md:gap-0">
						<?php foreach ($pages as $page) {
							// Tạo đường dẫn đến trang
							$page_link = get_permalink($page->ID);
							// Lấy tiêu đề và mô tả của trang
							$title = esc_html($page->post_title);
							$description = esc_html(get_post_meta($page->ID, '_custom_page_description', true));
							if ($title != 'Technology Consulting' && $title != 'IT Academy') {
								$counter++; ?>
								<a href="<?php echo esc_url($page_link); ?>" class="max-md:mt-8 card flex flex-col w-6/12 max-md:ml-0 max-md:w-full">
									<div class="flex flex-col grow self-stretch px-6 py-8 mx-auto w-full text-white rounded-2xl bg-neutral-800 max-md:p-4">
										<div class="flex gap-5 text-2xl font-medium leading-8 text-center whitespace-nowrap text-neutral-400">
											<div><?php echo sprintf('%02d', $counter); ?></div>
											<div class="flex-1 shrink-0 my-auto h-px bg-neutral-400"></div>
										</div>
										<div class="flex gap-1 px-px mt-8 text-3xl font-bold leading-10">
											<div class="flex-1 bg-clip-text title-gradient"><?php echo $title; ?></div>
											<img loading="lazy" src="<?php bloginfo('template_directory'); ?>/assets/images/arrow-top-right.svg" class="shrink-0 self-start mt-2 w-8 aspect-square" />
										</div>
										<div class="mt-3 text-sm leading-6 text-white">
											<?php echo $description; ?>
										</div>
									</div>
								</a>
							<?php }
						} ?>
                    </div>
                  </div>
                </div>
              </div>
              <div class="flex flex-col ml-5 w-[41%] max-md:ml-0 max-md:w-full">
				<?php foreach ($pages as $page) {
					// Tạo đường dẫn đến trang
					$page_link = get_permalink($page->ID);
					// Lấy tiêu đề và mô tả của trang
					$title = esc_html($page->post_title);
					$description = esc_html(get_post_meta($page->ID, '_custom_page_description', true));
					if ($title == 'IT Academy') { ?>
						<a href="<?php echo esc_url($page_link); ?>"
						class="card flex flex-col grow self-stretch px-6 py-8 w-full text-white rounded-2xl bg-neutral-800 max-md:p-4 max-md:mt-8 max-md:max-w-full">
							<img loading="lazy" src="<?php bloginfo('template_directory')?>/assets/img/home/it.png" class="w-full aspect-[1.48] max-md:max-w-full object-cover rounded-lg" />
							<div
								class="flex gap-5 mt-8 text-2xl font-medium leading-8 text-center whitespace-nowrap text-neutral-400 max-md:flex-wrap">
								<div>04</div>
								<div class="flex-1 shrink-0 my-auto h-px bg-neutral-400"></div>
							</div>
							<div class="flex gap-1 px-px mt-8 text-3xl font-bold leading-10">
								<div class="flex-1 bg-clip-text title-gradient"><?php echo $title; ?></div>
								<img loading="lazy"
								src="<?php bloginfo('template_directory')?>/assets/images/arrow-top-right.svg"
								class="shrink-0 self-start mt-2 w-8 aspect-square" />
							</div>
							<div class="mt-3 text-sm leading-6 text-white">
								<?php echo $description; ?>
							</div>
						</a>
					<?php }
				} ?>
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
                    <img loading="lazy"
                      src="<?php bloginfo('template_directory')?>/assets/images/arrow-top-right.svg"
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

    <section class="flex justify-center items-center px-16 py-20 bg-zinc-100 max-md:px-5">
      <div class="mt-20 max-md:mt-0 w-full max-w-layout max-md:max-w-full">
        <div class="flex max-md:flex-col-reverse space-x-20 max-md:space-x-0 max-md:gap-8">
          <article class="flex flex-col w-[57%] max-md:w-full">
            <div class="grow max-md:max-w-full">
              <div class="flex gap-6 max-md:flex-col max-md:gap-8">
                <figure class="w-[61%] max-md:ml-0 max-md:w-full">
                  <img loading="lazy"
                    src="https://cdn.builder.io/api/v1/image/assets/TEMP/2da3e4fb25db48080322852f0685f4e0bd2a78ff21e2cae6c76649b80f8532d6?apiKey=1e64eec6fea84ac4ac698f954b5985e2&"
                    alt="Primary visual representation"
                    class="w-full rounded-lg aspect-[0.75] max-md:aspect-video object-cover" />
                </figure>
                <figure class="flex flex-col gap-6 max-md:flex-row w-[39%] max-md:w-full">
                  <div class="flex-1">
                    <img loading="lazy"
                      src="https://cdn.builder.io/api/v1/image/assets/TEMP/fd71c0f00c4c4e501a74d223cdce6274aef421c360a4950c945a779cc92ab65d?apiKey=1e64eec6fea84ac4ac698f954b5985e2&"
                      alt="Secondary visual representation" class="w-full rounded-lg aspect-square" />
                  </div>
                  <div class="flex-1">
                    <img loading="lazy"
                      src="https://cdn.builder.io/api/v1/image/assets/TEMP/fab90067bdf9a761ee607de62616db7e701be0cb041150f0684b8a01f92bf52e?apiKey=1e64eec6fea84ac4ac698f954b5985e2&"
                      alt="Tertiary visual representation" class="w-full rounded-lg aspect-square" />
                  </div>
                </figure>
              </div>
            </div>
          </article>
          <aside class="flex flex-col w-[43%] max-md:w-full">
            <section class="flex flex-col max-md:max-w-full">
              <p
                class="justify-center p-10 text-xl font-semibold leading-7 border-2 border-secondary border-solid text-primary max-md:px-5 max-md:max-w-full">
                We collaborate with you and your teams to identify, design, and develop the organizational and technical
                capabilities necessary to evolve into a modern, digitally-driven enterprise.
              </p>
              <p class="mt-16 text-base leading-6 text-neutral-800 max-md:mt-10 max-md:max-w-full">
                To achieve success, you need a partner who can bridge the gap between strategy and practical
                implementation, leveraging cross-functional teams of strategies, developers, data engineers and
                designers.
              </p>
            </section>
          </aside>
        </div>
      </div>
    </section>

    <section class="flex justify-center items-center px-16 py-20 max-md:px-5">
      <div class="flex flex-col w-full max-w-llayout max-md:max-w-full">
        <div class="flex gap-2.5 max-md:gap-4 max-md:flex-col">
          <h1 class="flex-1 text-6xl max-md:text-[32px] font-semibold text-stone-950 max-md:max-w-full">Case
            studies</h1>
          <a href="#"
            class="flex gap-4 py-3 my-auto text-xl font-medium border-b-2 border-secondary border-solid text-primary self-start">
            <span>Explore more</span>
            <img loading="lazy"
              src="https://cdn.builder.io/api/v1/image/assets/TEMP/25d76aed48e8fd9058db7ac7ae74b4898cd94cf84bc9cd0aa5ac469f45cb2275?apiKey=1e64eec6fea84ac4ac698f954b5985e2&"
              alt="Explore more icon" class="shrink-0 my-auto w-6 aspect-square" />
          </a>
        </div>

        <div class="mt-16 max-md:mt-8 max-md:max-w-full">
          <div class="flex flex-nowrap gap-5 overflow-x-auto max-md:pb-2">
		  	<?php $query = get_custom_posts(3);

				// Kiểm tra nếu có bài viết
				if ($query->have_posts()) :
					while ($query->have_posts()) : $query->the_post(); ?>
						<article class="flex flex-col flex-1 max-md:flex-0 min-w-[320px]  max-md:ml-0 max-md:w-full">
							<?php echo get_the_post_thumbnail(get_the_id(), 'full', array('class' => 'w-full aspect-[1.56] rounded-lg', 'alt' => 'Ba hiểu lầm phổ biến về chế độ tuyển dụng trọn đời ở Nhật Bản')); ?>
							<span
								class="justify-center self-start px-2 py-1 mt-4 text-xs font-bold leading-5 whitespace-nowrap bg-lime-200 rounded">Education</span>
							<h2 class="mt-4 text-base font-bold">
								<a href="<?php the_permalink(); ?>" class="hover:underline hover:text-secondary">
									<?php the_title(); ?>
								</a>
							</h2>
							<p class="mt-4 text-sm text-neutral-400"><?php the_excerpt(); ?></p>
						</article>
					<?php endwhile;
					wp_reset_postdata(); // Đặt lại dữ liệu bài viết
				endif;
			?>
          </div>
        </div>
      </div>
    </section>
  </main>

  <?php get_footer(); ?>