<?php
/**
 * 支付宝回调Demo
 */
require __DIR__ . '/common.php';

// 公共配置
$params = new \Iiccn\PaySDK\AlipayApp\Params\PublicParams;
$params->appPublicKey = $GLOBALS['PAY_CONFIG']['publicKey'];
$params->appPrivateKey = $GLOBALS['PAY_CONFIG']['privateKey'];

// SDK实例化，传入公共配置
$pay = new \Iiccn\PaySDK\AlipayApp\SDK($params);

var_dump('返回参数', $_GET);
var_dump('verify:', $pay->verifyCallback($_GET));