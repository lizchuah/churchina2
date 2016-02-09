<?php

class HttpException extends Exception
{

  public $request;

  static function withRequest(\HttpRequest $request)
  {
    $class = get_called_class();
    $exc = new $class($request->response->error->errorMessage, $request->response->error->code);
    $exc->request = $request;
    return $exc;
  }

  static function withRequestError(\HttpRequest $request, $errorMessage, $code)
  {
    $class = get_called_class();
    $exc = new $class($errorMessage, $code);
    $error['error_message'] = $errorMessage;
    $error['code'] = $code;
    $request->error = new APIError($error);
    $exc->request = $request;
    return $exc;
  }

}
