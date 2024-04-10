<?php

namespace App\Http\Controllers\Apis\Auth;
use App\Http\Controllers\Controller;
use App\Http\Requests\Apis\Auth\UpdateProfileRequest;
use App\Http\traits\ApiTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\MediaLibrary\InteractsWithMedia;


class ProfileController extends Controller
{
    use InteractsWithMedia,ApiTrait;
    public function profile(Request $request)
    {
        $user = Auth::guard('sanctum')->user();
        return $this->data(compact('user'), 'Profile retrieved successfully');

    }

    public function updateProfile(UpdateProfileRequest $request)
    {
        $user = Auth::guard('sanctum')->user(); //Currently authenticated user
        if (!$user) {
            return $this->errorMessage([], 'User not found', 404);
        }

        $data = $request->safe()->except('password', 'password_confirmation');
        $data['password'] = Hash::make($request->password);

        //upload Image
        if ($request->hasFile('image')) {
            $user->addMediaFromRequest('image')
                ->withResponsiveImages()
                ->toMediaCollection('users_images');
        }

        try {
                $user->update($data);
                $user->getFirstMediaUrl('users_images','preview');    //Retrieve image

                return $this->data(compact('user'), 'Profile updated successfully');
            } catch (\Exception $exception) {
                return $this->data(compact('user'), 'Failed to update user profile. Please try again later.', 422);
            }
        }

}

