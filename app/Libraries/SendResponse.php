<?php

namespace App\Libraries;

class SendResponse {

    public static function data($data, $message = null) {
        $response = [
            'success' => true,
            'data' => $data
        ];
        if ($message) {
            $response['message'] = $message;
        }
        return response()->json($response);
    }

    public static function success($message = null, $status = 'success') {
        $response['success'] = true;
        if ($message) {
            $response['message'] = $message;
        }
        if ($status) {
            $response['status'] = $status;
        }
        return response()->json($response);
    }

    public static function error($message = null, $status = 'error') {
        $response['success'] = false;
        if ($message) {
            $response['message'] = $message;
        }
        if ($status) {
            $response['status'] = $status;
        }
        return response()->json($response);
    }

    public static function validation($validation, $status = 'validation') {
        $response['success'] = false;
        $response['validation'] = $validation;
        if ($status) {
            $response['status'] = $status;
        }
        return response()->json($response);
    }
}