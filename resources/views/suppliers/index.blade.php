@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-md-10">
        <h1 class="page-header">
            Suppliers
        </h1>
    </div>
    <div class="col-md-2">
        <a href="{{ route('add_supplier_path') }}" class="btn btn-default btn-lg pull-right">Add Supplier</a>
    </div>
</div>

@if(Session::has('flash_message'))
    <div class="alert alert-success"><em> {!! session('flash_message') !!}</em></div>
@endif

<div class="row">
    <!-- Advanced Tables -->
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="table-responsive">
                <table id="suppliers" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Logo</th>
                            <th>Name</th>
                            <th>Total Amount Spent</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($suppliersList as $c)          
                            <tr>
                                <td style="vertical-align:middle;">{{ $c->source_id }}</td>
                                <td>
                                    @if($c->img == NULL) 
                                        <img width="40px;" src="/images/supplier.png"/>
                                    @else
                                        <img width="40px;" src="/images/suppliers/{{$c->img}}"/>
                                    @endif
                                </td>
                                <td><a href="{{ route('view_supplier_details_path', $c->source_id) }}">{{ $c->name }}</a></td>
                                <td>@if($c->name != NULL) $ {{ round(abs($c->total_expenses), 2) }} @endif</td>
                                <td>
                                    <a href="{{ route('edit_supplier_path', $c->source_id) }}"><i class="fa fa-pencil-square-o"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            
        </div>
    </div>
    <!--End Advanced Tables -->
</div>

<!-- DATA TABLE -->
<link rel="stylesheet" type="text/css" href="/js/dataTables/dataTables.bootstrap.min.css">
<script src="/js/dataTables/jquery.dataTables.min.js"></script>
<script src="/js/dataTables/dataTables.bootstrap.min.js"></script>
<script>
    $(document).ready(function () {
        $('#suppliers').DataTable({
            "order": [[ 0, "desc" ]]
        });
    });
</script>

@endsection
