<div class="blog-author-widget-2 widget-item">
    @if(count([$leaderInfos]) > 0)
    @foreach($leaderInfos as $leaderInfo)
    @if($leaderInfo->role == 'waziri')
    <div class="d-flex flex-column align-items-center">
        <img src="{{ asset('storage/uploads/leader_images/' .$leaderInfo->leader_image)}}" class="rounded-circle flex-shrink-0" alt="">
        <h4>{{$leaderInfo->name}}</h4>
        <div class="social-links">
            <a href="https://x.com/#"><i class="bi bi-twitter-x"></i></a>
            <a href="https://facebook.com/#"><i class="bi bi-facebook"></i></a>
            <a href="https://instagram.com/#"><i class="biu bi-instagram"></i></a>
            <a href="https://instagram.com/#"><i class="biu bi-linkedin"></i></a>
        </div>
    </div>
    @endif
    @endforeach
    @endif
</div>