<?php get_header(); ?>

<main>
    <section class="px-16 py-10 max-md:px-5 max-md:py-16">
		<div class="flex flex-col max-w-layout mx-auto max-w-full items-start">
			<div class="flex flex-col md:w-[70%] w-full">
					<?php if (have_posts()) :
						while (have_posts()) : the_post();
							setpostview(get_the_id()); ?>
							<div class="flex gap-2 text-sm font-medium leading-6 text-neutral-400 max-md:flex-wrap">
								<div>Case study</div>
								<div>/</div>
								<div class="text-primary max-md:max-w-full">
									<?php the_title(); ?>
								</div>
							</div>
							<div class="justify-center self-start px-2 py-1 mt-10 text-xs font-semibold leading-5 bg-lime-200 rounded text-primary">
								Financial Services
							</div>
							<div class="mt-6 text-4xl font-extrabold leading-[60px] text-primary max-md:max-w-full">
								<?php the_title(); ?>
							</div>
							<div class="mt-8 text-base leading-6 text-primary max-md:max-w-full"><?php the_content(); ?></div>
							<div class="post-navigation mt-5">
							</div>
						<?php endwhile; else : ?>
						<p>Không có</p>
					<?php endif; ?>
				</div>
			</div>

			<!-- SHARE POST -->
			<div class="flex flex-col justify-center mt-8 w-full md:w-[70%]">
				<div class="w-full bg-primary min-h-[1px] max-md:max-w-full"></div>
				<div class="flex gap-4 self-end  mt-6">
					<div class="my-auto text-base font-semibold leading-6 text-primary">
					Share this post:
					</div>
					<button
					class="flex justify-center items-center p-2.5 w-10 h-10 bg-white rounded border border-solid shadow-sm border-neutral-200">
						<img loading="lazy"
							src="https://cdn.builder.io/api/v1/image/assets/TEMP/66823c490ff224beebf41c7a4b716310d95791592bea5b46adaecb5514042940?"
							class="w-5 aspect-square" />
					</button>
					<button
					class="flex justify-center items-center p-2.5 w-10 h-10 bg-white rounded border border-solid shadow-sm border-neutral-200">
						<img loading="lazy"
							src="https://cdn.builder.io/api/v1/image/assets/TEMP/0265ef3fca0e474a8a0a0b7baf9f032885f618fd00ad776e8f318877193f7b5c?"
							class="w-5 aspect-square" />
					</button>
					<button
					class="flex justify-center items-center p-2.5 w-10 h-10 bg-white rounded border border-solid shadow-sm border-neutral-200">
						<img loading="lazy"
							src="https://cdn.builder.io/api/v1/image/assets/TEMP/d9e72feb754ce27de169ffb56fd1490a98a918ba9744f517791efe82c1747cc6?"
							class="w-5 aspect-square" />
					</button>
				</div>
			</div>
		</div>
    </section>

    <section class="flex justify-center items-center px-16 py-20 max-md:px-5 max-md:py-16">
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
					<article class="flex flex-col flex-1 max-md:flex-0 min-w-[320px]  max-md:ml-0 max-md:w-full">
						<img loading="lazy"
							src="https://cdn.builder.io/api/v1/image/assets/TEMP/880bf8471753e76bdacaf899d1f98277718b14948f5242edc3fc619760430467?apiKey=1e64eec6fea84ac4ac698f954b5985e2&"
							alt="Ba hiểu lầm phổ biến về chế độ tuyển dụng trọn đời ở Nhật Bản" class="w-full aspect-[1.56]" />
						<span
							class="justify-center self-start px-2 py-1 mt-4 text-xs font-bold leading-5 whitespace-nowrap bg-lime-200 rounded">Education</span>
						<h2 class="mt-4 text-base font-bold">
							<a href="#" class="hover:underline hover:text-secondary">
							Ba hiểu lầm phổ biến về chế độ tuyển dụng trọn đời ở Nhật Bản
							</a>
						</h2>
						<p class="mt-4 text-sm text-neutral-400">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
							eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,</p>
					</article>
					<article class="flex flex-col flex-1 max-md:flex-0 min-w-[320px] max-md:ml-0 max-md:w-full">
						<img loading="lazy"
							src="https://cdn.builder.io/api/v1/image/assets/TEMP/5df021f066b577de0333183de9f4df73c67e20bf242789f9eb1c9bd5d018bdc1?apiKey=1e64eec6fea84ac4ac698f954b5985e2&"
							alt="Ba hiểu lầm phổ biến về chế độ tuyển dụng trọn đời ở Nhật Bản" class="w-full aspect-[1.56]" />
						<span
							class="justify-center self-start px-2 py-1 mt-4 text-xs font-bold leading-5 whitespace-nowrap bg-lime-200 rounded">Education</span>
						<h2 class="mt-4 text-base font-bold">
							<a href="#" class="hover:underline hover:text-secondary">
							Ba hiểu lầm phổ biến về chế độ tuyển dụng trọn đời ở Nhật Bản
							</a>
						</h2>
						<p class="mt-4 text-sm text-neutral-400">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
							eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,</p>
					</article>
					<article class="flex flex-col flex-1 max-md:flex-0 min-w-[320px] max-md:ml-0 max-md:w-full">
						<img loading="lazy"
							src="https://cdn.builder.io/api/v1/image/assets/TEMP/cf2704fafa99182868af1f5050e6042b8a1fcec1937adb413b172adc6a44b66c?apiKey=1e64eec6fea84ac4ac698f954b5985e2&"
							alt="Ba hiểu lầm phổ biến về chế độ tuyển dụng trọn đời ở Nhật Bản" class="w-full aspect-[1.56]" />
						<span
							class="justify-center self-start px-2 py-1 mt-4 text-xs font-bold leading-5 whitespace-nowrap bg-lime-200 rounded">Education</span>
						<h2 class="mt-4 text-base font-bold">
							<a href="#" class="hover:underline hover:text-secondary">
							Ba hiểu lầm phổ biến về chế độ tuyển dụng trọn đời ở Nhật Bản
							</a>
						</h2>
						<p class="mt-4 text-sm text-neutral-400">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
							eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,</p>
					</article>
				</div>
			</div>
		</div>
    </section>
</main>

<?php get_footer(); ?>