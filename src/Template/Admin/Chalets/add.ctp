
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
                        <h1>Add New Chalet</h1>
                        <ul class="nav navbar-right panel_toolbox">
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <?= $this->Flash->render() ?>
                        <?= $this->Form->create('Chatel',array('enctype' => 'multipart/form-data')) ?>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-5 col-xs-12"></label>
                                <div dir="rtl">
                                    <h3 align="center">Chalet Name</h3>
                                    <div>
                                        <input type="text" name="name" required="required" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="ln_solid"></div>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12"></label>
                                <div dir="rtl">
                                    <h3 align="center">Prices</h3>
                                    <div>Week
                                        <input type="number" name="week" required="required" placeholder="900" class="form-control">
                                    </div>
                                    <div>Weekend
                                        <input type="number" name="weekend" required="required" placeholder="500" class="form-control">
                                    </div>
                                    <div>Weekdays
                                        <input type="number" name="weekdays" required="required" placeholder="500" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="ln_solid"></div>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12"></label>
                                <div>
                                    <h3 align="center">Photo of Chalet</h3>
                                    <div class="item form-group">
                                        <div>
                                            <!-- Photo of Chalet -->
                                            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                                <tbody>
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
                                                                    <td align="center" width="100%" colspan="2" dir="rtl"  cellpadding="5"><input  style="padding: 5px; margin: 10px 10px 10px 0px; background: #ffffff" class="col-md-12 col-sm-12 col-xs-12 image_upload" dir="rtl" type="file" name="image[]"  accept="image/png,image/gif,image/jpeg,image/jpg,image/jpg" data-role="magic-overlay" data-target="#pictureBtn" data-edit="insertImage" /></td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                        <td width="0" valign="top"><?= $this->Html->image('admin/Chalet.jpg',['border'=>'0','width'=>'60']);?></td>
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
                                                                    <td align="center" width="100%" colspan="2" dir="rtl"  cellpadding="5"><input style="padding: 5px; margin: 10px 10px 10px 0px; background: #ffffff" class="col-md-12 col-sm-12 col-xs-12 image_upload" dir="rtl" type="file" name="image[]"  accept="image/png,image/gif,image/jpeg,image/jpg,image/jpg" data-role="magic-overlay" data-target="#pictureBtn" data-edit="insertImage" /></td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                        <td width="0" valign="top"><?= $this->Html->image('admin/Chalet.jpg',['border'=>'0','width'=>'60']);?></td>
                                                    </tr>
                                                    <!-- all -->
                                                </tbody>
                                            </table>
                                            <!-- Photo of Chalet -->
                                            <div class="container_Photo" dir="rtl">
                                                <a href="#" class="btn btn-primary add_form_field_Photo" style="margin-bottom: 5px">  + Add New Photo </a>
                                            </div>
                                            <!--<a href="#"  class="btn btn-primary">  + Add New Photo </a>-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="ln_solid"></div>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12"></label>
                                <div>
                                    <h3 align="center">Chalet Details</h3>
                                    <!-- HTML Code -->               
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
                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12"></label>
                                        <div>
                                            <!-- Chalet Details -->
                                            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                                <tbody>
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
                                                                    <td align="center" width="100%" colspan="2" dir="rtl"  cellpadding="5"><input type="text" name="description[]" id="first-name" class="form-control" dir="rtl"></td>
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
                                                                    <td align="center" width="100%" colspan="2" dir="rtl"  cellpadding="5"><input type="text" name="description[]" id="first-name" class="form-control" dir="rtl"></td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                            <!-- all -->
                                                </tbody>
                                            </table>
                                            <!-- Chalet Details -->
                                            <div class="container1" dir="rtl">
                                                <a href="#" class="btn btn-primary add_form_field" style="margin-bottom: 5px">  + Add New Details </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="ln_solid"></div>
                            <div class="col-md-5 col-sm-12 col-xs-12 col-md-offset-4">
                                <button id="send" type="submit" class="btn btn-success btnADD">Add New Chalet</button>
                            </div>
                        <?= $this->Form->end() ?>
                    </div>
               
