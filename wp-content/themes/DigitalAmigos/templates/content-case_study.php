<h2 class="section-title text-center mb-5"><?php the_title(); ?></h2>
<div class="row d-flex align-items-center">
    <div class="col-lg-7">
        <?php the_content(); ?>
    </div>
    <div class="col-lg-5">
        <?php if($case_study_slider = get_field('case_study_slider')): ?>
            <div class="case-study-slider mb-3">
                <?php foreach ($case_study_slider as $image): ?>
                    <div><?php echo wp_get_attachment_image( $image['ID'], array('1024', '685'), '', array('class' => 'img-fluid' ) ); ?></div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <?php if($case_study_slider2 = get_field('case_study_slider2')): ?>
            <div class="case-study-slider">
                <?php foreach ($case_study_slider2 as $image): ?>
                    <div><?php echo wp_get_attachment_image( $image['ID'], array('1024', '685'), '', array('class' => 'img-fluid' ) ); ?></div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</div>