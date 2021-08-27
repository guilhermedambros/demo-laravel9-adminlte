<!-- need to remove -->
<li class="nav-item">
    <a href="{{ route('home') }}" class="nav-link {{ (request()->is('home*')) ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Home</p>
    </a>
</li>
<!--@can('fornecedor-list')
<li class="nav-item">
    <a href="{{ route('fornecedores.index') }}" class="nav-link {{ (request()->is('fornecedores*')) ? 'active' : '' }}">
        <i class="nav-icon fas fa-university"></i>
        <p>Fornecedores</p>
    </a>
</li>
@endcan-->
@role('Super Admin')
<li class="nav-item">
    <a href="{{ route('users.index') }}" class="nav-link {{ (request()->is('users*')) ? 'active' : '' }}">
        <i class="nav-icon fas fa-user"></i>
        <p>Usuários</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('roles.index') }}" class="nav-link {{ (request()->is('roles*')) ? 'active' : '' }}">
        <i class="nav-icon fas fa-lock"></i>
        <p>Perfis</p>
    </a>
</li>
@endcan