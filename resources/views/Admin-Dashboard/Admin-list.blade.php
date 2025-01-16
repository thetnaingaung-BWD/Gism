@extends('Admin-Dashboard.layout.admin-master')
@section('admin-content')
<div class="bg-gray-100 flex-1 p-6 md:mt-16">
    <div class="grid grid-cols-1 gap-5 mt-5">
        <div class="p-6 bg-gray-100 min-h-screen">
          <div class="max-w-6xl mx-auto bg-white shadow-md rounded-lg">
            <!-- Header -->
            <div class="px-6 py-4">
              <h2 class="text-lg font-semibold">Members list</h2>
              <p class="text-sm text-gray-500">See information about all members</p>
            </div>
            <!-- Tabs and Actions -->
            <div class="flex items-center justify-between px-6 py-4 border-t border-b">
              <div class="flex space-x-4">
                <a href="{{ route('Admin_List') }}">
                    <button class="px-4 py-2 text-sm font-semibold  rounded-lg {{ !request('role') ? 'text-white bg-black' : 'bg-gray-200' }}">
                            All
                    </button>
                </a>
                <a href="{{ route('Admin_List', ['role' => 'Staffs']) }}">
                    <button class="px-4 py-2 text-sm font-semibold   rounded-lg  {{ request('role') === 'Staffs' ? ' bg-black text-white' : 'bg-gray-200 text-gray-700' }}">
                            Staff
                    </button>
                </a>
                <a href="{{ route('Admin_List', ['role' => 'Teachers']) }}">
                    <button class="px-4 py-2 text-sm font-semibold   rounded-lg {{ request('role') === 'Teachers' ? ' bg-black text-white' : 'bg-gray-200 text-gray-700' }}">
                            Teachers
                    </button>
                </a>

              </div>
              <div class="flex items-center space-x-4">
                <input type="search" id="search" placeholder="Search" class="px-4 py-2 text-sm border rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-400" />
                    {{-- <button type="submit" class="px-4 py-2 text-sm font-semibold text-white bg-black rounded-lg">View All</button> --}}
                <a href="{{route('Add_Member')}}"><button class="px-4 py-2 text-sm font-semibold text-white bg-black rounded-lg">Add Member</button></a>
              </div>
            </div>

            <!-- Table -->
            <div class="overflow-x-auto">
              <table class="min-w-full table-auto text-sm text-gray-600">
                <thead>
                  <tr class="bg-gray-100 text-left">
                    <th class="px-6 py-3">Member</th>
                    <th class="px-6 py-3">Position</th>
                    <th class="px-6 py-3">Permission</th>
                    <th class="px-6 py-3">Employed</th>
                    <th class="px-6 py-3"></th>
                  </tr>
                </thead>
                <tbody id="member-list">
                    @foreach ($adminList as $item)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="px-6 py-3 flex items-center space-x-3">
                            @if ($item->image != null)
                              <img src="{{asset('storage/asset/admin-profile/'.$item->image)}}" alt="avatar" class="w-10 h-10 rounded-full" />
                            @else
                              <img src="{{asset('assets/default-image/default-avatar-icon-of-social-media-user-vector.jpg')}}" alt="avatar" class="w-10 h-10 rounded-full" />
                            @endif
                          <div>
                            <p class="font-medium">{{$item->name}}</p>
                            <p class="text-xs text-gray-500 lowercase">{{$item->email}}</p>
                            <p class="text-xs text-gray-500">{{$item->phone}}</p>
                          </div>
                        </td>
                        <td class="px-6 py-3">{{$item->role}}<br /><span class="text-xs text-gray-500">{{$item->department}}</span></td>
                        <td class="px-6 py-3">
                          <span class="px-3 py-1 text-xs font-semibold text-green-800 bg-green-100 rounded-full">{{$item->permission}}</span>
                        </td>
                        <td class="px-6 py-3">{{$item->employed_date}}</td>
                        <td class="px-6 py-3">
                            @if(auth()->user()->permission === 'Super-Admin')
                                <a href="{{ route('admin_detail', $item->id) }}"
                                   class="inline-block mx-1 px-4 py-2 text-sm font-medium text-white bg-blue-500 rounded-lg hover:bg-blue-600">
                                    Edit
                                </a>
                                <a href="{{ route('admin_delete', $item->id) }}"
                                   class="inline-block px-4 py-2 text-sm font-medium text-white bg-red-500 rounded-lg hover:bg-red-600">
                                    Delete
                                </a>
                            @else
                                <button disabled
                                   class="inline-block mx-1 px-4 py-2 text-sm font-medium text-gray-400 bg-gray-200 rounded-lg">
                                    Edit
                                </button>
                                <button disabled
                                   class="inline-block px-4 py-2 text-sm font-medium text-gray-400 bg-gray-200 rounded-lg">
                                    Delete
                                </button>
                            @endif
                        </td>
                    </tr>
                    @endforeach

                </tbody>
              </table>
            </div>

            <!-- Pagination -->
            <div class="flex items-center justify-between px-6 py-4 border-t">
                <p class="text-sm text-gray-500">
                    Page {{ $adminList->currentPage() }} of {{ $adminList->lastPage() }}
                </p>
                <div class="flex space-x-2">
                    {{-- Previous Button --}}
                    @if ($adminList->onFirstPage())
                        <span class="px-3 py-1 text-sm font-medium text-gray-400 bg-gray-200 rounded-lg">
                            Previous
                        </span>
                    @else
                        <a href="{{ $adminList->previousPageUrl() }}"
                           class="px-3 py-1 text-sm font-medium text-gray-500 bg-gray-200 rounded-lg hover:bg-gray-300">
                            Previous
                        </a>
                    @endif

                    {{-- Next Button --}}
                    @if ($adminList->hasMorePages())
                        <a href="{{ $adminList->nextPageUrl() }}"
                           class="px-3 py-1 text-sm font-medium text-gray-500 bg-gray-200 rounded-lg hover:bg-gray-300">
                            Next
                        </a>
                    @else
                        <span class="px-3 py-1 text-sm font-medium text-gray-400 bg-gray-200 rounded-lg">
                            Next
                        </span>
                    @endif
                </div>
            </div>
          </div>
        </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const searchInput = document.getElementById('search');
        const resultsTable = document.getElementById('member-list');
        const url = new URL(window.location.href);
        const role = url.searchParams.get('role');
        window.authenticated = @json(auth()->user()->permission);
        console.log(role);


        searchInput.addEventListener('input', function () {
            const query = searchInput.value;

            if (query.length > 0) {
                fetch(`{{ route('admin_search') }}?query=${query}`)
                    .then(response => response.json())
                    .then(data => {
                        resultsTable.innerHTML = ''; // Clear previous results

                        if (data.length > 0) {

                            data.forEach(item => {
                                const row = `
                                    <tr class="border-b hover:bg-gray-50">
                                        <td class="px-6 py-3 flex items-center space-x-3">
                                            <img src="${item.image
                                                ? `{{ asset('storage/asset/admin-profile/') }}/${item.image}`
                                                : `{{ asset('assets/default-image/default-avatar-icon-of-social-media-user-vector.jpg') }}`}"
                                                 alt="avatar" class="w-10 h-10 rounded-full" />
                                            <div>
                                                <p class="font-medium">${item.name}</p>
                                                <p class="text-xs text-gray-500 lowercase">${item.email}</p>
                                                <p class="text-xs text-gray-500">${item.phone}</p>
                                            </div>
                                        </td>
                                        <td class="px-6 py-3">${item.role}<br /><span class="text-xs text-gray-500">${item.department}</span></td>
                                        <td class="px-6 py-3">
                                            <span class="px-3 py-1 text-xs font-semibold text-green-800 bg-green-100 rounded-full">${item.permission}</span>
                                        </td>
                                        <td class="px-6 py-3">${item.employed_date}</td>
                                        <td class="px-6 py-3">
                                            ${window.authenticated === 'Super-Admin'
                                                ? `
                                                <a href="/admin-detail/${item.id}"
                                                   class="inline-block mx-1 px-4 py-2 text-sm font-medium text-white bg-blue-500 rounded-lg hover:bg-blue-600">
                                                    Edit
                                                </a>
                                                <a href="/admin-detail/${item.id}"
                                                   class="inline-block px-4 py-2 text-sm font-medium text-white bg-red-500 rounded-lg hover:bg-red-600">
                                                    Delete
                                                </a>
                                                `
                                                : `
                                                <button disabled
                                                   class="inline-block mx-1 px-4 py-2 text-sm font-medium text-gray-400 bg-gray-200 rounded-lg">
                                                    Edit
                                                </button>
                                                <button disabled
                                                   class="inline-block px-4 py-2 text-sm font-medium text-gray-400 bg-gray-200 rounded-lg">
                                                    Delete
                                                </button>
                                                `
                                            }
                                        </td>
                                    </tr>
                                `;
                                resultsTable.innerHTML += row;
                            });
                        } else {
                            resultsTable.innerHTML = `
                                <tr>
                                    <td colspan="5" class="text-center">No results found.</td>
                                </tr>
                            `;

                        }
                    });
            } else {
                resultsTable.innerHTML = ''; // Clear results when search input is empty
                const adminList = @json($adminList).data;

                    adminList.forEach(item => {
                    const row = `
                        <tr class="border-b hover:bg-gray-50">
                            <td class="px-6 py-3 flex items-center space-x-3">
                                <img src="${item.image
                                    ? `{{ asset('storage/asset/admin-profile/') }}/${item.image}`
                                    : `{{ asset('assets/default-image/default-avatar-icon-of-social-media-user-vector.jpg') }}`}"
                                     alt="avatar" class="w-10 h-10 rounded-full" />
                                <div>
                                    <p class="font-medium">${item.name}</p>
                                    <p class="text-xs text-gray-500 lowercase">${item.email}</p>
                                    <p class="text-xs text-gray-500">${item.phone}</p>
                                </div>
                            </td>
                            <td class="px-6 py-3">${item.role}<br /><span class="text-xs text-gray-500">${item.department}</span></td>
                            <td class="px-6 py-3">
                                <span class="px-3 py-1 text-xs font-semibold text-green-800 bg-green-100 rounded-full">${item.permission}</span>
                            </td>
                            <td class="px-6 py-3">${item.employed_date}</td>

                            <td class="px-6 py-3">
                                ${window.authenticated === 'Super-Admin'
                                    ? `
                                    <a href="/admin-detail/${item.id}"
                                       class="inline-block mx-1 px-4 py-2 text-sm font-medium text-white bg-blue-500 rounded-lg hover:bg-blue-600">
                                        Edit
                                    </a>
                                    <a href="/admin-detail/${item.id}"
                                       class="inline-block px-4 py-2 text-sm font-medium text-white bg-red-500 rounded-lg hover:bg-red-600">
                                        Delete
                                    </a>
                                    `
                                    : `
                                    <button disabled
                                       class="inline-block mx-1 px-4 py-2 text-sm font-medium text-gray-400 bg-gray-200 rounded-lg">
                                        Edit
                                    </button>
                                    <button disabled
                                       class="inline-block px-4 py-2 text-sm font-medium text-gray-400 bg-gray-200 rounded-lg">
                                        Delete
                                    </button>
                                    `
                                }
                            </td>
                        </tr>
                    `;
                    resultsTable.innerHTML += row;
                });
            }
        });
    });
</script>

@endsection
