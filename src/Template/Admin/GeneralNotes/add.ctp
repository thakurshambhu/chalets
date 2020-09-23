  <style>
.container1 input[type=text] {
padding:5px 0px;
margin:5px 5px 5px 0px;
}


.add_form_fieldx
{
    background-color: #1c97f3;
    border: none;
    color: white;
    padding: 8px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
  border:1px solid #186dad;

}
  
  .add_form_field_Photox
{
    background-color: #1c97f3;
    border: none;
    color: white;
    padding: 8px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
  border:1px solid #186dad;

}

input {
    border: 1px solid #cccccc;
    width: 95%;
  margin: 5px;
  padding: 5px;
}

.delete{
    background-color: #E74C3C;
    border: none;
    color: white;
    padding: 2px 15px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 14px;
    margin: 4px 2px;
    cursor: pointer;

}
</style>
 <div class="x_title">
  <h1>General Notes</h1>
    <div class="x_content">
     <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg">Html Code</button>
     <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
           <div class="modal-content">
              <div class="modal-header">
                 <h4 class="modal-title" id="myModalLabel">Html Code</h4>
              </div>
              <div class="modal-body">
                 <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                    <tr>
                       <td width="30%"><b>Bold</b></td>
                       <td width="70%">&lt;b&gt; Text here &lt;/b&gt;</td>
                    </tr>
                    <tr>
                       <td width="30%"><font style="color:red;">Red color</font></td>
                       <td width="70%">&lt;font style="color:red;"&gt; Text here &lt;/font&gt;</td>
                    </tr>
                    <tr>
                       <td width="30%"><font style="color:red;"><b>Red color and Bold</b></font></td>
                       <td width="70%">&lt;font style="color:red;"&gt;&lt;b&gt; Text here &lt;/b&gt;&lt;/font&gt;</td>
                    </tr>
                    <tr>
                       <td width="30%"><font style="color:blue;">blue color</font></td>
                       <td width="70%">&lt;font style="color:blue;"&gt; Text here &lt;/font&gt;</td>
                    </tr>
                    <tr>
                       <td width="30%"><font style="color:blue;"><b>blue color and Bold</b></font></td>
                       <td width="70%">&lt;font style="color:blue;"&gt;&lt;b&gt; Text here &lt;/b&gt;&lt;/font&gt;</td>
                    </tr>
                    <tr>
                       <td width="30%">( <font style="color:red;"><b> Sample 1 </b></font> )</td>
                       <td width="70%">( &lt;font style="color:red;"&gt;&lt;b&gt; Text here &lt;/b&gt;&lt;/font&gt; )</td>
                    </tr>
                    <tr>
                       <td width="30%">( <font style="color:blue;"><b> Sample 2 </b></font> )</td>
                       <td width="70%">( &lt;font style="color:blue;"&gt;&lt;b&gt; Text here &lt;/b&gt;&lt;/font&gt; )</td>
                    </tr>
                 </table>
              </div>
              <div class="modal-footer">
                 <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
           </div>
        </div>
     </div>
  </div>
  <!-- HTML Code -->
  <div class="clearfix"></div>
</div>
<div class="x_content">
<?= $this->Flash->render() ?>   
<?= $this->Form->create('GeneralNotes') ?>
  <div class="item form-group">
     <label class="control-label col-md-3 col-sm-3 col-xs-12"></label>
     <div>
        <div class="item form-group">
           <label class="control-label col-md-3 col-sm-3 col-xs-12"></label>
           <div>
              <!-- Chalet Details -->
              <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                 <tbody>
                  <?php if(count($generalNotes) > 0){?>
                  <?php foreach ($generalNotes as $key => $notes) {?>
                    <tr>
                       <td align="right" width="100%" valign="top">
                          <table border="0" width="100%">
                             <tr>
                                <td align="center" width="50%">
                                   <h3 style="margin: 5px">
                                      <div class="fa fa-arrows"></div>
                                   </h3>
                                </td>
                                <td align="right" width="50%"><?= $this->Html->link(__('Delete'), array('controller'=>'GeneralNotes','action'=>'delete_general_note',$notes->id),['class'=>'btn btn-primary bg-red','style'=>'padding: 2px 5px 2px 5px'],['confirm' => __('Are you sure you want to delete # {0}?', $notes->id)]); ?></td>
                             </tr>
                             <tr>
                                <td align="center" width="100%" colspan="2" dir="rtl"  cellpadding="5">
                                  <input type="text" name="general_note[<?php echo $notes->id?>]"  value="<?php echo htmlspecialchars($notes['general_note']) ? : '';?>" id="first-name" required="required" class="form-control" dir="rtl"></td>
                             </tr>
                          </table>
                        </td>
                    </tr>
                  <?php } ?>
                <?php }else{?>
                    <tr>
                       <td align="right" width="100%" valign="top">
                          <table border="0" width="100%">
                             <tr>
                                <td align="center" width="50%">
                                   <h3 style="margin: 5px">
                                      <div class="fa fa-arrows"></div>
                                   </h3>
                                </td>
                                <td align="right" width="50%"><a href="#"  style="padding: 2px 5px 2px 5px" class="btn btn-primary bg-red">Delete</a> </td>
                             </tr>
                             <tr>
                                <td align="center" width="100%" colspan="2" dir="rtl"  cellpadding="5"><input type="text" name="general_note[]" id="first-name" required="required" class="form-control" dir="rtl"></td>
                             </tr>
                          </table>
                        </td>
                    </tr>
                    <tr>
                       <td align="right" width="100%" valign="top">
                          <table border="0" width="100%">
                             <tr>
                                <td align="center" width="50%">
                                   <h3 style="margin: 5px">
                                      <div class="fa fa-arrows"></div>
                                   </h3>
                                </td>
                                <td align="right" width="50%"><a href="#"  style="padding: 2px 5px 2px 5px" class="btn btn-primary bg-red">Delete</a> </td>
                             </tr>
                             <tr>
                                <td align="center" width="100%" colspan="2" dir="rtl"  cellpadding="5"><input type="text" name='general_note[]' id="first-name" required="required" class="form-control" dir="rtl"></td>
                             </tr>
                          </table>
                      </td>
                  </tr>
                <?php }?>
                          <!-- all -->
                 </tbody>
              </table>
              <!-- Chalet Details -->
              <div class="container1" dir="rtl">
                 <a href="#" class="btn btn-primary add_general_note_form_field" style="margin-bottom: 5px" dir="ltr">  + Add New Note </a>
              </div>
              <div class="ln_solid"></div>
              <div class="form-group">
                 <div class="col-md-5 col-sm-12 col-xs-12 col-md-offset-4">
                    <button id="send" type="submit" class="btn btn-success saveBTN">Save</button>
                 </div>
              </div>
           </div>
        </div>
     </div>
  </div>

<?= $this->Form->end() ?>

</div>
