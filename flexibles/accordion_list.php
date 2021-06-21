<?php 

    $title = get_sub_field('title');
    $list_faq = get_sub_field('list_faq');
    $background_color = get_sub_field('background_color');
    $background_image = get_sub_field('background_image');
    $choose_style = get_sub_field('choose_style_copy');
   
?>


<div class="px-4 py-5" style="background:<?php if($choose_style == 'image'): ?>url(<?php echo $background_image; ?>)<?php elseif($choose_style == 'color'): echo $background_color; endif; ?>">
    <div class="container">
        <div class="row d-flex align-items-center">
            
            <div class="col-12 text-center">
                <h1 class="display-5 fw-bold"><?php echo $title; ?></h1>
                
                <ul class="accordion-list">
                    <?php 
                        
                        if( $list_faq ) {
                            
                            foreach( $list_faq as $row ) {
                            
                                ?>    
                                <li>
                                    <h3><?php echo $row['question'] ?></h3>
                                    <div class="answer"><?php echo $row['answer'] ?></div>
                                </li>

                               
                                
                            <?php  }
                            
                        }
                    
                    ?> 
                    
                        
                </ul>
            </div>
          
        </div>
    </div>
  </div>



  

   