<section id="users" >
    <h2 class="section-title" data-aos="fade-up">Our Users</h2>

    <div class="row" style="margin: 50px" id="usersContainer" data-aos="fade-up" data-aos-delay="200">
        {{-- @foreach($users as $index => $user) --}}
        <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="">
            <div class="user-card">
                <div class="user-avatar" style="background-image: url('https://img.freepik.com/premium-vector/user-profile-icon-flat-style-member-avatar-vector-illustration-isolated-background-human-permission-sign-business-concept_157943-15752.jpg?semt=ais_hybrid&w=740')"></div>
                <h5 class="user-name">name</h5>
                <button class="btn btn-view" onclick="viewUserInitiatives()">View Initiatives</button>
            </div>
        </div>

        <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="">
            <div class="user-card">
                <div class="user-avatar" style="background-image: url('https://img.freepik.com/premium-vector/user-profile-icon-flat-style-member-avatar-vector-illustration-isolated-background-human-permission-sign-business-concept_157943-15752.jpg?semt=ais_hybrid&w=740')"></div>
                <h5 class="user-name">name</h5>
                <button class="btn btn-view" onclick="viewUserInitiatives()">View Initiatives</button>
            </div>
        </div>
        <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="">
            <div class="user-card">
                <div class="user-avatar" style="background-image: url('https://img.freepik.com/premium-vector/user-profile-icon-flat-style-member-avatar-vector-illustration-isolated-background-human-permission-sign-business-concept_157943-15752.jpg?semt=ais_hybrid&w=740')"></div>
                <h5 class="user-name">name</h5>
                <button class="btn btn-view" onclick="viewUserInitiatives()">View Initiatives</button>
            </div>
        </div>
        <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="">
            <div class="user-card">
                <div class="user-avatar" style="background-image: url('https://img.freepik.com/premium-vector/user-profile-icon-flat-style-member-avatar-vector-illustration-isolated-background-human-permission-sign-business-concept_157943-15752.jpg?semt=ais_hybrid&w=740')"></div>
                <h5 class="user-name">name</h5>
                <button class="btn btn-view" onclick="viewUserInitiatives()">View Initiatives</button>
            </div>
        </div>
        {{-- @endforeach --}}
    </div>
</section>
