<li class="nav-item {{ Request::is('kontens*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('kontens.index') }}">
        <i class="nav-icon gg-menu-boxed"></i>
        <span>Konten</span>
    </a>
</li>
<!-- <li class="nav-item {{ Request::is('akuns*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('akuns.index') }}">
        <i class="nav-icon icon-cursor"></i>
        <span>Akuns</span>
    </a>
</li> -->
<li class="nav-item {{ Request::is('portofolios*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('portofolios.index') }}">
        <i class="nav-icon gg-folder"></i>
        <span>Portofolio</span>
    </a>
</li>
<li class="nav-item {{ Request::is('layanans*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('layanans.index') }}">
        <i class="nav-icon gg-eye"></i>
        <span>Layanan</span>
    </a>
</li>
<li class="nav-item {{ Request::is('faqs*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('faqs.index') }}">
        <i class="nav-icon gg-user-list"></i>
        <span>Faq</span>
    </a>
</li>
<li class="nav-item {{ Request::is('kontaks*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('kontaks.index') }}">
        <i class="nav-icon gg-phone"></i>
        <span>Kontak</span>
    </a>
</li>
