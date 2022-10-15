  <?= $this->extend('layout'); ?>
  <?= $this->section('content');

    use App\Controllers\Utils;

    $allFunction = new Utils();
    ?>
  <!-- MAIN -->
  <main class="container sm:max-w-screen-lg mx-auto px-0">
      <article>
          <div class="grid grid-cols-1 sm:grid-cols-3">
              <!-- TOP HEADLINE -->
              <div class="col-3 sm:col-span-2">
                  <?php if (!empty($highlight)) { ?>
                      <div class="top-headline relative" id="top-headline">
                          <img src="https://jakartainsight.com/upload/medium/<?php echo $highlight[0][0]['gambar'] ?>" class="object-cover w-full block" alt="..." />
                          <div class="w-full  bg-gradient-to-r from-blue-500 to-transparent  absolute inset-x-0 bottom-0 z-100 p-2  transparent">
                              <h1 class="text-white font-normal lg:text-xl">Arahan Kepala Perpusnas Pada Orasi Ilmiah Pustakawan Ahli Utama
                                  <span class="text-xs font-light">Selasa, 11 Oktober 2022 18:18:10</span>
                              </h1>
                          </div>
                      </div>
                  <?php } ?>


                  <!-- BERITA TERBARU -->
                  <i class="">
                      <h1 class="
                  px-3
                  sm:px-0
                  font-italic
                  text-md
                  sm:text-3xl
                  mt-2
                  font-extrabold
                  uppercase
                   text-blue-800
                ">
                          Berita Utama
                      </h1>
                  </i>

                  <div class="container titleheading mb-4 px-3 sm:px-0"></div>
                  <div class="items overflow-hidden px-1 sm:px-0 w-full">
                      <?php foreach ($beritautama as $value) { ?>
                          <div class="px-2">
                              <div class="box-images">
                                  <img src="https://jakartainsight.com/upload/medium/<?php echo $value['gambar'] ?>" alt="" />
                              </div>
                              <div class="title">
                                  <a href="<?php echo base_url() ?>/berita/detail/<?php echo $value['judul_seo'] ?>">
                                      <h1 class="text-sm font-light">
                                          <?php echo $value['judul'] ?>
                                      </h1>
                                  </a>
                              </div>
                          </div>
                      <?php } ?>

                  </div>

                  <section class="mt-6 px-3 sm:px-0">
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
                                      <img src="https://jakartainsight.com/upload/medium/<?php echo $terbaru['gambar'] ?>" alt="..." />
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



                      <div class="w-full text-center">
                          <button class="
                    bg-slate-500
                    p-2 py-2
                    leading-tight
                    text-white
                    font-semibold

                    md:rounded-lg
                    text-sm
                  ">
                              Berita Lainnya
                          </button>
                      </div>
                  </section>
              </div>

              <div class="px-2 ">
                  <aside class="bg-white p-3 py-2">

                      <!-- Heading Trending -->
                      <div class="flex flex-row">
                          <div class="bg-blue-500  w-[10px] mr-2"></div>
                          <h1 class="
                          px-3
                          sm:px-0
                          font-italic
                          text-md
                          sm:text:3xl
                          mt-4
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