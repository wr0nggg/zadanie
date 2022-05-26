<?php
//classa na volanie endpointov
class CallApi
{
    private string $_url;

    private string $_method;

    private $curl;

    private $_options;


    function initCurl(){
        $this->setCurl(curl_init());
        foreach ($this->getOptions() as $option){
            curl_setopt($this->getCurl(),$option['option'], $option['value']);
        }
    }

    function CallAPI()
    {
        if(!$this->getMethod()){
            echo "Method not set";
            return;
        }
        if(!$this->getOptions()){
            echo "Options not set";
            return;
        }

        $this->initCurl();
        try{
            $result = curl_exec($this->getCurl());
        }catch (Exception $exception){
            echo 'Error: ',  $e->getMessage(), "\n";

        }
        curl_close($this->getCurl());
        return $result;
    }

    function makeUrl($from, $to)
    {
        if(!$from or !$to or !$this->getUrl()){
            echo 'Error: Wrong URL \n';
        }
        $url = str_replace('{' . $from . '}', $to, $this->getUrl());
        $this->setUrl($url);
        return $url;
    }

    /**
     * @return mixed
     */
    public function getCurl()
    {
        return $this->curl;
    }

    /**
     * @param mixed $curl
     */
    public function setCurl($curl): void
    {
        $this->curl = $curl;
    }


    /**
     * @return mixed
     */
    public function getOptions()
    {
        return $this->_options;
    }

    /**
     * @param mixed $options
     */
    public function setOptions($options): void
    {
        $this->_options = $options;
    }


    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->_url;
    }

    /**
     * @param string $url
     */
    public function setUrl(string $url): void
    {
        $this->_url = $url;
    }

    /**
     * @return string
     */
    public function getMethod(): string
    {
        return $this->_method;
    }

    /**
     * @param string $method
     */
    public function setMetod(string $method): void
    {
        $this->_method = $method;
    }

    /**
     * @return string
     */


}