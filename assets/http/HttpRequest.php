<?php

require_once __DIR__ . '/HttpResponse.php';
require_once __DIR__ . '/HttpException.php';
ini_set('display_errors', 'On');
        error_reporting(E_ALL & ~E_NOTICE);
/**
 * Boolean if is associative array
 * @param type $array
 * @return boolean
 */
function is_assoc($array)
{
  if (is_array($array))
    return (bool) count(array_filter(array_keys($array), 'is_string'));
  return false;
}

class HttpRequest
{

  const exceptionHandler = HttpException;
  const responseHandler = HttpResponse;

  protected $base = '', $headers = array(), $options = array(), $response, $meta;
  private $privateData = array();
  public $error;

  static function init($url)
  {
    $class = get_called_class();
    return new $class($url);
  }

  function __construct($url)
  {
    $this->url = $url;
  }

  function __get($name)
  {
    if ($name == 'response')
      return $this->response;
    if ($name == 'meta')
      return $this->meta;
    if ($name == 'url') {
      $url = $this->privateData[$name];
      if (preg_match('/^http/', $url)) {
        return $url;
      } else {
        $class = get_called_class();
        return $this->base . $url;
      }
    }
  }

  function __set($name, $value)
  {
    $this->privateData[$name] = $value;
  }

  function setHeaders($headers)
  {
      if (is_assoc($headers)) {
          $seq = array();
          foreach ($headers AS $key => $value) {
              array_push($seq,$key.": ".$value);
          }
          $headers = $seq;
      }
    $this->headers = $headers ? $headers : array();
  }

  /**
   * Perform a get request
   * @param type $data
   */
  function get($data = array(), $proxy = false)
  {
    if (!is_array($data))
      $data = array();

    if ($data || $this->credentials()) {
      $urlString = $this->url . (strpos($this->url, '?') === FALSE ? '?' : '&') . http_build_query(array_merge($this->credentials(), $data));
    } else {
      $urlString = $this->url;
    }
    $this->url = $urlString;
    $this->setHeaders($this->headers);
    makelog("curl " . $urlString);
    $defaults = array(
        CURLOPT_URL => $urlString,
        CURLOPT_HEADER => 1,
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_TIMEOUT => 10,
        CURLOPT_HTTPHEADER => $this->headers,
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_SSL_VERIFYHOST => false,
    );
    if ($proxy) {
      $defaults[CURLOPT_PROXY] = $proxy;
//            $defaults[CURLOPT_HEADER] = false;
    }

    $ch = curl_init();
    curl_setopt_array($ch, $defaults);
    //curl_setopt_array($ch, $this->options);
    return $this->executeCurl($ch, $proxy);
  }

  /**
   * Perform a post request
   * @param type $data
   */
  function post($data = array(), $proxy = false)
  {
    if (!is_array($data))
      $data = array();
    if($this->credentials())
      $urlString = $this->url . (strpos($this->url, '?') === false ? '?' : '') . http_build_query($this->credentials());
    else
      $urlString = $this->url;
    $this->url = $urlString;
    if($this->headers['Content-Type'] == 'application/json'){
      $postString = json_encode($data);
    }else{
      $postString = http_build_query($data);
    }
    $this->setHeaders($this->headers);
//    makelog('curl --data "' . $postString . '" ' . $urlString);

    //open connection
    $ch = curl_init();
    //set the url, number of POST vars, POST data
    $defaults = array(
        CURLOPT_URL => $urlString,
        CURLOPT_POST => count($data),
        CURLOPT_HEADER => 1,
        CURLINFO_HEADER_OUT => true,
        CURLOPT_VERBOSE => 1,
        CURLOPT_POSTFIELDS => $postString,
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_HTTPHEADER => $this->headers,
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_SSL_VERIFYHOST => false,
    );
    if ($proxy) {
      $defaults[CURLOPT_PROXY] = $proxy;
//            $defaults[CURLOPT_HEADER] = false;
    }
    //execute post
    curl_setopt_array($ch, $defaults);
    curl_setopt_array($ch, $this->options);
    return $this->executeCurl($ch, $proxy);
  }

