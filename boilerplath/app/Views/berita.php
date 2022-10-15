<?= $this->extend('layout'); ?>
<?= $this->section('content');

use App\Controllers\Utils;

$allFunction = new Utils(); ?>


<main class="container sm:max-w-screen-lg mx-auto px-4">
    <article>
        <div class="grid grid-cols-1 sm:grid-cols-3">
            <!-- TOP HEADLINE -->
            <div class="col-3 sm:col-span-2">


                <!-- Detail Berita -->
                <div class="detailberita px-3 sm:px-0">
                    <h1 class="text-2xl sm:text-3xl font-medium mb-4"><?php echo $detailberita[0][0]['judul'] ?></h1>

                    <!-- Penulis dan tanggal berita -->
                    <div class="flex flex-row items-center justify-between mb-4">
                        <div class="penulis font-semibold text-xs sm:text-md text-gray-500 break-normal">
                            <?php echo $detailberita[0][0]['peliput'] ?>
                        </div>
                        <div class="tanggal font-light text-xs sm:text-sm text-gray-500">
                            <?php echo $detailberita[0][0]['tanggal'] ?>
                        </div>
                    </div>

                    <!-- Gambar -->
                    <div class="box-images">
                        <img src="https://jakartainsight.com/upload/medium/<?php echo $detailberita[0][0]['gambar'] ?>" alt="<?php echo $detailberita[0][0]['judul'] ?>">
                        <span class="text-xs">Berdiri Sejak 1925, Kantor PT Perkebunan XI Masih Tetap Berfungsi (Foto : antvklik-Zainal)</span>
                    </div>

                    <!-- Isi Berita -->

                    <div class="isiberita mt-4 leading-8 sm:leading-10 text-gray-800 font-light text-md">
                        <?php echo $detailberita[0][0]['isi'] ?>
                    </div>

                    <!-- Baca Juga -->
                    <div class="bacajuga border rounded-lg bg-blue-100 p-4 my-6">
                        <h5 class="font-semibold mb-3">Baca juga :</h5>
                        <ul class="space-y-2 font-semibold text-gray-600 text-sm">
                            <li><a href="#">* Hal yang memicu anak menjadi tantrum</a></li>
                            <li><a href="#">* PPM didesak polisi segera tangkap Alvin Lim Terpidana 4,5 tahun</a></li>
                            <li><a href="#">* Hal yang memicu anak menjadi tantrum</a></li>
                            <li><a href="#">* Hal yang memicu anak menjadi tantrum</a></li>
                        </ul>
                    </div>


                </div>



                <div class="container titleheading mb-4 px-3 sm:px-0"></div>
                <div class="items overflow-hidden px-1 sm:px-0 w-full">
                    <?php foreach ($beritaterbaru as $terbaru) { ?>

                        <div class="px-2">
                            <div class="box-images">
                                <img src="https://jakartainsight.com/upload/medium/<?php echo $terbaru['gambar'] ?>" alt="..." />
                            </div>
                            <div class="title">
                                <a href="<?php echo base_url() ?>/berita/detail/<?php echo $terbaru['judul_seo'] ?>">
                                    <h1 class="text-sm">
                                        <?php echo $terbaru['judul'] ?>
                                    </h1>
                                </a>
                            </div>
                        </div>
                    <?php } ?>


                    <div class="px-2">
                        <div class="box-images">
                            <img src="/dist/images/img1.jpg" class="img-fluid" alt="..." />
                        </div>
                        <div class="title">
                            <h1>
                                2023 NPWP Akan dihantik Menjadi NIK ( Nomer Induk
                                Kependudukan)
                            </h1>
                        </div>
                    </div>


                </div>

                <section class="mt-10 px-3 sm:px-0">
                    <i>
                        <h1 class="
                    font-italic
                    text-md
                    sm:text-3xl
                    mt-2
                    font-extrabold
                    uppercase
                    mb-6
                     text-gray-500
                  ">
                            Berita Terbaru
                        </h1>
                    </i>

                    <!-- berita-berita -->
                    <?php foreach ($beritaterbaru as $terbaru) { ?>
                        <div class="flex flex-row justify-start items-center border-b mb-4 py-2   bg-white">
                            <div class="w-2/5 h-full sm:w-1/4 self-center">
                                <div class="box-image p-2">
                                    <img src="https://jakartainsight.com/upload/medium/<?php echo $terbaru['gambar'] ?>" alt="" />
                                </div>
                            </div>
                            <div class="w-3/5 sm:w-3/4 self-center">
                                <a href="<?php echo base_url() ?>/berita/detail/<?php echo $terbaru['judul_seo'] ?>">
                                    <h1 class="text-sm md:text-lg font-semibold p-2">
                                        <?php echo $terbaru['judul'] ?>
                                    </h1>
                                </a>
                                <div class="block text-xs p-2 font-semibold text-gray-900">
                                    <?php echo ucfirst($terbaru['kategoriberita']) ?> :
                                    <span class="text-gray-500"> <?php
                                                                    $date = $allFunction->get_time_ago($terbaru['tanggal']);
                                                                    echo $date; ?></span>
                                </div>
                            </div>

                        </div>

                    <?php } ?>



                </section>
            </div>

            <div class="px-2 mt-8 sm:mt-0">
                <aside class="bg-white p-3 py-2">

                    <!-- Heading Trending -->
                    <div class="flex flex-row">
                        <div class="bg-blue-500  w-[10px] mr-2"></div>
                        <h1 class="
                          px-3
                          sm:px-0
                          font-italic
                          text-xl
                          sm:text:3xl
                          mt-0
                          sm:mt-0
                          font-bold
                          uppercase
                          text-gray-600
                        ">
                            trending
                        </h1>
                    </div>

                    <!-- Trending Berita -->
                    <div class="mt-4">
                    </div>
                    <div class="flex flex-row justify-items-center items-center border-b  py-4  sm:hidden">
                        <div class="boxbanner">
                            <img src="<?php echo base_url() ?>/images/bannerkanan.jpg" class="" alt="..." />
                        </div>
                    </div>

                    <?php $no = 1;
                    foreach ($beritatrending as $trending) { ?>
                        <div class="flex flex-row justify-items-center items-center border-b  py-4 ">
                            <div class="w-12 pl-1 sm:pl-5">
                                <span class="font-semibold text-gray-800 text-2xl"><?php echo $no ?></span>
                            </div>
                            <div class="w-auto px-5 flex justify-between flex-col">
                                <a href="<?php echo base_url() ?>/berita/detail/<?php echo $trending['judul_seo'] ?>">
                                    <h1 class="font-bolder text-gray-800 mb-2"><?php echo $trending['judul'] ?></h1>
                                </a>
                                <div class="inline"><span class="text-xs text-gray-900 font-semibold bg-red-100 px-2 mr-2 "><?php echo ucfirst($trending['kategoriberita']) ?> </span>
                                    <span class="text-xs text-blue-500 font-semibold ">
                                        <?php
                                        $date = $allFunction->get_time_ago($trending['tanggal']);
                                        echo $date; ?>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <?php if ($no == 4) {     ?>
                            <div class="hidden flex-row justify-items-center items-center border-b  py-4  sm:flex">
                                <div class="boxbanner">
                                    <img src="<?php echo base_url() ?>/images/bannerkanan.jpg" class="" alt="..." />
                                </div>
                            </div>
                        <?php } ?>
                    <?php $no++;
                    } ?>

                </aside>
            </div>


    </article>
</main>

<?= $this->endSection() ?>