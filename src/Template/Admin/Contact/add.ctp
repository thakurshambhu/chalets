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
            <h1>Contact-Us</h1>
            <ul class="nav navbar-right panel_toolbox">
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <?= $this->Flash->render() ?>
            <?= $this->Form->create('Contact',['enctype' => 'multipart/form-data','class'=>'formID']) ?>
            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                <tbody>
                   <?php if(count($contactus) > 0){ ?>
                   <?php foreach ($contactus as $key => $contact) {?>
                    <tr>
                        <td align="right" width="100%" valign="top">
                            <table border="0" width="100%">
                                <tr>
                                    <td align="center" width="50%">
                                        <h3 style="margin: 5px">
                                            <div class="fa fa-arrows"></div>
                                        </h3>
                                    </td>
                                    <td align="right" width="50%"><?= $this->Html->link(__('Delete'), array('controller'=>'Contact','action'=>'delete_contact',$contact->id),['class'=>'btn btn-primary bg-red','style'=>'padding: 2px 5px 2px 5px'],['confirm' => __('Are you sure you want to delete # {0}?', $contact->id)]); ?></td>
                                </tr>
                                <tr>
                                    <td align="center" width="100%" colspan="2" dir="rtl" ><input style="padding: 5px; margin: 10px 10px 10px 0px; background: #ffffff" class="col-md-12 col-sm-12 col-xs-12" dir="rtl" type="file" name="image[<?php echo $contact->id?>]"  accept="image/png,image/gif,image/jpeg,image/jpg,image/jpg" data-role="magic-overlay" data-target="#pictureBtn" data-edit="insertImage" /></td>
                                </tr>
                                <tr>
                                    <td align="right" width="100%" colspan="2" dir="rtl" >User Name <input style="padding: 5px; margin: 0px 10px 10px 0px;" class="col-md-12 col-sm-12 col-xs-12" dir="rtl" name='name[<?php echo $contact->id?>]' value="<?php echo htmlspecialchars($contact['name']) ? : '';?>" type="text" placeholder="Moho" required="required" class="form-control"></td>
                                </tr>
                                <tr>
                                    <td align="right" width="100%" colspan="2" dir="rtl" >Phone <input  style="padding: 5px; margin: 0px 10px 10px 0px;" class="col-md-12 col-sm-12 col-xs-12" dir="ltr" name='phone_no[<?php echo $contact->id?>]' value="<?php echo htmlspecialchars($contact['phone_no']) ? : '';?>"  type="number" placeholder="+96597912345" required="required" class="form-control"></td>
                                </tr>
                                <tr>
                                    <td align="right" width="100%" colspan="2" dir="rtl" >whatsapp <input  style="padding: 5px; margin: 0px 10px 10px 0px;" class="col-md-12 col-sm-12 col-xs-12" dir="ltr" name='whatsapp_no[<?php echo $contact->id?>]' value="<?php echo htmlspecialchars($contact['whatsapp_no']) ? : '';?>" type="number" required="required" placeholder="+96597912345" class="form-control"></td>
                                </tr>
                            </table>
                        </td>
                        
                        <td width="0" valign="top">
                            <?= $this->Html->image('uploads/' . $contact['image'],['border'=>'0','width'=>'60']);?>
                        </td>
                    
                    </tr>
                <?php }?>
            <?php } else{?>
                    <tr>
                        <td align="right" width="100%" valign="top">
                            <table border="0" width="100%">
                                <tr>
                                    <td align="center" width="50%">
                                        <h3 style="margin: 5px">
                                            <div class="fa fa-arrows"></div>
                                        </h3>
                                    </td>
                                    <td align="right" width="50%"><a style="margin: 0px; width: 60px" href="javascript:void(0);"  class="btn btn-primary bg-red">Delete</a></td>
                                </tr>
                                <tr>
                                    <td align="center" width="100%" colspan="2" dir="rtl" ><input style="padding: 5px; margin: 10px 10px 10px 0px; background: #ffffff" class="col-md-12 col-sm-12 col-xs-12" dir="rtl" type="file" name="image[]"  accept="image/png,image/gif,image/jpeg,image/jpg,image/jpg" data-role="magic-overlay" data-target="#pictureBtn" data-edit="insertImage" /></td>
                                </tr>
                                <tr>
                                    <td align="right" width="100%" colspan="2" dir="rtl" >User Name <input style="padding: 5px; margin: 0px 10px 10px 0px;" class="col-md-12 col-sm-12 col-xs-12" dir="rtl" type="text" placeholder="Moho" name='name[]' required="required" class="form-control"></td>
                                </tr>
                                <tr>
                                    <td align="right" width="100%" colspan="2" dir="rtl" >Phone <input  style="padding: 5px; margin: 0px 10px 10px 0px;" class="col-md-12 col-sm-12 col-xs-12" dir="ltr" name='phone_no[]' type="number" placeholder="+96597912345"  required="required" class="form-control"></td>
                                </tr>
                                <tr>
                                    <td align="right" width="100%" colspan="2" dir="rtl" >whatsapp <input  style="padding: 5px; margin: 0px 10px 10px 0px;" class="col-md-12 col-sm-12 col-xs-12" dir="ltr" type="number" name='whatsapp_no[]' placeholder="+96597912345"  required="required" class="form-control"></td>
                                </tr>
                            </table>
                        </td>
                        <td width="0" valign="top">
                            <?= $this->Html->image('admin/img.jpg',['border'=>'0','width'=>'60']);?></td>
                    </tr>
            <?php }?>
                    <!-- all -->
                </tbody>
            </table>
            <div class="container_Photo" dir="rtl">
                <a href="#" class="btn btn-primary add_contact_form_field_Photo" style="margin-bottom: 5px" dir="ltr">  + Add New User </a>
            </div>
            <div class="ln_solid">
                <br>
                <div class="col-xs-12 text-center">
                    <button id="send" type="submit" class="btn btn-success saveBTN">Save</button>
                </div>                    
            </div>
            <?= $this->Form->end() ?>
        </div>
      