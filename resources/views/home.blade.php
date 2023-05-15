@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if (!auth()->user()->tokenCan('show-category')) 
                        {{ 'Unauthorized' }}
                    @else
                        {{ 'access' }}
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>



<script>


var xhr = new XMLHttpRequest();
xhr.withCredentials = true;

xhr.addEventListener("readystatechange", function() {
  if(this.readyState === 4) {
    console.log(this.responseText);
  }
});

xhr.open("GET", "http://127.0.0.1:8000/api/categories/2");
xhr.setRequestHeader("Accept", "application/json");
xhr.setRequestHeader("Content-Type", "application/json");
xhr.setRequestHeader("Authorization", "Bearer 2|tvBJsHxUP9zJaFky2h4Kd044UHaW6lqGpJ0KRkMq");
// WARNING: Cookies will be stripped away by the browser before sending the request.
// xhr.setRequestHeader("Cookie", "XSRF-TOKEN=eyJpdiI6Ii9qeWZFbHJQcEZ4Z2prWkkrMnlsWlE9PSIsInZhbHVlIjoiM0pTaXhCbXlXNW5KaHNjVXh3TUtCTXFrU3VQYVl1MjkzcmtQdFc2WUhGSmNGUDZmSU9CNjZ5U0ZKY2ltVnNZU1FkQTJmaHNLSTNpZFY0bTF0bEZ1VjV2ZjZkWlBkZlFGc3Evd0xWYTc2dlZ5djNFM3doRkZneitHQW9EdmlVRm8iLCJtYWMiOiJkNzU3NGMwNTJlYTUyMmJkOGU1OTMwMDZmMmIyNThhODU4ZThkMzQ5ZDkyNmIwMTgxZjgwYWYxNTEwMTIxMjg5IiwidGFnIjoiIn0%3D; laravel_session=eyJpdiI6ImdqL3JhUjRZN09sanlQU1hQcnBFY0E9PSIsInZhbHVlIjoibzVZSU9mU05LOFoyK3R6R3JsOWlleWZMaGZXWDhSWnVlWFZucko1L09ObDJ6ak5rQzE3VmhkeWorS1ZteHRtK2NUTE5NS3B1K3VVNHdWeTE5SHZxNTQ1c2VzK25NRHF5V1loRGNET3prVCtZZ0FjSnloR3ZZRitNK1JFdUZScnMiLCJtYWMiOiI0MmViNDRhN2YzZWIwZGQ0NWNhMjFjNGRlM2FhZWVjNGE2Mjg4OGEwMzI4YmEwY2IwNTJiNjllYzgzNDM3MjM1IiwidGFnIjoiIn0%3D");

xhr.send(null);
</script>
@endsection
