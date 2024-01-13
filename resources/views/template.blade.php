<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{-- Fontawesome Icons Link  --}}
    <script src="https://kit.fontawesome.com/b91affedee.js"></script>
    {{-- Boxicons Icons Link --}}
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    {{-- Font family Link: Poppins & Noto Sans --}}
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@300;500;600;700&family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <title>@yield('title') || Real Estate Admin</title>
</head>
<body>

    <div class="dashboard-container bg-slate-50 primary-font relative">
        {{-- SIDE BAR MENU  --}}
        <aside class="sidebar h-full bg-slate-50 flex flex-col gap-3.5 py-3.5 px-2.5 overflow-y-scroll">
            <div class="flex justify-center">
                <img src="/img/logo.jpg" class="w-auto h-[7.5rem]" alt="logo">
            </div>
            <ul class="aside-menu p-0 m-0 flex flex-col gap-2 text-slate-500">
                <li>
                    <a href="/dashboard" class="flex items-center gap-4 font-medium py-3 px-[2.4rem] text-base bg-indigo-50 transition-all duration-300 hover:bg-indigo-100 active:bg-indigo-100 focus:outline-none focus:ring focus:ring-indigo-100 rounded-md">
                        <i class='bx bxs-dashboard'></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="/services" class="flex items-center gap-4 font-medium py-3 px-[2.4rem] text-base bg-indigo-50 transition-all duration-300 hover:bg-indigo-100 active:bg-indigo-100 focus:outline-none focus:ring focus:ring-indigo-100  rounded-md">
                        <i class='bx bxs-offer' ></i>
                        <span>Services</span>
                    </a>
                </li>

                <li>
                    <a href="/projects" class="flex items-center gap-4 font-medium py-3 px-[2.4rem] text-base bg-indigo-50 transition-all duration-300 hover:bg-indigo-100 active:bg-indigo-100 focus:outline-none focus:ring focus:ring-indigo-100 rounded-md">
                        <i class='bx bxs-objects-vertical-bottom' ></i>
                        <span>Projects</span>
                    </a>
                </li>

                <li>
                    <a href="/blog" class="flex items-center gap-4 font-medium py-3 px-[2.4rem] text-base bg-indigo-50 transition-all duration-300 hover:bg-indigo-100 active:bg-indigo-100 focus:outline-none focus:ring focus:ring-indigo-100 rounded-md">
                        <i class='bx bx-spreadsheet' ></i>
                        <span>Articles</span>
                    </a>
                </li>

                <li>
                    <a href="/categories" class="flex items-center gap-4 font-medium py-3 px-[2.4rem] text-base bg-indigo-50 transition-all duration-300 hover:bg-indigo-100 active:bg-indigo-100 focus:outline-none focus:ring focus:ring-indigo-100 rounded-md">
                        <i class='bx bx-category' ></i>
                        <span>Categories</span>
                    </a>
                </li>
                
                <li>
                    <a href="/clients" class="flex items-center gap-4 font-medium py-3 px-[2.4rem] text-base bg-indigo-50 transition-all duration-300 hover:bg-indigo-100 active:bg-indigo-100 focus:outline-none focus:ring focus:ring-indigo-100 rounded-md">
                        <i class='bx bx-male-female'></i>
                        <span>Clients</span>
                    </a>
                </li>

                <li>
                    <a href="/team" class="flex items-center gap-4 font-medium py-3 px-[2.4rem] text-base bg-indigo-50 transition-all duration-300 hover:bg-indigo-100 active:bg-indigo-100 focus:outline-none focus:ring focus:ring-indigo-100 rounded-md">
                        <i class='bx bxl-microsoft-teams'></i>
                        <span>Equipe</span>
                    </a>
                </li>

                <li>
                    <a href="/users" class="flex items-center gap-4 font-medium py-3 px-[2.4rem] text-base bg-indigo-50 transition-all duration-300 hover:bg-indigo-100 active:bg-indigo-100 focus:outline-none focus:ring focus:ring-indigo-100 rounded-md">
                        <i class='bx bxs-user-account'></i>
                        <span>Utilisateurs</span>
                    </a>
                </li>

                <li>
                    <a href="/settings" class="flex items-center gap-4 font-medium py-3 px-[2.4rem] text-base bg-indigo-50 transition-all duration-300 hover:bg-indigo-100 active:bg-indigo-100 focus:outline-none focus:ring focus:ring-indigo-100 rounded-md">
                        <i class='bx bx-cog' ></i>
                        <span>Paramatre</span>
                    </a>
                </li>
            </ul>
        </aside>

        {{-- GLOBAL CONTAINER  --}}
        <div class="main-container h-screen">
            {{-- CONTAINER HEADER --}}
            <header class="bg-slate-50 p-4 h-15 flex justify-between items-center">
                <svg xmlns="http://www.w3.org/2000/svg" onclick="closeMenu();" class="menu-btn hover:fill-slate-800" width="26" height="26" viewBox="0 0 24 24" style="fill: rgb(71 85 105);transform: ;msFilter:;"><path d="M4 6h16v2H4zm4 5h12v2H8zm5 5h7v2h-7z"></path></svg>
                {{-- <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 24 24" style="fill: rgb(71 85 105);transform: ;msFilter:;"><path d="M4 11h12v2H4zm0-5h16v2H4zm0 12h7.235v-2H4z"></path></svg> --}}
                <div class="flex items-center gap-4">
                    <div class="headline-font flex items-center gap-4 font-medium text-indigo-900">
                        <img src="/img/profile.jpg" width="28" height="28" class="rounded-full object-cover object-center" alt="profile">
                        <span>Kaba Plus</span>
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg" class="hover:fill-slate-800" width="24" height="24" viewBox="0 0 24 24" style="fill: rgb(71 85 105);transform: ;msFilter:;"><path d="m2 12 5 4v-3h9v-2H7V8z"></path><path d="M13.001 2.999a8.938 8.938 0 0 0-6.364 2.637L8.051 7.05c1.322-1.322 3.08-2.051 4.95-2.051s3.628.729 4.95 2.051 2.051 3.08 2.051 4.95-.729 3.628-2.051 4.95-3.08 2.051-4.95 2.051-3.628-.729-4.95-2.051l-1.414 1.414c1.699 1.7 3.959 2.637 6.364 2.637s4.665-.937 6.364-2.637c1.7-1.699 2.637-3.959 2.637-6.364s-.937-4.665-2.637-6.364a8.938 8.938 0 0 0-6.364-2.637z"></path></svg>
                </div>
            </header>

            <main class="p-4 bg-slate-200 h-full w-full overflow-y-scroll">
                @yield('content')
            </main>
        </div>
    </div>

    <script>
        const allModalBtns = document.querySelectorAll('.open-modal');
        const editModalBtns = document.querySelectorAll('.edit-btn');
        const overlay = document.querySelectorAll('.overlay');
        // const closeModal = document.querySelector('.close-modal');
        const closeModal = document.querySelectorAll('.close-modal');
        const modals = document.querySelectorAll('.modal');
        
        // OPEN MODAL 
        allModalBtns.forEach(modalBtn => {
            modalBtn.addEventListener('click', (e) => {
                if(e.target.id === modalBtn.id){
                    const attr = modalBtn.getAttribute('data-modalName');
                    modals.forEach(modal => {
                        if(modal.getAttribute(`data-${attr}`)){
                            modal.classList.toggle('hidden');
                        }
                    })
                }
            })
        });

        editModalBtns.forEach(editbtn => {
            editbtn.addEventListener('click', (e) => {
                const attr = e.target.getAttribute('data-edit');
                modals.forEach(modal => {
                    if(modal.getAttribute(`data-${attr}`)){
                        modal.classList.toggle('hidden');
                    }
                })
            })
        })

        // MODAL OVERLAY ONCLICK EVENT
        overlay.forEach(over => {
            over.addEventListener('click', (e) => {
                const currentModal = over.parentNode;
                currentModal.classList.toggle('hidden');
            });
        })

        // MODAL CLOSE BUTTON ONCLICK EVENT
        closeModal.forEach(close => {
            close.addEventListener('click', (e) => {
                const current = close.parentNode;
                current.parentNode.classList.toggle('hidden');
            });
        });

        // SIDEBAR MENU
        function closeMenu(){
            const sideBar = document.querySelector('.sidebar');
            const mainContainer = document.querySelector('.dashboard-container');
            const openValue = "M4 11h12v2H4zm0-5h16v2H4zm0 12h7.235v-2H4z";
            const closeValue = "M4 6h16v2H4zm4 5h12v2H8zm5 5h7v2h-7z";

            const path = document.querySelector('.menu-btn > path');
            const pathAttribute = path.getAttribute('d');
            
            if(pathAttribute === closeValue){
                path.setAttribute('d', openValue);
            }else{
                path.setAttribute('d', closeValue);
            }

            mainContainer.classList.toggle('fullScreen');
            sideBar.classList.toggle('isClose');
        }

    </script>

</body>
</html>