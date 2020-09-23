<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chalets</title>
   
    <?= $this->Html->css('frontend/bootstrap.min.css') ?>
    <!--  <link rel="stylesheet" href=" https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"> -->
    <?= $this->Html->css('frontend/bootstrap.min.css') ?>
    <?= $this->Html->css('admin/font-awesome/css/font-awesome.min.css') ?>
    <?= $this->Html->css('frontend/style.css') ?>
</head>
<body>
<header>
    <div class="container">
        <div class="d-flex align-items-center">
            <?= $this->Html->image('frontend/logo.png', ['alt' => 'Logo']);?>
            <h2 class="ml-auto">Company's name</h2>
        </div>
    </div>
</header>

<?= $this->Flash->render() ?>
       
       <?= $this->fetch('content') ?>
<footer>
    <div class="d-flex justify-content-center">
        <div class="footeritem">
            
           <?php  echo $this->Html->link(
                $this->Html->image('frontend/home.svg',array('alt' => 'home')),
                array(
                    'controller' => 'Home', 
                    'action' => 'index'
                ), array('escape' => false)
            );?>
            <span><?php  echo $this->Html->link('Home'
                ,
                array(
                    'controller' => 'Home', 
                    'action' => 'index'
                ), array('escape' => false)
            );?></span>
        </div>
        <div class="footeritem">
            
            <?php  echo $this->Html->link(
                $this->Html->image('frontend/phone.svg',array('alt' => 'contact us')),
                array(
                    'controller' => 'Home', 
                    'action' => 'contactus'
                ), array('escape' => false)
            );?>
            <span><?php  echo $this->Html->link('Contact-Us'
                ,
                array(
                    'controller' => 'Home', 
                    'action' => 'contactus'
                ), array('escape' => false)
            );?></span>
        </div>
    </div>
</footer>

<?= $this->Html->script('frontend/jquery-3.4.1.slim.min.js') ?> 
<?= $this->Html->script('frontend/popper.min.js') ?> 
<?= $this->Html->script('frontend/bootstrap.min.js') ?>
<?= $this->Html->script('frontend/bootstrap-datepicker.js') ?>
<script>
$(document).ready(function(){
    var date = new Date();
    //date.setDate(date.getDate()-1);
  var today = new Date(date.getFullYear(), date.getMonth(), date.getDate());
  var end = new Date(date.getFullYear(), date.getMonth(), date.getDate());

    $('#select-delivery-date-input').datepicker({
        maxViewMode: 0,
        multidate: true,
        format: 'dd-mm-yyyy',
        autoclose: false,
        keepOpen: true,
        startDate: '0m',
        //defaultDate: date,
        beforeShowDay: function() {
          return false;
       }
         
    });

    $input = $('.date');
    $input.datepicker('show');
    // $('#applybook').click(function(){
    //     var datevalue = $('.date').val();
    //     var chalet_id = $('#hidden_chalet_id').val();
    //      var bookRecord = $.param({'chalet_id':chalet_id,'start_date':datevalue});
        
    //      $.ajax({
    //          url: "http://localhost/chalets/admin/chalets/book_chalet",
    //          type: 'POST',
           
    //         data: bookRecord,

    //          success:function(data) {
    //           location.reload();
    //         }
           
    //     });
    // });

});

</script>

<script>
    var totalItems = $('.item').length;
            var currentIndex = $('div.item.active').index() + 1;

            var down_index;
            $('.num').html(''+currentIndex+'/'+totalItems+'');

                $(".next").click(function(){
                currentIndex_active = $('div.item.active').index() + 2;
                if (totalItems >= currentIndex_active)
                {
                    down_index= $('div.item.active').index() + 2;
                    $('.num').html(''+currentIndex_active+'/'+totalItems+'');
                }
            });

                $(".prev").click(function(){
                    down_index=down_index-1;
                if (down_index >= 1 )
                {
                    $('.num').html(''+down_index+'/'+totalItems+'');
                }
            });
</script>
</body>
</html>