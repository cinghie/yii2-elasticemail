<?php

/**
 * @copyright Copyright &copy; Gogodigital Srls
 * @company Gogodigital Srls - Wide ICT Solutions
 * @website http://www.gogodigital.it
 * @github https://github.com/cinghie/yii2-elesticemail
 * @license BSD-3-Clause
 * @package yii2-elesticemail
 * @version 0.1.0
 */

use ElasticEmailClient\ApiConfiguration;
use ElasticEmailClient\ElasticClient;
use yii\base\Component;
use yii\base\InvalidConfigException;

/**
 * Class AWS
 *
 * @property Sdk $sdk
 *
 * @see https://api.elasticemail.com/public/help
 */
class Elasticemail extends Component
{
	/**
	 * @var string
	 */
	public $apiKey;

	/**
	 * @var string
	 */
	public $apiUrl;

	/**
	 * @var ElasticEmailClient
	 */
	public $_elasticemail;

	/**
	 * Elasticemail constructor
	 *
	 * @param array $config
	 *
	 * @throws InvalidConfigException
	 */
	public function __construct(array $config = [])
	{
		if(!isset($config['apiKey']) || !$config['apiKey']) {
			throw new InvalidConfigException(Yii::t('elasticemail', 'ElasticEmail API Key missing!'));
		}

		$this->apiKey = $config['apiKey'];
		$this->apiUrl = isset($config['apiUrl']) ? $config['apiUrl'] : 'https://api.elasticemail.com/v2/';

		parent::__construct($config);
	}

	/**
	 * Elasticemail init
	 */
	public function init()
	{
		$configuration = new ApiConfiguration([
			'apiUrl' => $this->apiUrl,
			'apiKey' => $this->apiKey
		]);

		$this->_elasticemail = new ElasticClient($configuration);

		parent::init();
	}

	/**
	 * @return ElasticEmailClient
	 */
	public function getClient()
	{
		return $this->_elasticemail;
	}
}
