<div class="top_nav">
    <div class="nav_menu">
        <div class="nav toggle">
            <a id="menu_toggle"><i class="fa fa-bars"></i></a>
        </div>
        <nav class="nav navbar-nav">
            <ul class="navbar-right">
                <li class="nav-item dropdown open" style="padding-left: 15px;">
                    <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                        <img src="{{ asset('adminAssets/images/img.jpg')}}" alt="">  {{ Auth::user()->name }}
                    </a>
                    <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="javascript:;">Profile</a>
                        <a class="dropdown-item" href="javascript:;">
                            <span class="badge bg-red pull-right">50%</span>
                            <span>Settings</span>
                        </a>
                        <a class="dropdown-item" href="javascript:;">Help</a>
                        <a class="dropdown-item" href="{{ route('logout') }}"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                    </div>
                </li>

                <li class="nav-item dropdown open">
                    <a href="javascript:;" class="dropdown-toggle info-number" id="navbarDropdown1" data-toggle="dropdown" aria-expanded="false">
                        <i class="fa fa-envelope-o"></i>
                        <span class="badge bg-green">{{ auth()->user()->unreadNotifications->count() }}</span>
                    </a>
                    <ul class="dropdown-menu list-unstyled msg_list" role="menu" aria-labelledby="navbarDropdown1">
                        @foreach(auth()->user()->unreadNotifications as $notification)
                            <form id="mark-as-read-form-{{ $notification->id }}" action="{{ route('showMessage', $notification->data['message_id']) }}" method="POST" style="display: none;">
                                @csrf
                                <input type="hidden" name="notification_id" value="{{ $notification->id }}">
                            </form>
                            <li class="nav-item">
                              
                                <a href="" onclick="event.preventDefault(); document.getElementById('mark-as-read-form-{{ $notification->id }}').submit();"
                                   class="dropdown-item">
                                    <span class="image"><img src="{{ asset('adminAssets/images/img.jpg') }}" alt="Profile Image"></span>
                                    <span>
                                        <span>{{ $notification->data['email'] }}</span>
                                        <span class="time">{{ \Carbon\Carbon::parse($notification->created_at)->diffForHumans() }}</span>
                                    </span>
                                    <span class="message">
                                        {{ $notification->data['content'] }}
                                    </span>
                                </a>
                            </li>
                        @endforeach
                        <li class="nav-item">
                            <div class="text-center">
                                <a class="dropdown-item" href="{{ route('notifications.markAsRead') }}">
                                    <strong>Mark all as read</strong>
                                    <i class="fa fa-angle-right"></i>
                                </a>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll('.dropdown-item').forEach(item => {
            item.addEventListener('click', event => {
                event.preventDefault();
                item.nextElementSibling.submit();
            });
        });
    });
    </script>