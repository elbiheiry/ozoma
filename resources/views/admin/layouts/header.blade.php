<div class="dash_header">
    <div class="side">
        <button class="toggle-btn icon-btn">
            <i class="fa fa-bars"></i>
        </button>
       <img src="{{ aurl('images/logo.png') }}" />
       </div>
    <button onclick="$('#logout-form').submit()">
        <i class="fa fa-power-off"></i>
    </button>
</div>
<form id="logout-form" action="{{ route('admin.logout') }}" method="post">
    @csrf
</form>
