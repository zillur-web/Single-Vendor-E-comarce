<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
    <style>
        h2{
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            // text-align: center;
        }
        table{
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }
        td, th{
            border: 1px solid #444;
            padding: 8px;
            text-align: left;
        }
        .my-table{
            text-align: right;
        }
        #sign{
            padding-top: 50px;
            text-align: right;
            font-weight: 600;
        }
        .doctor-info{
            margin-bottom: 10px;
            width: 100%;
        }
        .doctor-info td, .doctor-info th{
            border: none;
        }
        table.doctor-info h4 {
            margin: 0;
            font-size: 14px;
            color: #4D8FCC;
        }

        table.doctor-info span {
            margin: 0px 0px 0px 0px;
            font-size: 10px;
            color: #333 !important;
            font-weight: 400;
            letter-spacing: 0.3px;
        }
        table.doctor-info p {
            margin: 0px 0px 0px 0px;
            font-size: 12px;
            color: #333 !important;
            font-weight: 400;
            letter-spacing: 0.3px;
        }
        table.doctor-info small {
            margin: 1px 0px 0px 0px;
            font-size: 12px;
            color: #3373b3;
            font-weight: 300;
            letter-spacing: 0.3px;
        }
        table.appoinment-id-info {
            margin-bottom: 8px;
        }

        table.appoinment-id-info th {
            border: none;
            border-top: 2px solid #0088f7;
            margin: 0px;
            padding: 0;
        }
        table.appoinment-id-info p {
            margin: 0px;
            padding: 12px 0px 0px 0px;
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: 0.3px;
            color: #333 !important;
            font-weight: 600;
            margin-bottom: -4px;
        }

        table.appoinment-id-info p span {
            color: #0680bb;
        }
        table.appoinment-id-info small {
            font-size: 10px;
            font-weight: 300;
            color: #565252;
        }
        table.medication-list td {
            border: 0.5px solid #84B0CA;
            color: #484646;
            font-size: 12px;
        }

        table.medication-list  thead {
            background: #84B0CA;
            color: #fff;
        }

        table.medication-list th {
            border: 0.5px solid #84B0CA;
            font-size: 13px;
        }
    </style>
</head>
<body>
    <table style="" class="doctor-info ">
        <tr style="width: 100%;">
            <th style="width: 50%; padding-left: 0px; text-align: center;">
                <h1 style="color: #84b0ca; font-size: 35px; font-weight: 600; margin-top: 0px; margin-bottom: 10px;">Invoice</h1>
            </th>
        </tr>
    </table>

    <table style="" class="doctor-info">
        <tr style="width: 100%;">
            <th style="width: 50%; padding-left: 0px;">
                <h4 style="color: #333; margin-bottom: 15px;">Sold To:</h4>
                <h4>Tohoney</h4>
                <p>Chandrima Udyan Road, Dhaka, Bangladesh</p>
                <p  style="margin-top: 3px;">
                    <small>E-mail: admin@mail.com</small>
                    <br>
                    <small>Phone: 6456546546</small>
                </p>
            </th>

            <th style="width: 50%; text-align: right; padding-right: 0px;">
                <h4 style="color: #333; margin-bottom: 15px;">Shipping Address: </h4>
                <h4>{{ $data->name }}</h4>
                <span>
                    Customer
                </span>
                <p>{{ $data->address }}, {{ $data->city }}, {{ $data->country }}
                    @if ($data->note != NULL)
                    <br>
                    {{ ( $data->note ) }}
                    @endif
                </p>
                <p  style="margin-top: 3px;">
                    <small>E-mail: {{ $data->email }}</small>
                    <br>
                    <small>Phone: {{ $data->phone }}</small>
                </p>
            </th>
        </tr>
    </table>
    <table class="appoinment-id-info">
        <tr style="width: 100%;">
            <th style="width: 50%;">
                <p>ORDER ID : <span>#{{ $data->id }}</span></p>
                <small>Delivered on {{ $data->updated_at->format('d M Y H:i:s') }}</small>
            </th>
        </tr>
    </table>
    <table class="medication-list">
        <thead>
            <tr>
                <th>Product Description</th>
                <th style="width: 10%; text-align: center;">Price</th>
                <th style="width: 8%; text-align: center;">Quantity</th>
                <th style="width: 15%;">Total</th>
            </tr>
        </thead>
        <tbody>
            @php
                $subtotal = 0;
            @endphp
            @forelse ($details_table as $disc)
                <tr>
                    <td>{{ Product($disc->product_id)->title }} <br><span style="font-size: 10px;">
                        @if ($disc->color_id != NULL)
                            ( Color: {{ Colors($disc->color_id) }}{{ ', Size: '.Sizes($disc->size_id) }} )
                        @endif
                    </span></td>
                    <td style="width: 10%; text-align: center;">${{ $disc->price }}</td>
                    <td style="text-align: center;">{{ $disc->quantity }}</td>
                    <td>${{ $disc->price * $disc->quantity }}</td>
                    @php
                        $subtotal = $subtotal + $disc->price * $disc->quantity;
                    @endphp
                </tr>
            @empty
                <tr>
                    No more Data
                </tr>
            @endforelse

        </tbody>
    </table>
    <table style="margin-top: 8px;">
        <tr>
            <th colspan="1" style="padding: 0px; border: none;">
                <table class="medication-list">
                    <tbody>
                        <tr>
                            <td style="width: 85%; text-align: right; border-bottom: 1px solid #ffff;">Subtotal</td>
                            <td style="border-bottom: 1px solid #ffff;">${{ $subtotal }}</td>
                        </tr>
                        @if ($summery->discount != NULL)
                            <tr>
                                <td style="width: 85%; text-align: right; border-bottom: 1px solid #ffff; border-top: 1px solid #ffff;">Discount (10%)</td>
                                <td style="border-bottom: 1px solid #ffff; border-top: 1px solid #ffff;">${{ $summery->discount }}</td>
                            </tr>
                        @endif
                        <tr>
                            <td style="width: 85%; text-align: right;  border-bottom: 1px solid #ffff; border-top: 1px solid #ffff;">Delivery Charge (@if ($data->city == 'Dhaka') Inside Dhaka @else Outside Dhaka @endif)</td>
                            <td style="border-bottom: 1px solid #ffff; border-top: 1px solid #ffff;">${{ $summery->delivery_charge }}</td>
                        </tr>
                        <tr>
                            <td style="width: 85%; text-align: right; border-top: 1px solid #ffff;">Payment</td>
                            <td style=" border-top: 1px solid #ffff;">{{ $data->payment_method }} (@if ($summery->payment_status == 1) Paid @else Unpaid @endif)</td>
                        </tr>
                        <tr>
                            <td style="width: 85%; text-align: right;">Total</td>
                            <td style="">${{ ($subtotal - $summery->discount) + $summery->delivery_charge }}</td>
                        </tr>
                    </tbody>
                </table>
            </th>
        </tr>
    </table>
    <table class="appoinment-id-info"  style="margin-top: 15px;">
        <tr style="width: 100%;">
            <th style="width: 50%; border-top: 1px solid #379bed;">
                <small>Powered By <a target="_blank" href="{{ route('landing') }}" style="color: #059ad3; text-decoration: none;">Tohoney</a></small>
            </th>
        </tr>
    </table>

</body>
</html>
