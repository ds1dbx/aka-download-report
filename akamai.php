<?
// 2015.09.01
// - Adding 3 ION/DSA functions for Peak Traffic by Mbps
// - Removal of wrong variable assignment for ION/DSA funtions for Peak Hits
// 2015.09.23
// - Modify Error Handling Logics to use ($response->Message)

use Akamai\Open\EdgeGrid;
$client  = \Akamai\Open\EdgeGrid\Client::createFromEdgeRcFile();
$wsUserId = "__ws_user__";
$wsUserPassword = "__ws_pwd__"; 
$wsdl = "https://".$wsUserId.":".$wsUserPassword."@control.akamai.com/nmrws/services/SiteAcceleratorReportService?wsdl";

$soapClient = new soapClient($GLOBALS['wsdl'], 
	array(
		'login'		=> $GLOBALS['wsUserId'],
		'password'	=> $GLOBALS['wsUserPassword']
	)
);

class Ion {
	// WSDL Address : https://control.akamai.com/nmrws/services/SiteAcceleratorReportService?wsdl
	// End Point : https://control.akamai.com/nmrws/services/SiteAcceleratorReportService
	
	// ----------------------------------------------------------------------------------
	// Private Functions
	// ----------------------------------------------------------------------------------
	private function __getCPCodes() {
		$response = $GLOBALS['soapClient']->getCPCodes();
		return $response;
	}

	// ----------------------------------------------------------------------------------
	// Public Functions
	// ----------------------------------------------------------------------------------
	function getCPCodes() {
		$CPCodes = $this->__getCPCodes();		
		
		return (array)$CPCodes;
	}
	
	public function getPeakTrafficByMonth($year, $month, $cpcodes) { 
		$__from = sprintf("%04s-%02s-01T00:00:00", $year, $month);
		$__to = sprintf("%04s-%02s-31T00:00:00", $year, $month);
		$__cpcodes = $cpcodes;
		
		$params1 = array('item' => $cpcodes);
		$params = array('cpcodes' => $params1, 'start' => $__from, 'end' => $__to);
		$__response = new stdClass();		// Not to be warned by "Creating default object from empty value" 
		
		try {
			$__response = $GLOBALS['soapClient']->__soapCall("getTrafficSummaryForCPCode", $params);
			$__response = explode("# ", $__response);
			$__response = explode(sprintf("%s/",$month), $__response[4]);
			// Loop for every single line to get maximum value
			$__max = 0;
			
			// index of 3 is "Edge Traffic Volume"
			foreach ($__response as $__temp) {
				$__temp = explode(",", $__temp);
				if ($__temp[0] == "Total") { continue; }
				elseif (intval($__temp[3]) > $__max) { $__max = $__temp[3]; }
			}
			$response = (string)round($__max / 300, 2);
		} catch (Exception $e) {
			$response->Message = $e->getMessage();
			$response->Trace = $e->getTrace();
		}
		return $response;
	}
	
	public function getPeakTrafficByDay($targetDate, $cpcodes) {
		$__from = sprintf("%04s-%02s-%02sT00:00:00", $targetDate["year"], $targetDate["mon"], $targetDate["mday"]);
		$__to = sprintf("%04s-%02s-%02sT23:59:59", $targetDate["year"], $targetDate["mon"], $targetDate["mday"]);
		$__cpcodes = $cpcodes;
		
		$params1 = array('item' => $cpcodes);
		$params = array('cpcodes' => $params1, 'start' => $__from, 'end' => $__to);
		$__response = new stdClass();		// Not to be warned by "Creating default object from empty value" 
		
		try {
			$__response = $GLOBALS['soapClient']->__soapCall("getTrafficSummaryForCPCode", $params);
			$__response = explode("# ", $__response);
			$__response = explode(sprintf("%s/",$month), $__response[4]);
			// Loop for every single line to get maximum value
			$__max = 0;
			
			// index of 3 is "Edge Traffic Volume"
			foreach ($__response as $__temp) {
				$__temp = explode(",", $__temp);
				if ($__temp[0] == "Total") { continue; }
				elseif (intval($__temp[3]) > $__max) { $__max = $__temp[3]; }
			}
			$response = (string)round($__max / 300, 2);
		} catch (Exception $e) {
			$response->Message = $e->getMessage();
			$response->Trace = $e->getTrace();
		}
		return $response;
	}
	
	public function getPeakTrafficByPeriod($startDate, $endDate, $cpcodes) {
		$__from = sprintf("%04s-%02s-01T00:00:00", $year, $month);
		$__to = sprintf("%04s-%02s-31T00:00:00", $year, $month);
		$__cpcodes = $cpcodes;
		
		$params1 = array('item' => $cpcodes);
		$params = array('cpcodes' => $params1, 'start' => $__from, 'end' => $__to);
		$__response = new stdClass();		// Not to be warned by "Creating default object from empty value" 
		
		try {
			$__response = $GLOBALS['soapClient']->__soapCall("getTrafficSummaryForCPCode", $params);
			$__response = explode("# ", $__response);
			$__response = explode(sprintf("%s/",$month), $__response[4]);
			// Loop for every single line to get maximum value
			$__max = 0;
			
			// index of 3 is "Edge Traffic Volume"
			foreach ($__response as $__temp) {
				$__temp = explode(",", $__temp);
				if ($__temp[0] == "Total") { continue; }
				elseif (intval($__temp[3]) > $__max) { $__max = $__temp[3]; }
			}
			$response = (string)round($__max / 300, 2);
		} catch (Exception $e) {
			$response->Message = $e->getMessage();
			$response->Trace = $e->getTrace();
		}
		return $response;
	} 

