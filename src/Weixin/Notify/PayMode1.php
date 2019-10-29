<?php
namespace Iiccn\PaySDK\Weixin\Notify;

use \Iiccn\PaySDK\Weixin\Notify\Base;
use \Iiccn\PaySDK\Weixin\Reply\PayMode1 as ReplyPayMode1;

/**
 * 微信支付-模式1支付通知处理基类
 */
abstract class PayMode1 extends Base
{
	/**
	 * 返回数据
	 * @var \Iiccn\PaySDK\Weixin\Reply\PayMode1
	 */
	public $replyData;

	public function __construct()
	{
		parent::__construct();
		$this->replyData = new ReplyPayMode1;
	}
}