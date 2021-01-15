<div class="sidebar shadow">
<div class="section-top">
    <div class="logo">
        <img src="{{ url('static/images/logo.png') }}" class="img-fluid">
    </div>
    <div class="user">
        <span class="subtitle">Hola:</span>
        <div class="name">
           {{--  nombre y apellido del usuario conectado --}}
            {{ Auth::user()->name }} {{ Auth::user()->lastname }}
            <a href="{{ url('/logout') }}" data-toggle="tooltip" data-placement="top" title="Cerrar Sesion">
                <i class="fas fa-sign-out-alt"></i>
            </a>
        </div>
        {{-- mostrar el correo de la persona Conectada --}}
        {{-- <div class="email">{{ Auth::user()->email}}</div> --}}
    </div> 
</div>
<div class="main">
    <ul>
        <li><a href="{{ url('/admin') }}" class="lk-dashboard"><i class="fas fa-home"></i>Inicio</a></li>
        <li><a href="{{ url('/admin/users')}}" class="lk-user_list"><i class="fas fa-user-friends"></i> Usuarios</a></li>
        <li><a href="{{url('/admin/categories/0')}}" class="lk-categories lk-category_add lk-category_edit lk-category_delete"><i class="far fa-folder-open"></i>Categorias</a></li>
        <li><a href="{{ url('/admin/products')}}" class="lk-products lk-products_add lk_product_edit lk-product_gallery_add"><i class="fas fa-boxes"></i> Productos</a></li>
    </ul>
</div>
</div>