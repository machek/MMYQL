<?php
/**
 * User: Zdenek
 * Date: 27/04/13
 * Time: 14:44
 */

namespace MMYQL\Service;


use Zend\Http\Client;

class ServiceYQL {

    /**
     * @var \Zend\Http\Client
     */
    private $client;


    public function __construct($config){

        if(!isset($config['yql_base_url'])) throw new \InvalidArgumentException('Missing yql_base_url in config');

        $this->client = new Client();
        $this->client->setUri($config['yql_base_url']);
        $this->client->setOptions(array(
            'maxredirects' => 0,
            'timeout'      => 10
        ));

    }


    /**
     * @param $select
     * @param $from
     * @param $where
     * @param $format
     */
    public function executeQuery($select , $from, $where, $format = 'json'){

        $yql_query = "select {$select} from {$from} where {$where} ";

        $this->client->setParameterGet(array(
            'q'  => $yql_query,
            'format'   => $format
        ));

        $response = $this->client->send();

        /* @var $response \Zend\Http\Response */
        if ($response->isSuccess()) {
            return $response->getBody();
        }
        else{
            throw new \Exception('Error - Response code: '.$response->getStatusCode().' - query - '.$yql_query);
        }
    }

}