	public function getPeakHitsByMonth($year, $month, $cpcodes) {
		$__from = sprintf("%04s-%02s-01T00:00:00", $year, $month);
		$__to = sprintf("%04s-%02s-31T00:00:00", $year, $month);
		$__cpcodes = $cpcodes;
		
		$params1 = array('item' => $cpcodes);
		$params = array('cpcodes' => $params1, 'start' => $__from, 'end' => $__to);
		$__response = new stdClass();		// Not to be warned by "Creating default object from empty value" 
		
		try {
			$__response = $GLOBALS['soapClient']->__soapCall("getTrafficSummaryForCPCode", $params);
			$__response = explode("# ", $__response);
			$__response = explode(sprintf("%s/",$month), $__response[4]);
			// Loop for every single line to get maximum value
			$__max = 0;
			
			// index of 6 is "Edge Requests"
			foreach ($__response as $__temp) {
				$__temp = explode(",", $__temp);
				if ($__temp[0] == "Total") { continue; }
				elseif (intval($__temp[6]) > $__max) { $__max = $__temp[6]; }
			}
			$response = (string)round($__max / 300);
		} catch (Exception $e) {
			$response->Message = $e->getMessage();
			$response->Trace = $e->getTrace();
		}
		return $response;
	}
	
	public function getPeakHitsByDay($targetDate, $cpcodes) {
		$__from = sprintf("%04s-%02s-%02sT00:00:00", $targetDate["year"], $targetDate["mon"], $targetDate["mday"]);
		$__to = sprintf("%04s-%02s-%02sT23:59:59", $targetDate["year"], $targetDate["mon"], $targetDate["mday"]);
		$__cpcodes = $cpcodes;
		
		$params1 = array('item' => $cpcodes);
		$params = array('cpcodes' => $params1, 'start' => $__from, 'end' => $__to);
		$__response = new stdClass();		// Not to be warned by "Creating default object from empty value" 
		
		try {
			$__response = $GLOBALS['soapClient']->__soapCall("getTrafficSummaryForCPCode", $params);
			$__response = explode("# ", $__response);
			$__response = explode(sprintf("%s/",$month), $__response[4]);
			// Loop for every single line to get maximum value
			$__max = 0;
			
			// index of 6 is "Edge Requests"
			foreach ($__response as $__temp) {
				$__temp = explode(",", $__temp);
				if ($__temp[0] == "Total") { continue; }
				elseif (intval($__temp[6]) > $__max) { $__max = $__temp[6]; }
			}
			$response = (string)round($__max / 300);
		} catch (Exception $e) {
			$response->Message = $e->getMessage();
			$response->Trace = $e->getTrace();
		}
		return $response;
	}
	
	public function getPeakHitsByPeriod($startDate, $endDate, $cpcodes) {
		$__from = sprintf("%04s-%02s-%02sT00:00:00", $startDate["year"], $startDate["mon"], $startDate["mday"]);
		$__to = sprintf("%04s-%02s-%02sT23:59:59", $endDate["year"], $endDate["mon"], $endDate["mday"]);
		$__cpcodes = $cpcodes;
		
		$params1 = array('item' => $cpcodes);
		$params = array('cpcodes' => $params1, 'start' => $__from, 'end' => $__to);
		$__response = new stdClass();		// Not to be warned by "Creating default object from empty value" 
		
		try {
			$__response = $GLOBALS['soapClient']->__soapCall("getTrafficSummaryForCPCode", $params);
			$__response = explode("# ", $__response);
			$__response = explode(sprintf("%s/",$month), $__response[4]);
			// Loop for every single line to get maximum value
			$__max = 0;
			
			// index of 6 is "Edge Requests"
			foreach ($__response as $__temp) {
				$__temp = explode(",", $__temp);
				if ($__temp[0] == "Total") { continue; }
				elseif (intval($__temp[6]) > $__max) { $__max = $__temp[6]; }
			}
			$response = (string)round($__max / 300);
		} catch (Exception $e) {
			$response->Message = $e->getMessage();
			$response->Trace = $e->getTrace();
		}
		return $response;
	}

