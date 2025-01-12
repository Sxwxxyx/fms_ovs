<?php
	session_start();

	include_once 'dbconnect.php';
    include_once 'voters.php';

    //get connection
    $database = new Database();
    $db = $database->getConnection();

    //pass connection to table
	$voter = new Voters($db);
	$voter->std_id = $_REQUEST["txt-username"];
	$result_vstatus = $voter->check_vstatus();

	if (mysqli_fetch_array($result_vstatus)) {
		//4- Voted already, cann't repeat
		header("Location: ../error.php?err_no=4");
		exit;
	}

	$tName = $_REQUEST["txt-username"];
	$tPass = $_REQUEST["txt-password"];
	$datecurrent = date("d/m/Y");

	$wsdl = "https://passport.psu.ac.th/authentication/authentication.asmx?wsdl";
	$client = new SoapClient($wsdl, array(
			"trace" => 1,	// enable trace to view what is happening
			"exceptions" => 0,	// disable exceptions
			"cache_wsdl" => 0)); // disable any caching on the wsdl, encase you alter the wsdl server

	$params = array('username' => $tName,'password' => $tPass);
	$data = $client->Authenticate($params);

	if ($data->AuthenticateResult == 1){
		$staff = $client->GetUserDetails($params);
		$staff_detail = $staff->GetUserDetailsResult;
		$user_id = $staff_detail->string[0];			//id
		$username = $staff_detail->string[1] . " " . $staff_detail->string[2];		//username
		$staff_id = $staff_detail->string[3];
		$id_card = $staff_detail->string[5];
		$fac_id = $staff_detail->string[7];
		$email = $staff_detail->string[13];

		//fac_id = 11 = FMS
		if ($fac_id=='F11') {
			//staff
			if (substr($staff_id,0,1) != '0') { 
				$result_v = $voter->readone();
				if (mysqli_fetch_array($result_v)) {
					$_SESSION['std_id'] = $user_id;
					$_SESSION['std_name'] = $username;
					header("Location: ../vote.php");
					exit;
				} else {
					//3- Only FMS student can register
					header("Location: ../error.php?err_no=3");
					exit;
				}
			} else {
				//2- Only student can register
				header("Location: ../error.php?err_no=2");
				exit;
			}
		} else {
			//3- Only FMS student can register
			header("Location: ../error.php?err_no=3");
			exit;
		}
	} else {
		//1 - username or password incorrect
		header("Location: ../error.php?err_no=1");
		exit;
	}
?>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">