      <!-- Sidebar -->
      <aside id="sidebar" class="four column pull-right">
        <ul class="no-bullet">
          <li class="widget tabs-widget clearfix">
                <ul class="tab-links no-bullet clearfix">
                  <li class="active"><a href="#popular-tab">Popular</a></li>
                  <li><a href="#recent-tab">Recent</a></li>
                  <li><a href="#comments-tab">Top View</a></li>
                </ul>

                <div id="popular-tab" class="shine">
                  <ul>
                     <?php $post_hot = $posts->where('hot',1)->take(4); ?>
                        @foreach($post_hot as $post)
                    <li class="shine-o">
                      @if($post->image)
                        <?php  $image = $post->image; ?>
                      @else 
                          <?php $image = 'http://placehold.it/60x60'  ?>
                      @endif
                      <a href="{{ route ('post', $post->slug) }}"><img alt="" src="{{$image}}"></a>
                      <h3><a href="{{ route ('post', $post->slug) }}">{{ $post->title }}</a></h3>
                      <div class="post-date">{{date('G:i d-m-Y', strtotime($post->created_at)) }}</div>

                    </li>
                    @endforeach
                  
                  </ul>
                </div>

                <div id="recent-tab" class="shine">
                  <ul>
                <?php $post_recent = $posts->take(4); ?>
                   @foreach($post_recent as $post)
                    <li class="shine-o">
                      @if($post->image)
                        <?php  $image = $post->image; ?>
                      @else 
                          <?php $image = 'http://placehold.it/60x60'  ?>
                      @endif
                      <a href="{{ route ('post', $post->slug) }}"><img alt="" src="{{$image}}"></a>
                      <h3><a href="{{ route ('post', $post->slug) }}">{{ $post->title }}</a></h3>
                      <div class="post-date">{{date('G:i d-m-Y', strtotime($post->created_at)) }}</div>
            </li>
            @endforeach
          </ul>
                </div>

                <div id="view-tab" class="shine">
                  <?php $post_recent = $posts->sortByDesc('view')->take(4); ?>
                    @foreach($post_recent as $post)
                  <ul>
                    <li>
                      @if($post->image)
                        <?php  $image = $post->image; ?>
                      @else 
                          <?php $image = 'http://placehold.it/60x60'  ?>
                      @endif
                      <a href="{{ route ('post', $post->slug) }}"><img alt="" src="{{$image}}"></a>
                      <h3><a href="{{ route ('post', $post->slug) }}">{{ $post->title }}</a></h3>
                      <div class="post-view">{{$post->view}} views</div>
                    </li>
                    @endforeach
                  </ul>
                </div>
          </li>
          <li class="widget subscribe-widget clearfix">
            <h3 class="widget-title">Subscribe via email</h3>
            <form>
              <input type="text" data-value="Enter your email address" value="Enter your email address">
              <input type="submit" value="Submit">
            </form>
          </li>
          
        
          <li class="widget widget_tag_cloud clearfix">
            <h3 class="widget-title">Tags</h3>
            <div class="tagcloud">
              @foreach($tags as $tag)
              <a href="{{ route ('tag', $tag->slug) }}" title="3 topics" style="font-size: 22pt;">{{ $tag->name }}</a>
              @endforeach
            </div>
          </li>
        </ul>
      </aside>
      <!-- End Sidebar -->