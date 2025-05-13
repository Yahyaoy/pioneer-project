<section id="initiatives">
    <div class="container">
        <h2 class="section-title" data-aos="fade-up">Our Initiatives</h2>

        <!-- Search Bar -->
        <div class="search-container" data-aos="fade-up" data-aos-delay="100">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <input type="text" id="searchInput" class="form-control" placeholder="Search initiatives...">
                </div>
            </div>
        </div>

        <div class="row" id="initiativesContainer" style="padding: 20px;">
            <!-- Initiative Cards -->
            <div class="col-md-6 col-lg-3 mb-4" data-aos="fade-up" data-aos-delay="100" style="padding: 10px;">
                <div class="initiative-card" style="padding: 20px; margin-bottom: 20px; border-radius: 8px; overflow: hidden; box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1); background-color: #fff;">
                    <div class="initiative-image" style="height: 200px; background-image: url('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQjXCe8-GSEA2tguLT435xF1CSW9K25iggXid09mQff56K2vUO2FUfTpdA_J42cwPgaUDo&usqp=CAU'); background-size: cover; background-position: center; border-radius: 8px;"></div>
                    <div class="initiative-content" style="padding: 20px;">
                        <h5 class="initiative-title" style="font-weight: 600; margin-bottom: 10px; color: #34495e;">Clean Ocean Initiative</h5>
                        <p class="initiative-description" style="color: #666; margin-bottom: 15px; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; height: 40px;">Working to remove plastic from oceans and promoting sustainable practices.</p>
                        <button class="btn btn-join" onclick="joinInitiative(1)" style="background-color: #13639E; color: white; border: none; padding: 10px 20px; border-radius: 5px;">Join</button>
                    </div>
                </div>
            </div>

            <!-- Repeat for other initiatives -->
            <div class="col-md-6 col-lg-3 mb-4" data-aos="fade-up" data-aos-delay="150" style="padding: 10px;">
                <div class="initiative-card" style="padding: 20px; margin-bottom: 20px; border-radius: 8px; overflow: hidden; box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1); background-color: #fff;">
                    <div class="initiative-image" style="height: 200px; background-image: url('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQjXCe8-GSEA2tguLT435xF1CSW9K25iggXid09mQff56K2vUO2FUfTpdA_J42cwPgaUDo&usqp=CAU'); background-size: cover; background-position: center; border-radius: 8px;"></div>
                    <div class="initiative-content" style="padding: 20px;">
                        <h5 class="initiative-title" style="font-weight: 600; margin-bottom: 10px; color: #34495e;">Education for All</h5>
                        <p class="initiative-description" style="color: #666; margin-bottom: 15px; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; height: 40px;">Providing educational resources to children in underserved communities.</p>
                        <button class="btn btn-join" onclick="joinInitiative(2)" style="background-color: #13639E; color: white; border: none; padding: 10px 20px; border-radius: 5px;">Join</button>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-3 mb-4" data-aos="fade-up" data-aos-delay="200" style="padding: 10px;">
                <div class="initiative-card" style="padding: 20px; margin-bottom: 20px; border-radius: 8px; overflow: hidden; box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1); background-color: #fff;">
                    <div class="initiative-image" style="height: 200px; background-image: url('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQjXCe8-GSEA2tguLT435xF1CSW9K25iggXid09mQff56K2vUO2FUfTpdA_J42cwPgaUDo&usqp=CAU'); background-size: cover; background-position: center; border-radius: 8px;"></div>
                    <div class="initiative-content" style="padding: 20px;">
                        <h5 class="initiative-title" style="font-weight: 600; margin-bottom: 10px; color: #34495e;">Tech for Seniors</h5>
                        <p class="initiative-description" style="color: #666; margin-bottom: 15px; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; height: 40px;">Teaching digital literacy skills to senior citizens to keep them connected.</p>
                        <button class="btn btn-join" onclick="joinInitiative(3)" style="background-color: #13639E; color: white; border: none; padding: 10px 20px; border-radius: 5px;">Join</button>
                    </div>
                </div>
            </div>

            <!-- Repeat for the rest of initiatives using IDs 4 to 8 -->
            <!-- Example for ID 4: Urban Gardens -->
            <div class="col-md-6 col-lg-3 mb-4" data-aos="fade-up" data-aos-delay="250" style="padding: 10px;">
                <div class="initiative-card" style="padding: 20px; margin-bottom: 20px; border-radius: 8px; overflow: hidden; box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1); background-color: #fff;">
                    <div class="initiative-image" style="height: 200px; background-image: url('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQjXCe8-GSEA2tguLT435xF1CSW9K25iggXid09mQff56K2vUO2FUfTpdA_J42cwPgaUDo&usqp=CAU'); background-size: cover; background-position: center; border-radius: 8px;"></div>
                    <div class="initiative-content" style="padding: 20px;">
                        <h5 class="initiative-title" style="font-weight: 600; margin-bottom: 10px; color: #34495e;">Urban Gardens</h5>
                        <p class="initiative-description" style="color: #666; margin-bottom: 15px; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; height: 40px;">Creating community gardens in urban spaces to promote sustainable food systems.</p>
                        <button class="btn btn-join" onclick="joinInitiative(4)" style="background-color: #13639E; color: white; border: none; padding: 10px 20px; border-radius: 5px;">Join</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
