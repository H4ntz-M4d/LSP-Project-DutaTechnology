<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{url('dashboard')}}">
    <div class="sidebar-brand-icon">
        <!-- <i class="fas fa-laugh-wink"></i> -->
         @foreach($aplikasi as $row)
        <img src="{{url('uploads').'/'.$row->logo}}" style="width:50px;height:50px;border-radius: 25px;">
        @endforeach
        
    </div>
    @foreach($aplikasi as $row)
    <div class="sidebar-brand-text mx-3"> {{$row->nama}}<sup></sup></div>
    @endforeach
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<li class="nav-item active">
<a class="nav-link" href="{{url('dashboard')}}">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>{{$judul}}</span></a>
</li>



<!-- Divider -->
<hr class="sidebar-divider">


<!-- Heading -->
<div class="sidebar-heading">
    Menu :
</div>

@foreach($menu as $post)
    @if($post->status=="menu")
        @php($jumlah=0)
        @foreach($menu as $post2)
            @if($post2->anggota==$post->id)
                @php($jumlah+=1)
            @endif
        @endforeach
        @if($jumlah>0)
        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse{{$post->menu}}" aria-expanded="true" aria-controls="collapsePages">
                <i class="fas fa-fw fa-folder"></i>
                <span>{{$post->menu}}</span>
            </a>
            
            <div id="collapse{{$post->menu}}" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    
                    <h6 class="collapse-header">Sub {{$post->menu}}:</h6>
                    @foreach($menu as $post1)
                        @if($post1->anggota==$post->id)
                            <a class="collapse-item" href="{{url($post1->link)}}">{{$post1->menu}}</a>
                        @endif
                    @endforeach
                    
                </div>
            </div>
            
        </li>    
        @else
        <!-- Nav Item - Charts -->
        <li class="nav-item">
            <a class="nav-link" href="{{url($post->link)}}">
                <i class="fas fa-fw fa-asterisk"></i>
                <span>{{$post->menu}}</span></a>
        </li>
        @endif    
    @endif
    
@endforeach


<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>
</ul>
<!-- End of Sidebar -->