@extends('master.main')
@section('title', $catp->name)
@section('main')
	

	<!-- PAGE HEAD -->
		<section class="page-head">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<ul class="breadcrumb">
							<li><a href="#">Home</a></li>
							<li>{{ $catp->name }}</li>
						</ul>
						<h1>{{ $catp->name }}</h1>	
					</div>
				</div>
			</div>
		</section>
	<!-- PAGE HEAD END -->

	<!-- BLOG LIST -->
	<section class="blog-list">
		<div class="blog-content">
			<div class="container">
				<div class="row">
					<div class="col-md-8">
						@foreach ( $catp->posts as $post )
						<div class="blog-item">
							<div class="img-wrap"><a href="{{ route('home.post',$post->post_id) }}"><img class="img-responsive" src="uploads/post/{{ $post->image }}" alt=""></a></div>
							<div class="info">
								<a href="blog-post.html" class="name"><h4>{{ $post->name }}</h4></a>
								<p class="text">{{ $post->description }}</p>
							</div>
							<div class="item-info">
								<div class="date"><i class="fa fa-clock-o" aria-hidden="true"></i>January 2, 2017</div>
								<div class="like"><i class="fa fa-heart" aria-hidden="true"></i>12</div>
								<div class="comm"><i class="fa fa-commenting" aria-hidden="true"></i>3</div>
							</div>
						</div>
						@endforeach
						<div class="paging-navigation">
						    <hr>
						    <div class="pagination">
						        <a href="#" class="prev disabled"><i class="fa fa-chevron-left" aria-hidden="true"></i> Prev</a>
						        <a href="#" class="page-numbers current">1</a>
						        <a href="#" class="page-numbers">2</a>
						        <a href="#" class="page-numbers">3</a>
						        <a href="#" class="page-numbers">4</a>
						        <a href="#" class="next">Next <i class="fa fa-chevron-right" aria-hidden="true"></i></a>
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
						                <a href="#" class="swipebox col-lg-4 col-md-4 col-sm-6 col-xs-6"><img class="img-responsive" src="images/insta-1.jpg" alt="Gallery">
						                </a>
						                <a href="#" class="swipebox col-lg-4 col-md-4 col-sm-6 col-xs-6"><img class="img-responsive" src="images/insta-2.jpg" alt="Gallery">
						                </a>
						                <a href="#" class="swipebox col-lg-4 col-md-4 col-sm-6 col-xs-6"><img class="img-responsive" src="images/insta-3.jpg" alt="Gallery">
						                </a>
						                <a href="#" class="swipebox col-lg-4 col-md-4 col-sm-6 col-xs-6"><img class="img-responsive" src="images/insta-4.jpg" alt="Gallery">
						                </a>
						                <a href="#" class="swipebox col-lg-4 col-md-4 col-sm-6 col-xs-6"><img class="img-responsive" src="images/insta-5.jpg" alt="Gallery">
						                </a>
						                <a href="#" class="swipebox col-lg-4 col-md-4 col-sm-6 col-xs-6"><img class="img-responsive" src="images/insta-6.jpg" alt="Gallery">
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
	<!-- BLOG LIST END -->

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

@stop()
