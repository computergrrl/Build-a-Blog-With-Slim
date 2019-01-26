<?php
include('../models/data.php');

$blogdata = "../models/database.db";

$thedata = new Data($blogdata);

var_dump($thedata);
