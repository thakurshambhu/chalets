<div class="x_title">
                    <h1>List of Chalets</h1>
                    <div class="clearfix">
                        <h4><?= $this->Html->link('+ Add new Chalet', array('controller'=>'chalets','action'=>'add'),['class'=>'btn btn-primary']); ?></h4>
                    </div>
                </div>
                <div class="x_content">
                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                        <thead>
                            <tr align="center">
                                <th width="100%" align="center">Chalets</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php if(!empty($chalets)) { ?>
                            <?php $counter = 0;?>
                            <?php foreach($chalets as $chalet) { ?>

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
                                                                <div class="glyphicon glyphicon-arrow-up" data-order-id="<?php echo $chalet->order_id;?>">&nbsp;&#124;&nbsp;
                                                                </div>
                                                                <div class="glyphicon glyphicon-arrow-down"  data-order-id="<?php echo $chalet->order_id;?>"></div>
                                                            </h3>
                                                        </td>
                                                        
                                                        <td width="20%" align="center">
                                                            <?php if($chalet->status=='Yes'){?>
                                                                    <input type="checkbox" class="js-switch statuschange" checked="checked" name="C3"  id=<?php echo $chalet->id;?> >
                                                           <?php  }else{?>
                                                                      <input type="checkbox" class="js-switch statuschange"  name="C3"  id=<?php echo $chalet->id;?> >
                                                           <?php }?>
                                                            
                                                          
                                                        </td>
                                                        <td class="action-btn" width="5%" align="right"><?= $this->Html->link('Edit', array('controller'=>'chalets','action'=>'edit',$chalet->id),['class'=>'btn btn-success btn-bg','style'=>'margin: 0px; width: 70px']); ?></td>
                                                        <td class="action-btn" width="5%" align="right"><?= $this->Html->link('View', array('controller'=>'chalets','action'=>'view',$chalet->id),['class'=>'btn btn-primary btn-bg','style'=>'margin: 0px; width: 70px']); ?></td>
                                                        
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align="right" width="100%" valign="top">
                                                        <table border="0" width="100%" class="table table-striped table-bordered dt-responsive nowrap">
                                                            <tr>
                                                        <td align="right" width="30%">#<?= $chalet->order_id;?></td>
                                                        <td align="right" width="70%"><strong><?= $chalet['name']?></strong></td>
                                                    </tr>
                                                    <tr>
                                                        <td align="right" width="30%"><?= $chalet['week']?></td>
                                                        <td align="right" width="70%">Weekdays</td>
                                                    </tr>
                                                    <tr>
                                                        <td align="right" width="30%"><?= $chalet['weekend']?></td>
                                                        <td align="right" width="70%">Weekend</td>
                                                    </tr>
                                                    <tr>
                                                        <td align="right" width="30%"><?= $chalet['weekdays']?></td>
                                                        <td align="right" width="70%">Week</td>
                                                    </tr>
                                                        </table>
                                                    </td>
                                           
                                            <td  align="right" width="0" valign="top">
                                                <?php if(isset($chalet['images'][0])){ ?>
                                                       
                                                         <?= $this->Html->image('uploads/' . $chalet['images'][0]['name'],['border'=>'0','width'=>'140', 'height'=>'140']);?>
                                                
                                                <?php } else{
                                                     echo $this->Html->image('admin/Chalet.jpg',['border'=>'0','width'=>'140', 'height'=>'140']);
                                                 }?>
                                            </td>
                                           
                                        </tr>
                                    </table>
                                    <!-- <table border="0" width="100%">
                                        <tr>
                                            <td align="center"><div style="margin-top: 5px; width: 300px" class='calendar'></div><a  style="margin-top: 5px; width: 300px" href="#" data-chalet-id='<?= $chalet->id ?>' class="btn btn-warning daterange" id='daterange'>Apply</a></td>
                                        </tr>
                                    </table> -->
                                </td>
                            </tr>
                            <?php } ?>
                            <?php  } ?>
                            
                        </tbody>
                    </table>
                    <input type="hidden" id="hidden_chalet_id" name="hidden_chalet_id" value="">
                </div>