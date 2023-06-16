<?php

namespace App\Http\Controllers;

use App\Models\Contact; /* Model クラスを読み込み */
use Illuminate\Http\Request;

class BBSController extends Controller
{
    public function add()
    {
        return view('BBS.add');
    }

    public function confirm(Request $request)
    {

        $this->validate($request, [
            'name' => ['required', 'min:2', 'max:100'],
            'mail' => ['required'],   //なくてもいい他に条件がないから
            'destination' => ['required'],  //なくてもいい他に条件がないから
            'message' => ['required']   //なくてもいい他に条件がないから
        ]);

        if ($request->has('back')) {
            return redirect('/MessageBoard')->withInput();
        }

        /* Request で送信された内容をデバッグ表示する */
        // dd($request->all());

        if ($request->has('send')) {
            /* Contact モデルのオブジェクトを作成 */
            $new_contact = new Contact();

            /* リクエストで渡された値を設定する */
            $new_contact->name = $request->name;
            $new_contact->mail = $request->mail;
            $new_contact->destination = $request->destination;
            $new_contact->message = $request->message;

            /* データベースに保存 */
            $new_contact->save();

            /* 完了画面を表示する */
            return redirect('/MessageBoard/complete');
        }


        return view('BBS.confirm', compact('request'));
    }


    // public function list()
    // {
    //     /* お問い合わせのレコードをすべて取得 */
    //     $contacts = Contact::all();
    //     return view('BBS.list', compact('contacts'));
    // }



    ////検索画面つくる
    public function list(Request $request)
    {
        $search = $request->search;
        $query = Contact::query();
        if (!empty($request)) {
            $query->where('destination', 'LIKE', "%{$search}%");
        }

        $contacts = $query->get();
        return view('BBS.list', compact('contacts', 'search'));
    }


    public function status(Request $request, $id)
    {
        if ($request->has('status_com')) {
            $BBS_to_status = Contact::find($id);
            $BBS_to_status->status = '済';
            $BBS_to_status->save();
            return redirect('MessageBoard/index');
        } elseif ($request->has('status_incom')) {
            $BBS_to_status = Contact::find($id);
            $BBS_to_status->status = '';
            $BBS_to_status->save();
            return redirect('MessageBoard/index');
        }
    }


    public function delete($id)
    {
        $BBS_to_delete = Contact::find($id);
        $BBS_to_delete->delete();
        return redirect('MessageBoard/index');
    }

    public function edit($id)
    {
        $contact = Contact::find($id);
        return view('BBS.edit', compact('contact'));
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => ['required', 'min:2', 'max:100'],
            'mail' => ['required'],   //なくてもいい他に条件がないから
            'destination' => ['required'],  //なくてもいい他に条件がないから
            'message' => ['required']   //なくてもいい他に条件がないから
        ]);

        $contact = Contact::find($id);
        $contact->name = $request->name;
        $contact->mail = $request->mail;
        $contact->destination = $request->destination;
        $contact->message = $request->message;

        $contact->save();

        /* 一覧画面に戻る */
        return redirect('/MessageBoard/index');
    }
}
