<?php
/* Template Name: Home Page */

$query = new WP_Query(array(
    'post_type'   => 'page',
    'title'       => 'Home',
    'posts_per_page' => 1
));

if ($query->have_posts()) {
    $query->the_post();
    $page_id = get_the_ID();
    $custom_data = get_post_meta($page_id, 'custom_data', true) ?: [];
    usort($custom_data, function($a, $b) {
        return ($a['index'] <=> $b['index']);
    });
    wp_reset_postdata();
}

get_header();
?>

	<main>
		<section>
			<div class="flex justify-center items-center px-16 py-20 max-md:px-5 max-md:py-16">
				<div class="w-full max-w-layout max-md:max-w-full">
					<div class="flex gap-5 max-md:flex-col max-md:gap-0">
						<div class="flex flex-col w-[54%] max-md:ml-0 max-md:w-full">
							<div
								class=" font-bold text-secondary max-md:max-w-full md:text-[56px] text-[32px] md:text-start text-center">
								<?php if (!empty($custom_data)) : ?>
									<?php if (isset($custom_data[0]['value'])) : ?>
										<span class="text-primary">&quot;<?php echo $custom_data[0]['value']; ?><span class="text-secondary"> <?php echo $custom_data[1]['value']; ?></span>&quot;
										</span>
									<?php endif; ?>
								<?php endif; ?>
							</div>
						</div>
						<div class="flex flex-col ml-5 w-[46%] max-md:ml-0 max-md:w-full">
							<div class="self-stretch my-auto text-base leading-6 text-primary max-md:mt-8 max-md:max-w-full md:text-start text-center">
								<?php echo wpautop(get_data($custom_data, 'Description')); ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

		<section>

			<div
				class="flex overflow-hidden relative flex-col justify-center items-start px-16 py-20 min-h-[560px] max-md:px-5 max-md:py-16">
					<img loading="lazy" src="<?php echo esc_url(get_data($custom_data, 'banner')); ?>" class="object-cover absolute inset-0 size-full" />
				<div class="flex relative flex-col mt-7 ml-0 md:ml-14 max-w-full">
					<?php if (!empty($custom_data)) : ?>
						<?php if (isset($custom_data[4]['value'])) : ?>
						<div class="text-[32px] w-[80%] md:w-[54%] font-bold text-white max-md:max-w-full md:text-[56px]">
						&quot;<?php echo $custom_data[4]['value']; ?>
							<span class="text-secondary"><?php echo $custom_data[5]['value']; ?></span>.&quot;
						</div>
						<div class="mt-6 text-base leading-6 text-white max-md:max-w-full w-full md:w-[65%]"><?php echo $custom_data[6]['value']; ?></div>
						<?php endif; ?>
					<?php endif; ?>
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
										<a href="<?php echo esc_url($page_link); ?>" class="card flex flex-col w-6/12 max-md:ml-0 max-md:w-full max-md:mt-8">
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
				<?php echo custom_email_form() ?>
			</div>
			</div>
		</div>
		</section>
	</main>

  <?php get_footer(); ?>