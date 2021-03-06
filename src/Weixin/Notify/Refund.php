<?php
namespace Iiccn\PaySDK\Weixin\Notify;

use \Iiccn\PaySDK\Weixin\Notify\Base;
use \Iiccn\PaySDK\Weixin\Reply\Pay as ReplyPay;
use \Iiccn\PaySDK\Lib\Encrypt\AES;
use \Iiccn\PaySDK\Lib\XML;

/**
 * 微信支付-退款通知基类
 */
abstract class Refund extends Base
{
	/**
	 * 返回数据
	 * @var \Iiccn\PaySDK\Weixin\Reply\Pay
	 */
	public $replyData;

	public function __construct()
	{
		parent::__construct();
		$this->replyData = new ReplyPay;
	}

	/**
	 * 获取通知数据
	 * @return void
	 */
	public function getNotifyData()
	{
		$data = parent::getNotifyData();
		if(isset($data['return_code']) && 'SUCCESS' === $data['return_code'])
		{
			$key = md5($this->sdk->publicParams->key);
			$data['req_info'] = XML::fromString(AES::decrypt256($data['req_info'], $key));
		}
		return $data;
	}
	
	/**
	 * 对通知进行验证，是否是正确的通知
	 * @return bool
	 */
	public function notifyVerify()
	{
		return isset($this->data['return_code']);
	}
}