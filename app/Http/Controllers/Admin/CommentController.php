<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\Comment\CommentAdminService;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    protected $commentAdminService;

    public function __construct(CommentAdminService $commentAdminService)
    {
        $this->commentAdminService = $commentAdminService;
    }
    public function index()
    {
        $comment = $this->commentAdminService->getCommentAdmin();
        return view('admin.comment.list',[
            'title' => 'Comment List',
            'comments' => $comment
        ]);
    }

    public function destroy(Request $id)
    {
        $result = $this->commentAdminService->destroy($id);
        if($result){
            return response()->json([
                'error' => false,
                'message'=>'Comment deleted successfully'
            ]);
        }
        return response()->json([
            'error' => true
        ]);
    }
}
