<?php
use library\Db;

$query = "SELECT * FROM `users` ORDER BY `id` DESC";

$usersList = Db::q($query);