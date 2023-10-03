<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>K-WD Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;700;900&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="build/css/tailwind.css" />
    <script src="https://cdn.jsdelivr.net/gh/alpine-collective/alpine-magic-helpers@0.5.x/dist/component.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.3/dist/alpine.min.js" defer></script>

    {{-- Link Bootsrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    {{-- Link Tailwind CSS --}}
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

<script src="//cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.tailwindcss.min.js"></script>

    {{-- datatables --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.tailwindcss.min.css">

    {{-- font --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">

    {{-- CK EDITOR --}}

    {{-- SweetAlert --}}
    {{-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="sweetalert2.all.min.js"></script>
 <script src="sweetalert2.min.js"></script>
<link rel="stylesheet" href="sweetalert2.min.css">  --}}


</head>

<body>
    <div x-data="setup()" x-init="$refs.loading.classList.add('hidden');
    setColors(color);" :class="{ 'dark': isDark }">
        <div class="flex h-screen antialiased text-gray-900 dark:bg-dark dark:text-light">
            <!-- Loading screen -->
            @include('layouts.components.loading')

            <!-- Sidebar -->
            @include('layouts.components.sidebar')

            <!-- Navbar -->
            <div class=" container flex flex-col flex-1 h-screen overflow-x-hidden justify-between overflow-y-auto ">
                @include('layouts.components.navbar')



                <!-- Main content -->
                <main class="container mb-auto ">

                    @yield('main')
                    {{-- @yield('main') --}}
                    @yield('post-detail')




                </main>

                <!-- Main footer -->
                @include('layouts.components.footer')
            </div>
        </div>

        <!-- Panels -->


    </div>
    </div>

    <!-- All javascript code in this project for now is just for demo DON'T RELY ON IT  -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.bundle.min.js"></script>
    <script src="build/js/script.js"></script>
    <script>
        const setup = () => {
            const getTheme = () => {
                if (window.localStorage.getItem('dark')) {
                    return JSON.parse(window.localStorage.getItem('dark'))
                }

                return !!window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches
            }

            const setTheme = (value) => {
                window.localStorage.setItem('dark', value)
            }

            const getColor = () => {
                if (window.localStorage.getItem('color')) {
                    return window.localStorage.getItem('color')
                }
                return 'cyan'
            }

            const setColors = (color) => {
                const root = document.documentElement
                root.style.setProperty('--color-primary', `var(--color-${color})`)
                root.style.setProperty('--color-primary-50', `var(--color-${color}-50)`)
                root.style.setProperty('--color-primary-100', `var(--color-${color}-100)`)
                root.style.setProperty('--color-primary-light', `var(--color-${color}-light)`)
                root.style.setProperty('--color-primary-lighter', `var(--color-${color}-lighter)`)
                root.style.setProperty('--color-primary-dark', `var(--color-${color}-dark)`)
                root.style.setProperty('--color-primary-darker', `var(--color-${color}-darker)`)
                this.selectedColor = color
                window.localStorage.setItem('color', color)
                //
            }






            return {
                loading: true,
                isDark: getTheme(),
                toggleTheme() {
                    this.isDark = !this.isDark
                    setTheme(this.isDark)
                },
                setLightTheme() {
                    this.isDark = false
                    setTheme(this.isDark)
                },
                setDarkTheme() {
                    this.isDark = true
                    setTheme(this.isDark)
                },
                color: getColor(),
                selectedColor: 'cyan',
                setColors,
                toggleSidbarMenu() {
                    this.isSidebarOpen = !this.isSidebarOpen
                },
                isMobileSubMenuOpen: false,
                openMobileSubMenu() {
                    this.isMobileSubMenuOpen = true
                    this.$nextTick(() => {
                        this.$refs.mobileSubMenu.focus()
                    })
                },
                isMobileMainMenuOpen: false,
                openMobileMainMenu() {
                    this.isMobileMainMenuOpen = true
                    this.$nextTick(() => {
                        this.$refs.mobileMainMenu.focus()
                    })
                },

            }
        }
    </script>


    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>

    {{-- @endsection --}}
    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.2/classic/ckeditor.js"></script>

    <script>
        ClassicEditor
            .create( document.querySelector( '#editor' ) )
            .catch( error => {console.error( error );
            } );
            <script src="https://unpkg.com/sweetalert@2.1.2/dist/sweetalert.min.js"></script>
    </script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
<script type="text/javascript">
  // get all delete buttons
var deleteButtons = document.querySelectorAll('.buttondelete');

// add an event listener to each delete button
deleteButtons.forEach(function (deleteButton) {
    deleteButton.addEventListener('click', function (e) {
        e.preventDefault();
        var id = deleteButton.dataset.id;
        var name = deleteButton.dataset.nama;
        swal({
            title: "Are you sure?",
            text: "You are about to delete " + name + ". This action cannot be undone!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            confirmButtonClass: "btn-danger",
            confirmButtonText: "Yes, delete it!",
            cancelButtonText: "No, cancel",
            closeOnConfirm: true,
            closeOnCancel: false
        }).then(function (isConfirm) {
            if (isConfirm) {
                $.ajax({
                    type: "DELETE",
                    url: "{{ url('user') }}/" + id,
                    data: {
                        "_token": "{{ csrf_token() }}"
                    },
                    success: function (data) {
                        // handle success response
                    },
                    error: function (xhr) {
                        // handle error response
                    }
                });
                swal("Deleted!", name + " has been deleted.", "success");
            } else {
                swal("Cancelled", name + " deletion has been cancelled.", "error");
            }
        });
    });
});
        </script>
</body>



</html>