	public function getVolumeByMonth($year, $month, $cpcodes) {
		$__from = sprintf("%04s-%02s-01T00:00:00", $year, $month);
		$__to = sprintf("%04s-%02s-31T00:00:00", $year, $month);
		$__cpcodes = $cpcodes;
		
		$params1 = array('item' => $cpcodes);
		$params = array('cpcodes' => $params1, 'start' => $__from, 'end' => $__to);
		$__response = new stdClass();		// Not to be warned by "Creating default object from empty value" 
		
		try {
			$__response = $GLOBALS['soapClient']->__soapCall("getTrafficSummaryForCPCode", $params);
			$__response = explode("# ", $__response);
			$__response = explode(sprintf("%s/",$month), $__response[4]);
			$__response = explode(",", $__response[0]);
			
			// index of 3 is "Edge Traffic Volume in MB"
			$response = $__response[3];
		} catch (Exception $e) {
			$response->Message = $e->getMessage();
			$response->Trace = $e->getTrace();
		}
		return $response;
	}
	public function getVolumeByDay($targetDate, $cpcodes) {
		$__from = sprintf("%04s-%02s-%02sT00:00:00", $targetDate["year"], $targetDate["mon"], $targetDate["mday"]);
		$__to = sprintf("%04s-%02s-%02sT23:59:59", $targetDate["year"], $targetDate["mon"], $targetDate["mday"]);
		$__cpcodes = $cpcodes;
		
		$params1 = array('item' => $cpcodes);
		$params = array('cpcodes' => $params1, 'start' => $__from, 'end' => $__to);
		$__response = new stdClass();		// Not to be warned by "Creating default object from empty value" 
		
		try {
			$__response = $GLOBALS['soapClient']->__soapCall("getTrafficSummaryForCPCode", $params);
			$__response = explode("# ", $__response);
			$__response = explode(sprintf("%s/",$month), $__response[4]);
			$__response = explode(",", $__response[0]);
			
			// index of 3 is "Edge Traffic Volume in MB"
			$response = $__response[3];
		} catch (Exception $e) {
			$response->Message = $e->getMessage();
			$response->Trace = $e->getTrace();
		}
		return $response;
	}
	public function getVolumeByPeriod($startDate, $endDate, $cpcodes) {
		$__from = sprintf("%04s-%02s-%02sT00:00:00", $startDate["year"], $startDate["mon"], $startDate["mday"]);
		$__to = sprintf("%04s-%02s-%02sT23:59:59", $endDate["year"], $endDate["mon"], $endDate["mday"]);
		$__cpcodes = $cpcodes;
		
		$params1 = array('item' => $cpcodes);
		$params = array('cpcodes' => $params1, 'start' => $__from, 'end' => $__to);
		$__response = new stdClass();		// Not to be warned by "Creating default object from empty value" 
		
		try {
			$__response = $GLOBALS['soapClient']->__soapCall("getTrafficSummaryForCPCode", $params);
			$__response = explode("# ", $__response);
			$__response = explode(sprintf("%s/",$month), $__response[4]);
			$__response = explode(",", $__response[0]);
			
			// index of 3 is "Edge Traffic Volume in MB"
			$response = $__response[3];
		} catch (Exception $e) {
			$response->Message = $e->getMessage();
			$response->Trace = $e->getTrace();
		}
		return $response;
	}
	
	public function getBillingByMonth($year, $month, $cpcodes) {
		$__from = sprintf("%04s-%02s-01T00:00:00", $year, $month);
		$__to = sprintf("%04s-%02s-31T00:00:00", $year, $month);
		$__cpcodes = $cpcodes;
		
		$params1 = array('item' => $cpcodes);
		$params = array('cpcodes' => $params1, 'start' => $__from, 'end' => $__to);
		$__response = new stdClass();		// Not to be warned by "Creating default object from empty value" 
		
		try {
			$__response = $GLOBALS['soapClient']->__soapCall("getTrafficSummaryForCPCode", $params);
			$__response = explode("# ", $__response);
			$__response = explode(sprintf("%s/",$month), $__response[4]);
			$__response = explode(",", $__response[0]);
			
			// index of 3 is "Edge Traffic Volume in MB"
			// index of 4 is "Midgress Traffic Volume in MB"
			$response = $__response[3] + round($__response[4]/2);
			$response = (string)$response;
		} catch (Exception $e) {
			$response->Message = $e->getMessage();
			$response->Trace = $e->getTrace();
		}
		return $response;
	}
	public function getBillingByDay($targetDate, $cpcodes) {
		$__from = sprintf("%04s-%02s-%02sT00:00:00", $targetDate["year"], $targetDate["mon"], $targetDate["mday"]);
		$__to = sprintf("%04s-%02s-%02sT23:59:59", $targetDate["year"], $targetDate["mon"], $targetDate["mday"]);
		$__cpcodes = $cpcodes;
		
		$params1 = array('item' => $cpcodes);
		$params = array('cpcodes' => $params1, 'start' => $__from, 'end' => $__to);
		$__response = new stdClass();		// Not to be warned by "Creating default object from empty value" 
		
		try {
			$__response = $GLOBALS['soapClient']->__soapCall("getTrafficSummaryForCPCode", $params);
			$__response = explode("# ", $__response);
			$__response = explode(sprintf("%s/",$month), $__response[4]);
			$__response = explode(",", $__response[0]);
			
			// index of 3 is "Edge Traffic Volume in MB"
			// index of 4 is "Midgress Traffic Volume in MB"
			$response = $__response[3] + round($__response[4]/2);
			$response = (string)$response;
		} catch (Exception $e) {
			$response->Message = $e->getMessage();
			$response->Trace = $e->getTrace();
		}
		return $response;
	}
	public function getBillingByPeriod($startDate, $endDate, $cpcodes) {
		$__from = sprintf("%04s-%02s-%02sT00:00:00", $startDate["year"], $startDate["mon"], $startDate["mday"]);
		$__to = sprintf("%04s-%02s-%02sT23:59:59", $endDate["year"], $endDate["mon"], $endDate["mday"]);
		$__cpcodes = $cpcodes;
		
		$params1 = array('item' => $cpcodes);
		$params = array('cpcodes' => $params1, 'start' => $__from, 'end' => $__to);
		$__response = new stdClass();		// Not to be warned by "Creating default object from empty value" 
		
		try {
			$__response = $GLOBALS['soapClient']->__soapCall("getTrafficSummaryForCPCode", $params);
			$__response = explode("# ", $__response);
			$__response = explode(sprintf("%s/",$month), $__response[4]);
			$__response = explode(",", $__response[0]);
			
			// index of 3 is "Edge Traffic Volume in MB"
			// index of 4 is "Midgress Traffic Volume in MB"
			$response = $__response[3] + round($__response[4]/2);
			$response = (string)$response;
		} catch (Exception $e) {
			$response->Message = $e->getMessage();
			$response->Trace = $e->getTrace();
		}
		return $response;
	}

