<?php 

    $title = get_sub_field('section_title');
    $sub_title = get_sub_field('section_sub_title');
    $background_color = get_sub_field('background_color');
    $background_image = get_sub_field('background_image');
    $features_list = get_sub_field('features_list');
    $choose_style = get_sub_field('choose_style_copy');
    $list_align = get_sub_field('list_align');
?>


<div class="px-4 py-5 text-" style="background:<?php if($choose_style == 'image'): ?>url(<?php echo $background_image; ?>)<?php elseif($choose_style == 'color'): echo $background_color; endif; ?>">
    <div class="container">
        <div class="row d-flex align-items-center">
            
            <div class="col-12 text-center">
                <h1 class="display-5 fw-bold"><?php echo $title; ?></h1>
                
                <p class="lead mb-4"><?php echo $sub_title; ?></p>
              
            
            </div>
            <div class="col-12 row mt-4">        
                <?php 
                
                    if( $features_list ) {
                        
                        foreach( $features_list as $row ) {
                           
                            ?>    
                             

                            <div class="col-lg-3 col-md-2 col-12 text-<?php echo $list_align ?> ">
                                <img src="<?php echo $row['icon'] ?>" alt="icon">
                                <h3 class="my-2"><?php echo $row['title'] ?></h3>
                                <p class="my-2"><?php echo $row['description'] ?></p>
                                <?php if($row['link']):?>
                                <a href="<?php echo $row['link'] ?>" class="text-dark">read more</a>
                                <?php endif; ?>
                            </div>
                            
                        <?php  }
                        
                    }
                
                ?>
            </div>
          
        </div>
    </div>
  </div>