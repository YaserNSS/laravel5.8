@extends('layouts.app')

@section('title','Edit Detials for'. $customer->name)

@section('content')

    <div class="row">
        <div class="col-12">
                <h1>Edit Detials for {{$customer->name}}</h1>
            </div>
        </div>

    <div class="row">
        <div class="col-12">
                <form action="{{ route('customers.update',['customer' => $customer])}}" method="POST" class="pb-5">
                    @method('PATCH')
                    @include('customers.form')
                    <button type="submit" class="btn btn-primary">Save Customer</button>
                </form>
            </div>
        </div>




@endsection

