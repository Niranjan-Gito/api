<?php
return [

    /*
    |--------------------------------------------------------------------------
    | Error/Exceptions Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the Exceptions class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */


    'bad_request' => [
        'status' => 400,
        'message'  => 'The server cannot or will not process the request due to something that is perceived to be a client error.',
        'detail' => 'Your request had an error. Please try again.'
    ],

    'forbidden' => [
        'status' => 403,
        'message'  => 'The request was a valid request, but the server is refusing to respond to it.',
        'detail' => 'Your request was valid, but you are not authorised to perform that action.'
    ],

    'not_found' => [
        'status' => 404,
        'message'  => 'The requested resource could not be found but may be available again in the future. Subsequent requests by the client are permissible.',
        'detail' => 'The resource you were looking for was not found.'
    ],

    'precondition_failed' => [
        'status' => 412,
        'message'  => 'The server does not meet one of the preconditions that the requester put on the request.',
        'detail' => 'Your request did not satisfy the required preconditions.'
    ],

    'client_missing' => [
        'status' => 400,
        'message'  => 'The server cannot or will not process the request due to something that is perceived to be a client error.',
        'detail' => 'Your request had an error. Please try again with \'clint_id\' and \'client_secret\'.'
    ],
];