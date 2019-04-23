<li class="dropdown dropdown-profile">
    <a href="login.html" data-toggle="dropdown"><img src="design/site/img/user/avatar-sm.jpg" alt=""> <span>{{auth()->user()->name}}</span></a>
    <div class="dropdown-menu dropdown-menu-right">
        <a class="dropdown-item active" href="#"><i class="fa fa-user"></i> Profile</a>
        <a class="dropdown-item" href="#"><i class="fa fa-envelope-open"></i> Inbox</a>
        <a class="dropdown-item" href="{{route('user.channels.create', auth()->user()->username)}}"><i class="fa fa-plus"></i> New Channel</a>
        <a class="dropdown-item" href="#"><i class="fa fa-cog"></i> Settings</a>
        <div class="dropdown-divider"></div>
        <form action="{{route('logout')}}" method="POST">
            @csrf
            <button type="submit" class="dropdown-item"><i class="fa fa-sign-out"></i> Logout</button>
        </form>
    </div>
</li>