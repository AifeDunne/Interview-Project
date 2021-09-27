<?php
namespace fizzbuzz\Test;
use PHPUnit\Framework\TestCase;

class firstTest extends TestCase {
	function __construct() {
		$this->math_array = array(15, 3, 5);
		$this->math_count = count($this->math_array);
		$this->label_array = array("FizzBuzz", "Fizz", "Buzz", "Integer", "Lucky");
		$this->report_array = array(0, 0, 0, 0, 0); 
		$this->finalOutput = ""; }
	
	private function checkArray($addMore) {
		if (is_array($addMore)) { return $addMore; }
		else if (is_int($addMore)) { for ($a = 1; $a <= $addMore; $a++) { $newArray[] = $a; } return $newArray; } 
		else if ($addMore === "") { return array(1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20); } }
		
	private function checkData($testType, $testData) {
		foreach($testData as $data) {
			$nCount = 0;
			if (strpos($data,"3") !== false && $testType !== "Simple") { 
				$last_item = $this->math_count + 1;
				$this->report_array[$last_item] = $this->report_array[$last_item] + 1; 
				$this->finalOutput.= "Lucky, "; }
			else {
				for ($d = 0; $d < $this->math_count; $d++) {
					$math_part = intval($this->math_array[$d]);
					if (($data % $math_part) == 0) { 
						$nCount++; 
						$attr_name = $this->label_array[$d]; 
						$this->report_array[$d] = $this->report_array[$d] + 1; 
						$this->finalOutput.= $attr_name.", "; 
						if ($attr_name === "FizzBuzz") { break; } 
					} 
				}
			if ($nCount === 0) { $this->finalOutput.= $data.", "; $this->report_array[$this->math_count] = $this->report_array[$this->math_count] + 1; } }
		}
	}
	
	public function runTest($getType, $customArray) {
		$receivedData = $this->checkArray($customArray);
		$getType = ucwords($getType);
		$this->checkData($getType, $receivedData);
		echo $this->finalOutput;
		if ( $getType === "Report") { $send_report = array_combine($this->label_array, $this->report_array); print_r($send_report); }
	}
}

// Function Argument 1: Test Type - Simple (Simple), Lucky (Lucky), Report (Report)
// Function Argument 2: Array Type - User Supplied (Array), Generated (Number), Default (Default Array)

$testClass = new firstTest();
$testClass->runTest("Simple",20);
?>
