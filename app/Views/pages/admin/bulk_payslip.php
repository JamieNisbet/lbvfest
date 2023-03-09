<!-- component -->
<div
    class="overflow-y-auto bg-white w-2/3 h-2/3 mx-auto mt-20 text-gray-900 shadow-md rounded px-8 pt-6 pb-8 mb-4 flex flex-col my-2">
    <div class="-mx-3 md:flex mb-6">
        <div class="md:w-full px-3 mb-6 md:mb-0">
            <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-first-name">
                Employee(s)
            </label>
            <ul id="employees" name="employees"
                class="appearance-none w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4">
                <?php foreach ($employees as $employee) { ?>
                    <li class="mb-1"><input type="checkbox" value="<?= $employee['pk_user_id'] ?>"><span class="ml-2">
                            <?= $employee['first_name'] . ' ' . $employee['last_name'] ?>
                        </span></li>
                <?php } ?>
            </ul>
        </div>
    </div>
    <div class="-mx-3 md:flex mb-6">
        <div class="md:w-1/2 px-3">
            <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-last-name">
                Month
            </label>
            <select name="month"
                class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4"
                id="month">
                <option value="">Select a month</option>
                <option value=1>January</option>
                <option value=2>February</option>
                <option value=3>March</option>
                <option value=4>April</option>
                <option value=5>May</option>
                <option value=6>June</option>
                <option value=7>July</option>
                <option value=8>August</option>
                <option value=9>September</option>
                <option value=10>October</option>
                <option value=11>November</option>
                <option value=12>December</option>
            </select>
        </div>
        <div class="md:w-1/2 px-3">
            <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-last-name">
                Year
            </label>
            <select name="year"
                class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4"
                id="year">
                <option value="">Select a year</option>
                <option value=2022>2022</option>
                <option value=2023>2023</option>
                <option value=2024>2024</option>
                <option value=2025>2025</option>
            </select>
        </div>
    </div>

    <input hidden id="bulkPayslip">

    <div class="-mx-3 md:flex mb-6">
        <div class="md:w-full px-3">
            <button name="submit" id="submitBulk"
                class="appearance-none bg-indigo-600 text-white block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4 mb-3">
                <span id="buttonText">Generate Bulk Payslip</span>
            </button>
        </div>

    </div>
</div>
<script>
    $(document).ready(function () {
        $('#submitBulk').click(function (event) {
            $('#buttonText').remove()
            const month = $('#month').val()
            const year = $('#year').val()
            const employee_ids = [];
            const checked = document.querySelectorAll('input:checked');
            checked.forEach(input => {
                employee_ids.push(input.value);
            });
            employee_ids.forEach(id => {
                $.ajax({
                    url: '<?= base_url() ?>/ajax/generatePayslip',
                    type: 'POST',
                    data: { employee_id: id, month: month, year: year },
                    dataType: 'json',
                    success: function (data) {

                            $.ajax({
                                url: '<?= base_url() ?>/<?= $_SESSION['user_role'] ?>/finances/generate_payslip',
                                type: 'POST',
                                data: {
                                    year: year,
                                    month: month,
                                    employee_id: data.employee.pk_user_id,
                                    basic_salary: data.employee.salary,
                                    hra: parseFloat(data.employee.salary / 100) * 40,
                                    medicalAllowance: 1250,
                                    insurance: data.employee.insurance,
                                    professionalTax: 200,
                                    provident_fund: data.employee.pf_amount,
                                    gross_salary: data.employee.salary,
                                    net_salary: parseFloat(data.employee.salary) + parseFloat(data.employee.salary / 100) * 40 + 1600 + 1250,
                                    conveyance: 1600,
                                },
                                dataType: 'json',
                                success: function (data) {
                                },
                                error: function (xhr, status, error) {
                                    console.log(xhr.responseText)
                                }
                            })
                    },
                    error: function (xhr, status, error) {
                        console.log(xhr.responseText);
                    }
                })
            })
            $('#submitBulk').append("<span id='buttonText'>Generate Bulk Payslip</span>")


        })



        // const payslips = []
        // $('#employees').change(function () {
        //     $('#month').prop('disabled', false);
        // })
        // $('#month').change(function () {
        //     $('#year').prop('disabled', false);
        // })
        // $('#year').change(function () {
        //     $('#submit').prop('disabled', false);
        // })
        // // Listen for form submission
        // $('#submitBulk').click(function (event) {
        //     const checked = document.querySelectorAll('input:checked');
        //     const month = $('#month').val();
        //     const year = $('#year').val();
        //     checked.forEach(input => {
        //         employee_ids.push(input.value);
        //     });
        //     // Retrieve selected employee IDs
        //     checked.forEach(input => {
        //         employee_ids.push(input.value);
        //     });
        //     if (employee_ids > 0) {
        //         $.ajax({
        //             url: '<?= base_url() ?>/ajax/bulkPayslip',
        //             type: 'POST',
        //             data: { employees: employee_ids, month: month, year: year },
        //             dataType: 'json',
        //             success: function (data) {
        //                 console.log(data)
        //             },
        //             error: function (xhr, status, error) {
        //                 alert(xhr.responseText);
        //                 alert(status);
        //                 alert(error);
        //             }
        //         })
        //     }

        //     $('#submit').prop('disabled', false);

        // });
    });

</script>