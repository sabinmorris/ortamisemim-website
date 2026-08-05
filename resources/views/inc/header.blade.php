
<div style="position: sticky; top: 0; z-index: 2000;">
<div class=" align-items-center">
  <img src="{{asset('assets/img/BUNNERWEBSITE.webp')}}" style="width: 100%; display: block;">
</div>

<header id="header" class="header d-flex align-items-center sticky-top">
  <div class="container position-relative d-flex align-items-center justify-content-between">

    
    <nav id="navmenu" class="navmenu">
      <ul>
        <li><a href="{{Route('/')}}" class="active">{{strtoupper('Home')}}</a></li>
        <li><a href="{{Route('about_Us')}}" class="active">{{ strtoupper('Kuhusu Sisi')}}</a></li>
        <li><a href="{{Route('events')}}">{{ strtoupper('Habari na Matukio')}}</a></li>
        <li><a href="{{Route('our_leadership')}}">{{ strtoupper('Uongozi')}}</a></li>
        <li class="dropdown"><a href="#"><span>{{ strtoupper('Maktaba')}}</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
          <ul>
            <li><a href="{{Route('video_Lebo')}}">{{ strtoupper('Video')}}</a></li>
            <li><a href="{{Route('photo_Lebo')}}">{{ strtoupper('Picha')}}</a></li>
            <li class="dropdown">
              <a class="dropdown-item" href="#"> {{ strtoupper('Nyaraka')}} &raquo; </a>
              @if(count([$departmentInfos]) > 0)
              @foreach($departmentInfos as $departmentInfo)
              <ul class="dropdown-menu dropdown-submenu">
                <li>
                  <a class="dropdown-item" href="{{Route('show_document', ['departmentName' => 'uratibu'])}}">{{ strtoupper('Tawala za Mikoa')}}</a>
                </li>
                <li>
                  <a class="dropdown-item" href="{{Route('show_document', ['departmentName' => 'mipango'])}}">{{ strtoupper('Sera & Mipango')}}</a>
                </li>
              </ul>
              @endforeach
              @endif
            </li>
          </ul>

        </li>
        <li class="dropdown"><a href="#"><span>{{ strtoupper('Idara')}}</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
          @if(count($departmentInfos) > 0)
          @foreach($departmentInfos as $departmentInfo)
          <ul>
            <li><a href="{{Route('utumishi_department', ['departmentName' => 'utumishi'])}}">{{ strtoupper('Utumishi na Uendeshaji')}}</a></li>
            <li><a href="{{Route('utumishi_department', ['departmentName' => 'mipango'])}}">{{ strtoupper('Mipango Sera na Utafiti')}}</a></li>
            <li><a href="{{Route('utumishi_department', ['departmentName' => 'uratibu'])}}">{{ strtoupper('Tawala za Mikoa na Serikali za Mitaa')}}</a></li>
            <li><a href="{{Route('utumishi_department', ['departmentName' => 'idara maalum'])}}">{{ strtoupper('Idara Maalum')}}</a></li>
            <li><a href="{{Route('utumishi_department', ['departmentName' => 'mrajis'])}}" translate="no">{{ strtoupper('Mrajis')}}</a></li>
          </ul>
          @endforeach
          @endif
        </li>
        <li><a href="{{Route('contact_Us')}}">{{ strtoupper('Wasiliana Nasi')}}</a></li>
      </ul>
      <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
    </nav>
    <!-- Simple language switcher -->
    <div class="language-switcher me-3">
      <div class="translate-wrapper">
        <i class="fas fa-globe text-white me-2"></i>
        <select id="language-select" class="form-select form-select-sm custom-translator-select" onchange="changeLanguage(this.value)">
          <option value="en">English</option>
          <option value="sw">Kiswahili</option>
        </select>
      </div>
    </div>
    <!-- Search Widget -->
    <div class="search-widget">
      <form action="">
        <input type="text" name="q" value="{{request('q')}}">
        <button type="submit" title="Search"><i class="bi bi-search"></i></button>
      </form>
    </div><!--/Search Widget -->
  </div>
</header>
</div>
