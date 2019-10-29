<?php
namespace Iiccn\PaySDK\Alipay\Params\RefundPwd;

use \Iiccn\PaySDK\AlipayRequestBase;
use \Iiccn\PaySDK\Alipay\Params\RefundPwd\BusinessParams;

/**
 * 支付宝有密退款业务请求类
 */
class Request extends AlipayRequestBase
{
	/**
	 * 接口名称
	 * @var string
	 */
	public $service = 'refund_fastpay_by_platform_pwd';

	/**
	 * 支付宝服务器主动通知商户服务器里指定的页面http/https路径。
	 * @var string
	 */
	public $notify_url;

	/**
	 * 业务请求参数
	 * 参考https://docs.open.alipay.com/62/104743/
	 * @var \Iiccn\PaySDK\Alipay\Params\RefundPwd\BusinessParams
	 */
	public $businessParams;

	public function __construct()
	{
		$this->businessParams = new BusinessParams;
		$this->_method = 'GET';
	}
}