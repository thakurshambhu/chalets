<!-- <?php $this->assign('title', 'Request Password Reset'); ?><div class="users content">
  <h3><?php echo __('Forgot Password'); ?></h3>
  <?php
      echo $this->Form->create();
        echo $this->Form->input('email', ['autofocus' => true, 'label' => 'Email address', 'required' => true]);
    echo $this->Form->button('Request reset email');
      echo $this->Form->end();
  ?>
</div>
 -->
<?php $this->assign('title', 'Request Password Reset'); ?> 
<div>
  <div class="login_wrapper">
   <?= $this->Flash->render() ?>	
    <div class="animate form login_form forgotForm">
     
      <section class="login_content">
        <?= $this->Form->create() ?>
          <h1>Forgot Password</h1>
          <div>
            <?= $this->Form->control('email',['name'=>'email','type'=>'email','class'=>'form-control', 'label' => false,'placeholder'=>'Email','required' => true]) ?>
          </div>
          
          <div>
         <!--  <?= $this->Form->button('Request reset email',['class'=>'btn btn-success submit']);?> -->
            <input type="submit" name='request_reset_email' class="btn btn-success submit" value='Request reset email'>
        
       <?= $this->Form->end() ?>
      </section>
    </div>
  </div>
</div>