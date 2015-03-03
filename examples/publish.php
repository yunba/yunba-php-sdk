<?php
//引入API库
require "../yunba.php";

//构造实例
$yunba = new Yunba(array(
	"appkey" => "535f78721a88e6c860569ac6",
	"sessionFilePath" => "session2.dat"
));

//初始化
$yunba->init(function ($success) {
	echo "[YunBa]init " . ($success ? "success" : "fail") . "\n";
});

//连接
$yunba->connect_v2(function ($success)  use ($yunba) {
	if ($success) {
		echo "[YunBa]connect success\n";

		//发布消息到topic1
		$yunba->publish(array(
			"topic" => "topic1",
			"qos" => 2,
			"msg" => "Hello,World"	
		), function ($success) {
			echo "[YunBa]publish1 " . ($success ? "success" : "fail") . "\n";
		});

		//发布消息到topic2
		/**$yunba->publish(array(
				"topic" => "topic2",
				"qos" => 2,
				"msg" => "Hello,Girl"
		), function ($success) {
			echo "[YunBa]publish2 " . ($success ? "success" : "fail") . "\n";
		});**/
	}
	else {
		echo "[YunBa]connect fail\n";
	}
});

//等待通讯
$yunba->wait();

?>
