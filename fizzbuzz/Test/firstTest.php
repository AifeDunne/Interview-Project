<?php
namespace fizzbuzz\Test;
use PHPUnit\Framework\TestCase;
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING | E_DEPRECATED));

class firstTest extends TestCase {
	function __construct() {
	$this->math_array = array(15, 3, 5);
	$this->label_array = array("BuzzFizz", "Fizz", "Buzz", "Number");
	$this->report_array = array(0, 0, 0, 0); 
	$this->testData = array();
	$this->testType = "";
	$this->finalOutput = ""; }
	
	private function checkArray($addMore) {
		if (is_array($addMore)) { return $addMore; }
		else if (is_int($addMore)) { for ($a = 1; $a <= $addMore; $a++) { $newArray[] = $a; } return $newArray; } 
		else if ($addMore === "") { return array(1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20); } }
		
	private function outputResults($resultType) {
		if ($this->testType === "Report") {
			$send_report = array_combine($this->label_array, $this->report_array);
			print_r($send_report); 
		} else { echo $this->finalOutput; }
	}
		
	private function checkData() {
		if ( $this->testType === "Lucky" || $this->testType === "Report") { $this->label_array[] = "Lucky"; $this->report_array[] = 0; }
		foreach($this->testData as $key => $data) {
			$nCount = 0;
			if ($this->testType === "Lucky" && strpos($data,"3") !== false || $this->testType === "Report" && strpos($data,"3") !== false) {
				$this->report_array[4] = $this->report_array[4] + 1; 
				$this->finalOutput.= "Lucky, ";
			}
			else {
				for ($d = 0; $d < 3; $d++) {
					$math_part = intval($this->math_array[$d]);
					if (($data % $math_part) == 0) { 
						$nCount++; 
						$attr_name = $this->label_array[$d]; 
						$this->report_array[$d] = $this->report_array[$d] + 1; 
						$this->finalOutput.= $attr_name.", "; 
						if ($attr_name === "BuzzFizz") { break; } 
					} 
				}
			if ($nCount === 0) { $this->finalOutput.= "Number, "; $this->report_array[3] = $this->report_array[3] + 1; } }
		}
		$this->outputResults($this->testType);
	}
	
	public function runTest($testType, $customArray) {
		$this->testData = $this->checkArray($customArray);
		$testType = ucwords($testType);
		$this->testType = $testType;
		$this->checkData();
	}
}

// Function Argument 1: Test Type - Simple (Simple), Lucky (Lucky), Report (Report)
// Function Argument 2: Array Type - User Supplied (Array), Generated (Number), Default (Default Array)
$testClass = new firstTest();
$testClass->runTest("Simple",20);
?>
