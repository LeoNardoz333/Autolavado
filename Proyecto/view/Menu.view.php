
<style>
    .navigation {
        width: 100%;
        background: #93C3CE;
        display: flex;
        justify-content: space-around;
        align-items: center;
        padding: 1rem 0;
    }

    .nav-list {
        list-style-type: none;
        display: flex;
        gap: 0.5rem;
    }

    .nav-list>li>a {
        text-decoration: none;
        color: #000;
        padding: 0.5rem 1rem;
        border-radius: 0.5rem;
        transition: background-color 0.3s ease;
    }

    .nav-list>li>a:hover {
        background-color: rgba(255, 255, 255, 0.2);
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
                <a href="rclientes">
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" color="#000" fill="none">
    <path d="M9.00684 17C9.00684 18.1046 8.11141 19 7.00684 19C5.90227 19 5.00684 18.1046 5.00684 17C5.00684 15.8954 5.90227 15 7.00684 15C8.11141 15 9.00684 15.8954 9.00684 17Z" stroke="currentColor" stroke-width="1.5" />
    <path d="M19.0068 17C19.0068 18.1046 18.1114 19 17.0068 19C15.9022 19 15.0068 18.1046 15.0068 17C15.0068 15.8954 15.9022 15 17.0068 15C18.1114 15 19.0068 15.8954 19.0068 17Z" stroke="currentColor" stroke-width="1.5" />
    <path d="M2.00686 10H18.0069M2.00686 10C2.00686 10.78 1.98687 13.04 2.01085 15.26C2.04682 15.98 2.16673 16.58 5.00857 17M2.00686 10C2.22269 8.26 3.16197 6.2 3.64161 5.42M9.00686 10V5M14.997 17H9.00152M2.02284 5H12.2391C12.2391 5 12.7786 5 13.2583 5.048C14.1576 5.132 14.913 5.54 15.6684 6.56C16.4683 7.64 17.0834 9.008 17.8987 9.74C19.2537 10.9564 21.8318 10.58 21.9756 13.16C22.0116 14.48 22.0116 15.92 21.9517 16.16C21.8554 16.8667 21.3105 16.9821 20.6327 17C20.0444 17.0156 19.3353 16.9721 18.9899 17" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
</svg>
                    <!-- <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-heartbeat"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M19.5 13.572l-7.5 7.428l-2.896 -2.868m-6.117 -8.104a5 5 0 0 1 9.013 -3.022a5 5 0 1 1 7.5 6.572" /><path d="M3 13h2l2 3l2 -6l1 3h3" /></svg> -->
                    Registro Clientes
                </a>
            </li>
			<!-- <li>
                <a href="menuadm">
				<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" color="#000" fill="none">
    <path d="M20.9427 16.8354C20.2864 12.8866 18.2432 9.94613 16.467 8.219C15.9501 7.71642 15.6917 7.46513 15.1208 7.23257C14.5499 7 14.0592 7 13.0778 7H10.9222C9.94081 7 9.4501 7 8.87922 7.23257C8.30834 7.46513 8.04991 7.71642 7.53304 8.219C5.75682 9.94613 3.71361 12.8866 3.05727 16.8354C2.56893 19.7734 5.27927 22 8.30832 22H15.6917C18.7207 22 21.4311 19.7734 20.9427 16.8354Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
    <path d="M7.25662 4.44287C7.05031 4.14258 6.75128 3.73499 7.36899 3.64205C8.00392 3.54651 8.66321 3.98114 9.30855 3.97221C9.89237 3.96413 10.1898 3.70519 10.5089 3.33548C10.8449 2.94617 11.3652 2 12 2C12.6348 2 13.1551 2.94617 13.4911 3.33548C13.8102 3.70519 14.1076 3.96413 14.6914 3.97221C15.3368 3.98114 15.9961 3.54651 16.631 3.64205C17.2487 3.73499 16.9497 4.14258 16.7434 4.44287L15.8105 5.80064C15.4115 6.38146 15.212 6.67187 14.7944 6.83594C14.3769 7 13.8373 7 12.7582 7H11.2418C10.1627 7 9.6231 7 9.20556 6.83594C8.78802 6.67187 8.5885 6.38146 8.18945 5.80064L7.25662 4.44287Z" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round" />
    <path d="M13.6267 12.9186C13.4105 12.1205 12.3101 11.4003 10.9892 11.9391C9.66829 12.4778 9.45847 14.2113 11.4565 14.3955C12.3595 14.4787 12.9483 14.2989 13.4873 14.8076C14.0264 15.3162 14.1265 16.7308 12.7485 17.112C11.3705 17.4932 10.006 16.8976 9.85742 16.0517M11.8417 10.9927V11.7531M11.8417 17.2293V17.9927" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
</svg>
                    ADMIN MENU
                </a>
            </li> -->
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
 
            <!-- <li>
                <a href="login">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" color="#1b21be" fill="none">
    <path d="M12.5 22H6.59087C5.04549 22 3.81631 21.248 2.71266 20.1966C0.453366 18.0441 4.1628 16.324 5.57757 15.4816C7.97679 14.053 10.8425 13.6575 13.5 14.2952" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
    <path d="M16.5 6.5C16.5 8.98528 14.4853 11 12 11C9.51472 11 7.5 8.98528 7.5 6.5C7.5 4.01472 9.51472 2 12 2C14.4853 2 16.5 4.01472 16.5 6.5Z" stroke="currentColor" stroke-width="1.5" />
    <path d="M16.7596 16.378C15.6796 16.378 15.2171 17.1576 15.0971 17.6373C14.9771 18.117 14.9771 19.856 15.0491 20.5755C15.2891 21.475 15.8891 21.8468 16.4771 21.9667C17.0171 22.0147 19.2971 21.9967 19.9571 21.9967C20.9171 22.0147 21.6371 21.6549 21.9371 20.5755C21.9971 20.2157 22.0571 18.2369 21.9071 17.6373C21.5891 16.6778 20.866 16.378 20.266 16.378M16.7596 16.378H20.266M16.7596 16.378C16.7596 16.378 16.7582 15.5516 16.7596 15.1173C16.7609 14.7204 16.726 14.3378 16.9156 13.9876C17.626 12.5748 19.666 12.7187 20.17 14.1579C20.2573 14.3948 20.2626 14.7704 20.26 15.1173C20.2567 15.5605 20.266 16.378 20.266 16.378" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
</svg>
                    Login
                </a>
            </li>      -->
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
    </nav>
