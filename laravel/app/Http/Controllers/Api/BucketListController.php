<?php

namespace App\Http\Controllers\Api;

use App\BucketList;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BucketListController extends Controller
{
    public function index()
    {
        return response()->json(['data' => [
            'bucketLists' => BucketList::all()
        ]]);
    }

    public function show($id)
    {
        $bucketList = BucketList::find($id);

        // return response()->json([
        //     'title' => $bucketList->title,
        //     'description' => $bucketList->description,
        // ]);

        // return response()->json(
        // [
        //     'bucketList' => $bucketList
        // ]);

        return response()->json(['data' => [
            'bucketList' => $bucketList
        ]]);
    }

    public function store(Request $request)
    {
        $bucketList = new BucketList;
        $bucketList->title = $request->title;
        $bucketList->description = $request->description;
        $bucketList->type_id = $request->type;
        $bucketList->gender_id = $request->gender;
        // $bucketList->type_id = $request->type->id;
        // $bucketList->gender_id = $request->gender->id;
        // $bucketList->publishing = $request->publishing;
        // $bucketList->num = $request->num;
        // $bucketList->seriousness = $request->seriousness;
        // $bucketList->date = $request->date;
        // $bucketList->start = $request->startTime;
        // $bucketList->end = $request->endTime;

        $bucketList->save();

        // foreach ($request->triggers as $triggerId) {
        //     $bucketList->bucketListTriggers()->attach($triggerId);
        // }
    }

    public function update(Request $request, $id)
    {
        $bucketList = BucketList::find($id);
        if($bucketList) {
            $bucketList->title = $request->get("title");
            $bucketList->description = $request->get("description");
            $bucketList->save();
        }

        return [];
    }

    public function destroy($id)
    {
        $bucketList = BucketList::find($id);
        $bucketList->delete();
    }


}
