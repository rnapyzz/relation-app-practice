<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PostController extends Controller
{
    // 今回は閲覧機能（一覧表示と詳細表示）のみを実装
    // 一覧表示
    public function index(Request $request): View
    {
        // EagerLoadingで投稿一覧を取得
        $query = Post::with('tags')->withCount('comments');

        // タグで投稿を絞り込めるようにリクエストにタグ情報が含まれている場合はフィルタする
        if ($request->has('tag')) {
            $tagName = $request->tag;
            $query->whereHas('tags', function ($q) use ($tagName) {
                $q->where('name', $tagName);
            });
        }

        $posts = $query->latest()->get();

        return view('posts.index', ['posts' => $posts]);
    }

    // 詳細表示
    public function show($id): View
    {
        $post = Post::with(['comments', 'tags'])->findOrFail($id);

        return view('posts.show', ['post' => $post]);
    }
}
