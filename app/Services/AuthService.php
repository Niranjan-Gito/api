<?php

namespace GitoAPI\Services;

use GitoAPI\Jobs\Auth\createUserRegistrationJob;
use GitoAPI\Jobs\User\createUserSubscriptionJob;
use GitoAPI\Mail\userRegistered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class AuthService
{
    public function create(Request $request)
    {
        $request->merge($this->formatUser($request));

        dispatch(new createUserRegistrationJob($request->except('name')));

        //send mail
        Mail::to($request->email)->send(new userRegistered($request->all()));
    }

    private function formatUser($request)
    {
        return [
            'site_id'       => siteId(),
            'first_name'    => $request->get('first_name')??$request->name,
            'last_name'     => $request->get('last_name'    )??$request->name,
            'nicename'      => $request->get('nicename')??$request->name,
            'user_name'     => $request->get('user_name')??$request->email,
            'login_type'    => '',
            'newsletter'    => $request->get('newsletter')??0,
        ];
    }

    public function subscribe($request)
    {
        dispatch(new createUserSubscriptionJob($request));
    }
}