  /**
   * Post a put request
   * @param type $data
   */
  function put($data = array(), $type = 'json', $proxy = false)
  {
    if (!is_array($data))
      $data = array();
    $urlString = $this->url . (strpos($this->url, '?') === FALSE ? '?' : '') . http_build_query($this->credentials());
    $this->url = $urlString;

    $putString = $type == 'json' ? json_encode($data) : http_build_query($data);
    $this->setHeaders($this->headers);
//    makelog('curl --data -X PUT "' . $putString . '" ' . $urlString);
    //open connection
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $urlString);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $putString);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); // Do not send to screen
    curl_setopt($ch, CURLOPT_HTTPHEADER, $this->headers); // Do not send to screen
    curl_setopt($ch, CURLOPT_HEADER, 1); // Do not send to screen
    curl_setopt($ch, CURLINFO_HEADER_OUT, true); // Do not send to screen
    if ($proxy) {
      curl_setopt($ch, CURLOPT_PROXY, $proxy);
//            curl_setopt($ch,CURLOPT_HEADER, false);
    }
    curl_setopt_array($ch, $this->options);
    //execute post
    return $this->executeCurl($ch, $proxy);
  }

  /**
   * Post a delete request
   * @param type $data
   */
  function delete($data = array(), $proxy = false)
  {
    if (!is_array($data))
      $data = array();
    $urlString = $this->url . (strpos($this->url, '?') === FALSE ? '?' : '') . http_build_query($this->credentials());
    $this->url = $urlString;

    $postString = http_build_query($data);
    $this->setHeaders($this->headers);
//    makelog('curl --data -X DELETE "' . $postString . '" ' . $urlString);
    //open connection
    $ch = curl_init();
    //set the url, number of POST vars, POST data
    curl_setopt($ch, CURLOPT_URL, $urlString);
    curl_setopt($ch, CURLOPT_POST, count($data));
    curl_setopt($ch, CURLOPT_POSTFIELDS, $postString);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); // Do not send to screen
    curl_setopt($ch, CURLOPT_HEADER, 1); // Do not send to screen
    curl_setopt($ch, CURLINFO_HEADER_OUT, true); // Do not send to screen
    curl_setopt($ch, CURLOPT_HTTPHEADER, $this->headers); // Do not send to screen
    if ($proxy) {
      curl_setopt($ch, CURLOPT_PROXY, $proxy);
//            curl_setopt($ch,CURLOPT_HEADER, false);
    }
    curl_setopt_array($ch, $this->options);
    //execute post
    return $this->executeCurl($ch, $proxy);
  }

  protected function generateResponse($body, $header)
  {
    $class = get_called_class();
    $responseHandler = $class::responseHandler;
    $this->response = new $responseHandler($body, $header);
    $exceptionHandler = $class::exceptionHandler;
    if ($this->response->error && $exceptionHandler)
      throw $exceptionHandler::withRequest($this);
    return $this->response;
  }

  protected function executeCurl($ch, $proxy = false, $dontClose = false)
  {
    if (!$result = curl_exec($ch)) {
      $class = get_called_class();
      $exceptionHandler = $class::exceptionHandler;
      throw $exceptionHandler::withRequestError($this, curl_error($ch), curl_errno($ch));
    }
//    makelog(json_encode(curl_getinfo($ch)));
    $httpCount = substr_count($result, 'HTTP/1.1');
//    makelog('httpCount=' . $httpCount);
    $header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
    $headerSent = curl_getinfo($ch, CURLINFO_HEADER_OUT);
//    makelog('Header OUT: ' . $headerSent);
//    makelog('Header Size: ' . $header_size);
    if ($proxy) {
//      makelog('proxied connection');
      $result = substr($result, stripos($result, "\r\n\r\n") + 4);
    }
    $header = substr($result, 0, $header_size);
    $body = substr($result, $header_size);
//    makelog('Header: ' . $header);
//    makelog('Body: ' . $body);
    if (!$dontClose)
        curl_close($ch);
    if (!$body)
      $body = $result;
    return $this->generateResponse($body, $header);
  }

  function credentials()
  {
    return array();
  }

  function track()
  {
    // Track Request
    // Track Error
  }

}
