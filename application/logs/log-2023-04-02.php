<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2023-04-02 15:12:16 --> 404 Page Not Found: /index
ERROR - 2023-04-02 18:42:22 --> Query error: Index for table '.\appmain\teachers.MYI' is corrupt; try to repair it - Invalid query: SELECT COUNT(T.id) AS total_teacher
FROM `teachers` AS `T`
WHERE `T`.`status` = 1
AND `T`.`school_id` = '154'
ERROR - 2023-04-02 18:42:22 --> Severity: error --> Exception: Call to a member function row() on bool D:\xampp\htdocs\appmain1\application\models\Dashboard_Model.php 167
