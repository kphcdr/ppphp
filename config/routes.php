<?php
return [
    "/"      => \app\ctrl\indexCtrl::class,
    "index"  => \app\ctrl\indexCtrl::class,
    "indexs" => [
        "db" => [
            "db" => \app\ctrl\indexCtrl::class,

        ]
    ]
];