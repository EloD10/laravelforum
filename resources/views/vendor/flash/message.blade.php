@foreach (session('flash_notification', collect())->toArray() as $message)
    @if ($message['overlay'])
        @include('flash::modal', [
            'modalClass' => 'flash-modal',
            'title'      => $message['title'],
            'body'       => $message['message']
        ])
    @else
        <div class="text-blue-darker font-semibold m-4 p-2 align-center shadow-md bg-blue-lighter text-center"
                    role="alert"
                    onclick="classList.add('hidden')"
        >

            <div class="flex justify-center align-middle">
                <span class="flex-1">{!! $message['message'] !!}</span>
                <svg class="h-6 w-6 fill-current text-blue inline-block cursor-pointer" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 8.586L2.929 1.515 1.515 2.929 8.586 10l-7.071 7.071 1.414 1.414L10 11.414l7.071 7.071 1.414-1.414L11.414 10l7.071-7.071-1.414-1.414L10 8.586z"/></svg>
            </div>
        </div>
    @endif
@endforeach

{{ session()->forget('flash_notification') }}
