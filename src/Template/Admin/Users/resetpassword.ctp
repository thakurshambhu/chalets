
<?php $this->assign('title', 'Reset Password'); ?>
<div>
  <div class="login_wrapper">
    <div class="animate form login_form">
      <section class="login_content">
        <?= $this->Flash->render() ?>
        <?= $this->Form->create() ?>
          <h1>Reset Password</h1>
          <div>
            <?= $this->Form->input('password', ['required' => true, 'autofocus' => true,'class'=>'form-control', 'label' => false,'placeholder'=>'Password']); ?>
          </div>
          <div>
            <?= $this->Form->input('confirm_password', ['type' => 'password', 'required' => true,'class'=>'form-control', 'label' => false,'placeholder'=>'Password']);?>
          </div>
          
          <div>
        <!--   <?= $this->Form->button('Submit',['class'=>'btn btn-success submit']);?> -->
        <input type="submit" name='submit' class="btn btn-success submit" value='submit'>
       <?= $this->Form->end() ?>
      </section>
    </div>
  </div>
</div>