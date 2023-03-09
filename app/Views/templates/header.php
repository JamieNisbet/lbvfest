<?php

switch ($user_role) {
	case "admin":
		$meta_title = "ADMIN";
		$menu = [
			"Employees" => "/employees",
			"Finances" => "/finances",
			"Leaves" => [
				"History" => "/leave",
				"Apply for Leave" => "/leave/apply_leave",
			],
			"Time Sheet" => [
				"New Entry" => "/timesheet/new_entry",
				"History" => "/timesheet",
				"Clients" => "/clients",
				"Projects" => "/projects",
				"Activities" => "/activities",
				"Tasks" => "/tasks",
				"Assignments" => "/assignments",
			],

			"Departments" => "/departments",
			"Calendar" => "/calendar",
			"Holidays" => "/holidays",
		];
		break;
	case "manager":
		$meta_title = "MANAGER";
		$menu = [
			"Time Sheet" => "/timesheet/new_entry",
			"Leave History" => "/leave",
			"Apply for Leave" => "/leave/apply_leave",
			"Reports" => "/reports",
			"Calendar" => "/calendar",
			"Holidays" => "/holidays",
		];
		break;
	default:
		$meta_title = "EMPLOYEE";
		$menu = [
			"Time Sheet" => "/timesheet/new_entry",
			"Leave History" => "/leave",
			"Apply for Leave" => "/leave/apply_leave",
			"Reports" => "/reports",
			"Calendar" => "/calendar",
			"Holidays" => "/holidays",
		];
}


?>

<!DOCTYPE HTML>
<html>

<head>
	<title>Apoyar
		<?= isset($meta_title) ? $meta_title : "HUMAN" ?>
	</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<!-- PRODUCTION LINK  -->
	<!-- <link href="./css/app.css" rel="stylesheet"> -->
	<!-- DEVELOPMENT LINK -->
	<script src="https://cdn.tailwindcss.com"></script>
	<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.6.2.js"></script>
	<link href="https://cdn.jsdelivr.net/npm/tom-select/dist/css/tom-select.css" rel="stylesheet" />
</head>
<style>
	:root {
		--light: #edf2f9;
		--dark: #152e4d;
		--darker: #12263f;
	}

	.dark .dark\:text-light {
		color: var(--light);
	}

	.dark .dark\:bg-dark {
		background-color: var(--dark);
	}

	.dark .dark\:bg-darker {
		background-color: var(--darker);
	}

	.dark .dark\:text-gray-300 {
		color: #d1d5db;
	}

	.dark .dark\:text-indigo-500 {
		color: #6366f1;
	}

	.dark .dark\:text-indigo-100 {
		color: #e0e7ff;
	}

	.dark .dark\:hover\:text-light:hover {
		color: var(--light);
	}

	.dark .dark\:border-indigo-800 {
		border-color: #3730a3;
	}

	.dark .dark\:border-indigo-700 {
		border-color: #4338ca;
	}

	.dark .dark\:bg-indigo-600 {
		background-color: #4f46e5;
	}

	.dark .dark\:hover\:bg-indigo-600:hover {
		background-color: #4f46e5;
	}

	.dark .dark\:border-indigo-500 {
		border-color: #6366f1;
	}

	.hover\:overflow-y-auto:hover {
		overflow-y: auto;
	}
</style>



