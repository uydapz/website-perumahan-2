<style>
    .site-nav {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        z-index: 1030;
        transition: all 0.3s ease;
    }

    /* Tambahan saat discroll */
    .menu-bg-wrap.scrolled {
        margin-top: -20px;
        border-radius: 0 0 20px 20px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }
</style>

<nav class="site-nav">
    <div class="container">
        <div class="menu-bg-wrap">
            <div class="site-navigation">
                <a href="/" class="logo m-0 float-start">LOGO</a>

                <ul class="js-clone-nav d-none d-lg-inline-block text-start site-menu float-end">
                    <li class="{{ $title == 'Beranda' ? 'active' : ''}}"><a href="/">HOME</a></li>
                    <li class="{{ $title == 'Blog' ? 'active' : ''}}"><a href="/blog">BLOG</a></li>
                    <li class="{{ $title == 'About Us' ? 'active' : ''}}"><a href="/about-us">ABOUT US</a></li>
                    <li class="{{ $title == 'Contact' ? 'active' : ''}}"><a href="https://wa.me/6282334543970">CONTACT US</a></li>
                    <li class="{{ $title == 'Login' ? 'active' : ''}}"><a href="/login">
                    <i class="fa fa-door-open"></i></a></li>
                </ul>

                <a href="#"
                    class="burger light me-auto float-end mt-1 site-menu-toggle js-menu-toggle d-inline-block d-lg-none"
                    data-toggle="collapse" data-target="#main-navbar">
                    <span></span>
                </a>
            </div>
        </div>
    </div>
</nav>


<script>
    window.addEventListener('scroll', function() {
        const navbar = document.querySelector('.menu-bg-wrap');
        if (window.scrollY > 20) {
            navbar.classList.add('scrolled');
        } else {
            navbar.classList.remove('scrolled');
        }
    });
</script>
