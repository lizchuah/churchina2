<?php
require_once __DIR__ . '/assets/http/Http.php';

class CaptchaRequest extends HttpJsonRequest {
  const exceptionHandler = HttpException;
  const responseHandler = CaptchaResponse;
  
  public $secret = '6Le2rQ8TAAAAADeUxhnPrywoP6941M_sUCU50yNj';
    
    function __construct($url) {
        parent::__construct($url);
        $this->base = 'https://www.google.com/recaptcha/api/';
    }
    
    static function verify ($captcha) {
        $request = new CaptchaRequest('siteverify');
        $data = array(
            'secret'=>$request->secret,
            'response'=>$captcha
        );
        $response = $request->post($data);
        return $response;
    }
}

class CaptchaResponse extends HttpResponse
{

  const errorHandler = CaptchaError;

  function __construct($body, $header)
  {
    parent::__construct($body, $header);
    $this->body = json_decode($body, true);
    if ($this->body['success'] === false) {
      $error = $this->body;
      $this->error = new CaptchaError($error);
    }
  }

}

class CaptchaError
{

  public $success, $errorCodes;

  function __construct($error)
  {
    $this->success = $error['success'];
    $this->errorCodes = $error['error-codes'];
  }

}
