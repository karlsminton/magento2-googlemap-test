<?php

namespace Karl\GoogleMap\Block;

use Magento\Framework\View\Element\Template;
use Magento\Framework\App\Config;
use Magento\Framework\HTTP\Client\Curl;

class Request extends Template
{

    use emcconville\Polyline\GoogleTrait;

    protected $endpoint = 'https://maps.googleapis.com/maps/api/distancematrix/';

    protected $format = 'json';

    protected $config;

    protected $curl;

    public function __construct(
        Curl $curl,
        Config $config,
        Template\Context $context,
        $data = []
    ) {
        $this->curl = $curl;
        $this->config = $config;
        parent::__construct($context, $data);
    }

    public function getRequest()
    {
        $testString = '?units=imperial&origins=40.6655101,-73.89188969999998&destinations=40.6905615%2C-73.9976592%7C40.6905615%2C-73.9976592%7C40.6905615%2C-73.9976592%7C40.6905615%2C-73.9976592%7C40.6905615%2C-73.9976592%7C40.6905615%2C-73.9976592%7C40.659569%2C-73.933783%7C40.729029%2C-73.851524%7C40.6860072%2C-73.6334271%7C40.598566%2C-73.7527626%7C40.659569%2C-73.933783%7C40.729029%2C-73.851524%7C40.6860072%2C-73.6334271%7C40.598566%2C-73.7527626';
        $key = $this->getKey();
        $this->curl->get($this->endpoint . $this->format . $testString . '&key=' . $key);
        return $this->curl->getBody();
    }

    public function getKey()
    {
        return $this->config->getValue('karl_googlemap/conf/api_key');
    }

}
