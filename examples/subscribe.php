<?php
//引入API库
require "../yunba.php";

//构造实例
$yunba = new Yunba(array(
	"appkey" => "535f78721a88e6c860569ac6"
));

//初始化
$yunba->init(function ($success) {
	echo "[YunBa]init " . ($success ? "success" : "fail") . "\n";
});

//连接
$yunba->connect(function ($success) {
	if ($success) {
		echo "[YunBa]connect success\n";
	}
	else {
		echo "[YunBa]connect fail\n";
	}
});

//等待连接完毕
sleep(1);

//订阅topic1
$yunba->subscribe(array(
	"topic" => "topic1",
	"qos" =>2
), function ($success) {
	echo "[Yunba]subscribe topic1\n";
}, function ($data) {
	echo "[YunBa]received topic1 " . var_export($data, true) . "\n";
});

//订阅topic2
$yunba->subscribe(array(
		"topic" => "topic2",
		"qos" =>2
), function ($success) {
	echo "[Yunba]subscribe topic2\n";
}, function ($data) {
	echo "[YunBa]received topic2 " . var_export($data, true) . "\n";
});

//等待通讯
$yunba->wait();

?>