<div class="h-full bg-gray-200 overflow-y-auto p-8">
	<div class="bg-white rounded-lg shadow-xl pb-8">


		<div class="w-full h-[250px]">
			<img src="https://vojislavd.com/ta-template-demo/assets/img/profile-background.jpg" class="w-full h-full rounded-tl-lg rounded-tr-lg">
		</div>
		<div class="flex flex-col items-center -mt-20">
			<img src="https://www.shareicon.net/data/512x512/2016/09/15/829472_man_512x512.png" class="w-40 border-4 border-white rounded-full">
			<div class="flex items-center space-x-2 mt-2">
				<p class="text-2xl text-gray-900"><?= $profile['first_name'] . " " . $profile["last_name"] ?></p>
				<span class="bg-blue-500 rounded-full p-1" title="Verified">
					<svg xmlns="http://www.w3.org/2000/svg" class="text-gray-100 h-2.5 w-2.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
						<path stroke-linecap="round" stroke-linejoin="round" stroke-width="4" d="M5 13l4 4L19 7"></path>
					</svg>
				</span>
			</div>
			<p class="text-gray-700"><?= $profile["designation"] ?></p>
		</div>
		<div class="flex-1 flex flex-col items-center lg:items-end justify-end px-8 mt-2">
			<div class="flex items-center space-x-4 mt-2">
				<button class="flex items-center bg-blue-600 hover:bg-blue-700 text-gray-100 px-4 py-2 rounded text-sm space-x-2 transition duration-100">
					<svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
						<path d="M8 9a3 3 0 100-6 3 3 0 000 6zM8 11a6 6 0 016 6H2a6 6 0 016-6zM16 7a1 1 0 10-2 0v1h-1a1 1 0 100 2h1v1a1 1 0 102 0v-1h1a1 1 0 100-2h-1V7z"></path>
					</svg>
					<span>Edit Profile</span>
				</button>
				<button class="flex items-center bg-blue-600 hover:bg-blue-700 text-gray-100 px-4 py-2 rounded text-sm space-x-2 transition duration-100">
					<span># <?= $profile["emp_code"] ?></span>
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
						<span class="text-gray-700"><?= $profile['first_name'] . " " . $profile["last_name"] ?></span>
					</li>
					<li class="flex justify-between border-b py-2">
						<span class="font-bold w-24">Birthday</span>
						<span class="text-gray-700"> <?= $profile["dob"] ?></span>
					</li>
					<li class="flex justify-between border-b py-2">
						<span class="font-bold w-24">Joined</span>
						<span class="text-gray-700"> <?= $profile["date_of_join"] ?></span>
					</li>
					<li class="flex justify-between border-b py-2">
						<span class="font-bold w-24">Mobile</span>
						<span class="text-gray-700"> <?= $profile["mobile"] ?></span>
					</li>

					<li class="flex justify-between border-b py-2">
						<span class="font-bold w-24">Email</span>
						<span class="text-gray-700"> <?= $profile["email"] ?></span>
					</li>
					<li class="flex justify-between border-b py-2">
						<span class="font-bold w-24">Location</span>
						<span class="text-gray-700"> <?= $profile["location_id"] == 2 ? "EU" : "India" ?></span>
					</li>
					<li class="flex justify-between border-b py-2">
						<span class="font-bold w-24">Privileges</span>
						<span class="text-gray-700"> <?= $profile["user_type"] == 3 ? "Employee" : "Admin" ?></span>
					</li>
					<li class="flex justify-between border-b py-2">
						<span class="font-bold w-24">Salary</span>
						<span class="text-gray-700"> <?= $profile["salary"] ?></span>
					</li>


				</ul>
			</div>
			<div class="flex-1 bg-white text-gray-900 rounded-lg shadow-xl mt-4 p-8">
				<h4 class="text-xl text-gray-900 font-bold">Activity log</h4>
				<div class="relative px-4">
					<div class="absolute h-full border border-dashed border-opacity-20 border-secondary"></div>

					<!-- start::Timeline item -->
					<div class="flex items-center w-full my-6 -ml-1.5">
						<div class="w-1/12 z-10">
							<div class="w-3.5 h-3.5 bg-blue-600 rounded-full"></div>
						</div>
						<div class="w-11/12">
							<p class="text-sm">Profile informations changed.</p>
							<p class="text-xs text-gray-500">3 min ago</p>
						</div>
					</div>
					<!-- end::Timeline item -->

					<!-- start::Timeline item -->
					<div class="flex items-center w-full my-6 -ml-1.5">
						<div class="w-1/12 z-10">
							<div class="w-3.5 h-3.5 bg-blue-600 rounded-full"></div>
						</div>
						<div class="w-11/12">
							<p class="text-sm">
								Connected with <a href="#" class="text-blue-600 font-bold">Colby Covington</a>.</p>
							<p class="text-xs text-gray-500">15 min ago</p>
						</div>
					</div>
					<!-- end::Timeline item -->

					<!-- start::Timeline item -->
					<div class="flex items-center w-full my-6 -ml-1.5">
						<div class="w-1/12 z-10">
							<div class="w-3.5 h-3.5 bg-blue-600 rounded-full"></div>
						</div>
						<div class="w-11/12">
							<p class="text-sm">Invoice <a href="#" class="text-blue-600 font-bold">#4563</a> was created.</p>
							<p class="text-xs text-gray-500">57 min ago</p>
						</div>
					</div>
					<!-- end::Timeline item -->

					<!-- start::Timeline item -->
					<div class="flex items-center w-full my-6 -ml-1.5">
						<div class="w-1/12 z-10">
							<div class="w-3.5 h-3.5 bg-blue-600 rounded-full"></div>
						</div>
						<div class="w-11/12">
							<p class="text-sm">
								Message received from <a href="#" class="text-blue-600 font-bold">Cecilia Hendric</a>.</p>
							<p class="text-xs text-gray-500">1 hour ago</p>
						</div>
					</div>
					<!-- end::Timeline item -->

					<!-- start::Timeline item -->
					<div class="flex items-center w-full my-6 -ml-1.5">
						<div class="w-1/12 z-10">
							<div class="w-3.5 h-3.5 bg-blue-600 rounded-full"></div>
						</div>
						<div class="w-11/12">
							<p class="text-sm">New order received <a href="#" class="text-blue-600 font-bold">#OR9653</a>.</p>
							<p class="text-xs text-gray-500">2 hours ago</p>
						</div>
					</div>
					<!-- end::Timeline item -->

					<!-- start::Timeline item -->
					<div class="flex items-center w-full my-6 -ml-1.5">
						<div class="w-1/12 z-10">
							<div class="w-3.5 h-3.5 bg-blue-600 rounded-full"></div>
						</div>
						<div class="w-11/12">
							<p class="text-sm">
								Message received from <a href="#" class="text-blue-600 font-bold">Jane Stillman</a>.</p>
							<p class="text-xs text-gray-500">2 hours ago</p>
						</div>
					</div>
					<!-- end::Timeline item -->
				</div>
			</div>
		</div>
		<div class="flex flex-col text-gray-900 w-full 2xl:w-2/3">
			<div class="flex-1 bg-white rounded-lg shadow-xl p-8">
				<h4 class="text-xl text-gray-900 font-bold">About</h4>
				<p class="mt-2 text-gray-700">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt voluptates obcaecati numquam error et ut fugiat asperiores. Sunt nulla ad incidunt laboriosam, laudantium est unde natus cum numquam, neque facere. Lorem ipsum dolor sit amet consectetur adipisicing elit. Ut, magni odio magnam commodi sunt ipsum eum! Voluptas eveniet aperiam at maxime, iste id dicta autem odio laudantium eligendi commodi distinctio!</p>
			</div>
			<div class="flex-1 bg-white rounded-lg shadow-xl mt-4 p-8">
				<h4 class="text-xl text-gray-900 font-bold">Statistics</h4>

				<div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mt-4">
					<div class="px-6 py-6 bg-gray-100 border border-gray-300 rounded-lg shadow-xl">
						<div class="flex items-center justify-between">
							<span class="font-bold text-sm text-indigo-600">Total Revenue</span>
							<span class="text-xs bg-gray-200 hover:bg-gray-500 text-gray-500 hover:text-gray-200 px-2 py-1 rounded-lg transition duration-200 cursor-default">7 days</span>
						</div>
						<div class="flex items-center justify-between mt-6">
							<div>
								<svg class="w-12 h-12 p-2.5 bg-indigo-400 bg-opacity-20 rounded-full text-indigo-600 border border-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
									<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
								</svg>
							</div>
							<div class="flex flex-col">
								<div class="flex items-end">
									<span class="text-2xl 2xl:text-3xl font-bold">$8,141</span>
									<div class="flex items-center ml-2 mb-1">
										<svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
											<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
										</svg>
										<span class="font-bold text-sm text-gray-500 ml-0.5">3%</span>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="px-6 py-6 bg-gray-100 border border-gray-300 rounded-lg shadow-xl">
						<div class="flex items-center justify-between">
							<span class="font-bold text-sm text-green-600">New Orders</span>
							<span class="text-xs bg-gray-200 hover:bg-gray-500 text-gray-500 hover:text-gray-200 px-2 py-1 rounded-lg transition duration-200 cursor-default">7 days</span>
						</div>
						<div class="flex items-center justify-between mt-6">
							<div>
								<svg class="w-12 h-12 p-2.5 bg-green-400 bg-opacity-20 rounded-full text-green-600 border border-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
									<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
								</svg>
							</div>
							<div class="flex flex-col">
								<div class="flex items-end">
									<span class="text-2xl 2xl:text-3xl font-bold">217</span>
									<div class="flex items-center ml-2 mb-1">
										<svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
											<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
										</svg>
										<span class="font-bold text-sm text-gray-500 ml-0.5">5%</span>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="px-6 py-6 bg-gray-100 border border-gray-300 rounded-lg shadow-xl">
						<div class="flex items-center justify-between">
							<span class="font-bold text-sm text-blue-600">New Connections</span>
							<span class="text-xs bg-gray-200 hover:bg-gray-500 text-gray-500 hover:text-gray-200 px-2 py-1 rounded-lg transition duration-200 cursor-default">7 days</span>
						</div>
						<div class="flex items-center justify-between mt-6">
							<div>
								<svg class="w-12 h-12 p-2.5 bg-blue-400 bg-opacity-20 rounded-full text-blue-600 border border-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
									<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
								</svg>
							</div>
							<div class="flex flex-col">
								<div class="flex items-end">
									<span class="text-2xl 2xl:text-3xl font-bold">54</span>
									<div class="flex items-center ml-2 mb-1">
										<svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
											<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
										</svg>
										<span class="font-bold text-sm text-gray-500 ml-0.5">7%</span>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="mt-4">
					<canvas id="verticalBarChart" style="display: block; box-sizing: border-box; height: 414px; width: 828px;" width="1656" height="828"></canvas>
				</div>
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