<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
   
    <title>Chalets</title>
    <?= $this->Html->meta('icon') ?>
   
    <?= $this->Html->css('admin/bootstrap/dist/css/bootstrap.min.css') ?>
    <?= $this->Html->css('admin/font-awesome/css/font-awesome.min.css') ?>
    <?= $this->Html->css('admin/nprogress.css') ?>
    <?= $this->Html->css('admin/switchery.min.css') ?>
    <?= $this->Html->css('admin/green.css') ?>
    <?= $this->Html->css('admin/custom.min.css') ?>
  <!--   <?= $this->Html->css('admin/validationEngine.jquery.css') ?> -->

   <!--  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" /> -->
<!-- 
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet"> -->




    
   <!--  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->

  <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/css/bootstrap.css" /> -->
   

  </head>

<body class="nav-md">
    <div class="container body">
        <div class="main_container">
        <?= $this->element('menu');?>
        <div class="right_col" role="main">
        <div class="">
            <div class="clearfix"></div>
            <div class="row">
             <div class="col-md-12 col-xs-12">
            <div class="x_panel">
            <?= $this->Flash->render() ?>
            <?= $this->fetch('content') ?>
             </div>
        <!-- /footer content -->
    </div>
    </div>
    </div>
    </div>
         
    </div>
</div>


<?= $this->Html->script('admin/jquery.min.js') ?>
  <?= $this->Html->script('admin/bootstrap.min.js') ?>
  <?= $this->Html->script('admin/fastclick.js') ?>
  <?= $this->Html->script('admin/nprogress.js') ?>
  <?= $this->Html->script('admin/icheck.min.js') ?>
  <?= $this->Html->script('admin/switchery.min.js') ?>
 <?= $this->Html->script('admin/jquery.dataTables.min.js') ?>
  <?= $this->Html->script('admin/dataTables.bootstrap.min.js') ?>
     
 <!--  <?= $this->Html->script('admin/jquery.validationEngine.js') ?>
  <?= $this->Html->script('admin/jquery.validationEngine-en.js') ?> -->
  <?= $this->Html->script('admin/validator.js') ?>
  <?= $this->Html->script('admin/bootstrap-datepicker.js') ?>








 


 

  <script type="text/javascript">
    // var PATH = $(location).attr('pathname');
    // var arr = PATH.split('/');
    // if(arr[4] == "dashboard"){
    //     $("#datatable-responsive").DataTable()
    // }
</script>               

<script>
$(document).ready(function() {
    var max_fields      = 50;
    var wrapper         = $(".container_Photo"); 
    var add_button      = $(".add_form_field_Photo"); 
    
    var x = 1; 
    $(add_button).click(function(e){ 
      // alert("image"+($('.image_upload').length));
        e.preventDefault();
        if(x < max_fields){ 
            x++; 
            var inmg_name = "image"+($('.image_upload').length);
            $(wrapper).append('<div><input  class="col-md-12 col-sm-12 col-xs-12 image_upload" type="file" name="image[]" accept="image/*" data-role="magic-overlay" data-target="#pictureBtn" data-edit="insertImage" /><a href="javascript:void(0);" class="delete">Delete</a><div class="ln_solid"></div>'); //add input box
        }
        else
        {
        alert('You Reached the limits')
        }
    });
    
    $(wrapper).on("click",".delete", function(e){ 
        e.preventDefault(); $(this).parent('div').remove(); x--;
    })

    var max_fields      = 50;
    var wrapper         = $(".container_Photo"); 
    var add_button      = $(".add_contact_form_field_Photo"); 
    
    var x = 1; 
    $(add_button).click(function(e){ 
        e.preventDefault();
        if(x < max_fields){ 
            x++; 
            $(wrapper).append('<div><input style="padding: 5px; margin: 10px 10px 10px 0px; background: #ffffff" class="col-md-12 col-sm-12 col-xs-12" dir="rtl" type="file" name="image[]"  accept="image/*" data-role="magic-overlay" data-target="#pictureBtn" data-edit="insertImage" />User Name <input style="padding: 5px; margin: 0px 10px 10px 0px;" class="col-md-12 col-sm-12 col-xs-12" dir="rtl" type="text" name="name[]" placeholder="Moho" required="required" class="form-control"><br>Phone <input  style="padding: 5px; margin: 0px 10px 10px 0px;" class="col-md-12 col-sm-12 col-xs-12" dir="ltr" type="number" name="phone_no[]" placeholder="+96597912345" class="form-control"><br>whatsapp <input  style="padding: 5px; margin: 0px 10px 10px 0px;" class="col-md-12 col-sm-12 col-xs-12" dir="ltr" type="number" name="whatsapp_no[]" placeholder="+96597912345" class="form-control"><br><a href="javascript:void(0);" class="delete">Delete</a><div class="ln_solid"></div></div>'); //add input box
        }
        else
        {
        alert('You Reached the limits')
        }
    });
    
    $(wrapper).on("click",".delete", function(e){ 
        e.preventDefault(); $(this).parent('div').remove(); x--;
    })
});
    
    
  $(document).ready(function() {
    var max_fields      = 50;
    var wrapper         = $(".container1"); 
    var add_button      = $(".add_general_note_form_field"); 
    
    var x = 1; 
    $(add_button).click(function(e){ 
        e.preventDefault();
        if(x < max_fields){ 
            x++; 
            $(wrapper).append('<div><input style="padding: 5px" class="form-control" type="text" name="general_note[]"><a href="javascript:void(0);" class="delete">Delete</a><div class="ln_solid"></div>'); //add input box
        }
    else
    {
    alert('You Reached the limits')
    }
    });
    
    $(wrapper).on("click",".delete", function(e){ 
        e.preventDefault(); $(this).parent('div').remove(); x--;
    })
 });  

    
    
