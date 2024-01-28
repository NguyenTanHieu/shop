@extends('master.main')
@section('title', $post->name)
@section('main')


    <!-- PAGE HEAD -->
    <section class="page-head">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li><a href="#">Home</a></li>
                        <li><a href="#"></a></li>
                        <li>{{ $post->name }}</li>
                    </ul>
                    <h1>{{ $post->name }}</h1>
                </div>
            </div>
        </div>
    </section>
    <!-- PAGE HEAD END -->

    <!-- BLOG SINGLE POST -->
    <section class="blog-list">
        <div class="blog-content">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <div class="blog-post text-page">
                            <div class="img-wrap"><img class="img-responsive" src="uploads/post/{{ $post->image }}"
                                    alt=""></div>
                            <div class="item-info">
                                <div class="date"><i class="fa fa-clock-o" aria-hidden="true"></i>January 2, 2017</div>
                                <div class="like"><i class="fa fa-heart" aria-hidden="true"></i>12</div>
                                <div class="comm"><i class="fa fa-commenting" aria-hidden="true"></i>3</div>
                            </div>
                            <p>{{ $post->description }}</p>
                            <div class="tags-short">
                                <strong>Tags:</strong> <a href="#">#gym</a>, <a href="#">#fitness</a>, <a
                                    href="#">#nutrition</a>, <a href="#">#protein</a>
                            </div>
                            <div class="social-small">
                                <strong>Share:</strong>
                                <a href="#" class="fa fa-twitter"></a>
                                <a href="#" class="fa fa-facebook"></a>
                                <a href="#" class="fa fa-instagram"></a>
                                <a href="#" class="fa fa-google-plus"></a>
                                <a href="#" class="fa fa-pinterest"></a>
                            </div>
                            <div id="comments" class="comments-area">

                            </div>

                            <h3 class="comments-form-title">Add Comment</h3>
                            <div class="comments-form-wrap">
                                <div class="comments-form anchor">
                                    @if (auth('cus')->check())
                                        <p class="comments-form-title">He Sờ Lô : {{ auth('cus')->user()->name }}</p>
                                        <form id="commentform" class="comment-form form">
                                            @csrf
                                            <label for="" class="required">Your Message</label>
                                            <input type="hidden" value="{{ $post->post_id }}" name="post_id"
                                                id="post_id">
                                            <textarea id="comment-content" name="content" placeholder="Comment" aria-required="true"></textarea>
                                            <small id="comment-error" class="help-blog"></small>

                                            <button type="button"
                                                id="btn-comment"class="submit aligncenter btn btn-brown">Post
                                                Comment</button>
                                        @else
                                            <button type="button" class="btn-login btn btn-danger" data-toggle="modal"
                                                data-target="#modelId">Please login to post a comment.</button>
                                            </p>

                                        </form>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="widget-area" role="complementary">
                            <aside class="widget">
                                <h4>Categories</h4>
                                <ul>
                                    <li class="current-cat"><a href="#">Coffee Market</a>
                                    </li>
                                    <li><a href="#">100% Arabica</a>
                                    </li>
                                    <li><a href="#">Columbian Coffee</a>
                                    </li>
                                    <li><a href="#">Espresso</a>
                                    </li>
                                    <li><a href="#">Aroma Bar</a>
                                    </li>
                                    <li><a href="#">Coffee Shop</a>
                                    </li>
                                </ul>
                            </aside>
                            <aside class="widget widget_calendar">
                                <h4>Calendar</h4>
                                <div id="calendar_wrap" class="calendar_wrap">
                                    <table id="wp-calendar">
                                        <caption>April 2017</caption>
                                        <thead>
                                            <tr>
                                                <th scope="col" title="Monday">M</th>
                                                <th scope="col" title="Tuesday">T</th>
                                                <th scope="col" title="Wednesday">W</th>
                                                <th scope="col" title="Thursday">T</th>
                                                <th scope="col" title="Friday">F</th>
                                                <th scope="col" title="Saturday">S</th>
                                                <th scope="col" title="Sunday">S</th>
                                            </tr>
                                        </thead>



                                        <tbody>
                                            <tr>
                                                <td colspan="5" class="pad">&nbsp;</td>
                                                <td>1</td>
                                                <td>2</td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td id="today">4</td>
                                                <td>5</td>
                                                <td>6</td>
                                                <td>7</td>
                                                <td>8</td>
                                                <td>9</td>
                                            </tr>
                                            <tr>
                                                <td>10</td>
                                                <td>11</td>
                                                <td>12</td>
                                                <td>13</td>
                                                <td>14</td>
                                                <td>15</td>
                                                <td>16</td>
                                            </tr>
                                            <tr>
                                                <td>17</td>
                                                <td>18</td>
                                                <td>19</td>
                                                <td>20</td>
                                                <td>21</td>
                                                <td>22</td>
                                                <td>23</td>
                                            </tr>
                                            <tr>
                                                <td>24</td>
                                                <td>25</td>
                                                <td>26</td>
                                                <td>27</td>
                                                <td>28</td>
                                                <td>29</td>
                                                <td>30</td>
                                            </tr>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td colspan="4" id="prev"><a href="#">« Mar 2017</a></td>

                                                <td colspan="3" id="next" class="pad">&nbsp;</td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </aside>
                            <aside class="widget">
                                <h4>Search</h4>
                                <div class="content">
                                    <form class="form wp-searchform" method="get">
                                        <input name="search" value="" placeholder="Search for..." type="text">
                                        <button type="submit" class="fa fa-search"></button>
                                    </form>
                                </div>
                            </aside>
                            <aside class="widget">
                                <h4>Archives</h4>
                                <ul>
                                    <li><a href="#">March 2017</a>
                                    </li>
                                    <li><a href="#">February 2017</a>
                                    </li>
                                    <li><a href="#">January 2017</a>
                                    </li>
                                </ul>
                            </aside>
                            <aside class="widget">
                                <h4>Insta</h4>
                                <div class="content">
                                    <div class="gallery-small row">
                                        <a href="#" class="swipebox col-lg-4 col-md-4 col-sm-6 col-xs-6"><img
                                                class="img-responsive" src="images/insta-1.jpg" alt="Gallery">
                                        </a>
                                        <a href="#" class="swipebox col-lg-4 col-md-4 col-sm-6 col-xs-6"><img
                                                class="img-responsive" src="images/insta-2.jpg" alt="Gallery">
                                        </a>
                                        <a href="#" class="swipebox col-lg-4 col-md-4 col-sm-6 col-xs-6"><img
                                                class="img-responsive" src="images/insta-3.jpg" alt="Gallery">
                                        </a>
                                        <a href="#" class="swipebox col-lg-4 col-md-4 col-sm-6 col-xs-6"><img
                                                class="img-responsive" src="images/insta-4.jpg" alt="Gallery">
                                        </a>
                                        <a href="#" class="swipebox col-lg-4 col-md-4 col-sm-6 col-xs-6"><img
                                                class="img-responsive" src="images/insta-5.jpg" alt="Gallery">
                                        </a>
                                        <a href="#" class="swipebox col-lg-4 col-md-4 col-sm-6 col-xs-6"><img
                                                class="img-responsive" src="images/insta-6.jpg" alt="Gallery">
                                        </a>
                                    </div>
                                </div>
                            </aside>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- BLOG SINGLE POST END -->

    <!-- SUBSCRIBE FORM -->

    <section class="subscribe">
        <div class="container ">
            <div class="row">
                <div class="col-md-12">
                    <div class="inner">
                        <div class="row">
                            <div class="col-lg-4 col-md-6">
                                <div class="top-title">Want to know about new types of coffee?</div>
                                <div class="bottom-title">Get our weekly email</div>
                            </div>
                            <div class="col-lg-5 col-md-6">
                                <form class="subs-form">
                                    <input type="text" placeholder="Enter Your Email">
                                    <input type="submit" value="SUBMIT">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTileId"
        aria-hidden="true">
        <div class="modal-dialog odal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Login</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="error"></div>
                    <form class="contact-form" action="{{ route('ajax.login') }}" method="POST">
                        @csrf
                        <div class="row">

                            <div class="col-md-12">
                                <input id="email" class="contact-input" type="email" placeholder="Email *"
                                    required>
                                @error('email')
                                    <small class="help-block">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <input id="password" class="contact-input" type="text" placeholder="Your password *"
                                    required>
                            </div>

                            <div class="col-md-12 text-center">
                                <button id="btn-login" class="btn btn-primary btn-block"
                                    style="width:100%">Login</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <input type="text" id="token" value="{{ csrf_token() }}" hidden>
    <!-- SUBSCRIBE FORM END -->
    @push('scripts')
        <script>
            var _csrf = $('#token').val();
            $('#btn-login').click(function(ev) {
                ev.preventDefault();

                var email = $('#email').val();
                var password = $('#password').val();
                var _loginUrl = '{{ route('ajax.login') }}';


                $.ajax({
                    url: _loginUrl,
                    type: 'POST',
                    data: {
                        email: email,
                        password: password,
                        _token: _csrf
                    },

                    success: function(res) {
                        if (res.error) {
                            let _html_error =
                                '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div>';
                            for (let error of res.error) {
                                _html_error += "<li>${#error}</li>"
                            }
                            _html_error += '</div>';
                            $('#error').html(_html_error);
                        } else {
                            alert('đăng nhập thành công');
                            location.reload();
                        }

                    }
                });

            });
            console.log(11111111111);

            // $('#btn-comment').click(function(ev) {
            //     console.log(11111111111);
            //     ev.preventDefault();
            //     let content = $('#comment-content').val();
            //     let post_id = $('#post_id').val();
                // var _commentUrl = `${route('ajax.comment', ['post_id' => $post->post_id])}`;
            //     console.log(_commentUrl);

            // });

            $('#btn-comment').click(function(ev) {
                ev.preventDefault();

                let content = $('#comment-content').val();
                let post_id = $('#post_id').val();
                var _commentUrl = '{{route('ajax.comment', ['post_id' => $post->post_id])}}';

                $.ajax({
                    url: _commentUrl,
                    type: 'POST',
                    data: {
                        content: content,
                        post_id: post_id,
                        _token: _csrf
                    },

                    success: function(res) {
                        if (res.error) {
                            $('#comment-error').html(res.error);
                        } else {
                            $('#comment-error').html('');
                        }

                    }
                });

                console.log('finish');
            });
        </script>
    
    @endpush
@stop()
