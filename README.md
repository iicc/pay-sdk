# PaySDK介绍


PaySDK 是 PHP 集成支付 SDK ，集成了支付宝、微信支付的支付接口和其它相关接口的操作。可以轻松嵌入支持 PHP >= 5.4 的任何系统中，2.0 版现已支持 Swoole 协程环境。


## 支持的支付接口

### 支付宝
* 即时到账-电脑网站支付（老）
* 即时到账-手机网站支付（老）
* 当面付
* 手机网站支付
* 电脑网站支付
* APP支付服务端
* 单笔转账到支付宝账户
* 海外支付（电脑网站、手机网站、APP、扫码）
* 海关报关
* 其它辅助交易接口（退款、查询等）

### 微信支付
* 刷卡支付
* 公众号支付
* 扫码支付
* APP支付
* H5支付
* 小程序支付
* 企业付款到零钱
* 企业付款到银行卡
* 海外支付（刷卡、公众号、扫码、APP）
* 海关报关
* 其它辅助交易接口（退款、查询等）

## 安装

在您的composer.json中加入配置：

```json
{
    "require": {
        "iicc/pay-sdk": "~2.0"
    }
}
```

然后执行`composer update`命令。

## 代码示例

### 支付宝即时到账

```php
// SDK实例化，传入公共配置
$pay = new \Iiccn\PaySDK\Alipay\SDK($params);

// 支付接口
$request = new \Iiccn\PaySDK\Alipay\Params\Pay\Request;
$request->notify_url = ''; // 支付后通知地址（作为支付成功回调，这个可靠）
$request->return_url = ''; // 支付后跳转返回地址
$request->businessParams->seller_id = $GLOBALS['PAY_CONFIG']['appid']; // 卖家支付宝用户号
$request->businessParams->out_trade_no = 'test' . mt_rand(10000000,99999999); // 商户订单号
$request->businessParams->total_fee = 0.01; // 价格
$request->businessParams->subject = '测试商品'; // 商品标题

// 跳转到支付宝页面
$pay->redirectExecute($request);
```

### 支付宝手机网站支付

```php
// SDK实例化，传入公共配置
$pay = new \Iiccn\PaySDK\AlipayApp\SDK($params);

// 支付接口
$request = new \Iiccn\PaySDK\AlipayApp\Wap\Params\Pay\Request;
$request->notify_url = ''; // 支付后通知地址（作为支付成功回调，这个可靠）
$request->return_url = ''; // 支付后跳转返回地址
$request->businessParams->out_trade_no = 'test' . mt_rand(10000000,99999999); // 商户订单号
$request->businessParams->total_amount = 0.01; // 价格
$request->businessParams->subject = '小米手机9黑色陶瓷尊享版'; // 商品标题

// 跳转到支付宝页面
$pay->redirectExecute($request);
```

### 微信H5支付

```php
// SDK实例化，传入公共配置
$pay = new \Iiccn\PaySDK\Weixin\SDK($params);

// 支付接口
$request = new \Iiccn\PaySDK\Weixin\H5\Params\Pay\Request;
$request->body = 'test'; // 商品描述
$request->out_trade_no = 'test' . mt_rand(10000000,99999999); // 订单号
$request->total_fee = 1; // 订单总金额，单位为：分
$request->spbill_create_ip = '127.0.0.1'; // 客户端ip
$request->notify_url = ''; // 异步通知地址

// 调用接口
$result = $pay->execute($request);
if($pay->checkResult())
{
	// 跳转支付界面
	header('Location: ' . $result['mweb_url']);
}
else
{
	var_dump($pay->getErrorCode() . ':' . $pay->getError());
}
exit;
```

### Swoole 协程环境支持

```php
\Yurun\Util\YurunHttp::setDefaultHandler('Yurun\Util\YurunHttp\Handler\Swoole');
```