@if (session('toast-messagge'))

    <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
        <div id="liveToast" class="toast show " role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <strong class="me-auto">{{ env('APP_NAME') }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                <h5>{{ session('toast-messagge') }}</h5>
                <form action="{{ session('toast-route') }}" method="Post" class="restore-all-form ms-2">
                    @if (session('toast-method'))
                        @method(session('toast-method'))
                    @endif

                    @csrf
                    <button type="submit" class="btn btn-warning">Ripristina</button>
                </form>
            </div>
        </div>
    </div>
@endif
{{-- @section('scripts')
    @if (session('toast-messagge'))
        @vite('resources/js/toast.js')
    @endif
@endsection --}}
