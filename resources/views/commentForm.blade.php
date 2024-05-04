{{--<div style="padding-left: 1px; padding-top: 30px">--}}
{{--    <label>Comment(Comments comply with community rules)</label>--}}
{{--    <form class="form-inline" role="form" action="/users/comment/{{$products->id}}" method="post">--}}
{{--        @csrf--}}
{{--        <textarea placeholder="Enter comment..." rows="3" name="comment" style="width: 500px; height: 50px;"></textarea>--}}
{{--        <button type="submit"  class="btn btn-black"--}}
{{--                style="font-size: 18px; border-radius: 5px; padding: 10px 10px; margin: 3px">--}}
{{--            <i class="icon-send"></i>--}}
{{--        </button>--}}
{{--    </form>--}}
{{--</div>--}}
<div>
{{--    @if(auth('cus')->id() == 1)--}}
{{--        <div style="padding-left: 1px; padding-top: 30px">--}}
{{--            <label>Comment(Comments comply with community rules)</label>--}}
{{--            <form class="form-inline" role="form" action="/users/comment/{{$products->id}}" method="post">--}}
{{--                @csrf--}}
{{--                <textarea placeholder="Enter comment..." rows="3" name="comment" style="width: 500px; height: 50px;"></textarea>--}}
{{--                <button type="submit"  class="btn btn-black"--}}
{{--                        style="font-size: 18px; border-radius: 5px; padding: 10px 10px; margin: 3px">--}}
{{--                    <i class="icon-send"></i>--}}
{{--                </button>--}}
{{--            </form>--}}
{{--        </div>--}}
{{--    @endif--}}

    <div style="padding-left: 1px; padding-top: 30px">
        <label>Comment(Comments comply with community rules)</label>
        <form class="form-inline" role="form" action="/users/comment/{{$products->id}}" method="post">
            @csrf
            <textarea placeholder="Enter comment..." rows="3" name="comment" style="width: 500px; height: 50px;"></textarea>
            <button type="submit"  class="btn btn-black"
                    style="font-size: 18px; border-radius: 5px; padding: 10px 10px; margin: 3px">
                <i class="icon-send"></i>
            </button>
        </form>
    </div>

    <section class="" style="left: 50%">
        @foreach($comments as $comment)
            <div class="media hover" style="margin-left: 60px; margin-top: 10px">
                <a class="pull-right">
                    <img src="/template/img/user.jpg" width="30px" class="media-oject">
                </a>
                &nbsp;
                <div class="media-body">
                    @if(auth('cus')->check())
                        @if($comment->customer_id == auth('cus')->id())
                            <div>
                                <h6 class="media-heading" style="font-size: 14px">Me
                                    <small style="font-size: 11px">({{date($comment->created_at)}})</small>
                                </h6>
                                <p style="font-size: 13px">Comment: {{$comment->comment}}
                                    <a href="/users/comment/delete/{{$comment->product_id}}/{{$comment->id}}" class="pull-right"
                                       style="float: right; margin-right: 10px; padding: 5px 10px; border: 1px solid #ccc;
                                       border-radius: 5px; background-color: #ff0000; color: #fff;">
                                        <i class="icon-trash"></i>
                                    </a>
                                </p>
                            </div>
                        @else
                            <div>
                                <h6 class="media-heading" style="font-size: 14px">{{$comment->customerName->name}}
                                    <small style="font-size: 11px">({{date($comment->created_at)}})</small>
                                </h6>
                                <p style="width: 500px; font-size: 13px">Comment: {{$comment->comment}} </p>
                            </div>
                        @endif
                    @else
                        <div>
                            <h6 class="media-heading" style="font-size: 14px">{{$comment->customerName->name}}
                                <small style="font-size: 11px">({{date($comment->created_at)}})</small>
                            </h6>
                            <p style="width: 500px; font-size: 13px">Comment: {{$comment->comment}} </p>
                        </div>
                    @endif
                </div>
            </div>
        @endforeach
        <div style="margin-left: 60px">
            {!! $comments->appends(request()->all())->links() !!}
        </div>
    </section>
</div>






