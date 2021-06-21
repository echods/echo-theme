<?php 

    $title = get_sub_field('title');
    $paragraph = get_sub_field('paragraph');
    $background_color = get_sub_field('background_color');
    $background_image = get_sub_field('background_image');
    $cta_button = get_sub_field('cta_button');
 
    $choose_style = get_sub_field('choose_style_copy');
   
?>


<div class="px-4 py-5" style="background:<?php if($choose_style == 'image'): ?>url(<?php echo $background_image; ?>)<?php elseif($choose_style == 'color'): echo $background_color; endif; ?>">
    <div class="container">
        <div class="row d-flex align-items-center">
            
            <div class="col-12 text-center">
                <h1 class="display-5 fw-bold"><?php echo $title; ?></h1>
                
                <p class="mb-4"><?php echo $paragraph; ?></p>
                <?php if($cta_button): ?>
                <a href="<?php echo $cta_button['url'] ?>" target='<?php echo $cta_button['target'] ?>'><?php echo $cta_button['title'] ?></a>
                <?php endif; ?>
            </div>
          
        </div>
    </div>
  </div>





   