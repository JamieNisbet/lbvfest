<!-- PAGE HEADER -->
<div class="rounded-t mb-0 mt-3 px-4 py-3 border-0">
   <div class="flex flex-wrap items-center">
      <!-- PAGE TITLE -->
      <div class="relative w-full px-4 max-w-full flex-grow flex-1 ">
         <h1 class="font-semibold text-3xl text-white">
            <?= $title ?>
         </h1>
      </div>
   </div>
</div>

<!-- PAGE TABLE -->
<div class="w-full h-4/5  overflow-y-auto  mt-5 px-4">
   <main>
      <div class="pt-6 px-4">
         <div class=" mb-4 w-full grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-4">
            <a href="<?= base_url() ?>/admin/employees" class="bg-white shadow rounded-lg p-4 sm:p-6 xl:p-8 ">
               <div class="flex items-center">
                  <div class="flex-shrink-0">
                     <span class="text-2xl sm:text-3xl leading-none font-bold text-gray-900">
                        <?= count($employees) ?>
                     </span>
                     <h3 class="text-base font-normal text-gray-500">Projects</h3>
                  </div>

               </div>
            </a>
            <a href="<?= base_url() ?>/admin/clients" class="bg-white shadow rounded-lg p-4 sm:p-6 xl:p-8 ">
               <div class="flex items-center">
                  <div class="flex-shrink-0">
                     <span class="text-2xl sm:text-3xl leading-none font-bold text-gray-900">
                        <?= count($clients) ?>
                     </span>
                     <h3 class="text-base font-normal text-gray-500">Total Clients</h3>
                  </div>
                  <div class="ml-5 w-0 flex items-center justify-end flex-1 text-green-500 text-base font-bold">

                  </div>
               </div>
            </a>
            <a href="<?= base_url() ?>/admin/leave" class="bg-white shadow rounded-lg p-4 sm:p-6 xl:p-8 ">
               <div class="flex items-center">
                  <div class="flex-shrink-0">
                     <span class="text-2xl sm:text-3xl leading-none font-bold text-gray-900">
                        <?= count($on_leave_today) ?>
                     </span>
                     <h3 class="text-base font-normal text-gray-500">Employees on Leave</h3>
                  </div>
                  <div class="ml-5 w-0 flex items-center justify-end flex-1 text-red-500 text-base font-bold">

                  </div>
               </div>
            </a>
         </div>
         <div class="w-full ">




            <div class="grid grid-cols-1 2xl:grid-cols-2 xl:gap-4 my-4">
               <div class="bg-white shadow rounded-lg p-4 sm:p-6 xl:p-8">
                  <div class="flex items-center justify-between mb-4">
                     <h3 class="text-xl font-bold leading-none text-gray-900">Apoyar Ltd</h3>
                  </div>
                  <div class="flow-root">
                     <ul role="list" class="divide-y divide-gray-200">
                        <?php foreach ($employees as $employee) { ?>
                           <li class="py-3 sm:py-4">
                              <div class="flex items-center space-x-4">
                                 <div class="flex-shrink-0">
                                    <a href="<?= base_url() ?>/admin/profile/<?= $employee['pk_user_id'] ?>">
                                       <img class="h-8 w-8 rounded-full" src="./images/avatar_placeholder.png"
                                          alt="Neil image">
                                    </a>
                                 </div>
                                 <div class="flex-1 min-w-0">
                                    <p class="text-sm font-medium text-gray-900 truncate">
                                       <?= $employee['first_name'] . " " . $employee['last_name'] ?>
                                    </p>
                                    <p class="text-sm text-gray-500 truncate">
                                       <?= $employee['designation'] ?>
                                    </p>
                                 </div>
                                 <?php foreach($on_leave_today as $leave) {
                                       if ($leave['fk_user_id'] == $employee['pk_user_id']) { ?>
                              <div class="flex-shrink-0">
                                       <div
                                          class="flex items-center justify-center px-3 py-2 space-x-2 text-sm tracking-wide text-white transition-colors duration-200 transform bg-red-500 rounded-md dark:bg-red-600 dark:hover:bg-red-700 dark:focus:bg-red-700 hover:bg-red-600 focus:outline-none focus:bg-red-500 focus:ring focus:ring-red-300 focus:ring-opacity-50">
                                          on leave
                                       </div>
                           </div>
                                    <?php   } else {
         $now = new \CodeIgniter\I18n\Time('now', 'Europe/Brussels');
         $time = explode(" ", $now)[1];
         $hour = explode(":", $time)[0];
         if ($hour > 6 && $hour < 15) { ?>

<div class="flex-shrink-0">
                                       <div
                                          class="flex items-center justify-center px-3 py-2 space-x-2 text-sm tracking-wide text-white transition-colors duration-200 transform bg-green-500 rounded-md dark:bg-green-600 dark:hover:bg-green-700 dark:focus:bg-green-700 hover:bg-green-600 focus:outline-none focus:bg-green-500 focus:ring focus:ring-green-300 focus:ring-opacity-50">
                                          available
                                       </div>
                                    </div>
                                    <?php } else { ?>
                                    <div class="flex-shrink-0">
                                       <div
                                          class="flex items-center justify-center px-3 py-2 space-x-2 text-sm tracking-wide text-white transition-colors duration-200 transform bg-gray-500 rounded-md dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:bg-gray-700 hover:bg-gray-600 focus:outline-none focus:bg-gray-500 focus:ring focus:ring-gray-300 focus:ring-opacity-50">
                                          out of office
                                       </div>
                                    </div>
                                  <?php  }}} ?>

                                   
                        
                      
                        

                                 <div class="inline-flex items-center text-base font-semibold text-gray-900">

                                    <div class="p-2">

                                       <?php if ($employee['location_id'] == 1) { ?>
                                          <svg width="30px" height="30px" viewBox="0 0 64 64"
                                             xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                             aria-hidden="true" role="img" class="iconify iconify--emojione"
                                             preserveAspectRatio="xMidYMid meet" fill="#000000">
                                             <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                             <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                             <g id="SVGRepo_iconCarrier">
                                                <path d="M31.8 2c-13 0-24.1 8.4-28.2 20h56.6C56 10.4 44.9 2 31.8 2z"
                                                   fill="#f2b200"> </path>
                                                <path d="M31.8 62c13.1 0 24.2-8.3 28.3-20H3.6c4.1 11.7 15.2 20 28.2 20z"
                                                   fill="#83bf4f"> </path>
                                                <path
                                                   d="M3.6 22c-1.1 3.1-1.7 6.5-1.7 10s.6 6.9 1.7 10h56.6c1.1-3.1 1.7-6.5 1.7-10s-.6-6.9-1.7-10H3.6"
                                                   fill="#ffffff"> </path>
                                                <circle cx="31.8" cy="32" r="8" fill="#428bc1"> </circle>
                                                <circle cx="31.8" cy="32" r="7" fill="#ffffff"> </circle>
                                                <g fill="#428bc1">
                                                   <circle cx="29.2" cy="25.5" r=".5"> </circle>
                                                   <circle cx="27.6" cy="26.4" r=".5"> </circle>
                                                   <circle cx="26.3" cy="27.7" r=".5"> </circle>
                                                   <circle cx="25.4" cy="29.3" r=".5"> </circle>
                                                   <circle cx="24.9" cy="31.1" r=".5"> </circle>
                                                   <circle cx="24.9" cy="32.9" r=".5"> </circle>
                                                   <circle cx="25.4" cy="34.7" r=".5"> </circle>
                                                   <circle cx="26.3" cy="36.3" r=".5"> </circle>
                                                   <circle cx="27.6" cy="37.6" r=".5"> </circle>
                                                   <circle cx="29.2" cy="38.5" r=".5"> </circle>
                                                   <circle cx="30.9" cy="38.9" r=".5"> </circle>
                                                   <path
                                                      d="M32.3 39c0-.3.2-.5.4-.6c.3 0 .5.2.6.4c0 .3-.2.5-.4.6c-.4.1-.6-.1-.6-.4">
                                                   </path>
                                                   <circle cx="34.5" cy="38.5" r=".5"> </circle>
                                                   <circle cx="36.1" cy="37.6" r=".5"> </circle>
                                                   <circle cx="37.4" cy="36.3" r=".5"> </circle>
                                                   <circle cx="38.3" cy="34.7" r=".5"> </circle>
                                                   <circle cx="38.8" cy="32.9" r=".5"> </circle>
                                                   <path
                                                      d="M38.8 31.6c-.3 0-.5-.2-.6-.4c0-.3.2-.5.4-.6c.3 0 .5.2.6.4c.1.3-.1.5-.4.6">
                                                   </path>
                                                   <circle cx="38.3" cy="29.3" r=".5"> </circle>
                                                   <circle cx="37.4" cy="27.7" r=".5"> </circle>
                                                   <circle cx="36.1" cy="26.4" r=".5"> </circle>
                                                   <path
                                                      d="M35 25.7c-.1.3-.4.4-.7.3c-.3-.1-.4-.4-.3-.7c.1-.3.4-.4.7-.3c.3.2.4.5.3.7">
                                                   </path>
                                                   <path
                                                      d="M33.2 25.1c0 .3-.3.5-.6.4c-.3 0-.5-.3-.4-.6c0-.3.3-.5.6-.4c.3.1.5.4.4.6">
                                                   </path>
                                                   <path
                                                      d="M31.4 25c0 .3-.2.5-.4.6c-.3 0-.5-.2-.6-.4c0-.3.2-.5.4-.6c.3-.1.6.1.6.4">
                                                   </path>
                                                   <circle cx="31.8" cy="32" r="1.5"> </circle>
                                                   <path d="M31.8 25l-.2 4.3l.2 2.7l.3-2.7z"> </path>
                                                   <path d="M30 25.2l.9 4.3l.9 2.5l-.4-2.7z"> </path>
                                                   <path d="M28.3 25.9l2 3.9l1.5 2.2l-1.1-2.5z"> </path>
                                                   <path d="M26.9 27l2.9 3.3l2 1.7l-1.7-2.1z"> </path>
                                                   <path d="M25.8 28.5l3.6 2.4l2.4 1.1l-2.2-1.6z"> </path>
                                                   <path d="M25.1 30.2l4.1 1.3l2.6.5l-2.5-.9z"> </path>
                                                   <path d="M24.8 32l4.4.2l2.6-.2l-2.6-.2z"> </path>
                                                   <path d="M25.1 33.8l4.2-.9l2.5-.9l-2.6.5z"> </path>
                                                   <path d="M25.8 35.5l3.8-1.9l2.2-1.6l-2.4 1.1z"> </path>
                                                   <path d="M26.9 36.9l3.2-2.8l1.7-2.1l-2 1.7z"> </path>
                                                   <path d="M28.3 38.1l2.4-3.7l1.1-2.4l-1.5 2.2z"> </path>
                                                   <path d="M30 38.8l1.4-4.1l.4-2.7l-.9 2.5z"> </path>
                                                   <path d="M31.8 39l.3-4.3l-.3-2.7l-.2 2.7z"> </path>
                                                   <path d="M33.6 38.8l-.8-4.3l-1-2.5l.5 2.7z"> </path>
                                                   <path d="M35.3 38.1l-1.9-3.9l-1.6-2.2l1.2 2.5z"> </path>
                                                   <path d="M36.8 36.9l-2.9-3.2l-2.1-1.7l1.8 2.1z"> </path>
                                                   <path d="M37.9 35.5l-3.6-2.4l-2.5-1.1l2.2 1.6z"> </path>
                                                   <path d="M38.6 33.8l-4.1-1.3l-2.7-.5l2.6.9z"> </path>
                                                   <path d="M38.8 32l-4.3-.3l-2.7.3l2.7.2z"> </path>
                                                   <path d="M38.6 30.2l-4.2.9l-2.6.9l2.7-.5z"> </path>
                                                   <path d="M37.9 28.5L34 30.4L31.8 32l2.5-1.1z"> </path>
                                                   <path d="M36.8 27.1l-3.2 2.8l-1.8 2.1l2.1-1.7z"> </path>
                                                   <path d="M35.3 25.9L33 29.6L31.8 32l1.6-2.2z"> </path>
                                                   <path d="M33.7 25.2l-1.4 4.1l-.5 2.7l1-2.5z"> </path>
                                                </g>
                                             </g>
                                          </svg>
                                       <?php } else { ?>
                                          <svg height="30px" width="30px" version="1.1" id="Capa_1"
                                             xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                             viewBox="0 0 473.677 473.677" xml:space="preserve" fill="#000000">
                                             <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                             <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                             <g id="SVGRepo_iconCarrier">
                                                <path style="fill:#214391;"
                                                   d="M236.835,0v473.677c130.807,0,236.842-106.036,236.842-236.835C473.677,106.032,367.641,0,236.835,0z ">
                                                </path>
                                                <path style="fill:#2B479D;"
                                                   d="M236.835,0C106.036,0,0,106.032,0,236.842c0,130.799,106.036,236.835,236.835,236.835 C367.641,473.677,367.641,0,236.835,0z">
                                                </path>
                                                <g>
                                                   <polygon style="fill:#F8D12E;"
                                                      points="236.431,41.075 242.208,58.853 260.906,58.853 245.78,69.84 251.557,87.618 236.431,76.624 221.308,87.618 227.086,69.84 211.955,58.853 230.653,58.853 ">
                                                   </polygon>
                                                   <polygon style="fill:#F8D12E;"
                                                      points="236.431,376.687 242.208,394.473 260.906,394.473 245.78,405.46 251.557,423.237 236.431,412.251 221.308,423.237 227.086,405.46 211.955,394.473 230.653,394.473 ">
                                                   </polygon>
                                                   <polygon style="fill:#F8D12E;"
                                                      points="328.54,70.82 334.314,88.602 353.012,88.602 337.885,99.596 343.663,117.374 328.54,106.38 313.414,117.374 319.191,99.596 304.068,88.602 322.766,88.602 ">
                                                   </polygon>
                                                   <polygon style="fill:#F8D12E;"
                                                      points="391.384,132.822 397.158,150.6 415.856,150.6 400.729,161.591 406.507,179.369 391.384,168.382 376.257,179.369 382.035,161.591 366.908,150.6 385.602,150.6 ">
                                                   </polygon>
                                                   <polygon style="fill:#F8D12E;"
                                                      points="392.88,289.473 398.654,307.258 417.351,307.258 402.225,318.245 408.006,336.019 392.88,325.036 377.753,336.019 383.531,318.245 368.404,307.258 387.102,307.258 ">
                                                   </polygon>
                                                   <polygon style="fill:#F8D12E;"
                                                      points="83.755,132.822 89.529,150.6 108.223,150.6 93.1,161.591 98.874,179.369 83.755,168.382 68.629,179.369 74.406,161.591 59.283,150.6 77.981,150.6 ">
                                                   </polygon>
                                                   <polygon style="fill:#F8D12E;"
                                                      points="405.949,207.531 411.723,225.309 430.421,225.309 415.295,236.296 421.072,254.078 405.949,243.095 390.823,254.078 396.604,236.296 381.474,225.309 400.168,225.309 ">
                                                   </polygon>
                                                   <polygon style="fill:#F8D12E;"
                                                      points="69.47,207.531 75.244,225.309 93.938,225.309 78.812,236.296 84.593,254.078 69.47,243.095 54.343,254.078 60.121,236.296 44.995,225.309 63.692,225.309 ">
                                                   </polygon>
                                                   <polygon style="fill:#F8D12E;"
                                                      points="81.728,289.473 87.502,307.258 106.196,307.258 91.074,318.245 96.847,336.019 81.728,325.036 66.602,336.019 72.379,318.245 57.253,307.258 75.951,307.258 ">
                                                   </polygon>
                                                   <polygon style="fill:#F8D12E;"
                                                      points="331.251,354.119 337.025,371.897 355.723,371.897 340.593,382.891 346.374,400.669 331.251,389.682 316.121,400.669 321.903,382.891 306.776,371.897 325.474,371.897 ">
                                                   </polygon>
                                                   <polygon style="fill:#F8D12E;"
                                                      points="147.306,70.82 153.079,88.602 171.777,88.602 156.651,99.596 162.432,117.374 147.306,106.38 132.183,117.374 137.96,99.596 122.834,88.602 141.528,88.602 ">
                                                   </polygon>
                                                   <polygon style="fill:#F8D12E;"
                                                      points="140.485,352.982 146.262,370.768 164.96,370.768 149.834,381.751 155.611,399.529 140.485,388.549 125.362,399.529 131.139,381.751 116.013,370.768 134.707,370.768 ">
                                                   </polygon>
                                                </g>
                                             </g>
                                          </svg>
                                       <?php } ?>
                                    </div>



                                 </div>
                              </div>
                           </li>
                        <?php } ?>
                     </ul>
                  </div>
               </div>
            </div>
         </div>

      </div>
   </main>
</div>