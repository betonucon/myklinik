<?php


namespace App\Http\Controllers\Api;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller as Controller;


class BaseController extends Controller
{
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function sendResponse($result, $message)
    {
    	$response = [
            'status' => 'success',
            'data'    => $result,
            'message' => $message,
        ];


        return response()->json($response, 200);
    }
    public function sendResponsejson($result,$value)
    {
    	$response = [
            'status' => 'success',
            'payload'    => $result,
            'value' => $value,
        ];


        return response()->json($response, 200);
    }
    public function sendResponsejsonNoakses()
    {
    	$response = [
            'status' => 'error',
            'message'    => 'Token Tidak Terdaftar'
        ];


        return response()->json($response, 200);
    }
    public function sendResponsesso($result)
    {
    	$response = [
            'status' => 'success',
            'data'    => $result,
            'msg' => "",
        ];


        return response()->json($response, 200);
    }
    public function sendResponsechart($result)
    {
    	$response = [
            'data'    => $result,
        ];


        return response()->json($response, 200);
    }
    public function sendResponse2($result, $message)
    {
    	$response = [
            'status' => true,
            'data'    => '',
            'message' => $message,
        ];


        return response()->json($response, 200);
    }
    public function sendResponseerror($message)
    {
    	$response = [
            'status' => false,
            'data'    => [],
            'message' => $message,
        ];


        return response()->json($response, 200);
    }


    /**
     * return error response.
     *
     * @return \Illuminate\Http\Response
     */
    public function sendError($error, $errorMessages = [], $code = 404)
    {
    	$response = [
            'status' => false,
            'message' => $error,
        ];


        if(!empty($errorMessages)){
            $response['data'] = $errorMessages;
        }


        return response()->json($response, $code);
    }
}