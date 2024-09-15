<div class="topbar">
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="full">
        <button type="button" id="sidebarCollapse" class="sidebar_toggle"><i class="fa fa-bars"></i></button>
        <div class="logo_section">
            <!-- <a href="index.html"><img class="img-responsive" src="dashboard3/images/logo/logo_black.png" alt="#" /></a> -->
            @foreach($aplikasi as $row)
                @if($row->logo!=NUll)
                <img class="img-responsive" src="{{url('uploads').'/'.$row->logo}}">
                @endif
                @if($row->logo==NUll)
                <div style="padding: 15px;font-weight:bold;font-size:large;">{{$row->nama}}</div>
                @endif
            @endforeach
            
            
            
        </div>
        
        <div class="right_topbar " style="margin-right:30px;">
            <div class="icon_info">
                <ul>
                    <!-- <li><a href="#"><i class="fa fa-bullhorn"></i><span class="badge">2</span></a></li>
                    <li><a href="#"><i class="fa fa-question-circle"></i></a></li> -->
                    <li><a href="#"><i class="fa fa-envelope"></i><span class="badge">3</span></a></li>
                    <li><a href="{{route('logout')}}"><i class="fa fa-power-off"></i></a></li>
                    <!-- <li>
                    <a class="dropdown-toggle" data-toggle="dropdown"><img class="img-responsive rounded-circle" src="dashboard3/images/layout_img/user_img.jpg" alt="#" /><span class="name_user">John David</span></a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="profile.html">My Profile</a>
                        <a class="dropdown-item" href="settings.html">Settings</a>
                        <a class="dropdown-item" href="help.html">Help</a>
                        <a class="dropdown-item" href="#"><span>Log Out</span> <i class="fa fa-power-off"></i></a>
                    </div>
                    </li> -->
                </ul>
                <!-- <ul class="user_profile_dd">
                    <li>
                    <a class="dropdown-toggle" data-toggle="dropdown"><img class="img-responsive rounded-circle" src="dashboard3/images/layout_img/user_img.jpg" alt="#" /><span class="name_user">John David</span></a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="profile.html">My Profile</a>
                        <a class="dropdown-item" href="settings.html">Settings</a>
                        <a class="dropdown-item" href="help.html">Help</a>
                        <a class="dropdown-item" href="#"><span>Log Out</span> <i class="fa fa-power-off"></i></a>
                    </div>
                    </li>
                </ul> -->
            </div>
        </div>
        </div>
    </nav>
</div>