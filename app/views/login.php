<?php $this->output('tampilan/header'); ?>
<!-- Page Content -->
<div class="container">

  <div class="row">

	<!-- Blog Entries Column -->
	<div class="col-md-8">
	 <h1 class="my-4">Login Sistem
          </h1>
	<div class="col-md-6">
	<form class="form-horizontal" action="<?php echo $settingUrl->siteUrl('login/proses'); ?>" method="post">
      <div class="control-group">
        <label class="control-label" for="inputEmail">Username</label>
        <div class="controls">
          <input type="text" autofocus id="username" name="username" placeholder="Username" class="form-control">
        </div>
      </div>
      <div class="control-group">
        <label class="control-label" for="inputPassword">Password</label>
        <div class="controls">
          <input type="password" name="password" id="inputPassword" placeholder="Password"  class="form-control">
        </div>
      </div>
      <div class="control-group">
        <div class="controls"><br>
          <button type="submit" class="btn btn-info" name="login" value="login">Login</button>
        </div>
      </div>
    </form>
	</div>
	</div>
<?php $this->output('tampilan/rightmenu'); ?>