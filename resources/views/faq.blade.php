@extends('layout')
@section('namehalaman')
<div class="flex flex-row">
    <i data-feather="list"></i>
    <h2 class="text-lg font-medium mr-auto ml-3"> FAQ</h2>
</div>
@endsection
@section('content')
<div class="overflow-x-auto">
    <table class="table mt-5">
        <thead>
            <tr class="bg-gray-200 text-gray-700 float-left">
                <th class="whitespace-no-wrap">No.</th>
                <th class="whitespace-no-wrap">FAQ</th>
            </tr>
        </thead>
        <tbody>
        @foreach($faq as $f)
            <tr id="{{$f->ID_FAQ}}" class="float-left">
                <td class="border-b dark:border-dark-5">{{$f->ID_FAQ}}</td>
                <td class="border-b dark:border-dark-5">Q : {{$f->QUESTION}}</td>
            </tr>
            <tr >
                <td class="border-b dark:border-dark-5"></td>
                <td class="border-b dark:border-dark-5 ">A : {{$f->ANSWER}}</td>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <br>
</div>
@endsection