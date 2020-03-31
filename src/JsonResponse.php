<?php


namespace CodeArchitect\ResponseClass;

/**
 * Class JsonResponse
 * Take the value user assign/enter to the properties of the class. And return the formatted response.
 * @package CodeArchitect\ResponseClass
 */
class JsonResponse
{
    public $status;
    public $message;
    public $data = [];
    public $statusCode;
    public $result;

    /**
     * JsonResponse constructor excepts three values, $status is required, $message(optional) is a string and
     * $data(optional) is an array
     * @param $status
     * @param string $message
     * @param array $data
     */
    public function __construct($status, $message = '', array $data = [])
    {
        $this->status   = $status;
        $this->message  = $message;
        $this->data     = $data;

        $this->result = [
            'status'    =>  $this->status
        ];

        echo $this->response();
    }

    /**
     * Format user message with HTTP header and status code
     * @return false|string, json object
     */
    private function response()
    {
        $statusCode = 200;

        switch ($this->status)
        {
            case "unauthorized":
                $statusCode = 401;
                break;
            case "exception":
                $statusCode = 500;
                break;
        }

        // set response header
        header("Content-Type", "application/json");
        header(sprintf('HTTP/1.1 %s %s', $statusCode, $this->status), true, $statusCode);

        if($this->message != '')
        {
            $this->result['message'] = $this->message;
        }

        if(count($this->data) > 0)
        {
            $this->result['data'] = $this->data;
        }

        return json_encode($this->result);
    }

}