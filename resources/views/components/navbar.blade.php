<div>
    <body>
        <header>
            <a href="/" class="logo">Laravel-assesment</a>
            <div class="mean-toggle"></div>
            <nav>
                <ul>
                    <li><a href="{{ route('logout') }}"
                            onclick="event.preventDefault();document.
                            getElementById('logout-form').submit();"
                            class=""> LogOut</a>
                        <form action="{{ route('logout') }}" method="POST" class="d-none" id="logout-form">@csrf
                        </form>
                    </li>
                </ul>
            </nav>
            <div class="clear"></div>
        </header>
        <script type="text/javascript">
            $(document).ready(function() {
                $('.mean-toggle').click(function() {
                    $('.mean-toggle').toggleClass('active')
                    $('nav').toggleClass('active')
                })
            })
        </script>
    </body>
</div>