<section class="section-faq bg-White pt-14 pb-24 xl:pt-32 xl:pb-32">
	<div class="theme-container">
		<div class="theme-grid">
			<?php
			$gi = 0;
			if ( have_rows( 'faq' ) ) :
				while ( have_rows( 'faq' ) ) :
					the_row();
					++$gi;
					?>
					<div class="accordion col-span-2 md:col-span-6 xl:col-span-12 mb-14" data-accordion="single">
						<h2 class="accordion__title title-main text-Dark mb-40 md:mb-16"><?php the_sub_field( 'title' ); ?></h2>
						<div class="accordion__list border-t-[2px] border-Brown md:mt-6">
							<?php
							if ( have_rows( 'accordion_item' ) ) :
								$i = 0;
								while ( have_rows( 'accordion_item' ) ) :
									the_row();
									++$i;
									?>
									<details id="faq-<?php echo esc_attr( $gi . '-' . $i ); ?>" class="accordion__item group border-b-[2px] border-Brown pb-8 md:pb-10" data-accordion-item>
										<summary class="accordion__item-title flex justify-between items-center cursor-pointer pt-8 md:pt-10 [&::-webkit-details-marker]:hidden transition-all duration-500 ease-in-out title-secondary italic text-Dark gap-x-6">
											<h3><?php the_sub_field( 'question' ); ?></h3>
											<span class="accordion__item-icon transition-all duration-500 ease-in-out group-open:rotate-90">
												<svg xmlns="http://www.w3.org/2000/svg" width="25" height="23" fill="none"><path stroke="#25211e" stroke-width="2" d="M23.674 22V1h-23m23 0-23 21"/></svg>
											</span>
										</summary>
										<div class="accordion__item-sub-menu overflow-hidden" data-accordion-panel>
											<div class="body text-Dark pt-6 md:pt-8"><?php the_sub_field( 'answer' ); ?></div>
										</div>
									</details>
									<?php
								endwhile;
							endif;
							?>
						</div>
					</div>
					<?php
				endwhile;
			else :
				echo '<p>' . esc_html__( 'No FAQs found.', 'ambassador' ) . '</p>';
			endif;
			?>
		</div>
	</div>
</section>

