<div class="w-full max-w-2xl mx-auto p-6 bg-white shadow-md rounded-xl border border-gray-300">
    <h2 class="text-2xl font-semibold mb-4 border-b border-gray-300 pb-2 text-gray-800">آخر 10 أكشنات للـ Admin</h2>
    <ul class="space-y-3 max-h-96 overflow-y-auto scrollbar-thin scrollbar-thumb-gray-400 scrollbar-track-gray-200">
        @foreach ($logs as $log)
            <li class="flex justify-between items-center p-3 bg-gray-50 rounded-lg hover:bg-blue-50 transition duration-200 ease-in-out">
                <div class="text-sm">
                    <strong class="text-gray-900">{{ $log->admin->name ?? 'Admin' }}</strong>
                    <span class="@if($log->action == 'create') text-green-600 
                                  @elseif($log->action == 'update') text-yellow-600 
                                  @elseif($log->action == 'delete') text-red-600 
                                  @else text-blue-600 @endif ml-1">
                        {{ $log->action }}
                    </span>
                    @if($log->model)
                        <span class="text-gray-500 ml-1">على {{ class_basename($log->model) }}</span>
                    @endif
                </div>
                <div class="text-xs text-gray-400 whitespace-nowrap ml-4">
                    {{ $log->created_at ? $log->created_at->diffForHumans() : '-' }}
                </div>
            </li>
        @endforeach
    </ul>
</div>
