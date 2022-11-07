<li class="nav-item">
    <a href="{{ route('mahasiswas.index') }}"
       class="nav-link {{ Request::is('mahasiswas*') ? 'active' : '' }}">
        <p>Mahasiswas</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('matakuliahs.index') }}"
       class="nav-link {{ Request::is('matakuliahs*') ? 'active' : '' }}">
        <p>Matakuliahs</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('krs.index') }}"
       class="nav-link {{ Request::is('krs*') ? 'active' : '' }}">
        <p>Krs</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('dosens.index') }}"
       class="nav-link {{ Request::is('dosens*') ? 'active' : '' }}">
        <p>Dosens</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('pengampus.index') }}"
       class="nav-link {{ Request::is('pengampus*') ? 'active' : '' }}">
        <p>Pengampus</p>
    </a>
</li>


