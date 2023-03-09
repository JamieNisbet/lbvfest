<!-- component -->

<form method="post" action="<?= base_url() ?>/<?= $_SESSION['user_role'] ?>/finances/generate_payslip"
    class="bg-white w-2/3 mx-auto mt-6 text-gray-900 shadow-md rounded px-8 pt-6 pb-8 mb-4 flex flex-col my-2">
    <div class="-mx-3 md:flex mb-6">
        <div class="md:w-1/2 px-3 mb-6 md:mb-0">
            <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-first-name">
                Employee(s)
            </label>
            <select id="employee_select" name="employee_select" autocomplete="off"
                class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4">
                <?php foreach ($employees as $employee) { ?>
                    <option value="<?= $employee['pk_user_id'] ?>"><?= $employee['first_name'] . ' ' . $employee['last_name'] ?></option>
                <?php } ?>
            </select>
        </div>
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


    <!-- Profile tab -->
    <!-- About Section -->
    <div class="bg-white p-3 shadow-sm rounded-sm">
        <div class="flex items-center space-x-2 font-semibold mb-5 text-gray-900 leading-8">
            <span class="text-green-500">
                <svg class="h-6" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z">
                    </path>
                </svg>

            </span>
            <span class="tracking-wide">Employee Information</span>
        </div>
        <div class="text-black">
            <div class="grid md:grid-cols-2 text-sm">
                <input type="hidden" id="employee_id" name="employee_id">
                <input type="hidden" id="pf_no" name="pf_no">
                <input type="hidden" id="pf_no" name="pf_no">
                <input type="hidden" id="emp_no" name="emp_no">
                <div class="grid grid-cols-2">
                    <div class="px-4 py-2 font-semibold">Employee ID</div>
                    <input type="text" id="employee_code" name="employee_code" class="px-4 py-2">
                </div>
                <div class="grid grid-cols-2">
                    <div class="px-4 py-2 font-semibold">Employee Email</div>
                    <input type="email" id="employee_email" name="employee_email" class="px-4 py-2">
                </div>
                <div class="grid grid-cols-2">
                    <div class="px-4 py-2 font-semibold">Designation</div>
                    <input type="text" id="designation" name="designation" class="px-4 py-2">
                </div>
                <div class="grid grid-cols-2">
                    <div class="px-4 py-2 font-semibold">Bank Account</div>
                    <input type="text" id="bank_account" name="bank_account" class="px-4 py-2">
                </div>
                <div class="grid grid-cols-2">
                    <div class="px-4 py-2 font-semibold">Gross Salary</div>
                    <input type="text" id="gross_salary" name="gross_salary" class="px-4 py-2">
                </div>
                <div class="grid grid-cols-2">
                    <div class="px-4 py-2 font-semibold">Standard Days</div>
                    <input type="text" id="standard_days" name="standard_days" class="px-4 py-2">
                </div>
                <div class="grid grid-cols-2">
                    <div class="px-4 py-2 font-semibold">Paid Days</div>
                    <input type="text" id="paid_days" name="paid_days" class="px-4 py-2">
                </div>
                <div class="grid grid-cols-2">
                    <div class="px-4 py-2 font-semibold">Date of Join</div>
                    <input type="text" id="date_of_join" name="date_of_join" class="px-4 py-2">
                </div>
            </div>
        </div>
    </div>

    <div class="bg-white p-3 shadow-sm rounded-sm">
        <div id="month_display" class="flex items-center space-x-2 font-semibold mb-5 text-gray-900 leading-8">
            <span class="text-green-500">
                <svg class='h-6' fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M12 6v12m-3-2.818l.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                    </path>
                </svg>

            </span>
        </div>
        <div class="text-black mb-5">
            <div class="grid md:grid-cols-2 text-sm">
                <div class="grid grid-cols-2">
                    <div class="px-4 py-2 font-semibold">Basic Salary</div>
                    <input type="text" id="basic_salary" name="basic_salary" class="px-4 py-2">
                </div>
                <div class="grid grid-cols-2">
                    <div class="px-4 py-2 font-semibold">HRA</div>
                    <input type="text" id="hra" name="hra" class="px-4 py-2">
                </div>
                <div class="grid grid-cols-2">
                    <div class="px-4 py-2 font-semibold">Conveyance</div>
                    <input type="text" id="conveyance" name="conveyance" class="px-4 py-2">
                </div>
                <div class="grid grid-cols-2">
                    <div class="px-4 py-2 font-semibold">Medical Allowance</div>
                    <input type="text" id="medical_allowance" name="medical_allowance" class="px-4 py-2">
                </div>
                <div class="grid grid-cols-2">
                    <div class="px-4 py-2 font-semibold">Special Allowance</div>
                    <input type="text" id="special_allowance" name="special_allowance" class="px-4 py-2">
                </div>
                <div class="grid grid-cols-2">
                    <div class="px-4 py-2 font-semibold">Other Allowance</div>
                    <input type="text" id="other_allowance" name="other_allowance" class="px-4 py-2">
                </div>
                <div class="grid grid-cols-2">
                    <div class="px-4 py-2 font-semibold">Professional Tax</div>
                    <input type="text" id="professional_tax" name="professional_tax" class="px-4 py-2">
                </div>
                <div class="grid grid-cols-2">
                    <div class="px-4 py-2 font-semibold">Provident Fund</div>
                    <input type="text" id="provident_fund" name="provident_fund" class="px-4 py-2">
                </div>
                <div class="grid grid-cols-2">
                    <div class="px-4 py-2 font-semibold">TDS</div>
                    <input type="text" id="tds" name="tds" class="px-4 py-2">
                </div>
                <div class="grid grid-cols-2">
                    <div class="px-4 py-2 font-semibold">Insurance</div>
                    <input type="text" id="insurance" name="insurance" class="px-4 py-2">
                </div>
                <div class="grid grid-cols-2">
                    <div class="px-4 py-2 font-semibold">Deductions</div>
                    <input type="text" id="deductions" name="deductions" class="px-4 py-2">
                </div>
                <div class="grid grid-cols-2">
                    <div class="px-4 py-2 font-semibold text-lg">TOTAL</div>
                    <input type="text" id="total_salary" name="total_salary"
                        class="px-4 py-2 border-2 rounded-lg text-center text-lg border-blue-600">
                </div>
            </div>
        </div>
    </div>



    <div class="-mx-3 md:flex mb-6">
        <div class="md:w-full px-3">
            <input type="submit" id="submitPayslip" name="submitPayslip" value="Generate Payslip" 
                class="bg-indigo-600 text-white block w-full bg-grey-lighter text-center text-grey-darker border border-grey-lighter rounded py-3 px-4 mb-3">
        </div>

    </div>
