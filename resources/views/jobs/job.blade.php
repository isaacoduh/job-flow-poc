@extends('layouts.app')

@section('content')
    <h2 class="text-2xl font-bold mb-4" id="jobTitle"></h2>
    <p id="jobDescription"></p>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            var jobId = {{ $jobId }};

            // Fetch job detail via AJAX
            $.ajax({
                url: '/api/jobs/' + jobId,
                type: 'GET',
                dataType: 'json',
                success: function (data) {
                    var job = data.job;

                    // Populate job details on the page
                    $('#jobTitle').text(job.title);
                    $('#jobDescription').text(job.description);
                },
                error: function (error) {
                    console.log(error);
                }
            });
        });
    </script>
@endsection