	// # rank,country,visitors,OK hits,OK volume
	
	public function getVisitorCountryByMonth($year, $month, $cpcodes) {
		// getVisitorByCountryForCPCode
		// cpcode, date (yyyyMMdd), columns (not supported)
		$__tempDate = sprintf("%04s-%02s-01", $year, $month);
		$__lastDate = getdate(strtotime(sprintf("%04s-%02s-31", $year, $month)));
		$__nextDate = getdate(strtotime($__tempDate."+1 days"));

		$__visitorSum = 0;	// Variable for sum-up every OK hits
		$__results = array();

		while ($__nextDate[0] <= $__lastDate[0])
		{
			$__date = sprintf("%04s%02s%02s", $__nextDate["year"], $__nextDate["mon"], $__nextDate["mday"]);
			$__tempDate = sprintf("%04s-%02s-%02s", $__nextDate["year"], $__nextDate["mon"], $__nextDate["mday"]);
			$__nextDate = getdate(strtotime($__tempDate."+1 days"));

			if ($month != sprintf("%02s",$__nextDate["mon"])) break;

			$params = array('cpcode' => $cpcodes, 'date' => $__date, 'columns' => "");
			$__response = new stdClass();		// Not to be warned by "Creating default object from empty value" 
			
			try {
				$__response = $GLOBALS['soapClient']->__soapCall("getVisitorByCountryForCPCode", $params);
				$__response = explode("# ", $__response);
				$__response = explode(PHP_EOL, $__response[3]);
				
				$__loop = -1;
								
				// #1. Restructure API response
				foreach ($__response as $__temp) {
					$__loop++;
					if ($__loop == 0) { continue; }
					$__temp = explode(",", $__temp);
				
					// Set OK hits to specific country : [1] > Country, [2] > Visitors
					$__resultDetails = array("Visitors" => $__results[$__temp[1]]["Visitors"] + intval($__temp[2]), "Percentage" => 0);
					$__results[$__temp[1]] = $__resultDetails;
					$__visitorSum = $__visitorSum + $__temp[2];
				}
				
				$__loop = 0;
				
				// #2. Adding Percentage to result array
				//	   $__results[$__key][0] : OK Hits
				//     $__results[$__key][1] : Percentage
				foreach ($__results as $__key => $__temp) {
					$__loop++;
					$__tmpVisitor = $__temp["Visitors"];
				
					$__tmpPercentage = round($__tmpVisitor / intval($__visitorSum) * 100,1);
					$__results[$__key]["Percentage"] = $__tmpPercentage;
				}
				
				// Output Format :
				// 	["USA"]=>         		>>>>>> Country Name
				//  {
				//    	[0]=> int(803) 		>>>>>> OK Hits
				//	   	[1]=> float(0.1)	>>>>>> Percentage
				// 	}
				$response = $__results;
			} catch (Exception $e) {
				$response->Message = $e->getMessage();
				$response->Trace = $e->getTrace();
			}
		}
		return $response;	
	}
	
	public function getVisitorCountryByDay($targetDate, $cpcodes) {
		$__date = sprintf("%04s%02s%02s", $targetDate["year"], $targetDate["mon"], $targetDate["mday"]); 

		$params = array('cpcode' => $cpcodes, 'date' => $__date, 'columns' => "");
		$__response = new stdClass();		// Not to be warned by "Creating default object from empty value" 
		
		try {
			$__response = $GLOBALS['soapClient']->__soapCall("getVisitorByCountryForCPCode", $params);
			$__response = explode("# ", $__response);
			$__response = explode(PHP_EOL, $__response[3]);
			
			//[0]=>string(110) "Site Accelerator Visitors. Covers from 2015/08/02 12:00:00 AM to 2015/08/02 11:59:00 PM GMT. Data is complete."
			//# rank,country,visitors,OK hits,OK volume
			//[1]=>string(22) "1,USA,803,8585,98.8448"
			//[2]=>string(22) "2,Japan,202,580,5.4413"
			//[3]=>string(23) "3,Taiwan,107,871,6.1226"

			$__loop = -1;
			$__visitorSum = 0;
			$__results = array();
			
			// #1. Restructure API response
			foreach ($__response as $__temp) {
				$__loop++;
				if ($__loop == 0) { continue; }
				$__temp = explode(",", $__temp);
				// var_dump($__temp);				
				// Set OK hits to specific country : [1] > Country, [2] > Visitors
				$__resultDetails = array(intval($__temp[2]), 0);
				$__results[$__temp[1]] = $__resultDetails;
				$__visitorSum = $__visitorSum + $__temp[2];
			}
			
			$__loop = 0;
			
			// #2. Adding Percentage to result array
			foreach ($__results as $__key => $__temp) {
				$__loop++;
				$__country = $__temp[0];
				$__temp2 = round(intval($__temp[0]) / intval($__visitorSum) * 100,1);
				$__results[$__key][1] = $__temp2;
			}
			
			// Output Format :
			// 	["USA"]=>            >>>>>> Country Name
			//  {
			//    	[0]=> int(803) >>>>>> Visitors
			//	   	[1]=> float(0.1)     >>>>>> Percentage
			// 	}
			$response = $__results;
		} catch (Exception $e) {
			$response->Message = $e->getMessage();
			$response->Trace = $e->getTrace();
		}
		return $response;
	}
	
