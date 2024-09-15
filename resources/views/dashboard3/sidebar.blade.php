<nav id="sidebar">
               <div class="sidebar_blog_1">
                  <div class="sidebar-header">
                     <div class="logo_section">
                        <a href="{{url('profile/edit#/'.Session::get('id'))}}"><img class="logo_icon img-responsive" src="{{url('uploads/'.Session::get('foto'))}}" alt="#" /></a>
                     </div>
                  </div>
                  <div class="sidebar_user_info">
                     <div class="icon_setting"></div>
                     <div class="user_profle_side">
                        <div class="user_img"><a href="{{url('profile')}}"><img class="img-responsive" src="{{url('uploads/'.Session::get('foto'))}}" alt="#" /></a></div>
                        <div class="user_info">
                           <h6>{{ Session::get('name')}}</h6>
                           <p><span class="online_animation"></span> Online</p>
                        </div>
                     </div>
                  </div>
               </div>


               <div class="sidebar_blog_2">
                  <h4><a href="{{url('dashboard')}}">Dashboard</a></h4>
                  <ul class="list-unstyled components">
                @php($icons=["fa-cubes","fa-clone","fa-map","fa-address-book","fa-address-card","fa-adjust","fa-bar-chart-o","fa-apple","fa-archive","fa-asterisk","fa-at","fa-audio-description","fa-barcode","fa-bell","fa-bicycle","fa-bitbucket","fa-bluetooth","fa-at","fa-atlas","fa-atlassian","fa-atom","fa-audible","fa-binoculars"])
                @php($colors=["yellow_color","orange_color","purple_color","green_color","red_color","blue2_color","yellow_color","orange_color","purple_color","green_color","red_color","blue2_color","yellow_color","orange_color","purple_color","green_color","red_color","blue2_color","yellow_color","orange_color","purple_color","green_color","red_color","blue2_color","yellow_color","orange_color","purple_color","green_color","red_color","blue2_color"])
                @foreach($menu as $post)
                    @if($post->status=="menu")
                        @php($jumlah=0)
                        @foreach($menu as $post2)
                            @if($post2->anggota==$post->id)
                                @php($jumlah+=1)
                            @endif
                        @endforeach
                        @if($jumlah>0)
                        <li class="active">
                        <a href="#{{$post->menu}}" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa {{$icons[$posisi]}} {{$colors[$posisi]}}"></i> <span>{{$post->menu}}</span></a>
                        @if($active[0]==$post->menu)
                        <ul class="collapse list-unstyled show" id="{{$post->menu}}">
                        @else
                        <ul class="collapse list-unstyled" id="{{$post->menu}}">
                        @endif
                           <li>
                            @foreach($menu as $post1)
                                @if($post1->anggota==$post->id)
                                @if($active[1]==$post1->menu && $active[0]==$post->menu)
                                <a style="background-color: #ff9800;color:#ffffff;" href="{{url($post1->link)}}"><span>> {{$post1->menu}}</span></a>
                                @else
                                <a href="{{url($post1->link)}}"><span>> {{$post1->menu}}</span></a>
                                @endif
                                @endif
                            @endforeach
                           </li>
                        </ul>
                     </li>
                       @else
                       @if($active[0]==$post->menu)
                        <li><a style="background-color: #ff9800;color:#ffffff;" href="{{url($post->link)}}"><i class="fa {{$icons[$posisi]}} {{$icons[$posisi]}}"></i> <span>{{$post->menu}}</span></a></li>
                       @else
                       <li><a href="{{url($post->link)}}"><i class="fa {{$icons[$posisi]}} {{$colors[$posisi]}}"></i> <span>{{$post->menu}}</span></a></li>
                       @endif 
                        @endif
                     <!-- <li>
                        <a href="#element" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-cubes purple_color"></i> <span>Elements</span></a>
                        <ul class="collapse list-unstyled" id="element">
                           <li><a href="general_elements.html">> <span>General Elements</span></a></li>
                           <li><a href="media_gallery.html">> <span>Media Gallery</span></a></li>
                           <li><a href="icons.html">> <span>Icons</span></a></li>
                           <li><a href="invoice.html">> <span>Invoice</span></a></li>
                        </ul>
                     </li>
                     <li><a href="tables.html"><i class="fa fa-table purple_color2"></i> <span>Tables</span></a></li>
                     <li>
                        <a href="#apps" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-object-group blue2_color"></i> <span>Apps</span></a>
                        <ul class="collapse list-unstyled" id="apps">
                           <li><a href="email.html">> <span>Email</span></a></li>
                           <li><a href="calendar.html">> <span>Calendar</span></a></li>
                           <li><a href="media_gallery.html">> <span>Media Gallery</span></a></li>
                        </ul>
                     </li>
                     <li><a href="price.html"><i class="fa fa-briefcase blue1_color"></i> <span>Pricing Tables</span></a></li>
                     <li>
                        <a href="contact.html">
                        <i class="fa fa-paper-plane red_color"></i> <span>Contact</span></a>
                     </li>
                     <li class="active">
                        <a href="#additional_page" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-clone yellow_color"></i> <span>Additional Pages</span></a>
                        <ul class="collapse list-unstyled" id="additional_page">
                           <li>
                              <a href="profile.html">> <span>Profile</span></a>
                           </li>
                           <li>
                              <a href="project.html">> <span>Projects</span></a>
                           </li>
                           <li>
                              <a href="login.html">> <span>Login</span></a>
                           </li>
                           <li>
                              <a href="404_error.html">> <span>404 Error</span></a>
                           </li>
                        </ul>
                     </li>
                     <li><a href="map.html"><i class="fa fa-map purple_color2"></i> <span>Map</span></a></li>
                     <li><a href="charts.html"><i class="fa fa-bar-chart-o green_color"></i> <span>Charts</span></a></li>
                     <li><a href="settings.html"><i class="fa fa-cog yellow_color"></i> <span>Settings</span></a></li> -->
                     @php($posisi++)
                    @endif
                @endforeach 
                  </ul>
               </div>
            </nav>
            