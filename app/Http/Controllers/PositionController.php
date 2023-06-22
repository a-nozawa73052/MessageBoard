<?php

namespace App\Http\Controllers;

use App\Models\Player;
use App\Models\Position;
use Illuminate\Http\Request;

class PositionController extends Controller
{

    // 一覧表示と検索
    public function list(Request $request)
    {
        $query = Position::query();
        if (!empty($request)) {
            $search = $request->search;
            $query->where('name', 'LIKE', "%{$search}%");
        }
        $all_positions = $query->get();
        return view('list_position', compact('all_positions', 'search'));
    }

    public function edit($position_id)
    {
        $position = Position::findOrFail($position_id);
        $all_positions = Position::all();
        $all_players = Player::all();
        return view('edit_position', compact('position', 'all_positions', 'all_players'));
    }


    public function update(Request $request, $position_id)
    {
        $position = Position::findOrFail($position_id);
        $position->name = $request->input('name');
        $position->players()->sync($request->positions);
        // $positionからplayersテーブルからフォームでおくったpositionsを変更
        $position->save();

        return redirect('/position');
    }
    public function add()
    {
        $all_players = Player::all();
        return view('add_position', compact('all_players'));
    }

    public function confirm(Request $request)
    {
        if ($request->has('send')) {
            $new_position = new Position();

            /* リクエストで渡された値を設定する */
            $new_position->name = $request->name;
            $new_position->save();
            if ($request->players != null) {
                foreach ($request->players as $player) {
                    $new_position->players()->attach([$player => ['position_id' => $new_position->id]]);
                }
            }
            /* データベースに保存 */
            $new_position->save();

            /* 完了画面を表示する */
            return redirect('/position');
        }
    }
}
