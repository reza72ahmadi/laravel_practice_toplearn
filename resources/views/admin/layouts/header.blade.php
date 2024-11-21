<header class="header-h">
    <section class="sidebar-header bg-gray">
        <section class="d-flex justify-content-between flex-md-row-reverse px-2">
            <span id="sidebar-toggle-show" class="d-inline d-md-none pointer"><i class="fas fa-toggle-off"></i></span>
            <span id="sidebar-toggle-hide" class="d-none d-md-inline pointer"><i class="fas fa-toggle-on"></i></span>
            <span><img class="logo" src="{{ asset('admin-assets/images/logo.png') }}" alt=""></span>
            <span class="d-md-none"><i id="menu-toggle" class="fas fa-ellipsis-h"></i></span>
        </section>
    </section>

    <section id="body-header" class="body-header bg-gray">
        <section class="d-flex justify-content-between">
            <section style="margin-right: 2rem;">
                <span>
                    <span id="search-area" class="search-area d-none">
                        <i id="search-area-hide" class="fas fa-times pointer"></i>
                        <input id="search-input" class="search-input" type="text">
                        <i class="fas fa-search pointer"></i>
                    </span>
                    <i id="search-toggle" class="fas fa-search d-none d-md-inline pointer"></i>
                </span>

                <span id="full-screen" class="pointer d-none d-md-inline mr-5">
                    <i id="screen-compress" class="fas fa-compress d-none"></i>
                    <i id="screen-expand" class="fas fa-expand"></i>
                </span>
            </section>
            <section>
                <!-- notification -->
                <span class="ml-2 ml-md-4 position-relative">
                    <span id="header-notification-toggle" class="pointer">
                        <i class="far fa-bell pointer"></i><sup class="badge badge-danger">
                            @if ($notifications->count() !== 0)
                                <sup class="badge badge-danger">
                                    {{ $notifications->count() }}
                                </sup>
                            @endif
                        </sup>
                    </span>
                    <section id="header-notification" class="header-notification rounded">
                        <section class="d-flex justify-content-between">
                            <span class="px-2">
                                نوتیفیکیشن ها
                            </span>
                            <span class="px-2">
                                <span class="badge badge-danger">جدید</span>
                            </span>
                        </section>
                        <ul class="list-group rounded px-0">
                            @foreach ($notifications as $notification)
                                <li class="list-group-item list-group-item-action">
                                    <section class="media">
                                        <section class="media-body pr-1">
                                            <p>{{$notification['data']['message']}}</p>
                                        </section>
                                    </section>
                                </li>
                            @endforeach
                        </ul>
                    </section>
                </span>
                <!-- notification -->


                <!-- comment -->
                <span class="ml-2 ml-md-4 position-relative">
                    <span id="comment-notification-toggle" class="pointer">
                        <i class="far fa-comment-alt"></i>
                        @if ($unseenComments->count() !== 0)
                            <sup class="badge badge-danger">
                                {{ $unseenComments->count() }}
                            </sup>
                        @endif
                    </span>

                    <section id="header-comment" class="header-comment">
                        <section class="border-bottom px-4">
                            <input class="form-control form-control-sm my-4" placeholder="جستجو..." type="text">
                        </section>

                        <section class="header-comment-wrapper">
                            <ul class="list-group rounded px-0">
                                @foreach ($unseenComments as $unseenComment)
                                    <li class="list-group-item list-group-item-action">
                                        <section class="media">
                                            <img class="notification-img"
                                                src="{{ asset('admin-assets/images/avatar-3.jpg') }}" alt="avatar">
                                            <section class="media-body pr-1">
                                                <section class="d-flex justify-content-between">
                                                    <h5 class="comment-user">{{ $unseenComment->user->full_name }}</h5>
                                                    <span>
                                                        {{ $unseenComment->body }}
                                                        <i class="fas fa-circle text-success comment-user-status"></i>
                                                    </span>
                                                </section>
                                            </section>
                                        </section>
                                    </li>
                                @endforeach
                            </ul>
                        </section>
                    </section>
                </span>
                <!-- comment -->

                <!-- profile -->
                <span class="ml-3 ml-md-5 position-relative">
                    <span id="header-profile-toggle" class="pointer">
                        <img class="header-avatar"
                            src="{{ asset('admin-assets/images/avatar-3.jpg') }}
                        "
                            alt="">
                        <span class="header-username">کامران محمدی</span>
                        <i class="fas fa-angle-down"></i>
                    </span>

                    <section id="header-profile" class="header-profile rounded">
                        <section class="list-group rounded">
                            <a href="" class="list-group-item list-group-item-action header-profil-link">
                                <i class="fas fa-cog"></i> تنظیمات
                            </a>
                            <a href="" class="list-group-item list-group-item-action header-profil-link">
                                <i class="fas fa-user"></i>کاربر
                            </a>
                            <a href="" class="list-group-item list-group-item-action header-profil-link">
                                <i class="far fa-envelope"></i>پیام ها
                            </a>
                            <a href="" class="list-group-item list-group-item-action header-profil-link">
                                <i class="fas fa-lock"></i>قفل صفحه
                            </a>
                            <a href="" class="list-group-item list-group-item-action header-profil-link">
                                <i class="fas fa-sign-out-alt"></i>خروج
                            </a>
                        </section>
                    </section>
                </span>
            </section>
        </section>
    </section>
</header>
