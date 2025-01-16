@extends('Admin-Dashboard.layout.admin-master')
@section('admin-content')

    <div class="h-screen flex flex-row flex-wrap bg-gray-100 p-6">
        <div class="container mx-auto  ">
            <h1 class="text-2xl font-bold mb-4">Contact Form</h1>
            <div class="overflow-x-auto">
              <table class="min-w-full border-collapse border border-gray-200 bg-white">
                <thead>
                  <tr class="bg-gray-100">
                    <th class="px-6 py-3 border-b border-gray-200 text-left text-gray-600 font-semibold">Name</th>
                    <th class="px-6 py-3 border-b border-gray-200 text-left text-gray-600 font-semibold">Email</th>
                    <th class="px-6 py-3 border-b border-gray-200 text-left text-gray-600 font-semibold">Phone</th>
                    <th class="px-6 py-3 border-b border-gray-200 text-left text-gray-600 font-semibold">Actions</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($contactMail as $item)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 border-b border-gray-200">{{$item->name}}</td>
                            <td class="px-6 py-4 border-b border-gray-200 normal-case">{{$item->email}}</td>
                            <td class="px-6 py-4 border-b border-gray-200">{{$item->MM_ph != null ? $item->MM_ph : $item->TH_ph}}</td>
                            <td class="px-6 py-4 border-b border-gray-200">
                                <button class="bg-blue-500 hover:bg-blue-600 text-white py-1 px-3 rounded">
                                    <a href="{{route('enquire-view-more',$id= $item->id)}}">
                                    View more
                                    </a>
                                </button>
                                <a href="{{route('enquire-form-delete',$id= $item->id)}}">
                                    <button  class="bg-red-500 hover:bg-red-600 text-white py-1 px-3 rounded">Delete</button>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                  <!-- Add more rows as needed -->
                </tbody>
              </table>
            </div>
            <!-- Pagination Links -->
            <div class="mt-4">
                {{ $contactMail->links() }}
            </div>
        </div>
    </div>

@endsection
