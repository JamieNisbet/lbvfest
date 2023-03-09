    <!-- PAGE HEADER -->
    <div class="rounded-t mb-0 mt-3 px-4 py-3 border-0">
        <div class="flex flex-wrap items-center">
            <!-- PAGE TITLE -->
            <div class="relative w-full px-4 max-w-full flex-grow flex-1 ">
                <h1 class="font-semibold text-3xl text-white"><?= $title ?></h1>
            </div>

        </div>
    </div>

    <!-- PAGE TABLE -->
    <div class="w-full h-4/5  overflow-y-auto  mt-5 px-4">
        <div class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded bg-gray-900 text-white">
            <div class="block w-full">
                <table class="items-center w-full bg-transparent border-collapse">
                    <!-- TABLE HEADERS -->
                    <thead>
                        <tr>
                            <?php foreach ($table_headers as $header) { ?>
                                <th class="px-6 align-middle py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-indigo-600 text-white"><?= $header ?></th>
                            <?php } ?>
                        </tr>
                    </thead>
                    <!-- TABLE BODY -->
                    <tbody>

                        <?php foreach ($history as $entry) { ?>

                            <!-- TABLE ROW ITEM -->
                            <tr>
                                <th class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left flex items-center">
                                    <?= $entry->date ?>
                                </th>

                                <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                    <?= $entry->user_fname . " " . $entry->user_lname ?>
                                </td>
                                <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                    <?= $entry->client_name ?>
                                </td>
                                <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                    <?= $entry->project_name ?>
                                </td>
                                <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                    <?= $entry->id ?>
                                </td>
                                <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                    <?= $entry->activity_name ?>
                                </td>
                                <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                    <?= $entry->hours ?>
                                </td>

                                <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">

                                    <div>
                                        <a href="<?= base_url() ?>/admin/timesheet/entry/<?= $entry->id ?>" class="flex items-center justify-center px-3 py-2 space-x-2 text-sm tracking-wide text-white capitalize transition-colors duration-200 transform bg-indigo-500 rounded-md dark:bg-indigo-600 dark:hover:bg-indigo-700 dark:focus:bg-indigo-700 hover:bg-indigo-600 focus:outline-none focus:bg-indigo-500 focus:ring focus:ring-indigo-300 focus:ring-opacity-50">
                                            View Details
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>