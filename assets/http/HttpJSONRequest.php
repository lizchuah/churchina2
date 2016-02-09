<?php

require_once __DIR__ . '/HttpRequest.php';
require_once __DIR__ . '/HttpJSONResponse.php';

class HttpJSONRequest extends HttpRequest
{

  const responseHandler = HttpJSONResponse;

}
