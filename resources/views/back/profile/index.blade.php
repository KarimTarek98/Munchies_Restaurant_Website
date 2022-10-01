@extends('back.admin_master')

@section('title')
    Admin Profile | Munchies
@endsection

@section('content')
<div class="content">							<div class="bg-white border rounded">
								<div class="row no-gutters">
									<div class="col-lg-8 col-xl-8">
										<div class="profile-content-left pt-5 pb-3 px-3 px-xl-5">
											<div class="card text-center widget-profile px-0 border-0">
												<div class="card-img mx-auto rounded-circle">
                                                    @php
                                                        $authUser = Auth::user();
                                                    @endphp
													<img src="{{ url($user->profile_pic) }}" width="100" height="100" alt="user image">
												</div>
												<div class="card-body">
													<h4 class="py-2 text-dark">{{ $user->name }}</h4>
													<p>{{ $user->email }}</p>

												</div>
											</div>

											<hr class="w-100">
                                            <a href="{{ route('edit.profile') }}" class="mb-1 btn btn-primary">
                                                Edit Profile
                                            </a>
										</div>
									</div>
								</div>
							</div></div>
@endsection
