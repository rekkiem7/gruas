<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
require_once(APPPATH."/third_party/ezpdf/class.ezpdf.php"); 
 
class Pdf extends Cezpdf { 
    public function __construct() { 
        
            parent::__construct();
        
    } 
}