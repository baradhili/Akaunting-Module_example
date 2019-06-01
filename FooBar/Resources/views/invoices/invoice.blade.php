@extends('foobar::layouts.invoice') 
@section('title', trans_choice('general.invoices', 1) . ': ' . $invoice->invoice_number) 
@section('content')
<div class="container">
    <div class="row">
        <div class="col-xs-3">
            <h1 class="text-left text-primary">{{ $invoice->invoice_number }}</h1>
        </div>
        <div class="col-xs-6"></div>
        <div class="col-xs-3">
            <h1 class="text-right text-primary">Tax Invoice</h1>
        </div>
    </div>
    <hr class="heavy">
    <div class="row">
        <div class="col-xs-3">
            {{ trans('invoices.invoice_date') }}: {{ Date::parse($invoice->invoiced_at)->format($date_format) }} </br>
            <hr> {{ trans('invoices.payment_due') }}: {{ Date::parse($invoice->due_at)->format($date_format) }}
        </div>
        <div class="col-xs-6"></div>
        <div class="col-xs-3">
            <h1 class="text-right text-primary">
                @foreach ($invoice->totals as $total) 
					@if ($total->code == 'total') 
						@money($total->amount - $invoice->paid, $invoice->currency_code, true) 
					@endif 
				@endforeach
            </h1>
        </div>
    </div>
    <hr class="mid">
    <div class="row">
        <div class="col-xs-3">
            <address>
  <strong>{{ $invoice->customer_name }}</strong><br>
  {!! nl2br($invoice->customer_address) !!}<br>
  {{ trans('general.tax_number') }}: {{ $invoice->customer_tax_number }}
</address>
        </div>
        <div class="col-xs-6"></div>
        <div class="col-xs-3">
            <address class="text-right">
					<strong>{{ setting('general.company_name') }}</strong><br>
            {!! nl2br(setting('general.company_address')) !!}<br>
            @if (setting('general.company_tax_number'))
                {{ trans('general.tax_number') }} {{ setting('general.company_tax_number') }}
            @endif
</address>
        </div>
    </div>
    <hr class="heavy">
    <div class="row">
        <div class="col-xs-2">
            <div class="text-primary">{{ trans($text_override['quantity']) }}</div>
        </div>
        <div class="col-xs-6">
            <div class="text-primary">{{ trans_choice($text_override['items'], 2) }}</div>
        </div>
        <div class="col-xs-2">
            <div class="text-right text-primary">{{ trans($text_override['price']) }}</div>
        </div>
        <div class="col-xs-2">
            <div class="text-right text-primary">{{ trans('invoices.total') }}</div>
        </div>
    </div>
    <hr> 
    @foreach($invoice->items as $item)
	    <div class="row">
	        <div class="col-xs-2">
	            {{ $item->quantity }}
	        </div>
	        <div class="col-xs-6">
	            {{ $item->name }} 
	            @if ($item->sku)
					<br><small>{{ trans('items.sku') }}: {{ $item->sku }}</small> 
				@endif
	        </div>
	        <div class="col-xs-2">
	            <div class="text-right">@money($item->price, $invoice->currency_code, true)</div>
	        </div>
	        <div class="col-xs-2">
	            <div class="text-right">@money($item->total, $invoice->currency_code, true)</div>
	        </div>
	    </div>
    @endforeach
    <hr> 
    @foreach ($invoice->totals as $total) 
		@if ($total->code != 'total')
		    <div class="row">
		        <div class="col-xs-2">
		
		        </div>
		        <div class="col-xs-6">
		
		        </div>
		        <div class="col-xs-2">
		            <div class="text-right">{{ trans($total->title) }}:</div>
		        </div>
		        <div class="col-xs-2">
		            <div class="text-right">
		                @money($total->amount, $invoice->currency_code, true)
		            </div>
		        </div>
		    </div>
	    @else
		    <hr class="mid">
		    <div class="row">
		        <div class="col-xs-2">
		
		        </div>
		        <div class="col-xs-6">
		
		        </div>
		        <div class="col-xs-2">
		            <div class="text-right">{{ trans($total->title) }}:</div>
		        </div>
		        <div class="col-xs-2">
		            <div class="text-right">
		                @money($total->amount, $invoice->currency_code, true)
		            </div>
		        </div>
		    </div>
	    @endif 
    @endforeach
    
    </div>
    <footer class="footer">
		<div class="container">
			<hr class="heavy">
    <div class="row">
        <div class="col-xs-3">
            <small class="text-primary">Payment Details</small></br>
            <small>Name of Beneficiary: Bret Watson </small></br>
            <small>Name of Bank: HSBC Bank Australia </small></br>
            <small>BSB: 346021</small></br>
            <small>Account Number: 12166412</small></br>
            <small>Payment Reference: {{ $invoice->invoice_number }}</small>
        </div>
        <div class="col-xs-6"></div>
        <div class="col-xs-3">
            <div class="text-right">
                <small>Bret Watson</small></br>
                <small>Phone: 0413 303 840</small></br>
                <small>bret@it-interim.management</small></br>
                <small>www.IT-Interim.Management</small>
            </div>
        </div>
    </div>
    <hr>
    </div>
    </footer>
    

<!-- /container -->
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>

@endsection 
@if (isset($currency_style) && $currency_style) 
	@push('stylesheet')
		<style type="text/css">
		    .style-price {
		        font-family: sans-serif;
		        font-size: 15px;
		    }
		</style>
	@endpush 
@endif
