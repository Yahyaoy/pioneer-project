<section id="initiatives" class="py-5">
    <div class="container">
        <h2 class="section-title text-center mb-5" data-aos="fade-up">Our Initiatives</h2>

        <!-- Search and Filter Bar -->
        <div class="search-filter-container mb-4" data-aos="fade-up" data-aos-delay="100">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="search-box">
                        <i class="fas fa-search search-icon"></i>
                        <input type="text" id="searchInput" class="form-control" placeholder="Search initiatives...">
                    </div>
                </div>
                <div class="col-md-3">
                    <select class="form-select category-select">
                        <option value="">All Categories</option>
                        <option value="environment">Environment</option>
                        <option value="education">Education</option>
                        <option value="technology">Technology</option>
                        <option value="community">Community</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="row g-4" id="initiativesContainer">
            <!-- Initiative Card -->
            <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="100">
                <div class="initiative-card">
                    <div class="initiative-image">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQjXCe8-GSEA2tguLT435xF1CSW9K25iggXid09mQff56K2vUO2FUfTpdA_J42cwPgaUDo&usqp=CAU" alt="Initiative">
                        <div class="initiative-category">Environment</div>
                    </div>
                    <div class="initiative-content">
                        <div class="initiative-stats">
                            <span><i class="fas fa-users"></i> 150 Members</span>
                            <span><i class="fas fa-calendar"></i> 3 Months</span>
                        </div>
                        <h5 class="initiative-title">Clean Ocean Initiative</h5>
                        <p class="initiative-description">Working to remove plastic from oceans and promoting sustainable practices.</p>
                        <div class="initiative-progress">
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" style="width: 75%"></div>
                            </div>
                            <span class="progress-text">75% Complete</span>
                        </div>
                        <a href="{{route('details.initiative')}}" class="btn btn-join">
                            <span>Learn More</span>
                            <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Repeat for other initiatives with the same structure -->
        </div>
    </div>

    <style>
        .search-filter-container {
            background: white;
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
        }

        .search-box {
            position: relative;
        }

        .search-icon {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #13639E;
        }

        #searchInput {
            padding-left: 45px;
            border-radius: 30px;
            border: 1px solid #e0e0e0;
            height: 50px;
        }

        .category-select {
            height: 50px;
            border-radius: 30px;
            border: 1px solid #e0e0e0;
            padding-left: 20px;
        }

        .initiative-card {
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0,0,0,0.08);
            transition: all 0.3s ease;
            height: 100%;
        }

        .initiative-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.1);
        }

        .initiative-image {
            position: relative;
            height: 200px;
            overflow: hidden;
        }

        .initiative-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .initiative-card:hover .initiative-image img {
            transform: scale(1.1);
        }

        .initiative-category {
            position: absolute;
            top: 15px;
            right: 15px;
            background: rgba(19, 99, 158, 0.9);
            color: white;
            padding: 5px 15px;
            border-radius: 20px;
            font-size: 0.8rem;
        }

        .initiative-content {
            padding: 20px;
        }

        .initiative-stats {
            display: flex;
            justify-content: space-between;
            margin-bottom: 15px;
            font-size: 0.9rem;
            color: #666;
        }

        .initiative-stats i {
            color: #13639E;
            margin-right: 5px;
        }

        .initiative-title {
            color: #2c3e50;
            margin-bottom: 10px;
            font-weight: 600;
        }

        .initiative-description {
            color: #666;
            margin-bottom: 15px;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
            height: 40px;
            font-size: 0.9rem;
        }

        .initiative-progress {
            margin-bottom: 20px;
        }

        .progress {
            height: 8px;
            background-color: #e9ecef;
            border-radius: 4px;
            margin-bottom: 5px;
        }

        .progress-bar {
            background-color: #13639E;
            border-radius: 4px;
        }

        .progress-text {
            font-size: 0.8rem;
            color: #666;
        }

        .btn-join {
            width: 100%;
            background-color: #13639E;
            color: white;
            border: none;
            padding: 12px 20px;
            border-radius: 30px;
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 10px;
            transition: all 0.3s ease;
            text-decoration: none;
        }

        .btn-join:hover {
            background-color: #0d4d7a;
            color: white;
            transform: scale(1.02);
        }

        .btn-join i {
            transition: transform 0.3s ease;
        }

        .btn-join:hover i {
            transform: translateX(5px);
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
