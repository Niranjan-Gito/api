<?php
namespace GitoAPI\Http\Controllers\V1\User;

use GitoAPI\Http\Controllers\Controller;
use GitoAPI\Services\UserService;
use Illuminate\Http\Request;
use GitoAPI\Transformer\Users\UserTransformer;

/**
 * @resource User
 *
 * Get the user details
 *
 * ?include=address:limit(5|1):order(created_at|desc)
 */
class UserController extends Controller
{
    protected $userService;
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * Display a listing of the resource.
     *
     * is can be an optional longer description of your API call, used within the documentation.
     *
     *
     * @param Request $request
     * @return \Illuminate\Contracts\Http\Response
     */
    public function index(Request $request)
    {
        $data = $this->userService->getUser($request);
        return json()->withItem($data, new UserTransformer());
    }
    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @return \Illuminate\Contracts\Http\Response
     */
    public function update(Request $request)
    {
        $data = $this->userService->update($request->user(),$request->all());

        if (! $data) {
            return json()->internalError('Failed to update !');
        }
        return json()->success('Updated');
    }
}