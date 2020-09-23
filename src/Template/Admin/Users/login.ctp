
<div>
  <div class="login_wrapper">
    <div class="animate form login_form">
      <section class="login_content">
        <?= $this->Flash->render() ?>
        <?= $this->Form->create() ?>
          <h1>Login Form</h1>
          <div>
            <?= $this->Form->control('email',['name'=>'email','type'=>'email','class'=>'form-control', 'label' => false,'placeholder'=>'Email']) ?>
          </div>
          <div>
            <?= $this->Form->control('password',['name'=>'password','type'=>'password','class'=>'form-control', 'label' => false,'placeholder'=>'Password']) ?>
          </div>
          <div>
         <input type="submit" name='submit' class="btn btn-default submit" value='Log in'>
         <?= $this->Html->link('Lost Admin password?', array('action'=>'forgotpassword'),['class'=>'reset_pass']); ?>
         <!-- <a class="reset_pass" href="javascript:void()">Lost Admin password?</a>
          </div> -->

       <?= $this->Form->end() ?>
      </section>
    </div>
  </div>
</div>

