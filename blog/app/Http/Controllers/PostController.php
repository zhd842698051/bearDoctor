<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Http\Request;
use \App\Post;
use App\Zan;

class PostController extends Controller
{
    /**

     */
    public function index(){
        $data = Post::orderBy("created_at",'desc')->withCount(["comments","zans"])->paginate(5);
        return view("post/index",compact('data'));
    }
    /**
     * 详情
     */
    public function show(Post $post){
        $post->load("comments");
        return view("post/show",compact('post'));
    }

    /**
     * 创建
     */
    public function create(){
        return view("post/create");
    }

    /**
     * 处理创建
     */
    public function store(){
        $this->validate(request(),[
            'title'=> 'required|string|max:100|min:5',
            'content'=> 'required|string|min:30',
        ]);
        $user_id = \Auth::id();
        $arr = request(['title','content']);
        $arr['user_id'] = $user_id;
        Post::create($arr);
        return redirect('posts');
    }

    /**
     * 修改
     */
    public function edit(Post $post){
        $this->authorize('update',$post);
        return view("post/edit",compact('post'));
    }

    /**
     * 修改处理
     */
    public function update(Post $post){
        $this->validate(\request(),[
            'title'=> 'required|string|max:100|min:5',
            'content'=> 'required|string|min:30',
        ]);
        $post->title = \request("title");
        $post->content = \request("content");
        $post->save();
        return redirect("posts/{$post->id}");
    }

    /**
     * 删除
     */
    public function delete(Post $post){
        $this->authorize('delete',$post);
        $post->delete();
        return redirect('posts');
    }

    public function imageUpload(Request $request){
        $path = $request->file('blogImage')->storePublicly(date('Y-m-d'));
        return json_encode(['errno'=>0,'data'=>[asset('storage/'.$path)]]);
    }

    public function comment(Post $post){
        $this->validate(\request(),[
            'content'=>'required|min:3'
        ]);
        $comment = new Comment();
        $comment->user_id = \Auth::id();
        $comment->content = request('content');
        $post->comments()->save($comment);
        return back();
    }

    public function zan(Post $post){
        $param = [
            'user_id' => \Auth::id(),
            'post_id' => $post->id,
        ];
        Zan::firstOrCreate($param);
        return back();
    }

    public function unzan(Post $post){
        $post->zan(\Auth::id())->delete();
        return back();
    }
}