	public function getVisitorCountryByPeriod($startDate, $endDate, $cpcodes) {
		$__nextDate = $startDate;
		$__tempDate = sprintf("%04s-%02s-%02s", $startDate["year"], $startDate["mon"], $startDate["mday"]);

		$__visitorSum = 0;	// Variable for sum-up every OK hits
		$__results = array();

		while ($__nextDate[0] <= $endDate[0])
		{
			$__date = sprintf("%04s%02s%02s", $__nextDate["year"], $__nextDate["mon"], $__nextDate["mday"]);
			$__tempDate = sprintf("%04s-%02s-%02s", $__nextDate["year"], $__nextDate["mon"], $__nextDate["mday"]);
			$__nextDate = getdate(strtotime($__tempDate."+1 days"));

			$params = array('cpcode' => $cpcodes, 'date' => $__date, 'columns' => "");
			$__response = new stdClass();		// Not to be warned by "Creating default object from empty value" 
			
			try {
				$__response = $GLOBALS['soapClient']->__soapCall("getVisitorByCountryForCPCode", $params);
				$__response = explode("# ", $__response);
				$__response = explode(PHP_EOL, $__response[3]);
				
				$__loop = -1;
								
				// #1. Restructure API response
				foreach ($__response as $__temp) {
					$__loop++;
					if ($__loop == 0) { continue; }
					$__temp = explode(",", $__temp);
				
					// Set OK hits to specific country : [1] > Country, [2] > Visitors
					$__resultDetails = array("Visitors" => $__results[$__temp[1]][0] + intval($__temp[2]), "Percentage" => 0);
					$__results[$__temp[1]] = $__resultDetails;
					$__visitorSum = $__visitorSum + $__temp[2];
				}
				
				$__loop = 0;
				
				// #2. Adding Percentage to result array
				//	   $__results[$__key][0] : OK Hits
				//     $__results[$__key][1] : Percentage
				foreach ($__results as $__key => $__temp) {
					$__loop++;
					$__tmpVisitor = $__temp[0];
					
					//$__results[$__key][0] = $__results[$__key][0] + intval($__temp[0]);
				
					$__tmpPercentage = round($__tmpVisitor / intval($__visitorSum) * 100,1);
					$__results[$__key]["Percentage"] = $__tmpPercentage;
				}
				
				// Output Format :
				// 	["USA"]=>         		>>>>>> Country Name
				//  {
				//    	[0]=> int(803) 		>>>>>> OK Hits
				//	   	[1]=> float(0.1)	>>>>>> Percentage
				// 	}
				$response = $__results;
			} catch (Exception $e) {
				$response->Message = $e->getMessage();
				$response->Trace = $e->getTrace();
			}
		}
		return $response;
	}
	
}

class DownloadDelivery {
	// ----------------------------------------------------------------------------------
	// Private Functions
	// ----------------------------------------------------------------------------------
	private function __getDimensions() {
		$path = "/media-reports/v1/download-delivery/dimensions";
		$response = $GLOBALS['client']->get($path);
		return $response;
	}
	
	private function __getMetrics() {
		$path = "/media-reports/v1/download-delivery/metrics";
		
	}
	
	 function __getRawData($from, $to, $dimensions, $metrics, $cpcodes) {
		$path = "/media-reports/v1/download-delivery/data";
		
		// 2015-09-11 : In case of getVisitorCountryByXXX, set aggregation as 3600
		if ($metrics =="38")
			$__aggTime = 3600;
		else	
			$__aggTime = 300;
			
		$parameter = array(
			'startDate' => $from,
			'endDate' => $to,
			'aggregation' => $__aggTime,
			'dimensions' => $dimensions,
			'metrics' => $metrics,
			'limit' => 10000,
			'cpcodes' => $cpcodes
			);
        $parameter = http_build_query($parameter);
		$path = $path."?".$parameter;
		$response = $GLOBALS['client']->get($path);
		return $response->getBody();
	}
	
	// ----------------------------------------------------------------------------------
	// Public Functions
	// ----------------------------------------------------------------------------------
	public function getPeakTrafficByMonth($year, $month, $cpcodes) {
		$__from = sprintf("%02s/01/%04s:00:00", $month, $year);
		$__to = sprintf("%02s/31/%04s:00:00", $month, $year);
		$__dimensions = "1"; 	// ID=1, time
		$__metrics = "103"; 	// ID=103, Edge Throughput
		$__cpcodes = $cpcodes;
		$peakTraffic = new stdClass();
		
		try {
			$rawData = $this->__getRawData($__from, $__to, $__dimensions, $__metrics, $__cpcodes);
			$peakTraffic = (jsontoarray($rawData)['columns'][1]['peak']);
			//var_dump(jsontoarray($rawData));
			$peakTraffic = $peakTraffic/1000;
			$peakTraffic = (string)$peakTraffic;
		} catch (Exception $e) {
			$peakTraffic->Message = $e->getMessage();
			$peakTraffic->Trace = $e->getTrace();
			//var_dump($peakTraffic->Message);
		}
		
		return $peakTraffic;
	}
	
