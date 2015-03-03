<?php
//引入API库
require "../yunba.php";

//构造实例
$yunba = new Yunba(array(
	"appkey" => "535f78721a88e6c860569ac6",
	"sessionFilePath" => "session1.dat"
));

//初始化
$yunba->init(function ($success) {
	echo "[YunBa]init " . ($success ? "success" : "fail") . "\n";
});

//连接
$yunba->connect_v2(function ($success) use ($yunba) {
	if ($success) {
		echo "[YunBa]connect success\n";

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
	}
	else {
		echo "[YunBa]connect fail\n";
	}
});

//等待通讯
$yunba->wait();

?>