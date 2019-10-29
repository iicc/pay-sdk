<?php
/**
 * 微信支付关闭订单Demo
 */
require __DIR__ . '/common.php';

// 公共配置
$params = new \Iiccn\PaySDK\Weixin\Params\PublicParams;
$params->appID = $GLOBALS['PAY_CONFIG']['appid'];
$params->mch_id = $GLOBALS['PAY_CONFIG']['mch_id'];
$params->key = $GLOBALS['PAY_CONFIG']['key'];

// SDK实例化，传入公共配置
$sdk = new \Iiccn\PaySDK\Weixin\SDK($params);

$request = new \Iiccn\PaySDK\Weixin\CloseOrder\Request;
$request->out_trade_no = '4004612001201709121684151520';

$result = $sdk->execute($request);

var_dump('result:', $result);

var_dump('success:', $sdk->checkResult());

var_dump('error:', $sdk->getError(), 'error_code:', $sdk->getErrorCode());