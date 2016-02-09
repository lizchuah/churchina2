<?php

class HttpResponse
{

  protected $body, $meta, $error, $header, $cookies;

  const errorHandler = null;

  function __construct($body, $header = null)
  {
    $class = get_called_class();
    $this->body = $body;
    if ($header) {
      $this->header = $class::parseHeaders($header);
      $this->cookies = $class::parseCookies($header);
    }
    if (is_string($body) && $this->header['Content-Encoding'] === 'gzip') {
        $this->body = gzdecode($body);
    }
  }

  function __toString()
  {
    return $this->body;
  }

  function __get($name)
  {
    if (property_exists(get_class(), $name))
      return $this->{$name};
    return null;
  }

  static function parseCookies($header)
  {
    preg_match_all('/^Set-Cookie:\s*([^\r\n]*)/mi', $header, $ms);
    // print_r($result);
    $cookies = array();
    foreach ($ms[1] as $m) {
      list($name, $value) = explode('=', $m, 2);
      $cookies[$name] = substr($value, 0, stripos($value, ';'));
    }
    return $cookies;
  }

  static function parseHeaders($headerContent)
  {

    $headers = array();

    // Split the string on every "double" new line.
    $arrRequests = explode("\r\n\r\n", $headerContent);
    // Loop of response headers. The "count() -1" is to
    //avoid an empty row for the extra line break before the body of the response.
    for ($index = 0; $index < count($arrRequests) - 1; $index++) {

      foreach (explode("\r\n", $arrRequests[$index]) as $i => $line) {
        if ($i === 0)
          $headers[$index]['http_code'] = substr($line, 9, 3);
        else {
          list ($key, $value) = explode(': ', $line);
          $v = preg_quote("Path=/", '/');
          $headers[$index][$key] .= trim(preg_replace("/$v|;HttpOnly/", '', $value));
        }
      }
    }

    return end($headers);
  }

}
