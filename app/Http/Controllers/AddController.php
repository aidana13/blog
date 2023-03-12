<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AddBlogRequest;
use App\Models\Blog;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use PharIo\Manifest\Library;

class AddController extends Controller
{
    public function submit(AddBlogRequest $req)
    {
        $blog = new Blog();
        $blog->author_name = $req->input('author_name');
        $blog->blog_title = $req->input('blog_title');
        $blog->content = $req->input('content');
        $blog->save();

        return redirect()->route('blog')->with('success', 'Новый пост добавлен!');
    }
    public function allData(){
        $blog = new Blog;
        return view('blog', ['data'=> $blog->all()]);
    }
    public function showOneBlog($id){
        $blog = new Blog;
        $comments = new Comment;
        return view('one-blog', ['data' => $blog->find($id), 'comments'=> $comments->where('blog_id', '=', $id)->get()]);
    }
    public function updateBlog($id){
        $blog = new Blog;
        return view('update-blog', ['data' => $blog->find($id)]);
    }

    public function updateBlogSubmit($id, AddBlogRequest $req)
    {
        $blog = Blog::find($id);
        $blog->author_name = $req->input('author_name');
        $blog->blog_title = $req->input('blog_title');
        $blog->content = $req->input('content');
        $blog->save();

        return redirect()->route('blog-one', $id)->with('success', 'Пост успешно обновлён!');
    }

    public function deleteBlog($id){
        Blog::find($id)->delete();
        return redirect()->route('blog')->with('success', 'Пост успешно удалён!');
    }

    public function submitComment($id, Request $req)
    {
            $blog_id = Blog::find($id);
            $comments = new Comment();
            $comments->blog_id = $blog_id->id;
            $comments->commentator = $req->input('commentator');
            $comments->comment = $req->input('comment');
            $comments->image = $req->file('image')->store('uploads', 'public');
            $comments->save();

            return redirect()->route('blog-one', $id);
    }

    public function showOneComment($dataId, $comId){
        $blog = new Blog;
        $comment = new Comment;
        return view('one-comment', ['data' => $blog->find($dataId), 'comment'=> $comment->where('blog_id', '=', $dataId)->get()->find($comId)]);
    }

    public function updateComment($dataId, $comId){
        $blog = new Blog;
        $comment = new Comment;
        return view('update-comment', ['data' => $blog->find($dataId), 'comment'=> $comment->where('blog_id', '=', $dataId)->get()->find($comId)]);
    }

    public function updateCommentSubmit($dataId, $comId, Request $req)
    {
        $comment = Comment::where('blog_id', '=', $dataId)->get()->find($comId);
        $comment->commentator = $req->input('commentator');
        $comment->comment = $req->input('comment');
        $comment->image = $req->file('image')->store('uploads', 'public');
        $comment->save();

        return redirect()->route('blog-one', $dataId);
    }

    public function deleteComment($dataId, $comId){
        Comment::find($comId)->delete();
        return redirect()->route('blog-one', $dataId);
    }
    
}

