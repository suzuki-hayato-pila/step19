<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Gate;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index(){
        $posts=Post::all();
        // $posts=Post::where('user_id', auth()->id())->get();  ログインユーザーの投稿データを取得
        // $posts=Post::where('user_id', '!', auth()->id())->get();  ログインユーザー以外の投稿データーを取得
        // $posts=Post::whereDate('created_at', '>=', '2024-10-04')->get(); 2024-10-04以降に作成された投稿データを取得
        // $posts=Post::where('user_id', 1)->whereDate('created_at', '2024-10-04')->get(); user_idカラムが1でかつ、2024年10月4日以降の投稿データ取得
        // 作成日を新しい順にしてデータを取得↓
        $posts=Post::orderBy('created_at', 'desc')->get();
        // $posts=Post::whereDate('created_at', '2024-10-04')->first();  作成日を新しい順にしてデータをひとつだけ取得する
        // $posts=Post::find(1);  idが1のデータを取得する　　　foreach関数と一緒に使用すると、foreachを使用する必要がないため、エラーになる
        return view('post.index', compact('posts'));
    }
    public function create() {
        return view('post.create');
    }
    public function store(Request $request) {
        Gate::authorize('test');

        $validated = $request->validate([
            'title' => 'required|max:20',
            'body' => 'required|max:400',
        ]);

        $validated['user_id'] = auth()->id();

        $post = Post::create($validated);

        // $post = Post::create([
        //     'title' => $request->title,
        //     'body' => $request->body
        // ]);
        $request->session()->flash('message', '保存しました');

        return back();
    }
    public function show (Post $post) {
        return view('post.show', compact('post'));
    }
}
