<?php
$bg_id = get_field('ambassador_bar_background_image');
$bg_url = $bg_id ? wp_get_attachment_image_url($bg_id, 'full') : '';
$style  = $bg_url ? "background-image: url('".esc_url($bg_url)."');" : '';
?>

<section id="ambassador-bar"
  class="ambassador-bar relative bg-cover bg-center bg-no-repeat"
  style="<?php echo $style; ?>">
    <div class="theme-container">
        <div class="theme-grid">
            <div class="xl:col-start-7 xl:col-span-6 bg-White xl:mt-[7.19rem] xl:mb-[7.19rem] w-screen">
                <div class="title-main text-Dark xl:pt-[3.94rem]">
                    <h1><?php the_field('ambassador_bar_title')?></h1>
                </div>
                <div class="body text-Dark xl:pt-[1.87rem]">
                    <p><?php the_field('ambassador_bar_Description')?></p>
                </div>
                <div class="col-span-5">
                    <?php
                    $link = get_field('ambassador_bar_button');
                    if ($link):
                    $link_url = $link['url'];
                    $link_title = $link['title'];
                    $link_target = $link['target'] ? $link['target'] : '_self';
                    ?>
                    <a href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>" class="btn btn-primary xl:mt-[8.44rem] xl:mb-[4rem]">
                            <?php echo esc_html($link_title); ?>
                    </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>