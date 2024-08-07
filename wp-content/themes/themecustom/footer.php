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
						<?php wp_nav_menu(array(
							'theme_location' => 'topmenu',
							'container' => 'false',
							'menu_id' => 'menu-footer',
							'menu_class' => 'flex-1 text-primary leading-6 gap-2 hidden md:flex',
						)) ?>
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
			<?php echo custom_email_form() ?>
		</div>
	</section>

	<div id="fb-root"></div>

	<script src="<?php bloginfo('template_directory')?>/assets/js/tailwind_custom.js"></script>
	<script src="<?php bloginfo('template_directory')?>/assets/js/layout.js"></script>
	<script src="<?php bloginfo('template_directory')?>/assets/js/smartsoft.js"></script>
	<script src="<?php bloginfo('template_directory')?>/assets/js/timeline.js"></script>
	<script src="<?php bloginfo('template_directory')?>/assets/js/slider.js"></script>
	<script src="<?php bloginfo('template_directory')?>/assets/js/it_academy.js"></script>
	<script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
	<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v20.0&appId=346175334287374" nonce="5AGWWsN7"></script>
</body>

</html>