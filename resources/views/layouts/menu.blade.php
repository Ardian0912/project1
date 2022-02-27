<li class="nav-item {{ Request::is('kontens*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('kontens.index') }}">
        <i class="nav-icon icon-cursor"></i>
        <span>Kontens</span>
    </a>
</li>
<li class="nav-item {{ Request::is('akuns*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('akuns.index') }}">
        <i class="nav-icon icon-cursor"></i>
        <span>Akuns</span>
    </a>
</li>
<li class="nav-item {{ Request::is('portofolios*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('portofolios.index') }}">
        <i class="nav-icon icon-cursor"></i>
        <span>Portofolios</span>
    </a>
</li>
<li class="nav-item {{ Request::is('layanans*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('layanans.index') }}">
        <i class="nav-icon icon-cursor"></i>
        <span>Layanans</span>
    </a>
</li>
<li class="nav-item {{ Request::is('faqs*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('faqs.index') }}">
        <i class="nav-icon icon-cursor"></i>
        <span>Faqs</span>
    </a>
</li>
<li class="nav-item {{ Request::is('kontaks*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('kontaks.index') }}">
        <i class="nav-icon icon-cursor"></i>
        <span>Kontaks</span>
    </a>
</li>
