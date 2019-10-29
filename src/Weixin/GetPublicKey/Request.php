<?php
namespace Iiccn\PaySDK\Weixin\GetPublicKey;

use \Iiccn\PaySDK\WeixinRequestBase;

/**
 * 微信支付-获取RSA加密公钥请求类
 */
class Request extends WeixinRequestBase
{
	/**
	 * 接口名称
	 * @var string
	 */
	public $_apiMethod = 'https://fraud.mch.weixin.qq.com/risk/getpublickey';

	public function __construct()
	{
		parent::__construct();
		$this->_isSyncVerify = $this->needAppID = false;
	}
}