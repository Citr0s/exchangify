<?php namespace Exchangify\core\router;

class RouterService
{
    public static function invoke($request, $method)
    {
        if (!array_key_exists(0, $request) || ($request[0] === 'web' && ($method === 'GET'))) {
            echo 'Hello World!';
            return;
        }

        if ($request[0] === 'api' && ($method === 'POST')) {
            unset($request[0]);
            $request = array_values($request);

            if ($request[0] === 'log') {
                unset($request[0]);
                $request = array_values($request);

                //$logger = new LogService(new LogRepository(new DatabaseService()));
                //$logger->invoke($request[0], file_get_contents('php://input'));
                return;
            }
        }

        header("HTTP/1.0 404 Not Found");
    }
}