	public function getPeakTrafficByDay($targetDate, $cpcodes) {
		$__from = sprintf("%02s/%02s/%04s:00:00", $targetDate["mon"], $targetDate["mday"], $targetDate["year"]);
		$__to = sprintf("%02s/%02s/%04s:23:59", $targetDate["mon"], $targetDate["mday"], $targetDate["year"]);
		$__dimensions = "1"; 	// ID=1, time
		$__metrics = "103"; 	// ID=103, Edge Throughput
		$__cpcodes = $cpcodes;
		$peakTraffic = new stdClass();

		try {
			$rawData = $this->__getRawData($__from, $__to, $__dimensions, $__metrics, $__cpcodes);
			$peakTraffic = (jsontoarray($rawData)['columns'][1]['peak']);
			//var_dump(jsontoarray($rawData));
			$peakTraffic = $peakTraffic/1000;
			$peakTraffic = (string)$peakTraffic;
			var_dump($rawData);
		} catch (Exception $e) {
			$peakTraffic->Message = $e->getMessage();
			$peakTraffic->Trace = $e->getTrace();
		}
		
		
		return $peakTraffic;
	}
	public function getPeakTrafficByPeriod($startDate, $endDate, $cpcodes) {
		$__from = sprintf("%02s/%02s/%04s:00:00", $startDate["mon"], $startDate["mday"], $startDate["year"]);
		$__to = sprintf("%02s/%02s/%04s:23:59", $endDate["mon"], $endDate["mday"], $endDate["year"]);
		$__dimensions = "1"; 	// ID=1, time
		$__metrics = "103"; 	// ID=103, Edge Throughput
		$__cpcodes = $cpcodes;
		$peakTraffic = new stdClass();

		try {
			$rawData = $this->__getRawData($__from, $__to, $__dimensions, $__metrics, $__cpcodes);
			$peakTraffic = (jsontoarray($rawData)['columns'][1]['peak']);
			//var_dump(jsontoarray($rawData));
			$peakTraffic = $peakTraffic/1000;
			$peakTraffic = (string)$peakTraffic;
		} catch (Exception $e) {
			$peakTraffic->Message = $e->getMessage();
			$peakTraffic->Trace = $e->getTrace();
		}
		
		return $peakTraffic;
	}
	
	public function getVolumeByMonth($year, $month, $cpcodes) {
		$__from = sprintf("%02s/01/%04s:00:00", $month, $year);
		$__to = sprintf("%02s/31/%04s:23:59", $month, $year);
		$__dimensions = "1"; 			// ID=1, time
		$__metrics = "107,116,13,14"; 	// 107=Edge Volume(MB), 116=Midgress Bytes, 13=Origin Object Bytes, 14=Origin Overhead Bytes
		$__cpcodes = $cpcodes;
		$volume = new stdClass();		// Not to be warned by "Creating default object from empty value"
		
		try {
			$rawData = $this->__getRawData($__from, $__to, $__dimensions, $__metrics, $__cpcodes);
			$volume->Edge = (jsontoarray($rawData)['columns'][1]['aggregate']);
			$volume->Midgress = (jsontoarray($rawData)['columns'][2]['aggregate']) / 1000000.00 * 2;
			$volume->Origin = ((jsontoarray($rawData)['columns'][3]['aggregate']) + (jsontoarray($rawData)['columns'][4]['aggregate'])) / 1000000.00;
			//var_dump(jsontoarray($rawData));
		} catch (Exception $e) {
			$volume->Message = $e->getMessage();
			$volume->Message = $e->getTrace();
		}
		return $volume;
	}
	public function getVolumeByDay($targetDate, $cpcodes) {
		$__from = sprintf("%02s/%02s/%04s:00:00", $targetDate["mon"], $targetDate["mday"], $targetDate["year"]);
		$__to = sprintf("%02s/%02s/%04s:23:59", $targetDate["mon"], $targetDate["mday"], $targetDate["year"]);
		$__dimensions = "1"; 			// ID=1, time
		$__metrics = "107,116,13,14"; 	// 107=Edge Volume(MB), 116=Midgress Bytes, 13=Origin Object Bytes, 14=Origin Overhead Bytes
		$__cpcodes = $cpcodes;
		$volume = new stdClass();		// Not to be warned by "Creating default object from empty value"
		
		try {
			$rawData = $this->__getRawData($__from, $__to, $__dimensions, $__metrics, $__cpcodes);
			$volume->Edge = (jsontoarray($rawData)['columns'][1]['aggregate']);
			$volume->Midgress = (jsontoarray($rawData)['columns'][2]['aggregate']) / 1000000.00 * 2;
			$volume->Origin = ((jsontoarray($rawData)['columns'][3]['aggregate']) + (jsontoarray($rawData)['columns'][4]['aggregate'])) / 1000000.00;
			//var_dump(jsontoarray($rawData));
		} catch (Exception $e) {
			$volume->Message = $e->getMessage();
			$volume->Message = $e->getTrace();
		}
		return $volume;
	}
	public function getVolumeByPeriod($startDate, $endDate, $cpcodes) {
		$__from = sprintf("%02s/%02s/%04s:00:00", $startDate["mon"], $startDate["mday"], $startDate["year"]);
		$__to = sprintf("%02s/%02s/%04s:23:59", $endDate["mon"], $endDate["mday"], $endDate["year"]);
		$__dimensions = "1"; 			// ID=1, time
		$__metrics = "107,116,13,14"; 	// 107=Edge Volume(MB), 116=Midgress Bytes, 13=Origin Object Bytes, 14=Origin Overhead Bytes
		$__cpcodes = $cpcodes;
		$volume = new stdClass();		// Not to be warned by "Creating default object from empty value"
		
		try {
			$rawData = $this->__getRawData($__from, $__to, $__dimensions, $__metrics, $__cpcodes);
			$volume->Edge = (jsontoarray($rawData)['columns'][1]['aggregate']);
			$volume->Midgress = (jsontoarray($rawData)['columns'][2]['aggregate']) / 1000000.00 * 2;
			$volume->Origin = ((jsontoarray($rawData)['columns'][3]['aggregate']) + (jsontoarray($rawData)['columns'][4]['aggregate'])) / 1000000.00;
			//var_dump(jsontoarray($rawData));
		} catch (Exception $e) {
			$volume->Message = $e->getMessage();
			$volume->Message = $e->getTrace();
		}
		return $volume;
	}
	
