<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Coach;
use App\Models\Team;

class CoachController extends Controller
{
    // 一覧表示と検索
    public function list(Request $request)
    {
        $query = Coach::query();
        // $query2 = Team::query();
        if (!empty($request)) {
            $search = $request->search;
            $query->where('name', 'LIKE', "%{$search}%");
            // $query2->where('name', 'LIKE', "%{$search}%");

        }
        $all_coaches = $query->get();
        // $all_coaches = $query2->get();
        return view('list_coach', compact('all_coaches', 'search'));
    }


    // public function list(Request $request)
    // {
    //     $search = $request->search;
    //     $query = Contact::query();
    //     if (!empty($request)) {
    //         $query->where('destination', 'LIKE', "%{$search}%");
    //     }

    //     $contacts = $query->get();
    //     return view('BBS.list', compact('contacts', 'search'));
    // }


    public function edit($coach_id)
    {
        $coach = Coach::findOrFail($coach_id);
        $all_teams = Team::all();
        return view('edit_coach', compact('coach', 'all_teams'));
    }


    public function update(Request $request, $coach_id)
    {

        // コーチ名を変更
        $coach = Coach::findOrFail($coach_id);
        $coach->name = $request->input('name');

        // チームがだぶらないように元のところを null
        $teams = Team::where('coach_id', $coach_id)->get();
        foreach ($teams as $team) {
            $team->coach_id = null;
            $team->save();
        }

        // チームテーブルのコーチIDを更新
        $team2 = Team::findOrFail($request->team_id);
        $team2->coach_id = $coach_id;

        $coach->save();
        $team2->save();


        return redirect('/coach');
    }

    public function add(Request $request)
    {
        if ($request->has('send')) {
            $new_coach = new Coach();

            /* リクエストで渡された値を設定する */
            $new_coach->name = $request->name;

            /* データベースに保存 */
            $new_coach->save();

            /* 完了画面を表示する */
            return redirect('/coach');
        }
    }
}
