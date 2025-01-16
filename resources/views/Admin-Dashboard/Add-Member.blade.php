
@extends('Admin-Dashboard.layout.admin-master')
@section('admin-content')

<div class="bg-gray-100 flex-1 p-6 md:mt-16">
    <div class="p-6 bg-gray-100 min-h-screen flex items-center justify-center">

        <div class="max-w-lg w-full bg-white shadow-md rounded-lg">


            <!-- Header -->
            <div class="px-6 py-4 border-b">
            <h2 class="text-lg font-semibold">Add Member</h2>
            <p class="text-sm text-gray-500">Fill in the details to add a new member</p>
            </div>

            <!-- Form -->
            <form action="{{route('add_member_process')}}" method="post" class="p-6 space-y-4" enctype="multipart/form-data">
                @csrf
                <!-- Image Upload and Preview -->
                <div class="text-center">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Profile Image</label>
                    <div class="relative">
                      <img
                        id="profilePreview"
                        src="https://via.placeholder.com/100"
                        alt="Profile Preview"
                        class="mx-auto w-24 h-24 rounded-full border border-gray-300 object-cover"
                      />
                      <input
                        type="file"
                        id="profileImage"
                        accept="image/*"
                        class="absolute top-0 left-0 w-full h-full opacity-0 cursor-pointer"
                        onchange="previewImage(event)"
                        name="image"
                      />
                    </div>
                    <p class="mt-2 text-xs text-gray-500">Click the image to upload a new photo</p>
                  </div>
                <!-- Name -->
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                    <input
                    type="text"
                    id="name"
                    placeholder="Enter member's name"
                    class="w-full px-4 py-2 mt-1 text-sm border rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-400"
                    name="name"
                    />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input
                    type="email"
                    id="email"
                    placeholder="Enter member's email"
                    class="w-full px-4 py-2 mt-1 text-sm border rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-400"
                    name="email"
                    />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />

                </div>

                <!-- Phone -->
                <div>
                  <label for="phone" class="block text-sm font-medium text-gray-700">Phone</label>
                  <input
                    type="tel"
                    id="phone"
                    placeholder="Enter member's phone number"
                    class="w-full px-4 py-2 mt-1 text-sm border rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-400"
                    name="phone"
                  />
                  <x-input-error :messages="$errors->get('phone')" class="mt-2" />

                </div>
                <!-- permission -->
                    <div>
                        <label for="permission" class="block text-sm font-medium text-gray-700">Permission</label>
                        <select
                        id="permission"
                        class="w-full px-4 py-2 mt-1 text-sm border rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-400 disabled"
                        name="permission"
                        >
                        <option value="" selected>None</option>
                        <option value="Super-Admin">Super Admin</option>
                        <option value="Admin">Admin</option>
                        </select>
                        <x-input-error :messages="$errors->get('permission')" class="mt-2" />
                    </div>
                <!-- Role -->
                  <div>
                    <label for="role" class="block text-sm font-medium text-gray-700">Role</label>
                    <select
                      id="role"
                      class="w-full px-4 py-2 mt-1 text-sm border rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-400"
                      name="role"
                    >
                      <option value="" selected>None</option>
                      <option>Staffs</option>
                      <option>Teachers</option>

                    </select>
                    <x-input-error :messages="$errors->get('role')" class="mt-2" />

                  </div>
                <!-- Department -->
                <div>
                    <label for="Department" class="block text-sm font-medium text-gray-700">Department</label>
                    <select
                    id="Department"
                    class="w-full px-4 py-2 mt-1 text-sm border rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-400"
                    name="department"
                    >
                    <option value="" selected>None</option>
                    <option value="Office">Office</option>
                    <option value="GED">GED</option>
                    <option value="Pre-IGCSE">Pre-IGCSE</option>
                    <option value="IGCSE O Level">IGCSE O Level</option>
                    </select>
                    <x-input-error :messages="$errors->get('department')" class="mt-2" />

                </div>

                <!-- Employed Date -->
                <div>
                    <label for="employed" class="block text-sm font-medium text-gray-700">Employed Date</label>
                    <input
                    type="date"
                    id="employed"
                    class="w-full px-4 py-2 mt-1 text-sm border rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-400"
                    name="employed_date"
                    />
                    <x-input-error :messages="$errors->get('employed')" class="mt-2" />

                </div>
                 <!-- Password -->
                <div>
                  <label for="Password" class="block text-sm font-medium text-gray-700">Password</label>
                  <input
                    type="password"
                    id="Password"
                    placeholder="Enter Password"
                    class="w-full px-4 py-2 mt-1 text-sm border rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-400"
                    name="password"
                  />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />

                </div>

                <!-- Confirm Password -->
                <div>
                  <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Password Confirmation</label>
                  <input
                    type="password"
                    id="password_confirmation"
                    placeholder="Enter Re-type Password"
                    class="w-full px-4 py-2 mt-1 text-sm border rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-400"
                    name="password_confirmation"
                  />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />

                </div>

                <!-- Buttons -->
                <div class="flex items-center justify-end space-x-4">

                    <a href="{{route('Admin_List')}}">
                        <button type="button" class="px-4 py-2 text-sm font-semibold text-gray-700 bg-gray-200 rounded-lg hover:bg-gray-300" >
                            Back
                        </button>
                    </a>

                    <button
                    type="submit"
                    class="px-4 py-2 text-sm font-semibold text-white bg-black rounded-lg hover:bg-gray-800"
                    >
                    Add Member
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
  function previewImage(event) {
    const input = event.target;
    const reader = new FileReader();
    reader.onload = function () {
      const preview = document.getElementById('profilePreview');
      preview.src = reader.result;
    };
    if (input.files[0]) {
      reader.readAsDataURL(input.files[0]);
    }
  }
</script>
@endsection
