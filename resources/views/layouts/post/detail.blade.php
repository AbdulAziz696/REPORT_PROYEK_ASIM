@extends('welcome')
@section('post-detail')

    <div class=" mx-5 my-3 justify-start">

        <div class="hearder">
        <div class="title my-auto">
            <p class="leading-normal font-semibold text-3xl ">Layanan VSAT Star dan MangoStar Tarik Perhatian
                pada RAPIM CFUE Q2-2023</p>
                <p class="">created_date</p>
            </div>

                <div class="profile flex flex-row justify-start ms-0">
                    <img src="img/img-login.png"
                        alt=""class="rounded-circle img-fluid border border-solid border-white-250 w-10 h-10 me-2">
                    <div class="flex flex-col align-item justify-center">
                        <p class="text-xs font-semibold">username</p>
                        <p class="text-xs">role</p>

                    </div>
                </div>
                <div class="shape">
                    <svg xmlns="http://www.w3.org/2000/svg"
                    class="mt-[10px] xl:w-[88px]  xl:h-[8px] h-[4px] rounded-md" viewBox="0 0 88 8"
                    fill="none">
                    <path d="M4 4H84" stroke="#E30052" stroke-width="10" class="w-fit"
                        stroke-linecap="round">
                    </path>
                </svg>
                </div>
        </div>
        <div class="post my-3 mx-auto ">
            <div class="content ">
                <div class="img">
                    <img src="img/img-login.png" alt="" class=" w-full h-80 img-fluid  ">
                </div>
                <div class="content-text mt-4">
                    <p class=" font-semibold">Deskripsi</p>
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Magnam dolor accusamus maiores incidunt aut quasi quis officiis quia distinctio officia, hic ullam, repudiandae iure maxime necessitatibus, nihil obcaecati sint non. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore consequuntur est reiciendis eveniet corporis cumque veritatis, aspernatur suscipit porro facilis doloremque voluptatibus voluptatem repudiandae maxime placeat eaque fugit vel inventore?Lorem ipsum dolor sit amet consectetur adipisicing elit. Placeat enim dignissimos fugiat libero perspiciatis fuga eveniet, molestiae ducimus iusto veritatis animi adipisci corporis necessitatibus quae facilis. Dolores quia id illum.</p>
                </div>
                <div class="content-link flex flex-row mt-4 ">
                    <p class=" font-semibold">Berikut link akses projeknya:</p>
                   <a href="#" class=" ms-1 hover:text-blue-700">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</a>
                </div>
            </div>
        </div>
    </div>
    @endsection
