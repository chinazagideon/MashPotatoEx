<?php
function successResponse($message = null, $data = array(), $status= \Illuminate\Http\Response::HTTP_OK){
    return \response()->json(
        [
            'msg' => $message,
            'data' => $data,
            "status" => $status
        ]);
}

function errorResponse($message = null, $data = null, $status = \Illuminate\Http\Response::HTTP_NOT_FOUND)
{
    return \response()->json(
        [
            'msg' => $message,
            "data" => $data,
            "status" => $status
        ]
    );
}
?>
