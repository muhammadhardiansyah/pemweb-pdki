<div id="sidebar" class="active">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header position-relative">
            <div class="d-flex justify-content-between align-items-center">
                <div class="logo">
                    <a href="/admin">
                        <img src="{{ asset('/img/logo.png') }}" alt="Logo" srcset="">
                    </a>
                </div>
                <div class="theme-toggle d-flex gap-2  align-items-center mt-2">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                        aria-hidden="true" role="img" class="iconify iconify--system-uicons" width="20"
                        height="20" preserveAspectRatio="xMidYMid meet" viewBox="0 0 21 21">
                        <g fill="none" fill-rule="evenodd" stroke="currentColor" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path
                                d="M10.5 14.5c2.219 0 4-1.763 4-3.982a4.003 4.003 0 0 0-4-4.018c-2.219 0-4 1.781-4 4c0 2.219 1.781 4 4 4zM4.136 4.136L5.55 5.55m9.9 9.9l1.414 1.414M1.5 10.5h2m14 0h2M4.135 16.863L5.55 15.45m9.899-9.9l1.414-1.415M10.5 19.5v-2m0-14v-2"
                                opacity=".3"></path>
                            <g transform="translate(-210 -1)">
                                <path d="M220.5 2.5v2m6.5.5l-1.5 1.5"></path>
                                <circle cx="220.5" cy="11.5" r="4"></circle>
                                <path d="m214 5l1.5 1.5m5 14v-2m6.5-.5l-1.5-1.5M214 18l1.5-1.5m-4-5h2m14 0h2">
                                </path>
                            </g>
                        </g>
                    </svg>
                    <div class="form-check form-switch fs-6">
                        <input class="form-check-input  me-0" type="checkbox" id="toggle-dark">
                        <label class="form-check-label"></label>
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                        aria-hidden="true" role="img" class="iconify iconify--mdi" width="20" height="20"
                        preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24">
                        <path fill="currentColor"
                            d="m17.75 4.09l-2.53 1.94l.91 3.06l-2.63-1.81l-2.63 1.81l.91-3.06l-2.53-1.94L12.44 4l1.06-3l1.06 3l3.19.09m3.5 6.91l-1.64 1.25l.59 1.98l-1.7-1.17l-1.7 1.17l.59-1.98L15.75 11l2.06-.05L18.5 9l.69 1.95l2.06.05m-2.28 4.95c.83-.08 1.72 1.1 1.19 1.85c-.32.45-.66.87-1.08 1.27C15.17 23 8.84 23 4.94 19.07c-3.91-3.9-3.91-10.24 0-14.14c.4-.4.82-.76 1.27-1.08c.75-.53 1.93.36 1.85 1.19c-.27 2.86.69 5.83 2.89 8.02a9.96 9.96 0 0 0 8.02 2.89m-1.64 2.02a12.08 12.08 0 0 1-7.8-3.47c-2.17-2.19-3.33-5-3.49-7.82c-2.81 3.14-2.7 7.96.31 10.98c3.02 3.01 7.84 3.12 10.98.31Z">
                        </path>
                    </svg>
                </div>
                <div class="sidebar-toggler  x">
                    <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                </div>
            </div>
        </div>
        <div class="sidebar-menu">
            <ul class="menu">
                <li class="sidebar-title">Menu</li>

                <li class="sidebar-item {{ $active == 'dash' ? 'active' : '' }}">
                    <a href="/admin" class='sidebar-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                {{-- <li class="sidebar-item {{ $active == 'dash' ? 'active' : '' }}">
                    <a href="/dashboard" class='sidebar-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>Dashboard</span>
                    </a>
                </li> --}}
                
                {{-- <li class="sidebar-title">Postingan</li>

                <li class="sidebar-item {{ $active == 'dash_posts' ? 'active' : '' }}">
                    <a href="/dashboard/posts" class='sidebar-link'>
                        <i class="bi bi-file-earmark-fill"></i>
                        <span>Daftar Postingan</span>
                    </a>
                </li>

                <li class="sidebar-item {{ $active == 'add_posts' ? 'active' : '' }}">
                    <a href="/dashboard/posts/create" class='sidebar-link'>
                        <i class="bi bi-file-earmark-plus-fill"></i>
                        <span>Tambah Postingan</span>
                    </a>
                </li>
                
                <li class="sidebar-title">Featured Product</li>

                <li class="sidebar-item {{ $active == 'dash_products' ? 'active' : '' }}">
                    <a href="/dashboard/products" class='sidebar-link'>
                        <i class="bi bi-cart-fill"></i>
                        <span>Daftar Product</span>
                    </a>
                </li>

                <li class="sidebar-item {{ $active == 'add_products' ? 'active' : '' }}">
                    <a href="/dashboard/products/create" class='sidebar-link'>
                        <i class="bi bi-cart-plus-fill"></i>
                        <span>Tambah Product</span>
                    </a>
                </li>

                @can('admin')
                    <hr>
                    <li class="sidebar-title">ADMINISTRATOR</li>
                    <hr>
                    <li class="sidebar-title">Kategori Postingan</li>
                    <li class="sidebar-item {{ $active == 'dash_category' ? 'active' : '' }}">
                        <a href="/dashboard/category" class='sidebar-link'>
                            <i class="bi bi-list-task"></i>
                            <span>Daftar Kategori</span>
                        </a>
                    </li>

                    <li class="sidebar-item {{ $active == 'add_category' ? 'active' : '' }}">
                        <a href="/dashboard/category/create" class='sidebar-link'>
                            <i class="bi bi-plus-square"></i>
                            <span>Tambah Kategori</span>
                        </a>
                    </li>

                    --}}
                    <li class="sidebar-title">User</li>
                    <li class="sidebar-item {{ $active == 'dash_users' ? 'active' : '' }}">
                        <a href="/admin/users" class='sidebar-link'>
                            <i class="bi bi-person-lines-fill"></i>
                            <span>Users</span>
                        </a>
                    </li>

                    {{-- <li class="sidebar-item {{ $active == 'add_users' ? 'active' : '' }}">
                        <a href="/users/create" class='sidebar-link'>
                            <i class="bi bi-person-plus-fill"></i>
                            <span>Tambah User</span>
                        </a>
                    </li> --}}

                    
                    <li class="sidebar-title">Postingan</li>
                    <li class="sidebar-item {{ $active == 'dash_posts' ? 'active' : '' }}">
                        <a href="/admin/posts" class='sidebar-link'>
                            <i class="bi bi-person-badge"></i>
                            <span>Berita</span>
                        </a>
                    </li>

                    <li class="sidebar-item {{ $active == 'dash_events' ? 'active' : '' }}">
                        <a href="/admin/events" class='sidebar-link'>
                            <i class="bi bi-person-plus"></i>
                            <span>Event</span>
                        </a>
                    </li>

                    <li class="sidebar-title">UMKM</li>
                    <li class="sidebar-item {{ $active == 'dash_umkms' ? 'active' : '' }}">
                        <a href="/admin/umkms" class='sidebar-link'>
                            <i class="bi bi-person-badge"></i>
                            <span>Daftar UMKM</span>
                        </a>
                    </li>
{{--     
                    <li class="sidebar-title">Jabatan</li>
                    <li class="sidebar-item {{ $active == 'dash_position' ? 'active' : '' }}">
                        <a href="/dashboard/position" class='sidebar-link'>
                            <i class="bi bi-mortarboard-fill"></i>
                            <span>Daftar Jabatan</span>
                        </a>
                    </li>

                    <li class="sidebar-item {{ $active == 'add_position' ? 'active' : '' }}">
                        <a href="/dashboard/position/create" class='sidebar-link'>
                            <i class="bi bi-plus-square-fill"></i>
                            <span>Tambah Jabatan</span>
                        </a>
                    </li>

                    
                    <li class="sidebar-title">Profil Desa</li>
                    <li class="sidebar-item {{ $active == 'dash_profile' ? 'active' : '' }}">
                        <a href="/dashboard/profile" class='sidebar-link'>
                            <i class="bi bi-window"></i>
                            <span>Daftar Profil</span>
                        </a>
                    </li>

                    <li class="sidebar-item {{ $active == 'add_profile' ? 'active' : '' }}">
                        <a href="/dashboard/profile/create" class='sidebar-link'>
                            <i class="bi bi-window-plus"></i>
                            <span>Tambah Profil</span>
                        </a>
                    </li>

                    <li class="sidebar-title">Gallery</li>
                    <li class="sidebar-item {{ $active == 'dash_gallery' ? 'active' : '' }}">
                        <a href="/dashboard/gallery" class='sidebar-link'>
                            <i class="bi bi-image-fill"></i>
                            <span>Daftar Foto</span>
                        </a>
                    </li>

                    <li class="sidebar-item {{ $active == 'add_gallery' ? 'active' : '' }}">
                        <a href="/dashboard/gallery/create" class='sidebar-link'>
                            <i class="bi bi-file-plus-fill"></i>
                            <span>Tambah Foto</span>
                        </a>
                    </li>

                    
                    <li class="sidebar-title">Transparansi APBDesa</li>
                    <li class="sidebar-item {{ $active == 'dash_transparency' ? 'active' : '' }}">
                        <a href="/dashboard/transparency" class='sidebar-link'>
                            <i class="bi bi-currency-dollar"></i>
                            <span>Transparansi</span>
                        </a>
                    </li>

                    <li class="sidebar-item {{ $active == 'add_transparency' ? 'active' : '' }}">
                        <a href="/dashboard/transparency/create" class='sidebar-link'>
                            <i class="bi bi-plus-circle-dotted"></i>
                            <span>Tambah Transparansi</span>
                        </a>
                    </li>
                @endcan
--}}

                
                <li class="sidebar-title">Account</li>

                <li class="sidebar-item">
                    <form action="/logout" id="logout" method="POST">
                        @csrf
                        <a onclick="submit()" class='sidebar-link'>
                            <i class="bi bi-box-arrow-left"></i>
                            <span>Logout</span>
                        </a>
                    </form>
                </li> 
            </ul>
        </div>
    </div>
</div
