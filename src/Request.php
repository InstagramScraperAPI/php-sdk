<?php
namespace InstagramScraperAPI;

class Request
{
    /**
     * The InstagramScraper class instance we belong to.
     *
     * @var \instagramscraperapi\InstagramScraper
     */
    protected $_parent;
 
    /**
     * Which API version to use for this request.
     *
     * @var int
     */
    private $_url;
    private $_userAgent;
    private $_params = [];
    private $_json = [];
    private $_headers = [];

    public function __construct(
        InstagramScraper $parent,
        $url)
    {
        $this->_userAgent =  'InstagramScraperAPI/1.0';
        $this->_parent = $parent;
        $this->_url = $this->_parent->_API . $url;
        $this->addParam('key', $this->_parent->key);
        return $this;
    }

   

    public function addParam(
        $key,
        $value)
    {
        if ($value === true) {
            $value = 'true';
        }
        $this->_params[$key] = $value;
        return $this;
    }



    /**
     * Add custom header to request, overwriting any previous or default value.
     *
     *
     * @param string $key
     * @param string $value
     *
     * @return self
     */
    public function addHeader(
        $key,
        $value)
    {
        $this->_headers[$key] = $value;
        return $this;
    }


    public function getResponse()
    {


        $ch = curl_init();

        if($this->_params){
            $this->_url = $this->_url . '?' . http_build_query($this->_params);
        }


        curl_setopt($ch, CURLOPT_URL, $this->_url);
        curl_setopt($ch, CURLOPT_USERAGENT, $this->_userAgent);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_HEADER, 1);
        curl_setopt($ch, CURLOPT_VERBOSE, 0);
        curl_setopt($ch, CURLOPT_ENCODING,  '');
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);


        $resp           = curl_exec($ch);
        $header_len     = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
        $curl_http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE );
        $header         = substr($resp, 0, $header_len);
        $body           = substr($resp, $header_len);
        $body           = json_decode($body, true);

        curl_close($ch);

        if($curl_http_code == 200) {
            
            return [
                'code' => 200,
                'body' => $body
            ];

        } else {
 
            return [
                'code' => $curl_http_code,
                'header' => $header,
                'body' => $body
            ];
        }
    }
}