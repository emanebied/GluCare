<?php

namespace App\Http\Controllers\Apis\GluCare\ActivityRecommendation;

use App\Http\Controllers\Controller;
use App\Http\traits\ApiTrait;
use App\Http\traits\AuthorizeCheckTrait;
use App\Models\GluCare\ActivityRecommendation\Activity;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
 use AuthorizeCheckTrait,ApiTrait;
    public function index()
    {

        $this->authorizeCheck('activity_view');
        $activities = Activity::all();
        return response()->json($activities);
    }
    //store
    public function store(Request $request)
    {
        $this->authorizeCheck('activity_create');
        $activity = new Activity([
            'morning' => $request->get('morning'),
            'noon' => $request->get('noon'),
            'night' => $request->get('night'),
        ]);
        $activity->save();
        return response()->json($activity);
    }


    public function insertMany(Request $request)
    {
        $this->authorizeCheck('activity_create');
        $activities = $request->all();
        $insertedActivities = [];

        foreach ($activities as $activityData) {
            $activity = new Activity([
                'morning' => $request->get('morning'),
                'noon' => $request->get('noon'),
                'night' => $request->get('night'),
            ]);

            $activity->save();
            $insertedActivities[] = $activity;
        }

        return response()->json($insertedActivities);
    }

    //show
    public function show($id)
    {
        $this->authorizeCheck('activity_view');
        $activity = Activity::find($id);
        return response()->json($activity);
    }

    //update

    public function update(Request $request, $id)
    {
        $this->authorizeCheck('activity_edit');
        $activity = Activity::find($id);
        $activity->morning = $request->get('morning ');
        $activity->noon = $request->get('noon');
        $activity->night = $request->get('night');
        $activity->save();
        return response()->json($activity);
    }

    //destroy

    public function destroy($id)
    {
        $this->authorizeCheck('activity_delete');
        $activity = Activity::find($id);
        $activity->delete();
        return response()->json($activity);
    }
}
