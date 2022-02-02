<?php
    // Static Hero With Background
    $title = get_sub_field('title_hero');
    $paragraph_hero = get_sub_field('paragraph_hero');
    $cta_hero = get_sub_field('cta_hero');
    $background_image = get_sub_field('background_image');
 
?>

<div class="px-4 py-5 text-center" style="background:url(<?php echo $background_image; ?>);">
    <div class="container">
        <h1 class="display-5 fw-bold"><?php echo $title; ?></h1>
        <div class="col-lg-10 mx-auto">
        <p class="lead mb-4"><?php echo $paragraph_hero; ?></p>
        <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
        
            <?php if($cta_hero): ?>
            <a href="<?php echo $cta_hero['url'] ?>" target="<?php echo $cta_hero['target'] ?>" class="btn btn-primary btn-lg px-4 gap-3" > <?php echo $cta_hero['title'] ?></a>
            <?php endif ?>
        </div>
        </div>
    </div>
  </div>