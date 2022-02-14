@extends('layout')

@section('content')
    <h1>Customers</h1>
    <form action="customers" method="POST" class="pb-5">

        <p>Name :</p>
        <div class="input-group ob-2">
            <input type="text" name="name" value="{{old('name')}}">
        </div>
        <div>{{$errors->first('name')}}</div>

        <p>Email :</p>
        <div class="input-group">
                <input type="email" name="email" value="{{old('email')}}">
        </div>
        <div>{{$errors->first('email')}}</div>

        <button type="submit" class="btn btn-primary">Add Customer</button>
        @csrf
    </form>



    <ul>
        @foreach ($customers as $customer)
        <li>{{$customer->name}} (<span class="text-muted">{{$customer->email}}</span>)</li>
        @endforeach
    </ul>
@endsection

