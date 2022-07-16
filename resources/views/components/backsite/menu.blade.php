<!-- BEGIN: Main Menu-->
<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow " data-scroll-to-active="true">
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class="{{ request()->is('backsite/dashboard') || request()->is('backsite/dashboard/*') ? 'active' : '' }}">
                <a href="{{ route('backsite.dashboard.index') }}">
                    <i class="{{ request()->is('backsite/dashboard') || request()->is('backsite/dashboard/*') ? 'bx bx-category-alt bx-flashing' : 'bx bx-category-alt' }}" ></i><span class="menu-title" data-i18n="Dashboard">Dashboard</span>
                </a>
            </li>

            <li class=" navigation-header"><span data-i18n="Application">Application</span><i class="la la-ellipsis-h" data-toggle="tooltip" data-placement="right" data-original-title="Application"></i>
            </li>


            <li class="{{ request()->is('backsite/product') || request()->is('backsite/product/*') || request()->is('backsite/*/product') || request()->is('backsite/*/product/*') ? 'active' : '' }} ">
                <a class="menu-item" href="{{ route('backsite.product.index') }}">
                    <i></i><span>Product</span>
                </a>
            </li>
            
            <li class="{{ request()->is('backsite/user') || request()->is('backsite/user/*') || request()->is('backsite/*/user') || request()->is('backsite/*/user/*') ? 'active' : '' }} ">
                <a class="menu-item" href="{{ route('backsite.user.index') }}">
                    <i></i><span>Customer</span>
                </a>
            </li>

            <li class="{{ request()->is('backsite/sales-order') || request()->is('backsite/sales-order/*') || request()->is('backsite/*/sales-order') || request()->is('backsite/*/sales-order/*') ? 'active' : '' }} ">
                <a class="menu-item" href="{{ route('backsite.sales-order.index') }}">
                    <i></i><span>Sales Order</span>
                </a>
            </li>
        </ul>
    </div>
</div>

<!-- END: Main Menu-->