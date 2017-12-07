<?php
/**
 * Template Name: Page - Home
 */
?>

<?php if(get_field('intro_content')): ?>
<section id="aboutUs" class="section bg-white">
    <div class="container">
        <h2 class="section-title sr-only text-center">About Us</h2>
        <div class="h2 sr-fadeinup">
            <?php the_field('intro_content'); ?>
        </div>
    </div>
</section>
<?php endif; ?>

<?php if( have_rows('services') ): ?>
<section class="section bg-primary text-white">
    <div class="container">
        <h2 class="section-title sr-only text-center">Our Services</h2>
        
        <div class="services row">
            <?php $row = 1; ?>
            <?php while ( have_rows('services') ) : the_row(); ?>
            <div class="col-lg my-2 sr-block">
                <div class="service-item">
                    <h3 class="service-item__title"><a class="service-item__toggler" data-toggle="collapse" data-target="#serviceItem<?php echo $row; ?>" href="#"><?php the_sub_field('service_title'); ?>  <i class="d-block d-lg-none fa fa-angle-down" aria-hidden="true"></i></a></h3>
                    <div id="serviceItem<?php echo $row; ?>" class="service-item__details collapse">
                        <?php the_sub_field('service_details'); ?>
                    </div>
                </div>
            </div>
            <?php $row++; endwhile; ?>
        </div>        

    </div>
</section>
<?php endif; ?>

<?php if(get_field('our_goal')): ?>
<section class="section bg-white">
    <div class="container">
        <h2 class="section-title sr-only text-center">Our Goal</h2>
        <div class="h2 sr-fadeinup">
            <?php the_field('our_goal'); ?>
        </div>
    </div>
</section>
<?php endif; ?>


<?php if( have_rows('our_team') ): ?>
<section class="section bg-dark text-white p-0">
    <h2 class="section-title sr-only text-center">Our Team</h2>

    <?php $row = 0; ?>
    <?php while ( have_rows('our_team') ) : the_row(); ?>
        <?php if($row % 2 === 0): ?>
            <div class="team-member row no-gutters">
                <div class="col-lg-6">                    
                    <?php if($team_member_image = get_sub_field('team_member_image')): ?>
                    <div class="team-member__image">
                        <?php $team_member_pic = wp_get_attachment_image_src($team_member_image['ID'], array('1920', '1200')); ?>
                        <div class="team-member__pic" style="background-image: url(<?php echo $team_member_pic[0]; ?>);"></div>
                    </div>
                    <?php endif; ?>
                </div>
                <div class="col-lg-6">                    
                    <div class="team-member__details sr-fadeinup">
                        <?php if(get_sub_field('team_member_name')): ?>
                            <h3 class="team-member__name h3"><?php the_sub_field('team_member_name'); ?></h3>
                        <?php endif; ?>
                        <?php if(get_sub_field('team_member_position')): ?>
                            <h4 class="team-member__position h4"><?php the_sub_field('team_member_position'); ?></h4>
                        <?php endif; ?>
                        <?php if(get_sub_field('team_member_description')): ?>
                        <a class="team-description__toggler d-block d-lg-none" data-toggle="collapse" data-target="#teamDescription<?php echo $row; ?>" href="#">More <i class="fa fa-angle-down" aria-hidden="true"></i></a>
                        <div id="teamDescription<?php echo $row; ?>" class="team-member__description collapse">
                            <?php the_sub_field('team_member_description'); ?>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php else: ?>
            <div class="team-member row no-gutters">
                <div class="col-lg-6 order-lg-2">
                    <?php if($team_member_image = get_sub_field('team_member_image')): ?>
                    <div class="team-member__image">
                        <?php $team_member_pic = wp_get_attachment_image_src($team_member_image['ID'], array('1920', '1200')); ?>
                        <div class="team-member__pic" style="background-image: url(<?php echo $team_member_pic[0]; ?>);"></div>
                    </div>
                    <?php endif; ?>
                </div>
                <div class="col-lg-6 order-lg-1">                    
                    <div class="team-member__details sr-fadeinup">
                        <?php if(get_sub_field('team_member_name')): ?>
                            <h3 class="team-member__name h3"><?php the_sub_field('team_member_name'); ?></h3>
                        <?php endif; ?>
                        <?php if(get_sub_field('team_member_position')): ?>
                            <h4 class="team-member__position h4"><?php the_sub_field('team_member_position'); ?></h4>
                        <?php endif; ?>

                        <?php if(get_sub_field('team_member_description')): ?>
                        <a class="team-description__toggler d-block d-lg-none" data-toggle="collapse" data-target="#teamDescription<?php echo $row; ?>" href="#">More <i class="fa fa-angle-down" aria-hidden="true"></i></a>
                        <div id="teamDescription<?php echo $row; ?>" class="team-member__description collapse">
                            <?php the_sub_field('team_member_description'); ?>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    <?php $row++; endwhile; ?>

</section>
<?php endif; ?>



<section class="section bg-white">
    <div class="container">
        <?php 
            $post_type = 'case_study';
            $posts_per_page = 3;
            $args = array(
                'post_type'              => $post_type,
                'posts_per_page'         => $posts_per_page
            );
            $query = new WP_Query($args); 
        ?>
        <?php if ( $query->have_posts() ): ?>
            <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                <div class="sr-fadeinup">
                    <?php get_template_part('templates/content', get_post_type() != 'post' ? get_post_type() : get_post_format()); ?>
                </div>
            <?php endwhile; ?>
            <?php wp_reset_query(); ?>
        <?php endif; ?>
        
    </div>
</section>


<section id="contact" class="section bg-light ">
    <div class="container sr-fadeinup">
        <?php if(get_field('contact_section_title')): ?>
        <h2 class="section-title h1"><?php the_field('contact_section_title'); ?></h2>
        <?php endif; ?>        
        <?php if(get_field('contact_section_description')): ?>
        <div class="section-content">
            <?php the_field('contact_section_description'); ?>
        </div>
        <?php endif; ?>

        <?php if(get_field('contact_form_shortcode')): ?>
        <div class="contact-form">
            <?php echo do_shortcode(get_field('contact_form_shortcode')); ?>
        </div>
        <?php endif; ?>
    </div>
</section>