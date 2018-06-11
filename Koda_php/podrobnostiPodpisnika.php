<?php

require 'razredi/Podpisnik.php';
require 'razredi/Checkboxi.php';
require 'razredi/Boolbox.php';
require 'razredi/Privolitev.php';
require 'razredi/Verzija.php';

require 'menu.php';
require 'check_user.php';

$podpisnik = $_SESSION['podpisnik'];
$privolitev = $_SESSION['privolitev'];
$verzija = $_SESSION['verzija'];
$checkboxes = $_SESSION['checkboxes'];
$boolboxes = $_SESSION['boolboxes'];

echo $podpisnik->getEmail();
