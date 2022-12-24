<div class="card shadow mb-4 topBorder">
    <div class="card-body">
        <table>
            <tr>
                <td class="pr-3">
                    <img loading="lazy" src="{{ isset(auth()->user()->image) && auth()->user()->image->url ? auth()->user()->image->url : asset('backend/img/profile/man.svg') }}" class="rounded-circle" alt="Cinque Terre" width="48" height="48">
                </td>
                <td>
                    {{ $user->name }}
                </td>
            </tr>
        </table>
    </div>
</div>
<ul class="list-group shadow">
    <li class="list-group-item"><a href="{{ route('user.profile') }}">My Profile</a></li>
    <li class="list-group-item activeUserMenu"><a href="{{ route('user.orders.index') }}">My Orders</a></li>
    <li class="list-group-item"><a href="{{ route('cart.index') }}">My Cart</a></li>
    <li class="list-group-item">
        <a href="{{ route('logout') }}"
           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <span>LOGOUT</span>
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </li>
</ul>
