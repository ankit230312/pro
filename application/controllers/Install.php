<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/* * *****************Install.php**********************************
 * @product name    : Educlouds
 * @type            : Class
 * @class name      : Install
 * @description     : This is Install class of the application.  
 * @author          : makemaya Team 	
 * @url             : https://educlouds.app/      
 * @support         : aniltomar95@gmail.com	
 * @copyright       : makemaya Team	 	
 * ********************************************************** */

class Install extends CI_Controller {
    /*     * **************Function index**********************************
     * @type            : Function
     * @function name   : index
     * @description     : this function redirect to installation process            
     * @param           : null; 
     * @return          : null 
     * ********************************************************** */

    public function index() {
       redirect(base_url() . 'installation/setting');             
    }

}
