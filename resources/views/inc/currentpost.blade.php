

<div class="recent-posts-widget widget-item">
    <a href="{{Route('events')}}">
        <h3 class="widget-title">Habari Matukio</h3>
    </a>
    @if(count($postInfos) > 0)
    @foreach($postInfos as $postInfo)
    
    <div class="post-item">
        <img src="{{ asset('storage/uploads/post_images/' .$postInfo->post_image)}}" alt="" class="flex-shrink-0">
        <div>
            <h4><a href="{{Route('read_more', $postInfo->id)}}">{{$postInfo->post_tittle}}</a></h4>
            <time datetime="2020-01-01">{{ $postInfo->created_at->diffForHumans() }}</time>
        </div>
        <div style="float: right;"><span style="float: right;"><i class="bi bi-eye"> views:</i> {{$postInfo->view_count}}</span></div>
        
    </div><!-- End recent post item-->
    
    
    @endforeach
    @endif
    
</div>
