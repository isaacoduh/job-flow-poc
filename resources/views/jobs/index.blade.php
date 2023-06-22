@extends('layouts.app')

@section('content')
    <h2 class="text-2xl font-bold mb-4">All Jobs</h2>

    <div id="jobsList">
        <!-- Jobs will be dynamically loaded here -->
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var jobsList = document.getElementById('jobsList');

            // Fetch all jobs via AJAX
            fetch('{{ route('jobs.getAllJobs') }}')
                .then(function (response) {
                    return response.json();
                })
                .then(function (data) {
                    var jobs = data.jobs;

                    // Render jobs on the page
                    jobs.forEach(function (job) {
                        var jobElement = document.createElement('div');
                        var titleElement = document.createElement('h3');
                        var descriptionElement = document.createElement('p');
                        var buttonElement = document.createElement('a');

                        titleElement.textContent = job.title;
                        descriptionElement.textContent = job.description;
                        buttonElement.textContent = 'View Details';
                        buttonElement.href = '/jobs/' + job.id;

                        jobElement.appendChild(titleElement);
                        jobElement.appendChild(descriptionElement);
                        jobElement.appendChild(buttonElement);
                        jobsList.appendChild(jobElement);
                    });
                })
                .catch(function (error) {
                    console.log(error);
                });
        });
    </script>
@endsection
