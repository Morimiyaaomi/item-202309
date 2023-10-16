<?php
/**
 * 
 * php artisan make:controller PostController --resource --model=Post
 * 
 * Postモデルに紐づいたPostControllerと言う名前のリソースコントローラーを作成
 * 
 * リソースコントローラーとは、C(create作成)R(read 読み出し)U(update　更新)D（Delete　削除）
 * のCRUD処理をより次の7つに細分化して、それに対応するメソッドの枠があらかじめテンプレートされた
 * コントローラー
 * index    データを一覧表示
 * create   新規データ作成用のフォームを表示
 * store    新規作成データを保存
 * show     作成データを個別表示
 * edit     作成データ編集用フォームの表示
 * update   編集したデータを保存
 * destroy、データを削除
 * 
 * --------------------------------------------------------------------------------------
 * 
 * ルート設定の書き方のルール
 * Route::HTTPメソッド('URL', [コントローラー::class, 'メソッド'])->name('ルート名');
 * 
 * プロジェクト内でこのルートを呼び出すときは、nameの後のルート名を使う
 * 
 * ----------------------------------------------------------------------------------------------
 * 
 * リソースコントローラーを使うと、１行だけで、７個の処理すべてのルート設定ができる
 * web.php
 * ⇒use App\Http\Controllers\PostController;と
 * Route::resource('post', PostController::class);
 * 
 * 上の1行で、下の7行をweb.php に書いたのと同じ意味になる。
 *Route::get('post', [PostController::class, 'index'])->name('post.index');
 *Route::get('post/create', [PostController::class, 'create'])->name('post.create');
 *Route::post('post', [PostController::class, 'store'])->name('post.store');
 *Route::get('post/{post}', [PostController::class, 'show'])->name('post.show');
 *Route::get('post/{post}/edit', [PostController::class, 'edit'])->name('post.edit');
 *Route::patch('post/{post}', [PostController::class, 'update'])->name('post.update');
 *Route::delete('post/{post}', [PostController::class, 'destroy'])->name('post.destroy');
 *
 *ただし、https://textpro.addisteria.com/text/191/text-show にあるように 
 *リソースコントローラーの場合は、下記のルールに沿って、自動でURLやメソッドが割り振られる 
 *
 * カスタマイズする場合、呼び出すメソッドの制御は、
 *onlyメソッドやexceptメソッドできます。基本的にメソッド名は決まったものを利用し、
 *メソッド名を変更することはしません。上記で実装できない場合は、＋アルファで追加する
 *
 *----------------------------------------------------------------------------------
 * 
 * データベースのあるテーブルから特定のレコードの削除
 * 
 * php artisan tinker（Tinker（Laravelの対話型コンソール））を起動の後、
 * 紐付けしてある対象のモデルをuse宣言
 * postsテーブルから特定のレコードを削除する場合、use App\Models\Post;(Postモデルを指定)
 * 
 * idが1のレコードを削除
 * Post::find(1)->delete();
 * 
 * ----------------------------------------------------------------------------
 * 
 * モデルの名前空間を指定
 * use Illuminate\Support\Facades\DB;

 * usersテーブルからidが1のレコードを削除
 * DB::table('users')->where('id', 1)->delete();でも可能
 * 
 * ---------------------------------------------------------------------------
 * idを振り直す＝不要なレコードの削除後、テーブルの AUTO_INCREMENT 値を1にリセット
 * 
 * php artisan tinker（Tinker（Laravelの対話型コンソール））を起動の後、以下のように入力
 * ※終了時はexit
 * （1）モデルの名前空間を指定
 *    use Illuminate\Support\Facades\DB;
 * 
 * （2）テーブル名を指定（例: usersテーブル）
 *   $tableName = 'users';
 * 
 * 
 *  (3)テーブルのAUTO_INCREMENTをリセット
 *   DB::statement("ALTER TABLE {$tableName} AUTO_INCREMENT = 1;");
 * 
 * -----------------------------------------------------------------------------
 * 
 *  モデルの名前空間を指定
 * use App\Models\User;

 * idが1のユーザーのnameカラムを変更
 * $user = User::find(1);
 * $user->name = '新しい名前';
 * $user->save();
 * 
 * **/

?>