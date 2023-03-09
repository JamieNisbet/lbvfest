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
                        Activity
                     </span>
                     <h3 class="text-base font-normal text-gray-500">tasks & assignments</h3>
                  </div>

               </div>
            </a>
            <a href="<?= base_url() ?>/admin/clients" class="bg-white shadow rounded-lg p-4 sm:p-6 xl:p-8 ">
               <div class="flex items-center">
                  <div class="flex-shrink-0">
                     <span class="text-2xl sm:text-3xl leading-none font-bold text-gray-900">
                        Leave
                     </span>
                     <h3 class="text-base font-normal text-gray-500">Make a request</h3>
                  </div>
                  <div class="ml-5 w-0 flex items-center justify-end flex-1 text-green-500 text-base font-bold">

                  </div>
               </div>
            </a>
            <a href="<?= base_url() ?>/admin/leave" class="bg-white shadow rounded-lg p-4 sm:p-6 xl:p-8 ">
               <div class="flex items-center">
                  <div class="flex-shrink-0">
                     <span class="text-2xl sm:text-3xl leading-none font-bold text-gray-900">
                        Work Logs
                     </span>
                     <h3 class="text-base font-normal text-gray-500">Make a new entry</h3>
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
                     <h3 class="text-xl font-bold leading-none text-gray-900">Inbox</h3>
                  </div>
                  <div class="flow-root">
                     <ul role="list" class="divide-y divide-gray-200">

                        <li class="py-3 sm:py-4">
                           <div class="flex items-center space-x-4">
                              <div class="flex-shrink-0">
                                 <a href="<?= base_url() ?>/admin/profile/">
                                    <svg fill="none" class="w-8 h-8" stroke="black" stroke-width="1.5"
                                       viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                       <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M2.25 18.75a60.07 60.07 0 0115.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 013 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 00-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 01-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 003 15h-.75M15 10.5a3 3 0 11-6 0 3 3 0 016 0zm3 0h.008v.008H18V10.5zm-12 0h.008v.008H6V10.5z">
                                       </path>
                                    </svg>
                                 </a>
                              </div>
                              <div class="flex-1 min-w-0">
                                 <p class="text-sm font-medium text-gray-900 truncate">
                                    Paycheck Sent
                                 </p>
                                 <p class="text-sm text-gray-500 truncate">
                                    January 2023
                                 </p>
                              </div>

                          


                              <div class="flex-shrink-0">
                                 <div
                                    class="flex items-center justify-center px-3 py-2 space-x-2 text-sm tracking-wide text-white transition-colors duration-200 transform bg-green-500 rounded-md dark:bg-green-600 dark:hover:bg-green-700 dark:focus:bg-green-700 hover:bg-green-600 focus:outline-none focus:bg-green-500 focus:ring focus:ring-green-300 focus:ring-opacity-50">
                                    Download
                                 </div>
                              </div>

                              <div class="flex-shrink-0">
                                 <div
                                    class="flex items-center justify-center px-3 py-2 space-x-2 text-sm tracking-wide text-white transition-colors duration-200 transform bg-gray-500 rounded-md dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:bg-gray-700 hover:bg-gray-600 focus:outline-none focus:bg-gray-500 focus:ring focus:ring-gray-300 focus:ring-opacity-50">
                                    View
                                 </div>
                              </div>







                              <div class="inline-flex items-center text-base font-semibold text-gray-900">





                              </div>
                           </div>
                        </li>
                        <li class="py-3 sm:py-4">
                           <div class="flex items-center space-x-4">
                              <div class="flex-shrink-0">
                                 <a href="<?= base_url() ?>/admin/profile/">
                                 <svg fill="none" class="w-8 h-8" stroke="black" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
  <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75"></path>
</svg>
                                 </a>
                              </div>
                              <div class="flex-1 min-w-0">
                                 <p class="text-sm font-medium text-gray-900 truncate">
                                    Leave Request
                                 </p>
                                 <p class="text-sm text-gray-500 truncate">
                                    30/04/2023 to 05/05/2023
                                 </p>
                              </div>

                          


                              <div class="flex-shrink-0">
                                 <div
                                    class="flex items-center justify-center px-3 py-2 space-x-2 text-sm tracking-wide text-white transition-colors duration-200 transform bg-orange-500 rounded-md dark:bg-orange-600 dark:hover:bg-orange-700 dark:focus:bg-orange-700 hover:bg-orange-600 focus:outline-none focus:bg-orange-500 focus:ring focus:ring-orange-300 focus:ring-opacity-50">
                                    Unhandled
                                 </div>
                              </div>

                              <div class="flex-shrink-0">
                                 <div
                                    class="flex items-center justify-center px-3 py-2 space-x-2 text-sm tracking-wide text-white transition-colors duration-200 transform bg-gray-500 rounded-md dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:bg-gray-700 hover:bg-gray-600 focus:outline-none focus:bg-gray-500 focus:ring focus:ring-gray-300 focus:ring-opacity-50">
                                    View
                                 </div>
                              </div>







                              <div class="inline-flex items-center text-base font-semibold text-gray-900">





                              </div>
                           </div>
                        </li>

                     </ul>
                  </div>
               </div>
            </div>
         </div>

      </div>
   </main>
</div>