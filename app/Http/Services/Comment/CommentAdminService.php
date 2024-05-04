<?php

namespace App\Http\Services\Comment;

use App\Models\Comment;

class CommentAdminService
{
    public function getCommentAdmin()
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        return Comment::select('id', 'customer_id', 'product_id', 'comment', 'status', 'created_at')
            ->orderbyDesc('id')
            ->paginate(10);
    }

    public function destroy($id)
    {
        $id = request()->id;
        $comment = Comment::where('id', $id)->first();
        if($comment){
            return Comment::where('id', $id)->delete();
        }
        return false;
    }
}
