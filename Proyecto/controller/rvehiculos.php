<?php
session_start();
$p = array();
$p['resultado']='';
View('menuadm',$p);
View('rvehiculos',$p);