	public function getBillingByMonth($year, $month, $cpcodes) {
		$__from = sprintf("%02s/01/%04s:00:00", $month, $year);
		$__to = sprintf("%02s/31/%04s:23:59", $month, $year);
		$__dimensions = "1"; 			// ID=1, time
		$__metrics = "107,116,13,14"; 	// 107=Edge Volume(MB), 116=Midgress Bytes, 13=Origin Object Bytes, 14=Origin Overhead Bytes
		$__cpcodes = $cpcodes;
		$__billing = new stdClass();	// Not to be warned by "Creating default object from empty value"
		
		try {
			$rawData = $this->__getRawData($__from, $__to, $__dimensions, $__metrics, $__cpcodes);
			$__billing->Edge = (jsontoarray($rawData)['columns'][1]['aggregate']);
			$__billing->Midgress = (jsontoarray($rawData)['columns'][2]['aggregate']) / 1000000.00;
			
			// Media Report API returns already manipulated Midgress (Divide by 2 is not required)
			$billing = $__billing->Edge + $__billing->Midgress; 
			$billing = (string)$billing;
			//var_dump(jsontoarray($rawData));
		} catch (Exception $e) {
			$billing->Message = $e->getMessage();
			$billing->Message = $e->getTrace();
		}
		return $billing;
	}
	public function getBillingByDay($targetDate, $cpcodes) {
		$__from = sprintf("%02s/%02s/%04s:00:00", $targetDate["mon"], $targetDate["mday"], $targetDate["year"]);
		$__to = sprintf("%02s/%02s/%04s:23:59", $targetDate["mon"], $targetDate["mday"], $targetDate["year"]);
		$__dimensions = "1"; 			// ID=1, time
		$__metrics = "107,116,13,14"; 	// 107=Edge Volume(MB), 116=Midgress Bytes, 13=Origin Object Bytes, 14=Origin Overhead Bytes
		$__cpcodes = $cpcodes;
		$__billing = new stdClass();	// Not to be warned by "Creating default object from empty value"
		
		try {
			$rawData = $this->__getRawData($__from, $__to, $__dimensions, $__metrics, $__cpcodes);
			$__billing->Edge = (jsontoarray($rawData)['columns'][1]['aggregate']);
			$__billing->Midgress = (jsontoarray($rawData)['columns'][2]['aggregate']) / 1000000.00;
			
			// Media Report API returns already manipulated Midgress (Divide by 2 is not required)
			$billing = $__billing->Edge + $__billing->Midgress; 
			$billing = (string)$billing;
			//var_dump(jsontoarray($rawData));
		} catch (Exception $e) {
			$billing->Message = $e->getMessage();
			$billing->Message = $e->getTrace();
		}
		return $billing;
	}
	public function getBillingByPeriod($startDate, $endDate, $cpcodes) {
		$__from = sprintf("%02s/%02s/%04s:00:00", $startDate["mon"], $startDate["mday"], $startDate["year"]);
		$__to = sprintf("%02s/%02s/%04s:23:59", $endDate["mon"], $endDate["mday"], $endDate["year"]);
		$__dimensions = "1"; 			// ID=1, time
		$__metrics = "107,116,13,14"; 	// 107=Edge Volume(MB), 116=Midgress Bytes, 13=Origin Object Bytes, 14=Origin Overhead Bytes
		$__cpcodes = $cpcodes;
		$__billing = new stdClass();	// Not to be warned by "Creating default object from empty value"
		
		try {
			$rawData = $this->__getRawData($__from, $__to, $__dimensions, $__metrics, $__cpcodes);
			$__billing->Edge = (jsontoarray($rawData)['columns'][1]['aggregate']);
			$__billing->Midgress = (jsontoarray($rawData)['columns'][2]['aggregate']) / 1000000.00;
			
			// Media Report API returns already manipulated Midgress (Divide by 2 is not required)
			$billing = $__billing->Edge + $__billing->Midgress; 
			$billing = (string)$billing;
			//var_dump(jsontoarray($rawData));
		} catch (Exception $e) {
			$billing->Message = $e->getMessage();
			$billing->Message = $e->getTrace();
		}
		return $billing;
	}
	
