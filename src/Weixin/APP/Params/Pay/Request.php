<?php
namespace Iiccn\PaySDK\Weixin\APP\Params\Pay;

use \Iiccn\PaySDK\Weixin\Params\PayRequestBase;
use \Iiccn\PaySDK\Weixin\APP\Params\SceneInfo;

/**
 * 微信支付-APP支付-下单请求类
 */
class Request extends PayRequestBase
{
	/**
	 * 接口名称
	 * @var string
	 */
	public $_apiMethod = 'pay/unifiedorder';

	/**
	 * 微信用户在商户对应appid下的唯一标识
	 * @var string
	 */
	public $openid;

	/**
	 * 场景信息
	 * @var \Iiccn\PaySDK\Weixin\APP\Params\SceneInfo
	 */
	public $scene_info;

	public function __construct()
	{
		$this->trade_type = 'APP';
		$this->scene_info = new SceneInfo;
		parent::__construct();
	}
}