<div class="sidebar" data-background-color="dark">
        <div class="sidebar-logo">
          <!-- Logo Header -->
          <div class="logo-header" data-background-color="dark">
            <a href="index.html" class="logo">
              <img
                src="dashboard2/assets/img/kaiadmin/logo_light.svg"
                alt="navbar brand"
                class="navbar-brand"
                height="20"
              />
            </a>
            <div class="nav-toggle">
              <button class="btn btn-toggle toggle-sidebar">
                <i class="gg-menu-right"></i>
              </button>
              <button class="btn btn-toggle sidenav-toggler">
                <i class="gg-menu-left"></i>
              </button>
            </div>
            <button class="topbar-toggler more">
              <i class="gg-more-vertical-alt"></i>
            </button>
          </div>
          <!-- End Logo Header -->
        </div>
        <div class="sidebar-wrapper scrollbar scrollbar-inner">
          <div class="sidebar-content">
            <ul class="nav nav-secondary">
              <li class="nav-item active">
                <a
                 
                  href="{{url('dashboard')}}"
                 
                >
                  <i class="fas fa-home"></i>
                  <p>Dashboard</p>
                  
                </a>
              <li class="nav-section">
                <span class="sidebar-mini-icon">
                  <i class="fa fa-ellipsis-h"></i>
                </span>
                <h4 class="text-section">Components</h4>
              </li>
              @php($icons=["fa-layer-group","fa-address-book","fa-address-card","fa-adn","fab fa-algolia","fa-layer-group","fas fa-address-book","fa-address-card","fa-adn","fab fa-algolia","fa-layer-group","fas fa-address-book","fa-address-card","fa-adn","fab fa-algolia","fa-layer-group","fas fa-address-book","fa-address-card","fa-adn","fab fa-algolia","fa-layer-group","fa-address-book","fa-address-card","fa-adn","fab fa-algolia","fa-layer-group","fas fa-address-book","fa-address-card","fa-adn","fab fa-algolia","fa-layer-group","fas fa-address-book","fa-address-card","fa-adn","fab fa-algolia","fa-layer-group","fas fa-address-book","fa-address-card","fa-adn","fab fa-algolia"])
              @foreach($menu as $post)
                @if($post->status=="menu")
                    @php($jumlah=0)
                    @foreach($menu as $post2)
                        @if($post2->anggota==$post->id)
                            @php($jumlah+=1)
                        @endif
                    @endforeach
                    @if($jumlah>0)
                      @if($active[0]==$post->menu)
                      <li class="nav-item active">
                      @else
                      <li class="nav-item">
                      @endif  

                        <a data-bs-toggle="collapse" href="#{{$post->menu}}">
                          <i class="fas {{$icons[$posisi]}}"></i>
                          <p>{{$post->menu}}</p>
                          <span class="caret"></span>
                        </a>
                        @if($active[0]==$post->menu)
                        <div class="collapse show" id="{{$post->menu}}">
                        @else
                        <div class="collapse" id="{{$post->menu}}">
                        @endif
                          <ul class="nav nav-collapse">
                          @foreach($menu as $post1)
                            @if($post1->anggota==$post->id)
                            @if($active[1]==$post1->menu && $active[0]==$post->menu)
                            <li class="active">
                            @else
                            <li>
                            @endif  
                              <a href="{{url($post1->link)}}">
                                <span class="sub-item">{{$post1->menu}}</span>
                              </a>
                            </li>
                            <!-- <a class="collapse-item" href="{{url($post1->link)}}">{{$post1->menu}}</a> -->
                            @endif
                          @endforeach  
                          </ul>
                        </div>
                      </li>
                    @else
                    @if($active[0]==$post->menu)
                      <li class="nav-item active">
                    @else
                      <li class="nav-item">
                    @endif    
                        <a href="{{url($post->link)}}">
                          <i class="fas fa-table"></i>
                          <p>{{$post->menu}}</p>
                        </a>
                      </li>
                    @endif
                  @endif
                  @php($posisi++)
              @endforeach
    
            </ul>
          </div>
        </div>
      </div>