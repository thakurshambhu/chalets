
<div class="container my-3">
    <div class="productListings">
        <div class="row">
        <?php if(!empty($chalets)) { ?>  
        <?php foreach($chalets as $chalet): ?>
        <?php if(isset($chalet['images'][0])){?>
            <div class="col-6 col-md-3 product">
                <?php  echo $this->Html->link(
                $this->Html->image('uploads/'.$chalet['images'][0]['name']),
                ['action' => 'chaletdetail', $chalet->id], array('escape' => false)
            );?>
               
                <h2 class="text-truncate">
                 <?php echo $this->Html->link($chalet->name, ['action' => 'chaletdetail', $chalet->id]);?>
                </h2>
            </div>
          <?php }else{?>
            <div class="col-6 col-md-3 product">
               
                <?php  echo $this->Html->link(
                $this->Html->image('frontend/product.jpg'),
                ['action' => 'chaletdetail', $chalet->id], array('escape' => false)
            );?>
                <h2 class="text-truncate">
                  <?php echo $this->Html->link($chalet->name, ['action' => 'chaletdetail', $chalet->id]);?>
                </h2>
                
            </div>
          <?php  }?>
            <?php endforeach; ?>
          <?php }?>

            
        </div>
      
       <!--  <?php
                echo "<div class='center'><ul class='pagination d-flex justify-content-center' style='margin:20px auto;'>";
                echo $this->Paginator->prev(' ' . __('previous'), array('tag' => 'li', 'currentTag' => 'a', 'currentClass' => 'disabled'), null, array('class' => 'prev disabled'));
                echo $this->Paginator->numbers(array('separator' => '','tag' => 'li', 'currentTag' => 'a', 'currentClass' => 'active')); 
                echo $this->Paginator->next(__('next').' ', array('tag' => 'li', 'currentTag' => 'a', 'currentClass' => 'disabled'), null, array('class' => 'next disabled'));
                echo "</div></ul>";
            ?> -->

    </div>
</div>
