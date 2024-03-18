<aside>
    <button class="toggle-btn custom-btn">
        <i class="fa fa-times"></i>
    </button>
    <h3 class="logo">
        <img src="{{ aurl('images/logo.png') }}" />
    </h3>
    <ul>
        <li class="{{ request()->routeIs('admin.index') ? 'active' : '' }}">
            <a href="{{ route('admin.index') }}"><i class="fa fa-home"></i> الرئيسية </a>
        </li>
        <li class="{{ request()->routeIs('admin.invitations.index') ? 'active' : '' }}">
            <a href="{{ route('admin.invitations.index') }}"><i class="far fa-envelope"></i> الدعــوات <span>
                    {{ \App\Models\Invitation::count() }} </span>
            </a>
        </li>
        <li class="{{ request()->routeIs('admin.users.index') ? 'active' : '' }}">
            <a href="{{ route('admin.users.index') }}"><i class="fa fa-users"></i> الـمـسـتـخـدمـيـن <span>
                    {{ \App\Models\User::count() }} </span>
            </a>
        </li>
        <li class="{{ request()->routeIs('admin.invitations.types.index') ? 'active' : '' }}">
            <a href="{{ route('admin.invitations.types.index') }}"><i class="fa fa-info"></i> الأنواع
                <span> {{ \App\Models\InvitationTypeTemplate::count() }} </span>
            </a>
        </li>
        <li class="{{ request()->routeIs('admin.invitations.templates.index') ? 'active' : '' }}">
            <a href="{{ route('admin.invitations.templates.index') }}"><i class="fa fa-image"></i> الـقـوالـب
                <span> {{ \App\Models\InvitationTypeTemplate::count() }} </span>
            </a>
        </li>
        <li class="{{ request()->routeIs('admin.packages.index') ? 'active' : '' }}">
            <a href="{{ route('admin.packages.index') }}">
                <i class="fa fa-dollar-sign"></i>
                الـبـاقـات <span> {{ \App\Models\Package::count() }} </span>
            </a>
        </li>

        <li class="{{ request()->routeIs('admin.faqs.index') ? 'active' : '' }}">
            <a href="{{ route('admin.faqs.index') }}"><i class="fa fa-question"></i> الأسـئـلـة الـشائـعـة
            </a>
        </li>

        <li class="{{ request()->routeIs('admin.features.index') ? 'active' : '' }}">
            <a href="{{ route('admin.features.index') }}"><i class="far fa-star"></i> الـمـمـيـزات
            </a>
        </li>

        <li class="{{ request()->routeIs('admin.testimonials.index') ? 'active' : '' }}">
            <a href="{{ route('admin.testimonials.index') }}"><i class="fas fa-info"></i> اراء العملاء
            </a>
        </li>

        <li class="{{ request()->routeIs('admin.terms.index') ? 'active' : '' }}">
            <a href="{{ route('admin.terms.index') }}"><i class="far fa-file"></i> الـشـروط والأحـكـام
            </a>
        </li>
    </ul>
</aside>
