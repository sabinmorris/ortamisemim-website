<div class="recent-posts-widget widget-item">

    <h3 class="widget-title"><i class="bi bi-bell"></i> Matangazo</h3>
    @if(count([$anouncementInfos]) > 0)
    @foreach($anouncementInfos as $anouncementInfo)
    @if($anouncementInfo->status == 1)
    <div class="post-item">
        <!-- <img src="assets/img/blog/blog-recent-1.jpg" alt="" class="flex-shrink-0"> -->
        <!-- <div class="bi bi-check-circle"></div>
        &nbsp; -->
        <div>
            <h4><a href="{{ asset('storage/uploads/anouncement_docs/'.$anouncementInfo->file_name)}}"><span><img src="{{asset('/storage/uploads/anouncement_docs/new!.gif')}}" style="width:60px;height:30px; border-radius:50%;" ></span>{{$anouncementInfo->tittle}}</a></h4>
            <time datetime="2020-01-01">{{$anouncementInfo->created_at->diffForHumans()}}</time>
        </div>
    </div><!-- End recent post item-->
    @endif
    @endforeach
    @endif


</div>