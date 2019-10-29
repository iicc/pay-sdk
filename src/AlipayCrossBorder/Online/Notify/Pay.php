<?php
namespace Iiccn\PaySDK\AlipayCrossBorder\Online\Notify;

use \Iiccn\PaySDK\AlipayCrossBorder\Online\Notify\Base;

/**
 * 支付宝境外支付通知基类
 */
abstract class Pay extends Base
{
	/**
	 * 对通知进行验证，是否是正确的通知
	 * @return bool
	 */
	public function notifyVerify()
	{
		$request = new \Iiccn\PaySDK\AlipayCrossBorder\Online\NotifyVerify\Request;
		$request->notify_id = $this->data['notify_id'];
		return 'true' === $this->sdk->execute($request, '');
	}
}