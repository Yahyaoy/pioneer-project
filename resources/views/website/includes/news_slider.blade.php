<div class="carousel-item active">
    <div class="news-card">
        <div class="row g-0">
            <div class="col-md-6">
                <div class="news-image">
                    <img src="https://www.thrivecyn.ca/wp-content/uploads/2024/11/Education-Initiatives.png"
                         alt="News 1" class="img-fluid">
                    <div class="news-category">Initiative</div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="news-content">
                    <span class="news-date"><i class="far fa-calendar-alt"></i>{{ $news->created_at->diffForHumans() }}</span>
                    <h3>{{ $news->title }}</h3>
                    <p class="news-excerpt">{{ $news->details }}.</p>
                    <div class="news-stats">
                        <span><i class="fas fa-user-friends"></i> 150 Participants</span>
                        <span><i class="fas fa-map-marker-alt"></i> {{ $news->organization->city }}</span>
                    </div>
                    <button class="btn btn-read-more"><a href="{{ route('details.news',$news->id) }}" style="color: white">Read More </a><i class="fas fa-arrow-right"></i></button>
                </div>
            </div>
        </div>
    </div>
</div>
