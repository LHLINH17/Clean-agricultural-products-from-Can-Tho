<?php

namespace App\Http\Services\Comment;

use App\Models\Comment;

class CommentUserService
{
    public function getComment($product_id)
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        return Comment::select('id', 'customer_id', 'product_id', 'comment', 'status', 'created_at')
            ->orderbyDesc('id')
            ->where('product_id',$product_id)
            ->paginate(5);
    }
}
