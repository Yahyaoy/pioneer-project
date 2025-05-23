<div class="col-md-6 col-lg-3">
    <div class="user-card h-100">
        <div class="user-card-inner">
            <div class="user-avatar-wrapper">
                <div class="user-avatar" style="background-image: url('https://img.freepik.com/premium-vector/user-profile-icon-flat-style-member-avatar-vector-illustration-isolated-background-human-permission-sign-business-concept_157943-15752.jpg?semt=ais_hybrid&w=740')">
                    <div class="user-status active"></div>
                </div>
            </div>
            <div class="user-info">
                <h5 class="user-name">{{ $user->name }}</h5>
                <p class="user-role">{{ $user->email }}</p>
                <div class="user-stats">
                    <div class="stat">
                        <i class="fas fa-seedling"></i>
                        <span>
                            0
                            {{-- {{ $user->organization->initiatives->count() ?? 0 }} Initiatives</span> --}}
                    </div>
                    <div class="stat">
                        <i class="fas fa-users"></i>
                        <span>234 Followers</span>
                    </div>
                </div>
                <button class="btn btn-view" onclick="viewUserInitiatives()">
                    <i class="fas fa-project-diagram me-2"></i><a style="color: white" href="{{ route('user.initiative',$user->id) }}">View Initiatives</a>
                </button>
            </div>
        </div>
    </div>
</div>
