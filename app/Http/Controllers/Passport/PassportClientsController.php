<?php
    namespace GitoAPI\Http\Controllers\Passport;

use Laravel\Passport\Http\Controllers\ClientController;
use GitoAPI\Repositories\Passport\ClientRepository;
use Validator;
use Illuminate\Http\Request;

class PassportClientsController extends  ClientController
{
    /**
     * The client repository instance.
     *
     * @var ClientRepository
     */
    protected $clients;

    /**
     * The validation factory implementation.
     *
     * @var ValidationFactory
     */
    protected $validation;

    /**
     * Create a client controller instance.
     *
     * @param  ClientRepository  $clients
     * @param  ValidationFactory  $validation
     * @return void
     */

    public function __construct(ClientRepository $clients,
                                Validator $validation)
    {
        $this->clients = $clients;
        $this->validation = $validation;
    }

    /**
     * Override Store a new client.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'site_id' => 'required',
            'name' => 'required|max:255',
            'redirect' => 'required|url',
        ]);
        if($validator->fails())
        {
            return validationFail($validator->errors()->all());
//            return response()->json(['status' => 400,'message' => 'Validation failed','errors' => $validator->errors()->all()],400);
        }

        return $this->clients->create(
            $request->site_id,null, $request->name, $request->redirect,false,true
        )->makeVisible('secret');
    }
}