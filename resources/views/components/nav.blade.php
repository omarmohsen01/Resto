@foreach ($items as $item)
  <li class="nav-item menu-items" {{ Route::is($item['active'])?'active':'' }}>
    <a class="nav-link" href="{{ route($item['route']) }}" >
      <span class="menu-icon">
        <i class="{{ $item['icon'] }}"></i>
      </span>
      <span class="menu-title">{{ $item['title'] }}</span>
    </a>
  </li>
@endforeach