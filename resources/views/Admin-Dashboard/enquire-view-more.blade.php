@extends('Admin-Dashboard.layout.admin-master')
@section('admin-content')
    <div class="h-screen flex justify-center bg-gray-100 m-auto ">
        <div class="container mx-auto">
            <div class="min-h-screen  flex items-center justify-center p-4 ">
                <div class="max-w-6xl  bg-white w-full rounded-lg shadow-xl">
                    <div class="">
                        <button onclick="history.back()" class="px-5 py-1 text-md m-4 hover:bg-blue-700 bg-blue-500 text-white rounded">
                            Back
                        </button>
                    </div>
                    <div class=" grid grid-cols-2 p-4 border-b">
                        <h2 class="text-2xl ">
                            Information Details
                        </h2>
                        <p class="flex justify-end items-center">
                            {{$mailDetail->updated_at->diffForHumans()}}
                        </p>
                    </div>
                    <div>
                        <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                            <p class="text-gray-600">
                                Full name
                            </p>
                            <h4 >
                                {{$mailDetail->name}}
                            </h4>
                        </div>
                        <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                            <p class="text-gray-600">
                                Email
                            </p>
                            <h4 class="normal-case">
                                {{$mailDetail->email}}
                            </h4>
                        </div>
                        <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                            <p class="text-gray-600">
                                Phone number
                            </p>
                            <h4>
                                {{$mailDetail->MM_ph != null ? 'MM - '. $mailDetail->MM_ph : 'TH - ' .$mailDetail->TH_ph}}
                            </h4>
                        </div>
                        <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                            <p class="text-gray-600">
                                highest Education Completed
                            </p>
                            <h4>
                                {{$mailDetail->HEC ?? ''}}
                            </h4>
                        </div>
                        <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                            <p class="text-gray-600">
                                Country Of Nationality
                            </p>
                            <h4>
                                {{$mailDetail->HEC ?? ''}}
                            </h4>
                        </div>
                        <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4">
                            <p class="text-gray-600">
                                Programs Interested In
                            </p>
                            <h4>
                                {{$mailDetail->program_id ?? ''}}
                            </h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
