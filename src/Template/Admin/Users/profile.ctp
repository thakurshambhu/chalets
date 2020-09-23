
  
                <div class="x_title">
                    <h1>Settings</h1>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                     <?= $this->Flash->render() ?>
           <?= $this->Form->create('Profile',['class'=>'form-horizontal','enctype' => 'multipart/form-data']) ?>
                        <h3 align="center">Account Data</h3>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Username
                            </label>
                            <div class="col-md-9 col-sm-4 col-xs-12">
                                <input name="username" type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12" placeholder="Username" value="<?= $user->username ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Email
                            </label>
                            <div class="col-md-9 col-sm-4 col-xs-12">
                                <input name="email" type="email" id="last-name" name="last-name" required="required" class="form-control col-md-7 col-xs-12" placeholder="email@gmail.com" value="<?= $user->email ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Logo</label>
                            <div class="col-md-6 col-sm-9 col-xs-12">
                                <div class="center"><?= $this->Html->image('profile/'.$user->logo,['border'=>'0','width'=>'100','height'=>'100']);?><br><br></div>
                                <input type="file" name="logo" accept="image/*"  data-role="magic-overlay"  data-target="#pictureBtn" data-edit="insertImage" />
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                                <button id="send" type="submit" class="btn btn-success">Save</button>
                            </div>
                        </div>
                        <?= $this->Form->end() ?>
                       
                </div>
                <div class="x_content">
                     <div class="ln_solid"></div>
                        <h3 align="center">Change password</h3>
                         <form class="form-horizontal" method="post" action="/admin/users/changePassword">
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Old Password
                            </label>
                            <div class="col-md-9 col-sm-4 col-xs-12">
                                <input type="password" name=
                                "current_password"  id="first-name" class="form-control col-md-7 col-xs-12" placeholder="Old Password" required="required">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">New Password
                            </label>
                            <div class="col-md-9 col-sm-4 col-xs-12">
                                <input type="password" id="last-name" name="password" class="form-control col-md-7 col-xs-12" placeholder="New Password" required="required">
                            </div>
                        </div>
                        <div class="form-group">
                            <label  for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Repeat New Passwords</label>
                            <div class="col-md-9 col-sm-4 col-xs-12">
                                <input id="middle-name" class="form-control col-md-7 col-xs-12" type="password" name="confirm_password" placeholder="Repeat New Passwords" required="required">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                                <button id="send" type="submit" class="btn btn-success">Save</button>
                            </div>
                        </div>
                </form>
                </div>
