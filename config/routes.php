<?php
return [
    "/"=>\app\ctrl\homeCtrl::class,
    "admin" => [
        "/"=>\app\ctrl\adminCtrl::class,
        "role" => \app\ctrl\roleCtrl::class,
    ],
    "index"=>index::class

];