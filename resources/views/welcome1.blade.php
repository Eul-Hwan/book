{{-- <h1>
    <?= isset($greeting) ? "{$greeting} " : 'Hello '; ?><?= $name; ?>
</h1> --}}


{{-- 위에 와 같은 결과를 내는 블레이드 코드 --}}
{{-- <h1>{{ $greeting ?? 'Hello ' }} {{ $name ?? '' }}</h1> --}}


{{-- 조건문 p26 --}}
{{-- @if($itemCount = count($times))
    <p>{{ $itemCount }} 종류의 과일이 있습니다.</p>
@else
    <p>엥~ 아무것도 없는데요!</p>
@endif --}}


{{-- 반복문 1. foreach p28 --}}
{{-- <ul>
    @foreach($items as $item)
    <li>{{ $item }}</li>
    @endforeach
</ul> --}}


{{-- 반복문 2. forelse p28 --}}
{{-- 아무것도 없는데요.를 출력하기위한 코드 --}}
{{-- <?php $items = []; ?> --}}
{{-- <ul>
    @forelse($items as $item)
    <li>{{ $item }}</li>
    @empty
    <li>엥 아무것도 없는데요!</li>
    @endforelse
</ul> --}}


{{-- 템플릿 상속 p29 --}}
{{-- @extends('layouts.master')
@section('content')
    <p>저는 자식 뷰의 'content' 섹션입니다.</p>
@endsection --}}


{{-- 템플릿 상속에 스트립트 스타일 추가 p30 하지만 작동을 안함이 아니라 layouts.master에 코드를 추가 해줘야함 --}}
{{-- @extends('layouts.master')
@section('style')
    <style>
        body {background: green; color: white;}
    </style>
@endsection
@section('content')
    <p>저는 자식 뷰의 'content' 섹션입니다.</p>
@endsection
@section('script')
    <script>
        alert("저는 자식 뷰의 'script' 섹션입니다.");
    </script>
@endsection --}}


{{-- 조각 뷰 삽입 p31 --}}
{{-- @extends('layouts.master')
@section('content')
    @include('partials.footer')
@endsection --}}


{{-- 세션의 상속 p31 --}}
@extends('layouts.master')
@section('content')
    @include('partials.footer')
@endsection
@section('script')
    <script>
        alert("저는 자식 뷰의 'script' 섹션입니다.");
    </script>
@endsection

