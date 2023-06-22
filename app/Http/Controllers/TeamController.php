<?php

namespace App\Http\Controllers;

use App\Models\Coach;
use App\Models\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{

    // 一覧表示と検索
    public function list(Request $request)
    {
        $query = Team::query();
        if (!empty($request)) {
            $search = $request->search;
            $query->where('name', 'LIKE', "%{$search}%");
        }
        $all_teams = $query->get();
        return view('list_team', compact('all_teams', 'search'));
    }


    public function edit($team_id)
    {
        $team = Team::findOrFail($team_id);

        $all_coaches = Coach::all();

        /* $team と $all_coaches をview ファイルに渡す */
        return view('edit_team', compact('team', 'all_coaches'));
    }

    public function update(Request $request, $team_id)
    {
        /* URLに含まれるidの値て、更新対象のTeam オブジェクトを取得する
         * Team::findOrFail(<team_id>)
         *   ->  idに一致するTeamのオブジェクトを取得する
         *   ->  一致するものがない場合は404エラーを返す
         */
        $team = Team::findOrFail($team_id);

        /* チーム名の値を更新する */
        $team->name = $request->input('name');

        /* 関連付けするCoachのIdを更新する
         * Team モデルがcoach_idを持っているので、その値を変更する
         */
        $team->coach_id = $request->coach_id;

        /* Teamモデルの変更をデータベースに反映する */
        $team->save();

        /* 保存終了したら、チーム一覧画面に戻る */
        return redirect('/team');
    }

    public function add()
    {
        $all_coaches = Coach::all();
        return view('add_team', compact('all_coaches'));
    }

    public function confirm(Request $request)
    {
        if ($request->has('send')) {
            $new_team = new Team();

            /* リクエストで渡された値を設定する */
            $new_team->name = $request->name;
            if ($request->coach_id == "null") {
                $new_team->coach_id = null;
            } else {
                $new_team->coach_id = $request->coach_id;
            }

            /* データベースに保存 */
            $new_team->save();

            /* 完了画面を表示する */
            return redirect('/team');
        }
    }
}
