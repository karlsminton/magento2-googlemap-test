<?php

namespace Karl\GoogleMap\Block;

use Magento\Framework\View\Element\Template;

class Request extends Template
{

    protected $endpoint = 'https://maps.googleapis.com/maps/api/distancematrix/';

    protected $format = 'json';

    public function __construct(
        Template\Context $context,
        $data = []
    ) {
        parent::__construct($context, $data);
    }

    public function getRequest()
    {

    }

}
