<ul class="sidebar-menu">
    <li class="header">МЕНЮ</li>
    <li class="treeview">
        <a href="{{ route('adminIndex') }}">
            <i class="fa fa-dashboard"></i> <span>Админ-панель</span>
        </a>
    </li>
    <li><a href="{{route('certificates.index')}}" style="{{(Route::currentRouteName() == 'certificates.index') ? 'border-left-color: #3c8dbc' : ''}}"><i
                    class="fa fa-sticky-note-o"></i> <span>Сертификаты</span></a></li>
    <li><a href="{{route('orders.index')}}" style="{{(Route::currentRouteName() == 'orders.index') ? 'border-left-color: #3c8dbc' : ''}}"><i class="fa fa-list-alt"></i><span>Заказы</span></a></li>
    <li><a href="{{route('customers.index')}}" style="{{(Route::currentRouteName() == 'customers.index') ? 'border-left-color: #3c8dbc' : ''}}"><i class="fa fa-users"></i><span>Клиенты (купили)</span></a></li>
    <li><a href="{{route('days.index')}}" style="{{(Route::currentRouteName() == 'categories.index') ? 'border-left-color: #3c8dbc' : ''}}"><i class="fa fa-list-ul"></i> <span>Открыть бронирование</span></a></li>
    <li><a href="#" style="{{(Route::currentRouteName() == 'tags.index') ? 'border-left-color: #3c8dbc' : ''}}"><i class="fa fa-tags"></i> <span>Теги</span></a></li>
    <li><a href="#" style="{{(Route::currentRouteName() == 'news.index') ? 'border-left-color: #3c8dbc' : ''}}"><i class="fa fa-newspaper-o"></i> <span>Новости</span></a></li>
    <li><a href="#"><i class="fa fa-user-plus"></i> <span>Роли и Привилегии</span></a></li>
    <li><a href="#"><i class="fa fa-user-plus"></i> <span>тест</span></a></li>
</ul>
