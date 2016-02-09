<?php

require_once __DIR__ . '/HttpResponse.php';

class HttpJSONResponse extends HttpResponse
{

  const errorHandler = APIError;

  function __construct($body, $header = null)
  {
    parent::__construct($body, $header);
    $this->body = json_decode($body, true);
    if ($this->body['success'] === false) {
      $class = get_called_class();
      $errorHandler = $class::errorHandler;
      
        $this->error = new $errorHandler($this->body);
    }
  }

}
