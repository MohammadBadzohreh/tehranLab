@include("dashboard.layouts.header")
<body class="user-profile">
<div class="wrapper ">
    @include("dashboard.layouts.sidebar")
    <div class="main-panel" id="main-panel">
        @include("dashboard.layouts.navbar")
        <div class="panel-header panel-header-sm">
        </div>
        <div class="content">
            @yield("content")
        </div>

    </div>
</div>
@include("dashboard.layouts.footer")
