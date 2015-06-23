# Yunba PHP SDK
Yunba (http://yunba.io) SDK PHP版。

### 提示：此SDK只能在cli模式下以阻塞方式运行，如果只用于发布消息推荐使用更简单的[RESTful API](http://www.yunba.io/docs2/restful_Quick_Start/)。

## API说明

### 构造器

~~~php
$yunba = new Yunba(array $setup);
~~~
参数：
* array $setup 配置选项，包括：
   * server（可选） - 服务器域名或IP
   * port（可选）- 服务器端口
   * appkey - 应用AppKey字符串
   * debug（可选）- 是否开启调试模式
   * sessionFilePath（可选）- 存储会话ID的文件路径（默认为当目录下的session.dat）

### 初始化
~~~php
$yunba->init($initCallback = null, $recCallback = null);
~~~
参数：
* callable $initCallback 初始化结果回调函数
* $recCallback 重新连接回调函数

### 连接服务
~~~php
$yunba->connect($callback = null);
~~~
参数
* callable $callback 连接成功或失败回调函数

~~~php
$yunba->connect_v2($callback = null);
~~~

说明

功能与connect一致，不同的是此接口会将会话状态保存下来（保存到sessionFilePath中），当由于网络不稳定等原因发生重新连接后会话状态不会丢失（包括离线消息、已订阅的频道和别名）。

参数
* callable $callback 连接成功或失败回调函数
	

### 断开连接
~~~php
$yunba->disconnect($callback = null);
~~~
参数
* callable $callback 回调函数

### 触发事件
~~~php	
$yunba->emit($event, array $args, $callback = null);
~~~
参数：
* string $event 事件名
* array $args 参数
* callable $callback 回调函数

### 监听事件	
~~~php
$yunba->on($event, $callback);
~~~
参数：
* string $event 事件名
* callable $callback 回调函数

### 订阅
~~~php
$yunba->subscribe (array $args, $subscribeCallback = null, $messageCallback = null);
~~~
参数：
* array $args 参数，包括topic, qos两个选项
* callable $subscribeCallback 订阅结果回调函数
* callable $messageCallback 消息接收回调函数

### 取消订阅
~~~php
$yunba->unsubscribe (array $args, $callback = null);
~~~
参数：
* array $args 参数，包括topic一个选项
* callable $callback 回调函数

### 发布消息
~~~php	
$yunba->publish (array $args, $callback = null);
~~~	
参数：
* array $args 要发布的消息的内容，包括topic, msg, qos三个选项
* callable $callback 回调函数

### 等待和服务间的通讯
~~~php
$yunba->wait()；
~~~

## 使用示例
请见 examples/subscribe.php 和 examples/publish.php
