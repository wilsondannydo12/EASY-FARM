<?php 
if (!empty($_SESSION['type']) AND (strtolower($_SESSION['type']) == "farmer") || strtolower($_SESSION['type']) == "chemist") { ?>
    <li class="has-sub">
        <a href="#">
            <i class="fas fa-graduation-cap"></i>Market
            <span class="bot-line"></span>
        </a>
        <ul class="header3-sub-list list-unstyled">
            <li>
                <a href="<?php echo(BASE_LINK); ?>/product">Products</a>
            </li>
        </ul>
    </li>

    <li class="has-sub">
        <a href="#">
            <i class="fas fa-money"></i>Order / Payment
            <span class="bot-line"></span>
        </a>
        <ul class="header3-sub-list list-unstyled">
            <li>
                <a href="<?php echo(BASE_LINK); ?>/awaiting-payment">Awaiting Payment</a>
            </li>
            <li>
                <a href="<?php echo(BASE_LINK); ?>/session-orders">Session Orders</a>
            </li>
            <li>
                <a href="<?php echo(BASE_LINK); ?>/delivered-orders">Delivered Orders</a>
            </li>
        </ul>
    </li>
<?php } ?>