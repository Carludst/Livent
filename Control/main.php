<?php
require_once '../Entity/EUser.php';
$info=new EUser("carla@gmail.com","carla","lesbica","amministratore");
echo $info::class;
