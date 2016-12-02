<?
	require 'vendor/autoload.php';
	require 'common.php';
	require 'akamai.php';

	date_default_timezone_set("Asia/Seoul");
	//
	// Example for Open API
	//

	// ===============================================
	// GET TOP VISITOR COUNTRIES for ESD & DD 
	// ===============================================
	
	// -----------------------------------------------
	// DD - REST - Top Visitor Countries by Period
	// Result : Country Name, Visitors, Percentage (Array) 
	/*	
	$startDate = getdate(strtotime("2015-08-02"));
	$endDate = getdate(strtotime("2015-08-04"));
	
	$proxy = new DownloadDelivery; 
	$response = $proxy->getVisitorCountryByPeriod($startDate, $endDate, "373059");
	
	if (!$response->Message) {
		var_dump($response);
	} else {
		echo "Error!";
		var_dump($response);		// Error Case
	}
	*/
	
	// -----------------------------------------------
	// DD - REST - Top Visitor Countries by Month
	// Result : Country Name, Visitors, Percentage (Array) 
	/*
	$proxy = new DownloadDelivery; 
	$response = $proxy->getVisitorCountryByMonth("2015", "08", "378841");

	if (!$response->Message) {
		var_dump($response);
	} else {
		echo "Error!";
		var_dump($response);		// Error Case
	}
	*/
	
	// -----------------------------------------------
	// DD - REST - Top Visitor Countries by Day
	// Result : Country Name, Visitors, Percentage (Array) 
	/*
	$targetDate = getdate(strtotime("2015-08-02"));
	
	$proxy = new DownloadDelivery; 
	$response = $proxy->getVisitorCountryByDay($targetDate, "373059");
	
	if (!$response->Message) {
		var_dump($response);
	} else {
		echo "Error!";
		var_dump($response);		// Error Case
	}
	*/

	// ===============================================
	// GET PEAK TRAFFIC for ESD & DD 
	// ===============================================
	
	// -----------------------------------------------
	// DD - REST - Get Peak Traffic By Month
	// Result : Traffic (kbps)
	/*
	$proxy = new DownloadDelivery; 
	$response = $proxy->getPeakTrafficByMonth("2015", "08", "378841");
	
	if (!$response->Message) {
		echo $response." kbps \r\n";
	} else {
		var_dump($response);		// Error Case
	}
	*/	
	// -----------------------------------------------
	// DD - REST - Get Peak Traffic By Day
	// Result : Traffic (kbps)
	/*
	$targetDate = getdate(strtotime("2015-08-21"));
	
	$proxy = new DownloadDelivery; 
	$response = $proxy->getPeakTrafficByDay($targetDate, "378841");
	
	if (!$response->Message) {
		echo $response." kbps \r\n";
	} else {
		var_dump($response);		// Error Case
	}
	*/
	// -----------------------------------------------
	// DD - REST - Get Peak Traffic By Day
	// Result : Traffic (Mbps)
	/*
	$startDate = getdate(strtotime("2015-08-05"));
	$endDate = getdate(strtotime("2015-08-15"));
	
	$proxy = new DownloadDelivery; 
	$response = $proxy->getPeakTrafficByPeriod($startDate, $endDate, "378841");
	
	if (!$response->Message) {
		echo $response." kbps \r\n";
	} else {
		var_dump($response);		// Error Case
	}
	*/

	// ===============================================
	// GET TRAFFIC VOLUME for ESD & DD 
	// ===============================================
	
	// -----------------------------------------------
	// DD - REST - Get Traffic Volume By Month
	// Result : Traffic (MB)
	/*
	$proxy = new DownloadDelivery; 
	$response = $proxy->getVolumeByMonth("2015", "08", "378841");
	
	if (!$response->Message) {
		echo $response->Edge." MB \r\n";
		echo $response->Midgress." MB \r\n";
		echo $response->Origin." MB \r\n";
	} else {
		var_dump($response);		// Error Case
	}
	*/
	// -----------------------------------------------
	// DD - REST - Get Traffic Volume By Day
	// Result : Traffic (MB)
	/*
	$targetDate = getdate(strtotime("2015-08-01"));
	
	$proxy = new DownloadDelivery; 
	$response = $proxy->getVolumeByDay($targetDate, "378841");
	
	if (!$response->Message) {
		echo $response->Edge." MB \r\n";
		echo $response->Midgress." MB \r\n";
		echo $response->Origin." MB \r\n";
	} else {
		var_dump($response);		// Error Case
	}
	*/
	// -----------------------------------------------
	// DD - REST - Get Traffic Volume By Period
	// Result : Traffic (MB)
	/*
	$startDate = getdate(strtotime("2015-08-05"));
	$endDate = getdate(strtotime("2015-08-10"));
	
	$proxy = new DownloadDelivery; 
	$response = $proxy->getVolumeByPeriod($startDate, $endDate, "378841");
	
	if (!$response->Message) {
		echo $response->Edge." MB \r\n";
		echo $response->Midgress." MB \r\n";
		echo $response->Origin." MB \r\n";
	} else {
		var_dump($response);		// Error Case
	}
	*/
	
	// ===============================================
	// GET (estimated) BILLING TRAFFIC for ESD & DD 
	// ===============================================
	
	// -----------------------------------------------
	// DD - REST - Get Billing Traffic By Month
	// Result : Edge + Midgress (MB)
	/*
	$proxy = new DownloadDelivery; 
	$response = $proxy->getBillingByMonth("2015", "08", "378841");
	
	if (!$response->Message) {
		echo $response." MB \r\n\r\n\r\n";
	} else {
		var_dump($response);		// Error Case
	}
	*/
	
	// -----------------------------------------------
	// DD - REST - Get Billing Traffic By Day
	// Result : Edge + Midgress (MB)
	/*
	$targetDate = getdate(strtotime("2015-08-05"));
	
	$proxy = new DownloadDelivery; 
	$response = $proxy->getBillingByDay($targetDate, "378841");
	
	if (!$response->Message) {
		echo $response." MB \r\n";
	} else {
		var_dump($response);		// Error Case
	}
	*/
	// -----------------------------------------------
	// DD - REST - Get Billing Traffic By Period
	// Result : Edge + Midgress (MB)
	/*
	$startDate = getdate(strtotime("2015-08-05"));
	$endDate = getdate(strtotime("2015-08-10"));
	
	$proxy = new DownloadDelivery; 
	$response = $proxy->getBillingByPeriod($startDate, $endDate, "378841");
	
	if (is_string($response)) {
		echo $response." MB \r\n";
	} else {
		var_dump($response);		// Error Case
	}
	*/	
	//
	// Example for SOAP API
	//
	
	// ===============================================
	// GET PEAK TRAFFIC for DSA & ION 
	// ===============================================
	
	// -----------------------------------------------
	// ION - SOAP - Get Peak Traffic By Month
	// Result : Peak Mbps
	/*
	$proxy = new Ion;
	$response = $proxy->getPeakTrafficByMonth("2015", "08", "330610");
	
	if (is_string($response))
		echo $response." Mbps \r\n";		// No Error Case
	else
		var_dump($response);		// Error Case
	*/
	
	// -----------------------------------------------
	// ION - SOAP - Get Peak Traffic By Day
	// Result : Peak Mbps
	/*
	$targetDate = getdate();
	
	$proxy = new Ion;
	$response = $proxy->getPeakTrafficByDay($targetDate, "330610");
	
	if (is_string($response))
		echo $response." Mbps \r\n";		// No Error Case
	else
		var_dump($response);		// Error Case
	*/
	
	// -----------------------------------------------
	// ION - SOAP - Get Peak Traffic for Specific Period
	// Result : Peak Mbps
	/*
	$startDate = getdate(strtotime("2015-08-01"));
	$endDate = getdate(strtotime("2015-08-31"));
	
	$proxy = new Ion;
	$response = $proxy->getPeakTrafficByPeriod($startDate, $endDate, "330610");
	
	if (is_string($response))
		echo $response." Mbps \r\n";		// No Error Case
	else
		var_dump($response);		// Error Case
	*/
	
	// ===============================================
	// GET PEAK HITS for DSA & ION 
	// ===============================================
	
	// -----------------------------------------------
	// ION - SOAP - Get Peak Hits By Month
	// Result : Peak Hits in Integer
	/*
	$proxy = new Ion;
	$response = $proxy->getPeakHitsByMonth("2015", "08", "330610");
	
	if (is_string($response))
		echo $response." hits/second \r\n";		// No Error Case
	else
		var_dump($response);		// Error Case
	*/	
	// -----------------------------------------------
	// ION - SOAP - Get Peak Hits By Day
	// Result : Peak Hits in Integer
	/*
	$targetDate = getdate();
	
	$proxy = new Ion;
	$response = $proxy->getPeakHitsByDay($targetDate, "330610");
	
	if (is_string($response))
		echo $response." hits/second \r\n";		// No Error Case
	else
		var_dump($response);		// Error Case
	*/
	
	// -----------------------------------------------
	// ION - SOAP - Get Peak Hits for Specific Period
	// Result : Peak Hits in Integer
	/*
	$startDate = getdate(strtotime("2015-08-01"));
	$endDate = getdate(strtotime("2015-08-02"));
	
	$proxy = new Ion;
	$response = $proxy->getPeakHitsByPeriod($startDate, $endDate, "330610");
	
	if (is_string($response))
		echo $response." hits/second \r\n";		// No Error Case
	else
		var_dump($response);		// Error Case
	*/
	
	// ===============================================
	// GET VOLUME for DSA & ION 
	// ===============================================
	
	// -----------------------------------------------
	// ION - SOAP - Get Total Volume By Month
	// Result : Edge Volume in MB
	/*
	$proxy = new Ion;
	$response = $proxy->getVolumeByMonth("2015", "08", "330610");
	
	if (is_string($response))
		echo $response." MB \r\n";		// No Error Case
	else
		var_dump($response);		// Error Case
	*/

	// -----------------------------------------------
	// ION - SOAP - Get Total Volume By Day
	// Result : Edge Volume in MB
	/*
	$targetDate = getdate();
	
	$proxy = new Ion;
	$response = $proxy->getVolumeByDay($targetDate, "330610");
	
	if (is_string($response))
		echo $response." MB \r\n";		// No Error Case
	else
		var_dump($response);		// Error Case
	*/
	
	// -----------------------------------------------
	// ION - SOAP - Get Total Volume By Period
	// Result : Edge Volume in MB
	/*
	$startDate = getdate(strtotime("2015-08-01"));
	$endDate = getdate(strtotime("2015-08-02"));
	
	$proxy = new Ion;
	$response = $proxy->getVolumeByPeriod($startDate, $endDate, "330610");
	
	if (is_string($response))
		echo $response." MB \r\n";		// No Error Case
	else
		var_dump($response);		// Error Case
	*/
	
	// ===============================================
	// GET (estimated) BILLING TRAFFIC for DSA & ION 
	// ===============================================
	
	// -----------------------------------------------
	// ION - SOAP - Get Etd. Billing Traffic By Month
	// Result : Edge Volume+(Midgress Volume/2) in MB
	/*
	$proxy = new Ion;
	$response = $proxy->getBillingByMonth("2015", "08", "330610");
	
	if (is_string($response))
		echo $response." MB \r\n";		// No Error Case
	else
		var_dump($response);		// Error Case
	*/
	
	// -----------------------------------------------
	// ION - SOAP - Get Etd. Billing Traffic By Day
	// Result : Edge Volume+(Midgress Volume/2) in MB
	/*
	$targetDate = getdate();
	
	$proxy = new Ion;
	$response = $proxy->getBillingByDay($targetDate, "330610");
	
	if (is_string($response))
		echo $response." MB \r\n";		// No Error Case
	else
		var_dump($response);		// Error Case
	*/
	
	// -----------------------------------------------
	// ION - SOAP - Get Etd. Billing Traffic By Period
	// Result : Edge Volume+(Midgress Volume/2) in MB
	/*
	$startDate = getdate(strtotime("2015-08-01"));
	$endDate = getdate(strtotime("2015-08-02"));
	
	$proxy = new Ion;
	$response = $proxy->getBillingByPeriod($startDate, $endDate, "330610");
	
	if (is_string($response))
		echo $response." MB \r\n";		// No Error Case
	else
		var_dump($response);		// Error Case
	*/

	// ===============================================
	// GET TOP VISITOR COUNTRIES for DSA & ION 
	// ===============================================

	// -----------------------------------------------
	// ION - SOAP - Top Visitor Countries by Month
	// Result : Country Name, Visitors, Percentage (Array)
	/*
	$proxy = new Ion; 
	$response = $proxy->getVisitorCountryByMonth("2015", "08", "330610");
	
	if (is_null($response->getMessage)) {
		var_dump($response);
	} else {
		var_dump($response);		// Error Case
	}
	// e.g.
	echo $response["Macedonia"]["Visitors"] . "\r\n";
	echo $response["Macedonia"]["Percentage"] . "\r\n";
	*/
	
	// -----------------------------------------------
	// DSA & ION - SOAP - Top Visitor Countries by Period
	// Result : Country Name, Visitors, Percentage (Array)
	/*
	$startDate = getdate(strtotime("2015-08-02"));
	$endDate = getdate(strtotime("2015-08-04"));
	
	$proxy = new Ion; 
	$response = $proxy->getVisitorCountryByPeriod($startDate, $endDate, "330610");
	
	if (is_null($response->getMessage)) {
		var_dump($response);
	} else {
		var_dump($response);		// Error Case
	}
	// e.g.
	echo $response["Macedonia"]["Visitors"] . "\r\n";
	echo $response["Macedonia"]["Percentage"] . "\r\n";	
	*/
	
	// -----------------------------------------------
	// DSA & ION - SOAP - Top Visitor Countries by Day
	// Result : Country Name, Visitors, Percentage (Array)
	$targetDate = getdate(strtotime("2015-08-02"));
	
	$proxy = new Ion; 
	$response = $proxy->getVisitorCountryByDay($targetDate, "330610");
	
	if (is_null($response->getMessage)) {
		var_dump($response);
	} else {
		var_dump($response);		// Error Case
	}
?>