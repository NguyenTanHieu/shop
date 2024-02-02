@foreach ($comments as $comment)
<div class="comments-ol">
    <ol class="comment-list">
        <li id="comment-2"
            class="fw-feedback byuser comment-author-admin bypostauthor even thread-even depth-1 comment_item">
            <div class="comment-single">
                <div class="comment-author-avatar"><img alt="" src="assets/images/_client-4.jpg"
                        class="avatar avatar-45 photo" height="45" width="45">
                </div>
                <div class="comment-content">
                    <div class="comment-info">
                        by <span class="comment-author">{{ $comment->cus->name }}<a href="#"></a></span> |
                        <span class="comment-date"><span class="comment_date_label">Posted</span> <span
                                class="comment_date_value">{{ $comment->created_at->format('d/m/Y') }}</span></span>
                        |
                        <span class="comment-time">{{ $comment->created_at->format('h:i:s') }}</span>
                    </div>
                    <div class="comment_text_wrap">
                        <div class="comment-text">
                            <p>{{ $comment->content }}</p>
                        </div>
                    </div>
                    @if (auth('cus')->check())
                        <div class="comment-reply"><a rel="nofollow" data-id="{{ $comment->id }}"
                                class="comment-reply-link btn-show-reply-form  " href="#" aria-label="Reply to admin">Reply</a>
                        </div>
                        <form action="" method="POST" class="formReply form-reply-{{ $comment->id }}">
                            <div class="form-group">
                                <label for="">Nội dung bình luận</label>
                                <textarea id="content-reply-{{ $comment->id }}" class="form-control" rows="3" required="required"
                                    placeholder="Nhập nội dung(*)"></textarea>
                                <button style="submit" data-id="{{ $comment->id }}"
                                    class="btn btn-primary  btn-send-comment-reply">Gủi
                                    nội dung trả lời</button>
                            </div>
                        </form>
                    @else
                        <button type="button" class="btn-login btn btn-danger" data-toggle="modal"
                            data-target="#modelId">Please
                            login to post a comment.</button>
                    @endif
                   
                </div>
            </div>
          
            @foreach ($comment['replies'] as $child )
            <ul class="children">
                <li id="comment-3"
                    class="comment byuser comment-author-admin bypostauthor odd alt depth-2 comment_item">
                    <div class="comment-single">
                        <div class="comment-author-avatar"><img alt="" src="assets/images/_client-1.jpg"
                                class="avatar avatar-45 photo" height="45" width="45">
                        </div>
                        <div class="comment-content">
                            <div class="comment-info">
                                by <span class="comment-author">{{ $child->cus->name }}<a href="#"></a></span> |
                                <span class="comment-date"><span class="comment_date_label">Posted</span> <span
                                        class="comment_date_value">19th March 2017</span></span> |
                                <span class="comment-time">4:37 am</span>
                            </div>
                            <div class="comment_text_wrap">
                                <div class="comment-text">
                                    <p>{{ $child->content }}</p>
                                </div>
                            </div>
                            @if(auth('cus')->check())
                            <div class="comment-reply"><a rel="nofollow" class="btn-show-reply-form comment-reply-link" href="#"
                                data-id="{{ $comment->id }}"   aria-label="Reply to admin">Reply</a>
                            </div>
                            <form action="" method="POST" class="formReply form-reply-{{ $comment->id }}">
                                <div class="form-group">
                                    <label for="">Nội dung bình luận</label>
                                    <textarea id="content-reply-{{ $comment->id }}" class="form-control" rows="3" required="required"
                                        placeholder="Nhập nội dung(*)"></textarea>
                                    <button style="submit" data-id="{{ $comment->id }}"
                                        class="btn btn-primary  btn-send-comment-reply">Gủi
                                        nội dung trả lời</button>
                                </div>
                            </form>
                            @else
                            <button type="button" class="btn-login btn btn-danger" data-toggle="modal"
                            data-target="#modelId">Please
                            login to post a comment.</button>
                            @endif
                        </div>
                    </div>
                </li>

            </ul> <!-- .children -->
                
            @endforeach
            {{-- @foreach ($child['replies'] as $child1 )
            <ul class="children">
                <li id="comment-3"
                    class="comment byuser comment-author-admin bypostauthor odd alt depth-2 comment_item">
                    <div class="comment-single">
                        <div class="comment-author-avatar"><img alt="" src="images/_client-1.jpg"
                                class="avatar avatar-45 photo" height="45" width="45">
                        </div>
                        <div class="comment-content">
                            <div class="comment-info">
                                by <span class="comment-author">{{ $child1->cus->name }}<a href="#"></a></span> |
                                <span class="comment-date"><span class="comment_date_label">Posted</span> <span
                                        class="comment_date_value">19th March 2017</span></span> |
                                <span class="comment-time">4:37 am</span>
                            </div>
                            <div class="comment_text_wrap">
                                <div class="comment-text">
                                    <p>{{ $child1->content }}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                </li>

            </ul> <!-- .children -->
                
            @endforeach --}}
        </li>

    </ol>
</div>
@endforeach