<body :class="{ 'dark': isDark }">
	<div x-data="setup()" x-init="$refs.loading.classList.add('hidden');" :class="{ 'dark': isDark }"
		@resize.window="watchScreen()">
		<div class="flex h-screen antialiased text-gray-900 bg-gray-100 dark:bg-dark dark:text-light">
			<!-- Loading screen -->
			<div x-ref="loading"
				class="fixed inset-0 z-50 flex items-center justify-center text-2xl font-semibold text-white bg-indigo-800">
				Loading.....
			</div>

			<!-- Sidebar first column -->
			<!-- Backdrop -->
			<div x-show="isSidebarOpen" @click="isSidebarOpen = false"
				class="fixed inset-0 z-10 bg-indigo-800 lg:hidden" style="opacity: 0.5" aria-hidden="true"></div>

			<aside x-show="isSidebarOpen" x-transition:enter="transition-all transform duration-300 ease-in-out"
				x-transition:enter-start="-translate-x-full opacity-0"
				x-transition:enter-end="translate-x-0 opacity-100"
				x-transition:leave="transition-all transform duration-300 ease-in-out"
				x-transition:leave-start="translate-x-0 opacity-100"
				x-transition:leave-end="-translate-x-full opacity-0" x-ref="sidebar"
				@keydown.escape="window.innerWidth <= 1024 ? isSidebarOpen = false : ''" tabindex="-1"
				class="fixed inset-y-0 z-10 flex-shrink-0 w-64 bg-white border-r lg:static dark:border-indigo-800 dark:bg-darker focus:outline-none">
				<div class="flex flex-col fixed h-full">
					<!-- Sidebar links -->
					<nav aria-label="Main" class="flex-1 px-2 py-4 space-y-2 overflow-y-hidden hover:overflow-y-auto">
						<!-- Dashboards links -->




						<div x-data="{ isActive: false, open: false }">
							<!-- active classes 'bg-indigo-100 dark:bg-indigo-600' -->
							<a href="<?= base_url() . '/' . $_SESSION['user_role'] ?>"
								class="flex items-center p-2 text-gray-500 transition-colors rounded-md dark:text-light hover:bg-indigo-100 dark:hover:bg-indigo-600">
								<span aria-hidden="true">
									<svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none"
										viewBox="0 0 24 24" stroke="currentColor">
										<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
											d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
									</svg>
								</span>
								<span class="ml-2 text-sm"> Hi,
									<?= $user_details['first_name'] ?? "there" ?>
								</span>
							</a>
						</div>

						<?php foreach ($menu as $title => $info) {
							if (gettype($info) == "string") { ?>
								<div x-data="{ isActive: false, open: false }">
									<!-- active classes 'bg-indigo-100 dark:bg-indigo-600' -->
									<a href="<?= base_url() . '/' . $_SESSION['user_role'] . $info ?>"
										class="flex items-center p-2 text-gray-500 transition-colors rounded-md dark:text-light hover:bg-indigo-100 dark:hover:bg-indigo-600">
										<span aria-hidden="true">
											<svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none"
												viewBox="0 0 24 24" stroke="currentColor">
												<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
													d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
											</svg>
										</span>
										<span class="ml-2 text-sm">
											<?= $title ?>
										</span>
									</a>
								</div>
							<?php } else { ?>
								<div x-data="{ isActive: false, open: false }">
									<a href="#" @click="$event.preventDefault(); open = !open"
										class="flex items-center p-2 text-gray-500 transition-colors rounded-md dark:text-light hover:bg-indigo-100 dark:hover:bg-indigo-600"
										:class="{ 'bg-indigo-100 dark:bg-indigo-600': isActive || open }" role="button"
										aria-haspopup="true" :aria-expanded="(open || isActive) ? 'true' : 'false'">
										<span aria-hidden="true">
											<svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none"
												viewBox="0 0 24 24" stroke="currentColor">
												<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
													d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
											</svg>
										</span>
										<span class="ml-2 text-sm">
											<?= $title ?>
										</span>
										<span aria-hidden="true" class="ml-auto">
											<!-- active class 'rotate-180' -->
											<svg class="w-4 h-4 transition-transform transform" :class="{ 'rotate-180': open }"
												xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
												stroke="currentColor">
												<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
													d="M19 9l-7 7-7-7" />
											</svg>
										</span>
									</a>

									<div x-show="open" class="mt-2 space-y-2 px-7" role="menu" arial-label="Components">

										<?php foreach ($info as $title => $url) { ?>

											<a href="<?= base_url() . '/' . $_SESSION['user_role'] . $url ?>" role="menuitem"
												class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:text-gray-400 dark:hover:text-light hover:text-gray-700">
												<?= $title ?>
											</a>
										<?php } ?>

									</div>
								</div>
							<?php }
						}
						?>











						<!-- Layouts links -->
						<div>

							<!-- active & hover classes 'bg-indigo-100 dark:bg-indigo-600' -->
							<div class="mt-2 space-y-2 px-7" role="menu" aria-label="Authentication">
								<a href="<?= base_url() . '/' . $_SESSION['user_role'] ?>" role="menuitem"
									class="block p-2 mt-10 text-2xl text-center text-gray-700 transition-colors duration-200 rounded-md dark:text-light dark:hover:text-light hover:text-gray-700">
									Apoyar Human
								</a>
							</div>
						</div>
					</nav>

					<!-- Sidebar footer -->
					<div class="relative flex items-center justify-center flex-shrink-0 px-2 py-4 space-x-4">
						<!-- Search button -->
						<button @click="openSearchPanel"
							class="p-2 text-indigo-400 transition-colors duration-200 rounded-full bg-indigo-50 hover:text-indigo-600 hover:bg-indigo-100 dark:hover:text-light dark:hover:bg-indigo-700 dark:bg-dark focus:outline-none focus:bg-indigo-100 dark:focus:bg-indigo-700 focus:ring-indigo-800">
							<span class="sr-only">Open search panel</span>
							<svg class="w-7 h-7" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
								stroke="currentColor" aria-hidden="true">
								<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
									d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
							</svg>
						</button>


						<!-- User avatar button -->
						<div class="" x-data="{ open: false }">
							<button @click="open = !open; $nextTick(() => { if(open){ $refs.userMenu.focus() } })"
								type="button" aria-haspopup="true" :aria-expanded="open ? 'true' : 'false'"
								class="block transition-opacity duration-200 rounded-full dark:opacity-75 dark:hover:opacity-100 focus:outline-none focus:ring dark:focus:opacity-100">
								<span class="sr-only">User menu</span>

								<img class="w-12 h-12 rounded-full" src="./images/avatar_placeholder.png"
									alt="Ahmed Kamel" />
							</button>
							<!-- User dropdown menu -->
							<div x-show="open" x-ref="userMenu" x-transition:enter="transition-all transform ease-out"
								x-transition:enter-start="-translate-y-1/2 opacity-0"
								x-transition:enter-end="translate-y-0 opacity-100"
								x-transition:leave="transition-all transform ease-in"
								x-transition:leave-start="translate-y-0 opacity-100"
								x-transition:leave-end="-translate-y-1/2 opacity-0" @click.away="open = false"
								@keydown.escape="open = false"
								class="absolute max-w-xs py-1 bg-white rounded-md shadow-lg min-w-max left-5 right-5 bottom-full ring-1 ring-black ring-opacity-5 dark:bg-dark focus:outline-none"
								tabindex="-1" role="menu" aria-orientation="vertical" aria-label="User menu">
								<a href="<?= base_url() ?>/<?= $_SESSION['user_role'] ?>/profile/<?= $_SESSION['user_id'] ?>"
									role="menuitem"
									class="block px-4 py-2 text-sm text-gray-700 transition-colors hover:bg-gray-100 dark:text-light dark:hover:bg-indigo-600">Profile</a>
								<a href="<?= base_url() ?>/<?= $_SESSION['user_role'] ?>/policies" role="menuitem"
									class="block px-4 py-2 text-sm text-gray-700 transition-colors hover:bg-gray-100 dark:text-light dark:hover:bg-indigo-600">Policies</a>
								<a href="<?= base_url() ?>/logout" role="menuitem"
									class="block px-4 py-2 text-sm text-gray-700 transition-colors hover:bg-gray-100 dark:text-light dark:hover:bg-indigo-600">
									Log Out
								</a>
							</div>
						</div>

						<!-- Settings button -->
						<button @click="openSettingsPanel"
							class="p-2 text-indigo-400 transition-colors duration-200 rounded-full bg-indigo-50 hover:text-indigo-600 hover:bg-indigo-100 dark:hover:text-light dark:hover:bg-indigo-700 dark:bg-dark focus:outline-none focus:bg-indigo-100 dark:focus:bg-indigo-700 focus:ring-indigo-800">
							<span class="sr-only">Open settings panel</span>
							<svg fill="none" class="w-7 h-7" stroke="currentColor" stroke-width="1.5"
								viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
								<path stroke-linecap="round" stroke-linejoin="round"
									d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0">
								</path>
							</svg>
					</div>
				</div>
			</aside>

			<!-- Second column -->
			<!-- Backdrop -->
			<div x-show="isSecondSidebarOpen" @click="isSecondSidebarOpen = false"
				class="fixed inset-0 z-10 bg-indigo-800 lg:hidden" style="opacity: 0.5" aria-hidden="true"></div>



			<!-- Sidebars buttons -->
			<div class="fixed flex items-center space-x-4 top-5 right-10 lg:hidden">
				<button @click="isSidebarOpen = true; $nextTick(() => { $refs.sidebar.focus() })"
					class="p-1 text-indigo-400 transition-colors duration-200 rounded-md bg-indigo-50 hover:text-indigo-600 hover:bg-indigo-100 dark:hover:text-light dark:hover:bg-indigo-700 dark:bg-dark focus:outline-none focus:ring">
					<span class="sr-only">Toggle main menu</span>
					<span aria-hidden="true">
						<svg x-show="!isSidebarOpen" class="w-8 h-8" xmlns="http://www.w3.org/2000/svg" fill="none"
							viewBox="0 0 24 24" stroke="currentColor">
							<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
								d="M4 6h16M4 12h16M4 18h16" />
						</svg>
						<svg x-show="isSidebarOpen" class="w-8 h-8" xmlns="http://www.w3.org/2000/svg" fill="none"
							viewBox="0 0 24 24" stroke="currentColor">
							<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
								d="M6 18L18 6M6 6l12 12" />
						</svg>
					</span>
				</button>
				<button @click="isSecondSidebarOpen = true; $nextTick(() => { $refs.secondSidebar.focus() })"
					class="p-1 text-indigo-400 transition-colors duration-200 rounded-md bg-indigo-50 hover:text-indigo-600 hover:bg-indigo-100 dark:hover:text-light dark:hover:bg-indigo-700 dark:bg-dark focus:outline-none focus:ring">
					<span class="sr-only">Toggle panel</span>
					<span aria-hidden="true">
						<svg class="w-8 h-8 transition-transform transform"
							:class="{ 'rotate-180': isSecondSidebarOpen }" xmlns="http://www.w3.org/2000/svg"
							fill="none" viewBox="0 0 24 24" stroke="currentColor">
							<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
								d="M13 5l7 7-7 7M5 5l7 7-7 7" />
						</svg>
					</span>
				</button>
			</div>

			<!-- Main content -->
			<main class="flex-1 ">


				<!-- Panels -->

				<!-- Settings Panel -->
				<!-- Backdrop -->
				<div x-transition:enter="transition duration-300 ease-in-out" x-transition:enter-start="opacity-0"
					x-transition:enter-end="opacity-100" x-transition:leave="transition duration-300 ease-in-out"
					x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
					x-show="isSettingsPanelOpen" @click="isSettingsPanelOpen = false"
					class="fixed inset-0 z-10 bg-indigo-800" style="opacity: 0.5" aria-hidden="true"></div>
				<!-- Panel -->
				<section x-transition:enter="transition duration-300 ease-in-out transform sm:duration-500"
					x-transition:enter-start="translate-x-full" x-transition:enter-end="translate-x-0"
					x-transition:leave="transition duration-300 ease-in-out transform sm:duration-500"
					x-transition:leave-start="translate-x-0" x-transition:leave-end="translate-x-full"
					x-ref="settingsPanel" tabindex="-1" x-show="isSettingsPanelOpen"
					@keydown.escape="isSettingsPanelOpen = false"
					class="fixed inset-y-0 right-0 z-20 w-full max-w-xs bg-white shadow-xl dark:bg-darker dark:text-light sm:max-w-md focus:outline-none"
					aria-labelledby="settinsPanelLabel">
					<div class="absolute left-0 p-2 transform -translate-x-full">
						<!-- Close button -->
						<button @click="isSettingsPanelOpen = false"
							class="p-2 text-white rounded-md focus:outline-none focus:ring">
							<svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
								stroke="currentColor">
								<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
									d="M6 18L18 6M6 6l12 12" />
							</svg>
						</button>
					</div>
					<!-- Panel content -->
					<div class="flex flex-col h-screen">
						<!-- Panel header -->
						<div
							class="flex flex-col items-center justify-center flex-shrink-0 px-4 py-8 space-y-4 border-b dark:border-indigo-700">
							<span aria-hidden="true" class="text-gray-500 dark:text-indigo-600">
								<svg fill="none" class="w-8 h-8" stroke="currentColor" stroke-width="1.5"
									viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
									<path stroke-linecap="round" stroke-linejoin="round"
										d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0">
									</path>
								</svg>
							</span>
							<h2 id="settinsPanelLabel" class="text-xl font-medium text-gray-500 dark:text-light">
								Notifications</h2>
						</div>
						<!-- Content -->
						<div class="flex-1 overflow-hidden hover:overflow-y-auto">
							<!-- Theme -->
							<!-- <div class="p-4 space-y-4 md:p-8">
								<h6 class="text-lg font-medium text-gray-400 dark:text-light">Mode</h6>
								<div class="flex items-center space-x-8">
									<button @click="setLightTheme" class="flex items-center justify-center px-4 py-2 space-x-4 transition-colors border rounded-md hover:text-gray-900 hover:border-gray-900 dark:border-indigo-600 dark:hover:text-indigo-100 dark:hover:border-indigo-500 focus:outline-none focus:ring focus:ring-indigo-400 dark:focus:ring-indigo-700" :class="{ 'border-gray-900 text-gray-900 dark:border-indigo-500 dark:text-indigo-100': !isDark, 'text-gray-500 dark:text-indigo-500': isDark }">
										<span>
											<svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
												<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
											</svg>
										</span>
										<span>Light</span>
									</button>

									<button @click="setDarkTheme" class="flex items-center justify-center px-4 py-2 space-x-4 transition-colors border rounded-md hover:text-gray-900 hover:border-gray-900 dark:border-indigo-600 dark:hover:text-indigo-100 dark:hover:border-indigo-500 focus:outline-none focus:ring focus:ring-indigo-400 dark:focus:ring-indigo-700" :class="{ 'border-gray-900 text-gray-900 dark:border-indigo-500 dark:text-indigo-100': isDark, 'text-gray-500 dark:text-indigo-500': !isDark }">
										<span>
											<svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
												<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
											</svg>
										</span>
										<span>Dark</span>
									</button>
								</div>
							</div> -->

							<div class="p-4 space-y-4 md:p-8">
								<h6 class="text-lg font-medium text-gray-400 dark:text-light">Unread</h6>
								<div class="flex items-center w-full space-x-8">
									<div
										class="flex w-full border rounded-lg justify-between space-x-6 items-center p-6">

										<div class="flex items-center space-x-4">
											<div class="flex flex-col space-y-2">
												<span>Title</span>
												<span>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas
													quos iure maiores.</span>
											</div>
										</div>
									</div>
									<?php if (isset($notifications)) {
										foreach ($notifications as $notification) { ?>
											<div
												class="flex w-full border rounded-lg justify-between space-x-6 items-center p-6">
												<div class="flex items-center space-x-4">
													<img src="https://flowbite.com/docs/images/people/profile-picture-2.jpg"
														class="rounded-full h-14 w-14" alt="">
													<div class="flex flex-col space-y-2">
														<span>Title</span>
														<span>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas
															quos iure maiores. Fugit voluptatem quis earum quo qui assumenda,
															nisi quos velit sed, atque perspiciatis exercitationem minus animi
															reiciendis eum?</span>
													</div>
												</div>
											</div>
										<?php }
									} ?>




								</div>

							</div>

						</div>
					</div>
				</section>

				<!-- Search panel -->
				<!-- Backdrop -->
				<div x-transition:enter="transition duration-300 ease-in-out" x-transition:enter-start="opacity-0"
					x-transition:enter-end="opacity-100" x-transition:leave="transition duration-300 ease-in-out"
					x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" x-show="isSearchPanelOpen"
					@click="isSearchPanelOpen = false" class="fixed inset-0 z-10 bg-indigo-800" style="opacity: 0.5"
					aria-hidden="ture"></div>
				<!-- Panel -->
				<section x-transition:enter="transition duration-300 ease-in-out transform sm:duration-500"
					x-transition:enter-start="-translate-x-full" x-transition:enter-end="translate-x-0"
					x-transition:leave="transition duration-300 ease-in-out transform sm:duration-500"
					x-transition:leave-start="translate-x-0" x-transition:leave-end="-translate-x-full"
					x-show="isSearchPanelOpen" @keydown.escape="isSearchPanelOpen = false"
					class="fixed inset-y-0 z-20 w-full max-w-xs bg-white shadow-xl dark:bg-darker dark:text-light sm:max-w-md focus:outline-none">
					<div class="absolute right-0 p-2 transform translate-x-full">
						<!-- Close button -->
						<button @click="isSearchPanelOpen = false"
							class="p-2 text-white rounded-md focus:outline-none focus:ring">
							<svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
								stroke="currentColor">
								<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
									d="M6 18L18 6M6 6l12 12" />
							</svg>
						</button>
					</div>

					<h2 class="sr-only">Search panel</h2>
					<!-- Panel content -->
					<div class="flex flex-col h-screen">
						<!-- Panel header (Search input) -->
						<div
							class="relative flex-shrink-0 px-4 py-8 text-gray-400 border-b dark:border-indigo-800 dark:focus-within:text-light focus-within:text-gray-700">
							<span class="absolute inset-y-0 inline-flex items-center px-4">
								<svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
									stroke="currentColor">
									<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
										d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
								</svg>
							</span>
							<input x-ref="searchInput" type="text"
								class="w-full py-2 pl-10 pr-4 border rounded-full dark:bg-dark dark:border-transparent dark:text-light focus:outline-none focus:ring"
								placeholder="Search..." />
						</div>

						<!-- Panel content (Search result) -->
						<div class="flex-1 px-4 pb-4 space-y-4 overflow-y-hidden h hover:overflow-y-auto">
							<h3 class="py-2 text-sm font-semibold text-gray-600 dark:text-light">Results</h3>
							<!--  -->
							<!-- Search content -->
							<!--  -->
						</div>
					</div>
				</section>