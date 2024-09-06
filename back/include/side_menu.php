<aside class="menu-sidebar2">
    <div class="logo">
        <a href="javascript:;">
            <img src="images/ckt.png" alt="ckt" style="width: 30%;" />
            <span style="color: #fff;">FOOD BANK</span>
        </a>
    </div>
    <div class="menu-sidebar2__content js-scrollbar1">
        <div class="account2">
            <div class="image img-cir img-120">
                <img src="<?php echo($myImage); ?>" alt="<?php echo($firstname); ?>" />
            </div>
            <h4 class="name"><?php echo $firstname; ?></h4>
            <a href="logout.php">Sign out</a>
        </div>
        <nav class="navbar-sidebar2">
            <ul class="list-unstyled navbar__list">
                <li>
                    <a href="<?php echo(BASE_LINK); ?>/dashboard">
                        <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                </li>
            </ul>
        </nav>
    </div>
</aside>