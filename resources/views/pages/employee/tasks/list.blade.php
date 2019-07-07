@extends('layouts.layout')
<!-- @section('title', 'Item') -->

@section('content')
    <section class="content-header">
        <h1>
            Tasks
            <small>View</small>
        </h1>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-body">
                        @if(count($tasks) > 0)
                            <div class="table-responsive table-bordered">
                                <table id="dataTable" class="table table-striped table-responsive">
                                    <thead>
                                        <tr class="table-heading-bg">
                                            <th scope="col">S/N</th>
                                            <th scope="col">Project</th>
                                            <th scope="col">Client</th>
                                            {{-- <th scope="col">Task</th> --}}
                                            <th scope="col">Timeline</th>
                                            <th scope="col">Status</th>
                                            <th scope="col" class="text-center">Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach($tasks as $task)
                                            <tr {{ $task->end_date < date_create() ? "class=text-danger" : "" }}>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>
                                                    @if($task->project)
                                                        <span class="inline-block"><strong> {{ $task->project->name }} </strong></span><br>
                                                        <span class="inline-block text-muted">{{ $task->project->status }} </span><br>
                                                        <span class="inline-block text-muted">
                                                            {{ date("F jS, Y", strtotime($task->project->start_date)) }} - {{ date("F jS, Y", strtotime($task->project->end_date)) }}
                                                        </span>
                                                    @else

                                                    @endif
                                                </td>
                                                <td>
                                                    @if($task->project)
                                                        <span class="inline-block"><strong> {{ $task->project->client->name }} </strong></span><br>
                                                        <span class="inline-block text-muted">{{ $task->project->client->contact_number }} ({{ $task->project->client->contact_email }}) </span><br>
                                                        <span class="inline-block text-muted">
                                                            {{ $task->project->client->status === 0 ? "Inactive Client" : "Active Client" }}
                                                        </span>
                                                    @else

                                                    @endif
                                                </td>
                                                {{-- <td class="text-truncate">  
                                                    {{ $task->details }}
                                                </td> --}}
                                                <td>
                                                    <span class="inline-block text-muted">
                                                        Start{{ $task->start_date > date_create() ? "s": "ed" }} {{ $task->start_date->diffForHumans() }}
                                                    </span>
                                                    <br>
                                                    <span class="inline-block text-muted">
                                                        End{{ $task->end_date > date_create() ? "s": "ed" }} {{ $task->end_date->diffForHumans() }}
                                                    </span>
                                                </td>
                                                <td> {{$task->status}} </td>
                                                <td class="text-center">
                                                    <div class="btn-group">
                                                         <a class="edit-btn btn btn-info btn-sm glyphicon glyphicon-eye-open" href="{{ route('task.show' , $task->project->id) }}" role="button" ></a>
                                                    </div> 
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <div class="empty-state text-center my-3">
                                @include('icons.empty')
                                <p class="text-muted my-3">
                                    You have no task yet!
                                </p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('script')
    <script>
        $(document).ready(function () {
            $('#dataTable').DataTable();
        });
    </script>
@endsection