</form>

<script>
    $(document).ready(function () {
        $('#year').change(function () {
            const employee_id = $('#employee_select').val();
            const month = $('#month').val();
            const year = $('#year').val();

            $.ajax({
                url: '<?= base_url() ?>/ajax/generatePayslip',
                type: 'POST',
                data: { employee_id: employee_id, month: month, year: year },
                dataType: 'json',
                success: function (data) {
                    const leavesAssigned = parseInt(data.leaves_assigned);
                    const totalDays = parseInt(new Date(year, month, 0).getDate());
                    const leavesTaken = parseInt(data.approved_leaves ?? 0);
                    const conveyance = 1600;
                    const professionalTax = 200;
                    const medicalAllowance = 1250;
                    const workedDays = totalDays - leavesTaken;
                    const hra = parseFloat(data.employee.salary / 100) * 40;
                    const totalEarnings = parseFloat(data.employee.salary) + parseFloat(hra) + parseFloat(conveyance) + parseFloat(medicalAllowance);
                    const deductions = 0;
                    $('#employee_id').val(data.employee.pk_user_id);
                    $('#employee_code').val(data.employee.emp_code);
                    $('#employee_email').val(data.employee.email);
                    $('#designation').val(data.employee.designation);
                    $('#bank_account').val(data.employee.bank_acc);
                    $('#gross_salary').val(data.employee.salary);
                    $('#date_of_join').val(data.employee.date_of_join);
                    $('#provident_fund').val(data.employee.pf_amount);
                    $('#tds').val(data.employee.tds);
                    $('#insurance').val(data.employee.insurance);
                    $('#basic_salary').val(data.employee.salary);
                    $('#gross_salary').val(data.employee.salary);
                    $('#pf_no').val(data.employee.pf_no);
                    $('#standard_days').val(totalDays);
                    $('#paid_days').val(workedDays);
                    $('#hra').val(hra);
                    $('#deductions').val(deductions);
                    $('#conveyance').val(conveyance);
                    $('#medical_allowance').val(medicalAllowance);
                    $('#professional_tax').val(professionalTax);
                    $('#total_salary').val(totalEarnings);
                },
                error: function (xhr, status, error) {
                    alert(xhr.responseText);
                }
            })
        })
    })
</script>