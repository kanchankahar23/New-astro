@extends('master.master')
@section('title', 'User Register')
@section('content')

<div class="content-wrapper">
    <div class="row">
        <div class="col-xl-12 grid-margin ">
            <div class="card">
                <div class="card-body">
                    <div style="display: flex; justify-content: space-between; align-items: center;">
                        <h4 class="card-title" style="margin: 0;">Total Bonus</h4>
                        <input type="search" id="myInput" name="search" class="form-control" placeholder="Search.." style="width: auto;">
                    </div>

                    <div style="max-height: 400px; overflow-y: auto;">
                        <table class="table table-bordered mt-3">
                            <thead>
                                <tr>
                                    <th>S.no.</th>
                                    <th>Name</th>
                                    <th>Amount</th>
                                    <th>Bonus Amount</th>
                                    <th>Time</th>
                                </tr>
                            </thead>
                            <tbody id="myTable">
                                @foreach ($payments as $i=>$payment)
                                <tr>
                                    <td>{{ ++$i }}.</td>
                                    <td><a href="{{ url('all-transection-user', $payment->user_id) }}" >{{ $payment->name ?? '-' }}</td>
                                    <td>&#8377; &nbsp;{{ $payment->amount ?? '-' }}</td>
                                    <td>&#8377; &nbsp;{{ $payment->bonus ?? '-' }}</td>
                                    <td>{{ $payment->created_at->format('d M, Y') }}</td>
                                </tr>
                                @endforeach
                                @if(!empty($totalAmount))
                                <tr>
                                    <td><b>Total</b></td>
                                    <td></td>
                                    <td><b>&#8377; &nbsp;{{ $totalAmount ?? 0.00 }} </b></td>
                                    <td><b>&#8377; &nbsp;{{ $totalBonus ?? 0.00 }} </b></td>
                                    <td></td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{ url('assets/js/jquery.min.js') }}"></script>
<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>

@endsection
