<div class="sidebar" data-color="orange">
    <!--
      Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
  -->
    <div class="logo">
        <a href="/" class="simple-text logo-mini">
            UT
        </a>
        <a href="/" class="simple-text logo-normal">
            UT ROBOTIC LAB
        </a>
    </div>
    <div class="sidebar-wrapper" id="sidebar-wrapper">
        <ul class="nav">
            <li>
                <a href="./dashboard.html">
                    <i class="now-ui-icons design_app"></i>
                    <p>Dashboard</p>
                </a>
            </li>
                 <li>
                <a href="{{ route('journal.index') }}">
                    <i class="now-ui-icons location_map-big"></i>
                    <p>journals</p>
                </a>
            </li>

            <li>
                <a href="{{ route('article.index') }}">
                    <i class="now-ui-icons location_map-big"></i>
                    <p>articles</p>
                </a>
            </li>


            <li>
                <a href="{{ route("users.index") }}">
                    <i class="now-ui-icons text_caps-small"></i>
                    <p>users</p>
                </a>
            </li>

            <li>
                <a href="{{ route('role.create') }}">
                    <i class="now-ui-icons users_single-02"></i>
                    <p>role permissions</p>
                </a>
            </li>

            <li>
                <a href="{{ route('people.index') }}">
                    <i class="now-ui-icons users_single-02"></i>
                    <p>people</p>
                </a>
            </li>

        </ul>
    </div>
</div>
