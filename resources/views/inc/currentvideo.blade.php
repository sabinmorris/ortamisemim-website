<div class="recent-posts-widget widget-item">


    <a href="{{Route('video_Lebo')}}">
        <h3 class="widget-title">Habari za Video</h3>
    </a>

    @if(count([$videoInfos1]) > 0)
    @foreach($videoInfos1 as $videoInfo)
    @if($videoInfo->status == 1)
    <div class="post-list">
        <div class="post-item">
            <iframe class="col-lg-12 flex-shrink-0" src="{{$videoInfo->link}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
        <div class="post-item">
            <div>
                <h4><a href="single-post.html#">{{$videoInfo->tittle}}</a></h4>
                <time datetime="2020-01-01">{{$videoInfo->created_at->diffForHumans()}}</time>
            </div>
        </div>
    </div>
    @endif
    @endforeach
    @endif


</div>