
<div class="x_title">
    <h1>Chalet Details</h1>
</div>
<div class="x_content">
<table id="xdatatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
    <thead>
        <tr align="center">
            <th width="100%" align="center">Chalets</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td align="center">
                <!-- all -->
                <table border="0" width="100%" cellpadding="5" cellspacing="0">
                    <tr>
                        <td style="background: #ffffff" align="right" valign="top" colspan="2">
                            <table border="1" width="100%" bordercolor="#dddddd">
                                <tr>
                                    <td width="75%" align="center">
                                        <h3 style="margin: 5px">
                                            <div class="fa fa-arrows"></div>
                                        </h3>
                                    </td>
                                    <td width="20%" align="center">
                                        <?php if($chalet->status=='Yes'){?>
                                                <input type="checkbox" class="js-switch detailstatuschange" checked="checked" name="C3"  id=<?php echo $chalet->id;?> >
                                       <?php  }else{?>
                                                  <input type="checkbox" class="js-switch detailstatuschange"  name="C3"  id=<?php echo $chalet->id;?> >
                                       <?php }?>
                                        
                                      
                                    </td>
                                    <td width="5%" align="right"><?= $this->Html->link('Edit', ['controller'=>'chalets','action'=>'edit',$chalet->id],['class'=>'btn btn-success btn-bg','style'=>'margin: 0px; width: 140px']); ?>  </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td align="right" width="100%" valign="top">
                            <table border="0" width="100%" class="table table-striped table-bordered dt-responsive nowrap">
                                <tr>
                                    <td align="right" width="30%">#<?= $chalet['id']?></td>
                                    <td align="right" width="70%"><strong><?= $chalet['name']?></strong></td>
                                </tr>
                                <tr>
                                    <td align="right" width="30%"><?= $chalet['weekdays']?></td>
                                    <td align="right" width="70%">Weekdays</td>
                                </tr>
                                <tr>
                                    <td align="right" width="30%"><?= $chalet['weekend']?></td>
                                    <td align="right" width="70%">Weekend</td>
                                </tr>
                                <tr>
                                    <td align="right" width="30%"><?= $chalet['week']?></td>
                                    <td align="right" width="70%">Week</td>
                                </tr>
                            </table>
                        </td>
                        
                        <td align="right" width="0" valign="top"> 
                            <?php if(isset($chalet['images'][0])){ ?>
                            <?= $this->Html->image('uploads/' . $chalet['images'][0]['name'],['border'=>'0','width'=>'140', 'height'=>'140']);?>
                        <?php }else{
                             echo $this->Html->image('admin/Chalet.jpg',['border'=>'0','width'=>'140', 'height'=>'140']);
                        }?>  
                        </td>
                       
                    </tr>
                </table>

                <table border="0" width="100%">
                    <tr>
                        <td align="center">
                            <!--  <div class="row">

                            </div> -->
                            <?php if(count($bookedDate)>0){?>
                                <div class="container">
                                    <input type="text" id="inputID" class="date" placeholder="Book The Chalet" value="<?php echo $bookedDate[0]->start_date ? : '';?>">
                            </div>

                            <?php }else{?>
                                <div class="container">
                                    <input type="text" id="inputID" class="date" placeholder="Book The Chalet" value="">
                                </div>

                            <?php } ?>  
                            <button style="margin-top: 5px"  id='applybook' class="btn btn-warning btnapply">Apply</button>
                         </td>
                    </tr>
                </table>
                <!-- all -->
            </td>
        </tr>
    </tbody>
</table>
 <input type="hidden" id="hidden_chalet_id" name="hidden_chalet_id" value="<?= $chalet['id']?>">


