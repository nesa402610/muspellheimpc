@extends('template')

@section('head')
    <title>Оплата и получение товара</title>
@endsection

@section('content')
    <div id="size-cutter">
        <h1 style="text-align: center;">Доставка и оплата товара</h1>
        <div class="blockOfChoose">
            <div data-id="1" class="block-fixed hover mitsuketa delivery">
                <h4>Доставка</h4>
            </div>
            <div data-id="2" class="block-fixed hover payments">
                <h4>Оплата</h4>
            </div>
            <div data-id="3" class="block-fixed hover">
                <h4>Способ оплаты</h4>
            </div>
        </div>
        @include('Routes.Footer.DelPay.delivery')
        @include('Routes.Footer.DelPay.Pay')
        @include('Routes.Footer.DelPay.Payments')
    </div>
@endsection
