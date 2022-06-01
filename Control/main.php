<?php
require_once ('../Entity/EContact.php');
$c=new EContact('roberto','3515797579','robertodistefano24@gmail.com');
echo $c->getPhoneNumber();