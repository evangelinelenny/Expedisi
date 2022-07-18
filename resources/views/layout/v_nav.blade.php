<ul class="sidebar-menu" data-widget="tree">
<li class="header">MAIN NAVIGATION</li>
<li class="{{ request()->is('/') ? 'active' : '' }}"><a href="/"><i class="fa fa-home"></i> <span>Home</span></a></li>
<li class="{{ request()->is('masuk') ? 'active' : '' }}"><a href="/masuk"><i class="fa fa-book"></i> <span>Masuk</span></a></li>
<li class="{{ request()->is('terkirim') ? 'active' : '' }}"><a href="/terkirim"><i class="fa fa-book"></i> <span>Terkirim</span></a></li>
<li class="treeview">