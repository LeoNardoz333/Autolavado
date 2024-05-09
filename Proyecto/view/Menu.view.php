<style>
:root {
    --primary: #191919;
    --background: #93C3CE;
    --navbar-height: 48px;
}


.background {
    display: block;
    width: 100vw;
    height: 100vh;
    opacity: 1;
    z-index: 1;
    background-size: cover;
    background-repeat: no-repeat;
}

.menu__wrapper {
    display: flex;
    position: relative;
    flex-direction: row;
    z-index: 2;
}

.menu__bar {
    /* position: fixed; */
    width: 100%;
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-direction: row;
    padding: 0 1rem;
    gap: 2rem;
    background: var(--background);
    height: 4rem;
    opacity: 0.9;

}

.menu-icon {
    cursor: pointer;
    display: flex;
    height: 2rem;
    width: 2rem;
}

.navigation {
    width: 100%;
    display: flex;
    flex-direction: row;
    list-style-type: none;
    align-items: center;
    gap: 1rem;
    padding: 1rem 0;
    background-color: var(--background);
}

.logo svg {
    width: 2rem;
    height: 2rem;
}

.navigation>li {
    display: flex;
    position: relative;
    cursor: pointer;
    /* font-size: 1.25rem; */
}

.navigation>li>a {
    color: white;
    border-bottom: 2px solid transparent;
    transition: all 0.3s ease;
    text-decoration: none;
    font-weight: 500;
    background-image: linear-gradient(to right,
            var(--primary),
            var(--primary) 50%,
            white 50%);
    background-size: 200% 100%;
    background-position: -100%;
    display: inline-block;
    padding: 0.5rem 1rem;
    border-radius: 0.5rem;
    position: relative;
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    transition: all 0.2s ease-in-out;
}

.navigation>li>a:before {
    content: '';
    background: var(--primary);
    display: block;
    position: absolute;
    bottom: -0.125rem;
    left: 0;
    width: 0;
    height: 0.125rem;
    transition: all 0.2s ease-in-out;
}

.navigation>li>a:hover {
    background-position: 0;
}

.navigation>li>a:hover::before {
    width: 100%;
}

@media (min-width: 600px) {
    .menu-icon {
        display: none;
    }
}

@media (max-width: 600px) {

    .navigation {
        display: none;
    }

    .menu-icon {
        display: block;
    }

    .navigation--mobile {
        top: var(--navbar-height);
        position: absolute;
        right: 0;
        display: flex;
        padding: 5rem 3.5rem;
        min-height: 100%;
        background-color: var(--background);
        gap: 0.5rem;
        flex-direction: column;
        align-items: flex-start;
        opacity: 0.95;
        animation: fadein 0.3s forwards;
    }

    @keyframes fadein {
        0% {
            opacity: 0;
            width: 0;
            height: 0;
        }

        100% {
            opacity: 1;
            width: 100%;
            height: calc(100vh - var(--navbar-height));
        }
    }

    .navigation--mobile--fadeout {
        animation: fadeout 300ms forwards;
    }

    @keyframes fadeout {
        0% {
            opacity: 1;
            width: 100%;
            height: calc(100vh - var(--navbar-height));
        }

        100% {
            opacity: 0;
            width: 0;
            height: 0;
        }
    }

}
</style>

    <div class="">

        <div >
            <div class="menu__bar">

                <a href="home" title="Logo" class="logo">
                <img style="max-width: 60px; height: 60px; vertical-align: middle; margin-right:500px;"src="images/alavado.png">             
            </a>
                <img class="menu-icon" src="images/alavado.png" title='Burger Menu' alt='Burger Menu'
                    onclick="toggleMenu(this)">
                <ul class="navigation">
                    <li>
                    <a href="home">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-home" width="24"
                        height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" color="#000" fill="none"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M5 12l-2 0l9 -9l9 9l-2 0" />
                        <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" />
                        <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" />
                    </svg>
                    Inicio
                </a>
                    </li>
                    <li>
                    <a href="rclientes">
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" color="#000" fill="none">
    <path d="M9.00684 17C9.00684 18.1046 8.11141 19 7.00684 19C5.90227 19 5.00684 18.1046 5.00684 17C5.00684 15.8954 5.90227 15 7.00684 15C8.11141 15 9.00684 15.8954 9.00684 17Z" stroke="currentColor" stroke-width="1.5" />
    <path d="M19.0068 17C19.0068 18.1046 18.1114 19 17.0068 19C15.9022 19 15.0068 18.1046 15.0068 17C15.0068 15.8954 15.9022 15 17.0068 15C18.1114 15 19.0068 15.8954 19.0068 17Z" stroke="currentColor" stroke-width="1.5" />
    <path d="M2.00686 10H18.0069M2.00686 10C2.00686 10.78 1.98687 13.04 2.01085 15.26C2.04682 15.98 2.16673 16.58 5.00857 17M2.00686 10C2.22269 8.26 3.16197 6.2 3.64161 5.42M9.00686 10V5M14.997 17H9.00152M2.02284 5H12.2391C12.2391 5 12.7786 5 13.2583 5.048C14.1576 5.132 14.913 5.54 15.6684 6.56C16.4683 7.64 17.0834 9.008 17.8987 9.74C19.2537 10.9564 21.8318 10.58 21.9756 13.16C22.0116 14.48 22.0116 15.92 21.9517 16.16C21.8554 16.8667 21.3105 16.9821 20.6327 17C20.0444 17.0156 19.3353 16.9721 18.9899 17" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
</svg>
                    Registro Clientes
                </a>

            </li>
                    <li>

                    <a href="reportes">

<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" color="#000" fill="none">
<path d="M22 14V10C22 6.22876 22 4.34315 20.8284 3.17157C19.6569 2 17.7712 2 14 2H12C8.22876 2 6.34315 2 5.17157 3.17157C4 4.34315 4 6.22876 4 10V14C4 17.7712 4 19.6569 5.17157 20.8284C6.34315 22 8.22876 22 12 22H14C17.7712 22 19.6569 22 20.8284 20.8284C22 19.6569 22 17.7712 22 14Z" stroke="currentColor" stroke-width="1.5" />
<path d="M5 6L2 6M5 12H2M5 18H2" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
<path d="M17.5 7L13.5 7M15.5 11H13.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
<path d="M9 22L9 2" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
</svg>                
Reportes
</a>
                    </li>
                    <li>
                    <a href="logout">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" color="#000" fill="none">
    <path d="M7.02331 5.5C4.59826 7.11238 3 9.86954 3 13C3 17.9706 7.02944 22 12 22C16.9706 22 21 17.9706 21 13C21 9.86954 19.4017 7.11238 16.9767 5.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
    <path d="M12 2V10" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
</svg>
                    Logout
                </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <script src="/Proyecto/javascript/menu.js"></script>