	public function getVisitorCountryByMonth($year, $month, $cpcodes) {
		$__from = sprintf("%02s/01/%04s:00:00", $month, $year);
		$__to = sprintf("%02s/31/%04s:23:59", $month, $year);
		$__dimensions = "24"; 			// ID=24, Country Name
		$__metrics = "38"; 				// ID=38, Edge Uniques
		$__cpcodes = $cpcodes;
		$__billing = new stdClass();	// Not to be warned by "Creating default object from empty value"
		
		try {
			$rawData = $this->__getRawData($__from, $__to, $__dimensions, $__metrics, $__cpcodes);
			$__visitors = (jsontoarray($rawData)['rows']);
			
			$__loop = -1;
			$__visitorSum = 0;
			$__results = array();
			
			// #1. Restructure API response
			foreach ($__visitors as $__key => $__temp) {
				$__loop++;
				// Set OK hits to specific country : $__temp[0] > Country, $__temp[1] > Visitors
				$__resultDetails = array("Visitors" => intval($__temp[1]), "Percentage" => 0);
				$__results[$__temp[0]] = $__resultDetails;
				$__visitorSum = $__visitorSum + $__temp[1];
			}
			
			$__loop = 0;
			$__key = 0;
			
			// #2. Adding Percentage to result array
			foreach ($__results as $__key => $__temp) {
				$__loop++;
				$__temp2 = round(intval($__temp["Visitors"]) / intval($__visitorSum) * 100,1);
				$__results[$__key]["Percentage"] = $__temp2;
			}
			
			$response = $__results;
		} catch (Exception $e) {
			$response->Message = $e->getMessage();
			$response->Message = $e->getTrace();
		}
		return $response;
	}
	public function getVisitorCountryByDay($targetDate, $cpcodes) {
		$__from = sprintf("%02s/%02s/%04s:00:00", $targetDate["mon"], $targetDate["mday"], $targetDate["year"]);
		$__to = sprintf("%02s/%02s/%04s:23:59", $targetDate["mon"], $targetDate["mday"], $targetDate["year"]);
		$__dimensions = "24"; 			// ID=24, Country Name
		$__metrics = "38"; 				// ID=38, Edge Uniques
		$__cpcodes = $cpcodes;
		$__billing = new stdClass();	// Not to be warned by "Creating default object from empty value"
		
		try {
			$rawData = $this->__getRawData($__from, $__to, $__dimensions, $__metrics, $__cpcodes);
			$__visitors = (jsontoarray($rawData)['rows']);
			
			$__loop = -1;
			$__visitorSum = 0;
			$__results = array();
			
			// #1. Restructure API response
			foreach ($__visitors as $__key => $__temp) {
				$__loop++;
				// Set OK hits to specific country : $__temp[0] > Country, $__temp[1] > Visitors
				$__resultDetails = array("Visitors" => intval($__temp[1]), "Percentage" => 0);
				$__results[$__temp[0]] = $__resultDetails;
				$__visitorSum = $__visitorSum + $__temp[1];
			}
			
			$__loop = 0;
			$__key = 0;
			
			// #2. Adding Percentage to result array
			foreach ($__results as $__key => $__temp) {
				$__loop++;
				$__temp2 = round(intval($__temp["Visitors"]) / intval($__visitorSum) * 100,1);
				$__results[$__key]["Percentage"] = $__temp2;
			}
			
			$response = $__results;
		} catch (Exception $e) {
			$response->Message = $e->getMessage();
			$response->Message = $e->getTrace();
		}
		return $response;
	}
	public function getVisitorCountryByPeriod($startDate, $endDate, $cpcodes) {
		$__from = sprintf("%02s/%02s/%04s:00:00", $startDate["mon"], $startDate["mday"], $startDate["year"]);
		$__to = sprintf("%02s/%02s/%04s:23:59", $endDate["mon"], $endDate["mday"], $endDate["year"]);
		$__dimensions = "24"; 			// ID=24, Country Name
		$__metrics = "38"; 				// ID=38, Edge Uniques
		$__cpcodes = $cpcodes;
		$__billing = new stdClass();	// Not to be warned by "Creating default object from empty value"
		
		try {
			$rawData = $this->__getRawData($__from, $__to, $__dimensions, $__metrics, $__cpcodes);
			$__visitors = (jsontoarray($rawData)['rows']);
			
			$__loop = -1;
			$__visitorSum = 0;
			$__results = array();
			
			// #1. Restructure API response
			foreach ($__visitors as $__key => $__temp) {
				$__loop++;
				// Set OK hits to specific country : $__temp[0] > Country, $__temp[1] > Visitors
				$__resultDetails = array("Visitors" => intval($__temp[1]), "Percentage" => 0);
				$__results[$__temp[0]] = $__resultDetails;
				$__visitorSum = $__visitorSum + $__temp[1];
			}
			
			$__loop = 0;
			$__key = 0;
			
			// #2. Adding Percentage to result array
			foreach ($__results as $__key => $__temp) {
				$__loop++;
				$__temp2 = round(intval($__temp["Visitors"]) / intval($__visitorSum) * 100,1);
				$__results[$__key]["Percentage"] = $__temp2;
			}
			
			$response = $__results;
		} catch (Exception $e) {
			$response->Message = $e->getMessage();
			$response->Message = $e->getTrace();
		}
		return $response;
	}
	
}

?>