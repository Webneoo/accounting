@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-md-12">
        <h1 class="page-header">
            Invoice Details
        </h1>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">

        <div style="width:21cm;height:29.7cm;margin:0 auto;margin-bottom:0.5cm;padding:30px;border:1px solid #eee;box-shadow:0 0 10px rgba(0, 0, 0, .15);font-size:14px;line-height:24px;font-family:'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;color:#555;background-color:#fff;">

            <ul style="list-style-type:none; height:180px; padding: 0 30px;">
                <li style="float:left; width:50%; display:inline-block; margin-top:20px;"><img src="http://accounting.webneoodemo.com/images/logo.png" style="width:100%;max-width:300px;"></li>
                <li style="float:right; width:50%; text-align:right; display:inline-block;">
                    <h1>INVOICE</h1><br>
                    <b>Webneoo</b> <br>
                    Berytech Digital Park <br>
                    Beirut Digital District 1294 <br>
                    Bechara El Khoury Road, Beirut, Lebanon.  <br>
                    Phone: +961 4 66 90 40 - ext.149<br>
                    Financial #: 2693372
                </li>
            </ul>
<br>
            <hr>

            <ul style="list-style-type:none; height:180px; padding: 0 30px;">
                <li style="float:left; width:50%; display:inline-block;">
                    <h6 style="color:#666">BILL TO</h6>
                    <b>{{ $data[0]->client_name }}</b><br>
                    {{ $data[0]->address }}<br>
                    {{ $data[0]->phone }} <br>
                    @if(!empty($data[0]->accounting_id) || $data[0]->accounting_id != NULL )
                    Financial #: {{ $data[0]->accounting_id }}
                    @endif
                </li>
                <li style="float:right; width:50%; text-align:right; display:inline-block; line-height:28px">
                    <b>Invoice Number: </b>{{ $data[0]->invoice_nb }}<br>
                    <b>Invoice Date: </b>{{ $data[0]->created_at }}<br>
                    <b>Payment Due: </b></b>{{ $data[0]->due_date }} <br>
                    <b>Amount Due (USD): ${{ number_format($data[0]->amount, 2, '.', ' ') }}</b>
                </li>
            </ul>

            <ul style="list-style-type:none; height:35px; background:#000; padding: 0 30px;">
                <li style="padding:5px; font-weight:bold; width:50%; float:left; display:inline-block; color:#fff;">
                    Item
                </li>
                
                <li style="padding:5px; text-align:right; font-weight:bold; width:50%; float:right; display:inline-block; color:#fff;">
                    Price
                </li>
            </ul>

            <?php for($i=1; $i<sizeof($data); $i++) { ?>
                <ul style="list-style-type:none; padding: 0 30px;">
                    <li style="padding:5px; float:left; width:80%; display:inline-block;">
                        <b>{{ $data[$i]->service_title }}</b><br>
                      {!! $data[$i]->description !!}            
                    </li>
                    
                    <li style="padding:5px; text-align:right; float:right; width:20%; display:inline-block;">
                        ${{ number_format($data[$i]->item_amount, 2, '.', ' ') }}
                    </li>
                </ul>
            <?php } ?>
            
            <ul style="list-style-type:none; padding: 0 30px;">
                <li style="padding:5px; float:left; width:50%; display:inline-block;"></li>
                <li style="padding:5px; text-align:right; border-top:2px solid #eee; font-weight:bold; float:right; width:50%; display:inline-block;">
                   Total: ${{ number_format($data[0]->amount, 2, '.', ' ') }}
                </li>
            </ul>

        </div>

    </div>
</div>
<!-- /.row (nested) -->

<a href="{{ route('invoices_path') }}" class="btn btn-default btn-lg">Go Back to Invoices' List</a>

@endsection
