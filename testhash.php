<?php

$pass = isset($_GET['$pass']) ? $_GET['$pass'] : "sibidharan";
echo(md5($pass));