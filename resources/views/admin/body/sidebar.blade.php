@php
    $id = Auth::user()->id;
    $userid = App\Models\User::find($id);
    $status = $userid->status;


@endphp

<div class="left-side-menu">

                <div class="h-100" data-simplebar>

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">

                        <ul id="side-menu">

                            <li class="menu-title">Navigation</li>
                
                            <li>
                                <a href="{{ route('admin.dashboard') }}">
                                <i class="mdi mdi-view-dashboard-outline"></i>
                                    <span> Dashboard </span>
                                </a>
                            </li>

                            @if($status == 'active')

                            <li class="menu-title mt-2">Menu</li>

                            <!--
                            <li>
                            <a href="#sidebarCrm1" data-bs-toggle="collapse">
                                    <i class="mdi mdi-forum-outline"></i>
                                    <span> Category </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <div class="collapse" id="sidebarCrm1">
                                    <ul class="nav-second-level">
                                        <li>
                                            <a href="{{ route ('all.category') }}">All Category</a>
                                        </li>
                                        <li>
                                            <a href="{{ route ('add.category') }}">Add Category</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>

                            <li>
                            <a href="#sidebarCrm2" data-bs-toggle="collapse">
                                    <i class="mdi mdi-forum-outline"></i>
                                    <span> Subcategory </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <div class="collapse" id="sidebarCrm2">
                                    <ul class="nav-second-level">
                                        <li>
                                            <a href="{{ route ('all.subcategory') }}">All Subcategory</a>
                                        </li>
                                        <li>
                                            <a href="{{ route ('add.subcategory') }}">Add Subcategory</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            -->

                            
                            <li>
                                <a href="{{ route ('all.news.post') }}">
                                <i class="mdi mdi-text-box-multiple-outline"></i>
                                    <span> Berita </span>
                                </a>
                            </li>

                            <li>
                                    <a href="{{ route('contact.message') }}">
                                    <i class="mdi mdi-email-multiple-outline"></i>
                                        <span> Form Konsultasi </span>
                                    </a>
                            </li>

                              

                            <li class="menu-title mt-2">Edit</li>
                        
                            <li>
                                <a href="{{ route('all.homepageimg') }}">
                                <i class="mdi mdi-home-edit-outline"></i>
                                    <span> Beranda </span>
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('all.infographics') }}">
                                <i class="mdi mdi-information-outline"></i>
                                    <span> Infografis </span>
                                </a>
                            </li>
                            
                            <li>
                                <a href="#sidebarTeam" data-bs-toggle="collapse">
                                    <i class="mdi mdi-account-group-outline"></i>
                                    <span> Tim PKBH </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <div class="collapse" id="sidebarTeam">
                                    <ul class="nav-second-level">
                                        <li>
                                            <a href="{{ route('all.aboutus') }}">Tentang Tim</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('all.team.member') }}">Anggota Tim</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            
                            <li>
                                <a href="#">
                                <i class="mdi mdi-handshake-outline"></i>
                                    <span> Klien </span>
                                </a>
                            </li>

                            <li>
                                <a href="#">
                                <i class="mdi mdi-page-layout-footer"></i>
                                    <span> Footer </span>
                                </a>
                            </li>
                            

                           <li class="menu-title mt-2">Settings</li>

                           <li>
                                <a href="{{ route('all.admin') }}">
                                <i class="mdi mdi-account-circle-outline"></i>
                                    <span> Admin User </span>
                                </a>
                            </li> 
                           

                            <li>
                                <a href="{{ route('seo.setting') }}">
                                <i class="mdi mdi-search-web"></i>
                                    <span> SEO </span>
                                </a>
                            </li>


                            
                        @else

                        @endif
                        
                        </ul>

                    </div>
                    <!-- End Sidebar -->

                    <div class="clearfix"></div>

                </div>
                <!-- Sidebar -left -->

            </div>