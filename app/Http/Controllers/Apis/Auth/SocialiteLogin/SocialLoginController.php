<?php

namespace App\Http\Controllers\Apis\Auth\SocialiteLogin;


use App\Http\Controllers\Controller;
use App\Http\traits\ApiTrait;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

class SocialLoginController extends Controller
{
    use ApiTrait;
    public function validateProvider($provider)
    {
        $providers = ['google', 'facebook'];
        if (!in_array($provider, $providers)) {
            return  $this->errorMessage(['error' => 'Provider not supported'], 400);
        }
    }

    public function redirectToProvider($provider)
    {
        $validated= $this->validateProvider($provider);
        if($validated){
            return $validated;
        }
        return Socialite::driver($provider)->stateless()->redirect();
    }

    public function handleProviderCallback(Request $request)
    {

        // Validate the request
        $validator = Validator::make($request->only('provider', 'access_provider_token'), [
            'provider' => ['required', 'string'],
            'access_provider_token' => ['required', 'string']
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        // Get provider and validate
        $provider = $request->post('provider');
        $validated = $this->validateProvider($provider);
        if (!is_null($validated)) {
            return $validated;
        }

        try {
            // Get user data from social provider
            $providerUser = Socialite::driver($provider)->userFromToken($request->access_provider_token);

            // Create or find the user without setting a password
            $user = User::updateOrCreate([
                'email' => $providerUser->getEmail(),
                'name' => $providerUser->getName(),
                'password' => Hash::make(Str::random(24))
            ]);

            // Create or update provider record
            $user->providers()->updateOrCreate(
                ['provider' => $provider],
                [
                    'provider_id' => $providerUser->getId(),
                    'provider_token' => $providerUser->access_provider_token
                ]
            );

            // Generate token
            $token = "Bearer " . $user->createToken('socialite')->plainTextToken;


            $data = [
                'user' => [
                    'id' => $user->id,
                    'name' => $user->name,
                    'email' => $user->email,
                    'created_at' => $user->created_at,
                    'updated_at' => $user->updated_at
                ],
                'token' => $token
            ];

            return $this->data(compact('data'), 200);
        } catch (\Exception $e) {
            return $this->errorMessage(['message' => $e->getMessage()], 500);
        }
    }




}



