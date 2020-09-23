<div class="container my-3">
    <!-- <div class="toparrows d-flex justify-content-between pb-3 mb-3">
        <a href="#" class="d-flex justify-content-center align-items-center">
        <?= $this->Html->image('frontend/l-arrow.svg', ['alt' => '']);?>
        </a>
        <a href="#" class="d-flex justify-content-center align-items-center">
        <?= $this->Html->image('frontend/r-arrow.svg', ['alt' => '']);?>
        </a>
    </div> -->
    <div class="toparrows d-flex justify-content-between pb-3 mb-3">
        <a href="/home/chaletdetail/<?=$pages['prev']?>" class="d-flex justify-content-center align-items-center" <?php if ($pages['prev'] == ''){ ?>style="display:none!important" <?php } ?>>
        <?= $this->Html->image('frontend/l-arrow.svg', ['alt' => '']);?>
        </a>
        <a href="/home/chaletdetail/<?=$pages['next']?>" class="d-flex justify-content-center align-items-center" <?php if ($pages['next'] == ''){ ?>style="display:none!important" <?php } ?>>
        <?= $this->Html->image('frontend/r-arrow.svg', ['alt' => '']);?>
        </a>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="position-relative">
            <div class="num"></div>
            <div class="share dropdown dropleft">
                 <a href="javascript:void(0)"  id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?= $this->Html->image('frontend/share.svg', ['alt' => '']);?></a>
                <div class="dropdown-menu shareMedia p-2" aria-labelledby="dropdownMenuButton">
                            <a href="https://web.whatsapp.com/send?text=<?=$_SERVER['HTTP_HOST']?>/home/chaletdetail/<?= $chalet->id;?>" target="_blank"><i class="fa fa-whatsapp" aria-hidden="true"></i></a>
                            <a href="https://www.linkedin.com/shareArticle?title=<?= $chalet->name?>&url=<?=$_SERVER['HTTP_HOST']?>/home/chaletdetail/<?= $chalet->id;?>" target="_blank"><i class="fa fa-telegram" aria-hidden="true"></i></a>
                            <a href="https://pinterest.com/pin/create/button/?description=<?= $chalet->name?>&url=<?=$_SERVER['HTTP_HOST']?>/home/chaletdetail/<?= $chalet->id;?>" target="_blank"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a>
                            <a href="https://www.linkedin.com/shareArticle?title=<?= $chalet->name?>&url=<?=$_SERVER['HTTP_HOST']?>/home/chaletdetail/<?= $chalet->id;?>" target="_blank"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                            <a href="http://www.facebook.com/share.php?u=<?=$_SERVER['HTTP_HOST']?>/home/chaletdetail/<?= $chalet->id;?>" class="share-btn facebook" target="_blank"><i class="fa fa-facebook-official" aria-hidden="true"></i></a>
                            <a href="https://twitter.com/share?url=<?=$_SERVER['HTTP_HOST']?>/home/chaletdetail/<?= $chalet->id;?>&amp;text=<?= $chalet->name?>"  class="share-btn twitter" target="_blank"><i class="fa fa-twitter-square" aria-hidden="true"></i></a>
                           
                </div>
            </div>
            <?php if(!empty($chalet['images'])){?>
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" data-wrap="false" data-interval="false">
               
                <div class="carousel-inner">
                <?php foreach($chalet->images  as $slider_img => $image): ?>
                  <div class="carousel-item item <?php if($slider_img == 0){ echo "active"; } ?>">
                    <?= $this->Html->image('uploads/'. $image['name'], ['alt' => 'First slide', 'class'=>"d-block w-100"]);?>
                  </div>
                  <?php endforeach; ?>
                 
                </div>
                <a class="carousel-control-prev prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next next" href="#carouselExampleIndicators" role="button" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
                </a>
              </div>
              <?php }else{?>
                        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" data-wrap="false" data-interval="false">
                   
                        <div class="carousel-inner">
                        <div class="carousel-item item active">
                            <?php echo  $this->Html->image('frontend/product.jpg',['class'=>'d-block w-100'])?>
                          <!--   <img class="d-block w-100" src="images/product.jpg" alt="First slide"> -->
                         </div>
                         
                        </div>
                        
                      </div>
             <?php }?>
            </div>


        </div>
        <div class="col-md-6">
        
            <div class="productName d-flex justify-content-between">
                <label></label>
                <strong><?= ($chalet->name)?></strong>
            </div>
            <div class="row m-0">
                <div class="col p-0 text-center">
                    <div class="prodDetails">
                        <label>Week</label>
                        <span><?= ($chalet->week)?> KD</span>
                    </div>
                </div>
                <div class="col p-0 text-center">
                    <div class="prodDetails cnterSection">
                        <label>Weekend</label>
                        <span><?= ($chalet->weekend)?> KD</span>
                    </div>
                </div>
                <div class="col p-0 text-center">
                    <div class="prodDetails">
                        <label>Weekdays</label>
                        <span><?= ($chalet->weekdays)?> KD</span>
                    </div>
                </div>
            </div>
            <div class="calendarWidget p-2"> 
         
            <div id="select-delivery-date-input">
                 <?php if(count($bookedDate)>0){?>
                    <div class="container">
                        <input type="hidden" id="inputID" class="date" placeholder="Book The Chalet" value="<?php echo $bookedDate[0]->start_date ? : '';?>">
                </div>

                <?php }else{?>
                    <div class="container">
                        <input type="hidden" id="inputID" class="date" placeholder="Book The Chalet" value="">
                    </div>

                <?php } ?>
             </div>
           
                 
            </div>
            <div class="cardWidget">
                <h3 class="heading">Chalet details</h3>
                <ul class="bulleted rtlcontent">
                <?php foreach($chalet->details as $data): ?>
                    <li><?= htmlspecialchars_decode($data->description)?></li>
                    <?php endforeach; ?>
                </ul>
            </div>

            <div class="cardWidget">
                <h3 class="heading">General Notes</h3>
                <ul class="bulleted rtlcontent">
                <?php foreach($generalNotes as $data): ?>
                    <li><?= htmlspecialchars_decode($data->general_note)?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>
</div>
