<?php 
if (!empty($_SESSION['type']) AND strtolower($_SESSION['type']) == "transportofficer") { ?>
    <li class="has-sub">
        <a href="#">
            <i class="fas fa-car"></i>Market
            <span class="bot-line"></span>
        </a>
        <ul class="header3-sub-list list-unstyled">
            <li>
                <a href="<?php echo(BASE_LINK); ?>/vehicle">Vehicle</a>
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