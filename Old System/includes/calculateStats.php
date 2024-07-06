<?php 
	$date_time_online = date('Y-m-d H:i:s', time() - 15*60);
	$sql = "SELECT * FROM users WHERE lastOnline >= '$date_time_online'";
	$onlineUsersData = mysqli_query($connection, $sql);
	$onlineUsersData = mysqli_fetch_all($onlineUsersData, MYSQLI_ASSOC);
	$onlineUsers = 0;
	foreach ($onlineUsersData as $data)
		$onlineUsers++;
	$date_time_monthly = date('Y-m-d H:i:s', time() - 31*24*60*60);
	$sql = "SELECT * FROM users WHERE lastOnline >= '$date_time_monthly'";
	$monthlyUsersData = mysqli_query($connection, $sql);
	$monthlyUsersData = mysqli_fetch_all($monthlyUsersData, MYSQLI_ASSOC);
	$monthlyUsers = 0;
	foreach ($monthlyUsersData as $data)
		$monthlyUsers++;
	$sql = "SELECT * FROM manuals";
	$activeManualsData = mysqli_query($connection, $sql);
	$activeManualsData = mysqli_fetch_all($activeManualsData, MYSQLI_ASSOC);
	$activeManuals = 0;
	foreach ($activeManualsData as $data)
		$activeManuals++;
?>