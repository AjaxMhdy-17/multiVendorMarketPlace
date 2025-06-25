 @extends('admin.layout.main')

 @section('title', $title)

 @section('content')


     <!-- Page header -->
     <div class="page-header d-print-none">
         <div class="container-xl">
             <div class="row g-2 align-items-center">
                 <div class="col">
                     <!-- Page pre-title -->
                     <div class="page-pretitle">
                         Overview
                     </div>
                     <h2 class="page-title">
                         Combo layout
                     </h2>
                 </div>
                 <!-- Page title actions -->
                 <div class="col-auto ms-auto d-print-none">
                     <div class="btn-list">
                         <span class="d-none d-sm-inline">
                             <a href="#" class="btn">
                                 New view
                             </a>
                         </span>
                         <a href="#" class="btn btn-primary d-none d-sm-inline-block" data-bs-toggle="modal"
                             data-bs-target="#modal-report">
                             <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                             <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                 viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                 stroke-linecap="round" stroke-linejoin="round">
                                 <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                 <path d="M12 5l0 14" />
                                 <path d="M5 12l14 0" />
                             </svg>
                             Create new report
                         </a>
                         <a href="#" class="btn btn-primary d-sm-none btn-icon" data-bs-toggle="modal"
                             data-bs-target="#modal-report" aria-label="Create new report">
                             <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                             <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                 viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                 stroke-linecap="round" stroke-linejoin="round">
                                 <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                 <path d="M12 5l0 14" />
                                 <path d="M5 12l14 0" />
                             </svg>
                         </a>
                     </div>
                 </div>
             </div>
         </div>
     </div>
     <!-- Page body -->
     <div class="page-body">
         <div class="container-xl">
             <div class="row row-cards">
                 <div class="col-12">
                     <form class="card" action="{{ route('admin.profile.update', ['profile' => $admin->id]) }}"
                         method="POST" enctype="multipart/form-data">
                         @csrf
                         @method('PUT')
                         <div class="card-body">
                             <h3 class="card-title">Edit Profile</h3>
                             <div class="row row-cards">
                                 <div class="col-md-6">
                                     <x-admin.input-text type="text" label="{{ __('Name') }}" name="name"
                                         placeholder="Name" value="{{ $admin->name }}" />
                                 </div>
                                 <div class="col-md-6">
                                     <x-admin.input-text type="email" label="{{ __('Email') }}" name="email"
                                         placeholder="Email" value="{{ $admin->email }}" readonly=true />
                                 </div>

                                 <div class="col-md-6">
                                     <x-admin.input-text type="file" label="{{ __('Avatar') }}" name="avatar"
                                         value="{{ $admin->avatar }}" />

                                     @if ($admin->avatar)
                                         <div class="height__width__200px">
                                             <img src="{{ asset($admin->avatar) }}" class="img-fluid" alt="avatar" />
                                         </div>
                                     @endif

                                 </div>

                                 <div class="col-md-5">
                                     {{-- <div class="mb-3">
                                         <label class="form-label">Country</label>
                                         <select class="form-control form-select">
                                             <option value="">Germany</option>
                                         </select>
                                     </div> --}}
                                 </div>

                                 <div class="col-md-12">
                                     {{-- <div class="mb-3 mb-0">
                                         <label class="form-label">About Me</label>
                                         <textarea rows="5" class="form-control" placeholder="Here can be your description" value="Mike">Oh so, your weak rhyme
                                               
                                        </textarea>
                                     </div> --}}
                                 </div>
                             </div>
                         </div>
                         <div class="card-footer text-end">
                             <button type="submit" class="btn btn-primary">Update Profile</button>
                         </div>
                     </form>
                 </div>
             </div>
         </div>
     </div>
 @endsection


 @push('css')
     <style>
         .height__width__200px {
             height: 200px;
             width: 200px;
             border-radius: 10px;
             border: 3px solid var(--colorPrimary);
             margin-top: 10px;
         }
     </style>
 @endpush
