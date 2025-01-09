<?php
include '../include/config.php';
if( isset($_REQUEST['oid']) &&
	isset( $_REQUEST['amt']) &&
	isset( $_REQUEST['refId'])
	)
{
	$sql = "SELECT * FROM userorder WHERE id = '".$_REQUEST['oid']."'"	;
	$result = mysqli_query( $con, $sql);
	if(  $result )
	{

		
		if( mysqli_num_rows($result) == 1)
		{
			$order = mysqli_fetch_assoc( $result);
			$url = "https://uat.esewa.com.np/epay/transrec";
		
			$data =[
			'amt'=> $order['total_price'],
			'rid'=>  $_REQUEST['refId'],
			'pid'=>  $order['id'],
			'scd'=> 'EPAYTEST'
			];

			$curl = curl_init($url);
			curl_setopt($curl, CURLOPT_POST, true);
			curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
			$response = curl_exec($curl);
			$response_code = get_xml_node_value('response_code',$response  );

			
			if (trim($response_code) == 'Success') {
				$sql = "UPDATE userorder SET payment_status=1 WHERE id='" . $order['id'] . "'";
				mysqli_query($con, $sql);
				header('Location: successmessage.php?oid=' . $order['id']);
				exit;
			} else {
				echo "Payment verification failed.";
			}
	
	
		}
	}
}


function get_xml_node_value($node, $xml) {
    if ($xml == false) {
        return false;
    }
    $found = preg_match('#<'.$node.'(?:\s+[^>]+)?>(.*?)'.
            '</'.$node.'>#s', $xml, $matches);
    if ($found != false) {
        
            return $matches[1]; 
         
    }	  

   return false;
}