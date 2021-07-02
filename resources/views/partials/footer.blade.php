{{-- <footer>
    <p>저는 꼬리말입니다. 다른 뷰에서 저를 입양해 가요.</p>
</footer> --}}


{{-- 조각 뷰의 안좋은 예 p32 스크립트가 2개인데 마지막 1개(조각 뷰)만 작동한다. --}}
@section('script')
    <script>
        alert("저는 조각 뷰의 'script' 섹션입니다.");
    </script>
@endsection


{{-- 조각 뷰의 좋은 예 p32 --}}
{{-- @section('script')
    @parent
    <script>
        alert("저는 조각 뷰의 'script' 섹션입니다.");
    </script>
@endsection --}}
