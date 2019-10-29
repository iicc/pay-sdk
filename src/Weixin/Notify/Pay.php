<?php
namespace Iiccn\PaySDK\Weixin\Notify;

use \Iiccn\PaySDK\Weixin\Notify\Base;
use \Iiccn\PaySDK\Weixin\Reply\Pay as ReplyPay;

/**
 * 微信支付-支付通知处理基类
 */
abstract class Pay extends Base
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
}