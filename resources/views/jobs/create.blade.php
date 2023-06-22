@extends('layouts.app')

@section('content')
    <div class="max-w-lg mx-auto">
        <h2 class="text-2xl font-bold mb-4">Create Job</h2>
        
        <form id="createJobForm" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            @csrf
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="title">
                    Title
                </label>
                <input
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    id="title"
                    type="text"
                    name="title"
                    placeholder="Enter job title"
                >
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="description">
                    Description
                </label>
                <textarea
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    id="description"
                    name="description"
                    rows="5"
                    placeholder="Enter job description"
                ></textarea>
            </div>
            <div class="flex items-center justify-between">
                <button id="createJobBtn" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="button">
                    Create Job
                </button>
            </div>
        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var createJobForm = document.getElementById('createJobForm');
            var createJobBtn = document.getElementById('createJobBtn');
            
            createJobBtn.addEventListener('click', function (e) {
                e.preventDefault();

                var title = document.getElementById('title').value;
                var description = document.getElementById('description').value;
                console.log(title);

                var formData = new FormData();
                formData.append('title', title);
                formData.append('description', description);
                formData.append('_token', '{{ csrf_token() }}');

                // Make an AJAX request to create the job
                var xhr = new XMLHttpRequest();
                xhr.open('POST', '{{ route('jobs.store') }}', true);
                xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
                xhr.onreadystatechange = function () {
                    if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                        var response = JSON.parse(xhr.responseText);
                        console.log(response.job);
                    }
                };
                xhr.send(formData);
            });
        });
    </script>
@endsection
