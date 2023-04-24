<li class="nav-item dropdown hidden-caret">
    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
       aria-haspopup="true" aria-expanded="false">
        <i class="la la-bell"></i>
        <span class="notification">{{$notifications->count()}}</span>
    </a>
    <ul class="dropdown-menu notif-box" aria-labelledby="navbarDropdown">
        @if($notifications->count() != 0)
            <li>
                <div class="dropdown-title">يوجد {{$notifications->count()}} إشعارات جديدة</div>
            </li>
        @endif
        @if($notifications->count() == 0)
            <li>
                <div class="dropdown-title">لا يوجد أي إشعارات جديدة</div>
            </li>
        @endif
        <li>
            @foreach($notifications as $notification)
                <div class="notif-center d-flex flex-row align-items-center">

                    <div class="notif-icon notif-primary m-3">
                        <form
                            action="{{route('markNotification')}}" method="post" style="display: inline">
                            @csrf
                            <input type="hidden" name="id" value="{{ $notification->id }}">
                            <a class="" href="{{route('markNotification')}}" onclick="event.preventDefault();
                                                                    this.closest('form').submit();"> <i
                                    class="fa-solid fa-eye"></i></a>
                        </form>
                    </div>

                    <div class="notif-content">
                        <span class="block d-flex flex-row">
                            {{ $notification->data['title'] }}
                            <br>
                            {{ $notification->data['description'] }}
                        </span>
                        <span class="time">{{ $notification->created_at }}</span>
                        <hr>
                    </div>


                </div>
            @endforeach
        </li>
{{--        @if($notifications->count() != 0)--}}
{{--            <li>--}}
{{--                <a class="see-all" id="mark-all"--}}
{{--                   href="javascript:void(0);">--}}
{{--                    <strong>تعليم الكل كمقروء</strong>--}}
{{--                    <i class="la la-angle-left"></i>--}}
{{--                </a>--}}
{{--            </li>--}}
{{--        @endif--}}
    </ul>
</li>
