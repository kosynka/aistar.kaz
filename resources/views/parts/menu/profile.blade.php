@if($user)
    <div class="profile clearfix">
        <div class="profile_pic">
            <img src="/images/img.jpg" alt="..." class="img-circle profile_img">
        </div>
        <div class="profile_info">
            <span>Добро пожаловать,</span>
            <h2>{{ ucfirst($user->name) }}</h2>
        </div>
    </div>
@endif
