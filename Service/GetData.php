<?php
//classa ziskavanie dat z mfcr.cz
class GetData extends CallApi
{
    const URL = 'http://wwwinfo.mfcr.cz/cgi-bin/ares/darv_bas.cgi?ico={ICO}';
    const REPLACEWORD = 'ICO';

    private string $_ico;


    function getData()
    {
        $this->setMetod('GET');

        $this->setUrl(self::URL);
        // options for curl_setopt
        $options[] = [
            'option' => CURLOPT_URL,
            'value' => $this->makeUrl(self::REPLACEWORD, $this->getIco())
        ];
        $options[] = [
            'option' => CURLOPT_RETURNTRANSFER,
            'value' => true
        ];

        $this->setOptions($options);
        $response = $this->CallAPI();
        return $response;
    }

    /**
     * @return int
     */
    public function getIco(): string
    {
        return $this->_ico;
    }

    /**
     * @param int $ico
     */
    public function setIco(string $ico): void
    {
        $this->_ico = $ico;
    }

}
