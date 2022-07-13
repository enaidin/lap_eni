<nav class="uk-navbar-container" uk-navbar>
    <div class="uk-navbar-left">

        <ul class="uk-navbar-nav">
            <li class="<?php if (in_array($_SERVER["REQUEST_URI"], array("/", "/home"))) { ?>uk-active<?php } ?>"><a href="/">Übersicht</a></li>
            <li class="<?php if (in_array($_SERVER["REQUEST_URI"], array("/patient", "/diagnosis", "/treatment"))) { ?>uk-active<?php } ?>">
                <a href="#">Einfügen</a>
                <div class="uk-navbar-dropdown">
                    <ul class="uk-nav uk-navbar-dropdown-nav">
                        <li class="<?php if ($_SERVER["REQUEST_URI"] == "/patient") { ?>uk-active<?php } ?>"><a href="patient">Patient</a></li>
                        <li class="<?php if ($_SERVER["REQUEST_URI"] == "/diagnosis") { ?>uk-active<?php } ?>"><a href="diagnosis">Diagnose</a></li>
                        <li class="<?php if ($_SERVER["REQUEST_URI"] == "/treatment") { ?>uk-active<?php } ?>"><a href="treatment">Behandlung</a></li>
                    </ul>
                </div>
            </li>
        </ul>

    </div>
</nav>