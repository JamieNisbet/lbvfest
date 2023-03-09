<?php if ($_SESSION['user_id'] == $profile['pk_user_id']) { ?>

	<div class="h-full bg-gray-200 overflow-y-auto p-8">
	<div class="bg-white rounded-lg shadow-xl pb-8">


		<div class="w-full h-[250px]">
			<img src="https://vojislavd.com/ta-template-demo/assets/img/profile-background.jpg"
				class="w-full h-full rounded-tl-lg rounded-tr-lg">
		</div>
		<div class="flex flex-col items-center -mt-20">
			<img src="https://www.shareicon.net/data/512x512/2016/09/15/829472_man_512x512.png"
				class="w-40 border-4 border-white rounded-full">
			<div class="flex items-center space-x-2 mt-2">
				<p class="text-2xl text-gray-900">
					<?= $profile['first_name'] . " " . $profile["last_name"] ?>
				</p>
				<span class="bg-blue-500 rounded-full p-1" title="Verified">
					<svg xmlns="http://www.w3.org/2000/svg" class="text-gray-100 h-2.5 w-2.5" fill="none"
						viewBox="0 0 24 24" stroke="currentColor">
						<path stroke-linecap="round" stroke-linejoin="round" stroke-width="4" d="M5 13l4 4L19 7"></path>
					</svg>
				</span>
			</div>
			<p class="text-gray-700">
				<?= $profile["designation"] ?>
			</p>
		</div>
		<div class="flex-1 flex flex-col items-center lg:items-end justify-end px-8 mt-2">
			<div class="flex items-center space-x-4 mt-2">
				<div x-data="{ modelOpen: false }">
					<button @click="modelOpen =!modelOpen"
						class="flex items-center bg-blue-600 hover:bg-blue-700 text-gray-100 px-4 py-2 rounded text-sm space-x-2 transition duration-100">


						<span>Edit</span>
					</button>

					<div x-show="modelOpen" class="fixed inset-0 z-50 overflow-y-auto" aria-labelledby="modal-title"
						role="dialog" aria-modal="true">
						<div
							class="flex items-end justify-center min-h-screen px-4 text-center md:items-center sm:block sm:p-0">
							<div x-cloak @click="modelOpen = false" x-show="modelOpen"
								x-transition:enter="transition ease-out duration-300 transform"
								x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
								x-transition:leave="transition ease-in duration-200 transform"
								x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
								class="fixed inset-0 transition-opacity bg-gray-500 bg-opacity-40" aria-hidden="true">
							</div>

							<div x-cloak x-show="modelOpen"
								x-transition:enter="transition ease-out duration-300 transform"
								x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
								x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
								x-transition:leave="transition ease-in duration-200 transform"
								x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
								x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
								class="inline-block w-full max-w-xl p-8 my-20 overflow-hidden text-left transition-all transform bg-white rounded-lg shadow-xl 2xl:max-w-2xl">
								<div class="flex items-center justify-between space-x-4">
									<h1 class="text-xl font-medium text-gray-800 ">Edit Profile</h1>

									<button @click="modelOpen = false"
										class="text-gray-600 focus:outline-none hover:text-gray-700">
										<svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none"
											viewBox="0 0 24 24" stroke="currentColor">
											<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
												d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
										</svg>
									</button>
								</div>

								<p class="mt-2 text-sm text-gray-500 ">
									Edit your profile info here
								</p>

								<form class="mt-5">
						
										<div>
											<label for="user name"
												class="block text-sm text-gray-700 capitalize dark:text-gray-200">First
												Name</label>
											<input value="<?= $profile['first_name'] ?>" type="text"
												class="block w-full px-3 py-2 mt-2 text-gray-600 placeholder-gray-400 bg-white border border-gray-200 rounded-md focus:border-indigo-400 focus:outline-none focus:ring focus:ring-indigo-300 focus:ring-opacity-40">
										</div>

										<div class="mt-4">
											<label for="email"
												class="block text-sm text-gray-700 capitalize dark:text-gray-200">Last
												Name</label>
											<input value="<?= $profile['last_name'] ?>" type="email"
												class="block w-full px-3 py-2 mt-2 text-gray-600 placeholder-gray-400 bg-white border border-gray-200 rounded-md focus:border-indigo-400 focus:outline-none focus:ring focus:ring-indigo-300 focus:ring-opacity-40">
										</div>
										<div class="mt-4">
											<label for="email"
												class="block text-sm text-gray-700 capitalize dark:text-gray-200">Email</label>
											<input value="<?= $profile['email'] ?>" type="email"
												class="block w-full px-3 py-2 mt-2 text-gray-600 placeholder-gray-400 bg-white border border-gray-200 rounded-md focus:border-indigo-400 focus:outline-none focus:ring focus:ring-indigo-300 focus:ring-opacity-40">
										</div>
										<div class="mt-4">
											<label for="email"
												class="block text-sm text-gray-700 capitalize dark:text-gray-200">Mobile</label>
											<input value="<?= $profile['mobile'] ?>" type="email"
												class="block w-full px-3 py-2 mt-2 text-gray-600 placeholder-gray-400 bg-white border border-gray-200 rounded-md focus:border-indigo-400 focus:outline-none focus:ring focus:ring-indigo-300 focus:ring-opacity-40">
										</div>

										<div class="mt-4">
											<label for="email"
												class="block text-sm text-gray-700 capitalize dark:text-gray-200">Profile Picture</label>
											<input value="<?= $profile['mobile'] ?>" type="file"
												class="block w-full px-3 py-2 mt-2 text-gray-600 placeholder-gray-400 bg-white border border-gray-200 rounded-md focus:border-indigo-400 focus:outline-none focus:ring focus:ring-indigo-300 focus:ring-opacity-40">
										</div>
							
										<div class="mt-4">
											<label for="email"
												class="block text-sm text-gray-700 capitalize dark:text-gray-200">Date of
												Birth</label>
											<input value="<?= $profile['dob'] ?>" type="date"
												class="block w-full px-3 py-2 mt-2 text-gray-600 placeholder-gray-400 bg-white border border-gray-200 rounded-md focus:border-indigo-400 focus:outline-none focus:ring focus:ring-indigo-300 focus:ring-opacity-40">
										</div>
										<div class="mt-4">
											<label for="email"
												class="block text-sm text-gray-700 capitalize dark:text-gray-200">Bank
												Account</label>
											<input value="<?= $profile['bank_acc'] ?>" type="email"
												class="block w-full px-3 py-2 mt-2 text-gray-600 placeholder-gray-400 bg-white border border-gray-200 rounded-md focus:border-indigo-400 focus:outline-none focus:ring focus:ring-indigo-300 focus:ring-opacity-40">
										</div>

										
																			<div class="flex justify-end mt-6">
																				<button type="button"
																					class="px-3 py-2 text-sm tracking-wide text-white capitalize transition-colors duration-200 transform bg-indigo-500 rounded-md dark:bg-indigo-600 dark:hover:bg-indigo-700 dark:focus:bg-indigo-700 hover:bg-indigo-600 focus:outline-none focus:bg-indigo-500 focus:ring focus:ring-indigo-300 focus:ring-opacity-50">
																					Update
																				</button>
																			</div>
																		</form>


				
								

							</div>
						</div>
					</div>
				</div>
				<button
					class="flex items-center bg-blue-600 hover:bg-blue-700 text-gray-100 px-4 py-2 rounded text-sm space-x-2 transition duration-100">
					<span>#
						<?= $profile["emp_code"] ?>
					</span>
				</button>
			</div>
		</div>
	</div>

	<div class="my-4 flex flex-col 2xl:flex-row space-y-4 2xl:space-y-0 2xl:space-x-4">
		<div class="w-full flex flex-col 2xl:w-1/3">
			<div class="flex-1 bg-white rounded-lg shadow-xl p-8">
				<h4 class="text-xl text-gray-900 font-bold">Personal Info</h4>
				<ul class="mt-2 text-gray-700">
					<li class="flex justify-between border-b py-2">
						<span class="font-bold w-24">Full name</span>
						<span class="text-gray-700">
							<?= $profile['first_name'] . " " . $profile["last_name"] ?>
						</span>
					</li>
					<li class="flex justify-between border-b py-2">
						<span class="font-bold w-24">Birthday</span>
						<span class="text-gray-700">
							<?= $profile["dob"] ?>
						</span>
					</li>
					<li class="flex justify-between border-b py-2">
						<span class="font-bold w-24">Joined</span>
						<span class="text-gray-700">
							<?= $profile["date_of_join"] ?>
						</span>
					</li>
					<li class="flex justify-between border-b py-2">
						<span class="font-bold w-24">Mobile</span>
						<span class="text-gray-700">
							<?= $profile["mobile"] ?>
						</span>
					</li>

					<li class="flex justify-between border-b py-2">
						<span class="font-bold w-24">Email</span>
						<span class="text-gray-700">
							<?= $profile["email"] ?>
						</span>
					</li>
					<li class="flex justify-between border-b py-2">
						<span class="font-bold w-24">Location</span>
						<span class="text-gray-700">
							<?= $profile["location_id"] == 2 ? "EU" : "India" ?>
						</span>
					</li>
					<li class="flex justify-between border-b py-2">
						<span class="font-bold w-24">Privileges</span>
						<span class="text-gray-700">
							<?= $profile["user_type"] == 3 ? "Employee" : "Admin" ?>
						</span>
					</li>
					<li class="flex justify-between border-b py-2">
						<span class="font-bold w-24">Salary</span>
						<span class="text-gray-700">
							<?= $profile["salary"] ?>
						</span>
					</li>
					<li class="flex justify-between border-b py-2">
						<span class="font-bold w-24">Department</span>
						<span class="text-gray-700">
							<?= $profile["department_id"] ?>
						</span>
					</li>
					<li class="flex justify-between border-b py-2">
						<span class="font-bold">Bank Account</span>
						<span class="text-gray-700">
							<?= $profile["bank_acc"] ?>
						</span>
					</li>
					<li class="flex justify-between border-b py-2">
						<span class="font-bold w-24">Gender</span>
						<span class="text-gray-700">
							<?= $profile["gender"] ?>
						</span>
					</li>


				</ul>
			</div>

		</div>
		<div class="flex-1 bg-white text-gray-900 rounded-lg shadow-xl mt-4 p-8">
			<h4 class="text-xl text-gray-900 font-bold">Activity log</h4>
			<div class="relative px-4">
				<div class="absolute h-full border border-dashed border-opacity-20 border-secondary"></div>
				<?php foreach ($assignments as $assignment) { ?>
					<div class="flex items-center w-full my-6 -ml-1.5">
						<div class="w-1/12 z-10">
							<div class="w-3.5 h-3.5 bg-blue-600 rounded-full"></div>
						</div>
						<div class="w-11/12">
							<p class="text-sm font-bold">
								<?= $assignment->activity_name ?>
							</p>
							<p class="text-sm">
								Project <a href="<?= base_url() ?>/admin/projects" class="text-blue-600 font-bold"><?= $assignment->project_name ?></a>.</p>
							<p class="text-xs text-gray-500">
								<?= date("Y-m-d", strtotime($assignment->updated_at)) ?>
							</p>
						</div>
					</div>
				<?php } ?>

			</div>
		</div>
	</div>
</div>
<script>
	const DATA_SET_VERTICAL_BAR_CHART_1 = [68.106, 26.762, 94.255, 72.021, 74.082, 64.923, 85.565, 32.432, 54.664, 87.654, 43.013, 91.443];

	const labels_vertical_bar_chart = ['January', 'February', 'Mart', 'April', 'May', 'Jun', 'July', 'August', 'September', 'October', 'November', 'December'];

	const dataVerticalBarChart = {
		labels: labels_vertical_bar_chart,
		datasets: [{
			label: 'Revenue',
			data: DATA_SET_VERTICAL_BAR_CHART_1,
			borderColor: 'rgb(54, 162, 235)',
			backgroundColor: 'rgba(54, 162, 235, 0.5)',
		}]
	};
	const configVerticalBarChart = {
		type: 'bar',
		data: dataVerticalBarChart,
		options: {
			responsive: true,
			plugins: {
				legend: {
					position: 'top',
				},
				title: {
					display: true,
					text: 'Last 12 Months'
				}
			}
		},
	};

	var verticalBarChart = new Chart(
		document.getElementById('verticalBarChart'),
		configVerticalBarChart
	);
</script>

<?php } else{ ?>



<?php } ?>

