@extends('layouts.app')

@section('content')
	<div class="flex">
		{{-- Sidebar Begin --}}
		<div class="md:w-1/6 w-full md:h-screen border-r border-grey-lighter">
			{{-- Logo --}}
			<div class="py-6 border-b border-grey-light text-center bg-blue">
				<li class="list-reset text-white font-semibold">
					<img src="{{ asset('storage/images/logo.png') }}" class="w-10 h-10 absolute -mt-2 -ml-12">
					European Demo Facility
				</li>
			</div>

			{{-- Project List Begin --}}
			<div>
				<div class="bg-white text-center py-4 flex">
					<div class="text-center">
						<img src="svg/flask.svg" class="w-10 h-10 ml-12 border rounded-full border-grey-darkest">
					</div>
					<div class="text-left ml-4">
						<h4 class="text-grey-darkest mb-1">Marketing</h4>
						<h5 class="text-blue uppercase">mkrt</h5>
					</div>
					<div></div>
				</div>
				<div class="mt-10">
					<div class="">
						<div class="ml-12">
							<a href="#" class="no-underline text-grey-darkest font-semibold text-sm ">
								<img src="svg/align-left.svg" class="w-4 h-4 mr-4">
								Issues
							</a>
						</div>
						<div class="py-2 bg-white list-reset text-sm text-grey-dark pl-24 mt-2 flex border-r-4 border-blue rounded-r">
							<a href="#" class="no-underline text-grey-dark">
								<div class="inline-block w-24">All</div>
								<div class="inline-block">74</div>
							</a>
						</div>
						<div class="py-2 list-reset text-sm text-grey-dark pl-24 flex">
							<a href="#" class="no-underline text-grey-dark">
								<div class="inline-block w-24">My</div>
								<div class="inline-block">12</div>
							</a>
						</div>
					</div>

					<div class="mt-4">
						<div class="ml-12">
							<a href="#" class="no-underline text-grey-darkest font-semibold text-sm ">
								<img src="svg/reports.png" class="w-4 h-4 mr-4">
								Reports
							</a>
						</div>
					</div>

					<div class="mt-4">
						<div class="ml-12">
							<a href="#" class="no-underline text-grey-darkest font-semibold text-sm ">
								<img src="svg/rocket.png" class="w-4 h-4 mr-4">
								Releases
							</a>
						</div>
					</div>

					<div class="mt-4">
						<div class="ml-12">
							<a href="#" class="no-underline text-grey-darkest font-semibold text-sm ">
								<img src="svg/copy.png" class="w-4 h-4 mr-4">
								Components
							</a>
						</div>
					</div>

					<div class="mt-4">
						<div class="ml-12">
							<a href="#" class="no-underline text-grey-darkest font-semibold text-sm ">
								<img src="svg/clock.png" class="w-4 h-4 mr-4">
								Timesheets
							</a>
						</div>
					</div>

					<div class="mt-4">
						<div class="ml-12">
							<a href="#" class="no-underline text-grey-darkest font-semibold text-sm ">
								<img src="svg/signal.png" class="w-4 h-4 mr-4">
								Tests
							</a>
						</div>
					</div>

					<div class="mt-4">
						<div class="ml-12">
							<a href="#" class="no-underline text-grey-darkest font-semibold text-sm ">
								<img src="svg/database.png" class="w-4 h-4 mr-4">
								Add-ons
							</a>
						</div>
					</div>

				</div>

				<div class="bg-white text-center py-4 flex mt-10">
					<div class="text-center">
						<img src="svg/two-tubes.svg" class="w-10 h-10 ml-12 border rounded-full border-grey-darkest">
					</div>
					<div class="text-left ml-4">
						<h4 class="text-grey-darkest mb-1">Sales Marketing</h4>
						<h5 class="text-blue uppercase">slsmkt</h5>
					</div>
					<div></div>
				</div>

				<div class="bg-white text-center py-4 flex border-t border-grey-light">
					<div class="text-center">
						<img src="svg/creative.png" class="w-10 h-10 ml-12 rounded-full bg-blue">
					</div>
					<div class="text-left ml-4">
						<h4 class="text-grey-darkest mb-1">Marketing Aerodefense</h4>
						<h5 class="text-blue uppercase">Mrdfn</h5>
					</div>
				</div>

			</div>
		</div>

		<div class="md:w-5/6 w-full">
			{{-- Navbar --}}
			<nav class="bg-blue px-4 flex justify-between">
				{{-- User --}}
				<div class="flex">
					<div class="py-6">
						<img src="{{ asset('storage/avatars/3/avatar.png') }}" class="w-10 h-10 absolute -mt-2 ml-2 inline-block">
						<a href="#" class="text-white font-semibold ml-16 no-underline">Grace Parkinson</a>
					</div>
				</div>
				{{-- End User --}}

				{{-- Menu Begin --}}
				<div class="flex">
					<li class="list-reset px-4 py-6"><a href="#" class="text-blue bg-white rounded-full py-2 px-8 font-semibold no-underline border hover:bg-blue hover:border-white hover:text-white">Create</a></li>
					<li class="list-reset py-6 px-4 border-b border-white"><a href="#" class="text-white font-semibold no-underline">Teams</a></li>
					<li class="list-reset py-6 px-4"><a href="#" class="text-blue-lighter font-semibold no-underline">Boards</a></li>
					<li class="list-reset py-6 px-4"><a href="#" class="text-blue-lighter font-semibold no-underline">Calendar</a></li>
					<li class="list-reset py-6 px-4"><a href="#" class="text-blue-lighter font-semibold no-underline">Settings</a></li>
				</div>
				<div class="flex">
					<input type="text" name="search" placeholder="Search..." class=" w-64 appearance-none text-grey-darkest shadow px-3 py-2 rounded-full absolute mt-4 -ml-6">
				</div>
				{{-- Menu End --}}

				<div class="flex">
					<li class="list-reset py-6 px-4"><a href="#" class="text-white font-semibold no-underline">Login</a></li>
					<li class="list-reset py-6 px-4"><a href="#" class="text-white font-semibold no-underline">Register</a></li>
				</div>

			</nav>
			{{-- End Navbar --}}

			<div class="flex">
				<div class="w-1/4">
					<div>
						{{-- Priority List --}}
						<h4 class="text-grey-darkest p-4">Priority</h4>
						<div class="flex px-4">
							<div class="w-1/3">
								<button class="bg-grey-darkest text-white rounded-full py-1 w-24">All</button>
							</div>
							<div class="w-1/3">
								<button class="bg-white shadow-md text-grey-darkest rounded-full py-1 w-24 hover:bg-grey-dark hover:text-white">Blocker</button>
							</div>
							<div class="w-1/3">
								<button class="bg-white shadow-md text-grey-darkest rounded-full py-1 w-24 hover:bg-grey-dark hover:text-white">Critical</button>
							</div>
						</div>
						<div class="flex p-4">
							<div class="w-1/3">
								<button class="bg-white shadow-md text-grey-darkest rounded-full py-1 w-24 hover:bg-grey-dark hover:text-white">Major</button>
							</div>
							<div class="w-1/3">
								<button class="bg-white shadow-md text-grey-darkest rounded-full py-1 w-24 hover:bg-grey-dark hover:text-white">Minor</button>
							</div>
							<div class="w-1/3">
								<button class="bg-white shadow-md text-grey-darkest rounded-full py-1 w-24 hover:bg-grey-dark hover:text-white">Trivial</button>
							</div>
						</div>
						{{-- End Priority List --}}
					</div>
						{{-- Issue List Begin --}}
						<div class="ml-4">

							<div class="my-4 bg-grey-lighter rounded shadow-md p-4 border-l-4 border-purple w-90">
								<div class="flex">
									<div><img src="{{ asset('storage/avatars/3/avatar.png') }}" class="w-8 h-8"></div>
									<div class="ml-4">
										<a href="#" class="no-underline text-blue uppercase font-semibold">MRKT-426</a>
										<h5 class="text-grey-darkest">Contact web page error</h5>
									</div>
								</div>
								<div class="flex mt-4">
									<div class="text-grey-dark text-sm">Type</div>
									<div class="ml-5">
										<img src="{{ asset('storage/icons/bug.png') }}">
										<h5 class="inline-block text-grey-darkest">Bug</h5>
									</div>
								</div>
								<div class="flex mt-2">
									<div class="text-grey-dark text-sm">Due</div>
									<div class="ml-6">
										<h5 class="inline-block text-grey-darkest">14-Feb-2018</h5>
									</div>
								</div>
							</div>

							<div class="my-4 bg-white rounded shadow-md p-4 border-l-4 border-orange w-90">
								<div class="flex">
									<div><img src="{{ asset('storage/avatars/1/avatar.png') }}" class="w-8 h-8"></div>
									<div class="ml-4">
										<a href="#" class="no-underline text-blue uppercase font-semibold">MRKT-310</a>
										<h5 class="text-grey-darkest">Brand new Swag concept</h5>
									</div>
								</div>
								<div class="flex mt-4">
									<div class="text-grey-dark text-sm">Type</div>
									<div class="ml-5">
										<img src="{{ asset('storage/icons/improvement.png') }}">
										<h5 class="inline-block text-grey-darkest">Improvements</h5>
									</div>
								</div>
								<div class="flex mt-2">
									<div class="text-grey-dark text-sm">Due</div>
									<div class="ml-6">
										<h5 class="inline-block text-grey-darkest">24-Mar-2018</h5>
									</div>
								</div>
							</div>

							<div class="my-4 bg-grey-lighter rounded shadow-md p-4 border-l-4 border-orange w-90">
								<div class="flex">
									<div><img src="{{ asset('storage/avatars/4/avatar.png') }}" class="w-8 h-8"></div>
									<div class="ml-4">
										<a href="#" class="no-underline text-blue uppercase font-semibold">MRKT-526</a>
										<h5 class="text-grey-darkest">FB adds target audience</h5>
									</div>
								</div>
								<div class="flex mt-4">
									<div class="text-grey-dark text-sm">Type</div>
									<div class="ml-5">
										<img src="{{ asset('storage/icons/epic.png') }}">
										<h5 class="inline-block text-grey-darkest">Epic</h5>
									</div>
								</div>
								<div class="flex mt-2">
									<div class="text-grey-dark text-sm">Due</div>
									<div class="ml-6">
										<h5 class="inline-block text-grey-darkest">10-Mar-2018</h5>
									</div>
								</div>
							</div>

							<div class="my-4 bg-grey-lighter rounded shadow-md p-4 border-l-4 border-orange w-90">
								<div class="flex">
									<div><img src="{{ asset('storage/avatars/5/avatar.png') }}" class="w-8 h-8"></div>
									<div class="ml-4 w-5/6">
										<div class="flex justify-between">
											<a href="#" class="no-underline text-blue uppercase font-semibold">MRKT-527</a>
											<div class="">
												<div class="inline-block w-2 h-2 bg-green rounded-full"></div>
												<div class="inline-block text-sm text-grey-darkest">75%</div>
											</div>
										</div>

										<h5 class="text-grey-darkest">ITGM competitors</h5>
									</div>
								</div>
							</div>

							<div class="my-4 bg-grey-lighter rounded shadow-md p-4 border-l-4 border-orange w-90">
								<div class="flex">
									<div><img src="{{ asset('storage/avatars/6/avatar.png') }}" class="w-8 h-8"></div>
									<div class="ml-4 w-5/6">
										<div class="flex justify-between">
											<a href="#" class="no-underline text-blue uppercase font-semibold">MRKT-528</a>
											<div class="">
												<div class="inline-block w-2 h-2 bg-orange rounded-full"></div>
												<div class="inline-block text-sm text-grey-darkest">23%</div>
											</div>
										</div>

										<h5 class="text-grey-darkest">Affix company seals on...</h5>
									</div>
								</div>
							</div>

							<div class="my-4 bg-grey-lighter rounded shadow-md p-4 border-l-4 border-orange w-90">
								<div class="flex">
									<div><img src="{{ asset('storage/avatars/4/avatar.png') }}" class="w-8 h-8"></div>
									<div class="ml-4 w-5/6">
										<div class="flex justify-between">
											<a href="#" class="no-underline text-blue uppercase font-semibold">MRKT-538</a>
											<div class="">
												<div class="inline-block w-2 h-2 bg-green rounded-full"></div>
												<div class="inline-block text-sm text-grey-darkest">80%</div>
											</div>
										</div>

										<h5 class="text-grey-darkest">As Data Generation Tool User...</h5>
									</div>
								</div>
							</div>

						</div>
						{{-- End Issue list --}}
				</div>

				<div class="w-1/2">
					{{-- Issue detail --}}
					<div class="bg-white mt-2 rounded">
						<div class="border-b border-grey-lighter py-5">
							<a href="#" class="inline-block no-underline font-semibold text-blue px-8">Edit</a>
							<a href="#" class="inline-block no-underline font-semibold text-blue px-8">Assign</a>
							<a href="#" class="inline-block no-underline font-semibold text-blue px-8">In Progress</a>
							<a href="#" class="inline-block no-underline font-semibold text-blue px-8">More</a>
						</div>
						<div class="px-8 py-8">
							<div class="flex">
								<img src="{{ asset('storage/images/logo.png') }}" class="w-12 h-12">
								<div class="ml-8">
									<div class="flex">
										<a href="#" class="text-sm text-blue no-underline font-semibold">Marketing</a>
										<span class="px-2 text-grey-dark">/</span>
										<a href="#" class="text-sm text-blue no-underline font-semibold uppercase">MRKT-310</a>
									</div>
									<div>
										<h3 class="text-2xl font-semibold">Brand new Swag concept</h3>
									</div>
								</div>
							</div>
						</div>
						<div class="px-8 pb-8 leading-normal">
							<p>
								Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque pellentesque id eros vel sodales. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. In ornare rhoncus diam, tincidunt interdum diam auctor sit amet. Pellentesque dapibus, lacus ac gravida blandit, nisl ligula porta felis, gravida vulputate enim mi quis tortor. Mauris justo velit, scelerisque nec facilisis nec, dapibus a turpis. Aenean euismod lorem non faucibus interdum. Fusce sed justo vitae massa tincidunt mollis vitae in sapien. Cras ultricies quis metus sit amet pulvinar. Phasellus in egestas mauris. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae;
							</p>
						</div>
					</div>
					{{-- End Issue detail --}}

					{{-- Issue tabs --}}
					<div class="flex mt-4 mb-10">
						<button class="bg-grey-darkest text-white rounded-full py-1 w-24 mx-4">Comments</button>
						<button class="bg-white shadow text-grey-darkest rounded-full py-1 w-24 hover:bg-grey-dark hover:text-white mx-4">Work Log</button>
						<button class="bg-white shadow text-grey-darkest rounded-full py-1 w-24 hover:bg-grey-dark hover:text-white mx-4">History</button>
						<button class="bg-white shadow text-grey-darkest rounded-full py-1 w-24 hover:bg-grey-dark hover:text-white mx-4">Activity</button>
					</div>
					{{-- End Issue tabs --}}

					{{-- Comments --}}
					<div class="mt-4">
						<div class="bg-white rounded shadow my-4">
							<div class="flex py-4">
								<img src="{{ asset('storage/avatars/3/avatar.png') }}" class="w-8 h-8 mx-8">
								<a href="#" class="text-blue no-underline text-sm mt-2 mr-2 font-semibold">Grace Parkinson</a>
								<span class="mt-2 text-sm text-grey-dark">added a comment - </span>
								<span class="mt-2 text-sm text-grey-dark">Yesterday</span>
							</div>
							<p class="px-8 pb-8 leading-normal">
								Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque pellentesque id eros vel sodales. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. In ornare rhoncus diam, tincidunt interdum diam auctor sit amet. Pellentesque dapibus, lacus ac gravida blandit, nisl ligula porta felis, gravida vulputate enim mi quis tortor.
							</p>
						</div>

						<div class="bg-white rounded shadow my-4">
							<div class="flex py-4">
								<img src="{{ asset('storage/avatars/5/avatar.png') }}" class="w-8 h-8 mx-8">
								<a href="#" class="text-blue no-underline text-sm mt-2 mr-2 font-semibold">Bill Zuchmenn</a>
								<span class="mt-2 text-sm text-grey-dark">added a comment - </span>
								<span class="mt-2 text-sm text-grey-dark">1h ago</span>
							</div>
							<p class="px-8 pb-8 leading-normal">
								Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. In ornare rhoncus diam, tincidunt interdum diam auctor sit amet.
							</p>
							<div class="flex px-8 pb-8">
								<div class="flex mr-4">
									<img src="{{ asset('storage/icons/file.png') }}" class="w-8 h-8"">
									<div class="ml-2 text-sm">
										<a href="#" class="text-blue no-underline font-semibold">Specification.doc</a>
										<div class="text-grey">12.01.18</div>
									</div>
								</div>
								<div class="flex mr-4">
									<img src="{{ asset('storage/icons/image.png') }}" class="w-8 h-8"">
									<div class="ml-2 text-sm">
										<a href="#" class="text-blue no-underline font-semibold">HodieConcept.png</a>
										<div class="text-grey">12.01.18</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					{{-- End comments --}}
				</div>

				<div class="w-1/4">
					<div class="w-5/6 ml-8">
						<div class="text-center flex justify-center mt-4 text-grey-darkest border-b-2 border-grey pb-8">
							<div class="">
								<h4>3h 38m 14s</h4>
								<div class="flex mt-4 ml-2">
									<div class="w-4 h-4 bg-grey mt-2 mr-8"></div>
									<div class="w-4 h-4 border-l border-grey border-r mt-2"></div>
								</div>
							</div>
						</div>

						<div class="mt-8 border-b-2 border-grey pb-2">
							<h4 class="text-grey-darkest">Attachments</h4>
							<div class="bg-white border border-dashed border-grey py-12 mt-8 text-center font-semibold text-grey-dark">
								Drop files or <a href="#" class="no-underline text-blue">browse</a>
							</div>

							<div class="mt-12">
								<div class="flex mb-4">
									<img src="{{ asset('storage/icons/file.png') }}" class="w-8 h-8"">
									<div class="ml-2 text-sm">
										<a href="#" class="text-blue no-underline font-semibold">Specification.doc</a>
										<div class="text-grey">12.01.18</div>
									</div>
								</div>
								<div class="flex mb-4">
									<img src="{{ asset('storage/icons/image.png') }}" class="w-8 h-8"">
									<div class="ml-2 text-sm">
										<a href="#" class="text-blue no-underline font-semibold">HodieConcept.png</a>
										<div class="text-grey">12.01.18</div>
									</div>
								</div>
							</div>

						</div>

						<div class="mt-4 border-b-2 border-grey pb-2">
							<h4 class="mb-8">Details</h4>
							<div class="flex">
								<div class="text-grey-dark text-sm">Type</div>
								<div class="ml-12">
									<img src="{{ asset('storage/icons/improvement.png') }}">
									<h5 class="inline-block text-grey-darkest">Improvements</h5>
								</div>
							</div>

							<div class="flex my-4">
								<div class="text-grey-dark text-sm">Priority</div>
								<div class="ml-8">
									<div class="mr-1 w-4 h-4 bg-orange rounded-full inline-block"></div>
									<h5 class="inline-block text-grey-darkest">Normal</h5>
								</div>
							</div>

							<div class="flex my-4">
								<div class="text-grey-dark text-sm">Labels</div>
								<div class="ml-10">
									<h5 class="inline-block text-grey-darkest">None</h5>
								</div>
							</div>

							<div class="flex my-4">
								<div class="text-grey-dark text-sm">Status</div>
								<div class="ml-10">
									<h5 class="inline-block text-grey-darkest">TO DO</h5>
								</div>
							</div>

							<div class="flex my-4">
								<div class="text-grey-dark text-sm">Resolution</div>
								<div class="ml-4">
									<h5 class="inline-block text-grey-darkest">Unresolved</h5>
								</div>
							</div>

						</div>

						<div class="mt-4">
							<h4 class="mb-8">People</h4>
							<div class="flex my-5">
								<h4 class="text-grey font-normal text-sm">Assignee</h4>
								<div class="flex -mt-2">
									<img src="{{ asset('storage/avatars/3/avatar.png') }}" class="w-8 h-8 mx-4">
									<a href="#" class="text-blue no-underline text-sm mt-2 mr-2 font-semibold">Grace Parkinson</a>
								</div>
							</div>
							<div class="flex my-5">
								<h4 class="text-grey font-normal text-sm">Reporter</h4>
								<div class="flex -mt-2">
									<img src="{{ asset('storage/avatars/5/avatar.png') }}" class="w-8 h-8 mx-4">
									<a href="#" class="text-blue no-underline text-sm mt-2 mr-2 font-semibold">Bill Zuchemenn</a>
								</div>
							</div>
						</div>

					</div>
				</div>
			</div>

		</div>
	</div>
@endsection
