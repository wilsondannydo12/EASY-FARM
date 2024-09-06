<?php 
if (!empty($_SESSION['type']) AND strtolower($_SESSION['type']) == "superadmin") { ?>
    <li>
        <a href="<?php echo(BASE_LINK); ?>/shop">
            <i class="fas fa-home"></i>Shop
            <span class="bot-line"></span>
        </a>
    </li>
    <li class="has-sub">
        <a href="#">
            <i class="fas fa-graduation-cap"></i>Product
            <span class="bot-line"></span>
        </a>
        <ul class="header3-sub-list list-unstyled">
            <li>
                <a href="<?php echo(BASE_LINK); ?>/product-type">Product Type</a>
            </li>
            <li>
                <a href="<?php echo(BASE_LINK); ?>/product">Products</a>
            </li>
        </ul>
    </li>
    <li class="has-sub">
        <a href="#">
            <i class="fas fa-car"></i>Transport
            <span class="bot-line"></span>
        </a>
        <ul class="header3-sub-list list-unstyled">
            <li>
                <a href="<?php echo(BASE_LINK); ?>/vehicle-type">Vehicle Type</a>
            </li>
            <li>
                <a href="<?php echo(BASE_LINK); ?>/vehicle">Vehicle</a>
            </li>
            <li>
                <a href="<?php echo(BASE_LINK); ?>/locality">Location</a>
            </li>
        </ul>
    </li>

    <li class="has-sub">
        <a href="#">
            <i class="fas fa-road"></i>Trips
            <span class="bot-line"></span>
        </a>
        <ul class="header3-sub-list list-unstyled">
            <li>
                <a href="<?php echo(BASE_LINK); ?>/ordered-trips">Ordered Trips</a>
            </li>
            <li>
                <a href="<?php echo(BASE_LINK); ?>/session-trips">Session Trips</a>
            </li>
            <li>
                <a href="<?php echo(BASE_LINK); ?>/ended-trips">Ended Trips</a>
            </li>
            <li>
                <a href="<?php echo(BASE_LINK); ?>/cancelled-trips">Cancelled Trips</a>
            </li>
        </ul>
    </li>
<?php } ?>