@extends('layouts.layout')

@section('content')
<section class="content-header panel">

    <h1>Task
        <small>information</small>
    </h1>
</section>

<section class="content">

    <div class="row">

        <div class="col-md-12">

            <div class="tab-content basic-tab" id="myTabContent">

                    <div class="tab-pane fade in active" id="basic-info" role="tabpanel" aria-labelledby="personal-info-tab">
                        @include('pages.tasks.tablelayout')

                    </div>

                </div>
            </div>
    </div>

</section>
@endsection
@section('script')
    <script>
        $(document).ready(function () {
            $('#status').select2();
        });
    </script>
@endsection



