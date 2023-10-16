<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Item;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Cart;

class ItemController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * 商品一覧
     */
    public function index()
    {
        // 商品一覧取得
        $items = Item::all();

        return view('item.index', compact('items'));
    }
    public function search(Request $request)
    {
        // ユーザー一覧をページネートで取得
        $items = Item::paginate(20);

        // 検索フォームで入力された値を取得する
        $search = $request->input('search');

        // クエリビルダ
        $query = Item::query();

       // もし検索フォームにキーワードが入力されたら
        if ($search) {

            // 全角スペースを半角に変換
            $spaceConversion = mb_convert_kana($search, 's');

            // 単語を半角スペースで区切り、配列にする（例："山田 翔" → ["山田", "翔"]）
            $wordArraySearched = preg_split('/[\s,]+/', $spaceConversion, -1, PREG_SPLIT_NO_EMPTY);


            // 単語をループで回し、ユーザーネームと部分一致するものがあれば、$queryとして保持される
            foreach($wordArraySearched as $value) {
                $query->where('name', 'like', '%'.$value.'%');
            }

            // 上記で取得した$queryをページネートにし、変数$usersに代入
            $items = $query->paginate(20);

        }

        // ビューにusersとsearchを変数として渡す
        return view('item.index')
            ->with([
                'items' => $items,
                'search' => $search,
            ]);
    }

    /**
     * 商品登録
     */
    public function add(Request $request)
    {
        // POSTリクエストのとき
        if ($request->isMethod('post')) {
            // バリデーション
            $this->validate($request, [
                'name' => 'required|max:100',
            ]);

            // 商品登録
            Item::create([
                'user_id' => Auth::user()->id,
                'name' => $request->name,
                'type' => $request->type,
                'detail' => $request->detail,
            ]);

            return redirect('/items');
        }

        return view('item.add');
    }

    public function cartadd(Request $request)//idを呼んでここへきますよ
    {
        Cart::create([
            'user_id'=> Auth::user()->id, //authは持ってくるログインユーザーidの意味
            'item_id'=> $request->item_id,
        ]);
        return redirect('/cart/show');
    }

    public function cartshow(Request $request)
    {
        $items = Auth::user()->items;
        //dd($items);

        return view('item.cart', compact('items'));

    }
    /**
     * 削除処理
     */
    public function cartdelete($id)
    {
        //$cart = Cart::find($id); //findで削除するものを選んでいる
        //dd($items);
        Cart::destroy($id);

        return redirect('/cart/show');
    }
    /**
     * 商品一覧からの削除処理
     */
    public function itemdestroy($id)
    {
        // テーブルから指定のIDのレコード1件を取得
        $item = Item::find($id);
        // レコードを削除
        $item->delete();
        // 削除したら一覧画面にリダイレクト
        return redirect()->route('item.index'); //routeの後ろはnameを書く
    }
}
