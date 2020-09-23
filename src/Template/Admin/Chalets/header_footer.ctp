
<div class="x_title">
    <h1>Header and Footer</h1>
    <i style="color: red">NOTE</i> : Do not modify here if you are not a professional
    <div class="clearfix"></div>
</div>
<div class="x_content">
    <div class="x_content2">
    <?= $this->Flash->render() ?>
    <?= $this->Form->create('HeaderFooter',['class' => 'form-horizontal form-label-left']) ?>
    <input type="hidden" name="header_footer_id" value="<?php  echo $header_footer['id'];?>" >
    <div class="form-group">
    <div class="col-md-12 col-sm-4 col-xs-12"><h4>Header</h4>
    <textarea id="htmlContent2" name="header"  class="date-picker form-control col-md-7 col-xs-12" required="required" type="text" rows="5">
   <?php  echo htmlspecialchars($header_footer['header']) ? : ' HTML Code';?>
    </textarea>
    </div>
    </div>
    <div class="ln_solid"></div>
   
    <div class="form-group">
    <div class="col-md-12 col-sm-4 col-xs-12"><h4>Footer</h4>
    <textarea id="htmlContent2" name='footer'  class="date-picker form-control col-md-7 col-xs-12" required="required" type="text" rows="5">
    <?php  echo htmlspecialchars($header_footer['footer']) ? : 'HTML Code';?>
    </textarea>
    </div>
    </div>
    <div class="ln_solid"></div>
    <div class="form-group">
    <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-5">
    <button id="send" type="submit" class="btn btn-success" style="padding: 10px 120px 10px 120px">Save</button>
    </div>
    </div>
    <?= $this->Form->end() ?>
    </div>
</div>