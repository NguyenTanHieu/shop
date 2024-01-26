@foreach ($comments as $comment)
    
@endforeach

<div class="comment-single">
    <div class="comment-author-avatar"><img alt="" src="images/_client-4.jpg" class="avatar avatar-45 photo" height="45" width="45">
    </div>
    <div class="comment-content">
        <div class="comment-info">
            by <span class="comment-author">Paul Hudson<a href="#"></a></span> |
            <span class="comment-date"><span class="comment_date_label">Posted</span> <span class="comment_date_value">19th March 2017</span></span> |
            <span class="comment-time">3:53 am</span>
        </div>
        <div class="comment_text_wrap">
            <div class="comment-text">
                <p>Cras tincidunt lectus at mi consectetur, venenatis vehicula erat tempus. Pellentesque ultricies varius posuere. Nullam laoreet auctor tellus.</p>
            </div>
        </div>
        <div class="comment-reply"><a rel="nofollow" class="comment-reply-link" href="#" aria-label="Reply to admin">Reply</a>
        </div>
    </div>
</div>
@endforeach