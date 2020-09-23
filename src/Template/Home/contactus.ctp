

<div class="container my-3">
    <h2 class="mainTitle text-center mb-3">Contact Us</h2>
    <div class="row">
    <?php if(!empty($contacts)) {?> 
    <?php foreach($contacts as $contact): ?>
        <?php if(isset($contact['image'])){?>
        <div class="col-6 col-sm-4 col-md-3 contactPerson">
            <div class="frame text-center">
                <?= $this->Html->image('uploads/'.$contact->image, ['alt' => 'contact us', 'class'=>"rounded-circle userPic"]);?>
                <h3><?=$contact->name?></h3>
                <div class="btns d-flex justify-content-between mt-3">
                    <a href="tel:<?=$contact->phone_no?>" class="btn btn-primary btn-sml">Call</a>
                    <a href="https://api.whatsapp.com/send?phone=<?=$contact->whatsapp_no?>" class="btn btn-success btn-sml">whatsapp</a>
                </div>
            </div>
        </div>
    <?php }else{?>
        <div class="col-6 col-sm-4 col-md-3 contactPerson">
            <div class="frame text-center">
                <?= $this->Html->image('frontend/no-img.jpg', ['alt' => 'contact us', 'class'=>"rounded-circle userPic"]);?>
                <h3><?=$contact->name?></h3>
                <div class="btns d-flex justify-content-between mt-3">
                    <a href="tel:<?=$contact->phone_no?>" class="btn btn-primary btn-sml">Call</a>
                    <a href="https://api.whatsapp.com/send?phone=<?=$contact->whatsapp_no?>" class="btn btn-success btn-sml">whatsapp</a>
                </div>
            </div>
        </div>
    <?php }?>
    <?php endforeach; ?>
    <?php }?>
    </div>
    <?php
        echo "<div class='center'><ul class='pagination d-flex justify-content-center' style='margin:20px auto;'>";
        echo $this->Paginator->prev(' ' . __('previous'), array('tag' => 'li', 'currentTag' => 'a', 'currentClass' => 'disabled'), null, array('class' => 'prev disabled'));
        echo $this->Paginator->numbers(array('separator' => '','tag' => 'li', 'currentTag' => 'a', 'currentClass' => 'active')); 
        echo $this->Paginator->next(__('next').' ', array('tag' => 'li', 'currentTag' => 'a', 'currentClass' => 'disabled'), null, array('class' => 'next disabled'));
        echo "</div></ul>";
    ?>

</div>
 

