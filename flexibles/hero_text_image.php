<?php
     // Static Hero With Background & Image Right
    $hero_info = get_sub_field('hero_info');
    $title = $hero_info['title'];
    $paragraph_hero = $hero_info['paragraph'];
    $cta_hero = $hero_info['cta_hero'];
    $background_image = get_sub_field('background_image');
    $image_right = get_sub_field('image_right');
    $choose_style = get_sub_field('choose_style');
    $bg_color = get_sub_field('background_color');
    $image_position = get_sub_field('image_position');
    $align = get_sub_field('text_align');
?>

<div class="px-4 py-5 text-<?php echo $align; ?>" style="background:<?php if($choose_style == 'image'): ?>url(<?php echo $background_image; ?>)<?php elseif($choose_style == 'color'): echo $bg_color; endif; ?>">
    <div class="container">
        <div class="row d-flex align-items-center">
            <?php if($image_position == 'left'): ?>  
            <div class="col-md-6 col-12">
                <?php if($image_right): ?>       
                    <img src="<?php echo $image_right; ?>" class="img-fluid w-100" alt="img-fluid">
                <?php endif ?>
            </div>
            <?php endif ?>

            <div class="col-md-6 col-12 ">
                <h1 class="display-5 fw-bold"><?php echo $title; ?></h1>
                
                <p class="lead mb-4"><?php echo $paragraph_hero; ?></p>
                <div class="d-grid gap-2 ">
                
                    <?php if($cta_hero): ?>
                    <a href="<?php echo $cta_hero['url'] ?>" target="<?php echo  $cta_hero['target'] ?>" class="btn btn-primary btn-lg px-4 gap-3" > <?php echo $cta_hero['title'] ?></a>
                    <?php endif ?>
                </div>
            
            </div>

            <div class="col-md-6 col-12">
                <?php if($image_position == 'right'): ?>        
                    <img src="<?php echo $image_right; ?>" class="img-fluid w-100" alt="img-fluid">
                <?php endif ?>
            </div>
        </div>
    </div>
  </div>
  