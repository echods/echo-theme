<?php
     // Static Hero With Background & Image Right
    $hero_info = get_sub_field('hero_info');
    $title = $hero_info['title'];
    $paragraph_hero = $hero_info['paragraph'];
    $cta_hero = $hero_info['cta_hero'];
    $background_image = get_sub_field('background_image');
    $image_right = get_sub_field('image_right');

?>

<div class="px-4 py-5 text-left" style="background="<?php echo $background_image; ?>">
    <div class="container">
        <div class="row d-flex align-items-center">
            <div class="col-6">
                <h1 class="display-5 fw-bold"><?php echo $title; ?></h1>
                
                <p class="lead mb-4"><?php echo $paragraph_hero; ?></p>
                <div class="d-grid gap-2 ">
                
                    <?php if($cta_hero): ?>
                    <a href="<?php echo $cta_hero['url'] ?>" target="<?php echo  $cta_hero['target'] ?>" class="btn btn-primary btn-lg px-4 gap-3" > <?php echo $cta_hero['title'] ?></a>
                    <?php endif ?>
                </div>
            
            </div>
            <div class="col-6">
                <?php if($image_right): ?>       
                    <img src="<?php echo $image_right; ?>" class="img-fluid" alt="img-fluid">
                <?php endif ?>
            </div>
        </div>
    </div>
  </div>
  