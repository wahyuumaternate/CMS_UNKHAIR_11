<div class="col-lg-4 sidebar">

    <div class="widgets-container">

        <!-- Search Widget -->
        <div class="search-widget widget-item">

            <h3 class="widget-title">Search</h3>
            <form action="">
                <input type="text">
                <button type="submit" title="Search"><i class="bi bi-search"></i></button>
            </form>

        </div><!--/Search Widget -->

        <!-- Recent Posts Widget -->
        <div class="recent-posts-widget widget-item">

            <h3 class="widget-title">Trending Posts</h3>

            <div class="post-item">
                <img src="{{ asset('themes/zenblog/img/blog/blog-recent-1.jpg') }}" alt=""
                    class="flex-shrink-0">
                <div>
                    <h4><a href="blog-details.html">Nihil blanditiis at in nihil autem</a></h4>
                    <time datetime="2020-01-01">Jan 1, 2020</time>
                </div>
            </div><!-- End recent post item-->

            <div class="post-item">
                <img src="{{ asset('themes/zenblog/img/blog/blog-recent-2.jpg') }}" alt=""
                    class="flex-shrink-0">
                <div>
                    <h4><a href="blog-details.html">Quidem autem et impedit</a></h4>
                    <time datetime="2020-01-01">Jan 1, 2020</time>
                </div>
            </div><!-- End recent post item-->

            <div class="post-item">
                <img src="{{ asset('themes/zenblog/img/blog/blog-recent-3.jpg') }}" alt=""
                    class="flex-shrink-0">
                <div>
                    <h4><a href="blog-details.html">Id quia et et ut maxime similique occaecati ut</a>
                    </h4>
                    <time datetime="2020-01-01">Jan 1, 2020</time>
                </div>
            </div><!-- End recent post item-->

            <div class="post-item">
                <img src="{{ asset('themes/zenblog/img/blog/blog-recent-4.jpg') }}" alt=""
                    class="flex-shrink-0">
                <div>
                    <h4><a href="blog-details.html">Laborum corporis quo dara net para</a></h4>
                    <time datetime="2020-01-01">Jan 1, 2020</time>
                </div>
            </div><!-- End recent post item-->

            <div class="post-item">
                <img src="{{ asset('themes/zenblog/img/blog/blog-recent-5.jpg') }}" alt=""
                    class="flex-shrink-0">
                <div>
                    <h4><a href="blog-details.html">Et dolores corrupti quae illo quod dolor</a></h4>
                    <time datetime="2020-01-01">Jan 1, 2020</time>
                </div>
            </div><!-- End recent post item-->

        </div><!--/Recent Posts Widget -->

        <!-- Tags Widget -->
        <div class="tags-widget widget-item">

            <h3 class="widget-title">Kategori Artikel</h3>
            <ul>
                @foreach ($categoriesAll as $item)
                    <li><a href="#">{{ $item->name }}</a></li>
                @endforeach

            </ul>

        </div><!--/Tags Widget -->

    </div>

</div>
