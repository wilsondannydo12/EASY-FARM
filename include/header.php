<div class="container">
   <nav class="navbar navbar-expand-lg navbar-light">
      <div class="logo"><a href="<?php echo(BASE_LINK); ?>"><img class="logo-img" src="<?php echo(BASE_LINK); ?>/assets/images/farm-logo3.png"><sup style="font-size: 13px;">Easy-Farm</sup></a></div>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
         <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
               <a class="nav-link" href="<?php echo(BASE_LINK); ?>">Home</a>
            </li>
            <li class="nav-item">
               <a class="nav-link" href="<?php echo(BASE_LINK); ?>/about">About</a>
            </li>
            <li class="nav-item">
               <a class="nav-link" target="_blank" href="<?php echo(BASE_LINK); ?>/market/home">Market</a>
            </li>
            <li class="nav-item">
               <a class="nav-link" href="<?php echo(BASE_LINK); ?>/contact">Contact Us</a>
            </li>
         </ul>
      </div>
   </nav>
</div>

<?php include 'php/userRegistration_server.php'; ?>