$(document).ready(function() {
    var max_fields      = 50;
    var wrapper         = $(".container1"); 
    var add_button      = $(".add_form_field"); 
    
    var x = 1; 
    $(add_button).click(function(e){ 
        e.preventDefault();
        if(x < max_fields){ 
            x++; 
            $(wrapper).append('<div><input style="padding: 5px" class="form-control" type="text" name="description[]"><a href="javascript:void(0);" class="delete">Delete</a><div class="ln_solid"></div>'); //add input box
        }
        else
        {
        alert('You Reached the limits')
        }
    });
    
    $(wrapper).on("click",".delete", function(e){ 
        e.preventDefault(); $(this).parent('div').remove(); x--;
    })
});

// jQuery(document).ready(function(){
//     jQuery(".formID").validationEngine();
// });
    
$(document).on('change', '.statuschange', function(){
    var chalet_id = $(this).attr('id'); 
   
        if(this.checked){ 
            var status ='Yes';
        }else{
            var status ='No';
        } 
            $.ajax({
                type: "POST",
                url: 'chalet_status',
                data:{id:chalet_id,status:status} , //--> send id of checked checkbox on other page
                success: function(data) {
                   location.reload();
                },
               
            });

        
});

$(document).on('change', '.detailstatuschange', function(){
    var chalet_id = $(this).attr('id'); 
   
        if(this.checked){ 
            var status ='Yes';
        }else{
            var status ='No';
        } 
            $.ajax({
                type: "POST",
                url: '/admin/chalets/chalet_status',
                data:{id:chalet_id,status:status} , //--> send id of checked checkbox on other page
                success: function(data) {
                   location.reload();
                },
               
            });

        
});  

</script>

<script>
$(document).ready(function(){

    var date = new Date();
    date.setDate(date.getDate()-1);

    $('#inputID').datepicker({
        maxViewMode: 0,
        multidate: true,
        format: 'dd-mm-yyyy',
        autoclose: false,
        keepOpen: true,
        startDate: date,
    });

    // $( ".datepicker " ).prepend( " <div id='select-delivery-date-input'> </div>" );

    $input = $('.date');
    $input.datepicker('show');
    $('#applybook').click(function(){
        var datevalue = $('.date').val();
        var chalet_id = $('#hidden_chalet_id').val();
         var bookRecord = $.param({'chalet_id':chalet_id,'start_date':datevalue});
        
         $.ajax({
            type: 'POST',
            url: '/admin/chalets/book_chalet',
            data: bookRecord,

             success:function(data) {
              // location.reload();
            }   
           
        });
    });


});
$(document).on('click','.glyphicon-arrow-up',function(){
  var order_id = $(this).attr('data-order-id'); 
  var order_type = 'up' ;
  $.ajax({
        type: "POST",
        url: 'chalet_sorting',
        data:{order_id:order_id,order_type:order_type} , //--> send id of checked checkbox on other page
        success: function(data) {
          location.reload();
        },
       
  });

});
$(document).on('click','.glyphicon-arrow-down',function(){
  var order_id = $(this).attr('data-order-id'); 
  var order_type = 'down' ;
  $.ajax({
        type: "POST",
        url: 'chalet_sorting',
        data:{order_id:order_id,order_type:order_type} , //--> send id of checked checkbox on other page
        success: function(data) {
          location.reload();
        },
       
  });

});
</script>



 <?= $this->Html->script('admin/custom.min.js') ?> 
</body>
</html>
