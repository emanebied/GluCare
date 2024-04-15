<?php

namespace App\Http\Controllers\Apis\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Apis\Dashboard\SettingsStoreRequest;
use App\Http\Requests\Apis\Dashboard\SettingsUpdateRequest;
use App\Http\traits\ApiTrait;
use App\Models\WebsiteSetting;
use App\Http\traits\AuthorizeCheckTrait;
use Spatie\MediaLibrary\InteractsWithMedia;

class WebsiteSettingController extends Controller
{

    use AuthorizeCheckTrait, InteractsWithMedia;

    public function index()
    {
        $this->AuthorizeCheck('settings_view');
        $settings = WebsiteSetting::all();
        return ApiTrait::data(compact('settings'), 'All Settings');

    }

        public function store(SettingsStoreRequest $request)
       {
        $data = $request->validated();
        $settings = WebsiteSetting::create($data);

        $settings->addMediaFromRequest('image')
                 ->toMediaCollection('settings_images');

        $settings->getFirstMediaUrl('settings_images', 'preview');

        $settings->refresh();
        return ApiTrait::data(compact('settings'), 'Setting Created Successfully', 201);
    }


    public function update(SettingsUpdateRequest $request, $id)
    {
        $settings = WebsiteSetting::findOrFail($id);

        if ($request->hasFile('image')) {
            $settings->clearMediaCollection('settings_images');
            $settings->addMediaFromRequest('image')->toMediaCollection('settings_images');
        }
        try {
            $settings->update($request->validated());
            $settings->getFirstMediaUrl('settings_images', 'preview');
            $settings->refresh();
            return ApiTrait::data(compact('settings'), 'Settings updated successfully');

        } catch (\Exception $exception) {
            return ApiTrait::data(compact('settings'), 'Failed to update settings. Please try again later.', 422);
        }
    }


    public function destroy($id)
    {
        $this->AuthorizeCheck('settings_delete');
        $settings = WebsiteSetting::findOrFail($id);
        $settings->delete();
        return ApiTrait::successMessage( 'Settings deleted successfully');
    }
}

