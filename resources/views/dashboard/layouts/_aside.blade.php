<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow " data-scroll-to-active="true">
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">

            <li class=" nav-item"><a href="{{route('dashboard.home')}}"><i class="la la-home"></i><span
                        class="menu-title"
                        data-i18n="">{{trans('dashboard.main.home')}}</span></a>
            </li>

            <li class=" nav-item"><a href="{{ route('dashboard.users.index') }}"><i class="la la-users"></i><span
                        class="menu-title"
                        data-i18n="">{{trans('dashboard.main.Users')}}</span></a>
            </li>

            <li class=" nav-item"><a href="{{ route('dashboard.adCategories.index') }}"><i class="la la-book"></i><span
                        class="menu-title"
                        data-i18n="">{{trans('dashboard.AdCategory.Categories')}}</span></a>
            </li>

            <li class=" nav-item"><a href="{{ route('dashboard.governorates.index') }}"><i class="la la-map"></i><span
                        class="menu-title"
                        data-i18n="">{{trans('dashboard.main.Governorates')}}</span></a>
            </li>

            <li class=" nav-item"><a href="{{ route('dashboard.cities.index') }}"><i class="la la-map-marker"></i><span
                        class="menu-title"
                        data-i18n="">{{trans('dashboard.main.Cities')}}</span></a>
            </li>

            <li class=" nav-item"><a href="{{ route('dashboard.blocks.index') }}"><i class="la la-map-signs"></i><span
                        class="menu-title"
                        data-i18n="">{{trans('dashboard.main.Blocks')}}</span></a>
            </li>

            <li class=" nav-item"><a href="{{ route('dashboard.features.index') }}"><i class="la la-map-pin"></i><span
                        class="menu-title"
                        data-i18n="">{{trans('dashboard.main.Features')}}</span></a>
            </li>


            <li class=" nav-item"><a href="{{ route('dashboard.message.index') }}"><i
                        class="ft-mail"></i><span class="menu-title"
                                                            data-i18n="">{{trans('dashboard.main.Inbox')}}</span></a>
            </li>



            <li class=" nav-item"><a href="#"><i class="la la-cogs"></i>
                    <span class="menu-title"
                          data-i18n="nav.page_layouts.main">{{ trans('dashboard.main.Settings') }}</span></a>
                <ul class="menu-content">
                    <li>
                        <a class="menu-item" href="{{ route('dashboard.settings.general') }}"
                           data-i18n="nav.page_layouts.2_columns">
                            {{ trans('dashboard.settings.General Settings') }}
                        </a>
                    </li>
                    <li><a class="menu-item" href="{{ route('dashboard.sliders.index') }}"
                           data-i18n="nav.page_layouts.2_columns">
                            {{ trans('dashboard.main.Sliders') }}
                        </a>
                    </li>
                    <li><a class="menu-item" href="{{ route('dashboard.questions.index') }}"
                           data-i18n="nav.page_layouts.2_columns">
                            {{ trans('dashboard.main.FAQ') }}
                        </a>
                    </li>
                    <li><a class="menu-item" href="{{ route('dashboard.settings.social') }}"
                           data-i18n="nav.page_layouts.2_columns">
                            {{ trans('dashboard.settings.Social Links') }}
                        </a>
                    </li>

                    <li><a class="menu-item" href="{{ route('dashboard.settings.api') }}"
                           data-i18n="nav.page_layouts.2_columns">
                            {{ trans('dashboard.API.APIs') }}
                        </a>
                    </li>

                    <li>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                </ul>
            </li>

        </ul>
    </div>
</div>
