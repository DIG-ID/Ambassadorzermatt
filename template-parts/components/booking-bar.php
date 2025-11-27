<div id="booking-bar" class="booking-bar fixed theme-container bottom-11 left-1/2 -translate-x-1/2 w-full !max-w-[960px] z-30 mx-auto">
  <div class="theme-grid rounded-full bg-[rgba(118,106,102,0.35)] bg-gradient-to-b from-white/10 to-black/10 backdrop-blur-xl backdrop-saturate-150">
    <div class="col-span-2 md:col-span-6 xl:col-span-12 flex justify-center md:justify-evenly items-center pt-3 pb-5 xl:pt-3 xl:pb-5">
      <a href="<?php the_field( 'general_booking_url', 'option' ); ?>" target="_blank" class="btn btn-sticky-bar-light max-w-64"><?php esc_html_e( 'Jetzt buchen','ambassador' ); ?></a>
      <a href="<?php the_field( 'general_table_reservation_url', 'option' ); ?>" target="_blank" class="btn btn-sticky-bar-light max-w-64 !hidden md:!block"><?php esc_html_e( 'Tisch reservieren','ambassador' ); ?></a>
    </div>
  </div>
</div>