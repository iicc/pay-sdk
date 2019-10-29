<?php
namespace Iiccn\PaySDK\AlipayApp\Params\DownloadBill;

use \Iiccn\PaySDK\AlipayRequestBase;
use \Iiccn\PaySDK\AlipayApp\Params\DownloadBill\BusinessParams;

/**
 * 支付宝查询对账单请求类
 */
class Request extends AlipayRequestBase
{
	/**
	 * 接口名称
	 * @var string
	 */
	public $method = 'alipay.data.dataservice.bill.downloadurl.query';

	/**
	 * 详见：https://docs.open.alipay.com/common/105193
	 * @var string
	 */
	public $app_auth_token;

	/**
	 * 业务请求参数
	 * 参考https://docs.open.alipay.com/api_15/alipay.data.dataservice.bill.downloadurl.query
	 * @var \Iiccn\PaySDK\AlipayApp\Params\DownloadBill\BusinessParams
	 */
	public $businessParams;

	public function __construct()
	{
		$this->businessParams = new BusinessParams;
		$this->_method = 'GET';
		$this->_isSyncVerify = true;
		$this->_syncResponseName = 'alipay_data_dataservice_bill_downloadurl_query_response';
	}
}