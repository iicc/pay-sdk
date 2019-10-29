<?php
namespace Iiccn\PaySDK\AlipayCrossBorder\Online\Notify;

use Iiccn\PaySDK\NotifyBase;
use \Iiccn\PaySDK\AlipayCrossBorder\Reply\Base as ReplyBase;
use \Iiccn\PaySDK\Lib\XML;
use \Iiccn\PaySDK\Lib\ObjectToArray;

/**
 * 支付宝境外支付通知基类
 */
abstract class Base extends NotifyBase
{
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * 返回数据
	 * @param boolean $success
	 * @param string $message
	 * @return void
	 */
	public function reply($success, $message = '')
	{
		if($success)
		{
			$result = 'success';
			if(null === $this->swooleResponse)
			{
				echo $result;
			}
			else
			{
				$this->swooleResponse->end($result);
			}
		}
	}

	/**
	 * 获取通知数据
	 * @return void
	 */
	public function getNotifyData()
	{
		if(null !== $this->swooleRequest)
		{
			return $this->swooleRequest->post;
		}
		return $_POST;
	}
	
	/**
	 * 对通知进行验证，是否是正确的通知
	 * @return bool
	 */
	public function notifyVerify()
	{
		return $this->sdk->verifyCallback($this->data);
	}
}