#!/data/data/com.termux/files/usr/bin/php
<?php
if(strtolower(substr(PHP_OS, 0, 3)) == "win") {
$bersih="cls";
} else {
$bersih="clear";
}
system($bersih);
$green  = "\e[92m";
$red    = "\e[91m";
$yellow = "\e[93m";
$blue   = "\e[36m";
echo "\n$yellow
______              _          _      _        
| ___ \            | |        | |    (_)       
| |_/ /  __ _  ___ | |_   ___ | |__   _  _ __  
|  __/  / _` |/ __|| __| / _ \| '_ \ | || '_ \ 
| |    | (_| |\__ \| |_ |  __/| |_) || || | | |
\_|     \__,_||___/ \__| \___||_.__/ |_||_| |_|";
echo "\n$blue
Author  : Cvar1984
Code    : PHP
Github  : http://github.com/Cvar1984
Team    : BlackHole Security
Version : 0.1 ( Alpha )
Date    : 23-03-2018\n";
echo "$red=========================== Cvar1984 ))=====(@)>$green\n";
function input($echo) {
	echo $echo." --> ";
}
$api_dev_key = "ff9314e0164f30accec4ef969637aa07";
input:
input("Paste / Input File [P/I]");
$tipe=trim(fgets(STDIN));
if($tipe == "i" OR $tipe == "I") {
	input_file:
	input("File name");
	$namafile=trim(fgets(STDIN));
	if(file_exists($namafile)) {
		$api_paste_code=file_get_contents($namafile);
	} else {
		echo $yellow."File Not Exists".$green."\n";
		goto input_file;
	}
} elseif($tipe == "p" OR $tipe == "P") {
input("Text To Paste");
$api_paste_code = trim(fgets(STDIN));	
} else {
	goto input;
}
echo "$red=========================== Cvar1984 ))=====(@)>$green\n";
$api_paste_private = "0";
input("Paste name");
$api_paste_name = trim(fgets(STDIN));
input("Paste Will Never Expired [y/n]");
$api_paste_expire_date = trim(fgets(STDIN));
if($api_paste_expire_date == "y" OR $api_paste_expire_date == "Y") {
	$api_paste_expire_date="N";
} else {
	$api_paste_expire_date="10M";
}
input("Paste Format : 'php','html','xml','etc'");
$api_paste_format = trim(fgets(STDIN));
echo "$red=========================== Cvar1984 ))=====(@)>$green\n";
$api_user_key = "";
$api_paste_name = urlencode($api_paste_name);
$api_paste_code = urlencode($api_paste_code);
$url = "http://pastebin.com/api/api_post.php";
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, "api_option=paste&api_user_key=".$api_user_key."&api_paste_private=".$api_paste_private."&api_paste_name=".$api_paste_name."&api_paste_expire_date=".$api_paste_expire_date."&api_paste_format=".$api_paste_format."&api_dev_key=".$api_dev_key."&api_paste_code=".$api_paste_code."");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
//curl_setopt($ch, CURLOPT_VERBOSE, 1);
curl_setopt($ch, CURLOPT_NOBODY, 0);
$response = curl_exec($ch);
if(preg_match("/Bad API request, invalid api_option/",$response)) {
	echo $yellow."Bad API request, invalid api_option".$green."\n";
}
elseif(preg_match("/Bad API request, IP blocked/",$response)) {
	echo $yellow."Bad API request, IP blocked".$green."\n";
}
elseif(preg_match("/Bad API request, maximum number of 25 unlisted pastes for your free account/",$response)) {
	echo $yellow."Bad API request, maximum number of 25 unlisted pastes for your free account".$green."\n";
}
elseif(preg_match("/Bad API request, maximum number of 10 private pastes for your free account/",$response)) {
	echo $yellow."Bad API request, maximum number of 10 private pastes for your free account".$green."\n";
}
elseif(preg_match("/Bad API request, api_paste_code was empty/",$response)) {
	echo $yellow."Bad API request, api_paste_code was empty".$green."\n";
}
elseif(preg_match("/Bad API request, maximum paste file size exceeded/",$response)) {
	echo $yellow."Bad API request, maximum paste file size exceeded".$green."\n";
}
elseif(preg_match("/Bad API request, invalid api_expire_date/",$response)) {
	echo $yellow."Bad API request, invalid api_expire_date".$green."\n";
}
elseif(preg_match("/Bad API request, invalid api_paste_private/",$response)) {
	echo $yellow."Bad API request, invalid api_paste_private".$green."\n";
}
elseif(preg_match("/Bad API request, invalid api_paste_format/",$response)) {
	echo $yellow."Bad API request, invalid api_paste_format".$green."\n";
}
elseif(preg_match("/Bad API request, invalid api_user_key/",$response)) {
	echo $yellow."Bad API request, invalid api_user_key".$green."\n";
}
elseif(preg_match("/Bad API request, invalid or expired api_user_key/",$response)) {
	echo $yellow."Bad API request, invalid or expired api_user_key".$green."\n";
} else {
	echo $response."\n";
}
echo "$red=========================== Cvar1984 ))=====(@)>$green\n";