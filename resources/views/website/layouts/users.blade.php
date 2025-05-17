<section id="users" class="py-5">
    <div class="container">
        <h2 class="section-title text-center mb-5" data-aos="fade-up">Our Community Members</h2>

        <div class="row g-4" id="usersContainer" data-aos="fade-up" data-aos-delay="200">
            {{-- @foreach($users as $index => $user) --}}
            <div class="col-md-6 col-lg-3">
                <div class="user-card h-100">
                    <div class="user-card-inner">
                        <div class="user-avatar-wrapper">
                            <div class="user-avatar" style="background-image: url('https://img.freepik.com/premium-vector/user-profile-icon-flat-style-member-avatar-vector-illustration-isolated-background-human-permission-sign-business-concept_157943-15752.jpg?semt=ais_hybrid&w=740')">
                                <div class="user-status active"></div>
                            </div>
                        </div>
                        <div class="user-info">
                            <h5 class="user-name">John Doe</h5>
                            <p class="user-role">Environmental Activist</p>
                            <div class="user-stats">
                                <div class="stat">
                                    <i class="fas fa-seedling"></i>
                                    <span>12 Initiatives</span>
                                </div>
                                <div class="stat">
                                    <i class="fas fa-users"></i>
                                    <span>234 Followers</span>
                                </div>
                            </div>
                            <button class="btn btn-view" onclick="viewUserInitiatives()">
                                <i class="fas fa-project-diagram me-2"></i>View Initiatives
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Repeat for other users -->
        </div>
    </div>

    <style>
        .user-card {
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0,0,0,0.08);
            transition: all 0.3s ease;
            position: relative;
        }

        .user-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.1);
        }

        .user-card-inner {
            padding: 20px;
            text-align: center;
        }

        .user-avatar-wrapper {
            position: relative;
            width: 120px;
            height: 120px;
            margin: 0 auto 15px;
        }

        .user-avatar {
            width: 100%;
            height: 100%;
            border-radius: 50%;
            background-size: cover;
            background-position: center;
            border: 4px solid #13639E;
            position: relative;
        }

        .user-status {
            width: 15px;
            height: 15px;
            border-radius: 50%;
            background: #4CAF50;
            position: absolute;
            bottom: 5px;
            right: 5px;
            border: 2px solid white;
        }

        .user-name {
            color: #2c3e50;
            margin-bottom: 5px;
            font-weight: 600;
        }

        .user-role {
            color: #7f8c8d;
            font-size: 0.9rem;
            margin-bottom: 15px;
        }

        .user-stats {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-bottom: 20px;
        }

        .stat {
            display: flex;
            flex-direction: column;
            align-items: center;
            color: #34495e;
        }

        .stat i {
            color: #13639E;
            margin-bottom: 5px;
            font-size: 1.2rem;
        }

        .stat span {
            font-size: 0.8rem;
            color: #7f8c8d;
        }

        .btn-view {
            background-color: #13639E;
            color: white;
            border-radius: 25px;
            padding: 8px 20px;
            transition: all 0.3s ease;
            width: 100%;
            border: none;
        }

        .btn-view:hover {
            background-color: #0d4d7a;
            color: white;
            transform: scale(1.05);
        }

        #users {
            background-color: #f8f9fa;
        }

        .section-title {
            position: relative;
            padding-bottom: 15px;
            margin-bottom: 30px;
            color: #2c3e50;
        }

        .section-title:after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 60px;
            height: 3px;
            background-color: #13639E;
        }
    </style>
</section>
