<div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="100">
    <div class="initiative-card">
        <div class="initiative-image">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQjXCe8-GSEA2tguLT435xF1CSW9K25iggXid09mQff56K2vUO2FUfTpdA_J42cwPgaUDo&usqp=CAU" alt="Initiative">
            <div class="initiative-category">New</div>
        </div>
        <div class="initiative-content">
            <div class="initiative-stats">
                <span><i class="fas fa-users"></i> {{ $initiative->max_participants }}</span>
                <span><i class="fas fa-calendar"></i> {{ $initiative->hours }}</span>
            </div>
            <h5 class="initiative-title">{{ $initiative->name }}</h5>
            <p class="initiative-description">{{ $initiative->details }}.</p>
            <div class="initiative-progress">
                <div class="progress">
                    <div class="progress-bar" role="progressbar" style="width: {{ ($initiative->max_participants > 0) ? $initiative->participants->count() / $initiative->max_participants * 100 : 0 }}%"></div>
                </div>
                <span class="progress-text">{{ ($initiative->max_participants > 0) ? $initiative->participants->count() / $initiative->max_participants * 100 : 0 }} % Complete</span>
            </div>
            <a href="{{route('details.initiative',$initiative->id)}}" class="btn btn-join">
                <span>Learn More</span>
                <i class="fas fa-arrow-right"></i>
            </a>
        </div>
    </div>
</div>
