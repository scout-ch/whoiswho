<?php
include "./config.php";

class HitobitoCaller { 
	function callGroup($group_id) {
		$jsonurl = BASE_URL . "/de/groups/" . $group_id . "/people.json?token=" . SERVICE_TOKEN;
		$json = file_get_contents($jsonurl);
		return $json;
	}
}