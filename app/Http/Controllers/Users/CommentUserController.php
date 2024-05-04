<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentUserController extends Controller
{
    public function comment($product_id)
    {
        $data = request()->all('comment');
        $data['product_id'] = $product_id;
        $data['customer_id'] = auth('cus')->id();
        $check = Comment::create($data);
        if($check){
            return redirect()->back()->with('success', 'Comment successfully');
        }
        return redirect()->back()->with('error', 'Cannot comment ');
    }

    public function delete($product_id, $comment_id)
    {
        Comment::where([
            'product_id' => $product_id,
            'id' => $comment_id,
        ])->delete();
        return redirect()->back()->with('success', 'Comment delete successfully');
    }
}
