@extends('emails.layouts.master')

@section('content')
    <title>{{ $details['subject'] }}</title>
    <p>{{ $details['body'] }}</p>
@endsection
