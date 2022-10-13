<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="<?php echo base_url()?>/css/output.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/gh/kenwheeler/slick@1.8.1/slick/slick-theme.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap");

        body {
            font-family: 'Poppins', sans-serif, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        }
    </style>
    <title>Eksplisit.co.id</title>
</head>

<body>
    <!-- HEADER -->
    <header class="
        container
        sm:flex
        sm:justify-center
        sm:flex-col
        sm:container
        sm:mx-auto
        sm:max-w-screen-lg
        sm:px-0
      ">
        <div class="py-3 px-2 sm:px-0">
            <h1 class="text-back-gradient text-lg md:text-3xl bg-black">
                EKSPLISIT.CO.ID
            </h1>
        </div>
        <!-- Navigation-->
        <nav class="
          overscroll-y-none
          back-gradient
          flex flex-start
          sm:justify-start
          w-full
          overflow-hidden
          lg:container
          text-white
          px-1
          sm:px-0
        ">
            <ul id="menu" class=" py-1
            flex flex-row
            overflow-scroll
            sm:overflow-hidden
            sm:justify-between
            text-center
            w-full
          ">
                <li class="whitespace-nowrap font-semibold p-1 mx-auto px-2 text-xs hover:text-blue-200 active" >
            <a class="" aria-current=" page" href="<?php echo base_url()?>/"> Berita </a>
                </li>
                <li class="whitespace-nowrap font-semibold p-1 mx-auto text-xs hover:text-blue-200">
                    <a class="" aria-current="page" href="<?php echo base_url()?>/kategori/nasional"> Nasional </a>
                </li>
                <li class="whitespace-nowrap font-semibold p-1 mx-auto text-xs hover:text-blue-200">
                    <a class="" aria-current="page" href="<?php echo base_url()?>/kategori/international"> International </a>
                </li>
                <li class="whitespace-nowrap font-semibold p-1 mx-auto text-xs hover:text-blue-200 ">
                    <a class="" aria-current="page" href="<?php echo base_url()?>/kategori/ekonomi"> Ekonomi </a>
                </li>
                <li class="whitespace-nowrap font-semibold p-1 mx-auto text-xs hover:text-blue-200">
                    <a class="" aria-current="page" href="<?php echo base_url()?>/kategori/"> Olahraga </a>
                </li>
                <li class="whitespace-nowrap font-semibold p-1 mx-auto text-xs hover:text-blue-200">
                    <a class="" aria-current="page" href="<?php echo base_url()?>/kategori/teknologi"> Teknologi </a>
                </li>
                <li class="whitespace-nowrap font-semibold p-1 mx-auto text-xs hover:text-blue-200">
                    <a class="" aria-current="page" href="<?php echo base_url()?>/kategori/otomotif"> Otomotif </a>
                </li>
                <li class="whitespace-nowrap font-semibold p-1 mx-auto text-xs hover:text-blue-200">
                    <a class="" aria-current="page" href="<?php echo base_url()?>/kategori/gaya-hidup"> Gaya Hidup </a>
                </li>
                <li class="whitespace-nowrap font-semibold p-1 mx-auto text-xs hover:text-blue-200">
                    <a class="" aria-current="page" href="<?php echo base_url()?>/kategori/hiburan"> Hiburan </a>
                </li>
                <li class="whitespace-nowrap font-semibold p-1 mx-auto text-xs hover:text-blue-200">
                    <a class="" aria-current="page" href="<?php echo base_url()?>/kategori/ragam"> Ragam </a>
                </li>
                <li class="whitespace-nowrap font-semibold p-1 mx-auto text-xs hover:text-blue-200">
                    <a class="" href="<?php echo base_url()?>/kategori/link"> Link </a>
                </li>
            </ul>
        </nav>
        <div class="container">
            <marquee class="text-sm font-bold">
            <?php if(!empty($runningtext))
            {
                ?>
              <a href="<?php echo base_url()?>/berita/detail/<?php echo $runningtext[0]['judul_seo']?>"><?php echo $runningtext[0]['judul']?>
                <span class="dot font-bold"></span> </a>

                <?php } ?>
            </marquee>
        </div>
    </header>


    <?= $this->renderSection('content') ?>


    <footer class="px-5 sm:px-0 container sm:max-w-screen-lg mx-auto px-0 mt-12">
        <!-- Alamat Kantor -->
        <div class="w-full sm:w-1/2">
            <div class="py-3 px-2 sm:px-0">
                <h1 class="text-back-gradient text-xl md:text-3xl bg-black">
                    EKSPLISIT.CO.ID
                </h1>

                <ul class="text-sm flex flex-col space-y-1">
                    <li>
                        <h2 class="font-bold text-sm ">PT. EKSPLISIT kreatif media</h2>
                    </li>
                    <li class="text-xs sm:text-md">Lt. 2 Jl. Tanjung Karang No.5, RT.11/RW.20, Kebon Melati, Tanah Abang, Central Jakarta City, Jakarta 10230</li>
                    <li class="text-xs sm:text-md">eksplisitkreatifmedia@gmail.com</li>
                    <li class="text-xs sm:text-md">0878-8672-308</li>
                </ul>
            </div>
        </div>
        <div class="w-full relative mt-10 ">
            <div class="fixed bottom-0 left-0 right-0 bg-blue-500">
                <div class="flex flex-row items-center justify-between">


                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g id="arrow_upward_24px">
                            <path id="icon/navigation/arrow_upward_24px" d="M4 12L5.41 13.41L11 7.83V20H13V7.83L18.58 13.42L20 12L12 4L4 12Z" class="fill-white border rounded-lg bg-white" fill-opacity="0.54" />
                        </g>
                    </svg>

                </div>

            </div>
        </div>
        <!-- Peta situs -->
    </footer>

    <script>
        let topheadline = document.getElementById("top-headline");
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script>
        $(document).ready(function() {
            $(".items").slick({
                infinite: true,
                slidesToShow: 2,
                slidesToScroll: 3,
                autoplay: true,
            });
        });
    </script>
</body>

</html>