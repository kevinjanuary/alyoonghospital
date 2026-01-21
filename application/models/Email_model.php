<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Email_model extends CI_Model { 
	
	function __construct()
    {
        parent::__construct();
    }

    
	 public function send_email($message=NULL, $receiverEmail=NULL, $from=NULL, $attachment_url=NULL) {
		$format	= "<a href=\"https://optimumlinkupsoftware.com/optimumhms\">&copy; 2019 OFINE SCHOOL SYSTEM BY OPTIMUM LINKUP COMPUTERS</a>";
	   	$from = $this->db->get_where('settings' , array('type' => 'system_email'))->row()->description;

	   $headers = "From: ".$from."\r\n";
	   $headers .= "Reply-To: ".$receiverEmail."\r\n";
	   $headers .= "Return-Path: ".$receiverEmail."\r\n";
	   $headers .= "Website Link: ".$format."\r\n";
	   //$headers .= "CC: almobin777@gmail.com\r\n";
	   //$headers .= "BCC: instance.of.venture@gmail.com\r\n";
	   if ($attachment_url != NULL) {
		   $message .=	"\r\nAttachment URL: ".$attachment_url;
	   }
	   if ( mail($receiverEmail,$message,$headers) ) {

	   } else {
		   echo "The email has failed!";
	   }
   }


	
	
}

