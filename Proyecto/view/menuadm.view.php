
<style>
    :root {
    --bg: #1b21be; 
    --nav-bg: #1b21be; 
    --primary: #fff;
    --nav-item-color: #FFF;
    --nav-border: #FFF;
    --white: #fff;
    --gap: 0.5rem;
    --item-width: 5.25rem;
}

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: "Mulish", sans-serif;
    font-size: 16px;
    display: grid;
    place-items: center;
    height: 100vh;
    background: var(--background);
    padding: 0.1rem;
}

.navigation {
    max-width: fit-content;
    display: flex;
    justify-content: center;
    width: 100%;
    padding: 1rem 2rem;
    background: var(--nav-bg);
    box-shadow: 0px 4px 16px 0px rgba(148, 156, 169, 0.15);
    border-radius: 1rem;
    border: 1px solid rgba(148, 156, 169, 0.15);
    user-select: none;
}


.cta-btn {
    position: absolute;
    margin: 0 auto;
    border-radius: 50%;
    width: 3rem;
    height: 3rem;
    cursor: pointer;
    background: var(--primary);
    border: 0;
}

.cta-btn>svg {
    width: 1.75rem;
    height: 1.75rem;
    stroke: var(--white);
}

.nav-list {
    display: flex;
    list-style-type: none;
    gap: var(--gap);
    position: relative;
}

.nav-list>li {
    width: var(--item-width);
    display: flex;
    flex-direction: column;
    align-items: center;
}

.cta-wrapper {
    display: flex;
    width: 0rem!important;
    position: relative;
}

.cta-btn {
    position: absolute;
    top: -2.5rem;
}

.nav-list>li>a {
    display: flex;
    flex-direction: column;
    align-items: center;
    max-width: 4rem;
    gap: 0.5rem;
    width: 100%;
    color: var(--nav-item-color);
    text-decoration: none;
    transition: all 0.2s ease-in-out;
}

.nav-list>li>a>svg {
    width: 2rem;
    height: 2rem;
    stroke: var(--nav-item-color);
    transition: all 0.2s ease-in-out;
}

.nav-list>li:hover>a {
    color: var(--primary);
}

.nav-list>li:hover>a>svg {
    stroke: var(--primary);
}

.nav-list>.active>a {
    color: var(--primary);
}

.nav-list>.active>a>svg {
    stroke: var(--primary);
}

.active-bar {
    position: absolute;
    bottom: -1rem;
    min-width: var(--item-width);
    height: 0.5rem;
    background: var(--primary);
    z-index: 1;
    transition: 0.5s;
}

.nav-list li:nth-child(1).active~.active-bar {
    transform: translatex(calc(0));
}

.nav-list li:nth-child(2).active~.active-bar {
    transform: translatex(calc(var(--item-width) + var(--gap)));
}

.nav-list li:nth-child(4).active~.active-bar {
    transform: translatex(calc(var(--item-width)*2 + var(--gap)*2 + var(--gap)));
}

.nav-list li:nth-child(5).active~.active-bar {
    transform: translatex(calc(var(--item-width)*3 + var(--gap)*3 + var(--gap)));
}
</style>
<nav class="navigation">
        <ul class="nav-list">
            <li class="active">
                <a href="home">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-home" width="24"
                        height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
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
                <a href="gusuarios">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" color="#FFF" fill="none">
    <path d="M3.78879 9.03708C3.0814 9.42 1.22668 10.2019 2.35633 11.1803C2.90815 11.6582 3.52275 12 4.29543 12H8.70457C9.47725 12 10.0918 11.6582 10.6437 11.1803C11.7733 10.2019 9.9186 9.42 9.21121 9.03708C7.55241 8.13915 5.44759 8.13915 3.78879 9.03708Z" stroke="currentColor" stroke-width="1.5" />
    <path d="M8.75 4.27273C8.75 5.52792 7.74264 6.54545 6.5 6.54545C5.25736 6.54545 4.25 5.52792 4.25 4.27273C4.25 3.01753 5.25736 2 6.5 2C7.74264 2 8.75 3.01753 8.75 4.27273Z" stroke="currentColor" stroke-width="1.5" />
    <path d="M4 15C4 18.3171 6.68286 21 10 21L9.14286 19.2857" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
    <path d="M20 9C20 5.68286 17.3171 3 14 3L14.8571 4.71429" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
    <path d="M14.7888 19.0371C14.0814 19.42 12.2267 20.2019 13.3563 21.1803C13.9082 21.6582 14.5227 22 15.2954 22H19.7046C20.4773 22 21.0918 21.6582 21.6437 21.1803C22.7733 20.2019 20.9186 19.42 20.2112 19.0371C18.5524 18.1392 16.4476 18.1392 14.7888 19.0371Z" stroke="currentColor" stroke-width="1.5" />
    <path d="M19.75 14.2727C19.75 15.5279 18.7426 16.5455 17.5 16.5455C16.2574 16.5455 15.25 15.5279 15.25 14.2727C15.25 13.0175 16.2574 12 17.5 12C18.7426 12 19.75 13.0175 19.75 14.2727Z" stroke="currentColor" stroke-width="1.5" />
</svg>
                    Usuarios
                </a>
            </li>
            <li>
                <a href="rvehiculos">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" color="#FFF" fill="none">
    <path d="M11 18H15M13.5 8H14.4429C15.7533 8 16.4086 8 16.9641 8.31452C17.5196 8.62904 17.89 9.20972 18.6308 10.3711C19.1502 11.1854 19.6955 11.7765 20.4622 12.3024C21.2341 12.8318 21.6012 13.0906 21.8049 13.506C22 13.9038 22 14.375 22 15.3173C22 16.5596 22 17.1808 21.651 17.5755C21.636 17.5925 21.6207 17.609 21.6049 17.625C21.2375 18 20.6594 18 19.503 18H19" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
    <path d="M5 18C3.58579 18 2.87868 18 2.43934 17.5607C2 17.1213 2 16.4142 2 15V8C2 6.58579 2 5.87868 2.43934 5.43934C2.87868 5 3.58579 5 5 5H10.5C11.9142 5 12.6213 5 13.0607 5.43934C13.5 5.87868 13.5 6.58579 13.5 8V18H9" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
    <path d="M22 15H21" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
    <path d="M8 9V13M10 11L6 11" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
    <circle cx="17" cy="18" r="2" stroke="currentColor" stroke-width="1.5" />
    <circle cx="7" cy="18" r="2" stroke="currentColor" stroke-width="1.5" />
</svg>
                    Vehiculos
                </a>
            </li>
            <li>
                <a href="#">

                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" color="#FFF" fill="none">
    <path d="M7.02331 5.5C4.59826 7.11238 3 9.86954 3 13C3 17.9706 7.02944 22 12 22C16.9706 22 21 17.9706 21 13C21 9.86954 19.4017 7.11238 16.9767 5.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
    <path d="M12 2V10" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
</svg>
                    Logout
                </a>
            </li>
        </ul>
    </nav>